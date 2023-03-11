<?php 
    class Dashboard_model extends CI_Model{

        public function get_list_owner(){
            return $this->db->where('deleted',0)
                            ->from('tb_owner')
                            ->get()->result();
        }
        public function get_email_owner($email_owner){
            return $this->db->where('email_owner',$email_owner)
                            ->where('deleted',0)
                            ->from('tb_owner')
                            ->get()->num_rows();
        }

        public function insert_owner($data){
            return $this->db->insert('tb_owner',$data);
        }

        public function get_edit_owner($id_owner){
            return $this->db->where('id_owner',$id_owner)
                            ->from('tb_owner')
                            ->get()->result();
        }

        public function get_email_owner_edit($id_owner,$email_owner){
            return $this->db->where('email_owner',$email_owner)
                            ->where('id_owner !=',$id_owner)
                            ->where('deleted',0)
                            ->from('tb_owner')
                            ->get()->num_rows();
        }

        public function update_owner($id_owner,$data){
            return $this->db->where('id_owner',$id_owner)->update('tb_owner',$data);
        }

        public function get_list_staf(){
            return $this->db->where('deleted',0)
                            ->from('tb_staf')
                            ->get()->result();
        }

        public function get_email_staf($email_staf){
            return $this->db->where('deleted',0)
                            ->where('email_staf',$email_staf)
                            ->from('tb_staf')
                            ->get()->num_rows();
        }

        public function insert_staf($data){
            return $this->db->insert('tb_staf',$data);
        }
        
        public function get_edit_staf($id_staf){
            return $this->db->where('id_staf',$id_staf)
                            ->from('tb_staf')
                            ->get()->result();
        }

        public function get_edit_email_staf($id_staf,$email_staf){
            return $this->db->where('deleted',0)
                            ->where('id_staf !=',$id_staf)
                            ->where('email_staf',$email_staf)
                            ->from('tb_staf')
                            ->get()->num_rows();
        }

        public function update_staf($id_staf,$data){
            return $this->db->where('id_staf',$id_staf)->update('tb_staf',$data);
        }

        public function get_list_pelanggan(){
            return $this->db->where('deleted',0)
                            ->from('tb_pelanggan')
                            ->get()->result();
        }

        public function get_email_pelanggan($email_pelanggan){
            return $this->db->where('deleted',0)
                            ->where('email_pelanggan',$email_pelanggan)
                            ->from('tb_pelanggan')
                            ->get()->num_rows();
        }

        public function insert_pelanggan($data){
            return $this->db->insert('tb_pelanggan',$data);
        }

        public function get_edit_pelanggan($id_pelanggan){
            return $this->db->where('id_pelanggan',$id_pelanggan)
                            ->from('tb_pelanggan')
                            ->get()->result();
        }

        public function get_email_pelanggan_update($id_pelanggan,$email_pelanggan){
            return $this->db->where('deleted',0)
                            ->where('id_pelanggan !=',$id_pelanggan)
                            ->where('email_pelanggan',$email_pelanggan)
                            ->from('tb_pelanggan')
                            ->get()->num_rows();
        }

        public function update_pelanggan($id_pelanggan,$data){
            return $this->db->where('id_pelanggan',$id_pelanggan)->update('tb_pelanggan',$data);
        }

        public function get_jenis_laundry(){
            return $this->db->where('deleted',0)
                            ->from('tb_jenis_laundry')
                            ->get()->result();
        }

        public function get_nama_jenis_laundry($nama_jenis_laundry){
            return $this->db->where('deleted',0)
                            ->where('nama_jenis_laundry',$nama_jenis_laundry)
                            ->from('tb_jenis_laundry')
                            ->get()->result();
        }

        public function insert_jenis_laundry($data){
            return $this->db->insert('tb_jenis_laundry',$data);
        }

        public function get_edit_jenis_laundry($id_jenis_laundry){
            return $this->db->where('id_jenis_laundry',$id_jenis_laundry)
                            ->from('tb_jenis_laundry')
                            ->get()->result();
        }

        public function get_nama_jenis_laundry_edit($id_jenis_laundry,$nama_jenis_laundry){
            return $this->db->where('deleted',0)
                            ->where('id_jenis_laundry !=',$id_jenis_laundry)
                            ->where('nama_jenis_laundry',$nama_jenis_laundry)
                            ->from('tb_jenis_laundry')
                            ->get()->num_rows();
        }

        public function update_jenis_laundry($id_jenis_laundry,$data){
            return $this->db->where('id_jenis_laundry',$id_jenis_laundry)->update('tb_jenis_laundry',$data);
        }

        public function get_jenis_bayar(){
            return $this->db->where('deleted',0)
                            ->from('tb_jenis_bayar')
                            ->get()->result();
        }

        public function get_nama_jenis_bayar($nama_jenis_bayar){
            return $this->db->where('deleted',0)
                            ->where('nama_jenis_bayar',$nama_jenis_bayar)
                            ->from('tb_jenis_bayar')
                            ->get()->num_rows();
        }

        public function insert_jenis_bayar($data){
            return $this->db->insert('tb_jenis_bayar',$data);
        }

        public function get_edit_jenis_bayar($id_jenis_bayar){
            return $this->db->where('id_jenis_bayar',$id_jenis_bayar)
                            ->from('tb_jenis_bayar')
                            ->get()->result();
        }

        public function get_nama_jenis_bayar_edit($id_jenis_bayar,$nama_jenis_bayar){
            return $this->db->where('id_jenis_bayar !=',$id_jenis_bayar)
                            ->where('nama_jenis_bayar',$nama_jenis_bayar)
                            ->from('tb_jenis_bayar')
                            ->get()->num_rows();
        }

        public function update_jenis_bayar($id_jenis_bayar,$data){
            return $this->db->where('id_jenis_bayar',$id_jenis_bayar)->update('tb_jenis_bayar',$data);
        }

        public function get_data_transaksi(){
            return $this->db->where('a.deleted',0)
                            ->where('a.status_bayar','Belum Lunas')
                            ->select('a.*,b.*,c.*')
                            ->from('tb_transaksi a')
                            ->join('tb_pelanggan b','a.id_pelanggan = b.id_pelanggan','left')
                            ->join('tb_jenis_laundry c','a.id_jenis_laundry = c.id_jenis_laundry','left')
                            ->order_by('a.id_transaksi','ASC')
                            ->get()->result();
        }

        public function get_bayar_transaksi($id_transaksi){
            return $this->db->where('a.id_transaksi',$id_transaksi)
                            ->select('a.*,b.*,c.*')
                            ->from('tb_transaksi a')
                            ->join('tb_pelanggan b','a.id_pelanggan = b.id_pelanggan','left')
                            ->join('tb_jenis_laundry c','a.id_jenis_laundry = c.id_jenis_laundry','left')
                            ->order_by('a.id_transaksi','ASC')
                            ->get()->result();
        }

        public function get_no_pelanggan($no_telepon_pelanggan){
            return $this->db->where('deleted',0)
                            ->where('no_telepon_pelanggan',$no_telepon_pelanggan)
                            ->from('tb_pelanggan')
                            ->get()->result_array();
        }

        public function CreateCode(){
            $this->db->select('RIGHT(tb_transaksi.no_transaksi,5) as no_transaksi', FALSE);
            $this->db->order_by('id_transaksi','DESC');    
            $this->db->limit(1);    
            $query = $this->db->get('tb_transaksi');
                if($query->num_rows() <> 0){      
                     $data = $query->row();
                     $kode = intval($data->no_transaksi) + 1; 
                }
                else{      
                     $kode = 1;  
                }
            $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
            $kodetampil = "TR".$batas;
            return $kodetampil;  
        }

        public function insert_transaksi($data_transaksi){
            return $this->db->insert('tb_transaksi',$data_transaksi);
        }



        public function get_harga_paket($id_jenis_laundry){
            return $this->db->where('id_jenis_laundry',$id_jenis_laundry)
                            ->from('tb_jenis_laundry')
                            ->get()->result_array();
        }

        public function get_data_pembayaran($id_transaksi){
            return $this->db->where('id_transaksi',$id_transaksi)
                            ->from('tb_pembayaran')
                            ->limit(1)
                            ->get()->result();
        }
    }
?>