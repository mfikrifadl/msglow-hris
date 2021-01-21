<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Angular extends CI_Controller {

	public function __construct(){
		
      parent::__construct();
  		 error_reporting(E_ALL);
  		 error_reporting(0);     
	    //MenLoad model yang berada di Folder Model dan namany model
	    $this->db->reconnect();
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


    public function index(){
        $data['area']       = $this->model->View('tb_area_kerja','id_area');
        $data['pendidikan'] = $this->model->View('tb_pendidikan','id_pendidikan');
        $this->load->view('angular/index',$data);
    }

    public function home(){
        $this->load->view('angular/home');
    }

    public function about(){
        $this->load->view('angular/about');
    }

    public function add(){
      $vaDataJason  =   file_get_contents("php://input");
      $cRequest     =   json_decode($vaDataJason);

      $vaData   =   array('name'=>$cRequest->name,
                          'city'=>$cRequest->city,
                          'area_kerja'=>$cRequest->areakerja,
                          'pendidikan'=>$cRequest->pendidikan
                          );
      
      if($cRequest->id == ""){
        $cAction  =   $this->model->Insert('angular',$vaData);
         echo $result = '{"status" : "Berhasil Di Simpan"}';
      }else{
        $cAction  =   $this->model->Update('angular','id',$cRequest->id,$vaData);
        echo $result = '{"status" : "Berhasil  Di Update"}';
      }
      
    }

    public function view(){
        $data   = $this->model->View('angular','id');
        $vaArray  = array();
        $i        = 0 ;
        foreach ($data as $key => $vaData) {
           $vaArray[$i]['id']   =   $vaData['id']   ;
           $vaArray[$i]['name'] =   $vaData['name'] ;
           $vaArray[$i]['city'] =   $vaData['city'] ;
           $i++;
        }

        echo json_encode($vaArray);
    }


    public function edit($id=""){
      
       $data  =   $this->model->ViewWhere('angular','id',$id);
       foreach ($data as $key => $vaData) {
         $cNama = $vaData['name'];
         $cKota = $vaData['city'];
         $cArea = $vaData['area_kerja'];
         $cPendidikan = $vaData['pendidikan'];
       }
      echo $result = '{"id"          : "'.$id.'",
                       "name"        : "'.$cNama.'" , 
                       "city"        : "'.$cKota.'",
                       "areakerja"   : "'.$cArea.'",
                       "pendidikan"  : "'.$cPendidikan.'"
                     }' ;
    }

    public function hapus($id=""){
      
      $this->model->Delete('angular','id',$id); 
      echo $result = '{"status" : "Berhasil Di Hapus"}';
    }

    

}