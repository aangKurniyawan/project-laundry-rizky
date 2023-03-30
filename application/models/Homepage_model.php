<?php 
    class Homepage_model extends CI_Model{
        public function get_data_jenis_laundry(){
            return $this->db->where('deleted',0)
                            ->from('tb_jenis_laundry')
                            ->get()->result();
        }

        public function get_detail_produk($id_jenis_laundry){
            return $this->db->where('id_jenis_laundry',$id_jenis_laundry)
                            ->from('tb_jenis_laundry')
                            ->get()->result();
        }

        public function get_transaksi_member($id_pelanggan){
            return $this->db->where('a.deleted',0)
                            ->where('a.id_pelanggan',$id_pelanggan)
                            ->select('a.*,b.*,c.*')
                            ->from('tb_transaksi a')
                            ->join('tb_pelanggan b','a.id_pelanggan = b.id_pelanggan','left')
                            ->join('tb_jenis_laundry c','a.id_jenis_laundry = c.id_jenis_laundry','left')
                            ->order_by('a.id_transaksi','DESC')
                            ->limit(5)
                            ->get()->result();
        }

        public function get_detail_transaksi_member($no_transaksi){
            return $this->db->where('a.deleted',0)
                            ->where('a.no_transaksi',$no_transaksi)
                            ->select('a.*,b.*,c.*')
                            ->from('tb_transaksi a')
                            ->join('tb_pelanggan b','a.id_pelanggan = b.id_pelanggan','left')
                            ->join('tb_jenis_laundry c','a.id_jenis_laundry = c.id_jenis_laundry','left')
                            ->order_by('a.id_transaksi','DESC')
                            ->limit(1)
                            ->get()->result();
        }
    }