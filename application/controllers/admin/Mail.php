<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller {

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
        $this->template->active_page = 'mail';
    }
}
