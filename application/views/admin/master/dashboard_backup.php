<?php
if ($this->session->userdata('nama') == '') {
  redirect(site_url('master/signin'));
}
?>
<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset="UTF-8">
  <title>Selamat Datang di ERP GIU</title>
  <link href="<?= base_url() ?>upload/nitrogen.png" type="image/x-icon" rel="icon" />
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->
  <link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- FontAwesome 4.3.0 -->
  <link href="<?= base_url() ?>assets/plugins/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url() ?>assets/dist/font/font.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons 2.0.0 -->
  <link href="<?= base_url() ?>assets/bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Morris charts -->
  <link href="<?= base_url() ?>assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

  <?php
  function String2Date($dTgl)
  {
    //return 22-11-2012  
    list($cYear, $cMount, $cDate) = explode("-", $dTgl);
    if (strlen($cYear) == 4) {
      $dTgl = $cDate . "-" . $cMount . "-" . $cYear;
    }
    return $dTgl;
  }
  function String2DateTime($dTgl)
  {
    $cReturn    = "-";
    if ($dTgl !== "" && $dTgl !== "0000-00-00 00:00:00") {
      $cReturn  = date("d-m-Y H:i:s", strtotime($dTgl));
    }
    return $cReturn;
  }

  function CountUmur($Where)
  {
    $link = @mysqli_connect('localhost', 'root', 'nitrogen123', 'si_pegawai');
    $db   = mysqli_query($link, "SELECT COUNT(umur) AS Result FROM tb_pegawai WHERE $Where");
    $data = mysqli_fetch_array($db);
    $cUmur = $data['Result'];
    return $cUmur;
  }
  ?>
  <style type="text/css">
    .dropdown-submenu {
      position: relative;
    }

    .dropdown-submenu>.dropdown-menu {
      top: 0;
      right: 100%;
      margin-top: -6px;
      margin-left: -1px;
      -webkit-border-radius: 0 6px 6px 6px;
      -moz-border-radius: 0 6px 6px;
      border-radius: 0 6px 6px 6px;
    }

    .dropdown-submenu:hover>.dropdown-menu {
      display: block;
    }

    .dropdown-submenu>a:after {
      display: block;
      content: " ";
      float: right;
      width: 0;
      height: 0;
      border-color: transparent;
      border-style: solid;
      border-width: 5px 0 5px 5px;
      border-left-color: #ccc;
      margin-top: 5px;
      margin-right: -10px;
    }

    .dropdown-submenu:hover>a:after {
      border-left-color: #fff;
    }
  </style>
</head>

