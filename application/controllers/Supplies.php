<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplies extends CI_Controller {

	public function __construct(){
		
        parent::__construct();
		      
	    //MenLoad model yang berada di Folder Model dan namany model
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
		
		function setKode($cTable,$cKd,$cInisialKode='',$nLen=6,$cIdOutlet=''){

		$dbData				= $this->db->query('select max(right('.$cKd.','.$nLen.')) as kode from '.$cTable) ;
		$dbDataOutlet		= $this->db->query("SELECT * FROM tb_outlet WHERE id_outlet = '".$cIdOutlet."' ") ;

		foreach ($dbData->result_array() as $key => $vaData) {
			$dbRow	= $vaData['kode'];
		}
		$nKode		= (int) $dbRow ;
		$cKode		= (int) $nKode + 1 ;
		
		if($cInisialKode == ''){
			$cCode		= str_pad($cKode,$nLen,'0',STR_PAD_LEFT) ;	
		}else{
			$cCode		= $cInisialKode . str_pad($cKode,$nLen,'0',STR_PAD_LEFT) ;	
		}
		return $cCode ;
	}
		
		public function data($Aksi="",$Id=""){
			$dataHeader['menu'] = 'Supplies GIU' ;
			$dataHeader['file'] = 'Master Data Supplies';
			$dataHeader['action'] = $Aksi ;
			$data['tanggal']	= $this->DateStamp();
			$data['jam']		= $this->TimeStamp();
			$data['row']		= $this->model->ViewAsc('supplies','nama_supplies');
			if($Aksi == 'edit'){
				$data['field'] = $this->model->ViewWhere('supplies','id_supplies',$Id);
			}
			$this->load->view('admin/container/header',$dataHeader);
			$this->load->view('admin/supplies/data',$data);
			$this->load->view('admin/container/footer');
		}

		public function stock_supplies($Aksi="",$Id=""){
			$dataHeader['menu'] = 'Supplies GIU' ;
			$dataHeader['file'] = 'Master Data Stock Supplies';
			$dataHeader['action'] = $Aksi ;
			$data['tanggal']	= $this->DateStamp();
			$data['jam']		= $this->TimeStamp();
			$data['row']		= $this->model->ViewAsc('v_stock_supplies','nama_supplies');
			if($Aksi == 'edit'){
				$data['field'] = $this->model->ViewWhere('stock_supplies','id_stock_supplies',$Id);
			}
			$this->load->view('admin/container/header',$dataHeader);
			$this->load->view('admin/supplies/stock_supplies',$data);
			$this->load->view('admin/container/footer');
		}

		public function po($Aksi="",$Id=""){
			$dataHeader['menu'] = 'Supplies GIU' ;
			$dataHeader['file'] = 'PO Supplies';
			$dataHeader['action'] = $Aksi ;
			$data['tanggal']	= $this->DateStamp();
			$data['jam']		= $this->TimeStamp();
			$data['kode_po']   	=  $this->setKode('po_supplies','kode_po','PO','5');
			$data['row']		= $this->model->View('v_po_supplies','tgl_po');
			if($Aksi == 'edit'){
				$data['field'] = $this->model->ViewWhere('po_supplies','id_po',$Id);
			}
			$this->load->view('admin/container/header',$dataHeader);
			$this->load->view('admin/supplies/po',$data);
			$this->load->view('admin/container/footer');
		}

		public function pemasukan_supplies($Aksi="",$Id=""){
			$dataHeader['menu'] = 'Supplies GIU' ;
			$dataHeader['file'] = 'Pemasukan Supplies';
			$dataHeader['action'] = $Aksi ;
			$data['tanggal']	= $this->DateStamp();
			$data['jam']		= $this->TimeStamp();
			$data['kode_po']    = $Id;
			$data['id_outlet'] =  "" ;
			$data['kode_pemasukan']   	=  $this->setKode('pemasukan_supplies','kode_pemasukan','PM','5');
			$data['row']		= $this->model->View('v_pemasukan_supplies','tgl_pemasukan');
			if($Aksi == 'edit'){
				$data['field'] = $this->model->ViewWhere('pemasukan_supplies','id_pemasukan',$Id);
				$data['kode_po'] = $Id;
			}else if($Aksi == 'po'){
				$dbId = $this->model->ViewWhere('v_po_supplies','kode_po',$Id);
				foreach ($dbId as $key => $vaId) {
					$cIdOutlet = $vaId['id_outlet'];
				}
				$data['id_outlet'] = $cIdOutlet ;
				$data['kode_po'] = $Id;
			}
			$this->load->view('admin/container/header',$dataHeader);
			$this->load->view('admin/supplies/pemasukan_supplies',$data);
			$this->load->view('admin/container/footer');
		}

		public function pengeluaran_supplies($Aksi="",$Id=""){
			$dataHeader['menu'] = 'Supplies GIU' ;
			$dataHeader['file'] = 'Pengeluaran Supplies';
			$dataHeader['action'] = $Aksi ;
			$data['tanggal']	= $this->DateStamp();
			$data['jam']		= $this->TimeStamp();
			$data['kode_pengeluaran']   	=  $this->setKode('pengeluaran_supplies','kode_pengeluaran','PN','5');
			$data['row']		= $this->model->View('v_pemasukan_supplies','tgl_pemasukan');
			if($Aksi == 'edit'){
				$data['field'] = $this->model->ViewWhere('pengeluaran_supplies','id_pengeluaran',$Id);
			}
			$this->load->view('admin/container/header',$dataHeader);
			$this->load->view('admin/supplies/pengeluaran_supplies',$data);
			$this->load->view('admin/container/footer');
		}

		public function permintaan_supplies($Aksi="",$Id=""){
			$dataHeader['menu'] = 'Supplies GIU' ;
			$dataHeader['file'] = 'Permintaan Supplies';
			$dataHeader['action'] = $Aksi ;
			$data['tanggal']	= $this->DateStamp();
			$data['jam']		= $this->TimeStamp();
		
			$this->load->view('admin/container/header',$dataHeader);
			$this->load->view('admin/supplies/permintaan_supplies',$data);
			$this->load->view('admin/container/footer');
		}

		public function permintaan_supplies_get($tgl,$id_outlet,$id_pegawai){
			$dataHeader['menu'] = 'Supplies GIU' ;
			$dataHeader['file'] = 'Permintaan Supplies';
			$dataHeader['action'] = "" ;
			$data['tanggal']	= $this->DateStamp();
			$data['jam']		= $this->TimeStamp();
			$data['tanggal_permintaan']	= $tgl;
			$data['id_outlet']	= $id_outlet;
			$data['id_pegawai']	= $id_pegawai;
			$data['kode_pengeluaran']   	=  $this->setKode('pengeluaran_supplies','kode_pengeluaran','PN','5');
			$this->load->view('admin/container/header',$dataHeader);
			$this->load->view('admin/supplies/permintaan_supplies_get',$data);
			$this->load->view('admin/container/footer');
		}

		
		
}
