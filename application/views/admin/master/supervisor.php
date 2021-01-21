  <?php
  if ($action == "edit") {
    foreach ($field as $column) {
      $cIdSpv        =    $column['id_spv'];
      $cNik          =    $column['nik'];
      $cNama         =    $column['nama'];
      $nTelepon      =    $column['telepon'];
      $cIdOutlet     =    $column['id_outlet'];
      $cIconButton   =   "refresh";
      $cValueButton  =   "Update Data";
    }
    $cAction = "spv_update/" . $cIdSpv . "";
  } else {
    $cIdSpv        =    "";
    $cNik          =    "";
    $cNama         =    "";
    $nTelepon      =    "";
    $cIdOutlet     =    "";
    $cIconButton   = "save";
    $cValueButton  = "Save Data";
    $cAction       = "spv_insert";
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
        <div class="kt-portlet">
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                Input Data Supervisor
              </h3>
            </div>
          </div>

          <form class="kt-form kt-form--label-right" method="post" enctype="multipart/form-data" action="<?= site_url('action/' . $cAction . '') ?>">
            <div class="kt-portlet__body">
              <div class="form-group">
                <label>Nik</label>
                <Input type="text" name="cNik" class="form-control" placeholder="NIK" value="<?= $cNik ?>">
              </div>
              <div class="form-group">
                <label>Nama SPV</label>
                <Input type="text" name="cNama" class="form-control" placeholder="Nama" value="<?= $cNama ?>">
              </div>
              <div class="form-group">
                <label>Telepon</label>
                <Input type="text" name="nTelepon" class="form-control" placeholder="Telefon" value="<?= $nTelepon ?>">
              </div>
              <div class="form-group">
                <label>Outlet</label>
                <select class="comboBox form-control" name="cIdOutlet[]">
                  <option></option>
                  <?php
                  foreach ($spv as $B) {
                    $explode = explode(',', $cIdOutlet);
                    for ($z = 0; $z <= count($explode); $z++) {
                  ?>
                      <option value="<?= $B['id_outlet'] ?>" <?php if ($B['id_outlet'] == $explode[$z]) echo "selected"; ?>><?= $B['nama'] ?></option>
                  <?php  }
                  }  ?>
                  <?php foreach ($outlet as $key => $vaOutlet) { ?>
                    <option value="<?= $vaOutlet['id_outlet'] ?>">
                      <?= $vaOutlet['kode'] ?> : <?= $vaOutlet['nama'] ?>
                    </option>
                  <?php }  ?>
                </select>
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
      </div>

      <div class="col-8">
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
                  <td>Nik</td>
                  <td>Nama</td>
                  <td>Telepon</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;
                foreach ($row as $key => $vaSupervisor) { ?>
                  <tr>
                    <td><?= ++$no; ?></td>
                    <td><?= $vaSupervisor['nik'] ?></td>
                    <td><?= $vaSupervisor['nama'] ?></td>
                    <td><?= $vaSupervisor['telepon'] ?></td>
                    <td class="text-center">
                      
                        <a class="btn btn-outline-success btn-sm btn-icon btn-icon-md" title="Edit Data" href="<?= site_url('master/supervisor/edit/' . $vaSupervisor['id_spv'] . '') ?>">
                          <i class="flaticon-edit"></i>
                        </a>
                        <a class="btn btn-outline-danger btn-sm btn-icon btn-icon-md" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?= site_url('action/spv_delete/' . $vaSupervisor['id_spv'] . '') ?>'}">
                          <i class="flaticon-delete"></i>
                        </a>
                      
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>