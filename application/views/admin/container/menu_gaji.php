    <header class="main-header">               
      <nav class="navbar navbar-static-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a href="" class="navbar-brand">
              <img src="<?=base_url()?>upload/logo_nitro.jpg" style="height:30px"></b> </a> 
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
              <ul class="nav navbar-nav navbar-right ">
                <li><a href="<?=base_url()?>"><i class="fa fa-user"></i> Hai , <?=$this->session->userdata('nama')?></a></li> 
                <li><a href="<?=base_url()?>"><i class="fa fa-home"></i> Beranda</a></li> 
                
               

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-windows"></i> Pegawai <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?=site_url('transaksi/pegawai')?>"><i class="fa fa-group"></i> Data Pegawai</a></li> 
                   
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-building-o"></i> Data Outlet & SPV <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">

                    
                                    
                    <li><a href="<?=site_url('master/supervisor')?>"><i class="fa fa-user"></i> Data Supervisor</a></li>

                    <li><a href="<?=site_url('master/outlet')?>"><i class="fa fa-archive"></i> Data Outlet</a></li>
            
                  </ul>
                </li>
               
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-dollar"></i> Gaji <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?=site_url('gaji/absen')?>"><i class="fa fa-money"></i> Perhitungan Gaji</a></li> 
                    <li><a href="<?=site_url('gaji/slip')?>"><i class="fa fa-print"></i> Cetak Slip Gaji</a></li>
                    <li><a href="<?=site_url('gaji/rekap_gaji')?>"><i class="fa fa-print"></i> Laporan / Rekap Gaji</a></li>
                  </ul>
                </li>
                
                
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?=base_url()?>assets/dist/img/avatar5.png" class="user-image" alt="User Image"/>
                    <span class="hidden-xs"><?=$this->session->userdata('nama')?></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="<?=base_url()?>upload/nitrogen.png" class="img-circle" alt="User Image" />
                      <p>
                        <?=$this->session->userdata('nama')?>
                        <small>Build System On 28 Mei 2019 </small>
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