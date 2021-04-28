<?php
//SetKode
if (date("m") == '01') {
  $cRomawai = 'I';
} elseif (date("m") == '02') {
  $cRomawai = 'II';
} elseif (date("m") == '03') {
  $cRomawai = 'III';
} elseif (date("m") == '04') {
  $cRomawai = 'IV';
} elseif (date("m") == '05') {
  $cRomawai = 'V';
} elseif (date("m") == '06') {
  $cRomawai = 'VI';
} elseif (date("m") == '07') {
  $cRomawai = 'VII';
} elseif (date("m") == '08') {
  $cRomawai = 'VIII';
} elseif (date("m") == '09') {
  $cRomawai = 'IX';
} elseif (date("m") == '10') {
  $cRomawai = 'X';
} elseif (date("m") == '11') {
  $cRomawai = 'XI';
} elseif (date("m") == '12') {
  $cRomawai = 'XII';
}

foreach ($Nolast->result_array() as $key => $vaDataLast) {
  $cLastNoSurat = $vaDataLast['nomor_surat'];
}

if ($Nolast->num_rows() > 0) {
  $NoSuratTerakhir = $cLastNoSurat;
} else {
  $NoSuratTerakhir = "No.0001/SP-II/HRD/" . $cRomawai . "/" . date("Y") . "";
}

