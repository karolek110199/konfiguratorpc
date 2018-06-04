<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('order');
    }
    
    public function order() {
        
        $order_id = (int)$this->input->get('orderid');
        $allow = $this->input->get('allow');
        
        if(!isset($order_id) || !isset($allow)) {
            redirect();
            die();
        }
        
        $this->load->model('OrderModel');
        $order = $this->OrderModel->get_order_details_if_allow($order_id, $allow);
        $hardware = $this->OrderModel->get_order_parts($order_id);
        
        if(isset($order) && $hardware) {
            $order['status_name'] = get_order_status($order['status'], $this->config->item('order_status'));
            $order['payment_name'] = get_order_payment($order['payment'], $this->config->item('payment_method'));
            $order['shipment_name'] = get_order_shipment($order['shipment'], $this->config->item('shipment_method'));
                       
            $this->load->model('StoreModel');
            $this->load->library('Template');
            $this->template->title = 'Zamówienie #'.$order_id.' - '.$this->template->title;
            $this->template->content = 'order/order';
            $this->template->set_data($order);
            $this->template->hardware = $hardware;
            $this->template->render();
        } else {
            redirect('error?text='.urlencode('Nie odnaleziono zamówienia.'));
        }
        
    }
    
}
