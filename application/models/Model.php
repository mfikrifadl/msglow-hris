<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


// Syarat  :  

// 1 . Select  = View 
// 2 . Insert  = Ins
// 3 . Update  = Updt
// 4 . Delete  = Del

class Model extends CI_Model
{



	////// MASTER //////

	public function MenampilkanCaraBayarTanpaBNI()
	{
		$Query = $this->db->query("SELECT * FROM tb_jenis_bayar WHERE id_pembayaran != 6");
		return $Query->result_array();
	}

	public function GetKeteranganSurat($Kolom, $Table, $WhereValue, $Order)
	{
		$Query = $this->db->query("SELECT $Kolom FROM $Table WHERE id_kategori_surat = '$WhereValue' ORDER BY $Order DESC LIMIT 0,1");
		return $Query;
	}
	public function GetCekMasterPegawai($Kolom, $Table, $WhereValue)
	{
		$Query = $this->db->query("SELECT $Kolom FROM $Table WHERE pin = '$WhereValue' ");
		return $Query;
	}
	public function LoginAdmin($user, $pass)
	{
		$Query = $this->db->query("SELECT * FROM v_username WHERE username = '$user' AND password_hash= '$pass'");
		return $Query;
	}
	public function Code($Query)
	{
		$Query = $this->db->query("SELECT  " . $Query . "  ");
		return $Query->result_array();
	}

	public function SumPenjualan($dTgl)
	{
		$Query = $this->db->query("SELECT  SUM(pendapatan) AS Pendapatan FROM tb_penjualan WHERE tgl = '" . $dTgl . "'  ");
		return $Query->result_array();
	}

	public function LastId($kolom, $table)
	{
		$Query = $this->db->query("SELECT MAX($kolom) AS LastIdFix FROM  $table");
		return $Query->result_array();
	}
	public function View($Table)
	{
		$Query = $this->db->query("SELECT * FROM " . $Table );
		return $Query->result_array();
	}

	public function ViewWhereNot($Table, $WhereField, $WhereValue)
	{
		$Query = $this->db->query("SELECT * FROM " . $Table . " WHERE ".$WhereField." NOT LIKE '" . $WhereValue."'");
		return $Query->result_array();
	}

	public function ViewWhereLikeOr($Table, $WhereField1, $WhereValue1, $WhereField2, $WhereValue2)
	{
		$Query = $this->db->query("SELECT * FROM " . $Table . " WHERE ".$WhereField1." LIKE '%" . $WhereValue1."%' OR ".$WhereField2." LIKE '%" . $WhereValue2."%'");
		return $Query->result_array();
	}


	public function Pegawai()
	{
		$Query = $this->db->query(
			"SELECT * ,(SELECT a.nama_area FROM tb_area_kerja a WHERE a.id_area = p.id_area) AS Area,
		(SELECT k.status FROM tb_status_karyawan k WHERE k.id_status = p.id_status) AS Status ,
		(SELECT kk.kerja FROM tb_kerja kk WHERE kk.id_kerja = p.id_kerja) AS Kerja ,
		(SELECT pk.nama_pendidikan FROM tb_pendidikan pk WHERE pk.id_pendidikan = p.pendidikan) AS PendidikanPegawai,
		(SELECT nama  FROM tb_outlet o WHERE o.id_outlet = p.outlet) AS OutletFix
		FROM tb_pegawai p GROUP BY p.nik,p.nama ASC"
		);
		return $Query->result_array();
	}

	public function ViewASC($Table, $Order)
	{
		$Query = $this->db->query("SELECT * FROM " . $Table . " ORDER BY " . $Order . " ASC");
		return $Query->result_array();
	}

	public function ViewDesc($Table, $Order)
	{
		$Query = $this->db->query("SELECT * FROM " . $Table . " ORDER BY " . $Order . " DESC");
		return $Query->result_array();
	}

	public function ViewLimit($Table, $Order, $Limit)
	{
		$Query = $this->db->query("SELECT * FROM " . $Table . " ORDER BY " . $Order . " DESC LIMIT 0,$Limit");
		return $Query->result_array();
	}
	
	public function View2Or($Table, $Where, $WhereValue, $OrWhere, $OrWhereValue )
	{
		$Query = $this->db->query("SELECT * FROM " . $Table . " WHERE " . $Where . " = '" . $WhereValue . "' OR ".$OrWhere." = '".$OrWhereValue."' ");
		return $Query->result_array();
	}

	public function ViewWhere($Table, $WhereField, $WhereValue)
	{
		$Query = $this->db->query("SELECT * FROM " . $Table . " WHERE " . $WhereField . " = '" . $WhereValue . "'");
		return $Query->result_array();
	}

	public function ViewWhereAktor($Table, $WhereField, $WhereValue)
	{
		$Query = $this->db->query("SELECT * FROM " . $Table . " WHERE " . $WhereField . " = '" . $WhereValue . "' ORDER BY id DESC");
		
		return $Query->result_array();
	}

	public function ViewWhereAnd($Table, $WhereField, $WhereValue,  $WhereField2, $WhereValue2)
	{
		$Query = $this->db->query("SELECT * FROM ".$Table." WHERE " .$WhereField. " = '" . $WhereValue . "' AND  ".$WhereField2." = '".$WhereValue2."' ");
		return $Query->result_array();
	}

