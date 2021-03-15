<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_data extends CI_Controller
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

	public function operator($Aksi = "", $Id = "")
	{
		$dataHeader['action'] = $Aksi;
		$dataHeader['menu']   = 'Master';
		$dataHeader['file']   = 'Operator';
		$data['row']	= $this->model->View('operator', 'id_operator');
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('operator', 'id_operator', $Id);
		}
		$this->load->view('admin/container/header', $dataHeader);
		$this->load->view('admin/master/operator', $data);
		$this->load->view('admin/container/footer');
	}

	public function area_kerja($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen HRD'; //data header
		$dataHeader['file'] = 'DATA AREA KERJA'; //data header
		$dataHeader['action'] = $Aksi; //data header

		$data['row']	= $this->model->View('tb_area_kerja', 'id_area');
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tb_area_kerja', 'id_area', $Id);
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
		$this->load->view('admin/master/area_kerja', $data);
		$this->load->view('admin/container/footer');
	}

	public function unit_kerja($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen HRD'; //data header
		$dataHeader['file'] = 'DATA UNIT KERJA'; //data header
		$dataHeader['action'] = $Aksi; //data header

		$data['row']	= $this->model->View('tb_unit_kerja', 'id_unit_kerja');
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tb_unit_kerja', 'id_unit_kerja', $Id);
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
		$this->load->view('admin/master/unit_kerja', $data);
		$this->load->view('admin/container/footer');
	}

	public function sub_unit_kerja($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] 	= 'Manajemen HRD'; //data header
		$dataHeader['file'] 	= 'DATA SUB UNIT KERJA'; //data header
		$dataHeader['action'] 	=  $Aksi;
		$data['unit_kerja'] 	=  $this->model->View('tb_unit_kerja', 'id_unit_kerja');
		$data['row']			=  $this->relasi->GetDataSubUnitKerja();
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tb_sub_unit_kerja', 'id_sub_unit_kerja', $Id);
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
		$this->load->view('admin/master/sub_unit_kerja', $data);
		$this->load->view('admin/container/footer');
	}

	public function ref_jabatan($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen HRD'; //data header
		$dataHeader['file'] = 'REFERENSI JABATAN'; //data header
		$dataHeader['action'] = $Aksi; //data header

		$data['row']	= $this->model->View('tb_ref_jabatan', 'id_ref_jabatan');
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tb_ref_jabatan', 'id_ref_jabatan', $Id);
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
		$this->load->view('admin/master/ref_jabatan', $data);
		$this->load->view('admin/container/footer');
	}

	public function status_karyawan($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen HRD'; //data header
		$dataHeader['file'] = 'STATUS KERJA KARYAWAN'; //data header
		$dataHeader['action'] = $Aksi; //data header

		$data['row']	= $this->model->View('tb_status_karyawan', 'id_status');
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tb_status_karyawan', 'id_status', $Id);
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
		$this->load->view('admin/master/status_karyawan', $data);
		$this->load->view('admin/container/footer');
	}

	public function tingkat_pendidikan($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen HRD'; // data header
		$dataHeader['file'] = 'TINGKAT PENDIDIKAN'; // data header
		$dataHeader['action'] = $Aksi; // data header

		$data['row']	= $this->model->View('tb_pendidikan', 'id_pendidikan');
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tb_pendidikan', 'id_pendidikan', $Id);
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
		$this->load->view('admin/master/tingkat_pendidikan', $data);
		$this->load->view('admin/container/footer');
	}

	public function golongan($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen HRD'; // data header
		$dataHeader['file'] = 'GOLONGAN'; // data header
		$dataHeader['action'] = $Aksi; // data header

		$data['row']	= $this->model->View('tb_golongan', 'id_golongan');
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tb_golongan', 'id_golongan', $Id);
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
		$this->load->view('admin/master/golongan', $data);
		$this->load->view('admin/container/footer');
	}

	public function outlet($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen HRD'; // data header
		$dataHeader['file'] = 'OUTLET'; // data header
		$dataHeader['action'] = $Aksi; // data header

		$data['row']	= $this->relasi->GetDataOutlet();
		$data['area']	= $this->model->View('tb_area_kerja', 'id_area');
		// $data['spv']	= $this->model->View('tb_spv', 'id_spv');
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tb_outlet', 'id_outlet', $Id);
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
		$this->load->view('admin/master/outlet', $data);
		$this->load->view('admin/container/footer');
	}

	public function error($Aksi = "")
	{
		$data['menu'] = 'other';
		$data['file'] = 'error';
		$data['action'] = $Aksi;
		$this->load->view('admin/index', $data);
	}

	public function backup($Aksi = "")
	{
		$data['menu'] 	= 'other';
		$data['file'] 	= 'backup';
		$data['action'] = $Aksi;
		$this->load->view('admin/index', $data);
	}
	public function prosesBackup($file)
	{
		redirect(site_url('admin/'));
	}
	public function restore($Aksi = "")
	{
		$data['menu'] 	= 'other';
		$data['file'] 	= 'restore';
		$data['action'] = $Aksi;
		$this->load->view('admin/index', $data);
	}
	public function download($file)
	{
		$this->load->helper('download');
		$name = $file;
		$data = file_get_contents(APPPATH . 'backup/' . $file . '');
		force_download($name, $data);
	}
}
