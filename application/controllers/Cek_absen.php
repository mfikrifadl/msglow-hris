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
        $data['row']    = $this->relasi->GetDataAbsensi_tabel_new();

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
                $this->load->view('admin/gaji/absensi', $data);
                $this->load->view('admin/container/footer');
            } else { // Jika proses upload gagal
                $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan		

                $dataHeader['menu'] = 'Manajemen Gaji';
                $dataHeader['file'] = 'Absensi Pegawai';
                $data['action'] = $Aksi;
                $data['id_absen']    =    $Id;

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
                $this->load->view('admin/gaji/absensi', $data);
                $this->load->view('admin/container/footer');
            }
        }


        // $this->load->view('admin/gaji/absensi', $data);
    }

    public function import()
    {
        //=================================ALGORITMA ABSENSI PER HARI ===========================================
        $dTgl = $this->input->post('dTgl');
        
        //echo "$dTgl - $dTgl_end <br />";

        $data_absensi = $this->model->View('attlog');
        $data_log_absen = array();
        $no = 0;

        $response 			= $this->cURL_API('', 'GET', '');
		$data2 				= json_decode($response, true);
		$dataAttlog	= $data2['data'];

        foreach ($dataAttlog as $key => $vaArea) {
            $c_id = date("YmdHis");
            ++$no;
            // $tgl_hari_ini = date('Y-m-d');

            $pin = $vaArea['pin'];
            $attlog = $vaArea['attlog'];
            $verify = $vaArea['verify'];
            $status_scan = $vaArea['status_scan'];
            $cloud_id = $vaArea['cloud_id'];

            $a_attlog = explode(" ", $attlog);
            $tgl = $a_attlog[0];
            $waktu = $a_attlog[1];

            $t_dTgl = new DateTime($dTgl);
            
            $tgl_attlog = new DateTime($tgl);

            if ($t_dTgl == $tgl_attlog) {
                $id = $c_id + $no;
                // echo "id : $id <br />";
                // echo "pin : $pin <br />";
                // echo "attlog : $attlog <br />";
                // echo "tanggal cek roll : $tgl <br />";
                // echo "waktu cek roll : $waktu <br />";
                // echo "verify : $verify <br />";
                // echo "status_scan : $status_scan <br />";
                // echo "cloud_id : $cloud_id <br /><br />";

                array_push($data_log_absen, array(
                    'id'    => $id,
                    'pin' => $pin,
                    'attlog' => $attlog,
                    'tanggal' => $tgl,
                    'waktu' => $waktu,
                    'verify' => $verify,
                    'status_scan' => $status_scan,
                    'cloud_id' => $cloud_id
                ));
            } else {
                
            }

            //=================================END ALGORITMA ABSENSI PER HARI ===========================================

        }

        $this->AbsensiModel->insert_data_log_absen($data_log_absen);
        redirect(site_url('gaji/absensi_pegawai/'));
    }

    public function get_data_absensi()
    {
        $dTgl = $this->input->post('dTgl');
        $dTgl_end = $this->input->post('dTgl_end');

        $time_a = date('H:i:s', mktime(0, 0, 0));
        $time_b = date('H:i:s', mktime(23, 59, 59));

        $x = $dTgl . " " . $time_a;
        $y = $dTgl_end . " " . $time_b;
        //echo "$y";

        $data = array(
            'dTgl' => $dTgl,
            'dTgl_end' => $dTgl_end

        );

        //$data['data_absensi'] = $this->model->ViewWhereLikeOr('attlog','attlog',$dTgl,'attlog',$dTgl_end);
        $data['data_absensi'] = $this->model->ViewBetween('attlog', 'attlog', $x, $y);

        $this->load->view('admin/gaji/tb_absensi', $data);
        $this->load->view('admin/container/footer_dataTable');
    }

    function cURL_API($dTgl = "", $method = "")
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://103.157.96.97/msglow-hris/api/attlog/' . $dTgl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => array(
                'token: YOZq0ltM8i',
                'Authorization: Basic YWNjZXNzdG86Y2FyZWVyMTIzNDU='
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }    

    public function attlog_id($Id = "")
    {
        $content = $this->cURL_API($Id, 'GET', '');

        echo $content;
    }

    public function get_data_absensi_per_hari()
    {
        $dTgl = $this->input->post('dTgl');


        $time_a = date('H:i:s', mktime(0, 0, 0));
        $time_b = date('H:i:s', mktime(23, 59, 59));

        $x = $dTgl . " " . $time_a;
        $y = $dTgl . " " . $time_b;
        //echo "$y";

        $data = array(
            'dTgl' => $dTgl
        );

        $response 			= $this->cURL_API('', 'GET', '');
		$data2 				= json_decode($response, true);
		$data['attlog']	= $data2['data'];

        //$data['data_absensi'] = $this->model->ViewWhereLikeOr('attlog','attlog',$dTgl,'attlog',$dTgl_end);
        $data['data_absensi'] = $this->model->ViewBetween('attlog', 'attlog', $x, $y);

        $this->load->view('admin/gaji/tb_absensi', $data);
        $this->load->view('admin/container/footer_dataTable');
    }

    public function get_data_absensi_import()
    {
        $dTgl_cetak = $this->input->post('dTgl_cetak');
        $dTgl_cetak_end = $this->input->post('dTgl_cetak_end');

        $data = array(
            'dTgl_cetak' => $dTgl_cetak,
            'dTgl_cetak_end' => $dTgl_cetak_end
        );

        $data['row'] = $this->model->ViewBetweenAbsensi($dTgl_cetak, $dTgl_cetak_end);
        $this->load->view('admin/gaji/tb_absensi_import', $data);
        $this->load->view('admin/container/footer_dataTable');
    }

    public function get_data_absensi_import_per_hari()
    {
        $dTgl_cetak = $this->input->post('dTgl_cetak');

        $data = array(
            'dTgl_cetak' => $dTgl_cetak
        );

        $data['row'] = $this->model->ViewAbsensiPerHari($dTgl_cetak);
        $this->load->view('admin/gaji/tb_absensi_import', $data);
        $this->load->view('admin/container/footer_dataTable');
    }

}
