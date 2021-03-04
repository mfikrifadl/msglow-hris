<!DOCTYPE html>
<html lang="en">

<head>
	<title>MS GLOW KEPEGAWAIAN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<!-- <link rel="icon" type="<?= base_url() ?>assets2/login/image/png" href="images/icons/favicon.ico" /> -->
	<link rel="icon" href="<?= base_url() ?>assets2/media/logos/title-ikon-msglow2.png" type="image/png" sizes="16x16" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets2/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets2/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets2/login/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets2/login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets2/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets2/login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets2/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets2/login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets2/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets2/login/css/main.css">
	<!--===============================================================================================-->
	<link href="<?= base_url() ?>assets2/plugins/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="<?= base_url() ?>assets2/media/logos/title-ikon-msglow.png" />
</head>

<body>


	<!-- <div class="container-login100" style="background-image: url('<?= base_url() ?>assets2/login/images/bg-10.jpg');"> -->
	<div class="container-login100" style="background-image: url('<?= base_url() ?>assets2/login/images/bg-01.jpg');">
		<div>
			<div class="kt-login__logo p-l-80 p-r-55 p-t-0 p-b-20">
				<img src="<?= base_url() ?>assets2/media/logos/logo.png">
			</div>
			<div class="wrap-login100 p-l-55 p-r-55 p-t-30 p-b-30">
				<form action="<?= site_url('transaksi_act/LoginAdmin') ?>" method="post" class="login100-form validate-form">

					<span class="login100-form-title p-b-37">
						Sign In
					</span>

					<?php

					if ($notif == "Username / Password Salah") {
					?>
						<div class="alert alert-danger fade show" role="alert">
							<div class="alert-icon"><i class="flaticon-warning"></i></div>
							<div class="alert-text">Username / Password Salah !!!</div>
							<div class="alert-close">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true"><i class="la la-close"></i></span>
								</button>
							</div>
						</div>

					<?php
					} else {
					?>

					<?php
					}
					?>

					<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
						<input class="input100" type="text" name="username" placeholder="Username" required="required" autocomplete="off">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-25" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password" required="required" autocomplete="off">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Sign In
						</button>
					</div>

					<div class="text-center p-t-57 p-b-20">

					</div>

					<div class="flex-c p-b-32">

					</div>

					<div class="text-center">

					</div>


				</form>


			</div>
		</div>



	</div>



	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets2/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets2/login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets2/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url() ?>assets2/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets2/login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets2/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url() ?>assets2/login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets2/login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets2/login/js/main.js"></script>

	<script src="<?= base_url() ?>assets2/plugins/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets2/plugins/general/js/global/integration/plugins/sweetalert2.init.js" type="text/javascript"></script>

</body>

</html>