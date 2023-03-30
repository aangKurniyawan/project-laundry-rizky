<?php 
    class Model_login extends CI_Model{
        public function cek_admin($username,$password){
            $query = $this->db->query("SELECT * FROM tb_owner WHERE email_owner='$username' AND password_owner ='$password' AND deleted ='0' LIMIT 1");
            return $query;
        }

        public function cek_staf($username,$password){
            $query = $this->db->query("SELECT * FROM tb_staf WHERE email_staf ='$username' AND password_staf ='$password' AND deleted='0' LIMIT 1");
            return $query;
        }

        public function cek_member($username,$password){
            $query = $this->db->query("SELECT * FROM tb_pelanggan WHERE email_pelanggan ='$username' AND password_pelanggan ='$password' AND deleted='0' LIMIT 1");
            return $query;
        }

    }
?>