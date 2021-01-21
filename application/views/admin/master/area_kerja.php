  <?php
  if ($action == "edit") {
    foreach ($field as $column) {
      $cIdArea    = $column['id_area'];
      $cKodeArea  = $column['kode_area'];
      $cNamaArea  = $column['nama_area'];
      $cIconButton   =   "refresh";
      $cValueButton  =   "Update Data";
    }
    $cAction = "Update/" . $cIdArea . "";
  } else {
    $cIdArea      = "";
    $cKodeArea    = "";
    $cNamaArea    = "";
    $cIconButton  = "save";
    $cValueButton = "Save Data";
    $cAction      = "Insert";
  }
  ?>
  <div class="kt-container kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
      <div class="col-sm-12">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
          <li class="breadcrumb-item"><?= $menu ?></li>
          <li class="active breadcrumb-item"><?= $file ?></li>
        </ul>
      </div>
    </div>
    <!--Begin::Row-->
    <div class="row">
      <div class="col-xl-5">

        <!--begin:: Widgets/Input Area-->
        <div class="kt-portlet">
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                Input Data Area Kerja
              </h3>
            </div>
          </div>
          <form method="post" enctype="multipart/form-data" action="<?= site_url('action/area_kerja/' . $cAction . '') ?>">
            <div class="kt-portlet__body">
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Kode Area</label>
                    <Input type="text" name="cKodeArea" class="form-control" placeholder="Kode Area" value="<?= $cKodeArea ?>">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Nama Area</label>
                    <Input type="text" name="cNamaArea" class="form-control" placeholder="Nama Area" value="<?= $cNamaArea ?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="kt-portlet__foot">
              <div class="kt-form__actions">
                <button type="submit" class="btn btn-flat btn-primary">
                  <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                </button>
              </div>
            </div>
          </form>
        </div>

        <!--end:: Widgets/Input Area-->
      </div>

      <div class="col-xl-7">

        <!--begin:: Widgets/Data Area Kerja-->
        <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
          <!-- <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                Daftar Area Kerja
              </h3>
            </div>
          </div> -->
          <div class="kt-portlet__body">
            <table class="table table-striped table-bordered" id="DataTable">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Kode Area</td>
                  <td>Nama Area</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;
                foreach ($row as $key => $vaArea) {
                  if ($vaArea['is_deleted'] == 1) {
                  } else {
                ?>
                    <tr>
                      <td><?= ++$no; ?></td>
                      <td><?= $vaArea['kode_area'] ?></td>
                      <td><?= $vaArea['nama_area'] ?></td>
                      <td class="text-center">

                        <a class="btn btn-outline-success btn-sm btn-icon  btn-icon-md" title="Edit Data" href="<?= site_url('master/area_kerja/edit/' . $vaArea['id_area'] . '') ?>">
                          <i class="flaticon-edit"></i>
                        </a>
                        <a class="btn btn-outline-danger btn-sm btn-icon  btn-icon-md" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                          { window.location.href='<?= site_url('action/area_kerja/Delete/' . $vaArea['id_area'] . '') ?>'}">
                          <i class="flaticon-delete"></i>
                        </a>

                      </td>
                    </tr>
                <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <!--end:: Widgets/New Users-->
      </div>
    </div>

    <!--End::Row-->

  </div>