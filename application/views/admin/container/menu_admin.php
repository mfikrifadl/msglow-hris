<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

  <!-- begin:: Aside Menu -->

  <?php
  $jml_notif_absen = "";
  $jml_notif_rec_staff = "";
  $jml_notif_rec_phl = "";
  foreach ($notif_absensi as $rowNotifAbsen) {
    $jml_notif_absen = $rowNotifAbsen['jml_update_temp'];
  }
  foreach ($jml_notif_psrt_diterima_staff as $rowNotifRecStaff) {
    $jml_notif_rec_staff = $rowNotifRecStaff['jml_lolos'] + $rowNotifRecStaff['jml_validasi'];
  }
  foreach ($jml_notif_psrt_diterima_phl as $rowNotifRecPhl) {
    $jml_notif_rec_phl = $rowNotifRecPhl['jml_lolos'] + $rowNotifRecPhl['jml_validasi'];
  }
  $tot_notif = $jml_notif_absen + $jml_notif_rec_staff + $jml_notif_rec_phl;
  $tot_notif_rec = $jml_notif_rec_staff + $jml_notif_rec_phl;
  ?>

  <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
      <ul class="kt-menu__nav ">

        <li class="kt-menu__item <?= $this->uri->segment(1) == '' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
          <a href="<?= base_url() ?>" class="kt-menu__link">
            <i class="kt-menu__link-icon flaticon2-setup"></i>
            <span class="kt-menu__link-text">Dashboard </span>
          </a>
        </li>
        <li class="kt-menu__item  kt-menu__item--submenu <?= $this->uri->segment(1) == 'recruitment' || $this->uri->segment(1) == 'recruitment_phl' ? 'kt-menu__item--open' : '' ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
          <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
            <i class="kt-menu__link-icon flaticon-users-1"></i>
            <span class="kt-menu__link-text">
              Recruitment
            </span>
            <span class="kt-menu__link-badge">
              <span class="kt-badge kt-badge--warning" style="color: black;">
                <?= $tot_notif_rec ?>
              </span>
            </span>
            <i class="kt-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
            <ul class="kt-menu__subnav">

              <li class="kt-menu__item  kt-menu__item--submenu <?= $this->uri->segment(1) == 'recruitment' ? 'kt-menu__item--open' : '' ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">
                    Staff
                  </span>
                  <span class="kt-menu__link-badge">
                    <span class="kt-badge kt-badge--warning" style="color: black;">
                      <?= $jml_notif_rec_staff ?>
                    </span>
                  </span>
                  <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">

                    <li class="kt-menu__item <?= $this->uri->segment(2) == 'wawancara' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                      <a href="<?= site_url('recruitment/wawancara'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Administrasi
                        </span>
                      </a>
                    </li>

                    <li class="kt-menu__item <?= $this->uri->segment(2) == 'psiko_test' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                      <a href="<?= site_url('recruitment/psiko_test'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Psiko Test
                        </span>
                      </a>
                    </li>
                    <li class="kt-menu__item <?= $this->uri->segment(2) == 'uji_kompetensi' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                      <a href="<?= site_url('recruitment/uji_kompetensi'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Uji Kompetensi
                        </span>
                      </a>
                    </li>
                    <li class="kt-menu__item <?= $this->uri->segment(2) == 'interview_user_1' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                      <a href="<?= site_url('recruitment/interview_user_1'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Interview User 1
                        </span>
                      </a>
                    </li>
                    <li class="kt-menu__item <?= $this->uri->segment(2) == 'interview_user_2' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                      <a href="<?= site_url('recruitment/interview_user_2'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Interview User 2
                        </span>
                      </a>
                    </li>

                    <li class="kt-menu__item <?= $this->uri->segment(2) == 'interview_hrga' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                      <a href="<?= site_url('recruitment/interview_hrga'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Interview HRGA
                        </span>
                      </a>
                    </li>

                    <li class="kt-menu__item <?= $this->uri->segment(2) == 'tes_kesehatan' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                      <a href="<?= site_url('recruitment/tes_kesehatan'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Tes Kesehatan
                        </span>
                      </a>
                    </li>

                    <li class="kt-menu__item <?= $this->uri->segment(2) == 'peserta_diterima' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                      <a href="<?= site_url('recruitment/peserta_diterima'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Peserta Diterima
                        </span>
                        <span class="kt-menu__link-badge">
                          <span class="kt-badge kt-badge--warning" style="color: black;">
                            <?= $jml_notif_rec_staff ?>
                          </span>
                        </span>
                      </a>
                    </li>

                    <li class="kt-menu__item <?= $this->uri->segment(2) == 'monitoring_status' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
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

              <li class="kt-menu__item  kt-menu__item--submenu <?= $this->uri->segment(1) == 'recruitment_phl' ? 'kt-menu__item--open' : '' ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">
                    PHL
                  </span>
                  <span class="kt-menu__link-badge">
                    <span class="kt-badge kt-badge--warning" style="color: black;">
                      <?= $jml_notif_rec_phl ?>
                    </span>
                  </span>
                  <i class="kt-menu__ver-arrow la la-angle-right">
                  </i>
                </a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">

                    <li class="kt-menu__item <?= $this->uri->segment(2) == 'administrasi' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                      <a href="<?= site_url('recruitment_phl/administrasi'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Administrasi
                        </span>
                      </a>
                    </li>

                    <li class="kt-menu__item <?= $this->uri->segment(2) == 'wawancara_hr' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                      <a href="<?= site_url('recruitment_phl/wawancara_hr'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Wawancara HR
                        </span>
                      </a>
                    </li>
                    <li class="kt-menu__item <?= $this->uri->segment(2) == 'interview_user_1' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                      <a href="<?= site_url('recruitment_phl/interview_user_1'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Interview User 1
                        </span>
                      </a>
                    </li>

                    <li class="kt-menu__item <?= $this->uri->segment(2) == 'tes_kesehatan_phl' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                      <a href="<?= site_url('recruitment_phl/tes_kesehatan_phl'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Tes Kesehatan PHL
                        </span>
                      </a>
                    </li>

                    <li class="kt-menu__item <?= $this->uri->segment(2) == 'peserta_diterima' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                      <a href="<?= site_url('recruitment_phl/peserta_diterima'); ?>" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="kt-menu__link-text">
                          Peserta Diterima
                        </span>
                        <span class="kt-menu__link-badge">
                          <span class="kt-badge kt-badge--warning" style="color: black;">
                            <?= $jml_notif_rec_phl ?>
                          </span>
                        </span>
                      </a>
                    </li>

                    <li class="kt-menu__item <?= $this->uri->segment(2) == 'monitoring_status' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
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

        <!-- <li class="kt-menu__item <?= $this->uri->segment(2) == 'pengajuan_form_karyawan' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
          <a href="<?= site_url('transaksi/pengajuan_form_karyawan'); ?>" class="kt-menu__link ">
            <i class="kt-menu__link-icon flaticon2-document"></i>
            <span class="kt-menu__link-text">Pengajuan Tambah Karyawan </span>
          </a>
        </li> -->

        <li class="kt-menu__item  kt-menu__item--submenu <?= $this->uri->segment(1) == 'transaksi' ? 'kt-menu__item--open' : '' ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
          <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
            <i class="kt-menu__link-icon flaticon2-user"></i>
            <span class="kt-menu__link-text">Pegawai</span>
            <i class="kt-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
            <ul class="kt-menu__subnav">
              <li class="kt-menu__item <?= $this->uri->segment(2) == 'pegawai' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                <a href="<?= site_url('transaksi/pegawai'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">Data Pegawai Staff</span>
                </a>
              </li>

              <li class="kt-menu__item <?= $this->uri->segment(2) == 'kontrak' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                <a href="<?= site_url('transaksi/kontrak'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">Form Kontrak Pegawai</span>
                </a>
              </li>

              <li class="kt-menu__item <?= $this->uri->segment(2) == 'pengajuan_form_karyawan' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                <a href="<?= site_url('transaksi/pengajuan_form_karyawan'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">Pengajuan Tambah Karyawan</span>
                </a>
              </li>

              <li class="kt-menu__item <?= $this->uri->segment(2) == 'jabatan_pegawai' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
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

              <li class="kt-menu__item <?= $this->uri->segment(2) == 'pengundurandiri_pegawai' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
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

        <li class="kt-menu__item  kt-menu__item--submenu <?= $this->uri->segment(1) == 'hrd' ? 'kt-menu__item--open' : '' ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
          <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
            <i class="kt-menu__link-icon flaticon-rotate"></i>
            <span class="kt-menu__link-text">
              HRD
            </span>
            <i class="kt-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
            <ul class="kt-menu__subnav">

              <li class="kt-menu__item <?= $this->uri->segment(2) == 'teguran_lisan' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                <a href="<?= site_url('hrd/teguran_lisan'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">Teguran Lisan</span>
                </a>
              </li>

              <li class="kt-menu__item <?= $this->uri->segment(2) == 'surat_teguran' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                <a href="<?= site_url('hrd/surat_teguran'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">Surat Teguran</span>
                </a>
              </li>

              <li class="kt-menu__item <?= $this->uri->segment(2) == 'sp' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                <a href="<?= site_url('hrd/sp'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">Surat Peringatan</span>
                </a>
              </li>

              <!-- <li class="kt-menu__item " aria-haspopup="true">
                <a href="<?php //echo  site_url('transaksi/sp2'); 
                          ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">Surat Peringatan 2</span>
                </a>
              </li>

              <li class="kt-menu__item " aria-haspopup="true">
                <a href="<?php //echo site_url('transaksi/sp3'); 
                          ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">Surat Peringatan 3</span>
                </a>
              </li> -->

            </ul>
          </div>
        </li>

        <!-- <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
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
              </li> -->

        <!-- <li class="kt-menu__item " aria-haspopup="true">
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
              </li> -->
        <!-- 
            </ul>
          </div>
        </li> -->

        <li class="kt-menu__item  <?= $this->uri->segment(2) == 'absensi_pegawai' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
          <a href="<?= site_url('gaji/absensi_pegawai'); ?>" class="kt-menu__link kt-menu__toggle">
            <i class="kt-menu__link-icon flaticon2-open-text-book"></i>
            <span class="kt-menu__link-text">
              Absensi
            </span>
            <span class="kt-menu__link-badge">
              <span class="kt-badge kt-badge--warning" style="color: black;">
                <?= $jml_notif_absen ?>
              </span>
            </span>
          </a>
        </li>

        <li class="kt-menu__item  <?= $this->uri->segment(2) == 'absensi_pegawai' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
          <a href="<?= site_url('gaji/import_data_pegawai'); ?>" class="kt-menu__link kt-menu__toggle">
            <i class="kt-menu__link-icon flaticon2-open-text-book"></i>
            <span class="kt-menu__link-text">
              Import Data Pegawai
            </span>
            <span class="kt-menu__link-badge">
              <span class="kt-badge kt-badge--warning" style="color: black;">
                <?= $jml_notif_absen ?>
              </span>
            </span>
          </a>
        </li>

        <li class="kt-menu__item  kt-menu__item--submenu <?= $this->uri->segment(1) == 'master' ? 'kt-menu__item--open' : '' ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
          <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
            <i class="kt-menu__link-icon flaticon2-layers"></i>
            <span class="kt-menu__link-text">
              Master Data
            </span>
            <i class="kt-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
            <ul class="kt-menu__subnav">

              <li class="kt-menu__item <?= $this->uri->segment(2) == 'area_kerja' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                <a href="<?= site_url('master/area_kerja'); ?>" class="kt-menu__link ">
                  <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="kt-menu__link-text">
                    Data Area Kerja
                  </span>
                </a>
              </li>

              <li class="kt-menu__item <?= $this->uri->segment(2) == 'sub_unit_kerja' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
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

              <li class="kt-menu__item <?= $this->uri->segment(2) == 'outlet' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
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

  <!--begin: Notifications -->
  <div class="kt-header__topbar-item dropdown">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
      <span class="kt-header__topbar-icon kt-header__topbar-icon--success">
        <span class="kt-menu__link-badge">
          <span class="kt-badge kt-badge--warning" style="color: black;">
            <?= $tot_notif ?>
          </span>
        </span>
        <i class="flaticon2-bell-alarm-symbol"></i>
      </span>
      <span class="kt-hidden kt-badge kt-badge--danger"></span>
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
      <form>

        <!--begin: Head -->
        <div class="kt-head kt-head--skin-dark kt-head--fit-x kt-head--fit-b" style="background-image: url(<?= base_url() ?>assets2/media/misc/bg-1.jpg)">
          <h3 class="kt-head__title">
            <?= $this->session->userdata('nama') ?>
            &nbsp;
            <span class="btn btn-success btn-sm btn-bold btn-font-md">
              <?= $tot_notif ?> new
            </span>
          </h3>
          <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-success kt-notification-item-padding-x" role="tablist">
            <li class="nav-item">
              <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications" role="tab" aria-selected="true">Absensi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#topbar_notifications_events" role="tab" aria-selected="false">Recruitment Staff</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs" role="tab" aria-selected="false">Recruitment PHL</a>
            </li>
          </ul>
        </div>

        <!--end: Head -->
        <div class="tab-content">
          <div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
            <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">

              <?php
              foreach ($data_notif_absen as $rowNotif) {
                //echo $rowNotif['jml_update_temp'];
              ?>
                <a href="<?= site_url('gaji/data_notif_absen/' . $rowNotif['id_temp']); ?>" class="kt-notification__item">
                  <div class="kt-notification__item-icon">
                    <i class="flaticon2-box-1 kt-font-brand"></i>
                  </div>
                  <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                      <?php
                      $notif_nama = "";
                      if (empty($rowNotif['nama'])) {
                        $notif_nama = "Unknown";
                      } else {
                        $notif_nama = $rowNotif['nama'];
                      }
                      ?>
                      <?= $notif_nama ?>
                    </div>
                    <div class="kt-notification__item-time">
                      <?= $rowNotif['tgl_update_temp'] ?>
                    </div>
                  </div>
                </a>
              <?php
              }
              ?>






              <!-- CONTOH PESAN JIKA SUDAH TERBACA -->

              <!-- <a href="#" class="kt-notification__item kt-notification__item--read">
                <div class="kt-notification__item-icon">
                  <i class="flaticon2-safe kt-font-primary"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    Company meeting canceled
                  </div>
                  <div class="kt-notification__item-time">
                    19 hrs ago
                  </div>
                </div>
              </a> -->

              <!-- END CONTOH PESAN JIKA SUDAH TERBACA -->



            </div>
          </div>

          <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
            <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
              <?php
              foreach ($data_notif_recruitment_staff as $rowNotifRecruitment) {
              ?>
                <a href="<?= site_url('recruitment/data_notif_staff/' . $rowNotifRecruitment['id_recruitment']) ?>" class="kt-notification__item">
                  <div class="kt-notification__item-icon">
                    <i class="flaticon2-box-1 kt-font-brand"></i>
                  </div>
                  <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                      <?= $rowNotifRecruitment['nama'] ?>
                    </div>
                    <div class="kt-notification__item-time">
                      23 hrs ago
                    </div>
                  </div>
                </a>
              <?php
              }
              ?>
            </div>
          </div>

          <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
            <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
              <?php
              foreach ($data_notif_recruitment_staff as $rowNotifRecruitment) {
              ?>
                <a href="<?= site_url('recruitment/data_notif_staff/' . $rowNotifRecruitment['id_recruitment']) ?>" class="kt-notification__item">
                  <div class="kt-notification__item-icon">
                    <i class="flaticon2-box-1 kt-font-brand"></i>
                  </div>
                  <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                      <?= $rowNotifRecruitment['nama'] ?>
                    </div>
                    <div class="kt-notification__item-time">
                      23 hrs ago
                    </div>
                  </div>
                </a>
              <?php
              }
              ?>
            </div>
          </div>

          <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
            <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
              <?php
              foreach ($data_notif_recruitment_phl as $rowNotifRecruitmentPhl) {
              ?>
                <a href="<?= site_url('recruitment_phl/data_notif_phl/' . $rowNotifRecruitmentPhl['id_recruitment_phl']) ?>" class="kt-notification__item">
                  <div class="kt-notification__item-icon">
                    <i class="flaticon2-box-1 kt-font-brand"></i>
                  </div>
                  <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                      <?= $rowNotifRecruitmentPhl['nama'] ?>
                    </div>
                    <div class="kt-notification__item-time">
                      23 hrs ago
                    </div>
                  </div>
                </a>
              <?php
              }
              ?>
            </div>
          </div>

          <!-- <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
            <div class="kt-grid kt-grid--ver" style="min-height: 200px;">
              <div class="kt-grid kt-grid--hor kt-grid__item kt-grid__item--fluid kt-grid__item--middle">
                <div class="kt-grid__item kt-grid__item--middle kt-align-center">

                </div>
              </div>
            </div>
          </div> -->

        </div>
      </form>
    </div>
  </div>

  <!--end: Notifications -->


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