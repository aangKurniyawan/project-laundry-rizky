<?php defined('BASEPATH')OR exit('No dirrect access allowed');
    class Dashboard_controller extends CI_Controller{
        public function __construct(){
            parent:: __construct();
            $this->load->model('Dashboard_model');
            if($this->session->userdata('masuk') != TRUE){
                $url=base_url('login');
                redirect($url);
            }
        }

        public function index(){
            $now = date('Y-m-d');
            $data['totalbayar'] = $this->Dashboard_model->get_total_pembayaran($now);
            $data['transaksiaktif'] = $this->Dashboard_model->get_total_transaksi_aktif();
            $data['transaksiselesai'] = $this->Dashboard_model->get_total_transaksi_selesai($now);
            $data['totalmember'] = $this->Dashboard_model->get_total_member();
            $data['transaksibaru'] = $this->Dashboard_model->get_transaksi_baru($now);
            $data['rekapproduk'] = $this->Dashboard_model->get_rekap_transaksi_produk();
            $this->load->view('header/index-header-dashboard');
            $this->load->view('dashboard/index-dashboard',$data);
            $this->load->view('footer/index-footer-dashboard');
        }

        public function master_owner(){
            $data['listowner'] = $this->Dashboard_model->get_list_owner();
            $this->load->view('header/index-header-dashboard');
            $this->load->view('master_data/master_owner/index-master-owner',$data);
           // $this->load->view('footer/index-footer-dashboard');
        }

        public function form_tambah_owner(){
            $this->load->view('header/index-header-dashboard');
            $this->load->view('master_data/master_owner/form-tambah-owner');
            $this->load->view('footer/index-footer-dashboard');
        }

        public function insert_owner(){
            $nama_owner = $this->input->post('nama_owner');
            $no_telepon_owner = $this->input->post('no_telepon_owner');
            $email_owner = $this->input->post('email_owner');
            $password_owner = $this->input->post('password_owner');
            $level = 'Owner';
            $data = array(
                'nama_owner' => $nama_owner,
                'no_telepon_owner' => $no_telepon_owner,
                'email_owner' => $email_owner,
                'password_owner' => md5($password_owner),
                'level' => $level
            );

            $cek_email_owner = $this->Dashboard_model->get_email_owner($email_owner);

            if($cek_email_owner != null){
                $this->session->set_flashdata('gagal','info: Email sudah terdaftar silahkan gunakan email yang berbeda');
                redirect(base_url('formaddowner'),'refresh');
            }else{
                if($this->Dashboard_model->insert_owner($data)){
                    $this->session->set_flashdata('berhasil','info: data berhasil ditambahkan');
                    redirect(base_url('masterowner'),'refresh');
                }else{
                    $this->session->set_flashdata('gagal','info: data gagal disimpan, silahkan cobalagi');
                    redirect(base_url('formaddowner'),'refresh');
                }
            }
        }

        public function form_edit_owner(){
            $id_owner = $this->uri->segment(2);
            $data['editowner'] = $this->Dashboard_model->get_edit_owner($id_owner);
            $this->load->view('header/index-header-dashboard');
            $this->load->view('master_data/master_owner/form-edit-owner',$data);
            $this->load->view('footer/index-footer-dashboard');
        }

        public function update_owner(){
            $id_owner = $this->input->post('id_owner');
            $nama_owner = $this->input->post('nama_owner');
            $no_telepon_owner = $this->input->post('no_telepon_owner');
            $email_owner = $this->input->post('email_owner');
            $password_owner = $this->input->post('password_owner_baru');

            if($password_owner != null) {
                $data = array(
                    'nama_owner' => $nama_owner,
                    'no_telepon_owner' => $no_telepon_owner,
                    'email_owner' => $email_owner,
                    'password_owner' => md5($password_owner)
                );
            }else{
                $data = array(
                    'nama_owner' => $nama_owner,
                    'no_telepon_owner' => $no_telepon_owner,
                    'email_owner' => $email_owner
                );
            }
            
            $cek_email_owner = $this->Dashboard_model->get_email_owner_edit($id_owner,$email_owner);

            if($cek_email_owner != null){
                $this->session->set_flashdata('gagal','info: Email sudah terdaftar silahkan gunakan email yang berbeda');
                redirect(base_url('formeditowner/'.$id_owner),'refresh');
            }else{
                if($this->Dashboard_model->update_owner($id_owner,$data)){
                    $this->session->set_flashdata('berhasil','info: data berhasil rubah');
                    redirect(base_url('masterowner'),'refresh');
                }else{
                    $this->session->set_flashdata('gagal','info: data gagal dirubah, silahkan cobalagi');
                    redirect(base_url('formeditowner/'.$id_owner),'refresh');
                }
            }
        }

        public function hapus_owner(){
            $id_owner = $this->input->post('id_owner');
            $deleted = 1;
            $data = array('deleted' => $deleted );

            if($this->Dashboard_model->update_owner($id_owner,$data)){
                $this->session->set_flashdata('berhasil','info: data berhasil rubah');
                redirect(base_url('masterowner'),'refresh');
            }else{
                $this->session->set_flashdata('gagal','info: data gagal dirubah, silahkan cobalagi');
                redirect(base_url('masterowner'),'refresh');
            }
        }

        public function master_staf(){
            $data['liststaf'] = $this->Dashboard_model->get_list_staf();
            $this->load->view('header/index-header-dashboard');
            $this->load->view('master_data/master_staf/index-master-staf',$data);
           // $this->load->view('footer/index-footer-dashboard');
        }

        public function form_tambah_staf(){
            $this->load->view('header/index-header-dashboard');
            $this->load->view('master_data/master_staf/form-tambah-staf');
            $this->load->view('footer/index-footer-dashboard');
        }

        public function insert_staf(){
            $nama_staf = $this->input->post('nama_staf');
            $no_telepon_staf = $this->input->post('no_telepon_staf');
            $email_staf = $this->input->post('email_staf');
            $password_staf = $this->input->post('password_staf');
            $level = 'Staf';
            $deleted = 0;

            $data = array(
                'nama_staf' => $nama_staf,
                'no_telepon_staf' => $no_telepon_staf,
                'email_staf' => $email_staf,
                'password_staf' => md5($password_staf),
                'level' => $level,
                'deleted' => $deleted
            ); 

            $cek_email_staf = $this->Dashboard_model->get_email_staf($email_staf);
            if($cek_email_staf != null){
                $this->session->set_flashdata('gagal','info: data email sudah terdaftar, silahkan gunakan email yang berbeda');
                redirect(base_url('formaddstaf'),'refresh');
            }else{
                if($this->Dashboard_model->insert_staf($data)){
                    $this->session->set_flashdata('berhasil','info: data berhasil disimpan');
                    redirect(base_url('masterstaf'),'refresh');
                }else{
                    $this->session->set_flashdata('gagal','info: data gagal disimpan, silahkan cobalagi');
                    redirect(base_url('formaddstaf'),'refresh');
                }
            }
        }

        public function form_edit_staf(){
            $id_staf = $this->uri->segment(2);
            $data['editstaf'] = $this->Dashboard_model->get_edit_staf($id_staf);
            $this->load->view('header/index-header-dashboard');
            $this->load->view('master_data/master_staf/form-edit-staf',$data);
            $this->load->view('footer/index-footer-dashboard');
        }

        public function update_staf(){
            $id_staf = $this->input->post('id_staf');
            $nama_staf = $this->input->post('nama_staf');
            $no_telepon_staf = $this->input->post('no_telepon_staf');
            $email_staf = $this->input->post('email_staf');
            $password_staf = $this->input->post('password_staf_baru');

            if($password_staf != null){
                $data = array(
                    'nama_staf' => $nama_staf,
                    'no_telepon_staf' => $no_telepon_staf,
                    'email_staf' => $email_staf,
                    'password_staf' => md5($password_staf)
                ); 
            }else{
                $data = array(
                    'nama_staf' => $nama_staf,
                    'no_telepon_staf' => $no_telepon_staf,
                    'email_staf' => $email_staf
                ); 
            }
           
            $cek_email_staf = $this->Dashboard_model->get_edit_email_staf($id_staf,$email_staf);
            if($cek_email_staf != null){
                $this->session->set_flashdata('gagal','info: data email sudah terdaftar, silahkan gunakan email yang berbeda');
                redirect(base_url('formeditstaf/'.$id_staf),'refresh');
            }else{
                if($this->Dashboard_model->update_staf($id_staf,$data)){
                    $this->session->set_flashdata('berhasil','info: data dirubah disimpan');
                    redirect(base_url('masterstaf'),'refresh');
                }else{
                    $this->session->set_flashdata('gagal','info: data gagal dirubah, silahkan cobalagi');
                    redirect(base_url('formeditstaf/'.$id_staf),'refresh');
                }
            }
        }

        public function hapus_staf(){
            $id_staf = $this->input->post('id_staf');
            $deleted = 1;

            $data = array('deleted' => $deleted);

            if($this->Dashboard_model->update_staf($id_staf,$data)){
                $this->session->set_flashdata('berhasil','info: data berhasil dihapus');
                redirect(base_url('masterstaf'),'refresh');
            }else{
                $this->session->set_flashdata('gagal','info: data gagal dihapus, silahkan cobalagi');
                redirect(base_url('masterstaf'),'refresh');
            }
        }

        public function master_pelanggan(){
            $data['listpelanggan'] = $this->Dashboard_model->get_list_pelanggan();
            $this->load->view('header/index-header-dashboard');
            $this->load->view('master_data/master_pelanggan/index-master-pelanggan',$data);
           // $this->load->view('footer/index-footer-dashboard');
        }

        public function form_tambah_pelanggan(){
            $this->load->view('header/index-header-dashboard');
            $this->load->view('master_data/master_pelanggan/form-tambah-pelanggan');
            $this->load->view('footer/index-footer-dashboard');
        }

        public function insert_pelanggan(){
            $nama_pelanggan = $this->input->post('nama_pelanggan');
            $no_telepon_pelanggan = $this->input->post('no_telepon_pelanggan');
            $email_pelanggan = $this->input->post('email_pelanggan');
            $password_pelanggan = $this->input->post('password_pelanggan'); 
            $alamat_pelanggan = $this->input->post('alamat_pelanggan');
            $deleted = 0;

            $data = array(
                'nama_pelanggan' => $nama_pelanggan,
                'no_telepon_pelanggan' => $no_telepon_pelanggan,
                'email_pelanggan' => $email_pelanggan,
                'password_pelanggan' => md5($password_pelanggan),
                'alamat_pelanggan' => $alamat_pelanggan,
                'deleted' => $deleted
            );

            $cek_email_pelanggan = $this->Dashboard_model->get_email_pelanggan($email_pelanggan);

            if($cek_email_pelanggan != null){
                $this->session->set_flashdata('gagal','info: email sudah digunakan oleh pengguna lain, silahkan gunakan email yang berbeda');
                redirect(base_url('formaddpelanggan'),'refresh');
            }else{
                if($this->Dashboard_model->insert_pelanggan($data)){
                    $this->session->set_flashdata('berhasil','info: data berhasil disimpan');
                    redirect(base_url('masterpelanggan'),'refresh');
                }else{
                    $this->session->set_flashdata('gagal','info: data gagal disimpan, silahkan cobalagi');
                    redirect(base_url('formaddpelanggan'),'refresh');
                }
            }
        }

        public function form_edit_pelanggan(){
            $id_pelanggan = $this->uri->segment(2);
            $data['editpelanggan'] = $this->Dashboard_model->get_edit_pelanggan($id_pelanggan);
            $this->load->view('header/index-header-dashboard');
            $this->load->view('master_data/master_pelanggan/form-edit-pelanggan',$data);
            $this->load->view('footer/index-footer-dashboard');
        }

        public function update_pelanggan(){
            $id_pelanggan = $this->input->post('id_pelanggan');
            $nama_pelanggan = $this->input->post('nama_pelanggan');
            $no_telepon_pelanggan = $this->input->post('no_telepon_pelanggan');
            $email_pelanggan = $this->input->post('email_pelanggan');
            $password_pelanggan = $this->input->post('password_pelanggan_baru'); 
            $alamat_pelanggan = $this->input->post('alamat_pelanggan');

            if($password_pelanggan != null){
                $data = array(
                    'nama_pelanggan' => $nama_pelanggan,
                    'no_telepon_pelanggan' => $no_telepon_pelanggan,
                    'email_pelanggan' => $email_pelanggan,
                    'password_pelanggan' => md5($password_pelanggan),
                    'alamat_pelanggan' => $alamat_pelanggan
                );
            }else{
                $data = array(
                    'nama_pelanggan' => $nama_pelanggan,
                    'no_telepon_pelanggan' => $no_telepon_pelanggan,
                    'email_pelanggan' => $email_pelanggan,
                    'alamat_pelanggan' => $alamat_pelanggan
                );
            }

            $cek_email_pelanggan = $this->Dashboard_model->get_email_pelanggan_update($id_pelanggan,$email_pelanggan);

            if($cek_email_pelanggan != null){
                $this->session->set_flashdata('gagal','info: email sudah digunakan oleh pengguna lain, silahkan gunakan email yang berbeda');
                redirect(base_url('formeditpelanggan/'.$id_pelanggan),'refresh');
            }else{
                if($this->Dashboard_model->update_pelanggan($id_pelanggan,$data)){
                    $this->session->set_flashdata('berhasil','info: data berhasil disimpan');
                    redirect(base_url('masterpelanggan'),'refresh');
                }else{
                    $this->session->set_flashdata('gagal','info: data gagal disimpan, silahkan cobalagi');
                    redirect(base_url('formeditpelanggan/'.$id_pelanggan),'refresh');
                }
            }
        }

        public function hapus_pelanggan(){
            $id_pelanggan = $this->input->post('id_pelanggan');
            $deleted = 1;

            $data = array('deleted' => $deleted);

            if($this->Dashboard_model->update_pelanggan($id_pelanggan,$data)){
                $this->session->set_flashdata('berhasil','info: data berhasil dihapus');
                redirect(base_url('masterpelanggan'),'refresh');
            }else{
                $this->session->set_flashdata('gagal','info: data gagal dihapus, silahkan cobalagi');
                redirect(base_url('masterpelanggan'),'refresh');
            }
        }

        public function master_jenis_laundry(){
            $data['listjenislaundry'] = $this->Dashboard_model->get_jenis_laundry();
            $this->load->view('header/index-header-dashboard');
            $this->load->view('master_data/master_jenis_laundry/index-master-jenis-laundry',$data);
            //$this->load->view('footer/index-footer-dashboard');
        }

        public function form_tambah_jenis_laundry(){
            $this->load->view('header/index-header-dashboard');
            $this->load->view('master_data/master_jenis_laundry/form-tambah-jenis-laundry');
            $this->load->view('footer/index-footer-dashboard');
        }

        public function insert_jenis_laundry(){
            $nama_jenis_laundry = $this->input->post('nama_jenis_laundry');
            $harga_jenis_laundry = $this->input->post('harga_jenis_laundry');
            $deskripsi_jenis_laundry = $this->input->post('deskripsi_jenis_laundry');
            $deleted = 0;

            $data = array(
                'nama_jenis_laundry' => $nama_jenis_laundry,
                'harga_jenis_laundry' => $harga_jenis_laundry,
                'deskripsi_jenis_laundry' => $deskripsi_jenis_laundry,
                'deleted' => $deleted
            );

            $cek_nama_jenis_laundry = $this->Dashboard_model->get_nama_jenis_laundry($nama_jenis_laundry);

            if($cek_nama_jenis_laundry != null){
                $this->session->set_flashdata('gagal','info: data nama jenis laundry sudah tersedia silahkan cek kembali');
                redirect(base_url('formaddjenislaundry'),'refresh');
            }else{
                if($this->Dashboard_model->insert_jenis_laundry($data)){
                    $this->session->set_flashdata('berhasil','info: data berhasil disimpan');
                    redirect(base_url('masterjenislaundry'),'refresh');
                }else{
                    $this->session->set_flashdata('gagal','info: data gagal disimpan silahkan cobalagi');
                    redirect(base_url('formaddjenislaundry'),'refresh');
                }
            }
        }

        public function form_edit_jenis_laundry(){
            $id_jenis_laundry = $this->uri->segment(2);
            $data['editjenislaundry'] = $this->Dashboard_model->get_edit_jenis_laundry($id_jenis_laundry);
            $this->load->view('header/index-header-dashboard');
            $this->load->view('master_data/master_jenis_laundry/form-edit-jenis-laundry',$data);
            $this->load->view('footer/index-footer-dashboard');
        }

        public function update_jenis_laundry(){
            $id_jenis_laundry = $this->input->post('id_jenis_laundry');
            $nama_jenis_laundry = $this->input->post('nama_jenis_laundry');
            $harga_jenis_laundry = $this->input->post('harga_jenis_laundry');
            $deskripsi_jenis_laundry = $this->input->post('deskripsi_jenis_laundry');

            $data = array(
                'nama_jenis_laundry' => $nama_jenis_laundry,
                'harga_jenis_laundry' => $harga_jenis_laundry,
                'deskripsi_jenis_laundry' => $deskripsi_jenis_laundry
            );

            $cek_nama_jenis_laundry = $this->Dashboard_model->get_nama_jenis_laundry_edit($id_jenis_laundry,$nama_jenis_laundry);

            if($cek_nama_jenis_laundry != null){
                $this->session->set_flashdata('gagal','info: data nama jenis laundry sudah tersedia silahkan cek kembali');
                redirect(base_url('formeditjenislaundry/'.$id_jenis_laundry),'refresh');
            }else{
                if($this->Dashboard_model->update_jenis_laundry($id_jenis_laundry,$data)){
                    $this->session->set_flashdata('berhasil','info: data berhasil dirubah');
                    redirect(base_url('masterjenislaundry'),'refresh');
                }else{
                    $this->session->set_flashdata('gagal','info: data gagal dirubah silahkan cobalagi');
                    redirect(base_url('formeditjenislaundry/'.$id_jenis_laundry),'refresh');
                }
            }
        }

        public function hapus_jenis_laundry(){
            $id_jenis_laundry = $this->input->post('id_jenis_laundry');
            $deleted = 1;

            $data = array('deleted' => $deleted);

            if($this->Dashboard_model->update_jenis_laundry($id_jenis_laundry,$data)){
                $this->session->set_flashdata('berhasil','info: data berhasil dihapus');
                redirect(base_url('masterjenislaundry'),'refresh');
            }else{
                $this->session->set_flashdata('gagal','info: data gagal dihapus silahkan cobalagi');
                redirect(base_url('formeditjenislaundry/'.$id_jenis_laundry),'refresh');
            }
        }

        public function master_jenis_bayar(){
            $data['listjenisbayar'] = $this->Dashboard_model->get_jenis_bayar();
            $this->load->view('header/index-header-dashboard');
            $this->load->view('master_data/master_jenis_bayar/index-master-jenis-bayar',$data);
            $this->load->view('footer/index-footer-dashboard');
        }

        public function form_tambah_jenis_bayar(){
            $this->load->view('header/index-header-dashboard');
            $this->load->view('master_data/master_jenis_bayar/form-tambah-jenis-bayar');
            $this->load->view('footer/index-footer-dashboard');
        }

        public function insert_jenis_bayar(){
            $nama_jenis_bayar = $this->input->post('nama_jenis_bayar');
            $deleted = 0;

            $data = array(
                'nama_jenis_bayar' => $nama_jenis_bayar,
                'deleted' => $deleted
            );

            $cek_nama_jenis_bayar = $this->Dashboard_model->get_nama_jenis_bayar($nama_jenis_bayar);

            if($cek_nama_jenis_bayar != null){
                $this->session->set_flashdata('gagal','info: nama jenis bayar sudah tersedia, silahkan cek data');
                redirect(base_url('formaddjenisbayar'),'refresh');
            }else{
                if($this->Dashboard_model->insert_jenis_bayar($data)){
                    $this->session->set_flashdata('berhasil','info: data berhasil disimpan');
                    redirect(base_url("masterjenisbayar"),'refresh');
                }else{
                    $this->session->set_flashdata('gagal','info: data gagal disimpan, silahkan cobalagi');
                    redirect(base_url('formaddjenisbayar'),'refresh');
                }
            }
        }

        public function form_edit_jenis_bayar(){
            $id_jenis_bayar = $this->uri->segment(2);
            $data['editjenisbayar'] = $this->Dashboard_model->get_edit_jenis_bayar($id_jenis_bayar);
            $this->load->view('header/index-header-dashboard');
            $this->load->view('master_data/master_jenis_bayar/form-edit-jenis-bayar',$data);
            $this->load->view('footer/index-footer-dashboard');
        }

        public function update_jenis_bayar(){
            $id_jenis_bayar = $this->input->post('id_jenis_bayar');
            $nama_jenis_bayar = $this->input->post('nama_jenis_bayar');

            $data = array(
                'nama_jenis_bayar' => $nama_jenis_bayar
            );

            $cek_nama_jenis_bayar = $this->Dashboard_model->get_nama_jenis_bayar_edit($id_jenis_bayar,$nama_jenis_bayar);

            if($cek_nama_jenis_bayar != null){
                $this->session->set_flashdata('gagal','info: nama jenis bayar sudah tersedia, silahkan cek data');
                redirect(base_url('formeditjenisbayar/'.$id_jenis_bayar),'refresh');
            }else{
                if($this->Dashboard_model->update_jenis_bayar($id_jenis_bayar,$data)){
                    $this->session->set_flashdata('berhasil','info: data berhasil dirubah');
                    redirect(base_url("masterjenisbayar"),'refresh');
                }else{
                    $this->session->set_flashdata('gagal','info: data gagal dirubah, silahkan cobalagi');
                    redirect(base_url('formeditjenisbayar/'.$id_jenis_bayar),'refresh');
                }
            }
        }

        public function hapus_jenis_bayar(){
            $id_jenis_bayar = $this->input->post('id_jenis_bayar');
            $deleted = 1;

            $data = array('deleted' => $deleted);

            if($this->Dashboard_model->update_jenis_bayar($id_jenis_bayar,$data)){
                $this->session->set_flashdata('berhasil','info: data berhasil dihapus');
                redirect(base_url("masterjenisbayar"),'refresh');
            }else{
                $this->session->set_flashdata('gagal','info: data gagal dihapus, silahkan cobalagi');
                redirect(base_url("masterjenisbayar"),'refresh');
            }
        }

        public function transaksi_laundry(){
            $data['listtransaksi'] = $this->Dashboard_model->get_data_transaksi();
            $this->load->view('header/index-header-dashboard');
            $this->load->view('transaksi/index-data-transaksi',$data);
            //$this->load->view('footer/index-footer-dashboard');
        }

        public function form_tambah_transaksi(){
            $data['listjenislaundry'] = $this->Dashboard_model->get_jenis_laundry();
            $this->load->view('header/index-header-dashboard');
            $this->load->view('transaksi/form-tambah-transaksi',$data);
            //$this->load->view('footer/index-footer-dashboard');
        }

        public function insert_transaksi_non_member(){
            $now = date("Y-m-d");
            $nama_pelanggan = $this->input->post('nama_pelanggan');
            $no_telepon_pelanggan = $this->input->post('no_telepon_pelanggan');
            $alamat_pelanggan = $this->input->post('alamat_pelanggan');
            $email_pelanggan = '-';
            $password_pelanggan = '-';
            $deleted = 0;

            $data_pelanggan = array(
                'nama_pelanggan' => $nama_pelanggan,
                'no_telepon_pelanggan' => $no_telepon_pelanggan,
                'alamat_pelanggan' => $alamat_pelanggan,
                'email_pelanggan' => $email_pelanggan,
                'password_pelanggan' => $password_pelanggan,
                'deleted' => $deleted
            );

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
                $id_pelanggan = 0;
            }else{
                $id_pelanggan = $cek_no_pelanggan[0]['id_pelanggan'];
            }
            
            if($cek_no_pelanggan != null){
                $this->Dashboard_model->update_pelanggan($id_pelanggan,$data_pelanggan);
                $id_pelanggan = $cek_no_pelanggan[0]['id_pelanggan'];
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
                    'deleted' => $deleted
                );

                if($this->Dashboard_model->insert_transaksi($data_transaksi)){
                    $this->session->set_flashdata('berhasil','info: data transaksi berhasil disimpan');
                    redirect(base_url('transaksi'),'refresh');
                }else{
                    $this->session->set_flashdata('gagal','info: data transaksi gagal disimpan, silahkan cobalagi');
                    redirect(base_url('formaddtransaksi'),'refresh');
                }
            }else{
                $this->Dashboard_model->insert_pelanggan($data_pelanggan);
                $cek_no_pelanggan = $this->Dashboard_model->get_no_pelanggan($no_telepon_pelanggan);
                $id_pelanggan = $cek_no_pelanggan[0]['id_pelanggan'];
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
                    'deleted' => $deleted
                );

                if($this->Dashboard_model->insert_transaksi($data_transaksi)){
                    $this->session->set_flashdata('berhasil','info: data transaksi berhasil disimpan');
                    redirect(base_url('transaksi'),'refresh');
                }else{
                    $this->session->set_flashdata('gagal','info: data transaksi gagal disimpan, silahkan cobalagi');
                    redirect(base_url('formaddtransaksi'),'refresh');
                }
            }
        }

        public function insert_transaksi_member(){
            $now = date("Y-m-d");
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
                redirect(base_url('formaddtransaksi'),'refresh');
            }else{
                $id_pelanggan = $cek_no_pelanggan[0]['id_pelanggan'];
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
                    redirect(base_url('transaksi'),'refresh');
                }else{
                    $this->session->set_flashdata('gagal','info: data transaksi gagal disimpan, silahkan cobalagi');
                    redirect(base_url('formaddtransaksi'),'refresh');
                }
            }
        }

        public function form_bayar_transaksi(){
            $id_transaksi = $this->uri->segment(2);
            $data['bayartransaksi'] = $this->Dashboard_model->get_bayar_transaksi($id_transaksi);
            $data['datapembayaran'] = $this->Dashboard_model->get_data_pembayaran($id_transaksi);
            $data['listjenisbayar'] = $this->Dashboard_model->get_jenis_bayar();
            $this->load->view('header/index-header-dashboard');
            $this->load->view('transaksi/form-bayar-transaksi',$data);
            $this->load->view('footer/index-footer-dashboard');
        }

        public function proses_bayar_transaksi(){
            $id_transaksi = $this->input->post('id_transaksi');
            $id_jenis_bayar = $this->input->post('id_jenis_bayar');
            $tgl_bayar = date("Y-m-d");
            $total_pembayaran = $this->input->post('total_harga');
            $total_bayar = $this->input->post('total_bayar');
            $kembalian = $total_pembayaran - $total_bayar;

            if($total_bayar < $total_pembayaran){
                $this->session->set_flashdata('gagal','info: jumlah pembayaran kurang, silahkan masukan pembayaran yang benar');
                redirect(base_url('frombayartransaksi/'.$id_transaksi),'refresh');
            }else if($total_bayar > $total_pembayaran || $total_bayar == $total_pembayaran){
                $status_bayar = 'Lunas';
            }

            $data = array(
                'id_transaksi' => $id_transaksi,
                'id_jenis_bayar' => $id_jenis_bayar,
                'tgl_bayar' => $tgl_bayar,
                'total_pembayaran' => $total_pembayaran,
                'total_bayar' => $total_bayar,
                'kembalian' => $kembalian,
                'status_bayar' => $status_bayar
            );

            if($this->Dashboard_model->insert_pembayaran($data)){
                $data_transaksi = array(
                    'status_transaksi' => 'Selesai',
                    'status_bayar' => 'Lunas'
                );
                $this->Dashboard_model->update_transaksi($id_transaksi,$data_transaksi);
                $this->session->set_flashdata('berhasil','info: data pembayaran berhasil diproses');
                redirect(base_url('frombayartransaksi/'.$id_transaksi),'refresh');
            }else{
                $this->session->set_flashdata('gagal','info: data pembayaran gagal disimpan, silahkan cobalagi');
                redirect(base_url('frombayartransaksi/'.$id_transaksi),'refresh');
            }
        }

        public function form_edit_transaksi(){
            $id_transaksi = $this->uri->segment(2);
            $data['edittransaksi'] = $this->Dashboard_model->get_edit_transaksi($id_transaksi);
            $data['listjenislaundry'] = $this->Dashboard_model->get_jenis_laundry();
            $this->load->view('header/index-header-dashboard');
            $this->load->view('transaksi/form-edit-transaksi',$data);
            $this->load->view('footer/index-footer-dashboard');
        }

        public function update_transaksi(){
            $id_transaksi = $this->input->post('id_transaksi');
            $id_pelanggan = $this->input->post('id_pelanggan');
            $nama_pelanggan = $this->input->post('nama_pelanggan');
            $no_telepon_pelanggan = $this->input->post('no_telepon_pelanggan');
            $alamat_pelanggan = $this->input->post('alamat_pelanggan');

            $data_pelanggan = array(
                'nama_pelanggan' => $nama_pelanggan,
                'no_telepon_pelanggan' => $no_telepon_pelanggan,
                'alamat_pelanggan' => $alamat_pelanggan
            ); 

            $id_jenis_laundry = $this->input->post('id_jenis_laundry');
            $cek_harga_paket = $this->Dashboard_model->get_harga_paket($id_jenis_laundry);
            $harga_jenis_laundry = $cek_harga_paket[0]['harga_jenis_laundry'];
            $berat_barang = $this->input->post('berat_barang');
            $total_harga = $harga_jenis_laundry * $berat_barang;
            $catatan_pelanggan = $this->input->post('catatan_pelanggan');

            $data_transaksi = array(
                'id_jenis_laundry' => $id_jenis_laundry,
                'harga_paket' => $harga_jenis_laundry,
                'berat_barang' => $berat_barang,
                'total_harga' => $total_harga,
                'catatan_pelanggan' => $catatan_pelanggan
            );

            if($this->Dashboard_model->update_pelanggan($id_pelanggan,$data_pelanggan) && $this->Dashboard_model->update_transaksi($id_transaksi,$data_transaksi)){
                $this->session->set_flashdata('berhasil','info: data transaksi berhasil diupdate');
                redirect(base_url('transaksi'),'refresh');
            }else{
                $this->session->set_flashdata('gagal','info: data gagal di update, silahkan cobalagi');
                redirect(base_url('formedittransaksi/'.$id_transaksi),'refresh');
            }
        }

        public function batal_transaksi(){
            $id_transaksi = $this->input->post('id_transaksi');

            $status_transaksi = 'Batal';

            $data_transaksi = array('status_transaksi' => $status_transaksi);

            if($this->Dashboard_model->update_transaksi($id_transaksi,$data_transaksi)){
                $this->session->set_flashdata('berhasil','info: data transaksi berhasil dibatalkan');
                redirect(base_url('transaksi'),'refresh');
            }else{
                $this->session->set_flashdata('gagal','info: data gagal di dibatalkan, silahkan cobalagi');
                redirect(base_url('transaksi'),'refresh');
            }
        }

        public function laporan_transaksi(){
            $data['listtransaksi'] = $this->Dashboard_model->get_data_transaksi();
            $this->load->view('header/index-header-dashboard');
            $this->load->view('laporan/index-laporan-transaksi',$data);
           // $this->load->view('footer/index-footer-dashboard');
        }

        public function cari_laporan_transaksi(){
            $tgl_awal = $this->input->post('tgl_awal');
            $tgl_akhir = $this->input->post('tgl_akhir');
            $status_transaksi = $this->input->post('status_transaksi');
            $data['listtransaksi'] = $this->Dashboard_model->get_data_laporan_transaksi($tgl_awal,$tgl_akhir,$status_transaksi);
            $this->load->view('header/index-header-dashboard');
            $this->load->view('laporan/index-laporan-transaksi',$data);
            //$this->load->view('footer/index-footer-dashboard');
        }

        public function laporan_pembayaran(){
            $data['listtransaksi'] = $this->Dashboard_model->get_data_pembayaran_transaksi();
            $data['jumlahbayar'] = $this->Dashboard_model->get_data_jumlah_pembayaran_transaksi();
            $this->load->view('header/index-header-dashboard');
            $this->load->view('laporan/index-laporan-pembayaran',$data);
            //$this->load->view('footer/index-footer-dashboard');
        }

        public function cari_laporan_pembayaran(){
            $tgl_awal = $this->input->post('tgl_awal');
            $tgl_akhir = $this->input->post('tgl_akhir');
            $data['listtransaksi'] = $this->Dashboard_model->get_data_laporan_pembayaran($tgl_awal,$tgl_akhir);
            $data['jumlahbayar'] = $this->Dashboard_model->get_data_jumlah_laporan_pembayaran($tgl_awal,$tgl_akhir);
            $this->load->view('header/index-header-dashboard');
            $this->load->view('laporan/index-laporan-pembayaran',$data);
            //$this->load->view('footer/index-footer-dashboard');
        }
    }
?>