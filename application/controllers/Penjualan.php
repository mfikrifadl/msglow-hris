<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	public function __construct(){
		
        parent::__construct();
		 error_reporting(E_ALL);
		 error_reporting(0);     
	    //MenLoad model yang berada di Folder Model dan namany model
	    $this->db->reconnect();
        $this->load->model('model');
        $this->load->model('relasi');
        // Meload Library session 
        $this->load->library('session');
        //Meload database
        $this->load->database();
        //Meload url 
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('download'); 
		 
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
		
		public function TimeStamp() {
			date_default_timezone_set("Asia/Jakarta");
			$Data = date("H:i:s");
			return $Data ;
			}
			
		public function DateStamp() {
   			date_default_timezone_set("Asia/Jakarta");
			$Data = date("d-m-Y");
			return $Data ;
			}  
			
		public function DateTimeStamp() {
   			date_default_timezone_set("Asia/Jakarta");
			$Data = date("Y-m-d h:i:s");
			return $Data ;
		} 

	
	public function laporan_penjualan_all($Aksi="",$Id=""){
			$dataHeader['title']		= "Laporan Penjualan | Monitoring Aplikasi Android (LEGA)";
			$dataHeader['menu']   		= 'Laporan';
			$dataHeader['file']   		= 'Transaksi' ;
			$dataHeader['link']			= 'transaksi';
			$data['action'] 			= $Aksi ; 
			$data['outlet']				= $this->model->ViewAsc('tb_outlet','nama');
			$data['tanggal'] 			= $this->DateStamp();


			$this->load->view('admin/container/header',$dataHeader);
			$this->load->view('admin/penjualan/laporan_penjualan_all',$data);
			$this->load->view('admin/container/footer');
		}

		public function laporan_penjualan_area($Aksi="",$Id=""){
			$dataHeader['title']		= "Laporan Penjualan | Monitoring Aplikasi Android (LEGA)";
			$dataHeader['menu']   		= 'Laporan';
			$dataHeader['file']   		= 'Laporan Penjualan Per Outlet' ;
			$dataHeader['link']			= 'lp_penjualan_outlet';
			$data['action'] 			= $Aksi ; 
			$data['outlet']				= $this->model->ViewAsc('tb_area_kerja','nama_area');
			$data['tanggal'] 			= $this->DateStamp();
			$this->load->view('admin/container/header',$dataHeader);
			$this->load->view('admin/penjualan/laporan_penjualan_area',$data);
			$this->load->view('admin/container/footer');
		}

		public function laporan_penjualan_supervisor($Aksi="",$Id=""){
			$dataHeader['title']		= "Laporan Penjualan | Monitoring Aplikasi Android (LEGA)";
			$dataHeader['menu']   		= 'Laporan';
			$dataHeader['file']   		= 'Laporan Penjualan Per Supervisor' ;
			$dataHeader['link']			= 'lp_penjualan_spv';
			$data['action'] 			= $Aksi ; 
			$data['outlet']				= $this->model->ViewAsc('tb_spv','nama');
			$data['tanggal'] 			= $this->DateStamp();
			$this->load->view('admin/container/header',$dataHeader);
			$this->load->view('admin/penjualan/laporan_penjualan_supervisor',$data);
			$this->load->view('admin/container/footer');
		}

		


}
