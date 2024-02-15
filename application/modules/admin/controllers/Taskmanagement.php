<?php

class Taskmanagement extends MX_Controller
{

    function __construct() {
        parent::__construct();
        $this->functions->check_session();
        $this->load->model('m_task', 'mdl');
        $this->load->library('datatables');

        date_default_timezone_set('Asia/Jakarta');

        // check sess type
        if ($this->session->logged_in) {
            if($this->session->sess != 'personil') {
                redirect('pengguna/dashboard');
            }
        }
    }

    function workload() {

        $data = [
            'main_content' => 'taskmanagement/workload',
            'personil'=>$this->db->get_where('personil',['id'=>$this->session->id])->row_array()
        ];
        

        #echo "<pre>"; print_r($data['l_workload']); die;

        // Get Back Template
        $this->load->view('back_template/template', $data);
    }

    public function dt_listingTicket() {
        if (!$this->input->is_ajax_request()) show_404();

        $detail_priv      = $this->input->post('detail_priv', TRUE);
        $arahkan_priv     = $this->input->post('arahkan_priv', TRUE);


        $detail_button = ($detail_priv == 1) ? '<a href="javascript:void(0)" data-id="$1" class="btn btn-success btn-sm mx-1 my-1 detail"><i class="icon-eye"></i> Detail</a>' : '';
        $arahkan_button = ($arahkan_priv == 1) ? '<a href="javascript:void(0)" data-id="$1" class="btn btn-info btn-sm mx-1 my-1 tugaskan"><i class="icon-pencil"></i> Assign</a>' : '';

        $this->datatables
            ->select('
            t.id as kode,
            s.status,
            CONCAT("#", t.id) as kode_ticket,
            t.title as judul_ticket,
            p.name as nama,
            t.created_at as tanggal_tiket
            ')
            ->from('ticket t')
            ->where('t.status_id', '1')
            ->join('m_status s', 't.status_id = s.id')
            ->join('pegawai p', 'p.id = t.pegawai_id');

        if (($detail_priv == 1) || ($arahkan_priv==1)) :
            $this->datatables->add_column('aksi', '' . $detail_button . $arahkan_button . '', 'encode(kode)');
        endif;

        $this->datatables->add_column('no', '');

        header('Content-Type: application/json');
        echo $this->datatables->generate();
    }

    public function dt_listPersonil() {
        if (!$this->input->is_ajax_request()) show_404();

        // check role and bidang kabid
        if($this->session->role_id == 2) {
            $bidangId = 1;
            $roleId = 4;
        } else if($this->session->role_id == 3) {
            $bidangId = 2;
            $roleId = 5;
        }

        $pilih_priv      = $this->input->post('pilih_priv', TRUE);
        $urgensi_priv      = $this->input->post('urgensi_priv', TRUE);

        $pilih_button = ($pilih_priv == 1) ? '<input type="radio" value="$1" data-id="$1" class="check-item check-personil" id="personil" name="personil" required>' : '';
        $urgensi_button = ($urgensi_priv == 1) ? '<select name="urgensi" id="urgensi" class="form-control select2"></select>' : '';

        $this->datatables
            ->select('pl.id as kode, pl.nama as nama')
            ->from('personil pl')
            ->where('bidang_id', $bidangId)
            ->where('role_id', $roleId);
            
        if ($pilih_priv == 1) :
            $this->datatables->add_column('pilih', $pilih_button, 'encode(kode)');
        endif;

        // if ($urgensi_priv == 1) :
        //     $this->datatables->add_column('urgensi', $urgensi_button, 'encode(kode)');
        // endif;

        $this->datatables->add_column('no', '');

        header('Content-Type: application/json');
        echo $this->datatables->generate();
    }


    public function get_arahkan() {
        if (!$this->input->is_ajax_request()) show_404();

        $id = decode(trim($this->input->post('id', true)));

        $cek = $this->db->select(
            't.id as id,
            p.name as nama,
            t.judul as judul,
            t.deskripsi_masalah as masalah,
            t.waktu_lapor as tanggal_tiket
            ')
            ->join('pegawai p', 'p.id = t.pegawai_id')
            ->get_where('ticket t', ['t.id' => $id]);

        if ($cek->num_rows() > 0) :
            $result['error'] = false;
            $result['data']  = $cek->row_array();
            $result['id']    = encode($result['data']['id']);

        else :
            $result['error']    = true;
            $result['message']  = 'Data detail tidak ditemukan';
        endif;

        header('Content-Type: application/json');
        echo json_encode($result);
    }

    public function arahkan() {
      if (!$this->input->is_ajax_request()) show_404();

      $id = decode(trim($this->input->post('id', true)));

      $this->db->select('id');
        $this->db->from('ticket');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if($query->num_rows()) {
            $new = $query->result_array();

            // $row= array('ticket_id'=>$ticket_id);
            foreach ($new as $row) {
                $this->db->insert("tr_ticket", $row);
            }
        }
    }

    public function save() {
        $this->load->library('form_validation');

        $kode           = decode(trim($this->input->post('id', true)));
        $ticketId       = decode(trim($this->input->post('ticket_id', true)));
        $personilId     = decode(trim($this->input->post('personil', true)));
        $urgensi        = trim($this->input->post('urgensi', true));
        // $kode        = $unit_kerja . '-' . $tgl;

        // Seyt Data
        $dataTrTicket = [
            'ticket_id'         => $ticketId,
            'personil_id'       => $personilId,
            'urgensi_id'        => $urgensi,
            'waktu_disposisi'   => date('Y-m-d H:i:s')
        ];

        $dataTicket = [
            'status_id' => '2',
            'modified_at' => date('Y-m-d H:i:s'),
        ];

        // Cek Tabel Tr
        $cek = $this->db->get_where('tr_ticket', ['id' => $kode])->num_rows();

        $this->db->trans_begin();

        if ($cek == 0) {
            if($this->mdl->save('tr_ticket', $dataTrTicket)) {
                $this->mdl->update('ticket', $dataTicket, ['id' => $ticketId]);
                $result = [
                    'success'   => true,
                    'message'   => 'Personil berhasil ditugaskan'
                ];
            } else {
                $result = [
                    'success'   => false,
                    'message'   => 'Personil gagal ditugaskan'
                ];
            }
        } else {
            $this->mdl->update('tr_ticket', $dataTrTicket, ['id' => $kode]);
        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $result['console_message']  = 'Data gagal disimpan [Rollback DB]';
        else :
            $this->db->trans_commit();
            $result['console_message']     = 'Data berhasil disimpan [Commit DB]';
        endif;

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($result));
    }

    public function getDetailTicket() {
        if (!$this->input->is_ajax_request()) show_404();

        $id         = decode(trim($this->input->post('id', true)));

        $cek        = $this->db
            ->select('t.*, p.name')
            ->join('pegawai p', 't.pegawai_id = p.id')
            ->get_where('ticket t', ['t.id' => $id]);

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

    public function dt_workload() {
        if (!$this->input->is_ajax_request()) show_404();

        // check role and bidang kabid
        if($this->session->role_id == 2) {
            $bidangId = 1;
            $roleId = 4;
        } else if($this->session->role_id == 3) {
            $bidangId = 2;
            $roleId = 5;
        }

        $detail_priv     = $this->input->post('detail_priv', TRUE);

        $detail_button = ($detail_priv == 1) ? '<a href="' . base_url("taskmanagement/detailworkload") . '?personilId=$1" data-id="$1" class="btn btn-success btn-sm detail"><i class="icon-eye"></i> Detail</a>' : '';
        $this->datatables->add_column('no', '');

        $this->datatables
            ->select('
            p.id as kode, p.nama,
            (SELECT COUNT(tr.personil_id)
                FROM tr_ticket tr
                INNER JOIN ticket t ON tr.ticket_id = t.id
                WHERE p.id = tr.personil_id AND t.status_id = 2 AND tr.urgensi_id = 1
            ) as workload_high,
            (SELECT COUNT(tr.personil_id) 
                FROM tr_ticket tr
                INNER JOIN ticket t ON tr.ticket_id = t.id
                WHERE p.id = tr.personil_id AND t.status_id = 2 AND tr.urgensi_id = 2
            ) as workload_normal,
            (SELECT COUNT(tr.personil_id) 
                FROM tr_ticket tr
                INNER JOIN ticket t ON tr.ticket_id = t.id
                WHERE p.id = tr.personil_id AND t.status_id = 2 AND tr.urgensi_id = 3
            ) as workload_low,
            (SELECT COUNT(tr.personil_id) 
                FROM tr_ticket tr
                INNER JOIN ticket t ON tr.ticket_id = t.id
                WHERE p.id = tr.personil_id AND t.status_id = 2
            ) as workload_progress,
            (SELECT COUNT(tr.personil_id)
                FROM tr_ticket tr
                INNER JOIN ticket t ON tr.ticket_id = t.id
                WHERE p.id = tr.personil_id AND t.status_id = 4
            ) as workload_finish
            ')
            ->from('personil p')
            ->where('p.role_id', $roleId)
            ->where('p.bidang_id', $bidangId);

        if ($detail_priv == 1) :
            $this->datatables->add_column('aksi', '' . $detail_button . '', 'encode(kode)');
        endif;

        header('Content-Type: application/json');
        echo $this->datatables->generate();
    }

    public function dt_detailWorkload() {
        if (!$this->input->is_ajax_request()) show_404();

        $detail_priv    = $this->input->post('detail_priv', TRUE);
        $statusId       = $this->input->post('statusId', TRUE);
        $personilId     = $this->input->post('personilId', TRUE);

        $detail_button = ($detail_priv == 1) ? '<a href="javascript:void(0)" data-id="$1" class="btn btn-success btn-sm mx-1 my-1 detail"><i class="fas fa-eye"></i> Detail</a>' : '';
        $this->datatables->add_column('no', '');

        $this->datatables
            ->select('t.id as kode, CONCAT("#", t.id) as kode_ticket, tr.waktu_disposisi, t.created_at as waktu_ticket, s.status, u.urgensi')
            ->from('personil p')
            ->join('tr_ticket tr', 'p.id = tr.personil_id')
            ->join('urgensi u', 'tr.urgensi_id = u.id')
            ->join('ticket t', 'tr.ticket_id = t.id')
            ->join('m_status s', 't.status_id = s.id')
            ->where('t.status_id', $statusId)
            ->where('tr.personil_id', $personilId);

        if ($detail_priv == 1) :
            $this->datatables->add_column('aksi', '' . $detail_button . '', 'encode(kode)');
        endif;

        header('Content-Type: application/json');
        echo $this->datatables->generate();
    }

    function detailworkload()
    {
        $personilId = $this->input->get('personilId');
        if (strlen($personilId) == 43) {
            $personilId = decode($personilId);
        }

        $check = $this->db->select('personil.nama, personil.id, role.role')->join('role', 'personil.role_id = role.id')->get_where('personil', ['personil.id' => $personilId]);

        $data = [
            'main_content' => 'taskmanagement/detailworkload',
            'personil'=>$this->db->get_where('personil',['id'=>$this->session->id])->row_array(),
            'personilData' => $check->row_array()
        ];

        if ($personilId != '') {
            if($check->num_rows() > 0) {
                $data['checkPersonil'] = true;
            } else {
                $data['checkPersonil'] = false;
            }
        } else {
            $data['checkPersonil'] = false;
        }

        // Get Back Template
        $this->load->view('back_template/template', $data);
    }

    function detailworkloadtask()
    {
        // Content ( Folder => Files)
        $data = [
            'main_content' => 'taskmanagement/detailworkloadtask',
            'personil'=>$this->db->get_where('personil',['id'=>$this->session->id])->row_array()
        ];

        // Get Back Template
        $this->load->view('back_template/template', $data);
    }

    function arahkanlaporan()
    {
        // Content ( Folder => Files)
        $data = [
            'main_content' => 'taskmanagement/arahkanlaporan',
            'personil' => $this->db->get_where('personil',['id'=>$this->session->id])->row_array(),
            'l_urgensi' => $this->mdl->get_list_urgensi(),
            'l_personil' => $this->mdl->get_list_personil()
        ];

        // Get Back Template
        $this->load->view('back_template/template', $data);
    }

    public function getUrgensi() {        
        if(!$this->input->is_ajax_request()) show_404();

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($this->mdl->get_list_urgensi()));
    }
}
