    <!-- DATA TABLES -->
    <!-- <link href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" /> -->
    <link href="<?php echo base_url(); ?>assets2/plugins/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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

    <div class="kt-portlet kt-portlet--height-fluid">
      <div class="kt-portlet">
        <div class="kt-portlet__body">
          <table class="table table-striped- table-bordered table-hover table-checkable" style="width: 100%" id='DataTable2'>
            <thead>
              <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Departement</td>
                <td>Tanggal</td>
                <td>Jam_Datang</td>
                <td>Jam_Pulang</td>
                <td>Total_Jam_Kerja</td>
                <td>Keterangan</td>
                <td>Keterlambatan</td>
                <td>Overtime</td>
                <td>Keterangan_Lain-Lain</td>

              </tr>
            </thead>
            <tbody>
              <tr>
                <?php $no = 0;
                foreach ($row as $key => $vaPegawai) { ?>
                  <td><?= ++$no; ?></td>
                  <td><?= $vaPegawai['nama'] ?></td>
                  <td><?= $vaPegawai['nama_jabatan'] ?></td>
                  <td><?= $vaPegawai['tanggal'] ?></td>
                  <td><?= $vaPegawai['jam_datang'] ?></td>
                  <td><?= $vaPegawai['jam_pulang'] ?></td>
                  <td>
                    <?php
                    //Menghitung total jam kerja
                    $jam_datang = new DateTime($vaPegawai['jam_datang']);
                    $jam_pulang = new DateTime($vaPegawai['jam_pulang']);

                    $t_scan_pulang = "17:00:00";
                    $x_jam_pulang = new DateTime($t_scan_pulang);
                    $t_jam = $x_jam_pulang->sub(new DateInterval('PT1H')); //jam istirahat

                    $hit_jam_kerja = $jam_datang->diff($t_jam);
                    $jumlah1 = $hit_jam_kerja->format('%H:%I:%S');
                    $tot_jam_kerja = (string)$jumlah1;

                    if ($jam_datang == $jam_pulang) {
                      echo "Please Check Validation";
                    } elseif ($vaPegawai['jam_datang'] == null || empty($vaPegawai['jam_datang'])) {
                    } elseif (!empty($vaPegawai['jam_datang'])) {
                      echo "$tot_jam_kerja";
                    } else {
                    }


                    ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <select name="keterangan" class="form-control kt-selectpicker" data-live-search="true">
                        <option></option>
                        <option value="0" <?php //if ($cStatusKawin == 0) echo "selected"; 
                                          ?>>Shift 2</option>
                        <option value="1" <?php //if ($cStatusKawin == 1) echo "selected"; 
                                          ?>>Tugas Kantor</option>
                        <option value="2" <?php //if ($cStatusKawin == 0) echo "selected"; 
                                          ?>>Ijin Durasi</option>
                        <option value="3" <?php //if ($cStatusKawin == 1) echo "selected"; 
                                          ?>>Berangkat Bali</option>
                        <option value="4" <?php //if ($cStatusKawin == 0) echo "selected"; 
                                          ?>>Kirim Luar kota</option>
                        <option value="5" <?php //if ($cStatusKawin == 1) echo "selected"; 
                                          ?>>Ijin Keperluan Pribadi</option>
                        <option value="6" <?php //if ($cStatusKawin == 0) echo "selected"; 
                                          ?>>Penyesuaian Finger</option>
                        <option value="7" <?php //if ($cStatusKawin == 1) echo "selected"; 
                                          ?>>Berangkat Bali</option>
                        <option value="8" <?php //if ($cStatusKawin == 1) echo "selected"; 
                                          ?>>Pengiriman Bali</option>
                        <option value="9" <?php //if ($cStatusKawin == 1) echo "selected"; 
                                          ?>>Pulang Dari Bali</option>
                        <option value="0" <?php //if ($cStatusKawin == 1) echo "selected"; 
                                          ?>>Berangkat Kirim Bali</option>
                        <option value="11" <?php //if ($cStatusKawin == 1) echo "selected"; 
                                            ?>>STSD</option>
                        <option value="12" <?php //if ($cStatusKawin == 1) echo "selected"; 
                                            ?>>SSD</option>
                        <option value="13" <?php //if ($cStatusKawin == 1) echo "selected"; 
                                            ?>>Tanpa Keterangan</option>
                      </select>
                    </div>
                  </td>

                  <td>
                    <input style="width: 150px;" class="form-control form-control-sm form-filter kt-input" id="keterangan_<?= $vaPegawai['id'] ?>" type="text" value="<?= $vaPegawai['keterlambatan']; ?>" onkeyup="update_import('<?= $vaPegawai['id']; ?>');" autocomplete="off">
                  </td>

                  <td>
                    <?php
                    //Menghitung total jam lembur
                    $set_jam_lembur = "17:30:00";
                    $t_set_jam_lembur = new DateTime($set_jam_lembur);

                    $set_jam_pulang_default = "17:00:00";
                    $t_set_jam_pulang_default = new DateTime($set_jam_pulang_default);

                    //$t_jam_pulang = "20:00:00";
                    //$x_jam_pulang = new DateTime($t_jam_pulang);
                    if ($jam_pulang > $t_set_jam_lembur) {
                      $hit_jam_lembur =  $t_set_jam_pulang_default->diff($jam_pulang);
                      $jumlah2 = $hit_jam_lembur->format('%H:%I:%S');
                      $tot_jam_lembur = (string)$jumlah2;

                      echo "$tot_jam_lembur";
                    } else {
                    }



                    // if ($x_jam_pulang > $t_set_jam_lembur) {
                    //   echo "$tot_jam_lembur";
                    // } else {
                    // }
                    ?>
                  </td>

                  <td>
                    <input style="width: 150px;" class="form-control form-control-sm form-filter kt-input" id="keterangan_<?= $vaPegawai['id'] ?>" type="text" value="" onkeyup="update_import('<?= $vaPegawai['id']; ?>');" autocomplete="off">
                  </td>

              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!--begin::Modal-->
    <div class="modal fade" id="operator" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel"> <strong> View Data Pegawai </strong> </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="la la-remove"></span>
            </button>
          </div>
          <form class="kt-form kt-form--fit kt-form--label-right">
            <div class="modal-body">

            </div>
          </form>
        </div>
      </div>
    </div>

    <!--begin::Modal-->
    <div class="modal fade" id="operator" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel"> <strong> View Data Pegawai </strong> </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="la la-remove"></span>
            </button>
          </div>
          <form class="kt-form kt-form--fit kt-form--label-right">
            <div class="modal-body">

            </div>
          </form>
        </div>
      </div>
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
    <script src="<?php echo base_url(); ?>assets2/js/pages/crud/datatables/extensions/colreorder.js" type="text/javascript"></script>

    <script src="<?php echo base_url(); ?>assets2/plugins/general/plugins/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets2/plugins/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets2/plugins/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-select/js/dataTables.select.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets2/js/pages/crud/forms/widgets/bootstrap-select.js" type="text/javascript"></script>

    <script type="text/javascript">
      $("#DataTable2").dataTable({
        // scrollY: '50vh',
        scrollX: 'true',
        scrollCollapse: true,
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

      // function update(id) {
      //   var pin = $('#pin_' + id).val();
      //   // var nip = $('#nip_' + id).val();
      //   // var nama = $('#nama_' + id).val();
      //   // var jabatan = $('#jabatan_' + id).val();
      //   // var departemen = $('#departemen_' + id).val();
      //   // var kantor = $('#kantor_' + id).val();

      //   var values = {
      //     'pin': pin
      //     // 'nip': nip,
      //     // 'nama': nama,
      //     // 'jabatan': jabatan,
      //     // 'departemen': departemen,
      //     // 'kantor': kantor
      //   }

      //   $.ajax({
      //     url: "<?php echo base_url() . 'transaksi/update_master_pegawai' ?>",
      //     type: "POST",
      //     // dataType: "json",
      //     data: values,
      //     success: function(data) {
      //       // var gaji_bersih = data.gaji_bersih;
      //       // var denda_telat = data.denda_telat;

      //       // $('#gaji_bersih_' + id).html('<b>' + gaji_bersih + '</b>');
      //       // $('#denda_telat_' + id).html(denda_telat);
      //     },
      //     error: function() {
      //       alert('Ada Error');
      //     }
      //   });
      // }

      function update_import(id) {
        // var conv_tgl = new Date(tgl).getTime();

        var id = $('#id_' + id).val();
        var pin = $('#pin_' + id).val();
        var tanggal = $('#tanggal_' + id).val();
        // var scan1 = $('#scan1_' + no).val();
        // var scan2 = $('#scan2_' + no).val();
        // var scan3 = $('#scan3_' + no).val();
        // var scan4 = $('#scan4_' + no).val();
        // var scan5 = $('#scan5_' + no).val();
        // var ft = $('#ft_' + pin).val();
        // var lembur = $('#lembur_' + pin).val();
        // var izdur = $('#izdur_' + no).val();
        var ket = $('#keterangan_' + id).val();

        var values = {
          'id': id,
          'pin': pin,
          'tanggal': tanggal,
          // 'scan1': scan1,
          // 'scan2': scan2,
          // 'scan3': scan3,
          // 'scan4': scan4,
          // 'scan5': scan5,
          // 'ft': ft,
          'lembur': lembur,
          'izdur': izdur,
          'ket': ket
        }

        $.ajax({
          url: "<?php echo base_url() . 'transaksi/update_import' ?>",
          type: "POST",
          data: values,
          success: function(data) {
            //option pesan berhasil send data
            // alert (tanggal);
          },
          error: function(data, status, error) {
            alert(data.responseText);
          }
        });
      }
    </script>
    <!-- <script>
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
    </script> -->