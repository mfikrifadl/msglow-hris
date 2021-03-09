<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cek_absen_act extends CI_Controller
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



    // public function cetak_absensi(){
    //     $tgl = $this->input->post('dTgl_cetak');
    //     //echo $tgl;

    //     $data = array(
    //         'tgl' => $tgl
    //     );

    //     $data['log_absen'] = $this->model->ViewWhere('v_log_data_absen', 'tanggal', $tgl);
    //     $mpdf = new \Mpdf\Mpdf(['autoPageBreak' => true]);
    //     $html = $this->load->view('admin/gaji/cetak_absensi', $data, true);
    //     $mpdf->WriteHTML($html);
    //     $mpdf->Output();
    //     redirect(site_url('gaji/absensi_pegawai'));

    // }

    public function cetak_absensi()
    {
        $tgl = $this->input->post('dTgl_cetak');
        $tgl_end = $this->input->post('dTgl_cetak_end');
        $data = array(
            'tgl' => $tgl,
            'tgl_end' => $tgl_end
        );

        if (isset($_POST["PDF"])) {
            //echo "PDF";
            $data['log_absen'] = $this->model->ViewBetweenAbsensiPerHari($tgl);
            $mpdf = new \Mpdf\Mpdf(['autoPageBreak' => true]);
            $html = $this->load->view('admin/gaji/cetak_absensi', $data, true);
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            //die();
            redirect(site_url('gaji/absensi_pegawai'));
        } elseif (isset($_POST["EXCEL"])) {
            //echo "EXCEL";
            $data['log_absen'] = $this->model->ViewBetweenAbsensiPerHari($tgl);
            $this->load->view('admin/gaji/export_excel_absensi', $data);
        } else {
        }
    }

    public function update_absen_keterangan()
    {
        //$keterangan = $this->input->post('ket');
        date_default_timezone_set('Asia/Jakarta');

        $id = $this->input->post('id');
        $date_time = date("Y-m-d H:i:s");

        $dataInsert = array(
            'id'           => $this->input->post('id'),
            'pin' =>  $this->input->post('nik_ket_update'),
            //'keterangan' => $this->input->post('ket'),
            'tanggal' => $this->input->post('dTgl_cetak'),
            'tgl_update' => $date_time,
        );
        $dataUpdate = array(
            //'keterangan' => $this->input->post('ket'),
            'tgl_update' => $date_time,
        );

        $data_temp_insert = array(
            'id_temp'           => $this->input->post('id'),
            'pin_temp' =>  $this->input->post('nik_ket_update'),
            'tanggal_temp' => $this->input->post('dTgl_cetak'),
            'keterangan_temp' => $this->input->post('ket'),
            'tgl_update_temp' => $date_time,
            'status_update_temp' => 1
        );
        $data_temp_update = array(
            'keterangan_temp' => $this->input->post('ket'),
            'tgl_update_temp' => $date_time,
            'status_update_temp' => 1
        );

        $cViewLogAbsen = $this->db->query("SELECT * FROM log_absen  WHERE id = '" . $id . "' ");
        if ($cViewLogAbsen->num_rows() > 0) {
            $this->model->Update('log_absen', 'id', $id, $dataUpdate);
        } else {
            $this->model->Insert('log_absen', $dataInsert);
        }
        //$this->model->Update('log_absen', 'id', $id, $data);

        $cView = $this->db->query("SELECT * FROM temp_log_absen  WHERE id_temp = '" . $id . "' ");
        if ($cView->num_rows() > 0) {
            $this->model->Update('temp_log_absen', 'id_temp', $id, $data_temp_update);
        } else {
            $this->model->Insert('temp_log_absen', $data_temp_insert);
        }
    }

    public function update_absen()
    {
        $id = $this->input->post('id');
        $date_time = date("Y-m-d H:i:s");

        $dataInsert = array(
            'id'           => $this->input->post('id'),
            'pin' =>  $this->input->post('nik_ket_update'),
            //'ket_lain' => $this->input->post('ket_lain'),
            'tanggal' => $this->input->post('dTgl_cetak'),
            'tgl_update' => $date_time,
        );

        $dataUpdate = array(
            //'ket_lain' => $this->input->post('ket_lain'),            
            'tgl_update' => $date_time,
        );

        $data_temp_insert = array(
            'id_temp'           => $this->input->post('id'),
            'pin_temp' =>  $this->input->post('nik_ket_update'),
            'tanggal_temp' => $this->input->post('dTgl_cetak'),
            'ket_lain_temp' => $this->input->post('ket_lain'),
            'tgl_update_temp' => $date_time,
            'status_update_temp' => 1
        );

        $data_temp_update = array(
            'ket_lain_temp' => $this->input->post('ket_lain'),
            'tgl_update_temp' => $date_time,
            'status_update_temp' => 1
        );

        $cViewLogAbsen = $this->db->query("SELECT * FROM log_absen  WHERE id = '" . $id . "' ");
        if ($cViewLogAbsen->num_rows() > 0) {
            $this->model->Update('log_absen', 'id', $id, $dataUpdate);
        } else {
            $this->model->Insert('log_absen', $dataInsert);
        }

        //$this->model->Update('log_absen', 'id', $id, $data);
        $cView = $this->db->query("SELECT * FROM temp_log_absen  WHERE id_temp = '" . $id . "' ");
        if ($cView->num_rows() > 0) {
            $this->model->Update('temp_log_absen', 'id_temp', $id, $data_temp_update);
        } else {
            $this->model->Insert('temp_log_absen', $data_temp_insert);
        }
    }

    public function reject_update()
    {
        $id = $this->input->post('id');
        $this->model->Delete('temp_log_absen', 'id_temp', $id);
    }

    public function approvement_update()
    {
        $id = $this->input->post('id');
        $dTgl_cetak = $this->input->post('dTgl_cetak');
        $dTgl_cetak_end = $this->input->post('dTgl_cetak_end');

        $data = array(
            'keterangan' => $this->input->post('keterangan'),
            'ket_lain' => $this->input->post('ket_lain')
        );

        $this->model->Update('log_absen', 'id', $id, $data);
        $this->model->Delete('temp_log_absen', 'id_temp', $id);
    }
}
