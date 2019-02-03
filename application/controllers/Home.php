<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function homepage()
	{
        //echo "hi";
        //$data['username']="hello";
        $user_id="3";
        $this->load->model('chats');
        $data['friend']= $this->chats->fetch_all_friends($user_id);
        $this->load->view('pages/homepage',$data);
	}
    
    public function friend_select()
    {
        
    }
    
    public function chat()
    {
        $this->load->view('Chat');
    }
    
    public function chat_send()
    {
        
    }
    
}
