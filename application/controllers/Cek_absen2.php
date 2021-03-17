<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cek_absen2 extends CI_Controller
{
    private $filename = "import_data"; // Kita tentukan nama filenya

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        
        $this->load->model('AbsensiModel');
        $this->load->model('model');
        $this->load->model('relasi');
    }

    // public function index($Aksi = "", $Id = "")
    // {
    //     $data['siswa'] = $this->AbsensiModel->view();
    //     $dataHeader['menu'] = 'Manajemen Gaji';
    //     $dataHeader['file'] = 'Absensi Pegawai';
    //     $data['action']     = $Aksi;
    //     $data['id_absen']    =    $Id;
    //     $this->load->view('admin/container/header', $dataHeader);
    //     $this->load->view('admin/gaji/absensi2', $data);
    //     $this->load->view('admin/container/footer');
    // }

    public function form($Aksi = "", $Id = "")
    {

        $data = array(); // Buat variabel $data sebagai array

        $dataHeader['menu'] = 'Absensi';
        $dataHeader['file'] = 'Absensi Pegawai';
        $data['action'] = $Aksi;
        $data['id_absen']    =    $Id;

        if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
            // lakukan upload file dengan memanggil function upload yang ada di AbsensiModel.php

            $upload = $this->AbsensiModel->upload_file($this->filename);

            // echo $this->filename;
            // die;

            if ($upload['result'] == "success") { // Jika proses upload sukses
                // Load plugin PHPExcel nya
                include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

                $excelreader = new PHPExcel_Reader_Excel2007();
                $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

                // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
                // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
                $data['sheet'] = $sheet;
               
            } else { // Jika proses upload gagal
                $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan		

            }
        }

        //======================NOTIFIKASI===============================================================
        $dataHeader['notif_absensi']                = $this->model->notifAbsensi();
        $dataHeader['data_notif_absen']                = $this->model->View('v_data_notif_absen');

        $total_peserta_diterima_staff                = $this->db->query("SELECT COUNT(IF(status='lolos', status, NULL)) AS jml_lolos, COUNT(IF(status='validasi', status, NULL)) AS jml_validasi	FROM recruitment");
        $dataHeader['jml_notif_psrt_diterima_staff']        = $total_peserta_diterima_staff->result_array();

        $total_peserta_diterima_phl                    = $this->db->query("SELECT COUNT(IF(status='lolos', status, NULL)) AS jml_lolos, COUNT(IF(status='validasi', status, NULL)) AS jml_validasi	FROM recruitment_phl");
        $dataHeader['jml_notif_psrt_diterima_phl']        = $total_peserta_diterima_phl->result_array();

        $data_notif_psrt_staff                        = $this->db->query("SELECT * FROM recruitment WHERE status='lolos' OR status='validasi'");
        $dataHeader['data_notif_recruitment_staff']    = $data_notif_psrt_staff->result_array();

        $data_notif_psrt_phl                        = $this->db->query("SELECT * FROM recruitment_phl WHERE status='lolos' OR status='validasi'");
        $dataHeader['data_notif_recruitment_phl']    = $data_notif_psrt_phl->result_array();
        //======================NOTIFIKASI===============================================================
        
        $this->load->view('admin/container/header', $dataHeader);
        $this->load->view('admin/gaji/absensi2', $data);
        $this->load->view('admin/container/footer');
    }

    public function import()
    {
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang telah diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
       
        $data_log_absen = array();

        $cloud_id = "";
        $pin = "";
        $nama_karyawan = "";
        $tgl_scan = "";
        $jam_scan = "";
        $verifikasi = "";
        $tipe_scan = "";

        $looping = $this->input->post('numrow');

        $numrow = 0;

        foreach ($sheet as $row) {
            $c_id = date("YmdHis");

            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if ($numrow > 0 && $numrow <= $looping) {
                $id = $c_id + $numrow;

                $cloud_id = $row['A']; // Ambil data NIS
                $pin = $row['B']; // Ambil data nama
                $nama_karyawan = $row['C']; // Ambil data jenis kelamin
                $tgl_scan = $row['D']; // Ambil data alamat
                $jam_scan = $row['E']; // Ambil data NIS
                $verifikasi = $row['F']; // Ambil data nama
                $tipe_scan = $row['G']; // Ambil data jenis kelamin

                date_default_timezone_set("Asia/Jakarta");
                $attlog = date("$tgl_scan $jam_scan");                

                array_push($data_log_absen, array(
                    'id'    => $id,
                    'pin' => $pin,
                    'attlog' => $attlog,
                    'tanggal' => $tgl_scan,
                    'waktu' => $jam_scan,
                    'verify' => $verifikasi,
                    'status_scan' => $tipe_scan,
                    'cloud_id' => $cloud_id
                ));              
            }

            $numrow++; // Tambah 1 setiap kali looping
        }
        print_r($data_log_absen);
        die;
        $this->AbsensiModel->insert_data_log_absen($data_log_absen);  
        
        //redirect(site_url('gaji/absensi_pegawai/'));
    }
}
