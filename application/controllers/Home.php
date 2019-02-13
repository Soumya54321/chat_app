<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$user=1;
$friend=0;

class Home extends CI_Controller {


    public function homepage()
	{
        $user_id=$GLOBALS['user'];
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
        $GLOBALS['friend']=$_POST['receiver_id'];
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
        $response = array();
        $conn = $this->load->model('chats');
        if (!$conn) {
            $response['success'] = false;
            $response['message'] = "Connection failed: " . mysqli_connect_error();
            echo json_encode($response);
            exit();
        }

        $data['sender_id'] = 1;
        $data['receiver_id'] = $_POST['receiver_id'];
        $data['chat']=$_POST['chat'];
        $r = $this->chats->send_new_chat($data);
        if (!$r) {
            $response['success'] = false;
            $response['message'] = "Error: Connection Failed";
            echo json_encode($response);
            exit();
        }
        $response['success'] = true;
        $response['message'] = "";
        echo json_encode($response);
    }

    public function fetch_chat()
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
            $result = $this->chats->last_chat($sender_id,$receiver_id);

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
}
