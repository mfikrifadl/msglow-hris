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

    function cURL_API($id = "", $method = "", $data)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost/msglow-career/api/registrant/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => array(
                'token: YOZq0ltM8i',
                'Authorization: Basic YWNjZXNzdG86Y2FyZWVyMTIzNDU='
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

    public function data_notif_phl($id = "")
    {
        $dataHeader['action'] = 'Data Notifikasi Recruitment PHL';
        $dataHeader['menu']   = 'Recruitment PHL';
        $dataHeader['file']   = 'Peserta Diterima';
        $data['row'] = $this->db->query("SELECT *, sum(nilai_wawancara_hr + nilai_interview_user_1 ) AS total_nilai FROM recruitment_phl WHERE `status` = 'lolos' OR `status` = 'Menjadi Pegawai'  OR `status` = 'validasi' GROUP BY `id_recruitment_phl` ORDER BY kode_wawancara DESC ")->result_array();

        //======================NOTIFIKASI===============================================================
		$dataHeader['notif_absensi']				= $this->model->notifAbsensi();
		$dataHeader['data_notif_absen']				= $this->model->View('v_data_notif_absen');

		$total_peserta_diterima_staff				= $this->db->query("SELECT COUNT(IF(status='lolos', status, NULL)) AS jml_lolos, COUNT(IF(status='validasi', status, NULL)) AS jml_validasi	FROM recruitment");
		$dataHeader['jml_notif_psrt_diterima_staff']		= $total_peserta_diterima_staff->result_array();

		$total_peserta_diterima_phl					= $this->db->query("SELECT COUNT(IF(status='lolos', status, NULL)) AS jml_lolos, COUNT(IF(status='validasi', status, NULL)) AS jml_validasi	FROM recruitment_phl");
		$dataHeader['jml_notif_psrt_diterima_phl']		= $total_peserta_diterima_phl->result_array();

		$data_notif_psrt_staff						= $this->db->query("SELECT * FROM recruitment WHERE status='lolos' OR status='validasi'");
		$dataHeader['data_notif_recruitment_staff']	= $data_notif_psrt_staff->result_array();

		$data_notif_psrt_phl						= $this->db->query("SELECT * FROM recruitment_phl WHERE status='lolos' OR status='validasi'");
		$dataHeader['data_notif_recruitment_phl']	= $data_notif_psrt_phl->result_array();
		//======================NOTIFIKASI===============================================================

        $dataHeader['data_notif_rec_phl']        = $this->model->DataNotifikasiPesertaDiterimaPhl($id);

        $this->load->view('admin/container/header', $dataHeader);
        $this->load->view('admin/recruitment_phl/tb_data_notif_phl', $data);
        $this->load->view('admin/container/footer');
    }

    public function view_wawancara_phl($Id = "")
    {
        $Aksi = "";
        $dataHeader['action']     = $Aksi;
        $dataHeader['menu']       = 'Recruitment';
        $dataHeader['file']       = 'View Wawancara';
        $data['wawancara']    = $this->model->ViewWhere('recruitment_phl', 'kode_wawancara', $Id);

        $content             = $this->cURL_API($Id, 'GET', '');
        $data2                 = json_decode($content, true);
        $data['registrant']    = $data2['data'];

        //======================NOTIFIKASI===============================================================
		$dataHeader['notif_absensi']				= $this->model->notifAbsensi();
		$dataHeader['data_notif_absen']				= $this->model->View('v_data_notif_absen');

		$total_peserta_diterima_staff				= $this->db->query("SELECT COUNT(IF(status='lolos', status, NULL)) AS jml_lolos, COUNT(IF(status='validasi', status, NULL)) AS jml_validasi	FROM recruitment");
		$dataHeader['jml_notif_psrt_diterima_staff']		= $total_peserta_diterima_staff->result_array();

		$total_peserta_diterima_phl					= $this->db->query("SELECT COUNT(IF(status='lolos', status, NULL)) AS jml_lolos, COUNT(IF(status='validasi', status, NULL)) AS jml_validasi	FROM recruitment_phl");
		$dataHeader['jml_notif_psrt_diterima_phl']		= $total_peserta_diterima_phl->result_array();

		$data_notif_psrt_staff						= $this->db->query("SELECT * FROM recruitment WHERE status='lolos' OR status='validasi'");
		$dataHeader['data_notif_recruitment_staff']	= $data_notif_psrt_staff->result_array();

		$data_notif_psrt_phl						= $this->db->query("SELECT * FROM recruitment_phl WHERE status='lolos' OR status='validasi'");
		$dataHeader['data_notif_recruitment_phl']	= $data_notif_psrt_phl->result_array();
		//======================NOTIFIKASI===============================================================

        $this->load->view('admin/container/header', $dataHeader);
        $this->load->view('admin/recruitment_phl/view_wawancara_phl', $data);
        $this->load->view('admin/container/footer');
    }

    public function administrasi($Aksi = "", $Id = "")
    {

        $dataHeader['action']     = $Aksi;
        $dataHeader['menu']       = 'Recruitment PHL';
        $dataHeader['file']       = 'Administrasi';
        $data['row']        = $this->model->ViewWhereNot('recruitment', 'recruitment', 'tidaklolos');
        $data['tdklolos']    = $this->model->ViewWhere('recruitment', 'recruitment', 'tidaklolos');
        $data['data_recruitment_phl']    = $this->model->GetDataTeLolosAdmPHL();
        $data['data_recruitment_tidak_lolos_phl']    = $this->model->GetDataTesTidakLolosPHL();

        $response             = $this->cURL_API('', 'GET', '');
        $data2                 = json_decode($response, true);

        $data['registrant']    = $data2['data'];
        $data['levels']    = $this->model->view('level', 'id_level');
        $data['lokasis']    = $this->model->view('kategori_phl', 'lokasi');

        if ($Aksi == 'edit') {
            $data['field']     = $this->model->ViewWhere('recruitment_phl', 'id_recruitment_phl', $Id);
        }

        //======================NOTIFIKASI===============================================================
		$dataHeader['notif_absensi']				= $this->model->notifAbsensi();
		$dataHeader['data_notif_absen']				= $this->model->View('v_data_notif_absen');

		$total_peserta_diterima_staff				= $this->db->query("SELECT COUNT(IF(status='lolos', status, NULL)) AS jml_lolos, COUNT(IF(status='validasi', status, NULL)) AS jml_validasi	FROM recruitment");
		$dataHeader['jml_notif_psrt_diterima_staff']		= $total_peserta_diterima_staff->result_array();

		$total_peserta_diterima_phl					= $this->db->query("SELECT COUNT(IF(status='lolos', status, NULL)) AS jml_lolos, COUNT(IF(status='validasi', status, NULL)) AS jml_validasi	FROM recruitment_phl");
		$dataHeader['jml_notif_psrt_diterima_phl']		= $total_peserta_diterima_phl->result_array();

		$data_notif_psrt_staff						= $this->db->query("SELECT * FROM recruitment WHERE status='lolos' OR status='validasi'");
		$dataHeader['data_notif_recruitment_staff']	= $data_notif_psrt_staff->result_array();

		$data_notif_psrt_phl						= $this->db->query("SELECT * FROM recruitment_phl WHERE status='lolos' OR status='validasi'");
		$dataHeader['data_notif_recruitment_phl']	= $data_notif_psrt_phl->result_array();
		//======================NOTIFIKASI===============================================================

        $this->load->view('admin/container/header', $dataHeader);
        $this->load->view('admin/recruitment_phl/administrasi', $data);
        $this->load->view('admin/container/footer');
    }

    public function administrasi_id($Id = "")
    {
        $content = $this->cURL_API($Id, 'GET', '');

        echo $content;
    }

    public function delete_registrant($id = "")
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost/msglow-career/api/registrant/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 'is_delete=1',
            CURLOPT_HTTPHEADER => array(
                'token: YOZq0ltM8i',
                'Authorization: Basic YWNjZXNzdG86Y2FyZWVyMTIzNDU=',
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        redirect('recruitment_phl/administrasi');
    }

    public function wawancara_hr($Aksi = "", $Id = "")
    {
        $dataHeader['action'] = $Aksi;
        $dataHeader['menu']   = 'Recruitment PHL';
        $dataHeader['file']   = 'Wawancara HR';
        $data['controller_name']   = 'wawancara_hr';
        $data['nilai_test'] = 'nilai_wawancara_hr';
        $data['date'] = 'tgl_wawancara_hr';

        if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) {
            $data['row']    = $this->db->get_where('recruitment_phl', ['administrasi' => 'lolos'])->result_array();
        } else {
            $data['row']    = $this->db->get_where('recruitment_phl', ['administrasi' => 'lolos', 'level_id' => $this->session->userdata('level')])->result_array();
        }

        if ($Aksi == 'edit') {
            $data['field'] = $this->model->ViewWhere('recruitment_phl', 'id_recruitment_phl', $Id);
        }

        //======================NOTIFIKASI===============================================================
		$dataHeader['notif_absensi']				= $this->model->notifAbsensi();
		$dataHeader['data_notif_absen']				= $this->model->View('v_data_notif_absen');

		$total_peserta_diterima_staff				= $this->db->query("SELECT COUNT(IF(status='lolos', status, NULL)) AS jml_lolos, COUNT(IF(status='validasi', status, NULL)) AS jml_validasi	FROM recruitment");
		$dataHeader['jml_notif_psrt_diterima_staff']		= $total_peserta_diterima_staff->result_array();

		$total_peserta_diterima_phl					= $this->db->query("SELECT COUNT(IF(status='lolos', status, NULL)) AS jml_lolos, COUNT(IF(status='validasi', status, NULL)) AS jml_validasi	FROM recruitment_phl");
		$dataHeader['jml_notif_psrt_diterima_phl']		= $total_peserta_diterima_phl->result_array();

		$data_notif_psrt_staff						= $this->db->query("SELECT * FROM recruitment WHERE status='lolos' OR status='validasi'");
		$dataHeader['data_notif_recruitment_staff']	= $data_notif_psrt_staff->result_array();

		$data_notif_psrt_phl						= $this->db->query("SELECT * FROM recruitment_phl WHERE status='lolos' OR status='validasi'");
		$dataHeader['data_notif_recruitment_phl']	= $data_notif_psrt_phl->result_array();
		//======================NOTIFIKASI===============================================================

        $this->load->view('admin/container/header', $dataHeader);
        $this->load->view('admin/recruitment_phl/recruitment_form', $data);
        $this->load->view('admin/container/footer');
    }
    public function interview_user_1($Aksi = "", $Id = "")
    {
        $dataHeader['action'] = $Aksi;
        $dataHeader['menu']   = 'Recruitment PHL';
        $dataHeader['file']   = 'Interview User 1';
        $data['controller_name']   = 'interview_user_1';
        $data['nilai_test'] = 'nilai_interview_user_1';
        $data['date'] = 'tgl_interview_user_1';

        if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2 || $this->session->userdata('level') == 4) {
            $data['row']    = $this->db->get_where('recruitment_phl', ['administrasi' => 'lolos', 'wawancara_hr' => 'lolos'])->result_array();
        } else {
            $data['row']    = $this->db->get_where('recruitment_phl', ['administrasi' => 'lolos', 'wawancara_hr' => 'lolos', 'level_id' => $this->session->userdata('level')])->result_array();
        }

        if ($Aksi == 'edit') {
            $data['field'] = $this->model->ViewWhere('recruitment_phl', 'id_recruitment_phl', $Id);
        }

        //======================NOTIFIKASI===============================================================
		$dataHeader['notif_absensi']				= $this->model->notifAbsensi();
		$dataHeader['data_notif_absen']				= $this->model->View('v_data_notif_absen');

		$total_peserta_diterima_staff				= $this->db->query("SELECT COUNT(IF(status='lolos', status, NULL)) AS jml_lolos, COUNT(IF(status='validasi', status, NULL)) AS jml_validasi	FROM recruitment");
		$dataHeader['jml_notif_psrt_diterima_staff']		= $total_peserta_diterima_staff->result_array();

		$total_peserta_diterima_phl					= $this->db->query("SELECT COUNT(IF(status='lolos', status, NULL)) AS jml_lolos, COUNT(IF(status='validasi', status, NULL)) AS jml_validasi	FROM recruitment_phl");
		$dataHeader['jml_notif_psrt_diterima_phl']		= $total_peserta_diterima_phl->result_array();

		$data_notif_psrt_staff						= $this->db->query("SELECT * FROM recruitment WHERE status='lolos' OR status='validasi'");
		$dataHeader['data_notif_recruitment_staff']	= $data_notif_psrt_staff->result_array();

		$data_notif_psrt_phl						= $this->db->query("SELECT * FROM recruitment_phl WHERE status='lolos' OR status='validasi'");
		$dataHeader['data_notif_recruitment_phl']	= $data_notif_psrt_phl->result_array();
		//======================NOTIFIKASI===============================================================

        $this->load->view('admin/container/header', $dataHeader);
        $this->load->view('admin/recruitment_phl/recruitment_form', $data);
        $this->load->view('admin/container/footer');
    }

    public function tes_kesehatan_phl($Aksi = "", $Id = "")
    {
        // echo"$Aksi - $Id";
        $dataHeader['action'] = $Aksi;
        $dataHeader['menu']   = 'Recruitment PHL';
        $dataHeader['file']   = 'Tes Kesehatan';
        $data['controller_name']   = 'tes_kesehatan_phl';
        $data['hasil_tes_kesehatan'] = $this->model->ViewWhere('recruitment_phl', 'id_recruitment_phl', $Id);
        $data['date'] = 'tgl_tes_kesehatan_phl';

        if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) {
            $data['row']    = $this->db->get_where('recruitment_phl', ['administrasi' => 'lolos', 'wawancara_hr' => 'lolos', 'interview_user_1' => 'lolos'])->result_array();
        } else {
            $data['row']    = $this->db->get_where('recruitment_phl', ['administrasi' => 'lolos', 'wawancara_hr' => 'lolos', 'interview_user_1' => 'lolos', 'level_id' => $this->session->userdata('level')])->result_array();
        }

        if ($Aksi == 'edit') {
            $data['field'] = $this->model->ViewWhere('recruitment_phl', 'id_recruitment_phl', $Id);
        }

        //======================NOTIFIKASI===============================================================
		$dataHeader['notif_absensi']				= $this->model->notifAbsensi();
		$dataHeader['data_notif_absen']				= $this->model->View('v_data_notif_absen');

		$total_peserta_diterima_staff				= $this->db->query("SELECT COUNT(IF(status='lolos', status, NULL)) AS jml_lolos, COUNT(IF(status='validasi', status, NULL)) AS jml_validasi	FROM recruitment");
		$dataHeader['jml_notif_psrt_diterima_staff']		= $total_peserta_diterima_staff->result_array();

		$total_peserta_diterima_phl					= $this->db->query("SELECT COUNT(IF(status='lolos', status, NULL)) AS jml_lolos, COUNT(IF(status='validasi', status, NULL)) AS jml_validasi	FROM recruitment_phl");
		$dataHeader['jml_notif_psrt_diterima_phl']		= $total_peserta_diterima_phl->result_array();

		$data_notif_psrt_staff						= $this->db->query("SELECT * FROM recruitment WHERE status='lolos' OR status='validasi'");
		$dataHeader['data_notif_recruitment_staff']	= $data_notif_psrt_staff->result_array();

		$data_notif_psrt_phl						= $this->db->query("SELECT * FROM recruitment_phl WHERE status='lolos' OR status='validasi'");
		$dataHeader['data_notif_recruitment_phl']	= $data_notif_psrt_phl->result_array();
		//======================NOTIFIKASI===============================================================

        $this->load->view('admin/container/header', $dataHeader);
        $this->load->view('admin/recruitment_phl/recruitment_form', $data);
        $this->load->view('admin/container/footer');
    }

    public function peserta_diterima($Aksi = "", $Id = "")
    {
        $dataHeader['action'] = $Aksi;
        $dataHeader['menu']   = 'Recruitment PHL';
        $dataHeader['file']   = 'Peserta Diterima';

        $data['row'] = $this->db->query("SELECT *, sum(nilai_wawancara_hr + nilai_interview_user_1 ) AS total_nilai FROM recruitment_phl WHERE `status` = 'lolos' OR `status` = 'Menjadi Pegawai'  OR `status` = 'validasi' GROUP BY `id_recruitment_phl` ORDER BY kode_wawancara DESC ")->result_array();

        //======================NOTIFIKASI===============================================================
		$dataHeader['notif_absensi']				= $this->model->notifAbsensi();
		$dataHeader['data_notif_absen']				= $this->model->View('v_data_notif_absen');

		$total_peserta_diterima_staff				= $this->db->query("SELECT COUNT(IF(status='lolos', status, NULL)) AS jml_lolos, COUNT(IF(status='validasi', status, NULL)) AS jml_validasi	FROM recruitment");
		$dataHeader['jml_notif_psrt_diterima_staff']		= $total_peserta_diterima_staff->result_array();

		$total_peserta_diterima_phl					= $this->db->query("SELECT COUNT(IF(status='lolos', status, NULL)) AS jml_lolos, COUNT(IF(status='validasi', status, NULL)) AS jml_validasi	FROM recruitment_phl");
		$dataHeader['jml_notif_psrt_diterima_phl']		= $total_peserta_diterima_phl->result_array();

		$data_notif_psrt_staff						= $this->db->query("SELECT * FROM recruitment WHERE status='lolos' OR status='validasi'");
		$dataHeader['data_notif_recruitment_staff']	= $data_notif_psrt_staff->result_array();

		$data_notif_psrt_phl						= $this->db->query("SELECT * FROM recruitment_phl WHERE status='lolos' OR status='validasi'");
		$dataHeader['data_notif_recruitment_phl']	= $data_notif_psrt_phl->result_array();
		//======================NOTIFIKASI===============================================================

        $this->load->view('admin/container/header', $dataHeader);
        $this->load->view('admin/recruitment_phl/peserta_diterima', $data);
        $this->load->view('admin/container/footer');
    }

    public function monitoring_status($Aksi = "", $Id = "")
    {
        $dataHeader['action'] = $Aksi;
        $dataHeader['menu']   = 'Recruitment PHL';
        $dataHeader['file']   = 'Monitoring Status';
        $data['row']    = $this->model->View('recruitment_phl', 'kode_wawancara');
        $data['nilai'] = $this->db->query("SELECT *, sum(nilai_wawancara_hr+ nilai_interview_user_1 ) AS total_nilai FROM recruitment_phl GROUP BY `id_recruitment_phl` ORDER BY kode_wawancara DESC ")->result_array();

        //======================NOTIFIKASI===============================================================
		$dataHeader['notif_absensi']				= $this->model->notifAbsensi();
		$dataHeader['data_notif_absen']				= $this->model->View('v_data_notif_absen');

		$total_peserta_diterima_staff				= $this->db->query("SELECT COUNT(IF(status='lolos', status, NULL)) AS jml_lolos, COUNT(IF(status='validasi', status, NULL)) AS jml_validasi	FROM recruitment");
		$dataHeader['jml_notif_psrt_diterima_staff']		= $total_peserta_diterima_staff->result_array();

		$total_peserta_diterima_phl					= $this->db->query("SELECT COUNT(IF(status='lolos', status, NULL)) AS jml_lolos, COUNT(IF(status='validasi', status, NULL)) AS jml_validasi	FROM recruitment_phl");
		$dataHeader['jml_notif_psrt_diterima_phl']		= $total_peserta_diterima_phl->result_array();

		$data_notif_psrt_staff						= $this->db->query("SELECT * FROM recruitment WHERE status='lolos' OR status='validasi'");
		$dataHeader['data_notif_recruitment_staff']	= $data_notif_psrt_staff->result_array();

		$data_notif_psrt_phl						= $this->db->query("SELECT * FROM recruitment_phl WHERE status='lolos' OR status='validasi'");
		$dataHeader['data_notif_recruitment_phl']	= $data_notif_psrt_phl->result_array();
		//======================NOTIFIKASI===============================================================

        $this->load->view('admin/container/header', $dataHeader);
        $this->load->view('admin/recruitment_phl/monitoring_status', $data);
        $this->load->view('admin/container/footer');
    }
}
