<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	// Syarat  :  
	
	// 1 . Select  = View 
	// 2 . Insert  = Ins
	// 3 . Update  = Updt
	// 4 . Delete  = Del

class Penjualan_model extends CI_Model {

    public function v_penjualan_per_hari_ini() {
		$this->db->reconnect();
		$Query = $this->db->query("SELECT * FROM v_penjualan WHERE tgl = '".date('Y-m-d')."' ORDER BY id_penjualan DESC ");
		return $Query->result_array();	
	}

	public function v_penjualan_per_tanggal($cIdOutlet,$dTglAwal,$dTglAkhir) {
		$this->db->reconnect();
		$Query = $this->db->query("SELECT * FROM v_penjualan WHERE id_outlet = '".$cIdOutlet."' and 
		tgl >= '".$dTglAwal."' and tgl <= '".$dTglAkhir."' ORDER BY id_penjualan DESC ");
		return $Query->result_array();	
	}

	public function v_penjualan_semua_outlet($dTglAwal,$dTglAkhir){
		$this->db->reconnect();
		$Query = $this->db->query("SELECT o.kode , o.nama ,o.id_outlet,
			 (SELECT SUM(p.pendapatan) FROM v_penjualan p WHERE p.id_outlet = o.id_outlet 
			  and tgl >= '".$dTglAwal."' and tgl <= '".$dTglAkhir."' ) AS Penjualan
			  FROM tb_outlet o ORDER BY o.id_outlet ASC ");
		return $Query->result_array();
	}


	public function v_setoran_per_hari_ini() {
		$this->db->reconnect();
		$Query = $this->db->query("SELECT * FROM v_setoran WHERE tgl = '".date('Y-m-d')."' ORDER BY id_setor DESC ");
		return $Query->result_array();	
	}

	public function v_setoran_per_tanggal($cIdOutlet,$dTglAwal,$dTglAkhir) {
		$this->db->reconnect();
		$Query = $this->db->query("SELECT * FROM v_setoran WHERE id_outlet = '".$cIdOutlet."' and 
		tgl >= '".$dTglAwal."' and tgl <= '".$dTglAkhir."' ORDER BY id_setor DESC ");
		return $Query->result_array();	
	}

	public function v_setoran_semua_outlet($dTglAwal,$dTglAkhir){
		$this->db->reconnect();
		$Query = $this->db->query("SELECT o.kode , o.nama ,o.id_outlet,
			 (SELECT SUM(p.setoran) FROM v_setoran p WHERE p.id_outlet = o.id_outlet 
			  and tgl >= '".$dTglAwal."' and tgl <= '".$dTglAkhir."' ) AS Setoran
			  FROM tb_outlet o ORDER BY o.id_outlet ASC ");
		return $Query->result_array();
	}


	public function Inbox($cWhere="") {
		$this->db->reconnect();
		$Query = $this->db->query("SELECT * FROM inbox WHERE ".$cWhere."  ");
		return $Query;	
	}

	public function Outbox($cWhere="") {
		$this->db->reconnect();
		$Query = $this->db->query("SELECT * FROM outbox WHERE ".$cWhere."  ");
		return $Query;	
	}

}