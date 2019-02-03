<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Chats extends CI_Model {

        public function __construct() {
            parent::__construct();
            $this->load->database();
        }

        public function fetch_all_friends($username){
            $this->db->select('users.username');
            $this->db->from('users');
            $this->db->join('friends','users.id=friends.friend_id');
            $this->db->where('friends.user_id',$username);
            $this->db->order_by('friends.friend_id', 'ASC');
            
            $friends = $this->db->get();
            return $friends->result_array();
        }
    }
?>