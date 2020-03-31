<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    public function Login($username, $password)
    {
        // var_dump($username);
        // var_dump($password);
        // die();
        $this->db->select('username,password,level');
        $this->db->from('user');
        $this->db->where('username',$username); // maksudnya adalah username
        $this->db->where('password',$password); // maksudnya adalah password
        $this->db->Limit(1); // maksudnya data yang diambil cuma 1

        $query = $this->db->get();
        if ($query->num_rows()==1) // jika data ditemukan
        {
            return $query->result();
        }else {
            return false;
        }
    }
}