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
    <table class="table table-striped- table-bordered table-hover table-checkable" style="width: 100%" id='DataTable2'>
      <thead>
        <tr>
          <td>PIN</td>
          <td>NIP</td>
          <td>Nama</td>
          <td>Jabatan</td>
          <td>Depart_Test</td>
          <td>Kantor</td>
          <td>Tanggal</td>
          <td>Scan 1</td>
          <td>Scan 2</td>
          <td>Scan 3</td>
          <td>Scan 4</td>
          <!-- <td>Scan 5</td> -->
          <td>Jam Kerja</td>
          <td>Lembur</td>
          <td>Izin Durasi</td>
          <td>Ket</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php $no = 0;
          foreach ($row as $key => $vaPegawai) { ?>
            <td><?= $vaPegawai['Pin'] ?></td>
            <td><?= $vaPegawai['Nip'] ?></td>
            <td><?= $vaPegawai['Nama'] ?></td>
            <td>
              <input class="form-control form-control-sm kt-input" id="jabatan_<?= $vaPegawai['Pin']; ?>" type="text" value="<?= $vaPegawai['Jabatan']; ?>" onkeyup="update('<?= $vaPegawai['Pin']; ?>');" autocomplete="off">
            </td>
            <td>
              <input class="form-control form-control-sm kt-input" id="departemen_<?= $vaPegawai['Pin']; ?>" type="text" value="<?= $vaPegawai['Departemen']; ?>" onkeyup="update('<?= $vaPegawai['Pin']; ?>');" autocomplete="off">
            </td>
            <td>
              <input style="width: 100px;" class="form-control form-control-sm kt-input" id="kantor_<?= $vaPegawai['Pin']; ?>" type="text" value="<?= $vaPegawai['Kantor']; ?>" onkeyup="update('<?= $vaPegawai['Pin']; ?>');" autocomplete="off">
            </td>
            <td><?= $vaPegawai['Tanggal'] ?></td>
            <td>
              <input style="width: 100px;" class="form-control form-control-sm kt-input" id="scan1_<?= $vaPegawai['Nomor'] ?>" type="text" value="<?= $vaPegawai['Scan1']; ?>" onkeyup="update_import('<?= $vaPegawai['Nomor']; ?>');" autocomplete="off">
            </td>
            <td>
              <input style="width: 100px;" class="form-control form-control-sm kt-input" id="scan2_<?= $vaPegawai['Nomor'] ?>" type="text" value="<?= $vaPegawai['Scan2']; ?>" onkeyup="update_import('<?= $vaPegawai['Nomor']; ?>');" autocomplete="off">
            </td>
            <td>
              <input style="width: 100px;" class="form-control form-control-sm kt-input" id="scan3_<?= $vaPegawai['Nomor']  ?>" type="text" value="<?= $vaPegawai['Scan3']; ?>" onkeyup="update_import('<?= $vaPegawai['Nomor']; ?>');" autocomplete="off">
            </td>
            <td>
              <input style="width: 100px;" class="form-control form-control-sm kt-input" id="scan4_<?= $vaPegawai['Nomor'] ?>" type="text" value="<?= $vaPegawai['Scan4']; ?>" onkeyup="update_import('<?= $vaPegawai['Nomor']; ?>');" autocomplete="off">
            </td>
            <!-- <td>
              <input style="width: 100px;" class="form-control form-control-sm kt-input" id="scan5_<?= $vaPegawai['Nomor'] ?>" type="text" value="<?= $vaPegawai['Scan5']; ?>" onkeyup="update_import('<?= $vaPegawai['Nomor']; ?>');" autocomplete="off">
            </td> -->
            <td><?= $vaPegawai['FT'] ?></td>
            <td><?= $vaPegawai['Lembur'] ?></td>
            <td><?= $vaPegawai['IzDur'] ?></td>
            <td>
              <input style="width: 150px;" class="form-control form-control-sm form-filter kt-input" id="keterangan_<?= $vaPegawai['Nomor'] ?>" type="text" value="<?= $vaPegawai['Keterangan']; ?>" onkeyup="update_import('<?= $vaPegawai['Nomor']; ?>');" autocomplete="off">
            </td>

            <input id="pin_<?= $vaPegawai['Pin']; ?>" type="hidden" name="pin" value="<?= $vaPegawai['Pin'] ?>">
            <input id="nip_<?= $vaPegawai['Pin']; ?>" type="hidden" name="nip" value="<?= $vaPegawai['Nip'] ?>">
            <input id="nama_<?= $vaPegawai['Pin']; ?>" type="hidden" name="nama" value="<?= $vaPegawai['Nama'] ?>">

            <input id="nomor_<?= $vaPegawai['Nomor'] ?>" type="hidden" name="no" value="<?= $vaPegawai['Nomor'] ?>">
            <input id="pin_<?= $vaPegawai['Nomor'] ?>" type="hidden" name="pin" value="<?= $vaPegawai['Pin'] ?>">
            <input id="tanggal_<?= $vaPegawai['Nomor'] ?>" type="hidden" name="tanggal" value="<?= $vaPegawai['Tanggal'] ?>">
            <input id="ft_<?= $vaPegawai['Nomor'] ?>" type="hidden" name="ft" value="<?= $vaPegawai['FT'] ?>">
            <input id="lembur_<?= $vaPegawai['Nomor'] ?>" type="hidden" name="lembur" value="<?= $vaPegawai['Lembur'] ?>">
            <input id="izdur_<?= $vaPegawai['Nomor'] ?>" type="hidden" name="izdur" value="<?= $vaPegawai['IzDur'] ?>">
        </tr>
      <?php } ?>
      </tbody>
    </table>

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

    <!--end::Modal-->

    <!-- <div class="modal fade bs-example-modal-lg" id="operator" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-red">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="la la-remove"></span>
            </button>
            <h5 class="modal-title" id="myModalLabel">View Data Pegawai</h5>
          </div>
          <div class="modal-body">
          </div>
        </div>
      </div>
    </div> -->


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

    <script type="text/javascript">
      // $(".DataTablePegawaiJos").dataTable({
      //   "oLanguage": {
      //     "sLengthMenu": "Tampilkan _MENU_ data per halaman",
      //     "sSearch": "Pencarian: ",
      //     "sZeroRecords": "Maaf, tidak ada data yang ditemukan",
      //     "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
      //     "sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
      //     "sInfoFiltered": "(di filter dari _MAX_ total data)",
      //     "oPaginate": {
      //       "sFirst": "Awal",
      //       "sLast": "Akhir",
      //       "sPrevious": "Sebelumnya",
      //       "sNext": "Selanjutnya"
      //     }
      //   }
      // });

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

      function update(id) {
        var pin = $('#pin_' + id).val();
        var nip = $('#nip_' + id).val();
        var nama = $('#nama_' + id).val();
        var jabatan = $('#jabatan_' + id).val();
        var departemen = $('#departemen_' + id).val();
        var kantor = $('#kantor_' + id).val();

        var values = {
          'pin': pin,
          'nip': nip,
          'nama': nama,
          'jabatan': jabatan,
          'departemen': departemen,
          'kantor': kantor
        }

        $.ajax({
          url: "<?php echo base_url() . 'transaksi/update_master_pegawai' ?>",
          type: "POST",
          // dataType: "json",
          data: values,
          success: function(data) {
            // var gaji_bersih = data.gaji_bersih;
            // var denda_telat = data.denda_telat;

            // $('#gaji_bersih_' + id).html('<b>' + gaji_bersih + '</b>');
            // $('#denda_telat_' + id).html(denda_telat);
          },
          error: function() {
            alert('Ada Error');
          }
        });
      }

      function update_import(no) {
        // var conv_tgl = new Date(tgl).getTime();

        var no = $('#nomor_' + no).val();
        var pin = $('#pin_' + no).val();
        var tanggal = $('#tanggal_' + no).val();
        var scan1 = $('#scan1_' + no).val();
        var scan2 = $('#scan2_' + no).val();
        var scan3 = $('#scan3_' + no).val();
        var scan4 = $('#scan4_' + no).val();
        var scan5 = $('#scan5_' + no).val();
        var ft = $('#ft_' + no).val();
        var lembur = $('#lembur_' + no).val();
        var izdur = $('#izdur_' + no).val();
        var ket = $('#keterangan_' + no).val();

        var values = {
          'no': no,
          'pin': pin,
          'tanggal': tanggal,
          'scan1': scan1,
          'scan2': scan2,
          'scan3': scan3,
          'scan4': scan4,
          'scan5': scan5,
          'ft': ft,
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