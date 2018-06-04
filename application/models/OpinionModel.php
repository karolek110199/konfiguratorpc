<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OpinionModel extends CI_Model
{
    protected $TABLE = 'h_opinions';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAllOpinions()
    {
        return $this->db->order_by('added', 'DESC')->get($this->TABLE)->result();
    }

    public function addOpinion($opinion)
    {
        $insert = array(
            'name' => $opinion['name'],
            'rate' => $opinion['inputrate'],
            'content' => $opinion['opinion'],
            'added' => time(),
            'userid' => -1
        );
        
        if($this->db->insert($this->TABLE, $insert, TRUE)) {
            return true;
        } else {
            return false;
        }
    }

    public function validateOpinion($opinion)
    {
        if(!empty($opinion['name']) && $opinion['name'] != ' ') {
            $opinion['name'] = substr($opinion['name'], 0, 64);
        } else {
            return false;
        }

        if(!empty($opinion['opinion']) && $opinion['opinion'] != ' ') {
            $opinion['opinion'] = substr($opinion['opinion'], 0, 512);
        } else {
            return false;
        }

        if((int)$opinion['inputrate'] < 1 || (int)$opinion['inputrate'] > 5) {
            return false;
        } else {
            $opinion['inputrate'] = (int)$opinion['inputrate'];
        }

        return $opinion;
    }
}
