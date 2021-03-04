<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rekap_penjualan extends CI_Controller{
    //put your code here
     public function __construct()
    {
        parent::__construct();
        $this->load->model('model');
        $this->load->model('penjualan_model');
        $this->load->helper('form');
        $this->load->library('fpdf');
        $this->load->library('excel/Biffwriter');
        $this->load->library('excel/Format');
        $this->load->library('excel/OLEwriter');
        $this->load->library('excel/Parser');
        $this->load->library('excel/Workbook');
        $this->load->library('excel/Worksheet');
        $this->load->library('session');
        error_reporting(0);
        ob_start();
        ob_clean();
    }
    public  function Date2String($dTgl){
			//return 2012-11-22
			list($cDate,$cMount,$cYear)	= explode("-",$dTgl) ;
			if(strlen($cDate) == 2){
				$dTgl	= $cYear . "-" . $cMount . "-" . $cDate ;
			}
			return $dTgl ; 
		} 
    public  function String2Date($dTgl){
			//return 22-11-2012  
			list($cYear,$cMount,$cDate)	= explode("-",$dTgl) ;
			if(strlen($cYear) == 4){
				$dTgl	= $cDate . "-" . $cMount . "-" . $cYear ;
			} 
			return $dTgl ; 	
		}
    public static function String2DateTime($dTgl){
			$cReturn 		= "-" ; 
			if($dTgl !== "" && $dTgl !== "0000-00-00 00:00:00"){
				$cReturn	= date("d-m-Y H:i:s", strtotime($dTgl)) ; 
			}
			return $cReturn ;
	}

	

    public function penjualan_hari_ini() {
        $data['tgl']        = date("d-m-Y") ;
        $data['dbData']        = $this->penjualan_model->v_penjualan_per_hari_ini();  
        $this->load->view('admin/penjualan/rekap/penjualan-hari-ini',$data);
    }

    public function penjualan_tanggal($cIdOutlet,$dTglAwal,$dTglAkhir) {
        $Outlet = $this->model->ViewWhere('tb_outlet','id_outlet',$cIdOutlet);
        foreach ($Outlet as $key => $vaOutlet) {
            $cNamaOutlet = $vaOutlet['nama'];
            $cKodeOutlet = $vaOutlet['kode'];
        }

        $data['id_outlet'] = $cIdOutlet;
        $data['tgl_awal']  = $dTglAwal ;
        $data['tgl_akhir'] = $dTglAkhir ;
        $data['nama_outlet'] = $cNamaOutlet ;
        $data['kode_outlet'] = $cKodeOutlet ;
        $data['dbData']= $this->penjualan_model->v_penjualan_per_tanggal($cIdOutlet,$dTglAwal,$dTglAkhir);  
        $this->load->view('admin/penjualan/rekap/penjualan-pertanggal',$data);
    }
  
}    