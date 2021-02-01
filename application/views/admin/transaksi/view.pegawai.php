<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
  <div class="row">
    <div class="col-12">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
        <li class="breadcrumb-item"><?= $menu ?></li>
        <li class="breadcrumb-item active"><?= $file ?></li>
      </ul>
    </div>
  </div>
  <?php
  function age($tgl){
    $bday = new Datetime($tgl);
    $today = new Datetime(date('y-m-d'));
    $diff = $today->diff($bday);
    $umur = $diff->y . " Tahun " . $diff->m . " Bulan";

    return $umur;
  }
  ?>

  <?php foreach ($view as $key => $vaView) { ?>
    <div class="row">
      <div class="col-4">
        <div class="accordion accordion-solid accordion-toggle-svg" id="accordionExample8">
          <div class="card">
            <div class="card-header" id="headingOne8">
              <div class="card-title" data-toggle="collapse" data-target="#datakerjapegawai" aria-expanded="true" aria-controls="collapseOne8">
                Data Kerja
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                    <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                  </g>
                </svg>
              </div>
            </div>
            <div id="datakerjapegawai" class="collapse show" aria-labelledby="headingOne8" data-parent="#accordionExample8">
              <div class="card-body">
                <div class="kt-portlet__body">
                  <div class="form-group">
                    <label><b>Area Kerja:</b></label>
                    <p class="form-control-static"><?= (!empty($vaView['Area'])) ? $vaView['Area'] : "-" ?></p>
                  </div>
                  <div class="form-group">
                    <label><b>Golongan Kerja:</b></label>
                    <p class="form-control-static"><?= (!empty($vaView['Kerja'])) ? $vaView['Kerja'] : "-" ?></p>
                  </div>
                  <div class="form-group">
                    <label><b>Status Kerja:</b></label>
                    <p class="form-control-static"><?= (!empty($vaView['Status'])) ? $vaView['Status'] : "-" ?></p>
                  </div>
                  <div class="form-group">
                    <label><b>Office:</b></label>
                    <p class="form-control-static"><?= (!empty($vaView['OutletFix'])) ? $vaView['OutletFix'] : "-" ?></p>
                  </div>
                  <div class="form-group">
                    <label><b>Tanggal Masuk Kerja:</b></label>
                    <p class="form-control-static"><?= String2Date($vaView['tanggal_masuk_kerja']) ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-4">
        <div class="accordion accordion-solid accordion-toggle-svg" id="accordionExample8">
          <div class="card">
            <div class="card-header" id="headingOne8">
              <div class="card-title" data-toggle="collapse" data-target="#datagaji" aria-expanded="true" aria-controls="collapseOne8">
                Data Rekening
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                    <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                  </g>
                </svg>
              </div>
            </div>
            <div id="datagaji" class="collapse show" aria-labelledby="headingOne8" data-parent="#accordionExample8">
              <div class="card-body">
                <div class="kt-portlet__body">
                  <div class="form-group">
                    <label><b>Pembayaran Gaji:</b></label>
                    <p class="form-control-static"><?= (!empty($vaView['Area'])) ? $vaView['Area'] : "-" ?></p>
                  </div>
                  <div class="form-group">
                    <label><b>Cabang Bank:</b></label>
                    <p class="form-control-static"><?= (!empty($vaView['cabang_bank'])) ? $vaView['cabang_bank'] : "-" ?></p>
                  </div>
                  <div class="form-group">
                    <label><b>Nomor Rekening:</b></label>
                    <p class="form-control-static"><?= (!empty($vaView['no_rekening'])) ? $vaView['no_rekening'] : "-" ?></p>
                  </div>
                  <div class="form-group">
                    <label><b>Atas Nama:</b></label>
                    <p class="form-control-static"><?= (!empty($vaView['atas_nama'])) ? $vaView['atas_nama'] : "-" ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-4">
        <div class="accordion accordion-solid accordion-toggle-svg" id="accordionExample8">
          <div class="card">
            <div class="card-header" id="headingOne8">
              <div class="card-title" data-toggle="collapse" data-target="#dataasuransi" aria-expanded="true" aria-controls="collapseOne8">
                Data Asuransi
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                    <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                  </g>
                </svg>
              </div>
            </div>
            <div id="dataasuransi" class="collapse show" aria-labelledby="headingOne8" data-parent="#accordionExample8">
              <div class="card-body">
                <div class="kt-portlet__body">
                  <div class="form-group">
                    <label><b>No. NPWP:</b></label>
                    <p class="form-control-static"><?= (!empty($vaView['no_npwp'])) ? $vaView['no_npwp'] : "-" ?></p>
                  </div>
                  <div class="form-group">
                    <label><b>No. BPJS KTK:</b></label>
                    <p class="form-control-static"><?= (!empty($vaView['no_bpjs_ktk'])) ? $vaView['no_bpjs_ktk'] : "-" ?></p>
                  </div>
                  <div class="form-group">
                    <label><b>No. BPJS Kes:</b></label>
                    <p class="form-control-static"><?= (!empty($vaView['no_bpjs_kes'])) ? $vaView['no_bpjs_kes'] : "-" ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><br />

    <div class="row">
      <div class="col-6">
        <div class="accordion accordion-solid accordion-toggle-svg" id="accordionExample8">
          <div class="card">
            <div class="card-header" id="headingOne8">
              <div class="card-title" data-toggle="collapse" data-target="#datapribadi" aria-expanded="true" aria-controls="collapseOne8">
                Data Pribadi
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                    <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                  </g>
                </svg>
              </div>
            </div>
            <div id="datapribadi" class="collapse show" aria-labelledby="headingOne8" data-parent="#accordionExample8">
              <div class="card-body">
                <div class="kt-portlet__body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label><b>NIK:</b></label>
                        <p class="form-control-static"><?= (!empty($vaView['nik'])) ? $vaView['nik'] : "-" ?></p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label><b>PIN Absensi:</b></label>
                        <p class="form-control-static"><?= (!empty($vaView['nama'])) ? $vaView['pin'] : "-" ?></p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label><b>Nama:</b></label>
                        <p class="form-control-static"><?= (!empty($vaView['nama'])) ? $vaView['nama'] : "-" ?></p>
                      </div>
                    </div>
                    <div class="col-4"></div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label><b>Tempat Lahir:</b></label>
                        <p class="form-control-static"><?= (!empty($vaView['tempat_lahir'])) ? $vaView['tempat_lahir'] : "-" ?></p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label><b>Tanggal Lahir:</b></label>
                        <p class="form-control-static"><?= (!empty($vaView['tanggal_lahir'])) ? $vaView['tanggal_lahir'] : "-" ?></p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label><b>Umur:</b></label>
                        <p class="form-control-static"><?= (!empty($vaView['tanggal_lahir'])) ? age($vaView['tanggal_lahir']) : "-" ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label><b>Agama:</b></label>
                        <p class="form-control-static"><?= (!empty($vaView['agama'])) ? $vaView['agama'] : "-" ?></p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label><b>Jenis Kelamin:</b></label>
                        <p class="form-control-static">
                          <?php
                          if ($vaView['jk'] == '1') {
                            $cKelamin = "Laki-Laki";
                          } else {
                            $cKelamin = "Perempuan";
                          }
                          ?>
                          <?= (!empty($cKelamin)) ? $cKelamin : "-" ?>
                        </p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label><b>Gol.Darah:</b></label>
                        <p class="form-control-static"><?= (!empty($vaView['agama'])) ? $vaView['agama'] : "-" ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label><b>Pendidikan:</b></label>
                        <p class="form-control-static"><?= (!empty($vaView['PendidikanPegawai'])) ? $vaView['PendidikanPegawai'] : "-" ?></p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label><b>Jurusan:</b></label>
                        <p class="form-control-static"><?= (!empty($vaView['jurusan'])) ? $vaView['jurusan'] : "-" ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label><b>Alamat Sekarang:</b></label>
                        <p class="form-control-static"><?= (!empty($vaView['alamat'])) ? $vaView['alamat'] : "-" ?></p>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label><b>Alamat Asal:</b></label>
                        <p class="form-control-static"><?= (!empty($vaView['alamat_asal'])) ? $vaView['alamat_asal'] : "-" ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="accordion accordion-solid accordion-toggle-svg" id="accordionExample8">
          <div class="card">
            <div class="card-header" id="headingOne8">
              <div class="card-title" data-toggle="collapse" data-target="#datakontak" aria-expanded="true" aria-controls="collapseOne8">
                Data Kontak
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                    <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                  </g>
                </svg>
              </div>
            </div>
            <div id="datakontak" class="collapse show" aria-labelledby="headingOne8" data-parent="#accordionExample8">
              <div class="card-body">
                <div class="kt-portlet__body">
                  <div class="form-group">
                    <label><b>Nomor KTP:</b></label>
                    <p class="form-control-static"><?= (!empty($vaView['no_ktp'])) ? $vaView['no_ktp'] : "-" ?></p>
                  </div>
                  <div class="form-group">
                    <label><b>Email:</b></label>
                    <p class="form-control-static"><?= (!empty($vaView['email'])) ? $vaView['email'] : "-" ?></p>
                  </div>
                  <div class="form-group">
                    <label><b>Handphone:</b></label>
                    <p class="form-control-static"><?= (!empty($vaView['handphone'])) ? $vaView['handphone'] : "-" ?></p>
                  </div>
                  <div class="form-group">
                    <label><b>Foto:</b></label><br />
                    <?php if ($vaView['foto'] == '') { ?>
                      <img src="<?= base_url() ?>upload/default.gif" height="100px">
                    <?php } else { ?>
                      <img src="<?= base_url() . $vaView['foto'] ?>" height="100px">
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><br />

    <div class="row">
      <div class="col-12">
        <div class="accordion accordion-solid accordion-toggle-svg" id="accordionExample8">
          <div class="card">
            <div class="card-header" id="headingOne8">
              <div class="card-title" data-toggle="collapse" data-target="#datakeluarga" aria-expanded="true" aria-controls="collapseOne8">
                Data Keluarga
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                    <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                  </g>
                </svg>
              </div>
            </div>
            <div id="datakeluarga" class="collapse show" aria-labelledby="headingOne8" data-parent="#accordionExample8">
              <div class="card-body">
                <div class="kt-portlet__body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label><b>Status Perkawinan:</b></label>
                        <p class="form-control-static"><?= $vaView['status_kawin'] == 0 ? "Menikah" : "Belum Menikah" ?></p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label><b>Nama Istri/Suami:</b></label>
                        <p class="form-control-static"><?= (!empty($vaView['istri_suami'])) ? $vaView['istri_suami'] : "-" ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label><b>Tgl Lahir Istri/Suami:</b></label>
                        <p class="form-control-static"><?= (!empty($vaView['tgl_lahir_istri'])) ? $vaView['tgl_lahir_istri'] : "-" ?></p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label><b>Umur:</b></label>
                        <p class="form-control-static"><?= (!empty($vaView['tgl_lahir_istri'])) ? age($vaView['tgl_lahir_istri']) : "-" ?></p>
                      </div>
                    </div>
                  </div>
                  <hr style="margin-top: 0.5rem;margin-bottom: 0.5rem;" />
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label><b>Nama Anak Ke-1:</b></label>
                        <p class="form-control-static"><?= (!empty($vaView['anak_1'])) ? $vaView['anak_1'] : "-" ?></p>
                      </div>
                      <div class="form-group">
                        <label><b>Nama Anak Ke-2:</b></label>
                        <p class="form-control-static"><?= (!empty($vaView['anak_2'])) ? $vaView['anak_2'] : "-" ?></p>
                      </div>
                      <div class="form-group">
                        <label><b>Nama Anak Ke-3:</b></label>
                        <p class="form-control-static"><?= (!empty($vaView['anak_3'])) ? $vaView['anak_3'] : "-" ?></p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label><b>Tgl Lahir Anak Ke-1:</b></label>
                        <p class="form-control-static"><?= $vaView['tgl_lahir_anak_1'] != '0000-00-00' ? $vaView['tgl_lahir_anak_1'] : "-" ?></p>
                      </div>
                      <div class="form-group">
                        <label><b>Tgl Lahir Anak Ke-2:</b></label>
                        <p class="form-control-static"><?= $vaView['tgl_lahir_anak_2'] != '0000-00-00' ? $vaView['tgl_lahir_anak_2'] : "-" ?></p>
                      </div>
                      <div class="form-group">
                        <label><b>Tgl Lahir Anak Ke-3:</b></label>
                        <p class="form-control-static"><?= $vaView['tgl_lahir_anak_3'] != '0000-00-00' ? $vaView['tgl_lahir_anak_3'] : "-" ?></p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label><b>Umur Anak Ke-1:</b></label>
                        <p class="form-control-static"><?= $vaView['tgl_lahir_anak_1'] != '0000-00-00' ? age($vaView['tgl_lahir_anak_1']) : "-" ?></p>
                      </div>
                      <div class="form-group">
                        <label><b>Umur Anak Ke-2:</b></label>
                        <p class="form-control-static"><?= $vaView['tgl_lahir_anak_2'] != '0000-00-00' ? age($vaView['tgl_lahir_anak_2']) : "-" ?></p>
                      </div>
                      <div class="form-group">
                        <label><b>Umur Anak Ke-3:</b></label>
                        <p class="form-control-static"><?= $vaView['tgl_lahir_anak_3'] != '0000-00-00' ? age($vaView['tgl_lahir_anak_3']) : "-" ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><br />

    <div class="row">
      <div class="col-6">
        <div class="accordion accordion-solid accordion-toggle-svg" id="accordionExample8">
          <div class="card">
            <div class="card-header" id="headingOne8">
              <div class="card-title" data-toggle="collapse" data-target="#panggilankerja" aria-expanded="true" aria-controls="collapseOne8">
                Panggilan Kerja
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                    <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                  </g>
                </svg>
              </div>
            </div>
            <div id="panggilankerja" class="collapse show" aria-labelledby="headingOne8" data-parent="#accordionExample8">
              <div class="card-body">
                <div class="kt-portlet__body">
                  <table class="table table-striped table-bordered DataTableEdit">
                    <thead>
                      <tr>
                        <td>Tanggal</td>
                        <td>Nomor Surat</td>
                        <td>Act</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $No = 0;
                      foreach ($panggilan as $key => $vaPanggilan) { ?>
                        <tr>
                          <td><?= String2Date($vaPanggilan['tgl']) ?></td>
                          <td><?= $vaPanggilan['nomor_surat'] ?></td>
                          <td><a class="btn-link" title="View Data" target="_blank" href="<?= site_url('laporan/lp_panggilan/' . $vaPanggilan['id_panggilan'] . '') ?>">
                              <i class="fa fa-print"></i>
                            </a></td>
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
      <div class="col-6">
        <div class="accordion accordion-solid accordion-toggle-svg" id="accordionExample8">
          <div class="card">
            <div class="card-header" id="headingOne8">
              <div class="card-title" data-toggle="collapse" data-target="#datapernyataan" aria-expanded="true" aria-controls="collapseOne8">
                Data Pernyataan
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                    <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                  </g>
                </svg>
              </div>
            </div>
            <div id="datapernyataan" class="collapse show" aria-labelledby="headingOne8" data-parent="#accordionExample8">
              <div class="card-body">
                <div class="kt-portlet__body">
                  <table class="table table-striped table-bordered DataTableEdit">
                    <thead>
                      <tr>
                        <td>Tanggal</td>
                        <td>Nomor Surat</td>
                        <td>Act</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $No = 0;
                      foreach ($pernyataan as $key => $vaPernyataan) { ?>
                        <tr>
                          <td><?= String2Date($vaPernyataan['tgl']) ?></td>
                          <td><?= $vaPernyataan['nomor_surat'] ?></td>
                          <td><a class="btn-link" title="View Data" target="_blank" href="<?= site_url('laporan/lp_pernyataan/' . $vaPernyataan['id_pernyataan'] . '') ?>">
                              <i class="fa fa-print"></i>
                            </a></td>
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
    </div><br />

    <div class="row">
      <div class="col-6">
        <div class="accordion accordion-solid accordion-toggle-svg" id="accordionExample8">
          <div class="card">
            <div class="card-header" id="headingOne8">
              <div class="card-title" data-toggle="collapse" data-target="#suratpernyataansp1sp2" aria-expanded="true" aria-controls="collapseOne8">
                Surat Pernyataan SP1 & SP2
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                    <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                  </g>
                </svg>
              </div>
            </div>
            <div id="suratpernyataansp1sp2" class="collapse show" aria-labelledby="headingOne8" data-parent="#accordionExample8">
              <div class="card-body">
                <div class="kt-portlet__body">
                  <table class="table table-striped table-bordered DataTableEdit">
                    <thead>
                      <tr>
                        <td>Tanggal</td>
                        <td>Nomor Surat</td>
                        <td>Keterangan</td>
                        <td>Act</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $No = 0;
                      foreach ($peringatan as $key => $vaPeringatan) {
                        if ($vaPeringatan['id_kategori_surat'] == 3) {
                          $cOption = 1;
                        } else {
                          $cOption = 2;
                        }
                      ?>
                        <tr>
                          <td><?= String2Date($vaPeringatan['tanggal']) ?></td>
                          <td><?= $vaPeringatan['nomor_surat'] ?></td>
                          <td><?= $vaPeringatan['Kategori'] ?></td>
                          <td><a class="btn-link" title="View Data" target="_blank" href="<?= site_url('laporan/lp_sp/' . $vaPeringatan['id'] . '/' . $cOption . '') ?>">
                              <i class="fa fa-print"></i>
                            </a></td>
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
      <div class="col-6">
        <div class="accordion accordion-solid accordion-toggle-svg" id="accordionExample8">
          <div class="card">
            <div class="card-header" id="headingOne8">
              <div class="card-title" data-toggle="collapse" data-target="#istirahat" aria-expanded="true" aria-controls="collapseOne8">
                Istirahat
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                    <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                  </g>
                </svg>
              </div>
            </div>
            <div id="istirahat" class="collapse show" aria-labelledby="headingOne8" data-parent="#accordionExample8">
              <div class="card-body">
                <div class="kt-portlet__body">
                  <table class="table table-striped table-bordered DataTableEdit">
                    <thead>
                      <tr>
                        <td>Tanggal</td>
                        <td>Nomor Surat</td>
                        <td>Act</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $No = 0;
                      foreach ($istirahat as $key => $vaIstirahat) {
                      ?>
                        <tr>
                          <td><?= String2Date($vaIstirahat['tgl']) ?></td>
                          <td><?= $vaIstirahat['nomor_surat'] ?></td>
                          <td><a class="btn-link" title="View Data" target="_blank" href="<?= site_url('laporan/lp_istirahat/' . $vaIstirahat['id_istirahat'] . '') ?>">
                              <i class="fa fa-print"></i>
                            </a></td>
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
    </div><br />

    <div class="row">
      <div class="col-6">
        <div class="accordion accordion-solid accordion-toggle-svg" id="accordionExample8">
          <div class="card">
            <div class="card-header" id="headingOne8">
              <div class="card-title" data-toggle="collapse" data-target="#skorsing" aria-expanded="true" aria-controls="collapseOne8">
                Skorsing
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                    <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                  </g>
                </svg>
              </div>
            </div>
            <div id="skorsing" class="collapse show" aria-labelledby="headingOne8" data-parent="#accordionExample8">
              <div class="card-body">
                <div class="kt-portlet__body">
                  <table class="table table-striped table-bordered DataTableEdit">
                    <thead>
                      <tr>
                        <td>Tanggal</td>
                        <td>Nomor Surat</td>
                        <td>Act</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $No = 0;
                      foreach ($skorsing as $key => $vaSkorsing) {
                      ?>
                        <tr>
                          <td><?= String2Date($vaSkorsing['tgl']) ?></td>
                          <td><?= $vaSkorsing['nomor_surat'] ?></td>
                          <td><a class="btn-link" title="View Data" target="_blank" href="<?= site_url('laporan/lp_skorsing/' . $vaSkorsing['id_skorsing'] . '') ?>">
                              <i class="fa fa-print"></i>
                            </a></td>
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
      <div class="col-6">
        <div class="accordion accordion-solid accordion-toggle-svg" id="accordionExample8">
          <div class="card">
            <div class="card-header" id="headingOne8">
              <div class="card-title" data-toggle="collapse" data-target="#mutasi" aria-expanded="true" aria-controls="collapseOne8">
                Mutasi
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                    <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                  </g>
                </svg>
              </div>
            </div>
            <div id="mutasi" class="collapse show" aria-labelledby="headingOne8" data-parent="#accordionExample8">
              <div class="card-body">
                <div class="kt-portlet__body">
                  <table class="table table-striped table-bordered DataTableEdit">
                    <thead>
                      <tr>
                        <td>Tanggal</td>
                        <td>Nomor Surat</td>
                        <td>Act</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $No = 0;
                      foreach ($mutasi as $key => $vaMutasi) {
                      ?>
                        <tr>
                          <td><?= String2Date($vaMutasi['tanggal']) ?></td>
                          <td><?= $vaMutasi['nomor_mutasi'] ?></td>
                          <td><a class="btn-link" title="View Data" target="_blank" href="<?= site_url('laporan/lp_mutasi/' . $vaMutasi['id_mutasi'] . '') ?>">
                              <i class="fa fa-print"></i>
                            </a></td>
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
    </div><br />

    <div class="row">
      <div class="col-6">
        <div class="accordion accordion-solid accordion-toggle-svg" id="accordionExample8">
          <div class="card">
            <div class="card-header" id="headingOne8">
              <div class="card-title" data-toggle="collapse" data-target="#tugas" aria-expanded="true" aria-controls="collapseOne8">
                Skorsing
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                    <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                  </g>
                </svg>
              </div>
            </div>
            <div id="tugas" class="collapse show" aria-labelledby="headingOne8" data-parent="#accordionExample8">
              <div class="card-body">
                <div class="kt-portlet__body">
                  <table class="table table-striped table-bordered DataTableEdit">
                    <thead>
                      <tr>
                        <td>Tanggal</td>
                        <td>Nomor Surat</td>
                        <td>Act</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $No = 0;
                      foreach ($tugas as $key => $vaTugas) {
                      ?>
                        <tr>
                          <td><?= String2Date($vaTugas['tgl']) ?></td>
                          <td><?= $vaTugas['nomor_surat'] ?></td>
                          <td><a class="btn-link" title="View Data" target="_blank" href="<?= site_url('laporan/lp_tugas/' . $vaTugas['id_tugas'] . '') ?>">
                              <i class="fa fa-print"></i>
                            </a></td>
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
      <div class="col-6">
        <div class="accordion accordion-solid accordion-toggle-svg" id="accordionExample8">
          <div class="card">
            <div class="card-header" id="headingOne8">
              <div class="card-title" data-toggle="collapse" data-target="#phk" aria-expanded="true" aria-controls="collapseOne8">
                PHK
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                    <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                  </g>
                </svg>
              </div>
            </div>
            <div id="phk" class="collapse show" aria-labelledby="headingOne8" data-parent="#accordionExample8">
              <div class="card-body">
                <div class="kt-portlet__body">
                  <!--isi content disini-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><br />
</div>
<?php } ?>