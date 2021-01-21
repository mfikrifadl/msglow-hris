<?php
 function CountUmur($Where){
      $link = @mysqli_connect('localhost', 'root', 'nitrogen123', 'si_pegawai'); 
      $db   = mysqli_query($link,"SELECT COUNT(umur) AS Result FROM tb_pegawai WHERE $Where");
      $data = mysqli_fetch_array($db);
      $cUmur = $data['Result'];
      return $cUmur ;
    }
?>
<section>
    <div class="container">
     <div class="col-sm-12">
       <ul class="breadcrumb"><li><a href="<?=base_url()?>">Home</a></li>
        <li class=""><?=$menu?></li>
        <li class="active"><?=$file?></li>
      </ul>                    
     </div>
    </div>
     <!-- /.DataTable -->

    <div class="container">
      <div class="col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Menu Laporan Pegawai</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs" id="myTabs">
           <li class="active"><a href="#tab_1" data-toggle="tab">Umur</a></li>  
           <li><a href="#tab_2"  data-toggle="tab">Pendidikan</a></li> 
           <li><a href="#tab_3"  data-toggle="tab">Area Kerja</a></li> 
           <li><a href="#tab_4"  data-toggle="tab">Status Pegawai</a></li>  
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
          <!-- /.Content -->
            <div class="container" align="center">
              <div class="col-lg-4 col-xs-4">
              <a href="<?=base_url()?>laporan/redirect/umur/Umur:0-19">
                <div class="info-box bg-blue">
                  <span class="info-box-icon">
                    <i class="ion ion-android-printer"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Umur Pegawai 0 - 19 Tahun</span>
                    <span class="info-box-number">Total :  <?=CountUmur('umur < 20')?> Pegawai</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: <?=CountUmur('umur < 20')?>%"></div>
                    </div>
                    <span class="progress-description">
                      Data Sampai Tanggal <?=date("d-m-Y")?>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </a>
              </div><!-- ./col -->
              <div class="col-lg-4 col-xs-4">
               <a href="<?=base_url()?>laporan/redirect/umur/Umur:20-24">
                <div class="info-box bg-red">
                  <span class="info-box-icon">
                    <i class="ion ion-android-printer"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Umur Pegawai 20 - 24 Tahun</span>
                    <span class="info-box-number">Total :  <?=CountUmur('umur >= 20 AND umur <25')?> Pegawai</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: <?=CountUmur('umur >= 20 AND umur <25')?>%"></div>
                    </div>
                    <span class="progress-description">
                      Data Sampai Tanggal <?=date("d-m-Y")?>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
               </a>
              </div><!-- ./col -->
            </div>

            <div class="container" align="center">
              <div class="col-lg-4 col-xs-4">
              <a href="<?=base_url()?>laporan/redirect/umur/Umur:25-29">
                <div class="info-box bg-green">
                  <span class="info-box-icon">
                    <i class="ion ion-android-printer"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Umur Pegawai 25 - 29 Tahun</span>
                    <span class="info-box-number">Total :  <?=CountUmur('umur >= 25 AND umur <30')?> Pegawai</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: <?=CountUmur('umur >= 25 AND umur <30')?>%"></div>
                    </div>
                    <span class="progress-description">
                      Data Sampai Tanggal <?=date("d-m-Y")?>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </a>
              </div><!-- ./col -->
              <div class="col-lg-4 col-xs-4">
               <a href="<?=base_url()?>laporan/redirect/umur/Umur:30-39">
                <div class="info-box bg-aqua">
                  <span class="info-box-icon">
                    <i class="ion ion-android-printer"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Umur Pegawai 30 - 39 Tahun</span>
                    <span class="info-box-number">Total :  <?=CountUmur('umur >= 30 AND umur <40')?> Pegawai</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: <?=CountUmur('umur >= 30 AND umur <40')?>%"></div>
                    </div>
                    <span class="progress-description">
                      Data Sampai Tanggal <?=date("d-m-Y")?>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
               </a>
              </div><!-- ./col -->
            </div>

            <div class="container" align="center">
              <div class="col-lg-8 col-xs-8">
              <a href="<?=base_url()?>laporan/redirect/umur/Umur:40..">
                <div class="info-box bg-maroon">
                  <span class="info-box-icon">
                    <i class="ion ion-android-printer"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Umur Pegawai 40 >  Tahun</span>
                    <span class="info-box-number">Total :  <?=CountUmur('umur >= 40')?> Pegawai</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: <?=CountUmur('umur >= 40')?>%"></div>
                    </div>
                    <span class="progress-description">
                      Data Sampai Tanggal <?=date("d-m-Y")?>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </a>
              </div><!-- ./col -->
            </div>

          </div>
          <div class="tab-pane" id="tab_2">
           <div class="container">
              <?php  foreach ($pendidikan as $key => $vaPendidikan) { 
                $stack = array('blue','green','maroon','aqua','red');
              ?>
            <div class="row">
             <div class="col-lg-6 col-xs-6">
              <a href="<?=base_url()?>laporan/redirect/pendidikan/<?=$vaPendidikan['nama_pendidikan']?>">
                <div class="info-box bg-<?=$stack[array_rand($stack)]?>">
                  <span class="info-box-icon">
                    <i class="ion ion-android-printer"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Pendidikan <?=$vaPendidikan['nama_pendidikan']?> di PT.Global Insight Utama </span>
                    <span class="info-box-number">Total :  <?=$vaPendidikan['Jumlah']?> Pegawai</span>
                    <div class="progress">
                      <div class="progress-bar" style="width:<?=$vaPendidikan['Jumlah']?>%"></div>
                    </div>
                    <span class="progress-description">
                    Sampai Tanggal <?=date("d-m-Y")?>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </a>
              </div><!-- ./col -->
              </div>
            <?php } ?>
            </div>
          </div>
          <div class="tab-pane" id="tab_3">
           <div class="container">
              <?php  foreach ($area as $key => $vaArea){
                $stack = array('blue','green','maroon','aqua','red');
              ?>
            <div class="row">
             <div class="col-lg-6 col-xs-6">
              <a href="<?=base_url()?>laporan/redirect/area/<?=$vaArea['title']?>">
                <div class="info-box bg-<?=$stack[array_rand($stack)]?>">
                  <span class="info-box-icon">
                    <i class="ion ion-android-printer"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Area Kerja <?=$vaArea['nama_area']?></span>
                    <span class="info-box-number">Total :  <?=$vaArea['Area']?> Pegawai</span>
                    <div class="progress">
                      <div class="progress-bar" style="width:<?=$vaArea['Area']?>%"></div>
                    </div>
                    <span class="progress-description">
                    Sampai Tanggal <?=date("d-m-Y")?>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </a>
              </div><!-- ./col -->
              </div>
            <?php } ?>
            </div>
          </div>
          <div class="tab-pane" id="tab_4">
           <!-- /.Content -->
           <div class="container">
              <?php  foreach ($status as $key => $vaStatus){
                $stack = array('blue','green','maroon','aqua','red');
              ?>
            <div class="row">
             <div class="col-lg-6 col-xs-6">
              <a href="<?=base_url()?>laporan/redirect/status/<?=$vaStatus['id_status']?>">
                <div class="info-box bg-<?=$stack[array_rand($stack)]?>">
                  <span class="info-box-icon">
                    <i class="ion ion-android-printer"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Status Kerja <?=$vaStatus['status']?></span>
                    <span class="info-box-number">Total :  <?=$vaStatus['Jumlah']?> Pegawai</span>
                    <div class="progress">
                      <div class="progress-bar" style="width:<?=$vaStatus['Jumlah']?>%"></div>
                    </div>
                    <span class="progress-description">
                    Sampai Tanggal <?=date("d-m-Y")?>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </a>
              </div><!-- ./col -->
              </div>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div> 
    </div>  
  </div>
</section>
  
