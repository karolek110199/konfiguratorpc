<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add_client($data)
    {
        $insert = array(
            'email' => $data['email'],
            'password' => '',
            'salt' => '',
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'adress' => $data['adress'],
            'city' => $data['city'],
            'postcode' => $data['postcode'],
            'telephone' => $data['telephone'],
            'country' => 'Polska'
        );
        $this->db->insert('h_clients', $insert, TRUE);
        
        return $insert_id = $this->db->insert_id();
    }

}