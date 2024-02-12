<?php

class Faq extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_faq');
        $this->load->library('pagination');
    }

    function index()
    {
        // Content ( Folder => Files)
        $data = [
            'main_content' => 'faq/faq_search',
            'faq' => $this->m_faq->list_faq(),
        ];

        // Get Front Template
        $this->load->view('front_template/template', $data);
    }

    function faqresult()
    {

        if ($this->input->post('faqsearch')) {
            $data['keyword'] =  htmlspecialchars($this->input->post('faqsearch'));
            $this->session->set_userdata('keyword', $data['keyword']);
        } else if ($this->input->post('faqsearch') == "") {
            $data['keyword'] = "";
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // config
        $this->db->like('judul', $data['keyword']);
        $this->db->from('m_faq');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 4;
        $config['num_links'] = 1;
        $config['base_url'] = 'http://localhost/e-ticketingApps/faqresult';

        // Styling pagination
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-end">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        // initialize
        $this->pagination->initialize($config);

        // Content ( Folder => Files)
        $data['start'] = $this->uri->segment('2');
        $data['search'] = $this->m_faq->cek_search($config['per_page'], $data['start'], $data['keyword']);
        $data['main_content'] = 'faq/faq_result';
        $data['result_search'] = htmlspecialchars($this->input->post('faqsearch'));

        // $data = [
        // 'main_content' => 'faq/faq_result',
        // 'result_search' => htmlspecialchars($this->input->post('faqsearch')),
        // ];

        // Get Front Template
        $this->load->view('front_template/template', $data);
    }

    function faqanswer()
    {
        // Content ( Folder => Files)
        $uri = $this->uri->segment('2');

        $data = [
            'main_content' => 'faq/faq_answer',
            'result' => $this->m_faq->detail_search($uri),
        ];

        // Get Front Template
        $this->load->view('front_template/template', $data);
    }
}
