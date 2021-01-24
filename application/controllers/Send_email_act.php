<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send_email_act extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //MenLoad model yang berada di Folder Model dan namany model
		$this->load->model('model');
		$this->load->model('relasi');
		// Meload Library session 
		$this->load->library('session');
		// Meload database
		$this->load->database();
		// Meload url 
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('download');
    }    
    
    public function send_email($id = ""){

                if($id == ""){

        }else{

            $db = $this->model->ViewWhere('recruitment', 'id_recruitment', $id);
			$nama_R = "";
            $email_R = "";
            $status_tes = "";
			foreach ($db as $key => $vaDataR) {
				$nama_R = $vaDataR['nama'];
                $status_tes = $vaDataR['psiko_test'];
                $email_R = $vaDataR['email'];
                $tahap_r = $vaDataR['tahap_r'];

                $next_test = "";

                if($tahap_r == "Test Administrasi"){
                    $next_test = "Psikotes";
                }elseif($tahap_r == "Psikotest"){
                    $next_test = "Uji Kompetensi";
                }elseif($tahap_r == "Uji Kompetensi"){
                    $next_test = "Interview User 1";
                }elseif($tahap_r == "Interview User 1"){
                    $next_test = "Interview User 2";
                }elseif($tahap_r == "Interview User 2"){
                    $next_test = "Interview HRGA";
                }elseif($tahap_r == "Interview HRGA"){
                    $next_test = "SELAMAT ANDA TELAH LOLOS SEMUA TES";
                }else{

                }

			}

            // Konfigurasi email
            $config = [
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'protocol'  => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_user' => 'emailtester965@gmail.com',    // Ganti dengan email gmail anda
                'smtp_pass' => 'qwerty@123',      // Ganti dengan Password gmail anda
                'smtp_port' => 465,
                'crlf'      => "\r\n",
                'newline'   => "\r\n"
            ];
//===================BODY EMAIL MASIH MENJALANI TES ADMINISTRASI SAMPAI INTERVIEW HRGA===============================
            $formEmail1[]=" 
                        <table width=700>
                        <tr>
                            <td>
                                MS GLOW OFFICE MALANG <br />
                                HRD MS GLOW OFFICE
                                <hr>
                            </td>
                        <tr>
                            <td>
                                Kepada Yth. $nama_R
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Dengan hormat, <br /> <br />

                                Sehubungan dengan keikutsertaan Seleksi Calon Pegawai Baru Di MS Glow dengan Posisi Sebagai __________. <br />
                                kepada Saudara <b>$nama_R</b> bahwa anda telah <b>$status_tes</b> pada tahap <b>$tahap_r</b>. <br /><br />

                                Kepada Saudara <b>$nama_R</b> akan melanjutkan tes selanjutnya yaitu <b>$next_test</b>. <br /><br />
                                
                                Demikian atas perhatian Bapak/Ibu/Sdr. kami sampaikan terimakasih. <br /><br />

                                Hormat kami,<br /> <br /> <br />


                                <b><u> Venna. </u></b><br />
                                MANAGER HRD. MS GLOW OFFICE MALANG
                            </td>
                        </tr>
                    </table> 
					
                    ";
//==========================END BODY EMAIL MASIH MENJALANI TES ADMINISTRASI SAMPAI INTERVIEW HRGA====================

//===================BODY EMAIL LOLOS SEMUA TES================================================================
                    $formEmail2[]=" 
                    <table width=700>
                    <tr>
                        <td>
                            MS GLOW OFFICE MALANG <br />
                            HRD MS GLOW OFFICE
                            <hr>
                        </td>
                    <tr>
                        <td>
                            Kepada Yth. $nama_R
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Dengan hormat, <br /> <br />

                            Sehubungan dengan keikutsertaan Seleksi Calon Pegawai Baru Di MS Glow dengan Posisi Sebagai __________. <br />
                            kepada Saudara <b>$nama_R</b> bahwa anda telah <b>$next_test</b>. <br /><br />

                            Kepada Saudara <b>$nama_R</b> silahkan melakukan tes kesehatan di Clinic Ms Glow Malang di : <br /><br />
                            <b> Alamat : Jl. Guntur No.08, Oro-oro Dowo, Kec. Klojen, Kota Malang, Jawa Timur 65119 </b> <br />
                            <b> Kirim Hasil Tes Kesehatan di Nomor WA : 0857-8567-8038 </b>
                            
                            Demikian atas perhatian Bapak/Ibu/Sdr. kami sampaikan terimakasih. <br /><br />

                            Hormat kami,<br /> <br /> <br />


                            <b><u> Venna. </u></b><br />
                            MANAGER HRD. MS GLOW OFFICE MALANG
                        </td>
                    </tr>

                    </table> 

                    ";
//==========================END BODY EMAIL LOLOS SEMUA TES====================

            if($next_test == "SELAMAT ANDA TELAH LOLOS SEMUA TES"){

            // Load library email dan konfigurasinya
            $this->load->library('email', $config);

            // Email dan nama pengirim
            $this->email->from('emailtester965@gmail.com', 'emailtester965@gmail.com');

            // Email penerima
            $this->email->to("$email_R"); // Ganti dengan email tujuan anda

            // Lampiran email, isi dengan url/path file
            $this->email->attach('');

            // Subject email
            $this->email->subject('Send Email Dengan SMTP Gmail CodeIgniter 3');

            // Isi email
            $this->email->message("$formEmail2[0]");

            // Tampilkan pesan sukses atau error
            if ($this->email->send()) {
                $data = array(
                    'status_email_p' => "DELIVERED"    
                );
                $this->model->Update('recruitment', 'id_recruitment', $id, $data);
            } else {
                $data = array(
                    'status_email_p' => "NOT SENT"    
                );
                $this->model->Update('recruitment', 'id_recruitment', $id, $data);
            }

            }else{

                    // Load library email dan konfigurasinya
                    $this->load->library('email', $config);

                    // Email dan nama pengirim
                    $this->email->from('vickyagassi996@gmail.com', 'vickyagassi996@gmail.com');

                    // Email penerima
                    $this->email->to("$email_R"); // Ganti dengan email tujuan anda

                    // Lampiran email, isi dengan url/path file
                    $this->email->attach('');

                    // Subject email
                    $this->email->subject('RECRUITMENT MS GLOW EMPLOYEE');

                    // Isi email
                    $this->email->message("$formEmail1[0]");

                    // Tampilkan pesan sukses atau error
                    if ($this->email->send()) {
                        $data = array(
                            'status_email_p' => "DELIVERED"    
                        );
                        $this->model->Update('recruitment', 'id_recruitment', $id, $data);
                    } else {
                        $data = array(
                            'status_email_p' => "NOT SENT"    
                        );
                        $this->model->Update('recruitment', 'id_recruitment', $id, $data);
                    }

            }
    
            redirect(site_url('recruitment/psiko_test/S'));
        }
      
    }

}    