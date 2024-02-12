<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_layanan', 'mdl');
        $this->functions->check_session_pegawai();
        date_default_timezone_set("Asia/Jakarta");
    }

    function index() {
        $data = [
            'main_content' => 'v_wizard',
            'page_title' => 'Layanan',
            'scripts' => ['layanan.js'],
            'styles' => ['wizard.css']
        ];

        #echo "<pre>";print_r($data['scripts']);die;

        $this->load->view('user_template/template', $data);
    }

    public function generateLayanan(){
        if (!$this->input->is_ajax_request()) show_404();

        $getLayanan = $this->mdl->getAll('m_klasifikasi')->result_array();

        $data = [
            'dataLayanan' => $getLayanan
        ];

        var_dump('PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP');
        $this->load->view('wizard/w_klasifikasiLayanan', $data);
    }

    public function generateKategoriLayanan(){
        if (!$this->input->is_ajax_request()) show_404();

        $klasifikasiId = $this->input->post('id');

        $where = [
            'klasifikasi_id' => $klasifikasiId,
            'is_active' => 1
        ];

        $getKategoriLayanan = $this->mdl->getWhere('m_kategori_layanan', $where);

        $data = [
            'dataKategoriLayanan' => $getKategoriLayanan->result_array(),
            'wizard' => 'kategori layanan',
            'klasifikasiId' => $klasifikasiId
        ];
        var_dump('QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ');

        if ($getKategoriLayanan->num_rows() > 0) {
            $this->load->view('wizard/w_kategoriLayanan', $data);
        } else {
            $this->load->view('wizard/w_404', $data);
        }
    }

    public function generateJenisLayanan() {
        if (!$this->input->is_ajax_request()) show_404();

        $kategoriId = $this->input->post('id');

        $where = [
            'kategori_id' => $kategoriId,
            'is_active' => 1
        ];

        $getKategoriLayanan = $this->mdl->getWhere('m_kategori_layanan', ['id' => $kategoriId])->row_array();
        $getJenisLayanan = $this->mdl->getWhere('m_jenis_layanan', $where);

        $data = [
            'dataJenisLayanan' => $getJenisLayanan->result_array(),
            'wizard' => 'jenis layanan',
            'kategoriLayanan' => $getKategoriLayanan
        ];
        var_dump('RRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR');

        if ($getJenisLayanan->num_rows() > 0) {
            $this->load->view('wizard/w_jenisLayanan', $data);
        } else {
            $this->load->view('wizard/w_404', $data);
        }
    }

    public function generateFormRequest(){
        if (!$this->input->is_ajax_request()) show_404();

        $kategoriLayananId = $this->input->post('id');

        $where = [
            'kl.id' => $kategoriLayananId,
            'kl.is_active' => 1
        ];

        $getForm = $this->mdl->fetch('f.kode_form, kl.kategori_layanan', 'm_kategori_layanan kl', $where, NULL, 'm_form f', 'kl.form_id = f.id', 'LEFT', NULL, NULL)->row_array();

        $data = [
            'user' => $this->mdl->getWhere('pegawai', ['id' => $this->session->id]),
            'data' => $getForm,
            'dataAplikasi' => $this->mdl->getWhere('m_jenis_layanan', ['kategori_id' => '2'])->result(),
            'dataSoftware' => $this->mdl->getWhere('m_jenis_layanan', ['kategori_id' => '14'])->result(),
            'dataVidcon' => $this->mdl->getAll('user_vidcon')->result(),
            'unitKerja' => $this->mdl->getAll('m_unit_kerja')->result(),
            'jenisPermohonan' => $this->mdl->getAll('m_jenis_permohonan')->result(),
            'jenisPenggunaan' => $this->mdl->getAll('m_penggunaan')->result(),
            'teleworkingService' => $this->mdl->getAll('m_teleworking_service')->result(),
            'teleworkingSubservice' => $this->mdl->getAll('m_teleworking_subservice')->result(),
            'operating_system' => $this->mdl->getAll('m_os')->result(),
            'kategori_tempat' => $this->mdl->getAll('m_kategori_tempat')->result(),
            'tempat_rapat' => $this->mdl->getAll('m_ruang_rapat')->result(),
            'kategoriLayananId' => $kategoriLayananId,
            'formScript' => [$getForm['kode_form'] . '.js']
        ];

        // echo "<pre>";print_r($data);die;
        var_dump('SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS');

        $this->load->view('form/request/' . $data['data']['kode_form'], $data);
    }

    public function generateMasalah(){
        if (!$this->input->is_ajax_request()) show_404();

        $output = '';
        $where = [
            'jenis_layanan_id' => $this->input->post('id'),
        ];

        $getMasalah = $this->mdl->fetch('tm.id, m.masalah, jl.jenis_layanan','tr_masalah tm', $where, NULL, 'm_masalah m', 'tm.masalah_id = m.id', 'LEFT', 'm_jenis_layanan jl', 'tm.jenis_layanan_id = jl.id', NULL);

        $data = [
            'dataMasalah' => $getMasalah->result_array(),
            'wizard' => 'permasalahan'
        ];

        if ($getMasalah->num_rows() > 0) {
            $this->load->view('wizard/w_masalah', $data);
        } else {
            $this->load->view('wizard/w_404', $data);
        }
    }

    public function generateFaq() {
        if (!$this->input->is_ajax_request()) show_404();
        // $output = '';
        $where = [
            'tr_masalah_id' => $this->input->post('id'),
        ];

        $check = $this->mdl->fetch('f.id, f.judul, f.isi, f.created_by, f.last_modified, m.masalah, tm.id as tr_masalah_id', 'tr_faq tf', $where, NULL, 'tr_masalah tm', 'tf.tr_masalah_id = tm.id', 'LEFT', 'm_faq f', 'tf.faq_id = f.id', 'LEFT', 'm_masalah m', 'tm.masalah_id = m.id', 'LEFT');

        $data = [
            'faq' => $check->result_array(),
            'wizard' => 'FAQ'
        ];

        // var_dump('formformformformformformformform');

        if ($check->num_rows() > 0) {
            $this->load->view('wizard/w_faq', $data);
        } else {
            $this->load->view('wizard/w_404', $data);
        }
    }

    function save_ticket() {
        if (!$this->input->is_ajax_request()) show_404();

        $this->load->helper('file');

        $idTicket = $this->functions->generateTicket();
        $id_jenis_layanan = $this->input->post('id_jenis_layanan');
        $id_kategori_layanan = $this->input->post('id_kategori_layanan');
        $tr_masalah_id = $this->input->post('tr_masalah_id');
        $judul  = $this->input->post('judul', true);
        $masalah  = $this->input->post('masalah', true);

        $getBidang = $this->mdl->getWhere('m_jenis_layanan', ['id' => $id_jenis_layanan])->row_array();

        $val    = $this->form_validation;

        $rules = [
            [
                'field' => 'masalah',
                'label' => 'Deskripsi Masalah',
                'rules' => 'trim|required'
            ],
        ];

        $this->functions->alert($val);

        $val->set_rules($rules);

        if ($val->run() == false) {
            $result = [
                'success' => false,
                'message' => validation_errors()
            ];
        } else {

            $this->db->trans_begin();

            // set data tr_layanan
            $dataLayanan = [
                'jenis_layanan_id' => $id_jenis_layanan,
                'kategori_layanan_id' => $id_kategori_layanan,
                'bidang_id' => $getBidang['bidang_id'],
                'tr_masalah_id' => $tr_masalah_id,
                'ticket_id' => $idTicket
            ];

            // set data ticket
            $dataTicket = [
                'id' => $idTicket,
                'created_at' => date('Y-m-d H:i:s'),
                'title' => $judul,
                'description' => $masalah,
                'pegawai_id' => $this->session->id,
                'status_id' => '1'
            ];

            $this->mdl->save('ticket', $dataTicket);
            $this->mdl->save('tr_layanan', $dataLayanan);

            // array init tr data
            $dataTicketAttachment = [];

            if (!empty($_FILES['attachment']['name'])) {
                $files = $this->_uploadService($_FILES['attachment']);

                foreach($files as $result):
                    if ($result['success'] == true) {
                        array_push($dataTicketAttachment, [
                            'path_attachment' => $result['file_path'],
                            'detail_attachment' => $result['file_name'],
                            'ticket_id' => $idTicket,
                        ]);
                    } else {
                        $result = [
                            'success'   => false,
                            'message'   => $result['message']
                        ];
                        return $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output(json_encode($result));
                    }
                endforeach;
                // save attachment
                $this->mdl->saveBatch('tr_ticket_attachment', $dataTicketAttachment);
            }

            $result = [
                'success'   => true,
                'message'   => 'Ticket berhasil dibuat'
            ];
        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $result['console_message']  = 'Data gagal disimpan [Rollback DB]';
        else :
            $this->db->trans_commit();
            $result['console_message']  = 'Data berhasil disimpan [Commit DB]';
        endif;

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($result));
    }

    private function _uploadService($files) {

        // Set preference
        $config['upload_path'] = './assets/upload/ticket_attachment/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '5024'; // max_size in kb

        // load upload library
        $this->load->library('upload', $config);

        // init array for result json
        $result = [];

        foreach ($files['name'] as $key => $name) {
            $_FILES['attachment']['name'] = $files['name'][$key];
            $_FILES['attachment']['type'] = $files['type'][$key];
            $_FILES['attachment']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['attachment']['error'] = $files['error'][$key];
            $_FILES['attachment']['size'] = $files['size'][$key];

            $config['attachment'] = $files['name'][$key];

            $this->upload->initialize($config);

            if ($this->upload->do_upload('attachment')) {
                $file = $this->upload->data();

                array_push($result, [
                    'success' => true,
                    'file_name' => $name,
                    'file_path' => $config['upload_path'] . $file['file_name']
                ]);
            } else {
                array_push($result, [
                    'success' => false,
                    'message' => $this->upload->display_errors()
                ]);
                break;
            }
        }
        // var_dump($result); die;
        return $result;
    }
}
