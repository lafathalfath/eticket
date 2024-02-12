<?php

class MasterPersonil extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function datapersonil()
    {
        // Content ( Folder => Files)
        $data = [
            'main_content' => 'masterdatapersonil/datapersonil',
            'personil' => $this->db->get_where('personil', ['id' => $this->session->id])->row_array()
        ];



        // Get Back Template
        $this->load->view('back_template/template', $data);
    }

    function datapegawai()
    {
        // Content ( Folder => Files)
        $data = [
            'main_content' => 'masterdatapersonil/datapegawai',
            'personil' => $this->db->get_where('personil', ['id' => $this->session->id])->row_array(),
        ];

        // Get Back Template
        $this->load->view('back_template/template', $data);
    }
}
