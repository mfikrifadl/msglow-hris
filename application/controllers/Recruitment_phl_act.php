<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recruitment_phl_act extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        //MenLoad model yang berada di Folder Model dan namany model
        $this->load->model('model');
        // Meload Library session 
        $this->load->library('session');
        //Meload database
        $this->load->database();
        //Meload url 
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('download');
    }

    public  function Date2String($dTgl)
    {
        //return 2012-11-22
        list($cDate, $cMount, $cYear)    = explode("-", $dTgl);
        if (strlen($cDate) == 2) {
            $dTgl    = $cYear . "-" . $cMount . "-" . $cDate;
        }
        return $dTgl;
    }

    public  function String2Date($dTgl)
    {
        //return 22-11-2012  
        list($cYear, $cMount, $cDate)    = explode("-", $dTgl);
        if (strlen($cYear) == 4) {
            $dTgl    = $cDate . "-" . $cMount . "-" . $cYear;
        }
        return $dTgl;
    }

    public function TimeStamp()
    {
        date_default_timezone_set("Asia/Jakarta");
        $Data = date("H:i:s");
        return $Data;
    }

    public function DateStamp()
    {
        date_default_timezone_set("Asia/Jakarta");
        $Data = date("d-m-Y");
        return $Data;
    }

    public function DateTimeStamp()
    {
        date_default_timezone_set("Asia/Jakarta");
        $Data = date("Y-m-d h:i:s");
        return $Data;
    }

    public function administrasi($Type = "", $id = "")
    {
        $status_tes = $this->input->post('cStatus');
        $code = $this->input->post('cKodeWawancara');
        $data_create = array();
        
        if ($status_tes == "tidaklolos") {
            $data_create = array(
                'kode_wawancara' => $this->input->post('cKodeWawancara'),
                'tanggal_wawancara'    => $this->input->post('dTglWawancara'),
                'nama'    => $this->input->post('cNama'),
                'created_by'    => $this->input->post('whois'),
                'nomor_telepon'    => $this->input->post('cNomorTelepon'),
                'administrasi'    => $this->input->post('cStatus'),
                'email'    => $this->input->post('cEmail'),
                'level_id'    => $this->input->post('cLevel'),
                'kategori_phl_id'    => $this->input->post('cKategori'),
                'divisi'    => $this->input->post('cDivisi'),
                'job_id'    => $this->input->post('cJob_id'),
                'tahap_r'            => 'Test Administrasi',
                'status'            => 'tidaklolos',
                'wawancara_hr'            => 'tidaklolos',
                'interview_user_1'            => 'tidaklolos',
                'tes_kesehatan_phl'            => 'tidaklolos',
            );
        } else {
            $data_create = array(
                'kode_wawancara' => $this->input->post('cKodeWawancara'),
                'tanggal_wawancara'    => $this->input->post('dTglWawancara'),
                'nama'    => $this->input->post('cNama'),
                'created_by'    => $this->input->post('whois'),
                'nomor_telepon'    => $this->input->post('cNomorTelepon'),
                'administrasi'    => $this->input->post('cStatus'),
                'email'    => $this->input->post('cEmail'),
                'level_id'    => $this->input->post('cLevel'),
                'kategori_phl_id'    => $this->input->post('cKategori'),
                'divisi'    => $this->input->post('cDivisi'),
                'job_id'    => $this->input->post('cJob_id'),
                'tahap_r'            => 'Test Administrasi',
                'status'    => 'on review',
                'status'            => 'on review',
                'wawancara_hr'            => 'on review',
                'interview_user_1'            => 'on review',
                'tes_kesehatan_phl'            => 'on review',
            );
        }
        $data_update = array();
        if ($status_tes == "tidaklolos") {
            $data_update = array(
                'kode_wawancara' => $this->input->post('cKodeWawancara'),
                'tanggal_wawancara'    => $this->input->post('dTglWawancara'),
                'nama'    => $this->input->post('cNama'),
                'update_by'    => $this->input->post('whois'),
                'nomor_telepon'    => $this->input->post('cNomorTelepon'),
                'administrasi'    => $this->input->post('cStatus'),
                'level_id'    => $this->input->post('cLevel'),
                'email'    => $this->input->post('cEmail'),
                'kategori_phl_id'    => $this->input->post('cKategori'),
                'divisi'    => $this->input->post('cDivisi'),
                'tahap_r'            => 'Test Administrasi',
                'job_id'    => $this->input->post('cJob_id'),
                'status'            => 'tidaklolos',
                'wawancara_hr'            => 'tidaklolos',
                'interview_user_1'            => 'tidaklolos',
                'tes_kesehatan_phl'            => 'tidaklolos',
            );
        } else {
            $data_update = array(
                'kode_wawancara' => $this->input->post('cKodeWawancara'),
                'tanggal_wawancara'    => $this->input->post('dTglWawancara'),
                'nama'    => $this->input->post('cNama'),
                'update_by'    => $this->input->post('whois'),
                'nomor_telepon'    => $this->input->post('cNomorTelepon'),
                'administrasi'    => $this->input->post('cStatus'),
                'level_id'    => $this->input->post('cLevel'),
                'email'    => $this->input->post('cEmail'),
                'kategori_phl_id'    => $this->input->post('cKategori'),
                'divisi'    => $this->input->post('cDivisi'),
                'tahap_r'            => 'Test Administrasi',
                'job_id'    => $this->input->post('cJob_id'),
                'status'            => 'on review',
                'wawancara_hr'            => 'on review',
                'interview_user_1'            => 'on review',
                'tes_kesehatan_phl'            => 'on review',
            );
        }

        $data_delete = array(
            'status_email_adm'    => 'Belum Kirim Email',
            'status_email_tidaklolos'    => 'Belum Kirim Email',
            'is_delete' => 1
        );

        $data = array(
            'kode_wawancara' => $this->input->post('cKodeWawancara'),
            'tanggal_wawancara'    => $this->input->post('dTglWawancara'),
            'nama'    => $this->input->post('cNama'),
            'created_by'    => $this->input->post('whois'),
            'update_by'    => $this->input->post('whois'),
            'nomor_telepon'    => $this->input->post('cNomorTelepon'),
            'administrasi'    => $this->input->post('cStatus'),
            'level_id'    => $this->input->post('cLevel'),
            'email'    => $this->input->post('cEmail'),
            'kategori_phl_id'    => $this->input->post('cKategori'),
            'divisi'    => $this->input->post('cDivisi'),
            'tahap_r'            => 'Test Administrasi',
            'job_id'    => $this->input->post('cJob_id'),
        );

        $seralizedArray = serialize($data);
        $vaLog = array(
            'tgl' => $this->Date2String($this->DateStamp()),
            'waktu' => $this->TimeStamp(),
            'nama_table' => 'recruitment_phl',
            'action' => $Type,
            'query' => $seralizedArray,
            'nama' => $this->session->userdata('nama')
        );
        $this->model->Insert("log", $vaLog);
        $cViewDataPelamar 			= $this->model->CekDataPelamar('recruitment_phl', 'kode_wawancara', $code);
		if ($cViewDataPelamar->num_rows() > 0) {
			
		} else {
			if ($Type == "Insert") {
                $this->model->Insert('recruitment_phl', $data_create);
                $this->model->Insert("log", $vaLog);
            } 
		}
        if ($Type == "Update") {
            $this->model->Update('recruitment_phl', 'id_recruitment_phl', $id, $data_update);
            $this->model->Insert("log", $vaLog);
        } elseif ($Type == "Delete") {
            $this->model->Update_Delete('recruitment_phl', 'id_recruitment_phl', $id, $data_delete);
            redirect(site_url('recruitment_phl/administrasi/'));
        }
    }

    public function wawancara_hr($Type = "", $id = "")
    {
        $whois = $this->session->userdata('nama');
        date_default_timezone_set('Asia/Jakarta');
        $whois_date = date('d-m-Y H:i:s');

        $dbKode = $this->db->query("SELECT * FROM recruitment_phl WHERE id_recruitment_phl = '" . $this->input->post('cIdTest') . "' ");

        foreach ($dbKode->result_array() as $key => $vaKode) {
            $cKodeWawancara = $vaKode['kode_wawancara'];
        }

        $status_tes = $this->input->post('cStatus');
        $data_update = array();
        if ($status_tes == "tidaklolos") {
            $data_update = array(
                'update_by'    => $this->input->post('whois'),
                'update_date'    => $this->input->post('whois_date'),
                'nilai_wawancara_hr'    => $this->input->post('nNilaiTes'),
                'tgl_wawancara_hr'    => $this->input->post('dTglWawancara'),
                'wawancara_hr'    => $this->input->post('cStatus'),
                'tahap_r'            => 'Wawancara HR',
                'status_email_wawancara_hr'    => 'Belum Kirim Email',
                'status_email_tidaklolos'    => 'Belum Kirim Email',
                'status'            => 'tidaklolos',
                'administrasi'            => 'tidaklolos',
                'interview_user_1'            => 'tidaklolos',
                'tes_kesehatan_phl'            => 'tidaklolos',
            );
        } else {
            $data_update = array(
                'update_by'    => $this->input->post('whois'),
                'update_date'    => $this->input->post('whois_date'),
                'nilai_wawancara_hr'    => $this->input->post('nNilaiTes'),
                'tgl_wawancara_hr'    => $this->input->post('dTglWawancara'),
                'wawancara_hr'    => $this->input->post('cStatus'),
                'tahap_r'            => 'Wawancara HR',
                'status_email_wawancara_hr'    => 'Belum Kirim Email',
                'status_email_tidaklolos'    => 'Belum Kirim Email',
                'status'            => 'on review',
                'interview_user_1'            => 'on review',
                'tes_kesehatan_phl'            => 'on review',
            );
        }

        $data_update_delete = array(
            'status_email_adm'    => 'Belum Kirim Email',
            'status_email_tidaklolos'    => 'Belum Kirim Email',
            'is_delete' => 1

        );

        $data = array(
            'id_wawancara' => $this->input->post('cIdTest'),
            'kode_wawancara'    => $cKodeWawancara,
            'nilai_wawancara_hr'    => $this->input->post('nNilaiTes'),
            'tgl_wawancara_hr'    => $this->input->post('dTglWawancara'),
            'wawancara_hr'    => $this->input->post('cStatus'),
            'tahap_r'            => 'Wawancara HR',
            'status_email_wawancara_hr'    => 'Belum Kirim Email',
            'status_email_tidaklolos'    => 'Belum Kirim Email',
        );

        $seralizedArray = serialize($data);
        $vaLog = array(
            'tgl' => $this->Date2String($this->DateStamp()),
            'waktu' => $this->TimeStamp(),
            'nama_table' => 'recruitment_phl',
            'action' => $Type,
            'query' => $seralizedArray,
            'nama' => $this->session->userdata('nama')
        );
        $this->model->Insert("log", $vaLog);

        if ($Type == "Delete") {
            $this->model->Update_Delete('recruitment_phl', 'id_recruitment_phl', $this->input->post('cIdTest'), $data_update_delete);
            redirect(site_url('recruitment_phl/wawancara_hr'));
        } else {
            $this->model->Update('recruitment_phl', 'id_recruitment_phl', $this->input->post('cIdTest'), $data_update);
            redirect(site_url('recruitment_phl/wawancara_hr'));
        }
    }
    public function interview_user_1($Type = "", $id = "")
    {
        $whois = $this->session->userdata('nama');
        date_default_timezone_set('Asia/Jakarta');
        $whois_date = date('d-m-Y H:i:s');

        $dbKode = $this->db->query("SELECT * FROM recruitment_phl WHERE id_recruitment_phl = '" . $this->input->post('cIdTest') . "' ");

        foreach ($dbKode->result_array() as $key => $vaKode) {
            $cKodeWawancara = $vaKode['kode_wawancara'];
        }
        $status_tes = $this->input->post('cStatus');
        $data_update = array();
        if ($status_tes == "tidaklolos") {
            $data_update = array(
                'update_by'    => $this->input->post('whois'),
                'update_date'    => $this->input->post('whois_date'),
                'nilai_interview_user_1'    => $this->input->post('nNilaiTes'),
                'tgl_interview_user_1'    => $this->input->post('dTglWawancara'),
                'interview_user_1'    => $this->input->post('cStatus'),
                'tahap_r'            => 'Interview User 1',
                'status_email_interview_u1'    => 'Belum Kirim Email',
                'status_email_tidaklolos'    => 'Belum Kirim Email',
                'status'            => 'tidaklolos',
                'administrasi'            => 'tidaklolos',
                'tes_kesehatan_phl'            => 'tidaklolos',
            );
        } else {
            $data_update = array(
                'update_by'    => $this->input->post('whois'),
                'update_date'    => $this->input->post('whois_date'),
                'nilai_interview_user_1'    => $this->input->post('nNilaiTes'),
                'tgl_interview_user_1'    => $this->input->post('dTglWawancara'),
                'interview_user_1'    => $this->input->post('cStatus'),
                'tahap_r'            => 'Interview User 1',
                'status_email_interview_u1'    => 'Belum Kirim Email',
                'status_email_tidaklolos'    => 'Belum Kirim Email',
                'status'            => 'on review',
                'tes_kesehatan_phl'            => 'on review',
            );
        }

        $data_update_delete = array(
            'is_delete' => 1,
            'delete_by'    => $whois,
            'delete_date'    => $whois_date,
        );

        $data = array(
            'id_wawancara' => $this->input->post('cIdTest'),
            'kode_wawancara'    => $cKodeWawancara,
            'nilai_interview_user_1'    => $this->input->post('nNilaiTes'),
            'tgl_interview_user_1'    => $this->input->post('dTglWawancara'),
            'interview_user_1'    => $this->input->post('cStatus'),
            'tahap_r'            => 'Interview User 1',
            'status_email_interview_u1'    => 'Belum Kirim Email',
            'status_email_tidaklolos'    => 'Belum Kirim Email',
        );

        $seralizedArray = serialize($data);
        $vaLog = array(
            'tgl' => $this->Date2String($this->DateStamp()),
            'waktu' => $this->TimeStamp(),
            'nama_table' => 'recruitment_phl',
            'action' => $Type,
            'query' => $seralizedArray,
            'nama' => $this->session->userdata('nama')
        );
        $this->model->Insert("log", $vaLog);

        if ($Type == "Delete") {
            $this->model->Update_Delete('recruitment_phl', 'id_recruitment_phl', $this->input->post('cIdTest'), $data_update_delete);
            redirect(site_url('recruitment_phl/interview_user_1'));
        } else {
            $this->model->Update('recruitment_phl', 'id_recruitment_phl', $this->input->post('cIdTest'), $data_update);
            redirect(site_url('recruitment_phl/interview_user_1'));
        }
    }

    public function tes_kesehatan_phl($Type = "", $id = "")
    {
        $whois = $this->session->userdata('nama');
        date_default_timezone_set('Asia/Jakarta');
        $whois_date = date('d-m-Y H:i:s');
        //==========================GET DATA FOTO =============================================
        $cKodeWawancara = $this->input->post('cKW');
        $cStatus = $this->input->post('cStatus');

        $folder = "";
        $file_temp = "";
        if ($cStatus == "pemanggilan" || $cStatus == "tidaklolos") {
            $folder = "";
        } else {
            $nama = $_FILES['cTesKes']['name'];
            $x = explode('.', $nama);
            $ekstensi = strtolower(end($x));
            $ukuran    = $_FILES['cTesKes']['size'];

            $nama_baru = $cKodeWawancara . "." . $ekstensi; //ganti nama file sesuai ekstensi
            $file_temp = $_FILES['cTesKes']['tmp_name']; //data temp yang di upload
            $folder    = "assets2/media/hasil_tes_kesehatan/$nama_baru"; //folder tujuan
        }
        //echo"$folder-$nama-$cKodeWawancara";
        //==========================GET DATA FOTO =============================================
        $dbKode = $this->db->query("SELECT * FROM recruitment_phl WHERE id_recruitment_phl = '" . $this->input->post('cIdTest') . "' ");

        $status = "";
        if ($cStatus == "lolos") {
            $status = "validasi";
        } else {
            $status = "tidaklolos";
        }
        foreach ($dbKode->result_array() as $key => $vaKode) {
            $cKodeWawancara = $vaKode['kode_wawancara'];
        }
        $data_update = array();
        $data_update_delete = array();
        $data = array();

        if ($cStatus == "pemanggilan" || $cStatus == "lolos") {
            $data_update = array(
                'update_by'    => $this->input->post('whois'),
                'update_date'    => $this->input->post('whois_date'),
                'hasil_tes_kesehatan_phl'    => $folder,
                'tes_kesehatan_phl'    => $this->input->post('cStatus'),
                'tgl_tes_kesehatan_phl'    => $this->input->post('dTglWawancara'),
                'status'    => $status,
                'tahap_r'    => 'Tes Kesehatan',
                'status_email_tes_kesehatan_phl'    => 'Belum Kirim Email',
                'status_email_tidaklolos'    => 'Belum Kirim Email',
            );

            $data_update_delete = array(
                'is_delete' => 1,
                'status_email_tes_kesehatan_phl'    => 'Belum Kirim Email',
                'status_email_tidaklolos'    => 'Belum Kirim Email',
                'delete_by'    => $whois,
                'delete_date'    => $whois_date,

            );

            $data = array(
                'update_by'    => $this->input->post('whois'),
                'update_date'    => $this->input->post('whois_date'),
                'hasil_tes_kesehatan_phl'    => $folder,
                'tes_kesehatan_phl'    => $this->input->post('cStatus'),
                'tgl_tes_kesehatan_phl'    => $this->input->post('dTglWawancara'),
                'status'    => $status,
                'tahap_r'    => 'Tes Kesehatan',
                'status_email_tes_kesehatan_phl'    => 'Belum Kirim Email',
                'status_email_tidaklolos'    => 'Belum Kirim Email',
            );
        } else {
            $data_update = array(
                'update_by'    => $this->input->post('whois'),
                'update_date'    => $this->input->post('whois_date'),
                'tes_kesehatan_phl'    => $this->input->post('cStatus'),
                'tgl_tes_kesehatan_phl'    => $this->input->post('dTglWawancara'),
                'status'    => $status,
                'tahap_r'    => 'Tes Kesehatan',
                'status_email_tes_kesehatan_phl'    => 'Belum Kirim Email',
                'status_email_tidaklolos'    => 'Belum Kirim Email',                
                'administrasi'            => 'tidaklolos',
                'wawancara_hr'            => 'tidaklolos',
                'interview_user_1'            => 'tidaklolos',
            );

            $data_update_delete = array(
                'is_delete' => 1,
                'status_email_tes_kesehatan_phl'    => 'Belum Kirim Email',
                'status_email_tidaklolos'    => 'Belum Kirim Email',
                'delete_by'    => $whois,
                'delete_date'    => $whois_date,

            );

            $data = array(
                'update_by'    => $this->input->post('whois'),
                'update_date'    => $this->input->post('whois_date'),
                'tes_kesehatan_phl'    => $this->input->post('cStatus'),
                'tgl_tes_kesehatan_phl'    => $this->input->post('dTglWawancara'),
                'status'    => $status,
                'tahap_r'    => 'Tes Kesehatan',
                'status_email_tes_kesehatan_phl'    => 'Belum Kirim Email',
                'status_email_tidaklolos'    => 'Belum Kirim Email',
            );
        }
        $seralizedArray = serialize($data);
        $vaLog = array(
            'tgl' => $this->Date2String($this->DateStamp()),
            'waktu' => $this->TimeStamp(),
            'nama_table' => 'recruitment_phl',
            'action' => $Type,
            'query' => $seralizedArray,
            'nama' => $this->session->userdata('nama')
        );
        $this->model->Insert("log", $vaLog);

        if ($Type == "Delete") {
            $this->model->Update_Delete('recruitment_phl', 'id_recruitment_phl', $this->input->post('cIdTest'), $data_update_delete);
            redirect(site_url('recruitment_phl/tes_kesehatan_phl'));
        } else {
            if ($data_update['tes_kesehatan_phl'] == 'lolos') {
                $data_update['status'] == 'lolos';
            }
            move_uploaded_file($file_temp, $folder); //fungsi upload
            $this->model->Update('recruitment_phl', 'id_recruitment_phl', $this->input->post('cIdTest'), $data_update);
            redirect(site_url('recruitment_phl/tes_kesehatan_phl'));
        }
    }

    public function to_pegawai_phl($id = "")
    {
        // echo "$id";
        $whois = $this->session->userdata('nama');
        date_default_timezone_set('Asia/Jakarta');
        $whois_date = date('d-m-Y H:i:s');

        $dbKode = $this->db->query("SELECT * FROM recruitment_phl WHERE id_recruitment_phl = '" . $id . "' ");

        foreach ($dbKode->result_array() as $key => $vaKode) {
            $cKodeWawancara = $vaKode['kode_wawancara'];
            $cNama             = $vaKode['nama'];
            $cNomorTelepon    = $vaKode['nomor_telepon'];
            $cEmail         = $vaKode['email'];
        }

        $dbPegawai = $this->db->query("SELECT * FROM tb_pegawai ORDER BY nik DESC LIMIT 1 ");
        $setNik = "";
        foreach ($dbPegawai->result_array() as $keyNik => $vaKodeNik) {
            $cNik             = $vaKodeNik['nik'];
            if ($cNik == NULL) {
                $cYear = date('Y');
                $month = date('m');
                $year = substr($cYear, 2);
                $setNik = "99" . $year . "" . $month . "0001";
            } else {
                $intNik = intval($cNik);
                $setNik = $intNik + 1;
            }
        }

        $data = array(
            'created_by' => $whois,
            'created_date'    => $whois_date,
            'kode_wawancara'    => $setNik,
            'nik'        => $setNik,
            'nama'        => $cNama,
            'id_status'    => 3,
            'tanggal_masuk_kerja' => date("Y-m-d"),
        );
        $dataStatus = array(
            'status' => 'Menjadi Pegawai',
            'update_by' => $whois,
            'update_date'    => $whois_date,
        );

        $seralizedArray = serialize($data);
        $vaLog = array(
            'tgl' => $this->Date2String($this->DateStamp()),
            'waktu' => $this->TimeStamp(),
            'nama_table' => 'tb_pegawai',
            'action' => 'Insert',
            'query' => $seralizedArray,
            'nama' => $this->session->userdata('nama')
        );
        $this->model->Insert("log", $vaLog);

        $seralizedArray = serialize($dataStatus);
        $vaLog = array(
            'tgl' => $this->Date2String($this->DateStamp()),
            'waktu' => $this->TimeStamp(),
            'nama_table' => 'recruitment_phl',
            'action' => 'Update',
            'query' => $seralizedArray,
            'nama' => $this->session->userdata('nama')
        );
        $this->model->Insert("log", $vaLog);

        $this->model->Insert('tb_pegawai', $data);
        $this->model->Update('recruitment_phl', 'id_recruitment_phl', $id, $dataStatus);
        redirect(site_url('recruitment_phl/peserta_diterima/I'));
    }

    public function aksi($Aksi = '', $Id = '')
    {
        $data_lolos = array(
            'status' => 'lolos'
        );
        $data_tidak_lolos = array(
            'status' => 'tidaklolos',
            'alasan_tidak_lolos' => $this->input->post('alasanTidakLolos')
        );
        if ($Aksi == 'lolos') {
            $this->model->Update('recruitment_phl', 'id_recruitment_phl', $Id, $data_lolos);
        } elseif ($Aksi == 'tidaklolos') {
            $this->model->Update('recruitment_phl', 'id_recruitment_phl', $Id, $data_tidak_lolos);
        }
        redirect(site_url('recruitment_phl/peserta_diterima'));
    }
}
