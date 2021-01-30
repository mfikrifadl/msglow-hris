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

    public function index_form($Aksi = "", $Id = "")
    {
        $dataHeader['menu']     = 'Hak Akses Interview';
        $dataHeader['file']     = 'Hak Akses';
        $dataHeader['action']     = $Aksi;
        $data['pegawai']        = $this->model->ViewWhere('v_data_pegawai_jabatan', 'nama_jabatan', 'Manager');
        $data['unit_kerja']     = $this->model->ViewASC('tb_ref_jabatan', 'nama_jabatan');
        $data['sub_unit_kerja']     = $this->model->ViewASC('tb_sub_unit_kerja', 'nama_sub_unit_kerja');
        $data['row']        = $this->model->ViewASC('v_form_pengajuan', 'nama_pengaju_form');

        $this->load->view('admin/container/header', $dataHeader);
        $this->load->view('admin/hak_akses_interview/hak_akses_interview', $data);
        $this->load->view('admin/container/footer');
    }
    public function form_pengajuan($Aksi = "", $Id = "")
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

        $idForm = date('YmdHis');

        $data = array(
            'id_form'                   => $idForm,
            'nik'                       => $this->input->post('cIdPegawai'),
            'nama_pengaju_form'         => $this->input->post('cNama'),
            'unit_kerja_pengaju_form'   => $this->input->post('cJabatan'),
            'sub_unit_kerja_pf'         => $this->input->post('cSuk'),
            'add_man_power_uk'          => $this->input->post('cUnit_k'),
            'id_sub_unit_kerja'         => $this->input->post('pSuk'),
            'total_man_power'           => $this->input->post('jmlP'),
        );


        if ($Aksi == 'tambah') {
            $this->model->Insert("tb_form_pengajuan", $data);
            // $this->db->update('user', $data_tambah, ['id'  => $this->input->post('cIdPegawai')]);
        } elseif ($Aksi == 'approve') {
            $this->db->update('user', $data_approve, ['id'  => $Id]);
        }
        // elseif ($Aksi == 'edit') {
        //     $data['subUnitKerja']	= $this->model->ViewWhere('tb_sub_unit_kerja', 'id_Unit_kerja', $Id);
        // }
        elseif ($Aksi == 'unapprove') {
            $this->db->update('user', $data_tambah, ['id'  => $Id]);
        }

        redirect(site_url('hak_akses_interview'));
    }

    public function unit_kerja()
    {

        $data_unit_kerja     = $this->db->query("SELECT * FROM tb_ref_jabatan ORDER BY nama_jabatan");
        return $data_unit_kerja;
    }

    public function sub_unit_kerja($id)
    {
        $data_sub_unit_kerja = $this->db->query("SELECT * FROM tb_sub_unit_kerja suk LEFT JOIN tb_ref_jabatan rj ON suk.id_unit_kerja = rj.id_ref_jabatan WHERE suk.id_unit_kerja='$id'");
        return $data_sub_unit_kerja;
    }
}
