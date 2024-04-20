<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends MX_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');    
        $this->load->model('auth_model', 'm_auth');
        $this->load->model('user_model', 'm_user');       
    }
    public function index()
    {
        if ($this->session->logged_in) {
            if($this->session->sess == 'personil') {
                redirect('dashboard');
            } else {
                redirect('pengguna/dashboard');
            }
        }
        
        $this->form_validation->set_rules('email','Email','required|trim');
        $this->form_validation->set_rules('password','Password','required|trim');
        if($this->form_validation->run()==false){
            $data['title'] = "E-Ticketing";
            $this->load->view('auth_header',$data);
            $this->load->view('v_login',$data);
            $this->load->view('auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        //$user = $this->db->get_where('user',['email' => $email])->row_array();

        $uid            = trim($this->input->post('email', TRUE));
        $ldapserver     = '10.1.1.2';
        $ldapuser       = "bsn.local\\" . $uid;
        $ldappass       = $this->input->post('password', TRUE);
        $ldaptree       = "DC=BSN,DC=local";

        $ldapconn = ldap_connect($ldapserver);
                ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
                ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
                
        //Konek ke server LDAP
        if($ldapconn){
            //Jika Konek dengan username password LDAP 
            if($ldapbind = ldap_bind($ldapconn, $ldapuser, $ldappass)){
                    //Get Entries LDAP
                    $filter = "(sAMAccountName=$uid)";
                    $attr = array("cn", "mail","l","userPrincipalName", "mobile");  
                    $result = ldap_search($ldapconn,$ldaptree,$filter, $attr) or die ("Error in search query: ".ldap_error($ldapconn));
                    $data = ldap_get_entries($ldapconn, $result);
                    //cek di DB
                    $cekdata = $this->m_auth->cek_user($uid);
                    if(!empty($cekdata)) :
                        if($data[0]['mobile'][0] != null)
                            {
                                $no_hp = array(
                                    'nomor_telepon' => $data[0]['mobile'][0],
                                );
                            
                            $this->db->where('id', $cekdata['id']);
                            $this->db->update('pegawai', $no_hp);
                            }
                        for ($i=0; $i<$data["count"]; $i++) 
                            {
                                $dataldap['id']         = $cekdata['id'];
                                $dataldap['name']       = $cekdata['name'];
                                $dataldap['email']      = $cekdata['email'];
                                $dataldap['image']      = $cekdata['image'];
                                $dataldap['role_id']    = $cekdata['role_id'];
                                $dataldap['sess']       = 'pegawai';
                            } 
                        $this->session->set_userdata($dataldap);
                        $this->session->logged_in = true;
                        if($user['role_id']==1){
                            redirect('pengguna/dashboard');
                        }else{
                            redirect('pengguna/dashboard');
                        }
                        
                        else :
                                    
                            $cekdata2 = $this->m_auth->cek_user($uid);      
                            for ($i=0; $i<$data["count"]; $i++) 
                            {
                                $dataldap['name']           = $data[$i]["cn"][0];
                                $dataldap['username']       = $uid;
                                $dataldap['email']          = $data[$i]["mail"][0];
                                $dataldap['image']          = "default.jpg";
                                $dataldap['role_id']        = "2";
                                $dataldap['is_active']      = "1";
                                $dataldap['date_created']   = time();
                            } 
                            $this->m_user->simpan($dataldap);
                            // $this->session->set_userdata($dataldap);
                            $this->session->set_flashdata('message', '<div class="alert alert-success" roles="alert">Selamat akun anda telah diaktifasi. Mohon login lagi untuk masuk.</div>');
                            redirect('masuk');
                    endif;
                        
                

            }else{


                $this->session->set_flashdata('message','<div class="alert alert-danger" roles="alert">Username/password salah. Silakan coba lagi.</div>');
                redirect('masuk');
            }
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" roles="alert">Not connect to Server!</div>');
            redirect('masuk');
        }
    }    

    public function do_logout(){
        $this->session->set_flashdata('message','<div class="alert alert-success" roles="alert">Anda telah logout</div>');
        $this->session->sess_destroy();
        redirect('masuk');  
    }    
    
}
