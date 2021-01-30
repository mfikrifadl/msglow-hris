<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Send_email_act extends CI_Controller
{

    public function __construct()
    {
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

    public function send_email($controller_name = "", $id = "")
    {

        if ($id == "") {
        } else {

            $db = $this->model->ViewWhere('recruitment', 'id_recruitment', $id);
            $nama_R = "";
            $email_R = "";
            $status_tes = "";
            $next_test = "";
            $tgl_test = "";
            foreach ($db as $key => $vaDataR) {
                $nama_R = strtoupper($vaDataR['nama']);

                $email_R = $vaDataR['email'];
                $tahap_r = strtoupper($vaDataR['tahap_r']);
                $posisi = strtoupper($vaDataR['job']);
                if ($controller_name == "wawancara") {
                    $status_tes = strtoupper($vaDataR['recruitment']);
                }
                if ($controller_name == "psiko_test") {
                    $status_tes = strtoupper($vaDataR['psiko_test']);
                }
                if ($controller_name == "uji_kompetensi") {
                    $status_tes = strtoupper($vaDataR['uji_kompetensi']);
                }
                if ($controller_name == "interview_user_1") {
                    $status_tes = strtoupper($vaDataR['interview_user_1']);
                }
                if ($controller_name == "interview_user_2") {
                    $status_tes = strtoupper($vaDataR['interview_user_2']);
                }
                if ($controller_name == "interview_hrga") {
                    $status_tes = strtoupper($vaDataR['interview_hrga']);
                }
                if ($controller_name == "tes_kesehatan") {
                    $status_tes = strtoupper($vaDataR['tes_kesehatan']);
                }


                $tgl_wawancara = $vaDataR['tanggal_wawancara'];
                $tgl_psikotes = $vaDataR['tgl_psiko_test'];
                $tgl_uk = $vaDataR['tgl_uji_kompetensi'];
                $tgl_interview_u1 = $vaDataR['tgl_interview_user_1'];
                $tgl_interview_u2 = $vaDataR['tgl_interview_user_2'];
                $tgl_interview_hrga = $vaDataR['tgl_interview_hrga'];
                $tgl_tes_kesehatan = $vaDataR['tgl_tes_kesehatan'];

                //========================== FUNGSI NEXT TEST CALON PELAMAR ==============================================

                if ($tahap_r == "TEST ADMINISTRASI") {
                    $next_test = "PSIKOTEST";
                    $tgl_test = $tgl_wawancara;
                } elseif ($tahap_r == "PSIKOTEST") {
                    $next_test = "UJI KOMPETENSI";
                    $tgl_test = $tgl_psikotes;
                } elseif ($tahap_r == "UJI KOMPETENSI") {
                    $next_test = "INTERVIEW USER 1";
                    $tgl_test = $tgl_uk;
                } elseif ($tahap_r == "INTERVIEW USER 1") {
                    $next_test = "INTERVIEW USER 2";
                    $tgl_test = $tgl_interview_u1;
                } elseif ($tahap_r == "INTERVIEW USER 2") {
                    $next_test = "INTERVIEW HRGA";
                    $tgl_test = $tgl_interview_u2;
                } elseif ($tahap_r == "INTERVIEW HRGA") {
                    $next_test = "TES KESEHATAN";
                    $tgl_test = $tgl_interview_hrga;
                } elseif ($tahap_r == "TES KESEHATAN") {
                    $next_test = "SELAMAT ANDA TELAH LOLOS SEMUA TES";
                    $tgl_test = $tgl_tes_kesehatan;
                } else {
                }
                //========================== FUNGSI NEXT TEST CALON PELAMAR ==============================================
            }
            // echo"$tahap_r-$next_test-$tgl_test-$status_tes-$posisi-$nama_R-$email_R";
            //Konfigurasi email
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
            //===================BODY EMAIL PEMANGGILAN TES ADMINISTRASI SAMPAI INTERVIEW HRGA===============================
            $formEmailTidakLolos[] = " 
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

                                    Sehubungan dengan proses Seleksi Recruitment Kandidat Pegawai Baru Di MS Glow Office dengan Posisi Sebagai $posisi. <br />
                                    Kepada Saudara <b>$nama_R</b> bahwa anda telah dinyatakan <b>$status_tes</b> pada tahap <b>$tahap_r</b>. <br /><br />

                                    Terimakasih atas partisipasinya dalam mengikuti serangkaian tahap test dari kami. <br /><br />

                                    Demikian atas perhatian Bapak/Ibu/Sdr. kami sampaikan terimakasih. <br /><br />

                                    Hormat kami,<br /> <br /> <br />


                                    <b><u> Venna.Rosia M., ST., MM., CHRM </u></b><br />
                                    MANAGER HRD. MS GLOW OFFICE MALANG
                                </td>
                            </tr>                    
                            </table> 

                            ";
            //==========================END BODY EMAIL PEMANGGILAN TES ADMINISTRASI SAMPAI INTERVIEW HRGA====================
            //===================BODY EMAIL PEMANGGILAN TES ADMINISTRASI SAMPAI INTERVIEW HRGA===============================
            $formEmailPemanggilan[] = " 
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

                                    Sehubungan dengan proses Seleksi Recruitment Kandidat Pegawai Baru Di MS Glow Office dengan Posisi Sebagai $posisi. <br />
                                    kepada Saudara <b>$nama_R</b> bahwa anda <b>DIPANGGIL</b> untuk mengikuti tes <b>$tahap_r</b> pada tanggal <b>$tgl_test</b>. <br /><br />

                                    Jika Saudara <b>$nama_R</b> berkenan untuk mengikuti tes <b>$tahap_r</b>. <br />
                                    Saudara dapat konfirmasi ke <b>Contact Person 0821-4412-7023</b> <br /><br />

                                    Demikian atas perhatian Bapak/Ibu/Sdr. kami sampaikan terimakasih. <br /><br />

                                    Hormat kami,<br /> <br /> <br />


                                    <b><u> Venna.Rosia M., ST., MM., CHRM </u></b><br />
                                    MANAGER HRD. MS GLOW OFFICE MALANG
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Contact Person 0821-4412-7023
                                </td>
                            </tr>
                            </table> 

                            ";
            //==========================END BODY EMAIL PEMANGGILAN TES ADMINISTRASI SAMPAI INTERVIEW HRGA====================
            //===================BODY EMAIL MASIH MENJALANI TES ADMINISTRASI SAMPAI INTERVIEW HRGA===============================
            $formEmailLolosTest[] = " 
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

                                        Sehubungan dengan proses Seleksi Recruitment Kandidat Pegawai Baru Di MS Glow Office dengan Posisi Sebagai $posisi. <br />
                                        kepada Saudara <b>$nama_R</b> bahwa anda telah dinyatakan <b>$status_tes</b> pada tahap <b>$tahap_r</b>. <br /><br />

                                        Kepada Saudara <b>$nama_R</b> dapat melanjutkan tes ke tahap selanjutnya yaitu <b>$next_test</b>. <br />
                                        Kami segera mengumumkan Tanggal tes selanjutnya di email ini.<br /><br />

                                        Demikian atas perhatian Bapak/Ibu/Sdr. kami sampaikan terimakasih. <br /><br />

                                        Hormat kami,<br /> <br /> <br />


                                        <b><u> Venna.Rosia M., ST., MM., CHRM </u></b><br />
                                        MANAGER HRD. MS GLOW OFFICE MALANG
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Contact Person 0821-4412-7023
                                    </td>
                                </tr>
                            </table> 

                            ";
            //==========================END BODY EMAIL MASIH MENJALANI TES ADMINISTRASI SAMPAI INTERVIEW HRGA====================

            //===================BODY EMAIL TES KESEHATAN================================================================
            $formEmailTesKesehatan[] = " 
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

                                    Sehubungan dengan proses Seleksi Recruitment Kandidat Pegawai Baru Di MS Glow Office dengan Posisi Sebagai $posisi. <br />
                                    maka kepada Saudara <b>$nama_R</b> bahwa anda telah dinyatakan <b>$status_tes</b>. <br /><br />

                                    Kepada Saudara <b>$nama_R</b> silahkan melakukan tes kesehatan pada tanggal <b>$tgl_test</b> di Clinic Ms Glow Malang : <br /><br />
                                    <b> Alamat : Jl. Guntur No.08, Oro-oro Dowo, Kec. Klojen, Kota Malang, Jawa Timur 65119 </b> <br />
                                    <b> Kirim Hasil Tes Kesehatan di Nomor WA : 0857-8567-8038 </b>

                                    Demikian atas perhatian Bapak/Ibu/Sdr. kami sampaikan terimakasih. <br /><br />

                                    Hormat kami,<br /> <br /> <br />


                                    <b><u> Venna.Rosia M., ST., MM., CHRM </u></b><br />
                                    MANAGER HRD. MS GLOW OFFICE MALANG
                                </td>
                            </tr>

                            </table> 

                            ";
            //==========================END BODY EMAIL TES KESEHATAN=========================================================

            //===================BODY EMAIL LOLOS SEMUA TES================================================================
            $formEmailCompleted[] = " 
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

                                    Sehubungan dengan proses Seleksi Recruitment Kandidat Pegawai Baru Di MS Glow Office dengan Posisi Sebagai $posisi. <br />
                                    maka kepada Saudara <b>$nama_R</b> bahwa anda telah dinyatakan <b>$next_test</b>. <br /><br />

                                    Kepada Saudara <b>$nama_R</b> dapat masuk kerja mulai tanggal <b>$tgl_test</b> <br />

                                    Demikian atas perhatian Bapak/Ibu/Sdr. kami sampaikan terimakasih. <br /><br />

                                    Hormat kami,<br /> <br /> <br />


                                    <b><u> Venna.Rosia M., ST., MM., CHRM </u></b><br />
                                    MANAGER HRD. MS GLOW OFFICE MALANG
                                </td>
                            </tr>

                            </table> 

                            ";
            //==========================END BODY EMAIL LOLOS SEMUA TES====================

            if ($next_test == "SELAMAT ANDA TELAH LOLOS SEMUA TES") {

                // Load library email dan konfigurasinya
                $this->load->library('email', $config);

                // Email dan nama pengirim
                $this->email->from('emailtester965@gmail.com', 'MS GLOW OFFICE MALANG');

                // Email penerima
                $this->email->to("$email_R"); // Ganti dengan email tujuan anda

                // Lampiran email, isi dengan url/path file
                $this->email->attach('');

                // Subject email
                $this->email->subject('RECRUITMENT MS GLOW OFFICE MALANG');

                // Isi email
                $this->email->message("$formEmailCompleted[0]");

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
            }  else {

                // Load library email dan konfigurasinya
                $this->load->library('email', $config);

                // Email dan nama pengirim
                $this->email->from('vickyagassi996@gmail.com', 'MS GLOW OFFICE MALANG');

                // Email penerima
                $this->email->to("$email_R"); // Ganti dengan email tujuan anda

                // Lampiran email, isi dengan url/path file
                $this->email->attach('');

                // Subject email
                $this->email->subject('RECRUITMENT MS GLOW OFFICE MALANG');

                // Isi email
                // Isi email
                if ($status_tes == "PEMANGGILAN") {
                    $this->email->message("$formEmailPemanggilan[0]");
                }
                if ($status_tes == "LOLOS") {
                    $this->email->message("$formEmailLolosTest[0]");
                }
                if ($status_tes == "TIDAKLOLOS") {
                    $this->email->message("$formEmailTidakLolos[0]");
                }

                // Tampilkan pesan sukses atau error
                if ($this->email->send()) {
                    if ($controller_name == "wawancara") {
                        $data = array();
                        if ($status_tes == "TIDAKLOLOS") {
                            $data = array(
                                'status_email_tidaklolos' => "DELIVERED"
                            );
                        } else {
                            $data = array(
                                'status_email_adm' => "DELIVERED"
                            );
                        }
                        $this->model->Update('recruitment', 'id_recruitment', $id, $data);
                    } elseif ($controller_name == "psiko_test") {
                        $data = array();
                        if ($status_tes == "TIDAKLOLOS") {
                            $data = array(
                                'status_email_tidaklolos' => "DELIVERED"
                            );
                        } else {
                            $data = array(
                                'status_email_p' => "DELIVERED"
                            );
                        }
                        $this->model->Update('recruitment', 'id_recruitment', $id, $data);
                    } elseif ($controller_name == "uji_kompetensi") {
                        $data = array();
                        if ($status_tes == "TIDAKLOLOS") {
                            $data = array(
                                'status_email_tidaklolos' => "DELIVERED"
                            );
                        } else {
                            $data = array(
                                'status_email_uk' => "DELIVERED"
                            );
                        }
                        $this->model->Update('recruitment', 'id_recruitment', $id, $data);
                    } elseif ($controller_name == "interview_user_1") {
                        $data = array();
                        if ($status_tes == "TIDAKLOLOS") {
                            $data = array(
                                'status_email_tidaklolos' => "DELIVERED"
                            );
                        } else {
                            $data = array(
                                'status_email_u1' => "DELIVERED"
                            );
                        }
                        $this->model->Update('recruitment', 'id_recruitment', $id, $data);
                    } elseif ($controller_name == "interview_user_2") {
                        $data = array();
                        if ($status_tes == "TIDAKLOLOS") {
                            $data = array(
                                'status_email_tidaklolos' => "DELIVERED"
                            );
                        } else {
                            $data = array(
                                'status_email_u2' => "DELIVERED"
                            );
                        }
                        $this->model->Update('recruitment', 'id_recruitment', $id, $data);
                    } elseif ($controller_name == "interview_hrga") {
                        $data = array();
                        if ($status_tes == "TIDAKLOLOS") {
                            $data = array(
                                'status_email_tidaklolos' => "DELIVERED"
                            );
                        } else {
                            $data = array(
                                'status_email_hrga' => "DELIVERED"
                            );
                        }
                        $this->model->Update('recruitment', 'id_recruitment', $id, $data);
                    } elseif ($controller_name == "tes_kesehatan") {
                        $data = array();
                        if ($status_tes == "TIDAKLOLOS") {
                            $data = array(
                                'status_email_tidaklolos' => "DELIVERED"
                            );
                        } else {
                            $data = array(
                                'status_email_p' => "DELIVERED"
                            );
                        }
                        $this->model->Update('recruitment', 'id_recruitment', $id, $data);
                    }else {
                    }
                } else {
                    if ($controller_name == "wawancara") {
                        $data = array();
                        if ($status_tes == "TIDAKLOLOS") {
                            $data = array(
                                'status_email_tidaklolos' => "NOT SENT"
                            );
                        } else {
                            $data = array(
                                'status_email_adm' => "NOT SENT"
                            );
                        }
                        $this->model->Update('recruitment', 'id_recruitment', $id, $data);
                    } elseif ($controller_name == "psiko_test") {
                        $data = array();
                        if ($status_tes == "TIDAKLOLOS") {
                            $data = array(
                                'status_email_tidaklolos' => "NOT SENT"
                            );
                        } else {
                            $data = array(
                                'status_email_p' => "NOT SENT"
                            );
                        }
                        $this->model->Update('recruitment', 'id_recruitment', $id, $data);
                    } elseif ($controller_name == "uji_kompetensi") {
                        $data = array();
                        if ($status_tes == "TIDAKLOLOS") {
                            $data = array(
                                'status_email_tidaklolos' => "NOT SENT"
                            );
                        } else {
                            $data = array(
                                'status_email_uk' => "NOT SENT"
                            );
                        }
                        $this->model->Update('recruitment', 'id_recruitment', $id, $data);
                    } elseif ($controller_name == "interview_user_1") {
                        $data = array();
                        if ($status_tes == "TIDAKLOLOS") {
                            $data = array(
                                'status_email_tidaklolos' => "NOT SENT"
                            );
                        } else {
                            $data = array(
                                'status_email_u1' => "NOT SENT"
                            );
                        }
                        $this->model->Update('recruitment', 'id_recruitment', $id, $data);
                    } elseif ($controller_name == "interview_user_2") {
                        $data = array();
                        if ($status_tes == "TIDAKLOLOS") {
                            $data = array(
                                'status_email_tidaklolos' => "NOT SENT"
                            );
                        } else {
                            $data = array(
                                'status_email_u2' => "NOT SENT"
                            );
                        }
                        $this->model->Update('recruitment', 'id_recruitment', $id, $data);
                    } elseif ($controller_name == "interview_hrga") {
                        $data = array();
                        if ($status_tes == "TIDAKLOLOS") {
                            $data = array(
                                'status_email_tidaklolos' => "NOT SENT"
                            );
                        } else {
                            $data = array(
                                'status_email_hrga' => "NOT SENT"
                            );
                        }
                        $this->model->Update('recruitment', 'id_recruitment', $id, $data);
                    } elseif ($controller_name == "tes_kesehatan") {
                        $data = array();
                        if ($status_tes == "TIDAKLOLOS") {
                            $data = array(
                                'status_email_tidaklolos' => "NOT SENT"
                            );
                        } else {
                            $data = array(
                                'status_email_p' => "NOT SENT"
                            );
                        }
                        $this->model->Update('recruitment', 'id_recruitment', $id, $data);
                    } else {
                    }
                }
            }

            redirect(site_url('recruitment/' . $controller_name . '/S'));
        }
    }
}
