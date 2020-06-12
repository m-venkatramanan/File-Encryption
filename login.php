<?php
error_reporting(E_ALL);
$error="";
$error1="";
$error2="";
session_start();
if(isset($_POST['submit']))
{
	$captchaResult = $_POST["captcha"];
	$firstNumber = $_POST["firstNumber"];
	$secondNumber = $_POST["secondNumber"];
	$checkTotal = $firstNumber + $secondNumber;

	if($captchaResult != $checkTotal)
	{
		$error="Enter Valid Captcha";	
	}
	else
	{
		if(isset($_POST['username'])&&isset($_POST['password']))
		{
		
			include"config.php";
			$str=$_POST['username'];
			$pass=$_POST['password'];
			$md5=md5($pass);
			$stmt=$conn->prepare("select mail from user where mail=?");
			 $stmt->bind_param("s",$str);
 			$stmt->execute();
 			$result = $stmt->get_result();
 			if($result->num_rows===0)
 			{
   				$error1="Enter Valid Mail ID ";
   				session_destroy();
 			}
			else
  			{
   				$stmt->close();
   				$stmt=$conn->prepare("select id,name,password from user where mail=?");
   				$stmt->bind_param("s",$str);
   				$stmt->execute();
   				$result = $stmt->get_result();
   				$row=$result->fetch_assoc();
   				if($md5!=$row['password'])
    				{
      					$error1="Enter Valid Password";
      					session_destroy();
     				}
    				else
    				 {
      					 $_SESSION['uid']=$row['id'];
       					$_SESSION['name1']=$row['name'];
     				}
  			}
 			$stmt->close();
		}
		else
		{
			$error2="Fill The Requierd Filed";
			//echo"<script>window.alert('Enter Valid Email and Password');</script>";
	
		}
	}
}
?>

