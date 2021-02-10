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

    <table class="table table-striped table-bordered" id="DataTable">
        <thead>
            <tr>
                <td>No </td>
                <td>PIN</td>
                <td>Attlog</td>
                <td>Verify</td>
                <td>Status_Scan</td>
                <td>Cloud_ID</td>

            </tr>
        </thead>
        <tbody>
            <?php $no = 0;
            foreach ($data_absensi as $key => $vaArea) {
                // $attlog = $vaArea['attlog'];
                // $a_attlog = explode(" ", $attlog);
                // $tgl = $a_attlog[0];
                // $waktu = $a_attlog[1];
                // //EXPLODE TGL DARI DATABASE
                // $a_tgl = explode("-", $tgl);
                // $tahun = $a_tgl[0];
                // $bulan = $a_tgl[1];
                // $tanggal = $a_tgl[2];
                // //END EXPLODE

                // //EXPLODE TANGGAL DARI INPUTAN 1
                // $i_tgl_1 = explode("-", $dTgl);
                // $i_tahun_1 = $i_tgl_1[0];
                // $i_bulan_1 = $i_tgl_1[1];
                // $i_tanggal_1 = $i_tgl_1[2];
                // //END EXPLODE

                // //EXPLODE TANGGAL DARI INPUTAN 2
                // $i_tgl_2 = explode("-", $dTgl_end);
                // $i_tahun_2 = $i_tgl_2[0];
                // $i_bulan_2 = $i_tgl_2[1];
                // $i_tanggal_2 = $i_tgl_2[2];
                // //END EXPLODE
                // if($){

                // }else{

                // }
            ?>
                <tr>
                    <td><?= ++$no; ?></td>
                    <td>
                        <?= $vaArea['pin'] ?>
                    </td>
                    <td>
                        <?= $vaArea['attlog'] ?>
                    </td>
                    <td>
                        <?= $vaArea['verify'] ?>
                    </td>
                    <td>
                        <?= $vaArea['status_scan'] ?>
                    </td>
                    <td>
                        <?= $vaArea['cloud_id'] ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class='row'>
        <div class='col-sm-6 text-right'>
            <button class='btn btn-success' onclick="return run();" type='button'>Import</button>
            <!-- <button class='btn btn-success' name="submit" type='submit'>Import</button> -->
        </div>
        <div class='col-sm-6 text-left'>
            <a class='btn btn-danger' href="<?= base_url('cek_absen') ?>">Cancel</a>
        </div>
    </div>
    </form>
    <div class="form-group">
        <div id="loading"></div>
    </div>

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