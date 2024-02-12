<?php

class Dashboard extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_layanan', 'mdl');        
        $this->functions->check_session_pegawai();
        $this->load->library('datatables');
        date_default_timezone_set("Asia/Jakarta");
    }

    function index() {
        if ($this->session->logged_in) {
            if($this->session->sess != 'pegawai') {
                redirect('dashboard');
            }
        }

        $data = [
            'main_content' => 'v_dashboard',
            'page_title' => 'Dashboard',
            'user' => $this->mdl->getWhere('pegawai', ['email' => $this->session->email])->row_array(),
            'sapa' => $this->functions->greeting(),
            'scripts' => ['dashboard.js'],
            'styles' => ['dashboard.css'],
            'ticketOpen' => $this->mdl->getWhere('ticket', ['status_id' => 1, 'pegawai_id' => $this->session->id])->num_rows(),
            'ticketOngoing' => $this->mdl->getWhere('ticket', ['status_id' => 2, 'pegawai_id' => $this->session->id])->num_rows(),
            'ticketClosed' => $this->mdl->getWhere('ticket', ['status_id' => 3, 'pegawai_id' => $this->session->id])->num_rows(),
            'totalTicket' => $this->mdl->getWhere('ticket', ['pegawai_id' => $this->session->id])->num_rows()
        ];

        $this->load->view('user_template/template', $data);
    }

    public function dt_statusTicket() {
        if (!$this->input->is_ajax_request()) show_404();

        $detail_priv    = $this->input->post('detail_priv', TRUE);
        $statusId       = $this->input->post('statusId', TRUE);

        $detail_button      = ($detail_priv == 1) ? '<a href="javascript:void(0)" data-id="$1" class="dropdown-item detail"><i class="icon-eye"></i>Detail</a><li>' : '';
        
        $this->datatables
            ->select('t.id as kode, CONCAT("#", t.id) as kodeTicket, t.title as judul, t.created_at as tgl, s.status, s.keterangan')
            ->from('ticket t')
            ->join('m_status s', 't.status_id = s.id')
            ->where('t.status_id', $statusId)
            ->where('t.pegawai_id', $this->session->id);

        if ($detail_priv == 1) :
            $this->datatables->add_column('aksi', '<div class="list-icons"><div class="dropdown"><a href="javascript:void(0)" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu9"></i></a><div class="dropdown-menu dropdown-menu-right">' .  $detail_button . '</div></div></div>', 'encode(kode)');
        endif;

        $this->datatables->add_column('no', '');

        header('Content-Type: application/json');
        echo $this->datatables->generate();
    }

    public function getStatusList() {
        if(!$this->input->is_ajax_request()) show_404();

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($this->mdl->getAll('m_status')->result_array()));
    }
}
