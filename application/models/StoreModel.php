<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StoreModel extends CI_Model
{
    public $AVAILABLE_PRODUCTS = array('system' => 'system', 'processor' => 'processors', 'mobo' => 'mobos', 'graphic' => 'graphics', 'ram' => 'rams', 'drive' => 'drives', 'power' => 'powers', 'case' => 'cases');
    public $PARTS_NAME = array('system' => 'System', 'processor' => 'Procesor', 'mobo' => 'Płyta główna', 'graphic' => 'Karta graficzna', 'ram' => 'Pamięć RAM', 'drive' => 'Dysk twardy', 'power' => 'Zasilacz', 'case' => 'Obudowa');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAvailableTypes()
    {
        return $this->AVAILABLE_PRODUCTS;
    }

    public function getAllProducts()
    {
        return $this->db->get('h_products')->result();
    }

    public function getProductsByType($type, $fields = false)
    {
        $data = $this->db->get_where('h_products', array('type' => $type))->result();
        if($fields) {
            foreach($data as $row) {
                if($row->add_fields != '') {
                    foreach(json_decode($row->add_fields, TRUE) as $id => $field) {
                        $row->field[$field['name']] = $field['value'];
                    }
                }
                unset($row->add_fields);
            }
        }
        return $data;
    }

    public function getProductData($id)
    {
        return $this->db->get_where('h_products', array('id' => $id))->row();
    }

    public function getProductName($id) {
        $query = $this->db->select('name')->from('h_products')->where('id', $id)->limit(1)->get();
        return $query->result()[0]->name;
    }

    public function getProductPrice($id) {
        $query = $this->db->select('price')->from('h_products')->where('id', $id)->limit(1)->get();
        return $query->result()[0]->price;
    }

    public function getTotalPrice($hardware) {
        $price = 0.00;
        foreach($hardware as $part => $id) {
            if(is_array($id)) {
                
                foreach($id as $key => $idd) {
                    $price += $this->getProductPrice($idd);
                }
                
            } else {
                $price += $this->getProductPrice($id);
            }
        }
        return $price;
    }

    public function addProduct($data)
    {
        $data = $this->validateAddData($data);

        $insert = array(
            'type' => $data['type'],
            'price' => number_format((float)$data['price'], 2, '.', ''),
            'manufacturer' => $data['manufacturer'],
            'producent_code' => $data['producentcode'],
            'ean' => $data['ean'],
            'model' => $data['model'],
            'name' => $data['name'],
            'img' => $this->uploadImage()
        );
        if(isset($data['fields'])) {
            $insert['add_fields'] = json_encode($data['fields']);
        }

        if($this->db->insert('h_products', $insert, TRUE)) {
            $product_id = $this->db->insert_id();
            return $product_id;
        } else {
            return false;
        }
    }

    public function updateProduct($product_id, $data)
    {
        $data = $this->validateAddData($data);
        $img = $this->uploadImage();

        $update = array(
            'type' => $data['type'],
            'price' => number_format((float)$data['price'], 2, '.', ''),
            'manufacturer' => $data['manufacturer'],
            'producent_code' => $data['producentcode'],
            'ean' => $data['ean'],
            'model' => $data['model'],
            'name' => $data['name']
        );
        if(isset($data['fields'])) {
            $update['add_fields'] = json_encode($data['fields']);
        }
        if(isset($img) && $img != '') {
            $update['img'] = $img;
        }

        if($this->db->update('h_products', $update, array('id' => $product_id))) { 
            return true;
        } else {
            return false;
        }
    }

    public function getFieldsArray($fields)
    {
        $row = array();
        if($fields != '') {
            foreach(json_decode($fields, TRUE) as $id => $field) {
                $row[$field['name']] = $field['value'];
            }
        }
        return $row;
    }

    public function validateAddData($data)
    {
        $fields = array();
        foreach($data as $name => $value) {
            $str = explode('-', $name);
            if($str[0] === 'afield') {
                if($value != '' && !empty($value)) {
                    $fields[(int)$str[1]] = array('name' => $value);
                }
                unset($data[$name]);
            }
            if($str[0] === 'afieldw') {
                if(isset($fields[(int)$str[1]])) {
                    $fields[(int)$str[1]]['value'] = $value;
                }
                unset($data[$name]);
            }
        }
        if(!empty($fields)) {
            $data['fields'] = array_values($fields);
        }
        return $data;
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
                elseif(isset($this->AVAILABLE_PRODUCTS[$str[0]]) && $id != -1) {
                    $hardware[$part] = $id;
                }
            }
        }
        return $hardware;
    }

    public function uploadImage()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1512;
        $config['max_width']            = 1920;
        $config['max_height']           = 1080;
        $this->load->library('upload', $config);
        
        if(!$this->upload->do_upload('product_img'))
        {
            return '';
        }
        else
        {
            return $this->upload->data('file_name');
        }
    }
}
