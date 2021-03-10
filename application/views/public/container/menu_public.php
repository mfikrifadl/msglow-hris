<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

  <!-- begin:: Aside Menu -->

  <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
      <ul class="kt-menu__nav ">
        <li class="kt-menu__section ">
          <h4 class="kt-menu__section-text">Keluhan</h4>
          <i class="kt-menu__section-icon flaticon-more-v2"></i>
        </li>
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" style="font-weight: 900;letter-spacing: 0.5px;">
          <a href="<?= base_url() ?>Form_public/pengaduan" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-calendar-with-a-clock-time-tools"></i><span class="kt-menu__link-text">Form Keluhan</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
        </li>

        <li class="kt-menu__section ">
          <h4 class="kt-menu__section-text">Pengadaan</h4>
          <i class="kt-menu__section-icon flaticon-more-v2"></i>
        </li>

        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" style="font-weight: 900;letter-spacing: 0.5px;">
          <a href="<?= base_url() ?>Form_public/pengadaan" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-graphic"></i><span class="kt-menu__link-text">Form Pengadaan</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
        </li>
      </ul>
    </div>
  </div>

  <!-- end:: Aside Menu -->
</div>

<!-- begin:: Title -->


<!-- end:: Title -->

<!-- begin:: Header Topbar -->

<div class="kt-header__topbar">
  <!--begin: User bar -->


  <div class="kt-header__topbar-item kt-header__topbar-item--user">

    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">

      <img class="kt-hidden" alt="Pic" src="<?= base_url() ?>assets2/media/bg/bg-5.jpg" />
      <span class="kt-header__topbar-icon kt-hidden-">

        <img src="<?= base_url() ?>assets/dist/img/avatar5.png" class="user-image" alt="User Image" />
      </span>
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

      <!--begin: Head -->
      <div class="kt-user-card kt-user-card--skin-dark " style="background-image: url(<?= base_url() ?>assets2/media/bg/bg-10new.jpg)">
        <div class="kt-user-card__avatar">
          <img src="<?= base_url() ?>assets2/media/logos/ikon-msglow2.png" class="img-circle" alt="User Image" />


          <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
          <!-- <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">S</span> -->
        </div>
        <div class="kt-user-card__name">
          <span class="hidden-xs text-info"></span>
        </div>
      </div>
      <!--end: Head -->
      <!--end: Navigation -->
    </div>
  </div>

  <!--end: User bar -->
</div>
<!-- end:: Header Topbar -->
</div>