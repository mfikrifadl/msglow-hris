<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_act extends CI_Controller
{
    public function __construct()
    {
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

    public function sp1($Type = "", $Id = "")
    {

        if ($Type == 'Insert' or $Type == 'Update') {

            $dataInsert = array(
                'tanggal'           =>  $this->input->post('dTgl'),
                'nomor_surat'       =>  $this->input->post('nNomorSurat'),
                'id_pegawai'        =>  $this->input->post('cIdPegawai'),
                'uraian'            =>  $this->input->post('cUraian'),
                'create'            =>  $this->input->post('cCreate'),
                'general_manager'   =>  $this->input->post('cGeneral_manager'),
                'mulai_berlaku'     =>  $this->input->post('cMulai_berlaku'),
                'berlaku_sampai'    =>  $this->input->post('cBerlaku_sampai'),
            );
            // print_r($dataInsert);
            $this->model->Insert('tb_surat_peringatan', $dataInsert);
            redirect(site_url('transaksi/sp1'));
        }
    }

    public function sp2($Type = "", $Id = "")
    {

        if ($Type == 'Insert' or $Type == 'Update') {

            $dataInsert = array(
                'tanggal'           =>  $this->input->post('dTgl'),
                'nomor_surat'       =>  $this->input->post('nNomorSurat'),
                'id_pegawai'        =>  $this->input->post('cIdPegawai'),
                'uraian'            =>  $this->input->post('cUraian'),
                'create'            =>  $this->input->post('cCreate'),
                'general_manager'   =>  $this->input->post('cGeneral_manager'),
                'mulai_berlaku'     =>  $this->input->post('cMulai_berlaku'),
                'berlaku_sampai'    =>  $this->input->post('cBerlaku_sampai'),
            );
            // print_r($dataInsert);
            $this->model->Insert('tb_surat_peringatan', $dataInsert);
            redirect(site_url('transaksi/sp2'));
        }
    }

    public function sp13($Type = "", $Id = "")
    {

        if ($Type == 'Insert' or $Type == 'Update') {

            $dataInsert = array(
                'tanggal'           =>  $this->input->post('dTgl'),
                'nomor_surat'       =>  $this->input->post('nNomorSurat'),
                'id_pegawai'        =>  $this->input->post('cIdPegawai'),
                'uraian'            =>  $this->input->post('cUraian'),
                'create'            =>  $this->input->post('cCreate'),
                'general_manager'   =>  $this->input->post('cGeneral_manager'),
                'mulai_berlaku'     =>  $this->input->post('cMulai_berlaku'),
                'berlaku_sampai'    =>  $this->input->post('cBerlaku_sampai'),
            );
            // print_r($dataInsert);
            $this->model->Insert('tb_surat_peringatan', $dataInsert);
            redirect(site_url('transaksi/sp3'));
        }
    }
}