	public function Insert($Table, $Value)
	{
		$Query = $this->db->insert($Table, $Value);
		return $Query;
	}

	public function Update($Table, $Where, $WhereValue, $Value)
	{
		$this->db->where($Where, $WhereValue);
		$this->db->update($Table, $Value);
	}

	public function Update_loro($Table, $Where, $WhereValue, $Value)
	{
		$this->db->where($Where, $WhereValue);
		$this->db->update($Table, $Value);
	}

	public function Delete($Table, $Where, $WhereValue)
	{
		$this->db->where($Where, $WhereValue);
		$this->db->delete($Table);
	}

	public function Update_Delete($Table, $Where, $WhereValue, $Value)
	{
		$this->db->where($Where, $WhereValue);
		$this->db->update($Table, $Value);
	}

	public function GetId($Id, $Table)
	{
		$Query = $this->db->query("SELECT max($Id) FROM " . $Table . " ");
		return $Query->result_array();
	}

	public function GetDataTesTidakLolos()
	{
		$Query = $this->db->query("SELECT * FROM recruitment WHERE recruitment = 'tidaklolos' AND is_delete = '0' ");
		return $Query->result_array();
	}

	public function GetDataTesTidakLolosPHL()
	{
		$Query = $this->db->query("SELECT * FROM recruitment_phl WHERE administrasi = 'tidaklolos' AND is_delete = '0' ");
		return $Query->result_array();
	}

	public function GetDataTeLolosAdmPHL()
	{
		$Query = $this->db->query("SELECT * FROM recruitment_phl WHERE administrasi = 'lolos' AND is_delete = '0' ");
		return $Query->result_array();
	}

	public function GetCekAbsen($Id)
	{
		$Query = $this->db->query("SELECT * FROM tb_gaji WHERE id_absen = '$Id' ");
		return $Query;
	}

	public function GetCekGaji($Id)
	{
		$Query = $this->db->query("SELECT * FROM tb_gaji WHERE id_absen = '$Id' ");
		return $Query;
	}

	public function GetCekIzin($Id)
	{
		$Query = $this->db->query("SELECT * FROM tb_cuti_gaji WHERE id_absen = '$Id' ");
		return $Query;
	}

	public function GetDataPegawai($id)
	{
		$Query = 'SELECT t1.id_pegawai,
						t1.nik, t1.tanggal_lahir,
						t1.tempat_lahir, 
						t1.no_ktp,
						t4.status,
						t1.alamat_asal, 
						t1.nama, 
						t3.nama_jabatan, 
						t1.tanggal_masuk_kerja,
						t1.tgl_kontrak_berakhir FROM tb_pegawai t1 
						LEFT JOIN tb_status_karyawan t4 ON t1.id_status = t4.id_status
						LEFT JOIN tb_jabatan_pegawai t2 ON t1.id_pegawai = t2.id_pegawai 
						LEFT JOIN tb_ref_jabatan t3 ON t2.id_ref_jabatan = t3.id_ref_jabatan 
						WHERE t1.id_pegawai = "' . $id . '"';
		return $Query;
	}

	

	public function GetCekPendapatan($Id, $Bulan, $Tahun)
	{
		$Query = $this->db->query("SELECT * FROM tb_pendapatan WHERE id_pegawai = '$Id' and bulan = '$Bulan' and tahun = '$Tahun' ");
		return $Query;
	}

	//CHART 

	public function GetChartUmur()
	{
		$Query = $this->db->query("SELECT
	    CASE
	        WHEN umur < 20 THEN '... - 20'
        	WHEN umur BETWEEN 20 and 25 THEN '20 - 25'
			WHEN umur BETWEEN 26 and 30 THEN '26 - 30'
        	WHEN umur BETWEEN 31 and 39 THEN '31 - 39'
        	WHEN umur BETWEEN 40 and 45 THEN '40 - 45'
	        WHEN umur IS NULL THEN '(NULL)'
	    END as range_umur,
	    COUNT(*) AS jumlah

	FROM (select nik, nama, tanggal_lahir, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS umur from tb_pegawai)  as dummy_table
	GROUP BY range_umur
	ORDER BY range_umur;");
		return $Query->result_array();
	}

	public function GetChartPendidikan()
	{
		$Query = $this->db->query("SELECT p.id_pendidikan,p.nama_pendidikan,
		(SELECT COUNT(pp.pendidikan) FROM tb_pegawai pp WHERE pp.pendidikan = p.id_pendidikan) AS Jumlah
		FROM tb_pendidikan p");
		return $Query->result_array();
	}

	public function GetChartArea()
	{
		$Query = $this->db->query("SELECT a.nama_area , a.id_area,a.title,
			(SELECT COUNT(p.id_area) FROM tb_pegawai p WHERE p.id_area = a.id_area) AS Area
			FROM tb_area_kerja a");
		return $Query->result_array();
	}

	public function GetChartStatus()
	{
		$Query = $this->db->query("SELECT a.`status` , a.id_status,
			(SELECT COUNT(p.id_status) FROM tb_pegawai p WHERE p.id_status = a.id_status) AS Jumlah
			FROM tb_status_karyawan a");
		return $Query->result_array();
	}
}
