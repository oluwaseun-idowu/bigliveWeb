<?php 

include('dbcon.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Big Live Auditions</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/colorib/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/colorib/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/colorib/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/colorib/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/colorib/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/colorib/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/colorib/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/colorib/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/colorib/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/colorib/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	
	<div class="container-login100" style="background-image: url('assets/colorib/images/main.jpg');">
	
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
		<div class="text-left" style="margin-left: -5%;margin-top: -25%;margin-bottom: 0%;width:10px;">
			<a href="index.php" class="login100-form-btn" style="width: 5px;background-color: red;color:white">
				<i class="carousel-control-prev-icon"></i>Back
			</a>
		</div>
		<span class="login100-form-title p-b-37"><img src="images/reglogo.png" class="img-fluid" height="100px" width="200px" alt=""></span>
			<form class="login100-form validate-form" method="POST" action="register_exec.php" enctype="multipart/form-data">
				<span class="login100-form-title p-b-37">
					Register Form
				</span>
				
				<div class="wrap-input100 validate-input m-b-5" data-validate="Enter FirstName">					
					<input class="input100" type="text" name="firstname" placeholder="First Name">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input m-b-5" data-validate="Enter Lastname">					
					<input class="input100" type="text" name="lastname" placeholder="Last Name">
					<span class="focus-input100"></span>
				</div>
				

				<div class="wrap-input100 validate-input m-b-5" data-validate = "Enter Nickname">
					<input class="input100" type="text" name="nickname" placeholder="Nickname">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-5" data-validate="Enter Email">
					<input class="input100" type="email" name="email" placeholder="Email">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-5" data-validate = "Enter mobile Number">
					<input class="input100" type="text" name="phonenumber" placeholder="phone Number">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-5" data-validate="Enter your Talent">
					<input class="input100" type="text" name="talent" placeholder="Talent">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-5" data-validate = "Enter Style/Genre">
					<input class="input100" type="text" name="style" placeholder="Style/Genre">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-5" data-validate="Enter Location">
					<input class="input100" type="text" name="location" placeholder="Location">
					<span class="focus-input100"></span>
				</div>

				Photo: <input class="input100" type="file" name="anyfile" id="anyfile" required>
				

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit" name="submit" style="background-color:red">
						Register
					</button>
				</div>

				
				
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="assets/colorib/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/colorib/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/colorib/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/colorib/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/colorib/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/colorib/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/colorib/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="assets/colorib/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assets/colorib/js/main.js"></script>

</body>
</html>