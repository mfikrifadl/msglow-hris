<?php
defined('BASEPATH') or exit('No direct script access allowed');

class hak_akses_interview extends CI_Controller
{

    public function __construct()
    {

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

    public  function Date2String($dTgl)
    {
        //return 2012-11-22
        list($cDate, $cMount, $cYear)    = explode("-", $dTgl);
        if (strlen($cDate) == 2) {
            $dTgl    = $cYear . "-" . $cMount . "-" . $cDate;
        }
        return $dTgl;
    }

    public  function String2Date($dTgl)
    {
        //return 22-11-2012  
        list($cYear, $cMount, $cDate)    = explode("-", $dTgl);
        if (strlen($cYear) == 4) {
            $dTgl    = $cDate . "-" . $cMount . "-" . $cYear;
        }
        return $dTgl;
    }

    public function TimeStamp()
    {
        date_default_timezone_set("Asia/Jakarta");
        $Data = date("H:i:s");
        return $Data;
    }

    public function DateStamp()
    {
        date_default_timezone_set("Asia/Jakarta");
        $Data = date("d-m-Y");
        return $Data;
    }

    public function DateTimeStamp()
    {
        date_default_timezone_set("Asia/Jakarta");
        $Data = date("Y-m-d h:i:s");
        return $Data;
    }

    public function index($Aksi = "", $Id = "")
    {
        $dataHeader['menu']     = 'Hak Akses Interview';
        $dataHeader['file']     = 'Hak Akses';
        $dataHeader['action']     = $Aksi;
        $data['pegawais']        = $this->model->ViewASC('v_username', 'nama');
        $data['row']        = $this->db->get_where('v_username', ['is_interview >=' =>  1])->result_array();

        $this->load->view('admin/container/header', $dataHeader);
        $this->load->view('admin/hak_akses_interview/hak_akses_interview', $data);
        $this->load->view('admin/container/footer');
    }
    public function aksi($Aksi = "", $Id = "")
    {
        $dataHeader['menu']     = 'Hak Akses Interview';
        $dataHeader['file']     = 'Hak Akses';
        $dataHeader['action']     = $Aksi;

        $data_tambah = array(
            'is_interview' => 1
        );
        $data_approve = array(
            'is_interview' => 2
        );

        if ($Aksi == 'tambah') {
            $this->db->update('user', $data_tambah, ['id'  => $this->input->post('cIdPegawai')]);
        } elseif ($Aksi == 'approve') {
            $this->db->update('user', $data_approve, ['id'  => $Id]);
        } elseif ($Aksi == 'unapprove') {
            $this->db->update('user', $data_tambah, ['id'  => $Id]);
        }

        redirect(site_url('hak_akses_interview'));
    }
}
