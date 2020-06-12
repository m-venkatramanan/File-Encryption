<?php
include"email1.php";
session_start();
$err="";$err1="";$err2="";$err3="";$err4="";$err5="";$err6="";$sucess="";
if(isset($_SESSION['uid']))
{
if(isset($_POST['submit']))
{
	if(isset($_POST['password']))
	{
		$passphrase=$_POST['password'];
		if(isset($_FILES["fileToUpload"]["tmp_name"]))
		{
			include "config.php";
			$stmt1=$conn->prepare("SELECT dir from user where id=?");
			$stmt1->bind_param('s',$_SESSION['uid']);
			$stmt1->execute();
			$result=$stmt1->get_result();
			$destination1=$result->fetch_assoc();
			$destination=$destination1['dir'];
			//echo"destination :".$destination;
			//$destination="file/";
			$md5=hash_file('md5',$_FILES["fileToUpload"]["tmp_name"]);
			//echo $md5;
			//echo"<br>";
			$tempFileName = $_FILES['fileToUpload']['tmp_name'];
			$target_file=$destination .basename($_FILES["fileToUpload"]["tmp_name"]);
			//echo $target_file;
			//echo"<br>";
			$uploadOk=1;
			$imageFiletype=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			//echo $imageFiletype;
			//echo"<br>";
			$tempFileName1=$destination.$md5;
			
			if(file_exists($tempFileName1))
			{
				$err="Sorry,file alerady exists.";
				$uploadOk=0;
			}
			// Check file size
  			if ($_FILES["fileToUpload"]["size"]>500000000000000)
    			{
    				$err1= "Sorry, your file is too large.";
    				$uploadOk = 0;
   			}

			// Check if $uploadOk is set to 0 by an error
   			//echo $uploadOk;
   			//echo "<br/>";
  			if ($uploadOk == 0)
    			{
    				$err2= "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
   			}
  			else
   			{
				$filename= basename( $_FILES["fileToUpload"]["name"]);
				//echo $filename;
				$stmt = $conn->prepare("INSERT INTO file(id, file_name, hash,location) VALUES(?, ?, ?, ?)");
  				$stmt->bind_param("ssss",$_SESSION['uid'], $filename, $md5, $tempFileName1);	
				//echo $target_file;
				//echo"<br>";
				if (!$stmt->execute())
				{
					echo "Error :".$conn->error;
					$err=1;
					$errmsg="<b>Something went wrong.Please Contact Developer</b>";
					$errcode=4;
					$conn->close();
				}
				else
				{
					//$fileName = $_FILES['fileToUpload']['name']; 		 
					$error = $_FILES['fileToUpload']['error']; 
					//$fileContentType = $_FILES['fileToUpload']['type']; 
					//$fileSize = $_FILES['fileToUpload']['size'];
					
					if($error==UPLOAD_ERR_OK)
					{
						function encryption($file1,$dest,$pass)
						{
						$md5=hash_file('md5',$_FILES["fileToUpload"]["tmp_name"]);
						$handle = fopen($file1, "rb") or die("could not open file");
        					// Returns the read string.
    						$contents = fread($handle, filesize($file1));
        					// Close the opened file pointer.
    						fclose($handle); 
 	
    						$iv = substr(md5("\x1B\x3C\x58".$pass, true), 0, 8);
    						$key = substr(md5("\x2D\xFC\xD8".$pass, true) . md5("\x2D\xFC\xD9".$pass,true),0,24);
    						$opts = array('iv'=>$iv, 'key'=>$key);
        					$tempFileName2=$dest.$md5;
    						$fp = fopen($tempFileName2, 'wb');
    				        	// Add the Mcrypt stream filter with Triple DES
    						stream_filter_append($fp, 'mcrypt.tripledes', STREAM_FILTER_WRITE, $opts); 
        					// Write content in the destination file.
   						fwrite($fp, $contents);
       						// Close the opened file pointer.
    						fclose($fp);
    						}
    						encryption($tempFileName,$destination,$passphrase);
						$sucess="File uploaded sucess.";
				
						if($upload==1)
						{
							$stmte=$conn->prepare("SELECT mail FROM user where id=?");
							$stmte->bind_param("s",$_SESSION['uid']);
							$stmte->execute();
							$result=$stmte->get_result();
							$row=$result->fetch_assoc();
							$email=$row['mail'];
							if(!email($email,$filename,$passphrase))
							{
								echo"email cannot send";
							}
						}		
					}
					else
					{ 	
					$err3="The File Was Not Encryprt Please Contact Developer"; 
					}
				}
			}
		}
		else
		{
			$err4="Please Select a File";
		}
	}
	else
	{
		$err5="Please Enter Encryption Key";
	}
}
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
