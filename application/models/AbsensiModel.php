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
		if($data_log_absen == null){
			// echo "tidak masuk database if insert_time_payroll <br />";
		}else{
			// echo "masuk else insert_time_payroll <br />";
			$this->db->insert_batch('log_absen', $data_log_absen);
		}
		 
	}

	public function insert_data_master_pegawai($data_master_pegawai)
	{
		if($data_master_pegawai == null){
			// echo "tidak masuk database if insert_time_payroll <br />";
		}else{
			// echo "masuk else insert_time_payroll <br />";
			$this->db->insert_batch('master_pegawai', $data_master_pegawai);
		}
		 
	}

	public function insert_time_payroll($data_payroll)
	{
		if($data_payroll == null){
			// echo "tidak masuk database if insert_time_payroll <br />";
		}else{
			// echo "masuk else insert_time_payroll <br />";
			$this->db->insert_batch('import', $data_payroll);
		}
		 
	}

	public function insert_time_payroll_lembur($data_payroll_lembur)
	{
		if($data_payroll_lembur == null){
			// echo "tidak masuk database if insert_time_payroll_lembur <br />";
		}else{
			// echo "masuk else insert_time_payroll_lembur <br />";
			$this->db->insert_batch('import', $data_payroll_lembur);
		}
		 
	}

	public function insert_izin_durasi($data_izin_durasi)
	{
		if($data_izin_durasi == null){
			// echo "tidak masuk database if insert_izin_durasi <br />";
		}else{
			// echo "masuk else insert_izin_durasi <br />";
			$this->db->insert_batch('import', $data_izin_durasi);
		}
		 
	}

	public function insert_izin_durasi_lembur($data_izin_durasi_lembur)
	{
		if($data_izin_durasi_lembur == null){
			// echo "tidak masuk database if insert_izin_durasi_lembur <br />";
		}else{
			// echo "masuk else insert_izin_durasi_lembur <br />";
			$this->db->insert_batch('import', $data_izin_durasi_lembur);
		}
		 
	}

	public function insert_tidak_masuk_kerja($data_tidak_masuk_kerja)
	{
		if($data_tidak_masuk_kerja == null){
			// echo "tidak masuk database if insert_tidak_masuk_kerja <br />";
		}else{
			// echo "masuk else insert_tidak_masuk_kerja <br />";
			$this->db->insert_batch('import', $data_tidak_masuk_kerja);
		}
		
	}	
	
	public function insert_data_belum_diCoding($data_belum_diCoding)
	{
		if($data_belum_diCoding == null){
			// echo "tidak masuk database if insert_data_belum_diCoding <br />";
		}else{
			// echo "masuk else insert_data_belum_diCoding <br />";
			$this->db->insert_batch('import', $data_belum_diCoding);
		}
		 
	}	
	
}
