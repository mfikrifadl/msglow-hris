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
            'status'    => 'pending',
        );

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
        );

        $seralizedArray = serialize($data);
        $vaLog = array(
            'tgl' => $this->Date2String($this->DateStamp()),
            'waktu' => $this->TimeStamp(),
            'nama_table' => 'recruitment',
            'action' => $Type,
            'query' => $seralizedArray,
            'nama' => $this->session->userdata('nama')
        );
        $this->model->Insert("log", $vaLog);

        if ($Type == "Insert") {
            $this->model->Insert('recruitment_phl', $data_create);
            $this->model->Insert("log", $vaLog);
        } elseif ($Type == "Update") {
            $this->model->Update('recruitment_phl', 'id_recruitment_phl', $id, $data_update);
            $this->model->Insert("log", $vaLog);
        } elseif ($Type == "Delete") {
            $this->model->Delete('recruitment_phl', 'id_recruitment_phl', $id);
            redirect(site_url('recruitment_phl/administrasi/'));
        }
    }

    public function wawancara_hr($Type = "", $id = "")
    {
        $whois = $this->session->userdata('nama');
        date_default_timezone_set('Asia/Jakarta');
        $whois_date = date('d-m-Y H:i:s');

        $dbKode = $this->db->query("SELECT * FROM recruitment WHERE id_recruitment = '" . $this->input->post('cIdTest') . "' ");

        foreach ($dbKode->result_array() as $key => $vaKode) {
            $cKodeWawancara = $vaKode['kode_wawancara'];
        }

        $data_update = array(
            'update_by'    => $this->input->post('whois'),
            'update_date'    => $this->input->post('whois_date'),
            'nilai_wawancara_hr'    => $this->input->post('nNilaiTes'),
            'tgl_wawancara_hr'    => $this->input->post('dTglWawancara'),
            'wawancara_hr'    => $this->input->post('cStatus'),
        );

        $data_update_delete = array(
            'is_delete' => 1,
            'delete_by'    => $whois,
            'delete_date'    => $whois_date,

        );

        $data = array(
            'id_wawancara' => $this->input->post('cIdTest'),
            'kode_wawancara'    => $cKodeWawancara,
            'nilai_wawancara_hr'    => $this->input->post('nNilaiTes'),
            'tgl_wawancara_hr'    => $this->input->post('dTglWawancara'),
            'wawancara_hr'    => $this->input->post('cStatus'),
        );

        $seralizedArray = serialize($data);
        $vaLog = array(
            'tgl' => $this->Date2String($this->DateStamp()),
            'waktu' => $this->TimeStamp(),
            'nama_table' => 'recruitment',
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

        $dbKode = $this->db->query("SELECT * FROM recruitment WHERE id_recruitment = '" . $this->input->post('cIdTest') . "' ");

        foreach ($dbKode->result_array() as $key => $vaKode) {
            $cKodeWawancara = $vaKode['kode_wawancara'];
        }

        $data_update = array(
            'update_by'    => $this->input->post('whois'),
            'update_date'    => $this->input->post('whois_date'),
            'nilai_interview_user_1'    => $this->input->post('nNilaiTes'),
            'tgl_interview_user_1'    => $this->input->post('dTglWawancara'),
            'interview_user_1'    => $this->input->post('cStatus'),
            'status'    => 'lolos',
        );

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
            'status'    => 'lolos',
        );

        $seralizedArray = serialize($data);
        $vaLog = array(
            'tgl' => $this->Date2String($this->DateStamp()),
            'waktu' => $this->TimeStamp(),
            'nama_table' => 'recruitment',
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
}
