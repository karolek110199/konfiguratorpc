<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buy extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('StoreModel');
    }
    
    public function person()
    {
        $hardware =$this->input->post();
        if(!isset($hardware) || empty($hardware) || count($hardware) == 0) {
            $hardware = $this->session->userdata('hardware');
            if(!isset($hardware) || empty($hardware) || count($hardware) == 0) {
                redirect('error?text='.urlencode('Brak danych. Prawdopodobnie Twoja sesja wygasła.'));
                die();
            }
        }
        
        $this->load->helper('form');
        
        $hardware = $this->StoreModel->validateConfigForm($hardware);
        unset($_SESSION['hardware']);
        $_SESSION['hardware'] = $hardware; 
        
        $this->load->library('Template');
        $this->template->title = 'Składanie zamówienia - '.$this->template->title;
        $this->template->content = 'buy/person';
        $this->template->set_data(array('hardware' => $hardware));
        $this->template->set_data(array('continue' => $this->input->get('continue')));
        $this->template->add_javascripts(array(array('dir' => 'js_dir', 'name' => 'jquery.mask.min.js'), array('dir' => 'js_dir', 'name' => 'person.js')));
        $this->template->render();
    }
    
    public function summary()
    {
        $hardware = $this->session->userdata('hardware');
        if(!isset($hardware) || empty($hardware) || count($hardware) == 0) {
            redirect('error?text='.urlencode('Brak danych. Prawdopodobnie Twoja sesja wygasła.'));
            die();
        }
        
        $data = $this->security->xss_clean($this->input->post());
        if(!isset($data) || empty($data) || count($data) == 0) {
            redirect('buy/person?continue=true');
            die();
        }
        
        $this->load->model('OrderModel');
        $person = $this->OrderModel->validatePersonForm($data);
        if($person) {
            $this->session->set_userdata('person', $person);
        } else {
            redirect('buy/person');
            die();
        }
        
        $this->load->helper('order');
        $data['payment_name'] = get_order_payment($data['payment'], $this->config->item('payment_method'));
        $data['shipment_name'] = get_order_shipment($data['shipment'], $this->config->item('shipment_method'));
        
        $hardware = array('hardware' => $hardware);
        $total_price = $this->StoreModel->getTotalPrice($hardware['hardware']);
        $this->session->set_userdata('total_price', $total_price);
        $this->load->library('Template');
        $this->template->title = 'Podsumowanie zamówienia - '.$this->template->title;
        $this->template->content = 'buy/summary';
        $this->template->set_data($data);
        $this->template->set_data($hardware);
        $this->template->total_price = $total_price;
        $this->template->render();
    }
    
    public function buy() {
        
        $hardware = $this->session->userdata('hardware');
        if(!isset($hardware) || empty($hardware) || count($hardware) == 0) {
            redirect('error?text='.urlencode('Brak danych. Prawdopodobnie Twoja sesja wygasła.'));
            die();
        }
        
        $person = $this->session->userdata('person');
        if(!isset($person) || empty($person) || count($person) == 0) {
            redirect('error?text='.urlencode('Brak danych. Prawdopodobnie Twoja sesja wygasła.'));
            die();
        }
        
        $total_price = $this->session->userdata('total_price');
        if(!isset($total_price) || empty($total_price)) {
            redirect('error?text='.urlencode('Brak danych. Prawdopodobnie Twoja sesja wygasła.'));
            die();
        }
        
        $data['person'] = $person;
        $data['hardware'] = $hardware;
        $data['total_price'] = $total_price;
        
        $this->load->model('OrderModel');
        $order_id = $this->OrderModel->add_order($data);
        $data['order_id'] = $order_id;
        $this->OrderModel->send_order_mail($data);
        
        $payment = $data['person']['payment'];
        
        unset($_SESSION['person']);
        unset($_SESSION['total_price']);
        
        if($order_id) {
            unset($_SESSION['hardware']);
            $this->load->library('Template');
            $this->template->title = 'Zamówienie złożone - '.$this->template->title;
            $this->template->content = 'buy/success';
            $this->template->order_id = $order_id;
            $this->template->payment = $payment;
            $this->template->render();
        } else {
            redirect('error?text='.urlencode('Wystąpił nieoczekiwany błąd. Proszę spróbować jeszcze raz później.'));
        }
 
    }
    
    public function pay() {
        
        $order_id = $this->input->get('orderid');
        if(!$order_id) {
            redirect('');
            die();
        }
        
        $this->load->model('OrderModel');
        $order = $this->OrderModel->get_order_details($order_id);
        
        if(!isset($order) || empty($order)) {
            redirect('');
            die();
        }

        if($order['status'] != 1) {
            redirect('error?text='.urlencode('To zamówienie zostało już opłacone bądź posiada inny status.'));
            die();
        }
        
        //print_r($order);
        
        $ip = $this->input->ip_address();
        $price = $order['total_price'];
        
        $id = $order['id'];
        $email = $order['email'];
        $fname = $order['first_name'];
        $lname = $order['last_name'];
        $adress = $order['adress'];
        $city = $order['city'];
        $postcode = $order['postcode'];
        $tel = $order['telephone'];
        $exOrderId = $order['exOrderId'];
        
        //DRUCZEK
        if($order['payment'] == 0) {
            
            require_once dirname(dirname(__FILE__)).'/libraries/Druczki/BankTransferBlanketInfo.class.php';
            require_once dirname(dirname(__FILE__)).'/libraries/Druczki/BankTransferBlanketPdf.class.php';
            
            $from = sprintf('%s %s, %s %s %s', $fname, $lname, $adress, $postcode, $city);
            
            $info = array(
                //informacja na temat pierwszego druczku
                new BankTransferBlanketInfo(
                    'Konfigurator PC',
                    '14600000000000000000000000',
                    number_format($price, 2, '.', ''),
                    $from,
                    'Zapłata za zamówienie numer '.$id
                ));
            $blanket = new BankTransferBlanketPdf($info);
            $blanket->setDrawLogo(false);
            $blanket->Output('przelew_konfigurator.pdf', 'D');
        }
        
        //DOTPAY
        if($order['payment'] == 2) {
            
            
        }
        
        
        $data = array(
            'id' => 786481,
            'amount' => $price,
            'currency' => 'PLN',
            'description' => 'Zestaw komputerowy z KonfiguratorPC',
            'lang' => 'pl',
            'URL' => 'http://developer.szymonk.pl/buy/response',
            'type' => 0,
            'control' => $exOrderId,
            'firstname' => $fname,
            'lastname' => $lname,
            'email' => $email,
            'phone' => $tel
        );
        
       redirect('https://ssl.dotpay.pl/test_payment/?'.http_build_query($data));

        // PayU
        /*curl_setopt($ch, CURLOPT_URL, "https://secure.snd.payu.com/api/v2_1/orders");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        
        $ip = $this->input->ip_address();
        $price = $order['total_price']*100;
        
        $id = $order['id'];
        $email = $order['email'];
        $fname = $order['first_name'];
        $lname = $order['last_name'];
        $tel = $order['telephone'];
        
        $exOrderId = $this->OrderModel->generateExOrderId();
        $this->OrderModel->updateExOrderId($id, $exOrderId);
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{
            \"notifyUrl\": \"http://developer.szymonk.pl/buy/notify\",
            \"customerIp\": \"$ip\",
            \"merchantPosId\": \"300746\",
            \"description\": \"Konfigurator PC\",
            \"currencyCode\": \"PLN\",
            \"extOrderId\": \"$exOrderId\",
            \"totalAmount\": \"$price\",
            \"continueUrl\": \"http://developer.szymonk.pl/buy/response\",
            \"buyer\": {
                \"email\": \"$email\",
                \"phone\": \"$tel\",
                \"firstName\": \"$fname\",
                \"lastName\": \"$lname\"
            },
            \"products\": [
              {
                \"name\": \"Zestaw komputerowy od Konfigurator PC\",
                \"unitPrice\": \"$price\",
                \"quantity\": \"1\"
              }
            ]
        }");

        
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "Authorization: Bearer d9a4536e-62ba-4f60-8017-6053211d3f47"
        ));

        $response = curl_exec($ch);
        curl_close($ch);
        
        $data = json_decode($response, true);
        
        if($data['status']['statusCode'] === 'SUCCESS') {
            //$this->OrderModel->update_status($exOrderId, 2);
            redirect($data['redirectUri']);
        } else {
            print_r($data);
        }*/
    }
    
    public function response() {
        
        $status = $this->input->get('status');
        $order_id = $this->input->get('order_id');
        
        if($status === 'OK') {
            $this->load->library('Template');
            $this->template->content = 'buy/pay/success';
            $this->template->order_id = $order_id;
            $this->template->render();
        } else {
            redirect('error?text='.urlencode('Płatność została anulowana. Jeżeli dokonałeś płatności i Twoje środki zostały przelane skontaktuj się z administratorem.'));
        }
        
        
        
        parse_str('id=786481&operation_number=M9265-1539&operation_type=payment&operation_status=completed&operation_amount=4474.00&operation_currency=PLN&operation_original_amount=4474.00&operation_original_currency=PLN&operation_datetime=2018-01-31+18%3A13%3A34&control=&description=Zestaw+komputerowy+z+KonfiguratorPC&email=franek%40wp.pl&p_info=Konfigurator+PC&p_email=karolek110199%40wp.pl&channel=4&signature=17dc590305c79d29f0ffadc299521286ee2de57b2b6b649056ab7bc3f7ea31fc', $arr);
        //print_r($arr);
        
    }
    
    public function notify() {
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $body = file_get_contents('php://input');

            parse_str($body, $data);
            
            $exOrderId = $data['control'];
            $status = $data['operation_status'];

            $this->load->model('OrderModel');
            $order = $this->OrderModel->get_order_details_by_exorderid($exOrderId);
            
            if($status === 'completed' && $order['status'] != 3) {
               
                $this->OrderModel->update_status($exOrderId, 3);
                
                $this->load->helper('order');
               
                $this->OrderModel->send_change_status_mail(array(
                    'order_id' => $order['id'],
                    'status' => get_order_status(3, $this->config->item('order_status')),
                    'person' => array(
                        'email' => $order['email'],
                        'first_name' => $order['first_name'],
                        'last_name' => $order['last_name']
                    )
                ));
            }
            elseif($status === 'rejected') {
                
                $this->load->model('OrderModel');
                if($this->OrderModel->get_status($exOrderId) != 3) {
                    $this->OrderModel->update_status($exOrderId, 1);
                }              
            }
            
            header("HTTP/1.1 200 OK");
            echo "OK";

        }
    }
    
}
