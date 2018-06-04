<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model
{
    protected $table = 'h_users';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login($email, $password)
    {
        $user = $this->db->select('password, salt, login, admin, rank, registered_date')->where('email', $email)->get($this->table)->row_array();

        if($user)
        {
            $pass = substr(md5(md5($user['salt']).md5($password)), 0, 256);
            if($pass == $user['password'])
            {
                unset($user['salt']);
                unset($user['password']);
                return $user;
            }
        }
        return false;
    }

    public function get_count_users()
    {
        return $this->db->count_all_results($this->table);
    }

}
