<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Attendance</title>

    <?php
    // Fungsi header dengan mengirimkan raw data excel
    header("Content-type: application/vnd-ms-excel");

    // Mendefinisikan nama file ekspor "hasil-export.xls"
    header("Content-Disposition: attachment; filename=Data_Pegawai_Resign.xls");

    // Tambahkan table
    ?>

</head>

<body>
    <table style="font-family: sans-serif; color: #232323; border-collapse: collapse; " autosize="1.6">
        <thead>
            <tr>
                <td style="border: 1px solid #999; padding: 8px 20px;">No</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">NIK</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Nama Pegawai</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Status Pegawai</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Jabatan</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Sub Unit Kerja</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Masa Kerja</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Tanggal Masuk Kerja</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Tanggal Resign</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Status Resign</td>
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