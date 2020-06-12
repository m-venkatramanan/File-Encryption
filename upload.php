<?php
include("fileupload.php");
//session_start();
if(isset($_SESSION['name1']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>File Upload</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="File Upload">
	<meta name="author" content="File Safe">
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
        <a class="nav-link" href="home.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="download.php">Files </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</div>
</nav>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class=" p-t-10 p-b-50">
				<span class="login100-form-title p-b-41">
					Save Data Protect Your Self
				</span><br><br>
				
				
				<center class="text-danger"><h3>
				<?php echo $err;?>
				<?php echo $err1;?>
				<?php echo $err2;?>
				<?php echo $err3;?>
				<?php echo $err4;?>
				<?php echo $err5;?>
				<?php echo $err6;?>
				<?php echo $sucess;?><br><br></h3>
				<center>
				
				<form action="" method="post"  enctype="multipart/form-data">
 					<center><h4><input class="text-white"type="file" id="fileToUpload" name="fileToUpload" /></h4><br><br>
 					<div class="validate-input" data-validate="Password"style="">
						<input class="form-control" type="password" id="password" name="password" placeholder="Enter Encryption Key">
					</div>
					<br>
					<span class="lnr lnr-question-circle text-danger"data-toggle="tooltip" data-placement="right" title="This text box is used to Enter your Encryption Key the Key was once you forget the Encrypt Data Was not Retrive So Kindly please carefully Handle" data-placeholder="&#xe87d;">
					</span>
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn"id="submit" name="submit">
							Submit
						</button>
					</div>
</form>
				</div>
		</div>
	</div>
	
	<!-- Footer-->

 <footer class="py-5 bg-dark ">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; File Safe 2020</p>
    </div>
  </footer>


	<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
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
	<script src="md5.js"></script>
	

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
