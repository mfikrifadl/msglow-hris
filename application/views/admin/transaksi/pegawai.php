<?php
if ($action == "edit") {
  foreach ($masakerja as $key => $vaMasa) {
    $nMasaKerja = $vaMasa['MasaKerja'];
  }

  if ($nMasaKerja >= 0 and $nMasaKerja <= 3) {
    $cStatusKerja = 2;
  } elseif ($nMasaKerja >= 4 and $nMasaKerja <= 6) {
    $cStatusKerja = 1;
  } elseif ($nMasaKerja >= 7 and $nMasaKerja <= 24) {
    $cStatusKerja = 3;
  } elseif ($nMasaKerja > 24) {
    $cStatusKerja = 4;
  }
  foreach ($field as $column) {
    $cIdPegawai     =   $column['id_pegawai'];
    $cPin          =   $column['pin'];
    $cIdKerja       =   $column['id_kerja'];
    $cIdArea        =   $column['id_area'];
    $cIdStatus      =   $column['id_status'];
    $cIdTimLapangan =   $column['id_tim_lapangan'];
    $cNik           =   $column['nik'];
    $cNama          =   $column['nama'];
    $cAgama         =   $column['agama'];
    $cAlamat        =   $column['alamat'];
    $cAlamatAsal    =   $column['alamat_asal'];
    $cJk            =   $column['jk'];
    $cTempatLahir   =   $column['tempat_lahir'];
    // $dTglLahir      =   String2Date($column['tanggal_lahir']);
    $dTglLahir      =   $column['tanggal_lahir'];
    $cUmur          =   $column['umur'];
    $cGolDar        =   $column['gol_darah'];
    $cEmail         =   $column['email'];
    $nKtp           =   $column['no_ktp'];
    $cEmail         =   $column['email'];
    $nHandphone     =   $column['handphone'];
    $cOrtu          =   $column['nama_orang_tua'];
    $cHubungan      =   $column['hub_keluarga'];
    $nHpKeluarga    =   $column['no_keluarga'];
    $cReferensi     =   $column['referensi'];
    $nTlpReferensi  =   $column['tlp_referensi'];
    // $dTglMasukKerja =   String2Date($column['tanggal_masuk_kerja']);
    $dTglMasukKerja =   $column['tanggal_masuk_kerja'];
    $dTglKontrakBerakhir =   $column['tgl_kontrak_berakhir'];
    $cFoto          =   $column['foto'];
    $nBobotNilai    =   $column['bobot_nilai'];
    $cIdPendidikan  =   $column['pendidikan'];
    $cJurusan       =   $column['jurusan'];
    $cOutlet        =   $column['outlet'];
    $cStatusKawin   =   $column['status_kawin'];
    $cNamaPasangan  =   $column['istri_suami'];
    $dTglLahirIstri =   $column['tgl_lahir_istri'];
    $nUmurPasangan  =   $column['umur_istri'];
    $nJumlahAnak    =   $column['jumlah_anak'];
    $nAnak1         =   $column['anak_1'];
    $dTglLahirAnak1 =   $column['tgl_lahir_anak_1'];
    $nUmurAnak1     =   $column['umur_anak_1'];
    $nAnak2         =   $column['anak_2'];
    $dTglLahirAnak2 =   $column['tgl_lahir_anak_2'];
    $nUmurAnak2     =   $column['umur_anak_2'];
    $nAnak3         =   $column['anak_3'];
    $dTglLahirAnak3 =   $column['tgl_lahir_anak_3'];
    $nUmurAnak3     =   $column['umur_anak_3'];
    $cJenisBayar    =   $column['jenis_pembayaran'];
    $cCabangBank    =   $column['cabang_bank'];
    $cNoRekening    =   $column['no_rekening'];
    $cNPWP          =   $column['no_npwp'];
    $cBPJSKTK       =   $column['no_bpjs_ktk'];
    $cBPJSKES       =   $column['no_bpjs_kes'];
    $cAtasNama      =   $column['atas_nama'];
    $cIconButton    =   "refresh";
    $cValueButton   =   "Update Data";
  }
  $cAction = "Update/" . $cIdPegawai . "";
} else {
  $last = '';
  foreach ($lastno->result_array() as $key => $vaDataLast) {
    $last = $vaDataLast['nik'];
  }
  $last2 = (int)$last + 1;
  $tahun = date('y');
  $bulan = date('m');
  $no_urut = '99' . $tahun . $bulan . $last2;

  $cIdPegawai     =   "";
  $cIdKerja       =   "";
  $cIdArea        =   "";
  $cIdStatus      =   "";
  $cIdTimLapangan =   "";
  $cNik           =   $no_urut;
  $cNama          =   "";
  $cAgama         =   "";
  $cPin           =   "";
  $cAlamat        =   "";
  $cAlamatAsal    =   "";
  $cJk            =   "";
  $cTempatLahir   =   "";
  $dTglLahir      =   $tanggal;
  $cGolDar        =   "";
  $cUmur          =   "";
  $nKtp           =   "";
  $cEmail         =   "";
  $nHandphone     =   "";
  $cOrtu          =   "";
  $cHubungan      =   "";
  $nHpKeluarga    =   "";
  $cReferensi     =   "";
  $nTlpReferensi  =   "";
  $dTglMasukKerja =   $tanggal;
  $dTglKontrakBerakhir =   $tanggal;
  $cFoto          =   "";
  $nBobotNilai    =   "";
  $cIdPendidikan  =   "";
  $cJurusan       =   "";
  $cOutlet        =   "";
  $cStatusKawin   =   "";
  $cNamaPasangan  =   "";
  $dTglLahirIstri =   "$tanggal";
  $nUmurPasangan  =   "";
  $nJumlahAnak    =   "";
  $nAnak1         =   "";
  $dTglLahirAnak1 =   "$tanggal";
  $nUmurAnak1     =   "";
  $nAnak2         =   "";
  $dTglLahirAnak2 =   "$tanggal";
  $nUmurAnak2     =   "";
  $nAnak3         =   "";
  $dTglLahirAnak3 =   "$tanggal";
  $nUmurAnak3     =   "";
  $cJenisBayar    =   "";
  $cCabangBank    =   "";
  $cNoRekening    =   "";
  $cNPWP          =   "";
  $cBPJSKTK       =   "";
  $cBPJSKES       =   "";
  $cAtasNama      =   "";
  $cIconButton    =   "save";
  $cValueButton   =   "Save Data";
  $cAction        =   "Insert";
}
?>

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

  <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <!--Begin::Dashboard 6-->

    <!--Begin::Row-->
    <section class="connectedSortable">
      <div class="row">
        <div class="col-12">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item"><?= $menu ?></li>
            <li class="breadcrumb-item active"><?= $file ?></li>
          </ul>
        </div>
      </div>

      <div class="row">
        <div class="col-12">

          <!--begin:: Widgets/Order Statistics-->
          <div class="kt-portlet">

            <!--begin::Accordion-->

            <div class="accordion accordion-solid accordion-toggle-plus" id="accordionTablePegawai">
              <div class="card">
                <div class="card-header" id="headingTablePegawai">
                  <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseTablePegawai" aria-expanded="true" aria-controls="collapseTablePegawai">
                    <strong> Data Table Pegawai </strong>
                  </div>
                </div>
                <div id="collapseTablePegawai" class="collapse show" aria-labelledby="headingTablePegawai" data-parent="#accordionTablePegawai">
                  <!-- <div class="card-body"> -->

                  <div class="kt-portlet__body">
                    <div class="col-md-12">
                      <div class="nav-tabs-custom">

                        <a href="<?= site_url('transaksi/get_all_pegawai/') ?>" target="blank" class="btn btn-brand pull-right">
                          <i class="fa fa-file-export"></i>
                          Export to Excel
                        </a>&nbsp;

                        <ul class="nav nav-tabs" id="myTabs">
                          <li class="active text-dark">
                            <!-- <a href="#" class="btn btn-label-facebook"><i class="socicon-facebook"></i> Facebook</a>&nbsp; -->
                            <button type="button" onclick="return GetDataOperator();" class="btn btn-label-facebook">
                              Data Pegawai Staff Ms Glow
                            </button>
                            <!-- <a href="#tab_1" onclick="" data-toggle="tab">Data Pegawai Operator</a> -->
                          </li>
                          <li class="active text-dark">
                            <!-- <a href="#" class="btn btn-label-facebook"><i class="socicon-facebook"></i> Facebook</a>&nbsp; -->
                            <button type="button" onclick="return GetDataOperatorEksternal();" class="btn btn-label-facebook">
                              Data Pegawai Eksternal Ms Glow
                            </button>
                            <!-- <a href="#tab_1" onclick="" data-toggle="tab">Data Pegawai Operator</a> -->
                          </li>
                          <li class="active text-dark">
                            <!-- <a href="#" class="btn btn-label-facebook"><i class="socicon-facebook"></i> Facebook</a>&nbsp; -->
                            <button type="button" onclick="return GetDataOperatorPHL();" class="btn btn-label-facebook">
                              Data Pegawai PHL Ms Glow
                            </button>
                            <!-- <a href="#tab_1" onclick="" data-toggle="tab">Data Pegawai Operator</a> -->
                          </li>
                        </ul>
                        <div class="tab-content ">
                          <div class="tab-pane active" id="tab_1">
                            <div id="data_operator"></div>
                          </div>
                          <div class="tab-pane" id="tab_2">
                            <div id="data_office"></div>
                          </div>
                          <div class="tab-pane" id="tab_3">
                            <div id="data_lapangan"></div>
                          </div>
                          <div class="tab-pane" id="tab_4">
                            <div id="data_masakerjakurang3bulan"></div>
                          </div>
                          <div class="tab-pane" id="tab_5">
                            <div id="data_pegawaimengundurkandiri"></div>
                          </div>
                          <div class="tab-pane" id="tab_6">
                            <div id="data_pegawaibom"></div>
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


            <!--end:: Widgets/Order Statistics-->
          </div>
        </div>
      </div>
      <!--End::Row-->
      <?php
      if ($action == "edit") {
      ?>
        <form method="post" enctype="multipart/form-data" action="<?= site_url('transaksi_act/pegawai/' . $cAction . '') ?>">
          <div class="row">
            <div class="col-md-12">

              <!--begin::Portlet Data Kerja-->
              <div class="kt-portlet">

                <!--begin::Accordion-->

                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
                  <div class="card">
                    <div class="card-header" id="headingOne6">
                      <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseDataKerja" aria-expanded="true" aria-controls="collapseDataKerja">
                        <strong> Input Data Kerja </strong>
                      </div>
                    </div>
                    <div id="collapseDataKerja" class="collapse show" aria-labelledby="headingOne6" data-parent="#accordionExample6">
                      <div class="card-body">
                        <!--begin::Form-->
                        <div class="row">

                          <div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
                            <div class="kt-portlet kt-portlet--height-fluid kt-iconbox">
                              <div class="form-group">
                                <label>Area Kerja</label>
                                <select class="form-control kt-selectpicker" data-live-search="true" name="cIdArea" required>
                                  <option></option>
                                  <?php foreach ($area as $key => $vaArea) { ?>
                                    <option value="<?= $vaArea['id_area'] ?>" <?php if ($vaArea['id_area'] == $cIdArea) echo "selected"; ?>>
                                      <?= $vaArea['nama_area'] ?>
                                    </option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Status Kerja</label>
                                <select class="form-control kt-selectpicker" data-live-search="true" name="cIdStatus" onchange="hideshow(this.value)" required>
                                  <option></option>
                                  <?php foreach ($status as $key => $vaStatus) {
                                    if ($vaStatus['id_status'] == 3 || $vaStatus['id_status'] == 4) { ?>

                                      <option value="<?= $vaStatus['id_status'] ?>" <?php if ($vaStatus['id_status'] == $cIdStatus) echo "selected"; ?>>
                                        <?= $vaStatus['status'] ?>
                                      </option>

                                  <?php  } else {
                                    }
                                  } ?>
                                </select>
                              </div>
                              <div class="form-group" id="golker">
                                <label>Golongan Kerja</label>
                                <select class="form-control kt-selectpicker" data-live-search="true" name="cIdKerja" required>
                                  <option></option>
                                  <?php foreach ($kerja as $key => $vaKerja) { ?>
                                    <option value="<?= $vaKerja['id_kerja'] ?>" <?php if ($vaKerja['id_kerja'] == $cIdKerja) echo "selected"; ?>>
                                      <?= $vaKerja['kerja'] ?>
                                    </option>
                                  <?php } ?>
                                </select>
                              </div>
                              <?php
                              if ($cIdStatus == 3) {
                              ?>
                                <script>
                                  document.getElementById('golker').style.display = 'none';
                                </script>
                              <?php
                              }
                              ?>
                              <div class="form-group">
                                <label>Office</label>
                                <div class="input-group">
                                  <select class="form-control kt-selectpicker" data-live-search="true" name="cOutlet" required>
                                    <option></option>
                                    <?php foreach ($outlet as $key => $vaOutlet) { ?>
                                      <option value="<?= $vaOutlet['id_outlet'] ?>" <?php if ($vaOutlet['id_outlet'] == $cOutlet) echo "selected"; ?>>
                                        <?= $vaOutlet['kode'] ?> : <?= $vaOutlet['nama'] ?>
                                      </option>
                                    <?php } ?>
                                  </select>
                                  <div class="input-group-append">
                                    <span class="input-group-text " id="basic-addon2">
                                      <i class="kt-font-success flaticon2-architecture-and-city"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Tanggal Masuk Kerja</label>
                                <div class="input-group">
                                  <input type="date" name="dTglMasukKerja" class="form-control" placeholder="Tanggal Masuk Kerja" data-date-format="dd/mm/yyyy" value="<?= $dTglMasukKerja ?>" id="tglDT" required>
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar-o"></i>
                                  </div>
                                </div>
                              </div>
                              <!-- <div class="form-group">
                                <label>Tanggal Kontrak Berakhir</label>
                                <div class="input-group">
                                  <input type="text" readonly="true" class="form-control" placeholder="Tanggal Kontrak Berakhir" data-date-format="dd/mm/yyyy" value="<?= $dTglKontrakBerakhir ?>">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar-o"></i>
                                  </div>
                                </div>
                              </div> -->
                            </div>
                          </div>

                          <div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
                            <div class="kt-portlet kt-portlet--height-fluid kt-iconbox">
                              <div class="form-group">
                                <label>Pembayaran Gaji <?= $cJenisBayar ?></label>
                                <div class="input-group">
                                  <select name="cJenisBayar" class="form-control kt-selectpicker" data-live-search="true" required>
                                    <option></option>
                                    <?php foreach ($bayar as $key => $vaBayar) { ?>
                                      <option value="<?= $vaBayar['id_pembayaran'] ?>" <?php if ($vaBayar['id_pembayaran'] == $cJenisBayar) echo "selected"; ?>>
                                        <?= $vaBayar['jenis_pembayaran'] ?>
                                      </option>
                                    <?php } ?>
                                  </select>
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-success flaticon-price-tag"></i>
                                    </span>
                                  </div>

                                </div>
                              </div>
                              <div class="form-group">
                                <label>Cabang Bank</label>
                                <div class="input-group">
                                  <input type="text" name="cCabangBank" class="form-control" value="<?= $cCabangBank ?>" placeholder="Cabang Bank" required>
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-success flaticon2-map"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Nomor Rekening</label>
                                <div class="input-group">
                                  <input type="text" name="nRekening" class="form-control" value="<?= $cNoRekening ?>" placeholder="Nomor Rekening" required>
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-success fa fa-credit-card"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Atas Nama</label>
                                <div class="input-group">
                                  <input type="text" name="cAtasNama" class="form-control" value="<?= $cAtasNama ?>" placeholder="Atas Nama" required>
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-success fa fa-user"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
                            <div class="kt-portlet kt-portlet--height-fluid kt-iconbox">
                              <div class="form-group">
                                <label>No. NPWP</label>
                                <div class="input-group">
                                  <input type="text" name="cNPWP" class="form-control" value="<?= $cNPWP ?>" placeholder="No. NPWP">
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-success fa fa-qrcode"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>No. BPJS KTK</label>
                                <div class="input-group">
                                  <input type="text" name="cBPJSKTK" class="form-control" value="<?= $cBPJSKTK ?>" placeholder="No. BPJS KTK">
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-success fa fa-qrcode"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>No. BPJS Kes</label>
                                <div class="input-group">
                                  <input type="text" name="cBPJSKES" class="form-control" value="<?= $cBPJSKES ?>" placeholder="No. BPJS Kes">
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-success fa fa-qrcode"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                        <!--end::Portlet Data Kerja-->
                      </div> <!-- end row -->
                    </div>
                  </div>
                </div>

                <!--end::Accordion-->
              </div>
            </div>
            <div class="col-md-12">

              <!--begin::Portlet Data Pribadi-->
              <div class="kt-portlet">

                <!--begin::Accordion-->

                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
                  <div class="card">
                    <div class="card-header" id="headingOne6">
                      <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseDataPribadi" aria-expanded="true" aria-controls="collapseDataPribadi">
                        <strong> Input Data Pribadi </strong>
                      </div>
                    </div>
                    <div id="collapseDataPribadi" class="collapse show" aria-labelledby="headingOne6" data-parent="#accordionExample6">
                      <div class="card-body">
                        <div class="col-sm-12 col-md-12">
                          <div id="tb_pelanggaran"> </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                              <label>Nik</label>
                              <div class="input-group">
                                <input type="text" readonly="true" name="cNik" id="cNik" class="form-control" placeholder="Nik Pegawai" value="<?= $cNik ?>">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">
                                    <i class="kt-font-success fa fa-credit-card"></i>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div> <!-- /.col-form -->
                          <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                              <label>PIN</label>
                              <div class="input-group">
                                <input type="text" id="cPinFinger" name="cPin" class="form-control" placeholder="PIN Finger" value="<?= $cPin  ?>" required>
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">
                                    <i class="kt-font-success fa fa-qrcode"></i>
                                  </span>
                                </div>
                              </div>
                            </div>

                          </div><!-- /.col-form -->
                          <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                              <label>Nama</label>
                              <div class="input-group">
                                <input type="text" id="cNamaPegawai" readonly="true" name="cNama" class="form-control" placeholder="Nama Pegawai" value="<?= $cNama  ?>" required>
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">
                                    <i class="kt-font-success fa fa-user"></i>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div> <!-- /.col-form -->
                          <div class="col-sm-1 col-md-1">
                            <div class="form-group">
                              <label>Cek PIN</label>
                              <button type="button" onclick="return CekNamaPegawai();" class="btn btn-outline-success btn-md btn-icon btn-icon-md">
                                <i class="flaticon2-refresh"></i>
                              </button>
                            </div>
                          </div> <!-- /.col-form -->
                          <div class="row">
                            <div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
                              <div class="kt-portlet kt-portlet--height-fluid kt-iconbox">

                                <div class="form-group">
                                  <label>Tempat Lahir</label>
                                  <input type="text" name="cTempatLahir" class="form-control" placeholder="Tempat Lahir" value="<?= $cTempatLahir ?>" required>
                                </div>

                                <div class="form-group">
                                  <label>Tanggal Lahir</label>
                                  <div class="input-group">
                                    <input type="date" name="dTglLahir" onchange="ageCalculator();" class="form-control" value="<?= $dTglLahir ?>" id="dob" required>
                                    <button type="button" onclick="javascript:dob.value=''">X</button>
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar-o"></i>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label>Umur</label>
                                  <div class="input-group">
                                    <input type="text" name="cUmur" id="ages" class="form-control" value="<?= $cUmur ?>" style="background-color:#fff;" id="ages" disabled required>
                                  </div>
                                </div>

                              </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
                              <div class="kt-portlet kt-portlet--height-fluid kt-iconbox">

                                <div class="form-group">
                                  <label>Agama</label>
                                  <select name="cAgama" class="form-control kt-selectpicker" data-live-search="true" required>
                                    <option></option>
                                    <option value="1" <?php if ($cAgama == 1) echo "selected"; ?>>Islam</option>
                                    <option value="2" <?php if ($cAgama == 2) echo "selected"; ?>>Protestan</option>
                                    <option value="3" <?php if ($cAgama == 3) echo "selected"; ?>>Katolik</option>
                                    <option value="4" <?php if ($cAgama == 4) echo "selected"; ?>>Hindu</option>
                                    <option value="5" <?php if ($cAgama == 5) echo "selected"; ?>>Buddha</option>
                                    <option value="6" <?php if ($cAgama == 6) echo "selected"; ?>>Konghucu</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label>Jenis Kelamin</label>
                                  <select name="cJenisKelamin" class="form-control kt-selectpicker" data-live-search="true" required>
                                    <option></option>
                                    <option value="1" <?php if ($cJk == 1) echo "selected"; ?>>Laki-Laki</option>
                                    <option value="2" <?php if ($cJk == 2) echo "selected"; ?>>Perempuan</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label>Gol. Darah</label>
                                  <div class="input-group">

                                    <select name="cGolDar" class="form-control kt-selectpicker" data-live-search="true">
                                      <option></option>
                                      <option value="A" <?php if ($cGolDar == "A") echo "selected"; ?>>A</option>
                                      <option value="A-" <?php if ($cGolDar == "A-") echo "selected"; ?>>A-</option>
                                      <option value="B" <?php if ($cGolDar == "B") echo "selected"; ?>>B</option>
                                      <option value="B-" <?php if ($cGolDar == "B-") echo "selected"; ?>>B-</option>
                                      <option value="AB" <?php if ($cGolDar == "AB") echo "selected"; ?>>AB</option>
                                      <option value="AB-" <?php if ($cGolDar == "AB-") echo "selected"; ?>>AB-</option>
                                      <option value="O" <?php if ($cGolDar == "O") echo "selected"; ?>>O</option>
                                    </select>

                                    <!-- <input type="text" name="cGolDar" class="form-control" placeholder="Gol. Darah" value="<?= $cGolDar ?>"> -->
                                  </div>
                                </div>

                              </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
                              <div class="kt-portlet kt-portlet--height-fluid kt-iconbox">

                                <div class="form-group">
                                  <label>Pendidikan</label>
                                  <select class="form-control kt-selectpicker" data-live-search="true" name="cIdPendidikan" required>
                                    <option></option>
                                    <?php foreach ($pendidikan as $key => $vaPendidikan) { ?>
                                      <option value="<?= $vaPendidikan['id_pendidikan'] ?>" <?php if ($vaPendidikan['id_pendidikan'] == $cIdPendidikan) echo "selected"; ?>>
                                        <?= $vaPendidikan['nama_pendidikan'] ?>
                                      </option>
                                    <?php } ?>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label>Jurusan</label>
                                  <input type="text" name="cJurusan" class="form-control" placeholder="Jurusan" value="<?= $cJurusan ?>" required>
                                </div>

                              </div>
                            </div>
                          </div>

                          <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Alamat Domisili</label>
                              <textarea class="form-control" name="cAlamat" placeholder="Alamat Sekarang" required><?= $cAlamat ?></textarea>
                            </div>
                          </div> <!-- /.col-form -->
                          <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Alamat Sesuai KTP</label>
                              <textarea class="form-control" name="cAlamatAsal" placeholder="Alamat Sesuai KTP" required><?= $cAlamatAsal ?></textarea>
                            </div>
                          </div> <!-- /.col-form -->

                        </div>
                        <!--end::Portlet Data Pribadi-->

                      </div>
                    </div>
                  </div>
                </div>

                <!--end::Accordion-->

              </div>
              <!--end::Portlet Data Pribadi-->
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <!--begin::Portlet Data Kontak-->
              <div class="kt-portlet">

                <!--begin::Accordion-->

                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
                  <div class="card">
                    <div class="card-header" id="headingOne6">
                      <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseDataKontak" aria-expanded="true" aria-controls="collapseDataKontak">
                        <strong> Input Data Kontak </strong>
                      </div>
                    </div>
                    <div id="collapseDataKontak" class="collapse show" aria-labelledby="headingOne6" data-parent="#accordionExample6">
                      <div class="card-body">
                        <!--begin::Form-->
                        <div class="kt-portlet__body">
                          <div class="row">
                            <div class="col-sm-12 col-md-12">
                              <div class="form-group">
                                <label>Nomor KTP</label>
                                <div class="input-group">
                                  <input type="text" name="nKtp" class="form-control" placeholder="Nomor KTP" value="<?= $nKtp ?>" required>
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-info fa fa-list-alt"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div> <!-- /.col-form -->
                            <div class="col-sm-12 col-md-12">
                              <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                  <input type="text" name="cEmail" class="form-control" placeholder="Email" value="<?= $cEmail ?>" required>
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-info fa fa-envelope"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div> <!-- /.col-form -->
                            <div class="col-sm-12 col-md-12">
                              <div class="form-group">
                                <label>Handphone</label>
                                <div class="input-group">
                                  <input type="text" name="nHandphone" class="form-control" value="<?= $nHandphone ?>" placeholder="Handphone" required>
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-info fa fa-phone"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div> <!-- /.col-form -->

                            <div class="col-sm-12 col-md-12">
                              <div class="form-group">
                                <label>Foto </label>
                                <div class="input-group">
                                  <input type="file" name="foto" class="form-control" required>
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-info fa fa-camera"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div> <!-- /.col-form -->
                          </div><!-- /.row -->
                        </div>
                        <!--end::Portlet Data Kontak-->
                      </div>
                    </div>
                  </div>
                </div>
                <!--end::Accordion-->
              </div>
            </div>
            <div class="col-md-8">

              <!--begin::Portlet Data Keluarga-->
              <div class="kt-portlet">

                <!--begin::Accordion-->

                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
                  <div class="card">
                    <div class="card-header" id="headingOne6">
                      <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseDataKeluarga" aria-expanded="true" aria-controls="collapseDataKeluarga">
                        <strong> Data Keluarga </strong>
                      </div>
                    </div>
                    <div id="collapseDataKeluarga" class="collapse show" aria-labelledby="headingOne6" data-parent="#accordionExample6">
                      <div class="card-body">
                        <!--begin::Form-->
                        <div class="kt-portlet__body">


                          <?php
                          if ($cStatusKawin == 0 && !empty($cStatusKawin)) {
                          ?>
                            <div class="row">

                              <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                  <label>Input Status Perkawinan </label>
                                  <select name="cStatusKawin" id="cStatusKawin" class="form-control kt-selectpicker" data-live-search="true" required>
                                    <option></option>
                                    <option value="0" <?php if ($cStatusKawin == 0) echo "selected"; ?>>Menikah</option>
                                    <option value="1" <?php if ($cStatusKawin == 1) echo "selected"; ?>>Belum Menikah</option>
                                  </select>
                                  <!-- <input type="text" name="cStatusKawin" class="form-control" placeholder="Status Perkawinan" value="<?= $cStatusKawin ?>"> -->

                                </div>
                              </div> <!-- /.col-form -->



                              <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                  <label>Nama Istri/Suami</label>
                                  <input type="text" name="cNamaPasangan" class="form-control" placeholder="Nama Istri/Suami" value="<?= $cNamaPasangan ?>">

                                </div>
                              </div>
                              <!-- /.col-form -->

                              <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                  <label>Tgl Lahir Istri/Suami</label>
                                  <div class="input-group">
                                    <!-- <input type="text" name="dTglLahirIstri" class="form-control" data-date-format="dd-mm-yyyy" value="<?= $dTglLahirIstri ?>" id="tglDT"> -->
                                    <input type="date" name="dTglLahirIstri" onchange="umurPasangan();" class="form-control" value="<?= $dTglLahirIstri ?>" id="dobPasangan">
                                    <button type="button" onclick="javascript:dobPasangan.value=''">X</button>
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar-o"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- /.col-form -->

                              <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                  <label>Umur</label>
                                  <input type="text" name="nUmurPasangan" id="agesPasangan" class="form-control" placeholder="Umur" value="<?= $nUmurPasangan ?>" style="background-color:#fff;" disabled>

                                </div>
                              </div>
                              <!-- /.col-form -->

                              <div class="col-sm-12">
                                <div class="kt-portlet__foot">
                                </div>
                              </div>

                              <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                  <label>Nama Anak Ke-1</label>
                                  <input type="text" name="nAnak1" class="form-control" placeholder="Nama Anak Ke-1" value="<?= $nAnak1 ?>">

                                </div>
                              </div>
                              <!-- /.col-form -->

                              <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                  <label>Tgl Lahir Anak Ke-1</label>
                                  <div class="input-group">
                                    <!-- <input type="text" name="dTglLahirAnak1" class="form-control" data-date-format="dd-mm-yyyy" value="<?= $dTglLahirAnak1 ?>" id="tglDT"> -->
                                    <input type="date" name="dTglLahirAnak1" onchange="umurAnak1();" class="form-control" value="<?= $dTglLahirAnak1 ?>" id="dobAnak1">
                                    <button type="button" onclick="javascript:dobAnak1.value=''">X</button>
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar-o"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- /.col-form -->

                              <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                  <label>Umur Anak Ke-1</label>
                                  <input type="text" name="nUmurAnak1" id="agesAnak1" class="form-control" placeholder="Umur" value="<?= $nUmurAnak1 ?>" style="background-color:#fff;" disabled>

                                </div>
                              </div>
                              <!-- /.col-form -->

                              <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                  <label>Nama Anak Ke-2</label>
                                  <input type="text" name="nAnak2" class="form-control" placeholder="Nama Anak Ke-2" value="<?= $nAnak2 ?>">

                                </div>
                              </div>
                              <!-- /.col-form -->

                              <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                  <label>Tgl Lahir Anak Ke-2</label>
                                  <div class="input-group">
                                    <!-- <input type="text" name="dTglLahirAnak2" class="form-control" data-date-format="dd-mm-yyyy" value="<?= $dTglLahirAnak2 ?>" id="tglDT"> -->
                                    <input type="date" name="dTglLahirAnak2" onchange="umurAnak2();" class="form-control" value="<?= $dTglLahirAnak2 ?>" id="dobAnak2">
                                    <button type="button" onclick="javascript:dobAnak2.value=''">X</button>
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar-o"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- /.col-form -->

                              <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                  <label>Umur Anak Ke-2</label>
                                  <input type="text" name="nUmurAnak2" id="agesAnak2" class="form-control" placeholder="Umur" value="<?= $nUmurAnak2 ?>" style="background-color:#fff;" disabled>

                                </div>
                              </div>
                              <!-- /.col-form -->

                              <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                  <label>Nama Anak Ke-3</label>
                                  <input type="text" name="nAnak3" class="form-control" placeholder="Nama Anak Ke-3" value="<?= $nAnak3 ?>">

                                </div>
                              </div>
                              <!-- /.col-form -->

                              <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                  <label>Tgl Lahir Anak Ke-3</label>
                                  <div class="input-group">
                                    <!-- <input type="text" name="dTglLahirAnak3" class="form-control" data-date-format="dd-mm-yyyy" value="<?= $dTglLahirAnak3 ?>" id="tglDT"> -->
                                    <input type="date" name="dTglLahirAnak3" onchange="umurAnak3();" class="form-control" value="<?= $dTglLahirAnak3 ?>" id="dobAnak3">
                                    <button type="button" onclick="javascript:dobAnak3.value=''">X</button>
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar-o"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- /.col-form -->

                              <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                  <label>Umur Anak Ke-3</label>
                                  <input type="text" name="nUmurAnak3" id="agesAnak3" class="form-control" placeholder="Umur" value="<?= $nUmurAnak3 ?>" style="background-color:#fff;" disabled>

                                </div>
                              </div>
                              <!-- /.col-form -->

                              <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                  <label>Jumlah Anak</label>
                                  <input type="text" name="nJumlahAnak" class="form-control" placeholder="Jumlah Anak" value="<?= $nJumlahAnak ?>">

                                </div>
                              </div>
                              <!-- /.col-form -->
                            </div>
                          <?php
                          } elseif ($cStatusKawin == 1) {
                          ?>
                            <div class="row">
                              <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                  <label>Input Status Perkawinan </label>
                                  <select name="cStatusKawin" id="cStatusKawin" onchange="setInputPasangan(this.value)" class="form-control kt-selectpicker" data-live-search="true" required>
                                    <option></option>
                                    <option value="0" <?php if ($cStatusKawin == 0) echo "selected"; ?>>Menikah</option>
                                    <option value="1" <?php if ($cStatusKawin == 1) echo "selected"; ?>>Belum Menikah</option>
                                  </select>
                                  <!-- <input type="text" name="cStatusKawin" class="form-control" placeholder="Status Perkawinan" value="<?= $cStatusKawin ?>"> -->

                                </div>
                              </div> <!-- /.col-form -->
                            </div>
                          <?php
                          } elseif ($cStatusKawin == "") {
                          ?>
                            <div class="row">
                              <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                  <label>Input Status Perkawinan</label>
                                  <select name="cStatusKawin" id="cStatusKawin" onchange="setInputPasangan(this.value)" class="form-control kt-selectpicker" data-live-search="true" required>
                                    <option></option>
                                    <option value="0">Menikah</option>
                                    <option value="1">Belum Menikah</option>
                                  </select>
                                  <!-- <input type="text" name="cStatusKawin" class="form-control" placeholder="Status Perkawinan" value="<?= $cStatusKawin ?>"> -->

                                </div>
                              </div> <!-- /.col-form -->
                            </div>
                          <?php
                          }
                          ?>


                          <div id="form_input_pasangan"></div>

                          <!-- <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                              <label>Nama Orang Tua</label>
                              <Input type="text" name="cOrtu" class="form-control" value="<?= $cOrtu ?>" placeholder="Nama Orang Tua">
                            </div>
                          </div>  -->
                          <!-- /.col-form -->
                          <!-- <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Keluarga Terdekat</label>
                              <Input type="text" name="cHubungan" class="form-control" value="<?= $cHubungan ?>" placeholder="Keluarga Terdekat">
                            </div>
                          </div> -->
                          <!-- /.col-form -->
                          <!-- <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                              <label>Hp Keluarga Terdekat</label>
                              <div class="input-group">
                                <input type="text" name="nHpKeluarga" class="form-control" value="<?= $nHpKeluarga ?>" placeholder="Hp Keluarga">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">
                                    <i class="kt-font-info fa fa-phone"></i>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>  -->
                          <!-- /.col-form -->
                          <!-- <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                              <label>Referensi</label>
                              <Input type="text" name="cReferensi" class="form-control" value="<?= $cReferensi ?>" placeholder="Referensi">
                            </div>
                          </div>  -->
                          <!-- /.col-form -->
                          <!-- <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                              <label>No Tlp Referensi</label>
                              <div class="input-group">
                                <input type="text" name="nTlpReferensi" class="form-control" value="<?= $nTlpReferensi ?>" placeholder="Telepon Referensi">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">
                                    <i class="kt-font-info fa fa-phone"></i>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>  -->
                          <!-- /.col-form -->
                          <!-- <div class="col-sm-7 col-md-7">
                            <div class="form-group">
                              <label>Bobot Nilai</label>
                              <Input type="text" name="nBobot" class="form-control" value="<?= $nBobotNilai ?>" placeholder="Bobot Nilai">
                            </div>
                          </div>  -->
                          <!-- /.col-form -->
                          <div class="col-sm-12">
                            <div class="kt-portlet__foot">
                              <br />
                              <br />
                              <?php if ($action != 'edit' && $this->session->userdata('level') == 2) { ?>
                                <div class="col-sm-12">
                                  <button type="button" onclick="window.alert('Maaf Anda Tidak Mempunyai Kewenangan')" class="btn btn-flat btn-primary">
                                    <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                                  </button>
                                </div>
                              <?php } elseif ($action != 'edit' && $this->session->userdata('level') == 4) { ?>
                                <div class="col-sm-12">
                                  <button type="button" onclick="window.alert('Maaf Anda Tidak Mempunyai Kewenangan')" class="btn btn-flat btn-primary">
                                    <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                                  </button>
                                </div>
                              <?php } else { ?>
                                <div class="col-sm-12">
                                  <button type="submit" class="btn btn-flat btn-primary">
                                    <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                                  </button>
                                </div>
                              <?php } ?>
                            </div>
                          </div>
                        </div><!-- /.row -->
                      </div>
                      <!--end::Portlet Data Kontak-->
                    </div>
                  </div>
                </div>
              </div>
              <!--end::Accordion-->
            </div>
            <!--end::Portlet Data Keluarga-->
          </div>
        </form>


        <!-- End Form -->
      <?php
      } else {
      ?>
        <form method="post" enctype="multipart/form-data" action="<?= site_url('transaksi_act/pegawai/' . $cAction . '') ?>">
          <div class="row">
            <div class="col-md-12">

              <!--begin::Portlet Data Kerja-->
              <div class="kt-portlet">

                <!--begin::Accordion-->

                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
                  <div class="card">
                    <div class="card-header" id="headingOne6">
                      <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseDataKerja" aria-expanded="true" aria-controls="collapseDataKerja">
                        <strong> Input Data Kerja </strong>
                      </div>
                    </div>
                    <div id="collapseDataKerja" class="collapse show" aria-labelledby="headingOne6" data-parent="#accordionExample6">
                      <div class="card-body">
                        <!--begin::Form-->
                        <div class="row">

                          <div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
                            <div class="kt-portlet kt-portlet--height-fluid kt-iconbox">

                              <?php

                              if ($action == "error") {
                                if ($error == "NIK Sudah Terdaftar") {
                              ?>
                                  <div class="alert alert-danger fade show" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">NIK Sudah Terdaftar !!!</div>
                                    <div class="alert-close">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="la la-close"></i></span>
                                      </button>
                                    </div>
                                  </div>

                              <?php
                                } else {
                                }
                              } else {
                              }
                              ?>

                              <div class="form-group">
                                <label>Area Kerja</label>
                                <select class="form-control kt-selectpicker" data-live-search="true" name="cIdArea" required>
                                  <option></option>
                                  <?php foreach ($area as $key => $vaArea) { ?>
                                    <option value="<?= $vaArea['id_area'] ?>" <?php if ($vaArea['id_area'] == $cIdArea) echo "selected"; ?>>
                                      <?= $vaArea['nama_area'] ?>
                                    </option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Status Kerja</label>
                                <select class="form-control kt-selectpicker" data-live-search="true" name="cIdStatus" onchange="hideshow(this.value)" required>
                                  <option></option>
                                  <?php foreach ($status as $key => $vaStatus) {
                                    if ($vaStatus['id_status'] == 3 || $vaStatus['id_status'] == 4 || $vaStatus['id_status'] == 5) { ?>

                                      <option value="<?= $vaStatus['id_status'] ?>" <?php if ($vaStatus['id_status'] == $cIdStatus) echo "selected"; ?>>
                                        <?= $vaStatus['status'] ?>
                                      </option>

                                  <?php  } else {
                                    }
                                  } ?>
                                </select>
                              </div>
                              <div class="form-group" id="golker">
                                <label>Golongan Kerja</label>
                                <select class="form-control kt-selectpicker" data-live-search="true" name="cIdKerja" required>
                                  <option></option>
                                  <?php foreach ($kerja as $key => $vaKerja) { ?>
                                    <option value="<?= $vaKerja['id_kerja'] ?>" <?php if ($vaKerja['id_kerja'] == $cIdKerja) echo "selected"; ?>>
                                      <?= $vaKerja['kerja'] ?>
                                    </option>
                                  <?php } ?>
                                </select>
                              </div>
                              <?php
                              if ($cIdStatus == 3) {
                              ?>
                                <script>
                                  document.getElementById('golker').style.display = 'none';
                                </script>
                              <?php
                              }
                              ?>
                              <div class="form-group">
                                <label>Office</label>
                                <div class="input-group">
                                  <select class="form-control kt-selectpicker" data-live-search="true" name="cOutlet" required>
                                    <option></option>
                                    <?php foreach ($outlet as $key => $vaOutlet) { ?>
                                      <option value="<?= $vaOutlet['id_outlet'] ?>" <?php if ($vaOutlet['id_outlet'] == $cOutlet) echo "selected"; ?>>
                                        <?= $vaOutlet['kode'] ?> : <?= $vaOutlet['nama'] ?>
                                      </option>
                                    <?php } ?>
                                  </select>
                                  <div class="input-group-append">
                                    <span class="input-group-text " id="basic-addon2">
                                      <i class="kt-font-success flaticon2-architecture-and-city"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Tanggal Masuk Kerja</label>
                                <div class="input-group">
                                  <input type="date" name="dTglMasukKerja" class="form-control" placeholder="Tanggal Masuk Kerja" data-date-format="dd/mm/yyyy" value="<?= $dTglMasukKerja ?>" id="tglDT" required>
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar-o"></i>
                                  </div>
                                </div>
                              </div>
                              <!-- <div class="form-group">
                                <label>Tanggal Kontrak Berakhir</label>
                                <div class="input-group">
                                  <input type="text" readonly="true" class="form-control" placeholder="Tanggal Kontrak Berakhir" data-date-format="dd/mm/yyyy" value="<?= $dTglKontrakBerakhir ?>">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar-o"></i>
                                  </div>
                                </div>
                              </div> -->
                            </div>
                          </div>

                          <div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
                            <div class="kt-portlet kt-portlet--height-fluid kt-iconbox">
                              <div class="form-group">
                                <label>Pembayaran Gaji <?= $cJenisBayar ?></label>
                                <div class="input-group">
                                  <select name="cJenisBayar" class="form-control kt-selectpicker" data-live-search="true">
                                    <option></option>
                                    <?php foreach ($bayar as $key => $vaBayar) { ?>
                                      <option value="<?= $vaBayar['id_pembayaran'] ?>" <?php if ($vaBayar['id_pembayaran'] == $cJenisBayar) echo "selected"; ?>>
                                        <?= $vaBayar['jenis_pembayaran'] ?>
                                      </option>
                                    <?php } ?>
                                  </select>
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-success flaticon-price-tag"></i>
                                    </span>
                                  </div>

                                </div>
                              </div>
                              <div class="form-group">
                                <label>Cabang Bank</label>
                                <div class="input-group">
                                  <input type="text" name="cCabangBank" class="form-control" value="<?= $cCabangBank ?>" placeholder="Cabang Bank">
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-success flaticon2-map"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Nomor Rekening</label>
                                <div class="input-group">
                                  <input type="text" name="nRekening" class="form-control" value="<?= $cNoRekening ?>" placeholder="Nomor Rekening">
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-success fa fa-credit-card"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Atas Nama</label>
                                <div class="input-group">
                                  <input type="text" name="cAtasNama" class="form-control" value="<?= $cAtasNama ?>" placeholder="Atas Nama">
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-success fa fa-user"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
                            <div class="kt-portlet kt-portlet--height-fluid kt-iconbox">
                              <div class="form-group">
                                <label>No. NPWP</label>
                                <div class="input-group">
                                  <input type="text" name="cNPWP" class="form-control" value="<?= $cNPWP ?>" placeholder="No. NPWP">
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-success fa fa-qrcode"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>No. BPJS KTK</label>
                                <div class="input-group">
                                  <input type="text" name="cBPJSKTK" class="form-control" value="<?= $cBPJSKTK ?>" placeholder="No. BPJS KTK">
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-success fa fa-qrcode"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>No. BPJS Kes</label>
                                <div class="input-group">
                                  <input type="text" name="cBPJSKES" class="form-control" value="<?= $cBPJSKES ?>" placeholder="No. BPJS Kes">
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-success fa fa-qrcode"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                        <!--end::Portlet Data Kerja-->
                      </div> <!-- end row -->
                    </div>
                  </div>
                </div>

                <!--end::Accordion-->
              </div>
            </div>
            <div class="col-md-12">

              <!--begin::Portlet Data Pribadi-->
              <div class="kt-portlet">

                <!--begin::Accordion-->

                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
                  <div class="card">
                    <div class="card-header" id="headingOne6">
                      <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseDataPribadi" aria-expanded="true" aria-controls="collapseDataPribadi">
                        <strong> Input Data Pribadi </strong>
                      </div>
                    </div>
                    <div id="collapseDataPribadi" class="collapse show" aria-labelledby="headingOne6" data-parent="#accordionExample6">
                      <div class="card-body">
                        <div class="col-sm-12 col-md-12">
                          <div id="tb_pelanggaran"> </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                              <label>Nik</label>
                              <div class="input-group">
                                <input type="text" name="cNik" id="cNik" class="form-control" placeholder="Nik Pegawai">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">
                                    <i class="kt-font-success fa fa-credit-card"></i>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div> <!-- /.col-form -->
                          <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                              <label>PIN</label>
                              <div class="input-group">
                                <input type="text" id="cPinFinger" name="cPin" class="form-control" placeholder="PIN Finger" value="<?= $cPin  ?>" required>
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">
                                    <i class="kt-font-success fa fa-qrcode"></i>
                                  </span>
                                </div>
                              </div>
                            </div>

                          </div><!-- /.col-form -->
                          <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                              <label>Nama</label>
                              <div class="input-group">
                                <input type="text" id="cNamaPegawai" name="cNama" class="form-control" placeholder="Nama Pegawai" value="<?= $cNama  ?>" required>
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">
                                    <i class="kt-font-success fa fa-user"></i>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div> <!-- /.col-form -->
                          <div class="col-sm-1 col-md-1">
                            <div class="form-group">
                              <label>Cek PIN</label>
                              <button type="button" onclick="return CekNamaPegawai();" class="btn btn-outline-success btn-md btn-icon btn-icon-md">
                                <i class="flaticon2-refresh"></i>
                              </button>
                            </div>
                          </div> <!-- /.col-form -->
                          <div class="row">
                            <div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
                              <div class="kt-portlet kt-portlet--height-fluid kt-iconbox">

                                <div class="form-group">
                                  <label>Tempat Lahir</label>
                                  <input type="text" name="cTempatLahir" class="form-control" placeholder="Tempat Lahir" value="<?= $cTempatLahir ?>" required>
                                </div>

                                <div class="form-group">
                                  <label>Tanggal Lahir</label>
                                  <div class="input-group">
                                    <input type="date" name="dTglLahir" onchange="ageCalculator();" class="form-control" value="<?= $dTglLahir ?>" id="dob" required>
                                    <button type="button" onclick="javascript:dob.value=''">X</button>
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar-o"></i>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label>Umur</label>
                                  <div class="input-group">
                                    <input type="text" name="cUmur" id="ages" class="form-control" value="<?= $cUmur ?>" style="background-color:#fff;" id="ages" disabled required>
                                  </div>
                                </div>

                              </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
                              <div class="kt-portlet kt-portlet--height-fluid kt-iconbox">

                                <div class="form-group">
                                  <label>Agama</label>
                                  <select name="cAgama" class="form-control kt-selectpicker" data-live-search="true" required>
                                    <option></option>
                                    <option value="1" <?php if ($cAgama == 1) echo "selected"; ?>>Islam</option>
                                    <option value="2" <?php if ($cAgama == 2) echo "selected"; ?>>Protestan</option>
                                    <option value="3" <?php if ($cAgama == 3) echo "selected"; ?>>Katolik</option>
                                    <option value="4" <?php if ($cAgama == 4) echo "selected"; ?>>Hindu</option>
                                    <option value="5" <?php if ($cAgama == 5) echo "selected"; ?>>Buddha</option>
                                    <option value="6" <?php if ($cAgama == 6) echo "selected"; ?>>Konghucu</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label>Jenis Kelamin</label>
                                  <select name="cJenisKelamin" class="form-control kt-selectpicker" data-live-search="true" required>
                                    <option></option>
                                    <option value="1" <?php if ($cJk == 1) echo "selected"; ?>>Laki-Laki</option>
                                    <option value="2" <?php if ($cJk == 2) echo "selected"; ?>>Perempuan</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label>Gol. Darah</label>
                                  <div class="input-group">

                                    <select name="cGolDar" class="form-control kt-selectpicker" data-live-search="true">
                                      <option></option>
                                      <option value="A" <?php if ($cGolDar == "A") echo "selected"; ?>>A</option>
                                      <option value="A-" <?php if ($cGolDar == "A-") echo "selected"; ?>>A-</option>
                                      <option value="B" <?php if ($cGolDar == "B") echo "selected"; ?>>B</option>
                                      <option value="B-" <?php if ($cGolDar == "B-") echo "selected"; ?>>B-</option>
                                      <option value="AB" <?php if ($cGolDar == "AB") echo "selected"; ?>>AB</option>
                                      <option value="AB-" <?php if ($cGolDar == "AB-") echo "selected"; ?>>AB-</option>
                                      <option value="O" <?php if ($cGolDar == "O") echo "selected"; ?>>O</option>
                                    </select>

                                    <!-- <input type="text" name="cGolDar" class="form-control" placeholder="Gol. Darah" value="<?= $cGolDar ?>"> -->
                                  </div>
                                </div>

                              </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
                              <div class="kt-portlet kt-portlet--height-fluid kt-iconbox">

                                <div class="form-group">
                                  <label>Pendidikan</label>
                                  <select class="form-control kt-selectpicker" data-live-search="true" name="cIdPendidikan" required>
                                    <option></option>
                                    <?php foreach ($pendidikan as $key => $vaPendidikan) { ?>
                                      <option value="<?= $vaPendidikan['id_pendidikan'] ?>" <?php if ($vaPendidikan['id_pendidikan'] == $cIdPendidikan) echo "selected"; ?>>
                                        <?= $vaPendidikan['nama_pendidikan'] ?>
                                      </option>
                                    <?php } ?>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label>Jurusan</label>
                                  <input type="text" name="cJurusan" class="form-control" placeholder="Jurusan" value="<?= $cJurusan ?>" required>
                                </div>

                              </div>
                            </div>
                          </div>

                          <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Alamat Domisili</label>
                              <textarea class="form-control" name="cAlamat" placeholder="Alamat Sekarang" required><?= $cAlamat ?></textarea>
                            </div>
                          </div> <!-- /.col-form -->
                          <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Alamat Sesuai KTP</label>
                              <textarea class="form-control" name="cAlamatAsal" placeholder="Alamat Sesuai KTP" required><?= $cAlamatAsal ?></textarea>
                            </div>
                          </div> <!-- /.col-form -->

                        </div>
                        <!--end::Portlet Data Pribadi-->

                      </div>
                    </div>
                  </div>
                </div>

                <!--end::Accordion-->

              </div>
              <!--end::Portlet Data Pribadi-->
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <!--begin::Portlet Data Kontak-->
              <div class="kt-portlet">

                <!--begin::Accordion-->

                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
                  <div class="card">
                    <div class="card-header" id="headingOne6">
                      <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseDataKontak" aria-expanded="true" aria-controls="collapseDataKontak">
                        <strong> Input Data Kontak </strong>
                      </div>
                    </div>
                    <div id="collapseDataKontak" class="collapse show" aria-labelledby="headingOne6" data-parent="#accordionExample6">
                      <div class="card-body">
                        <!--begin::Form-->
                        <div class="kt-portlet__body">
                          <div class="row">
                            <div class="col-sm-12 col-md-12">
                              <div class="form-group">
                                <label>Nomor KTP</label>
                                <div class="input-group">
                                  <input type="text" name="nKtp" class="form-control" placeholder="Nomor KTP" value="<?= $nKtp ?>" required>
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-info fa fa-list-alt"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div> <!-- /.col-form -->
                            <div class="col-sm-12 col-md-12">
                              <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                  <input type="text" name="cEmail" class="form-control" placeholder="Email" value="<?= $cEmail ?>" required>
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-info fa fa-envelope"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div> <!-- /.col-form -->
                            <div class="col-sm-12 col-md-12">
                              <div class="form-group">
                                <label>Handphone</label>
                                <div class="input-group">
                                  <input type="text" name="nHandphone" class="form-control" value="<?= $nHandphone ?>" placeholder="Handphone" required>
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-info fa fa-phone"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div> <!-- /.col-form -->

                            <div class="col-sm-12 col-md-12">
                              <div class="form-group">
                                <label>Foto </label>
                                <div class="input-group">
                                  <input type="file" name="foto" class="form-control" required>
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="kt-font-info fa fa-camera"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div> <!-- /.col-form -->
                          </div><!-- /.row -->
                        </div>
                        <!--end::Portlet Data Kontak-->
                      </div>
                    </div>
                  </div>
                </div>
                <!--end::Accordion-->
              </div>
            </div>
            <div class="col-md-8">

              <!--begin::Portlet Data Keluarga-->
              <div class="kt-portlet">

                <!--begin::Accordion-->

                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
                  <div class="card">
                    <div class="card-header" id="headingOne6">
                      <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseDataKeluarga" aria-expanded="true" aria-controls="collapseDataKeluarga">
                        <strong> Data Keluarga </strong>
                      </div>
                    </div>
                    <div id="collapseDataKeluarga" class="collapse show" aria-labelledby="headingOne6" data-parent="#accordionExample6">
                      <div class="card-body">
                        <!--begin::Form-->
                        <div class="kt-portlet__body">

                          <div class="row">

                            <div class="col-sm-6 col-md-6">
                              <div class="form-group">
                                <label>Input Status Perkawinan </label>
                                <select name="cStatusKawin" class="form-control kt-selectpicker" data-live-search="true" required>
                                  <option></option>
                                  <option value="0" <?php if ($cStatusKawin == 0) echo "selected"; ?>>Menikah</option>
                                  <option value="1" <?php if ($cStatusKawin == 1) echo "selected"; ?>>Belum Menikah</option>
                                </select>
                                <!-- <input type="text" name="cStatusKawin" class="form-control" placeholder="Status Perkawinan" value="<?= $cStatusKawin ?>"> -->

                              </div>
                            </div> <!-- /.col-form -->



                            <div class="col-sm-6 col-md-6">
                              <div class="form-group">
                                <label>Nama Istri/Suami</label>
                                <input type="text" name="cNamaPasangan" class="form-control" placeholder="Nama Istri/Suami" value="<?= $cNamaPasangan ?>">

                              </div>
                            </div>
                            <!-- /.col-form -->

                            <div class="col-sm-6 col-md-6">
                              <div class="form-group">
                                <label>Tgl Lahir Istri/Suami</label>
                                <div class="input-group">
                                  <!-- <input type="text" name="dTglLahirIstri" class="form-control" data-date-format="dd-mm-yyyy" value="<?= $dTglLahirIstri ?>" id="tglDT"> -->
                                  <input type="date" name="dTglLahirIstri" onchange="umurPasangan();" class="form-control" value="<?= $dTglLahirIstri ?>" id="dobPasangan">
                                  <button type="button" onclick="javascript:dobPasangan.value=''">X</button>
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar-o"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- /.col-form -->

                            <div class="col-sm-6 col-md-6">
                              <div class="form-group">
                                <label>Umur</label>
                                <input type="text" name="nUmurPasangan" id="agesPasangan" class="form-control" placeholder="Umur" value="<?= $nUmurPasangan ?>" style="background-color:#fff;" disabled>

                              </div>
                            </div>
                            <!-- /.col-form -->

                            <div class="col-sm-12">
                              <div class="kt-portlet__foot">
                              </div>
                            </div>

                            <div class="col-sm-4 col-md-4">
                              <div class="form-group">
                                <label>Nama Anak Ke-1</label>
                                <input type="text" name="nAnak1" class="form-control" placeholder="Nama Anak Ke-1" value="<?= $nAnak1 ?>">

                              </div>
                            </div>
                            <!-- /.col-form -->

                            <div class="col-sm-4 col-md-4">
                              <div class="form-group">
                                <label>Tgl Lahir Anak Ke-1</label>
                                <div class="input-group">
                                  <!-- <input type="text" name="dTglLahirAnak1" class="form-control" data-date-format="dd-mm-yyyy" value="<?= $dTglLahirAnak1 ?>" id="tglDT"> -->
                                  <input type="date" name="dTglLahirAnak1" onchange="umurAnak1();" class="form-control" value="<?= $dTglLahirAnak1 ?>" id="dobAnak1">
                                  <button type="button" onclick="javascript:dobAnak1.value=''">X</button>
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar-o"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- /.col-form -->

                            <div class="col-sm-4 col-md-4">
                              <div class="form-group">
                                <label>Umur Anak Ke-1</label>
                                <input type="text" name="nUmurAnak1" id="agesAnak1" class="form-control" placeholder="Umur" value="<?= $nUmurAnak1 ?>" style="background-color:#fff;" disabled>

                              </div>
                            </div>
                            <!-- /.col-form -->

                            <div class="col-sm-4 col-md-4">
                              <div class="form-group">
                                <label>Nama Anak Ke-2</label>
                                <input type="text" name="nAnak2" class="form-control" placeholder="Nama Anak Ke-2" value="<?= $nAnak2 ?>">

                              </div>
                            </div>
                            <!-- /.col-form -->

                            <div class="col-sm-4 col-md-4">
                              <div class="form-group">
                                <label>Tgl Lahir Anak Ke-2</label>
                                <div class="input-group">
                                  <!-- <input type="text" name="dTglLahirAnak2" class="form-control" data-date-format="dd-mm-yyyy" value="<?= $dTglLahirAnak2 ?>" id="tglDT"> -->
                                  <input type="date" name="dTglLahirAnak2" onchange="umurAnak2();" class="form-control" value="<?= $dTglLahirAnak2 ?>" id="dobAnak2">
                                  <button type="button" onclick="javascript:dobAnak2.value=''">X</button>
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar-o"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- /.col-form -->

                            <div class="col-sm-4 col-md-4">
                              <div class="form-group">
                                <label>Umur Anak Ke-2</label>
                                <input type="text" name="nUmurAnak2" id="agesAnak2" class="form-control" placeholder="Umur" value="<?= $nUmurAnak2 ?>" style="background-color:#fff;" disabled>

                              </div>
                            </div>
                            <!-- /.col-form -->

                            <div class="col-sm-4 col-md-4">
                              <div class="form-group">
                                <label>Nama Anak Ke-3</label>
                                <input type="text" name="nAnak3" class="form-control" placeholder="Nama Anak Ke-3" value="<?= $nAnak3 ?>">

                              </div>
                            </div>
                            <!-- /.col-form -->

                            <div class="col-sm-4 col-md-4">
                              <div class="form-group">
                                <label>Tgl Lahir Anak Ke-3</label>
                                <div class="input-group">
                                  <!-- <input type="text" name="dTglLahirAnak3" class="form-control" data-date-format="dd-mm-yyyy" value="<?= $dTglLahirAnak3 ?>" id="tglDT"> -->
                                  <input type="date" name="dTglLahirAnak3" onchange="umurAnak3();" class="form-control" value="<?= $dTglLahirAnak3 ?>" id="dobAnak3">
                                  <button type="button" onclick="javascript:dobAnak3.value=''">X</button>
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar-o"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- /.col-form -->

                            <div class="col-sm-4 col-md-4">
                              <div class="form-group">
                                <label>Umur Anak Ke-3</label>
                                <input type="text" name="nUmurAnak3" id="agesAnak3" class="form-control" placeholder="Umur" value="<?= $nUmurAnak3 ?>" style="background-color:#fff;" disabled>

                              </div>
                            </div>
                            <!-- /.col-form -->

                            <div class="col-sm-4 col-md-4">
                              <div class="form-group">
                                <label>Jumlah Anak</label>
                                <input type="text" name="nJumlahAnak" class="form-control" placeholder="Jumlah Anak" value="<?= $nJumlahAnak ?>">

                              </div>
                            </div>
                            <!-- /.col-form -->
                          </div>

                          <!-- <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                              <label>Nama Orang Tua</label>
                              <Input type="text" name="cOrtu" class="form-control" value="<?= $cOrtu ?>" placeholder="Nama Orang Tua">
                            </div>
                          </div>  -->
                          <!-- /.col-form -->
                          <!-- <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Keluarga Terdekat</label>
                              <Input type="text" name="cHubungan" class="form-control" value="<?= $cHubungan ?>" placeholder="Keluarga Terdekat">
                            </div>
                          </div> -->
                          <!-- /.col-form -->
                          <!-- <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                              <label>Hp Keluarga Terdekat</label>
                              <div class="input-group">
                                <input type="text" name="nHpKeluarga" class="form-control" value="<?= $nHpKeluarga ?>" placeholder="Hp Keluarga">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">
                                    <i class="kt-font-info fa fa-phone"></i>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>  -->
                          <!-- /.col-form -->
                          <!-- <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                              <label>Referensi</label>
                              <Input type="text" name="cReferensi" class="form-control" value="<?= $cReferensi ?>" placeholder="Referensi">
                            </div>
                          </div>  -->
                          <!-- /.col-form -->
                          <!-- <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                              <label>No Tlp Referensi</label>
                              <div class="input-group">
                                <input type="text" name="nTlpReferensi" class="form-control" value="<?= $nTlpReferensi ?>" placeholder="Telepon Referensi">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">
                                    <i class="kt-font-info fa fa-phone"></i>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>  -->
                          <!-- /.col-form -->
                          <!-- <div class="col-sm-7 col-md-7">
                            <div class="form-group">
                              <label>Bobot Nilai</label>
                              <Input type="text" name="nBobot" class="form-control" value="<?= $nBobotNilai ?>" placeholder="Bobot Nilai">
                            </div>
                          </div>  -->
                          <!-- /.col-form -->
                          <div class="col-sm-12">
                            <div class="kt-portlet__foot">
                              <br />
                              <br />
                              <div class="col-sm-12">
                                <button type="submit" class="btn btn-flat btn-primary">
                                  <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                                </button>
                              </div>

                            </div>
                          </div>
                        </div><!-- /.row -->
                      </div>
                      <!--end::Portlet Data Kontak-->
                    </div>
                  </div>
                </div>
              </div>
              <!--end::Accordion-->
            </div>
            <!--end::Portlet Data Keluarga-->
          </div>
        </form>


        <!-- End Form -->
      <?php
      }
      ?>

    </section>
    <!--End::Dashboard 6-->
  </div>
  <!-- end:: Content -->
</div>


<script type="text/javascript">
  function validateForm() {

  }

  function setInputPasangan(data) {

    var cStatusKawin = $('#cStatusKawin').val();
    var cNik = $('#cNik').val();
    $.ajax({
      type: "POST",
      data: "cNik=" + cNik +
        "&cStatusKawin=" + cStatusKawin,
      url: "<?= site_url('transaksi_act/formInputPasangan/') ?>",
      cache: false,
      beforeSend: function() {
        $('#form_input_pasangan').html("Cek Data Ke Sistem .. ");
      },
      success: function(msg) {
        $("#form_input_pasangan").html(msg);
      }
    });

  }

  function ageCalculator() {
    //collect input from HTML form and convert into date format
    var userinput = document.getElementById("dob").value;
    var dob = new Date(userinput);

    //check user provide input or not
    if (userinput == null || userinput == '') {
      document.getElementById("message").innerHTML = "**Choose a date please!";
      return false;
    }

    //execute if the user entered a date 
    else {
      //extract the year, month, and date from user date input
      var dobYear = dob.getYear();
      var dobMonth = dob.getMonth();
      var dobDate = dob.getDate();

      //get the current date from the system
      var now = new Date();
      //extract the year, month, and date from current date
      var currentYear = now.getYear();
      var currentMonth = now.getMonth();
      var currentDate = now.getDate();

      //declare a variable to collect the age in year, month, and days
      var age = {};
      var ageString = "";

      //get years
      yearAge = currentYear - dobYear;

      //get months
      if (currentMonth >= dobMonth)
        //get months when current month is greater
        var monthAge = currentMonth - dobMonth;
      else {
        yearAge--;
        var monthAge = 12 + currentMonth - dobMonth;
      }

      //get days
      if (currentDate >= dobDate)
        //get days when the current date is greater
        var dateAge = currentDate - dobDate;
      else {
        monthAge--;
        var dateAge = 31 + currentDate - dobDate;

        if (monthAge < 0) {
          monthAge = 11;
          yearAge--;
        }
      }
      //group the age in a single variable
      age = {
        years: yearAge,
        months: monthAge,
        days: dateAge
      };

      if ((age.years > 0) && (age.months > 0) && (age.days > 0))
        // ageString = age.years + " Tahun, " + age.months + " Bulan, and " + age.days + " days old.";
        ageString = age.years + " Tahun " + age.months + " Bulan";
      // else if ((age.years == 0) && (age.months == 0) && (age.days > 0))
      //   ageString = "Only " + age.days + " days old!";
      // when current month and date is same as birth date and month
      else if ((age.years > 0) && (age.months == 0) && (age.days == 0))
        ageString = age.years + " Tahun";
      else if ((age.years > 0) && (age.months > 0) && (age.days == 0))
        ageString = age.years + " Tahun " + age.months + " Bulan";
      // else if ((age.years == 0) && (age.months > 0) && (age.days > 0))
      //   ageString = age.months + " Bulan and " + age.days + " days old.";
      else if ((age.years > 0) && (age.months == 0) && (age.days > 0))
        // ageString = age.years + " Tahun, and" + age.days + " days old.";
        ageString = age.years + " Tahun ";
      // else if ((age.years == 0) && (age.months > 0) && (age.days == 0))
      //   ageString = age.months + " Bulan old.";
      // when current date is same as dob(date of birth)
      else ageString = "Welcome to Earth!, It's first day on Earth!";

      //display the calculated age
      return document.getElementById("ages").value = ageString;

    }
  }

  function hideshow(id_status) {
    var x = document.getElementById('golker');

    if (id_status == 4) {
      x.style.display = 'block';
    } else {
      x.style.display = 'none';
    }
  }

  function umurPasangan() {
    //collect input from HTML form and convert into date format
    var userinput = document.getElementById("dobPasangan").value;
    var dob = new Date(userinput);

    //check user provide input or not
    if (userinput == null || userinput == '') {
      document.getElementById("message").innerHTML = "**Choose a date please!";
      return false;
    }

    //execute if the user entered a date 
    else {
      //extract the year, month, and date from user date input
      var dobYear = dob.getYear();
      var dobMonth = dob.getMonth();
      var dobDate = dob.getDate();

      //get the current date from the system
      var now = new Date();
      //extract the year, month, and date from current date
      var currentYear = now.getYear();
      var currentMonth = now.getMonth();
      var currentDate = now.getDate();

      //declare a variable to collect the age in year, month, and days
      var age = {};
      var ageString = "";

      //get years
      yearAge = currentYear - dobYear;

      //get months
      if (currentMonth >= dobMonth)
        //get months when current month is greater
        var monthAge = currentMonth - dobMonth;
      else {
        yearAge--;
        var monthAge = 12 + currentMonth - dobMonth;
      }

      //get days
      if (currentDate >= dobDate)
        //get days when the current date is greater
        var dateAge = currentDate - dobDate;
      else {
        monthAge--;
        var dateAge = 31 + currentDate - dobDate;

        if (monthAge < 0) {
          monthAge = 11;
          yearAge--;
        }
      }
      //group the age in a single variable
      age = {
        years: yearAge,
        months: monthAge,
        days: dateAge
      };

      if ((age.years > 0) && (age.months > 0) && (age.days > 0))
        // ageString = age.years + " Tahun, " + age.months + " Bulan, and " + age.days + " days old.";
        ageString = age.years + " Tahun " + age.months + " Bulan";
      // else if ((age.years == 0) && (age.months == 0) && (age.days > 0))
      //   ageString = "Only " + age.days + " days old!";
      // when current month and date is same as birth date and month
      else if ((age.years > 0) && (age.months == 0) && (age.days == 0))
        ageString = age.years + " Tahun";
      else if ((age.years > 0) && (age.months > 0) && (age.days == 0))
        ageString = age.years + " Tahun " + age.months + " Bulan";
      // else if ((age.years == 0) && (age.months > 0) && (age.days > 0))
      //   ageString = age.months + " Bulan and " + age.days + " days old.";
      else if ((age.years > 0) && (age.months == 0) && (age.days > 0))
        // ageString = age.years + " Tahun, and" + age.days + " days old.";
        ageString = age.years + " Tahun ";
      // else if ((age.years == 0) && (age.months > 0) && (age.days == 0))
      //   ageString = age.months + " Bulan old.";
      // when current date is same as dob(date of birth)
      else ageString = "Welcome to Earth!, It's first day on Earth!";

      //display the calculated age
      return document.getElementById("agesPasangan").value = ageString;

    }
  }

  function umurAnak1() {
    //collect input from HTML form and convert into date format
    var userinput = document.getElementById("dobAnak1").value;
    var dob = new Date(userinput);

    //check user provide input or not
    if (userinput == null || userinput == '') {
      document.getElementById("message").innerHTML = "**Choose a date please!";
      return false;
    }

    //execute if the user entered a date 
    else {
      //extract the year, month, and date from user date input
      var dobYear = dob.getYear();
      var dobMonth = dob.getMonth();
      var dobDate = dob.getDate();

      //get the current date from the system
      var now = new Date();
      //extract the year, month, and date from current date
      var currentYear = now.getYear();
      var currentMonth = now.getMonth();
      var currentDate = now.getDate();

      //declare a variable to collect the age in year, month, and days
      var age = {};
      var ageString = "";

      //get years
      yearAge = currentYear - dobYear;

      //get months
      if (currentMonth >= dobMonth)
        //get months when current month is greater
        var monthAge = currentMonth - dobMonth;
      else {
        yearAge--;
        var monthAge = 12 + currentMonth - dobMonth;
      }

      //get days
      if (currentDate >= dobDate)
        //get days when the current date is greater
        var dateAge = currentDate - dobDate;
      else {
        monthAge--;
        var dateAge = 31 + currentDate - dobDate;

        if (monthAge < 0) {
          monthAge = 11;
          yearAge--;
        }
      }
      //group the age in a single variable
      age = {
        years: yearAge,
        months: monthAge,
        days: dateAge
      };

      if ((age.years > 0) && (age.months > 0) && (age.days > 0))
        // ageString = age.years + " Tahun, " + age.months + " Bulan, and " + age.days + " days old.";
        ageString = age.years + " Tahun " + age.months + " Bulan";
      else if ((age.years == 0) && (age.months == 0) && (age.days > 0))
        ageString = "Umur " + age.days + " Hari";
      //when current month and date is same as birth date and month
      else if ((age.years > 0) && (age.months == 0) && (age.days == 0))
        ageString = age.years + " Tahun";
      else if ((age.years > 0) && (age.months > 0) && (age.days == 0))
        ageString = age.years + " Tahun " + age.months + " Bulan ";
      else if ((age.years == 0) && (age.months > 0) && (age.days > 0))
        ageString = age.months + " Bulan " + age.days + " Hari";
      else if ((age.years > 0) && (age.months == 0) && (age.days > 0))
        ageString = age.years + " Tahun " + age.days + " Hari";
      else if ((age.years == 0) && (age.months > 0) && (age.days == 0))
        ageString = age.months + " Bulan";
      //when current date is same as dob(date of birth)
      else ageString = "Welcome to Earth!, It's first day on Earth!";

      //display the calculated age
      return document.getElementById("agesAnak1").value = ageString;

    }
  }

  function umurAnak2() {
    //collect input from HTML form and convert into date format
    var userinput = document.getElementById("dobAnak2").value;
    var dob = new Date(userinput);

    //check user provide input or not
    if (userinput == null || userinput == '') {
      document.getElementById("message").innerHTML = "**Choose a date please!";
      return false;
    }

    //execute if the user entered a date 
    else {
      //extract the year, month, and date from user date input
      var dobYear = dob.getYear();
      var dobMonth = dob.getMonth();
      var dobDate = dob.getDate();

      //get the current date from the system
      var now = new Date();
      //extract the year, month, and date from current date
      var currentYear = now.getYear();
      var currentMonth = now.getMonth();
      var currentDate = now.getDate();

      //declare a variable to collect the age in year, month, and days
      var age = {};
      var ageString = "";

      //get years
      yearAge = currentYear - dobYear;

      //get months
      if (currentMonth >= dobMonth)
        //get months when current month is greater
        var monthAge = currentMonth - dobMonth;
      else {
        yearAge--;
        var monthAge = 12 + currentMonth - dobMonth;
      }

      //get days
      if (currentDate >= dobDate)
        //get days when the current date is greater
        var dateAge = currentDate - dobDate;
      else {
        monthAge--;
        var dateAge = 31 + currentDate - dobDate;

        if (monthAge < 0) {
          monthAge = 11;
          yearAge--;
        }
      }
      //group the age in a single variable
      age = {
        years: yearAge,
        months: monthAge,
        days: dateAge
      };

      if ((age.years > 0) && (age.months > 0) && (age.days > 0))
        // ageString = age.years + " Tahun, " + age.months + " Bulan, and " + age.days + " days old.";
        ageString = age.years + " Tahun " + age.months + " Bulan";
      else if ((age.years == 0) && (age.months == 0) && (age.days > 0))
        ageString = "Umur " + age.days + " Hari";
      //when current month and date is same as birth date and month
      else if ((age.years > 0) && (age.months == 0) && (age.days == 0))
        ageString = age.years + " Tahun";
      else if ((age.years > 0) && (age.months > 0) && (age.days == 0))
        ageString = age.years + " Tahun " + age.months + " Bulan ";
      else if ((age.years == 0) && (age.months > 0) && (age.days > 0))
        ageString = age.months + " Bulan " + age.days + " Hari";
      else if ((age.years > 0) && (age.months == 0) && (age.days > 0))
        ageString = age.years + " Tahun " + age.days + " Hari";
      else if ((age.years == 0) && (age.months > 0) && (age.days == 0))
        ageString = age.months + " Bulan";
      //when current date is same as dob(date of birth)
      else ageString = "Welcome to Earth!, It's first day on Earth!";

      //display the calculated age
      return document.getElementById("agesAnak2").value = ageString;

    }
  }

  function umurAnak3() {
    //collect input from HTML form and convert into date format
    var userinput = document.getElementById("dobAnak3").value;
    var dob = new Date(userinput);

    //check user provide input or not
    if (userinput == null || userinput == '') {
      document.getElementById("message").innerHTML = "**Choose a date please!";
      return false;
    }

    //execute if the user entered a date 
    else {
      //extract the year, month, and date from user date input
      var dobYear = dob.getYear();
      var dobMonth = dob.getMonth();
      var dobDate = dob.getDate();

      //get the current date from the system
      var now = new Date();
      //extract the year, month, and date from current date
      var currentYear = now.getYear();
      var currentMonth = now.getMonth();
      var currentDate = now.getDate();

      //declare a variable to collect the age in year, month, and days
      var age = {};
      var ageString = "";

      //get years
      yearAge = currentYear - dobYear;

      //get months
      if (currentMonth >= dobMonth)
        //get months when current month is greater
        var monthAge = currentMonth - dobMonth;
      else {
        yearAge--;
        var monthAge = 12 + currentMonth - dobMonth;
      }

      //get days
      if (currentDate >= dobDate)
        //get days when the current date is greater
        var dateAge = currentDate - dobDate;
      else {
        monthAge--;
        var dateAge = 31 + currentDate - dobDate;

        if (monthAge < 0) {
          monthAge = 11;
          yearAge--;
        }
      }
      //group the age in a single variable
      age = {
        years: yearAge,
        months: monthAge,
        days: dateAge
      };

      if ((age.years > 0) && (age.months > 0) && (age.days > 0))
        // ageString = age.years + " Tahun, " + age.months + " Bulan, and " + age.days + " days old.";
        ageString = age.years + " Tahun " + age.months + " Bulan";
      else if ((age.years == 0) && (age.months == 0) && (age.days > 0))
        ageString = "Umur " + age.days + " Hari";
      //when current month and date is same as birth date and month
      else if ((age.years > 0) && (age.months == 0) && (age.days == 0))
        ageString = age.years + " Tahun";
      else if ((age.years > 0) && (age.months > 0) && (age.days == 0))
        ageString = age.years + " Tahun " + age.months + " Bulan ";
      else if ((age.years == 0) && (age.months > 0) && (age.days > 0))
        ageString = age.months + " Bulan " + age.days + " Hari";
      else if ((age.years > 0) && (age.months == 0) && (age.days > 0))
        ageString = age.years + " Tahun " + age.days + " Hari";
      else if ((age.years == 0) && (age.months > 0) && (age.days == 0))
        ageString = age.months + " Bulan";
      //when current date is same as dob(date of birth)
      else ageString = "Welcome to Earth!, It's first day on Earth!";

      //display the calculated age
      return document.getElementById("agesAnak3").value = ageString;

    }
  }

  function GetDataOperator() {
    $('.loding').show();
    $.ajax({
      type: "GET",
      url: "<?= site_url('transaksi/tb_operator') ?>",
      cache: false,
      beforeSend: function() {
        $('#data_operator').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
      },
      success: function(msg) {
        $("#data_operator").html(msg);
      }
    });
  }

  function GetDataOperatorEksternal() {
    $('.loding').show();
    $.ajax({
      type: "GET",
      url: "<?= site_url('transaksi/tb_operator_eksternal') ?>",
      cache: false,
      beforeSend: function() {
        $('#data_operator').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
      },
      success: function(msg) {
        $("#data_operator").html(msg);
      }
    });
  }

  function GetDataOperatorPHL() {
    $('.loding').show();
    $.ajax({
      type: "GET",
      url: "<?= site_url('transaksi/tb_operator_phl') ?>",
      cache: false,
      beforeSend: function() {
        $('#data_operator').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
      },
      success: function(msg) {
        $("#data_operator").html(msg);
      }
    });
  }

  function GetDataOffice() {
    $.ajax({
      type: "GET",
      url: "<?= site_url('transaksi/tb_office') ?>",
      cache: false,
      beforeSend: function() {
        $('#data_office').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
      },
      success: function(msg) {
        $("#data_office").html(msg);
      }
    });
  }


  function GetDataLapangan() {
    $.ajax({
      type: "GET",
      url: "<?= site_url('transaksi/tb_lapangan') ?>",
      cache: false,
      beforeSend: function() {
        $('#data_lapangan').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
      },
      success: function(msg) {
        $("#data_lapangan").html(msg);
      }
    });
  }

  function GetDataMasaKerjaKurang3Bulan() {
    $.ajax({
      type: "GET",
      url: "<?= site_url('transaksi/tb_masakerjakurang3bulan') ?>",
      cache: false,
      beforeSend: function() {
        $('#data_masakerjakurang3bulan').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
      },
      success: function(msg) {
        $("#data_masakerjakurang3bulan").html(msg);
      }
    });
  }


  function GetPegawaiMengundurkanDiri() {
    $.ajax({
      type: "GET",
      url: "<?= site_url('transaksi/tb_pegawaimengundurkandiri') ?>",
      cache: false,
      beforeSend: function() {
        $('#data_pegawaimengundurkandiri').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
      },
      success: function(msg) {
        $("#data_pegawaimengundurkandiri").html(msg);
      }
    });
  }

  function GetPegawaiBom() {
    $.ajax({
      type: "GET",
      url: "<?= site_url('transaksi/tb_pegawaibom') ?>",
      cache: false,
      beforeSend: function() {
        $('#data_pegawaibom').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
      },
      success: function(msg) {
        $("#data_pegawaibom").html(msg);
      }
    });
  }

  function CekNamaPegawai() {
    var cNama = $('#cPinFinger').val();
    $.ajax({
      type: "POST",
      url: "<?= base_url() ?>transaksi/cek_nama_pegawai/" + cNama,
      cache: false,
      beforeSend: function() {
        $('#tb_pelanggaran').html("Cek Data Ke Sistem .. ");
      },
      success: function(msg) {
        $("#tb_pelanggaran").html(msg);
      }
    });
  }
</script>