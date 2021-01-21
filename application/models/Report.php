<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	// Syarat  :  
	
	// 1 . Select  = View 
	// 2 . Insert  = Ins
	// 3 . Update  = Updt
	// 4 . Delete  = Del

class Report extends CI_Model {

	public function GetLaporanUmur($Where) {
		$Query = $this->db->query("SELECT *  FROM tb_pegawai WHERE $Where");
	return $Query->result_array();	
	}

	public function GetLaporanPendidikan($Where) {
		$Query = $this->db->query("SELECT p.nik,tp.nama_pendidikan ,p.nama,p.id_pegawai
					FROM tb_pegawai p , tb_pendidikan tp
					WHERE p.pendidikan = tp.id_pendidikan AND tp.nama_pendidikan = '$Where'");
	return $Query->result_array();	
	}

	public function GetLaporanArea($Where) {
		$Query = $this->db->query("SELECT p.nik,tp.nama_area ,p.nama,p.id_pegawai
					FROM tb_pegawai p , tb_area_kerja tp
					WHERE p.id_area = tp.id_area AND tp.title = '$Where'");
	return $Query->result_array();	
	}

	public function GetLaporanStatus($Where) {
		$Query = $this->db->query("SELECT p.nik,tp.status ,p.nama,p.id_pegawai
					FROM tb_pegawai p , tb_status_karyawan tp
					WHERE p.id_status = tp.id_status AND tp.id_status = '$Where'");
	return $Query->result_array();	
	}

	public function GetSuratPanggilan($Id) {
		$Query = $this->db->query("SELECT sp.*,(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NamaPegawai,
		(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NikPegawai
		FROM tb_surat_panggilan sp WHERE sp.id_panggilan = '$Id' ");
		return $Query->result_array();	
	}

	public function GetSuratPernyataanPegawai($Id) {
		$Query = $this->db->query("SELECT sp.*,(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NamaPegawai,
		(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NikPegawai,
		(SELECT o.nama FROM tb_outlet o WHERE o.id_outlet = sp.id_outlet) AS Outlet
		FROM tb_surat_pernyataan sp WHERE sp.id_pernyataan = '$Id' ");
		return $Query->result_array();	
	}

	public function GetSuratTugasPegawai($Id) {
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Pegawai,
				(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Nik,
				(SELECT o.nama FROM tb_outlet o  WHERE o.id_outlet = m.id_outlet_lama) AS OutletLama,
				(SELECT b.nama_sub_unit_kerja FROM tb_sub_unit_kerja b  WHERE b.id_sub_unit_kerja = m.id_jabatan) AS Jabatan,
				(SELECT o.nama FROM tb_outlet o  WHERE o.id_outlet = m.id_outlet_baru) AS OutletBaru,
				(SELECT s.nama FROM tb_spv s  WHERE s.id_spv = m.id_spv) AS Supervisor
				FROM tb_surat_tugas m WHERE m.id_tugas = '$Id' ");
		return $Query->result_array();	
	}

	public function GetMutasiPegawai($Id) {
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Pegawai,
				(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Nik,
				(SELECT o.nama FROM tb_outlet o  WHERE o.id_outlet = m.id_outlet_lama) AS TempatLama,
				(SELECT s.nama FROM tb_spv s  WHERE s.id_spv = m.id_spv_lama) AS AtasanLama,
				(SELECT su.nama_sub_unit_kerja FROM tb_sub_unit_kerja su WHERE su.id_sub_unit_kerja = m.id_jabatan_lama) AS JabatanLama,
				(SELECT o.nama FROM tb_outlet o  WHERE o.id_outlet = m.id_outlet_baru) AS TempatBaru,
				(SELECT s.nama FROM tb_spv s  WHERE s.id_spv = m.id_spv_baru) AS AtasanBaru,
				(SELECT su.nama_sub_unit_kerja FROM tb_sub_unit_kerja su WHERE su.id_sub_unit_kerja = m.id_jabatan_baru) AS JabatanBaru,
				(SELECT ks.kategori_surat FROM tb_kategori_surat ks WHERE ks.id = m.id_kategori_surat) AS KategoriSurat
				FROM tb_mutasi m WHERE m.id_mutasi = '$Id' ");
		return $Query->result_array();	
	}

	public function GetSuratPeringatanPegawai($Id) {
		$Query = $this->db->query("SELECT sp.*,(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NamaPegawai,
		(SELECT o.nama FROM tb_outlet o WHERE o.id_outlet = sp.outlet) AS Outlets,
		(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NikPegawai
		FROM tb_surat_peringatan sp WHERE sp.id = '$Id' ");
		return $Query->result_array();	
	}

	public function GetSuratIstirahatPegawai($Id) {
		$Query = $this->db->query("SELECT sp.*,(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NamaPegawai,
		(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NikPegawai
		FROM tb_surat_istirahat sp WHERE sp.id_istirahat = '$Id' ");
		return $Query->result_array();	
	}
	
	public function GetSuratSkorsingPegawai($Id) {
		$Query = $this->db->query("SELECT sp.*,(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NamaPegawai,
		(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NikPegawai
		FROM tb_surat_skorsing sp WHERE sp.id_skorsing = '$Id' ");
		return $Query->result_array();	
	}

	public function GetDataSlipGaji($Id) {
		$this->db->reconnect();
		$Query = $this->db->query("CALL procedure_Slip($Id)");
		return $Query->result_array();	
	}

	public function GetSuratTC($Id) {
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Pegawai,
				(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Nik,
				(SELECT o.nama FROM tb_outlet o  WHERE o.id_outlet = m.id_outlet_lama) AS OutletLama,
				(SELECT b.nama_sub_unit_kerja FROM tb_sub_unit_kerja b  WHERE b.id_sub_unit_kerja = m.id_jabatan) AS Jabatan,
				(SELECT o.nama FROM tb_outlet o  WHERE o.id_outlet = m.id_outlet_baru) AS OutletBaru,
				(SELECT s.nama FROM tb_spv s  WHERE s.id_spv = m.id_spv) AS Supervisor
				FROM tb_surat_tc m WHERE m.id_tugas = '$Id' ");
		return $Query->result_array();	
	}


}