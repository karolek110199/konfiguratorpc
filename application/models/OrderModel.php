<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_orders_list() {
        $order = $this->db->query("SELECT `h_orders`.`id`, `client_id`, `total_price`, `payment`, `shipment`, `status`, `message`, `created`, `last_changed`, `allow`, `email`, `first_name`, `last_name`, `adress`, `city`, `postcode`, `telephone`, `country`, `exOrderId` FROM `h_orders` INNER JOIN `h_clients` ON `h_orders`.`client_id` = `h_clients`.`id`");
        return $order->result();
    }

    public function get_order_details($order_id) {
        
        $order = $this->db->query("SELECT `h_orders`.`id`, `client_id`, `total_price`, `payment`, `shipment`, `status`, `message`, `created`, `last_changed`, `email`, `first_name`, `last_name`, `adress`, `city`, `postcode`, `telephone`, `country`, `exOrderId` FROM `h_orders` INNER JOIN `h_clients` ON `h_orders`.`client_id` = `h_clients`.`id` WHERE `h_orders`.`id` = ".$this->db->escape($order_id)." LIMIT 1");
        return $order->row_array();
    }

    public function get_order_details_by_exorderid($exOrderId) {
        
        $order = $this->db->query("SELECT `h_orders`.`id`, `client_id`, `total_price`, `payment`, `shipment`, `status`, `message`, `created`, `last_changed`, `email`, `first_name`, `last_name`, `adress`, `city`, `postcode`, `telephone`, `country`, `exOrderId` FROM `h_orders` INNER JOIN `h_clients` ON `h_orders`.`client_id` = `h_clients`.`id` WHERE `h_orders`.`exOrderId` = ".$this->db->escape($exOrderId)." LIMIT 1");
        return $order->row_array();
    }

    public function get_order_details_if_allow($order_id, $allow) {
        
        $order = $this->db->query("SELECT `h_orders`.`id`, `client_id`, `total_price`, `payment`, `shipment`, `status`, `message`, `created`, `last_changed`, `email`, `first_name`, `last_name`, `adress`, `city`, `postcode`, `telephone`, `country`, `exOrderId` FROM `h_orders` INNER JOIN `h_clients` ON `h_orders`.`client_id` = `h_clients`.`id` WHERE `h_orders`.`id` = ".$this->db->escape($order_id)." AND `h_orders`.`allow` = ".$this->db->escape($allow)." LIMIT 1");
        return $order->row_array();
    }

    public function get_order_parts($order_id) {
        
        $hardware = $this->db->where('order_id', $order_id)->get('h_orders_parts');
        return $hardware->result_array();
    }

    public function add_order($data) {
        
        $this->load->model('ClientModel');
        $client = $this->ClientModel->add_client($data['person']);
        if(!$client) return false;
        
        $insert = array(
            'client_id' => (int)$client,
            'total_price' => number_format($data['total_price'], 2, '.', ''),
            'payment' => $data['person']['payment'],
            'shipment' => $data['person']['shipment'],
            'status' => 1,
            'message' => $data['person']['message'],
            'created' => time(),
            'last_changed' => time(),
            'exOrderId' => $this->generateExOrderId(),
            'allow' => $this->generateAllowStr()
        );
        
        if($this->db->insert('h_orders', $insert, TRUE)) {
            $order_id = $this->db->insert_id();
            if($this->add_order_parts($data['hardware'], $order_id)) {
                return $order_id;
            }
        } else {
            return false;
        }
    }

    public function add_order_parts($data, $order_id) {
        
        $this->load->model('StoreModel');
        
        foreach($data as $key => $value) {
            $insert;
            if(is_array($value)) {
                
                foreach($value as $name => $id) {
                    $insert = array(
                        'order_id' => $order_id,
                        'category' => $key,
                        'part_id' => $id,
                        'price' => $this->StoreModel->getProductPrice($id)
                    );
                }
                
            } else {
                $insert = array(
                    'order_id' => $order_id,
                    'category' => $key,
                    'part_id' => $value,
                    'price' => $this->StoreModel->getProductPrice($value)
                );
            }
            
            $this->db->insert('h_orders_parts', $insert, TRUE);
        }
        return true;
    }

    public function validatePersonForm($data) {
        $error = false;
        $error_msg = array();
        $person = array();

        if(!isset($data['first_name']) || strlen($data['first_name']) < 3) {
            $error = true;
            $error_msg['first_name'] = 'Musisz podać swoje imię';
        }
        $person['first_name'] = $data['first_name'];
        
        if(!isset($data['last_name']) || strlen($data['last_name']) < 3) {
            $error = true;
            $error_msg['last_name'] = 'Musisz podać swoje nazwisko';
        }
        $person['last_name'] = $data['last_name'];
        
        $pattern = '/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/';
        if(!isset($data['email']) || !preg_match($pattern, $data['email'])) {
            $error = true;
            $error_msg['email'] = 'Musisz podać prawidłowy adres e-mail';
        }
        $person['email'] = $data['email'];
        
        if(!isset($data['telephone'])) {
            $error = true;
            $error_msg['telephone'] = 'Musisz podać poprawny numer telefonu (9 cyfr)';
        } else {
            $data['telephone'] = str_replace(array('-',' '), '', $data['telephone']);
            if(!preg_match('/^[0-9]{9}$/',  $data['telephone'])) {
                $error = true;
                $error_msg['telephone'] = 'Musisz podać poprawny numer telefonu (9 cyfr)';
            }
        }
        $person['telephone'] = $data['telephone'];
        
        if(!isset($data['adress']) || strlen($data['adress']) < 3) {
            $error = true;
            $error_msg['adress'] = 'Musisz podać adres';
        }
        $person['adress'] = $data['adress'];
        
        if(!isset($data['city']) || strlen($data['city']) < 3) {
            $error = true;
            $error_msg['city'] = 'Musisz podać miejscowość';
        }
        $person['city'] = $data['city'];
        
        if(!isset($data['postcode']) || strlen($data['postcode']) < 3 || !(preg_match("/^([0-9]{2})(-[0-9]{3})?$/i",$data['postcode']))) {
            $error = true;
            $error_msg['postcode'] = 'Musisz podać poprawny kod pocztowy';
        }
        $person['postcode'] = $data['postcode'];
        
        if(!isset($data['terms']) || $data['terms'] !== 'on') {
            $error = true;
            $error_msg['terms'] = 'Musisz zaakceptować regulamin';
        }
        $person['shipment'] = $data['shipment'];
        $person['payment'] = $data['payment'];
        $person['message'] = $data['message'];
        
        if($error) {
            $this->load->library('session');
            $this->session->set_flashdata('data', $data);
            $this->session->set_flashdata('error_msg', $error_msg);
            return false;
        } else {
            return $person;
        }
    }

    public function get_new_orders_num()
    {
        return $this->db->where('status != 7 AND status != 8')->from('h_orders')->count_all_results();
    }

    public function get_status($exOrderId) {
        $query = $this->db->select('status')->where('exOrderId', $exOrderId)->get('h_orders', 1)->result_array();
        if(isset($query[0]['status'])) return $query[0]['status'];
        return 0;
    }

    public function update_status($exOrderId, $status) {
        return $this->db->set('status', $status)->where('exOrderId', $exOrderId)->update('h_orders');
    }

    public function updateExOrderId($order_id, $newExOrderId) {
        return $this->db->set('exOrderId', $newExOrderId)->where('id', $order_id)->update('h_orders');
    }

    public function generateExOrderId() {
        return substr(uniqid(mt_rand(), true), 0, 64);
    }

    public function generateAllowStr() {
        return substr(uniqid(mt_rand(), true), 0, 64);
    }

    public function get_allowStr($order_id) {
        $query = $this->db->select('allow')->where('id', $order_id)->get('h_orders', 1)->result_array();
        if(isset($query[0]['allow'])) return $query[0]['allow'];
        return 0;
    }

    public function send_order_mail($data) {
        
        $this->load->library('email');
        $this->email->from('heniek1101@gmail.com', 'Konfigurator PC');
        $this->email->to($data['person']['email']);
        $this->email->subject('Twoje zamówienie w Konfigurator PC #'.$data['order_id']);
        
        $message = $this->load->view('mails/new_order', array(
            'person' => $data['person'],
            'hardware' => $data['hardware'],
            'order_id' => $data['order_id'],
            'allow' => $this->get_allowStr($data['order_id'])
        ), TRUE);
        
        $this->email->message($message);

        return $this->email->send();
    }

    public function send_change_status_mail($data)
    {
        $this->load->library('email');
        $this->email->from('heniek1101@gmail.com', 'Konfigurator PC');
        $this->email->to($data['person']['email']);
        $this->email->subject('Zmieniono status zamówienia #'.$data['order_id'].' - '.$data['status']);
        
        $message = $this->load->view('mails/change_order_status', array(
            'status' => $data['status'],
            'person' => $data['person'],
            'order_id' => $data['order_id'],
            'allow' => $this->get_allowStr($data['order_id'])
        ), TRUE);
        
        $this->email->message($message);

        return $this->email->send();
    }

}
