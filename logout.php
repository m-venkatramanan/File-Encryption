<?php
session_start();
if(isset($_SESSION['name1']))
{
session_destroy();
?>
 <html>
<head>
<title>LOGOUT</title>
</head>
<body align="center" leftmargin="0" style="background-color:#1f95d3" topmargin="0" bottommargin="0" marginheight="0" marginwidth="0">
<div id="parentContainer" align="center">
<div id="header" align="center"  ></div>
<div id="bodyContainer" align="center" style=" width: 1000px;height: 460px;padding-top: 100px;vertical-align: middle;">
<div id="mainContainer" align="left" style="height: 200px; width: 600px; background-color: #04376c; font-family: Verdana; vertical-align: middle;padding-left: 10px;">
<p style="font-size: 16px; color:#e5ad6a; font-weight: bold;padding-top: 50px;"> You have successfully logged out.</p>
<p style="font-size: 12px;color: white;"> We recommend that you close your browser if you have finished your online session.</p>
<p style="font-size: 12px;color: white;margin-top: 2px;">Please <a  style="color:#e5ad6a;cursor: pointer;" href="index.php" >click here</a> to go back to the login screen.</p>
</div>
 </div>
</div>

</body>
</html>
<?php
}
?>
