  <?php
  if ($action == "edit") {
    foreach ($field as $column) {
      $cIdSubUnitKErja    =  $column['id_sub_unit_kerja'];
      $cIdUnitKerja       =   $column['id_unit_kerja'];
      $cNamaSubUnitKerja  =   $column['nama_sub_unit_kerja'];
      $cIconButton   =   "refresh";
      $cValueButton  =   "Update Data";
    }
    $cAction = "Update/" . $cIdSubUnitKErja . "";
  } else {
    $cIdSubUnitKErja  =   "";
    $cIdUnitKerja     =   "";
    $cNamaSubUnitKerja   =   "";
    $cIconButton  = "save";
    $cValueButton = "Save Data";
    $cAction      = "Insert";
  }
  ?>

  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
      <div class="col-12">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
          <li class="breadcrumb-item"><?= $menu ?></li>
          <li class="active breadcrumb-item"><?= $file ?></li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-4">
        <!--begin:: Widgets/Input Data Sub Unit Kerja-->
        <div class="kt-portlet">
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                Input Data Sub Unit Kerja
              </h3>
            </div>
          </div>

          <form method="post" enctype="multipart/form-data" action="<?= site_url('action/sub_unit_kerja/' . $cAction . '') ?>">
            <div class="kt-portlet__body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Pilih Unit Kerja</label>
                    <select class="comboBox form-control" name="cIdUnitKerja" id="cIdUnitKerja">
                      <option></option>
                      <?php foreach ($unit_kerja as $key => $vaUnitKerja) {
                        if ($vaUnitKerja['is_deleted'] == 1) {
                        } else {
                      ?>
                          <option value="<?= $vaUnitKerja['id_unit_kerja'] ?>" <?php if ($vaUnitKerja['id_unit_kerja'] == $cIdUnitKerja) echo "selected"; ?>>
                            <?= $vaUnitKerja['nama_unit_kerja'] ?>
                          </option>
                      <?php
                        }
                      } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Sub Unit Kerja</label>
                    <Input type="text" name="cSubUnitKerja" id="cSubUnitKerja" class="form-control" placeholder="Sub Unit Kerja" value="<?= $cNamaSubUnitKerja ?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="kt-portlet__foot">
              <div class="kt-form__actions">
                <button type="button" onclick="return save();" class="btn btn-flat btn-primary">
                  <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                </button>
              </div>
            </div>
          </form>
        </div>
        <!--end:: Widgets/Input Data Sub Unit Kerja-->

      </div>

      <div class="col-8">

        <!--begin:: Widgets/Data Area Kerja-->
        <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
          <div class="kt-portlet__body">
            <table class="table table-striped table-bordered" id="DataTable">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Unit Kerja</td>
                  <td>Sub Unit Kerja</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;
                foreach ($row as $key => $vaSubUnit) {
                  if ($vaSubUnit['is_deleted'] == "1") {
                  } else {
                ?>
                    <tr>
                      <td><?= ++$no; ?></td>
                      <td><?= $vaSubUnit['UnitKerja'] ?></td>
                      <td><?= substr($vaSubUnit['nama_sub_unit_kerja'], 0, 30) ?>..</td>
                      <td class="text-center">

                        <a class="btn btn-outline-success btn-sm btn-icon btn-icon-md" title="Edit Data" href="<?= site_url('master/sub_unit_kerja/edit/' . $vaSubUnit['id_sub_unit_kerja'] . '') ?>">
                          <i class="flaticon-edit"></i>
                        </a>
                        <a class="btn btn-outline-danger btn-sm btn-icon btn-icon-md" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?= site_url('action/sub_unit_kerja/Delete/' . $vaSubUnit['id_sub_unit_kerja'] . '') ?>'}">
                          <i class="flaticon-delete"></i>
                        </a>

                      </td>
                    </tr>
                <?php
                  }
                } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!--end:: Widgets/New Users-->

      </div>
    </div>
  </div>

  <script type="text/javascript">
    function save() {
      var cIdUnitKerja = $('#cIdUnitKerja').val();
      var cSubUnitKerja = $('#cSubUnitKerja').val();

      // alert(dTglWawancara);
      if (cIdUnitKerja == "") {
        new PNotify({
          text: 'Unit Kerja Belum Di isi!',
          animation: 'slide',
          type: 'warning'
        });
      } else if (cSubUnitKerja == "") {
        new PNotify({
          text: 'Sub Unit Kerja Belum Di isi!',
          animation: 'slide',
          type: 'warning'
        });
      } else {
        $.ajax({
          type: "POST",
          data: "cIdUnitKerja=" + cIdUnitKerja +
            "&cSubUnitKerja=" + cSubUnitKerja,
          url: "<?= site_url('action/sub_unit_kerja/' . $cAction) ?>",
          cache: false,
          success: function(msg) {
            // new PNotify({
            //   // title: 'Success!',
            //   text: 'Berhasil Simpan Data Sub Unit Kerja. Input Data Berikutnya',
            //   type: 'success'
            // });
            $('#cIdUnitKerja').val("");
            $('#cSubUnitKerja').val("");
            $('#cIdUnitKerja').focus()

            alert("Berhasil Simpan Data Sub Unit Kerja. Input Data Berikutnya");
            window.location.href = "<?= site_url('master/sub_unit_kerja') ?>";
          }
        });
      }
    }
  </script>