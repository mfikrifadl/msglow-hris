<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji_act extends CI_Controller {

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

		function random_word($id = 7){
			$pool = '1234567890';
			
			$word = '';
			for ($i = 0; $i < $id; $i++){
				$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
			}
			return  $word.$this->session->userdata('id'); 
		}

		public function absensi($Type="",$id=""){
			if($Type == 'Insert' or $Type == 'Update'){
			$vaTanggal = explode("-", $this->input->post('dTgl'))	;
			$cIdOutlet = $this->input->post('cIdOutlet');
			$cIdPegawai= $this->input->post('cIdPegawai');
			//GetIdArea

			$dbArea = $this->model->ViewWhere('tb_outlet','id_outlet',$cIdOutlet);
			foreach ($dbArea as $key => $vaArea) {
				$cIdArea = $vaArea['id_area'];
			}

			if($Type == "Insert"){
			$cekIdDulu = $this->db->query("SELECT id_absen FROM tb_absensi 
					WHERE id_absen = '".$this->input->post('cIdAbsen')."' ");
				if($cekIdDulu->num_rows() > 0 ){
					$cIdAbsenFix = $this->random_word() ;
				}else{
					$cIdAbsenFix = $this->input->post('cIdAbsen') ; 
				}
			}elseif($Type == "Update"){
				$cIdAbsenFix = $this->input->post('cIdAbsen') ; 
			}

			$data = array (
				'id_absen'			=>  $cIdAbsenFix,
				'id_pegawai'		=>	$this->input->post('cIdPegawai'),
				'id_outlet'			=>	$this->input->post('cIdOutlet'),
				'id_spv'			=>  $this->input->post('cIdSpv'),
				'tanggal'			=>	$this->Date2String($this->input->post('dTgl')),
				'bulan'				=>  $vaTanggal[1],
				'bulan_text'		=>  $this->input->post('cBulan'),
				'tahun'				=>  $vaTanggal[2],
				'tanggal_libur'		=>  $this->input->post('hari_libur'),
				'keterangan'		=>  $this->input->post('cKeteranganIzin'),
				'jumlah_keterangan'	=>  $this->input->post('nJumlahIzin'),
				'prev_27'			=>  $this->input->post('cPrev27'),
				'prev_28'			=>  $this->input->post('cPrev28'),
				'prev_29'			=>  $this->input->post('cPrev29'),
				'prev_30'			=>  $this->input->post('cPrev30'),
				'prev_31'			=>  $this->input->post('cPrev31'),
				'next_1'			=>  $this->input->post('cNext1'),
				'next_2'			=>  $this->input->post('cNext2'),
				'next_3'			=>  $this->input->post('cNext3'),
				'next_4'			=>  $this->input->post('cNext4'),
				'next_5'			=>  $this->input->post('cNext5'),
				'next_6'			=>  $this->input->post('cNext6'),
				'next_7'			=>  $this->input->post('cNext7'),
				'next_8'			=>  $this->input->post('cNext8'),
				'next_9'			=>  $this->input->post('cNext9'),
				'next_10'			=>  $this->input->post('cNext10'),
				'next_11'			=>  $this->input->post('cNext11'),
				'next_12'			=>  $this->input->post('cNext12'),
				'next_13'			=>  $this->input->post('cNext13'),
				'next_14'			=>  $this->input->post('cNext14'),
				'next_15'			=>  $this->input->post('cNext15'),
				'next_16'			=>  $this->input->post('cNext16'),
				'next_17'			=>  $this->input->post('cNext17'),
				'next_18'			=>  $this->input->post('cNext18'),
				'next_19'			=>  $this->input->post('cNext19'),
				'next_20'			=>  $this->input->post('cNext20'),
				'next_21'			=>  $this->input->post('cNext21'),
				'next_22'			=>  $this->input->post('cNext22'),
				'next_23'			=>  $this->input->post('cNext23'),
				'next_24'			=>  $this->input->post('cNext24'),
				'next_25'			=>  $this->input->post('cNext25'),
				'next_26'			=>  $this->input->post('cNext26'),
				'next_32'			=>  $this->input->post('cNext32'),
				'next_33'			=>  $this->input->post('cNext33'),
				'next_34'			=>  $this->input->post('cNext34'),
				'next_35'			=>  $this->input->post('cNext35'),
				'next_36'			=>  $this->input->post('cNext36'),				
				);

			$vaUpdateArea = array('id_area' => $cIdArea,'outlet'=>$cIdOutlet);
			$vaUpdateAreaLog = array('id_pegawai'=>$cIdPegawai,'id_area' => $cIdArea,'outlet'=>$cIdOutlet);

			}
			$this->session->set_userdata('cHariLibur',$this->input->post('hari_libur'));
			if($Type == "Insert"){

			$cekDulu = $this->db->query("SELECT * FROM tb_absensi 
				WHERE id_pegawai = '".$this->input->post('cIdPegawai')."' AND bulan = '".$vaTanggal[1]."' and tahun = '".$vaTanggal[2]."' ");
				if($cekDulu->num_rows() > 0){
					redirect(site_url('gaji/absen/ada'));
				}else{
					$this->model->Insert('tb_absensi',$data); 
					$this->model->Update('tb_pegawai','id_pegawai',$cIdPegawai,$vaUpdateArea);

					 $seralizedArray = serialize($vaUpdateAreaLog);
			 		 $vaLog = array('tgl'=> $this->Date2String($this->DateStamp()),
			 				'waktu'=>$this->TimeStamp(),
			 				'nama_table'=>'tb_pegawai',
			 				'action'=> 'Update',
			 				'query'=> $seralizedArray,
			 				'nama'=> $this->session->userdata('nama')
			 				);
			 		$this->model->Insert("log",$vaLog);


					redirect(site_url('gaji/absen/edit/'.$cIdAbsenFix.''));
				}
			}elseif($Type == "Update"){
				$this->model->Update('tb_absensi','id_absen',$id,$data);
				$this->model->Update('tb_pegawai','id_pegawai',$cIdPegawai,$vaUpdateArea);

					 $seralizedArray = serialize($vaUpdateAreaLog);
			 		 $vaLog = array('tgl'=> $this->Date2String($this->DateStamp()),
			 				'waktu'=>$this->TimeStamp(),
			 				'nama_table'=>'tb_pegawai',
			 				'action'=> 'Update',
			 				'query'=> $seralizedArray,
			 				'nama'=> $this->session->userdata('nama')
			 				);
			 		$this->model->Insert("log",$vaLog);

				redirect(site_url('gaji/absen/edit/'.$cIdAbsenFix.''));
			}elseif($Type == "Delete"){
				$this->model->Delete('tb_absensi','id_absen',$id);
				$this->model->Delete('tb_gaji','id_absen',$id);
				$this->model->Delete('tb_cuti_gaji','id_absen',$id);
				$this->model->Delete('tb_pendapatan','id_absen',$id);
				redirect(site_url('gaji/absen/D'));
			}
		}



		public function insentif($Type="",$id=""){
			if($Type == 'Insert' or $Type == 'Update'){

				$vaTanggal = explode("-", $this->input->post('dTgl'))	;
				$cIdOutlet = $this->input->post('cIdOutlet');
				$cIdPegawai= $this->input->post('cIdPegawai');
				//GetIdArea

			
				if($Type == "Insert"){
				 $cekIdDulu = $this->db->query("SELECT id_insentif FROM tb_insentif WHERE id_insentif = '".$this->input->post('cIdInsentif')."' ");
				  if($cekIdDulu->num_rows() > 0 ){
					 $cIdAbsenFix = $this->input->post('cIdInsentif') + $this->session->userdata('id') ;
				    }else{
					 $cIdAbsenFix = $this->input->post('cIdInsentif') ; 
				    }
				  }elseif($Type == "Update"){
					$cIdAbsenFix = $this->input->post('cIdInsentif') ; 
				  }

				$data = array (
					'id_insentif'		=>	$this->input->post('cIdInsentif'),
					'id_pegawai'		=>	$this->input->post('cIdPegawai'),
					'id_outlet'			=>	$this->input->post('cIdOutlet'),
					'id_spv'			=>  $this->input->post('cIdSpv'),
					'tanggal'			=>	$this->Date2String($this->input->post('dTgl')),
					'bulan'				=>  $vaTanggal[1],
					'bulan_text'		=>  $this->input->post('cBulan'),
					'tahun'				=>  $vaTanggal[2],
					'tanggal_24'			=>  $this->input->post('dTgl24'),
					'tanggal_25'			=>  $this->input->post('dTgl25'),
					'tanggal_26'			=>  $this->input->post('dTgl26'),
					'tanggal_27'			=>  $this->input->post('dTgl27'),
					'tanggal_28'			=>  $this->input->post('dTgl28'),
					'tanggal_29'			=>  $this->input->post('dTgl29'),
					'tanggal_30'			=>  $this->input->post('dTgl30'),
					'tanggal_31'			=>  $this->input->post('dTgl31'),
					'total_insentif'		=>  $this->input->post('nTotalInsentif'),
					'insentif_lain_lain'	=>  $this->input->post('nInsentifLainLain')
							
					);

			}

			if($Type == "Insert"){

				$cekDulu = $this->db->query("SELECT * FROM tb_insentif 
				WHERE id_pegawai = '".$this->input->post('cIdPegawai')."' AND bulan = '".$vaTanggal[1]."' and tahun = '".$vaTanggal[2]."' ");
				if($cekDulu->num_rows() > 0){
					redirect(site_url('gaji/insentif/ada'));
				}else{
					$this->model->Insert('tb_insentif',$data); 
					redirect(site_url('gaji/insentif/edit/'.$cIdAbsenFix.''));
				}
			}elseif($Type == "Update"){
				$this->model->Update('tb_insentif','id_insentif',$id,$data);
				redirect(site_url('gaji/insentif/'));
			}elseif($Type == "Delete"){
				$this->model->Delete('tb_insentif','id_insentif',$id);
				redirect(site_url('gaji/insentif/D'));
			}
		}



		public function gaji(){

		$cIdPegawai 		= $_GET['id_pegawai'];

		$cIdSpv 		= $_GET['id_spv'];
		$cIdOutlet 		= $_GET['id_outlet'];
		$cIdArea 		= $_GET['id_area'];

		$nBulan 			= $_GET['bulan'];
		$nTahun 			= $_GET['tahun'];
		$nGajiPokok 	    = $_GET['gaji_pokok'];
		$nUangMakan 	    = $_GET['uang_makan'];
		$nBonusShift 	    = $_GET['bonus_shift'];
		$nInsentif_1 	= $_GET['insentif_1'];
		$cIdulFitri 	= $_GET['idul_fitri'];
		$cIdulAdha 		= $_GET['idul_adha'];
		$cNasiBox 		= $_GET['nasi_box'];
		$nTotal 		= $_GET['total'];	
		$nTotalMasuk	= $_GET['total_masuk'];		
			$data = array (
				'id_pegawai'		=>	$cIdPegawai,
				'id_spv'			=>  $cIdSpv,
				'id_outlet'			=>  $cIdOutlet,
				'id_area'			=>  $cIdArea,
				'bulan'				=>	$nBulan,
				'tahun'				=>  $nTahun,
				'gaji_pokok'		=>  $nGajiPokok,
				'uang_makan'					=>	$nUangMakan,
				'bonus_shift'					=>	$nBonusShift,
				'insentif_1'					=>	$nInsentif_1,
				'idul_fitri'					=>	$cIdulFitri,
				'idul_adha'					=>	$cIdulAdha,
				'nasi_box'					=>	$cNasiBox,
				'total'						=>	$nTotal,
				'total_masuk'				=>  $nTotalMasuk
				);

				$this->model->Insert('tb_gaji_2',$data);
			

		}

		public function gaji_edit(){
		$cIdAbsen 			= $_GET['id_absen'];
		$nBonusShiftSebelumnya 	= $_GET['bonus_shift_bulan_sebelumnya'];
		$cPendapatanPrev 		= $_GET['pendapatan_bulan_sebelumnya'];
		$cPendapatanNow 		= $_GET['pendapatan_bulan_sekarang'];
		$nInsentif_1 	= $_GET['insentif_1'];
		$nInsentif_2 	= $_GET['insentif_2'];
		$nInsentif_3 	= $_GET['insentif_3'];
		$nInsentif_4 	= $_GET['insentif_4'];
		$nInsentif_5 	= $_GET['insentif_5'];
		$nPinjaman 	= $_GET['pinjaman'];
		$cKetPinjam = $_GET['ket_pinjam'];
		$nDenda 	= $_GET['denda'];
		$nLainLain 	= $_GET['lain_lain'];
		$nTotal 	= $_GET['total'];			
			$data = array (
				'id_absen'						=>	$cIdAbsen,
				'bonus_shift_bulan_sebelumnya'	=>	$nBonusShiftSebelumnya,
				'pendapatan_bulan_sebelumnya'	=>  $cPendapatanPrev,
				'pendapatan_bulan_sekarang'		=>  $cPendapatanNow,
				'insentif_1'					=>	$nInsentif_1,
				'insentif_2'					=>	$nInsentif_2,
				'insentif_3'					=>	$nInsentif_3,
				'insentif_4'					=>	$nInsentif_4,
				'insentif_5'					=>	$nInsentif_5,
				'pinjaman'						=>	$nPinjaman,
				'keterangan_pinjaman'			=>  $cKetPinjam,
				'denda'							=>  $nDenda,
				'lain_lain'						=>	$nLainLain,			
				'total'							=>  $nTotal			
				);	
		$this->model->Update('tb_gaji','id_absen',$cIdAbsen); 			
		}		
		public function set_izin(){
			$cIdAbsen 			= $_GET['id_absen'];
			$Izin 				= $_GET['izin'];
			$Sakit 				= $_GET['sakit'];
			$c_Tahunan 			= $_GET['c_tahunan'];
			$c_Menikah 			= $_GET['c_menikah'];
			$c_Kemalangan 		= $_GET['c_kemalangan'];
			$c_Khitan 			= $_GET['c_khitan'];
			$c_Melahirkan 		= $_GET['c_melahirkan'];
			$c_Besar 			= $_GET['c_besar'];
			$c_Libur 			= $_GET['c_libur'];
			$nJumlahIzin		= $_GET['jumlah_izin'];

			$data = array(
						'id_absen'		=>	$cIdAbsen,
						'izin'			=>	$Izin,
						'sakit'			=>	$Sakit,
						'c_tahunan'		=>	$c_Tahunan,
						'c_menikah'		=>	$c_Menikah,
						'c_kemalangan'	=>	$c_Kemalangan,
						'c_khitan'		=>	$c_Khitan,
						'c_melahirkan'	=>	$c_Melahirkan,
						'c_besar'		=>	$c_Besar,
						'libur'			=>  $c_Libur,
						'total_izin'	=>  $nJumlahIzin
					);
			$nCekIzin = $this->model->GetCekIzin($cIdAbsen);
			if($nCekIzin->num_rows() > 0 ){
				$this->model->Update('tb_cuti_gaji','id_absen',$cIdAbsen,$data);
			}else{
				$this->model->Insert('tb_cuti_gaji',$data);
			}	
			
		}

	}
