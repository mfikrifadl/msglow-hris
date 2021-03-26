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
            <td valign='top' colspan=6><?= $tgl ?> s/d <?= $tgl_end ?></td>
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
                <td style="border: 1px solid #999; padding: 8px 20px;">NIK</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Nama</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Departement</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Tanggal</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Jam_Datang</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Jam_Pulang</td>
                <!-- <td style="border: 1px solid #999; padding: 8px 20px;">Total_Jam_Kerja</td> -->
                <td style="border: 1px solid #999; padding: 8px 20px;">Keterangan</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Keterlambatan</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Overtime</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Payroll_Overtime</td>
                <td style="border: 1px solid #999; padding: 8px 20px;">Keterangan_Lain-Lain</td>
            </tr>
        </thead>
        <tbody>

            <?php $no = 0;
            $log_absen = json_decode($dataDecode, true);
            foreach ($log_absen as $key => $vaAbsensi) {
                $jam_datang = new DateTime($vaAbsensi['jam_datang']);
                $jam_pulang = new DateTime($vaAbsensi['jam_pulang']);
            ?>
                <tr>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= ++$no ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaAbsensi['nik'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaAbsensi['nama'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaAbsensi['nama_jabatan'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaAbsensi['tanggal'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaAbsensi['jam_datang'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;">
                        <?php
                        if ($vaAbsensi['jam_datang'] == $vaAbsensi['jam_pulang']) {
                        } else {
                            echo $vaAbsensi['jam_pulang'];
                        }
                        ?>
                        <!-- <?= $vaAbsensi['jam_pulang'] ?> -->
                    </td>
                    <!-- <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaAbsensi['tot_jam_kerja'] ?></td> -->
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaAbsensi['keterangan'] ?></td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;">
                        <?php
                        //Menghitung Keterlambatan kerja
                        // $set_jam_mulai = "08:10:59";
                        $set_jam_mulai = "08:10";
                        $t_jam_mulai = new DateTime($set_jam_mulai);

                        $set_jam_datang_pegawai = $jam_datang;

                        if ($set_jam_datang_pegawai > $t_jam_mulai) {
                            $hit_jam_masuk_kerja =  $set_jam_datang_pegawai->diff($t_jam_mulai);
                            // $hasil_hitungan = $hit_jam_masuk_kerja->format('%H:%I:%S');
                            $hasil_hitungan = $hit_jam_masuk_kerja->format('%H:%I');
                            $tot_jam_keterlambatan = (string)$hasil_hitungan;
                            if (empty($vaAbsensi['jam_datang'])) {
                            } else {
                                echo "$tot_jam_keterlambatan";
                            }
                        } else {
                        }

                        ?>
                    </td>
                    <?php
                    $style = "";
                    if ($vaAbsensi['keterangan'] == "Revisi Approval Manager" || $vaAbsensi['keterangan'] == "Revisi Approval") {
                        $style = "background-color:red;";
                    } else {
                        $style = "background-color:none";
                    }
                    ?>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px; <?= $style ?>">
                        <?php
                        //Menghitung total jam lembur
                        $tot_jam_lembur_shift2 = "";
                        $tot_jam_lembur = "";
                        if ($vaAbsensi['keterangan_temp'] == "Shift 2" || $vaAbsensi['keterangan'] == "Shift 2") {
                            // $set_jam_lembur_shift2 = "21:49:59";
                            $set_jam_lembur_shift2 = "21:49";
                            $t_set_jam_lembur_shift2 = new DateTime($set_jam_lembur_shift2);

                            // $set_jam_pulang_default_shift2 = "21:00:00";
                            $set_jam_pulang_default_shift2 = "21:00";
                            $t_set_jam_pulang_default_shift2 = new DateTime($set_jam_pulang_default_shift2);


                            if ($jam_pulang > $t_set_jam_lembur_shift2) {
                                $hit_jam_lembur_shift2 =  $t_set_jam_pulang_default_shift2->diff($jam_pulang);
                                // $jumlah2_shift2 = $hit_jam_lembur_shift2->format('%H:%I:%S');
                                $jumlah2_shift2 = $hit_jam_lembur_shift2->format('%H:%I');
                                $tot_jam_lembur_shift2 = (string)$jumlah2_shift2;
                                if (empty($vaAbsensi['jam_datang']) && empty($vaAbsensi['jam_pulang'])) {
                                } else {
                                    echo "$tot_jam_lembur_shift2";
                                }
                            } else {
                            }
                        } else {
                            // $set_jam_lembur = "17:49:59";
                            $set_jam_lembur = "17:49";
                            $t_set_jam_lembur = new DateTime($set_jam_lembur);

                            // $set_jam_pulang_default = "17:00:00";
                            $set_jam_pulang_default = "17:00";
                            $t_set_jam_pulang_default = new DateTime($set_jam_pulang_default);

                            if ($jam_pulang > $t_set_jam_lembur) {
                                $hit_jam_lembur =  $t_set_jam_pulang_default->diff($jam_pulang);
                                // $jumlah2 = $hit_jam_lembur->format('%H:%I:%S');
                                $jumlah2 = $hit_jam_lembur->format('%H:%I');
                                $tot_jam_lembur = (string)$jumlah2;
                                if (empty($vaAbsensi['jam_datang']) && empty($vaAbsensi['jam_pulang'])) {
                                } else {
                                    echo "$tot_jam_lembur";
                                }
                            } else {
                            }
                        }


                        ?>
                    </td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px; <?= $style ?>">
                        <?php
                        //Menghitung Payroll total jam lembur  
                        if ($vaAbsensi['id_status'] == 3) {
                            if ($vaAbsensi['keterangan_temp'] == "Shift 2" || $vaAbsensi['keterangan'] == "Shift 2") {
                                $t_tot_jam_lembur = new DateTime($tot_jam_lembur_shift2);
                                // $f_jam_pulang_lembur = $t_tot_jam_lembur->format('H:i:s');
                                $f_jam_pulang_lembur = $t_tot_jam_lembur->format('H:i');
                                $a_jam_pulang_lembur = explode(":", $f_jam_pulang_lembur);
                                $jam = $a_jam_pulang_lembur[0];
                                $menit = $a_jam_pulang_lembur[1];
                                // $detik = $a_jam_pulang_lembur[2];

                                //echo "$jam-$menit-$detik";

                                $lembur_jam = $jam * 13000;
                                //echo $hasil;
                                if (empty($tot_jam_lembur_shift2)) {
                                } else {
                                    if (empty($vaAbsensi['jam_datang']) && empty($vaAbsensi['jam_pulang'])) {
                                    } else {
                                        if ($menit > 19 && $menit < 50) {
                                            $lembur_half = 7500;
                                            $tot_lembur_today = $lembur_jam + $lembur_half;
                                            echo $tot_lembur_today;
                                        } elseif ($menit > 50 || $jam == 00) {
                                            $lembur_jam = 13000;
                                            echo $lembur_jam;
                                        } else {
                                            $lembur_jam = $jam * 13000;
                                            echo $lembur_jam;
                                        }
                                    }
                                }
                            } else {
                                $t_tot_jam_lembur = new DateTime($tot_jam_lembur);
                                // $f_jam_pulang_lembur = $t_tot_jam_lembur->format('H:i:s');
                                $f_jam_pulang_lembur = $t_tot_jam_lembur->format('H:i');
                                $a_jam_pulang_lembur = explode(":", $f_jam_pulang_lembur);
                                $jam = $a_jam_pulang_lembur[0];
                                $menit = $a_jam_pulang_lembur[1];
                                // $detik = $a_jam_pulang_lembur[2];

                                //echo "$jam-$menit-$detik";

                                $lembur_jam = $jam * 13000;
                                //echo $hasil;
                                if (empty($tot_jam_lembur)) {
                                } else {
                                    if (empty($vaAbsensi['jam_datang']) && empty($vaAbsensi['jam_pulang'])) {
                                    } else {
                                        if ($menit > 19 && $menit < 50) {
                                            $lembur_half = 7500;
                                            $tot_lembur_today = $lembur_jam + $lembur_half;
                                            echo $tot_lembur_today;
                                        } elseif ($menit > 50 || $jam == 00) {
                                            $lembur_jam = 13000;
                                            echo $lembur_jam;
                                        } else {
                                            $lembur_jam = $jam * 13000;
                                            echo $lembur_jam;
                                        }
                                    }
                                }
                            }
                        } elseif ($vaAbsensi['id_status'] == 4) {
                            if ($vaAbsensi['keterangan_temp'] == "Shift 2" || $vaAbsensi['keterangan'] == "Shift 2") {
                                $t_tot_jam_lembur = new DateTime($tot_jam_lembur_shift2);
                                // $f_jam_pulang_lembur = $t_tot_jam_lembur->format('H:i:s');
                                $f_jam_pulang_lembur = $t_tot_jam_lembur->format('H:i');
                                $a_jam_pulang_lembur = explode(":", $f_jam_pulang_lembur);
                                $jam = $a_jam_pulang_lembur[0];
                                $menit = $a_jam_pulang_lembur[1];
                                // $detik = $a_jam_pulang_lembur[2];

                                //echo "$jam-$menit-$detik";

                                $lembur_jam = $jam * 25000;
                                //echo $hasil;
                                if (empty($tot_jam_lembur_shift2)) {
                                } else {
                                    if (empty($vaAbsensi['jam_datang']) && empty($vaAbsensi['jam_pulang'])) {
                                    } else {
                                        if ($menit > 19 && $menit < 50) {
                                            $lembur_half = 13000;
                                            $tot_lembur_today = $lembur_jam + $lembur_half;
                                            echo $tot_lembur_today;
                                        } elseif ($menit > 50 || $jam == 00) {
                                            $lembur_jam = 25000;
                                            echo $lembur_jam;
                                        } else {
                                            $lembur_jam = $jam * 25000;
                                            echo $lembur_jam;
                                        }
                                    }
                                }
                            } else {
                                $t_tot_jam_lembur = new DateTime($tot_jam_lembur);
                                // $f_jam_pulang_lembur = $t_tot_jam_lembur->format('H:i:s');
                                $f_jam_pulang_lembur = $t_tot_jam_lembur->format('H:i');
                                $a_jam_pulang_lembur = explode(":", $f_jam_pulang_lembur);
                                $jam = $a_jam_pulang_lembur[0];
                                $menit = $a_jam_pulang_lembur[1];
                                // $detik = $a_jam_pulang_lembur[2];

                                //echo "$jam-$menit-$detik";

                                $lembur_jam = $jam * 25000;
                                //echo $hasil;
                                if (empty($tot_jam_lembur)) {
                                } else {
                                    if (empty($vaAbsensi['jam_datang']) && empty($vaAbsensi['jam_pulang'])) {
                                    } else {
                                        if ($menit > 19 && $menit < 50) {
                                            $lembur_half = 13000;
                                            $tot_lembur_today = $lembur_jam + $lembur_half;
                                            echo $tot_lembur_today;
                                        } elseif ($menit > 50 || $jam == 00) {
                                            $lembur_jam = 25000;
                                            echo $lembur_jam;
                                        } else {
                                            $lembur_jam = $jam * 25000;
                                            echo $lembur_jam;
                                        }
                                    }
                                }
                            }
                        } else {
                        }
                        ?>
                    </td>
                    <td style="white-space:wrap; border: 1px solid #999; padding: 8px 20px;"><?= $vaAbsensi['ket_lain'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>