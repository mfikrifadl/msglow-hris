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
  <div class="container">
    <div class="col-sm-12">
      <ul class="breadcrumb">
        <li><a href="<?= base_url() ?>">Home</a></li>
        <li class=""><?= $menu ?></li>
        <li class="active"><?= $file ?></li>
      </ul>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="col-sm-6">
          <div class="box box-success">
            <div class="box-header">
              <div class="box-body">
                <h3>Input Data Unit Kerja</h3>
                <form method="post" enctype="multipart/form-data" action="<?= site_url('action/unit_kerja/' . $cAction . '') ?>">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nama Unit Kerja</label>
                        <Input type="text" name="cNamaUnitKerja" class="form-control" placeholder="Nama Unit Kerja" value="<?= $cNamaUnitKerja ?>">
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
        </div>
        <div class="col-sm-6">
          <div class="box box-info">
            <div class="box-header">
              <div class="box-body">
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
                        <td align="center">
                          <a class="btn btn-flat btn-success" title="Edit Data" href="<?= site_url('master/unit_kerja/edit/' . $vaUnit['id_unit_kerja'] . '') ?>">
                            <i class="fa fa-edit"></i>
                          </a>
                          <a class="btn btn-danger btn-flat" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?= site_url('action/unit_kerja/Delete/' . $vaUnit['id_unit_kerja'] . '') ?>'}">
                            <i class="fa fa-trash-o"></i>
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
      </div>
    </div>
  </div>