<?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2 || $this->session->userdata('level') == 3) {
?>

  <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
      <!-- <div class="row">
      <div class="col-sm-12">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url() ?>">Selamat Datang Administrator</a></li>
        </ul>
      </div>
    </div> -->

      <!--konten halaman ini bisa isi disini mulai dari <div class="row"> pada setiap widgetnya-->

      <div class="kt-portlet">

        <div class="kt-portlet__head btn btn-danger">
          <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title text-light">
              Kontrak Akan Habis
            </h3>
          </div>
        </div>

        <div class="kt-portlet__body">
          <table class="table table-striped table-bordered" id="DataTable">
            <thead>
              <tr>
                <td>No</td>
                <td>NIK</td>
                <td>Nama</td>
                <td>Tgl Masuk Kerja</td>
                <td>Kontak Akan Habis</td>
                <td>Telp</td>
              </tr>
            </thead>
            <tbody>
              <?php $no = 0;
              foreach ($kontrak as $key => $vaArea) {
                if ($vaArea['alert_kontrak_selesai'] > 1 && $vaArea['alert_kontrak_selesai'] < 31) {
              ?>
                  <tr>
                    <td><?= ++$no; ?></td>
                    <td><?= $vaArea['nik'] ?></td>
                    <td><?= $vaArea['nama'] ?></td>
                    <td><?= $vaArea['tanggal_masuk_kerja'] ?></td>
                    <td>- <?= $vaArea['alert_kontrak_selesai'] ?> Hari</td>
                    <td><?= $vaArea['handphone'] ?></td>
                  </tr>
              <?php
                }
              } ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="kt-portlet">

        <div class="kt-portlet__head btn btn-danger">
          <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title text-light">
              Pegawai Ulang Tahun Hari Ini
            </h3>
          </div>
        </div>

        <div class="kt-portlet__body">
          <table class="table table-striped table-bordered" id="DataTable">
            <thead>
              <tr>
                <td>No</td>
                <td>NIK</td>
                <td>Nama</td>
                <td>Tgl Lahir</td>
                <td>Umur</td>
                <td>Telp</td>
              </tr>
            </thead>
            <tbody>
              <?php $no = 0;
              $this->output->delete_cache();
              foreach ($ultah as $key => $vaArea) {
                $age = date_diff(date_create($vaArea['tanggal_lahir']), date_create('now'))->y; ?>
                <tr>
                  <td><?= ++$no; ?></td>
                  <td><?= $vaArea['nik'] ?></td>
                  <td><?= $vaArea['nama'] ?></td>
                  <td><?= $vaArea['tanggal_lahir'] ?></td>
                  <td><?= $age ?></td>
                  <td><?= $vaArea['handphone'] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>



      <div class="kt-portlet">

        <div class="kt-portlet__head btn btn-primary">
          <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title text-light">
              Visualisasi Data Pegawai MS GLOW Malang
            </h3>
          </div>
        </div>

        <div class="kt-portlet__body">

          <div class="row">
            <div class="col-xl-6">

              <!--begin:: Widgets/Profit Share-->
              <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-widget14">
                  <div class="kt-widget14__header">
                    <h3 class="kt-widget14__title">
                      Klasifikasi Pegawai
                    </h3>
                    <span class="kt-widget14__desc">
                      Total Pegawai Ms Glow Malang
                    </span>
                  </div>
                  <div class="kt-widget14__content">

                    <div class="container-fluid">
                      <canvas id="myChart"></canvas>

                      <?php
                      //Inisialisasi nilai variabel awal
                      $jml_peg_kontrak = "";
                      $jml_peg_phl = "";
                      $jml_peg_eksternal = "";
                      $jml_pegawai = "";

                      foreach ($jml_pegawai_kontrak as $rowPegawaiKontrak) {
                        $jml_peg_kontrak = $rowPegawaiKontrak['jml_pegawai_kontrak'];
                      }

                      foreach ($jml_pegawai_phl as $rowPegawaiPhl) {
                        $jml_peg_phl = $rowPegawaiPhl['jml_pegawai_phl'];
                      }

                      foreach ($jml_pegawai_eksternal as $rowPegawaiEksternal) {
                        $jml_peg_eksternal = $rowPegawaiEksternal['jml_pegawai_eksternal'];
                      }

                      foreach ($tot_pegawai as $rowTotPegawai) {
                        $jml_pegawai = $rowTotPegawai['jml_pegawai'];
                      }

                      ?>

                      <div class="kt-widget14__legends">
                        <div class="kt-widget14__legend">

                          <span class="kt-widget14__bullet kt-bg-danger"></span>
                          <span class="kt-widget14__stats">
                            <?php
                            $hasil_peg_kontrak = $jml_peg_kontrak / $jml_pegawai * 100;
                            $hasil_peg_phl = $jml_peg_phl / $jml_pegawai * 100;
                            $hasil_peg_eksternal = $jml_peg_eksternal / $jml_pegawai * 100;
                            ?>
                            <?= round($hasil_peg_kontrak, 2) ?>% Pegawai Kontrak
                          </span>

                          <span class="kt-widget14__bullet kt-bg-brand"></span>
                          <span class="kt-widget14__stats">
                            <?= round($hasil_peg_eksternal, 2) ?>% Pegawai Eksternal
                          </span>

                          <span class="kt-widget14__bullet kt-bg-warning"></span>
                          <span class="kt-widget14__stats">
                            <?= round($hasil_peg_phl, 2) ?>% Pegawai PHL
                          </span>

                        </div>
                      </div>

                    </div>

                    <script>
                      var ctx = document.getElementById('myChart').getContext('2d');
                      var chart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'doughnut',
                        // The data for our dataset
                        data: {
                          labels: ['Pegawai Kontrak', 'Pegawai Eksternal', 'Pegawai PHL'],
                          datasets: [{
                            label: 'Pegawai MS GlOW Malang ',
                            data: [<?= $jml_peg_kontrak ?>, <?= $jml_peg_eksternal ?>, <?= $jml_peg_phl ?>],
                            backgroundColor: [
                              'rgb(255, 99, 132)',
                              'rgb(54, 162, 235)',
                              'rgb(255, 206, 86)',
                              'rgb(75, 192, 192)',
                              'rgb(153, 102, 255)',
                              'rgb(255, 159, 64)'
                            ],
                            borderColor: [
                              'rgb(255,99,132,1)',
                              'rgb(54, 162, 235)',
                              'rgb(255, 206, 86)',
                              'rgb(75, 192, 192)',
                              'rgb(153, 102, 255)',
                              'rgb(255, 159, 64)'
                            ],
                            borderWidth: 1
                          }]
                        },

                        // Configuration options go here
                        options: {
                          scales: {
                            
                          }
                        }
                      });
                    </script>


                  </div>
                </div>
              </div>

              <!--end:: Widgets/Profit Share-->
            </div>

            <div class="col-xl-6">

              <!--begin:: Widgets/Profit Share-->
              <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-widget14">
                  <div class="kt-widget14__header">
                    <h3 class="kt-widget14__title">
                      Klasifikasi Gender
                    </h3>
                    <span class="kt-widget14__desc">
                      Total Pegawai Pria / Wanita MS Glow Malang
                    </span>
                  </div>
                  <div class="kt-widget14__content">
                    <div class="container-fluid">
                      <canvas id="myChartGender"></canvas>

                      <div class="kt-widget14__legends">
                        <div class="kt-widget14__legend">
                          <?php

                          //Inisialisasi nilai variabel awal
                          $jml_peg_pria = "";
                          foreach ($jml_pegawai_pria as $rowPegawaiPria) {
                            $jml_peg_pria = $rowPegawaiPria['jml_pegawai_pria'];
                          }
                          $jml_peg_wanita = "";
                          foreach ($jml_pegawai_wanita as $rowPegawaiWanita) {
                            $jml_peg_wanita = $rowPegawaiWanita['jml_pegawai_wanita'];
                          }

                          $hasil_peg_pria = $jml_peg_pria / $jml_pegawai * 100;
                          $hasil_peg_wanita = $jml_peg_wanita / $jml_pegawai * 100;
                          ?>
                          <span class="kt-widget14__bullet kt-bg-danger"></span>
                          <span class="kt-widget14__stats">
                            <?= round($hasil_peg_pria, 2) ?>% Pegawai Pria
                          </span>

                          <span class="kt-widget14__bullet "></span>
                          <span class="kt-widget14__stats"></span>

                          <span class="kt-widget14__bullet kt-bg-brand"></span>
                          <span class="kt-widget14__stats">
                            <?= round($hasil_peg_wanita, 2) ?>% Pegawai Wanita
                          </span>

                        </div>
                      </div>

                    </div>

                    <script>
                      var ctx = document.getElementById('myChartGender').getContext('2d');
                      var chart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'pie',
                        // The data for our dataset
                        data: {
                          labels: ['Pegawai Pria', 'Pegawai Wanita'],
                          datasets: [{
                            label: 'Klasifikasi Pegawai Chart ',
                            data: [<?= $jml_peg_pria ?>, <?= $jml_peg_wanita ?>],
                            backgroundColor: [
                              'rgb(255, 99, 132)',
                              'rgb(54, 162, 235)',
                              'rgb(255, 206, 86)',
                              'rgb(75, 192, 192)',
                              'rgb(153, 102, 255)',
                              'rgb(255, 159, 64)'
                            ],
                            borderColor: [
                              'rgb(255,99,132)',
                              'rgb(54, 162, 235)',
                              'rgb(255, 206, 86)',
                              'rgb(75, 192, 192)',
                              'rgb(153, 102, 255)',
                              'rgb(255, 159, 64)'
                            ],
                            borderWidth: 1
                          }]
                        },

                        // Configuration options go here
                        options: {
                          scales: {
                            
                          }
                        }
                      });
                    </script>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6">

              <!--begin:: Widgets/Profit Share-->
              <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-widget14">
                  <div class="kt-widget14__header">
                    <h3 class="kt-widget14__title">
                      Klasifikasi Usia
                    </h3>
                    <span class="kt-widget14__desc">
                      Rentang Usia Pegawai MS GLOW Malang
                    </span>
                  </div>
                  <div class="kt-widget14__content">
                    <div class="container-fluid">
                      <canvas id="myChartUmur"></canvas>

                      <div class="kt-widget14__legends">
                        <div class="kt-widget14__legend">
                          <?php

                          //Inisialisasi nilai variabel awal
                          $jml_usia_under_20 = 0;
                          $jml_usia_antara_20_30 = 0;
                          $jml_usia_antara_31_40 = 0;
                          $jml_usia_antara_41_50 = 0;
                          $jml_usia_diatas_50 = 0;
                          foreach ($harlah as $rowPegawaiUsia) {
                            if (empty($rowPegawaiUsia['age'])) {
                            } else {
                              if ($rowPegawaiUsia['age'] < 20) {
                                ++$jml_usia_under_20;
                              } elseif ($rowPegawaiUsia['age'] >= 20 && $rowPegawaiUsia['age'] <= 30) {
                                ++$jml_usia_antara_20_30;
                              } elseif ($rowPegawaiUsia['age'] >= 31 && $rowPegawaiUsia['age'] <= 40) {
                                ++$jml_usia_antara_31_40;
                              } elseif ($rowPegawaiUsia['age'] >= 41 && $rowPegawaiUsia['age'] <= 50) {
                                ++$jml_usia_antara_41_50;
                              } elseif ($rowPegawaiUsia['age'] > 50) {
                                ++$jml_usia_diatas_50;
                              }
                            }
                          }

                          $hasil_under_20 = $jml_usia_under_20 / $jml_pegawai * 100;
                          $hasil_usia_antara_20_30 = $jml_usia_antara_20_30 / $jml_pegawai * 100;
                          $hasil_usia_antara_31_40 = $jml_usia_antara_31_40 / $jml_pegawai * 100;
                          $hasil_usia_antara_41_50 = $jml_usia_antara_41_50 / $jml_pegawai * 100;
                          $hasil_usia_diatas_50 = $jml_usia_diatas_50 / $jml_pegawai * 100;
                          ?>
                          <span class="kt-widget14__bullet kt-bg-danger"></span>
                          <span class="kt-widget14__stats">
                            <?= round($hasil_under_20, 2) ?>%
                          </span>

                          <span class="kt-widget14__bullet kt-bg-brand"></span>
                          <span class="kt-widget14__stats">
                            <?= round($hasil_usia_antara_20_30, 2) ?>%
                          </span>

                          <span class="kt-widget14__bullet kt-bg-warning"></span>
                          <span class="kt-widget14__stats">
                            <?= round($hasil_usia_antara_31_40, 2) ?>%
                          </span>

                          <span class="kt-widget14__bullet kt-bg-success"></span>
                          <span class="kt-widget14__stats">
                            <?= round($hasil_usia_antara_41_50, 2) ?>%
                          </span>

                          <span class="kt-widget14__bullet kt-bg-primary"></span>
                          <span class="kt-widget14__stats">
                            <?= round($hasil_usia_diatas_50, 2) ?>%
                          </span>

                        </div>
                      </div>

                    </div>

                    <script>
                      var ctx = document.getElementById('myChartUmur').getContext('2d');
                      var chart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'bar',
                        // The data for our dataset
                        data: {
                          labels: ['<20', '20-30', '31-40', '41-50', '>50'],
                          datasets: [{
                            label: 'Usia Pegawai MS GLOW Malang Chart ',
                            data: [<?= $jml_usia_under_20 ?>, <?= $jml_usia_antara_20_30 ?>, <?= $jml_usia_antara_31_40 ?>, <?= $jml_usia_antara_41_50 ?>, <?= $jml_usia_diatas_50 ?>],
                            backgroundColor: [
                              'rgb(255, 99, 132)',
                              'rgb(54, 162, 235)',
                              'rgb(255, 206, 86)',
                              'rgb(75, 192, 192)',
                              'rgb(153, 102, 255)',
                              'rgb(255, 159, 64)'
                            ],
                            borderColor: [
                              'rgb(255,99,132)',
                              'rgb(54, 162, 235)',
                              'rgb(255, 206, 86)',
                              'rgb(75, 192, 192)',
                              'rgb(153, 102, 255)',
                              'rgb(255, 159, 64)'
                            ],
                            borderWidth: 1
                          }]
                        },

                        // Configuration options go here
                        options: {
                          scales: {
                            yAxes: [{
                              ticks: {
                                beginAtZero: true
                              }
                            }]
                          }
                        }
                      });
                    </script>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6">

              <!--begin:: Widgets/Profit Share-->

              <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-widget14">
                  <div class="kt-widget14__header">
                    <h3 class="kt-widget14__title">
                      Klasifikasi Pegawai Overtime
                    </h3>
                    <span class="kt-widget14__desc">
                      Total Pegawai Overtime Harian
                    </span>
                  </div>
                  <div class="kt-widget14__content">
                    <div class="container-fluid">
                      <canvas id="myChartOvertime"></canvas>

                      <div class="kt-widget14__legends">
                        <div class="kt-widget14__legend">

                          <?php

                          //Inisialisasi nilai variabel awal
                          date_default_timezone_set('Asia/Jakarta');
                          //=================HARI SEKARANG =================
                          $tgl_min_1Hari = date('Y-m-d H:i:s', time() - (60 * 60 * 24));
                          $a_min_1Hari = explode(" ", $tgl_min_1Hari);
                          $tgl_kemarin = $a_min_1Hari[0];
                          //================================================              
                          //=================HARI -1 =======================
                          $tgl_min_2Hari = date('Y-m-d H:i:s', time() - (60 * 60 * 24 * 2));
                          $a_min_2Hari = explode(" ", $tgl_min_2Hari);
                          $tgl_kemarin_min2 = $a_min_2Hari[0];
                          //================================================
                          //=================HARI -2 =======================
                          $tgl_min_3Hari = date('Y-m-d H:i:s', time() - (60 * 60 * 24 * 3));
                          $a_min_3Hari = explode(" ", $tgl_min_3Hari);
                          $tgl_kemarin_min3 = $a_min_3Hari[0];
                          //================================================
                          //=================HARI -3 =======================
                          $tgl_min_4Hari = date('Y-m-d H:i:s', time() - (60 * 60 * 24 * 4));
                          $a_min_4Hari = explode(" ", $tgl_min_4Hari);
                          $tgl_kemarin_min4 = $a_min_4Hari[0];
                          //================================================
                          //=================HARI -4 =======================
                          $tgl_min_5Hari = date('Y-m-d H:i:s', time() - (60 * 60 * 24 * 5));
                          $a_min_5Hari = explode(" ", $tgl_min_5Hari);
                          $tgl_kemarin_min5 = $a_min_5Hari[0];
                          //================================================
                          //=================HARI -5 =======================
                          $tgl_min_6Hari = date('Y-m-d H:i:s', time() - (60 * 60 * 24 * 6));
                          $a_min_6Hari = explode(" ", $tgl_min_6Hari);
                          $tgl_kemarin_min6 = $a_min_6Hari[0];
                          //================================================



                          $tot_peg_lembur1 = 0;
                          $tot_peg_lembur2 = 0;
                          $tot_peg_lembur3 = 0;
                          $tot_peg_lembur4 = 0;
                          $tot_peg_lembur5 = 0;
                          $tot_peg_lembur6 = 0;

                          foreach ($log_absen as $rowLogAbsen) {
                            $jam_datang = new DateTime($rowLogAbsen['jam_datang']);
                            $jam_pulang = new DateTime($rowLogAbsen['jam_pulang']);

                            //Menghitung total jam lembur
                            $set_jam_lembur = "17:49:59";
                            $t_set_jam_lembur = new DateTime($set_jam_lembur);

                            $set_jam_pulang_default = "17:00:00";
                            $t_set_jam_pulang_default = new DateTime($set_jam_pulang_default);

                            $t_jam_pulang = "20:00:00";
                            $x_jam_pulang = new DateTime($t_jam_pulang);

                            if ($rowLogAbsen['tanggal'] == $tgl_kemarin) {
                              if ($jam_pulang > $t_set_jam_lembur) {
                                $hit_jam_lembur =  $t_set_jam_pulang_default->diff($jam_pulang);
                                $jumlah2 = $hit_jam_lembur->format('%H:%I:%S');
                                $tot_jam_lembur = (string)$jumlah2;

                                //echo $rowLogAbsen['tanggal'];

                                ++$tot_peg_lembur1;
                              } else {
                              }
                            } elseif ($rowLogAbsen['tanggal'] == $tgl_kemarin_min2) {
                              if ($jam_pulang > $t_set_jam_lembur) {
                                $hit_jam_lembur =  $t_set_jam_pulang_default->diff($jam_pulang);
                                $jumlah2 = $hit_jam_lembur->format('%H:%I:%S');
                                $tot_jam_lembur = (string)$jumlah2;

                                //echo $rowLogAbsen['tanggal'];

                                ++$tot_peg_lembur2;
                              } else {
                              }
                            } elseif ($rowLogAbsen['tanggal'] == $tgl_kemarin_min3) {
                              if ($jam_pulang > $t_set_jam_lembur) {
                                $hit_jam_lembur =  $t_set_jam_pulang_default->diff($jam_pulang);
                                $jumlah2 = $hit_jam_lembur->format('%H:%I:%S');
                                $tot_jam_lembur = (string)$jumlah2;

                                //echo $rowLogAbsen['tanggal'];

                                ++$tot_peg_lembur3;
                              } else {
                              }
                            } elseif ($rowLogAbsen['tanggal'] == $tgl_kemarin_min4) {
                              if ($jam_pulang > $t_set_jam_lembur) {
                                $hit_jam_lembur =  $t_set_jam_pulang_default->diff($jam_pulang);
                                $jumlah2 = $hit_jam_lembur->format('%H:%I:%S');
                                $tot_jam_lembur = (string)$jumlah2;

                                //echo $rowLogAbsen['tanggal'];

                                ++$tot_peg_lembur4;
                              } else {
                              }
                            } elseif ($rowLogAbsen['tanggal'] == $tgl_kemarin_min5) {
                              if ($jam_pulang > $t_set_jam_lembur) {
                                $hit_jam_lembur =  $t_set_jam_pulang_default->diff($jam_pulang);
                                $jumlah2 = $hit_jam_lembur->format('%H:%I:%S');
                                $tot_jam_lembur = (string)$jumlah2;

                                //echo $rowLogAbsen['tanggal'];

                                ++$tot_peg_lembur5;
                              } else {
                              }
                            } elseif ($rowLogAbsen['tanggal'] == $tgl_kemarin_min6) {
                              if ($jam_pulang > $t_set_jam_lembur) {
                                $hit_jam_lembur =  $t_set_jam_pulang_default->diff($jam_pulang);
                                $jumlah2 = $hit_jam_lembur->format('%H:%I:%S');
                                $tot_jam_lembur = (string)$jumlah2;

                                //echo $rowLogAbsen['tanggal'];

                                ++$tot_peg_lembur6;
                              } else {
                              }
                            }
                          }

                          // $hasil_peg_pria = $jml_peg_pria / $jml_pegawai * 100;
                          // $hasil_peg_wanita = $jml_peg_wanita / $jml_pegawai * 100;
                          ?>

                        </div>
                      </div>

                    </div>

                    <script>
                      var ctx = document.getElementById('myChartOvertime').getContext('2d');
                      var chart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'line',
                        // The data for our dataset
                        data: {
                          labels: ['<?= $tgl_kemarin_min6 ?>', '<?= $tgl_kemarin_min5 ?>', '<?= $tgl_kemarin_min4 ?>', '<?= $tgl_kemarin_min3 ?>', '<?= $tgl_kemarin_min2 ?>', '<?= $tgl_kemarin ?>'],
                          datasets: [{
                            label: 'Overtime Mingguan ',
                            data: ['<?= $tot_peg_lembur6 ?>', '<?= $tot_peg_lembur5 ?>', '<?= $tot_peg_lembur4 ?>', '<?= $tot_peg_lembur3 ?>', '<?= $tot_peg_lembur2 ?>', '<?= $tot_peg_lembur1 ?>'],
                            backgroundColor: [
                              'rgb(255, 99, 132)'
                            ],
                            borderColor: [
                              'rgb(255,99,132)',
                              'rgb(54, 162, 235)',
                              'rgb(255, 206, 86)',
                              'rgb(75, 192, 192)',
                              'rgb(153, 102, 255)',
                              'rgb(255, 159, 64)'
                            ],
                            borderWidth: 1
                          }]
                        },

                        // Configuration options go here
                        options: {
                          scales: {
                            yAxes: [{
                              ticks: {
                                beginAtZero: true
                              }
                            }]
                          }
                        }
                      });
                    </script>
                  </div>
                </div>
              </div>
            </div>

            <!--end:: row-->
          </div>


        </div>
        <!--end:: kartlet body-->

      </div>




    </div>
  </div>



  <!-- end:: Content -->


