<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rekap extends CI_Controller{
    //put your code here
     public function __construct()
    {
        parent::__construct();
        $this->load->model('model');
        $this->load->helper('form');
        $this->load->library('fpdf');
        $this->load->library('excel/Biffwriter');
        $this->load->library('excel/Format');
        $this->load->library('excel/OLEwriter');
        $this->load->library('excel/Parser');
        $this->load->library('excel/Workbook');
        $this->load->library('excel/Worksheet');
        $this->load->library('session');
        $this->load->database();
        //error_reporting(0);
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

	

    public function mengundurkan_diri() {
        $this->load->database();
        $data['view']   =   $this->model->ViewAsc('v_pengunduran_diri','tanggal');
        $this->load->view('admin/laporan/mengundurkan_diri',$data);
    }


    public function rekap_gaji($bulan,$tahun,$bayar) {
       $this->load->database();
        //$res['data']    = $this->laporan_model->ops_pelayanan($Bulan,$Tahun);
        $data['bulan']      =   $bulan ;
        $data['tahun']      =   $tahun ;  
        $data['bayar']      =   $bayar ;
        $this->load->view('admin/laporan/rekap_gaji',$data);
    }

    public function thr($bulan,$tahun,$bayar) {
       $this->load->database();
        //$res['data']    = $this->laporan_model->ops_pelayanan($Bulan,$Tahun);
        $data['bulan']      =   $bulan ;
        $data['tahun']      =   $tahun ;  
        $data['bayar']      =   $bayar ;
        $this->load->view('admin/laporan/thr',$data);
    }

     public function insentif($bulan,$tahun,$bayar) {
       $this->load->database();
        $dbBayar = $this->model->ViewWhere('tb_jenis_bayar','id_pembayaran',$bayar);
        foreach ($dbBayar as $key => $vaBayar) {
            $cNamaPembayaran = $vaBayar['jenis_pembayaran'];
        }

        //$res['data']    = $this->laporan_model->ops_pelayanan($Bulan,$Tahun);
        $data['bulan']      =   $bulan ;
        $data['tahun']      =   $tahun ;  
        $data['bayar']      =   $bayar ;
        $data['pembayaran'] =   $cNamaPembayaran;
        $this->load->view('admin/laporan/insentif',$data);
    }


    public function thr_spv($bulan,$tahun,$spv) {
       $this->load->database();
        //$res['data']    = $this->laporan_model->ops_pelayanan($Bulan,$Tahun);
        $data['bulan']      =   $bulan ;
        $data['tahun']      =   $tahun ;  
        $data['spv']        =   $spv ;
        $dbSpv              =   $this->model->ViewWhere('tb_spv','id_spv',$spv);
        foreach ($dbSpv as $key => $vaSpv) {
            $cNamaSpv   =   $vaSpv['nama'];
        }
        $data['nama_spv']   =   $cNamaSpv;
        $this->load->view('admin/laporan/thr_spv',$data);
    }

    public function thr_all($bulan,$tahun) {
       $this->load->database();
        //$res['data']    = $this->laporan_model->ops_pelayanan($Bulan,$Tahun);
        $data['bulan']      =   $bulan ;
        $data['tahun']      =   $tahun ;  
        $this->load->view('admin/laporan/thr_all',$data);
    }

    public function insentif_spv($bulan,$tahun,$spv) {
       $this->load->database();
         $dbSpv = $this->model->ViewWhere('tb_spv','id_spv',$spv);
        foreach ($dbSpv as $key => $vaSpv) {
            $cNamaSpv = $vaSpv['nama'];
        }

        //$res['data']    = $this->laporan_model->ops_pelayanan($Bulan,$Tahun);
        $data['bulan']      =   $bulan ;
        $data['tahun']      =   $tahun ;  
        $data['spv']        =   $spv ;
        $data['supervisor'] =   $cNamaSpv;
        $this->load->view('admin/laporan/insentif_spv',$data);
    }

    public function rekap_gaji_semua($bulan,$tahun) {
        $this->load->database();
        //$res['data']    = $this->laporan_model->ops_pelayanan($Bulan,$Tahun);
        $data['bulan']      =   $bulan ;
        $data['tahun']      =   $tahun ;  
        $this->load->view('admin/laporan/rekap_gaji_semua',$data);
    }

    public function rekap_insentif_semua($bulan,$tahun) {
        $this->load->database();
        //$res['data']    = $this->laporan_model->ops_pelayanan($Bulan,$Tahun);
        $data['bulan']      =   $bulan ;
        $data['tahun']      =   $tahun ;  
        $this->load->view('admin/laporan/rekap_insentif_semua',$data);
    }

    public function payroll($bulan,$tahun,$bayar) {
       $this->load->database();
        //$res['data']    = $this->laporan_model->ops_pelayanan($Bulan,$Tahun);
        $data['bulan']      =   $bulan ;
        $data['tahun']      =   $tahun ;  
        $data['bayar']      =   $bayar ;

        if($bayar == 0){
            $this->load->view('admin/laporan/payroll_mandiri',$data);
        }elseif($bayar == 2){
             $this->load->view('admin/laporan/payroll_bsm',$data);
        }elseif($bayar == 3){
             $this->load->view('admin/laporan/payroll_bnis',$data);
        }elseif($bayar == 6){
             $this->load->view('admin/laporan/payroll_bnis',$data);
        }elseif($bayar == 7){
             $this->load->view('admin/laporan/payroll_gnc',$data);
        }

    }


    public function mcm($bulan,$tahun) {
       $this->load->database();
        //$res['data']    = $this->laporan_model->ops_pelayanan($Bulan,$Tahun);
        $data['bulan']      =   $bulan ;
        $data['tahun']      =   $tahun ;  
         $this->load->view('admin/laporan/mcm',$data);


    }

    public function mcm_by_pembayaran($bulan,$tahun,$bayar) {
       $this->load->database();
        //$res['data']    = $this->laporan_model->ops_pelayanan($Bulan,$Tahun);
        $data['bulan']      =   $bulan ;
        $data['tahun']      =   $tahun ;  
        $data['bayar']      =   $bayar;
         $this->load->view('admin/laporan/mcm_by_pembayaran',$data);


    }


    public function rekap_gaji_per_spv($bulan,$tahun,$spv) {
       $this->load->database();
        //$res['data']    = $this->laporan_model->ops_pelayanan($Bulan,$Tahun);
        $data['bulan']      =   $bulan ;
        $data['tahun']      =   $tahun ;  
        $data['id_spv']     =   $spv ;
        $dbSpv = $this->model->ViewWhere('tb_spv','id_spv',$spv);
        foreach ($dbSpv as $key => $vaSpv) {
            $cNama = $vaSpv['nama'];
        }
        $data['nama_spv']   =   $cNama;
        $this->load->view('admin/laporan/rekap_gaji_per_spv',$data);
    }


     public function rekap_gaji_per_area($bulan,$tahun,$area) {
       $this->load->database();
        //$res['data']    = $this->laporan_model->ops_pelayanan($Bulan,$Tahun);
        $data['bulan']      =   $bulan ;
        $data['tahun']      =   $tahun ;  
        $data['id_area']     =   $area ;
        $dbArea = $this->model->ViewWhere('tb_area_kerja','id_area',$area);
        foreach ($dbArea as $key => $vaArea) {
            $cNama = $vaArea['nama_area'];
        }
        $data['nama_area']   =   $cNama;
        $this->load->view('admin/laporan/rekap_gaji_per_area',$data);
    }

    public function kasbon_pinjaman($bulan,$tahun) {
       $this->load->database();
        //$res['data']    = $this->laporan_model->ops_pelayanan($Bulan,$Tahun);
        $data['bulan']      =   $bulan ;
        $data['tahun']      =   $tahun ;  
        $this->load->view('admin/laporan/kasbon',$data);
    }

    public function kasbon_denda($bulan,$tahun) {
       $this->load->database();
        //$res['data']    = $this->laporan_model->ops_pelayanan($Bulan,$Tahun);
        $data['bulan']      =   $bulan ;
        $data['tahun']      =   $tahun ;  
        $this->load->view('admin/laporan/kasbon_denda',$data);
    }


     public function anggaran() {
       $this->load->database();
        $this->load->view('admin/laporan/anggaran');
    }
    

    public function rekap_surat_mutasi($dTglAwal="",$dTglAkhir="",$cIdAreAwal="",$cIdAreaAkhir="") {
        $this->load->database();
        //$res['data']    = $this->laporan_model->ops_pelayanan($Bulan,$Tahun);
        $data['tgl_awal_query']       =   $this->Date2String($dTglAwal) ;
        $data['tgl_akhir_query']      =   $this->Date2String($dTglAkhir) ; 

        $data['tgl_awal']             =   ($dTglAwal) ;
        $data['tgl_akhir']            =   ($dTglAkhir) ; 

        $dbAreaAwal = $this->model->ViewWhere('tb_area_kerja','id_area',$cIdAreAwal);
        foreach ($dbAreaAwal as $key => $vaAreaAwal) {
            $cNamaAreaAwal  =   $vaAreaAwal['nama_area'];
        }

        $dbAreaAkhir = $this->model->ViewWhere('tb_area_kerja','id_area',$cIdAreaAkhir);
        foreach ($dbAreaAkhir as $key => $vaAreaAkhir) {
            $cNamaAreaAkhir  =   $vaAreaAkhir['nama_area'];
        }

        $data['id_area_awal']   =   $cIdAreAwal;
        $data['id_area_akhir']  =   $cIdAreaAkhir; 

        $data['nama_area_awal']  = $cNamaAreaAwal ;
        $data['nama_area_akhir'] = $cNamaAreaAkhir ;
        $this->load->view('admin/laporan/mutasi_pegawai',$data);
    }

    public function rekap_surat_mutasi_all($dTglAwal="",$dTglAkhir="") {
        $this->load->database();
        //$res['data']    = $this->laporan_model->ops_pelayanan($Bulan,$Tahun);
        $data['tgl_awal_query']       =   $this->Date2String($dTglAwal) ;
        $data['tgl_akhir_query']      =   $this->Date2String($dTglAkhir) ; 

        $data['tgl_awal']             =   ($dTglAwal) ;
        $data['tgl_akhir']            =   ($dTglAkhir) ; 
        $this->load->view('admin/laporan/mutasi_pegawai_all',$data);
    }

    function tessss(){
    	echo "asdsd";
    }
}    