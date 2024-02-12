<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_task extends CI_Model
{

    protected $table;

    function __construct()
    {
        parent::__construct();
        $this->table = 'tr_ticket';
    }

    function save($table, $data)
    {
        $this->db->insert($table, $data);
        return true;
    }

    function update($table, $data, $key)
    {
        $this->db->update($table, $data, $key);
    }

    function destroy($key)
    {
        $this->db->delete($this->table, $key);
    }

    function get_list_personil()
    {
        return $this->db
            ->select('id, nama')
            ->get_where('personil', ['id >=' => '4'])
            ->result_array();
    }

    function get_list_urgensi() {
        return $this->db->select('id, urgensi')->get('urgensi')->result_array();
    }

    function getWorkload() {
        $query = 
        "SELECT p.nama,
            (SELECT COUNT(tr.personil_id) 
                FROM tr_ticket tr
                WHERE p.id = tr.personil_id
            ) as workload
        FROM personil p
        WHERE p.role_id >= 4";
        return $this->db->query($query);        
    }
}
