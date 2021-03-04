<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
		
        parent::__construct();
		$this->load->model('model');
        $this->load->model('relasi');
        $this->load->model('report');      
	    //MenLoad model yang berada di Folder Model dan namany model
        $this->load->helper('form');
        $this->load->library('cezpdf');
        $this->load->library('fpdf');
        $this->load->library('excel/Biffwriter');
        $this->load->library('excel/Format');
        $this->load->library('excel/OLEwriter');
        $this->load->library('excel/Parser');
        $this->load->library('excel/Workbook');
        $this->load->library('excel/Worksheet');
        $this->load->library('session');
        //error_reporting(0);
        //ob_start();
        //ob_clean();
		 
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

		function tes(){
            echo "aksjdas";
        }

	public function slip_gaji($id_gaji) {
   
    $this->load->library('cezpdf');
    $this->cezpdf->selectFont('./fonts/Helvetica.afm');
    $vaOpt["nOpt_MTop"]     = 10 ;
    $vaOpt["nOpt_MLeft"]    = 13 ;
    $vaOpt["nOpt_MBottom"]  = 10 ;
    $vaOpt["nOpt_MRight"]   = 7  ;
    $cFormat                        = "A5" ; //format kertas lihat
    $cOri                           = "P" ; //orientasi Landscape / Portrait
    $nFont                          = 10 ;  
    $this->cezpdf->Cezpdf($cFormat,$cOri,$vaOpt) ;
    
    $query = $this->db->query("SELECT * FROM v_gaji_2 WHERE id_gaji = '".$id_gaji."' ");


    foreach ($query->result_array() as $key => $vaHasil) {  
                    


    $vaHeader = array(array('row1'=>'                                                         <b>PT. GIU - NITROGEN
                                                        SLIP GAJI OPERATOR</b>
    _______________________________________________________________________________
    
    Nama                                                                 '.$vaHasil['nama'].'
    Outlet                                                                 '.$vaHasil['nama_outlet'].'
    Bulan                                                                 '.$vaHasil['bulan'] ." ". $vaHasil['tahun'].'
    Total Kehadiran                                                 '.$vaHasil['total_masuk'].' Hari
    Nomor Induk Karyawan                                     '.$vaHasil['nik'].'
                                                        '

    ));
    $this->cezpdf->ezTable($vaHeader, null, '',
                array('width'=>'460', 'fontSize'=>'9','justification'=>'right', 'showLines'=>'1','showHeadings'=>0));

                                                                      
    
    $vaGaji = array(
                array('Uraian'=>"Gaji Pokok",'Jumlah'=>'Rp '.number_format($vaHasil['gaji_pokok'])),
                array('Uraian'=>"Uang Makan + Transport + Kesehatan",'Jumlah'=>'Rp '.number_format($vaHasil['uang_makan'])),
                array('Uraian'=>"Bonus Shift",'Jumlah'=>'Rp '.number_format($vaHasil['insentif_1'])),
        
                array('Uraian'=>"Insentif Idul Fitri",'Jumlah'=>'Rp '.number_format($vaHasil['idul_fitri'])),

                array('Uraian'=>"Insentif Idul Adha",'Jumlah'=>'Rp '.number_format($vaHasil['idul_adha'])),

                array('Uraian'=>"Pergantian Nasi Box (Qurban)",'Jumlah'=>'Rp '.number_format($vaHasil['nasi_box'])),

               
                array('Uraian'=>"<b>Total Gaji Keseluruhan</b>",'Jumlah'=>'<b>Rp '.number_format(round($vaHasil['total'],-3)).'</b>')
                );
    $this->cezpdf->ezText(""."", 10,array('justification'=>'left','left'=>33));
    $this->cezpdf->ezTable($vaGaji,"","",array("fontSize"=>8,"cols"=>array(
                            "Uraian"=>array("wrap"=>10,"width"=>70,"justification"=>"left"),
                            "Jumlah"=>array("wrap"=>10,"justification"=>"right")  
                            ))) ;
     
    $this->cezpdf->ezText("\n"."Bekasi , ".date('d-m-Y')." "."", 8,array('justification'=>'left')); 
    $this->cezpdf->ezText("<b>Diserahkan Oleh</b>                                                                                                  <b>Diterima Oleh</b>"."", 8,array('justification'=>'left'));
    $this->cezpdf->ezText("\n\n"."      <b>MM</b>                                                                                                                   <b>".$vaHasil['nama']."</b>"."", 8,array('justification'=>'left'));                                                                    
    
    }
    
     $this->cezpdf->ezStream(array('Content-Disposition'=>'Gaji_Operator_'.$vaHasil['nama'].'-'.$vaHasil['bulan'].'Tahun_'.$vaHasil['tahun'].'.pdf'));   
    }

    public function slip_gaji_bulan($bulan,$tahun) {
   
    $this->load->library('cezpdf');
    $this->cezpdf->selectFont('./fonts/Helvetica.afm');
    $vaOpt["nOpt_MTop"]     = 10 ;
    $vaOpt["nOpt_MLeft"]    = 13 ;
    $vaOpt["nOpt_MBottom"]  = 10 ;
    $vaOpt["nOpt_MRight"]   = 7  ;
    $cFormat                        = "A5" ; //format kertas lihat
    $cOri                           = "P" ; //orientasi Landscape / Portrait
    $nFont                          = 10 ;  
    $this->cezpdf->Cezpdf($cFormat,$cOri,$vaOpt) ;
    
    $query = $this->db->query("SELECT * FROM v_gaji_2 WHERE bulan = '".$bulan."' and tahun = '".$tahun."' ");


    foreach ($query->result_array() as $key => $vaHasil) {  
                    


    $vaHeader = array(array('row1'=>'                                                         <b>PT. GIU - NITROGEN
                                                        SLIP GAJI OPERATOR</b>
    _______________________________________________________________________________
    
    Nama                                                                 '.$vaHasil['nama'].'
    Outlet                                                                 '.$vaHasil['nama_outlet'].'
    Bulan                                                                 '.$vaHasil['bulan'] ." ". $vaHasil['tahun'].'
    Total Kehadiran                                                 '.$vaHasil['total_masuk'].' Hari
    Nomor Induk Karyawan                                     '.$vaHasil['nik'].'
                                                        '

    ));
    $this->cezpdf->ezTable($vaHeader, null, '',
                array('width'=>'460', 'fontSize'=>'9','justification'=>'right', 'showLines'=>'1','showHeadings'=>0));

                                                                      
    
    $vaGaji = array(
                array('Uraian'=>"Gaji Pokok",'Jumlah'=>'Rp '.number_format($vaHasil['gaji_pokok'])),
                array('Uraian'=>"Uang Makan + Transport + Kesehatan",'Jumlah'=>'Rp '.number_format($vaHasil['uang_makan'])),
                array('Uraian'=>"Bonus Shift",'Jumlah'=>'Rp '.number_format($vaHasil['insentif_1'])),
        
                array('Uraian'=>"Insentif Idul Fitri",'Jumlah'=>'Rp '.number_format($vaHasil['idul_fitri'])),

                array('Uraian'=>"Insentif Idul Adha",'Jumlah'=>'Rp '.number_format($vaHasil['idul_adha'])),

                array('Uraian'=>"Pergantian Nasi Box (Qurban)",'Jumlah'=>'Rp '.number_format($vaHasil['nasi_box'])),

               
                array('Uraian'=>"<b>Total Gaji Keseluruhan</b>",'Jumlah'=>'<b>Rp '.number_format(round($vaHasil['total'],-3)).'</b>')
                );
    $this->cezpdf->ezText(""."", 10,array('justification'=>'left','left'=>33));
    $this->cezpdf->ezTable($vaGaji,"","",array("fontSize"=>8,"cols"=>array(
                            "Uraian"=>array("wrap"=>10,"width"=>70,"justification"=>"left"),
                            "Jumlah"=>array("wrap"=>10,"justification"=>"right")  
                            ))) ;
     
    $this->cezpdf->ezText("\n"."Bekasi , ".date('d-m-Y')." "."", 8,array('justification'=>'left')); 
    $this->cezpdf->ezText("<b>Diserahkan Oleh</b>                                                                                                  <b>Diterima Oleh</b>"."", 8,array('justification'=>'left'));
    $this->cezpdf->ezText("\n\n"."      <b>MM</b>                                                                                                                   <b>".$vaHasil['nama']."</b>"."", 8,array('justification'=>'left'));

     $this->cezpdf->ezText("\n\n\n\n\n\n\n\n\n\n\n\n", 10,array('justification'=>'left','left'=>8));                                                                      
    
    }


    
     $this->cezpdf->ezStream(array('Content-Disposition'=>'Gaji_Operator_Bulan_'.$vaHasil['bulan'].'Tahun_'.$vaHasil['tahun'].'.pdf'));   
    }


    function rekap_gaji_bulan($bulan,$tahun){
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $this->load->View('admin/gaji/rekap_gaji_cetak',$data);
    }


    public function cetak_po($cKodePo) {
   
    $this->load->library('cezpdf');
    $this->cezpdf->selectFont('./fonts/Helvetica.afm');
    $vaOpt["nOpt_MTop"]     = 10 ;
    $vaOpt["nOpt_MLeft"]    = 13 ;
    $vaOpt["nOpt_MBottom"]  = 10 ;
    $vaOpt["nOpt_MRight"]   = 7  ;
    $cFormat                        = "A4" ; //format kertas lihat
    $cOri                           = "P" ; //orientasi Landscape / Portrait
    $nFont                          = 10 ;  
    $this->cezpdf->Cezpdf($cFormat,$cOri,$vaOpt) ;
    $this->cezpdf->ezLogoHeaderPage(base_url().'logo.jpg',20,20,200,0); 
    
    $query = $this->db->query("SELECT * FROM v_po_supplies WHERE kode_po = '".$cKodePo."' ");

    foreach ($query->result_array() as $key => $vaArray) {
        $cNamaOutlet    =   $vaArray['nama_outlet'];
        $dTglPo         =   $vaArray['tgl_po'];
    }

    /*1. Data*/
    $vaData                 = array() ; 
    $i = 1 ;
    foreach ($query->result_array() as $key => $vaArray) {
        $vaData[]           = array("No."       => $i++,
                                    "Nama Supplies"      => $vaArray['nama_supplies'],
                                    "Jumlah"             => $vaArray['jumlah']." ". $vaArray['satuan'],
                                    "Harga"              => number_format($vaArray['harga']),
                                    'Total'              => number_format($vaArray['total'])
                                ) ; 
    }
    $this->cezpdf->ezHeader("PT. GIU",array("fontSize"=> $nFont+4)) ;  
    $this->cezpdf->ezHeader("PO - ".$cNamaOutlet." (".$cKodePo.") ". date("d-m-Y"),array("fontSize"=> $nFont+1)) ;
    $this->cezpdf->ezHeader("Tgl PO :" .date("d-m-Y"),array("fontSize"=> $nFont)) ;
    $this->cezpdf->ezHeader("") ;
    $this->cezpdf->ezText("") ; 
    $this->cezpdf->ezTable($vaData,"","",
                        array("fontSize"=>$nFont,
                              "cols"    =>array(
                                        "No."           => array("width"=>5,"justification"=>"center"),  
                                        "Nama Supplies" => array("wrap"=>1,"wrap"=>1,"justification"=>"left"),
                                        "Jumlah" => array("wrap"=>1,"wrap"=>1,"justification"=>"center"),
                                        "Harga" => array("wrap"=>1,"wrap"=>1,"justification"=>"center"),
                                        "Total" => array("wrap"=>1,"wrap"=>1,"justification"=>"center"),
                                         )
                            )
                    ) ; 

   
                    


     $this->cezpdf->ezStream(array('Content-Disposition'=>'PO('.$cKodePo.').pdf'));   
    }


    public function cetak_pemasukan($cKodePemasukan) {
   
    $this->load->library('cezpdf');
    $this->cezpdf->selectFont('./fonts/Helvetica.afm');
    $vaOpt["nOpt_MTop"]     = 10 ;
    $vaOpt["nOpt_MLeft"]    = 13 ;
    $vaOpt["nOpt_MBottom"]  = 10 ;
    $vaOpt["nOpt_MRight"]   = 7  ;
    $cFormat                        = "A4" ; //format kertas lihat
    $cOri                           = "P" ; //orientasi Landscape / Portrait
    $nFont                          = 10 ;  
    $this->cezpdf->Cezpdf($cFormat,$cOri,$vaOpt) ;
    $this->cezpdf->ezLogoHeaderPage("http://36.89.27.201/logo.jpg",20,60,60,30) ;  
    
    $query = $this->db->query("SELECT * FROM v_pemasukan_supplies WHERE kode_pemasukan = '".$cKodePemasukan."' ");

    foreach ($query->result_array() as $key => $vaArray) {
        $cNamaOutlet    =   $vaArray['nama_outlet'];
        $cKodePo        =   $vaArray['kode_po'];
        $dTglPemasukan  =   $vaArray['tgl_pemasukan'];
    }

    /*1. Data*/
    $vaData                 = array() ; 
    $i = 1 ;
    foreach ($query->result_array() as $key => $vaArray) {
        $vaData[]           = array("No."       => $i++,
                                    "Nama Supplies"      => $vaArray['nama_supplies'],
                                    "Jumlah Awal"        => $vaArray['jumlah_awal'],
                                    "Jumlah Pemasukan"   => ($vaArray['jumlah_pemasukan'])
                                ) ; 
    }
    $this->cezpdf->ezHeader("PT. GIU",array("fontSize"=> $nFont+4)) ;  
    $this->cezpdf->ezHeader("PEMASUKAN SUPPLIES - ".$cNamaOutlet." (".$cKodePemasukan.") Dengan Nomor PO (".$cKodePo.") ". date("d-m-Y"),array("fontSize"=> $nFont+1)) ;
    $this->cezpdf->ezHeader("Tgl Pemasukan : ".$dTglPemasukan,array("fontSize"=> $nFont)) ;
    $this->cezpdf->ezHeader("") ;
    $this->cezpdf->ezText("") ; 
    $this->cezpdf->ezTable($vaData,"","",
                        array("fontSize"=>$nFont,
                              "cols"    =>array(
                                        "No."           => array("width"=>5,"justification"=>"center"),  
                                        "Nama Supplies" => array("wrap"=>1,"wrap"=>1,"justification"=>"left"),
                                        "Jumlah Awal" => array("wrap"=>1,"wrap"=>1,"justification"=>"center"),
                                        "Jumlah Pemasukan" => array("wrap"=>1,"wrap"=>1,"justification"=>"center")
                                         )
                            )
                    ) ; 

   
                    


     $this->cezpdf->ezStream(array('Content-Disposition'=>'PEMASUKAN('.$cKodePemasukan.').pdf'));   
    }

    public function cetak_pengeluaran($cKodePengeluaran) {
   
    $this->load->library('cezpdf');
    $this->cezpdf->selectFont('./fonts/Helvetica.afm');
    $vaOpt["nOpt_MTop"]     = 10 ;
    $vaOpt["nOpt_MLeft"]    = 13 ;
    $vaOpt["nOpt_MBottom"]  = 10 ;
    $vaOpt["nOpt_MRight"]   = 7  ;
    $cFormat                        = "A4" ; //format kertas lihat
    $cOri                           = "P" ; //orientasi Landscape / Portrait
    $nFont                          = 10 ;  
    $this->cezpdf->Cezpdf($cFormat,$cOri,$vaOpt) ;
    $this->cezpdf->ezLogoHeaderPage("http://36.89.27.201/logo.jpg",20,60,60,30) ;  
    
    $query = $this->db->query("SELECT * FROM v_pengeluaran_supplies WHERE kode_pengeluaran = '".$cKodePengeluaran."' ");

    foreach ($query->result_array() as $key => $vaArray) {
        $cNamaOutlet    =   $vaArray['nama_outlet'];
        $dTglPengeluaran=   $vaArray['tgl_pengeluaran'];
    }

    /*1. Data*/
    $vaData                 = array() ; 
    $i = 1 ;
    foreach ($query->result_array() as $key => $vaArray) {
        $vaData[]           = array("No."       => $i++,
                                    "Nama Supplies"      => $vaArray['nama_supplies'],
                                    "Jumlah Awal"        => $vaArray['jumlah_awal'],
                                    "Jumlah Pengeluaran" => ($vaArray['jumlah_pengeluaran'])
                                ) ; 
    }
    $this->cezpdf->ezHeader("PT. GIU",array("fontSize"=> $nFont+4)) ;  
    $this->cezpdf->ezHeader("PENGELUARAN SUPPLIES - ".$cNamaOutlet." (".$cKodePengeluaran.")". date("d-m-Y"),array("fontSize"=> $nFont+1)) ;
    $this->cezpdf->ezHeader("Tgl Pengeluaran : ".$dTglPengeluaran,array("fontSize"=> $nFont)) ;
    $this->cezpdf->ezHeader("") ;
    $this->cezpdf->ezText("") ; 
    $this->cezpdf->ezTable($vaData,"","",
                        array("fontSize"=>$nFont,
                              "cols"    =>array(
                                        "No."           => array("width"=>5,"justification"=>"center"),  
                                        "Nama Supplies" => array("wrap"=>1,"wrap"=>1,"justification"=>"left"),
                                        "Jumlah Awal" => array("wrap"=>1,"wrap"=>1,"justification"=>"center"),
                                        "Jumlah Pengeluaran" => array("wrap"=>1,"wrap"=>1,"justification"=>"center")
                                         )
                            )
                    ) ; 

   
                    


     $this->cezpdf->ezStream(array('Content-Disposition'=>'PENGELUARAN('.$cKodePengeluaran.').pdf'));   
    }
   

}
