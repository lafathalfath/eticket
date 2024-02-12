<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_faq extends CI_Model
{

    protected $table;

    function __construct()
    {
        parent::__construct();
        $this->table = 'm_faq';
    }

    function save($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function update($table, $data, $key)
    {
        $this->db->update($table, $data, $key);
    }

    function destroy($key)
    {
        $this->db->delete($this->table, $key);
    }
}
