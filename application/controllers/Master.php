<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
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
		$data[] = "";
		if ($Action == "error") {
			$data['notif'] = "Username / Password Salah";
			$this->load->view('admin/login', $data);
		} else {
			$data['notif'] = " ";
			$this->load->view('admin/login', $data);
		}
		// $this->load->view('admin/login', $data);
	}

	public function LoginAdmin()
	{
		$nRow = $this->model->LoginAdmin($_POST['username'], $_POST['password']);
		if ($nRow->num_rows() > 0) {
			foreach ($nRow->result_array() as $Row) {
				$Nama		= $Row['nama'];
				$Level 		= $Row['level'];
				$User		= $Row['user'];
				$Id			= $Row['id'];
				$is_interview = $Row['is_interview'];
			}
			$this->load->library('session');
			$this->session->set_userdata('nama', $Nama);
			$this->session->set_userdata('user', $User);
			$this->session->set_userdata('level', $Level);
			$this->session->set_userdata('is_interview', $is_interview);
			$this->session->set_userdata('id', $Id);
			$data = array(
				'LastLogin' => $this->DateTimeStamp(),
			);
			$this->model->Update('username', 'user', $_POST['username'], $data);
			redirect(site_url('admin/index'));
		} else {
			redirect(site_url('admin/signin/error'));
		}
	}

	public function logout()
	{
		$data = array(
			'LastLogout' => $this->DateTimeStamp(),
		);
		$this->model->Update('username', 'user', $this->session->userdata('user'), $data);
		$this->session->sess_destroy();
		redirect(site_url('master/signin'));
	}

	public function index($Aksi = "")
	{
		$dataHeader['action'] = $Aksi;
		$dataHeader['menu']   = 'Master';
		$dataHeader['file']   = 'Home';

		date_default_timezone_set('Asia/Jakarta');
		$tgl_now = date('Y-m-d H:i:s');
		$tgl_week = date('Y-m-d H:i:s', time() - (60 * 60 * 24 * 7));

		$a_tgl_now = explode(" ", $tgl_now);
		$t_tgl_now = $a_tgl_now[0];

		$a_tgl_week = explode(" ", $tgl_week);
		$t_tgl_week = $a_tgl_week[0];
		
		$query 							= $this->db->query('SELECT * FROM tb_pegawai WHERE MONTH(tanggal_lahir) = MONTH(NOW()) AND DAY(tanggal_lahir) = DAY(NOW())');
		$total_pegawai					= $this->db->query('SELECT COUNT(id_pegawai) AS jml_pegawai FROM tb_pegawai WHERE id_status = 3 OR id_status = 4 OR id_status = 5 OR id_status_mengundurkan_diri < 6 OR id_status_mengundurkan_diri > 11');
		$query_p_kontrak 				= $this->db->query('SELECT COUNT(id_pegawai) AS jml_pegawai_kontrak FROM tb_pegawai	WHERE id_status = 4 OR id_status_mengundurkan_diri = 4');
		$query_p_phl 					= $this->db->query('SELECT COUNT(id_pegawai) AS jml_pegawai_phl FROM tb_pegawai	WHERE id_status = 3 OR id_status_mengundurkan_diri = 3');
		$query_p_eksternal 				= $this->db->query('SELECT COUNT(id_pegawai) AS jml_pegawai_eksternal FROM tb_pegawai WHERE id_status = 5 OR id_status_mengundurkan_diri = 5');
		$total_pegawai_pria				= $this->db->query('SELECT COUNT(id_pegawai) AS jml_pegawai_pria FROM tb_pegawai WHERE jk = 1 OR id_status_mengundurkan_diri < 6 OR id_status_mengundurkan_diri > 11');
		$total_pegawai_wanita			= $this->db->query('SELECT COUNT(id_pegawai) AS jml_pegawai_wanita FROM tb_pegawai WHERE jk = 2 OR id_status_mengundurkan_diri < 6 OR id_status_mengundurkan_diri > 11');

		$data['kontrak']				= $this->model->View('v_tb_pegawai');
		$data['log_absen']				= $this->model->ViewOvertimePerWeek($t_tgl_week, $t_tgl_now);
		$data['ultah']					= $query->result_array();
		$data['jml_pegawai_pria']		= $total_pegawai_pria->result_array();
		$data['jml_pegawai_wanita']		= $total_pegawai_wanita->result_array();
		$data['ultah']					= $query->result_array();
		$data['jml_pegawai_kontrak']	= $query_p_kontrak->result_array();
		$data['jml_pegawai_eksternal']	= $query_p_eksternal->result_array();
		$data['jml_pegawai_phl']		= $query_p_phl->result_array();
		$data['tot_pegawai']			= $total_pegawai->result_array();
		$data['harlah']					= $this->model->View('v_tb_ultah');
		$data['tgl_sekarang']			= $tgl_now;
		$data['tgl_7_hari_sebelum']		= $tgl_week;
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
		$this->load->view('admin/master/dashboard', $data);
		$this->load->view('admin/container/footer');
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

	public function bpjs($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen HRD'; //data header
		$dataHeader['file'] = 'DATA BPJS'; // data header
		$dataHeader['action'] = $Aksi; // data header
		$data['row']	= $this->model->View('v_bpjs', 'id_pegawai');
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tb_bpjs', 'id_bpjs', $Id);
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
		$this->load->view('admin/master/bpjs', $data);
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

	public function supervisor($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen PEGAWAI'; // data header
		$dataHeader['file'] = 'SUPERVISOR'; // data header
		$dataHeader['action'] = $Aksi; // data header

		$data['row']	= $this->model->ViewASC('tb_spv', 'nama');
		$data['outlet']	= $this->model->View('tb_outlet', 'id_outlet');
		if ($Aksi == 'edit') {
			$data['spv']   = $this->model->ViewWhere('tb_outlet', 'id_spv', $Id);
			$data['field'] = $this->model->ViewWhere('tb_spv', 'id_spv', $Id);
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
		$this->load->view('admin/master/supervisor', $data);
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

	public function tim_khusus($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen HRD'; // data header
		$dataHeader['file'] = 'TIM KHUSUS'; // data header
		$dataHeader['action'] = $Aksi; // data header
		$data['row']	= $this->relasi->GetDataTimKhusus();
		$data['tim']	= $this->model->View('tb_kategori_tim_khusus', 'id_kategori_tim_khusus');
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tb_tim_khusus', 'id_tim_khusus', $Id);
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
		$this->load->view('admin/master/tim_khusus', $data);
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
