<?php
function String2Date($dTgl)
{
  //return 22-11-2012  
  list($cYear, $cMount, $cDate)  = explode("-", $dTgl);
  if (strlen($cYear) == 4) {
    $dTgl  = $cDate . "-" . $cMount . "-" . $cYear;
  }
  return $dTgl;
}
?>
<?php foreach ($view as $key => $vaPegawai) { ?>
  <?php
  if($vaPegawai['jk'] == null || $vaPegawai['jk'] == ""){
    $cJenis = "";
  }
  elseif ($vaPegawai['jk'] == 1) {
    $cJenis = "Laki-Laki";
  } elseif($vaPegawai['jk'] == 2) {
    $cJenis = "Perempuan";
  }else{
    $cJenis = "";
  }
  ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">

        <div class="form-group">
          <p>Area : </p>
          <label>
            <p><?= $vaPegawai['Area'] ?></p>
          </label>
        </div>



        <div class="form-group">
          <p>NIK: </p>
          <label>
            <p><?= $vaPegawai['nik'] ?></p>
          </label>
        </div>

        <div class="form-group">
          <p>No KTP </p>
          <label>
            <p><?= $vaPegawai['no_ktp'] ?></p>
          </label>
        </div>

        <div class="form-group">
          <p>Email </p>
          <label>
            <p><?= $vaPegawai['email'] ?></p>
          </label>
        </div>


      </div>

      <div class="col-sm-4">

        <div class="form-group">
          <p>Status : </p>
          <label>
            <p><?= $vaPegawai['Status'] ?></p>
          </label>
        </div>

        <div class="form-group">
          <p>PIN: </p>
          <label>
            <p><?= $vaPegawai['pin'] ?></p>
          </label>
        </div>

        <div class="form-group">
          <p>Alamat: </p>
          <label>
            <p><?= $vaPegawai['alamat'] ?></p>
          </label>
        </div>

        <div class="form-group">
          <p>Jenis Kelamin: </p>
          <label>         
              <p><?= $cJenis ?></p>
          </label>
        </div>

      </div>

      <div class="col-sm-4">

        <div class="form-group">
          <p>Nama : </p>
          <label>
            <p><?= $vaPegawai['nama'] ?></p>
          </label>
        </div>

        <div class="form-group">
          <p>Tanggal Masuk Kerja </p>
          <label>
            <p><?= String2Date($vaPegawai['tanggal_masuk_kerja']) ?> </p>
          </label>
        </div>

        <div class="form-group">
          <p>Tampat , Tanggal Lahir: </p>
          <label>
            <?php
            if ($vaPegawai['tempat_lahir'] == null || $vaPegawai['tanggal_lahir'] == null || $vaPegawai['tempat_lahir'] == "" || $vaPegawai['tanggal_lahir'] == "") {
            } else {
            ?>
              <p><?= $vaPegawai['tempat_lahir'] ?> , <?= String2Date($vaPegawai['tanggal_lahir']) ?></p>
            <?php
            }
            ?>
          </label>
        </div>

        <div class="form-group">
          <p>Foto : </p>
          <?php if (empty($vaPegawai['foto'])) { ?>
            <img src="<?= base_url() ?>upload/default.gif" height="100px">
          <?php } else { ?>
            <img src="<?= base_url() .'/'. $vaPegawai['foto'] ?>" height="100px">
          <?php } ?>
        </div>

      </div>

    </div>
  </div>

  <div class="modal-footer">
    <div class="row">
      <div class="pull-left" style="margin-left:20px">

        <a class="btn btn-flat btn-success" href="<?= site_url('transaksi/pegawai/edit/' . $vaPegawai['id_pegawai'] . ''); ?>">
          <i class="la la-pencil"></i> Edit
        </a>
        
        

        <button class="btn btn-flat btn-danger" data-dismiss="modal" aria-hidden="true">
          <i class="fa fa-times"></i> Close
        </button>
      </div>
    </div>
  </div>
<?php } ?>