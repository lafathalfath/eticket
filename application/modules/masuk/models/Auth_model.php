<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	protected $table = 'pegawai';

	function cek_user($uid){
        $this->db->select('id, email, password, name, role_id, username, image')
        	->where('username', $uid)
        	->or_where('email', $uid);
            
        $query = $this->db->get($this->table);

        if($query->num_rows() > 0)
            $result = $query->row_array();
        else
            $result = array();

        return $result;
    }
	
	function cek_login($uid){
        $this->db->select('user_id, email, password, name, role_id, username, image')
        	->where('username', $uid)
        	->or_where('email', $uid);

            
        $query = $this->db->get($this->table);

        if($query->num_rows() > 0)
            $result = $query->row_array();
        else
            $result = array();

        return $result;
    }
	
	function cek_login2($table,$where){		
		return $this->db->get_where($table,$where);
	}	
	
}
