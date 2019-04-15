<?php


$eid = password_hash($_POST['eventid'],1);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML(true);
$mail->Username = 'gettogether53@gmail.com';
$mail->Password = 'mmizqonzfvdfpipq';
$mail->SetFrom('gettogether53@gmail.com');
$mail->Subject = 'Lets Get Together!';
$mail->Body = '<h2>You are invited to a gethering!</h2><br/>
<p>Click <a href="http://get-together.gq/account/login_register.php?='.$eid.'">here</a> to reply!</p>';
$mail->AddAddress('gettogether53@gmail.com');

$mail->Send();

?>