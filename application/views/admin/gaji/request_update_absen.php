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

          <div class="accordion accordion-solid accordion-toggle-plus" id="accordionTableAbsensi">
            <div class="card">
              <div class="card-header" id="headingTableAbsensi">
                <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseTableAbsensi" aria-expanded="true" aria-controls="collapseTableAbsensi">
                  <strong> Cek Update Data Table Absensi </strong>
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
                              <button type="button" onclick="return showDataAbsen();" class="btn btn-success btn-flat">Show Update Data Absen</button>
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
      url: "<?= site_url('transaksi/tb_temp_update_absensi') ?>",
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