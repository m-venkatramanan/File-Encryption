<?php
$servername='localhost';
$username = 'venkat';
$password = 'Password';
$db = 'cloud';
$conn = new mysqli($servername,$username,$password,$db);
if($conn->connect_error)
{
        die("Connection failed:".$conn->connect_error);
        exit();
}
?>
