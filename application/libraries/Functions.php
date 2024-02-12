<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Carbon\Carbon;

class Functions{

    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
      }

      function check_session(){
          if(!isset($this->CI->session->logged_in)){
              return redirect('logout');
          }
      }

      function check_session_pegawai(){
        if(!isset($this->CI->session->logged_in)){
            return redirect('keluar');
        }
    }

      function greeting() {
          $jam = date('G');
          $sapa = "";
        if ( $jam >= 3 && $jam <= 10 ) {
            $sapa = "Selamat Pagi";
        } else if ( $jam >= 11 && $jam <= 13 ) {
            $sapa = "Selamat Siang";
        } else if ( $jam >= 14 && $jam <= 18 ) {
                $sapa = "Selamat Sore";
        } else if ( $jam >= 19 || $jam <= 2 ) {
            $sapa = "Selamat Malam";
        }
        return $sapa;
      }

      function alert($val) {
        $alert = array(
            'required' => '{field} wajib di isi',
            'integer' => '{field} harus berupa digit angka',
            'is_unique' => '{field} sudah diregistrasi',
            'exact_length' => '{field} harus berisi {param} digit angka',
            'min_length' => '{field} harus berisi minimal {param} karakter',
            'valid_email' => '{field} tidak valid',
            'matches' => '{field} harus sesuai dengan {param}',
            'checkType' => '{field} tidak boleh ada simbol khusus kecuali "_" underscore'
        );
        $val->set_message($alert);
        $val->set_error_delimiters('<div class="text-danger">', '</div>');
    }

    function unique_salt() {
        return substr(sha1(mt_rand()), 0, 22);
    }

    function hash($password) {
        return crypt($password, self::$algo .
            self::$cost .
            '$' . self::unique_salt());
    }

    function generateTicket(){
        $query = $this->CI->db->query("SELECT MAX(RIGHT(id,3)) AS kd_max FROM ticket WHERE DATE(created_at)=CURDATE()");
        $kode = "";
        if($query->num_rows() > 0){
            foreach($query->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kode = sprintf("%03s", $tmp);
            }
        }else{
            $kode = "001";
        }
        // date_default_timezone_set('Asia/Jakarta');
        return date('ymd') . $kode;
    }

    function generateTicketByFaq(){
        $query = $this->CI->db->query("SELECT MAX(RIGHT(id,3)) AS kd_max FROM ticket WHERE DATE(created_at)=CURDATE()");
        $kode = "";
        if($query->num_rows() > 0){
            foreach($query->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kode = sprintf("%03s", $tmp);
            }
        }else{
            $kode = "001";
        }
        // date_default_timezone_set('Asia/Jakarta');
        return date('ymd') . $kode;
    }

    /* ------------------------------
    // Konversi tanggal tgl indo ke sql
    //
    // Usage :  convert_date_sql("31/12/2014") return 2014-12-31
    -------------------------------*/
    public function convert_date_sql($date) {
        // list($day, $month, $year) = split('[/.-]', $date); => DEPRECATED
        list($day, $month, $year) = preg_split('/[\/\.\-]/', $date);
        return "$year-".sprintf("%02d", $month)."-".sprintf("%02d", $day);
    }
}
