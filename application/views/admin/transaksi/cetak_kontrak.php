<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
function hari_ini($hari)
{
    switch ($hari) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }
    return $hari_ini;
}

function bulan_ini($bulan)
{
    switch ($bulan) {
        case 'Jan':
            $bulan_ini = "Januari";
            break;

        case 'Feb':
            $bulan_ini = "Februari";
            break;

        case 'Mar':
            $bulan_ini = "Maret";
            break;

        case 'Apr':
            $bulan_ini = "April";
            break;

        case 'May':
            $bulan_ini = "Mei";
            break;

        case 'Jun':
            $bulan_ini = "Juni";
            break;

        case 'Jul':
            $bulan_ini = "Juli";
            break;

        case 'Aug':
            $bulan_ini = "Agustus";
            break;

        case 'Sep':
            $bulan_ini = "September";
            break;

        case 'Oct':
            $bulan_ini = "Oktober";
            break;

        case 'Nov':
            $bulan_ini = "November";
            break;

        case 'Dec':
            $bulan_ini = "Desember";
            break;

        default:
            $bulan_ini = "Tidak di ketahui";
            break;
    }
    return $bulan_ini;
}
?>

<body>
    <table>
        <tr>
            <td valign='top' colspan=6 align="center"><B><U>PERJANJIAN KERJA WAKTU TERTENTU</U></B></td>
        </tr>
        <tr>
            <td valign='top' colspan=6 align="center"><B><?= $data[0]['no_surat']; ?></B></td>
        </tr>
        <tr>
            <td valign='top' colspan=6><br /></td>
        </tr>
        <tr>
            <td valign='top' colspan=6>Pada hari ini, <?= hari_ini(date("D")) ?> Tanggal <?= date('d') ?> Bulan <?= bulan_ini(date('M')) ?> Tahun <?= date('Y') ?> (
                ........ ) bertempat di kantor <B>PT KOSMETIKA CANTIK INDONESIA</B> di Malang, telah
                diadakan kesepakatan antara :</td>
        </tr>
        <tr>
            <td valign='top' width='0px'>I.</td>
            <td valign='top' colspan=2>Nama</td>
            <td valign='top' width='0px'>:</td>
            <td valign='top' colspan=2><B>GILANG WIDYA PRAMANA</B></td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top' colspan=2>Jabatan</td>
            <td valign='top'>:</td>
            <td valign='top' colspan=2><B>DIREKTUR PT KOSMETIKA CANTIK INDONESIA</B></td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top' colspan=5>Bertindak untuk dan
                atas nama <B>PT KOSMETIKA CANTIK INDONESIA</B> yang beralamatkan di Jl. Raya
                Sawojajar, Ruko Sawojajar Mas Blok NY-2 No. 1 Kedungkandang, Malang.
                Selanjutnya disebut <B><B>PIHAK PERTAMA</B></B> dalam Perjanjian ini dengan:</td>
        </tr>
        <tr>
            <td valign='top'>II.</td>
            <td valign='top' colspan=2>Nama</td>
            <td valign='top'>:</td>
            <td valign='top' colspan=2><B><?= strtoupper($data[0]['nama']) ?></B></td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top' colspan=2><span lang=SV>Tempat, Tanggal Lahir</span></td>
            <td valign='top'>:</td>
            <td valign='top' colspan=2><B><?= strtoupper($data[0]['tempat_lahir']).', '.strtoupper($data[0]['tanggal_lahir'])?></B></td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top' colspan=2>Nomor KTP</td>
            <td valign='top'>:</td>
            <td valign='top' colspan=2><B><?= strtoupper($data[0]['no_ktp']) ?></B></td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top' colspan=2>Alamat sesuai KTP</td>
            <td valign='top'>:</td>
            <td valign='top' colspan=2><B><?= strtoupper($data[0]['alamat_asal']) ?></B></td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top' colspan=5>Dalam hal ini
                bertindak untuk dan atas nama sendiri, selanjutnya disebut <B><B>PIHAK KEDUA</B></B> dalam
                Perjanjian ini.</td>
        </tr>
        <tr>
            <td valign='top' colspan=6>Kedua belah pihak dengan penuh kesadaran dan tanpa paksaan dari
                pihak manapun, telah sepakat untuk mengikatkan diri dalam suatu hubungan
                kerja yang tertuang dalam Perjanjian Kerja Waktu Tertentu (PKWT) yang
                selanjutnya disebut Perjanjian dengan ketentuan-ketentuan sebagai berikut:</td>
        </tr>
        <tr>
            <td valign='top' colspan=6><br /></td>
        </tr>
        <tr>
            <td valign='top' colspan=6 align="center"><B>PASAL 1</B></td>
        </tr>
        <tr>
            <td valign='top' colspan=6 align="center"><B>TUGAS DAN PENEMPATAN</B></td>
        </tr>
        <tr>
            <td valign='top'>1.</td>
            <td valign='top' colspan=5><B>PIHAK PERTAMA</B> dengan
                ini menerima <B>PIHAK KEDUA</B> untuk bekerja dengan jabatan sebagai <B><?= strtoupper($data[0]['jabatan']) ?></B> di PT
                KOSMETIKA CANTIK INDONESIA.</td>
        </tr>
        <tr>
            <td valign='top'>2.</td>
            <td valign='top' colspan=5>Dalam masa Perjanjian,
                <B>PIHAK PERTAMA</B> berwenang untuk memutasikan/memindahkan <B>PIHAK KEDUA</B> dari suatu
                pekerjaan ke pekerjaan lain dalam Perusahaan sesuai dengan kondisi dan
                kebutuhan Perusahaan.
            </td>
        </tr>
        <tr>
            <td valign='top' colspan=6><br /></td>
        </tr>
        <tr>
            <td valign='top' colspan=6 align="center"><B>PASAL 2</B></td>
        </tr>
        <tr>
            <td valign='top' colspan=6 align="center"><B>MASA PERCOBAAN</B></td>
        </tr>
        <tr>
            <td valign='top'>1.</td>
            <td valign='top' colspan=5><B>PIHAK KEDUA</B> akan
                menjalani masa kontrak selama <B><?= strtoupper($data[0]['masa_kontrak']) ?> (bulan)</B> bulan terhitung dari tanggal
                dimulainya hubungan kerja, terhitung sejak tanggal <B><?= strtoupper($data[0]['tanggal_masuk_kerja']) ?></B> dan berakhir
                pada tanggal <B><?= strtoupper($data[0]['tanggal_kontrak_habis']) ?></B> dengan masa evaluasi selama 3 (tiga) bulan.</td>
        </tr>
        <tr>
            <td valign='top'>2.</td>
            <td valign='top' colspan=5>Jangka waktu
                Perjanjian ini dapat berakhir sebelum jangka waktunya habis apabila:</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top' width='0px'>a.</td>
            <td valign='top' colspan=4><B>PIHAK KEDUA</B> meninggal
                dunia;</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'>b.</td>
            <td valign='top' colspan=4>Atas kehendak PIHAK
                KEDUA dengan memberitahukan secara tertulis kepada <B>PIHAK PERTAMA</B>, minimal 1
                (satu) bulan sebelum tanggal berakhirnya Perjanjian;</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'>c.</td>
            <td valign='top' colspan=4>Atas kehendak
                Perusahaan dengan memberitahukan tertulis kepada <B>PIHAK KEDUA</B> sesuai dengan
                peraturan Perusahaan;</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'>d.</td>
            <td valign='top' colspan=4>Adanya keadaan atau
                kejadian tertentu yang dapat menyebabkan berakhirnya hubungan kerja;</td>
        </tr>
        <tr>
            <td valign='top'>3.</td>
            <td valign='top' colspan=5>Apabila Perjanjian
                Kerja ini akan berakhir, <B>PIHAK PERTAMA</B> akan memberitahukan secara tertulis
                kepada <B>PIHAK KEDUA</B> paling lambat 7 (tujuh) hari sebelum berakhirnya masa
                Perjanjian kerja ini.</td>
        </tr>
        <tr>
            <td valign='top'>4.</td>
            <td valign='top' colspan=5>Perjanjian ini
                berakhir demi hukum dengan berakhirnya jangka waktu sebagaimana dimaksud pada
                ayat 1 dan <B>PIHAK PERTAMA</B> tidak berkewajiban memberikan pesangon kepada PIHAK
                KEDUA kecuali sisa gaji yang belum terbayar.</td>
        </tr>
        <tr>
            <td valign='top' colspan=6><br /></td>
        </tr>
        <tr>
            <td valign='top' colspan=6 align="center"><B>PASAL 3</B></td>
        </tr>
        <tr>
            <td valign='top' colspan=6 align="center"><B>HAK DAN KEWAJIBAN</B></td>
        </tr>
        <tr>
            <td valign='top'>1.</td>
            <td valign='top' colspan=5><B>PIHAK KEDUA</B>
                bertanggungjawab langsung dan dibawah pengawasan <B>PIHAK PERTAMA</B>.</td>
        </tr>
        <tr>
            <td valign='top'>2.</td>
            <td valign='top' colspan=5><B>PIHAK PERTAMA</B> berhak
                memberi tugas dan tanggungjawab kepada <B>PIHAK KEDUA</B> selain dari yang disebutkan diatas.</td>
        </tr>
        <tr>
            <td valign='top'>3.</td>
            <td valign='top' colspan=5><B>PIHAK KEDUA</B>
                mendapatkan keuntungan berupa gaji setiap bulannya sesuai dengan yang telah
                disepakati, yaitu sebagai berikut :</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'>a.</td>
            <td valign='top' colspan=4>Gaji pokok dan
                tunjangan kesehatan setiap 1 (satu) bulan adalah sebesar ................</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'>b.</td>
            <td valign='top' colspan=4>Kenaikan gaji akan
                ditinjau oleh pihak <B>PIHAK PERTAMA</B> berdasarkan kinerja <B>PIHAK KEDUA</B> dalam
                menjalankan tugasnya setiap 1 (satu) tahun masa kerja.</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'>c.</td>
            <td valign='top' colspan=4><B>PIHAK KEDUA</B>
                mendapatkan Tunjangan Hari Raya (THR) setiap 1 (satu) tahun sekali, yang
                diberikan setelah terhitung 1 (satu) tahun masa kerja dimulai sejak
                penandatanganan perjanjian.</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'>d.</td>
            <td valign='top' colspan=4><B>PIHAK KEDUA</B>
                mendapatkan jaminan sosial berupa tunjangan kesehatan dari BPJS yang
                disesuaikan dengan peraturan perundang-undangan yang berlaku.</td>
        </tr>
        <tr>
            <td valign='top'>4.</td>
            <td valign='top' colspan=5><B>PIHAK PERTAMA</B> dapat
                melakukan pemotongan upah <B>PIHAK KEDUA</B> atas ketidakhadiran tanpa melalui
                prosedur izin yang sah dan dapat dibenarkan sebanyak jumlah hari
                ketidakhadiran dibagi dengan jumlah hari dalam bulan tersebut secara
                proporsional dengan tetap merujuk Pasal 93 Undang-Undang Nomor 13 Tahun 2003
                tentang Ketenagakerjaan (prinsip No Work, No Pay).</td>
        </tr>
        <tr>
            <td valign='top' colspan=6><br /></td>
        </tr>
        <tr>
            <td valign='top' colspan=6 align="center"><B>PASAL 4</B></td>
        </tr>
        <tr>
            <td valign='top' colspan=6 align="center"><B>HARI DAN WAKTU KERJA</B></td>
        </tr>
        <tr>
            <td valign='top'>1.</td>
            <td valign='top' colspan=5>Waktu kerja PIHAK
                KEDUA ditetapkan sebagai berikut :</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top' colspan=2>Hari Senin - Jumat</td>
            <td valign='top'>:</td>
            <td valign='top' colspan=2>Jam 08.00 WIB s/d
                17.00 WIB</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top' colspan=2>Istirahat</td>
            <td valign='top'>:</td>
            <td valign='top' colspan=2>1 Jam</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top' colspan=2>Hari Sabtu</td>
            <td valign='top'>:</td>
            <td valign='top' colspan=2>Jam 08.00 WIB s/d
                13.00 WIB (tanpa istirahat)</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top' colspan=5>Ketentuan mengenai jam
                kerja dan waktu istirahat diatur sesuai dengan kebutuhan Perusahaan.</td>
        </tr>
        <tr>
            <td valign='top'>2.</td>
            <td valign='top' colspan=5><B>PIHAK KEDUA</B> wajib
                memenuhi waktu kerja 8 (delapan) jam kerja sehari dalam 5 (lima) hari kerja
                dan 5 (lima) jam kerja sehari dalam 1 (satu) setiap minggunya atau 44 (empat
                puluh empat) jam kerja selama seminggu diluar jam istirahat.</td>
        </tr>
        <tr>
            <td valign='top' colspan=6><br /></td>
        </tr>
        <tr>
            <td valign='top' colspan=6 align="center"><B>PASAL 5</B></td>
        </tr>
        <tr>
            <td valign='top' colspan=6 align="center"><B>KERJA LEMBUR DAN UPAH LEMBUR</B></td>
        </tr>
        <tr>
            <td valign='top'>1.</td>
            <td valign='top' colspan=5>Atas pekerjaan yang
                dilakukan oleh <B>PIHAK KEDUA</B> melebihi jam kerja normal, dikategorikan sebagai
                kerja lembur.</td>
        </tr>
        <tr>
            <td valign='top'>2.</td>
            <td valign='top' colspan=5>Kerja lembur yang
                dilakukan <B>PIHAK KEDUA</B> sebagaimana dimaksud pada ayat 1 di atas harus
                dilakukan atas permintaan dan/atau perintah oleh atasan langsung.</td>
        </tr>
        <tr>
            <td valign='top'>3.</td>
            <td valign='top' colspan=5>Upah lembur per jam
                sebesar Rp. 25.000 (Dua Puluh Lima Ribu Rupiah).</td>
        </tr>
        <tr>
            <td><br /></td>
        </tr>
        <tr>
            <td valign='top' colspan=6 align="center"><B>PASAL 6</B></td>
        </tr>
        <tr>
            <td valign='top' colspan=6 align="center"><B>HAK CUTI</B></td>
        </tr>
        <tr>
            <td valign='top'>1.</td>
            <td valign='top' colspan=5><B>PIHAK KEDUA</B> berhak mendapatkan tambahan hari cuti, dengan perincian sebagai berikut:</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'>a.</td>
            <td valign='top' colspan=3>Perkawinan <B>PIHAK KEDUA</B>
                untuk pertama kali</td>
            <td valign='top'>3 (tiga) hari kerja</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'>b.</td>
            <td valign='top' colspan=3>Menikahkan anaknya</td>
            <td valign='top'>2 (dua) hari kerja</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'>c.</td>
            <td valign='top' colspan=3>Mengkhitankan anaknya</td>
            <td valign='top'>2 (dua) hari kerja</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'>d.</td>
            <td valign='top' colspan=3>Membaptiskan anaknya</td>
            <td valign='top'>2 (dua) hari kerja</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'>e.</td>
            <td valign='top' colspan=3>Isteri melahirkan atau
                keguguran</td>
            <td valign='top'>2 (dua) hari kerja</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'>f.</td>
            <td valign='top' colspan=3>Suami/Isteri, orang
                tua/mertua atau anak kandung meninggal dunia</td>
            <td valign='top'>2 (dua) hari kerja</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'>g.</td>
            <td valign='top' colspan=3>Alasan penting lainnya
                yang dapat dibicarakan antara kedua belah pihak.</td>
            <td valign='top'>2 (dua) hari kerja</td>
        </tr>
        <tr>
            <td valign='top' colspan=6><br /></td>
        </tr>
        <tr>
            <td valign='top' colspan=6 align="center"><B>PASAL 7</B></td>
        </tr>
        <tr>
            <td valign='top' colspan=6 align="center"><B>PERATURAN TATA TERTIB</B></td>
        </tr>
        <tr>
            <td valign='top'>1.</td>
            <td valign='top' colspan=5><B>PIHAK KEDUA</B> wajib
                memberitahukan kepada Perusahaan mengenai data pribadi, bila ada perubahan
                yang menyangkut :</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'>a.</td>
            <td valign='top' colspan=4>Alamat tempat tinggal</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'>b.</td>
            <td valign='top' colspan=4>Keadaan keluarga
                seperti perkawinan, kelahiran, kematian dan lain-lain.</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'>c.</td>
            <td valign='top' colspan=4>Anggota keluarga yang
                terdekat</td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'>d.</td>
            <td valign='top' colspan=4>Salinan Kartu Tanda
                Penduduk (KTP) dan Kartu Keluarga.</td>
        </tr>
        <tr>
            <td valign='top'>2.</td>
            <td valign='top' colspan=5><B>PIHAK KEDUA</B> wajib
                mentaati segala bentuk peraturan yang berlaku di lingkungan Perusahaan.</td>
        </tr>
        <tr>
            <td valign='top'>3.</td>
            <td valign='top' colspan=5><B>PIHAK KEDUA</B> wajib
                mentaati keselamatan kerja yang ditentukan, serta mencegah dan tidak
                melakukan tindakan-tindakan yang dapat membahayakan diri sendiri maupun
                keselamatan <B>PIHAK KEDUA</B> lainnya.</td>
        </tr>
        <tr>
            <td valign='top'>4.</td>
            <td valign='top' colspan=5><B>PIHAK KEDUA</B> wajib
                menjaga kebersihan lingkungan kerja, serta mentaati peraturan keamanan serta
                mencegah dan tidak melakukan tindakan-tindakan yang dapat menimbulkan
                terjadinya kebakaran, pencurian, kehilangan atau perusakan dan perkelahian.</td>
        </tr>
        <tr>
            <td valign='top'>5.</td>
            <td valign='top' colspan=5>Apabila <B>PIHAK KEDUA</B>
                terlibat kasus hukum dengan <B>PIHAK PERTAMA</B>, maka akan diselesaikan
                kekeluargaan dan atau diproses secara hukum.</td>
        </tr>
        <tr>
            <td valign='top' colspan=6><br /></td>
        </tr>
        <tr>
            <td valign='top' colspan=6 align="center"><B>PASAL 8</B></td>
        </tr>
        <tr>
            <td valign='top' colspan=6 align="center"><B>KETENTUAN TAMBAHAN</B></td>
        </tr>
        <tr>
            <td valign='top' colspan=6>Hal-hal
                yang belum diatur dalam Perjanjian ini akan dirundingkan dengan mengacu pada
                ketentuan hukum yang berlaku dan dituangkan dalam Perjanjian tambahan baik
                secara tertulis maupun tidak tertulis.</td>
        </tr>
        <tr>
            <td valign='top' colspan=6>Demikian Perjanjian ini dibuat oleh kedua belah pihak tanpa
                paksaan dari pihak manapun, dibuat dalam rangkap 2 (dua), dan mempunyai
                kekuatan hukum yang sama.</td>
        </tr>
        <tr>
            <td valign='top' colspan=6><br /></td>
        </tr>
        <tr>
            <td valign='top' colspan=6><br /></td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'></td>
            <td valign='top' colspan=3>Malang, <?= date('d') . ' ' . bulan_ini(date('M')) . ' ' . date('Y') ?></td>
            <td valign='top'></td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'></td>
            <td valign='top' colspan=3>PIHAK PERTAMA,</td>
            <td valign='top' >PIHAK KEDUA,</td>
        </tr>
        <tr>
            <td valign='top' colspan=6><br /></td>
        </tr>
        <tr>
            <td valign='top' colspan=6><br /></td>
        </tr>
        <tr>
            <td valign='top' colspan=6><br /></td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'></td>
            <td valign='top' colspan=3><B><U>GILANG WIDYA PRAMANA</U></B></td>
            <td valign='top'><B><U><?= strtoupper($data[0]['nama']) ?></U></B></td>
        </tr>
        <tr>
            <td valign='top'></td>
            <td valign='top'></td>
            <td valign='top' colspan=3>Direktur</td>
            <td valign='top'>Karyawan</td>
        </tr>>
    </table>
</body>

</html>