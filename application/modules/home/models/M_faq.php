<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_faq extends CI_Model
{

    protected $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'm_faq';
    }

    public function list_faq()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->limit(3);
        return $this->db->get()->result_array();
    }

    public function getAllFaq()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function cek_search($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->or_like('judul', $keyword);
        }
        return $this->db->get($this->table, $limit, $start)->result_array();
    }

    public function detail_search($uri)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id', $uri);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            $result = $query->row_array();
        else
            $result = array();

        return $result;
    }
}
