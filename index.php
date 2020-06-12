<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Login Cloud Storage">
	<meta name="author" content="Safe File">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

</head>

<body>
<?php
	
include('login.php'); // Includes Login Script

if(isset($_SESSION['name1'])){
header("location: home.php");
}

	$min_number = 10;
	$max_number = 150;

	$random_number1 = mt_rand($min_number, $max_number);
	$random_number2 = mt_rand($min_number, $max_number);
?>

<!--Navigation Bar-->

<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
<div class="container">
  		<a class="navbar-brand" href="#">Cloud Storage</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon"></span>
 			 </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.html">Register</a>
      </li>
    </ul>
  </div>
</div>
</nav>
	<br>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-50 p-b-50">
				<span class="login100-form-title p-b-41">
					Save Data Protect Your Self
				</span>
				<center></h3 class="text-danger">
					<?php echo $error;?>
					<?php echo $error1;?>
					<?php echo  	 $error2;?>
					</h3></center>
				<form class="login100-form validate-form p-b-33 p-t-5" action="" method="POST">

					<div class="wrap-input100 validate-input form_group" data-validate = "Email Address">
						<input class="input100" type="email" name="username" placeholder="Email Id" value="">
						<span class="focus-input100" data-placeholder="&#xe818;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<center><div class="wrap-input100">
						<?php
						echo $random_number1 . ' + ' . $random_number2     ;
					?><br>	

					</div></center>
					<input name="firstNumber" type="hidden" value="<?php echo $random_number1; ?>" />
					<input name="secondNumber" type="hidden" value="<?php echo $random_number2; ?>" />

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="text" name="captcha" placeholder="Enter Captcha	">
						<span class="focus-input100" data-placeholder="&#xe862;"></span>
					</div>
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" name="submit">
							Login
						</button>
					</div>
					<br>
					<center>Create a new Account <a class="text-danger"href="register.html">Register</a></center>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>


	<!-- Footer-->

 <footer class="py-5 bg-dark ">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; File Safe 2020</p>
    </div>
  </footer>


	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	

</body>
</html>
