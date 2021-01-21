<?php 
 if($this->session->userdata('nama') == '' ) {
      redirect(site_url('master/signin'));
      }
?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="UTF-8">
    <title>Selamat Datang di ERP GIU</title>
     <link href="<?=base_url()?>upload/nitrogen.png" type="image/x-icon" rel="icon" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?=base_url()?>assets/plugins/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/dist/font/font.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="<?=base_url()?>assets/bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Morris charts -->
    <link href="<?=base_url()?>assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=base_url()?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
   
    <?php 
    function String2Date($dTgl){
      //return 22-11-2012  
      list($cYear,$cMount,$cDate) = explode("-",$dTgl) ;
      if(strlen($cYear) == 4){
        $dTgl = $cDate . "-" . $cMount . "-" . $cYear ;
      } 
      return $dTgl ;  
    }
    function String2DateTime($dTgl){
      $cReturn    = "-" ; 
      if($dTgl !== "" && $dTgl !== "0000-00-00 00:00:00"){
        $cReturn  = date("d-m-Y H:i:s", strtotime($dTgl)) ; 
      }
      return $cReturn ;
    } 

    function CountUmur($Where){
      $link = @mysqli_connect('localhost', 'root', 'nitrogen123', 'si_pegawai'); 
      $db   = mysqli_query($link,"SELECT COUNT(umur) AS Result FROM tb_pegawai WHERE $Where");
      $data = mysqli_fetch_array($db);
      $cUmur = $data['Result'];
      return $cUmur ;
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
      
       <?php if($this->session->userdata('level') == 1){
              $cMenu  = 'menu_admin';
            }elseif($this->session->userdata('level') == 2){
              $cMenu  = 'menu_kepegawaian';
            }elseif($this->session->userdata('level') == 3){
              $cMenu  = 'menu_outlet';
            }elseif($this->session->userdata('level') == 4){
              $cMenu  = 'menu_penjualan';
            }elseif($this->session->userdata('level') == 5){
              $cMenu  = 'menu_gaji';
            }elseif($this->session->userdata('level') == 6){
              $cMenu  = 'menu_surat';
            }
      ?>
      <?php $this->load->view('admin/container/'.$cMenu.'') ?>
       <section class="content-header" style="box-shadow:1px 1px 1px #999;background:#fff">
          <h1>
            SISTEM INFORMASI KEPEGAWAIAN
            <small>Ver 2.0.0</small> - Selamat Datang <?=$this->session->userdata('nama')?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?=$menu?></a></li>
            <li class="active"><?=$file?></li>
          </ol>
        </section>
       <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
           <div class="col-sm-4">
           <br/>
             <div class="panel panel-success ">
               <div class="panel-heading">
                 <span class="fa fa-signal"></span> Usia Pegawai Dilihat Berdasarkan Grafik
                </div>
                <div class="panel-body"><br/><br/>
                  <div class="chart" id="bar-chart" style="height: 300px;"></div>
                </div>
             </div>
           </div>
           <div class="col-sm-8"><br/>
             <div class="panel panel-danger">
               <div class="panel-heading">
                 <span class="fa fa-signal"></span> Pendidikan Pegawai Dilihat Berdasarkan Grafik
                </div>
                <div class="panel-body"><br/><br/>
                  <div class="chart" id="pendidikan-chart" style="height: 300px;"></div>
                </div>
             </div>
           </div>
           <div class="col-sm-6"><br/>
             <div class="panel panel-info ">
               <div class="panel-heading">
                 <span class="fa fa-signal"></span> Area Kerja Pegawai Dilihat Berdasarkan Grafik
                </div>
                <div class="panel-body"><br/><br/>
                  <div class="chart" id="area-chart" style="height: 300px;"></div>
                </div>
             </div>
           </div>
           <div class="col-sm-6"><br/>
             <div class="panel panel-primary ">
               <div class="panel-heading">
                 <span class="fa fa-signal"></span> Status Pegawai Dilihat Berdasarkan Grafik
                </div>
                <div class="panel-body"><br/><br/>
                  <div class="chart" id="status-chart" style="height: 300px;"></div>
                </div>
             </div>
           </div>
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
         
        </div>
      </footer>
    </div><!-- ./wrapper -->
     <!-- jQuery 2.1.3 -->
    <script src="<?=base_url()?>assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="<?=base_url()?>assets/plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>  
    <!-- Morris.js charts -->
    <script src="<?=base_url()?>assets/plugins/morris/raphael-min.js"></script>
    <script src="<?=base_url()?>assets/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="<?=base_url()?>assets/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>  
    <!-- Slimscroll -->
    <script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/app.min.js" type="text/javascript"></script>
    
    <!-- page script -->
        <script type="text/javascript">
            $(function() {
                "use strict";
                //BAR CHART
                var bar = new Morris.Bar({
                    element: 'bar-chart',
                    resize: true,
                    data: [
                      
                     {y:'Umur:0-19', a: <?=CountUmur('umur < 20')?>},
                     {y:'Umur:20-24', a: <?=CountUmur('umur >= 20 AND umur <25')?>},
                     {y:'Umur:25-29', a: <?=CountUmur('umur >= 25 AND umur <30')?>},
                     {y:'Umur:30-39', a: <?=CountUmur('umur >= 30 AND umur <40')?>},
                     {y:'Umur:40..', a: <?=CountUmur('umur >= 40 ')?>},
                      
                    ],
                    barColors: ['#00a65a'],
                    xkey: 'y',
                    ykeys: ['a'],
                    labels: ['Jumlah'],
                    hideHover: 'auto'
                }).on('click', function(i, row){
                    window.location.href="<?=base_url()?>laporan/redirect/umur/"+row.y
                    console.log(i, row);
                });

                var bar = new Morris.Bar({
                    element: 'pendidikan-chart',
                    resize: true,
                    data: [
                      <?php foreach ($pendidikan as $key => $vaPendidikan) { ?>
                        {y: '<?=$vaPendidikan['nama_pendidikan']?>', a: <?=$vaPendidikan['Jumlah']?>},
                      <?php } ?>
                    ],
                    barColors: ['#f4543c'],
                    xkey: 'y',
                    ykeys: ['a'],
                    labels: ['Jumlah'],
                    hideHover: 'auto'
                }).on('click', function(i, row){
                    window.location.href="<?=base_url()?>laporan/redirect/pendidikan/"+row.y
                    console.log(i, row);
                });


                var bar = new Morris.Bar({
                    element: 'area-chart',
                    resize: true,
                    data: [
                      <?php foreach ($area as $key => $vaArea) { ?>
                        {y: '<?=$vaArea['title']?>', a: <?=$vaArea['Area']?>},
                      <?php } ?>
                    ],
                    barColors: ['#00c0ef'],
                    xkey: 'y',
                    ykeys: ['a'],
                    labels: ['Jumlah Pegawai'],
                    hideHover: 'auto'
                }).on('click', function(i, row){
                    window.location.href="<?=base_url()?>laporan/redirect/area/"+row.y
                    alert(row.y);
                    console.log(i, row);
                });

                var donut = new Morris.Donut({
                    element: 'status-chart',
                    resize: true,
                    colors: ["#00c0ef","#d81b60", "#ff851b","#dd4b39"],
                    data: [
                        <?php foreach ($status as $key => $vaStatus) { ?>
                        {loteria: "<?=$vaStatus['id_status']?>",label: "<?=$vaStatus['status']?>", value: <?=$vaStatus['Jumlah']?>},
                        <?php } ?>

                    ],
                    hideHover: 'auto',
                    show: true,
                    radius: 1,
                    innerRadius: 0.5
                }).on('click', function(i, row){
                    window.location.href="<?=base_url()?>laporan/redirect/status/"+row.loteria
                    alert(row.label);
                    console.log(i, row);
                });

                

              });
        </script>
  
      
  </body>
</html>
