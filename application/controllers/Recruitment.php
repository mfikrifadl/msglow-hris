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

	public function wawancara($Aksi = "", $Id = "")
	{
		$data['action'] 	= $Aksi;
		$data['menu']   	= 'Recruitment';
		$data['file']   	= 'Wawancara';
		$data['row']		= $this->model->ViewWhereNot('wawancara', 'status','tidaklolos');
		$data['tdklolos']	= $this->model->ViewWhere('wawancara', 'status', 'tidaklolos');

		$url 				= 'http://127.0.0.1/career/administrator/rest_api/';
		$content 			= file_get_contents($url); // put the contents of the file into a variable
		$data2 				= json_decode($content, true);
		$data['registrant']	= $data2['data'];

		if ($Aksi == 'edit') {
			$data['field'] 	= $this->model->ViewWhere('wawancara', 'kode_wawancara', $Id);
		}

		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/recruitment/wawancara', $data);
		$this->load->view('admin/container/footer');
	}

	public function view_wawancara($Id = ""){
		$Aksi = "";
		$data['action'] 	= $Aksi;
		$data['menu']   	= 'Recruitment';
		$data['file']   	= 'View Wawancara';
		$data['wawancara']	= $this->model->ViewWhere('wawancara', 'kode_wawancara', $Id);

		$url 				= 'http://127.0.0.1/career/administrator/rest_api?reg_id=' . $Id;
		$content 			= file_get_contents($url); // put the contents of the file into a variable
		$data2 				= json_decode($content, true);
		$data['registrant']	= $data2['data'];

		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/recruitment/view_wawancara', $data);
		$this->load->view('admin/container/footer');
	}

	public function wawancara_id($Id="")
	{
		$url 		= 'http://127.0.0.1/career/administrator/rest_api?reg_id=' . $Id;
		$content 	= file_get_contents($url); // put the contents of the file into a variable
		
		echo $content;
	}

	public function interview_user_1($Aksi = "", $Id = "")
	{
		$data['action'] 	= $Aksi;
		$data['menu']   	= 'Recruitment';
		$data['file']   	= 'Interview User 1';
		$data['row']		= $this->model->View('wawancara', 'kode_wawancara');

		$url 				= 'http://127.0.0.1/career/administrator/rest_api/';
		$content 			= file_get_contents($url); // put the contents of the file into a variable
		$data2 				= json_decode($content, true);
		$data['registrant']	= $data2['data'];

		if ($Aksi == 'edit') {
			$data['field'] 	= $this->model->ViewWhere('wawancara', 'kode_wawancara', $Id);
		}

		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/recruitment/interview_user_1', $data);
		$this->load->view('admin/container/footer');
	}

	public function tes_praktik($Aksi = "", $Id = "")
	{
		$data['action'] = $Aksi;
		$data['menu']   = 'Recruitment';
		$data['file']   = 'Tes Ketrampilan';
		$data['row']	= $this->model->View('v_tes_praktik', 'kode_wawancara');
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tes_praktik', 'id_tes_praktik', $Id);
		}
		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/recruitment/tes_praktik', $data);
		$this->load->view('admin/container/footer');
	}

	public function monitoring_status($Aksi = "", $Id = "")
	{
		$data['action'] = $Aksi;
		$data['menu']   = 'Recruitment';
		$data['file']   = 'Monitoring Status';
		$data['row']	= $this->model->View('wawancara', 'kode_wawancara');
		$data['praktik']	= $this->model->View('v_tes_praktik', 'kode_wawancara');

		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/recruitment/monitoring_status', $data);
		$this->load->view('admin/container/footer');
	}

	public function peserta_diterima($Aksi = "", $Id = "")
	{
		$data['action'] = $Aksi;
		$data['menu']   = 'Recruitment';
		$data['file']   = 'Peserta Diterima';

		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/recruitment/peserta_diterima', $data);
		$this->load->view('admin/container/footer');
	}
}
