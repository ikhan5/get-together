<?php
require_once '../../model/database.php';
require_once 'Guest.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$dbcon = Database::getDB();
$g = new Guest();
$guests = $g->getAllGuests(Database::getDB());

while($row = $guests->fetch()){
    $email = $row['guest_email'];
    $name = $row['guest_name'];

    $mail->AddAddress($email,$name);
};

function sendEmail($email,$name){

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->isHTML(true);
    $mail->Username = 'gettogetherinvitation@gmail.com';
    $mail->Password = 'echo$Friends';
    $mail->SetFrom('gettogetherinvitation@gmail.com');
    $mail->Subject = 'Lets Get Together!';
    $mail->Body = '<h2>Hi '.$name.' ! You are invited to a gethering!</h2><br/>
                <p>Click <a href="#">here</a> to reply!</p>';
    $mail->AddAddress($email);

    if(!$mail->send()){
        echo 'Invitations cannot be sent.';
    } else {
        echo 'Invitations sent!';
    }
}