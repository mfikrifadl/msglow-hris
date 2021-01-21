<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplies_act extends CI_Controller {

	public function __construct(){
		
        parent::__construct();
		      
	    //MenLoad model yang berada di Folder Model dan namany model
        $this->load->model('model');
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
		
		
		

		public function add_supplies($Type="",$id=""){
			$data = array (
				'tgl' => $this->Date2String($this->input->post('tanggal')),
				'id_outlet'	=> $this->Date2String($this->input->post('id_outlet')),
				'id_supplies'	=> $this->input->post('id_supplies'),	
				'jumlah'	=> $this->input->post('jumlah'),	
				'status'	=> $this->input->post('status')
				);
			$this->model->Insert('stock_supplies',$data);
			
		}

		public function data($Type="",$id=""){
			$data = array (
				'nama_supplies' => $this->input->post('cNamaSupplies'),
				'harga_beli'	=> $this->input->post('nHargaBeli'),	
				'harga_jual'	=> $this->input->post('nHargaJual'),	
				'satuan'		=> 'PCS'
				);
		
			if($Type == "Insert"){
				$this->model->Insert('supplies',$data); 
				redirect(site_url('supplies/data/I'));
			}elseif($Type == "Update"){
				$this->model->Update('supplies','id_supplies',$id,$data);
				redirect(site_url('supplies/data/U'));
			}elseif($Type == "Delete"){
				$this->model->Delete('supplies','id_supplies',$id);
				redirect(site_url('supplies/data/D'));
			}
		}

		public function stock_supplies($Type="",$id=""){
			$data = array (
				'tgl' 			=> $this->input->post('dTgl'),
				'harga_beli'	=> $this->input->post('nHargaBeli'),	
				'harga_jual'	=> $this->input->post('nHargaJual'),	
				'jumlah'		=> $this->input->post('nJumlah'),
				'status'		=> $this->input->post('cStatus')	
				);
		
			if($Type == "Insert"){
				$this->model->Insert('stock_supplies',$data); 
				redirect(site_url('supplies/stock_supplies/I'));
			}elseif($Type == "Update"){
				$this->model->Update('stock_supplies','id_supplies',$id,$data);
				redirect(site_url('supplies/stock_supplies/U'));
			}elseif($Type == "Delete"){
				$this->model->Delete('stock_supplies','id_supplies',$id);
				redirect(site_url('supplies/stock_supplies/D'));
			}
		}

		public function po($Type="",$id=""){
			$data = array (
				'kode_po' 		=> $this->input->post('cKodePo'),
				'tgl_po'		=> $this->Date2String($this->input->post('dTglPo')),	
				'id_outlet'		=> $this->input->post('cIdOutlet'),	
				'id_stock'		=> $this->input->post('cIdStock'),
				'jumlah'		=> $this->input->post('nJumlah'),
				'harga'			=> $this->input->post('nHarga'),
				'diskon'		=> '0',
				'total'			=> $this->input->post('nTotal'),
				'keterangan'	=> "-",
				'status'		=> "false",						
				);
		
			if($Type == "Insert"){
				$this->session->set_userdata('tgl_po',$this->input->post('dTglPo'));
				$this->session->set_userdata('id_outlet_supplies',$this->input->post('cIdOutlet'));
				$this->model->Insert('po_supplies_tmp',$data); 
				redirect(site_url('supplies/po/I'));
			}elseif($Type == "Update"){
				$this->model->Update('po_supplies','id_po',$id,$data);
				redirect(site_url('supplies/po/U'));
			}elseif($Type == "Delete"){
				$this->model->Delete('po_supplies','id_po',$id);
				redirect(site_url('supplies/po/D'));
			}
		}

		public function pengeluaran($Type="",$id=""){
			$data = array (
				'kode_pengeluaran' 		=> $this->input->post('cKodePengeluaran'),
				'tgl_pengeluaran'		=> $this->Date2String($this->input->post('dTglPengeluaran')),	
				'id_spv'		=> $this->input->post('cIdSpv'),	
				'id_outlet'		=> $this->input->post('cIdOutlet'),	
				'id_stock_supplies'		=> $this->input->post('cIdStock'),
				'jumlah_awal'		=> $this->input->post('nJumlahAwal'),
				'jumlah_pengeluaran'			=> $this->input->post('nJumlahPengeluaran'),
				'keterangan'	=> "-"				
				);
		
			if($Type == "Insert"){
				$this->session->set_userdata('tgl_pengeluaran',$this->input->post('dTglPengeluaran'));
				$this->session->set_userdata('id_outlet_pengeluaran',$this->input->post('cIdOutlet'));
				$this->session->set_userdata('id_spv_pengeluaran',$this->input->post('cIdSpv'));
				$this->model->Insert('pengeluaran_supplies_temp',$data); 
				redirect(site_url('supplies/pengeluaran_supplies/I'));
			}elseif($Type == "Update"){
				$this->model->Update('pengeluaran_supplies','id_pengeluaran',$id,$data);
				redirect(site_url('supplies/pengeluaran/U'));
			}elseif($Type == "Delete"){
				$this->model->Delete('pengeluaran_supplies','id_pengeluaran',$id);
				redirect(site_url('supplies/pengeluaran/D'));
			}
		}

		function get_harga_supplies($cIdStock){
			$db = $this->model->ViewWhere('v_stock_supplies','id_stock_supplies',$cIdStock);
			foreach ($db as $key => $vaSupplies) {
				echo $vaSupplies['harga_beli'];
			}
		}

		function get_jumlah_supplies($cIdStock){
			$db = $this->model->ViewWhere('v_stock_supplies','id_stock_supplies',$cIdStock);
			foreach ($db as $key => $vaSupplies) {
				echo $vaSupplies['jumlah'];
			}
		}

		function po_temp_delete($cIdPo){
			$this->model->Delete('po_supplies_tmp','id_po',$cIdPo);
			redirect(site_url('supplies/po/D'));
		}

		function selesai_po($cKodePo){
			$dbTemp = $this->model->ViewWhere('po_supplies_tmp','kode_po',$cKodePo);

			foreach ($dbTemp as $key => $vaTemp) {
				$data = array (
				'kode_po' 		=> $cKodePo,
				'tgl_po'		=> $this->Date2String($vaTemp['tgl_po']),	
				'id_outlet'		=> $vaTemp['id_outlet'],	
				'id_stock'		=> $vaTemp['id_stock'],
				'jumlah'		=> $vaTemp['jumlah'],
				'harga'			=> $vaTemp['harga'],
				'diskon'		=> '0',
				'total'			=> $vaTemp['total'],
				'keterangan'	=> "-",
				'status'		=> "false",						
				);
				$this->model->Insert('po_supplies',$data);
			}
			$this->model->Delete('po_supplies_tmp','kode_po',$cKodePo);
			$this->session->unset_userdata('tgl_po');
			$this->session->unset_userdata('id_outlet_supplies');
			redirect(site_url('supplies/po/I'));
		}
		
		function pemasukan_barang_simpan(){
			$cIdStock 		= $_POST['cIdSupplies'];
			$nJumlahAwal	= $_POST['nJumlahPo'];
			$nJumlahMasuk   = $_POST['nJumlahMasuk'];
			$cKeterangan	= $_POST['cKeterangan'];

			$data = array();
			$index = 0; // Set index array awal dengan 0
		    
		    foreach($cIdStock as $datapemasukan){ // Kita buat perulangan berdasarkan nis sampai data terakhir
		      array_push($data, array(
		        'kode_po' => $this->input->post('cKodePo'),
		        'kode_pemasukan' => $this->input->post('cKodePemasukan'),
		        'tgl_pemasukan'  => $this->Date2String($this->input->post('dTglPemasukan')),
		        'id_outlet'		 => $this->input->post('cIdOutlet'),
		        'id_stock'=>$datapemasukan,
		        'jumlah_awal'=>$nJumlahAwal[$index],  // Ambil dan set data nama sesuai index array dari $index
		        'jumlah_pemasukan'=>$nJumlahMasuk[$index],  // Ambil dan set data telepon sesuai index array dari $index
		        'keterangan'=>$cKeterangan[$index],  // Ambil dan set data alamat sesuai index array dari $index
		      ));

		      $dbStock = $this->model->ViewWhere('v_stock_supplies','id_stock_supplies',$datapemasukan);
		      foreach ($dbStock as $key => $vaStockSebelumnya) {
		      	$nJumlahStockSebelumnya = $vaStockSebelumnya['jumlah'];
		      }
		      $nTambahkanStock = $nJumlahStockSebelumnya + $nJumlahMasuk[$index] ;

		      $dataUpdatesotck = array('jumlah'=>$nTambahkanStock);
		      $this->model->Update('stock_supplies','id_stock_supplies',$datapemasukan,$dataUpdatesotck);
		      
		      $index++;



		    }
		    
		    $dataUpdate = array('status'=>'true');

		    $this->model->Update('po_supplies','kode_po',$this->input->post('cKodePo'),$dataUpdate);

		    $this->db->insert_batch('pemasukan_supplies', $data);

		    redirect(site_url('supplies/pemasukan_supplies/I'));
		}

		function selesai_pengeluaran($cKodePengeluaran){
			$dbTemp = $this->model->ViewWhere('pengeluaran_supplies_temp','kode_pengeluaran',$cKodePengeluaran);

			foreach ($dbTemp as $key => $vaTemp) {
				$data = array (
				'kode_pengeluaran' 		=> $cKodePengeluaran,
				'tgl_pengeluaran'		=> $this->Date2String($vaTemp['tgl_pengeluaran']),	
				'id_spv'		=> $vaTemp['id_spv'],
				'id_outlet'		=> $vaTemp['id_outlet'],	
				'id_stock_supplies'		=> $vaTemp['id_stock_supplies'],
				'jumlah_awal'		=> $vaTemp['jumlah_awal'],
				'jumlah_pengeluaran'			=> $vaTemp['jumlah_pengeluaran'],
				'keterangan'		=> $vaTemp['keterangan']					
				);
				$this->model->Insert('pengeluaran_supplies',$data);
				$dbStock = $this->model->ViewWhere('v_stock_supplies','id_stock_supplies',$vaTemp['id_stock_supplies']);
		      foreach ($dbStock as $key => $vaStockSebelumnya) {
		      	$nJumlahStockSebelumnya = $vaStockSebelumnya['jumlah'];
		      }
		      $nTambahkanStock = $nJumlahStockSebelumnya - $vaTemp['jumlah_pengeluaran'] ;

		      $dataUpdatesotck = array('jumlah'=>$nTambahkanStock);
		       $this->model->Update('stock_supplies','id_stock_supplies',$vaTemp['id_stock_supplies'],$dataUpdatesotck);
			}
			$this->model->Delete('pengeluaran_supplies_temp','kode_pengeluaran',$cKodePengeluaran);
			$this->session->unset_userdata('tgl_pengeluaran');
			$this->session->unset_userdata('id_outlet_pengeluaran');
			$this->session->unset_userdata('id_spv_pengeluaran');
			redirect(site_url('supplies/pengeluaran_supplies/I'));
		}

		function pengeluaran_by_request($cid){

				$dTglMinta	=	$this->input->post('dTglPengeluaran'.$cid.'');
				$cIdPegawai	=   $this->input->post('cIdPegawai'.$cid.'');
				$cIdOutlet	=   $this->input->post('cIdOutlet'.$cid.'');

				$data = array (
				'kode_pengeluaran' 		=> $this->input->post('cKodePengeluaran'.$cid.''),
				'tgl_pengeluaran'		=> date("Y-m-d"),
				'id_spv'				=> '1',
				'id_outlet'				=> $this->input->post('cIdOutlet'.$cid.''),	
				'id_stock_supplies'		=> $this->input->post('cIdSupplies'.$cid.''),	
				'jumlah_awal'			=> $this->input->post('nJumlahAwal'.$cid.''),	
				'jumlah_pengeluaran'	=> $this->input->post('cJumlahPengeluaran'.$cid.''),
				'keterangan'			=> '-'				
				);
				$this->model->Insert('pengeluaran_supplies',$data);
				
				$dbStock = $this->db->query("SELECT * FROM v_stock_supplies WHERE id_outlet = '".$this->input->post('cIdOutlet'.$cid.'')."' and id_supplies = '".$this->input->post('cIdSupplies'.$cid.'')."' ");

		      foreach ($dbStock->result_array() as $key => $vaStockSebelumnya) {
		      $nJumlahStockSebelumnya = $vaStockSebelumnya['jumlah'];
		      $cIdStockSupplies		  = $vaStockSebelumnya['id_stock_supplies'];
		     
		      $nTambahkanStock = $nJumlahStockSebelumnya - $this->input->post('cJumlahPengeluaran'.$cid.'') ;

		      $dataUpdatesotck = array('jumlah'=>$nTambahkanStock);
		       $this->model->Update('stock_supplies','id_stock_supplies',$cIdStockSupplies,$dataUpdatesotck);
			}
			redirect(site_url('supplies/permintaan_supplies_get/'.$dTglMinta.'/'.$cIdOutlet.'/'.$cIdPegawai.''));
		}

		function tes(){
			echo "dassa";
		}
		
}