<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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

	public function tb_operator()
	{

		$data['row']	= $this->relasi->GetDataPegawai();
		$this->load->view('admin/transaksi/data/tb_operator', $data);
	}

	public function tb_absensi()
	{

		$data['row']	= $this->relasi->GetDataAbsensi_tabel_new();
		$this->load->view('admin/transaksi/data/tb_show_absensi_data2', $data);
	}

	public function tb_temp_update_absensi()
	{

		$data['row']	= $this->relasi->GetDataTempAbsensi_tabel();
		$this->load->view('admin/transaksi/data/request_update_absen', $data);
	}

	public function tb_office()
	{

		$data['office'] = $this->relasi->GetDataPegawaiOffice();
		$this->load->view('admin/transaksi/data/tb_office', $data);
	}

	public function tb_lapangan()
	{

		$data['row'] = $this->relasi->GetDataPegawaiLapangan();
		$this->load->view('admin/transaksi/data/tb_lapangan', $data);
	}

	public function tb_masakerjakurang3bulan()
	{

		$data['masakerja'] = $this->relasi->v_GetDataMasaKerja();
		$this->load->view('admin/transaksi/data/tb_masakerjakurang3bulan', $data);
	}

	public function tb_detail_pegawai($Id)
	{

		$data['id'] = $Id;
		$data['view'] = $this->relasi->GetDataPegawaiSearch($Id);
		$this->load->view('admin/transaksi/data/detail', $data);
	}

	public function tb_pegawaimengundurkandiri()
	{

		$data['row'] = $this->relasi->GetDataPegawaiMengundurkanDiri();
		$this->load->view('admin/transaksi/data/tb_pegawaimengundurkandiri', $data);
	}

	public function tb_pegawaibom()
	{

		$data['row'] = $this->relasi->GetDataPegawaiBom();
		$this->load->view('admin/transaksi/data/tb_pegawaibom', $data);
	}

	public function cek_nama_pegawai($cPin)
	{
		$cNamaSearch    = urldecode($cPin);
		$cView 			= $this->relasi->GetDataPelanggaran($cNamaSearch);
		// echo "ini adalah : $cNamaSearch";

		if ($cPin == '') {

			$data['cek_pegawai']	= $this->relasi->GetDataPelanggaran($cNamaSearch);
			$data['keterangan']     = "PIN Belum Di Isi ";
			$data['pin']			=  urldecode($cPin);
			$this->load->view('admin/transaksi/data/tb_cek_pelanggaran', $data);
		} else {
			if ($cView->num_rows() > 0) {
				$data['cek_pegawai']	= $this->relasi->GetDataPelanggaran($cNamaSearch);
				$data['keterangan']     = " Sistem Mendeteksi Kemiripan PIN ";
				$data['pin']			=  urldecode($cPin);
				$this->load->view('admin/transaksi/data/tb_cek_pelanggaran', $data);
			} else {
				$data['cek_pegawai']	= " ";
				$data['keterangan']		= " PIN Belum Ada Di Sistem , Aman Untuk Disimpan ";
				$data['pin']			= urldecode($cPin);
				$this->load->view('admin/transaksi/data/tb_cek_pelanggaran', $data);
			}
		}
	}

	public function pegawai($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] 	= 'Manajemen Pegawai';
		$dataHeader['file'] 	= 'DATA PEGAWAI';
		$dataHeader['action'] 	= $Aksi;
		$data['lastno']			= $this->db->query('SELECT SUBSTR(nik,7,4) as nik FROM tb_pegawai');
		$data['kerja']	   		= $this->model->ViewASC('tb_kerja', 'id_kerja');
		$data['pendidikan']		= $this->model->ViewASC('tb_pendidikan', 'id_pendidikan');
		$data['pegawai']		= $this->model->ViewASC('tb_pegawai', 'nama');
		$data['area']			= $this->model->View('tb_area_kerja', 'id_area');
		$data['status']			= $this->model->ViewASC('tb_status_karyawan', 'id_status');
		$data['outlet']			= $this->model->ViewASC('tb_outlet', 'id_outlet');
		$data['lapangan']		= $this->model->ViewASC('tim_lapangan', 'id_tim_lapangan');
		$data['tanggal']		= $this->DateStamp();
		$data['bayar']			= $this->model->MenampilkanCaraBayarTanpaBNI();
		$data['row']			= $this->relasi->GetDataPegawai();
		$data['office'] 		= $this->relasi->GetDataPegawaiOffice();
		$data['masakerja'] 		= $this->relasi->GetDataMasaKerja($Id);
		if ($Aksi == 'edit') {
			$data['field'] 	= $this->model->ViewWhere('tb_pegawai', 'id_pegawai', $Id);
		} elseif ($Aksi == 'view') {
			$data['view'] 		= $this->relasi->GetDataPegawaiSearch($Id);
		}

		$this->load->view('admin/container/header', $dataHeader);
		$this->load->view('admin/transaksi/pegawai', $data);
		$this->load->view('admin/container/footer');
	}

	public function view_pegawai($Id = "", $Aksi = "")
	{
		$dataHeader['menu'] = 'Manajemen Pegawai';
		$dataHeader['file'] = 'VIEW PEGAWAI';
		$dataHeader['action'] = $Aksi;
		$data['view'] 		= $this->relasi->GetDataPegawaiSearch($Id);
		$data['panggilan'] 	= $this->relasi->GetSuratPanggilanPegawaiSearch($Id);
		$data['pernyataan'] = $this->relasi->GetSuratPernyataanPegawaiSearch($Id);
		$data['peringatan'] = $this->relasi->GetSuratPeringatanPegawaiSearch($Id);
		$data['istirahat']  = $this->relasi->GetSuratIstirahatPegawaiSearch($Id);
		$data['skorsing']	= $this->relasi->GetSuratSkorsingPegawaiSearch($Id);
		$data['mutasi']		= $this->relasi->GetDataMutasiPegawaiSearch($Id);
		$data['tugas']		= $this->relasi->GetDataTugasPegawaiSearch($Id);


		$this->load->view('admin/container/header', $dataHeader);
		$this->load->view('admin/transaksi/view.pegawai.php', $data);
		$this->load->view('admin/container/footer');
	}

	public function jabatan_pegawai($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen Pegawai';
		$dataHeader['file'] = 'JABATAN PEGAWAI';
		$dataHeader['action'] = $Aksi;
		$query 				= $this->db->query('select t1.nama, t1.nik, t3.nama_jabatan from tb_pegawai t1 JOIN tb_jabatan_pegawai t2 ON t1.id_pegawai = t2.id_pegawai JOIN tb_ref_jabatan t3 ON t2.id_ref_jabatan = t3.id_ref_jabatan');
		// $data['pegawai']	= $query->result_array();
		$data['pegawai']	= $this->model->ViewASC('tb_pegawai', 'nama');
		$data['sub_unit']	= $this->model->ViewASC('tb_sub_unit_kerja', 'nama_sub_unit_kerja');
		$data['jabatan']	= $this->model->ViewASC('tb_ref_jabatan', 'nama_jabatan');
		$data['row']		= $this->relasi->GetDataJabatanPegawai();
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tb_jabatan_pegawai', 'id_jabatan_pegawai', $Id);
		} elseif ($Aksi == 'view') {
			$data['view'] = $this->relasi->GetDataJabatanSearch($Id);
		}
		$this->load->view('admin/container/header', $dataHeader);
		$this->load->view('admin/transaksi/jabatan_pegawai', $data);
		$this->load->view('admin/container/footer');
	}

	public function kontrak($Aksi = "", $Id = "")
	{
		$data['action'] = $Aksi;
		$data['menu']   = 'Manajemen Pegawai';
		$data['file']   = 'Form Kontrak Pegawai';
		$data['pegawai'] = $this->model->View('tb_pegawai', 'id_pegawai');
		$data['row']	= $this->db->query('SELECT * FROM kontrak t1 JOIN tb_pegawai t2 ON t1.id_pegawai=t2.id_pegawai')->result_array();
		$data['Nolast']	= $this->db->query('SELECT SUBSTR(no_surat,4,4) as nomor_surat FROM kontrak');
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('v_pegawai_pelanggaran_sp', 'nomor_surat', $Id);
		}
		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/transaksi/kontrak', $data);
		$this->load->view('admin/container/footer');
	}

	public function ketidakhadiran_pegawai($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen Pegawai';
		$dataHeader['file'] = 'KETIDAKHADIRAN PEGAWAI';
		$dataHeader['action'] = $Aksi;
		$data['pegawai']	= $this->model->ViewASC('tb_pegawai', 'nama');
		$data['row']		= $this->relasi->GetDataKetidakhadiranPegawai();
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tb_ketidakhadiran', 'id_ketidakhadiran', $Id);
		} elseif ($Aksi == 'view') {
			$data['view'] 	= $this->relasi->GetDataKetidakhadiranPegawaiSearch($Id);
		}
		$this->load->view('admin/container/header', $dataHeader);
		$this->load->view('admin/transaksi/ketidakhadiran_pegawai', $data);
		$this->load->view('admin/container/footer');
	}

	public function kesehatan_pegawai($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen Pegawai';
		$dataHeader['file'] = 'KESEHATAN PEGAWAI';
		$dataHeader['action'] = $Aksi;
		$data['pegawai']	= $this->model->ViewASC('tb_pegawai', 'nama');
		$data['row']		= $this->relasi->GetDataKesehatanPegawai();
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tb_kesehatan', 'id_kesehatan', $Id);
		} elseif ($Aksi == 'view') {
			$data['view'] 	= $this->relasi->GetDataKesehatanPegawaiSearch($Id);
		}
		$this->load->view('admin/container/header', $dataHeader);
		$this->load->view('admin/transaksi/kesehatan_pegawai', $data);
		$this->load->view('admin/container/footer');
	}

	public function pendidikan_pegawai($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen Pegawai';
		$dataHeader['file'] = 'PENDIDIKAN PEGAWAI';
		$dataHeader['action'] = $Aksi;
		$data['pegawai']	= $this->model->ViewASC('tb_pegawai', 'nama');
		$data['pendidikan']	= $this->model->ViewASC('tb_pendidikan', 'id_pendidikan');
		$data['row']		= $this->relasi->GetDataPendidikanPegawai();
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tb_pendidikan_pegawai', 'id_pendidikan_pegawai', $Id);
		} elseif ($Aksi == 'view') {
			$data['view'] 	= $this->relasi->GetDataPendidikanPegawaiSearch($Id);
		}
		$this->load->view('admin/container/header', $dataHeader);
		$this->load->view('admin/transaksi/pendidikan_pegawai', $data);
		$this->load->view('admin/container/footer');
	}

	public function pengalaman_pegawai($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen Pegawai';
		$dataHeader['file'] = 'PENGALAMAN PEGAWAI';
		$dataHeader['action'] = $Aksi;
		$data['pegawai']	= $this->model->ViewASC('tb_pegawai', 'nama');
		$data['row']		= $this->relasi->GetDataPengalamanPegawai();
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tb_pengalaman', 'id_pengalaman', $Id);
		} elseif ($Aksi == 'view') {
			$data['view'] 	= $this->relasi->GetDataPengalamanPegawaiSearch($Id);
		}
		$this->load->view('admin/container/header', $dataHeader);
		$this->load->view('admin/transaksi/pengalaman_pegawai', $data);
		$this->load->view('admin/container/footer');
	}

	public function kuisioner_pegawai($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen Pegawai';
		$dataHeader['file'] = 'KUISIONER PEGAWAI';
		$dataHeader['action'] = $Aksi;
		$data['tanggal']	= $this->DateStamp();
		$data['pegawai']	= $this->model->ViewASC('tb_pegawai', 'nama');
		$data['row']		= $this->relasi->GetDataKuisionerPegawai();
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tb_kuisioner', 'id_kuisioner', $Id);
		} elseif ($Aksi == 'view') {
			$data['view'] 	= $this->relasi->GetDataKuisionerPegawaiSearch($Id);
		}
		$this->load->view('admin/container/header', $dataHeader);
		$this->load->view('admin/transaksi/kuesioner_pegawai', $data);
		$this->load->view('admin/container/footer');
	}

	public function prestasi_pegawai($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen Pegawai';
		$dataHeader['file'] = 'PRESTASI PEGAWAI';
		$dataHeader['action'] = $Aksi;
		$data['tanggal']	= $this->DateStamp();
		$data['pegawai']	= $this->model->ViewASC('tb_pegawai', 'nama');
		$data['row']		= $this->relasi->GetDataPrestasiPegawai();
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tb_prestasi', 'id_prestasi', $Id);
		} elseif ($Aksi == 'view') {
			$data['view'] 	= $this->relasi->GetDataPrestasiPegawaiSearch($Id);
		}
		$this->load->view('admin/container/header', $dataHeader);
		$this->load->view('admin/transaksi/prestasi_pegawai', $data);
		$this->load->view('admin/container/footer');
	}

	public function mutasi_pegawai($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen Pegawai';
		$dataHeader['file'] = 'Mutasi PEGAWAI';
		$dataHeader['action'] = $Aksi;
		$data['IdKategoriSurat'] = $Aksi;
		$data['tanggal']	= $this->DateStamp();
		$data['pegawai']	= $this->model->View('tb_pegawai', 'nama');
		$data['jabatan']	= $this->model->View('tb_sub_unit_kerja', 'nama_sub_unit_kerja');
		$data['row']		= $this->relasi->GetDataMutasiPegawai();
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tb_mutasi', 'id_mutasi', $Id);
		} elseif ($Aksi == 'view') {
			$data['view'] 	= $this->relasi->GetDataMutasiSearch($Id);
		}
		$this->load->view('admin/container/header', $dataHeader);
		$this->load->view('admin/transaksi/mutasi_pegawai', $data);
		$this->load->view('admin/container/footer');
	}

	public function pengundurandiri_pegawai($Aksi = "", $Id = "")
	{
		$dataHeader['menu'] = 'Manajemen Pegawai';
		$dataHeader['file'] = 'PENGUNDURAN DIRI PEGAWAI';
		$dataHeader['action'] = $Aksi;
		$data['pegawai']	= $this->model->ViewASC('tb_pegawai', 'nik');
		$data['row']		= $this->relasi->GetDataPengundurandiriPegawai();
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('tb_pengunduran_diri', 'id_pengunduran_diri', $Id);
		} elseif ($Aksi == 'view') {
			$data['view'] 	= $this->relasi->GetDataPengundurandiriPegawaiSearch($Id);
		} elseif ($Aksi == 'delete') {
			//$data['delete'] 	= $this->relasi->GetDataPengundurandiriPegawaiSearch($Id);
		}

		$this->load->view('admin/container/header', $dataHeader);
		$this->load->view('admin/transaksi/pengunduran_pegawai', $data);
		$this->load->view('admin/container/footer');
	}



	public function error($Aksi = "")
	{
		$data['menu'] = 'other';
		$data['file'] = 'error';
		$data['action'] = $Aksi;
		$this->load->view('admin/index', $data);
	}

	public function update_master_pegawai()
	{
		$id = $this->input->post('pin');

		$data = array(
			'pin' => $this->input->post('pin'),
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('nama'),
			'jabatan' => $this->input->post('jabatan'),
			'departemen' => $this->input->post('departemen'),
			'kantor' => $this->input->post('kantor')
		);

		// echo $data;

		$this->model->Update('master_pegawai', 'pin', $id, $data);
	}

	public function teguran_lisan($Aksi = "", $Id = "")
	{
		$data['action'] = $Aksi;
		$data['menu']   = 'HRD';
		$data['file']   = 'Teguran Lisan';
		$data['row']	= $this->model->ViewWhereAnd('v_pegawai_pelanggaran_sp', 'id_kategori_surat', '2', 'is_delete', '0');
		$data['pegawai'] = $this->model->View('tb_pegawai', 'id_pegawai');
		// $data['pegawai'] = $this->model->View('v_data_sp', 'id_pegawai');
		if ($Aksi == 'view') {
			$data['field'] = $this->model->ViewWhere('v_pegawai_pelanggaran_sp', 'id', $Id);

			$dbArea = $this->model->ViewWhere('v_pegawai_pelanggaran_sp', 'id', $Id);
			foreach ($dbArea as $key => $vaArea) {
				$idP = $vaArea['id_pegawai'];
			}

			$dbView = $this->model->ViewWhere('v_data_sp', 'id_pegawai', $idP);
			$nik = "";
			$nama_jabatan = "";
			foreach ($dbView as $key => $vaView) {
				$nik = $vaView['nik'];
				$nama_jabatan = $vaView['nama_jabatan'];
			}
			$data['nik_select'] = $nik;
			$data['nj_select'] = $nama_jabatan;
		} elseif ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('v_pegawai_pelanggaran_sp', 'id', $Id);

			$dbArea = $this->model->ViewWhere('v_pegawai_pelanggaran_sp', 'id', $Id);
			foreach ($dbArea as $key => $vaArea) {
				$idP = $vaArea['id_pegawai'];
			}

			$dbView = $this->model->ViewWhere('v_data_sp', 'id_pegawai', $idP);
			$nik = "";
			$nama_jabatan = "";
			foreach ($dbView as $key => $vaView) {
				$nik = $vaView['nik'];
				$nama_jabatan = $vaView['nama_jabatan'];
			}
			$data['nik_select'] = $nik;
			$data['nj_select'] = $nama_jabatan;
		} else {
		}

		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/transaksi/teguran_lisan', $data);
		$this->load->view('admin/container/footer');
	}

	public function surat_teguran($Aksi = "", $Id = "")
	{

		$data['action'] = $Aksi;
		$data['menu']   = 'HRD';
		$data['file']   = 'Surat Teguran';
		$data['row']	= $this->model->ViewWhereAnd('v_pegawai_pelanggaran_sp', 'id_kategori_surat', '1', 'is_delete', '0');
		$data['pegawai'] = $this->model->View('tb_pegawai', 'id_pegawai');
		// $data['pegawai'] = $this->model->View('v_data_sp', 'id_pegawai');
		$data['Nolast']	= $this->db->query('SELECT SUBSTR(nomor_surat,4,4) as nomor_surat FROM v_pegawai_pelanggaran_sp');
		if ($Aksi == 'view') {
			$data['field'] = $this->model->ViewWhere('v_pegawai_pelanggaran_sp', 'id', $Id);

			$dbArea = $this->model->ViewWhere('v_pegawai_pelanggaran_sp', 'id', $Id);
			foreach ($dbArea as $key => $vaArea) {
				$idP = $vaArea['id_pegawai'];
			}

			$dbView = $this->model->ViewWhere('v_data_sp', 'id_pegawai', $idP);
			foreach ($dbView as $key => $vaView) {
				$nama_jabatan = $vaView['nama_jabatan'];
			}
			$data['nj_select'] = $nama_jabatan;
		} elseif ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('v_pegawai_pelanggaran_sp', 'id', $Id);

			$dbArea = $this->model->ViewWhere('v_pegawai_pelanggaran_sp', 'id', $Id);
			foreach ($dbArea as $key => $vaArea) {
				$idP = $vaArea['id_pegawai'];
			}

			$dbView = $this->model->ViewWhere('v_data_sp', 'id_pegawai', $idP);
			foreach ($dbView as $key => $vaView) {
				$nik = $vaView['nik'];
				$nama_jabatan = $vaView['nama_jabatan'];
			}
			$data['nik_select'] = $nik;
			$data['nj_select'] = $nama_jabatan;
		} else {
		}
		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/transaksi/surat_teguran', $data);
		$this->load->view('admin/container/footer');
	}

	public function sp1($Aksi = "", $Id = "")
	{
		$data['action'] = $Aksi;
		$data['menu']   = 'HRD';
		$data['file']   = 'Surat Peringatan I';
		$data['row']	= $this->model->View('v_pegawai_pelanggaran_sp', 'tanggal');
		$data['pegawai'] = $this->model->View('tb_pegawai', 'id_pegawai');
		$data['Nolast']	= $this->db->query('SELECT SUBSTR(nomor_surat,4,4) as nomor_surat FROM v_pegawai_pelanggaran_sp');
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('v_pegawai_pelanggaran_sp', 'nomor_surat', $Id);
		}
		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/transaksi/surat_peringatan_1', $data);
		$this->load->view('admin/container/footer');
	}

	public function sp2($Aksi = "", $Id = "")
	{
		$data['action'] = $Aksi;
		$data['menu']   = 'HRD';
		$data['file']   = 'Surat Peringatan II';
		$data['row']	= $this->model->View('v_pegawai_pelanggaran_sp', 'tanggal');
		$data['pegawai'] = $this->model->View('tb_pegawai', 'id_pegawai');
		$data['Nolast']	= $this->db->query('SELECT SUBSTR(nomor_surat,4,4) as nomor_surat FROM v_pegawai_pelanggaran_sp');
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('v_pegawai_pelanggaran_sp', 'nomor_surat', $Id);
		}
		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/transaksi/surat_peringatan_2', $data);
		$this->load->view('admin/container/footer');
	}

	public function sp3($Aksi = "", $Id = "")
	{
		$data['action'] = $Aksi;
		$data['menu']   = 'HRD';
		$data['file']   = 'Surat Peringatan III';
		$data['row']	= $this->model->View('v_pegawai_pelanggaran_sp', 'tanggal');
		$data['pegawai'] = $this->model->View('tb_pegawai', 'id_pegawai');
		$data['Nolast']	= $this->db->query('SELECT SUBSTR(nomor_surat,4,4) as nomor_surat FROM v_pegawai_pelanggaran_sp');
		if ($Aksi == 'edit') {
			$data['field'] = $this->model->ViewWhere('v_pegawai_pelanggaran_sp', 'nomor_surat', $Id);
		}
		$this->load->view('admin/container/header', $data);
		$this->load->view('admin/transaksi/surat_peringatan_3', $data);
		$this->load->view('admin/container/footer');
	}

	public function update_import()
	{
		$id = $this->input->post('id');

		$data = array(
			'id' => $this->input->post('id'),
			'pin' => $this->input->post('pin'),
			'tanggal' => $this->input->post('tanggal'),
			// 'scan_1' => $this->input->post('scan1'),
			// 'scan_2' => $this->input->post('scan2'),
			// 'scan_3' => $this->input->post('scan3'),
			// 'scan_4' => $this->input->post('scan4'),
			// 'scan_5' => $this->input->post('scan5'),
			'tot_jam_kerja' => $this->input->post('ft'),
			'tot_jam_lembur' => $this->input->post('lembur'),
			// 'izin_durasi' => $this->input->post('izdur'),
			'keterangan' => $this->input->post('ket')
		);

		// $this->model->Update('import', 'no', $id, $data);
		$this->model->Update('log_absen', 'id', $id, $data);
	}
}
