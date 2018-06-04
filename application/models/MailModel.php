<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MailModel extends CI_Model
{
    protected $TABLE_NAME = 'h_mails';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function addMail($data) {
        $insert = array(
            'efrom' => $data['from'],
            'efromdisplay' => $data['fromdisplay'],
            'eto' => $data['to'],
            'etodisplay' => $data['todisplay'],
            'subject' => $data['subject'],
            'type' => $data['type'],
            'status' => 1
        );
        $this->db->insert($this->TABLE_NAME, $insert, TRUE);
        
        return $insert_id = $this->db->insert_id();
    }

    public function validateForm($form) {
        $data = array();
        if(!isset($form['name']) || empty($form['name'])) {
            return false;
        }
        $data['fromdisplay'] = $form['name'];
        if(!isset($form['email']) || empty($form['email'])) {
            return false;
        }
        $data['from'] = $form['email'];
        if(!isset($form['title']) || empty($form['title'])) {
            return false;
        }
        $data['subject'] = $form['title'];
        if(!isset($form['message']) || empty($form['message'])) {
            return false;
        }
        $data['message'] = $form['message'];
        $data['type'] = 'Formularz kontaktowy';

    }

}
