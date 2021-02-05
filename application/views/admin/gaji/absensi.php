<?php
if ($action == "edit") {
  foreach ($field as $column) {
    $cIdAbsensi       =   $column['id_absensi'];
    $cIdStatusAbsensi =   $column['id_status_absensi'];
    $cIdPegawai       =   $column['id_pegawai'];
    $dTglAbsen        =   String2Date($column['tanggal_absen']);
    $cKeterangan      =   $column['keterangan'];
    $cIconButton      =   "refresh";
    $cValueButton     =   "Update Data";
  }

  $cAction = "Update/" . $cIdAbsensi . "";
} else {
  $cIdAbsensi         =   "";
  $cIdStatusAbsensi   =   "";
  $cIdPegawai         =   "";
  $dTglAbsen          =   "";
  $cKeterangan        =   "";
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

                    <form method="post" action="<?php echo base_url("cek_absen2/import"); ?>" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">

                            <table class="table table-striped table-bordered" id="DataTable">
                              <thead>
                                <tr>
                                  <td>No</td>
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
                                  if ($vaArea['is_delete'] == 1) {
                                  } else { ?>

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

                                    <?php } ?>
                                  <?php } ?>
                              </tbody>
                            </table>

                          </div>
                        </div>

                      </div><!-- /.row -->
                    </form>
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

    <div class="row">
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

                <div class="kt-portlet__body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="nav-tabs-custom">

                        <div class="tab-content ">
                          <div class="row">

                            <div class="col-sm-12">
                              <button type="button" onclick="return showDataAbsen();" class="btn btn-success btn-flat">Show Data Absen</button>
                            </div>

                          </div>
                          <br />
                          <div class="row">
                            <div class="col-xl-12 text-center">
                              <div id="show_absen"></div>
                            </div>
                          </div>

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
</script>