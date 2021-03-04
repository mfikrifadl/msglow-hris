<?php
if ($this->session->userdata('id') == '') {
  redirect(site_url('master/signin'));
}
?>
<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset="UTF-8">
  <title>Ms Glow Kepegawaian</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

  <!--begin:: Vendor Plugins -->
  <link href="<?php echo base_url(); ?>assets2/plugins/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/quill/dist/quill.snow.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/plugins/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/plugins/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/plugins/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

  <!--end:: Vendor Plugins -->
  <link href="<?php echo base_url(); ?>assets2/css/style.bundle.css" rel="stylesheet" type="text/css" />

  <!--begin:: Vendor Plugins for custom pages -->
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/@fullcalendar/core/main.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/@fullcalendar/daygrid/main.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/@fullcalendar/list/main.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/@fullcalendar/timegrid/main.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/jqvmap/dist/jqvmap.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets2/plugins/custom/uppy/dist/uppy.min.css" rel="stylesheet" type="text/css" />

  <!-- si pegawai -->
  <link href="<?= base_url() ?>assets/plugins/pnotify/pnotify.custom.css" rel="stylesheet">
  <!-- <link href="<?= base_url() ?>assets/plugins/datepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet"> -->
  <!-- end si pegawai -->

  <link rel="icon" href="<?= base_url() ?>assets2/media/logos/title-ikon-msglow2.png" type="image/gif" sizes="16x16" />

  <!--end:: Vendor Plugins for custom pages -->



  <!-- <link href="<?= base_url() ?>upload/nitrogen.png" type="image/x-icon" rel="icon" /> -->
  <!-- Bootstrap 3.3.2 -->
  <!-- <link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
  <!-- FontAwesome 4.3.0 -->
  <!-- <link href="<?= base_url() ?>assets/plugins/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url() ?>assets/dist/font/font.css" rel="stylesheet" type="text/css" /> -->
  <!-- Ionicons 2.0.0 -->
  <!-- <link href="<?= base_url() ?>assets/bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" /> -->
  <!-- Theme style -->
  <!-- <link href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" /> -->
  <!-- Select2 -->
  <!-- <link href="<?= base_url() ?>assets/plugins/select2/select2.css" rel="stylesheet" type="text/css" /> -->
  <!-- PopUp -->
  <!-- <link href="<?= base_url() ?>assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/plugins/pnotify/pnotify.custom.css" rel="stylesheet"> -->
  <!-- DATA TABLES -->
  <!-- <link href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" /> -->
  <!-- Bootstrap datetime Picker -->
  <!-- <link href="<?= base_url() ?>assets/plugins/datepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet"> -->
  <!-- iCheck for checkboxes and radio inputs -->
  <!-- <link href="<?= base_url() ?>assets/plugins/iCheck/all.css" rel="stylesheet" type="text/css" /> -->
  <!-- Summernotes -->
  <!-- <link href="<?= base_url() ?>assets/plugins/summernote/summernote.css" rel="stylesheet" type="text/css" /> -->
  <?php
  function String2Date($dTgl)
  {
    //return 22-11-2012  
    if (empty($dTgl)) {
      $dTgl = "";
      return $dTgl;
    } else {
      list($cYear, $cMount, $cDate) = explode("-", $dTgl);
      if (strlen($cYear) == 4) {
        $dTgl = $cDate . "-" . $cMount . "-" . $cYear;
      }
      return $dTgl;
    }
  }

  function String2Date_masuk_kerja($cTgl_masuk_kerja)
  {
    $cReturn    = "-";
    if ($cTgl_masuk_kerja !== "" && $cTgl_masuk_kerja !== "0000-00-00 00:00:00") {
      $cReturn  = date("d-m-Y H:i:s", strtotime($cTgl_masuk_kerja));
    }
    return $cReturn;

    //return 22-11-2012  
    // list($cYear, $cMount, $cDate) = explode("-", $cTgl_masuk_kerja);
    // if (strlen($cYear) == 4) {
    //   $cTgl_masuk_kerja = $cDate . "-" . $cMount . "-" . $cYear;
    // }
    // return $cTgl_masuk_kerja;
  }

  function String2Date_masa_kerja($cTgl_masa_kerja)
  {
    $cReturn    = "-";
    if ($cTgl_masa_kerja !== "" && $cTgl_masa_kerja !== "0000-00-00 00:00:00") {
      $cReturn  = date("d-m-Y H:i:s", strtotime($cTgl_masa_kerja));
    }
    return $cReturn;

    //return 22-11-2012  
    // list($cYear, $cMount, $cDate) = explode("-", $cTgl_masa_kerja);
    // if (strlen($cYear) == 4) {
    //   $cTgl_masa_kerja = $cDate . "-" . $cMount . "-" . $cYear;
    // }
    // return $cTgl_masa_kerja;
  }

  function String2DateTime($dTgl)
  {
    $cReturn    = "-";
    if ($dTgl !== "" && $dTgl !== "0000-00-00 00:00:00") {
      $cReturn  = date("d-m-Y H:i:s", strtotime($dTgl));
    }
    return $cReturn;
  }
  ?>
  <!-- <style type="text/css">
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
  </style> -->
</head>

<!-- <body class="skin-red layout-top-nav" onload="onLoad();">
          <div class="wrapper"> -->


<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading" onload="onLoad();">

  <!-- begin:: Page -->

  <!-- begin:: Header Mobile -->
  <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
      <a href="<?= base_url() ?>">
        <!-- <img src="<?= base_url() ?>assets2/media/logos/logo.png" style="height:30px"></b> </a> -->
      </a>
    </div>
    <div class="kt-header-mobile__toolbar">
      <div class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></div>
      <!-- <div class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></div> -->
      <div class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></div>
    </div>
  </div>

  <!-- end:: Header Mobile -->
  <div class="kt-grid kt-grid--hor kt-grid--root ">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page ">
      <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

        <!-- begin:: Header -->
        <div id="kt_header" class="kt-header kt-grid kt-grid--ver kt-header--fixed">

          <!-- begin:: Aside -->

          <div class="kt-header__brand kt-grid__item " id="kt_header_brand">
            <div class="kt-header__brand-logo">
              <a href="<?= base_url() ?>">
                <img src="<?= base_url() ?>upload/logo-msglow3.png" style="height:30px"></b> </a>
              </a>
            </div>
          </div>

          <!-- begin:: Title -->
          <h3 class="kt-header__title kt-grid__item pull-right">
            <span class="hidden-xs text-secondary">Welcome
              <span class="hidden-xs text-light"><?= $this->session->userdata('nama') ?></span>
            </span>

          </h3>

          <!-- end:: Title -->

          <!-- end:: Aside -->
          <?php

          $cMenu = "";

          if ($this->session->userdata('level') == 1) {
            $cMenu  = 'menu_admin.php';
          } elseif ($this->session->userdata('level') == 2) {
            $cMenu  = 'menu_recruitment.php';
          } elseif ($this->session->userdata('level') == 3) {
            $cMenu  = 'menu_kepegawaian.php';
          } elseif ($this->session->userdata('level') == 4) {
            $cMenu  = 'menu_manager.php';
          } else {
            $cMenu  = 'login.php';
          }
          ?>
          <?php include '' . $cMenu . '' ?>
          <!-- Content Wrapper. Contains page content -->
          <!-- <div class="content-wrapper"> -->
          <!-- Content Header (Page header) -->
          <!-- Main content -->
          <!-- <section class="content"> -->