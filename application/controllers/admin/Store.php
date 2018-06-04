<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

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
        $this->template->active_page = 'store';
        $this->load->model('StoreModel');
    }

    public function index()
    {
        $products = $this->StoreModel->getAllProducts();

        $this->template->content = 'admin/store/index';
        $this->template->products = $products;
        $this->template->render();
    }

    public function add()
    {
        if($this->input->post('type')) {
            if($product_id = $this->StoreModel->addProduct($this->input->post())) {
                $this->template->success = 'Pomyślnie dodano produkt';
            } else {
                $this->template->error = 'Wystąpił nieoczekiwany błąd';
            }
        }
        
        $this->template->add_javascripts(array(array('dir' => 'admin_dir', 'name' => 'js/store_add.js')));
        $this->template->content = 'admin/store/add';
        $this->template->render();

    }

    public function edit($product_id)
    {
        if($this->input->post('type')) {
            if($this->StoreModel->updateProduct($product_id, $this->input->post())) {
                $this->template->success = 'Pomyślnie zaktualizowano produkt';
            } else {
                $this->template->error = 'Wystąpił nieoczekiwany błąd';
            }
        }

        $product = $this->StoreModel->getProductData($product_id);
        $product->field = $this->StoreModel->getFieldsArray($product->add_fields);

        $this->template->product = $product;
        $this->template->add_javascripts(array(array('dir' => 'admin_dir', 'name' => 'js/store_add.js')));
        $this->template->content = 'admin/store/edit';
        $this->template->render();

    }

}
