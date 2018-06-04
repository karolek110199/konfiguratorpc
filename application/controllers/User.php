<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('Template');
    }

    public function login()
    {
        $this->load->helper('form');
        $this->template->title = 'Logowanie - '.$this->template->title;
        $this->template->content = 'user/login';
        $this->template->render();
    }

    public function register()
    {
        $this->load->helper('form');
        $this->template->title = 'Rejestracja konta - '.$this->template->title;
        $this->template->content = 'user/register';
        $this->template->render();
    }

}
