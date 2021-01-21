    <header class="main-header">               
        <nav class="navbar navbar-static-top">
          <div class="container-fluid">
          <div class="navbar-header">
            <a href="" class="navbar-brand">
              <img src="<?=base_url()?>upload/logo_nitro.jpg" style="height:30px"></b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right ">
               <li><a href="<?=base_url()?>"><i class="fa fa-home"></i> Beranda</a></li> 
                <li class="dropdown-submenu">
                <a tabindex="-1" href="#"><i class="fa fa-book"></i> Surat</a>
                <ul class="dropdown-menu">
                  <li class="dropdown-submenu">
                  <a href="#"><i class="fa fa-phone"></i> Surat Panggilan</a>
                   <ul class="dropdown-menu">
                        <li><a href="<?=site_url('surat/panggilan_pegawai/18')?>"><i class="fa fa-hand-o-right"></i> Operator</a></li>
                        <li><a href="<?=site_url('surat/panggilan_pegawai/19')?>"><i class="fa fa-hand-o-right"></i> Emergency</a></li>
                        <li><a href="<?=site_url('surat/panggilan_pegawai/20')?>"><i class="fa fa-hand-o-right"></i> Supervisor</a></li>
                        <li><a href="<?=site_url('surat/panggilan_pegawai/21')?>"><i class="fa fa-hand-o-right"></i> Tim Omset</a></li>
                        <li><a href="<?=site_url('surat/panggilan_pegawai/22')?>"><i class="fa fa-hand-o-right"></i> Assistant Trainer</a></li>
                        <li><a href="<?=site_url('surat/panggilan_pegawai/23')?>"><i class="fa fa-hand-o-right"></i> Kepala Trainer</a></li>
                    </ul>
                  </li>
                  <li><a href="<?=site_url('surat/pernyataan_pegawai')?>"><i class="fa fa-check"></i> Surat Peryataan</a></li> 
                  <li><a href="<?=site_url('surat/surat_peringatan_1')?>"><i class="fa fa-suitcase"></i> Surat SP1</a></li>  
                  <li><a href="<?=site_url('surat/surat_peringatan_2')?>"><i class="fa fa-sort-amount-desc"></i> Surat SP2</a></li>
                  <li><a href="<?=site_url('surat/surat_teguran')?>"><i class="fa fa-exclamation"></i> Surat Teguran</a></li>
                  <li><a href="<?=site_url('surat/berita_acara')?>"><i class="fa fa-exclamation"></i> Berita Acara </a></li>
                  <li><a href="<?=site_url('surat/istirahat_pegawai')?>"><i class="fa fa-spinner"></i> Surat Istirahat</a></li>
                  <li><a href="<?=site_url('surat/skorsing_pegawai')?>"><i class="fa fa-tasks"></i> Surat Skorsing</a></li>                      
                  <li class="dropdown-submenu">
                    <a href="#"><i class="fa fa-indent"></i> Surat Mutasi</a>
                   <ul class="dropdown-menu">
                        <li><a href="<?=site_url('surat/mutasi_pegawai/11')?>"><i class="fa fa-hand-o-right"></i> Operator</a></li>
                        <li><a href="<?=site_url('surat/mutasi_pegawai/12')?>"><i class="fa fa-hand-o-right"></i> Emergency</a></li>
                        <li><a href="<?=site_url('surat/mutasi_pegawai/14')?>"><i class="fa fa-hand-o-right"></i> Supervisor</a></li>
                        <li><a href="<?=site_url('surat/mutasi_pegawai/15')?>"><i class="fa fa-hand-o-right"></i> Tim Omset</a></li>
                        <li><a href="<?=site_url('surat/mutasi_pegawai/16')?>"><i class="fa fa-hand-o-right"></i> Assistant Trainer</a></li>
                        <li><a href="<?=site_url('surat/mutasi_pegawai/17')?>"><i class="fa fa-hand-o-right"></i> Kepala Trainer</a></li>
                    </ul>
                  </li>
                  <li class="dropdown-submenu">
                    <a href="#"><i class="fa  fa-share-square-o"></i> Surat Tugas</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?=site_url('surat/tugas_pegawai/24')?>"><i class="fa fa-hand-o-right"></i> Operator</a></li>
                        <li><a href="<?=site_url('surat/tugas_pegawai/25')?>"><i class="fa fa-hand-o-right"></i> Emergency</a></li>
                        <li><a href="<?=site_url('surat/tugas_pegawai/26')?>"><i class="fa fa-hand-o-right"></i> Trainer</a></li>
                        <li><a href="<?=site_url('surat/tugas_pegawai/27')?>"><i class="fa fa-hand-o-right"></i> Dongkrak</a></li>
                        <li><a href="<?=site_url('surat/tugas_pegawai/28')?>"><i class="fa fa-hand-o-right"></i> SPV</a></li>
                        <li><a href="<?=site_url('surat/tugas_pegawai/29')?>"><i class="fa fa-hand-o-right"></i> Tim Pembina</a></li>
                        <li><a href="<?=site_url('surat/tugas_pegawai/30')?>"><i class="fa fa-hand-o-right"></i> Tim Omset</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
                <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?=base_url()?>assets/dist/img/avatar5.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?=$this->session->userdata('user')?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?=base_url()?>upload/nitrogen.png" class="img-circle" alt="User Image" />
                    <p>
                      Administrator - Staff IT Departement
                      <small>Build System On 20 Ocotber 2015 </small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?=site_url('transaksi_act/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>