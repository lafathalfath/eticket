<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_layanan extends CI_Model
{
    function save($table, $data, $last_id = false)
    {
        // $tabel = ($table == null) ? $this->table : $table;
        $this->db->insert($table, $data);

        if ($last_id) {
            return $this->db->insert_id();
        }
    }

    function saveBatch($table, $data){
        $this->db->insert_batch($table, $data);
    }

    function destroy($table, $key)
    {
        return $this->db->delete($table, $key);
    }

    function update($table, $data, $key)
    {
        return $this->db->update($table, $data, $key);
    }

    public function getAll($table) {
        return $this->db->get($table);
    }

    public function getWhere($table, $where) {
        return $this->db->get_where($table, $where);
    }
    
    public function fetch($select, $table, $where, $group_by, $table1, $join1, $type1 = NULL, $table2, $join2, $type2 = NULL, $table3 = NULL, $join3 = NULL, $type3 = NULL) {
        if ($select !== NULL) {
            $this->db->select($select);
        }

        if ($table1 !== NULL) {
            $this->db->join($table1, $join1, $type1);
        }

        if ($table2 !== NULL) {
            $this->db->join($table2, $join2, $type2);
        }

        if ($table3 !== NULL) {
            $this->db->join($table3, $join3, $type3);
        }

        if ($group_by !== NULL) {
            $this->db->group_by($group_by);
        }

        if ($where !== NULL) {
            $this->db->where($where);
        }

        return $this->db->get($table);
    }

    public function getMasalah() {
        $this->db->select('tm.id, tm.jenis_layanan_id, jl.jenis_layanan, m.masalah');
        $this->db->join('tr_masalah tm', 'm.id = tm.masalah_id');
        $this->db->join('m_jenis_layanan jl', 'tm.jenis_layanan_id = jl.id');
        // $this->db->join('m_sub_layanan sl', 'tm.sub_layanan_id = sl.id', 'left');
        return $this->db->get('m_masalah m');
    }

    public function getFaq() {
        $this->db->select('tf.id, f.judul, f.isi, f.created_by, f.mtime, tf.tr_masalah_id');
        $this->db->join('tr_faq tf', 'f.id = tf.faq_id');
        $this->db->join('tr_masalah tm', 'tf.tr_masalah_id = tm.id');
        return $this->db->get('m_faq f');
    }

    public function getTemp() {
        $this->db->join('tr_masalah tm', 'm.id = tm.masalah_id');
        $this->db->join('m_jenis_layanan jl', 'tm.jenis_layanan_id = jl.id');
        $this->db->join('tr_faq tf', 'tm.id = tf.tr_masalah_id');
        $this->db->join('m_faq f', 'tf.faq_id = f.id');
        return $this->db->get('m_masalah m');
    }

    public function generateLayanan() {
        $this->db
            ->select('mk.id as kode_klasifikasi, mk.judul_klasifikasi, mkl.kategori_layanan')
            ->from('m_klasifikasi mk')
            ->join('m_kategori_layanan mkl', 'mk.id = mkl.klasifikasi_id');
        return $this->db->get();
    }

    public function renderData($where) {
        $this->db
            ->select('mk.id as kode_klasifikasi, mk.judul_klasifikasi, mkl.kategori_layanan')
            ->from('m_klasifikasi mk')
            ->where($where)
            ->join('m_kategori_layanan mkl', 'mk.id = mkl.klasifikasi_id');
        return $this->db->get();
    }
}