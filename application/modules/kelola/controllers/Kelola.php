<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kelola extends MX_Controller
{
    private static $algo = '$2a';
    // cost parameter
    private static $cost = '$10';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth', 'auth_model');
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

        $this->load->view('v_login');
    }

    public function do_login()
    {
        $val = $this->form_validation;

        $rules = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim'
            )
        );

        $this->functions->alert($val);

        $val->set_rules($rules);

        if ($val->run() == FALSE) :
            $result = [
                'success'   => false,
                'message'   => validation_errors()
            ];
        else :
            $username = trim($this->input->post('username', TRUE));
            $password = trim($this->input->post('password', TRUE));

            $user = $this->auth_model->cek_login($username);

            if (!empty($user)) :

                if ($this->check_password($user['password'], $password)) :
                    $sess_data['logged_in'] = true;
                    $sess_data['id']        = $user['id'];
                    $sess_data['name']      = $user['nama'];
                    $sess_data['username']  = $user['username'];
                    $sess_data['role_id']   = $user['role_id'];
                    $sess_data['sess']      = 'personil';

                    $this->session->set_userdata($sess_data);

                    $result = [
                        'success'   => true,
                        'message'   => "Berhasil Login.",
                        'link'      => base_url('dashboard')
                    ];
                else :
                    $result['success'] = false;
                    $result['message'] = 'Username dan Password tidak sesuai';
                endif;

            else :
                $result['success'] = false;
                $result['message'] = 'Username dan Pasword tidak sesuai';
            endif;

        endif;

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($result));
    }

    public function do_logout()
    {
        $this->session->sess_destroy();
        return redirect('kelola');
    }

    private function check_session()
    {
        if (!isset($this->session->logged_in)) {
            $this->session->sess_destroy();
            return redirect('kelola');
        }
    }

    private static function unique_salt()
    {
        return substr(sha1(mt_rand()), 0, 22);
    }

    private static function hash($password)
    {
        return crypt($password, self::$algo .
            self::$cost .
            '$' . self::unique_salt());
    }

    private static function check_password($hash, $password)
    {
        $full_salt = substr($hash, 0, 29);
        $new_hash  = crypt($password, $full_salt);

        return ($hash == $new_hash);
    }

    function lupapassword()
    {
        // Get Front Template
        $this->load->view('lupapassword');
    }

    function resetpassword()
    {
        // Get Front Template
        $this->load->view('resetpassword');
    }

}
