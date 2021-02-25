<?php
date_default_timezone_set("Asia/Jakarta");
$tgl_hari_ini = date("d-m-Y");

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
                  <strong> Data Absensi Oleh Mesin </strong>
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

                            <div class="row">

                              <?php
                              if ($this->session->userdata('level') == 3) {
                              ?>
                                <div class="col-sm-8 col-md-8">
                                  <div class="form-group row">
                                    <label class="col-form-label col-lg-4 col-sm-12">Input Tanggal Absensi</label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                      <div class="input-daterange input-group">
                                        <input type="date" name="dTgl" id="dTgl" class="form-control" data-date-format="dd-mm-yyyy" placeholder="Tanggal Absensi" required>

                                        <button type="button" class="btn btn-outline-success btn-md btn-icon btn-icon-md" onclick="GetDataAbsensiPerHari();" value="Search">
                                          <i class="flaticon2-refresh"></i>
                                        </button>
                                      </div>
                                      <span class="form-text text-muted">date selection</span>
                                    </div>
                                  </div>
                                </div>
                              <?php
                              } elseif ($this->session->userdata('level') == 1) {
                              ?>
                                <!-- <div class="col-sm-8 col-md-8">
                                  <div class="form-group row">
                                    <label class="col-form-label col-lg-4 col-sm-12">Input Tanggal Absensi</label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                      <div class="input-daterange input-group">
                                        <input type="date" name="dTgl" id="dTgl" class="form-control" data-date-format="dd-mm-yyyy" placeholder="Tanggal Absensi" required>
                                        <div class="input-group-append">
                                          <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                        </div>
                                        <input type="date" name="dTgl_end" id="dTgl_end" class="form-control" data-date-format="dd-mm-yyyy" placeholder="Tanggal Absensi" required>
                                        <div class="input-group-append">
                                          <span class="input-group-text"></span>
                                        </div>
                                        <button type="button" class="btn btn-outline-success btn-md btn-icon btn-icon-md" onclick="GetDataAbsensi();" value="Search">
                                          <i class="flaticon2-refresh"></i>
                                        </button>
                                      </div>
                                      <span class="form-text text-muted">date range selection</span>
                                    </div>
                                  </div>
                                </div> -->
                              <?php
                              } else {
                              }
                              ?>



                              <div class="col-sm-2 col-md-2">
                                <div class="form-group pull-right">
                                  <a type="button" class="btn btn-outline-primary btn-md" target="blank" href="<?= site_url('surat_act/cetak_form_keluar_kantor') ?>">
                                    Form Keluar Kantor
                                  </a>
                                  <span class="form-text text-muted">Cetak Form</span>
                                </div>
                              </div>

                              <div class="col-sm-2 col-md-2">
                                <div class="form-group">
                                  <a type="button" class="btn btn-outline-primary btn-md" target="blank" href="<?= site_url('surat_act/cetak_form_cuti') ?>">
                                    Form Cuti
                                  </a>
                                </div>
                              </div>

                            </div>

                            <br />
                            <div id="data_absensi"></div>
                            <br />

                          </div>
                        </div>

                      </div><!-- /.row -->
                      <hr>
                    </form>
                    <!--/.box -->
                  </div> <!-- /.col -->
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
                  <strong> Data Rekap Absensi </strong>
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
                          <form method="post" enctype="multipart/form-data" target="blank" action="<?= site_url('Cek_absen_act/cetak_absensi/') ?>">

                            <div class="row">
                              <?php
                              if ($this->session->userdata('level') == 3) {
                              ?>
                                <div class="form-group row">
                                  <label class="col-form-label col-lg-6 col-sm-12">Tanggal Absensi Yang Di Cetak</label>
                                  <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="input-daterange input-group">
                                      <input type="date" name="dTgl_cetak" id="dTgl_cetak" class="form-control" data-date-format="dd-mm-yyyy" required>
                                      <button type="button" class="btn btn-outline-success btn-md btn-icon btn-icon-md" onclick="getDataAbsenImportPerHari();" value="Search">
                                        <i class="flaticon2-refresh"></i>
                                      </button>
                                    </div>
                                    <span class="form-text text-muted">date selection</span>
                                  </div>
                                </div>
                              <?php
                              } elseif ($this->session->userdata('level') == 1) {
                              ?>
                                <div class="form-group row">
                                  <label class="col-form-label col-lg-4 col-sm-12">Tanggal Absensi Yang Di Cetak</label>
                                  <div class="col-lg-8 col-md-12 col-sm-12">
                                    <div class="input-daterange input-group">
                                      <input type="date" name="dTgl_cetak" id="dTgl_cetak" class="form-control" data-date-format="dd-mm-yyyy" required>
                                      <div class="input-group-append">
                                        <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                      </div>
                                      <input type="date" name="dTgl_cetak_end" id="dTgl_cetak_end" class="form-control" data-date-format="dd-mm-yyyy" placeholder="Tanggal Absensi" required>
                                      <div class="input-group-append">
                                        <span class="input-group-text"></span>
                                      </div>
                                      <button type="button" class="btn btn-outline-success btn-md btn-icon btn-icon-md" onclick="getDataAbsenImport();" value="Search">
                                        <i class="flaticon2-refresh"></i>
                                      </button>
                                    </div>
                                    <span class="form-text text-muted">date range selection</span>
                                  </div>
                                </div>
                              <?php
                              } else {
                              }
                              ?>


                            </div>

                            <br />
                            <div id="data_absensi_import"></div>
                            <br />

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

  function GetDataAbsensi() {
    var dTgl = $('#dTgl').val();
    var dTgl_end = $('#dTgl_end').val();
    // alert(dTgl);
    if (dTgl == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else if (dTgl_end == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else {
      $.ajax({
        type: "POST",
        data: "dTgl=" + dTgl +
          "&dTgl_end=" + dTgl_end,
        url: "<?= site_url('cek_absen/get_data_absensi') ?>",
        cache: false,
        beforeSend: function() {
          $('#data_absensi').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
        },
        success: function(msg) {
          $("#data_absensi").html(msg);
        }
      });
    }
  }

  function GetDataAbsensiPerHari() {
    var dTgl = $('#dTgl').val();
    // alert(dTgl);
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
        url: "<?= site_url('cek_absen/get_data_absensi_per_hari') ?>",
        cache: false,
        beforeSend: function() {
          $('#data_absensi').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
        },
        success: function(msg) {
          $("#data_absensi").html(msg);
        }
      });
    }
  }

  function getDataAbsenImport() {
    var dTgl_cetak = $('#dTgl_cetak').val();
    var dTgl_cetak_end = $('#dTgl_cetak_end').val();
    // alert(dTgl);
    if (dTgl_cetak == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else if (dTgl_cetak_end == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else {
      $.ajax({
        type: "POST",
        data: "dTgl_cetak=" + dTgl_cetak +
          "&dTgl_cetak_end=" + dTgl_cetak_end,
        url: "<?= site_url('cek_absen/get_data_absensi_import') ?>",
        cache: false,
        beforeSend: function() {
          $('#data_absensi_import').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
        },
        success: function(msg) {
          $("#data_absensi_import").html(msg);
        }
      });
    }
  }

  function getDataAbsenImportPerHari() {
    var dTgl_cetak = $('#dTgl_cetak').val();   
    // alert(dTgl);
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
        url: "<?= site_url('cek_absen/get_data_absensi_import_per_hari') ?>",
        cache: false,
        beforeSend: function() {
          $('#data_absensi_import').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
        },
        success: function(msg) {
          $("#data_absensi_import").html(msg);
        }
      });
    }
  }

  function run() {

    var dTgl = $('#dTgl').val();
    var dTgl_end = $('#dTgl_end').val();
    // alert(dTglAbsensi);
    if (dTgl == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else if (dTgl_end == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else {
      $.ajax({
        type: "POST",
        data: "dTgl=" + dTgl +
          "&dTgl_end=" + dTgl_end,
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

          //window.location.href = "<?= site_url('gaji/absensi_pegawai') ?>";
        }
      });
    }
  }

  function updateDataAbsen(id) {

    var ket_lain = $('#ket_lain_' + id).val();
    var dTgl_cetak = $('#dTgl_cetak' + id).val();
    var nik_ket_update = $('#nik_ket_update_' + id).val();
     //alert(id+"-"+ket_lain+"-"+dTgl_cetak+"-"+nik_ket_update);

    var values = {
      'id': id,
      'dTgl_cetak': dTgl_cetak,
      'nik_ket_update': nik_ket_update,
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

  function update_ket(id) {
    
    var ket = $('#ket_' + id).val();
    var idAbs = $('#id_' + id).val();
    var dTgl_cetak = $('#dTgl_cetak').val();
    var nik_ket_update = $('#nik_ket_update_' + id).val();
    var values = {
      'id': id,
      'dTgl_cetak': dTgl_cetak,
      'nik_ket_update': nik_ket_update,
      'ket': ket
    }
    //alert(id+"-"+ket+"-"+dTgl_cetak+"-"+nik_ket_update);  

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

  function approvement(id) {

    var keterangan = $('#ket_abs_temp_' + id).val();
    var ket_lain = $('#ket_abs_lain_temp_' + id).val();
    var dTgl_cetak = $('#dTgl_cetak').val();
    var dTgl_cetak_end = $('#dTgl_cetak_end').val();
    //alert(id+keterangan+ket_lain+dTgl_cetak+dTgl_cetak_end);

    var values = {
      'id': id,
      'ket_lain': ket_lain,
      'keterangan': keterangan,
      'dTgl_cetak': dTgl_cetak,
      'dTgl_cetak_end': dTgl_cetak_end
    }

    $.ajax({
      url: "<?= base_url() . 'cek_absen_act/approvement_update' ?>",
      type: "POST",
      data: values,
      success: function(data) {
        //option pesan berhasil send data
        new PNotify({
          // title: 'Success!',
          text: 'Berhasil Approve Data Absensi.',
          type: 'success'
        });
      },
      error: function(data, status, error) {
        alert(data.responseText);
      }
    });
  }

  function reject(id) {
    //alert(id);

    var values = {
      'id': id,
    }

    $.ajax({
      url: "<?= base_url() . 'cek_absen_act/reject_update' ?>",
      type: "POST",
      data: values,
      success: function(data) {
        //option pesan berhasil send data
        new PNotify({
          // title: 'Success!',
          text: 'Berhasil Reject Data Absensi.',
          type: 'success'
        });

      },
      error: function(data, status, error) {
        alert(data.responseText);
      }
    });
  }

  function cetak_pdf() {

    var dTgl_cetak = $('#dTgl_cetak').val();
    var dTgl_cetak_end = $('#dTgl_cetak_end').val();
    //alert(dTgl_cetak + dTgl_cetak_end);
    if (dTgl_cetak == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else if (dTgl_cetak_end == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else {
      $.ajax({
        type: "POST",
        data: "dTgl_cetak=" + dTgl_cetak +
          "&dTgl_cetak_end=" + dTgl_cetak_end,
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

          //window.location.href = "<?= site_url('gaji/absensi_pegawai') ?>";
        }
      });
    }
  }
</script>