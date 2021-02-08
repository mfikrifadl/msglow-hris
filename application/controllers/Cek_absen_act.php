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
        //$ket_lain = $this->input->post('ket_lain');

		$data = array(		
            'keterangan' => $this->input->post('keterangan'),
			'ket_lain' => $this->input->post('ket_lain')
		);

		$this->model->Update('log_absen', 'id', $id, $data);
    }
}
