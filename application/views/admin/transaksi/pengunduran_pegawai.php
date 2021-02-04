<?php
if ($action == "edit") {
  foreach ($field as $column) {
    $cIdPengunduranDiri   = $column['id_pengunduran_diri'];
    $cIdPegawai           = $column['id_pegawai'];
    // $cNIKPegawai          = $column['nik'];
    // $cGolongan            = $column['id_kerja'];
    // $cSTPegawai           = $column['id_status'];
    $cTgl_masuk_kerja     = String2Date_masuk_kerja($column['tanggal_masuk_kerja']);
    $cTgl_masa_kerja     = String2Date_masa_kerja($column['masa_kerja']);
    $cIdStatus            = $column['status'];
    $cKeterangan          = $column['keterangan'];
    $dTgl                 = String2Date($column['tanggal']);
    $cIconButton   =   "refresh";
    $cValueButton  =   "Update Data";
  }
  foreach ($pegawai as $column) {
    $tglMasukKerja   = $column['tanggal_masuk_kerja'];
  }
  $cAction = "Update/" . $cIdPengunduranDiri . "";
} else {
  $cIdPengunduranDiri   = "";
  $cIdPegawai           = "";
  // $cNIKPegawai          = "";
  // $cGolongan            = "";
  // $cSTPegawai           = "";
  $cIdStatus            = "";
  $cTgl_masuk_kerja     = date("d-m-Y");
  $cTgl_masa_kerja     = date("d-m-Y");
  $cKeterangan          = "";
  $dTgl                 = date("d-m-Y");
  $cIconButton  = "save";
  $cValueButton = "Save Data";
  $cAction      = "Insert";
}
?>
<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

  <div class="row">
    <div class="col-12">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
        <li class="breadcrumb-item"><?= $menu ?></li>
        <li class="breadcrumb-item active"><?= $file ?></li>
      </ul>
    </div>
  </div>

  <!--konten halaman ini bisa isi disini mulai dari <div class="row"> pada setiap widgetnya-->
  <div class="row">
    <div class="col-sm-12 col-md-12">
      <div class="kt-portlet">
        <div class="kt-portlet__head kt-portlet__head--lg">
          <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
              <i class="kt-font-brand fa fa-edit"></i>
            </span>
            <h3 class="kt-portlet__head-title">
              Input Pegawai Resign / Gugur
            </h3>
          </div>
        </div>

        <div class="kt-portlet__body">

          <form method="post" enctype="multipart/form-data" action="<?= site_url('transaksi_act/pengundurandiri_pegawai/' . $cAction . '') ?>">
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Pilih Pegawai</label>
                  <select onchange="cek_pegawai(this.value)" class="form-control kt-selectpicker" data-live-search="true" name="cIdPegawai">
                    <option></option>
                    <?php foreach ($pegawai as $key => $vaPegawai) {
                      if ($vaPegawai['id_status_mengundurkan_diri'] == null || $vaPegawai['id_status_mengundurkan_diri'] < 6) {

                    ?>
                        <option value="<?= $vaPegawai['id_pegawai']  ?>" <?php if ($vaPegawai['id_pegawai'] == $cIdPegawai) echo "selected"; ?>>
                          <?= $vaPegawai['nik'] ?> : <?= $vaPegawai['nama'] ?>
                        </option>

                    <?php
                      } else {
                      }
                    } ?>

                  </select>
                </div>
              </div>

              <div class="col-sm-2">
                <?php
                if ($action == "edit") {
                ?>
                  <div class="form-group">
                    <label>Tanggal Masuk Kerja</label>
                    <input type="text" readonly="true" class="form_control" value="<?= $tglMasukKerja ?>">
                  </div>
                <?php
                } else {
                ?>
                  <div class="form-group">
                    <label>Tanggal Masuk Kerja</label>
                    
                    <input type="text" readonly="true" class="form_control" id="cTgl_masuk_kerja">
                  </div>
                <?php
                }
                ?>

              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label>Tanggal Resign / Gugur</label>
                  <input type="text" class="form-control" value="<?= $dTgl ?>" data-date-format="dd-mm-yyyy" name="dTgl" id="kt_datepicker_1" required>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Status Pegawai</label>
                  <input type="text" readonly="true" class="form_control" id="cStatus_kerja">
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Status Resign </label>
                  <select class="form-control kt-selectpicker" data-live-search="true" name="cIdStatus" required>
                    <option></option>

                    <?php foreach ($st_karyawan as $key => $vaSt_karyawan) {


                    ?>
                      <!-- <option value="<?= $vaSt_karyawan['id_status']  ?>" <?php //if ($vaSt_karyawan['id_status'] == $cIdStatus) echo "selected"; ?>>
                        <?= $vaSt_karyawan['status'] ?>
                      </option> -->

                    <?php
                    }
                    ?>

                    <option value="6" <?php if ($cIdStatus == 6) echo "selected"; 
                                            ?>>Mengundurkan Diri</option>
                      <option value="7" <?php if ($cIdStatus == 7) echo "selected"; 
                                        ?>>Gugur</option>
                      <option value="8" <?php if ($cIdStatus == 8) echo "selected"; 
                                        ?>>PHK</option>
                      <option value="9" <?php if ($cIdStatus == 9) echo "selected"; 
                                        ?>>Mengundurkan Diri Tanpa Ke Kantor</option>
                      <option value="10" <?php if ($cIdStatus == 10) echo "selected"; 
                                          ?>>Mengundurkan Diri Tanpa Alasan</option>
                      <option value="11" <?php if ($cIdStatus == 11) echo "selected"; 
                                          ?>>Cut Off</option>
                      <option value="12" <?php if ($cIdStatus == 12) echo "selected"; 
                                          ?>>Mutasi Klinik</option>
                      <option value="13" <?php if ($cIdStatus == 13) echo "selected"; 
                                          ?>>Mutasi Gudang</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea class="form-control" name="cKeterangan" placeholder="Keterangan"><?= $cKeterangan ?></textarea>
                </div>
              </div>
            </div><br />

            <div class="row">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-flat btn-primary">
                  <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                </button>
              </div>
            </div>
          </form>

        </div>

      </div>
    </div>

    <div class="col-sm-12 col-md-12">
      <div class="kt-portlet">
        <div class="kt-portlet__head kt-portlet__head--lg">
          <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
              <i class="kt-font-brand fa fa-user"></i>
            </span>
            <h3 class="kt-portlet__head-title">
              Data Pegawai Resign
            </h3>
          </div>
        </div>

        <div class="kt-portlet__body">

          <div class="row">

            <div class="col-sm-12">

              <table class="table table-striped table-bordered DataTablePegawaiJos" id="DataTable" style="width: 100%">
                <thead>
                  <tr>
                    <td>No</td>
                    <td>NIK</td>
                    <td>Nama Pegawai</td>
                    <td>Status Kepegawaian</td>
                    <td>Status Pegawai</td>
                    <td>Jabatan</td>
                    <td>Sub Unit Kerja</td>
                    <td>Masa Kerja</td>
                    <td>Tanggal Resign</td>
                    <td>Status Resign</td>
                    <td>Keterangan</td>
                    <td>Action</td>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0;
                  foreach ($row as $key => $vaKetidakhadiran) {

                  ?>
                    <tr>
                      <td class="text-center"><?= ++$no; ?></td>
                      <td><?= $vaKetidakhadiran['nik'] ?></td>
                      <td><?= $vaKetidakhadiran['nama'] ?></td>
                      <td><?= $vaKetidakhadiran['status_kepegawaian'] ?></td>
                      <td><?= $vaKetidakhadiran['status_karyawan'] ?></td>
                      <td><?= $vaKetidakhadiran['nama_jabatan'] ?></td>
                      <td><?= $vaKetidakhadiran['nama_sub_unit_kerja'] ?></td>
                      <td><?= $vaKetidakhadiran['masa_kerja'] ?></td>
                      <td><?= String2Date($vaKetidakhadiran['tanggal']) ?></td>
                      <?php
                      if ($vaKetidakhadiran['status'] == "0") {
                      ?>
                        <td class="text-center"> - </td>
                      <?php
                      } else {
                      ?>
                        <td><?= $vaKetidakhadiran['status'] ?></td>
                      <?php
                      }
                      ?>
                      <td><?= $vaKetidakhadiran['keterangan']  ?></td>
                      <td>

                        <a class="btn-link" title="View Data" href="<?= site_url('transaksi/pengundurandiri_pegawai/edit/' . $vaKetidakhadiran['id_pengunduran_diri'] . '') ?>">
                          <i class="fa fa-edit text-info"></i>
                        </a>

                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>

              <!-- <div class="row">
                <div class="col-sm-12">
                  <a href="<?php// echo site_url('rekap/mengundurkan_diri') ?>" class="btn btn-primary btn-flat" target="_blank">
                    <i class="fa fa-print"></i> Cetak Excel
                  </a>
                </div>
              </div> -->

            </div>

          </div>

        </div>

      </div>
    </div>

  </div>

</div>

<script>
   function cek_pegawai(data) {
      //alert(data);
     var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         hasil = (this.responseText).split('~');

          //alert (this.responseText);
         document.getElementById('cTgl_masuk_kerja').value = hasil[0];
         document.getElementById('cStatus_kerja').value = hasil[1];
       }
     };
     xmlhttp.open("GET", "<?= site_url('Transaksi_act/get_data_pegawai/') ?>/" + data, true);
     xmlhttp.send();
    }
</script>

<!-- end:: Content -->