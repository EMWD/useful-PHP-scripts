<?php 

require_once 'db/db.php';
require_once('phpmailer/PHPMailerAutoload.php');

$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$id = $_POST['user_name'];
$email = $_POST['user_email'];

$usersId = R::findAll('users', "unical_id = ?", array($id));
$usersMail = R::findAll('users', "email = ?", array($email));
$ID_check1 = '';
$ID_check2 = '';
foreach ($usersId as $key => $bean) {
  $ID_check1 = $bean->id;}
foreach ($usersMail as $key => $bean) {
  $ID_check2 = $bean->id;}

if ($ID_check1 == $ID_check2) {
  
//------------------------------------------------------------------------------------------------------------------Sending Settings
	$mail->isSMTP();                // Set mailer to use SMTP
	$mail->Host = 'smtp.timeweb.ru';  																							
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'boss@ambassa.ru'; // email name(FROM)
	$mail->Password = 'Klimklim25112000'; // email password(FROM)
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

	$mail->setFrom('boss@ambassa.ru'); // email name(FROM)
	$mail->addAddress($email);     // email(TO) 
	$mail->isHTML(true);

	$mail->Subject = 'Заявка с тестового сайта';

	//----------------------------------------------------------------------------------------------------Give new password to user
	
	$password = rand(100000, 999999);	
	$usersArr = R::findAll('users', "unical_id = ?", array($id));
	foreach ($usersArr as $key => $bean) {
 	$id = $bean->id;
	R::exec('UPDATE `users` SET `password` = :password WHERE id = :id', [
	  'id' => $id,
	  'password' => password_hash($password, PASSWORD_DEFAULT)
	]);


 	}

	$mail->Body = "Your new pass is ".$password."";
	$mail->AltBody = '';

	if(!$mail->send()) {
	    echo '<h2>Возникла техническая ошибка(вероятно введены некорректные данные)</h2>';
	    echo "<h2>Пожалуйста проверьте <a href='index.php'>введённые данные</a>.<h2>";
	} else {
	    header('location: thank-you.php');
	}

}else{
  if (count($usersId) == 0){
  	echo "This ID doesn`t exist";
  	exit(0);
  }
  if (count($usersMail) == 0){
  	echo "This Mail doesn`t exist";
  	exit(1);
  }
 }


?>