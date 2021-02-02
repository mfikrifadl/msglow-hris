<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


// Syarat  :  

// 1 . Select  = View 
// 2 . Insert  = Ins
// 3 . Update  = Updt
// 4 . Delete  = Del

class Relasi extends CI_Model
{

	public function GetDataOutlet()
	{
		// $Query = $this->db->query("SELECT o.*,(SELECT t.nama_area FROM tb_area_kerja t WHERE o.id_area = t.id_area)AS Area,
		// 						   (SELECT s.nama FROM tb_spv s WHERE s.id_spv = o.id_spv) AS Spv	
		// 						   FROM tb_outlet o ORDER BY o.id_spv DESC");

		$Query = $this->db->query("SELECT * ,
									(SELECT t.nama_area FROM tb_area_kerja t WHERE o.id_area = t.id_area)AS Area,
									(SELECT s.is_delete FROM tb_outlet s WHERE o.id_outlet = s.id_outlet)AS is_delete_outlet,
									(SELECT u.is_deleted FROM tb_area_kerja u WHERE o.id_area = u.id_area)AS is_delete_area
									FROM tb_outlet o ORDER BY o.id_area ASC");
		return $Query->result_array();
	}

	public function GetDataTimKhusus()
	{
		$Query = $this->db->query("SELECT o.*,
								   (SELECT s.keterangan FROM tb_kategori_tim_khusus s WHERE s.id_kategori_tim_khusus = o.id_kategori_tim_khusus) AS Kategori	
								   FROM tb_tim_khusus o ORDER BY o.id_kategori_tim_khusus DESC");
		return $Query->result_array();
	}

	public function GetDataSubUnitKerja()
	{
		$Query = $this->db->query("SELECT * ,
								   (SELECT uk.nama_unit_kerja FROM tb_unit_kerja uk WHERE uk.id_unit_kerja = suk.id_unit_kerja) AS UnitKerja
								   FROM tb_sub_unit_kerja suk ORDER BY suk.nama_sub_unit_kerja ASC");
		return $Query->result_array();
	}


	public function GetDataMasaKerja($Id)
	{
		$Query = $this->db->query("SELECT p.id_pegawai,12 * (YEAR('" . date('Y-m-d') . "') - YEAR (p.tanggal_masuk_kerja)) + 
						(MONTH('" . date('Y-m-d') . "') - MONTH (p.tanggal_masuk_kerja)) +
						(SIGN(DAY('" . date('Y-m-d') . "') / DAY (p.tanggal_masuk_kerja)) - 1) AS MasaKerja 
						FROM tb_pegawai p WHERE p.id_pegawai = '$Id'");

		return $Query->result_array();
	}

	public function GetDataPegawai()
	{
		$Query = $this->db->query(
			"SELECT * ,(SELECT a.nama_area FROM tb_area_kerja a WHERE a.id_area = p.id_area) AS Area,
		(SELECT k.status FROM tb_status_karyawan k WHERE k.id_status = p.id_status) AS Status ,
		(SELECT kk.kerja FROM tb_kerja kk WHERE kk.id_kerja = p.id_kerja) AS Kerja ,
		(SELECT j.jenis_pembayaran FROM tb_jenis_bayar j WHERE j.id_pembayaran = p.jenis_pembayaran) AS Pembayaran,
		(SELECT pk.nama_pendidikan FROM tb_pendidikan pk WHERE pk.id_pendidikan = p.pendidikan) AS PendidikanPegawai,
		(SELECT nama  FROM tb_outlet o WHERE o.id_outlet = p.outlet) AS OutletFix,
		12 * (YEAR('" . date('Y-m-d') . "') - YEAR (p.tanggal_masuk_kerja)) + 
			 (MONTH('" . date('Y-m-d') . "') - MONTH (p.tanggal_masuk_kerja)) +
			 (SIGN(DAY('" . date('Y-m-d') . "') / DAY (p.tanggal_masuk_kerja)) - 1) AS MasaKerja

		FROM tb_pegawai p WHERE p.id_status < 6 ORDER BY p.nik,p.nama ASC"
		);
		return $Query->result_array();
	}

	public function GetDataPegawaiPhl()
	{
		$Query = $this->db->query(
			"SELECT * ,(SELECT a.nama_area FROM tb_area_kerja a WHERE a.id_area = p.id_area) AS Area,
		(SELECT k.status FROM tb_status_karyawan k WHERE k.id_status = p.id_status) AS Status ,
		(SELECT kk.kerja FROM tb_kerja kk WHERE kk.id_kerja = p.id_kerja) AS Kerja ,
		(SELECT j.jenis_pembayaran FROM tb_jenis_bayar j WHERE j.id_pembayaran = p.jenis_pembayaran) AS Pembayaran,
		(SELECT pk.nama_pendidikan FROM tb_pendidikan pk WHERE pk.id_pendidikan = p.pendidikan) AS PendidikanPegawai,
		(SELECT nama  FROM tb_outlet o WHERE o.id_outlet = p.outlet) AS OutletFix,
		12 * (YEAR('" . date('Y-m-d') . "') - YEAR (p.tanggal_masuk_kerja)) + 
			 (MONTH('" . date('Y-m-d') . "') - MONTH (p.tanggal_masuk_kerja)) +
			 (SIGN(DAY('" . date('Y-m-d') . "') / DAY (p.tanggal_masuk_kerja)) - 1) AS MasaKerja

		FROM tb_pegawai p WHERE p.id_status < 6 ORDER BY p.nik,p.nama ASC"
		);
		return $Query->result_array();
	}

	public function GetDataAbsensi_tabel()
	{
		$Query = $this->db->query(
			"SELECT * ,
		(SELECT a.no FROM import a WHERE a.no = p.no) AS Nomor,
		(SELECT a.pin FROM import a WHERE a.pin = p.pin AND a.no = p.no) AS Pin,
		(SELECT k.nip FROM master_pegawai k WHERE k.pin = p.pin) AS Nip ,
		(SELECT kk.nama FROM master_pegawai kk WHERE kk.pin = p.pin) AS Nama ,
		(SELECT j.jabatan FROM master_pegawai j WHERE j.pin = p.pin) AS Jabatan,
		(SELECT pk.departemen FROM master_pegawai pk WHERE pk.pin = p.pin) AS Departemen,
		(SELECT s1.Scan_1 FROM import s1 WHERE s1.pin = p.pin AND s1.no = p.no) AS Scan1,
		(SELECT s2.Scan_2 FROM import s2 WHERE s2.pin = p.pin AND s2.no = p.no) AS Scan2,
		(SELECT s3.Scan_3 FROM import s3 WHERE s3.pin = p.pin AND s3.no = p.no) AS Scan3,
		(SELECT s4.Scan_4 FROM import s4 WHERE s4.pin = p.pin AND s4.no = p.no) AS Scan4,
		(SELECT s5.Scan_5 FROM import s5 WHERE s5.pin = p.pin AND s5.no = p.no) AS Scan5,
		(SELECT ft.payroll FROM import ft WHERE ft.pin = p.pin AND ft.no = p.no) AS FT,
		(SELECT lm.lembur FROM import lm WHERE lm.pin = p.pin AND lm.no = p.no) AS Lembur,
		(SELECT zd.izin_durasi FROM import zd WHERE zd.pin = p.pin AND zd.no = p.no) AS IzDur,			
		(SELECT c.keterangan FROM import c WHERE c.pin = p.pin AND c.no = p.no) AS Keterangan,		
		(SELECT kantor  FROM master_pegawai o WHERE o.pin = p.pin) AS Kantor,
		(SELECT t.tanggal  FROM import t WHERE t.pin = p.pin AND t.no = p.no) AS Tanggal

		FROM import p ORDER BY p.pin ASC"
		);
		return $Query->result_array();
	}

	public function GetDataAbsensi_tabel_new()
	{
		$Query = $this->db->query("SELECT * FROM v_log_absen ORDER BY tanggal DESC");
		return $Query->result_array();
	}

	public function GetDataTempAbsensi_tabel()
	{
		$Query = $this->db->query("SELECT * FROM data_temp_absen WHERE status_update =1 ORDER BY tanggal DESC");
		return $Query->result_array();
	}

	// public function GetDataAbsensi_tabel_new()
	// {
	// 	$Query = $this->db->query(
	// 		"SELECT * ,
	// 	(SELECT a.id FROM v_login_absen a WHERE a.id = p.id) AS Id,
	// 	(SELECT b.pin FROM v_login_absen b WHERE b.pin = p.pin AND b.id = p.id) AS Pin,
	// 	(SELECT k.attlog FROM v_login_absen k WHERE k.pin = p.pin) AS Attlog ,
	// 	(SELECT t.tanggal FROM v_login_absen t WHERE t.pin = p.pin) AS Tanggal ,
	// 	(SELECT jd.jam_datang FROM v_login_absen jd WHERE jd.pin = p.pin) AS Jam_datang,
	// 	(SELECT jp.jam_pulang FROM v_login_absen jp WHERE jp.pin = p.pin) AS Jam_pulang,
	// 	(SELECT v.verify FROM v_login_absen v WHERE v.pin = p.pin) AS Verify,
	// 	(SELECT s.status_scan FROM v_login_absen s WHERE s.pin = p.pin) AS Status_scan,
	// 	(SELECT c.cloud_id FROM v_login_absen c WHERE c.pin = p.pin) AS Cloud_id

	// 	FROM v_login_absen p ORDER BY p.pin ASC"
	// 	);
	// 	return $Query->result_array();
	// }

	public function GetDataPegawaiBom()
	{
		$Query = $this->db->query(
			"SELECT * ,(SELECT a.nama_area FROM tb_area_kerja a WHERE a.id_area = p.id_area) AS Area,
		(SELECT k.status FROM tb_status_karyawan k WHERE k.id_status = p.id_status) AS Status ,
		(SELECT kk.kerja FROM tb_kerja kk WHERE kk.id_kerja = p.id_kerja) AS Kerja ,
		(SELECT j.jenis_pembayaran FROM tb_jenis_bayar j WHERE j.id_pembayaran = p.jenis_pembayaran) AS Pembayaran,
		(SELECT pk.nama_pendidikan FROM tb_pendidikan pk WHERE pk.id_pendidikan = p.pendidikan) AS PendidikanPegawai,
		(SELECT nama  FROM tb_outlet o WHERE o.id_outlet = p.outlet) AS OutletFix,
		12 * (YEAR('" . date('Y-m-d') . "') - YEAR (p.tanggal_masuk_kerja)) + 
			 (MONTH('" . date('Y-m-d') . "') - MONTH (p.tanggal_masuk_kerja)) +
			 (SIGN(DAY('" . date('Y-m-d') . "') / DAY (p.tanggal_masuk_kerja)) - 1) AS MasaKerja

		FROM tb_pegawai p WHERE p.id_kerja = 4 ORDER BY p.nik,p.nama ASC"
		);
		return $Query->result_array();
	}


	public function GetDataPegawaiLapangan()
	{
		$Query = $this->db->query(
			"SELECT * ,(SELECT a.nama_area FROM tb_area_kerja a WHERE a.id_area = p.id_area) AS Area,
		(SELECT k.status FROM tb_status_karyawan k WHERE k.id_status = p.id_status) AS Status ,
		(SELECT kk.kerja FROM tb_kerja kk WHERE kk.id_kerja = p.id_kerja) AS Kerja ,
		(SELECT pk.nama_pendidikan FROM tb_pendidikan pk WHERE pk.id_pendidikan = p.pendidikan) AS PendidikanPegawai,
		(SELECT tl.tim_lapangan FROM tim_lapangan tl WHERE 
				tl.id_tim_lapangan = p.id_tim_lapangan) AS tim_lapangan
		FROM tb_pegawai p WHERE p.id_kerja = 2 and p.id_status != 5 order by id_tim_lapangan asc"
		);
		return $Query->result_array();
	}

	public function GetDataPegawaiOffice()
	{
		$Query = $this->db->query(
			"SELECT * ,(SELECT a.nama_area FROM tb_area_kerja a WHERE a.id_area = p.id_area) AS Area,
		(SELECT k.status FROM tb_status_karyawan k WHERE k.id_status = p.id_status) AS Status ,
		(SELECT kk.kerja FROM tb_kerja kk WHERE kk.id_kerja = p.id_kerja) AS Kerja ,
		(SELECT pk.nama_pendidikan FROM tb_pendidikan pk WHERE pk.id_pendidikan = p.pendidikan) AS PendidikanPegawai
		FROM tb_pegawai p WHERE p.id_kerja = 3 GROUP BY p.nik,p.nama ASC"
		);
		return $Query->result_array();
	}
	public function GetDataPegawaiSearch($Id)
	{
		$Query = $this->db->query(
			"SELECT * ,(SELECT a.nama_area FROM tb_area_kerja a WHERE a.id_area = p.id_area) AS Area,
		(SELECT k.status FROM tb_status_karyawan k WHERE k.id_status = p.id_status) AS Status ,
		(SELECT kk.kerja FROM tb_kerja kk WHERE kk.id_kerja = p.id_kerja) AS Kerja ,
		(SELECT pk.nama_pendidikan FROM tb_pendidikan pk WHERE pk.id_pendidikan = p.pendidikan) AS PendidikanPegawai,
		(SELECT nama  FROM tb_outlet o WHERE o.id_outlet = p.outlet) AS OutletFix
		FROM tb_pegawai p WHERE p.id_pegawai = '$Id'"
		);
		return $Query->result_array();
	}

	public function GetDataJabatanPegawai()
	{
		$Query = $this->db->query("SELECT *,(SELECT uk.nama_sub_unit_kerja FROM tb_sub_unit_kerja uk WHERE uk.id_sub_unit_kerja = jp.id_sub_unit_kerja) AS UnitKerja,
								(SELECT rj.nama_jabatan FROM tb_ref_jabatan rj WHERE rj.id_ref_jabatan = jp.id_ref_jabatan) AS Jabatan,
								(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = jp.id_pegawai) AS Pegawai
								FROM  tb_jabatan_pegawai jp WHERE is_deleted = 0 ORDER BY jp.id_jabatan_pegawai DESC");
		return $Query->result_array();
	}

	public function GetDataJabatanSearch($Id)
	{
		$Query = $this->db->query("SELECT *,(SELECT uk.nama_sub_unit_kerja FROM tb_sub_unit_kerja uk WHERE uk.id_sub_unit_kerja = jp.id_sub_unit_kerja) AS UnitKerja,
								(SELECT rj.nama_jabatan FROM tb_ref_jabatan rj WHERE rj.id_ref_jabatan = jp.id_ref_jabatan) AS Jabatan,
								(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = jp.id_pegawai) AS Pegawai
								FROM  tb_jabatan_pegawai jp WHERE jp.id_pegawai = '" . $Id . "'");
		return $Query;
	}

	public function GetDataKetidakhadiranPegawai()
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = k.id_pegawai) AS Pegawai
				FROM tb_ketidakhadiran k ");
		return $Query->result_array();
	}

	public function GetDataKetidakhadiranPegawaiSearch($Id)
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = k.id_pegawai) AS Pegawai
				FROM tb_ketidakhadiran k WHERE k.id_pegawai = '$Id' ORDER BY k.tanggal DESC");
		return $Query->result_array();
	}

	public function GetDataKesehatanPegawai()
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = k.id_pegawai) AS Pegawai
				FROM tb_kesehatan k ");
		return $Query->result_array();
	}

