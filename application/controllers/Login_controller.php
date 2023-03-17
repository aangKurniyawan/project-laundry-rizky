<?php defined('BASEPATH')OR exit('No dirrect access allowed');

    class Login_controller extends CI_Controller{

        public function __construct(){
            parent:: __construct();
            $this->load->model('Model_login');
        }

        public function index(){
            $this->load->view('login/index-form-login');
        }

        public function auth(){
            $username      = $this->input->post('username');
            $pass          = $this->input->post('password');
            $password      = md5($pass);
            $cek_admin = $this->Model_login->cek_admin($username,$password);
            $cek_kasir = $this->Model_login->cek_staf($username,$password);
            if($cek_admin->num_rows() > 0){
                $data = $cek_admin->row_array();
                $this->session->set_userdata('masuk',TRUE);
                $this->session->set_userdata('session_id',$data['id_owner']);
                $this->session->set_userdata('session_nama',$data['nama_owner']);
                $this->session->set_userdata('session_username',$data['email_owner']);
                $this->session->set_userdata('session_level',$data['level']);
                redirect(base_url("dashboard"),'refresh');
            }else if($cek_staf->num_rows() > 0){
                $data = $cek_staf->row_array();
                $this->session->set_userdata('masuk',TRUE);
                $this->session->set_userdata('session_id',$data['id_staf']);
                $this->session->set_userdata('session_nama',$data['nama_staf']);
                $this->session->set_userdata('session_username',$data['email_staf']);
                $this->session->set_userdata('session_level',$data['level']);
                redirect(base_url("dashboard"),'refresh');
            }else{
                $url = base_url('login');
                $this->session->set_flashdata('gagal','username atau password salah');
                redirect($url);
            }
        }

        public function logout(){
            $this->session->sess_destroy();
            $url = base_url('login');
            redirect($url,'refresh');
        }
    }
?>