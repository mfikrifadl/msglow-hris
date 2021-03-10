<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resign Employee Document</title>

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
        <tr>
            <td valign='top'>Perihal</td>
            <td valign='top'>:</td>
            <td valign='top' colspan=6>Cetak Pegawai Resign</td>
        </tr>
    </table>
    <br />
    <table style="font-family: sans-serif; color: #232323; border-collapse: collapse; " autosize="1.6">
        <thead>
            <tr>
                <td style="border: 1px solid #999; padding: 8px 20px;">No</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">NIK</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Nama_Pegawai</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Status_Pegawai</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Jabatan</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Sub_Unit_Kerja</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Masa_Kerja</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Tgl_Masuk_Kerja</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Tgl_Resign</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Status_Resign</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Keterangan</td>
            </tr>
        </thead>
        <tbody>

            <?php $no = 0;
            foreach ($row as $key => $vaKetidakhadiran) {

            ?>
                <tr>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= ++$no; ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaKetidakhadiran['nik'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaKetidakhadiran['nama'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaKetidakhadiran['status_karyawan'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaKetidakhadiran['nama_jabatan'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaKetidakhadiran['nama_sub_unit_kerja'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaKetidakhadiran['masa_kerja'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaKetidakhadiran['tanggal_masuk_kerja'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaKetidakhadiran['tanggal'] ?></td>
                    <?php
                    if ($vaKetidakhadiran['status'] == "0") {
                    ?>
                        <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"> - </td>
                    <?php
                    } else {
                    ?>
                        <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaKetidakhadiran['status'] ?></td>
                    <?php
                    }
                    ?>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaKetidakhadiran['keterangan']  ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>