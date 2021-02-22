  <?php
  if ($action == "edit") {
    foreach ($field as $column) {
      $cIdOutlet      =   $column['id_outlet'];
      $cKodeOutlet    =   $column['kode'];
      $cIdArea        =   $column['id_area'];
      $cNama          =   $column['nama'];
      $cIdSpv         =   $column['id_spv'];
      $cIconButton    =   "refresh";
      $cValueButton   =   "Update Data";
    }
    $cAction = "Update/" . $cIdOutlet . "";
  } else {
    $cIdOutlet      =   "";
    $cKodeOutlet    =   "";
    $cIdArea        =   "";
    $cNama          =   "";
    $cIdSpv         =   "";
    $cIconButton   = "save";
    $cValueButton  = "Save Data";
    $cAction       = "Insert";
  }
  ?>

  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
      <div class="col-sm-12">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
          <li class="breadcrumb-item"><?= $menu ?></li>
          <li class="breadcrumb-item active"><?= $file ?></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-4">
        <!--begin::Portlet-->
        <div class="kt-portlet">
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                Input Data Outlet
              </h3>
            </div>
          </div>

          <!--begin::Form-->
          <div class="kt-portlet">
            <div class="kt-portlet__body">
              <form class="kt-form" method="post" enctype="multipart/form-data" action="<?= site_url('action/outlet/' . $cAction . '') ?>">


                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Kode</label>
                      <Input type="text" name="cKode" class="form-control" placeholder="Kode Outlet" value="<?= $cKodeOutlet ?>">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Area Outlet</label>
                      <select class="comboBox form-control" name="cIdArea">
                        <option></option>
                        <?php foreach ($area as $key => $vaArea) {
                          if ($vaArea['is_deleted'] == 1) {
                          } else {
                        ?>
                            <option value="<?= $vaArea['id_area'] ?>" <?php if ($vaArea['id_area'] == $cIdArea) echo "selected"; ?>>
                              <?= $vaArea['nama_area'] ?>
                            </option>
                        <?php
                          }
                        } ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Nama Office</label>
                      <Input type="text" name="cNama" class="form-control" placeholder="Nama Outlet" value="<?= $cNama ?>">
                    </div>
                  </div>
                </div>

                <!-- <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Supervisor</label>
                      <select class="comboBox form-control" name="cIdSpv">
                        <option></option>
                        <?php foreach ($spv as $key => $vaSpv) { ?>
                          <option value="<?= $vaSpv['id_spv'] ?>" <?php if ($vaSpv['id_spv'] == $cIdSpv) echo "selected"; ?>>
                            <?= $vaSpv['nama'] ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div> -->


                <div class="row">
                  <div class="col-12">
                    <div class="kt-portlet__foot">
                      <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">
                          <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

              </form>
              <!--end::Form-->

            </div>
            <!--end::Portlet-->
          </div>
        </div>
      </div>

      <div class="col-8">
        <!--begin::Portlet-->
        <div class="kt-portlet">
          <div class="kt-portlet__body">
            <table class="table table-striped table-bordered" id="DataTable">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Kode</td>
                  <td>Area</td>
                  <td>Nama</td>
                  <!-- <td>Spv</td> -->
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;
                foreach ($row as $key => $vaOutlet) {
                  if ($vaOutlet['is_delete_outlet'] == 1 or $vaOutlet['is_delete_area'] == 1) {
                  } else {
                ?>
                    <tr>
                      <td><?= ++$no; ?></td>
                      <td><?= $vaOutlet['kode'] ?></td>
                      <td><?= $vaOutlet['Area'] ?></td>
                      <td><?= $vaOutlet['nama'] ?></td>
                      <!-- <td><?= $vaOutlet['Spv'] ?></td> -->
                      <td class="text-center">
                        <div class="btn-group" role="group" aria-label="First group">
                          <a class="btn btn-sm btn-outline-info btn-elevate btn-icon" title="Edit Data" href="<?= site_url('master/outlet/edit/' . $vaOutlet['id_outlet'] . '') ?>">
                            <i class="flaticon-edit"></i>
                          </a>
                          <a class="btn btn-sm btn-outline-danger btn-elevate btn-icon" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                  { window.location.href='<?= site_url('action/outlet/Delete/' . $vaOutlet['id_outlet'] . '') ?>'}">
                            <i class="flaticon-delete"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                <?php
                  }
                } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!--end::Portlet-->
      </div>

    </div>
  </div>