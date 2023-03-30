<?php defined('BASEPATH') OR exit ('No dirrect access allowed');
    class Homepage_controller extends CI_Controller{

        public function __construct(){
            parent :: __construct();
            $this->load->model('Homepage_model');
            $this->load->model('Dashboard_model');
        }
        public function index(){
            $data['jenislaundry'] = $this->Homepage_model->get_data_jenis_laundry();
            $this->load->view('header/index-header-homepage');
            $this->load->view('homepage/index-homepage',$data);
            $this->load->view('footer/index-footer-homepage');
        }

        public function menu_produk(){
            $data['jenislaundry'] = $this->Homepage_model->get_data_jenis_laundry();
            $this->load->view('header/index-header-homepage');
            $this->load->view('homepage/menu-produk-homepage',$data);
            $this->load->view('footer/index-footer-homepage');
        }

        public function detail_produk(){
            $id_jenis_laundry = $this->uri->segment(2);
            $data['detailproduk'] = $this->Homepage_model->get_detail_produk($id_jenis_laundry);
            $this->load->view('header/index-header-homepage');
            $this->load->view('homepage/detail-produk-homepage',$data);
            $this->load->view('footer/index-footer-homepage');
        }

        public function menu_kontak(){
            $this->load->view('header/index-header-homepage');
            $this->load->view('homepage/menu-kontak-homepage');
            $this->load->view('footer/index-footer-homepage');
        }

        public function menu_daftar_member(){
            $this->load->view('header/index-header-homepage');
            $this->load->view('homepage/menu-daftar-member-homepage');
            $this->load->view('footer/index-footer-homepage');
        }

        public function insert_member(){
            $nama_pelanggan = $this->input->post('nama_pelanggan');
            $no_telepon_pelanggan = $this->input->post('no_telepon_pelanggan');
            $email_pelanggan = $this->input->post('email_pelanggan');
            $pass = $this->input->post('password_pelanggan');
            $password_pelanggan = md5($pass);
            $alamat_pelanggan = $this->input->post('alamat_pelanggan');
            $deleted = 0;
            $level = 'Member';

            $data = array(
                'nama_pelanggan' => $nama_pelanggan,
                'no_telepon_pelanggan' => $no_telepon_pelanggan,
                'email_pelanggan' => $email_pelanggan,
                'password_pelanggan' => $password_pelanggan,
                'alamat_pelanggan' => $alamat_pelanggan,
                'level' => $level,
                'deleted' => $deleted
            );

            $cek_email_pelanggan = $this->Dashboard_model->get_email_pelanggan($email_pelanggan);

            if($cek_email_pelanggan != null){
                $this->session->set_flashdata('gagal','info: email sudah digunakan oleh pengguna lain, silahkan gunakan email yang berbeda');
                redirect(base_url('daftar'),'refresh');
            }else{
                if($this->Dashboard_model->insert_pelanggan($data)){
                    $this->session->set_flashdata('berhasil','info: data berhasil disimpan, silahkan login dengan akun yang telah anda daftarkan');
                    redirect(base_url('daftar'),'refresh');
                }else{
                    $this->session->set_flashdata('gagal','info: data gagal disimpan, silahkan cobalagi');
                    redirect(base_url('daftar'),'refresh');
                }
            }
        }

        public function form_login_member(){
            $this->load->view('header/index-header-homepage');
            $this->load->view('homepage/form-login-member');
            $this->load->view('footer/index-footer-homepage');
        }

        public function transaksi_member(){
            if($this->session->userdata('masuk') != TRUE){
                $url=base_url('formloginmember');
                redirect($url);
            }else{
                $id_pelanggan = $this->session->userdata('session_id');
                $data['transaksimember'] = $this->Homepage_model->get_transaksi_member($id_pelanggan);
                $this->load->view('header/index-header-homepage');
                $this->load->view('homepage/menu-transaksi-member',$data);
                $this->load->view('footer/index-footer-homepage');
            }
        }

        public function form_insert_transaksi_member(){
            $id_jenis_laundry = $this->uri->segment(2);
            $data['detailproduk'] = $this->Homepage_model->get_detail_produk($id_jenis_laundry);
            $this->load->view('header/index-header-homepage');
            $this->load->view('homepage/form-tambah-transaksi-member',$data);
            $this->load->view('footer/index-footer-homepage');
        }

        public function insert_transaksi_member_homepage(){
            $now = date("Y-m-d");
            $id_pelanggan = $this->input->post('id_pelanggan');
            $no_telepon_pelanggan = $this->input->post('no_telepon_pelanggan');
            $id_jenis_laundry = $this->input->post('id_jenis_laundry');
            $cek_harga_paket = $this->Dashboard_model->get_harga_paket($id_jenis_laundry);
            $harga_jenis_laundry = $cek_harga_paket[0]['harga_jenis_laundry'];
            $berat_barang = $this->input->post('berat_barang');
            $total_harga = $harga_jenis_laundry * $berat_barang;
            $tgl_transaksi = $now;
            $status_transaksi = 'Aktif';
            $status_bayar = 'Belum Lunas';
            $catatan_pelanggan = $this->input->post('catatan_pelanggan');
            $buat_no_transaksi = $this->Dashboard_model->CreateCode();
            $no_transaksi = $buat_no_transaksi;
            $cek_no_pelanggan = $this->Dashboard_model->get_no_pelanggan($no_telepon_pelanggan);
            
            if($cek_no_pelanggan == null){
                $this->session->set_flashdata('gagal','info: no telepon member tidak terdaftar, silahkan cek no telepon lagi');
                redirect(base_url('forminserttransaksimember/'.$id_jenis_laundry),'refresh');
            }else{
                $data_transaksi = array(
                    'id_pelanggan' => $id_pelanggan,
                    'id_jenis_laundry' => $id_jenis_laundry,
                    'no_transaksi' => $no_transaksi,
                    'harga_paket' => $harga_jenis_laundry,
                    'berat_barang' => $berat_barang,
                    'total_harga' => $total_harga,
                    'tgl_transaksi' => $tgl_transaksi,
                    'status_transaksi' => $status_transaksi,
                    'status_bayar' => $status_bayar,
                    'catatan_pelanggan' => $catatan_pelanggan,
                    'deleted' => 0
                );
    
                if($this->Dashboard_model->insert_transaksi($data_transaksi)){
                    $this->session->set_flashdata('berhasil','info: data transaksi berhasil disimpan');
                    redirect(base_url('detailtransaksimember/'.$no_transaksi),'refresh');
                }else{
                    $this->session->set_flashdata('gagal','info: data transaksi gagal disimpan, silahkan cobalagi');
                    redirect(base_url('forminserttransaksimember/'.$id_jenis_laundry),'refresh');
                }
            }
        }

        public function detail_transaksi_member(){
            $no_transaksi = $this->uri->segment(2);
            $data['detailtransaksi'] = $this->Homepage_model->get_detail_transaksi_member($no_transaksi);
            $this->load->view('header/index-header-homepage');
            $this->load->view('homepage/detail-transaksi-member',$data);
            $this->load->view('footer/index-footer-homepage');
        }
    }
?>