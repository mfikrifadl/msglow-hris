
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<meta http-equiv="X-UA-Compatible" content="IE=Edge" ><title>Login Site | Admin Wadah Berita</title>
<link href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:extralight,light,regular,bold" media="screen" rel="stylesheet" type="text/css" >
<link href="http://fonts.googleapis.com/css?family=PT+Serif+Caption" media="screen" rel="stylesheet" type="text/css" >
<link href="<?=base_url()?>assets/login/css/reset.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?=base_url()?>assets/login/css/grid.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?=base_url()?>assets/login/css/style.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?=base_url()?>assets/login/css/ui/default-ui/ui.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?=base_url()?>assets/login/css/ui/default-ui/portlet.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?=base_url()?>assets/login/css/ui/default-ui/jquery.ui.uniform.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?=base_url()?>assets/login/css/ui/default-ui/colors/jquery.ui.colors.default.css" media="screen" rel="stylesheet" type="text/css" class="uicolor" >
<link href="<?=base_url()?>assets/login/css/forms.css" media="screen" rel="stylesheet" type="text/css" >
<!--[if lt IE 8]> <link href="/vpanel/css/ie.css" media="screen" rel="stylesheet" type="text/css" ><![endif]--><!--[if lt IE 9]> <script type="text/javascript" src="/vpanel/js/html5.js"></script><![endif]-->
<script type="text/javascript" src="<?=base_url()?>assets/login/js/jquery.min.js"></script>

<!--[if lt IE 9]> <script type="text/javascript" src="/vpanel/js/selectivizr.js"></script><![endif]-->
<!--[if lt IE 9]> <script type="text/javascript" src="/vpanel/js/ie.js"></script><![endif]-->

<script>
$(window).load(function(){
    $("#loading").fadeOut(function(){
        $(this).remove();
        $('body').css('overflow', 'auto');
    });
});
</script>

<style type = "text/css">
    body{overflow: hidden;}
    #container {position: absolute; top:50%; left:50%;}
    #content {width:800px; text-align:center; margin-left: -400px; height:50px; margin-top:-25px; line-height: 50px;}
    #content {font-family: "Helvetica", "Arial", sans-serif; font-size: 18px; color: black; text-shadow: 0px 1px 0px white; }
    #loadinggraphic {margin-right: 0.2em; margin-bottom:-2px;}
    #loading {background-color: #eeeeee; overflow:hidden; width:100%; height:100%; position: absolute; top: 0; left: 0; z-index: 9999;}
</style> 
<!-- LOADING SCRIPT END -->

</head>
<body class="login">

    <div id="loading"> 
        <script type = "text/javascript"> 
            document.write("<div id='container'><p id='content'>" +
                           "<img id='loadinggraphic' width='100' height='100' src='<?=base_url()?>assets/login/images/ajax-loader1.gif' /> " +
                           "</p></div>");
        </script> 
    </div> 

    <div class="login-box main-content">
      <header>
          <ul class="action-buttons clearfix">
             
              <li><img src="<?=base_url()?>/assets/dist/img/logo.png" style="width:100px;height:50px" alt="Logo Anda"></li>
              <li><img src="<?=base_url()?>/assets/dist/img/ide.png" style="width:50px;height:50px"></li>
          </ul>
          <h2>Login Site !</h2>
      </header>
      
    	<section>
    		<div class="ui-widget message notice">
                <div class="ui-state-highlight ui-corner-all">
                    <p>
                    <span class="ui-icon ui-icon-info"></span>
                       <?php 
                       if(empty($notif))
                        {
                        ?>
                        Selamat Datang Di Halaman Administrator Wadah Berita
                       
                        <?php }else{ ?>
                          <?=$notif?>
                        <?php } ?>
                    </p>
                </div>
            </div>
    		<form id="form" action="<?=site_url('admin/LoginAdmin')?>" method="post" class="clearfix">
                <p>
                    <input type="text" id="username"  class="large" value="" name="username" required="required" placeholder="Username" />
                    <input type="password" id="password" class="large" value="" name="password" required="required" placeholder="Password" />
                    <button class="large button-gray ui-corner-all fr" type="submit" name="login">Login</button>
                </p>
                <p class="clearfix">
                    <span class="fl">
                        <input type="checkbox" id="remember" class="" value="1" name="remember"/>
                        <label class="choice" for="remember">Remember Me</label>
                    </span>
                </p>
            </form>
            

    	</section>
    </div>
</body>
</html>