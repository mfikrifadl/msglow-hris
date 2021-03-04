<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_act extends CI_Controller
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
	
	public function signin($Action = "")
	{
		$data = "";
		if ($Action == "error") {
			$data['notif'] = "Username / Password Salah";
		}
		$this->load->view('admin/login', $data);
	}

	public function LoginAdmin()
	{
		$cPassword = md5($this->input->post('password'));
		$cUser 	   = ($this->input->post('username'));
		$nRow = $this->model->LoginAdmin($cUser, $cPassword);
		if ($nRow->num_rows() > 0) {
			foreach ($nRow->result_array() as $Row) {
				$Nama		= $Row['nama'];
				$Level 		= $Row['status'];
				$User		= $Row['username'];
				$Id			= $Row['id'];
				$cJabatan 	= $Row['level'];
			}
			$this->load->library('session');
			$this->session->set_userdata('nama', $Nama);
			$this->session->set_userdata('user', $User);
			$this->session->set_userdata('level', $Level);
			$this->session->set_userdata('jabatan', $cJabatan);
			$this->session->set_userdata('id', $Id);
			redirect(site_url('master/index'));
		} else {
			redirect(site_url('master/signin/error'));
		}
	}

	public function logout()
	{
		if ($this->session->userdata('level') == 2) {
			$this->db->query("UPDATE tb_pegawai SET created = 0");
		}
		$this->session->sess_destroy();
		redirect(site_url('master/index'));
	}

	public function operator($Type = "", $id = "")
	{
		$Waktu 		= date("dmYhis");
		$namafoto 	= (!empty($_FILES['foto']['name'])) ? $_FILES['foto']['name'] : "";
		if (strlen($namafoto) > 0) {
			if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
				move_uploaded_file($_FILES['foto']['tmp_name'], "upload/operator/" . $Waktu . $namafoto);
			}
		}
		if (empty($this->input->post('foto'))) {
			$data = array(
				'id_outlet'			=> $this->input->post('cIdOutlet'),
				'nama_operator'		=> $this->input->post('cNamaOperator'),
				'alamat'			=> $this->input->post('cAlamat'),
				'telepon'			=> $this->input->post('nTelepon'),
			);
		} else {
			$data = array(
				'id_outlet'			=> $this->input->post('cIdOutlet'),
				'nama_operator'		=> $this->input->post('cNamaOperator'),
				'alamat'			=> $this->input->post('cAlamat'),
				'telepon'			=> $this->input->post('nTelepon'),
				'foto' 				=> "upload/operator/" . $Waktu . $namafoto
			);
		}

		if ($Type == "Insert") {
			$this->model->Insert('operator', $data);
			//redirect(site_url('master/operator/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('operator', 'id_operator', $id, $data);
			//redirect(site_url('master/operator/U'));
		} elseif ($Type == "Delete") {
			$this->model->Delete('operator', 'id_operator', $id);
			//redirect(site_url('master/operator/D'));
		}
	}

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
	public function unit_kerja($Type = "", $id = "")
	{
		$data = array(
			'nama_unit_kerja' => $this->input->post('cNamaUnitKerja')
		);

		if ($Type == "Insert") {
			$this->model->Insert('tb_unit_kerja', $data);
			redirect(site_url('master/unit_kerja/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_unit_kerja', 'id_unit_kerja', $id, $data);
			redirect(site_url('master/unit_kerja/U'));
		} elseif ($Type == "Delete") {
			$this->model->Delete('tb_unit_kerja', 'id_unit_kerja', $id);
			redirect(site_url('master/unit_kerja/D'));
		}
	}

	public function sub_unit_kerja($Type = "", $id = "")
	{
		$data = array(
			'id_unit_kerja' => $this->input->post('cIdUnitKerja'),
			'nama_sub_unit_kerja' => $this->input->post('cSubUnitKerja')
		);

		if ($Type == "Insert") {
			$this->model->Insert('tb_sub_unit_kerja', $data);
			redirect(site_url('master/sub_unit_kerja/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_sub_unit_kerja', 'id_sub_unit_kerja', $id, $data);
			redirect(site_url('master/sub_unit_kerja/U'));
		} elseif ($Type == "Delete") {
			$this->model->Delete('tb_sub_unit_kerja', 'id_sub_unit_kerja', $id);
			redirect(site_url('master/sub_unit_kerja/D'));
		}
	}

	public function ref_jabatan($Type = "", $id = "")
	{
		$data = array(
			'nama_jabatan' => $this->input->post('cNamaJabatan')
		);

		if ($Type == "Insert") {
			$this->model->Insert('tb_ref_jabatan', $data);
			redirect(site_url('master/ref_jabatan/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_ref_jabatan', 'id_ref_jabatan', $id, $data);
			redirect(site_url('master/ref_jabatan/U'));
		} elseif ($Type == "Delete") {
			$this->model->Delete('tb_ref_jabatan', 'id_ref_jabatan', $id);
			redirect(site_url('master/ref_jabatan/D'));
		}
	}

	public function status_karyawan($Type = "", $id = "")
	{
		$data = array(
			'status' 	 => $this->input->post('cStatusKaryawan'),
			'kode_status' => $this->input->post('cKodeStatusKaryawan')
		);

		if ($Type == "Insert") {
			$this->model->Insert('tb_status_karyawan', $data);
			redirect(site_url('master/status_karyawan/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_status_karyawan', 'id_status', $id, $data);
			redirect(site_url('master/status_karyawan/U'));
		} elseif ($Type == "Delete") {
			$this->model->Delete('tb_status_karyawan', 'id_status', $id);
			redirect(site_url('master/status_karyawan/D'));
		}
	}

	public function tingkat_pendidikan($Type = "", $id = "")
	{
		$data = array(
			'nama_pendidikan' => $this->input->post('cPendidikan')
		);

		if ($Type == "Insert") {
			$this->model->Insert('tb_pendidikan', $data);
			redirect(site_url('master/tingkat_pendidikan/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_pendidikan', 'id_pendidikan', $id, $data);
			redirect(site_url('master/tingkat_pendidikan/U'));
		} elseif ($Type == "Delete") {
			$this->model->Delete('tb_pendidikan', 'id_pendidikan', $id);
			redirect(site_url('master/tingkat_pendidikan/D'));
		}
	}

	public function golongan($Type = "", $id = "")
	{
		$data = array(
			'nama_golongan' => $this->input->post('cGolongan')
		);

		if ($Type == "Insert") {
			$this->model->Insert('tb_golongan', $data);
			redirect(site_url('master/golongan/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_golongan', 'id_golongan', $id, $data);
			redirect(site_url('master/golongan/U'));
		} elseif ($Type == "Delete") {
			$this->model->Delete('tb_golongan', 'id_golongan', $id);
			redirect(site_url('master/golongan/D'));
		}
	}

	public function data()
	{
		$this->load->view('admin/tes');
	}


	public function prosesBackup($file)
	{
		redirect(site_url('admin/'));
	}

	public function download($file)
	{
		$this->load->helper('download');
		$name = $file;
		$data = file_get_contents(APPPATH . 'backup/' . $file . '');
		force_download($name, $data);
	}
}
