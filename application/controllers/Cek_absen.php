<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cek_absen extends CI_Controller
{
    private $filename = "import_data"; // Kita tentukan nama filenya

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('download');

        $this->load->model('AbsensiModel');
        $this->load->model('model');
        $this->load->model('relasi');
    }

    public function index($Aksi = "", $Id = "")
    {
        // $data['siswa'] = $this->AbsensiModel->view();

        $dataHeader['menu'] = 'Manajemen Gaji';
        $dataHeader['file'] = 'Absensi Pegawai';
        $data['action']     = $Aksi;
        $data['id_absen']    =    $Id;

        $data['absensi'] = $this->model->View('attlog');
        $data['row']	= $this->relasi->GetDataAbsensi_tabel_new();

        $this->load->view('admin/container/header', $dataHeader);
        $this->load->view('admin/gaji/absensi', $data);
        $this->load->view('admin/container/footer');
    }

    public function form($Aksi = "", $Id = "")
    {

        $data = array(); // Buat variabel $data sebagai array

        $dataHeader['menu'] = 'Manajemen Gaji';
        $dataHeader['file'] = 'Absensi Pegawai';
        $data['action'] = $Aksi;
        $data['id_absen']    =    $Id;

        if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
            // lakukan upload file dengan memanggil function upload yang ada di AbsensiModel.php

            $upload = $this->AbsensiModel->upload_file($this->filename);

            if ($upload['result'] == "success") { // Jika proses upload sukses
                // Load plugin PHPExcel nya
                include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

                $excelreader = new PHPExcel_Reader_Excel2007();
                $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

                // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
                // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
                $data['sheet'] = $sheet;

                $dataHeader['menu'] = 'Manajemen Absensi';
                $dataHeader['file'] = 'Absensi Pegawai';
                $data['action'] = $Aksi;
                $data['id_absen']    =    $Id;

                $this->load->view('admin/container/header', $dataHeader);
                $this->load->view('admin/gaji/absensi', $data);
                $this->load->view('admin/container/footer');
            } else { // Jika proses upload gagal
                $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan		

                $dataHeader['menu'] = 'Manajemen Gaji';
                $dataHeader['file'] = 'Absensi Pegawai';
                $data['action'] = $Aksi;
                $data['id_absen']    =    $Id;

                $this->load->view('admin/container/header', $dataHeader);
                $this->load->view('admin/gaji/absensi', $data);
                $this->load->view('admin/container/footer');
            }
        }


        // $this->load->view('admin/gaji/absensi', $data);
    }

    public function import()
    {
        $dTgl = $this->input->post('dTgl');
        $dTgl_end = $this->input->post('dTgl_end');
        //echo "$dTgl <br />";

        $data_absensi = $this->model->View('attlog');
        $data_log_absen = array();
        foreach ($data_absensi as $key => $vaArea) {
            // $c_id = date("YmdHis");
            // $tgl_hari_ini = date('Y-m-d');

            $pin = $vaArea['pin'];
            $attlog = $vaArea['attlog'];
            $verify = $vaArea['verify'];
            $status_scan = $vaArea['status_scan'];
            $cloud_id = $vaArea['cloud_id'];

            $a_attlog = explode(" ", $attlog);
            $tgl = $a_attlog[0];
            $waktu = $a_attlog[1];

            if ($tgl == $dTgl || $tgl == $dTgl_end) {
                // echo "pin : $pin <br />";
                // echo "attlog : $attlog <br />";
                // echo "tanggal cek roll : $tgl <br />";
                // echo "waktu cek roll : $waktu <br />";
                // echo "verify : $verify <br />";
                // echo "status_scan : $status_scan <br />";
                // echo "cloud_id : $cloud_id <br /><br />";

                array_push($data_log_absen, array(

                    'pin' => $pin,
                    'attlog' => $attlog,
                    'tanggal' => $tgl,
                    'waktu' => $waktu,
                    'verify' => $verify,
                    'status_scan' => $status_scan,
                    'cloud_id' => $cloud_id
                ));
            } else {
                // echo "asd";
            }
        }

        $this->AbsensiModel->insert_data_log_absen($data_log_absen);
        redirect(site_url('gaji/absensi_pegawai/'));
    }

    public function get_data_absensi(){
        $dTgl = $this->input->post('dTgl');
        $dTgl_end = $this->input->post('dTgl_end');
                
        $data['data_absensi'] = $this->model->ViewWhereLikeOr('attlog','attlog',$dTgl,'attlog',$dTgl_end);
        $this->load->view('admin/gaji/tb_absensi', $data);

    }

    public function get_data_absensi_import(){
        $dTgl_cetak = $this->input->post('dTgl_cetak');
        $dTgl_cetak_end = $this->input->post('dTgl_cetak_end');
                
        $data['row'] = $this->model->ViewWhereLikeOr('v_log_data_absen','tanggal',$dTgl_cetak,'tanggal',$dTgl_cetak_end);
        $this->load->view('admin/gaji/tb_absensi_import', $data);

    }
    
}
