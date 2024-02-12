<?php

class Reporting extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function laporantiappersonil()
    {
        // Content ( Folder => Files)
        $data = [
            'main_content' => 'reporting/laporantiappersonil',
            'personil' => $this->db->get_where('personil', ['id' => $this->session->id])->row_array()
        ];



        // Get Back Template
        $this->load->view('back_template/template', $data);
    }

    function laporansmlit()
    {
        // Content ( Folder => Files)
        $data = [
            'main_content' => 'reporting/laporansmlit',
            'personil' => $this->db->get_where('personil', ['id' => $this->session->id])->row_array(),
        ];

        // Get Back Template
        $this->load->view('back_template/template', $data);
    }
}