<?php } else if ($this->session->userdata('level') == 12) { ?>
  <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
      <!-- <div class="row">
      <div class="col-sm-12">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url() ?>">Selamat Datang Administrator</a></li>
        </ul>
      </div>
    </div> -->

      <!--konten halaman ini bisa isi disini mulai dari <div class="row"> pada setiap widgetnya-->
      <div class="kt-portlet">
        <div class="kt-portlet__body  kt-portlet__body--fit">
          <div class="row row-no-padding row-col-separator-lg">
            <div class="col-md-12 col-lg-6 col-xl-3">

              <!--begin::Total Profit-->
              <div class="kt-widget24">
                <div class="kt-widget24__details">
                  <div class="kt-widget24__info">
                    <h4 class="kt-widget24__title">
                      Total Pegawai
                    </h4>
                  </div>
                  <span class="kt-widget24__stats kt-font-brand">
                    190
                  </span>
                </div>
              </div>

              <!--end::Total Profit-->
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">

              <!--begin::New Feedbacks-->
              <div class="kt-widget24">
                <div class="kt-widget24__details">
                  <div class="kt-widget24__info">
                    <h4 class="kt-widget24__title">
                      Total Pegawai Kontrak
                    </h4>
                  </div>
                  <span class="kt-widget24__stats kt-font-warning">
                    130
                  </span>
                </div>
              </div>

              <!--end::New Feedbacks-->
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">

              <!--begin::New Orders-->
              <div class="kt-widget24">
                <div class="kt-widget24__details">
                  <div class="kt-widget24__info">
                    <h4 class="kt-widget24__title">
                      Total Pegawai Eksternal
                    </h4>
                  </div>
                  <span class="kt-widget24__stats kt-font-danger">
                    50
                  </span>
                </div>
              </div>

              <!--end::New Orders-->
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">

              <!--begin::New Users-->
              <div class="kt-widget24">
                <div class="kt-widget24__details">
                  <div class="kt-widget24__info">
                    <h4 class="kt-widget24__title">
                      Total PHL
                    </h4>
                  </div>
                  <span class="kt-widget24__stats kt-font-default">
                    20
                  </span>
                </div>
              </div>

              <!--end::New Users-->
            </div>
          </div>
        </div>
      </div>

      <div class="kt-portlet">
        <div class="kt-portlet__head btn btn-success">
          <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title text-light">
              Menu Ms Glow Kepegawaian
            </h3>
          </div>
        </div>

        <div class="kt-portlet__body">

          <div class="row">


            <!--Begin::Row-->
            <div class="row">
              <div class="col-xl-6 col-lg-6 order-lg-1 order-xl-1">

                <!--begin:: Widgets/Download Files-->
                <div class="kt-portlet kt-portlet--height-fluid kt-iconbox kt-iconbox--warning kt-iconbox--animate-slow">

                  <div class="kt-portlet__body">

                    <!--begin::k-widget4-->
                    <div class="kt-widget4">


                      <div class="kt-widget kt-widget--user-profile-3">
                        <div class="kt-widget__top">

                          <div class="kt-widget__media kt-hidden-">
                            <img src="<?= base_url() ?>assets2/media/users/recruitment.png" alt="image">
                          </div>

                          <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">

                          </div>
                          <div class="kt-widget__content">
                            <div class="kt-widget__head">
                              <div class="kt-widget__username">
                                RECRUITMENT
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="kt-widget__bottom">

                          <div class="row">
                            <div class="col-xl-6">

                              <div class="kt-widget__item">
                                <div class="kt-widget__icon">
                                  <i class="flaticon-network"></i>
                                </div>
                                <div class="kt-widget__details">
                                  <span class="kt-widget__title">
                                    <a style="color: #2786fb; font-size: 11px;" href="<?= site_url('recruitment/wawancara') ?>">
                                      Wawancara
                                    </a>
                                  </span>
                                </div>
                              </div>

                            </div>
                            <div class="col-xl-6">

                              <div class="kt-widget__item">
                                <div class="kt-widget__icon">
                                  <i class="flaticon-presentation-1"></i>
                                </div>
                                <div class="kt-widget__details">
                                  <span class="kt-widget__title">
                                    <a style="color: #2786fb; font-size: 11px;" href="<?= site_url('recruitment/tes_praktik') ?>">
                                      Tes Ketrampilan
                                    </a>
                                  </span>
                                </div>
                              </div>

                            </div>
                          </div>

                          <div class="row">
                            <div class="col-xl-6">

                              <div class="kt-widget__item">
                                <div class="kt-widget__icon">
                                  <i class="flaticon-medical"></i>
                                </div>
                                <div class="kt-widget__details">
                                  <span class="kt-widget__title">
                                    <a style="color: #2786fb; font-size: 11px;" href="<?= site_url('recruitment/monitoring_status') ?>">
                                      Monitoring Status
                                    </a>
                                  </span>
                                </div>
                              </div>

                            </div>
                            <div class="col-xl-6">

                              <div class="kt-widget__item">
                                <div class="kt-widget__icon">
                                  <i class="flaticon-trophy"></i>
                                </div>
                                <div class="kt-widget__details">
                                  <span class="kt-widget__title">
                                    <a style="color: #2786fb; font-size: 11px;" href="<?= site_url('recruitment/peserta_diterima') ?>">
                                      Peserta Diterima
                                    </a>
                                  </span>
                                </div>
                              </div>

                            </div>
                          </div>

                        </div>
                      </div>


                    </div>

                    <!--end::Widget 9-->
                  </div>
                </div>

                <!--end:: Widgets/Download Files-->
              </div>

              <div class="col-xl-6 col-lg-6 order-lg-1 order-xl-1">

                <!--begin:: Widgets/Download Files-->
                <div class="kt-portlet kt-portlet--height-fluid kt-iconbox kt-iconbox--danger kt-iconbox--animate-slow">

                  <div class="kt-portlet__body">

                    <!--begin::k-widget4-->
                    <div class="kt-widget4">


                      <div class="kt-widget kt-widget--user-profile-3">
                        <div class="kt-widget__top">

                          <div class="kt-widget__media kt-hidden-">
                            <img src="<?= base_url() ?>assets2/media/users/pegawai.png" alt="image">
                          </div>

                          <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">

                          </div>
                          <div class="kt-widget__content">
                            <div class="kt-widget__head">
                              <div class="kt-widget__username">
                                KEPEGAWAIAN
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="kt-widget__bottom">

                          <div class="row">
                            <div class="col-xl-6">

                              <div class="kt-widget__item">
                                <div class="kt-widget__icon">
                                  <i class="flaticon-suitcase"></i>
                                </div>
                                <div class="kt-widget__details">
                                  <span class="kt-widget__title">
                                    <a style="color: #2786fb; font-size: 11px;" href="<?= site_url('transaksi/pegawai') ?>">
                                      Data Pegawai
                                    </a>
                                  </span>
                                </div>
                              </div>

                            </div>

                            <div class="col-xl-6">
                              <div class="kt-widget__item">
                                <div class="kt-widget__icon">
                                  <i class="flaticon-medal"></i>
                                </div>
                                <div class="kt-widget__details">
                                  <span class="kt-widget__title">
                                    <a style="color: #2786fb; font-size: 11px;" href="<?= site_url('transaksi/jabatan_pegawai') ?>">
                                      Jabatan Pegawai
                                    </a>
                                  </span>
                                </div>
                              </div>

                            </div>
                          </div>

                          <div class="row">
                            <div class="col-xl-6">

                              <div class="kt-widget__item">
                                <div class="kt-widget__icon">
                                  <i class="flaticon-open-box"></i>
                                </div>
                                <div class="kt-widget__details">
                                  <span class="kt-widget__title">
                                    <a style="color: #2786fb; font-size: 11px;" href="<?= site_url('transaksi/pengundurandiri_pegawai') ?>">
                                      Pegawai Resign/Gugur
                                    </a>
                                  </span>
                                </div>
                              </div>

                            </div>
                            <div class="col-xl-6">

                            </div>
                          </div>

                        </div>
                      </div>


                    </div>

                    <!--end::Widget 9-->
                  </div>
                </div>

                <!--end:: Widgets/Download Files-->
              </div>

            </div>

          </div>
        </div>

      </div>

      <!-- end:: Content -->
    </div>

  <?php } else if ($this->session->userdata('level') == 13) { ?>

    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
      <!-- begin:: Content -->
      <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!-- <div class="row">
      <div class="col-sm-12">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url() ?>">Selamat Datang Administrator</a></li>
        </ul>
      </div>
    </div> -->

        <!--konten halaman ini bisa isi disini mulai dari <div class="row"> pada setiap widgetnya-->
        <div class="kt-portlet">
          <div class="kt-portlet__body  kt-portlet__body--fit">
            <div class="row row-no-padding row-col-separator-lg">
              <div class="col-md-12 col-lg-6 col-xl-3">

                <!--begin::Total Profit-->
                <div class="kt-widget24">
                  <div class="kt-widget24__details">
                    <div class="kt-widget24__info">
                      <h4 class="kt-widget24__title">
                        Total Pegawai
                      </h4>
                    </div>
                    <span class="kt-widget24__stats kt-font-brand">
                      190
                    </span>
                  </div>
                </div>

                <!--end::Total Profit-->
              </div>
              <div class="col-md-12 col-lg-6 col-xl-3">

                <!--begin::New Feedbacks-->
                <div class="kt-widget24">
                  <div class="kt-widget24__details">
                    <div class="kt-widget24__info">
                      <h4 class="kt-widget24__title">
                        Total Pegawai Kontrak
                      </h4>
                    </div>
                    <span class="kt-widget24__stats kt-font-warning">
                      130
                    </span>
                  </div>
                </div>

                <!--end::New Feedbacks-->
              </div>
              <div class="col-md-12 col-lg-6 col-xl-3">

                <!--begin::New Orders-->
                <div class="kt-widget24">
                  <div class="kt-widget24__details">
                    <div class="kt-widget24__info">
                      <h4 class="kt-widget24__title">
                        Total Pegawai Eksternal
                      </h4>
                    </div>
                    <span class="kt-widget24__stats kt-font-danger">
                      50
                    </span>
                  </div>
                </div>

                <!--end::New Orders-->
              </div>
              <div class="col-md-12 col-lg-6 col-xl-3">

                <!--begin::New Users-->
                <div class="kt-widget24">
                  <div class="kt-widget24__details">
                    <div class="kt-widget24__info">
                      <h4 class="kt-widget24__title">
                        Total PHL
                      </h4>
                    </div>
                    <span class="kt-widget24__stats kt-font-default">
                      20
                    </span>
                  </div>
                </div>

                <!--end::New Users-->
              </div>
            </div>
          </div>
        </div>

        <div class="kt-portlet">
          <div class="kt-portlet__head btn btn-success">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title text-light">
                Menu Ms Glow Kepegawaian
              </h3>
            </div>
          </div>

          <div class="kt-portlet__body">

            <div class="row">


              <!--Begin::Row-->
              <div class="row">


                <div class="col-xl-12 col-lg-12 order-lg-1 order-xl-1">

                  <!--begin:: Widgets/Download Files-->
                  <div class="kt-portlet kt-portlet--height-fluid kt-iconbox kt-iconbox--danger kt-iconbox--animate-slow">

                    <div class="kt-portlet__body">

                      <!--begin::k-widget4-->
                      <div class="kt-widget4">


                        <div class="kt-widget kt-widget--user-profile-3">
                          <div class="kt-widget__top">

                            <div class="kt-widget__media kt-hidden-">
                              <img src="<?= base_url() ?>assets2/media/users/pegawai.png" alt="image">
                            </div>

                            <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">

                            </div>
                            <div class="kt-widget__content">
                              <div class="kt-widget__head">
                                <div class="kt-widget__username">
                                  KEPEGAWAIAN
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="kt-widget__bottom">

                            <div class="row">
                              <div class="col-xl-6">

                                <div class="kt-widget__item">
                                  <div class="kt-widget__icon">
                                    <i class="flaticon-suitcase"></i>
                                  </div>
                                  <div class="kt-widget__details">
                                    <span class="kt-widget__title">
                                      <a style="color: #2786fb; font-size: 11px;" href="<?= site_url('transaksi/pegawai') ?>">
                                        Data Pegawai
                                      </a>
                                    </span>
                                  </div>
                                </div>

                              </div>

                              <div class="col-xl-6">
                                <div class="kt-widget__item">
                                  <div class="kt-widget__icon">
                                    <i class="flaticon-medal"></i>
                                  </div>
                                  <div class="kt-widget__details">
                                    <span class="kt-widget__title">
                                      <a style="color: #2786fb; font-size: 11px;" href="<?= site_url('transaksi/jabatan_pegawai') ?>">
                                        Jabatan Pegawai
                                      </a>
                                    </span>
                                  </div>
                                </div>

                              </div>
                            </div>

                          </div>
                        </div>


                      </div>

                      <!--end::Widget 9-->
                    </div>
                  </div>

                  <!--end:: Widgets/Download Files-->
                </div>

              </div>

            </div>
          </div>

        </div>

        <!-- end:: Content -->
      </div>

    <?php } else if ($this->session->userdata('level') == 4) {
  } else { ?>

    <?php } ?>