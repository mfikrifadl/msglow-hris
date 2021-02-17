<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recruitment_act extends CI_Controller
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
		$status_tes = $this->input->post('cStatus');
		$code = $this->input->post('cKodeWawancara');

		$data_create = array();
		if ($status_tes == "tidaklolos") {
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
				'status'			=> 'tidaklolos',
				'psiko_test'			=> 'tidaklolos',
				'uji_kompetensi'			=> 'tidaklolos',
				'interview_user_1'			=> 'tidaklolos',
				'interview_user_2'			=> 'tidaklolos',
				'interview_hrga'			=> 'tidaklolos',
				'tes_kesehatan'			=> 'tidaklolos',
				'tahap_r'			=> 'Test Administrasi',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
			);
		} else {
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
				'status'			=> 'on review',
				'psiko_test'			=> 'on review',
				'uji_kompetensi'			=> 'on review',
				'interview_user_1'			=> 'on review',
				'interview_user_2'			=> 'on review',
				'interview_hrga'			=> 'on review',
				'tes_kesehatan'			=> 'on review',
				'tahap_r'			=> 'Test Administrasi',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
			);
		}

		$data_update = array();
		if ($status_tes == "tidaklolos") {
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
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
				'status'			=> 'tidaklolos',
				'psiko_test'			=> 'tidaklolos',
				'uji_kompetensi'			=> 'tidaklolos',
				'interview_user_1'			=> 'tidaklolos',
				'interview_user_2'			=> 'tidaklolos',
				'interview_hrga'			=> 'tidaklolos',
				'tes_kesehatan'			=> 'tidaklolos',
			);
		} else {
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
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
				'status'			=> 'on review',
				'psiko_test'			=> 'on review',
				'uji_kompetensi'			=> 'on review',
				'interview_user_1'			=> 'on review',
				'interview_user_2'			=> 'on review',
				'interview_hrga'			=> 'on review',
				'tes_kesehatan'			=> 'on review',
			);
		}


		$data_delete = array(
			'status_email_adm'	=> 'Belum Kirim Email',
			'status_email_tidaklolos'	=> 'Belum Kirim Email',
			'is_delete' => 1
		);

		$data = array();
		if ($status_tes == "tidaklolos") {
			$data = array(
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
				'status'			=> 'tidaklolos',
				'psiko_test'			=> 'tidaklolos',
				'uji_kompetensi'			=> 'tidaklolos',
				'interview_user_1'			=> 'tidaklolos',
				'interview_user_2'			=> 'tidaklolos',
				'interview_hrga'			=> 'tidaklolos',
				'tes_kesehatan'			=> 'tidaklolos',
				'tahap_r'			=> 'Test Administrasi',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
			);
		} else {
			$data = array(
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
				'status'			=> 'on review',
				'psiko_test'			=> 'on review',
				'uji_kompetensi'			=> 'on review',
				'interview_user_1'			=> 'on review',
				'interview_user_2'			=> 'on review',
				'interview_hrga'			=> 'on review',
				'tes_kesehatan'			=> 'on review',
				'tahap_r'			=> 'Test Administrasi',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
			);
		}

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
		$cViewDataPelamar 			= $this->model->CekDataPelamar('recruitment', 'kode_wawancara', $code);

		if ($Type == "Insert") {
			if ($cViewDataPelamar->num_rows() > 0) {

				//$msg = 1;
				//return $msg;
				//redirect(site_url('recruitment/wawancara/'));
			} else {
				//$msg = 0;

				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_URL => 'http://localhost/msglow-career/api/registrant/'.$code,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => '',
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 0,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => 'PUT',
					CURLOPT_POSTFIELDS => 'is_delete=2',
					CURLOPT_HTTPHEADER => array(
						'token: YOZq0ltM8i',
						'Authorization: Basic YWNjZXNzdG86Y2FyZWVyMTIzNDU=',
						'Content-Type: application/x-www-form-urlencoded'
					),
				));
		
				$response = curl_exec($curl);
				
				curl_close($curl);

				$this->model->Insert('recruitment', $data_create);
				$this->model->Insert("log", $vaLog);
				redirect(site_url('recruitment/wawancara/'));
			}
		} elseif ($Type == "Update") {
			$this->model->Update('recruitment', 'kode_wawancara', $id, $data_update);
			$this->model->Insert("log", $vaLog);
			redirect(site_url('recruitment/wawancara/'));
		} elseif ($Type == "Delete") {
			$this->model->Update_Delete('recruitment', 'id_recruitment', $id, $data_delete);
			redirect(site_url('recruitment/wawancara/'));
		}
	}

	public function reborn_delete_data_registrant($id=""){
		$curl = curl_init();
		//$delete_date = null;
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://localhost/msglow-career/api/registrant/'.$id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'PUT',
			CURLOPT_POSTFIELDS => 'is_delete=0
								&delete_date=null',
			CURLOPT_HTTPHEADER => array(
				'token: YOZq0ltM8i',
				'Authorization: Basic YWNjZXNzdG86Y2FyZWVyMTIzNDU=',
				'Content-Type: application/x-www-form-urlencoded'
			),
		));

		$response = curl_exec($curl);
		
		curl_close($curl);
		$this->model->Delete('recruitment', 'kode_wawancara', $id);
		//redirect(site_url('recruitment/wawancara/'));
		//redirect(site_url('recruitment/wawancara'));		
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

	public function wawancara_id($Id = "")
	{
		$content = $this->cURL_API($Id, 'GET', '');

		echo $content;
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

		$status_tes = $this->input->post('cStatus');
		$data_update = array();
		if ($status_tes == "tidaklolos") {
			$data_update = array(
				'update_by'	=> $this->input->post('whois'),
				'update_date'	=> $this->input->post('whois_date'),
				'nilai_psiko_test'	=> $this->input->post('nNilaiTes'),
				'tgl_psiko_test'	=> $this->input->post('dTglWawancara'),
				'status_email_p'	=> 'Belum Kirim Email',
				'psiko_test'	=> $this->input->post('cStatus'),
				'tahap_r'	=> 'Psikotest',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
				'status'			=> 'tidaklolos',
				'recruitment'			=> 'tidaklolos',
				'uji_kompetensi'			=> 'tidaklolos',
				'interview_user_1'			=> 'tidaklolos',
				'interview_user_2'			=> 'tidaklolos',
				'interview_hrga'			=> 'tidaklolos',
				'tes_kesehatan'			=> 'tidaklolos',
			);
		} else {
			$data_update = array(
				'update_by'	=> $this->input->post('whois'),
				'update_date'	=> $this->input->post('whois_date'),
				'nilai_psiko_test'	=> $this->input->post('nNilaiTes'),
				'tgl_psiko_test'	=> $this->input->post('dTglWawancara'),
				'status_email_p'	=> 'Belum Kirim Email',
				'psiko_test'	=> $this->input->post('cStatus'),
				'tahap_r'	=> 'Psikotest',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
				'status'			=> 'on review',
				'uji_kompetensi'			=> 'on review',
				'interview_user_1'			=> 'on review',
				'interview_user_2'			=> 'on review',
				'interview_hrga'			=> 'on review',
				'tes_kesehatan'			=> 'on review',
			);
		}

		$data_update_delete = array(
			'is_delete' => 1,
			'status_email_p'	=> 'Belum Kirim Email',
			'status_email_tidaklolos'	=> 'Belum Kirim Email',
			'delete_by'	=> $whois,
			'delete_date'	=> $whois_date,

		);

		$data = array(
			'id_wawancara' => $this->input->post('cIdTest'),
			'kode_wawancara'	=> $cKodeWawancara,
			'nilai_psiko_test'	=> $this->input->post('nNilaiTes'),
			'tgl_psiko_test'	=> $this->input->post('dTglWawancara'),
			'psiko_test'	=> $this->input->post('cStatus'),
			'tahap_r'	=> 'Psikotest',
			'status_email_p'	=> 'Belum Kirim Email',
			'status_email_tidaklolos'	=> 'Belum Kirim Email',
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

		$status_tes = $this->input->post('cStatus');
		$data_update = array();
		if ($status_tes == "tidaklolos") {
			$data_update = array(
				'update_by'	=> $this->input->post('whois'),
				'update_date'	=> $this->input->post('whois_date'),
				'nilai_uji_kompetensi'	=> $this->input->post('nNilaiTes'),
				'uji_kompetensi'	=> $this->input->post('cStatus'),
				'tgl_uji_kompetensi'	=> $this->input->post('dTglWawancara'),
				'tahap_r'	=> 'Uji Kompetensi',
				'status_email_uk'	=> 'Belum Kirim Email',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
				'status'			=> 'tidaklolos',
				'recruitment'			=> 'tidaklolos',
				'psiko_test'			=> 'tidaklolos',
				'interview_user_1'			=> 'tidaklolos',
				'interview_user_2'			=> 'tidaklolos',
				'interview_hrga'			=> 'tidaklolos',
				'tes_kesehatan'			=> 'tidaklolos',
			);
		} else {
			$data_update = array(
				'update_by'	=> $this->input->post('whois'),
				'update_date'	=> $this->input->post('whois_date'),
				'nilai_uji_kompetensi'	=> $this->input->post('nNilaiTes'),
				'uji_kompetensi'	=> $this->input->post('cStatus'),
				'tgl_uji_kompetensi'	=> $this->input->post('dTglWawancara'),
				'tahap_r'	=> 'Uji Kompetensi',
				'status_email_uk'	=> 'Belum Kirim Email',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
				'status'			=> 'on review',
				'interview_user_1'			=> 'on review',
				'interview_user_2'			=> 'on review',
				'interview_hrga'			=> 'on review',
				'tes_kesehatan'			=> 'on review',
			);
		}

		$data_update_delete = array(
			'is_delete' => 1,
			'status_email_uk'	=> 'Belum Kirim Email',
			'status_email_tidaklolos'	=> 'Belum Kirim Email',
			'delete_by'	=> $whois,
			'delete_date'	=> $whois_date,

		);

		$data = array(
			'id_wawancara' => $this->input->post('cIdTest'),
			'kode_wawancara'	=> $cKodeWawancara,
			'nilai_uji_kompetensi'	=> $this->input->post('nNilaiTes'),
			'uji_kompetensi'	=> $this->input->post('cStatus'),
			'tgl_uji_kompetensi'	=> $this->input->post('dTglWawancara'),
			'tahap_r'	=> 'Uji Kompetensi',
			'status_email_uk'	=> 'Belum Kirim Email',
			'status_email_tidaklolos'	=> 'Belum Kirim Email',
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

		$status_tes = $this->input->post('cStatus');
		$data_update = array();
		if ($status_tes == "tidaklolos") {
			$data_update = array(
				'update_by'	=> $this->input->post('whois'),
				'update_date'	=> $this->input->post('whois_date'),
				'nilai_interview_user_1'	=> $this->input->post('nNilaiTes'),
				'interview_user_1'	=> $this->input->post('cStatus'),
				'tgl_interview_user_1'	=> $this->input->post('dTglWawancara'),
				'tahap_r'	=> 'Interview User 1',
				'status_email_u1'	=> 'Belum Kirim Email',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
				'status'			=> 'tidaklolos',
				'recruitment'			=> 'tidaklolos',
				'psiko_test'			=> 'tidaklolos',
				'uji_kompetensi'			=> 'tidaklolos',
				'interview_user_2'			=> 'tidaklolos',
				'interview_hrga'			=> 'tidaklolos',
				'tes_kesehatan'			=> 'tidaklolos',
			);
		} else {
			$data_update = array(
				'update_by'	=> $this->input->post('whois'),
				'update_date'	=> $this->input->post('whois_date'),
				'nilai_interview_user_1'	=> $this->input->post('nNilaiTes'),
				'interview_user_1'	=> $this->input->post('cStatus'),
				'tgl_interview_user_1'	=> $this->input->post('dTglWawancara'),
				'tahap_r'	=> 'Interview User 1',
				'status_email_u1'	=> 'Belum Kirim Email',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
				'status'			=> 'on review',
				'interview_user_2'			=> 'on review',
				'interview_hrga'			=> 'on review',
				'tes_kesehatan'			=> 'on review',
			);
		}

		$data_update_delete = array(
			'is_delete' => 1,
			'status_email_u1'	=> 'Belum Kirim Email',
			'status_email_tidaklolos'	=> 'Belum Kirim Email',
			'delete_by'	=> $whois,
			'delete_date'	=> $whois_date,

		);

		$data = array(
			'id_wawancara' => $this->input->post('cIdTest'),
			'kode_wawancara'	=> $cKodeWawancara,
			'nilai_interview_user_1'	=> $this->input->post('nNilaiTes'),
			'interview_user_1'	=> $this->input->post('cStatus'),
			'tgl_interview_user_1'	=> $this->input->post('dTglWawancara'),
			'tahap_r'	=> 'Interview User 1',
			'status_email_u1'	=> 'Belum Kirim Email',
			'status_email_tidaklolos'	=> 'Belum Kirim Email',
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
		$status_tes = $this->input->post('cStatus');
		$data_update = array();
		if ($status_tes == "tidaklolos") {
			$data_update = array(
				'update_by'	=> $this->input->post('whois'),
				'update_date'	=> $this->input->post('whois_date'),
				'nilai_interview_user_2'	=> $this->input->post('nNilaiTes'),
				'interview_user_2'	=> $this->input->post('cStatus'),
				'tgl_interview_user_2'	=> $this->input->post('dTglWawancara'),
				'tahap_r'	=> 'Interview User 2',
				'status_email_u2'	=> 'Belum Kirim Email',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
				'status'			=> 'tidaklolos',
				'recruitment'			=> 'tidaklolos',
				'psiko_test'			=> 'tidaklolos',
				'uji_kompetensi'			=> 'tidaklolos',
				'interview_user_1'			=> 'tidaklolos',
				'interview_hrga'			=> 'tidaklolos',
				'tes_kesehatan'			=> 'tidaklolos',
			);
		} else {
			$data_update = array(
				'update_by'	=> $this->input->post('whois'),
				'update_date'	=> $this->input->post('whois_date'),
				'nilai_interview_user_2'	=> $this->input->post('nNilaiTes'),
				'interview_user_2'	=> $this->input->post('cStatus'),
				'tgl_interview_user_2'	=> $this->input->post('dTglWawancara'),
				'tahap_r'	=> 'Interview User 2',
				'status_email_u2'	=> 'Belum Kirim Email',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
				'status'			=> 'on review',
				'interview_hrga'			=> 'on review',
				'tes_kesehatan'			=> 'on review',
			);
		}

		$data_update_delete = array(
			'is_delete' => 1,
			'status_email_u2'	=> 'Belum Kirim Email',
			'status_email_tidaklolos'	=> 'Belum Kirim Email',
			'delete_by'	=> $whois,
			'delete_date'	=> $whois_date,
		);

		$data = array(
			'id_wawancara' => $this->input->post('cIdTest'),
			'kode_wawancara'	=> $cKodeWawancara,
			'nilai_interview_user_2'	=> $this->input->post('nNilaiTes'),
			'interview_user_2'	=> $this->input->post('cStatus'),
			'tgl_interview_user_2'	=> $this->input->post('dTglWawancara'),
			'tahap_r'	=> 'Interview User 2',
			'status_email_u2'	=> 'Belum Kirim Email',
			'status_email_tidaklolos'	=> 'Belum Kirim Email',
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
		$status_tes = $this->input->post('cStatus');
		$data_update = array();
		if ($status_tes == "tidaklolos") {
			$data_update = array(
				'update_by'	=> $this->input->post('whois'),
				'update_date'	=> $this->input->post('whois_date'),
				'nilai_interview_hrga'	=> $this->input->post('nNilaiTes'),
				'interview_hrga'	=> $this->input->post('cStatus'),
				'tgl_interview_hrga'	=> $this->input->post('dTglWawancara'),
				'tahap_r'	=> 'Interview HRGA',
				'status_email_hrga'	=> 'Belum Kirim Email',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
				'status'			=> 'tidaklolos',
				'recruitment'			=> 'tidaklolos',
				'psiko_test'			=> 'tidaklolos',
				'uji_kompetensi'			=> 'tidaklolos',
				'interview_user_1'			=> 'tidaklolos',
				'interview_user_2'			=> 'tidaklolos',
				'tes_kesehatan'			=> 'tidaklolos',
			);
		} else {
			$data_update = array(
				'update_by'	=> $this->input->post('whois'),
				'update_date'	=> $this->input->post('whois_date'),
				'nilai_interview_hrga'	=> $this->input->post('nNilaiTes'),
				'interview_hrga'	=> $this->input->post('cStatus'),
				'tgl_interview_hrga'	=> $this->input->post('dTglWawancara'),
				'tahap_r'	=> 'Interview HRGA',
				'status_email_hrga'	=> 'Belum Kirim Email',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
				'status'			=> 'on review',
				'tes_kesehatan'			=> 'on review',
			);
		}

		$data_update_delete = array(
			'is_delete' => 1,
			'status_email_hrga'	=> 'Belum Kirim Email',
			'status_email_tidaklolos'	=> 'Belum Kirim Email',
			'delete_by'	=> $whois,
			'delete_date'	=> $whois_date,
		);

		$data = array(
			'id_wawancara' => $this->input->post('cIdTest'),
			'kode_wawancara'	=> $cKodeWawancara,
			'nilai_interview_hrga'	=> $this->input->post('nNilaiTes'),
			'interview_hrga'	=> $this->input->post('cStatus'),
			'tgl_interview_hrga'	=> $this->input->post('dTglWawancara'),
			'status'	=> 'on review',
			'tahap_r'	=> 'Interview HRGA',
			'status_email_hrga'	=> 'Belum Kirim Email',
			'status_email_tidaklolos'	=> 'Belum Kirim Email',
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

	public function tes_kesehatan($Type = "", $id = "")
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
		$dbKode = $this->db->query("SELECT * FROM recruitment WHERE id_recruitment = '" . $this->input->post('cIdTest') . "' ");

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
				'update_by'	=> $this->input->post('whois'),
				'update_date'	=> $this->input->post('whois_date'),
				'hasil_tes_kesehatan'	=> $folder,
				'tes_kesehatan'	=> $this->input->post('cStatus'),
				'tgl_tes_kesehatan'	=> $this->input->post('dTglWawancara'),
				'status'	=> $status,
				'tahap_r'	=> 'Tes Kesehatan',
				'status_email_tes_kesehatan'	=> 'Belum Kirim Email',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
			);

			$data_update_delete = array(
				'is_delete' => 1,
				'status_email_tes_kesehatan'	=> 'Belum Kirim Email',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
				'delete_by'	=> $whois,
				'delete_date'	=> $whois_date,
			);

			$data = array(
				'update_by'	=> $this->input->post('whois'),
				'update_date'	=> $this->input->post('whois_date'),
				'hasil_tes_kesehatan'	=> $folder,
				'tes_kesehatan'	=> $this->input->post('cStatus'),
				'tgl_tes_kesehatan'	=> $this->input->post('dTglWawancara'),
				'status'	=> $status,
				'tahap_r'	=> 'Tes Kesehatan',
				'status_email_tes_kesehatan'	=> 'Belum Kirim Email',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
			);
		} else {
			$data_update = array(
				'update_by'	=> $this->input->post('whois'),
				'update_date'	=> $this->input->post('whois_date'),
				'tes_kesehatan'	=> $this->input->post('cStatus'),
				'tgl_tes_kesehatan'	=> $this->input->post('dTglWawancara'),
				'tahap_r'	=> 'Tes Kesehatan',
				'status_email_tes_kesehatan'	=> 'Belum Kirim Email',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
				'status'			=> 'tidaklolos',
				'recruitment'			=> 'tidaklolos',
				'psiko_test'			=> 'tidaklolos',
				'uji_kompetensi'			=> 'tidaklolos',
				'interview_user_1'			=> 'tidaklolos',
				'interview_user_2'			=> 'tidaklolos',
				'interview_hrga'			=> 'tidaklolos',
			);

			$data_update_delete = array(
				'is_delete' => 1,
				'status_email_tes_kesehatan'	=> 'Belum Kirim Email',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
				'delete_by'	=> $whois,
				'delete_date'	=> $whois_date,
			);

			$data = array(
				'update_by'	=> $this->input->post('whois'),
				'update_date'	=> $this->input->post('whois_date'),
				'tes_kesehatan'	=> $this->input->post('cStatus'),
				'tgl_tes_kesehatan'	=> $this->input->post('dTglWawancara'),
				'status'	=> $status,
				'tahap_r'	=> 'Tes Kesehatan',
				'status_email_tes_kesehatan'	=> 'Belum Kirim Email',
				'status_email_tidaklolos'	=> 'Belum Kirim Email',
			);
		}

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
			redirect(site_url('recruitment/tes_kesehatan'));
		} else {
			if ($data_update['tes_kesehatan'] == 'lolos') {
				$data_update['status'] == 'lolos';
			}
			move_uploaded_file($file_temp, $folder); //fungsi upload
			$this->model->Update('recruitment', 'id_recruitment', $this->input->post('cIdTest'), $data_update);
			redirect(site_url('recruitment/tes_kesehatan'));
		}
	}

	public function to_pegawai($id = "")
	{
		// echo "$id";
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

		$dbPegawai = $this->model->ViewLimit('tb_pegawai', 'nik', 1);
		$cNik = "";
		foreach ($dbPegawai as $vaKodeNik) {
			$cNik 			= $vaKodeNik['nik'];
		}
		$setNik = "";
		if ($cNik == NULL || $cNik == "" || empty($cNik)) {
			$cYear = date('Y');
			$month = date('m');
			$year = substr($cYear, 2);
			$setNik = "99" . $year . "" . $month . "0001";
		} else {
			$intNik = intval($cNik);
			$setNik = $intNik + 1;
		}

		$data = array(
			'created_by' => $whois,
			'created_date'	=> $whois_date,
			'kode_wawancara'	=> $setNik,
			'nik'		=> $setNik,
			'nama'		=> $cNama,
			'id_status'	=> 4,
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
		$this->model->Update('recruitment', 'id_recruitment', $id, $dataStatus);
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
			'alasan_tidak_lolos' => $this->input->post('alasanTidakLolos'),
			'recruitment'			=> 'tidaklolos',
			'psiko_test'			=> 'tidaklolos',
			'uji_kompetensi'			=> 'tidaklolos',
			'interview_user_1'			=> 'tidaklolos',
			'interview_user_2'			=> 'tidaklolos',
			'interview_hrga'			=> 'tidaklolos',
			'tes_kesehatan'			=> 'tidaklolos',
		);
		if ($Aksi == 'lolos') {
			$this->model->Update('recruitment', 'id_recruitment', $Id, $data_lolos);
		} elseif ($Aksi == 'tidaklolos') {
			$this->model->Update('recruitment', 'id_recruitment', $Id, $data_tidak_lolos);
		}
		redirect(site_url('recruitment/peserta_diterima'));
	}
}
