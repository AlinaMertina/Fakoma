<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/bootstrap/css/bootstrap.min.css");?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css"); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/fonts/iconic/css/material-design-iconic-font.min.css"); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/animate/animate.css"); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/css-hamburgers/hamburgers.min.css"); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/animsition/css/animsition.min.css"); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/select2/select2.min.css"); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/daterangepicker/daterangepicker.css"); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/Login/util.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/Login/main.css"); ?>">
<!--===============================================================================================-->
</head>

<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-color: #47C2FF;">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54 content" >
				<form action="<?= bu('CT_Login/login');?>" method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Type your username" value="TOTO Mertina Claudie">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Type your password" value="mertina44">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>


					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"> </div>
	
<!--===============================================================================================-->
	<script src="<?= base_url("assets/vendor/jquery/jquery-3.2.1.min.js"); ?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url("assets/vendor/animsition/js/animsition.min.js"); ?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url("assets/vendor/bootstrap/js/popper.js"); ?>"></script>
	<script src="<?= base_url("assets/bootstrap/jsbootstrap.min.js"); ?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url("assets/vendor/select2/select2.min.js"); ?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url("assets/vendor/daterangepicker/moment.min.js"); ?>"></script>
	<script src="<?= base_url("assets/vendor/daterangepicker/daterangepicker.js"); ?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url("assets/vendor/countdowntime/countdowntime.js"); ?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url("assets/Login/js/main.js"); ?>"></script>

</body>
</html>
