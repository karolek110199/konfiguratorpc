<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('Template');
        $this->template->layout = 'admin/layout';
        $this->template->active_page = 'index';
    }

    public function index()
    {
        if($this->session->logged_in != 1 && $this->session->admin != 5) {
            redirect('/admin/login');
            die();
        }

        $this->load->model('OrderModel');
        $new_orders = $this->OrderModel->get_new_orders_num();
        
        $this->template->content = 'admin/index';
        $this->template->new_orders = $new_orders;
        $this->template->render();
    }

    public function login()
    {
        $action = $this->input->get('action');
        $email = $this->input->post('email');
        
        if(isset($email)) {
            
            $password = $this->input->post('password');
            
            $this->load->model('UserModel');
            
            $user = $this->UserModel->login($email, $password);
            
            if($user) {        
                $this->session->set_userdata(array(
                    'email' => $email,
                    'name' => $user['name'],
                    'admin' => $user['admin'],
                    'rank' => $user['rank'],
                    'registered' => $user['registered_date'],
                    'logged_in' => 1
                ));
                redirect('/admin/');

            } else {
                $this->template->renderView('admin/login', array(
                    'error' => true
                ));
            }
        } else {
            $this->template->renderView('admin/login', array(
                'logout' => $action
            ));
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(array('email', 'name', 'logged_in', 'admin'));
        $this->session->sess_destroy();
        redirect('/admin/login/?action=logout');
    }

    public function orders()
    {
        if($this->session->logged_in != 1 && $this->session->admin != 5) {
            redirect('/admin/login');
            die();
        }

        $this->load->model('OrderModel');
        $this->load->helper('order');
        
        $orders = $this->OrderModel->get_orders_list();
        
        $this->template->content = 'admin/orders';
        $this->template->active_page = 'orders';
        $this->template->orders = $orders;
        $this->template->render();
    }
}