$cNomorSuratFix = "No." . "####" . "/SP-II/HRD/" . $cRomawai . "/" . date("Y") . " ";
?>
<?php
if ($action == "edit") {
  foreach ($field as $column) {
    $cIdSuratPeringatan =   $column['id'];
    $cIdKategoriSurat   =   $column['id_kategori_surat'];
    $dTgl               =   $column['tanggal'];
    $nNomorSurat        =   $column['nomor_surat'];
    $cIdPegawai         =   $column['id_pegawai'];
    $cOutlet            =   $column['outlet'];
    $cUraian            =   $column['uraian'];
    $cKeterangan        =   $column['keterangan'];
    $cCreate            =   $column['create'];
    $cCC                =   $column['cc'];
    $cIconButton        =   "refresh";
    $cValueButton       =   "Update Data";
  }
  $cAction = "Update/" . $cIdSuratPeringatan . "";
} else {
  $cIdSuratPeringatan =   "";
  $cIdKategoriSurat   =   "";
  $dTgl               =   "";
  $nNomorSurat        =   $cNomorSuratFix;
  $cIdPegawai         =   "";
  $cOutlet            =   "";
  $cUraian            =   "";
  $cKeterangan        =   "";
  $cCreate            =   "Venna Rosia Marheta";
  $cCC                =   "";
  $cIconButton    =   "save";
  $cValueButton   =   "Save Data";
  $cAction        =   "Insert";
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
    <div class="col-12">

      <!--begin::Portlet-->
      <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
          <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
              Data Table Surat Peringatan Pegawai (SP2)
            </h3>
          </div>
        </div>

        <div class="kt-portlet__body">
          <table class="table table-striped table-bordered" id="DataTable">
            <thead>
              <tr>
                <td>No</td>
                <td>Tanggal</td>
                <td>Nomor Surat</td>
                <td>Pegawai</td>
                <td>Tipe Surat</td>
                <td>Action</td>
              </tr>
            </thead>
            <tbody>
              <?php $no = 0;
              foreach ($row as $key => $vaPeringatan) {
              ?>
                <tr>
                  <td><?= ++$no; ?></td>
                  <td><?= ($vaPeringatan['tanggal']) ?></td>
                  <td><?= ($vaPeringatan['nomor_surat']) ?></td>
                  <td><?= ($vaPeringatan['nama']) ?></td>
                  <td><?= ($vaPeringatan['Keterangan']) ?></td>
                  <td align="center">
                    <a class="btn-link" title="Print SP" target="_blank" href="<?= site_url('Surat_act/cetak_sp2/' . $vaPeringatan['id'] . '') ?>">
                      <i class="fa fa-print"></i>
                    </a>
                    |
                    <a class="btn-link" title="Edit SP" href="<?= site_url('transaksi/sp2/edit/' . $vaPeringatan['id'] . '') ?>">
                      <i class="fa fa-pen"></i>
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

      </div>

      <!--end::Portlet-->

    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <form method="post" enctype="multipart/form-data" action="<?= site_url('surat_act/sp2/' . $cAction . '') ?>">
        <!--begin::Portlet-->
        <div class="kt-portlet kt-portlet--height-fluid">
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                Form Surat Peringatan 2
              </h3>
            </div>
          </div>

          <div class="kt-portlet__body">
            <div style="text-align: center;">
              <h3>HUMAN RESOURCES DEVELOPMENT</h3>
              <hr />
            </div>
            <div class="form-group row">
              <label for="example-text-input" class="col-1 col-form-label">Tertanggal: </label>
              <div class="col-3">
                <input type="date" name="dTgl" class="form-control" placeholder="Tanggal" value="<?= $dTgl ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="example-text-input" class="col-1 col-form-label">Perihal: </label>
              <label for="example-text-input" class="col-3 col-form-label">Surat Peringatan II</label>
            </div>
            <div style="text-align: center;">
              <h4 style="text-decoration: underline;">SURAT TEGURAN</h4>
              Nomor Terakhir : <strong><?= $NoSuratTerakhir ?></strong>
              <div style="justify-content: center;display: flex;">
                <input type="text" name="nNomorSurat" class="form-control text-center" style="width:30%" placeholder="Nomor Surat" value="<?= $nNomorSurat ?>">
              </div>

            </div>
            <div class="col-12" align="left">
              <p>
              <h4>&emsp;&emsp;Dalam rangka menegakkan kedisiplinan dan tanggung jawab serta menjalankan peraturan perusahaan maka atas nama perusahaan, dengan ini menerangkan bahwa:</h4>
              </p>
            </div>
            <div class="form-group row">
              <label for="example-text-input" class="col-1 col-form-label">Nama :</label>
              <div class="col-3">
                <select class="comboBox form-control" onchange="cek_pegawai(this.value)" name="cIdPegawai">
                  <option></option>
                  <?php
                  $jsArray = "var jason = new Array();\n";
                  foreach ($pegawai as $dbRow) {
                  ?>
                    <option value="<?= $dbRow['id_pegawai'] ?>" <?php if ($dbRow['id_pegawai'] == $cIdPegawai) echo 'selected'; ?>>
                      <?= $dbRow['nik'] ?> : <?= $dbRow['nama'] ?>
                    </option>';
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="example-text-input" class="col-1 col-form-label">NIK :</label>
              <div class="col-3">
                <?php
                if ($action == "edit") { ?>
                  <input type="text" name="cNik" id="cNik" class="form-control" readonly="true" value="<?= $cNikPegawai ?>">

                <?php } else { ?>
                  <input type="text" name="cNik" id="cNik" class="form-control" readonly="true">
                <?php   } ?>

              </div>
            </div>
            <div class="form-group row">
              <label for="example-text-input" class="col-1 col-form-label">Jabatan :</label>
              <div class="col-3">
                <?php if ($action == "edit") { ?>
                  <input type="text" name="cJabatan" id="cJabatan" class="form-control" readonly="true" value="<?= $cNamaJabatan ?>">

                <?php } else { ?>
                  <input type="text" name="cJabatan" id="cJabatan" class="form-control" readonly="true">
                <?php   } ?>

              </div>
            </div>
            <div class="col-12" align="left">
              <p>
              <h4>Maka dengan ini, Diberikan Surat Peringatan II terkait dengan tindak pelanggaran yang saudara lakukan, yakni </h4>
              </p>
            </div>
            <div class="form-group">
              <div class="col-12">
                <?php if ($action == "edit") { ?>
                  <textarea name="cUraian" class="summernote form-control" id="kt_summernote_1"><?= $cUraian ?></textarea>

                <?php } else { ?>
                  <textarea name="cUraian" class="summernote form-control" id="kt_summernote_1"></textarea>
                <?php   } ?>

              </div>

            </div>
            <div class="col-12 text-left">

              <?php if ($action == "edit") { ?>
                <p>
                <h6>Surat Peringatan ini belaku mulai tanggal <input type="date" name="cMulai_berlaku" value="<?= $tgl_mulai_berlaku ?>"> dan berakhir pada tanggal <input type="date" name="cBerlaku_sampai" value="<?= $tgl_berlaku_sampai ?>"> </h6>
                </p>

              <?php } else { ?>
                <p>
                <h6>Surat Peringatan ini belaku mulai tanggal <input type="date" name="cMulai_berlaku"> dan berakhir pada tanggal <input type="date" name="cBerlaku_sampai"> </h6>
                </p>
              <?php   } ?>

            </div>
            <div class="col-12" align="left">
              <p>
                Selama masih dalam status Peringatan I, yang bersangkutan tidak diperbolehkan melanggar tata tertib kerja sebagaimana sudah diatur dalam Peraturan Perusahaan, atau bersedia menerima resiko ke tingkat lebih lanjut.
                Harapan kami agar yang bersangkutan untuk lebih mentaati peraturan dan lebih disiplin serta tanggung jawab sebagai karyawan yang baik. Semoga dengan diterbitkan surat ini ybs bisa menerima hal ini.
                Demikian Surat Peringatan II ini dibuat agar dapat ditaati sebagaimana mestinya. Diharapkan yang bersangkutan berkenan merubah sikap dan mampu menunjukkan sikap profesinoalisme dalam bekerja.

              </p>
            </div>
            <div class="col-12" align="left">
              <p>Atas perhatian dan kerjasamanya kami selaku manajemen mengucapkan terima kasih. Dan bisa sebagai koreksi dan intropeksi diri selanjutnya.
              </p>
            </div>
            <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Manager HRD :</label>
              <div class="col-3">
                <?php if ($action == "edit") { ?>
                  <input type="text" name="cCreate" id="cCreate" class="form-control" value="<?= $cCreate ?>">
                <?php } else { ?>
                  <input type="text" name="cCreate" id="cCreate" class="form-control">
                <?php   } ?>

              </div>
            </div>
            <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">General Manager :</label>
              <div class="col-3">
                <?php if ($action == "edit") { ?>
                  <input type="text" name="cGeneral_manager" id="cGeneral_manager" class="form-control" value="<?= $cCC ?>">
                <?php } else { ?>
                  <input type="text" name="cGeneral_manager" id="cGeneral_manager" class="form-control">
                <?php   } ?>
              </div>
            </div>
            <div class="form-group">
              <?php
              if ($this->session->userdata('level') == 100) {
              ?>
                <button type="button" class="btn btn-flat btn-danger" onclick="window.alert('Maaf Anda Tidak Mempunyai Kewenangan')">
                  <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                </button>
              <?php
              } else {
              ?>
                <button type="submit" class="btn btn-flat btn-danger">
                  <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                </button>
              <?php
              }
              ?>

            </div>
          </div>
        </div>

        <!--end::Portlet-->
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function cek_pegawai(data) {
    // alert(data);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        hasil = (this.responseText).split('~');

        // alert (hasil);
        document.getElementById('cNik').value = hasil[0];
        document.getElementById('cJabatan').value = hasil[1];
        if (hasil[1] == '') {
          alert('Inputkan Jabatan Pegawai Terlebih Dahulu di Form Input Jabatan');
        }
      }
    };
    xmlhttp.open("GET", "<?= site_url('Transaksi_act/get_pegawai/') ?>/" + data, true);
    xmlhttp.send();
  }
</script>