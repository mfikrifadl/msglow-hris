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
			'kode_wawancara' 	=> $this->input->post('cKodeWawancara'),
			'tanggal_wawancara'	=> $this->input->post('dTglWawancara'),
			'nama'				=> $this->input->post('cNama'),
			'created_by'		=> $this->input->post('whois'),
			'nomor_telepon'		=> $this->input->post('cNomorTelepon'),
			'recruitment'		=> $this->input->post('cStatus'),
			'job'				=> $this->input->post('cJob'),
			'job_id'			=> $this->input->post('cJob_id'),
			'email'				=> $this->input->post('cEmail'),
			'status_email_adm'	=> 'Belum Kirim Email',
			'level_id'			=> $this->input->post('cLevel'),
			'status'			=> 'pending',
			'tahap_r'			=> 'Test Administrasi',
		);

		$data_update = array(
			'kode_wawancara' 	=> $this->input->post('cKodeWawancara'),
			'update_by'			=> $this->input->post('whois'),
			'nama'				=> $this->input->post('cNama'),
			'nomor_telepon'		=> $this->input->post('cNomorTelepon'),
			'email'				=> $this->input->post('cEmail'),
			'job'				=> $this->input->post('cJob'),
			'job_id'			=> $this->input->post('cJob_id'),
			'level_id'			=> $this->input->post('cLevel'),
			'tahap_r'			=> 'Test Administrasi',
			'tanggal_wawancara'	=> $this->input->post('dTglWawancara'),
			'recruitment'		=> $this->input->post('cStatus'),
			'status_email_adm'	=> 'Belum Kirim Email',	
		);

		$data_delete = array(
			'status_email_adm'	=> 'Belum Kirim Email',
			'is_delete' => 1
		);

		$data = array(
			'kode_wawancara' 	=> $this->input->post('cKodeWawancara'),
			'tanggal_wawancara'	=> $this->input->post('dTglWawancara'),
			'nama'				=> $this->input->post('cNama'),
			'created_by'		=> $this->input->post('whois'),
			'update_by'			=> $this->input->post('whois'),
			'nomor_telepon'		=> $this->input->post('cNomorTelepon'),
			'recruitment'		=> $this->input->post('cStatus'),
			'job'				=> $this->input->post('cJob'),
			'job_id'			=> $this->input->post('cJob_id'),
			'level_id'			=> $this->input->post('cLevel'),
			'email'				=> $this->input->post('cEmail'),
			'tahap_r'			=> 'Test Administrasi',
		);

		$seralizedArray = serialize($data);
		$vaLog = array(
			'tgl' 			=> $this->Date2String($this->DateStamp()),
			'waktu' 		=> $this->TimeStamp(),
			'nama_table' 	=> 'recruitment',
			'action' 		=> $Type,
			'query' 		=> $seralizedArray,
			'nama' 			=> $this->session->userdata('nama')
		);
		$this->model->Insert("log", $vaLog);

		if ($Type == "Insert") {
			$this->model->Insert('recruitment', $data_create);
			$this->model->Insert("log", $vaLog);
			redirect(site_url('recruitment/wawancara/'));
		} elseif ($Type == "Update") {
			$this->model->Update('recruitment', 'kode_wawancara', $id, $data_update);
			$this->model->Insert("log", $vaLog);
			redirect(site_url('recruitment/wawancara/'));
		} elseif ($Type == "Delete") {
			$this->model->Update_Delete('recruitment', 'kode_wawancara', $id, $data_delete);
			redirect(site_url('recruitment/wawancara/'));
		}
	}

	public function edit_wawancara($id)
	{
		$data = array(
			'id_recruitment' => $this->input->post('cIdTest'),
			'nama'	=> $this->input->post('cNama'),
			'nomor_telepon'	=> $this->input->post('cNomorTelepon'),
			'status'	=> $this->input->post('cStatus'),
			'email'	=> $this->input->post('cEmail'),
			'tahap'	=> $this->input->post('cTahap'),
			'tahap_r'	=> 'Test Administrasi',
		);

		$seralizedArray = serialize($data);
		$vaLog = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'recruitment',
			'action' => 'Update',
			'query' => $seralizedArray,
			'nama' => $this->session->userdata('nama')
		);
		$this->model->Insert("log", $vaLog);

		$this->model->Update('wawancara', 'kode_wawancara', $id, $data);
	}

	public function psiko_test($Type = "", $id = "")
	{
		$whois = $this->session->userdata('nama');
		date_default_timezone_set('Asia/Jakarta');
		$whois_date = date('d-m-Y H:i:s');

		$dbKode = $this->db->query("SELECT * FROM recruitment WHERE id_recruitment = '" . $this->input->post('cIdTest') . "' ");

		foreach ($dbKode->result_array() as $key => $vaKode) {
			$cKodeWawancara = $vaKode['kode_wawancara'];
		}

		$data_update = array(
			'update_by'	=> $this->input->post('whois'),
			'update_date'	=> $this->input->post('whois_date'),
			'nilai_psiko_test'	=> $this->input->post('nNilaiTes'),
			'tgl_psiko_test'	=> $this->input->post('dTglWawancara'),
			'status_email_p'	=> 'Belum Kirim Email',
			'recruitment'	=> $this->input->post('cStatus'),
			'tahap_r'	=> 'Psikotest',
		);

		$data_update_delete = array(
			'is_delete' => 1,
			'status_email_p'	=> 'Belum Kirim Email',
			'delete_by'	=> $whois,
			'delete_date'	=> $whois_date,

		);

		$data = array(
			'id_wawancara' => $this->input->post('cIdTest'),
			'kode_wawancara'	=> $cKodeWawancara,
			'nilai_psiko_test'	=> $this->input->post('nNilaiTes'),
			'tgl_psiko_test'	=> $this->input->post('dTglWawancara'),
			'recruitment'	=> $this->input->post('cStatus'),
			'tahap_r'	=> 'Psikotest',
			'status_email_p'	=> 'Belum Kirim Email',
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
			$this->model->Update_Delete('recruitment', 'id_recruitment', $this->input->post('cIdTest'), $data_update_delete);
			redirect(site_url('recruitment/psiko_test'));
		} else {
			$this->model->Update('recruitment', 'id_recruitment', $this->input->post('cIdTest'), $data_update);
			redirect(site_url('recruitment/psiko_test'));
		}
	}

	public function uji_kompetensi($Type = "", $id = "")
	{
		$whois = $this->session->userdata('nama');
		date_default_timezone_set('Asia/Jakarta');
		$whois_date = date('d-m-Y H:i:s');

		$dbKode = $this->db->query("SELECT * FROM recruitment WHERE id_recruitment = '" . $this->input->post('cIdTest') . "' ");

		foreach ($dbKode->result_array() as $key => $vaKode) {
			$cKodeWawancara = $vaKode['kode_wawancara'];
		}

		$data_update = array(
			'update_by'	=> $this->input->post('whois'),
			'update_date'	=> $this->input->post('whois_date'),
			'nilai_uji_kompetensi'	=> $this->input->post('nNilaiTes'),
			'recruitment'	=> $this->input->post('cStatus'),
			'tgl_uji_kompetensi'	=> $this->input->post('dTglWawancara'),
			'tahap_r'	=> 'Uji Kompetensi',
			'status_email_uk'	=> 'Belum Kirim Email',
		);

		$data_update_delete = array(
			'is_delete' => 1,
			'status_email_uk'	=> 'Belum Kirim Email',
			'delete_by'	=> $whois,
			'delete_date'	=> $whois_date,

		);

		$data = array(
			'id_wawancara' => $this->input->post('cIdTest'),
			'kode_wawancara'	=> $cKodeWawancara,
			'nilai_uji_kompetensi'	=> $this->input->post('nNilaiTes'),
			'recruitment'	=> $this->input->post('cStatus'),
			'tgl_uji_kompetensi'	=> $this->input->post('dTglWawancara'),
			'tahap_r'	=> 'Uji Kompetensi',
			'status_email_uk'	=> 'Belum Kirim Email',
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
			$this->model->Update_Delete('recruitment', 'id_recruitment', $this->input->post('cIdTest'), $data_update_delete);
			redirect(site_url('recruitment/uji_kompetensi'));
		} else {
			$this->model->Update('recruitment', 'id_recruitment', $this->input->post('cIdTest'), $data_update);
			redirect(site_url('recruitment/uji_kompetensi'));
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
			'update_by'	=> $this->input->post('whois'),
			'update_date'	=> $this->input->post('whois_date'),
			'nilai_interview_user_1'	=> $this->input->post('nNilaiTes'),
			'recruitment'	=> $this->input->post('cStatus'),
			'tgl_interview_user_1'	=> $this->input->post('dTglWawancara'),
			'tahap_r'	=> 'Interview User 1',
			'status_email_u1'	=> 'Belum Kirim Email',
		);

		$data_update_delete = array(
			'is_delete' => 1,
			'status_email_u1'	=> 'Belum Kirim Email',
			'delete_by'	=> $whois,
			'delete_date'	=> $whois_date,

		);

		$data = array(
			'id_wawancara' => $this->input->post('cIdTest'),
			'kode_wawancara'	=> $cKodeWawancara,
			'nilai_interview_user_1'	=> $this->input->post('nNilaiTes'),
			'recruitment'	=> $this->input->post('cStatus'),
			'tgl_interview_user_1'	=> $this->input->post('dTglWawancara'),
			'tahap_r'	=> 'Interview User 1',
			'status_email_u1'	=> 'Belum Kirim Email',
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
			$this->model->Update_Delete('recruitment', 'id_recruitment', $this->input->post('cIdTest'), $data_update_delete);
			redirect(site_url('recruitment/interview_user_1'));
		} else {
			$this->model->Update('recruitment', 'id_recruitment', $this->input->post('cIdTest'), $data_update);
			redirect(site_url('recruitment/interview_user_1'));
		}
	}
	public function interview_user_2($Type = "", $id = "")
	{
		$whois = $this->session->userdata('nama');
		date_default_timezone_set('Asia/Jakarta');
		$whois_date = date('d-m-Y H:i:s');

		$dbKode = $this->db->query("SELECT * FROM recruitment WHERE id_recruitment = '" . $this->input->post('cIdTest') . "' ");

		foreach ($dbKode->result_array() as $key => $vaKode) {
			$cKodeWawancara = $vaKode['kode_wawancara'];
		}

		$data_update = array(
			'update_by'	=> $this->input->post('whois'),
			'update_date'	=> $this->input->post('whois_date'),
			'nilai_interview_user_2'	=> $this->input->post('nNilaiTes'),
			'recruitment'	=> $this->input->post('cStatus'),
			'tgl_interview_user_2'	=> $this->input->post('dTglWawancara'),
			'tahap_r'	=> 'Interview User 2',
			'status_email_u2'	=> 'Belum Kirim Email',
		);

		$data_update_delete = array(
			'is_delete' => 1,
			'status_email_u2'	=> 'Belum Kirim Email',
			'delete_by'	=> $whois,
			'delete_date'	=> $whois_date,

		);

		$data = array(
			'id_wawancara' => $this->input->post('cIdTest'),
			'kode_wawancara'	=> $cKodeWawancara,
			'nilai_interview_user_2'	=> $this->input->post('nNilaiTes'),
			'recruitment'	=> $this->input->post('cStatus'),
			'tgl_interview_user_2'	=> $this->input->post('dTglWawancara'),
			'tahap_r'	=> 'Interview User 2',
			'status_email_u2'	=> 'Belum Kirim Email',
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
			$this->model->Update_Delete('recruitment', 'id_recruitment', $this->input->post('cIdTest'), $data_update_delete);
			redirect(site_url('recruitment/interview_user_2'));
		} else {
			$this->model->Update('recruitment', 'id_recruitment', $this->input->post('cIdTest'), $data_update);
			redirect(site_url('recruitment/interview_user_2'));
		}
	}
	public function interview_hrga($Type = "", $id = "")
	{
		$whois = $this->session->userdata('nama');
		date_default_timezone_set('Asia/Jakarta');
		$whois_date = date('d-m-Y H:i:s');

		$dbKode = $this->db->query("SELECT * FROM recruitment WHERE id_recruitment = '" . $this->input->post('cIdTest') . "' ");

		foreach ($dbKode->result_array() as $key => $vaKode) {
			$cKodeWawancara = $vaKode['kode_wawancara'];
		}

		$data_update = array(
			'update_by'	=> $this->input->post('whois'),
			'update_date'	=> $this->input->post('whois_date'),
			'nilai_interview_hrga'	=> $this->input->post('nNilaiTes'),
			'recruitment'	=> $this->input->post('cStatus'),
			'tgl_interview_hrga'	=> $this->input->post('dTglWawancara'),
			'status'	=> 'validasi',
			'tahap_r'	=> 'Interview HRGA',
			'status_email_hrga'	=> 'Belum Kirim Email',
		);

		$data_update_delete = array(
			'is_delete' => 1,
			'status_email_hrga'	=> 'Belum Kirim Email',
			'delete_by'	=> $whois,
			'delete_date'	=> $whois_date,

		);

		$data = array(
			'id_wawancara' => $this->input->post('cIdTest'),
			'kode_wawancara'	=> $cKodeWawancara,
			'nilai_interview_hrga'	=> $this->input->post('nNilaiTes'),
			'recruitment'	=> $this->input->post('cStatus'),
			'tgl_interview_hrga'	=> $this->input->post('dTglWawancara'),
			'status'	=> 'validasi',
			'tahap_r'	=> 'Interview HRGA',
			'status_email_hrga'	=> 'Belum Kirim Email',
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
			$this->model->Update_Delete('recruitment', 'id_recruitment', $this->input->post('cIdTest'), $data_update_delete);
			redirect(site_url('recruitment/interview_hrga'));
		} else {
			if ($data_update['interview_hrga'] == 'lolos') {
				$data_update['status'] == 'lolos';
			}
			$this->model->Update('recruitment', 'id_recruitment', $this->input->post('cIdTest'), $data_update);
			redirect(site_url('recruitment/interview_hrga'));
		}
	}
	public function to_pegawai($id = "")
	{
		$whois = $this->session->userdata('nama');
		date_default_timezone_set('Asia/Jakarta');
		$whois_date = date('d-m-Y H:i:s');

		$dbKode = $this->db->query("SELECT * FROM recruitment WHERE id_recruitment = '" . $id . "' ");

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
			'nama_table' => 'recruitment',
			'action' => 'Update',
			'query' => $seralizedArray,
			'nama' => $this->session->userdata('nama')
		);
		$this->model->Insert("log", $vaLog);

		$this->model->Insert('tb_pegawai', $data);
		$this->model->Update('tes_praktik', 'id_wawancara', $id, $dataStatus);
		redirect(site_url('recruitment/peserta_diterima/I'));
	}
	public function send_email($id = "")
	{
		$recruitment = $this->db->get_where('recruitment', ['id_recruitment' => $id])->row_array();
		var_dump($recruitment);
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
			$this->model->Update('recruitment', 'id_recruitment', $Id, $data_lolos);
		} elseif ($Aksi == 'tidaklolos') {
			$this->model->Update('recruitment', 'id_recruitment', $Id, $data_tidak_lolos);
		}
		redirect(site_url('recruitment/peserta_diterima'));
	}
}
