<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Send_email extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'vickyagassi996@gmail.com',    // Ganti dengan email gmail anda
            'smtp_pass' => 'nikenvicky1928',      // Ganti dengan Password gmail anda
            'smtp_port' => 465,
            'crlf'      => "\r\n",
            'newline'   => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('vickyagassi996@gmail.com', 'vickyagassi996@gmail.com');

        // Email penerima
        $this->email->to('mohammadvickyagassi@rocketmail.com'); // Ganti dengan email tujuan anda

        // Lampiran email, isi dengan url/path file
        $this->email->attach('');

        // Subject email
        $this->email->subject('Send Email Dengan SMTP Gmail CodeIgniter 3');

        // Isi email
        $this->email->message("Ini adalah contoh email CodeIgniter yang dikirim menggunakan SMTP email Google (Gmail).<br>"
            . "<br> Klik <strong><a href='https://blog.cacan.id/post/send-email-dengan-smtp-gmail-codeigniter-3' target='_blank' rel='noopener'>disini</a></strong> untuk melihat tutorialnya.");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
?>
            <fieldset>
                <legend>TEST</legend>
                <p>
                    <label>Username:</label>
                    <input type="text" name="username" placeholder="username..." />
                </p>
                <p>
                    <label>Password:</label>
                    <input type="password" name="password" placeholder="password..." />
                </p>
            </fieldset>
        <?php
        } else {
            echo 'Error! email tidak dapat dikirim.';
        ?>
            <fieldset>
                <legend>TEST</legend>
                <p>
                    <label>Username:</label>
                    <input type="text" name="username" placeholder="username..." />
                </p>
                <p>
                    <label>Password:</label>
                    <input type="password" name="password" placeholder="password..." />
                </p>
            </fieldset>
<?php
        }
    }
}
