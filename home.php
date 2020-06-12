<?php
session_start();
if(isset($_SESSION['name1']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Home">
	<meta name="author" content="File Safe">
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

<!--Navigation Bar-->

<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
<div class="container">
  		<a class="navbar-brand" href="#"><img src="user.svg" width="30" height="30" class="align-top" alt="">	&nbsp;<?php echo $_SESSION['name1'];?></a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon"></span>
 			 </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout </a>
      </li>
      
    </ul>
  </div>
</div>
</nav>
<div class="limiter">
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					<?php echo"Welcome <br>".$_SESSION['name1'];?><br>
			
	<br>				Save Data Protect Your Self</span>
<center>

<a type="button" class="btn  btn-warning btn-lg" href="upload.php">Click to Upload Your File</a><br><br>				
<a type="button" class="btn  btn-warning btn-lg" href="download.php">List of File</a>
</center>
	
			</div>
		</div>
	</div>	



<!-- Footer-->

 <footer class="py-4 bg-dark"style="position:relative;">
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


</body>
</html>
<?php
}
else
{
?>

 <html>
<head>
<title>EXPIRED</title>
</head>
<body align="center" leftmargin="0" style="background-color:#1f95d3" topmargin="0" bottommargin="0" marginheight="0" marginwidth="0">
<div id="parentContainer" align="center">
<div id="header" align="center"  ></div>
<div id="bodyContainer" align="center" style=" width: 1000px;height: 460px;padding-top: 100px;vertical-align: middle;">
<div id="mainContainer" align="left" style="height: 200px; width: 600px; background-color: #04376c; font-family: Verdana; vertical-align: middle;padding-left: 10px;">
<p style="font-size: 16px; color:#e5ad6a; font-weight: bold;padding-top: 50px;"> Your account has been Expired.</p>
<p style="font-size: 12px;color: white;"> We recommend that you to login again to continue the session.</p>
<p style="font-size: 12px;color: white;margin-top: 2px;">Please <a  style="color:#e5ad6a;cursor: pointer;" href="index.php" >click here</a> to go back to the login screen.</p>
</div>
 </div>
</div>

</body>
</html>
  <?php
}
?>
