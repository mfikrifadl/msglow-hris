<?php
if ($action == "edit") {
  foreach ($field as $column) {
    $cIdPegawai    =  $column['id_pegawai'];
    $cNama    =  $column['nama'];
    $cIdSubUnit    =  $column['id_sub_unit_kerja'];
    $cIdRefJabatan =  $column['id_ref_jabatan'];
    $cIconButton   =   "refresh";
    $cValueButton  =   "Update Data";
  }
  $cAction = "Update/" . $cIdPegawai . "";
} else {
  $cIdPegawai    =  "";
  $cIdSubUnit    =  "";
  $cIdRefJabatan =  "";
  $cIconButton  = "save";
  $cValueButton = "Save Data";
  $cAction      = "Insert";
}
?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
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

    <div class="row">
      <div class="col-md-4">


        <div class="box box-success">
          <div class="box-header">
            <div class="box-body">
              <?php if ($action == 'view') {
                if ($view->num_rows() > 0) {
                  foreach ($view->result_array() as $key => $vaView) {
              ?>
                    <div class="kt-portlet">
                      <div class="kt-portlet__head btn btn-success">
                        <div class="kt-portlet__head-label">
                          <h3 class="kt-portlet__head-title">
                            <strong>View Data Pegawai</strong>
                          </h3>
                        </div>
                      </div>

                      <div class="kt-portlet__body">

                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label class="text-dark"> <strong> Nama Pegawai </strong> </label><br />
                              <?= (!empty($vaView['Pegawai'])) ? $vaView['Pegawai'] : "-" ?>
                            </div>
                          </div>
                          <div class="col-sm-9">
                            <div class="form-group">
                              <label class="text-dark"> <strong> Sub Unit Kerja </strong> </label><br />
                              <?= (!empty($vaView['UnitKerja'])) ? $vaView['UnitKerja'] : "-" ?>
                            </div>
                          </div>
                          <div class="col-sm-9">
                            <div class="form-group">
                              <label class="text-dark"> <strong> Jabatan </strong> </label><br />
                              <?= (!empty($vaView['Jabatan'])) ? $vaView['Jabatan'] : "-" ?>
                            </div>
                          </div>
                        </div><br />
                        <div class="col-sm-12">
                          <a href="<?= site_url('transaksi/jabatan_pegawai') ?>" class="btn btn-primary">
                            <i class="fa fa-hand-point-left" aria-hidden="true"></i> Kembali
                          </a>
                        </div>

                      </div>

                    </div>
                  <?php }
                } else { ?>
                  <div class="kt-portlet">
                    <div class="kt-portlet__body">
                      <div class="row">
                        <div class="col-12">
                          <div class="alert alert-danger" role="alert">
                            <div class="alert-text">
                              <h4 class="alert-heading">Tidak Ada Data</h4>
                              <hr>
                              <p>Karyawan Belum Mengisi Data Jabatan</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <a href="<?= site_url('transaksi/jabatan_pegawai') ?>" class="btn btn-info">
                            <i class="fa fa-hand-point-left"></i> Kembali
                          </a>
                        </div>
                      </div>
                    </div>

                  </div>
                <?php } ?>
              <?php } else { ?>
                <div class="kt-portlet">
                  <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                      <h3 class="kt-portlet__head-title">
                        <strong>Input Jabatan Pegawai</strong>
                      </h3>
                    </div>
                  </div>

                  <div class="kt-portlet__body">
                    <div class="form-group row">
                      <form method="post" enctype="multipart/form-data" action="<?= site_url('transaksi_act/jabatan_pegawai/' . $cAction . '') ?>">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>Pilih Pegawai</label>
                              <?php
                              if ($action == "edit") {
                                ?>
                                <input type="text" readonly="true" class="form-control" value="<?= $cNama ?>">
                                <?php
                              } else {
                              ?>
                                <select class="comboBox form-control" name="cIdPegawai">
                                  <option></option>
                                  <?php foreach ($pegawai as $key => $vaPegawai) {
                                    if (empty($vaPegawai['id_status_mengundurkan_diri']) || $vaPegawai['id_status_mengundurkan_diri'] < 6 || $vaPegawai['id_status_mengundurkan_diri'] > 11) {
                                      if (empty($vaPegawai['nama_jabatan'])) {
                                  ?>
                                        <option value="<?= $vaPegawai['id_pegawai'] ?>" <?php if ($vaPegawai['id_pegawai'] == $cIdPegawai) echo "selected"; ?>>
                                          <?= $vaPegawai['nik'] ?> : <?= $vaPegawai['nama'] ?>
                                        </option>
                                  <?php
                                      } else {
                                      }
                                    } else {
                                    }
                                  }
                                  ?>
                                </select>
                              <?php
                              }
                              ?>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>Jabatan</label>
                              <select class="comboBox form-control" id="cIdRefJabatan" onchange="cek_sub_unit_kerja(this.value)" name="cIdRefJabatan">
                                <option></option>
                                <?php foreach ($jabatan as $key => $vaJabatan) { ?>
                                  <option value="<?= $vaJabatan['id_ref_jabatan'] ?>" <?php if ($vaJabatan['id_ref_jabatan'] == $cIdRefJabatan) echo "selected"; ?>>
                                    <?= $vaJabatan['nama_jabatan'] ?>
                                  </option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>Pilih Sub Unit Kerja</label>
                              <div id="data_sub_unit_kerja"></div>
                              <!-- <select class="comboBox form-control" name="cIdSubUnitKerja">
                                <option></option>
                                <?php // foreach ($sub_unit as $key => $vaSubUnit) { ?>
                                  <option value="<?= $vaSubUnit['id_sub_unit_kerja'] ?>" <?php //if ($vaSubUnit['id_sub_unit_kerja'] == $cIdSubUnit) echo "selected"; ?>>
                                    <?= $vaSubUnit['nama_sub_unit_kerja'] ?>
                                  </option>
                                <?php //} ?>
                              </select> -->
                            </div>
                          </div>
                        </div><br />
                        <div class="row">
                          <div class="col-sm-12">
                            <button type="submit" class="btn btn-flat btn-primary">
                              <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                            </button>
                            <?php if ($action == 'edit') { ?>
                              <a href="<?= site_url('transaksi/jabatan_pegawai') ?>" class="btn btn-primary">
                                <i class="fa fa-hand-point-left" aria-hidden="true"></i> Kembali
                              </a>
                            <?php } ?>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>


        <!--end::Portlet-->
      </div>
      <div class="col-md-8">

        <!--begin::Portlet-->
        <!-- <div class="kt-portlet">
            <div class="kt-portlet__head">
              <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                  <strong>Cari Jabatan Pegawai</strong>
                </h3>
              </div>
            </div> -->

        <!--begin::Form-->
        <!-- <div class="kt-portlet__body">
              <div class="row">
                <div class="form-group input-group">
                  <div class="col-10">
                    <select class="comboBox form-control" name="cIdPegawai" id="cIdPegawai">
                      <option></option>
                      <?php //foreach ($pegawai as $key => $vaPegawai) { 
                      ?>
                        <option value="<?php //$vaPegawai['id_pegawai'] 
                                        ?>">
                          <?php // $vaPegawai['nik'] 
                          ?> : <?php // $vaPegawai['nama'] 
                                ?>
                        </option>
                      <?php// } ?>
                    </select>
                  </div>
                  <div class="input-group-append">
                    <button type="button" onclick="window.location.href='<?php// base_url() ?>transaksi/jabatan_pegawai/view/'+document.getElementById('cIdPegawai').value" class="btn btn-danger btn-sm btn-icon btn-brand btn-icon-md">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div> -->
        <!--end::Form-->
        <!-- </div> -->

        <!--end::Portlet-->

        <!--begin::Portlet-->
        <div class="kt-portlet">

          <!--begin::Form-->

          <div class="kt-portlet__body">

            <table class="table table-striped table-bordered" id="DataTable">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Pegawai</td>
                  <td>Sub Unit Kerja</td>
                  <td>Jabatan</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;
                foreach ($row as $key => $vaJabatanPegawai) { ?>
                  <tr>
                    <td><?= ++$no; ?></td>
                    <td><?= $vaJabatanPegawai['Pegawai'] ?></td>
                    <td><?= substr($vaJabatanPegawai['UnitKerja'], 0, 20) ?> ..</td>
                    <td><?= ($vaJabatanPegawai['Jabatan']) ?></td>
                    <td>
                      <a class="btn-link" title="View Data" href="<?= site_url('transaksi/jabatan_pegawai/view/' . $vaJabatanPegawai['id_pegawai'] . '') ?>">
                        <i class="fa fa-eye text-success"></i>
                      </a>
                      |
                      <a class="btn-link" title="Edit Data" href="<?= site_url('transaksi/jabatan_pegawai/edit/' . $vaJabatanPegawai['id_pegawai'] . '') ?>">
                        <i class="fa fa-edit text-info"></i>
                      </a>
                      
                      <!-- <a class="btn-link" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?= site_url('transaksi_act/jabatan_pegawai/Delete/' . $vaJabatanPegawai['id_jabatan_pegawai'] . '') ?>'}">
                        <i class="fa fa-trash text-danger"></i>
                      </a> -->
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>

          </div>



          <!--end::Form-->
        </div>

        <!--end::Portlet-->
      </div>
    </div>
  </div>

  <!-- end:: Content -->
</div>

<script type="text/javascript">

    function cek_sub_unit_kerja(data) {

        var cUnit_k = $('#cIdRefJabatan').val();
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>transaksi_act/get_sub_unit_kerja_jabatan_pegawai/" + cUnit_k,
            cache: false,
            beforeSend: function() {
                $('#data_sub_unit_kerja').html("Cek Data Ke Sistem .. ");
            },
            success: function(msg) {
                $("#data_sub_unit_kerja").html(msg);
            }
        });

    }
</script>