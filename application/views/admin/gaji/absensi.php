<?php

if ($action == "edit") {
  foreach ($field as $column) {
    $cIdAbsensi       =   $column['id_absensi'];
    $cIdStatusAbsensi =   $column['id_status_absensi'];
    $cIdPegawai       =   $column['id_pegawai'];
    $dTglAbsen        =   String2Date($column['tanggal_absen']);
    // $cKeterangan      =   $column['keterangan'];
    $cIconButton      =   "refresh";
    $cValueButton     =   "Update Data";
  }

  $cAction = "Update/" . $cIdAbsensi . "";
} else {
  $cIdAbsensi         =   "";
  $cIdStatusAbsensi   =   "";
  $cIdPegawai         =   "";
  $dTglAbsen          =   "";
  $cIconButton        =   "save";
  $cValueButton       =   "Save Data";
  $cAction            =   "Insert";
}
?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">


  <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <!--Begin::Dashboard 6-->
    <div class="row">
      <div class="col-sm-12">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
          <li class="breadcrumb-item"><?= $menu ?></li>
          <li class="breadcrumb-item active"><?= $file ?></li>
        </ul>
      </div>
    </div>
    <!-- /.DataTable -->

    <div class="row">
      <div class="col-12">

        <!--begin:: Widgets/Order Statistics-->
        <div class="kt-portlet">

          <!--begin::Accordion-->

          <div class="accordion accordion-solid accordion-toggle-plus" id="accordionInputData">
            <div class="card">
              <div class="card-header" id="headingInputData">
                <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseInputData" aria-expanded="true" aria-controls="collapseInputData">
                  <strong> Data Absensi Hari Ini</strong>
                </div>
              </div>
              <div id="collapseInputData" class="collapse show" aria-labelledby="headingInputData" data-parent="#accordionInputData">
                <!-- <div class="card-body"> -->

                <div class="kt-portlet__body">

                  <div class="col-md-12 col-sm-12">

                    <form method="post" action="<?php echo base_url("cek_absen/import"); ?>" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <div class="form-group">
                              <label>
                                <h5>Input Tanggal Absensi Yang Akan Di Compile </h5>
                              </label>
                              <input type="date" name="dTgl" id="dTgl" class="form-control" data-date-format="dd-mm-yyyy" placeholder="Tanggal Absensi" required>
                            </div>

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
                                foreach ($absensi as $key => $vaArea) {
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

                                  <?php
                                } ?>
                              </tbody>
                            </table>

                          </div>
                        </div>

                      </div><!-- /.row -->
                      <hr>


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
                    <!--/.box -->
                  </div> <!-- /.col -->

                  <!-- </form> -->
                  <!-- </form> -->

                </div>

              </div>
              <!-- </div> -->
            </div>
          </div>

          <!--end::Accordion-->

        </div>
      </div>
    </div>

    <div class=" row">
      <div class="col-12">

        <!--begin:: Widgets/Order Statistics-->
        <div class="kt-portlet">

          <!--begin::Accordion-->

          <div class="accordion accordion-solid accordion-toggle-plus" id="accordionTableAbsensi">
            <div class="card">
              <div class="card-header" id="headingTableAbsensi">
                <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseTableAbsensi" aria-expanded="true" aria-controls="collapseTableAbsensi">
                  <strong> Data Table Absensi </strong>
                </div>
              </div>
              <div id="collapseTableAbsensi" class="collapse show" aria-labelledby="headingTableAbsensi" data-parent="#accordionTableAbsensi">
                <!-- <div class="card-body"> -->

                <div class="row">
                  <div class="col-xl-12">
                    <!-- <div id="show_absen"></div> -->

                    <div class="kt-portlet kt-portlet--height-fluid">
                      <div class="kt-portlet">
                        <div class="kt-portlet__body">
                          <form method="post" enctype="multipart/form-data" action="<?= site_url('Cek_absen_act/cetak_absensi/') ?>">
                            <div class="form-group">
                              <div id="printchatbox"> </div>
                              <label>
                                <h5>Input Tanggal Absensi Yang Akan Di Cetak </h5>
                              </label>
                              <input type="date" name="dTgl_cetak" id="dTgl_cetak" class="form-control" data-date-format="dd-mm-yyyy" required>
                              <hr />
                            </div>                            

                            <table class="table table-striped table-bordered text-center" id='DataTable_absensi'>
                              <thead>
                                <tr>
                                  <td>No</td>
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

                            <div class='row'>
                              <div class='col-sm-12 text-left'>
                                <button class='btn btn-success' name="submit" type='submit'>
                                <i class="flaticon2-google-drive-file"></i>Cetak PDF
                                </button>
                              </div>
                            </div>

                          </form>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>




              </div>
              <!-- </div> -->
            </div>
          </div>

          <!--end::Accordion-->

        </div>
      </div>
    </div>




    <div class="row">



    </div>


  </div>
