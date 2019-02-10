<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Chats extends CI_Model {

        public function __construct() {
            parent::__construct();
            $this->load->database();
        }

        public function fetch_all_friends($username){
            $this->db->select('users.*');
            $this->db->from('users');
            $this->db->join('friends','users.id=friends.friend_id');
            $this->db->where('friends.user_id',$username);
            $this->db->order_by('friends.friend_id', 'ASC');
            
            $friends = $this->db->get();
            return $friends->result_array();
        }

        public function fetch_all_chats($sender_id,$receiver_id){
            $this->db->select('chats.*');
            $this->db->from('chats');
            $this->db->where('chats.sender_id',$sender_id);
            $this->db->where('chats.receiver_id',$receiver_id);
            $this->db->or_where('chats.sender_id',$receiver_id);
            $this->db->or_where('chats.receiver_id',$sender_id);
            $this->db->order_by('chats.id', 'ASC');
            $chats=$this->db->get();

            return $chats->result_array();
        }
    }
?>