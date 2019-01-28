<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    public function view($page='login'){
        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }
        $data['title']=$page;
        $this->load->view('templates/header',$data);
        $this->load->view('pages/'.$page);
        $this->load->view('templates/footer');
    }

    public function reg_submit(){
            $data['email']=$_POST['email'];
            $data['username']=$_POST['username'];
            $data['password']=$_POST['password'];
            $this->load->model('users');
            $result=$this->users->insert_data_of_user($data);
            if($result){
                echo "Data Successfully Inserted";
            }
    }

    public function login_submit(){
        $data['username']=$_POST['username'];
        $data['password']=$_POST['password'];
        $this->load->model('users');
        $result=$this->users->get_data_of_user($data);
        if(isset($result)){
            echo "Data Matched";
        }
        else{
            echo "Data is not valid";
        }
    }


}
