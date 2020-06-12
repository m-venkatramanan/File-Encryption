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
$mail->Username = 'your mail@gmail.com';               // SMTP username
$mail->Password = 'password';                  // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
$mail->From = 'your mail2060@gmail.com';
$mail->FromName = 'File Safe';
$mail->AddAddress($mailid);               // Name is optional
$mail->IsHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Message from SAFE STORAGE';
$mail->Body    = ''.$name." : <br> The File was Sucess Fully uploaded in SAFE STORAGE ";
$mail->Body    = ' FILE NAME &nbsp;'.$name."<br> Encryption key :&nbsp;".$key1 ."&nbsp;Dont miss it ";
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