	public function GetDataKesehatanPegawaiSearch($Id)
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = k.id_pegawai) AS Pegawai
				FROM tb_kesehatan k WHERE k.id_pegawai = '$Id' ORDER BY k.id_kesehatan DESC");
		return $Query->result_array();
	}


	public function GetDataPendidikanPegawai()
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = k.id_pegawai) AS Pegawai,
				(SELECT d.nama_pendidikan FROM tb_pendidikan d WHERE d.id_pendidikan = k.id_pendidikan) AS Pendidikan
				FROM tb_pendidikan_pegawai k ORDER BY k.id_pendidikan_pegawai DESC ");
		return $Query->result_array();
	}

	public function GetDataPendidikanPegawaiSearch($Id)
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = k.id_pegawai) AS Pegawai,
				(SELECT d.nama_pendidikan FROM tb_pendidikan d WHERE d.id_pendidikan = k.id_pendidikan) AS Pendidikan
				FROM tb_pendidikan_pegawai k WHERE k.id_pegawai = '$Id' ");
		return $Query->result_array();
	}

	public function GetDataPengalamanPegawai()
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = k.id_pegawai) AS Pegawai
				FROM tb_pengalaman k ORDER BY k.id_pengalaman DESC ");
		return $Query->result_array();
	}

	public function GetDataPengalamanPegawaiSearch($Id)
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = k.id_pegawai) AS Pegawai
				FROM tb_pengalaman k WHERE k.id_pegawai = '$Id'");
		return $Query->result_array();
	}

	public function GetDataKuisionerPegawai()
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = k.id_pegawai) AS Pegawai
				FROM tb_kuisioner k ORDER BY k.id_kuisioner DESC ");
		return $Query->result_array();
	}

	public function GetDataKuisionerPegawaiSearch($Id)
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = k.id_pegawai) AS Pegawai
				FROM tb_kuisioner k WHERE k.id_pegawai = '$Id'");
		return $Query->result_array();
	}

	public function GetDataPrestasiPegawai()
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = k.id_pegawai) AS Pegawai
				FROM tb_prestasi k ORDER BY k.id_prestasi DESC ");
		return $Query->result_array();
	}

	public function GetDataPrestasiPegawaiSearch($Id)
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = k.id_pegawai) AS Pegawai
				FROM tb_prestasi k WHERE k.id_pegawai = '$Id'");
		return $Query->result_array();
	}

	public function GetSuratPanggilanPegawai()
	{
		$Query = $this->db->query("SELECT sp.*,(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NamaPegawai,
		(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NikPegawai
		FROM tb_surat_panggilan sp  ORDER BY sp.id_panggilan DESC ");
		return $Query->result_array();
	}

	public function GetSuratPanggilanPegawaiSearch($Id)
	{
		$Query = $this->db->query("SELECT sp.*,(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NamaPegawai,
		(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NikPegawai
		FROM tb_surat_panggilan sp WHERE sp.id_pegawai = '$Id' ");
		return $Query->result_array();
	}

	public function GetSuratPenyataanPegawai()
	{
		$Query = $this->db->query("SELECT sp.*,(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NamaPegawai,
		(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NikPegawai,
		(SELECT o.nama FROM tb_outlet o WHERE o.id_outlet = sp.id_outlet) AS Outlet
		FROM tb_surat_pernyataan sp  ORDER BY sp.id_pernyataan DESC ");
		return $Query->result_array();
	}

	public function GetSuratPernyataanPegawaiSearch($Id)
	{
		$Query = $this->db->query("SELECT sp.*,(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NamaPegawai,
		(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NikPegawai,
		(SELECT o.nama FROM tb_outlet o WHERE o.id_outlet = sp.id_outlet) AS Outlet
		FROM tb_surat_pernyataan sp WHERE sp.id_pegawai = '$Id' ");
		return $Query->result_array();
	}

	public function GetDataMutasiPegawai()
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Pegawai,
				(SELECT o.nama FROM tb_outlet o  WHERE o.id_outlet = m.id_outlet_lama) AS TempatLama,
				(SELECT s.nama FROM tb_spv s  WHERE s.id_spv = m.id_spv_lama) AS AtasanLama,
				(SELECT su.nama_sub_unit_kerja FROM tb_sub_unit_kerja su WHERE su.id_sub_unit_kerja = m.id_jabatan_lama) AS JabatanLama,
				(SELECT o.nama FROM tb_outlet o  WHERE o.id_outlet = m.id_outlet_baru) AS TempatBaru,
				(SELECT s.nama FROM tb_spv s  WHERE s.id_spv = m.id_spv_baru) AS AtasanBaru,
				(SELECT su.nama_sub_unit_kerja FROM tb_sub_unit_kerja su WHERE su.id_sub_unit_kerja = m.id_jabatan_baru) AS JabatanBaru,
				(SELECT ks.kategori_surat FROM tb_kategori_surat ks WHERE ks.id = m.id_kategori_surat) AS KategoriSurat
				FROM tb_mutasi m ORDER BY m.id_mutasi DESC ");
		return $Query->result_array();
	}

	public function GetDataMutasiPegawaiSearch($Id)
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Pegawai,
				(SELECT o.nama FROM tb_outlet o  WHERE o.id_outlet = m.id_outlet_lama) AS TempatLama,
				(SELECT s.nama FROM tb_spv s  WHERE s.id_spv = m.id_spv_lama) AS AtasanLama,
				(SELECT su.nama_sub_unit_kerja FROM tb_sub_unit_kerja su WHERE su.id_sub_unit_kerja = m.id_jabatan_lama) AS JabatanLama,
				(SELECT o.nama FROM tb_outlet o  WHERE o.id_outlet = m.id_outlet_baru) AS TempatBaru,
				(SELECT s.nama FROM tb_spv s  WHERE s.id_spv = m.id_spv_baru) AS AtasanBaru,
				(SELECT su.nama_sub_unit_kerja FROM tb_sub_unit_kerja su WHERE su.id_sub_unit_kerja = m.id_jabatan_baru) AS JabatanBaru,
				(SELECT ks.kategori_surat FROM tb_kategori_surat ks WHERE ks.id = m.id_kategori_surat) AS KategoriSurat
				FROM tb_mutasi m WHERE m.id_pegawai = '$Id'");
		return $Query->result_array();
	}

	public function GetSuratPeringatanPegawai1()
	{
		$Query = $this->db->query("SELECT sp.*,(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NamaPegawai,
		(SELECT o.nama FROM tb_outlet o WHERE o.id_outlet = sp.outlet)AS Outlet,
		(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NikPegawai
		FROM tb_surat_peringatan sp WHERE sp.id_kategori_surat = '3' ORDER BY sp.id DESC ");
		return $Query->result_array();
	}

	public function GetSuratPeringatanPegawai2()
	{
		$Query = $this->db->query("SELECT sp.*,(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NamaPegawai,
		(SELECT o.nama FROM tb_outlet o WHERE o.id_outlet = sp.outlet)AS Outlet,
		(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NikPegawai
		FROM tb_surat_peringatan sp WHERE sp.id_kategori_surat = '4' ORDER BY sp.id DESC ");
		return $Query->result_array();
	}

	public function GetSuratPeringatanPegawaiSearch($Id)
	{
		$Query = $this->db->query("SELECT sp.*,(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NamaPegawai,
		(SELECT s.kategori_surat FROM tb_kategori_surat s WHERE s.id = sp.id_kategori_surat) As Kategori,	
		(SELECT o.nama FROM tb_outlet o WHERE o.id_outlet = sp.outlet)AS Outlet,
		(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NikPegawai
		FROM tb_surat_peringatan sp WHERE sp.id_pegawai = '$Id'");
		return $Query->result_array();
	}

	public function GetSuratIstirahatPegawai()
	{
		$Query = $this->db->query("SELECT sp.*,(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NamaPegawai,
		(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NikPegawai
		FROM tb_surat_istirahat sp WHERE sp.id_kategori_surat = '5' ORDER BY sp.id_istirahat DESC ");
		return $Query->result_array();
	}

	public function GetSuratIstirahatPegawaiSearch($Id)
	{
		$Query = $this->db->query("SELECT sp.*,(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NamaPegawai,
		(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NikPegawai
		FROM tb_surat_istirahat sp WHERE sp.id_pegawai = '$Id' ");
		return $Query->result_array();
	}

	public function GetSuratSkorsingPegawai()
	{
		$Query = $this->db->query("SELECT sp.*,(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NamaPegawai,
		(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NikPegawai
		FROM tb_surat_skorsing sp WHERE sp.id_kategori_surat = '6' ORDER BY sp.id_skorsing DESC ");
		return $Query->result_array();
	}

	public function GetSuratSkorsingPegawaiSearch($Id)
	{
		$Query = $this->db->query("SELECT sp.*,(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NamaPegawai,
		(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = sp.id_pegawai)AS NikPegawai
		FROM tb_surat_skorsing sp WHERE sp.id_pegawai = '$Id' ");
		return $Query->result_array();
	}

	public function GetDataTugasPegawai()
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Pegawai,
				(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Nik,
				(SELECT o.nama FROM tb_outlet o  WHERE o.id_outlet = m.id_outlet_lama) AS OutletLama,
				(SELECT o.nama FROM tb_outlet o  WHERE o.id_outlet = m.id_outlet_baru) AS OutletBaru,
				(SELECT s.nama FROM tb_spv s  WHERE s.id_spv = m.id_spv) AS Supervisor
				FROM tb_surat_tugas m ORDER BY m.id_tugas DESC ");
		return $Query->result_array();
	}

	public function GetDataTC()
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Pegawai,
				(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Nik,
				(SELECT o.nama FROM tb_outlet o  WHERE o.id_outlet = m.id_outlet_lama) AS OutletLama,
				(SELECT o.nama FROM tb_outlet o  WHERE o.id_outlet = m.id_outlet_baru) AS OutletBaru,
				(SELECT s.nama FROM tb_spv s  WHERE s.id_spv = m.id_spv) AS Supervisor
				FROM tb_surat_tc m ORDER BY m.id_tugas DESC ");
		return $Query->result_array();
	}

	public function GetDataTugasPegawaiSearch($Id)
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Pegawai,
				(SELECT o.nama FROM tb_outlet o  WHERE o.id_outlet = m.id_outlet_lama) AS OutletLama,
				(SELECT o.nama FROM tb_outlet o  WHERE o.id_outlet = m.id_outlet_baru) AS OutletBaru,
				(SELECT s.nama FROM tb_spv s  WHERE s.id_spv = m.id_spv) AS Supervisor
				FROM tb_surat_tugas m WHERE m.id_pegawai = '$Id' ");
		return $Query->result_array();
	}



	public function GetDataTeguranPegawai()
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Pegawai,
				(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Nik
				FROM tb_surat_teguran m ORDER BY m.id_teguran DESC ");
		return $Query->result_array();
	}

	public function GetDataTeguranPegawaiSearch($Id)
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Pegawai,
				(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Nik
				FROM tb_surat_teguran m WHERE m.id_pegawai = '$Id' ");
		return $Query->result_array();
	}

	public function GetDataBeritaAcaraPegawai()
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Pegawai,
				(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Nik
				FROM tb_berita_acara m ORDER BY m.id_acara DESC ");
		return $Query->result_array();
	}

	public function GetDataBeritaAcaraPegawaiSearch($Id)
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Pegawai,
				(SELECT p.nik FROM tb_pegawai p WHERE p.id_pegawai = m.id_pegawai) AS Nik
				FROM tb_berita_acara m WHERE m.id_acara = '$Id' ");
		return $Query->result_array();
	}

	public function GetDataAbsensi($Bulan, $Tahun)
	{
		$this->db->reconnect();
		$Query = $this->db->query("SELECT * FROM v_gaji WHERE bulan = '" . $Bulan . "' AND tahun = '" . $Tahun . "' ORDER BY Outlet ASC  ");
		return $Query->result_array();
	}

	public function GetDataLogAbsensi($Tgl)
	{
		$this->db->reconnect();
		$Query = $this->db->query("SELECT * FROM v_log_absen ");
		return $Query->result_array();
	}


	public function GetDataInsentif($Bulan, $Tahun)
	{
		$this->db->reconnect();
		$Query = $this->db->query("SELECT * FROM v_insentif WHERE bulan = '" . $Bulan . "' AND tahun = '" . $Tahun . "' ORDER BY nama_outlet ASC  ");
		return $Query->result_array();
	}

	public function GetDataAbsensiPegawai($Id)
	{
		$this->db->reconnect();
		$Query = $this->db->query("CALL procedure_Absen($Id)");
		return $Query->result_array();
	}

	public function GetDataAbsensiPegawaiBulan($Bulan, $Tahun)
	{
		$this->db->reconnect();
		$Query = $this->db->query("CALL Procedure_Absen_Bulan($Bulan,$Tahun)");
		return $Query->result_array();
	}

	public function GetDataAbsensiPegawaiBulanBayar($Bulan, $Tahun, $cBayar)
	{
		$this->db->reconnect();
		$Query = $this->db->query("CALL Procedure_Absen_Bulan_Bayar($Bulan,$Tahun,$cBayar)");
		return $Query->result_array();
	}

	public function GetDataAbsensiPegawaiBulanSpv($Bulan, $Tahun, $cSpv)
	{
		$this->db->reconnect();
		$Query = $this->db->query("CALL Procedure_Absen_Bulan_spv($Bulan,$Tahun,$cSpv)");
		return $Query->result_array();
	}

	public function GetDataAbsensiPegawaiBulanSpvBayar($Bulan, $Tahun, $cSpv, $cBayar)
	{
		$this->db->reconnect();
		$Query = $this->db->query("CALL Procedure_Absen_Bulan_spv_bayar($Bulan,$Tahun,$cSpv,$cBayar)");
		return $Query->result_array();
	}

	public function GetDataSlipGaji($Id)
	{
		$this->db->reconnect();
		$Query = $this->db->query("SELECT * FROM tb_gaji WHERE id_absen = '$Id'");
		return $Query->result_array();
	}


	public function GetDataLaporanAbsensiSpv($Bulan, $Tahun)
	{
		$this->db->reconnect();
		$Query = $this->db->query("SELECT * FROM laporan_absen_spv WHERE bulan = '$Bulan' AND tahun = '$Tahun' ORDER BY Outlet ASC ");
		return $Query->result_array();
	}

	public function GetDataSlipGajiBulan($Bulan, $Tahun)
	{
		$this->db->reconnect();
		$Query = $this->db->query("SELECT g.*,a.bulan,a.tahun 
								   FROM tb_gaji g , tb_absensi a 
								   WHERE a.id_absen = g.id_absen 
								   	AND a.bulan = '$Bulan' AND a.tahun = '$Tahun' ");
		return $Query->result_array();
	}

	public function GetDataRekapGaji($Bulan, $Tahun)
	{
		$this->db->reconnect();
		$Query = $this->db->query("CALL rekapan_gaji($Bulan,$Tahun)");
		return $Query->result_array();
	}

	public function GetDataRekapGajiPembayaran($Bulan, $Tahun, $Bayar)
	{
		$this->db->reconnect();
		$Query = $this->db->query("CALL rekapan_gaji_perpembayaran($Bulan,$Tahun,$Bayar)");
		return $Query->result_array();
	}

	public function GetDataPelanggaran($cPin)
	{
		$this->db->reconnect();
		$Query = $this->db->query("SELECT * FROM v_pegawai_pelanggaran_sp WHERE pin LIKE '%" . $cPin . "%' ");
		return $Query;
	}

	public function v_GetDataMasaKerja()
	{
		$this->db->reconnect();
		$Query = $this->db->query("SELECT * FROM v_masa_kerja WHERE MasaKerja <= 3  ");
		return $Query->result_array();
	}

	public function GetDataPegawaiMengundurkanDiri()
	{
		$Query = $this->db->query(
			"SELECT
tb_pegawai.id_pegawai,
tb_pegawai.nik,
tb_pegawai.nama,
tb_pegawai.tanggal_masuk_kerja,
tb_pengunduran_diri.tanggal as tanggal_keluar,
tb_pengunduran_diri.`status`,
tb_pengunduran_diri.keterangan,
12 * (YEAR(tb_pengunduran_diri.tanggal) - YEAR (tb_pegawai.tanggal_masuk_kerja)) + 
			 (MONTH(tb_pengunduran_diri.tanggal) - MONTH (tb_pegawai.tanggal_masuk_kerja)) +
			 (SIGN(DAY(tb_pengunduran_diri.tanggal) / DAY (tb_pegawai.tanggal_masuk_kerja)) - 1) AS MasaKerja
FROM
tb_pengunduran_diri
INNER JOIN tb_pegawai ON tb_pegawai.id_pegawai = tb_pengunduran_diri.id_pegawai ORDER BY tb_pengunduran_diri.tanggal ASC
"
		);
		return $Query->result_array();
	}


	public function GetDataPengundurandiriPegawai()
	{
		$Query = $this->db->query("SELECT * FROM v_pengunduran_diri ORDER BY tanggal DESC");
		return $Query->result_array();
	}

	public function GetDataPengundurandiriPegawaiSearch($Id)
	{
		$Query = $this->db->query("SELECT * ,
				(SELECT p.nama FROM tb_pegawai p WHERE p.id_pegawai = k.id_pegawai) AS Pegawai
				FROM tb_pengunduran_diri k WHERE k.id_pegawai = '$Id' ORDER BY k.tanggal DESC");
		return $Query->result_array();
	}

	public function GetSubUnitKerja($id)
	{
		$Query = $this->db->query("SELECT * FROM tb_sub_unit_kerja WHERE id_unit_kerja = '$id' ");
		return $Query->result_array();
	}
}
