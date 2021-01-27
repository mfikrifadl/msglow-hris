<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_act extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();

		//MenLoad model yang berada di Folder Model dan namany model
		$this->load->model('model');
		$this->load->model('relasi');
		// Meload Library session 
		$this->load->library('session');
		// Meload database
		$this->load->database();
		// Meload url 
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
		$Data = date("d-m-Y h:i:s");
		return $Data;
	}

	public function GetUmur($tgl_lahir)
	{
		// $tgl = explode("-", $tgl_lahir);
		// $cek_jmlhr1 = cal_days_in_month(CAL_GREGORIAN, $tgl['1'], $tgl['2']);
		// $cek_jmlhr2 = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
		// $sshari = $cek_jmlhr1 - $tgl['0'];
		// $ssbln = 12 - $tgl['1'] - 1;
		// $hari = 0;
		// $bulan = 0;
		// $tahun = 0;
		// if ($sshari + date('d') >= $cek_jmlhr2) {
		// 	$bulan = 1;
		// 	$hari = $sshari + date('d') - $cek_jmlhr2;
		// } else {
		// 	$hari = $sshari + date('d');
		// }
		// if ($ssbln + date('m') + $bulan >= 12) {
		// 	$bulan = ($ssbln + date('m') + $bulan) - 12;
		// 	$tahun = date('Y') - $tgl['2'];
		// } else {
		// 	$bulan = ($ssbln + date('m') + $bulan);
		// 	$tahun = (date('Y') - $tgl['2']) - 1;
		// }

		// $selisih = $tahun;
		// return $selisih;

		$birthDate = new DateTime($tgl_lahir);
		$today = new DateTime("today");
		if ($birthDate > $today) {
			$umur = 0;
			return $umur;
		}
		$y = $today->diff($birthDate)->y;
		$m = $today->diff($birthDate)->m;
		$d = $today->diff($birthDate)->d;
		return $y . " tahun " . $m . " bulan " . $d . " hari";
	}

	public function GetUmurPasangan($tgl_lahir)
	{
		// echo "tanggal lahir istri/suami : $tgl_lahir";
		// $tgl = explode("-", $tgl_lahir);
		// // echo "tanggal lahir istri/suami : $tgl";
		// $cek_jmlhr1 = cal_days_in_month(CAL_GREGORIAN, $tgl['1'], $tgl['2']);
		// $cek_jmlhr2 = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
		// $sshari = $cek_jmlhr1 - $tgl['0'];
		// $ssbln = 12 - $tgl['1'] - 1;
		// $hari = 0;
		// $bulan = 0;
		// $tahun = 0;
		// if ($sshari + date('d') >= $cek_jmlhr2) {
		// 	$bulan = 1;
		// 	$hari = $sshari + date('d') - $cek_jmlhr2;
		// } else {
		// 	$hari = $sshari + date('d');
		// }
		// if ($ssbln + date('m') + $bulan >= 12) {
		// 	$bulan = ($ssbln + date('m') + $bulan) - 12;
		// 	$tahun = date('Y') - $tgl['2'];
		// } else {
		// 	$bulan = ($ssbln + date('m') + $bulan);
		// 	$tahun = (date('Y') - $tgl['2']) - 1;
		// }

		// $selisih = $tahun;
		// return $selisih;		

		$birthDate = new DateTime($tgl_lahir);
		$today = new DateTime("today");
		if ($birthDate > $today) {
			$umur = 0;
			return $umur;
		}
		$y = $today->diff($birthDate)->y;
		$m = $today->diff($birthDate)->m;
		$d = $today->diff($birthDate)->d;
		return $y . " tahun " . $m . " bulan " . $d . " hari";
	}

	public function GetUmurAnak1($tgl_lahir)
	{
		$birthDate = new DateTime($tgl_lahir);
		$today = new DateTime("today");
		if ($birthDate > $today) {
			$umur = 0;
			return $umur;
		}
		$y = $today->diff($birthDate)->y;
		$m = $today->diff($birthDate)->m;
		$d = $today->diff($birthDate)->d;
		return $y . " tahun " . $m . " bulan " . $d . " hari";
	}

	public function GetUmurAnak2($tgl_lahir)
	{
		$birthDate = new DateTime($tgl_lahir);
		$today = new DateTime("today");
		if ($birthDate > $today) {
			$umur = 0;
			return $umur;
		}
		$y = $today->diff($birthDate)->y;
		$m = $today->diff($birthDate)->m;
		$d = $today->diff($birthDate)->d;
		return $y . " tahun " . $m . " bulan " . $d . " hari";
	}

	public function GetUmurAnak3($tgl_lahir)
	{
		$birthDate = new DateTime($tgl_lahir);
		$today = new DateTime("today");
		if ($birthDate > $today) {
			$umur = 0;
			return $umur;
		}
		$y = $today->diff($birthDate)->y;
		$m = $today->diff($birthDate)->m;
		$d = $today->diff($birthDate)->d;
		return $y . " tahun " . $m . " bulan " . $d . " hari";
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
		$doubleHash = sha1($cPassword);
		// $pass = $this->input->post('password');
		// echo "$pass <br />";
		// echo "md5 + sha1 : $doubleHash <br />";
		// echo "md5 : $cPassword <br />";

		$cUser 	   = ($this->input->post('username'));
		$nRow = $this->model->LoginAdmin($cUser, $doubleHash);
		if ($nRow->num_rows() > 0) {
			foreach ($nRow->result_array() as $Row) {
				$Nama		= $Row['nama'];
				$Level 		= $Row['status'];
				$User		= $Row['username'];
				$Id			= $Row['id'];
				$is_interview			= $Row['is_interview'];
			}
			// $this->load->library('session');
			$this->session->set_userdata('nama', $Nama);
			$this->session->set_userdata('user', $User);
			$this->session->set_userdata('level', $Level);
			$this->session->set_userdata('id', $Id);
			$this->session->set_userdata('is_interview', $is_interview);
			// echo $Nama.' '.$User.' '. $Level.' '.$Id;
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

	public function pegawai($Type = "", $id = "")
	{
		// $data = array();
		$response["categories"] = array();

		if ($Type == 'Insert' or $Type == 'Update') {
			$cUmur 			= $this->GetUmur($this->input->post('dTglLahir'));
			$cUmurPasangan 	= $this->GetUmurPasangan($this->input->post('dTglLahirIstri'));
			$cUmurAnak1 	= $this->GetUmurAnak1($this->input->post('dTglLahirAnak1'));
			$cUmurAnak2 	= $this->GetUmurAnak2($this->input->post('dTglLahirAnak2'));
			$cUmurAnak3 	= $this->GetUmurAnak3($this->input->post('dTglLahirAnak3'));

			// echo "umur : $cUmur <br />";
			// echo "umur cUmurPasangan : $cUmurPasangan <br />";
			// echo "umur cUmurAnak1 : $cUmurAnak1 <br />";
			// echo "umur cUmurAnak2 : $cUmurAnak2 <br />";
			// echo "umur cUmurAnak3 : $cUmurAnak3 <br />";

			$Waktu 		= date("dmYhis");
			$namafoto 	= (!empty($_FILES['foto']['name'])) ? $_FILES['foto']['name'] : "";
			if (strlen($namafoto) > 0) {
				if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
					move_uploaded_file($_FILES['foto']['tmp_name'], "upload/pegawai/" . $Waktu . $namafoto);
				}
			}
			if (empty($namafoto)) {

				$data = array(
					'id_kerja'				=>	$this->input->post('cIdKerja'),
					'id_area'				=>	$this->input->post('cIdArea'),
					'id_status'				=>	$this->input->post('cIdStatus'),
					// 'id_tim_lapangan'		=>	$this->input->post('cIdTimLapangan'),
					'nik'					=>	$this->input->post('cNik'),
					'pin'					=>	$this->input->post('cPin'),
					'nama'					=>	$this->input->post('cNama'),
					'agama'					=>	$this->input->post('cAgama'),
					'alamat'				=>	$this->input->post('cAlamat'),
					'alamat_asal'			=>	$this->input->post('cAlamatAsal'),
					'jk'					=>	$this->input->post('cJenisKelamin'),
					'tempat_lahir'			=>	$this->input->post('cTempatLahir'),
					'tanggal_lahir'			=>  $this->Date2String($this->input->post('dTglLahir')),
					'umur'					=>	$cUmur,
					'gol_darah'				=>	$this->input->post('cGolDar'),
					'no_ktp'				=>	$this->input->post('nKtp'),
					'email'					=>	$this->input->post('cEmail'),
					'handphone'				=>	$this->input->post('nHandphone'),
					// 'nama_orang_tua' 		=>	$this->input->post('cOrtu'),
					// 'hub_keluarga'			=>	$this->input->post('cHubungan'),
					// 'no_keluarga'			=>	$this->input->post('nHpKeluarga'),
					// 'referensi'				=>	$this->input->post('cReferensi'),
					// 'tlp_referensi'			=>	$this->input->post('nTlpReferensi'),
					'tanggal_masuk_kerja' 	=> 	$this->Date2String($this->input->post('dTglMasukKerja')),
					'tgl_kontrak_berakhir' 	=> 	$this->Date2String($this->input->post('dTglKontrakBerakhir')),
					// 'bobot_nilai'			=>  $this->input->post('nBobot'),
					'pendidikan'			=>	$this->input->post('cIdPendidikan'),
					'jurusan'				=>	$this->input->post('cJurusan'),
					'outlet'				=>  $this->input->post('cOutlet'),
					'status_kawin'			=>  $this->input->post('cStatusKawin'),
					'istri_suami'			=>  $this->input->post('cNamaPasangan'),
					'tgl_lahir_istri' 		=> 	$this->Date2String($this->input->post('dTglLahirIstri')),
					'umur_istri'			=>	$cUmurPasangan,
					// 'jumlah_anak'			=>  $this->input->post('nJumlahAnak'),
					'anak_1'				=>  $this->input->post('nAnak1'),
					'tgl_lahir_anak_1' 		=> 	$this->Date2String($this->input->post('dTglLahirAnak1')),
					'umur_anak_1'			=>  $cUmurAnak1,
					'anak_2'				=>  $this->input->post('nAnak2'),
					'tgl_lahir_anak_2' 		=> 	$this->Date2String($this->input->post('dTglLahirAnak2')),
					'umur_anak_2'			=> 	$cUmurAnak2,
					'anak_3'				=>  $this->input->post('nAnak3'),
					'tgl_lahir_anak_3' 		=> 	$this->Date2String($this->input->post('dTglLahirAnak3')),
					'umur_anak_3'			=>  $cUmurAnak3,
					'jenis_pembayaran' 		=> 	$this->input->post('cJenisBayar'),
					'cabang_bank' 			=> 	$this->input->post('cCabangBank'),
					'no_rekening'			=>  $this->input->post('nRekening'),
					'no_npwp'				=>  $this->input->post('cNPWP'),
					'no_bpjs_ktk'			=>  $this->input->post('cBPJSKTK'),
					'no_bpjs_kes'			=>  $this->input->post('cBPJSKES'),
					'atas_nama'				=>  $this->input->post('cAtasNama'),
					'created'				=>  1

				);
			} else {
				$data = array(
					'id_kerja'				=>	$this->input->post('cIdKerja'),
					'id_area'				=>	$this->input->post('cIdArea'),
					'id_status'				=>	$this->input->post('cIdStatus'),
					// 'id_tim_lapangan'		=>	$this->input->post('cIdTimLapangan'),
					'nik'					=>	$this->input->post('cNik'),
					'pin'					=>	$this->input->post('cPin'),
					'nama'					=>	$this->input->post('cNama'),
					'agama'					=>	$this->input->post('cAgama'),
					'alamat'				=>	$this->input->post('cAlamat'),
					'alamat_asal'			=>	$this->input->post('cAlamatAsal'),
					'jk'					=>	$this->input->post('cJenisKelamin'),
					'tempat_lahir'			=>	$this->input->post('cTempatLahir'),
					'tanggal_lahir'			=>  $this->Date2String($this->input->post('dTglLahir')),
					'umur'					=>	$cUmur,
					'gol_darah'				=>	$this->input->post('cGolDar'),
					'no_ktp'				=>	$this->input->post('nKtp'),
					'email'					=>	$this->input->post('cEmail'),
					'handphone'				=>	$this->input->post('nHandphone'),
					// 'nama_orang_tua' 		=>	$this->input->post('cOrtu'),
					// 'hub_keluarga'			=>	$this->input->post('cHubungan'),
					// 'no_keluarga'			=>	$this->input->post('nHpKeluarga'),
					// 'referensi'				=>	$this->input->post('cReferensi'),
					// 'tlp_referensi'			=>	$this->input->post('nTlpReferensi'),
					'tanggal_masuk_kerja' 	=> 	$this->Date2String($this->input->post('dTglMasukKerja')),
					'tgl_kontrak_berakhir' 	=> 	$this->Date2String($this->input->post('dTglKontrakBerakhir')),
					// 'bobot_nilai'			=>  $this->input->post('nBobot'),
					'foto'					=>  "upload/pegawai/" . $Waktu . $namafoto,
					'pendidikan'			=>	$this->input->post('cIdPendidikan'),
					'jurusan'				=>	$this->input->post('cJurusan'),
					'outlet'				=>  $this->input->post('cOutlet'),
					'status_kawin'			=>  $this->input->post('cStatusKawin'),
					'istri_suami'			=>  $this->input->post('cNamaPasangan'),
					'tgl_lahir_istri' 		=> 	$this->Date2String($this->input->post('dTglLahirIstri')),
					'umur_istri'			=>	$cUmurPasangan,
					// 'jumlah_anak'			=>  $this->input->post('nJumlahAnak'),
					'anak_1'				=>  $this->input->post('nAnak1'),
					'tgl_lahir_anak_1' 		=> 	$this->Date2String($this->input->post('dTglLahirAnak1')),
					'umur_anak_1'			=>  $cUmurAnak1,
					'anak_2'				=>  $this->input->post('nAnak2'),
					'tgl_lahir_anak_2' 		=> 	$this->Date2String($this->input->post('dTglLahirAnak2')),
					'umur_anak_2'			=>  $cUmurAnak2,
					'anak_3'				=>  $this->input->post('nAnak3'),
					'tgl_lahir_anak_3' 		=> 	$this->Date2String($this->input->post('dTglLahirAnak3')),
					'umur_anak_3'			=>  $cUmurAnak3,
					'jenis_pembayaran' 		=> 	$this->input->post('cJenisBayar'),
					'cabang_bank' 			=> 	$this->input->post('cCabangBank'),
					'no_rekening'			=>  $this->input->post('nRekening'),
					'no_npwp'				=>  $this->input->post('cNPWP'),
					'no_bpjs_ktk'			=>  $this->input->post('cBPJSKTK'),
					'no_bpjs_kes'			=>  $this->input->post('cBPJSKES'),
					'atas_nama'				=>  $this->input->post('cAtasNama'),
					'created'				=>  1
				);
			}
		}
		if ($Type == 'Delete') {

			$data = array(
				'id_pegawai'				=>  $id,
				'is_deleted'				=>  1
			);
		}

		$seralizedArray = serialize($data);
		$vaLog = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'tb_pegawai',
			'action' => $Type,
			'query' => $seralizedArray,
			'nama' => $this->session->userdata('nama')
		);

		if ($Type == "Insert") {
			$GetNik = $this->db->query("SELECT nik FROM tb_pegawai 
			WHERE nik = '" . $this->input->post('cNik') . "' ");
			if ($GetNik->num_rows() > 0 and $this->input->post('cNik') != "") {
				redirect(site_url('transaksi/pegawai/error'));
			} elseif ($GetNik->num_rows() > 0 and $this->input->post('cNik') == "") {
				$this->model->Insert("log", $vaLog);
				$this->model->Insert('tb_pegawai', $data);
				redirect(site_url('transaksi/pegawai/I'));
			} else {
				$this->model->Insert("log", $vaLog);
				$this->model->Insert('tb_pegawai', $data);
				redirect(site_url('transaksi/pegawai/I'));
			}
		} elseif ($Type == "Update") {
			$this->model->Insert("log", $vaLog);
			$this->model->Update('tb_pegawai', 'id_pegawai', $id, $data);
			redirect(site_url('transaksi/pegawai/U'));
		} elseif ($Type == "Delete") {
			$this->model->Update_Delete('tb_pegawai', 'id_pegawai', $id, $data);
			redirect(site_url('transaksi/pegawai/D'));
		}
	}

	public function kontrak($Type = "", $Id = "")
	{

		if ($Type == 'Insert' or $Type == 'Update') {
			$dataInsert = array(
				'tanggal'       =>  date("Y-m-d"),
				'no_surat'      =>  $this->input->post('nNomorSurat'),
				'id_pegawai'	=>  $this->input->post('cIdPegawai'),
				'cCreate'		=>  $this->input->post('cCreate'),
				'is_deleted'	=>  0
			);
		} elseif ($Type=='Delete'){
			$dataInsert = array(
				'is_delete'		=>	1
			);
		}

		if($Type == 'Insert'){
			$this->model->Insert('kontrak', $dataInsert);	
		} elseif($Type=='Update'){
			$this->model->Update('kontrak', 'id_pegawai', $Id, $dataInsert);	
		} elseif($Type=='Delete'){
			$this->model->Update_Delete('kontrak', 'id_pegawai', $Id, $dataInsert);
		}

		redirect(site_url('transaksi/kontrak'));
	}

	public function jabatan_pegawai($Type = "", $id = "")
	{
		$data = array(
			'id_pegawai'		=> $this->input->post('cIdPegawai'),
			'id_sub_unit_kerja'	=> $this->input->post('cIdSubUnitKerja'),
			'id_ref_jabatan'	=> $this->input->post('cIdRefJabatan')
		);

		$dataDelete = array(
			'id_jabatan_pegawai'		=> $id,
			'is_deleted'		=> 1
		);

		$seralizedArray = serialize($data);
		$vaLog = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'tb_jabatan_pegawai',
			'action' => $Type,
			'query' => $seralizedArray,
			'nama' => $this->session->userdata('nama')
		);

		$seralizedArrayDelete = serialize($dataDelete);
		$vaLog2 = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'tb_jabatan_pegawai',
			'action' => $Type,
			'query' => $seralizedArrayDelete,
			'nama' => $this->session->userdata('nama')
		);

		if ($Type == "Insert") {
			$this->model->Insert("log", $vaLog);
			$this->model->Insert('tb_jabatan_pegawai', $data);
			redirect(site_url('transaksi/jabatan_pegawai/I'));
		} elseif ($Type == "Update") {
			$this->model->Insert("log", $vaLog);
			$this->model->Update('tb_jabatan_pegawai', 'id_jabatan_pegawai', $id, $data);
			redirect(site_url('transaksi/jabatan_pegawai/U'));
		} elseif ($Type == "Delete") {
			$this->model->Insert("log", $vaLog2);
			$this->model->Update_Delete('tb_jabatan_pegawai', 'id_jabatan_pegawai', $id, $dataDelete);
			redirect(site_url('transaksi/jabatan_pegawai/D'));
		}
	}

	public function ketidakhadiran_pegawai($Type = "", $id = "")
	{
		$data = array(
			'id_pegawai'	=> $this->input->post('cIdPegawai'),
			'tanggal'		=> $this->Date2String($this->input->post('dTgl')),
			'status'		=> $this->input->post('cIdStatus'),
			'keterangan'	=> $this->input->post('cKeterangan')
		);

		if ($Type == "Insert") {
			$this->model->Insert('tb_ketidakhadiran', $data);
			redirect(site_url('transaksi/ketidakhadiran_pegawai/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_ketidakhadiran', 'id_ketidakhadiran', $id, $data);
			redirect(site_url('transaksi/ketidakhadiran_pegawai/U'));
		} elseif ($Type == "Delete") {
			$this->model->Delete('tb_ketidakhadiran', 'id_ketidakhadiran', $id);
			redirect(site_url('transaksi/ketidakhadiran_pegawai/D'));
		}
	}

	public function kesehatan_pegawai($Type = "", $id = "")
	{
		$data = array(
			'id_pegawai'	=> $this->input->post('cIdPegawai'),
			'penyakit'		=> $this->Date2String($this->input->post('cPenyakit')),
			'tahun'		=> $this->input->post('cTahun')
		);

		if ($Type == "Insert") {
			$this->model->Insert('tb_kesehatan', $data);
			redirect(site_url('transaksi/kesehatan_pegawai/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_kesehatan', 'id_kesehatan', $id, $data);
			redirect(site_url('transaksi/kesehatan_pegawai/U'));
		} elseif ($Type == "Delete") {
			$this->model->Delete('tb_kesehatan', 'id_kesehatan', $id);
			redirect(site_url('transaksi/kesehatan_pegawai/D'));
		}
	}

	public function pendidikan_pegawai($Type = "", $id = "")
	{
		$data = array(
			'id_pegawai'	=> $this->input->post('cIdPegawai'),
			'id_pendidikan'	=> ($this->input->post('cIdPendidikan')),
			'nama_sekolah'	=> $this->input->post('cNamaSekolah'),
			'jurusan'		=> $this->input->post('cNamaJurusan'),
			'tahun_masuk'	=> $this->input->post('cTahunMasuk'),
			'tahun_lulus'	=> $this->input->post('cTahunLulus'),
			'gelar'			=> $this->input->post('cGelar'),
			'nun_ipk'		=> $this->input->post('cNun')
		);

		if ($Type == "Insert") {
			$this->model->Insert('tb_pendidikan_pegawai', $data);
			redirect(site_url('transaksi/pendidikan_pegawai/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_pendidikan_pegawai', 'id_pendidikan_pegawai', $id, $data);
			redirect(site_url('transaksi/pendidikan_pegawai/U'));
		} elseif ($Type == "Delete") {
			$this->model->Delete('tb_pendidikan_pegawai', 'id_pendidikan_pegawai', $id);
			redirect(site_url('transaksi/pendidikan_pegawai/D'));
		}
	}

	public function pengalaman_pegawai($Type = "", $id = "")
	{
		$data = array(
			'id_pegawai'	=> $this->input->post('cIdPegawai'),
			'perusahaan'	=> ($this->input->post('cPerusahaan')),
			'bidang_usaha'	=> $this->input->post('cBidangUsaha'),
			'tanggal_masuk'	=> $this->Date2String($this->input->post('dTglMasuk')),
			'tanggal_keluar' => $this->Date2String($this->input->post('dTglKeluar')),
			'job_desk'		=> $this->input->post('cJob'),
			'bobot_nilai'	=> $this->input->post('nBobot')
		);

		if ($Type == "Insert") {
			$this->model->Insert('tb_pengalaman', $data);
			redirect(site_url('transaksi/pengalaman_pegawai/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_pengalaman', 'id_pengalaman', $id, $data);
			redirect(site_url('transaksi/pengalaman_pegawai/U'));
		} elseif ($Type == "Delete") {
			$this->model->Delete('tb_pengalaman', 'id_pengalaman', $id);
			redirect(site_url('transaksi/pengalaman_pegawai/D'));
		}
	}

	public function kuisioner_pegawai($Type = "", $id = "")
	{
		if ($Type == 'Insert' or $Type == 'Update') {
			$dTgl 		= $this->input->post('dTgl');
			$vaExplode  = explode("-", $dTgl);
			$cBulan		= $vaExplode[1];
			$cTahun 	= $vaExplode[2];

			$data = array(
				'id_pegawai'	=> $this->input->post('cIdPegawai'),
				'tanggal'		=> $this->Date2String($this->input->post('dTgl')),
				'bulan'			=> $cBulan,
				'tahun'			=> $cTahun,
				'keahlian'		=> ($this->input->post('cKeahlian')),
				'kekurangan_diri' => $this->input->post('cKekurangan'),
				'bersedia_menerima_tantangan' => ($this->input->post('cTantangan')),
				'inisiatif_untuk_perusahaan' => ($this->input->post('cInsiatif')),
				'catatan_dari_referensi' => $this->input->post('cCatatan'),
				'bobot_nilai'	=> $this->input->post('nBobot')
			);
		}

		if ($Type == "Insert") {
			$this->model->Insert('tb_kuisioner', $data);
			redirect(site_url('transaksi/kuisioner_pegawai/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_kuisioner', 'id_kuisioner', $id, $data);
			redirect(site_url('transaksi/kuisioner_pegawai/U'));
		} elseif ($Type == "Delete") {
			$this->model->Delete('tb_kuisioner', 'id_kuisioner', $id);
			redirect(site_url('transaksi/kuisioner_pegawai/D'));
		}
	}

	public function prestasi_pegawai($Type = "", $id = "")
	{
		if ($Type == 'Insert' or $Type == 'Update') {
			$dTgl 		= $this->input->post('dTgl');
			$vaExplode  = explode("-", $dTgl);
			$cBulan		= $vaExplode[1];
			$cTahun 	= $vaExplode[2];

			$data = array(
				'id_pegawai'	=> $this->input->post('cIdPegawai'),
				'tanggal'		=> $this->Date2String($dTgl),
				'tahun'			=> $cTahun,
				'prestasi'		=> ($this->input->post('cPrestasi'))
			);
		}

		if ($Type == "Insert") {
			$this->model->Insert('tb_prestasi', $data);
			redirect(site_url('transaksi/prestasi_pegawai/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_prestasi', 'id_prestasi', $id, $data);
			redirect(site_url('transaksi/prestasi_pegawai/U'));
		} elseif ($Type == "Delete") {
			$this->model->Delete('tb_prestasi', 'id_prestasi', $id);
			redirect(site_url('transaksi/prestasi_pegawai/D'));
		}
	}

	public function mutasi_pegawai($Type = "", $id = "")
	{
		if ($Type == 'Insert' or $Type == 'Update') {
			$data = array(
				'tanggal'			=> $this->Date2String($this->input->post('dTglMutasi')),
				'id_kategori_surat' => $this->input->post('cIdSurat'),
				'tahun'				=> date("Y"),
				'nomor_mutasi' 		=> $this->input->post('nNomorMutasi'),
				'id_pegawai'		=> $this->input->post('cIdPegawai'),
				'id_jabatan_lama' 	=> $this->input->post('cIdJabatanLama'),
				'tempat_lama'		=> $this->input->post('cTempatLama'),
				'atasan_lama'		=> $this->input->post('cAtasanLama'),
				'id_jabatan_baru' 	=> $this->input->post('cIdJabatanBaru'),
				'tempat_baru'		=> $this->input->post('cTempatBaru'),
				'atasan_baru'		=> $this->input->post('cAtasanBaru'),
				'tugas'				=> $this->input->post('cNamaTugas'),
				'create'			=> $this->input->post('cCreate')
			);
		}

		if ($Type == "Insert") {
			$this->model->Insert('tb_mutasi', $data);
			redirect(site_url('transaksi/mutasi_pegawai/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_mutasi', 'id_mutasi', $id, $data);
			redirect(site_url('transaksi/mutasi_pegawai/U'));
		} elseif ($Type == "Delete") {
			$this->model->Delete('tb_mutasi', 'id_mutasi', $id);
			redirect(site_url('transaksi/mutasi_pegawai/D'));
		}
	}

	public function pengundurandiri_pegawai($Type = "", $id = "")
	{
		if ($Type == "Insert" or $Type == "Update") {

			$id_pegawai = $this->input->post('cIdPegawai');
			// $tgl_resign = $this->Date2String($this->input->post('dTgl'));
			$tgl_resign = $this->input->post('dTgl');
			// echo "tanggal resign : $tgl_resign <br />";

			$db2 = $this->model->ViewWhere('tb_jabatan_pegawai', 'id_pegawai', $id_pegawai);
			$id_ref_jabatan = "";
			$id_sub_unit = "";
			foreach ($db2 as $key2 => $vaDataJabatan) {
				$id_ref_jabatan = $vaDataJabatan['id_ref_jabatan'];
				$id_sub_unit = $vaDataJabatan['id_sub_unit_kerja'];
			}
			// echo "id pegawai : $id_pegawai <br />";
			// echo "id ref jabatan : $id_ref_jabatan <br />";
			// echo "id sub unit kerja : $id_sub_unit <br />";
			$db = $this->model->ViewWhere('tb_pegawai', 'id_pegawai', $id_pegawai);
			$TglAwalKerja = "";
			$status_karyawan = "";
			foreach ($db as $key => $vaData) {
				$TglAwalKerja = $vaData['tanggal_masuk_kerja'];
				$status_karyawan = $vaData['id_status'];
			}

			$awal  = date_create($TglAwalKerja);
			$akhir = date_create($tgl_resign); // waktu sekarang
			$diff  = date_diff($awal, $akhir);

			$tahun = $diff->y;
			$bulan = $diff->m;
			$masa_kerja = "$tahun Tahun, $bulan Bulan";
			// echo "masa kerja : $masa_kerja";

			$data = array(
				'masa_kerja'	=> $masa_kerja,
				'tanggal_masuk_kerja'	=> $TglAwalKerja,
				'status_karyawan'	=> $status_karyawan,
				'id_ref_jabatan'	=> $id_ref_jabatan,
				'id_sub_unit_kerja'	=> $id_sub_unit,
				'id_pegawai'	=> $this->input->post('cIdPegawai'),
				'tanggal'		=> $this->Date2String($this->input->post('dTgl')),
				'status'		=> $this->input->post('cIdStatus'),
				'keterangan'	=> $this->input->post('cKeterangan')
			);
			$dataPegawai   = array('id_status_mengundurkan_diri' => $this->input->post('cIdStatus'));
		}

		$seralizedArrayInsert = serialize($data);
		$vaLog = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'tb_pengunduran_diri',
			'action' => $Type,
			'query' => $seralizedArrayInsert,
			'nama' => $this->session->userdata('nama')
		);

		$seralizedArrayUpdate = serialize($dataPegawai);
		$vaLog2 = array(
			'tgl' => $this->Date2String($this->DateStamp()),
			'waktu' => $this->TimeStamp(),
			'nama_table' => 'tb_pegawai',
			'action' => 'Update',
			'query' => $seralizedArrayUpdate,
			'nama' => $this->session->userdata('nama')
		);

		if ($Type == "Insert") {
			$this->model->Insert('tb_pengunduran_diri', $data);
			$this->model->Insert("log", $vaLog);
			$this->model->Update('tb_pegawai', 'id_pegawai', $this->input->post('cIdPegawai'), $dataPegawai);
			$this->model->Insert("log", $vaLog2);

			redirect(site_url('transaksi/pengundurandiri_pegawai/I'));
		} elseif ($Type == "Update") {
			$this->model->Update('tb_pengunduran_diri', 'id_pengunduran_diri', $id, $data);
			$this->model->Insert("log", $vaLog);
			$this->model->Update('tb_pegawai', 'id_pegawai', $this->input->post('cIdPegawai'), $dataPegawai);
			$this->model->Insert("log", $vaLog2);

			redirect(site_url('transaksi/pengundurandiri_pegawai/U'));
		} elseif ($Type == "Delete") {
			$db = $this->model->ViewWhere('tb_pengunduran_diri', 'id_pengunduran_diri', $id);
			$cIdPegawai = "";
			foreach ($db as $key => $vaData) {
				$cIdPegawai = $vaData['id_pegawai'];
			}

			$dataPegawaiHapus1 = array(
				'id_pegawai' => $cIdPegawai,
				'is_deleted' => 1
			);

			$dataPegawaiHapus2 = array(
				'id_pengunduran_diri' => $id,
				'is_deleted' => 1
			);

			$seralizedArrayUpdate = serialize($dataPegawaiHapus1);
			$vaLog3 = array(
				'tgl' => $this->Date2String($this->DateStamp()),
				'waktu' => $this->TimeStamp(),
				'nama_table' => 'tb_pegawai',
				'action' => $Type,
				'query' => $seralizedArrayUpdate,
				'nama' => $this->session->userdata('nama')
			);

			$seralizedArrayUpdate = serialize($dataPegawaiHapus2);
			$vaLog4 = array(
				'tgl' => $this->Date2String($this->DateStamp()),
				'waktu' => $this->TimeStamp(),
				'nama_table' => 'tb_pegawai',
				'action' => 'Update',
				'query' => $seralizedArrayUpdate,
				'nama' => $this->session->userdata('nama')
			);

			$this->model->Update('tb_pegawai', 'id_pegawai', $cIdPegawai, $dataPegawaiHapus1);
			$this->model->Insert("log", $vaLog3);
			$this->model->Update_Delete('tb_pengunduran_diri', 'id_pengunduran_diri', $id, $dataPegawaiHapus2);
			$this->model->Insert("log", $vaLog4);

			redirect(site_url('transaksi/pengundurandiri_pegawai/D'));
		}
	}

	public function getTanggalMasukKerja($result)
	{

		$cTglSearch    = urldecode($result);
		$db = $this->model->ViewWhere('tb_pegawai', 'id_pegawai', $cTglSearch);
		$Tgl = "";
		foreach ($db as $key => $vaData) {
			$Tgl = $vaData['tanggal_masuk_kerja'];
		}
		echo "$Tgl";
	}

	public function get_pegawai($id = '')
	{
		// $db = $this->model->ViewWhere('tb_pegawai', 'id_pegawai', $id);
		$query = 'SELECT t1.id_pegawai,
						t1.nik, t1.tanggal_lahir,
						t1.tempat_lahir, 
						t1.no_ktp, 
						t1.alamat_asal, 
						t1.nama, 
						t3.nama_jabatan, 
						t1.tanggal_masuk_kerja,
						t1.tgl_kontrak_berakhir FROM tb_pegawai t1 
						JOIN tb_jabatan_pegawai t2 ON t1.id_pegawai = t2.id_pegawai 
						JOIN tb_ref_jabatan t3 ON t2.id_ref_jabatan = t3.id_ref_jabatan 
						WHERE t1.id_pegawai = "' . $id . '"';
		$db = $this->db->query($query);
		foreach ($db->result() as $vaData) {
			$nik = $vaData->nik;
			$jabatan = $vaData->nama_jabatan;
			$tempat_lahir = $vaData->tempat_lahir;
			$tanggal_lahir = $vaData->tanggal_lahir;
			$no_ktp = $vaData->no_ktp;
			$alamat_asal = $vaData->alamat_asal;
			$nama = $vaData->nama;
			$tanggal_masuk_kerja = $vaData->tanggal_masuk_kerja;
			$tgl_kontrak_berakhir = $vaData->tgl_kontrak_berakhir;
		}

		echo $nik . "~" . $jabatan . "~" . $tempat_lahir . "~" . $tanggal_lahir . "~" . $no_ktp . "~" . $alamat_asal . "~" . $nama . "~" . $tanggal_masuk_kerja . "~" . $tgl_kontrak_berakhir;
	}
}
