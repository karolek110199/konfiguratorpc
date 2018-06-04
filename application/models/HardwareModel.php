<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HardwareModel extends CI_Model {

    public $AVAILABLE_PARTS = array('system' => 'system', 'processor' => 'processors', 'mobo' => 'mobos', 'graphic' => 'graphics', 'ram' => 'rams', 'drive' => 'drives', 'power' => 'powers', 'case' => 'cases');
    public $PARTS_NAME = array('system' => 'System', 'processor' => 'Procesor', 'mobo' => 'Płyta główna', 'graphic' => 'Karta graficzna', 'ram' => 'Pamięć RAM', 'drive' => 'Dysk twardy', 'power' => 'Zasilacz', 'case' => 'Obudowa');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getPartList($type) {
        $table = 'h_'.$type.'s';
        $query = $this->db->get($table);
        return $query->result();
    }

    public function getPartName($type, $id) {
        if(!isset($this->AVAILABLE_PARTS[$type])) return '';
        if($type === 'system') return 'System Windows';
        $table = 'h_'.$type.'s';
        $query = $this->db->select('name')->from($table)->where('id', $id)->limit(1)->get();
        return $query->result()[0]->name;
    }

    public function getPartPrice($type, $id) {
        if(!isset($this->AVAILABLE_PARTS[$type])) return 0;
        if($type === 'system') return 400;
        $table = 'h_'.$type.'s';
        $query = $this->db->select('price')->from($table)->where('id', $id)->limit(1)->get();
        return $query->result()[0]->price;
    }

    public function getTotalPrice($hardware) {
        $price = 0.00;
        foreach($hardware as $part => $id) {
            if(is_array($id)) {
                
                foreach($id as $key => $idd) {
                    $price += $this->getPartPrice($part, $idd);
                }
                
            } else {
                $price += $this->getPartPrice($part, $id);
            }
        }
        return $price;
    }



    public function validateConfigForm($data) {
        $hardware = array();
        
        foreach($data as $part => $id) {
            if($str = explode('-', $part)) {
                if($str[0] === 'ram') {
                    if(!isset($hardware['ram'])) $hardware['ram'] = array();
                    if(is_array($id)) {
                        foreach($id as $key => $value) {
                            array_push($hardware['ram'], $value);
                        }
                    } else {
                        array_push($hardware['ram'], $id);
                    }
                }
                elseif($str[0] === 'drive') {
                    if(!isset($hardware['drive'])) $hardware['drive'] = array();
                    if(is_array($id)) {
                        foreach($id as $key => $value) {
                            array_push($hardware['drive'], $value);
                        }
                    } else {
                        array_push($hardware['drive'], $id);
                    }
                
                }
                elseif($str[0] === 'system' && $id === 'on') {
                    $hardware[$part] = 1;
                }
                elseif(isset($this->AVAILABLE_PARTS[$str[0]])) {
                    $hardware[$part] = $id;
                }
            }
        }
        return $hardware;
    }
}
