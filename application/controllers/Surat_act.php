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
        $Data = date("d-m-Y h:i:s");
        return $Data;
    }

    public function teguran_lisan($Type = "", $Id = "")
    {
        if ($Type == 'Insert') {

            $dataInsert = array(
                'tanggal'           =>  $this->input->post('dTgl'),
                'jum_teguran_lisan' =>  $this->input->post('tl'),
                'id_kategori_surat' =>  $this->input->post('idSurat'),
                'id_pegawai'        =>  $this->input->post('cIdPegawai'),
                'keterangan'        =>  $this->input->post('cKet'),
                'id_kategori_surat' =>  2,

            );

            $seralizedArrayInsert = serialize($dataInsert);
            $vaLog = array(
                'tgl' => $this->Date2String($this->DateStamp()),
                'waktu' => $this->TimeStamp(),
                'nama_table' => 'tb_surat_peringatan',
                'action' => $Type,
                'query' => $seralizedArrayInsert,
                'nama' => $this->session->userdata('nama')
            );

            $this->model->Insert("log", $vaLog);
            $this->model->Insert('tb_surat_peringatan', $dataInsert);
            redirect(site_url('transaksi/teguran_lisan/I'));
        } elseif ($Type == 'Update') {

            $dataUpdate = array(
                'tanggal'           =>  $this->input->post('dTgl'),
                'jum_teguran_lisan' =>  $this->input->post('tl'),
                'id_kategori_surat' =>  $this->input->post('idSurat'),
                'id_pegawai'        =>  $this->input->post('cIdPegawai'),
                'keterangan'        =>  $this->input->post('cKet'),

            );

            $seralizedArrayUpdate = serialize($dataUpdate);
            $vaLog2 = array(
                'tgl' => $this->Date2String($this->DateStamp()),
                'waktu' => $this->TimeStamp(),
                'nama_table' => 'tb_surat_peringatan',
                'action' => $Type,
                'query' => $seralizedArrayUpdate,
                'nama' => $this->session->userdata('nama')
            );
            $this->model->Insert("log", $vaLog2);
            $this->model->update('tb_surat_peringatan', 'id', $Id, $dataUpdate);
            redirect(site_url('transaksi/teguran_lisan/U'));
        } elseif ($Type == 'Delete') {

            $dataDelete = array(
                'is_delete'        => 1
            );

            $seralizedArrayDelete = serialize($dataDelete);
            $vaLog2 = array(
                'tgl' => $this->Date2String($this->DateStamp()),
                'waktu' => $this->TimeStamp(),
                'nama_table' => 'tb_surat_peringatan',
                'action' => $Type,
                'query' => $seralizedArrayDelete,
                'nama' => $this->session->userdata('nama')
            );

            $this->model->Insert("log", $vaLog2);
            $this->model->Update_Delete('tb_surat_peringatan', 'id', $Id, $dataDelete);
            redirect(site_url('transaksi/teguran_lisan/D'));
        }
    }

    public function surat_teguran($Type = "", $Id = "")
    {
        if ($Type == 'Insert') {

            $dataInsert = array(
                'tanggal'           =>  $this->input->post('dTgl'),
                'nomor_surat'       =>  $this->input->post('nNomorSurat'),
                'jum_teguran_lisan' =>  $this->input->post('tl'),
                'id_kategori_surat' =>  $this->input->post('idSurat'),
                'id_pegawai'        =>  $this->input->post('cIdPegawai'),
                'uraian'            =>  $this->input->post('cUraian'),
                'keterangan'        =>  $this->input->post('cKet'),
                'mulai_berlaku'     =>  $this->input->post('cMulai_berlaku'),
                'berlaku_sampai'    =>  $this->input->post('cBerlaku_sampai'),
                'create'            =>  $this->input->post('cCreate'),
                'general_manager'   =>  $this->input->post('cGeneral_manager'),
                'id_kategori_surat' =>  1,
            );

            $seralizedArrayInsert = serialize($dataInsert);
            $vaLog = array(
                'tgl' => $this->Date2String($this->DateStamp()),
                'waktu' => $this->TimeStamp(),
                'nama_table' => 'tb_surat_peringatan',
                'action' => $Type,
                'query' => $seralizedArrayInsert,
                'nama' => $this->session->userdata('nama')
            );

            $this->model->Insert("log", $vaLog);
            $this->model->Insert('tb_surat_peringatan', $dataInsert);
            redirect(site_url('transaksi/surat_teguran/I'));
        } elseif ($Type == 'Update') {

            $dataUpdate = array(
                'tanggal'           =>  $this->input->post('dTgl'),
                'nomor_surat'           =>  $this->input->post('nNomorSurat'),
                'jum_teguran_lisan' =>  $this->input->post('tl'),
                'id_kategori_surat' =>  $this->input->post('idSurat'),
                'id_pegawai'        =>  $this->input->post('cIdPegawai'),
                'uraian'            =>  $this->input->post('cUraian'),
                'keterangan'        =>  $this->input->post('cKet'),
                'mulai_berlaku'            =>  $this->input->post('cMulai_berlaku'),
                'berlaku_sampai'            =>  $this->input->post('cBerlaku_sampai'),
                'create'            =>  $this->input->post('cCreate'),
                'general_manager'            =>  $this->input->post('cGeneral_manager'),

            );

            $seralizedArrayUpdate = serialize($dataUpdate);
            $vaLog2 = array(
                'tgl' => $this->Date2String($this->DateStamp()),
                'waktu' => $this->TimeStamp(),
                'nama_table' => 'tb_surat_peringatan',
                'action' => $Type,
                'query' => $seralizedArrayUpdate,
                'nama' => $this->session->userdata('nama')
            );
            $this->model->Insert("log", $vaLog2);
            $this->model->update('tb_surat_peringatan', 'id', $Id, $dataUpdate);
            redirect(site_url('transaksi/surat_teguran/U'));
        } elseif ($Type == 'Delete') {

            $dataDelete = array(
                'is_delete'        => 1
            );

            $seralizedArrayDelete = serialize($dataDelete);
            $vaLog2 = array(
                'tgl' => $this->Date2String($this->DateStamp()),
                'waktu' => $this->TimeStamp(),
                'nama_table' => 'tb_surat_peringatan',
                'action' => $Type,
                'query' => $seralizedArrayDelete,
                'nama' => $this->session->userdata('nama')
            );

            $this->model->Insert("log", $vaLog2);
            $this->model->Update_Delete('tb_surat_peringatan', 'id', $Id, $dataDelete);
            redirect(site_url('transaksi/surat_teguran/D'));
        }
    }

    public function sp1($Type = "", $Id = "")
    {

        if ($Type == 'Insert' or $Type == 'Update') {

            $dataInsert = array(
                'tanggal'           =>  $this->input->post('dTgl'),
                'id_kategori_surat' =>  3,
                'nomor_surat'       =>  $this->input->post('nNomorSurat'),
                'id_pegawai'        =>  $this->input->post('cIdPegawai'),
                'uraian'            =>  $this->input->post('cUraian'),
                'jabatan'           =>  $this->input->post('cJabatan'),
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
                'id_kategori_surat' =>  4,
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

    public function sp3($Type = "", $Id = "")
    {

        if ($Type == 'Insert' or $Type == 'Update') {

            $dataInsert = array(
                'tanggal'           =>  $this->input->post('dTgl'),
                'id_kategori_surat' =>  5,
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

    public function cetak_kontrak($id='')
    {
        $data['data'] = $this->db->query('SELECT * from kontrak t1 JOIN tb_pegawai t2 ON t1.id_pegawai = t2.id_pegawai where t1.id_pegawai='.$id.'')->result_array();;
        $mpdf = new \Mpdf\Mpdf(['autoPageBreak' => true]);
        $html = $this->load->view('admin/transaksi/cetak_kontrak', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        redirect(site_url('Transaksi/kontrak'));
    }

    public function cetak_sp1($id = '')
    {
        $data['data'] = $this->model->ViewWhere('v_pegawai_pelanggaran_sp', 'id', $id);
        $mpdf = new \Mpdf\Mpdf(['autoPageBreak' => true]);
        $html = $this->load->view('admin/transaksi/cetak_sp1', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        redirect(site_url('transaksi/sp1'));
    }
    public function cetak_sp2($id = '')
    {
        $data['data'] = $this->model->ViewWhere('v_pegawai_pelanggaran_sp', 'id', $id);
        $mpdf = new \Mpdf\Mpdf(['autoPageBreak' => true]);
        $html = $this->load->view('admin/transaksi/cetak_sp2', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        redirect(site_url('transaksi/sp2'));
    }
    public function cetak_sp3($id = '')
    {
        $data['data'] = $this->model->ViewWhere('v_pegawai_pelanggaran_sp', 'id', $id);
        $mpdf = new \Mpdf\Mpdf(['autoPageBreak' => true]);
        $html = $this->load->view('admin/transaksi/cetak_sp3', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        redirect(site_url('transaksi/sp3'));
    }
}
