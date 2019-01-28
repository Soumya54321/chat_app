<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function insert_data_of_user($data){
        $query=$this->db->insert('users',$data);
        return $query;
    }

    public function get_data_of_user($data)
    {   
        $query=$this->db->get_where('users',array('username'=>$data['username'],'password'=>$data['password']));
        return $query->row_array();
    }
}