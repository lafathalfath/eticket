<?php

class Faq extends MX_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->functions->check_session();
        $this->load->model('m_faq', 'mdl');
        $this->load->library('datatables');
        $this->load->library('upload');
        //   $this->load->library('encrypt');

        date_default_timezone_set('Asia/Jakarta');
    }

    function index()
    {
        // Content ( Folder => Files)
        $data = [
            'main_content' => 'faq/index',
            'personil'=>$this->db->get_where('personil',['id'=>$this->session->id])->row_array()];
      
        // Get Back Template
        $this->load->view('back_template/template', $data);
    }

    public function dt_faq()
    {
        if (!$this->input->is_ajax_request()) show_404();

        $view_priv     = $this->input->post('view_priv', TRUE);
        $edit_priv       = $this->input->post('edit_priv', TRUE);
        $delete_priv     = $this->input->post('delete_priv', TRUE);

        $view_button      = ($view_priv == 1) ? '<a href="javascript:void(0)" data-id="$1" class="dropdown-item btn-view"><i class="icon-eye"></i>View</a><li>' : '';
        $edit_button        = ($edit_priv == 1) ? '<a href="javascript:void(0)" data-id="$1" class="dropdown-item btn-edit"><i class="icon-pencil"></i>Edit</a><li>' : '';
        $delete_button        = ($delete_priv == 1) ? '<a href="javascript:void(0)" data-id="$1" class="dropdown-item btn-delete"><i class="icon-trash"></i>Delete</a><li>' : '';

        $this->datatables->add_column('no', '');

        $this->datatables
            ->select('
            h.id as kode,
            h.judul,
            h.isi
            ')
            ->from('m_faq h');

        if (($edit_priv == 1) || ($delete_priv == 1) || ($detail_priv == 1)) :
            $this->datatables->add_column('aksi', '<div class="list-icons"><div class="dropdown"><a href="javascript:void(0)" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu9"></i></a><div class="dropdown-menu dropdown-menu-right">' . $view_button . $edit_button . $delete_button . '</div></div></div>', 'encode(kode)');
        endif;

        header('Content-Type: application/json');
        echo $this->datatables->generate();
    }

    public function save()
    {
        $kode               = $this->input->post('id', true);
        $judul               = $this->input->post('judul', true);
        $isi            = trim($this->input->post('isi', true));
        
        $cek = $this->db->get_where('m_faq', ['id' => decode($kode)])->num_rows();

        $val    = $this->form_validation;

        if ($cek > 0) {
            $rules = [
                [
                    'field' => 'judul',
                    'label' => 'Judul FAQ',
                    'rules' => 'required|trim'
                ],
                [
                    'field' => 'isi',
                    'label' => 'Isi FAQ',
                    'rules' => 'required|trim'
                ]
            ];
        } else {
            $rules = [
                [
                    'field' => 'judul',
                    'label' => 'Judul FAQ',
                    'rules' => 'required|trim|is_unique[m_faq.judul]'
                ],
                [
                    'field' => 'isi',
                    'label' => 'Isi FAQ',
                    'rules' => 'required|trim'
                ]
            ];
        }


        $this->functions->alert($val);

        $val->set_rules($rules);
        
        $d['judul']          = $judul;
        $d['isi']            = $isi;
        
        $this->db->trans_begin();
        if ($val->run() == false) {
            $result = [
                'success' => false,
                'message' => validation_errors()
            ];
        } else {
            if ($cek == 0) :
                $this->mdl->save('m_faq', $d);
                $result = [
                    'success' => true,
                    'message' => 'FAQ berhasil ditambahkan'
                ];
            else :
                $this->mdl->update('m_faq', $d, ['id' => decode($kode)]);
                $result = [
                    'success' => true,
                    'message' => 'FAQ berhasil diperbaharui'
                ];
            endif;
        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $result['error']    = true;
            $result['err_msg']  = 'Gagal menyimpan data';
        else :
            $this->db->trans_commit();
            $result['error']    = false;
            $result['redirect'] = 'faq';

        endif;

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($result));
    }

    //Upload image summernote
    function upload_image() {
        $this->load->library('upload');

        if(isset($_FILES["image"]["name"])){
            $config['upload_path'] = './assets/upload/faq/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 1024; //size on MB
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('image')){                
                $result = [
                    'success' => false,
                    'message' => $this->upload->display_errors()
                ];                
            }else{
                $data = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/upload/faq/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '60%';
                $config['width']= 500;
                $config['height']= 500;
                $config['new_image']= './assets/upload/faq/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                // echo base_url().'assets/upload/faq/'.$data['file_name'];
                $result = [
                    'success' => true,
                    'url' => base_url().'assets/upload/faq/'.$data['file_name']
                ];
            }

            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($result));
        }
    }

    function delete_image(){
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name)){
            echo 'File Delete Successfully';
        }
    }

    public function hapus()
    {

        $id = decode(trim($this->input->post('id', true)));

        $this->mdl->destroy(['id' => $id]);

        if ($this->db->affected_rows()) :
            $result['error']    = false;
            $result['message']  = 'Data berhasil dihapus';
        else :
            $result['error']    = true;
            $result['message']  = 'Data gagal dihapus';
        endif;

        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
    }

    public function get_detail()
    {
        if (!$this->input->is_ajax_request()) show_404();

        $id         = decode(trim($this->input->post('id', true)));

        $cek        = $this->db->select(
            'id as id,
            judul as judul,
            isi as isi'
        )
            ->get_where('m_faq', ['id' => $id]);

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

    function addfaq()
    {
        // Content
        $data = [
            'main_content' => 'faq/addfaq'
        ];

        // Get Template
        $this->load->view('back_template/template', $data);
    }

    function editfaq()
    {
        // Content
        $data = [
            'main_content' => 'faq/editfaq'
        ];

        // Get Template
        $this->load->view('back_template/template', $data);
    }

    function detailfaq()
    {
        // Content
        $data = [
            'main_content' => 'faq/detailfaq'
        ];

        // Get Template
        $this->load->view('back_template/template', $data);
    }
}
