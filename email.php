<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';
function email($mailid,$name,$key1)
{
$mail = new PHPMailer;
$mail->IsSMTP();  
$mail->SMTPDebug = 0;                                    // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                 // Specify main and backup server
$mail->Port = 465;                                    // Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'yourmail@gmail.com';               // SMTP username
$mail->Password = 'yourpassword';                  // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
$mail->From = 'yourmail@gmail.com';
$mail->FromName = 'File Safe';
$mail->AddAddress($mailid);               // Name is optional
$mail->IsHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Message from SAFE STORAGE';
$mail->Body    = 'Hi '.$name."  <br> you have successfully registered in the website SAFE STORAGE ";
$mail->Body    = 'Hi '.$name."<br>   The is Yours Encryption key".$key1 ."Dont miss it ";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if(!$mail->Send()) {
   echo 'Message could not be sent.';header('Refresh: 10; URL=http://yoursite.com/page.php');
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   return FALSE;
}
else
{
//echo 'Message has been sent';
return TRUE;
}
}
?>
