<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VisitCounter
{
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->database();
    }

    public function check()
    {
        if(!isset($_COOKIE['konfigurator_visit_counter'])) {
            setcookie('konfigurator_visit_counter', 1, time()+60*60*24);
            $this->CI->db->set('value', 'value+1', FALSE);
            $this->CI->db->where('name', 'visit_counter');
            $this->CI->db->update('h_settings');
        }
    }

    public function get()
    {
        $visits = $this->CI->db->select('*')
            ->where('name', 'visit_counter')
            ->from('h_settings')
            ->get()
            ->row();
        setcookie('visit_counter', $visits->value, time()+60*60*24);
        return;
    }
}
