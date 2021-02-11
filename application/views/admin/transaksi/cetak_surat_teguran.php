<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <img src="<?= base_url() ?>upload/logo-surat.png" style="width:20%"></b>
    <table border=0 style="font-size: 12pt;">
        <tr height=20 style='height:15.0pt'>
            <td valign='top' colspan=8 align="center" style="font-size: 18pt;"><b>HUMAN RESOURCES DEVELOPMENT</b></td>
        </tr>
        <tr>
            <td valign='top' colspan=8 align="center"><hr/></td>
        </tr>
        <tr>
            <td valign='top' colspan=8 align="center"><br/></td>
        </tr>
        <tr height=20 style='height:15.0pt'>
            <td valign='top'>Tertanggal</td>
            <td valign='top'>:</td>
            <td valign='top' colspan=6><?= date("d-m-Y",strtotime($data[0]['tanggal'])) ?></td>
        </tr>
        <tr>
            <td valign='top'>Perihal</td>
            <td valign='top'>:</td>
            <td valign='top' colspan=6><?= $data[0]['Keterangan'] ?></td>
        </tr>
        <tr>
            <td valign='top' colspan=8><br/></td>
        </tr>
        <tr>
            <td valign='top' colspan=8 align="center"><b><u><?= strtoupper($data[0]['Keterangan']) ?></u></b></td>
        </tr>
        <tr>
            <td valign='top' colspan=8 align="center"><?= $data[0]['nomor_surat'] ?></td>
        </tr>
        <tr>
            <td valign='top' colspan=8 align="center"><br/></td>
        </tr>
        <tr>
            <td valign='top' colspan=8 style="text-align: justify;">Dalam rangka menegakkan kedisiplinan dan tanggung jawab serta menjalankan peraturan perusahaan maka atas nama perusahaan, dengan ini menerangkan bahwa:</td>
        </tr>
        <tr height=20 style='height:15.0pt'>
            <td valign='top'>Nama</td>
            <td valign='top'>:</td>
            <td valign='top' colspan=6><?= $data[0]['nama'] ?></td>
        </tr>
        <tr>
            <td valign='top'>Jabatan</td>
            <td valign='top'>:</td>
            <td valign='top' colspan=6><?= $data[0]['jabatan'] ?></td>
        </tr>
        <tr>
            <td valign='top' colspan=8 style="text-align: justify;">Maka dengan ini, Diberikan <b><u><?= $data[0]['Keterangan'] ?></u></b> terkait dengan tindak pelanggaran yang saudara lakukan, yakni:</td>
        </tr>
        <tr>
            <td valign='top' colspan=8><?= $data[0]['uraian'] ?></td>
        </tr>
        <tr>
            <td valign='top' colspan=8 style="text-align: justify;"><?= $data[0]['Keterangan'] ?> ini belaku mulai tanggal <?= date("d-m-Y",strtotime($data[0]['mulai_berlaku'])) ?> dan berakhir pada tanggal <?= date('d-m-Y', strtotime("+3 months", strtotime($data[0]['mulai_berlaku']))) ?>( 3 bulan masa review.)</td>
        </tr>
        <tr>
            <td valign='top' colspan=8 style="text-align: justify;">Selama masih dalam status teguran, yang bersangkutan tidak diperbolehkan melanggar tata tertib kerja sebagaimana sudah diatur dalam Peraturan Perusahaan, atau bersedia menerima resiko ke tingkat lebih lanjut.</td>
        </tr>
        <tr>
            <td valign='top' colspan=8 style="text-align: justify;">Harapan kami agar yang bersangkutan untuk lebih mentaati peraturan dan lebih disiplin serta tanggung jawab sebagai karyawan yang baik. Semoga dengan diterbitkan surat ini ybs bisa menerima hal ini.</td>
        </tr>
        <tr>
            <td valign='top' colspan=8 style="text-align: justify;">Demikian <b><?= $data[0]['Keterangan'] ?></b> ini dibuat agar dapat ditaati sebagaimana mestinya. Diharapkanyang bersangkutan berkenan merubah sikap dan mampu menunjukkan sikap profesinoalisme dalam bekerja.</td>
        </tr>
        <tr>
            <td valign='top' colspan=8 style="text-align: justify;">Atas perhatian dan kerjasamanya kami selaku manajemen mengucapkan terima kasih. Dan bisa sebagai koreksi dan intropeksi diri selanjutnya.</td>
        </tr>
        <tr>
            <td valign='top' colspan=8><br/></td>
        </tr>
        <tr>
            <td valign='top' colspan=3 align="center">Penerima</td>
            <td valign='top' colspan=5 align="center">Manager HRD</td>
        </tr>
        <tr>
            <td valign='top' colspan=8><br /></td>
        </tr>
        <tr>
            <td valign='top' colspan=8><br /></td>
        </tr>
        <tr>
            <td valign='top' colspan=8><br /></td>
        </tr>
        <tr>
            <td valign='top' colspan=3 align="center">( <?= $data[0]['nama'] ?> )</td>
            <td valign='top' colspan=5 align="center">( <?= $data[0]['create'] ?> )</td>
        </tr>
    </table>
</body>

</html>