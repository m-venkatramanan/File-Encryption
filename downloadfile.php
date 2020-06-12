<?php
include "config.php";
session_start();
if(isset($_SESSION['uid']))
{
	if(isset($_POST['id']) && isset($_POST['password']))
	{
		$file_id=$_POST['id'];
		$pass=$_POST['password'];
	}
	
		if(!is_null($file_id) && !is_null($pass))
		{
			$stmt=$conn->prepare("SELECT id FROM file WHERE file_id=?");
			$stmt->bind_param('s',$file_id);
			$stmt->execute();
			$result=$stmt->get_result();
			$row=$result->fetch_assoc();
			if($_SESSION['uid']==$row['id'])
			{
				$stmte=$conn->prepare("SELECT location FROM file WHERE file_id=?");
				$stmte->bind_param('s',$file_id);
				$stmte->execute();
				$result1=$stmte->get_result();
				$row=$result1->fetch_assoc();
				$location=$row['location'];
				//echo "venkat".$location;
				//DECRYPTION PROCESs
				function decrypt_file($file,$passphrase){
				$iv = substr(md5("\x1B\x3C\x58".$passphrase, true), 0, 8);
    				$key = substr(md5("\x2D\xFC\xD8".$passphrase, true) .md5("\x2D\xFC\xD9".$passphrase, true), 0, 24);
    				$opts = array('iv'=>$iv, 'key'=>$key);
    				$fp = fopen($file, 'rb');
   				stream_filter_append($fp, 'mdecrypt.tripledes', STREAM_FILTER_READ, $opts);
    				return $fp;
    				}
    				$decrypted = decrypt_file($location,$pass);
    				$stmte1=$conn->prepare("SELECT file_name FROM file WHERE file_id=?");
    				$stmte1->bind_param('s',$file_id);
				$stmte1->execute();
				$result1=$stmte1->get_result();
				$row1=$result1->fetch_assoc();
				$file_name=$row1['file_name'];
				header('Content-type: application/octet-stream');
				header('Content-Disposition:attachment ;filename='.$file_name);
				header('Content-Transfer-Encoding: binary');
				header('Expires: 0');
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Pragma: public');
				fpassthru($decrypted);				
			}
			else
			{
				echo"<script>window.alert('File Not Found Please Check Your File ID');</script>";
				header("location:download.php");
			}
		}
		else
		{
			echo"<script>window.alert('Fill up Valid Details');</script>";
			header("location:download.php");
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
