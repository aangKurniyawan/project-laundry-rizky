<?php defined('BASEPATH')OR exit('No dirrect access allowed');

    class Login_controller extends CI_Controller{
        public function index(){
            $this->load->view('login/index-form-login');
        }
    }
?>