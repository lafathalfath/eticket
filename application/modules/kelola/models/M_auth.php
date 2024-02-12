<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{

    protected $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'personil';
    }

    public function cek_login($user)
    {
        $this->db->select('id,nama,username,password,role_id');
        $query = $this->db->get_where($this->table, array('username' => $user));

        if ($query->num_rows() > 0)
            $result = $query->row_array();
        else
            $result = array();

        return $result;
    }
}
