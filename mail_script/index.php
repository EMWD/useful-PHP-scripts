<?php

require_once '../../lib/phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->CharSet = 'utf-8';
$email = $_POST['email'];

$user = R::findOne('users', 'email = ?', array($email));


$mail->isSMTP();                					  // Set mailer to use SMTP
$mail->Host = 'smtp.timeweb.ru';  																							
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'boss@ambassa.ru';				  // email name(FROM)
$mail->Password = 'your password'; 					  // email password(FROM)
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; 									  // TCP port to connect to / it may be different

$mail->setFrom('boss@ambassa.ru');					  // email name(FROM)
$mail->addAddress($email);     						  // email(TO) 
$mail->isHTML(true);

$mail->Subject = 'message title';
$mail->Body = 'message body';
$mail->AltBody = '';


$test = true;
if(!$mail->send()) {
	$test = false;
}