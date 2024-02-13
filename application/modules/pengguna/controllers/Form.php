<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends MX_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('m_layanan', 'mdl');
        $this->functions->check_session_pegawai();
        date_default_timezone_set("Asia/Jakarta");
    }

    function fsid2901_save() {
        $table = 'f_sid2901';

        $id = $this->input->post('id');
        $idTicket = $this->functions->generateTicket();
        $id_kategori_layanan = $this->input->post('id_kategori_layanan');
        $nama_lengkap    = $this->input->post('nama_lengkap');
        $unit_kerja  = $this->input->post('unit_kerja');
        $nip  = $this->input->post('nip');
        $jabatan   = $this->input->post('jabatan');

        $identitas_perangkat   = $this->input->post('identitas_perangkat');
        $merk_perangkat   = $this->input->post('merk_perangkat');
        $mac_address   = $this->input->post('mac_address');
        $lokasi_kerja   = $this->input->post('lokasi_kerja');
        $jenis_kegiatan   = $this->input->post('jenis_kegiatan');
        $service_id   = $this->input->post('service_id');
        $subservice_id   = $this->input->post('subservice_id');
        $ip_address   = $this->input->post('ip_address');
        $aplikasi_id = $this->input->post('aplikasi_id');
        $tgl_awal   = $this->input->post('tgl_awal');
        $tgl_akhir   = $this->input->post('tgl_akhir');

        $this->load->library('form_validation');

        $val    = $this->form_validation;

        $rules = [
            [
                'field' => 'unit_kerja',
                'label' => 'Unit Kerja',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'identitas_perangkat',
                'label' => 'Identitas Perangkat',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'merk_perangkat',
                'label' => 'Merk Perangkat',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'mac_address',
                'label' => 'Mac Address',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'jenis_kegiatan',
                'label' => 'Jenis Kegiatan',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'service_id',
                'label' => 'Service yang Diakses',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'subservice_id',
                'label' => 'Subservice yang Diakses',
                'rules' => 'trim'
            ],
            [
                'field' => 'ip_address',
                'label' => 'IP Address',
                'rules' => 'trim'
            ],
            [
                'field' => 'aplikasi_id',
                'label' => 'Aplikasi yang Diakses',
                'rules' => 'trim'
            ],
            [
                'field' => 'tgl_awal',
                'label' => 'Tanggal Awal',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'tgl_akhir',
                'label' => 'Tanggal Akhir',
                'rules' => 'required|trim'
            ],
        ];

        $this->functions->alert($val);

        $val->set_rules($rules);

        $check = $this->mdl->getWhere($table, ['id' => $id]);

        if ($val->run() == false) {
            $result = [
                'success' => false,
                'message' => validation_errors()
            ];
        } else {
            $this->db->trans_begin();

            $data = [
                'ticket_id' => $idTicket,
                'identitas_perangkat' => $identitas_perangkat,
                'merk_perangkat' => $merk_perangkat,
                'mac_address' => $mac_address,
                'lokasi_kerja' => $lokasi_kerja,
                'jenis_kegiatan' => $jenis_kegiatan,
                'service_id' => $service_id,
                'subservice_id' => $subservice_id,
                'ip_address' => $ip_address,
                'aplikasi_id' => $aplikasi_id,
                'tgl_awal' => $tgl_awal,
                'tgl_akhir' => $tgl_akhir,
            ];

            $dataTicket = [
                'id' => $idTicket,
                'created_at' => date('Y-m-d H:i:s'),
                'title' => 'Request Teleworking',
                'pegawai_id' => $this->session->id,
                'status_id' => '1'
            ];

            $dataLayanan = [
                'kategori_layanan_id' => $id_kategori_layanan,
                'bidang_id' => '1',
                'ticket_id' => $idTicket
            ];

            if ($check->num_rows() > 0) :
                // $data['mtime'] = date('Y-m-d H:i:s');
                $this->mdl->update($table, $data, ['id' => $id]);
                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil diubah'
                ];
            else :
                // $data['ctime'] = date('Y-m-d H:i:s');
                $this->mdl->save('ticket', $dataTicket);
                $this->mdl->save('tr_layanan', $dataLayanan);
                $this->mdl->save($table, $data);

                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil disimpan'
                ];

            endif;
        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $result['console_message'] = 'Data gagal disimpan [Rollback DB]';
        else :
            $this->db->trans_commit();
            $result['console_message'] = 'Data berhasil disimpan [Commit DB]';
        endif;

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($result));
    }

    function fsid3001_save(){
        $table = 'f_sid3001';

        $id = $this->input->post('id');
        $idTicket = $this->functions->generateTicket();
        $id_kategori_layanan = $this->input->post('id_kategori_layanan');
        $nama_lengkap    = $this->input->post('nama_lengkap');
        $unit_kerja  = $this->input->post('unit_kerja');
        $nip  = $this->input->post('nip');
        $jabatan   = $this->input->post('jabatan');
        $aplikasi_id = $this->input->post('aplikasi_id');

        $this->load->library('form_validation');

        $val    = $this->form_validation;

        $rules = [
            [
                'field' => 'unit_kerja',
                'label' => 'Unit Kerja',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'aplikasi_id',
                'label' => 'Nama Software',
                'rules' => 'required|trim'
            ],
        ];

        $this->functions->alert($val);

        $val->set_rules($rules);

        $check = $this->mdl->getWhere($table, ['id' => $id]);

        if ($val->run() == false) {
            $result = [
                'success' => false,
                'message' => validation_errors()
            ];
        } else {
            $this->db->trans_begin();

            $data = [
                'ticket_id' => $idTicket,
                'aplikasi_id' => $aplikasi_id,
            ];

            $dataTicket = [
                'id' => $idTicket,
                'created_at' => date('Y-m-d H:i:s'),
                'title' => 'Request Instalasi Perangkat Lunak',
                'pegawai_id' => $this->session->id,
                'status_id' => '1'
            ];

            $dataLayanan = [
                'kategori_layanan_id' => $id_kategori_layanan,
                'bidang_id' => '1',
                'ticket_id' => $idTicket
            ];

            if ($check->num_rows() > 0) :
                // $data['mtime'] = date('Y-m-d H:i:s');
                $this->mdl->update($table, $data, ['id' => $id]);
                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil diubah'
                ];
            else :
                // $data['ctime'] = date('Y-m-d H:i:s');
                $this->mdl->save('ticket', $dataTicket);
                $this->mdl->save('tr_layanan', $dataLayanan);
                $this->mdl->save($table, $data);

                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil disimpan'
                ];

            endif;
        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $result['console_message'] = 'Data gagal disimpan [Rollback DB]';
        else :
            $this->db->trans_commit();
            $result['console_message'] = 'Data berhasil disimpan [Commit DB]';
        endif;

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($result));
    }

    function fsid3301_save(){
        $table = 'f_sid3301';

        $id = $this->input->post('id');
        $idTicket = $this->functions->generateTicket();
        $id_kategori_layanan = $this->input->post('id_kategori_layanan');
        $nama_lengkap    = $this->input->post('nama_lengkap');
        $unit_kerja  = $this->input->post('unit_kerja');
        $nip  = $this->input->post('nip');
        $jabatan   = $this->input->post('jabatan');
        $usulan_email   = $this->input->post('usulan_email');

        $this->load->library('form_validation');

        $val    = $this->form_validation;

        $rules = [
            [
                'field' => 'unit_kerja',
                'label' => 'Unit Kerja',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'usulan_email',
                'label' => 'Usulan Email',
                'rules' => 'required|trim|is_unique[pegawai.email]'
            ],
        ];

        $this->functions->alert($val);

        $val->set_rules($rules);

        $check = $this->mdl->getWhere($table, ['id' => $id]);

        if ($val->run() == false) {
            $result = [
                'success' => false,
                'message' => validation_errors()
            ];
        } else {
            $this->db->trans_begin();

            $data = [
                'ticket_id' => $idTicket,
                'usulan_email' => $usulan_email,
            ];

            $dataTicket = [
                'id' => $idTicket,
                'created_at' => date('Y-m-d H:i:s'),
                'title' => 'Request Email Baru',
                'pegawai_id' => $this->session->id,
                'status_id' => '1'
            ];

            $dataLayanan = [
                'kategori_layanan_id' => $id_kategori_layanan,
                'bidang_id' => '1',
                'ticket_id' => $idTicket
            ];

            if ($check->num_rows() > 0) :
                // $data['mtime'] = date('Y-m-d H:i:s');
                $this->mdl->update($table, $data, ['id' => $id]);
                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil diubah'
                ];
            else :
                // $data['ctime'] = date('Y-m-d H:i:s');
                $this->mdl->save('ticket', $dataTicket);
                $this->mdl->save('tr_layanan', $dataLayanan);
                $this->mdl->save($table, $data);

                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil disimpan'
                ];

            endif;
        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $result['console_message'] = 'Data gagal disimpan [Rollback DB]';
        else :
            $this->db->trans_commit();
            $result['console_message'] = 'Data berhasil disimpan [Commit DB]';
        endif;

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($result));
    }

    function fsid3401_save() {
        $table = 'f_sid3401';

        $id = $this->input->post('id');
        $idTicket = $this->functions->generateTicket();
        $id_kategori_layanan = $this->input->post('id_kategori_layanan');
        $nama_lengkap    = $this->input->post('nama_lengkap');
        $unit_kerja  = $this->input->post('unit_kerja');
        $nip  = $this->input->post('nip');
        $jabatan   = $this->input->post('jabatan');
        $jenis_permohonan_id   = $this->input->post('jenis_permohonan_id');
        $deskripsi_aplikasi   = $this->input->post('deskripsi_aplikasi');
        $nama_aplikasi   = $this->input->post('nama_aplikasi');
        $penggunaan_id   = $this->input->post('penggunaan_id');
        $perusahaan_pengembang   = $this->input->post('perusahaan_pengembang');

        $this->load->library('form_validation');

        $val    = $this->form_validation;

        $rules = [
            [
                'field' => 'unit_kerja',
                'label' => 'Unit Kerja',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'jenis_permohonan_id',
                'label' => 'Jenis Permohonan',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'nama_aplikasi',
                'label' => 'Nama Aplikasi',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'penggunaan_id',
                'label' => 'Pengguna Aplikasi',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'perusahaan_pengembang',
                'label' => 'Pengembang Aplikasi',
                'rules' => 'required|trim'
            ],

            [
                'field' => 'deskripsi_aplikasi',
                'label' => 'Deskripsi Aplikasi',
                'rules' => 'required|trim'
            ],
        ];

        $this->functions->alert($val);

        $val->set_rules($rules);

        $check = $this->mdl->getWhere($table, ['id' => $id]);

        if ($val->run() == false) {
            $result = [
                'success' => false,
                'message' => validation_errors()
            ];
        } else {
            $this->db->trans_begin();

            $data = [
                'jenis_permohonan_id' => $jenis_permohonan_id,
                'nama_aplikasi' => $nama_aplikasi,
                'penggunaan_id' => $penggunaan_id,
                'perusahaan_pengembang' => $perusahaan_pengembang,
                'deskripsi_aplikasi' => $deskripsi_aplikasi,
                'ticket_id' => $idTicket
            ];

            $dataTicket = [
                'id' => $idTicket,
                'created_at' => date('Y-m-d H:i:s'),
                'title' => 'Request Pengembangan Aplikasi',
                'pegawai_id' => $this->session->id,
                'status_id' => '1'
            ];

            $dataLayanan = [
                'kategori_layanan_id' => $id_kategori_layanan,
                'bidang_id' => '1',
                'ticket_id' => $idTicket
            ];

            if ($check->num_rows() > 0) :
                // $data['mtime'] = date('Y-m-d H:i:s');
                $this->mdl->update($table, $data, ['id' => $id]);
                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil diubah'
                ];
            else :
                // $data['ctime'] = date('Y-m-d H:i:s');
                $this->mdl->save('ticket', $dataTicket);
                $this->mdl->save('tr_layanan', $dataLayanan);
                $this->mdl->save($table, $data);

                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil disimpan'
                ];

            endif;
        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $result['console_message'] = 'Data gagal disimpan [Rollback DB]';
        else :
            $this->db->trans_commit();
            $result['console_message'] = 'Data berhasil disimpan [Commit DB]';
        endif;

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($result));
    }

    function fsid3601_save() {
        $table = 'f_sid3601';

        $id = $this->input->post('id');
        $idTicket = $this->functions->generateTicket();
        $id_kategori_layanan = $this->input->post('id_kategori_layanan');
        $nama_lengkap    = $this->input->post('nama_lengkap');
        $unit_kerja  = $this->input->post('unit_kerja');
        $nip  = $this->input->post('nip');
        $jabatan   = $this->input->post('jabatan');
        $jenis_data   = $this->input->post('jenis_data');

        $this->load->library('form_validation');

        $val    = $this->form_validation;

        $rules = [
            [
                'field' => 'unit_kerja',
                'label' => 'Unit Kerja',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'jenis_data',
                'label' => 'Jenis Data',
                'rules' => 'required|trim'
            ],
        ];

        $this->functions->alert($val);

        $val->set_rules($rules);

        $check = $this->mdl->getWhere($table, ['id' => $id]);

        if ($val->run() == false) {
            $result = [
                'success' => false,
                'message' => validation_errors()
            ];
        } else {
            $this->db->trans_begin();

            $data = [
                'ticket_id' => $idTicket,
                'jenis_data' => $jenis_data,
            ];

            $dataTicket = [
                'id' => $idTicket,
                'created_at' => date('Y-m-d H:i:s'),
                'title' => 'Request Data',
                'pegawai_id' => $this->session->id,
                'status_id' => '1'
            ];

            $dataLayanan = [
                'kategori_layanan_id' => $id_kategori_layanan,
                'bidang_id' => '1',
                'ticket_id' => $idTicket
            ];

            if ($check->num_rows() > 0) :
                // $data['mtime'] = date('Y-m-d H:i:s');
                $this->mdl->update($table, $data, ['id' => $id]);
                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil diubah'
                ];
            else :
                // $data['ctime'] = date('Y-m-d H:i:s');
                $this->mdl->save('ticket', $dataTicket);
                $this->mdl->save('tr_layanan', $dataLayanan);
                $this->mdl->save($table, $data);

                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil disimpan'
                ];

            endif;
        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $result['console_message'] = 'Data gagal disimpan [Rollback DB]';
        else :
            $this->db->trans_commit();
            $result['console_message'] = 'Data berhasil disimpan [Commit DB]';
        endif;

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($result));
    }

    function fsid3701_save() {
        $table = 'f_sid3701';

        $id = $this->input->post('id');
        $idTicket = $this->functions->generateTicket();
        $id_kategori_layanan = $this->input->post('id_kategori_layanan');
        $nama_lengkap    = $this->input->post('nama_lengkap');
        $unit_kerja  = $this->input->post('unit_kerja');
        $nip  = $this->input->post('nip');
        $jabatan   = $this->input->post('jabatan');
        $ruang_vicon   = $this->input->post('ruang_vicon');
        $nama_kegiatan   = $this->input->post('nama_kegiatan');
        $kategori_tempat   = $this->input->post('kategori_tempat');
        $ruang_rapat   = $this->input->post('ruang_rapat');
        $tidak_tetap   = $this->input->post('tidak_tetap');
        $waktu_awal   = $this->input->post('tgl_awal');
        $waktu_akhir   = $this->input->post('tgl_akhir');

        $this->load->library('form_validation');

        $val    = $this->form_validation;

        $rules = [
            [
                'field' => 'unit_kerja',
                'label' => 'Unit Kerja',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'ruang_vicon',
                'label' => 'ruang_vicon',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'nama_kegiatan',
                'label' => 'nama_kegiatan',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'kategori_tempat',
                'label' => 'kategori_tempat',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'tgl_mulai',
                'label' => 'Tgl. Mulai Penggunaan',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'tgl_akhir',
                'label' => 'Tgl. Akhir Penggunaan',
                'rules' => 'required|trim'
            ],
        ];

        $this->functions->alert($val);

        $val->set_rules($rules);

        $check = $this->mdl->getWhere($table, ['id' => $id]);

        if ($val->run() == false) {
            $result = [
                'success' => false,
                'message' => validation_errors()
            ];
        } else {
            $this->db->trans_begin();

            $data = [
                'vicon_id' => $ruang_vicon,
                'nama_kegiatan' => $nama_kegiatan,
                'kategori_tempat_id' => $kategori_tempat,
                'ruang_rapat_id' => $ruang_rapat,                
                'tidak_tetap' => $tidak_tetap,
                'waktu_awal' => $waktu_awal,
                'waktu_akhir' => $waktu_akhir,
                'ticket_id' => $idTicket
            ];

            $dataTicket = [
                'id' => $idTicket,
                'created_at' => date('Y-m-d H:i:s'),
                'title' => 'Request Layanan Video Conference',
                'pegawai_id' => $this->session->id,
                'status_id' => '1'
            ];

            $dataLayanan = [
                'kategori_layanan_id' => $id_kategori_layanan,
                'bidang_id' => '1',
                'ticket_id' => $idTicket
            ];

            if ($check->num_rows() > 0) :
                // $data['mtime'] = date('Y-m-d H:i:s');
                $this->mdl->update($table, $data, ['id' => $id]);
                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil diubah'
                ];
            else :
                // $data['ctime'] = date('Y-m-d H:i:s');
                $this->mdl->save('ticket', $dataTicket);
                $this->mdl->save('tr_layanan', $dataLayanan);
                $this->mdl->save($table, $data);

                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil disimpan'
                ];

            endif;
        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $result['console_message'] = 'Data gagal disimpan [Rollback DB]';
        else :
            $this->db->trans_commit();
            $result['console_message'] = 'Data berhasil disimpan [Commit DB]';
        endif;

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($result));
    }

    function fsid3801_save() {
        $table = 'f_sid3801';

        $id = $this->input->post('id');
        $idTicket = $this->functions->generateTicket();
        $id_kategori_layanan = $this->input->post('id_kategori_layanan');
        $nama_lengkap    = $this->input->post('nama_lengkap');
        $unit_kerja  = $this->input->post('unit_kerja');
        $nip  = $this->input->post('nip');
        $jabatan = $this->input->post('jabatan');
        $identitas_perangkat = $this->input->post('identitas_perangkat');
        $merk = $this->input->post('merk');
        $spesifikasi_perangkat = $this->input->post('spesifikasi_perangkat');
        $operating_system = $this->input->post('operating_system');
        $antivirus = $this->input->post('antivirus');
        $mac_address = $this->input->post('mac_address');
        $waktu_awal = $this->input->post('waktu_awal');
        $waktu_akhir = $this->input->post('waktu_akhir');

        $this->load->library('form_validation');

        $val    = $this->form_validation;

        $rules = [
            [
                'field' => 'unit_kerja',
                'label' => 'Unit Kerja',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'identitas_perangkat',
                'label' => 'identitas_perangkat',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'merk',
                'label' => 'merk',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'spesifikasi_perangkat',
                'label' => 'spesifikasi_perangkat',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'operating_system',
                'label' => 'operating_system',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'mac_address',
                'label' => 'mac_address',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'waktu_awal',
                'label' => 'waktu_awal',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'waktu_akhir',
                'label' => 'waktu_akhir',
                'rules' => 'required|trim'
            ],
        ];

        $this->functions->alert($val);

        $val->set_rules($rules);

        $check = $this->mdl->getWhere($table, ['id' => $id]);

        if ($val->run() == false) {
            $result = [
                'success' => false,
                'message' => validation_errors()
            ];
        } else {
            $this->db->trans_begin();

            $data = [
                'identitas_perangkat' => $identitas_perangkat,
                'merk' => $merk,
                'spesifikasi_perangkat' => $spesifikasi_perangkat,
                'os_id' => $operating_system,
                'antivirus' => $antivirus,
                'mac_address' => $mac_address,
                'waktu_awal' => $waktu_awal,
                'waktu_akhir' => $waktu_akhir,
                'ticket_id' => $idTicket
            ];

            $dataTicket = [
                'id' => $idTicket,
                'created_at' => date('Y-m-d H:i:s'),
                'title' => 'Permohonan Penggunaan Jaringan Wifi',
                'pegawai_id' => $this->session->id,
                'status_id' => '1'
            ];

            $dataLayanan = [
                'kategori_layanan_id' => $id_kategori_layanan,
                'bidang_id' => '1',
                'ticket_id' => $idTicket
            ];

            if ($check->num_rows() > 0) :
                // $data['mtime'] = date('Y-m-d H:i:s');
                $this->mdl->update($table, $data, ['id' => $id]);
                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil diubah'
                ];
            else :
                // $data['ctime'] = date('Y-m-d H:i:s');
                $this->mdl->save('ticket', $dataTicket);
                $this->mdl->save('tr_layanan', $dataLayanan);
                $this->mdl->save($table, $data);

                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil disimpan'
                ];

            endif;
        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $result['console_message'] = 'Data gagal disimpan [Rollback DB]';
        else :
            $this->db->trans_commit();
            $result['console_message'] = 'Data berhasil disimpan [Commit DB]';
        endif;

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($result));
    }

    function fsid3901_save() {
        $table = 'f_sid3901';

        $id = $this->input->post('id');
        $idTicket = $this->functions->generateTicket();
        $id_kategori_layanan = $this->input->post('id_kategori_layanan');
        $nama_lengkap    = $this->input->post('nama_lengkap');
        $unit_kerja  = $this->input->post('unit_kerja');
        $nip  = $this->input->post('nip');
        $jabatan   = $this->input->post('jabatan');
        $nama_barang   = $this->input->post('nama_barang');
        $merk_produk   = $this->input->post('merk_produk');
        $nomor_seri   = $this->input->post('nomor_seri');
        $keterangan   = $this->input->post('keterangan');

        $this->load->library('form_validation');

        $val    = $this->form_validation;

        $rules = [
            [
                'field' => 'unit_kerja',
                'label' => 'Unit Kerja',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'nama_barang',
                'label' => 'nama_barang',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'merk_produk',
                'label' => 'merk_produk',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'nomor_seri',
                'label' => 'nomor_seri',
                'rules' => 'required|trim'
            ],
        ];

        $this->functions->alert($val);

        $val->set_rules($rules);

        $check = $this->mdl->getWhere($table, ['id' => $id]);

        if ($val->run() == false) {
            $result = [
                'success' => false,
                'message' => validation_errors()
            ];
        } else {
            $this->db->trans_begin();

            $data = [
                'nama_barang' => $nama_barang,
                'merk_produk' => $merk_produk,
                'nomor_seri' => $nomor_seri,
                'keterangan' => $keterangan,
                'ticket_id' => $idTicket
            ];

            $dataTicket = [
                'id' => $idTicket,
                'created_at' => date('Y-m-d H:i:s'),
                'title' => 'Pengajuan Penempatan Storage Mandiri',
				'description' => $keterangan,
                'pegawai_id' => $this->session->id,
                'status_id' => '1'
            ];

            $dataLayanan = [
                'kategori_layanan_id' => $id_kategori_layanan,
                'bidang_id' => '1',
                'ticket_id' => $idTicket
            ];

            if ($check->num_rows() > 0) :
                // $data['mtime'] = date('Y-m-d H:i:s');
                $this->mdl->update($table, $data, ['id' => $id]);
                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil diubah'
                ];
            else :
                // $data['ctime'] = date('Y-m-d H:i:s');
                $this->mdl->save('ticket', $dataTicket);
                $this->mdl->save('tr_layanan', $dataLayanan);
                $this->mdl->save($table, $data);

                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil disimpan'
                ];

            endif;
        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $result['console_message'] = 'Data gagal disimpan [Rollback DB]';
        else :
            $this->db->trans_commit();
            $result['console_message'] = 'Data berhasil disimpan [Commit DB]';
        endif;

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($result));
    }

    function fsid4001_save() {
        $table = 'f_sid4001';

        $id = $this->input->post('id');
        $idTicket = $this->functions->generateTicket();
        $id_kategori_layanan = $this->input->post('id_kategori_layanan');
        $nama_lengkap    = $this->input->post('nama_lengkap');
        $unit_kerja  = $this->input->post('unit_kerja');
        $nip  = $this->input->post('nip');
        $jabatan   = $this->input->post('jabatan');
        $nama_barang   = $this->input->post('nama_barang');
        $merk_produk   = $this->input->post('merk_produk');
        $nomor_seri   = $this->input->post('nomor_seri');
        $keterangan   = $this->input->post('keterangan');

        $this->load->library('form_validation');

        $val    = $this->form_validation;

        $rules = [
            [
                'field' => 'unit_kerja',
                'label' => 'Unit Kerja',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'nama_barang',
                'label' => 'nama_barang',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'merk_produk',
                'label' => 'merk_produk',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'nomor_seri',
                'label' => 'nomor_seri',
                'rules' => 'required|trim'
            ],
        ];

        $this->functions->alert($val);

        $val->set_rules($rules);

        $check = $this->mdl->getWhere($table, ['id' => $id]);

        if ($val->run() == false) {
            $result = [
                'success' => false,
                'message' => validation_errors()
            ];
        } else {
            $this->db->trans_begin();

            $data = [
                'nama_barang' => $nama_barang,
                'merk_produk' => $merk_produk,
                'nomor_seri' => $nomor_seri,
                'keterangan' => $keterangan ,
                'ticket_id' => $idTicket
            ];

            $dataTicket = [
                'id' => $idTicket,
                'created_at' => date('Y-m-d H:i:s'),
                'title' => 'Pengajuan Aset',
				'description' => $keterangan,
                'pegawai_id' => $this->session->id,
                'status_id' => '1'
            ];

            $dataLayanan = [
                'kategori_layanan_id' => $id_kategori_layanan,
                'bidang_id' => '1',
                'ticket_id' => $idTicket
            ];

            if ($check->num_rows() > 0) :
                // $data['mtime'] = date('Y-m-d H:i:s');
                $this->mdl->update($table, $data, ['id' => $id]);
                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil diubah'
                ];
            else :
                // $data['ctime'] = date('Y-m-d H:i:s');
                $this->mdl->save('ticket', $dataTicket);
                $this->mdl->save('tr_layanan', $dataLayanan);
                $this->mdl->save($table, $data);

                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil disimpan'
                ];

            endif;
        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $result['console_message'] = 'Data gagal disimpan [Rollback DB]';
        else :
            $this->db->trans_commit();
            $result['console_message'] = 'Data berhasil disimpan [Commit DB]';
        endif;

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($result));
    }

    function fsid4101_save() {
        $table = 'f_sid4101';

        $id = $this->input->post('id');
        $idTicket = $this->functions->generateTicket();
        $id_kategori_layanan = $this->input->post('id_kategori_layanan');
        $nama_lengkap    = $this->input->post('nama_lengkap');
        $unit_kerja  = $this->input->post('unit_kerja');
        $nip  = $this->input->post('nip');
        $jabatan   = $this->input->post('jabatan');
        $nama_barang   = $this->input->post('nama_barang');
        $merk_produk   = $this->input->post('merk_produk');
        $nomor_seri   = $this->input->post('nomor_seri');
        $keterangan   = $this->input->post('keterangan');

        $this->load->library('form_validation');

        $val    = $this->form_validation;

        $rules = [
            [
                'field' => 'unit_kerja',
                'label' => 'Unit Kerja',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'nama_barang',
                'label' => 'nama_barang',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'nomor_seri',
                'label' => 'nomor_seri',
                'rules' => 'required|trim'
            ],
        ];

        $this->functions->alert($val);

        $val->set_rules($rules);

        $check = $this->mdl->getWhere($table, ['id' => $id]);

        if ($val->run() == false) {
            $result = [
                'success' => false,
                'message' => validation_errors()
            ];
        } else {
            $this->db->trans_begin();

            $data = [
                'nama_barang' => $nama_barang,
                'merk_produk' => $merk_produk,
                'nomor_seri' => $nomor_seri,
                'keterangan' => $keterangan,
                'ticket_id' => $idTicket
            ];

            $dataTicket = [
                'id' => $idTicket,
                'created_at' => date('Y-m-d H:i:s'),
                'title' => 'Inseiden Keamanan Informasi',
				'description' => $keterangan,
                'pegawai_id' => $this->session->id,
                'status_id' => '1'
            ];

            $dataLayanan = [
                'kategori_layanan_id' => $id_kategori_layanan,
                'bidang_id' => '1',
                'ticket_id' => $idTicket
            ];

            if ($check->num_rows() > 0) :
                // $data['mtime'] = date('Y-m-d H:i:s');
                $this->mdl->update($table, $data, ['id' => $id]);
                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil diubah'
                ];
            else :
                // $data['ctime'] = date('Y-m-d H:i:s');
                $this->mdl->save('ticket', $dataTicket);
                $this->mdl->save('tr_layanan', $dataLayanan);
                $this->mdl->save($table, $data);

                $result = [
                    'success'   => true,
                    'message'   => 'Request berhasil disimpan'
                ];

            endif;
        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $result['console_message'] = 'Data gagal disimpan [Rollback DB]';
        else :
            $this->db->trans_commit();
            $result['console_message'] = 'Data berhasil disimpan [Commit DB]';
        endif;

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($result));
    }

}
