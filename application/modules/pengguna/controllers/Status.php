<?php

class Status extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_layanan', 'mdl');        
        $this->functions->check_session_pegawai();
        $this->load->library('datatables');
        date_default_timezone_set("Asia/Jakarta");

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
    }
    
    function index() {
        if ($this->session->logged_in) {
            if($this->session->sess != 'pegawai') {
                redirect('dashboard');
            }
        }
        
        
        $data = [
            'main_content' => 'v_status',
            'page_title' => 'Status',
            'user' => $this->mdl->getWhere('pegawai', ['email' => $this->session->email])->row_array(),
            'sapa' => $this->functions->greeting(),
            'scripts' => ['status.js'],
            // 'styles' => ['wizard.css']
        ];
        
        $this->load->view('user_template/template', $data);
    }
    
    public function dt_statusTicket() {
        if (!$this->input->is_ajax_request()) show_404();

        $detail_priv    = $this->input->post('detail_priv', TRUE);
        $statusId       = $this->input->post('statusId', TRUE);

        $detail_button      = ($detail_priv == 1) ? '<a href="javascript:void(0)" data-id="$1" class="btn btn-success btn-sm detail"><i class="fas fa-info-circle"></i> Lihat</a>' : '';
        
        $this->datatables
            ->select('t.id as kode, (CASE WHEN tl.jenis_layanan_id IS NULL THEN "Permintaan" ELSE "Lapor" END) as jenisTicket, CONCAT("#", t.id) as kodeTicket, t.title as judul, t.created_at as tgl, t.lama_pengerjaan as lama_pengerjaan, s.status, s.keterangan')
            ->from('ticket t')
            ->join('m_status s', 't.status_id = s.id')
            ->join('tr_layanan tl', 't.id = tl.ticket_id', 'left')            
            ->where('t.pegawai_id', $this->session->id);
        
        if ($statusId !== '0') $this->datatables->where('t.status_id', $statusId);

        if ($detail_priv == 1) :
            $this->datatables->add_column('aksi', $detail_button, 'encode(kode)');
        endif;

        $this->datatables->add_column('no', '');

        header('Content-Type: application/json');
        echo $this->datatables->generate();
    }

    function detail() {
        $ticketId = $this->input->get('ticketId');
        if (strlen($ticketId) == 43) {
            $ticketId = decode($ticketId);
        }
        
        $checkTicket = $this->mdl->getWhere('ticket', ['id' => $ticketId, 'pegawai_id' => $this->session->id]);
        
        $dataTicket = $this->db
        ->select("
        t.id as ticket,
        CONCAT('#', t.id) as kodeTicket, 
        t.description,
        t.title, (CASE WHEN tl.jenis_layanan_id IS NULL THEN 'Permintaan' ELSE 'Lapor' END) as jenisTicket
        ")
        ->from('ticket t')
        ->join('tr_layanan tl', 't.id = tl.ticket_id')
        ->where('t.id', $ticketId)
        ->where('t.pegawai_id', $this->session->id)->get();
        
        // var_export($dataTicket->row_array());
        // die;

        $dataResponse = $this->db
            ->select("
                tj.jawaban_id, j.jawab,
                f.judul as judulFaq, f.isi as isiFaq
                ")
            ->from('tr_ticket tr')
            ->join('tr_jawaban tj', 'tr.id = tj.tickettr_id')
            ->join('m_jawab j', 'tj.jawaban_id = j.id', 'LEFT')
            ->join('m_faq f', 'tj.faq_id = f.id', 'LEFT')
            ->where('tr.ticket_id', $ticketId)
            ->get();

        $dataAttachment = $this->db
            ->select("
                tra.path_attachment,
                tra.detail_attachment
                ")
            ->from('tr_ticket_attachment tra')
            ->where('tra.ticket_id', $ticketId)
            ->get();

        $statusTicket = $this->db
            ->select("
                t.status_id,
                ")
            ->from('ticket t')
            ->join('m_status s', 't.status_id = s.id')
            ->where('t.id', $ticketId)
            ->get();
            
        $ticketChat = $this->db->get_where('ticket_chat', ['ticket_id'=>$ticketId]);

        $data = [
            'main_content' => 'v_statusDetail',
            'page_title' => 'Status Detail',
            'user' => $this->mdl->getWhere('pegawai', ['email' => $this->session->email])->row_array(),
            'sapa' => $this->functions->greeting(),
            'scripts' => ['statusDetail.js'],
            // 'styles' => ['wizard.css']
            'statusTicket' => $statusTicket->row_array(),
            'dataTicket' => $dataTicket->row_array(),
            'dataResponse' => $dataResponse->row_array(),
            'dataAttachment' => $dataAttachment->result_array(),
            'ticketChat' => $ticketChat->result_array(),
        ];

        if ($ticketId != '') {
            if($checkTicket->num_rows() > 0) {
                $data['checkTicket'] = true;
            } else {
                $data['checkTicket'] = false;
            }
        } else {
            $data['checkTicket'] = false;
        }

        // Get Back Template
        $this->load->view('user_template/template', $data);
    }

    function closed() {
		$table = 'ticket';
		$id = $this->input->post('ticketId');
		
		$check = $this->mdl->getWhere($table, ['id' => $id]);
	
		$this->db->trans_begin();
	
		$data = [
			'lama_pengerjaan' => 0, // Default value
			'status_id' => 4,
            'modified_at' => date('Y-m-d H:i:s'),
		];
	
		if ($check->num_rows() > 0) {
			$ticket = $check->row();
			$data['lama_pengerjaan'] = selisihWaktu($ticket->created_at, date('Y-m-d H:i:s'))['totalSelisih'];
		}
	
		$result = [
			'success' => false,
			'message' => 'Gagal menutup tiket.'
		];
	
		if ($this->mdl->update($table, $data, ['id' => $id])) {
			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$result['console_message'] = 'Data gagal disimpan [Rollback DB]';
			} else {
				$this->db->trans_commit();
				$result['success'] = true;
				$result['message'] = 'Tiket berhasil ditutup.';
	
				if ($check->num_rows() == 0) {
					$result['message'] .= ' Tiket baru telah dibuat.';
				}
	
				$result['console_message'] = 'Data berhasil disimpan [Commit DB]';
			}
		}
	
		return $this->output
			->set_content_type('application/json')
			->set_status_header(200)
			->set_output(json_encode($result));
	}

    function ongoing()
    {
        $table = 'ticket';

        $id = $this->input->post('ticketId');        
        
        $check = $this->mdl->getWhere($table, ['id' => $id]);
        $getTrTicket = $this->mdl->getWhere('tr_ticket', ['ticket_id' => $id])->row_array();


        $this->db->trans_begin();

        $data = [
            'status_id' => 2,
        ];

        if ($check->num_rows() > 0) :
            // $data['mtime'] = date('Y-m-d H:i:s');
            $this->mdl->update($table, $data, ['id' => $id]);
            $this->mdl->destroy('tr_jawaban', ['tickettr_id' => $getTrTicket['id']]);
            
            $result = [
                'success'   => true,
                'message'   => 'Status berhasil diubah menjadi Ongoing, Tim akan segera memberikan jawaban lain perihal kebutuhan anda'
            ];
        else :
            // $this->mdl->save($table, $data);

            $result = [
                'success'   => true,
                'message'   => 'Ticket berhasil ditutup, terimakasih telah menggunakan layanan eTicketing'
            ];

        endif;

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $result['console_message'] = 'Data gagal disimpan [Rollback DB]';
        else :
            $this->db->trans_commit();
            $result['console_message'] = 'Data berhasil disimpan [Commit DB]';
        endif;

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($result));
    }

    function storeTicketChat() {
        if (!$this->input->is_ajax_request()) show_404();
        
        $data = [
            'role_id' => intval($this->session->userdata['role_id']),
            'ticket_id' => $this->input->post('ticket_id'),
            'pegawai_id' => intval($this->session->userdata['id']),
            'pesan' => trim($this->input->post('pesan')),
            'tanggal' => date('Y-m-d H:i:s'),
        ];
        if ($data['pesan'] == null || $data['pesan'] == '') {
            var_export('Tidak Ada Pesan!');
        }elseif ($data['role_id']==null||$data['ticket_id']==null||$data['pegawai_id']==null||$data['tanggal']==null) {
            var_export('Terjadi Kesalahan!');
        }elseif ($this->input->post('status_ticket') == 4){
            var_export('Tiket telah ditutup');
        }else{
            $this->mdl->save('ticket_chat', $data);
        }
    }
}