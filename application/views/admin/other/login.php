
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem Kepegawaian Nirogen</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="MobileOptimized" content="320">
<link href="<?=base_url()?>upload/nitrogen.png" type="image/x-icon" rel="icon" />

	<link rel="stylesheet" type="text/css" 
	href="<?=base_url()?>assets/plugins/font-awesome/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/css/uniform/css/uniform.default.css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/css/style-metronic.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/css/style-responsive.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/css/plugins.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/css/themes/blue.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/css/login-soft.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/css/custom.css" />
<!-- END THEME STYLES -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<img src="<?=base_url()?>assets/login/img/logo.png" alt="" /></div>
<!-- END LOGO -->


<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN FLASH MESSAGE-->
		<!-- END FLASH MESSAGE-->
<h3 class="form-title">Login ke Demo</h3>
<p>Tidak perlu mendaftar. Silakan menggunakan email pribadi Anda. Untuk mengakses Akun Demo.</p>
	<form action="/demo" class="login-form" role="form" id="EmailAddForm" method="post" accept-charset="utf-8">
		<div style="display:none;">
			<input type="hidden" name="_method" value="POST"/>
			<input type="hidden" name="data[_Token][key]" value="fec5b839a962b4a47e79f285bed25042c57eb17a" 
			id="Token1891312121"/>
		</div>
		<div class="form-group required">
			<div class="input-icon">
			<i class="fa fa-user"></i>
			<input name="data[Email][name]" class="form-control placeholder-no-fix" 
			placeholder="Nama" maxlength="100" type="text" id="EmailName" required="required"/>
			</div>
		</div>
		<div class="form-group required">
			<div class="input-icon">
			<i class="fa fa-envelope"></i>
			<input name="data[Email][email]" class="form-control placeholder-no-fix" 
			placeholder="Alamat email" maxlength="100" type="email" id="EmailEmail" required="required"/>
			</div>
		</div>
		<div class="form-actions">
			<button class="btn blue pull-right" type="submit">
				Demo <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
</div>
<!-- END LOGIN -->
	

<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 2015&copy; Sistem Inventory oleh Lauw Bros.</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
	
	<script type="text/javascript" src="/js/respond.min.js"></script>
	<script type="text/javascript" src="/js/excanvas.min.js"></script>
 
<![endif]-->

	<script type="text/javascript" src="<?=base_url()?>assets/login/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/login/js/jquery-migrate-1.2.1.min.js"></script>

	<script type="text/javascript" src="<?=base_url()?>assets/login/js/jquery-ui/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/login/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/login/js/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/login/js/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/login/js/jquery.blockui.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/login/js/jquery.cokie.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/login/js/uniform/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/login/js/backstretch/jquery.backstretch.min.js"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script type="text/javascript" src="<?=base_url()?>assets/login/js/app.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/login/js/login-soft.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
	jQuery(document).ready(function() {    
		App.init();
		Login.init();
	    $('.form-group.error').addClass('has-error');
	});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>