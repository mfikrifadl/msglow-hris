<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Attendance</title>

</head>

<body>
    
    <table border=0 style="font-size: 12pt;" autosize="1.6" width="900px">
        <tr height=20 style='height:15.0pt'>
            <td valign='top' colspan=8 align="center" style="font-size: 18pt;"><b>HUMAN RESOURCES DEVELOPMENT</b></td>
        </tr>
        <tr>
            <td valign='top' colspan=8 align="center">
                <hr />
            </td>
        </tr>
        <tr>
            <td valign='top' colspan=8 align="center"><br /></td>
        </tr>
        <tr height=20 style='height:15.0pt'>
            <td valign='top'>Tertanggal</td>
            <td valign='top'>:</td>
            <td valign='top' colspan=6><?= $tgl ?></td>
        </tr>
        <tr>
            <td valign='top'>Perihal</td>
            <td valign='top'>:</td>
            <td valign='top' colspan=6>Cetak Absensi</td>
        </tr>
    </table>
<br />
    <table style="font-family: sans-serif; color: #232323; border-collapse: collapse; " autosize="1.6">
        <thead>
            <tr>
                <td style="border: 1px solid #999; padding: 8px 20px;">No</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Nama</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Departement</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Tanggal</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Jam_Datang</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Jam_Pulang</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Total_Jam_Kerja</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Keterangan</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Keterlambatan</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Overtime</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Keterangan_Lain-Lain</td>
            </tr>
        </thead>
        <tbody>

            <?php $no = 0;
            foreach ($log_absen as $key => $vaAbsensi) { ?>
                <tr>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= ++$no ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaAbsensi['nama'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaAbsensi['nama_jabatan'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaAbsensi['tanggal'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaAbsensi['jam_datang'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaAbsensi['jam_pulang'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaAbsensi['tot_jam_kerja'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaAbsensi['keterangan'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaAbsensi['keterlambatan'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaAbsensi['tot_jam_lembur'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaAbsensi['ket_lain'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>