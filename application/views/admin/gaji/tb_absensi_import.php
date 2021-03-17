    <!-- DATA TABLES -->
    <!-- <link href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" /> -->
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <?php
    $c = "";

    // if (empty($row)) {
    // } else {
    ?>

    <?php
    //}
    ?>
    <hr>
    <table class="table table-striped table-bordered text-center" id='DataTable_absensi'>
        <thead>
            <tr>
                <td>No </td>
                <?php
                if ($this->session->userdata('level') == 1) {
                ?>
                    <td>Action</td>
                <?php
                } else {
                }
                ?>
                <td>Nama</td>
                <td>Departement</td>
                <td>Tanggal</td>
                <td>Jam_Datang</td>
                <td>Jam_Pulang</td>
                <!-- <td>Total_Jam_Kerja</td> -->
                <?php
                if ($this->session->userdata('level') == 3) {
                ?>
                    <td>Keterangan_Absensi</td>
                <?php
                } elseif ($this->session->userdata('level') == 1) {
                ?>
                    <td>Keterangan_Permintaan_Update </td>
                    <td>Keterangan </td>
                <?php
                } else {
                } ?>

                <td>Keterlambatan</td>
                <td>Overtime</td>
                <td>Overtime_Payroll</td>
                <?php
                if ($this->session->userdata('level') == 3) {
                ?>
                    <td>Keterangan_Lain_Lain</td>
                <?php
                } elseif ($this->session->userdata('level') == 1) {
                ?>
                    <td>KLL_Permintaan_Update</td>
                    <td>Keterangan_Lain_Lain</td>
                <?php
                } else {
                } ?>



            </tr>
        </thead>
        <tbody>
            <tr>
                <?php $no = 0;
                $JsonDecode = json_decode($dataDecode, true);
                foreach ($JsonDecode as $key => $vaPegawai) {
                    // Jam Datang Karyawan
                    $jam_datang = new DateTime($vaPegawai['jam_datang']);
                    $jam_pulang = new DateTime($vaPegawai['jam_pulang']);

                ?>
                    <td><?= ++$no; ?></td>
                    <?php
                    if ($this->session->userdata('level') == 1) { ?>
                        <td>
                            <?php
                            if (empty($vaPegawai['id_temp']) || $vaPegawai['id_temp'] == null || $vaPegawai['id_temp'] == "") {
                            } else { ?>


                                <button type="button" title="Approve" id="approve_<?= $vaPegawai['id']; ?>" onclick="return approvement('<?= $vaPegawai['id']; ?>');" class="btn btn-sm btn-outline-warning btn-elevate btn-icon">
                                    <i class="fa fa-check"></i>
                                </button>
                                <button type="button" title="Reject" id="reject_<?= $vaPegawai['id']; ?>" onclick="return reject('<?= $vaPegawai['id']; ?>');" class="btn btn-sm btn-outline-danger btn-elevate btn-icon">
                                    <i class="flaticon2-delete"></i>
                                </button>
                                <input type="hidden" id="ket_abs_temp_<?= $vaPegawai['id']; ?>" value="<?= $vaPegawai['keterangan_temp']; ?>">
                                <input type="hidden" id="ket_abs_lain_temp_<?= $vaPegawai['id']; ?>" value="<?= $vaPegawai['ket_lain_temp']; ?>">

                            <?php
                            }
                            ?>
                        </td>
                    <?php
                    } else {
                    }
                    ?>
                    <td><?= $vaPegawai['nama'] ?> </td>
                    <td><?= $vaPegawai['nama_jabatan'] ?></td>

                    <?php
                    // if(empty($vaPegawai['tanggal'])){
                    ?>
                    <!-- <input type="hidden" > -->
                    <?php
                    // }
                    ?>
                    <td><?= $vaPegawai['tanggal'] ?></td>
                    <td><?= $vaPegawai['jam_datang'] ?></td>
                    <td><?= $vaPegawai['jam_pulang'] ?></td>
                    <!-- <td> -->
                    <?php
                    //Menghitung total jam kerja
                    // $jam_datang = new DateTime($vaPegawai['jam_datang']);
                    // $jam_pulang = new DateTime($vaPegawai['jam_pulang']);

                    // $t_scan_pulang = "17:00:00";
                    // $x_jam_pulang = new DateTime($t_scan_pulang);
                    // $t_jam = $x_jam_pulang->sub(new DateInterval('PT1H')); //jam istirahat

                    // $hit_jam_kerja = $jam_datang->diff($t_jam);
                    // $jumlah1 = $hit_jam_kerja->format('%H:%I:%S');
                    // $tot_jam_kerja = (string)$jumlah1;

                    // if ($jam_datang == $jam_pulang) {
                    //   echo "Please Check Validation";
                    // } elseif ($vaPegawai['jam_datang'] == null || empty($vaPegawai['jam_datang'])) {
                    // } elseif (!empty($vaPegawai['jam_datang'])) {
                    //   echo "$tot_jam_kerja";
                    // } else {
                    // }


                    ?>
                    <!-- </td> -->
                    <?php
                    $id_ket = "";
                    if ($this->session->userdata('level') == 3) {

                        if ($vaPegawai['id'] == 0 || empty($vaPegawai['id'])) {
                            $t_id_ket = date("YmdHis");
                            $id_ket = $t_id_ket + $no;
                        } else {
                            $id_ket = $vaPegawai['id'];
                        }
                    ?>

                        <?php //echo"-".$vaPegawai['nik']."-".$id_ket; 
                        if (empty($vaPegawai['tanggal'])) {
                        ?>
                            <td></td>
                        <?php
                        } else {
                        ?>
                            <td>
                                <div class="form-group">
                                    <select id="ket_<?= $id_ket; ?>" onchange="update_ket('<?= $id_ket; ?>');" class="form-control form-control-sm form-filter kt-input" data-live-search="true">
                                        <option></option>
                                        <option data-name="name1" value="Shift 2" <?php if ($vaPegawai['keterangan_temp'] == "Shift 2") echo "selected";
                                                                                    ?>>Shift 2</option>
                                        <option data-name="name2" value="Tugas Kantor" <?php if ($vaPegawai['keterangan_temp'] == "Tugas Kantor") echo "selected";
                                                                                        ?>>Tugas Kantor</option>
                                        <option data-name="name3" value="Penyesuaian Finger" <?php if ($vaPegawai['keterangan_temp'] == "Penyesuaian Finger") echo "selected";
                                                                                                ?>>Penyesuaian Finger</option>
                                        <option data-name="name4" value="Kirim Luar kota" <?php if ($vaPegawai['keterangan_temp'] == "Kirim Luar kota") echo "selected";
                                                                                            ?>>Kirim Luar kota</option>
                                        <option data-name="name5" value="Pengiriman Bali" <?php if ($vaPegawai['keterangan_temp'] == "Pengiriman Bali") echo "selected";
                                                                                            ?>>Pengiriman Bali</option>
                                        <option data-name="name6" value="Berangkat Kirim Bali" <?php if ($vaPegawai['keterangan_temp'] == "Berangkat Kirim Bali") echo "selected";
                                                                                                ?>>Berangkat Kirim Bali</option>
                                        <option data-name="name7" value="Pulang Dari Bali" <?php if ($vaPegawai['keterangan_temp'] == "Pulang Dari Bali") echo "selected";
                                                                                            ?>>Pulang Dari Bali </option>
                                        <option data-name="name8" value="Ijin Durasi" <?php if ($vaPegawai['keterangan_temp'] == "Ijin Durasi") echo "selected";
                                                                                        ?>>Ijin Durasi</option>
                                        <option data-name="name9" value="Ijin Keperluan Pribadi" <?php if ($vaPegawai['keterangan_temp'] == "Ijin Keperluan Pribadi") echo "selected";
                                                                                                    ?>>Ijin Keperluan Pribadi</option>
                                        <option data-name="name10" value="STSD" <?php if ($vaPegawai['keterangan_temp'] == "STSD") echo "selected";
                                                                                ?>>STSD</option>
                                        <option data-name="name11" value="SSD" <?php if ($vaPegawai['keterangan_temp'] == "SSD") echo "selected";
                                                                                ?>>SSD</option>
                                        <option data-name="name12" value="Tanpa Keterangan" <?php if ($vaPegawai['keterangan_temp'] == "Tanpa Keterangan") echo "selected";
                                                                                            ?>>Tanpa Keterangan</option>
                                        <option data-name="name13" value="Lupa Check Lock Masuk" <?php if ($vaPegawai['keterangan_temp'] == "Lupa Check Lock Masuk") echo "selected";
                                                                                                    ?>>Lupa Check Lock Masuk</option>
                                        <option data-name="name14" value="Lupa Check Lock Pulang" <?php if ($vaPegawai['keterangan_temp'] == "Lupa Check Lock Pulang") echo "selected";
                                                                                                    ?>>Lupa Check Lock Pulang</option>
                                        <option data-name="name15" value="Revisi Approval Manager" <?php if ($vaPegawai['keterangan_temp'] == "Revisi Approval Manager") echo "selected";
                                                                                                    ?>>Revisi Approval Manager</option>
                                        <option data-name="name16" value="Revisi Approval" <?php if ($vaPegawai['keterangan_temp'] == "Revisi Approval") echo "selected";
                                                                                            ?>>Revisi Approval</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <!-- <button type="button" title="Update Data" id="id_<?= $id_ket; ?>" onclick="return update_ket('<?= $id_ket; ?>');" class="btn btn-sm btn-outline-primary btn-elevate btn-icon">
                                        <i class="flaticon2-send-1"></i>
                                    </button> -->
                                </div>
                                <input type="hidden" id="nik_ket_update_<?= $id_ket; ?>" value="<?= $vaPegawai['nik'] ?>">
                            </td>
                        <?php
                        }
                    } elseif ($this->session->userdata('level') == 1) {
                        ?>
                        <td><?= $vaPegawai['keterangan_temp'] ?></td>
                        <td><?= $vaPegawai['keterangan'] ?></td>
                    <?php
                    } else {
                    } ?>

                    <td>
                        <?php
                        //Menghitung Keterlambatan kerja
                        if ($vaPegawai['keterangan_temp'] == "Shift 2" || $vaPegawai['keterangan'] == "Shift 2") {
                            $jam_shift_2 = "12:10:59";
                            $t_jam_shift_2 = new DateTime($jam_shift_2);

                            $set_jam_datang_shift2 = $jam_datang;

                            if ($set_jam_datang_shift2 > $t_jam_shift_2) {
                                $hit_jam_masuk_kerja_shift2 =  $set_jam_datang_shift2->diff($t_jam_shift_2);
                                $hasil_hitungan_shift2 = $hit_jam_masuk_kerja_shift2->format('%H:%I:%S');
                                $tot_jam_keterlambatan_shift2 = (string)$hasil_hitungan_shift2;
                                if (empty($vaPegawai['jam_datang'])) {
                                } else {
                                    echo "$tot_jam_keterlambatan_shift2";
                                }
                            } else {
                            }
                        } else {
                            $set_jam_mulai = "08:10:59";
                            $t_jam_mulai = new DateTime($set_jam_mulai);

                            $set_jam_datang_pegawai = $jam_datang;

                            if ($set_jam_datang_pegawai > $t_jam_mulai) {
                                $hit_jam_masuk_kerja =  $set_jam_datang_pegawai->diff($t_jam_mulai);
                                $hasil_hitungan = $hit_jam_masuk_kerja->format('%H:%I:%S');
                                $tot_jam_keterlambatan = (string)$hasil_hitungan;
                                if (empty($vaPegawai['jam_datang'])) {
                                } else {
                        ?>
                                    <b class="text-danger"> <?= $tot_jam_keterlambatan ?></b>
                        <?php

                                }
                            } else {
                            }
                        }


                        ?>
                    </td>
                    <?php

                    ?>
                    <td id="rev_manager_<?= $id_ket ?>" <?php if ($vaPegawai['keterangan_temp'] == "Revisi Approval" || $vaPegawai['keterangan_temp'] == "Revisi Approval Manager" || $vaPegawai['keterangan'] == "Revisi Approval" || $vaPegawai['keterangan'] == "Revisi Approval Manager") echo 'style = "background-color:red"'; ?>>
                        <?php
                        //Menghitung total jam lembur
                        $tot_jam_lembur_shift2 = "";
                        $tot_jam_lembur = "";
                        if ($vaPegawai['keterangan_temp'] == "Shift 2" || $vaPegawai['keterangan'] == "Shift 2") {
                            $set_jam_lembur_shift2 = "21:49:59";
                            $t_set_jam_lembur_shift2 = new DateTime($set_jam_lembur_shift2);

                            $set_jam_pulang_default_shift2 = "21:00:00";
                            $t_set_jam_pulang_default_shift2 = new DateTime($set_jam_pulang_default_shift2);


                            if ($jam_pulang > $t_set_jam_lembur_shift2) {
                                $hit_jam_lembur_shift2 =  $t_set_jam_pulang_default_shift2->diff($jam_pulang);
                                $jumlah2_shift2 = $hit_jam_lembur_shift2->format('%H:%I:%S');
                                $tot_jam_lembur_shift2 = (string)$jumlah2_shift2;
                                if (empty($vaPegawai['jam_datang']) && empty($vaPegawai['jam_pulang'])) {
                                } else {
                                    echo "$tot_jam_lembur_shift2";
                                }
                            } else {
                            }
                        } else {
                            $set_jam_lembur = "17:49:59";
                            $t_set_jam_lembur = new DateTime($set_jam_lembur);

                            $set_jam_pulang_default = "17:00:00";
                            $t_set_jam_pulang_default = new DateTime($set_jam_pulang_default);

                            $t_jam_pulang = "20:00:00";
                            $x_jam_pulang = new DateTime($t_jam_pulang);


                            if ($jam_pulang > $t_set_jam_lembur) {
                                $hit_jam_lembur =  $t_set_jam_pulang_default->diff($jam_pulang);
                                $jumlah2 = $hit_jam_lembur->format('%H:%I:%S');
                                $tot_jam_lembur = (string)$jumlah2;
                                if (empty($vaPegawai['jam_datang']) && empty($vaPegawai['jam_pulang'])) {
                                } else {
                                    echo "$tot_jam_lembur";
                                }
                            } else {
                            }
                        }


                        ?>
                    </td>
                    <td id="rev_manager1_<?= $id_ket ?>" <?php if ($vaPegawai['keterangan_temp'] == "Revisi Approval" || $vaPegawai['keterangan_temp'] == "Revisi Approval Manager" || $vaPegawai['keterangan'] == "Revisi Approval" || $vaPegawai['keterangan'] == "Revisi Approval Manager") echo 'style = "background-color:red"'; ?>>
                        <?php
                        //Menghitung Payroll total jam lembur  
                        if ($vaPegawai['id_status'] == 3) {
                            if ($vaPegawai['keterangan_temp'] == "Shift 2" || $vaPegawai['keterangan'] == "Shift 2") {
                                $t_tot_jam_lembur = new DateTime($tot_jam_lembur_shift2);
                                $f_jam_pulang_lembur = $t_tot_jam_lembur->format('H:i:s');
                                $a_jam_pulang_lembur = explode(":", $f_jam_pulang_lembur);
                                $jam = $a_jam_pulang_lembur[0];
                                $menit = $a_jam_pulang_lembur[1];
                                $detik = $a_jam_pulang_lembur[2];

                                //echo "$jam-$menit-$detik";

                                $lembur_jam = $jam * 13000;
                                //echo $hasil;
                                if (empty($tot_jam_lembur_shift2)) {
                                } else {
                                    if (empty($vaPegawai['jam_datang']) && empty($vaPegawai['jam_pulang'])) {
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
                                $f_jam_pulang_lembur = $t_tot_jam_lembur->format('H:i:s');
                                $a_jam_pulang_lembur = explode(":", $f_jam_pulang_lembur);
                                $jam = $a_jam_pulang_lembur[0];
                                $menit = $a_jam_pulang_lembur[1];
                                $detik = $a_jam_pulang_lembur[2];

                                //echo "$jam-$menit-$detik";

                                $lembur_jam = $jam * 13000;
                                //echo $hasil;
                                if (empty($tot_jam_lembur)) {
                                } else {
                                    if (empty($vaPegawai['jam_datang']) && empty($vaPegawai['jam_pulang'])) {
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
                        } elseif ($vaPegawai['id_status'] == 4) {
                            if ($vaPegawai['keterangan_temp'] == "Shift 2" || $vaPegawai['keterangan'] == "Shift 2") {
                                $t_tot_jam_lembur = new DateTime($tot_jam_lembur_shift2);
                                $f_jam_pulang_lembur = $t_tot_jam_lembur->format('H:i:s');
                                $a_jam_pulang_lembur = explode(":", $f_jam_pulang_lembur);
                                $jam = $a_jam_pulang_lembur[0];
                                $menit = $a_jam_pulang_lembur[1];
                                $detik = $a_jam_pulang_lembur[2];

                                //echo "$jam-$menit-$detik";

                                $lembur_jam = $jam * 25000;
                                //echo $hasil;
                                if (empty($tot_jam_lembur_shift2)) {
                                } else {
                                    if (empty($vaPegawai['jam_datang']) && empty($vaPegawai['jam_pulang'])) {
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
                                $f_jam_pulang_lembur = $t_tot_jam_lembur->format('H:i:s');
                                $a_jam_pulang_lembur = explode(":", $f_jam_pulang_lembur);
                                $jam = $a_jam_pulang_lembur[0];
                                $menit = $a_jam_pulang_lembur[1];
                                $detik = $a_jam_pulang_lembur[2];

                                //echo "$jam-$menit-$detik";

                                $lembur_jam = $jam * 25000;
                                //echo $hasil;
                                if (empty($tot_jam_lembur)) {
                                } else {
                                    if (empty($vaPegawai['jam_datang']) && empty($vaPegawai['jam_pulang'])) {
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
                    <?php
                    if ($this->session->userdata('level') == 3) {
                        // $id_ket_ll = "";
                        // if ($vaPegawai['id'] == 0 || empty($vaPegawai['id'])) {
                        //     $t_id_ket_ll = date("YmdHis");
                        //     $id_ket_ll = $t_id_ket_ll + $no;
                        // } else {
                        //     $id_ket_ll = $vaPegawai['id'];
                        // }
                        if (empty($vaPegawai['tanggal'])) {
                    ?>
                            <td></td>
                        <?php
                        } else {
                        ?>
                            <td>

                                <input class="form-control form-control-sm form-filter kt-input" id="ket_lain_<?= $id_ket ?>" type="text" value="<?= $vaPegawai['ket_lain_temp'] ?>" onkeyup="updateDataAbsen('<?= $id_ket ?>');" autocomplete="off">
                                <input id="id_<?= $id_ket ?>" type="hidden" name="id" value="<?= $id_ket ?>">
                            </td>
                        <?php
                        }
                    } elseif ($this->session->userdata('level') == 1) {
                        ?>
                        <td><?= $vaPegawai['ket_lain_temp'] ?></td>
                        <td><?= $vaPegawai['ket_lain'] ?></td>
                    <?php
                    } else {
                    }
                    ?>


            </tr>
        <?php }
        ?>
        </tbody>
    </table>



    <!-- DATA TABES SCRIPT -->
    <!-- <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script> -->
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />