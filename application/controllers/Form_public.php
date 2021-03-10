<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_public extends CI_Controller
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
        $Data = date("Y-m-d h:i:s");
        return $Data;
    }

    public function pengaduan()
    {
        $data['permasalahans'] = $this->db->get('permasalahan')->result_array();
        $this->load->view('public/container/header');
        $this->load->view('public/form_public/pengaduan', $data);
        $this->load->view('public/container/footer');
    }
    public function set_pengaduan()
    {
        $data = $_POST['input'];
        $data['created_at'] = date('Y-m-d');
        $this->db->insert('keluhan', $data);
        $this->session->set_flashdata('flash', 'Aduhan Berhasil Ditambahkan');
        redirect('Form_public/pengaduan');
    }

    public function pengadaan()
    {
        $this->load->view('public/container/header');
        $this->load->view('public/form_public/pengadaan');
        $this->load->view('public/container/footer');
    }

    public function set_pengadaan()
    {
        $pengadaan = ([
            'telepon' => $_POST['telepon'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
        ]);
        $input_pengadaan = $this->db->insert('pengadaan', $pengadaan);
        $input_pengadaan = $this->db->insert_id();
        foreach ($_POST['input'] as $detail) {
            $detail_pengadaan = ([
                'pengadaan_id' => $input_pengadaan,
                'nama' => $detail['nama'],
                'harga' => $detail['harga'],
                'jumlah' => $detail['jumlah'],
                'total' => $detail['jumlah'] * $detail['harga']
            ]);
            $this->db->insert('detail_pengadaan', $detail_pengadaan);
        }
        $this->session->set_flashdata('flash', 'Pengadaan Berhasil Ditambahkan');
        redirect('Form_public/pengadaan');
    }
}
