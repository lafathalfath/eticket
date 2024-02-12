<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_list extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function find($id)
	{
		return $this->db
			->select(['tr.id', 'tr.ticket_id', 't.title', 't.description'])
			->where('tr.id', $id)
			->join('ticket t', 't.id = tr.ticket_id')
			->get('tr_ticket tr')->row();
	}

	function findAnswer($trTicketId)
	{
		return $this->db
			->select(['tr.*', 'j.jawab'])
			->where('tr.tickettr_id', $trTicketId)
			->join('m_jawab j', 'j.id = tr.jawaban_id', 'LEFT')
			->order_by('id', 'desc') // get latest answer
			->get('tr_jawaban tr')
			->row();
	}

	function findAnswerTemplate($trTicketId)
	{
		return $this->db
			->select(['tr.*', 'f.judul', 'f.isi'])
			->where('tr.tickettr_id', $trTicketId)
			->join('m_faq f', 'f.id = tr.faq_id', 'LEFT')
			->order_by('id', 'desc') // get latest answer
			->get('tr_jawaban tr')
			->row();
	}

    function save($table, $data, $get_id = false)
    {
        $this->db->insert($table, $data);

        if ($get_id) :
			return $this->db->insert_id();
        endif;

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
}
