<?php

class Listlaporan extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->functions->check_session();
        $this->load->model('m_list', 'mdl');
        $this->load->library('datatables');

        date_default_timezone_set('Asia/Jakarta');

		function selisihWaktu($mulai, $akhir) {
            $interval = strtotime($akhir) - strtotime($mulai);
            $jam = floor($interval / 3600);
            $menit = floor(($interval % 3600) / 60);
            $detik = $interval % 60;
            $totalInterval = sprintf('%02d:%02d:%02d', $jam, $menit, $detik);
            return [
                'totalSelisih' => $totalInterval,
                'jam' => intval($jam),
                'menit' => intval($menit),
                'detik' => intval($menit),
            ];
        }

        function selisihHari($mulai, $akhir){
            $waktu1_str = date_create(substr($mulai, 0, 10));
            $waktu2_str = date_create(substr($akhir, 0, 10));
            $waktu1 = new DateTime(date_format($waktu1_str, 'Y-m-d H:i:s'));
            $waktu2 = new DateTime(date_format($waktu2_str, 'Y-m-d H:i:s'));

            $interval = $waktu1->diff($waktu2);
            return $interval->days;
        }
    }

    function index()
    {
        // Content ( Folder => Files)
        $data = [
            'main_content' => 'listlaporan/index',
            'personil'=>$this->db->get_where('personil',['id'=>$this->session->id])->row_array()
        ];
		// var_export($data['personil']);
		// die;

        // Get Back Template
        $this->load->view('back_template/template', $data);
    }

    public function dt_listLaporan()
    {
        if (!$this->input->is_ajax_request()) show_404();

        $template_priv  = $this->input->post('template_priv', TRUE);
        $jawab_priv     = $this->input->post('jawab_priv', TRUE);
        $detail_priv    = $this->input->post('detail_priv', TRUE);
        $statusId       = $this->input->post('statusId', TRUE);

        $template_button    = ($template_priv == 1) ? '<a href="javascript:void(0)" data-id="$1" class="dropdown-item btn-template"><i class="icon-book"></i>Balas Dengan Template</a><li>' : '';
        $jawab_button       = ($jawab_priv == 1) ? '<a href="javascript:void(0)" data-id="$1" class="dropdown-item btn-jawab"><i class="icon-pencil"></i>Ketik Jawaban</a><li>' : '';
        $detail_button      = ($detail_priv == 1) ? '<a href="javascript:void(0)" data-id="$1" class="dropdown-item btn-detail"><i class="icon-eye"></i>Detail</a><li>' : '';
        $this->datatables->add_column('no', '');

        $this->datatables
            ->select('
            	tr.id as id,
            	l.jenis_layanan_id,
                t.id as kode, CONCAT("#", t.id) as kodeTicket,
                p.name as pemohon, t.title as judul,
                s.status, u.urgensi,
                j.id as jawaban_id,
                t.created_at as waktuPermohonan,
                tr.waktu_disposisi as waktuDisposisi
            ')
            ->from('tr_ticket tr')
            ->join('ticket t', 'tr.ticket_id = t.id')
            ->join('tr_jawaban j', 'j.tickettr_id = tr.id', 'LEFT')
            ->join('tr_layanan l', 'l.ticket_id = t.id', 'LEFT')
            ->join('pegawai p', 't.pegawai_id = p.id')
            ->join('urgensi u', 'tr.urgensi_id = u.id')
            ->join('m_status s', 't.status_id = s.id')
            ->where('tr.personil_id', $this->session->id);

        if (($template_priv == 1) || ($jawab_priv == 1) || ($detail_priv == 1)) :
            $this->datatables->add_column('aksi', '<div class="list-icons"><div class="dropdown"><a href="javascript:void(0)" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu9"></i></a><div class="dropdown-menu dropdown-menu-right">' . $template_button . $jawab_button . $detail_button . '</div></div></div>', 'encode(id)');
        endif;

        header('Content-Type: application/json');
        echo $this->datatables->generate();
    }

	public function dt_listFaq() {
		if (!$this->input->is_ajax_request()) show_404();

		$pilih_priv      = $this->input->post('pilih_priv', TRUE);
		$pilih_button = ($pilih_priv == 1) ? '<input type="radio" value="$1" data-id="$1" class="check-item check-faq" name="faq_id" required>' : '';

		$this->datatables
			->select('f.id, f.judul, f.isi')
			->from('m_faq f')
		;

		// USE THIS IF FAQ TRACKS TO MASALAH
		//$this->datatables
		//	->select(['f.id', 'm.masalah', 'f.judul', 'f.isi'])
		//	->from('m_faq f')
		//	->join('tr_faq tr_f', 'tr_f.faq_id = f.id', 'LEFT')
		//	->join('tr_masalah tr_m', 'tr_m.id = tr_f.tr_masalah_id', 'LEFT')
		//	->join('m_masalah m', 'm.id = tr_m.masalah_id', 'LEFT')
		//;

		if ($pilih_priv == 1) :
			$this->datatables->add_column('pilih', $pilih_button, 'encode(id)');
		endif;

		$this->datatables->add_column('no', '');

		header('Content-Type: application/json');
		echo $this->datatables->generate();
	}

    public function ketikjawaban()
    {

    	$trTicketId = decode($this->input->get('ticketId'));
		$ticketId = $this->db
			->get_where('tr_ticket', ['id' => $trTicketId])
			->row_array()['ticket_id'];

    	$personil = $this->db->get_where('personil',['id'=>$this->session->id])->row_array();
		$trTicket = $this->mdl->find($trTicketId);
		if (empty($trTicket)) {
			// Content ( Folder => Files)
			$data = [
				'main_content' => 'listlaporan/ketikjawaban',
				'personil' => $personil
			];

			// Get Back Template
			return $this->load->view('back_template/template', $data);
		}

    	if ($this->input->method() === 'post') :

    		$validate = $this->form_validation;
			$rules = [
				[
					'field' => 'text',
					'label' => 'Jawaban',
					'rules' => 'required'
				],
			];
			$this->functions->alert($validate);
			$validate->set_rules($rules);
			if ($validate->run() == false) :

				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.
					validation_errors().'</div>');

		 	else :

				$this->db->trans_begin();
				$dataJawaban = [
					'jawab' => $this->input->post('text'),
				];

				// SAVE MASTER JAWABAN
				$jawabanId = $this->mdl->save('m_jawab', $dataJawaban, true);

				// SET ANSWERED DATA ON JAWABAN_ID
				$dataTrJawaban = [
					'tickettr_id' => $trTicketId,
					'jawaban_id' => $jawabanId,
					'waktu_jawab' => date('Y-m-d H:i:s'),
				];
				$this->mdl->save('tr_jawaban', $dataTrJawaban);

				// CHANGE STATUS TO ANSWERED
				$this->mdl->update('ticket', [
					'modified_at' => date('Y-m-d H:i:s'),
					'status_id' => 3
				], ['id' => $trTicket->ticket_id]);

				if ($this->db->trans_status() === FALSE) :
					$this->db->trans_rollback();
					$result['console_message']  = 'Data gagal disimpan [Rollback DB]';
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Jawaban gagal dibuat</div>');
				else :
					$this->db->trans_commit();
					$result['console_message']  = 'Data berhasil disimpan [Commit DB]';
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						Jawaban berhasil dibuat</div>');
				endif;

			endif;
		endif;

		$ticketChat = $this->db
			->select('*')
			->from('ticket_chat')
			->where('ticket_id', $ticketId)
			->get()
			->result_array();
		$ticketStatus = $this->db
			->get_where('ticket', ['id' => $ticketId])
			->row_array()['status_id'];

        // Content ( Folder => Files)
        $data = [
            'main_content' => 'listlaporan/ketikjawaban',
            'personil'=> $personil,
			'trTicket' => $trTicket,
			'ticketAttachment' => $this->db->get_where('tr_ticket_attachment', ['ticket_id' => $trTicket->ticket_id])->result(),
			'trJawaban' => $this->mdl->findAnswer($trTicketId),
			'ticketId' => $ticketId,
			'ticketChat' => $ticketChat,
			'ticketStatus' => $ticketStatus,
		];
		
        // Get Back Template
        $this->load->view('back_template/template', $data);
    }

	public function templatejawaban()
    {
		$trTicketId = decode($this->input->get('ticketId'));

		$personil = $this->db->get_where('personil',['id'=>$this->session->id])->row_array();
		$trTicket = $this->mdl->find($trTicketId);
		if (empty($trTicket)) {
			// Content ( Folder => Files)
			$data = [
				'main_content' => 'listlaporan/templatejawaban',
				'personil' => $personil
			];

			// Get Back Template
			return $this->load->view('back_template/template', $data);
		}

		if ($this->input->method() === 'post') :

			$validate = $this->form_validation;
			$rules = [
				[
					'field' => 'faq_id',
					'label' => 'FAQ',
					'rules' => 'required'
				],
			];
			$this->functions->alert($validate);
			$validate->set_rules($rules);
			if ($validate->run() == false) :

				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.
					validation_errors().'</div>');

			else :

				$this->db->trans_begin();

				// SET ANSWERED DATA ON FAQ_ID
				$dataTrJawaban = [
					'tickettr_id' => $trTicketId,
					'faq_id' => decode($this->input->post('faq_id')),
					'waktu_jawab' => date('Y-m-d H:i:s'),
				];
				$this->mdl->save('tr_jawaban', $dataTrJawaban);

				// CHANGE STATUS TO ANSWERED
				$this->mdl->update('ticket', [
					'modified_at' => date('Y-m-d H:i:s'),
					'status_id' => 3
				], ['id' => $trTicket->ticket_id]);

				if ($this->db->trans_status() === FALSE) :
					$this->db->trans_rollback();
					$result['console_message']  = 'Data gagal disimpan [Rollback DB]';
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Jawaban gagal dibuat</div>');
				else :
					$this->db->trans_commit();
					$result['console_message']  = 'Data berhasil disimpan [Commit DB]';
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						Jawaban berhasil dibuat</div>');
				endif;

			endif;
		endif;

        // Content ( Folder => Files)
        $data = [
            'main_content' => 'listlaporan/templatejawaban',
			'personil'=> $personil,
			'trTicket' => $trTicket,
			'ticketAttachment' => $this->db->get_where('tr_ticket_attachment', ['ticket_id' => $trTicket->ticket_id])->result(),
			'trJawaban' => $this->mdl->findAnswerTemplate($trTicketId)
        ];

        // Get Back Template
        $this->load->view('back_template/template', $data);
    }

	public function getDetailTicket() {

    	if (!$this->input->is_ajax_request()) show_404();

		$id         = decode($this->input->post('id'));

		$cek        = $this->db
			->select('t.*, p.name, p.nomor_telepon')
			->join('ticket t', 't.id = tr.ticket_id', 'LEFT')
			->join('pegawai p', 't.pegawai_id = p.id')
			->get_where('tr_ticket tr', ['tr.id' => $id]);

		if ($cek->num_rows() > 0) :
			$result['success'] = true;
			$result['data']  = $cek->row_array();
			$result['id']    = '#' . $result['data']['id'];
		else :
			$result['success']    = false;
			$result['message']  = 'Data tidak dapat ditemukan';
		endif;

		header('Content-Type: application/json');
		echo json_encode($result);
	}

}