<body class="skin-red layout-top-nav">
  <div class="wrapper">

    <?php if ($this->session->userdata('level') == 1) {
      $cMenu  = 'menu_admin.php';
    } elseif ($this->session->userdata('level') == 2) {
      $cMenu  = 'menu_recruitment.php';
    } elseif ($this->session->userdata('level') == 3) {
      $cMenu  = 'menu_penjualan.php';
    } elseif ($this->session->userdata('level') == 4) {
      $cMenu  = 'menu_gaji.php';
    } elseif ($this->session->userdata('level') == 5) {
      $cMenu  = 'menu_gudang.php';
    } elseif ($this->session->userdata('level') == 6) {
      $cMenu  = 'menu_manager.php';
    } else {
      $cMenu  = 'menu_admin.php';
    }
    ?>
    <?php $this->load->view('admin/container/' . $cMenu . '') ?>
    <section class="content-header" style="box-shadow:1px 1px 1px #999;background:#fff">
      <h1>
        ERP GREEN NITROGEN
        <small>Ver 1.0.0</small> - Selamat Datang <?= $this->session->userdata('nama') ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?= $menu ?></a></li>
        <li class="active"><?= $file ?></li>
      </ol>
    </section>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <!-- Main content -->

      <section class="content-header" style="box-shadow:1px 1px 1px #999;background:#fff">
        <div class="panel panel-success ">
          <div class="panel-heading">
            <span class="fa fa-windows"></span> Menu ERP Green Nitrogen
          </div>
          <?php
          if ($this->session->userdata('level') == 1) {
          ?>
            <div class="panel-body"><br />

              <div class="col-lg-4 col-xs-4">
                <div class="info-box bg-blue">
                  <span class="info-box-icon">
                    <i class="ion ion-android-add-contact"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>
                        <h3>RECRUITMENT</h3>
                      </strong></span>
                    <span class="progress-description">
                      <ul>
                        <li>
                          <a style="color: white" href="<?= site_url('recruitment/wawancara') ?>"><i class="fa fa-group"></i>
                            Wawancara
                          </a>
                        </li>

                        <li>
                          <a style="color: white" href="<?= site_url('recruitment/tes_praktik') ?>">
                            <i class="fa fa-trophy"></i> Tes Ketrampilan
                          </a>
                        </li>
                        <li>
                          <a style="color: white" href="<?= site_url('recruitment/monitoring_status') ?>">
                            <i class="fa fa-cloud-upload"></i> Monitoring Status</a>
                        </li>
                        <li>
                          <a style="color: white" href="<?= site_url('recruitment/peserta_diterima') ?>">
                            <i class="fa fa-trophy"></i> Peserta Diterima
                          </a>
                        </li>
                        <br />
                      </ul>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- ./col -->

              <div class="col-lg-4 col-xs-4">
                <div class="info-box bg-red">
                  <span class="info-box-icon">
                    <i class="ion ion-ios7-people"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>
                        <h3>KEPEGAWAIAN</h3>
                      </strong></span>
                    <span class="progress-description">
                      <ul>
                        <li><a style="color: white" href="<?= site_url('transaksi/pegawai') ?>"><i class="fa fa-group"></i> Data Pegawai</a></li>
                        <li><a style="color: white" href="<?= site_url('transaksi/jabatan_pegawai') ?>"><i class="fa fa-cloud-upload"></i> Jabatan Pegawai</a></li>


                        <!-- <li><a style="color: white" href="<?= site_url('transaksi/pendidikan_pegawai') ?>"><i class="fa fa-sitemap"></i> &nbsp;Riwayat Pendidikan Pegawai</a></li>
                        <li><a style="color: white" href="<?= site_url('transaksi/pengalaman_pegawai') ?>"><i class="fa fa-thumb-tack"></i> &nbsp;&nbsp;Riwayat Pengalaman Pegawai</a></li>  -->

                        <li><a style="color: white" href="<?= site_url('transaksi/pengundurandiri_pegawai') ?>"><i class="fa fa-ticket"></i> Pegawai Mengundurkan Diri/Gugur</a></li>
                      </ul>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- ./col -->

              <div class="col-lg-4 col-xs-4">
                <div class="info-box bg-green">
                  <span class="info-box-icon">
                    <i class="ion ion-android-note"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>
                        <h3>HRD</h3>
                      </strong></span>
                    <span class="progress-description">
                      <ul>

                        <li><a style="color: white" href="<?= site_url('master/area_kerja') ?>"><i class="fa fa-check-circle-o"></i> Data Area Kerja</a></li>
                        <li><a style="color: white" href="<?= site_url('master/unit_kerja') ?>"><i class="fa fa-check"></i> Data Unit Kerja</a></li>
                        <li><a style="color: white" href="<?= site_url('master/sub_unit_kerja') ?>"><i class="fa fa-suitcase"></i> Data Sub Unit Kerja</a></li>

                        <li><a style="color: white" href="<?= site_url('master/supervisor') ?>"><i class="fa fa-user"></i> Data Supervisor</a></li>

                        <li><a style="color: white" href="<?= site_url('master/outlet') ?>"><i class="fa fa-archive"></i> Data Outlet</a></li>

                      </ul>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- ./col -->


              <div class="col-lg-4 col-xs-4">
                <div class="info-box bg-yellow">
                  <span class="info-box-icon">
                    <i class="ion ion-edit"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>
                        <h3>PENJUALAN</h3>
                      </strong></span>
                    <span class="progress-description">
                      <ul>

                        <li><a style="color: white" href="<?= site_url('penjualan/laporan_penjualan_all') ?>"><i class="fa fa-laptop"></i> Laporan Penjualan</a></li>

                        <li><a style="color: white" href="<?= site_url('penjualan/laporan_penjualan_area') ?>"><i class="fa fa-laptop"></i> Laporan Penjualan Per Area</a></li>

                        <li><a style="color: white" href="<?= site_url('penjualan/laporan_penjualan_supervisor') ?>"><i class="fa fa-laptop"></i> Laporan Penjualan Per Supervisor</a></li>
                        <br /><br />
                      </ul>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div>
              <!-- ./col -->

              <div class="col-lg-4 col-xs-4">
                <div class="info-box bg-aqua">
                  <span class="info-box-icon">
                    <i class="ion ion-code-working"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>
                        <h3>PAYROLL</h3>
                      </strong></span>
                    <span class="progress-description">
                      <ul>
                        <li><a style="color: white" href="<?= site_url('gaji/absen') ?>"><i class="fa fa-money"></i> Perhitungan Gaji</a></li>
                        <li><a style="color: white" href="<?= site_url('gaji/slip') ?>"><i class="fa fa-print"></i> Cetak Slip Gaji</a></li>
                        <li><a style="color: white" href="<?= site_url('gaji/rekap_gaji') ?>"><i class="fa fa-print"></i> Laporan / Rekap Gaji</a></li>
                        <br />
                        <br />
                      </ul>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div>
              <!-- ./col -->


              <div class="col-lg-4 col-xs-4">
                <div class="info-box bg-teal">
                  <span class="info-box-icon">
                    <i class="ion ion-android-archive"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>
                        <h3>INVENTORY</h3>
                      </strong></span>
                    <span class="progress-description">
                      <li><a style="color: white" href="<?= site_url('supplies/data') ?>"><i class="fa fa-book"></i> Data Supplies</a></li>
                      <li><a style="color: white" href="<?= site_url('supplies/stock_supplies') ?>"><i class="fa fa-book"></i> Stock Supplies</a></li>
                      <li><a style="color: white" href="<?= site_url('supplies/po') ?>"><i class="fa fa-book"></i> PO</a></li>
                      <li><a style="color: white" href="<?= site_url('supplies/permintaan_supplies') ?>"><i class="fa fa-book"></i> Permintaan Supplies</a></li>
                      <li><a style="color: white" href="<?= site_url('supplies/pemasukan_supplies') ?>"><i class="fa fa-book"></i> Pemasukan Supplies</a></li>
                      <li><a style="color: white" href="<?= site_url('supplies/pengeluaran_supplies') ?>"><i class="fa fa-book"></i> Pengeluaran Supplies</a></li>

                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div>
              <!-- ./col -->




            </div>
          <?php } else if ($this->session->userdata('level') == 2) { ?>
            <div class="panel-body"><br />

              <div class="col-lg-6 col-xs-6">
                <div class="info-box bg-blue">
                  <span class="info-box-icon">
                    <i class="ion ion-android-add-contact"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>
                        <h3>RECRUITMENT</h3>
                      </strong></span>
                    <span class="progress-description">
                      <ul>
                        <li>
                          <a style="color: white" href="<?= site_url('recruitment/wawancara') ?>"><i class="fa fa-group"></i>
                            Wawancara
                          </a>
                        </li>

                        <li>
                          <a style="color: white" href="<?= site_url('recruitment/tes_praktik') ?>">
                            <i class="fa fa-trophy"></i> Tes Ketrampilan
                          </a>
                        </li>
                        <li>
                          <a style="color: white" href="<?= site_url('recruitment/monitoring_status') ?>">
                            <i class="fa fa-cloud-upload"></i> Monitoring Status</a>
                        </li>
                        <li>
                          <a style="color: white" href="<?= site_url('recruitment/peserta_diterima') ?>">
                            <i class="fa fa-trophy"></i> Peserta Diterima
                          </a>
                        </li>
                        <br />
                      </ul>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- ./col -->

              <div class="col-lg-6 col-xs-6">
                <div class="info-box bg-red">
                  <span class="info-box-icon">
                    <i class="ion ion-ios7-people"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>
                        <h3>KEPEGAWAIAN</h3>
                      </strong></span>
                    <span class="progress-description">
                      <ul>
                        <li><a style="color: white" href="<?= site_url('transaksi/pegawai') ?>"><i class="fa fa-group"></i> Data Pegawai</a></li>
                        <li><a style="color: white" href="<?= site_url('transaksi/jabatan_pegawai') ?>"><i class="fa fa-cloud-upload"></i> Jabatan Pegawai</a></li>


                        <!-- <li><a style="color: white" href="<?= site_url('transaksi/pendidikan_pegawai') ?>"><i class="fa fa-sitemap"></i> &nbsp;Riwayat Pendidikan Pegawai</a></li>
                        <li><a style="color: white" href="<?= site_url('transaksi/pengalaman_pegawai') ?>"><i class="fa fa-thumb-tack"></i> &nbsp;&nbsp;Riwayat Pengalaman Pegawai</a></li>  -->

                        <li><a style="color: white" href="<?= site_url('transaksi/pengundurandiri_pegawai') ?>"><i class="fa fa-ticket"></i> Pegawai Mengundurkan Diri/Gugur</a></li>
                      </ul>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- ./col -->



            </div>
          <?php } else if ($this->session->userdata('level') == 3) { ?>
            <div class="panel-body"><br />




              <div class="col-lg-12 col-xs-12">
                <div class="info-box bg-yellow">
                  <span class="info-box-icon">
                    <i class="ion ion-edit"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>
                        <h3>PENJUALAN</h3>
                      </strong></span>
                    <span class="progress-description">
                      <ul>

                        <li><a style="color: white" href="<?= site_url('penjualan/laporan_penjualan_all') ?>"><i class="fa fa-laptop"></i> Laporan Penjualan</a></li>

                        <li><a style="color: white" href="<?= site_url('penjualan/laporan_penjualan_area') ?>"><i class="fa fa-laptop"></i> Laporan Penjualan Per Area</a></li>

                        <li><a style="color: white" href="<?= site_url('penjualan/laporan_penjualan_supervisor') ?>"><i class="fa fa-laptop"></i> Laporan Penjualan Per Supervisor</a></li>
                        <br /><br />


                      </ul>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- ./col -->



            </div>
          <?php } else if ($this->session->userdata('level') == 4) { ?>
            <div class="panel-body"><br />



              <div class="col-lg-4 col-xs-4">
                <div class="info-box bg-red">
                  <span class="info-box-icon">
                    <i class="ion ion-ios7-people"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>
                        <h3>KEPEGAWAIAN</h3>
                      </strong></span>
                    <span class="progress-description">
                      <ul>
                        <li><a style="color: white" href="<?= site_url('transaksi/pegawai') ?>"><i class="fa fa-group"></i> Data Pegawai</a></li>
                        <br />
                        <br />
                      </ul>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- ./col -->

              <div class="col-lg-4 col-xs-4">
                <div class="info-box bg-green">
                  <span class="info-box-icon">
                    <i class="ion ion-android-note"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>
                        <h3>Data SPV & Outlet</h3>
                      </strong></span>
                    <span class="progress-description">
                      <ul>



                        <li><a style="color: white" href="<?= site_url('master/supervisor') ?>"><i class="fa fa-user"></i> Data Supervisor</a></li>

                        <li><a style="color: white" href="<?= site_url('master/outlet') ?>"><i class="fa fa-archive"></i> Data Outlet</a></li>

                        <br />

                      </ul>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- ./col -->




              <div class="col-lg-4 col-xs-4">
                <div class="info-box bg-aqua">
                  <span class="info-box-icon">
                    <i class="ion ion-code-working"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>
                        <h3>PAYROLL</h3>
                      </strong></span>
                    <span class="progress-description">
                      <ul>
                        <li><a style="color: white" href="<?= site_url('gaji/absen') ?>"><i class="fa fa-money"></i> Perhitungan Gaji</a></li>
                        <li><a style="color: white" href="<?= site_url('gaji/slip') ?>"><i class="fa fa-print"></i> Cetak Slip Gaji</a></li>
                        <li><a style="color: white" href="<?= site_url('gaji/rekap_gaji') ?>"><i class="fa fa-print"></i> Laporan / Rekap Gaji</a></li>

                      </ul>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- ./col -->







            </div>
          <?php } else if ($this->session->userdata('level') == 5) { ?>
            <div class="panel-body"><br />



              <div class="col-lg-6 col-xs-12">
                <div class="info-box bg-green">
                  <span class="info-box-icon">
                    <i class="ion ion-android-note"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>
                        <h3>Data SPV & Outlet</h3>
                      </strong></span>
                    <span class="progress-description">
                      <ul>



                        <li><a style="color: white" href="<?= site_url('master/supervisor') ?>"><i class="fa fa-user"></i> Data Supervisor</a></li>

                        <li><a style="color: white" href="<?= site_url('master/outlet') ?>"><i class="fa fa-archive"></i> Data Outlet</a></li>
                        <br />
                        <br />
                        <br />


                      </ul>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- ./col -->



              <div class="col-lg-6 col-xs-12">
                <div class="info-box bg-teal">
                  <span class="info-box-icon">
                    <i class="ion ion-android-archive"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>
                        <h3>INVENTORY</h3>
                      </strong></span>
                    <span class="progress-description">
                      <li><a style="color: white" href="<?= site_url('supplies/data') ?>"><i class="fa fa-book"></i> Data Supplies</a></li>
                      <li><a style="color: white" href="<?= site_url('supplies/stock_supplies') ?>"><i class="fa fa-book"></i> Stock Supplies</a></li>
                      <li><a style="color: white" href="<?= site_url('supplies/po') ?>"><i class="fa fa-book"></i> PO</a></li>
                      <li><a style="color: white" href="<?= site_url('supplies/permintaan_supplies') ?>"><i class="fa fa-book"></i> Permintaan Supplies</a></li>
                      <li><a style="color: white" href="<?= site_url('supplies/pemasukan_supplies') ?>"><i class="fa fa-book"></i> Pemasukan Supplies</a></li>
                      <li><a style="color: white" href="<?= site_url('supplies/pengeluaran_supplies') ?>"><i class="fa fa-book"></i> Pengeluaran Supplies</a></li>

                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- ./col -->




            </div>
          <?php } else if ($this->session->userdata('level') == 6) { ?>
            <div class="panel-body"><br />

              <div class="col-lg-3 col-xs-12">
                <div class="info-box bg-blue">
                  <span class="info-box-icon">
                    <i class="ion ion-android-add-contact"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>
                        <h3>RECRUITMENT</h3>
                      </strong></span>
                    <span class="progress-description">
                      <ul>
                        <li>
                          <a style="color: white" href="<?= site_url('recruitment/wawancara') ?>"><i class="fa fa-group"></i>
                            Wawancara
                          </a>
                        </li>

                        <li>
                          <a style="color: white" href="<?= site_url('recruitment/tes_praktik') ?>">
                            <i class="fa fa-trophy"></i> Tes Ketrampilan
                          </a>
                        </li>
                        <li>
                          <a style="color: white" href="<?= site_url('recruitment/monitoring_status') ?>">
                            <i class="fa fa-cloud-upload"></i> Monitoring Status</a>
                        </li>
                        <li>
                          <a style="color: white" href="<?= site_url('recruitment/peserta_diterima') ?>">
                            <i class="fa fa-trophy"></i> Peserta Diterima
                          </a>
                        </li>
                        <br />
                      </ul>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- ./col -->

              <div class="col-lg-3 col-xs-4">
                <div class="info-box bg-red">
                  <span class="info-box-icon">
                    <i class="ion ion-ios7-people"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>
                        <h3>KEPEGAWAIAN</h3>
                      </strong></span>
                    <span class="progress-description">
                      <ul>
                        <li><a style="color: white" href="<?= site_url('transaksi/pegawai') ?>"><i class="fa fa-group"></i> Data Pegawai</a></li>
                        <li><a style="color: white" href="<?= site_url('transaksi/jabatan_pegawai') ?>"><i class="fa fa-cloud-upload"></i> Jabatan Pegawai</a></li>


                        <!-- <li><a style="color: white" href="<?= site_url('transaksi/pendidikan_pegawai') ?>"><i class="fa fa-sitemap"></i> &nbsp;Riwayat Pendidikan Pegawai</a></li>
                        <li><a style="color: white" href="<?= site_url('transaksi/pengalaman_pegawai') ?>"><i class="fa fa-thumb-tack"></i> &nbsp;&nbsp;Riwayat Pengalaman Pegawai</a></li>  -->

                        <li><a style="color: white" href="<?= site_url('transaksi/pengundurandiri_pegawai') ?>"><i class="fa fa-ticket"></i> Pegawai Mengundurkan Diri</a></li>
                        <br />
                        <br />
                      </ul>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- ./col -->

              <div class="col-lg-3 col-xs-4">
                <div class="info-box bg-green">
                  <span class="info-box-icon">
                    <i class="ion ion-android-note"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>
                        <h3>HRD</h3>
                      </strong></span>
                    <span class="progress-description">
                      <ul>

                        <li><a style="color: white" href="<?= site_url('master/area_kerja') ?>"><i class="fa fa-check-circle-o"></i> Data Area Kerja</a></li>
                        <li><a style="color: white" href="<?= site_url('master/unit_kerja') ?>"><i class="fa fa-check"></i> Data Unit Kerja</a></li>
                        <li><a style="color: white" href="<?= site_url('master/sub_unit_kerja') ?>"><i class="fa fa-suitcase"></i> Data Sub Unit Kerja</a></li>

                        <li><a style="color: white" href="<?= site_url('master/supervisor') ?>"><i class="fa fa-user"></i> Data Supervisor</a></li>

                        <li><a style="color: white" href="<?= site_url('master/outlet') ?>"><i class="fa fa-archive"></i> Data Outlet</a></li>

                      </ul>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- ./col -->




              <div class="col-lg-3 col-xs-4">
                <div class="info-box bg-aqua">
                  <span class="info-box-icon">
                    <i class="ion ion-code-working"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>
                        <h3>PAYROLL</h3>
                      </strong></span>
                    <span class="progress-description">
                      <ul>
                        <li><a style="color: white" href="<?= site_url('gaji/absen') ?>"><i class="fa fa-money"></i> Perhitungan Gaji</a></li>
                        <li><a style="color: white" href="<?= site_url('gaji/slip') ?>"><i class="fa fa-print"></i> Cetak Slip Gaji</a></li>
                        <li><a style="color: white" href="<?= site_url('gaji/rekap_gaji') ?>"><i class="fa fa-print"></i> Laporan / Rekap Gaji</a></li>
                        <br />
                        <br />
                      </ul>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- ./col -->






            </div>
          <?php } ?>

        </div>
        <br />
      </section>

    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="container">

      </div>
    </footer>
  </div><!-- ./wrapper -->
  <!-- jQuery 2.1.3 -->
  <script src="<?= base_url() ?>assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
  <!-- jQuery UI 1.11.2 -->
  <script src="<?= base_url() ?>assets/plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.2 JS -->
  <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- Morris.js charts -->
  <script src="<?= base_url() ?>assets/plugins/morris/raphael-min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/morris/morris.min.js" type="text/javascript"></script>
  <!-- Sparkline -->
  <script src="<?= base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
  <!-- Slimscroll -->
  <script src="<?= base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/dist/js/app.min.js" type="text/javascript"></script>




</body>

</html>