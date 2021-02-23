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

    public function index($Aksi = "", $Id = "")
    {
        $data['siswa'] = $this->AbsensiModel->view();
        $dataHeader['menu'] = 'Manajemen Gaji';
        $dataHeader['file'] = 'Absensi Pegawai';
        $data['action']     = $Aksi;
        $data['id_absen']    =    $Id;
        $this->load->view('admin/container/header', $dataHeader);
        $this->load->view('admin/gaji/absensi2', $data);
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
                $this->load->view('admin/gaji/absensi2', $data);
                $this->load->view('admin/container/footer');
            } else { // Jika proses upload gagal
                $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan		

                $dataHeader['menu'] = 'Manajemen Gaji';
                $dataHeader['file'] = 'Absensi Pegawai';
                $data['action'] = $Aksi;
                $data['id_absen']    =    $Id;

                $this->load->view('admin/container/header', $dataHeader);
                $this->load->view('admin/gaji/absensi2', $data);
                $this->load->view('admin/container/footer');
            }
        }


        // $this->load->view('admin/gaji/absensi', $data);
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

        $pin = "";
        $attlog = "";
        $verify = "";
        $status_scan = "";
        $cloud_id = "";
        $tgl = "";
        $waktu = "";

        $looping = $this->input->post('numrow');

        $numrow = 1;

        foreach ($sheet as $row) {
            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if ($numrow > 1 && $numrow < $looping) {

                $nik = $row['A']; // Ambil data NIS
                $nama = $row['B']; // Ambil data nama
                $statusK = $row['C']; // Ambil data jenis kelamin
                $tgl_mulai_kerja = $row['D']; // Ambil data alamat
                $status_kepegawaian = $row['E']; // Ambil data NIS
                $jk = $row['F']; // Ambil data nama
                $agama = $row['G']; // Ambil data jenis kelamin
                $tmpt_lahir = $row['H']; // Ambil data alamat
                $tgl_lahir = $row['I']; // Ambil data alamat
                $pendidikan = $row['J']; // Ambil data alamat
                $jurusan = $row['K']; // Ambil data alamat
                $gol_dar = $row['L']; // Ambil data alamat
                $status_kawin = $row['M'];
                $istri_suami = $row['N'];
                $tgl_lahir_pas = $row['O'];
                $anak1 = $row['P'];
                $tgl_lahir_a1 = $row['Q'];
                $anak2 = $row['R'];
                $tgl_lahir_a2 = $row['S'];
                $anak3 = $row['T'];
                $tgl_lahir_a3 = $row['U'];
                $ktp = $row['V'];
                $alamat_asal = $row['W'];
                $alamat = $row['X'];
                $npwp = $row['Y'];
                $hp = $row['Z'];
                $atas_nama = $row['AA'];
                $no_rek = $row['AB'];
                $bank = $row['AC'];
                $cabang = $row['AD'];
                $email = $row['AE'];


                // echo "pin : $pin <br />";
                // echo "attlog : $attlog <br />";
                // echo "tanggal cek roll : $tgl <br />";
                // echo "waktu cek roll : $waktu <br />";
                // echo "verify : $verify <br />";
                // echo "status_scan : $status_scan <br />";
                // echo "cloud_id : $cloud_id <br /><br />";

                array_push($data_log_absen, array(
                    'kode_wawancara' => $nik,
                    'nik' => $row['A'],
                    'nama' => $row['B'],
                    'id_area' => $row['C'],
                    'id_status' => $row['D'],
                    'tanggal_masuk_kerja' => $row['E'],
                    'id_kerja' => $row['F'],
                    'jk' => $row['G'],
                    'agama' => $row['H'],
                    'tempat_lahir' => $row['I'],
                    'tanggal_lahir' => $row['J'],
                    'pendidikan' => $row['K'],
                    'jurusan' => $row['L'],
                    'gol_darah' => $row['M'],
                    'istri_suami' => $row['N'],
                    'tgl_lahir_istri' => $row['O'],
                    'anak_1' => $row['P'],
                    'tgl_lahir_anak_1' => $row['Q'],
                    'anak_2' => $row['R'],
                    'tgl_lahir_anak_2' => $row['S'],
                    'anak_3' => $row['T'],
                    'tgl_lahir_anak_3' => $row['U'],
                    'no_ktp' => $row['V'],
                    'alamat_asal' => $row['W'],
                    'alamat' => $row['X'],
                    'no_npwp' => $row['Y'],
                    'handphone' => $row['Z'],
                    'atas_nama' => $row['AA'],
                    'no_rekening' => $row['AB'],
                    'jenis_pembayaran' => $row['AC'],
                    'cabang_bank' => $row['AD'],
                    'email' => $row['AE']

                ));



                // $CekPin = $this->db->query("SELECT pin FROM master_pegawai WHERE pin = '$pin' ");
                // if ($CekPin->num_rows() > 0) {
                //     //    echo "sudah ada di database <br />";
                // } else {
                //     $this->db->query("INSERT INTO master_pegawai (pin) VALUES ('$pin') ");
                //     // echo "belum ada di database <br />";
                // }
            }

            $numrow++; // Tambah 1 setiap kali looping
        }
       
        $this->AbsensiModel->insert_data_log_absen($data_log_absen);  

        // $data['row']		= $this->relasi->GetDataLogAbsensi($tgl);

        // $Query = $this->db->query("SELECT * FROM v_log_absen WHERE tanggal = '$tgl' ");
        // $result = $mysqli->query($Query);
        // $followingdata = $result->fetch_array(MYSQLI_ASSOC);
        // foreach ($row as $key => $Row) {
        //    $jam_datang = $Row['jam_datang'];
        //    $jam_pulang = $Row['jam_pulang'];

        //    echo "jam datang : $jam_datang <br /> jam pulang : $jam_pulang <br /><br />";
        // }  

?>
        <!-- <script type="text/javascript">
            alert("DATA TELAH BERHASIL DI SIMPAN");
            window.location.href = "<?= site_url('cek_absen2') ?>";
        </script> -->
<?php
        // redirect("cek_absen2"); // Redirect ke halaman awal (ke controller siswa fungsi index)
    }
}
