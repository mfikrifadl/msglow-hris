<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p style="text-align: center;"><strong>HUMAN RESOURCES DEVELOPMENT</strong></p>
    <hr />
    <p>Tertanggal&nbsp; &nbsp; &nbsp; &nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $data[0]['tanggal'] ?></p>
    <p>Perihal&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Surat Peringatan I</p>
    <p style="text-align: center;"><strong><u>SURAT TEGURAN</u></strong></p>
    <p style="text-align: center;"><?= $data[0]['nomor_surat'] ?></p>
    <p>Dalam rangka menegakkan kedisiplinan dan tanggung jawab serta menjalankan peraturan perusahaan maka atas nama perusahaan, dengan ini menerangkan bahwa:</p>
    <p>Nama&nbsp; &nbsp; &nbsp; &nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $data[0]['nama'] ?></p>
    <p>Jabatan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $data[0]['nama_jabatan'] ?></p>
    <p>Maka dengan ini, Diberikan <strong><u>Surat Teguran</u></strong> terkait dengan tindak pelanggaran yang saudara lakukan, yakni</p>
    <ol>
        <?= $data[0]['uraian'] ?>
    </ol>
    <p>Surat Peringatan ini belaku mulai<span style="color: #ff0000;"> tanggal <?= $data[0]['mulai_berlaku'] ?> dan berakhir pada tanggal <?= $data[0]['berlaku_sampai'] ?></span> ( <?= substr($data[0]['berlaku_sampai'], 5, 2) - substr($data[0]['mulai_berlaku'], 5, 2) ?> bulan masa review ).</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Selama masih dalam status Peringatan I, yang bersangkutan tidak diperbolehkan melanggar tata tertib kerja sebagaimana sudah diatur dalam Peraturan Perusahaan, atau bersedia menerima resiko ke tingkat lebih lanjut.</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Harapan kami agar yang bersangkutan untuk lebih mentaati peraturan dan lebih disiplin serta tanggung jawab sebagai karyawan yang baik. Semoga dengan diterbitkan surat ini ybs bisa menerima hal ini.</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Demikian <strong>Surat Peringatan I</strong> ini dibuat agar dapat ditaati sebagaimana mestinya. Diharapkan yang bersangkutan berkenan merubah sikap dan mampu menunjukkan sikap profesinoalisme dalam bekerja.</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Atas perhatian dan kerjasamanya kami selaku manajemen mengucapkan terima kasih. Dan bisa sebagai koreksi dan intropeksi diri selanjutnya.</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Penerima&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manager HRD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; General Manager</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp; &nbsp; &nbsp;( <?= $data[0]['nama'] ?> )&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ( <?= $data[0]['create'] ?>&nbsp; )&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;( <?= $data[0]['general_manager'] ?> )</p>
</body>

</html>