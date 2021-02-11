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

    public function update_absen()
    {
        $id = $this->input->post('id');
        
		$data = array(		
            //'keterangan' => $this->input->post('keterangan'),
			'ket_lain' => $this->input->post('ket_lain')
		);

		$this->model->Update('log_absen', 'id', $id, $data);
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

    public function cetak_absensi(){
        $tgl = $this->input->post('dTgl_cetak');
        $tgl_end = $this->input->post('dTgl_cetak_end');
        //echo $tgl;

        $data = array(
            'tgl' => $tgl,
            'tgl_end' => $tgl_end
        );

        $data['log_absen'] = $this->model->ViewBetweenOrder('v_log_data_absen','tanggal',$tgl,$tgl_end,'nama');
        $mpdf = new \Mpdf\Mpdf(['autoPageBreak' => true]);
        $html = $this->load->view('admin/gaji/cetak_absensi', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        die();
        redirect(site_url('gaji/absensi_pegawai'));

    }
    
    public function update_absen_keterangan(){
        //$keterangan = $this->input->post('ket');
        $id = $this->input->post('id');

        $data = array(		
            'keterangan' => $this->input->post('ket')			
		);

		$this->model->Update('log_absen', 'id', $id, $data);

    }

}
