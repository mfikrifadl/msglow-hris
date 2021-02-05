  <!-- begin:: Content -->
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

      <!--konten halaman ini bisa isi disini mulai dari <div class="row"> pada setiap widgetnya-->
      <div class="row">
          <div class="col-12">
              <div class="kt-portlet">
                  <div class="kt-portlet__head kt-portlet__head--lg">
                      <div class="kt-portlet__head-label">
                          <span class="kt-portlet__head-icon">
                              <i class="kt-font-brand flaticon2-line-chart"></i>
                          </span>
                          <h3 class="kt-portlet__head-title">
                              Data Semua Wawancara
                          </h3>
                      </div>
                  </div>

                  <div class="kt-portlet__body">
                      <table class="table table-striped table-bordered" id="DataTable">
                          <thead>
                              <tr>
                                  <td>No</td>
                                  <td>Kode Wawancara</td>
                                  <td>Tanggal Wawancara</td>
                                  <td>Data Pelamar</td>
                                  <td>Tahap Test</td>
                                  <td>Status Test</td>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 0;
                                foreach ($row as $key => $vaArea) { ?>
                                  <tr>
                                      <td><?= ++$no; ?></td>
                                      <td>
                                          <?= $vaArea['kode_wawancara'] ?>
                                      </td>
                                      <td>
                                          <?= $vaArea['tanggal_wawancara'] ?>
                                      </td>
                                      <td>
                                          <b> Nama : </b> <?= ($vaArea['nama']) ?> <br />
                                          <b> No. Hp : </b> <?= ($vaArea['nomor_telepon']) ?> <br />
                                          <b> Email : </b> <?= ($vaArea['email']) ?> <br />
                                          <b> Posisi : </b> <?= ($vaArea['divisi']) ?>
                                      </td>
                                      <td>
                                          <?php
                                            if ($vaArea['status'] == 'Menjadi Pegawai') {
                                                $cLabel = 'success';
                                            } else if ($vaArea['status'] == 'tidaklolos') {
                                                $cLabel = 'danger';
                                            } else if ($vaArea['status'] == 'on review') {
                                                $cLabel = 'warning';
                                            } else  $cLabel = 'info';
                                            ?>
                                          <span class="kt-badge kt-badge--inline kt-badge--pill kt-badge--<?= $cLabel ?>">
                                              <?= $vaArea['tahap_r'] ?>
                                          </span>
                                          <!-- <label class="label label-<?= $cLabel ?>"><?= ($vaArea['status']) ?></label> -->

                                      </td>
                                      <td>
                                          <?php

                                            $status_test = "";
                                            $cLabel = "";

                                            if ($vaArea['status'] == 'Menjadi Pegawai') {
                                                $cLabel = 'success';
                                            } else if ($vaArea['status'] == 'on review') {
                                                $cLabel = 'warning';
                                            } elseif($vaArea['status'] == 'tidaklolos'){
                                                $cLabel = 'danger';
                                            }else  $cLabel = 'info';

                                            $status_test = $vaArea['status'];
                                            ?>
                                          <span class="kt-badge kt-badge--inline kt-badge--pill kt-badge--<?= $cLabel ?>">
                                              <?= $vaArea['status'] ?>
                                          </span>
                                          <?php

                                            // if ($vaArea['tahap_r'] == "Test Administrasi") {

                                            //     if ($vaArea['administrasi'] == 'lolos') {
                                            //         $cLabel = 'success';
                                            //     } else if ($vaArea['administrasi'] == 'tidaklolos') {
                                            //         $cLabel = 'danger';
                                            //     } else  $cLabel = 'info';

                                            //     $status_test = $vaArea['administrasi'];
                                            // } elseif ($vaArea['tahap_r'] == "Wawancara HR") {

                                            //     if ($vaArea['wawancara_hr'] == 'lolos') {
                                            //         $cLabel = 'success';
                                            //     } else if ($vaArea['wawancara_hr'] == 'tidaklolos') {
                                            //         $cLabel = 'danger';
                                            //     } else  $cLabel = 'info';

                                            //     $status_test = $vaArea['wawancara_hr'];
                                            // } elseif ($vaArea['tahap_r'] == "Interview User 1") {

                                            //     if ($vaArea['interview_user_1'] == 'lolos') {
                                            //         $cLabel = 'success';
                                            //     } else if ($vaArea['interview_user_1'] == 'tidaklolos') {
                                            //         $cLabel = 'danger';
                                            //     } else  $cLabel = 'info';

                                            //     $status_test = $vaArea['interview_user_1'];
                                            // } elseif ($vaArea['tahap_r'] == "Tes Kesehatan") {

                                            //     if ($vaArea['tes_kesehatan_phl'] == 'lolos') {
                                            //         $cLabel = 'success';
                                            //     } else if ($vaArea['tes_kesehatan_phl'] == 'tidaklolos') {
                                            //         $cLabel = 'danger';
                                            //     } else  $cLabel = 'info';

                                            //     $status_test = $vaArea['tes_kesehatan_phl'];
                                            // }

                                            ?>
                                          <!-- <span class="kt-badge kt-badge--inline kt-badge--pill kt-badge--<?= $cLabel ?>">
                                              <?= $status_test ?>
                                          </span> -->
                                      </td>
                                  </tr>
                              <?php } ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>

      <div class="row">
          <div class="col-12">
              <div class="kt-portlet kt-portlet--mobile">
                  <div class="kt-portlet__head kt-portlet__head--lg">
                      <div class="kt-portlet__head-label">
                          <span class="kt-portlet__head-icon">
                              <i class="kt-font-brand flaticon2-line-chart"></i>
                          </span>
                          <h3 class="kt-portlet__head-title">
                              Data Semua Tes
                          </h3>
                      </div>
                      <div class="kt-portlet__head-toolbar">

                      </div>
                  </div>
                  <div class="kt-portlet__body">
                      <table class="table table-striped table-bordered" id="DataTableTwo">
                          <thead>
                              <tr>
                                  <td>No</td>
                                  <td>Kode Wawancara</td>
                                  <td>Data Pelamar</td>
                                  <td>Nilai Tes</td>
                                  <td>Tahap Test</td>
                                  <td>Status Test</td>
                                  <td>Keterangan</td>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 0;
                                foreach ($nilai as $key => $vaArea2) {
                                    if ($vaArea2['is_delete'] == 1) {
                                    } else {
                                ?>

                                      <tr>
                                          <?php
                                            if ($vaArea2['total_nilai'] == 0 || $vaArea2['total_nilai'] == 0 || empty($vaArea2['total_nilai'])) {
                                            } else {
                                            ?>
                                              <td><?= ++$no; ?></td>
                                              <td>
                                                  <?= $vaArea2['kode_wawancara'] ?>
                                              </td>
                                              <td>
                                                  <b> Nama : </b> <?= ($vaArea['nama']) ?> <br />
                                                  <b> No. Hp : </b> <?= ($vaArea['nomor_telepon']) ?> <br />
                                                  <b> Email : </b> <?= ($vaArea['email']) ?> <br />
                                                  <b> Posisi : </b> <?= ($vaArea['divisi']) ?>
                                              </td>
                                              <td>
                                                  <?= $vaArea2['total_nilai'] ?>
                                              </td>
                                              <td>
                                                  <?php
                                                    if ($vaArea2['status'] == 'lolos') {
                                                        $cLabel = 'success';
                                                    } else if ($vaArea2['status'] == 'tidaklolos') {
                                                        $cLabel = 'danger';
                                                    } else {
                                                        $cLabel = 'info';
                                                    }
                                                    ?>
                                                  <span class="kt-badge kt-badge--inline kt-badge--pill kt-badge--<?= $cLabel ?>">
                                                      <?= $vaArea['tahap_r'] ?>
                                                  </span>
                                              </td>
                                              <td><?php
                                                    if ($vaArea['status'] == 'Menjadi Pegawai') {
                                                        $cLabel = 'success';
                                                    } else if ($vaArea['status'] == 'on review') {
                                                        $cLabel = 'warning';
                                                    } else  $cLabel = 'info';
                                                    ?>
                                                  <span class="kt-badge kt-badge--inline kt-badge--pill kt-badge--<?= $cLabel ?>">
                                                      <?= $vaArea['status'] ?>
                                                  </span>
                                              </td>
                                              <td>
                                                  <span class="kt-badge kt-badge--inline kt-badge--pill ">
                                                      <?= $vaArea['alasan_tidak_lolos'] ?>
                                                  </span>
                                              </td>
                                      </tr>

                              <?php
                                            }
                                        }
                                ?>
                          <?php } ?>
                          </tbody>
                      </table>
                  </div>

                  <!-- end:: Content -->
              </div>
          </div>
      </div>
  </div>

  <!-- end:: Content -->