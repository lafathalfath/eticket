<?php

class Dashboard extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->functions->check_session();

        if ($this->session->logged_in) {
            if($this->session->sess != 'personil') {
                redirect('pengguna/dashboard');
            }
        }
    }

    function index()
    {
        // Content ( Folder => Files)
        $data = [
            'main_content' => 'dashboard/index',
            'personil'=>$this->db->get_where('personil',['id'=>$this->session->id])->row_array()];

        // Get Back Template
        $this->load->view('back_template/template', $data);

        var_export($this->session->id);
    }
}
