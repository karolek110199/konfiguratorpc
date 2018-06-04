<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
    
    public function error() {
        $get = $this->input->get();
        $this->load->library('Template');
        $this->template->title = 'Ups... Coś poszło nie tak - '.$this->template->title;
        $this->template->content = 'errors/error';
        $this->template->set_data($get);
        $this->template->render();
    }
    
}
