<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AbsensiModel extends CI_Model
{
	public function view()
	{
		return $this->db->get('import')->result(); // Tampilkan semua data yang ada di tabel siswa
	}

	// Fungsi untuk melakukan proses upload file
	public function upload_file($filename)
	{
		$this->load->library('upload'); // Load librari upload

		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx|xls';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if ($this->upload->do_upload('file')) { // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
	public function insert_data_log_absen($data_log_absen)
	{
		if ($data_log_absen == null) {
			// echo "tidak masuk database if insert_time_payroll <br />";
		} else {
			// echo "masuk else insert_time_payroll <br />";
			//$attlog = "";
			$first = $data_log_absen[0];
			$attlog = $first['attlog'];

			$a_attlog = explode(" ", $attlog);
			$tgl_attlog = $a_attlog[0];
			$waktu_attlog = $a_attlog[1];

			//$cView = $this->db->query("SELECT * FROM log_absen WHERE tanggal = '" . $tgl_attlog . "' " );
			//if ($cView->num_rows() > 0) {
			//echo "tidak masuk database";
			//} else {
			//echo "masuk database";


			$this->db->insert_on_duplicate_update_batch('log_absen', $data_log_absen);

			$dataAbsen = $this->model->ViewAbsensiPerHari($tgl_attlog);

			$t_newId = date("YmdHis");
			$no = 1;
			// $log_absen_not_recorded = array();
			foreach ($dataAbsen as $row) {
				if (empty($row['id']) && empty($row['tanggal'])) {
					$newId = $t_newId . "-" . $no;

					$log_absen_not_recorded = array(
						'id'    => $newId,
						'pin'	=> $row['nik'],
						'tanggal' => $tgl_attlog
					);
					$this->model->Insert('log_absen', $log_absen_not_recorded);
					$no++;
				} else {
					//echo "sudah ada <br />";
				}
				//	}
				// $this->db->insert_on_duplicate_update_batch('log_absen', $log_absen_not_recorded);				
			}
		}
	}
 //====================================BELUM SEMPURNA =====================================================
	public function cekUpadate_tb_absensi($tanggal, $dataRecordAbsen)
	{
		$getData_tb_absensi = $this->model->ViewAbsensiPerHari($tanggal);
		$dataInsert = array();
		foreach ($getData_tb_absensi as $vaGetData) {
			$getNik = $vaGetData['nik'];
			
			foreach ($dataRecordAbsen as $vaData) {
				if($vaData['nik'] == $getNik && $vaData['tanggal'] == $tanggal ){
					$dataUpdate = array(
						'jam_pulang' => $vaData['jam_pulang']
					);
					echo "masuk update";
					//$this->model->Update_tb_absensi('tb_absensi',$vaData['nik'], $getNik, $vaData['tanggal'], $tanggal, $dataUpdate);
				}else{
					array_push($dataInsert, array(
						'id' => $vaData['id'],
						'id_temp' => $vaData['id_temp'],
						'id_pegawai' => $vaData['id_pegawai'],
						'nik' => $vaData['nik'],
						'nama' => $vaData['nama'],
						'id_status' => $vaData['id_status'],
						'nama_jabatan' => $vaData['nama_jabatan'],
						'tot_jam_kerja' => $vaData['tot_jam_kerja'],
						'tot_jam_lembur' => $vaData['tot_jam_lembur'],
						'keterangan' => $vaData['keterangan'],
						'keterangan_temp' => $vaData['keterangan_temp'],
						'keterlambatan' => $vaData['keterlambatan'],
						'ket_lain' => $vaData['ket_lain'],
						'ket_lain_temp' => $vaData['ket_lain_temp'],
						'attlog' => $vaData['attlog'],
						'tanggal' => $vaData['tanggal'],
						'jam_datang' => $vaData['jam_datang'],
						'jam_pulang' => $vaData['jam_pulang'],
						'waktu' => $vaData['waktu']
					));
				}
			}
		}
		$this->model->insert_data_batch('tb_absensi', $dataInsert);
		
	}
//====================================END BELUM SEMPURNA =====================================================
	public function insert_data_master_pegawai($data_master_pegawai)
	{
		if ($data_master_pegawai == null) {
			// echo "tidak masuk database if insert_time_payroll <br />";
		} else {
			// echo "masuk else insert_time_payroll <br />";
			$this->db->insert_batch('master_pegawai', $data_master_pegawai);
		}
	}

	public function insert_time_payroll($data_payroll)
	{
		if ($data_payroll == null) {
			// echo "tidak masuk database if insert_time_payroll <br />";
		} else {
			// echo "masuk else insert_time_payroll <br />";
			$this->db->insert_batch('import', $data_payroll);
		}
	}

	public function insert_time_payroll_lembur($data_payroll_lembur)
	{
		if ($data_payroll_lembur == null) {
			// echo "tidak masuk database if insert_time_payroll_lembur <br />";
		} else {
			// echo "masuk else insert_time_payroll_lembur <br />";
			$this->db->insert_batch('import', $data_payroll_lembur);
		}
	}

	public function insert_izin_durasi($data_izin_durasi)
	{
		if ($data_izin_durasi == null) {
			// echo "tidak masuk database if insert_izin_durasi <br />";
		} else {
			// echo "masuk else insert_izin_durasi <br />";
			$this->db->insert_batch('import', $data_izin_durasi);
		}
	}

	public function insert_izin_durasi_lembur($data_izin_durasi_lembur)
	{
		if ($data_izin_durasi_lembur == null) {
			// echo "tidak masuk database if insert_izin_durasi_lembur <br />";
		} else {
			// echo "masuk else insert_izin_durasi_lembur <br />";
			$this->db->insert_batch('import', $data_izin_durasi_lembur);
		}
	}

	public function insert_tidak_masuk_kerja($data_tidak_masuk_kerja)
	{
		if ($data_tidak_masuk_kerja == null) {
			// echo "tidak masuk database if insert_tidak_masuk_kerja <br />";
		} else {
			// echo "masuk else insert_tidak_masuk_kerja <br />";
			$this->db->insert_batch('import', $data_tidak_masuk_kerja);
		}
	}

	public function insert_data_belum_diCoding($data_belum_diCoding)
	{
		if ($data_belum_diCoding == null) {
			// echo "tidak masuk database if insert_data_belum_diCoding <br />";
		} else {
			// echo "masuk else insert_data_belum_diCoding <br />";
			$this->db->insert_batch('import', $data_belum_diCoding);
		}
	}
}
