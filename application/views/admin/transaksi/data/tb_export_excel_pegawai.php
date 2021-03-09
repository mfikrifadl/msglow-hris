    <!-- DATA TABLES -->
    <!-- <link href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" /> -->

    <?php
    date_default_timezone_set('Asia/Jakarta');
    $tgl_sekarang = date("Y-m-d");
    // Fungsi header dengan mengirimkan raw data excel
    header("Content-type: application/vnd-ms-excel");

    // Mendefinisikan nama file ekspor "hasil-export.xls"
    header("Content-Disposition: attachment; filename=data_pegawai_" . $tgl_sekarang . ".xls");

    // Tambahkan table
    ?>

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

    <table border="1" style="width: 100%; border:black;">
        <thead>
            <tr>
                <td rowspan="2" style="background-color:aqua">NO</td>
                <td rowspan="2" style="background-color:aqua">NIK</td>
                <td rowspan="2" style="background-color:aqua">NAMA</td>
                <td rowspan="2" style="background-color:aqua">POSISI</td>
                <td rowspan="2" style="background-color:aqua">STATUS KARYAWAN</td>
                <td rowspan="2" style="background-color:aqua">TGL MULAI KERJA</td>
                <td colspan="3" style="background-color:aqua">STATUS KEPEGAWAIAN</td>
                <td rowspan="2" style="background-color:aqua">MASA KERJA</td>
                <td rowspan="2" style="background-color:aqua">JENIS KELAMIN</td>
                <td rowspan="2" style="background-color:aqua">AGAMA</td>
                <td rowspan="2" style="background-color:aqua">TEMPAT LAHIR</td>
                <td rowspan="2" style="background-color:aqua">TANGGAL LAHIR</td>
                <td rowspan="2" style="background-color:aqua">UMUR</td>
                <td colspan="2" style="background-color:aqua">PENDIDIKAN TERAKHIR</td>
                <td rowspan="2" style="background-color:aqua">GOLONGAN DARAH</td>
                <td rowspan="2" style="background-color:aqua">STATUS PERKAWINAN</td>
                <td colspan="2" style="background-color:aqua">ISTRI/SUAMI</td>
                <td colspan="3" style="background-color:aqua">ANAK I</td>
                <td colspan="3" style="background-color:aqua">ANAK II</td>
                <td colspan="3" style="background-color:aqua">ANAK III</td>
                <td colspan="2" style="background-color:aqua">KTP</td>
                <td rowspan="2" style="background-color:aqua">ALAMAT TINGGAL</td>
                <td rowspan="2" style="background-color:aqua">NO. BPJS KETENAGAKERJAAN</td>
                <td rowspan="2" style="background-color:aqua">NO. BPJS KESEHATAN</td>
                <td rowspan="2" style="background-color:aqua">NPWP</td>
                <td rowspan="2" style="background-color:aqua">NO. HP</td>
                <td colspan="4" style="background-color:aqua">ACCOUNT BANK</td>
                <td rowspan="2" style="background-color:aqua">EMAIL</td>
            </tr>
            <tr>
                <td style="background-color:aqua">Kontrak 1 (PKWT-1)</td>
                <td style="background-color:aqua">Kontrak 2 (PKWT-2)</td>
                <td style="background-color:aqua">Tetap</td>
                <td style="background-color:aqua">Pendidikan</td>
                <td style="background-color:aqua">Jurusan</td>
                <td style="background-color:aqua">Nama</td>
                <td style="background-color:aqua">Tgl Lahir</td>
                <td style="background-color:aqua">nama</td>
                <td style="background-color:aqua">Tgl Lahir</td>
                <td style="background-color:aqua">Umur</td>
                <td style="background-color:aqua">nama</td>
                <td style="background-color:aqua">Tgl Lahir</td>
                <td style="background-color:aqua">Umur</td>
                <td style="background-color:aqua">nama</td>
                <td style="background-color:aqua">Tgl Lahir</td>
                <td style="background-color:aqua">Umur</td>
                <td style="background-color:aqua">Nomor KTP</td>
                <td style="background-color:aqua">Alamat KTP</td>
                <td style="background-color:aqua">Atas Nama (sesuai di buku rekening)</td>
                <td style="background-color:aqua">NOMOR REKENING</td>
                <td style="background-color:aqua">BANK</td>
                <td style="background-color:aqua">CABANG</td>
            </tr>
        </thead>
        <tbody>

            <?php
            $no = 0;
            foreach ($row as $dataPegawai) {
                if ($dataPegawai['id_status_mengundurkan_diri'] == null || $dataPegawai['id_status_mengundurkan_diri'] < 6 || $dataPegawai['id_status_mengundurkan_diri'] > 11 || empty($dataPegawai['id_status_mengundurkan_diri'])) {
            ?>
                    <tr>
                        <td> <?= ++$no; ?> </td>
                        <td> <?= $dataPegawai['nik'] ?> </td>
                        <td> <?= $dataPegawai['nama'] ?> </td>
                        <td> <?= $dataPegawai['jabatan'] ?> / <?= $dataPegawai['nama_sub_unit_kerja'] ?></td>
                        <td> <?= $dataPegawai['STATUS'] ?> </td>
                        <td>
                            <?php
                            if (empty($dataPegawai['tanggal_masuk_kerja']) || $dataPegawai['tanggal_masuk_kerja'] == "0000-00-00") {
                            } else {
                                echo $dataPegawai['tanggal_masuk_kerja'];
                            }
                            ?>
                        </td>
                        <?php

                        if ($dataPegawai['Kerja'] == "PKWT 1") {
                        ?>
                            <td>
                                <?php
                                if ($dataPegawai['tanggal_masuk_kerja'] == "0000-00-00" || empty($dataPegawai['tanggal_masuk_kerja'])) {
                                    echo "-";
                                } else {
                                    $e_hasil_hitung = explode("-", $dataPegawai['tanggal_masuk_kerja']);
                                    $tahun_mk = $e_hasil_hitung[0];
                                    $bulan_mk = $e_hasil_hitung[1];
                                    $hari_mk = $e_hasil_hitung[2];
                                    $tambah_tanggal = mktime(0, 0, 0, date($bulan_mk), date($hari_mk), date($tahun_mk) + 1);
                                    $pkwt1 = date('Y-m-d', $tambah_tanggal);
                                    echo $pkwt1;
                                }
                                ?>
                            </td>
                            <td> </td>
                            <td> </td>
                        <?php
                        } elseif ($dataPegawai['Kerja'] == "PKWT 2") {
                        ?>
                            <td>
                                <?php
                                if ($dataPegawai['tanggal_masuk_kerja'] == "0000-00-00" || empty($dataPegawai['tanggal_masuk_kerja'])) {
                                    echo "-";
                                } else {
                                    echo $pkwt1;
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($dataPegawai['tanggal_masuk_kerja'] == "0000-00-00" || empty($dataPegawai['tanggal_masuk_kerja'])) {
                                    echo "-";
                                } else {
                                    $e_hasil_hitung2 = explode("-", $dataPegawai['tanggal_masuk_kerja']);
                                    $tahun_mk2 = $e_hasil_hitung2[0];
                                    $bulan_mk2 = $e_hasil_hitung2[1];
                                    $hari_mk2 = $e_hasil_hitung2[2];
                                    $tambah_tanggal2 = mktime(0, 0, 0, date($bulan_mk2), date($hari_mk2), date($tahun_mk2) + 1);
                                    $pkwt2 = date('Y-m-d', $tambah_tanggal2);
                                    echo $pkwt2;
                                }

                                ?>
                            </td>
                            <td> </td>
                        <?php
                        } elseif ($dataPegawai['Kerja'] == "TETAP") {
                        ?>
                            <td> </td>
                            <td> </td>
                            <td> TETAP </td>
                        <?php
                        } elseif (empty($dataPegawai['Kerja'])) {
                        ?>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                        <?php
                        } elseif (empty($dataPegawai['tanggal_masuk_kerja']) || $dataPegawai['tanggal_masuk_kerja'] == "0000-00-00") {
                        ?>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                        <?php
                        }

                        ?>

                        <td>
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            $tgl_sekarang = date("Y-m-d");
                            $t_tgl_sekarang = new DateTime($tgl_sekarang);
                            $tgl_masuk_kerja_karyawan = new DateTime($dataPegawai['tanggal_masuk_kerja']);

                            $hit_masa_kerja =  $t_tgl_sekarang->diff($tgl_masuk_kerja_karyawan);
                            $hasil_hitungan = $hit_masa_kerja->format('%Y-%m-%d');
                            $t_hasil_hitung = (string)$hasil_hitungan;
                            $e_hasil_hitung = explode("-", $t_hasil_hitung);
                            $tahun_mk = $e_hasil_hitung[0];
                            $bulan_mk = $e_hasil_hitung[1];
                            $masa_kerja = $tahun_mk . " Tahun" . $bulan_mk . " Bulan";

                            if (empty($dataPegawai['tanggal_masuk_kerja']) || $dataPegawai['tanggal_masuk_kerja'] == "0000-00-00") {
                            } else {
                                echo $masa_kerja;
                            }
                            ?>


                        </td>
                        <td>
                            <?php
                            if ($dataPegawai['jk'] == 1) {
                                echo "PRIA";
                            } elseif ($dataPegawai['jk'] == 2) {
                                echo "WANITA";
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>
                        <td> <?= strtoupper($dataPegawai['ket_agama']) ?> </td>
                        <td> <?= $dataPegawai['tempat_lahir'] ?> </td>
                        <td> <?= $dataPegawai['tanggal_lahir'] ?> </td>
                        <td>
                            <?php
                            if (empty($dataPegawai['tanggal_lahir']) || $dataPegawai['tanggal_lahir'] == "0000-00-00") {
                                echo "-";
                            } else {
                                $birthDate = new DateTime($dataPegawai['tanggal_lahir']);
                                $y = $t_tgl_sekarang->diff($birthDate)->y;
                                echo $y . " TAHUN";
                            }
                            ?>
                        </td>
                        <td> <?= $dataPegawai['PendidikanPegawai'] ?> </td>
                        <td> <?= $dataPegawai['jurusan'] ?> </td>
                        <td> <?= $dataPegawai['gol_darah'] ?> </td>
                        <td>
                            <?php
                            if ($dataPegawai['status_kawin'] == 0) {
                                echo "MENIKAH";
                            } elseif ($dataPegawai['status_kawin'] == 1) {
                                echo "BELUM MENIKAH";
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>
                        <td> <?= $dataPegawai['istri_suami'] ?> </td>
                        <td>
                            <?php
                            if (empty($dataPegawai['tgl_lahir_istri']) || $dataPegawai['tgl_lahir_istri'] == "0000-00-00") {
                                echo "-";
                            } else {
                                echo $dataPegawai['tgl_lahir_istri'];
                            }
                            ?>
                        </td>
                        <td> <?= $dataPegawai['anak_1'] ?> </td>
                        <td>
                            <?php
                            if (empty($dataPegawai['tgl_lahir_anak_1']) || $dataPegawai['tgl_lahir_anak_1'] == "0000-00-00") {
                                echo "-";
                            } else {
                                echo $dataPegawai['tgl_lahir_anak_1'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if (empty($dataPegawai['tgl_lahir_anak_1']) || $dataPegawai['tgl_lahir_anak_1'] == "0000-00-00") {
                                echo "-";
                            } else {
                                $birthDateAnak1 = new DateTime($dataPegawai['tgl_lahir_anak_1']);
                                $yAnak1 = $t_tgl_sekarang->diff($birthDateAnak1)->y;
                                $mAnak1 = $t_tgl_sekarang->diff($birthDateAnak1)->m;
                                $dAnak1 = $t_tgl_sekarang->diff($birthDateAnak1)->d;
                                echo $yAnak1 . " TAHUN " . $mAnak1 . " BULAN " . $dAnak1 . " HARI";
                            }
                            ?>
                        </td>
                        <td> <?= $dataPegawai['anak_2'] ?> </td>
                        <td>
                            <?php
                            if (empty($dataPegawai['tgl_lahir_anak_2']) || $dataPegawai['tgl_lahir_anak_2'] == "0000-00-00") {
                                echo "-";
                            } else {
                                echo $dataPegawai['tgl_lahir_anak_2'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if (empty($dataPegawai['tgl_lahir_anak_2']) || $dataPegawai['tgl_lahir_anak_2'] == "0000-00-00") {
                                echo "-";
                            } else {
                                $birthDateAnak2 = new DateTime($dataPegawai['tgl_lahir_anak_2']);
                                $yAnak2 = $t_tgl_sekarang->diff($birthDateAnak2)->y;
                                $mAnak2 = $t_tgl_sekarang->diff($birthDateAnak2)->m;
                                $dAnak2 = $t_tgl_sekarang->diff($birthDateAnak2)->d;
                                echo $yAnak2 . " TAHUN " . $mAnak2 . " BULAN " . $dAnak2 . " HARI";
                            }
                            ?>
                        </td>
                        <td> <?= $dataPegawai['anak_3'] ?> </td>
                        <td>
                            <?php
                            if (empty($dataPegawai['tgl_lahir_anak_3']) || $dataPegawai['tgl_lahir_anak_3'] == "0000-00-00") {
                                echo "-";
                            } else {
                                echo $dataPegawai['tgl_lahir_anak_3'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if (empty($dataPegawai['tgl_lahir_anak_3']) || $dataPegawai['tgl_lahir_anak_3'] == "0000-00-00") {
                                echo "-";
                            } else {
                                $birthDateAnak3 = new DateTime($dataPegawai['tgl_lahir_anak_3']);
                                $yAnak3 = $t_tgl_sekarang->diff($birthDateAnak3)->y;
                                $mAnak3 = $t_tgl_sekarang->diff($birthDateAnak3)->m;
                                $dAnak3 = $t_tgl_sekarang->diff($birthDateAnak3)->d;
                                echo $yAnak3 . " TAHUN " . $mAnak3 . " BULAN " . $dAnak3 . " HARI";
                            }
                            ?>
                        </td>
                        <td> <?= $dataPegawai['no_ktp'] ?> </td>
                        <td> <?= $dataPegawai['alamat_asal'] ?> </td>
                        <td> <?= $dataPegawai['alamat'] ?> </td>
                        <td> <?= $dataPegawai['no_bpjs_ktk'] ?> </td>
                        <td> <?= $dataPegawai['no_bpjs_kes'] ?> </td>
                        <td> <?= $dataPegawai['no_npwp'] ?> </td>
                        <td> <?= $dataPegawai['handphone'] ?> </td>
                        <td> <?= $dataPegawai['atas_nama'] ?> </td>
                        <td> <?= $dataPegawai['no_rekening'] ?> </td>
                        <td> <?= $dataPegawai['jenis_pembayaran'] ?> </td>
                        <td> <?= $dataPegawai['cabang_bank'] ?> </td>
                        <td> <?= $dataPegawai['email'] ?> </td>
                    </tr>
            <?php
                } else {
                }
            }
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

    <script type="text/javascript">
        $(".DataTablePegawaiJos").dataTable({
            "oLanguage": {
                "sLengthMenu": "Tampilkan _MENU_ data per halaman",
                "sSearch": "Pencarian: ",
                "sZeroRecords": "Maaf, tidak ada data yang ditemukan",
                "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                "sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
                "sInfoFiltered": "(di filter dari _MAX_ total data)",
                "oPaginate": {
                    "sFirst": "Awal",
                    "sLast": "Akhir",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya"
                }
            }
        });
    </script>
    <script>
        function GetDataModal(id) {
            $("#operator").modal('show');
            $.ajax({
                type: "GET",
                url: "<?= base_url() ?>transaksi/tb_detail_pegawai/" + id,
                cache: false,
                success: function(msg) {
                    $(".modal-body").html(msg);
                }
            });
        }
    </script>