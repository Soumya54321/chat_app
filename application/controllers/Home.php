<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function homepage()
	{
        //echo "hi";
        //$data['username']="hello";
        $user_id="1";
        $this->load->model('chats');
        $data['friend']= $this->chats->fetch_all_friends($user_id);
        $this->load->view('pages/homepage',$data);
	}
    
    public function friend_select()
    {
        
    }
    
    public function chat()
    {
        $response = array();
        $conn = $this->load->model('chats');
        if (!$conn) {
            $response['success'] = false;
            $response['message'] = "Connection failed: " . mysqli_connect_error();
            echo json_encode($response);
            exit();
        }
        $sender_id = $_POST['sender_id'];
        $receiver_id = $_POST['receiver_id'];
        $row = array();
        $result = $this->chats->fetch_all_chats($sender_id,$receiver_id);

        if (!$result) {
            $response['success'] = false;
            $response['message'] = "";
            echo json_encode($response);
            exit();
        } else{
            $response['success'] = true;
            $response['message'] = "";
            echo json_encode($result);
        }
    }
    
    public function chat_send()
    {
        
    }
    
}
