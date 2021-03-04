 <? 
    session_start(); 
    ini_set("display_errors",0);
    if (isset($_GET['Input'])) {
    $id = $_GET['id'];
    $page = $_GET['page'];} 
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Parameter</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By ProX team">
    <link rel="shortcut icon" href="../images/ico/favicon.ico">
    <!-- bootstrap 3.0.2 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
    <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="../css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" />    


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

          <style type="text/css">

          </style>    
      </head>
      <body class="skin-black fixed">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="../home.php" class="logo">
                <img src="../images/logo.png" alt="logo"  height="75%">
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <?php require_once("navbar.php"); ?>
                </header>
                <div class="wrapper row-offcanvas row-offcanvas-left">
                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="left-side sidebar-offcanvas">
                        <!-- sidebar: style can be found in sidebar.less -->
                        <section class="sidebar">
                            <!-- Sidebar user panel -->
                            <div class="user-panel">
                                <div class="pull-left image">
                                    <img src="../img/26115.jpg" class="img-circle" alt="User Image" />
                                </div>
                                <div class="pull-left info">
                                    <p>Halo,<? if(isset($_SESSION['user']) ) { echo $_SESSION['user'] ; }  else { echo "Pengguna";}?></p>
                                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                                </div>
                            </div>
                            <!-- sidebar menu: : style can be found in sidebar.less -->
                            <ul class="sidebar-menu">
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-dashboard"></i> <span>Panel Kontrol</span> <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">                                       
                                        <?php $a='admin';$b='user';if($a==$_SESSION['tipe']  ) { ?>
                                            <li><a href="../home.php"><i class="fa fa-circle-o"></i> Halaman Awal</a></li>
                                            <li><a href="../pilih_site.php"><i class="fa fa-circle-o"></i> Pilih Data Site</a></li>
                                            <li><a href="../add.php"><i class="fa fa-circle-o"></i> Tambah Data Site</a></li>
                                            <li><a href="../pilih_site.php?&page=remove&Input=Input"><i class="fa fa-circle-o"></i> Hapus Data Site</a></li>
                                        <?php } elseif($b==$_SESSION['tipe'] ){ ?> 
                                            <li><a href="../home.php"><i class="fa fa-circle-o"></i> Halaman Awal</a></li>
                                            <li><a href="../pilih_site.php"><i class="fa fa-circle-o"></i> Pilih Data Site</a></li>
                                        <?php } else { ?> 
                                            <li><a href="../index.html"><i class="fa fa-circle-o"></i> Halaman Awal</a></li>
                                        <?php}?>                                                                                   
                                    </ul>
                                </li>                                                                
                                 <li>
                                    <a onclick="history.go(-1);" href="#">
                                        <i class="fa fa-arrow-circle-left"></i><span>Kembali</span>
                                    </a>
                                </li> 
                            </ul>
                        </section>
                        <!-- /.sidebar -->
                    </aside>

                    <aside class="right-side">
                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <div class="col-md-12">
                            <section id="parameter">
                            <div class="panel">
                                <header class="panel-heading">
                                <?php  
							    if($page=='1') {echo "Penangkal Petir";}
                                elseif($page=='2') {echo "Pendukung Dalam Gedung";}
                                elseif($page=='3') {echo "Pendukung Luar Gedung";}
                                elseif($page=='4') {echo "Penerangan";}
                                elseif($page=='5') {echo "Catu Daya";}
                                elseif($page=='6') {echo "Tower";}
                                elseif($page=='7') {echo "Sistem Pendingin";}
                                ?>
                                </header>
                                <?php                                                                
                                if($page=='1') {require_once("1.php");}
                                elseif($page=='2') {require_once("2.php");}
                                elseif($page=='3') {require_once("3.php");}
                                elseif($page=='4') {require_once("4.php");}
                                elseif($page=='5') {require_once("5.php");}
                                elseif($page=='6') {require_once("6.php");}
                                elseif($page=='7') {require_once("7.php");}
                                ?>  
                            </div>
                            </section>    
                        </div></div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="panel">
                                <header class="panel-heading">
                                    Fasilitas
                                </header>

                                <ul class="list-group teammates">
                                    <li class="list-group-item">
                                        <a ><img src="../images/app.jpg" width="50" height="50"></a>
                                        <a ><b>Aplikasi Android</b><br>Android merupakan media aplikasi yang digunakan oleh user. Pada aplikasi android user  , aplikasi audit site dapat digunakan di handphone android.</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a ><img src="../images/web.jpg" width="50" height="50"></a>
                                        <a ><b>Website</b><br>Pada website digunakan oleh admin untuk mengecek apakah data yang di update oleh user sudah benar-benar tersimpan dalam web server apa belum.</a>
                                    </li>                                                                        
                                </ul>
                            </div>
                        </div> 
                        
                        <section id="kontak">
                        <div class="col-md-6">
                            <div class="panel">
                                <header class="panel-heading">
                                    Kontak
                                </header>

                                <ul class="list-group teammates">
                                    <li class="list-group-item"> 
                                        <strong>Aditya Rahman</strong><br>
                                        Malang, Jawa Timur, Indonesia<br>
                                        Phone: (+62)87859922499<br>                                        
                                    </li>
                                </ul>
                            </div>
                        </div> 
                       </section>
              </div>        
                    
                    
                </section><!-- /.content -->
                <div class="footer-main">
                    Copyright &copy; 2017 Designed by Aditya Rahman.
                </div>
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="../js/jquery.min.js" type="text/javascript"></script>

        <!-- jQuery UI 1.10.3 -->
        <script src="../js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

        <script src="../js/plugins/chart.js" type="text/javascript"></script>

        <!-- datepicker
        <script src="../js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="../js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- calendar -->
        <script src="../js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

        <!-- Director App -->
        <script src="../js/Director/app.js" type="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="../js/Director/dashboard.js" type="text/javascript"></script>

        <!-- Director for demo purposes -->
        <script type="text/javascript">
            $('input').on('ifChecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().addClass('highlight');
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().removeClass('highlight');
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });

        </script>
        <script>
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
</script>
<script type="text/javascript">
    $(function() {
                "use strict";
                //BAR CHART
                var data = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [65, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        }
                    ]
                };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
                responsive : true,
                maintainAspectRatio: false,
            });

            });
            // Chart.defaults.global.responsive = true;
</script>
            <!-- Filter Tabel App -->
            <script src="js/tablefilter_all_min.js"></script>
            <script src="js/table.js"></script>
</body>
</html><?php } ?>