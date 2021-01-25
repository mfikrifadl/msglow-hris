<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recruitment_phl extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        //MenLoad model yang berada di Folder Model dan namany model
        $this->load->model('model');
        $this->load->model('relasi');
        // Meload Library session 
        $this->load->library('session');
        //Meload database
        $this->load->database();
        //Meload url 
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('download');
    }

    public function administrasi($Aksi = "", $Id = "")
    {
        $data['action']     = $Aksi;
        $data['menu']       = 'Recruitment PHL';
        $data['file']       = 'Administrasi';
        $data['row']        = $this->model->ViewWhereNot('recruitment_phl', 'administrasi', 'tidaklolos');
        $data['tdklolos']    = $this->model->ViewWhere('recruitment_phl', 'administrasi', 'tidaklolos');

        $url                 = 'http://127.0.0.1/career/administrator/rest_api/';
        $content             = file_get_contents($url); // put the contents of the file into a variable
        $data2                 = json_decode($content, true);
        $data['registrant']    = $data2['data'];
        $data['levels']    = $this->model->view('level', 'id_level');
        $data['lokasis']    = $this->model->view('kategori_phl', 'id_kategori_phl');

        if ($Aksi == 'edit') {
            $data['field']     = $this->model->ViewWhere('recruitment_phl', 'id_recruitment_phl', $Id);
        }

        $this->load->view('admin/container/header', $data);
        $this->load->view('admin/recruitment_phl/administrasi', $data);
        $this->load->view('admin/container/footer');
    }

    public function wawancara_hr($Aksi = "", $Id = "")
    {
        $data['action'] = $Aksi;
        $data['menu']   = 'Recruitment PHL';
        $data['file']   = 'Wawancara HR';
        $data['controller_name']   = 'wawancara_hr';
        $data['nilai_test'] = 'nilai_wawancara_hr';
        $data['date'] = 'tgl_wawancara_hr';
        $data['row']    = $this->db->get_where('recruitment_phl', ['administrasi' => 'lolos'])->result_array();
        if ($Aksi == 'edit') {
            $data['field'] = $this->model->ViewWhere('recruitment_phl', 'id_recruitment_phl', $Id);
        }
        $this->load->view('admin/container/header', $data);
        $this->load->view('admin/recruitment_phl/recruitment_form', $data);
        $this->load->view('admin/container/footer');
    }
    public function interview_user_1($Aksi = "", $Id = "")
    {
        $data['action'] = $Aksi;
        $data['menu']   = 'Recruitment PHL';
        $data['file']   = 'Interview User 1';
        $data['controller_name']   = 'interview_user_1';
        $data['nilai_test'] = 'nilai_interview_user_1';
        $data['date'] = 'tgl_interview_user_1';
        $data['row']    = $this->db->get_where('recruitment_phl', ['administrasi' => 'lolos', 'wawancara_hr' => 'lolos'])->result_array();
        if ($Aksi == 'edit') {
            $data['field'] = $this->model->ViewWhere('recruitment_phl', 'id_recruitment_phl', $Id);
        }
        $this->load->view('admin/container/header', $data);
        $this->load->view('admin/recruitment_phl/recruitment_form', $data);
        $this->load->view('admin/container/footer');
    }

    public function peserta_diterima($Aksi = "", $Id = "")
    {
        $data['action'] = $Aksi;
        $data['menu']   = 'Recruitment PHL';
        $data['file']   = 'Peserta Diterima';
        $data['row'] = $this->db->query("SELECT *, sum(nilai_wawancara_hr + nilai_interview_user_1 ) AS total_nilai FROM recruitment_phl WHERE `status` = 'lolos' OR `status` = 'Menjadi Pegawai'  OR `status` = 'validasi' GROUP BY `id_recruitment_phl` ORDER BY kode_wawancara DESC ")->result_array();

        $this->load->view('admin/container/header', $data);
        $this->load->view('admin/recruitment_phl/peserta_diterima', $data);
        $this->load->view('admin/container/footer');
    }

    public function monitoring_status($Aksi = "", $Id = "")
    {
        $data['action'] = $Aksi;
        $data['menu']   = 'Recruitment PHL';
        $data['file']   = 'Monitoring Status';
        $data['row']    = $this->model->View('recruitment_phl', 'kode_wawancara');
        $data['nilai'] = $this->db->query("SELECT *, sum(nilai_wawancara_hr+ nilai_interview_user_1 ) AS total_nilai FROM recruitment_phl GROUP BY `id_recruitment_phl` ORDER BY kode_wawancara DESC ")->result_array();

        $this->load->view('admin/container/header', $data);
        $this->load->view('admin/recruitment_phl/monitoring_status', $data);
        $this->load->view('admin/container/footer');
    }
}
