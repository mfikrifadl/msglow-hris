<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recruitment_act extends CI_Controller
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

	// // public  function Date2String($dTgl){
	// // 	//return 2012-11-22
	// // 	list($cDate,$cMount,$cYear)	= explode("/",$dTgl) ;
	// // 	if(strlen($cDate) == 2){
	// // 		$dTgl	= $cYear . "/" . $cMount . "/" . $cDate ;
	// // 	}
	// // 	return $dTgl ; 
	// // }

	// // public  function String2Date($dTgl){
	// // 	//return 22-11-2012  
	// // 	list($cYear,$cMount,$cDate)	= explode("/",$dTgl) ;
	// // 	if(strlen($cYear) == 4){
	// // 		$dTgl	= $cDate . "/" . $cMount . "/" . $cYear ;
	// // 	} 
	// // 	return $dTgl ; 	
	// // }

	// public function TimeStamp()
	// {
	// 	date_default_timezone_set("Asia/Jakarta");
	// 	$Data = date("H:i:s");
	// 	return $Data;
	// }

	// public function DateStamp()
	// {
	// 	date_default_timezone_set("Asia/Jakarta");
	// 	$Data = date("d-m-Y");
	// 	return $Data;
	// }

	// public function DateTimeStamp()
	// {
	// 	date_default_timezone_set("Asia/Jakarta");
	// 	$Data = date("Y-m-d h:i:s");
	// 	return $Data;
	// }


	public function area_kerja($Type = "", $id = "")
	{
		$data = array(
			'nama_area' => $this->input->post('cNamaArea'),
			'kode_area'	=> $this->input->post('cKodeArea')
		);

		if ($Type == "Insert") {
			$this->model->Insert('tb_area_kerja', $data);
			redirect(site_url('master/area_kerja/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_area_kerja', 'id_area', $id, $data);
			redirect(site_url('master/area_kerja/U'));
		} elseif ($Type == "Delete") {
			$this->model->Delete('tb_area_kerja', 'id_area', $id);
			redirect(site_url('master/area_kerja/D'));
		}
	}

	public function wawancara($Type = "", $id = "")
	{
		$data_create = array(
			'kode_wawancara' => $this->input->post('cKodeWawancara'),
			'tanggal_wawancara'	=> $this->input->post('dTglWawancara'),
			'nama'	=> $this->input->post('cNama'),
			'created_by'	=> $this->input->post('whois'),
			'nomor_telepon'	=> $this->input->post('cNomorTelepon'),
			'status'	=> $this->input->post('cStatus'),
			'email'	=> $this->input->post('cEmail'),
		);

		$data_update = array(
			'kode_wawancara' => $this->input->post('cKodeWawancara'),
			'tanggal_wawancara'	=> $this->input->post('dTglWawancara'),
			'nama'	=> $this->input->post('cNama'),
			'update_by'	=> $this->input->post('whois'),
			'nomor_telepon'	=> $this->input->post('cNomorTelepon'),
			'status'	=> $this->input->post('cStatus'),
			'email'	=> $this->input->post('cEmail'),
		);

		$data = array(
			'kode_wawancara' => $this->input->post('cKodeWawancara'),
			'tanggal_wawancara'	=> $this->input->post('dTglWawancara'),
			'nama'	=> $this->input->post('cNama'),
			'created_by'	=> $this->input->post('whois'),
			'update_by'	=> $this->input->post('whois'),
			'nomor_telepon'	=> $this->input->post('cNomorTelepon'),
			'status'	=> $this->input->post('cStatus'),
			'email'	=> $this->input->post('cEmail'),
		);

		$seralizedArray = serialize($data);
		$vaLog = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'wawancara',
			'action' => $Type,
			'query' => $seralizedArray,
			'nama' => $this->session->userdata('nama')
		);
		$this->model->Insert("log", $vaLog);

		if ($Type == "Insert") {
			$this->model->Insert('wawancara', $data_create);
			$this->model->Insert("log", $vaLog);
			if ($data_create['status'] == 'lolos') {
				$wawancara = $this->model->viewWhere('wawancara', 'kode_wawancara', $this->input->post('cKodeWawancara'));
				$data_create_psiko = array(
					'id_wawancara' => $wawancara[0]['id_wawancara'],
					'kode_wawancara' => $this->input->post('cKodeWawancara'),
					'created_by'	=> $this->input->post('whois'),
					'status'	=> 'pemanggilan',
				);
				$this->model->Insert('psiko_test', $data_create_psiko);
			}
		} elseif ($Type == "Update") {
			$this->model->Update('wawancara', 'id_wawancara', $id, $data_update);
			$this->model->Insert("log", $vaLog);
			if ($data_update['status'] == 'lolos') {
				$wawancara = $this->model->viewWhere('wawancara', 'kode_wawancara', $this->input->post('cKodeWawancara'));
				$data_create_psiko = array(
					'id_wawancara' => $wawancara[0]['id_wawancara'],
					'kode_wawancara' => $this->input->post('cKodeWawancara'),
					'created_by'	=> $this->input->post('whois'),
					'status'	=> 'pemanggilan',
				);
				$this->model->Insert('psiko_test', $data_create_psiko);
			}
		} elseif ($Type == "Delete") {
			$this->model->Delete('wawancara', 'id_wawancara', $id);
			redirect(site_url('recruitment/wawancara/'));
		}
	}

	public function edit_wawancara($id)
	{
		$data = array(
			'id_wawancara' => $this->input->post('cIdWawancara'),
			'nama'	=> $this->input->post('cNama'),
			'nomor_telepon'	=> $this->input->post('cNomorTelepon'),
			'status'	=> $this->input->post('cStatus'),
			'email'	=> $this->input->post('cEmail'),
			'tahap'	=> $this->input->post('cTahap')
		);

		$seralizedArray = serialize($data);
		$vaLog = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'wawancara',
			'action' => 'Update',
			'query' => $seralizedArray,
			'nama' => $this->session->userdata('nama')
		);
		$this->model->Insert("log", $vaLog);

		$this->model->Update('wawancara', 'kode_wawancara', $id, $data);
	}

	public function tes_praktik($Type = "", $id = "")
	{
		$whois = $this->session->userdata('nama');
		date_default_timezone_set('Asia/Jakarta');
		$whois_date = date('d-m-Y H:i:s');

		$dbKode = $this->db->query("SELECT * FROM wawancara WHERE id_wawancara = '" . $this->input->post('cIdWawancara') . "' ");

		foreach ($dbKode->result_array() as $key => $vaKode) {
			$cKodeWawancara = $vaKode['kode_wawancara'];
		}

		$data_create = array(
			'id_wawancara' => $this->input->post('cIdWawancara'),
			'created_by'	=> $this->input->post('whois'),
			'created_date'	=> $this->input->post('whois_date'),
			'kode_wawancara'	=> $cKodeWawancara,
			'nilai_tes_praktik'	=> $this->input->post('nNilaiTes'),
			'status'	=> $this->input->post('cStatus'),
		);

		$data_update = array(
			'id_wawancara' => $this->input->post('cIdWawancara'),
			'update_by'	=> $this->input->post('whois'),
			'update_date'	=> $this->input->post('whois_date'),
			'kode_wawancara'	=> $cKodeWawancara,
			'nilai_tes_praktik'	=> $this->input->post('nNilaiTes'),
			'status'	=> $this->input->post('cStatus'),
		);

		$data_update_delete = array(
			'is_delete' => 1,
			'delete_by'	=> $whois,
			'delete_date'	=> $whois_date,

		);

		$data = array(
			'id_wawancara' => $this->input->post('cIdWawancara'),
			'kode_wawancara'	=> $cKodeWawancara,
			'nilai_tes_praktik'	=> $this->input->post('nNilaiTes'),
			'status'	=> $this->input->post('cStatus'),
		);

		$seralizedArray = serialize($data);
		$vaLog = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'tes_praktik',
			'action' => $Type,
			'query' => $seralizedArray,
			'nama' => $this->session->userdata('nama')
		);
		$this->model->Insert("log", $vaLog);

		if ($Type == "Insert") {
			$this->model->Insert('tes_praktik', $data_create);
			redirect(site_url('recruitment/tes_praktik/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tes_praktik', 'id_tes_praktik', $id, $data_update);
			redirect(site_url('recruitment/tes_praktik/U'));
		} elseif ($Type == "Delete") {
			$this->model->Update_Delete('tes_praktik', 'id_tes_praktik', $id, $data_update_delete);
			redirect(site_url('recruitment/tes_praktik/U'));
		}
	}
	public function psiko_test($Type = "", $id = "")
	{
		$whois = $this->session->userdata('nama');
		date_default_timezone_set('Asia/Jakarta');
		$whois_date = date('d-m-Y H:i:s');

		$dbKode = $this->db->query("SELECT * FROM wawancara WHERE id_wawancara = '" . $this->input->post('cIdWawancara') . "' ");

		foreach ($dbKode->result_array() as $key => $vaKode) {
			$cKodeWawancara = $vaKode['kode_wawancara'];
		}

		$data_update = array(
			'update_by'	=> $this->input->post('whois'),
			'update_date'	=> $this->input->post('whois_date'),
			'nilai_psiko_test'	=> $this->input->post('nNilaiTes'),
			'status'	=> $this->input->post('cStatus'),
		);

		$data_update_delete = array(
			'is_delete' => 1,
			'delete_by'	=> $whois,
			'delete_date'	=> $whois_date,

		);

		$data = array(
			'id_wawancara' => $this->input->post('cIdWawancara'),
			'kode_wawancara'	=> $cKodeWawancara,
			'nilai_tes_praktik'	=> $this->input->post('nNilaiTes'),
			'status'	=> $this->input->post('cStatus'),
		);

		$seralizedArray = serialize($data);
		$vaLog = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'tes_praktik',
			'action' => $Type,
			'query' => $seralizedArray,
			'nama' => $this->session->userdata('nama')
		);
		$this->model->Insert("log", $vaLog);

		if ($Type == "Delete") {
			$this->model->Update_Delete('psiko_test', 'id_psiko_test', $this->input->post('cIdPsikoTest'), $data_update_delete);
			redirect(site_url('recruitment/psiko_test'));
		} else {
			$this->model->Update('psiko_test', 'id_psiko_test', $this->input->post('cIdPsikoTest'), $data_update);
			if ($data_update['status'] == 'lolos') {
				$data_uji_competensi = array(
					'id_wawancara' => $this->input->post('cIdWawancara'),
					'kode_wawancara' => $cKodeWawancara,
					'created_by'	=> $this->input->post('whois'),
					'status'	=> 'pemanggilan',
				);
				$this->model->Insert('uji_kompetensi', $data_uji_competensi);
			}
			redirect(site_url('recruitment/psiko_test'));
		}
	}

	public function uji_kompetensi($Type = "", $id = "")
	{
		$whois = $this->session->userdata('nama');
		date_default_timezone_set('Asia/Jakarta');
		$whois_date = date('d-m-Y H:i:s');

		$dbKode = $this->db->query("SELECT * FROM wawancara WHERE id_wawancara = '" . $this->input->post('cIdWawancara') . "' ");

		foreach ($dbKode->result_array() as $key => $vaKode) {
			$cKodeWawancara = $vaKode['kode_wawancara'];
		}

		$data_update = array(
			'update_by'	=> $this->input->post('whois'),
			'update_date'	=> $this->input->post('whois_date'),
			'nilai_test'	=> $this->input->post('nNilaiTes'),
			'status'	=> $this->input->post('cStatus'),
		);

		$data_update_delete = array(
			'is_delete' => 1,
			'delete_by'	=> $whois,
			'delete_date'	=> $whois_date,

		);

		$data = array(
			'id_wawancara' => $this->input->post('cIdWawancara'),
			'kode_wawancara'	=> $cKodeWawancara,
			'nilai_tes_praktik'	=> $this->input->post('nNilaiTes'),
			'status'	=> $this->input->post('cStatus'),
		);

		$seralizedArray = serialize($data);
		$vaLog = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'tes_praktik',
			'action' => $Type,
			'query' => $seralizedArray,
			'nama' => $this->session->userdata('nama')
		);
		$this->model->Insert("log", $vaLog);

		if ($Type == "Delete") {
			$this->model->Update_Delete('uji_kompetensi', 'id_test', $this->input->post('cIdTest'), $data_update_delete);
			redirect(site_url('recruitment/uji_kompetensi'));
		} else {
			$this->model->Update('uji_kompetensi', 'id_test', $this->input->post('cIdTest'), $data_update);
			if ($data_update['status'] == 'lolos') {
				$data_interview_1 = array(
					'id_wawancara' => $this->input->post('cIdWawancara'),
					'kode_wawancara' => $cKodeWawancara,
					'created_by'	=> $this->input->post('whois'),
					'status'	=> 'pemanggilan',
				);
				$this->model->Insert('interview_user_1', $data_interview_1);
			}
			redirect(site_url('recruitment/uji_kompetensi'));
		}
	}
	public function interview_user_1($Type = "", $id = "")
	{
		$whois = $this->session->userdata('nama');
		date_default_timezone_set('Asia/Jakarta');
		$whois_date = date('d-m-Y H:i:s');

		$dbKode = $this->db->query("SELECT * FROM wawancara WHERE id_wawancara = '" . $this->input->post('cIdWawancara') . "' ");

		foreach ($dbKode->result_array() as $key => $vaKode) {
			$cKodeWawancara = $vaKode['kode_wawancara'];
		}

		$data_update = array(
			'update_by'	=> $this->input->post('whois'),
			'update_date'	=> $this->input->post('whois_date'),
			'nilai_test'	=> $this->input->post('nNilaiTes'),
			'status'	=> $this->input->post('cStatus'),
		);

		$data_update_delete = array(
			'is_delete' => 1,
			'delete_by'	=> $whois,
			'delete_date'	=> $whois_date,

		);

		$data = array(
			'id_wawancara' => $this->input->post('cIdWawancara'),
			'kode_wawancara'	=> $cKodeWawancara,
			'nilai_tes_praktik'	=> $this->input->post('nNilaiTes'),
			'status'	=> $this->input->post('cStatus'),
		);

		$seralizedArray = serialize($data);
		$vaLog = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'tes_praktik',
			'action' => $Type,
			'query' => $seralizedArray,
			'nama' => $this->session->userdata('nama')
		);
		$this->model->Insert("log", $vaLog);

		if ($Type == "Delete") {
			$this->model->Update_Delete('interview_user_1', 'id_test', $this->input->post('cIdTest'), $data_update_delete);
			redirect(site_url('recruitment/interview_user_1'));
		} else {
			$this->model->Update('interview_user_1', 'id_test', $this->input->post('cIdTest'), $data_update);
			if ($data_update['status'] == 'lolos') {
				$data_interview_2 = array(
					'id_wawancara' => $this->input->post('cIdWawancara'),
					'kode_wawancara' => $cKodeWawancara,
					'created_by'	=> $this->input->post('whois'),
					'status'	=> 'pemanggilan',
				);
				$this->model->Insert('interview_user_2', $data_interview_2);
			}
			redirect(site_url('recruitment/interview_user_1'));
		}
	}
	public function interview_user_2($Type = "", $id = "")
	{
		$whois = $this->session->userdata('nama');
		date_default_timezone_set('Asia/Jakarta');
		$whois_date = date('d-m-Y H:i:s');

		$dbKode = $this->db->query("SELECT * FROM wawancara WHERE id_wawancara = '" . $this->input->post('cIdWawancara') . "' ");

		foreach ($dbKode->result_array() as $key => $vaKode) {
			$cKodeWawancara = $vaKode['kode_wawancara'];
		}

		$data_update = array(
			'update_by'	=> $this->input->post('whois'),
			'update_date'	=> $this->input->post('whois_date'),
			'nilai_test'	=> $this->input->post('nNilaiTes'),
			'status'	=> $this->input->post('cStatus'),
		);

		$data_update_delete = array(
			'is_delete' => 1,
			'delete_by'	=> $whois,
			'delete_date'	=> $whois_date,

		);

		$data = array(
			'id_wawancara' => $this->input->post('cIdWawancara'),
			'kode_wawancara'	=> $cKodeWawancara,
			'nilai_tes_praktik'	=> $this->input->post('nNilaiTes'),
			'status'	=> $this->input->post('cStatus'),
		);

		$seralizedArray = serialize($data);
		$vaLog = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'tes_praktik',
			'action' => $Type,
			'query' => $seralizedArray,
			'nama' => $this->session->userdata('nama')
		);
		$this->model->Insert("log", $vaLog);

		if ($Type == "Delete") {
			$this->model->Update_Delete('interview_user_2', 'id_test', $this->input->post('cIdTest'), $data_update_delete);
			redirect(site_url('recruitment/interview_user_2'));
		} else {
			$this->model->Update('interview_user_2', 'id_test', $this->input->post('cIdTest'), $data_update);
			if ($data_update['status'] == 'lolos') {
				$data_interview_hrga = array(
					'id_wawancara' => $this->input->post('cIdWawancara'),
					'kode_wawancara' => $cKodeWawancara,
					'created_by'	=> $this->input->post('whois'),
					'status'	=> 'pemanggilan',
				);
				$this->model->Insert('interview_hrga', $data_interview_hrga);
			}
			redirect(site_url('recruitment/interview_user_2'));
		}
	}
	public function interview_hrga($Type = "", $id = "")
	{
		$whois = $this->session->userdata('nama');
		date_default_timezone_set('Asia/Jakarta');
		$whois_date = date('d-m-Y H:i:s');

		$dbKode = $this->db->query("SELECT * FROM wawancara WHERE id_wawancara = '" . $this->input->post('cIdWawancara') . "' ");

		foreach ($dbKode->result_array() as $key => $vaKode) {
			$cKodeWawancara = $vaKode['kode_wawancara'];
		}

		$data_update = array(
			'update_by'	=> $this->input->post('whois'),
			'update_date'	=> $this->input->post('whois_date'),
			'nilai_test'	=> $this->input->post('nNilaiTes'),
			'status'	=> $this->input->post('cStatus'),
		);

		$data_update_delete = array(
			'is_delete' => 1,
			'delete_by'	=> $whois,
			'delete_date'	=> $whois_date,

		);

		$data = array(
			'id_wawancara' => $this->input->post('cIdWawancara'),
			'kode_wawancara'	=> $cKodeWawancara,
			'nilai_tes_praktik'	=> $this->input->post('nNilaiTes'),
			'status'	=> $this->input->post('cStatus'),
		);

		$seralizedArray = serialize($data);
		$vaLog = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'tes_praktik',
			'action' => $Type,
			'query' => $seralizedArray,
			'nama' => $this->session->userdata('nama')
		);
		$this->model->Insert("log", $vaLog);

		if ($Type == "Delete") {
			$this->model->Update_Delete('interview_hrga', 'id_test', $this->input->post('cIdTest'), $data_update_delete);
			redirect(site_url('recruitment/interview_hrga'));
		} else {
			$this->model->Update('interview_hrga', 'id_test', $this->input->post('cIdTest'), $data_update);
			// if ($data_update['status'] == 'lolos') {
			// 	$data_interview_hrga = array(
			// 		'id_wawancara' => $this->input->post('cIdWawancara'),
			// 		'kode_wawancara' => $cKodeWawancara,
			// 		'created_by'	=> $this->input->post('whois'),
			// 		'status'	=> 'pemanggilan',
			// 	);
			// 	$this->model->Insert('interview_hrga', $data_interview_hrga);
			// }
			redirect(site_url('recruitment/interview_hrga'));
		}
	}
	public function to_pegawai($id = "")
	{
		$whois = $this->session->userdata('nama');
		date_default_timezone_set('Asia/Jakarta');
		$whois_date = date('d-m-Y H:i:s');

		$dbKode = $this->db->query("SELECT * FROM wawancara WHERE id_wawancara = '" . $id . "' ");

		foreach ($dbKode->result_array() as $key => $vaKode) {
			$cKodeWawancara = $vaKode['kode_wawancara'];
			$cNama 			= $vaKode['nama'];
			$cNomorTelepon	= $vaKode['nomor_telepon'];
			$cEmail 	    = $vaKode['email'];
		}

		$data = array(
			'created_by' => $whois,
			'created_date'	=> $whois_date,
			// 'id_status'	=> $this->input->post('nNilaiTes'),
			'nik'		=> $cKodeWawancara,
			'nama'		=> $cNama,
			'tanggal_masuk_kerja' => date("Y-m-d"),
		);
		$dataStatus = array(
			'status' => 'Menjadi Pegawai',
			'update_by' => $whois,
			'update_date'	=> $whois_date,
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
			'nama_table' => 'tes_praktik',
			'action' => 'Update',
			'query' => $seralizedArray,
			'nama' => $this->session->userdata('nama')
		);
		$this->model->Insert("log", $vaLog);

		$this->model->Insert('tb_pegawai', $data);
		$this->model->Update('tes_praktik', 'id_wawancara', $id, $dataStatus);
		redirect(site_url('recruitment/peserta_diterima/I'));
	}
}