</div>

<script type="text/javascript">
  function showDataAbsen() {
    $('.loding').show();
    $.ajax({
      type: "GET",
      url: "<?= site_url('transaksi/tb_absensi') ?>",
      cache: false,
      beforeSend: function() {
        $('#show_absen').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
      },
      success: function(msg) {
        $("#show_absen").html(msg);
      }
    });
  }

  $("#table_scroll_x").dataTable({
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

  function run() {

    var dTgl = $('#dTgl').val();
    // alert(dTglAbsensi);
    if (dTgl == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else {
      $.ajax({
        type: "POST",
        data: "dTgl=" + dTgl,
        url: "<?= site_url('cek_absen/import') ?>",
        cache: false,
        beforeSend: function() {
          $('#loading').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
        },
        success: function(msg) {
          new PNotify({
            // title: 'Success!',
            text: 'Berhasil Compile Data Absensi.',
            type: 'success'
          });
          $('#dTgl').val("");
          $('#dTgl').focus()
          $('#loading').html("")

          window.location.href = "<?= site_url('gaji/absensi_pegawai') ?>";
        }
      });
    }
  }

  function update_ket(id) {

    var ket = $('#ket_' + id).val();
    var idAbs = $('#id_' + id).val();
    var values = {
      'id': id,
      'ket': ket
    }
    //alert(id+ket);  

    if (ket == "") {
      new PNotify({
        text: 'Pilih Keterangan terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else {
      $.ajax({
        url: "<?= base_url() . 'cek_absen_act/update_absen_keterangan' ?>",
        type: "POST",
        data: values,
        success: function(data) {
          new PNotify({
            // title: 'Success!',
            text: 'Berhasil Update Keterangan Data Absensi.',
            type: 'success'
          });
          //option pesan berhasil send data
          // alert (tanggal);
        },
        error: function(data, status, error) {
          alert(data.responseText);
        }
      });
    }
  }

  function updateDataAbsen(id) {

    var ket_lain = $('#ket_lain_' + id).val();
    // alert(id+ket_lain);

    var values = {
      'id': id,
      'ket_lain': ket_lain
    }

    $.ajax({
      url: "<?php echo base_url() . 'cek_absen_act/update_absen' ?>",
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

  function cetak_pdf() {
    var dTgl_cetak = $('#dTgl_cetak').val();
    // alert(dTgl_cetak);
    if (dTgl_cetak == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else {
      $.ajax({
        type: "POST",
        data: "dTgl_cetak=" + dTgl_cetak,
        url: "<?= site_url('cek_absen_act/cetak_absensi') ?>",
        cache: false,
        beforeSend: function() {
          $('#loading').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
        },
        success: function(msg) {
          new PNotify({
            // title: 'Success!',
            text: 'Berhasil Compile Data Absensi.',
            type: 'success'
          });
          $('#dTgl_cetak').val("");
          $('#dTgl_cetak').focus()
          $('#loading').html("")

          window.location.href = "<?= site_url('gaji/absensi_pegawai') ?>";
        }
      });
    }
  }
</script>