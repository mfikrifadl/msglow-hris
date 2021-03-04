<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action extends CI_Controller
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


	public function bpjs($Type = "", $id = "")
	{
		$data = array(
			'id_pegawai' => $this->input->post('cIdPegawai'),
			'jumlah'	=> $this->input->post('nJumlah')
		);

		if ($Type == "Insert") {
			$this->model->Insert('tb_bpjs', $data);
			redirect(site_url('master/bpjs/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_bpjs', 'id_bpjs', $id, $data);
			redirect(site_url('master/bpjs/U'));
		} elseif ($Type == "Delete") {
			$this->model->Delete('tb_bpjs', 'id_bpjs', $id);
			redirect(site_url('master/bpjs/D'));
		}
	}

	public function area_kerja($Type = "", $id = "")
	{
		$data = array(
			'nama_area' => $this->input->post('cNamaArea'),
			'kode_area'	=> $this->input->post('cKodeArea')
		);

		$dataDelete = array(
			'is_deleted'	=> 1
		);

		$seralizedArray = serialize($data);
		$vaLog = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'tb_area_kerja',
			'action' => $Type,
			'query' => $seralizedArray,
			'nama' => $this->session->userdata('nama')
		);

		$seralizedArrayDelete = serialize($dataDelete);
		$vaLog2 = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'tb_area_kerja',
			'action' => $Type,
			'query' => $seralizedArrayDelete,
			'nama' => $this->session->userdata('nama')
		);

		if ($Type == "Insert") {
			$this->model->Insert('tb_area_kerja', $data);
			$this->model->Insert("log", $vaLog);
			redirect(site_url('master/area_kerja/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_area_kerja', 'id_area', $id, $data);
			$this->model->Insert("log", $vaLog);
			redirect(site_url('master/area_kerja/U'));
		} elseif ($Type == "Delete") {

			$this->model->Update_Delete('tb_area_kerja', 'id_area', $id, $dataDelete);
			$this->model->Insert("log", $vaLog2);
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

		$dataDelete = array(
			'is_deleted'	=> 1
		);

		$seralizedArray = serialize($data);
		$vaLog = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'tb_sub_unit_kerja',
			'action' => $Type,
			'query' => $seralizedArray,
			'nama' => $this->session->userdata('nama')
		);

		$seralizedArrayDelete = serialize($dataDelete);
		$vaLog2 = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'tb_sub_unit_kerja',
			'action' => $Type,
			'query' => $seralizedArrayDelete,
			'nama' => $this->session->userdata('nama')
		);

		if ($Type == "Insert") {
			$this->model->Insert('tb_sub_unit_kerja', $data);
			$this->model->Insert("log", $vaLog);
			redirect(site_url('master/sub_unit_kerja/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_sub_unit_kerja', 'id_sub_unit_kerja', $id, $data);
			$this->model->Insert("log", $vaLog);
			redirect(site_url('master/sub_unit_kerja/U'));
		} elseif ($Type == "Delete") {
			$this->model->Update_Delete('tb_sub_unit_kerja', 'id_sub_unit_kerja', $id, $dataDelete);
			$this->model->Insert("log", $vaLog2);
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

	public function spv_insert()
	{
		$data = array(
			'nik' => $this->input->post('cNik'),
			'nama' => $this->input->post('cNama'),
			'telepon' => $this->input->post('nTelepon')
		);
		$this->model->Insert('tb_spv', $data);
		redirect(site_url('master/supervisor/I'));
	}

	public function spv_update($id)
	{
		$cOutlet 	= "";
		$dataOutlet = array('id_spv' => '');
		$this->model->Update('tb_outlet', 'id_spv', $id, $dataOutlet);
		$dataSpv	= array('id_outlet' => '');
		$this->model->Update('tb_spv', 'id_spv', $id, $dataSpv);
		foreach ($_POST['cIdOutlet'] as $value) {
			$cOutlet .= $value . ",";
		}
		$cOutlet = substr($cOutlet, 0, -1);  //to remove the last comma

		$explode = explode(',', $cOutlet);
		$data = array(
			'nik' => $this->input->post('cNik'),
			'nama' => $this->input->post('cNama'),
			'telepon' => $this->input->post('nTelepon'),
			'id_outlet' => $cOutlet
		);
		for ($z = 0; $z <= count($explode); $z++) {
			$this->db->query("UPDATE tb_outlet SET id_spv = '$id' WHERE id_outlet = '" . $explode[$z] . "'  ");
		}
		$this->model->Update('tb_spv', 'id_spv', $id, $data);
		redirect(site_url('master/supervisor/U'));
	}

	public function spv_delete($id)
	{
		$this->model->Delete('tb_spv', 'id_spv', $id);
		$this->db->query("UPDATE tb_outlet SET id_spv = '' WHERE id_spv = '$id' ");
		redirect(site_url('master/supervisor/D'));
	}

	public function outlet($Type = "", $id = "")
	{
		$data = array(
			'kode' => $this->input->post('cKode'),
			'id_area' => $this->input->post('cIdArea'),
			'nama' => $this->input->post('cNama')
		);

		$dataDelete = array(
			'is_delete'	=> 1
		);

		$seralizedArray = serialize($data);
		$vaLog = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'tb_outlet',
			'action' => $Type,
			'query' => $seralizedArray,
			'nama' => $this->session->userdata('nama')
		);

		$seralizedArrayDelete = serialize($dataDelete);
		$vaLog2 = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'tb_outlet',
			'action' => $Type,
			'query' => $seralizedArrayDelete,
			'nama' => $this->session->userdata('nama')
		);
		$this->model->Insert("log", $vaLog);

		if ($Type == "Insert") {
			$this->model->Insert('tb_outlet', $data);
			$this->model->Insert("log", $vaLog);
			redirect(site_url('master/outlet/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_outlet', 'id_outlet', $id, $data);
			$this->model->Insert("log", $vaLog);
			redirect(site_url('master/outlet/U'));
		} elseif ($Type == "Delete") {
			$this->model->Update_Delete('tb_outlet', 'id_outlet', $id, $dataDelete);
			$this->model->Insert("log", $vaLog2);
			redirect(site_url('master/outlet/D'));
		}
	}

	public function tim_khusus($Type = "", $id = "")
	{
		$data = array(
			'id_kategori_tim_khusus' => $this->input->post('cIdKategoriTimKhusus'),
			'nik' => $this->input->post('cNik'),
			'nama' => $this->input->post('cNama'),
			'telefon' => $this->input->post('nTelepon')
		);

		if ($Type == "Insert") {
			$this->model->Insert('tb_tim_khusus', $data);
			redirect(site_url('master/tim_khusus/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_tim_khusus', 'id_tim_khusus', $id, $data);
			redirect(site_url('master/tim_khusus/U'));
		} elseif ($Type == "Delete") {
			$this->model->Delete('tb_tim_khusus', 'id_tim_khusus', $id);
			redirect(site_url('master/tim_khusus/D'));
		}
	}
}
