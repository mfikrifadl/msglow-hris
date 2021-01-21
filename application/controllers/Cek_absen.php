<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cek_absen extends CI_Controller
{
	private $filename = "import_data"; // Kita tentukan nama filenya

	public function __construct()
	{
		parent::__construct();

		$this->load->model('AbsensiModel');
	}

	public function index($Aksi = "", $Id = "")
	{
		$data['siswa'] = $this->AbsensiModel->view();
		$dataHeader['menu'] = 'Manajemen Gaji';
		$dataHeader['file'] = 'Absensi Pegawai';
		$data['action'] 	= $Aksi;
		$data['id_absen']	=	$Id;
		$this->load->view('admin/container/header', $dataHeader);
		$this->load->view('admin/gaji/absensi', $data);
		$this->load->view('admin/container/footer');
	}

	public function form($Aksi = "", $Id = "")
	{

		$data = array(); // Buat variabel $data sebagai array

		$dataHeader['menu'] = 'Manajemen Gaji';
		$dataHeader['file'] = 'Absensi Pegawai';
		$data['action'] = $Aksi;
		$data['id_absen']	=	$Id;

		if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di AbsensiModel.php

			$upload = $this->AbsensiModel->upload_file($this->filename);

			if ($upload['result'] == "success") { // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet;

				$dataHeader['menu'] = 'Manajemen Absensi';
				$dataHeader['file'] = 'Absensi Pegawai';
				$data['action'] = $Aksi;
				$data['id_absen']	=	$Id;

				$this->load->view('admin/container/header', $dataHeader);
				$this->load->view('admin/gaji/absensi', $data);
				$this->load->view('admin/container/footer');
			} else { // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan		

				$dataHeader['menu'] = 'Manajemen Gaji';
				$dataHeader['file'] = 'Absensi Pegawai';
				$data['action'] = $Aksi;
				$data['id_absen']	=	$Id;

				$this->load->view('admin/container/header', $dataHeader);
				$this->load->view('admin/gaji/absensi', $data);
				$this->load->view('admin/container/footer');
			}
		}


		// $this->load->view('admin/gaji/absensi', $data);
	}

	public function import()
	{
		// Load plugin PHPExcel nya
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data_payroll = array();
		$data_payroll_lembur = array();
		$data_izin_durasi = array();
		$data_izin_durasi_lembur = array();
		$data_tidak_masuk_kerja = array();
		$jam_kerja = array();
		$data_master = array();

		$looping = $this->input->post('numrow');

		$numrow = 1;

		foreach ($sheet as $row) {
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if ($numrow > 1 && $numrow < $looping) {
				$koneksi = mysqli_connect("localhost", "root", "", "si_pegawai");
				if (mysqli_connect_errno($koneksi)) {
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				$host = 'localhost'; // Nama hostnya
				$username = 'root'; // Username
				$password = ''; // Password (Isi jika menggunakan password)
				$database = 'si_pegawai'; // Nama databasenya

				$pdo = new PDO('mysql:host=' . $host . ';dbname=' . $database, $username, $password);

				$c_id = date("YmdHis");
				$id = "$c_id" . $numrow . "";

				//================================= FUNGSI ABSEN MAKS 4 SCAN======================================================
				// $scan_1 = $row['I'];
				// $scan_2 = $row['J'];
				// $scan_3 = $row['K'];
				// $scan_4 = $row['L'];
				// $scan_5 = $row['M'];

				$scan_1 = $row['H'];
				$scan_2 = $row['I'];
				$scan_3 = $row['J'];
				$scan_4 = $row['K'];
				$scan_5 = $row['L'];

				$scan_pulang = "17:00:00";
				$t_jam_pulang = new DateTime($scan_pulang);

				$lembur = "17:45:00"; //jam lembur
				$t_lembur = new DateTime($lembur);

				$work_time = "08:10:59";
				$t_work_time = new DateTime($work_time);

				// ======================variable jam masuk, jam pulang kerja dan istirahat========================
				$t_masuk_payroll = new DateTime($scan_1);

				$t_scan_2 = new DateTime($scan_2);
				$t_pulang_payroll = new DateTime($scan_2);
				$t_scan_pulang = "17:00:00";
				$x_jam_pulang = new DateTime($t_scan_pulang);
				$istirahat = $x_jam_pulang->sub(new DateInterval('PT1H')); //jam istirahat

				$t_pulang_lembur = new DateTime($scan_2);
				$ijin_durasi_cekRoll_keluar = new DateTime($scan_2);

				$t_scan_3 = new DateTime($scan_3);
				$t_scan_3_payroll_lembur = new DateTime($scan_3);
				$ijin_durasi_cekRoll_masuk_2 = new DateTime($scan_3);

				$t_scan_4 = new DateTime($scan_4);
				$ijin_durasi_cekRoll_pulang = new DateTime($scan_4);

				$t_scan_5 = new DateTime($scan_5);

				//======================================================================================
				// ==============================hasil perhitungan payroll + lembur v.2 scan======================================
				if ($row['H'] != null && $row['I'] != null && $row['J'] == null && $row['K'] == null && $t_pulang_payroll > $t_lembur && $t_masuk_payroll < $t_work_time) { // masuk kerja 8 jam + lembur

					$hasil_payroll_lembur = $t_scan_2->diff($t_jam_pulang);
					$jumlah2 = $hasil_payroll_lembur->format('%H:%I:%S');
					$time_payroll_lembur = (string)$jumlah2;

					$hasil_payroll = $t_masuk_payroll->diff($istirahat);
					$jumlah1 = $hasil_payroll->format('%H:%I:%S');
					$time_payroll = (string)$jumlah1;

					$ket = "Full Time + Lembur";
					array_push($data_payroll_lembur, array(
						'no' => $id,
						'pin' => $row['A'],
						'tanggal' => $row['G'],
						'scan_1' => $row['H'],
						'scan_2' => $row['I'],
						'scan_3' => $row['J'],
						'payroll' => $time_payroll,
						'lembur' => $time_payroll_lembur,
						'keterangan' => $ket
						
						// 'no' => $id,
						// 'pin' => $row['A'],
						// 'tanggal' => $row['H'],
						// 'scan_1' => $row['I'],
						// 'scan_2' => $row['J'],
						// 'scan_3' => $row['K'],
						// 'payroll' => $time_payroll,
						// 'lembur' => $time_payroll_lembur,
						// 'keterangan' => $ket
					));

					// echo "jumlah jam lembur : " . $row['C'] . " - $time_payroll_lembur <br />";
				} elseif ($row['H'] != null && $row['I'] != null && $row['J'] != null && $row['K'] != null && $t_scan_4 < $t_lembur) {

					$hasil_ijin_durasi_1 = $t_masuk_payroll->diff($ijin_durasi_cekRoll_keluar);
					$cek_roll_keluar = $hasil_ijin_durasi_1->format('%H:%I:%S');
					$cek_out_1 = (string)$cek_roll_keluar;

					$hasil_ijin_durasi_2 = $ijin_durasi_cekRoll_masuk_2->diff($ijin_durasi_cekRoll_pulang);
					$cek_roll_pulang = $hasil_ijin_durasi_2->format('%H:%I:%S');
					$cek_out_2 = (string)$cek_roll_pulang;

					$hasil_ijin_durasi_3 = $ijin_durasi_cekRoll_masuk_2->diff($ijin_durasi_cekRoll_keluar);
					$cek_roll_pulang = $hasil_ijin_durasi_3->format('%H:%I:%S');
					$total_ijin_durasi = (string)$cek_roll_pulang;

					$jam_mulai = "$cek_out_1";
					$jam_selesai = "$cek_out_2";

					$times = array($jam_mulai, $jam_selesai);
					$seconds = 0;
					foreach ($times as $time) {
						list($H, $i, $s) = explode(':', $time);
						$seconds += $H * 3600;
						$seconds += $i * 60;
						$seconds += $s;
					}
					$hours = floor($seconds / 3600);
					$seconds -= $hours * 3600;
					$minutes = floor($seconds / 60);
					$seconds -= $minutes * 60;

					$tot_jam_kerja = date("H:i:s", mktime($hours, $minutes, $seconds));

					$ket = "Izin Durasi";
					array_push($data_izin_durasi, array(
						'no' => $id,
						'pin' => $row['A'],
						'tanggal' => $row['H'],
						'scan_1' => $row['I'],
						'scan_2' => $row['J'],
						'scan_3' => $row['K'],
						'scan_4' => $row['L'],
						'payroll' => $tot_jam_kerja,
						'izin_durasi' => $total_ijin_durasi,
						'keterangan' => $ket
					));
					// echo "nama : " . $row['C'] . " izin durasi <br /><br />";
				} elseif ($row['H'] != null && $row['I'] != null && $row['J'] != null && $row['K'] != null && $t_scan_4 > $t_lembur) { // karyawan izin durasi + lembur

					//==========================lembur=============================
					$hasil_ijin_durasi_lembur = $t_scan_4->diff($t_jam_pulang);
					$jumlah3 = $hasil_ijin_durasi_lembur->format('%H:%I:%S');
					$time_ijin_durasi_lembur = (string)$jumlah3;
					//======================================================

					$hasil_ijin_durasi_1 = $t_masuk_payroll->diff($ijin_durasi_cekRoll_keluar);
					$cek_roll_keluar = $hasil_ijin_durasi_1->format('%H:%I:%S');
					$cek_out_1 = (string)$cek_roll_keluar;

					$hasil_ijin_durasi_2 = $ijin_durasi_cekRoll_masuk_2->diff($t_jam_pulang);
					$cek_roll_pulang = $hasil_ijin_durasi_2->format('%H:%I:%S');
					$cek_out_2 = (string)$cek_roll_pulang;

					$hasil_ijin_durasi_3 = $ijin_durasi_cekRoll_masuk_2->diff($ijin_durasi_cekRoll_keluar);
					$cek_roll_pulang = $hasil_ijin_durasi_3->format('%H:%I:%S');
					$total_ijin_durasi = (string)$cek_roll_pulang;

					$jam_mulai = "$cek_out_1";
					$jam_selesai = "$cek_out_2";

					$times = array($jam_mulai, $jam_selesai);
					$seconds = 0;
					foreach ($times as $time) {
						list($H, $i, $s) = explode(':', $time);
						$seconds += $H * 3600;
						$seconds += $i * 60;
						$seconds += $s;
					}
					$hours = floor($seconds / 3600);
					$seconds -= $hours * 3600;
					$minutes = floor($seconds / 60);
					$seconds -= $minutes * 60;

					$tot_jam_kerja = date("H:i:s", mktime($hours, $minutes, $seconds));

					$ket = "Izin Durasi dan Lembur";
					array_push($data_izin_durasi_lembur, array(
						'no' => $id,
						'pin' => $row['A'],
						'tanggal' => $row['G'],
						'scan_1' => $row['H'],
						'scan_2' => $row['I'],
						'scan_3' => $row['J'],
						'scan_4' => $row['K'],
						'payroll' => $tot_jam_kerja,
						'lembur' => $time_ijin_durasi_lembur,
						'izin_durasi' => $total_ijin_durasi,
						'keterangan' => $ket
						
						// 'no' => $id,
						// 'pin' => $row['A'],
						// 'tanggal' => $row['H'],
						// 'scan_1' => $row['I'],
						// 'scan_2' => $row['J'],
						// 'scan_3' => $row['K'],
						// 'scan_4' => $row['L'],
						// 'payroll' => $tot_jam_kerja,
						// 'lembur' => $time_ijin_durasi_lembur,
						// 'izin_durasi' => $total_ijin_durasi,
						// 'keterangan' => $ket
					));

					// echo "nama : " . $row['C'] . " masuk izin durasi + lembur <br /><br />";

					// echo "nama : " . $row['C'] . "<br />";
					// echo "jam masuk : " . $row['I'] . " <br />";
					// echo "jam ijin : " . $row['J'] . " cek roll ijin <br />";
					// echo "jam masuk : " . $row['K'] . " cek roll masuk <br />";
					// echo "jam pulang : " . $row['L'] . " cek roll pulang <br /><br />";
					// echo "selisih jam masuk 1 - cek roll izin durasi keluar : " . $cek_out_1 . " <br />";
					// echo "selisih jam masuk 2 - cek roll pulang : " . $cek_out_2 . " <br />";
					// echo "total izin durasi selama : " . $total_ijin_durasi . " <br />";
					// echo "total lembur selama : " . $time_ijin_durasi_lembur . " <br />";
					// echo "total jam kerja : " . $tot_jam_kerja . " <br /><br />";
				} elseif ($row['H'] != null && $row['I'] != null && $row['J'] == null && $row['K'] == null && $t_masuk_payroll < $t_work_time) { // karyawan masuk full time

					$hasil_payroll = $t_masuk_payroll->diff($istirahat);
					$jumlah1 = $hasil_payroll->format('%H:%I:%S');
					$time_payroll = (string)$jumlah1;

					$ket = "Full Time";
					array_push($data_payroll, array(
						'no' => $id,
						'pin' => $row['A'],
						'tanggal' => $row['G'],
						'scan_1' => $row['H'],
						'scan_2' => $row['I'],
						'payroll' => $time_payroll,
						'keterangan' => $ket

						// 'no' => $id,
						// 'pin' => $row['A'],
						// 'tanggal' => $row['H'],
						// 'scan_1' => $row['I'],
						// 'scan_2' => $row['J'],
						// 'payroll' => $time_payroll,
						// 'keterangan' => $ket
					));
					// echo "nama : " . $row['C'] . " payroll <br /><br />";
				}elseif ($row['H'] != null && $row['I'] != null && $row['J'] == null && $row['K'] == null && $t_masuk_payroll > $t_work_time) { // karyawan masuk full time

					$hasil_payroll = $t_masuk_payroll->diff($istirahat);
					$jumlah1 = $hasil_payroll->format('%H:%I:%S');
					$time_payroll = (string)$jumlah1;

					$ket = "Full Time - Telat";
					array_push($data_payroll, array(
						'no' => $id,
						'pin' => $row['A'],
						'tanggal' => $row['G'],
						'scan_1' => $row['H'],
						'scan_2' => $row['I'],
						'payroll' => $time_payroll,
						'keterangan' => $ket

						// 'no' => $id,
						// 'pin' => $row['A'],
						// 'tanggal' => $row['H'],
						// 'scan_1' => $row['I'],
						// 'scan_2' => $row['J'],
						// 'payroll' => $time_payroll,
						// 'keterangan' => $ket
					));
					// echo "nama : " . $row['C'] . " payroll <br /><br />";
				}  elseif ($row['H'] == null && $row['I'] == null && $row['J'] == null && $row['K'] == null) { // karyawan tidak masuk kerja
					$ket = "";
					$row['H'] = "";
					$row['I'] = "";
					$row['J'] = "";
					$row['K'] = "";
					$row['L'] = "";

					// $row['I'] = "";
					// $row['J'] = "";
					// $row['K'] = "";
					// $row['L'] = "";
					// $row['M'] = "";

					array_push($data_tidak_masuk_kerja, array(
						'no' => $id,
						'pin' => $row['A'],
						'tanggal' => $row['G'],
						'scan_1' => $row['H'],
						'scan_2' => $row['I'],
						'scan_3' => $row['J'],
						'scan_4' => $row['K'],
						'scan_5' => $row['L'],						
						'keterangan' => $ket

						// 'no' => $id,
						// 'pin' => $row['A'],
						// 'tanggal' => $row['H'],
						// 'scan_1' => $row['I'],
						// 'scan_2' => $row['J'],
						// 'scan_3' => $row['K'],
						// 'scan_4' => $row['L'],
						// 'scan_5' => $row['M'],
						// 'keterangan' => $ket

					));

					// echo "nama : " . $row['C'] . " Absen <br /><br />";
				} elseif ($row['J'] == null && $row['G'] == "driver") { //LAMA $row['I'] == null
					$ket = "belum di coding";
					// $row['I'] = "";
					// $row['J'] = "";
					// $row['K'] = "";
					// $row['L'] = "";

					$row['J'] = "";
					$row['K'] = "";
					$row['L'] = "";
					$row['M'] = "";

					array_push($data_tidak_masuk_kerja, array(
						// 'no' => $id,
						// 'pin' => $row['A'],
						// 'tanggal' => $row['G'],
						// 'scan_1' => $row['H'],
						// 'scan_2' => $row['I'],
						// 'scan_3' => $row['J'],
						// 'scan_4' => $row['K'],
						// 'scan_5' => $row['L'],
						// 'keterangan' => $ket

						'no' => $id,
						'pin' => $row['A'],
						'tanggal' => $row['H'],
						'scan_1' => $row['I'],
						'scan_2' => $row['J'],
						'scan_3' => $row['K'],
						'scan_4' => $row['L'],
						'scan_5' => $row['M'],
						'keterangan' => $ket

					));

					// echo "nama : " . $row['C'] . " Driver <br /><br />";
				}elseif ($row['G'] == "manager") { //LAMA $row['I'] == null
					$ket = "belum di coding";
					// $row['I'] = "";
					// $row['J'] = "";
					// $row['K'] = "";
					// $row['L'] = "";

					$row['J'] = "";
					$row['K'] = "";
					$row['L'] = "";
					$row['M'] = "";

					array_push($data_tidak_masuk_kerja, array(
						// 'no' => $id,
						// 'pin' => $row['A'],
						// 'tanggal' => $row['G'],
						// 'scan_1' => $row['H'],
						// 'scan_2' => $row['I'],
						// 'scan_3' => $row['J'],
						// 'scan_4' => $row['K'],
						// 'scan_5' => $row['L'],
						// 'keterangan' => $ket

						'no' => $id,
						'pin' => $row['A'],
						'tanggal' => $row['H'],
						'scan_1' => $row['I'],
						'scan_2' => $row['J'],
						'scan_3' => $row['K'],
						'scan_4' => $row['L'],
						'scan_5' => $row['M'],
						'keterangan' => $ket

					));

					// echo "nama : " . $row['C'] . " Driver <br /><br />";
				}elseif ($row['G'] == "OB") { //LAMA $row['I'] == null
					$ket = "belum di coding";
					// $row['I'] = "";
					// $row['J'] = "";
					// $row['K'] = "";
					// $row['L'] = "";

					$row['J'] = "";
					$row['K'] = "";
					$row['L'] = "";
					$row['M'] = "";

					array_push($data_tidak_masuk_kerja, array(
						// 'no' => $id,
						// 'pin' => $row['A'],
						// 'tanggal' => $row['G'],
						// 'scan_1' => $row['H'],
						// 'scan_2' => $row['I'],
						// 'scan_3' => $row['J'],
						// 'scan_4' => $row['K'],
						// 'scan_5' => $row['L'],
						// 'keterangan' => $ket

						'no' => $id,
						'pin' => $row['A'],
						'tanggal' => $row['H'],
						'scan_1' => $row['I'],
						'scan_2' => $row['J'],
						'scan_3' => $row['K'],
						'scan_4' => $row['L'],
						'scan_5' => $row['M'],
						'keterangan' => $ket

					));

					// echo "nama : " . $row['C'] . " Driver <br /><br />";
				}elseif ($row['G'] == "security") { //LAMA $row['I'] == null
					$ket = "belum di coding";
					// $row['I'] = "";
					// $row['J'] = "";
					// $row['K'] = "";
					// $row['L'] = "";

					$row['J'] = "";
					$row['K'] = "";
					$row['L'] = "";
					$row['M'] = "";

					array_push($data_tidak_masuk_kerja, array(
						// 'no' => $id,
						// 'pin' => $row['A'],
						// 'tanggal' => $row['G'],
						// 'scan_1' => $row['H'],
						// 'scan_2' => $row['I'],
						// 'scan_3' => $row['J'],
						// 'scan_4' => $row['K'],
						// 'scan_5' => $row['L'],
						// 'keterangan' => $ket

						'no' => $id,
						'pin' => $row['A'],
						'tanggal' => $row['H'],
						'scan_1' => $row['I'],
						'scan_2' => $row['J'],
						'scan_3' => $row['K'],
						'scan_4' => $row['L'],
						'scan_5' => $row['M'],
						'keterangan' => $ket

					));

					// echo "nama : " . $row['C'] . " Driver <br /><br />";
				} else {
					// echo "gk masuk : " . $row['G'] . "?<br /> <br />";
				}
				//======================================================================================



				// if ($row['H'] == null) { // LAMA $row['H'] == null
				// 	$ket = "Absen";
				// 	// $row['H'] = "";
				// 	// $row['I'] = "";
				// 	// $row['J'] = "";
				// 	// $row['K'] = "";
				// 	// $row['L'] = "";			

				// 	array_push($data_tidak_masuk_kerja, array(
				// 		// 'no' => $id,
				// 		// 'pin' => $row['A'],
				// 		// 'tanggal' => $row['G'],
				// 		// 'scan_1' => $row['H'],
				// 		// 'scan_2' => $row['I'],
				// 		// 'scan_3' => $row['J'],
				// 		// 'scan_4' => $row['K'],
				// 		// 'scan_5' => $row['L'],						
				// 		// 'keterangan' => $ket				

				// 	));

				// 	$pin = $row['A'];
				// 	$nip = $row['B'];
				// 	$nama = $row['C'];
				// 	$jabatan = $row['D'];
				// 	$departemen = $row['E'];
				// 	$kantor = $row['F'];

				// 	$query = $this->db->query("SELECT pin FROM master_pegawai WHERE pin = '$pin'");
				// 	$rowMaster = $query->num_rows();
				// 	if ($rowMaster > 0) {
				// 		// echo "gk masuk database <br />";					
				// 	} else {
				// 		// echo "masuk database <br />";

				// 		$sql = $pdo->prepare("INSERT INTO master_pegawai VALUES(:pin,:nip,:nama,:jabatan,:departemen,:kantor)");
				// 		$sql->bindParam(':pin', $pin);
				// 		$sql->bindParam(':nip', $nip);
				// 		$sql->bindParam(':nama', $nama);
				// 		$sql->bindParam(':jabatan', $jabatan);
				// 		$sql->bindParam(':departemen', $departemen);
				// 		$sql->bindParam(':kantor', $kantor);
				// 		$sql->execute(); // Eksekusi query insert					
				// 	}

				// 	//echo "nama : " . $row['B'] . " tidak masuk kerja <br /><br />";
				// }
				// if ($row['I'] == null) { //LAMA $row['I'] == null
				// 	$ket = "belum di coding";
				// 	// $row['I'] = "";
				// 	// $row['J'] = "";
				// 	// $row['K'] = "";
				// 	// $row['L'] = "";

				// 	array_push($data_tidak_masuk_kerja, array(
				// 		// 'no' => $id,
				// 		// 'pin' => $row['A'],
				// 		// 'tanggal' => $row['G'],
				// 		// 'scan_1' => $row['H'],
				// 		// 'scan_2' => $row['I'],
				// 		// 'scan_3' => $row['J'],
				// 		// 'scan_4' => $row['K'],
				// 		// 'scan_5' => $row['L'],
				// 		// 'keterangan' => $ket

				// 	));

				// 	$pin = $row['A'];
				// 	$nip = $row['B'];
				// 	$nama = $row['C'];
				// 	$jabatan = $row['D'];
				// 	$departemen = $row['E'];
				// 	$kantor = $row['F'];

				// 	$query = $this->db->query("SELECT pin FROM master_pegawai WHERE pin = '$pin'");
				// 	$rowMaster = $query->num_rows();
				// 	if ($rowMaster > 0) {
				// 		// echo "gk masuk database <br />";					
				// 	} else {
				// 		// echo "masuk database <br />";

				// 		$sql = $pdo->prepare("INSERT INTO master_pegawai VALUES(:pin,:nip,:nama,:jabatan,:departemen,:kantor)");
				// 		$sql->bindParam(':pin', $pin);
				// 		$sql->bindParam(':nip', $nip);
				// 		$sql->bindParam(':nama', $nama);
				// 		$sql->bindParam(':jabatan', $jabatan);
				// 		$sql->bindParam(':departemen', $departemen);
				// 		$sql->bindParam(':kantor', $kantor);
				// 		$sql->execute(); // Eksekusi query insert					
				// 	}

				// 	//echo "nama : " . $row['B'] . " tidak masuk kerja <br /><br />";
				// } else {
				//================================== MENGHITUNG TOTAL JAM KERJA ======================
				// echo "masuk";
				//============== maks scan 5 ==============
				// $scan_1 = $row['H'];
				// $scan_2 = $row['I'];
				// $scan_3 = $row['J'];
				// $scan_4 = $row['K'];
				// $scan_5 = $row['L'];
				//==========================================

				// ==============================hasil perhitungan payroll======================================
				// $hasil_payroll = $t_masuk_payroll->diff($istirahat);
				// $jumlah1 = $hasil_payroll->format('%H:%I:%S');
				// $time_payroll = (string)$jumlah1;
				//======================================================================================

				// ==============================hasil perhitungan payroll + lembur======================================
				// $hasil_payroll_lembur = $t_pulang_lembur->diff($t_scan_3_payroll_lembur);
				// $jumlah2 = $hasil_payroll_lembur->format('%H:%I:%S');
				// $time_payroll_lembur = (string)$jumlah2;

				//======================================================================================

				// ==============================hasil perhitungan ijin durasi + lembur======================================
				// $hasil_ijin_durasi_lembur = $t_scan_5->diff($ijin_durasi_cekRoll_pulang);
				// $jumlah3 = $hasil_ijin_durasi_lembur->format('%H:%I:%S');
				// $time_ijin_durasi_lembur = (string)$jumlah3;
				//======================================================================================

				// ==============================hasil perhitungan ijin durasi======================================
				// $hasil_ijin_durasi_1 = $t_masuk_payroll->diff($ijin_durasi_cekRoll_keluar);
				// $cek_roll_keluar = $hasil_ijin_durasi_1->format('%H:%I:%S');
				// $cek_out_1 = (string)$cek_roll_keluar;

				// $hasil_ijin_durasi_2 = $ijin_durasi_cekRoll_masuk_2->diff($ijin_durasi_cekRoll_pulang);
				// $cek_roll_pulang = $hasil_ijin_durasi_2->format('%H:%I:%S');
				// $cek_out_2 = (string)$cek_roll_pulang;

				// $hasil_ijin_durasi_3 = $ijin_durasi_cekRoll_masuk_2->diff($ijin_durasi_cekRoll_keluar);
				// $cek_roll_pulang = $hasil_ijin_durasi_3->format('%H:%I:%S');
				// $total_ijin_durasi = (string)$cek_roll_pulang;

				// $jam_mulai = "$cek_out_1";
				// $jam_selesai = "$cek_out_2";

				// $times = array($jam_mulai, $jam_selesai);
				// $seconds = 0;
				// foreach ($times as $time) {
				// 	list($H, $i, $s) = explode(':', $time);
				// 	$seconds += $H * 3600;
				// 	$seconds += $i * 60;
				// 	$seconds += $s;
				// }
				// $hours = floor($seconds / 3600);
				// $seconds -= $hours * 3600;
				// $minutes = floor($seconds / 60);
				// $seconds -= $minutes * 60;

				// $tot_jam_kerja = date("H:i:s", mktime($hours, $minutes, $seconds));

				//======================================================================================
				//================================ MENGHITUNG TOTAL JAM KERJA ======================

				// Kita push (add) array data ke variabel data
				// if ($row['J'] == null && $row['K'] == null && $row['L'] == null) {
				// 	$ket = "Full Time";
				// 	array_push($data_payroll, array(
				// 		'no' => $id,
				// 		'pin' => $row['A'],
				// 		'tanggal' => $row['G'],
				// 		'scan_1' => $row['H'],
				// 		'scan_2' => $row['I'],
				// 		'payroll' => $time_payroll,
				// 		'keterangan' => $ket
				// 	));

				// 	// echo "nama : " . $row['B'] . " time payroll <br />";
				// 	// echo "total jam kerja : " . $time_payroll . " <br /><br />";
				// } elseif ($row['K'] == null && $row['L'] == null) {
				// 	$ket = "Full Time + Lembur";
				// 	array_push($data_payroll_lembur, array(
				// 		'no' => $id,
				// 		'pin' => $row['A'],
				// 		'tanggal' => $row['G'],
				// 		'scan_1' => $row['H'],
				// 		'scan_2' => $row['I'],
				// 		'scan_3' => $row['J'],
				// 		'payroll' => $time_payroll,
				// 		'lembur' => $time_payroll_lembur,
				// 		'keterangan' => $ket
				// 	));

				// 	// echo "nama : " . $row['B'] . " time payroll dan lembur <br />";
				// 	// echo "total jam kerja : " . $time_payroll . " <br />";
				// 	// echo "total jam lembur : " . $time_payroll_lembur . " <br /><br />";
				// } elseif ($row['L'] == null) {
				// 	$ket = "Izin Durasi";
				// 	array_push($data_izin_durasi, array(
				// 		'no' => $id,
				// 		'pin' => $row['A'],
				// 		'tanggal' => $row['G'],
				// 		'scan_1' => $row['H'],
				// 		'scan_2' => $row['I'],
				// 		'scan_3' => $row['J'],
				// 		'scan_4' => $row['K'],
				// 		'payroll' => $tot_jam_kerja,
				// 		'izin_durasi' => $total_ijin_durasi,
				// 		'keterangan' => $ket
				// 	));

				// 	// echo "nama : " . $row['B'] . " izin durasi <br />";
				// 	// echo "jam masuk : " . $row['H'] . " <br />";
				// 	// echo "jam ijin : " . $row['I'] . " cek roll ijin <br />";
				// 	// echo "jam masuk : " . $row['J'] . " cek roll masuk <br />";
				// 	// echo "jam pulang : " . $row['K'] . " cek roll pulang <br /><br />";
				// 	// echo "selisih jam masuk 1 - cek roll izin durasi keluar : " . $cek_out_1 . " <br />";
				// 	// echo "selisih jam masuk 2 - cek roll pulang : " . $cek_out_2 . " <br />";
				// 	// echo "total izin durasi selama : " . $total_ijin_durasi . " <br />";						
				// 	// echo "total jam kerja : " . $tot_jam_kerja . " <br /><br />";

				// } elseif ($row['H'] != null && $row['I'] != null && $row['J'] != null && $row['K'] != null && $row['L'] != null) {
				// 	$ket = "Izin Durasi + Lembur";
				// 	array_push($data_izin_durasi_lembur, array(
				// 		'no' => $id,
				// 		'pin' => $row['A'],
				// 		'tanggal' => $row['G'],
				// 		'scan_1' => $row['H'],
				// 		'scan_2' => $row['I'],
				// 		'scan_3' => $row['J'],
				// 		'scan_4' => $row['K'],
				// 		'scan_5' => $row['L'],
				// 		'payroll' => $tot_jam_kerja,
				// 		'lembur' => $time_ijin_durasi_lembur,
				// 		'izin_durasi' => $total_ijin_durasi,
				// 		'keterangan' => $ket
				// 	));

				// 	//  echo "nama : " . $row['B'] . "izin durasi dan lembur <br />";
				// } else {
				// 	//  echo "nama : " . $row['B'] . " else";
				// }

				$pin = $row['A'];
				$nip = $row['B'];
				$nama = $row['C'];
				$jabatan = $row['D'];
				$departemen = $row['E'];
				$kantor = $row['F'];

				$query = $this->db->query("SELECT pin FROM master_pegawai WHERE pin = '$pin'");
				$rowMaster = $query->num_rows();
				if ($rowMaster > 0) {
					// echo "gk masuk database <br />";					
				} else {
					// echo "masuk database <br />";

					$sql = $pdo->prepare("INSERT INTO master_pegawai VALUES(:pin,:nip,:nama,:jabatan,:departemen,:kantor)");
					$sql->bindParam(':pin', $pin);
					$sql->bindParam(':nip', $nip);
					$sql->bindParam(':nama', $nama);
					$sql->bindParam(':jabatan', $jabatan);
					$sql->bindParam(':departemen', $departemen);
					$sql->bindParam(':kantor', $kantor);
					$sql->execute(); // Eksekusi query insert					
				}
				// }
			}

			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->AbsensiModel->insert_time_payroll($data_payroll);
		$this->AbsensiModel->insert_time_payroll_lembur($data_payroll_lembur);
		$this->AbsensiModel->insert_izin_durasi($data_izin_durasi);
		$this->AbsensiModel->insert_izin_durasi_lembur($data_izin_durasi_lembur);
		$this->AbsensiModel->insert_tidak_masuk_kerja($data_tidak_masuk_kerja);

?>
		<script type="text/javascript">
			alert("DATA TELAH BERHASIL DI SIMPAN");
			window.location.href = "<?= site_url('cek_absen') ?>";
		</script>
<?php
		//redirect("cek_absen"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}
