<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recruitment extends CI_Controller
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
	public  function Date2String($dTgl)
	{
		//return 2012-11-22
		list($cDate, $cMount, $cYear)	= explode("-", $dTgl);
		if (strlen($cDate) == 2) {
			$dTgl	= $cYear . "-" . $cMount . "-" . $cDate;
		}
		return $dTgl;
	}

	public  function String2Date($dTgl)
	{
		//return 22-11-2012  
		list($cYear, $cMount, $cDate)	= explode("-", $dTgl);
		if (strlen($cYear) == 4) {
			$dTgl	= $cDate . "-" . $cMount . "-" . $cYear;
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
	public function signin($Action = "")
	{
		$data = "";
		if ($Action == "error") {
			$data['notif'] = "Username / Password Salah";
		}
		$this->load->view('admin/login', $data);
	}

	public function cURL_API($id="",$method=""){
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://localhost/msglow-career/api/registrant/'.$id,
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

	public function wawancara($Aksi = "", $Id = "")
	{
		$data['action'] 	= $Aksi;
		$data['menu']   	= 'Recruitment';
		$data['file']   	= 'Wawancara';
		$data['row']		= $this->model->ViewWhereNot('recruitment', 'recruitment', 'tidaklolos');
		$data['tdklolos']	= $this->model->ViewWhere('recruitment', 'recruitment', 'tidaklolos');

		$response 			= $this->cURL_API('','GET');
		$data2 				= json_decode($response, true);
		$data['registrant']	= $data2['data'];

		$data['levels']	= $this->model->view('level', 'id_level');

		if ($Aksi == 'edit') {
			$data['field'] 	= $this->model->ViewWhere('recruitment', 'kode_wawancara', $Id);
		}

		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/recruitment/wawancara', $data);
		$this->load->view('admin/container/footer');
	}

	public function view_wawancara($Id = "")
	{
		$Aksi = "";
		$data['action'] 	= $Aksi;
		$data['menu']   	= 'Recruitment';
		$data['file']   	= 'View Wawancara';
		$data['wawancara']	= $this->model->ViewWhere('recruitment', 'kode_wawancara', $Id);

		$content 			= $this->cURL_API($Id,'GET');
		$data2 				= json_decode($content, true);
		$data['registrant']	= $data2['data'];

		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/recruitment/view_wawancara', $data);
		$this->load->view('admin/container/footer');
	}

	public function wawancara_id($Id = "")
	{
		$content = $this->cURL_API($Id,'GET');

		echo $content;
	}

	public function psiko_test($Aksi = "", $Id = "")
	{
		$data['action'] = $Aksi;
		$data['menu']   = 'Recruitment';
		$data['file']   = 'Psiko Test';
		$data['controller_name']   = 'psiko_test';
		$data['nilai_test'] = 'nilai_psiko_test';
		$data['date'] = 'tgl_psiko_test';
		$data['row']	= $this->db->get_where('recruitment', ['recruitment' => 'lolos'])->result_array();
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('recruitment', 'id_recruitment', $Id);
		}
		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/recruitment/recruitment_form', $data);
		$this->load->view('admin/container/footer');
	}
	public function uji_kompetensi($Aksi = "", $Id = "")
	{
		$data['action'] = $Aksi;
		$data['menu']   = 'Recruitment';
		$data['file']   = 'Uji Kompetensi';
		$data['controller_name']   = 'uji_kompetensi';
		$data['nilai_test'] = 'nilai_uji_kompetensi';
		$data['date'] = 'tgl_uji_kompetensi';
		$data['row']	= $this->db->get_where('recruitment', ['recruitment' => 'lolos', 'psiko_test' => 'lolos'])->result_array();
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('recruitment', 'id_recruitment', $Id);
		}
		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/recruitment/recruitment_form', $data);
		$this->load->view('admin/container/footer');
	}
	public function interview_user_1($Aksi = "", $Id = "")
	{
		$data['action'] = $Aksi;
		$data['menu']   = 'Recruitment';
		$data['file']   = 'Interview User 1';
		$data['nilai_test'] = 'nilai_interview_user_1';
		$data['controller_name']   = 'interview_user_1';
		$data['date'] = 'tgl_interview_user_1';
		if ($this->session->userdata('level') == 1) {
			$data['row']	= $this->db->get_where('recruitment', ['recruitment' => 'lolos', 'psiko_test' => 'lolos', 'uji_kompetensi' => 'lolos'])->result_array();
		} else {
			$data['row']	= $this->db->get_where('recruitment', ['recruitment' => 'lolos', 'psiko_test' => 'lolos', 'uji_kompetensi' => 'lolos', 'level_id' => $this->session->userdata('level')])->result_array();
		}
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('recruitment', 'id_recruitment', $Id);
		}
		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/recruitment/recruitment_form', $data);
		$this->load->view('admin/container/footer');
	}
	public function interview_user_2($Aksi = "", $Id = "")
	{
		$data['action'] = $Aksi;
		$data['menu']   = 'Recruitment';
		$data['file']   = 'Interview User 2';
		$data['controller_name']   = 'interview_user_2';
		$data['nilai_test']   = 'nilai_interview_user_2';
		$data['date'] = 'tgl_interview_user_2';
		if ($this->session->userdata('level') == 1) {
			$data['row']	= $this->db->get_where('recruitment', ['recruitment' => 'lolos', 'psiko_test' => 'lolos', 'uji_kompetensi' => 'lolos', 'interview_user_1' => 'lolos'])->result_array();
		} else {
			$data['row']	= $this->db->get_where('recruitment', ['recruitment' => 'lolos', 'psiko_test' => 'lolos', 'uji_kompetensi' => 'lolos', 'interview_user_1' => 'lolos', 'level_id' => $this->session->userdata('level')])->result_array();
		}
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('recruitment', 'id_recruitment', $Id);
		}
		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/recruitment/recruitment_form', $data);
		$this->load->view('admin/container/footer');
	}
	public function interview_hrga($Aksi = "", $Id = "")
	{
		$data['action'] = $Aksi;
		$data['menu']   = 'Recruitment';
		$data['file']   = 'Interview HRGA';
		$data['controller_name']   = 'interview_hrga';
		$data['nilai_test']   = 'nilai_interview_hrga';
		$data['date'] = 'tgl_interview_hrga';
		$data['row']	= $this->db->get_where('recruitment', ['recruitment' => 'lolos', 'psiko_test' => 'lolos', 'uji_kompetensi' => 'lolos', 'interview_user_1' => 'lolos', 'interview_user_2' => 'lolos'])->result_array();
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('recruitment', 'id_recruitment', $Id);
		}
		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/recruitment/recruitment_form', $data);
		$this->load->view('admin/container/footer');
	}

	public function monitoring_status($Aksi = "", $Id = "")
	{
		$data['action'] = $Aksi;
		$data['menu']   = 'Recruitment';
		$data['file']   = 'Monitoring Status';
		$data['row']	= $this->model->View('recruitment', 'kode_wawancara');
		$data['nilai'] = $this->db->query("SELECT *, sum(nilai_psiko_test + nilai_uji_kompetensi + nilai_interview_user_1 + nilai_interview_user_2 + nilai_interview_hrga) AS total_nilai FROM recruitment ORDER BY kode_wawancara DESC ")->result_array();

		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/recruitment/monitoring_status', $data);
		$this->load->view('admin/container/footer');
	}

	public function peserta_diterima($Aksi = "", $Id = "")
	{
		$data['action'] = $Aksi;
		$data['menu']   = 'Recruitment';
		$data['file']   = 'Peserta Diterima';
		$data['row'] = $this->db->query("SELECT *, sum(nilai_psiko_test + nilai_uji_kompetensi + nilai_interview_user_1 + nilai_interview_user_2 + nilai_interview_hrga) AS total_nilai FROM recruitment WHERE `status` = 'lolos' OR `status` = 'Menjadi Pegawai' OR `status` = 'validasi'  GROUP BY `id_recruitment` ORDER BY kode_wawancara DESC ")->result_array();

		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/recruitment/peserta_diterima', $data);
		$this->load->view('admin/container/footer');
	}
}
