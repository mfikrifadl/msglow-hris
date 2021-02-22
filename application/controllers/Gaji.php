<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gaji extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		error_reporting(E_ALL);
		error_reporting(0);
		//MenLoad model yang berada di Folder Model dan namany model
		$this->load->model('model');
		$this->load->model('AbsensiModel');
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
	public function dataLibur()
	{
	}



	function random_word($id = 7)
	{
		$pool = '1234567890';

		$word = '';
		for ($i = 0; $i < $id; $i++) {
			$word .= substr($pool, mt_rand(0, strlen($pool) - 1), 1);
		}
		return  $word . $this->session->userdata('id');
	}

	public function absen($Aksi = "", $Id = "")
	{
		// $dataHeader['menu'] = 'Manajemen Gaji';
		// $dataHeader['file'] = 'Absensi Pegawai';
		// $data['action'] = $Aksi;
		// $data['id_absen']	=	$Id;
		// $data['LastId']		= $this->model->LastId('id_absen', 'tb_absensi');
		// $data['kode_absen'] = $this->random_word();
		// $data['tanggal']	= $this->DateStamp();
		// $data['pegawai']	= $this->model->ViewAsc('tb_pegawai', 'nama');
		// $data['outlet']		= $this->model->ViewAsc('v_outlet', 'nama');
		// $data['spv']		= $this->model->ViewAsc('tb_spv', 'nama');

		// $this->load->view('admin/container/header', $dataHeader);
		// $this->load->view('admin/gaji/absensi', $data);
		// $this->load->view('admin/container/footer');

		$data['notif_absensi']	= $this->model->notifAbsensi();
		$data['data_notif_absen']		= $this->model->View('v_data_notif_absen');

		$this->load->view('admin/container/header');
		$this->load->view('admin/gaji/absensi');
		$this->load->view('admin/container/footer');
	}

	public function absensi_pegawai($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen Absensi';
		$dataHeader['file'] = 'Absensi Pegawai';
		$data['action'] = $Aksi;

		$data['absensi'] = $this->model->View('attlog');
		$data['row']	= $this->relasi->GetDataAbsensi_tabel_new();		

		$dataHeader['notif_absensi']	= $this->model->notifAbsensi();
		$dataHeader['data_notif_absen']		= $this->model->View('v_data_notif_absen');

		$this->load->view('admin/container/header', $dataHeader);
		$this->load->view('admin/gaji/absensi', $data);
		$this->load->view('admin/container/footer');
	}

	public function data_notif_absen($id = "")
	{
		$dataHeader['menu'] = 'Manajemen Absensi';
		$dataHeader['file'] = 'Absensi Pegawai Selected';

		//$data['row'] = $this->model->ViewWhere('v_log_data_absen','id',$id);
		$data['row'] = $this->model->ViewNotifAbsensiSelected($id);		

		$dataHeader['notif_absensi']	= $this->model->notifAbsensi();
		$dataHeader['data_notif_absen']		= $this->model->View('v_data_notif_absen');

		$this->load->view('admin/container/header', $dataHeader);
		$this->load->view('admin/gaji/tb_notif_absensi', $data);
		$this->load->view('admin/container/footer');
	}


	// public function tb_absensi()
	// {
	// 	// $data['row']	= $this->relasi->GetDataAbsensi_tabel_new();
	// 	$data['row']	= $this->model->View('v_data_log_absen');
	// 	$this->load->view('admin/transaksi/data/tb_show_absensi_data2', $data);
	// }

	public function req_update_absen($Aksi = "", $Id = "")
	{
		// $this->load->view('admin/gaji/view');
		$dataHeader['menu'] = 'Manajemen Absensi';
		$dataHeader['file'] = 'Request Update Absensi Pegawai';
		$data['action'] = $Aksi;
		$data['id_absen']	=	$Id;
		// echo $this->session->userdata('nama');
		// echo $this->session->userdata('user');
		// echo $this->session->userdata('level');
		// echo $this->session->userdata('id');

		$dataHeader['notif_absensi']	= $this->model->notifAbsensi();
		$dataHeader['data_notif_absen']		= $this->model->View('v_data_notif_absen');

		$this->load->view('admin/container/header', $dataHeader);
		// $this->load->view('admin/gaji/absensi', $data);
		$this->load->view('admin/gaji/request_update_absen', $data);
		$this->load->view('admin/container/footer');
	}

	public function detail_gaji($id_pegawai, $bulan, $tahun, $id_outlet, $id_area)
	{
		$dataHeader['menu'] = 'Manajemen Gaji';
		$dataHeader['file'] = 'Detail Gaji';
		// $data['action'] = $Aksi ;
		$data['id_pegawai'] = $id_pegawai;
		$data['bulan']		= $bulan;
		$data['tahun']		= $tahun;
		$data['id_outlet']	= $id_outlet;
		$data['id_area']	= $id_area;

		$dataHeader['notif_absensi']	= $this->model->notifAbsensi();
		$dataHeader['data_notif_absen']		= $this->model->View('v_data_notif_absen');

		$this->load->view('admin/container/header', $dataHeader);
		$this->load->view('admin/gaji/detail_gaji', $data);
		$this->load->view('admin/container/footer');
	}



	public function slip($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen Gaji';
		$dataHeader['file'] = 'Cetak Slip Gaji';
		$dataHeader['action'] = $Aksi;
		$data['spv']	= $this->model->ViewAsc('tb_spv', 'id_spv');

		$dataHeader['notif_absensi']	= $this->model->notifAbsensi();
		$dataHeader['data_notif_absen']		= $this->model->View('v_data_notif_absen');

		$this->load->view('admin/container/header', $dataHeader);
		$this->load->view('admin/gaji/slip_gaji', $data);
		$this->load->view('admin/container/footer');
	}

	public function rekap_gaji($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen Gaji';
		$dataHeader['file'] = 'Cetak Rekap Gaji';
		$dataHeader['action'] = $Aksi;
		$data['spv']	= $this->model->ViewAsc('tb_spv', 'id_spv');

		$dataHeader['notif_absensi']	= $this->model->notifAbsensi();
		$dataHeader['data_notif_absen']		= $this->model->View('v_data_notif_absen');

		$this->load->view('admin/container/header', $dataHeader);
		$this->load->view('admin/gaji/rekap_gaji', $data);
		$this->load->view('admin/container/footer');
	}

	public function tampilkan_data_slip_gaji()
	{

		$cBulan 		= $_GET['cBulan'];
		$cTahun 		= $_GET['cTahun'];
		$data['bulan']	= $cBulan;
		$data['tahun']	= $cTahun;
		$this->load->view('admin/gaji/slip_gaji_view', $data);
	}

	public function tampilkan_data_rekap_gaji()
	{

		$cBulan 		= $_GET['cBulan'];
		$cTahun 		= $_GET['cTahun'];
		$data['bulan']	= $cBulan;
		$data['tahun']	= $cTahun;
		$this->load->view('admin/gaji/rekap_gaji_view', $data);
	}



	public function error($Aksi = "")
	{
		$data['menu'] = 'other';
		$data['file'] = 'error';
		$data['action'] = $Aksi;
		$this->load->view('admin/index', $data);
	}



	public function getDataExcel($cFile = '')
	{
		$cDataFile    = urldecode($cFile);
		echo "$cDataFile <br />";

		$file_tmp = $_FILES['foto']['tmp_name'];
		$nama_file = $_FILES['foto']['name'];

		echo "ini nama file : $nama_file <br />";
		echo "ini file tmp : $file_tmp <br />";



		//$cView 			= $this->relasi->GetDataPelanggaran($cDataFile);

		if ($cFile == '') {

			// $data['cek_pegawai']	= $this->relasi->GetDataPelanggaran($cDataFile);
			// $data['keterangan']     = "Nama Belum Di Isi ";
			// $data['nama']			=  urldecode($cFile);
			// $this->load->view('admin/transaksi/data/tb_cek_pelanggaran', $data);
			echo "hai if";
		} else {
			// if ($cView->num_rows() > 0) {
			// 	$data['cek_pegawai']	= $this->relasi->GetDataPelanggaran($cDataFile);
			// 	$data['keterangan']     = " Sistem Mendeteksi Kemiripan Nama ";
			// 	$data['nama']			=  urldecode($cFile);
			// 	$this->load->view('admin/transaksi/data/tb_cek_pelanggaran', $data);
			// } else {
			// 	$data['cek_pegawai']	= " ";
			// 	$data['keterangan']		= " Nama Belum Ada Di Sistem , Aman Untuk Disimpan ";
			// 	$data['nama']			= urldecode($cFile);
			// 	$this->load->view('admin/transaksi/data/tb_cek_pelanggaran', $data);
			// }
			echo "hai else";
		}
	}
}
