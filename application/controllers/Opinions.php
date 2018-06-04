<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opinions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('OpinionModel');
        $this->load->library('Template');
        $this->load->library('session');
    }

    public function index()
    {
        $opinions = $this->OpinionModel->getAllOpinions();
        if(isset($_SESSION['success'])) {
            $this->template->success = 'Pomyślnie dodano opinię!';
        }

        $this->template->title = 'Opinie - '.$this->template->title;
        $this->template->content = 'opinions/index';
        $this->template->opinions = $opinions;
        $this->template->render();
    }

    public function add()
    {
        $opinion =$this->input->post();
        if(isset($opinion) && !empty($opinion)) {
            if($opinion = $this->OpinionModel->validateOpinion($opinion)) {
                if($this->OpinionModel->addOpinion($opinion)) {
                    $this->session->set_flashdata('success', 'true');
                    redirect('opinions/index');
                } else {
                    $this->template->error = 'Wystąpił nieoczekiwany błąd';
                }
            } else {
                $this->template->error = 'Sprawdź poprawność wprowadzonych danych';
            }
        }

        $this->load->helper('form');
        $this->template->title = 'Dodaj opinię - '.$this->template->title;
        $this->template->content = 'opinions/add';
        $this->template->add_javascripts(array(array('dir' => 'js_dir', 'name' => 'rate.js')));
        $this->template->render();
    }

}
