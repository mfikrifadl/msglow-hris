<?php if ($this->session->userdata('level') == 1) {
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
                <td>Telp</td>
              </tr>
            </thead>
            <tbody>
            <?php $no = 0;
              foreach ($ultah as $key => $vaArea) { ?>
                <tr>
                  <td><?= ++$no; ?></td>
                  <td><?= $vaArea['nik'] ?></td>
                  <td><?= $vaArea['nama'] ?></td>
                  <td><?= $vaArea['tanggal_masuk_kerja'] ?></td>
                  <?php $age = date_diff(date_create($vaArea['tanggal_masuk_kerja']), date_create('now'))->y; ?>
                  <td><?= $vaArea['handphone'] ?></td>
                </tr>
              <?php } ?>
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
              foreach ($ultah as $key => $vaArea) { ?>
                <tr>
                  <td><?= ++$no; ?></td>
                  <td><?= $vaArea['nik'] ?></td>
                  <td><?= $vaArea['nama'] ?></td>
                  <td><?= $vaArea['tanggal_lahir'] ?></td>
                  <?php $age = date_diff(date_create($vaArea['tanggal_lahir']), date_create('now'))->y; ?>
                  <td><?= $age ?></td>
                  <td><?= $vaArea['handphone'] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
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
              <div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">

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

              <div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">

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

              <div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">

                <!--begin:: Widgets/Download Files-->
                <div class="kt-portlet kt-portlet--height-fluid kt-iconbox kt-iconbox--info kt-iconbox--animate-slow">

                  <div class="kt-portlet__body">

                    <!--begin::k-widget4-->
                    <div class="kt-widget4">


                      <div class="kt-widget kt-widget--user-profile-3">
                        <div class="kt-widget__top">

                          <div class="kt-widget__media kt-hidden-">
                            <img src="<?= base_url() ?>assets2/media/users/id-card.png" alt="image">
                          </div>

                          <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">

                          </div>
                          <div class="kt-widget__content">
                            <div class="kt-widget__head">
                              <div class="kt-widget__username">
                                HRD
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="kt-widget__bottom">

                          <div class="row">
                            <div class="col-xl-6">

                              <div class="kt-widget__item">
                                <div class="kt-widget__icon">
                                  <i class="flaticon-interface-11"></i>
                                </div>
                                <div class="kt-widget__details">
                                  <span class="kt-widget__title">
                                    <a style="color: #2786fb; font-size: 11px;" href="<?= site_url('transaksi/pegawai') ?>">
                                      Form
                                    </a>
                                  </span>
                                </div>
                              </div>

                            </div>

                            <div class="col-xl-6">
                              <div class="kt-widget__item">
                                <div class="kt-widget__icon">
                                  <i class="flaticon-folder-1"></i>
                                </div>
                                <div class="kt-widget__details">
                                  <span class="kt-widget__title">
                                    <a style="color: #2786fb; font-size: 11px;" href="<?= site_url('transaksi/jabatan_pegawai') ?>">
                                      Surat
                                    </a>
                                  </span>
                                </div>
                              </div>

                            </div>
                          </div>

                          <div class="row">
                            <div class="col-xl-6">

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

              <div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">

                <!--begin:: Widgets/Download Files-->
                <div class="kt-portlet kt-portlet--height-fluid kt-iconbox kt-iconbox--success kt-iconbox--animate-slow">

                  <div class="kt-portlet__body">

                    <!--begin::k-widget4-->
                    <div class="kt-widget4">


                      <div class="kt-widget kt-widget--user-profile-3">
                        <div class="kt-widget__top">

                          <div class="kt-widget__media kt-hidden-">
                            <img src="<?= base_url() ?>assets2/media/users/server.png" alt="image">
                          </div>

                          <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">

                          </div>
                          <div class="kt-widget__content">
                            <div class="kt-widget__head">
                              <div class="kt-widget__username">
                                Master Data
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="kt-widget__bottom">

                          <div class="row">
                            <div class="col-xl-6">

                              <div class="kt-widget__item">
                                <div class="kt-widget__icon">
                                  <i class="flaticon2-circle-vol-2"></i>
                                </div>
                                <div class="kt-widget__details">
                                  <span class="kt-widget__title">
                                    <a style="color: #2786fb; font-size: 11px;" href="<?= site_url('master/area_kerja') ?>">
                                      Area Data Kerja
                                    </a>
                                  </span>
                                </div>
                              </div>

                            </div>
                            <div class="col-xl-6">

                              <div class="kt-widget__item">
                                <div class="kt-widget__icon">
                                  <i class="flaticon2-checkmark"></i>
                                </div>
                                <div class="kt-widget__details">
                                  <span class="kt-widget__title">
                                    <a style="color: #2786fb; font-size: 11px;" href="<?= site_url('master/unit_kerja') ?>">
                                      Data Unit Kerja
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
                                  <i class="flaticon-suitcase"></i>
                                </div>
                                <div class="kt-widget__details">
                                  <span class="kt-widget__title">
                                    <a style="color: #2786fb; font-size: 11px;" href="<?= site_url('master/sub_unit_kerja') ?>">
                                      Data Sub Unit Kerja
                                    </a>
                                  </span>
                                </div>
                              </div>
                            </div>

                            <div class="col-xl-6">

                              <div class="kt-widget__item">
                                <div class="kt-widget__icon">
                                  <i class="flaticon-tool"></i>
                                </div>
                                <div class="kt-widget__details">
                                  <span class="kt-widget__title">
                                    <a style="color: #2786fb; font-size: 11px;" href="<?= site_url('master/outlet') ?>">
                                      Data Office
                                    </a>
                                  </span>
                                </div>
                              </div>

                              <!-- <div class="kt-widget__item">
                                <div class="kt-widget__icon">
                                  <i class="flaticon-users"></i>
                                </div>
                                <div class="kt-widget__details">
                                  <span class="kt-widget__title">
                                    <a style="color: #2786fb; font-size: 11px;" href="<?= site_url('master/supervisor') ?>">
                                      Data Supervisor
                                    </a>
                                  </span>
                                </div>
                              </div> -->

                            </div>
                          </div>

                          <div class="row">
                            <div class="col-xl-6">



                            </div>

                            <div class="col-xl-6">

                              <!-- <div class="kt-widget__item">
                                <div class="kt-widget__icon">
                                  <i class="flaticon-tool"></i>
                                </div>
                                <div class="kt-widget__details">
                                  <span class="kt-widget__title">
                                    <a style="color: #2786fb; font-size: 11px;" href="#">
                                      Absensi Karyawan
                                    </a>
                                  </span>
                                </div>
                              </div> -->

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
            <!--End::Row-->

          </div>

        </div>
      </div>

    </div>

    <!-- end:: Content -->
  </div>

<?php } else if ($this->session->userdata('level') == 2) { ?>
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

  <?php } else if ($this->session->userdata('level') == 3) { ?>

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

    <?php } else { ?>

    <?php } ?>