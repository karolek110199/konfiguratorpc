<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if($this->session->logged_in != 1 && $this->session->admin != 5) {
            redirect('/admin/login');
            die();
        }
        $this->load->library('Template');
        $this->template->layout = 'admin/layout';
        $this->template->active_page = 'orders';
    }

    public function edit($id)
    {
        $status = $this->input->post('status');
        if(isset($status)) {
            $this->load->model('OrderModel');
            $order = $this->OrderModel->get_order_details($id);
            $update = $this->OrderModel->update_status($order['exOrderId'], $status);
            $this->load->helper('order');
            $this->OrderModel->send_change_status_mail(array(
                'order_id' => $id,
                'status' => get_order_status($status, $this->config->item('order_status')),
                'person' => array(
                    'email' => $order['email'],
                    'first_name' => $order['first_name'],
                    'last_name' => $order['last_name']
                )
            ));

            if($update) {
                redirect('/admin/orders/?success=update');
            }
        }
        $this->template->content = 'admin/orders/edit';
        $this->template->render();
    }

}