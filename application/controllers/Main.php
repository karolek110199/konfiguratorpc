<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('Template');
    }

    public function index()
    {
        $this->template->title = $this->template->title.' - Strona główna';
        $this->template->render();
    }

    public function konfigurator()
    {
        $this->load->model('StoreModel');
        $processors = $this->StoreModel->getProductsByType('processor', true);
        $mobos = $this->StoreModel->getProductsByType('mobo', true);
        $rams = $this->StoreModel->getProductsByType('ram', true);
        $graphics = $this->StoreModel->getProductsByType('graphic', true);
        $drives = $this->StoreModel->getProductsByType('drive', true);
        $cases = $this->StoreModel->getProductsByType('case', true);
        $powers = $this->StoreModel->getProductsByType('power', true);
        $systems = $this->StoreModel->getProductsByType('system', true);


        /*$this->load->model('HardwareModel');
        $processors = $this->HardwareModel->getPartList('processor');
        $mobos = $this->HardwareModel->getPartList('mobo');
        $rams = $this->HardwareModel->getPartList('ram');
        //$graphics = $this->HardwareModel->getPartList('graphic');
        $drives = $this->HardwareModel->getPartList('drive');
        $cases = $this->HardwareModel->getPartList('case');
        $powers = $this->HardwareModel->getPartList('power');*/
        
        $this->template->title = 'Wybierz podzespoły - '.$this->template->title;
        $this->template->content = 'konfigurator';
        $this->template->add_css(array(array('dir' => 'http', 'name' => 'https://fonts.googleapis.com/icon?family=Material+Icons')));
        $this->template->add_javascripts(array(array('dir' => 'js_dir', 'name' => 'konfigurator.js')));
        $this->template->set_data(array(
            'processors' => $processors,
            'mobos' => $mobos,
            'rams' => $rams,
            'graphics' => $graphics,
            'drives' => $drives,
            'cases' => $cases,
            'powers' => $powers,
            'systems' => $systems
        ));
        $this->template->render();
    }

    public function faq()
    {
        $this->template->title = 'FAQ - '.$this->template->title;
        $this->template->content = 'faq';
        $this->template->render();
    }

    public function about()
    {
        $this->template->title = 'O projekcie - '.$this->template->title;
        $this->template->content = 'about';
        $this->template->render();
    }

    public function regulamin()
    {
        $this->template->title = 'Regulamin - '.$this->template->title;
        $this->template->content = 'reg';
        $this->template->render();
    }

    public function contact()
    {
        $this->load->helper('form');
        $error = false;
        $sended = false;

        if($form = $this->input->post()) {
            if(!isset($form['name']) || empty($form['name'])) {
                $error = true;
            }
            if(!isset($form['email']) || empty($form['email'])) {
                $error = true;
            }
            if(!isset($form['title']) || empty($form['title'])) {
                $error = true;
            }
            if(!isset($form['message']) || empty($form['message'])) {
                $error = true;
            }
            if(!$error) {
                $this->load->library('email');
                $this->config->load('email');
                $this->email->from($form['email'], $form['name']);
                $this->email->to($this->config->item('konfiguratoremail'));
                $this->email->subject($form['title']);
                $this->email->message($form['message']);
                $sended = $this->email->send();
            }
        }

        $this->template->title = 'Skontaktuj się z nami - '.$this->template->title;
        $this->template->error = $error;
        $this->template->sended = $sended;
        $this->template->content = 'contact';
        $this->template->render();
    }
}
