<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    public function friendlist()
	{
		$this->load->view('homepage');
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
