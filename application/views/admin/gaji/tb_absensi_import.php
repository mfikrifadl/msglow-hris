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

    <table class="table table-striped table-bordered text-center" id='DataTable_absensi'>
        <thead>
            <tr>
                <td>No </td>
                <td>Nama</td>
                <td>Departement</td>
                <td>Tanggal</td>
                <td>Jam_Datang</td>
                <td>Jam_Pulang</td>
                <!-- <td>Total_Jam_Kerja</td> -->
                <td colspan="2">Keterangan</td>
                <td>Keterlambatan</td>
                <td>Overtime</td>
                <td>Keterangan_Lain-Lain</td>

            </tr>
        </thead>
        <tbody>
            <tr>
                <?php $no = 0;
                foreach ($row as $key => $vaPegawai) {
                    // Jam Datang Karyawan
                    $jam_datang = new DateTime($vaPegawai['jam_datang']);
                    $jam_pulang = new DateTime($vaPegawai['jam_pulang']);

                ?>
                    <td><?= ++$no; ?></td>
                    <td><?= $vaPegawai['nama'] ?></td>
                    <td><?= $vaPegawai['nama_jabatan'] ?></td>
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
                    <td colspan="2">
                        <div class="form-group">
                            <select id="ket_<?= $vaPegawai['id']; ?>" onkeyup="update_ket('<?= $vaPegawai['id']; ?>');" class="form-control form-control-sm form-filter kt-input" data-live-search="true">
                                <option></option>
                                <option data-name="name1" value="Shift 2" <?php if ($vaPegawai['keterangan'] == "Shift 2") echo "selected";
                                                                            ?>>Shift 2</option>
                                <option data-name="name2" value="Tugas Kantor" <?php if ($vaPegawai['keterangan'] == "Tugas Kantor") echo "selected";
                                                                                ?>>Tugas Kantor</option>
                                <option data-name="name3" value="Penyesuaian Finger" <?php if ($vaPegawai['keterangan'] == "Penyesuaian Finger") echo "selected";
                                                                                        ?>>Penyesuaian Finger</option>
                                <option data-name="name4" value="Kirim Luar kota" <?php if ($vaPegawai['keterangan'] == "Kirim Luar kota") echo "selected";
                                                                                    ?>>Kirim Luar kota</option>
                                <option data-name="name5" value="Pengiriman Bali" <?php if ($vaPegawai['keterangan'] == "Pengiriman Bali") echo "selected";
                                                                                    ?>>Pengiriman Bali</option>
                                <option data-name="name6" value="Berangkat Kirim Bali" <?php if ($vaPegawai['keterangan'] == "Berangkat Kirim Bali") echo "selected";
                                                                                        ?>>Berangkat Kirim Bali</option>
                                <option data-name="name7" value="Pulang Dari Bali" <?php if ($vaPegawai['keterangan'] == "Pulang Dari Bali") echo "selected";
                                                                                    ?>>Pulang Dari Bali </option>
                                <option data-name="name8" value="Ijin Durasi" <?php if ($vaPegawai['keterangan'] == "Ijin Durasi") echo "selected";
                                                                                ?>>Ijin Durasi</option>
                                <option data-name="name9" value="Ijin Keperluan Pribadi" <?php if ($vaPegawai['keterangan'] == "Ijin Keperluan Pribadi") echo "selected";
                                                                                            ?>>Ijin Keperluan Pribadi</option>
                                <option data-name="name10" value="STSD" <?php if ($vaPegawai['keterangan'] == "STSD") echo "selected";
                                                                        ?>>STSD</option>
                                <option data-name="name11" value="SSD" <?php if ($vaPegawai['keterangan'] == "SSD") echo "selected";
                                                                        ?>>SSD</option>
                                <option data-name="name12" value="Tanpa Keterangan" <?php if ($vaPegawai['keterangan'] == "Tanpa Keterangan") echo "selected";
                                                                                    ?>>Tanpa Keterangan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="button" title="Update Data" id="id_<?= $vaPegawai['id']; ?>" onclick="return update_ket('<?= $vaPegawai['id']; ?>');" class="btn btn-sm btn-outline-primary btn-elevate btn-icon">
                                <i class="flaticon2-send-1"></i>
                            </button>
                        </div>
                    </td>

                    <td>
                        <?php
                        //Menghitung Keterlambatan kerja
                        $set_jam_mulai = "08:10:59";
                        $t_jam_mulai = new DateTime($set_jam_mulai);

                        $set_jam_datang_pegawai = $jam_datang;

                        if ($set_jam_datang_pegawai > $t_jam_mulai) {
                            $hit_jam_masuk_kerja =  $set_jam_datang_pegawai->diff($t_jam_mulai);
                            $hasil_hitungan = $hit_jam_masuk_kerja->format('%H:%I:%S');
                            $tot_jam_keterlambatan = (string)$hasil_hitungan;

                            echo "$tot_jam_keterlambatan";
                        } else {
                        }

                        ?>
                    </td>

                    <td>
                        <?php
                        //Menghitung total jam lembur
                        $set_jam_lembur = "17:30:00";
                        $t_set_jam_lembur = new DateTime($set_jam_lembur);

                        $set_jam_pulang_default = "17:00:00";
                        $t_set_jam_pulang_default = new DateTime($set_jam_pulang_default);

                        $t_jam_pulang = "20:00:00";
                        $x_jam_pulang = new DateTime($t_jam_pulang);
                        if ($jam_pulang > $t_set_jam_lembur) {
                            $hit_jam_lembur =  $t_set_jam_pulang_default->diff($jam_pulang);
                            $jumlah2 = $hit_jam_lembur->format('%H:%I:%S');
                            $tot_jam_lembur = (string)$jumlah2;

                            echo "$tot_jam_lembur";
                        } else {
                        }

                        ?>
                    </td>

                    <td>
                        <input class="form-control form-control-sm form-filter kt-input" id="ket_lain_<?= $vaPegawai['id'] ?>" type="text" value="<?= $vaPegawai['ket_lain'] ?>" onkeyup="updateDataAbsen('<?= $vaPegawai['id']; ?>');" autocomplete="off">
                        <input id="id_<?= $vaPegawai['id']; ?>" type="hidden" name="id" value="<?= $vaPegawai['id'] ?>">
                    </td>

            </tr>
        <?php }
        ?>
        </tbody>
    </table>
    <hr>
    <?php
    if (empty($row)) {
    } else {
    ?>
        <div class='row'>
            <div class='col-sm-12 text-left'>
                <button class='btn btn-success' name="submit" type='submit'>
                    <i class="flaticon2-google-drive-file"></i>Cetak PDF
                </button>
            </div>
        </div>
    <?php
    }
    ?>


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