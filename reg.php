<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include"config.php";
include"email.php";
$key="EsV@41922";
//$err = 0;
$errcode = 0;
$errmsg = "NO";
function verify($var,$type='string') {
        if (isset($var) && !empty($var)) {
          if ($type == 'string') {
            if (is_string($var))
              return $var;
            else 
              return; 
            }
          if ($type == 'email') {
            if (filter_var($var, FILTER_VALIDATE_EMAIL))
              return $var;
            else {
               $err = 1;
               $errmsg = "Email id is not valid";
               $errcode = 1;
              }
           }
          if ($type == 'num') {
            if (is_numeric($var))
              return $var;
            else 
              return NULL;
           }    
         }
        else
            return;
 }

if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['pass']) )
{

$fname=verify($_POST['name']);
$email=verify($_POST['email'], 'email');
$mobile=verify($_POST['mobile'], 'num');
$passw=verify($_POST['pass']);
}
else
$err=1;
if ( $err!=1 && !is_null($fname) && !is_null($email) && !is_null($mobile) && !is_null($passw) ){
$stmte = $conn->prepare("SELECT id FROM user WHERE mail = ?");
  $stmte->bind_param("s", $email);
  $stmte->execute();
  $stmte->store_result();
  if ($stmte->num_rows >= 1) {
    $err = 1;
    $errmsg = "<b>The E-mail id you supplied already exist</b>";
    $errcode = 2;
    $stmte->free_result();
    $stmte->close();
    }
  else { 
      $stmte->free_result();
      $stmte->close();
      $stmtm = $conn->prepare("SELECT id FROM user WHERE mobile = ?");
      $stmtm->bind_param("s", $mobile);
      $stmtm->execute();
      $stmtm->store_result();
      if ($stmtm->num_rows >= 1) {
        $err = 1;
        $errmsg = "<b>The mobile number you supplied already exist</b>";
        $errcode = 3;
        $stmtm->free_result();
        $stmtm->close();
        }
      else {
        $stmtm->free_result();
        $stmtm->close();
        }
   }
   if ($err != 1) {
   $pass=md5($passw);
 if(!mkdir($email))
 {
 	$errmsg="<b>Something went wrong.Cannot Create Directory</b>";
 } 
 	$dir=$email.'/';
   $stmt = $conn->prepare("INSERT INTO user (name, mail, mobile,password,dir) VALUES(?, ?, ?, ?,?)");
  $stmt->bind_param("sssss", $fname, $email, $mobile, $pass,$dir);
  if (!$stmt->execute()) {
    echo "Error: " . $conn->error;
    $err = 1;
    $errmsg = "<b>Something went wrong.Please contact developer</b>";
    $errcode = 4;
    $stmt->close();
   }
  else {
  $stmt->close();
  //echo "Success <br/>";
       if (!email($email, $fname, $key)) {
    $err = 1;
    $errmsg = "<b>Email cannot be sent.Contact Support</b>";
    $errcode = 5;
     }
  /*else 
     echo "Mail sent.";   */ 
   }
  /*else {
    $err = 1;
    $errmsg = "<b>Unable fetch your ID.Contact Support</b>";
    $errcode = 6;
    }*/
    }
  }
//}
else {
    $err = 1;
    $errmsg = "<b>Please fill up with valid details.<a href='register.html'>Try again</a></b>";
    $errcode = 7;
    //echo "Something is NULL<br/>";
  }
//if ($err == 1) {
  echo $errcode;
//}
if ($err == 0) {
  $errmsg = "<b>Your Registration is Successful and your Temporary Encryption Key is send your mail.<br/>Please check your mail <br> and the key was not compulsary used Encryption </b> Click to <a href'index.php'>Login</a> Page";
  
  }

$conn->close();
/*
$errcode;
0 => "No Error"
1 => "Email id is not valid"
2 => "The E-mail id you supplied already exist"
3 => "The mobile number you supplied already exist"
4 => "Something went wrong.Please contact developer"
5 => "Email cannot be sent."
6 => "Unable fetch your ID.Contact Support"
7 => "Please fill up all details"
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Thank you for Registeration</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Thanks you for Registeration">
	<meta name="author" content="VenkatRamanan">
<!--===============================================================================================-->	
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
<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="p-t-30 p-b-50">
				<span class="p-b-41">
				<center>	
					<b><p style="color:white"><?php echo $errmsg;  ?></p></b></center>

				</span>
				

</body>
</html>

