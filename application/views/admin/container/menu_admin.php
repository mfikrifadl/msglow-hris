<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

  <!-- begin:: Aside Menu -->

  <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
      <ul class="kt-menu__nav ">

        <li class="kt-menu__item" aria-haspopup="true">
          <a href="<?= base_url() ?>" class="kt-menu__link ">
            <i class="kt-menu__link-icon flaticon2-setup"></i>
            <span class="kt-menu__link-text">Dashboard </span>
          </a>
        </li>
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
          <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
            <i class="kt-menu__link-icon flaticon-users-1"></i>
            <span class="kt-menu__link-text">
              Recruitment
            </span>
            <i class="kt-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
            <ul class="kt-menu__subnav">

              <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">
                    Staff
                  </span>
                  <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">

                    <li class="kt-menu__item " aria-haspopup="true">
                      <a href="<?= site_url('recruitment/wawancara'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Administrasi
                        </span>
                      </a>
                    </li>

                    <li class="kt-menu__item " aria-haspopup="true">
                      <a href="<?= site_url('recruitment/psiko_test'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Psiko Test
                        </span>
                      </a>
                    </li>
                    <li class="kt-menu__item " aria-haspopup="true">
                      <a href="<?= site_url('recruitment/uji_kompetensi'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Uji Kompetensi
                        </span>
                      </a>
                    </li>
                    <li class="kt-menu__item " aria-haspopup="true">
                      <a href="<?= site_url('recruitment/interview_user_1'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Interview User 1
                        </span>
                      </a>
                    </li>
                    <li class="kt-menu__item " aria-haspopup="true">
                      <a href="<?= site_url('recruitment/interview_user_2'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Interview User 2
                        </span>
                      </a>
                    </li>

                    <li class="kt-menu__item " aria-haspopup="true">
                      <a href="<?= site_url('recruitment/interview_hrga'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Interview HRGA
                        </span>
                      </a>
                    </li>

                    <li class="kt-menu__item " aria-haspopup="true">
                      <a href="<?= site_url('recruitment/tes_kesehatan'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Tes Kesehatan
                        </span>
                      </a>
                    </li>

                    <li class="kt-menu__item " aria-haspopup="true">
                      <a href="<?= site_url('recruitment/peserta_diterima'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Peserta Diterima
                        </span>
                      </a>
                    </li>

                    <li class="kt-menu__item " aria-haspopup="true">
                      <a href="<?= site_url('recruitment/monitoring_status'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Monitoring Status
                        </span>
                      </a>
                    </li>

                  </ul>
                </div>
              </li>

              <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">
                    PHL
                  </span>
                  <i class="kt-menu__ver-arrow la la-angle-right">
                  </i>
                </a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">

                    <li class="kt-menu__item " aria-haspopup="true">
                      <a href="<?= site_url('recruitment_phl/administrasi'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Administrasi
                        </span>
                      </a>
                    </li>

                    <li class="kt-menu__item " aria-haspopup="true">
                      <a href="<?= site_url('recruitment_phl/wawancara_hr'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Wawancara HR
                        </span>
                      </a>
                    </li>
                    <li class="kt-menu__item " aria-haspopup="true">
                      <a href="<?= site_url('recruitment_phl/interview_user_1'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Interview User 1
                        </span>
                      </a>
                    </li>

                    <li class="kt-menu__item " aria-haspopup="true">
                      <a href="<?= site_url('recruitment_phl/peserta_diterima'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Peserta Diterima
                        </span>
                      </a>
                    </li>

                    <li class="kt-menu__item " aria-haspopup="true">
                      <a href="<?= site_url('recruitment_phl/monitoring_status'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Monitoring Status
                        </span>
                      </a>
                    </li>

                  </ul>
                </div>
              </li>


            </ul>
          </div>
        </li>

        <li class="kt-menu__item" aria-haspopup="true">
          <a href="<?= site_url('transaksi/pengajuan_form_karyawan'); ?>" class="kt-menu__link ">
            <i class="kt-menu__link-icon flaticon2-document"></i>
            <span class="kt-menu__link-text">Pengajuan Tambah Karyawan </span>
          </a>
        </li>

        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
          <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
            <i class="kt-menu__link-icon flaticon2-user"></i>
            <span class="kt-menu__link-text">Pegawai</span>
            <i class="kt-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
            <ul class="kt-menu__subnav">
              <li class="kt-menu__item " aria-haspopup="true">
                <a href="<?= site_url('transaksi/pegawai'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">Data Pegawai</span>
                </a>
              </li>

              <li class="kt-menu__item " aria-haspopup="true">
                <a href="<?= site_url('transaksi/kontrak'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">Form Kontrak Pegawai</span>
                </a>
              </li>

              <li class="kt-menu__item " aria-haspopup="true">
                <a href="<?= site_url('transaksi/jabatan_pegawai'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">Jabatan Pegawai</span>
                </a>
              </li>

              <!-- <li class="kt-menu__item " aria-haspopup="true">
                <a href="<?= site_url('transaksi/pendidikan_pegawai'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">Riwayat Pendidikan Pegawai</span>
                </a>
              </li>

              <li class="kt-menu__item " aria-haspopup="true">
                <a href="<?= site_url('transaksi/pengalaman_pegawai'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">Riwayat Pengalaman Pegawai</span>
                </a>
              </li> -->

              <li class="kt-menu__item " aria-haspopup="true">
                <a href="<?= site_url('transaksi/pengundurandiri_pegawai'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">Pegawai Resign/Gugur</span>
                </a>
              </li>

            </ul>
          </div>
        </li>

        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
          <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
            <i class="kt-menu__link-icon flaticon-rotate"></i>
            <span class="kt-menu__link-text">
              HRD
            </span>
            <i class="kt-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
            <ul class="kt-menu__subnav">

              <li class="kt-menu__item " aria-haspopup="true">
                <a href="<?= site_url('transaksi/teguran_lisan'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">Teguran Lisan</span>
                </a>
              </li>

              <li class="kt-menu__item " aria-haspopup="true">
                <a href="<?= site_url('transaksi/surat_teguran'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">Surat Teguran</span>
                </a>
              </li>

              <li class="kt-menu__item " aria-haspopup="true">
                <a href="<?= site_url('transaksi/sp1'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">Surat Peringatan 1</span>
                </a>
              </li>

              <li class="kt-menu__item " aria-haspopup="true">
                <a href="<?= site_url('transaksi/sp2'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">Surat Peringatan 2</span>
                </a>
              </li>

              <li class="kt-menu__item " aria-haspopup="true">
                <a href="<?= site_url('transaksi/sp3'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">Surat Peringatan 3</span>
                </a>
              </li>

            </ul>
          </div>
        </li>

        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
          <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
            <i class="kt-menu__link-icon flaticon2-open-text-book"></i>
            <span class="kt-menu__link-text">Absensi</span>
            <span class="kt-menu__link-badge">
              <span class="kt-badge kt-badge--brand">2</span>
            </span>
            <i class="kt-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
            <ul class="kt-menu__subnav">

              <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                <span class="kt-menu__link">
                  <span class="kt-menu__link-text">Absensi</span>
                  <span class="kt-menu__link-badge">
                    <span class="kt-badge kt-badge--brand">2</span>
                  </span>
                </span>
              </li>

              <li class="kt-menu__item " aria-haspopup="true">
                <a href="<?= site_url('gaji/absensi_pegawai'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">
                    Cek Absensi
                  </span>
                </a>
              </li>

              <li class="kt-menu__item " aria-haspopup="true">
                <a href="<?= site_url('gaji/req_update_absen'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">
                    Request Update
                  </span>
                  <span class="kt-menu__link-badge">
                    <span class="kt-badge kt-badge--brand">2</span>
                  </span>
                </a>
              </li>

            </ul>
          </div>
        </li>

        <!-- <li class="kt-menu__item" aria-haspopup="true">
          <a href="<?= site_url('gaji/absensi_pegawai'); ?>" class="kt-menu__link ">
            <i class="kt-menu__link-icon flaticon2-open-text-book"></i>
            <span class="kt-menu__link-text">Absensi </span>
          </a>
        </li> -->

        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
          <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
            <i class="kt-menu__link-icon flaticon2-layers"></i>
            <span class="kt-menu__link-text">
              Master Data
            </span>
            <i class="kt-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
            <ul class="kt-menu__subnav">

              <li class="kt-menu__item " aria-haspopup="true">
                <a href="<?= site_url('master/area_kerja'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">
                    Data Area Kerja
                  </span>
                </a>
              </li>

              <li class="kt-menu__item " aria-haspopup="true">
                <a href="<?= site_url('master/sub_unit_kerja'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">
                    Data Sub Unit Kerja
                  </span>
                </a>
              </li>

              <!-- <li class="kt-menu__item " aria-haspopup="true">
                <a href="<?= site_url('master/supervisor'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">
                    Data Supervisor
                  </span>
                </a>
              </li> -->

              <li class="kt-menu__item " aria-haspopup="true">
                <a href="<?= site_url('master/outlet'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">
                    Data Office
                  </span>
                </a>
              </li>

            </ul>
          </div>
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

      <img class="kt-hidden" alt="Pic" src="<?= base_url() ?>assets2/media/users/300_21.jpg" />
      <span class="kt-header__topbar-icon kt-hidden-">

        <img src="<?= base_url() ?>assets/dist/img/avatar5.png" class="user-image" alt="User Image" />
      </span>
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

      <!--begin: Head -->
      <div class="kt-user-card kt-user-card--skin-dark " style="background-image: url(<?= base_url() ?>assets2/media/misc/bg-4.jpg)">
        <div class="kt-user-card__avatar">
          <img src="<?= base_url() ?>assets2/media/logos/ikon-msglow2.png" class="img-circle" alt="User Image" />


          <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
          <!-- <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">S</span> -->
        </div>
        <div class="kt-user-card__name">
          <span class="hidden-xs text-info"><?= $this->session->userdata('nama') ?></span>
        </div>
      </div>
      <!--end: Head -->

      <!--begin: Navigation -->
      <div class="kt-notification">
        <div class="kt-notification__custom kt-space-between pull-right">
          <a href="<?php echo site_url('transaksi_act/logout'); ?>" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign out</a>
        </div>
      </div>
      <!--end: Navigation -->
    </div>
  </div>

  <!--end: User bar -->
</div>
<!-- end:: Header Topbar -->
</div>