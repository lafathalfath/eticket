<?php

class Profile extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        // Content ( Folder => Files)
        $data = [
            'main_content' => 'profile/index',
            'personil'=>$this->db->get_where('personil',['id'=>$this->session->id])->row_array()];

        // Get Back Template
        $this->load->view('back_template/template', $data);
    }

    function gantipassword()
    {
        // Content ( Folder => Files)
        $data = [
            'main_content' => 'profile/gantipassword',
            'personil'=>$this->db->get_where('personil',['username'=>$this->session->username])->row_array()];

      $this->form_validation->set_rules('passwordlama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('passwordbaru', 'Password Baru', 'required|trim|min_length[3]|matches[konfirmasipasswordbaru]');
          $this->form_validation->set_rules('konfirmasipasswordbaru', 'Konfirmasi Password', 'required|trim|min_length[3]|matches[passwordbaru]');
if ($this->form_validation->run()==false) {


        // Get Back Template
        $this->load->view('back_template/template', $data);
      } else{
        $passwordlama=$this->input->post('passwordlama');
        $passwordbaru=$this->input->post('passwordbaru');
        if (password_verify($passwordlama, $data['personil']['password'])) {
          $this->session->set_flashdata('message', '<div class=
          "alert alert-danger" role="alert">Password lama salah!</div');
          redirect('admin/profile/gantipassword');
        } else {
          if ($passwordlama==$passwordbaru){
            $this->session->set_flashdata('message', '<div class=
            "alert alert-danger" role="alert">Password lama tidak boleh sama dengan password baru!</div');
            redirect('admin/profile/gantipassword');
          } else {
            $password_hash=crypt($passwordbaru, PASSWORD_DEFAULT);
            $this->db->set('password',$password_hash);
            $this->db->where('id',$this->session->userdata('id'));
            $this->db->update('personil');
            $this->session->set_flashdata('message', '<div class=
            "alert alert-success" role="alert">Password berhasil diupdate</div');
            redirect('admin/profile');
          }
        }
      }
    }

    function editprofile(){
      $data = ['main_content'=> 'profile/editprofile',
    'personil'=>$this->db->get_where('personil',['username'=>$this->session->username])->row_array()];

    $this->form_validation->set_rules('nama','Nama','required|trim');
    $this->form_validation->set_rules('username','Username','required|trim');

    if ($this->form_validation->run() ==false) {
       $this->load->view('back_template/template', $data);
     } else {
       $nama=$this->input->post('nama');
       $username=$this->input->post('username');
       $upload_gambar=$_FILES['path_images']['nama'];
       if ($upload_gambar) {
         $config['upload_path'] = './assets/upload/personil/profil/';
         $config['allowed_types'] = 'jpeg|jpg|png';
         $config['max_size']     = '3000';
         $this->load->library('upload',$config);

         if($this->upload->do_upload('path_images')) {
           $new_gambar=$this->upload->data('file_name');
           $this->db->set('path_images',$new_gambar);
         } else {
            echo $this->upload->display_errors();
         }
       }

       $this->db->set('nama', $nama);
       $this->db->set('username',$username);
       $this->db->update('personil');


       redirect('admin/profile');

     }
    }
}
