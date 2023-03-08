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
    }
?>