  <?php
  if ($action == "edit") {
    foreach ($field as $column) {
      $cIdUnitKerja  =   $column['id_unit_kerja'];
      $cNamaUnitKerja =   $column['nama_unit_kerja'];
      $cIconButton   =   "refresh";
      $cValueButton  =   "Update Data";
    }
    $cAction = "Update/" . $cIdUnitKerja . "";
  } else {
    $cIdUnitKerja  =   "";
    $cNamaUnitKerja =   "";
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
                Input Data Unit Kerja
              </h3>
            </div>
          </div>

          <form method="post" enctype="multipart/form-data" action="<?= site_url('action/unit_kerja/' . $cAction . '') ?>">
            <div class="kt-portlet__body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Pilih Unit Kerja</label>
                    <Input type="text" name="cNamaUnitKerja" class="form-control" placeholder="Nama Unit Kerja" value="<?= $cNamaUnitKerja ?>">
                  </div>
                  <br />
                </div>
              </div>
            </div>

            <div class="kt-portlet__foot">
              <div class="row">
                <div class="col-sm-12">
                  <?php
                  if ($this->session->userdata('level') == 100) {
                  ?>
                    <button type="button" class="btn btn-flat btn-primary" onclick="window.alert('Maaf Anda Tidak Mempunyai Kewenangan')">
                      <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                    </button>
                  <?php
                  } else {
                  ?>
                    <button type="submit" class="btn btn-flat btn-primary">
                      <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                    </button>
                  <?php
                  }
                  ?>

                </div>
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
                  <td>Nama Unit Kerja</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;
                foreach ($row as $key => $vaUnit) { ?>
                  <tr>
                    <td><?= ++$no; ?></td>
                    <td><?= $vaUnit['nama_unit_kerja'] ?></td>
                    <td class="text-center">
                      <a class="btn btn-outline-success btn-sm btn-icon btn-icon-md" title="Edit Data" href="<?= site_url('master/unit_kerja/edit/' . $vaUnit['id_unit_kerja'] . '') ?>">
                        <i class="flaticon-edit"></i>
                      </a>
                      <?php
                      if ($this->session->userdata('level') == 100) {
                      ?>
                        <a class="btn btn-outline-danger btn-sm btn-icon btn-icon-md" title="Hapus Data" onclick="window.alert('Maaf Anda Tidak Mempunyai Kewenangan')">
                          <i class="flaticon-delete"></i>
                        </a>
                      <?php
                      } else {
                      ?>
                        <a class="btn btn-outline-danger btn-sm btn-icon btn-icon-md" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?= site_url('action/unit_kerja/Delete/' . $vaUnit['id_unit_kerja'] . '') ?>'}">
                          <i class="flaticon-delete"></i>
                        </a>
                      <?php
                      }
                      ?>

                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!--end:: Widgets/New Users-->

      </div>

    </div>

  </div>