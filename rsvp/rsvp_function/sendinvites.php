<?php

require_once '../../model/database.php';
require_once 'Guest.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

date_default_timezone_set('America/Toronto');

$dbcon = Database::getDB();
$g = new Guest();
$guests = $g->getAllGuests(Database::getDB());

$eid = $_POST['eventid'];

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer();

foreach($guests as $row){
$gid = $row->guest_id;
$egid = password_hash($gid,1);
    
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML(true);
$mail->Username = 'gettogether53@gmail.com';
$mail->Password = 'mmizqonzfvdfpipq';
$mail->SetFrom('gettogether53@gmail.com','Get Together');
$mail->Subject = 'Lets Get Together!';
$mail->Body = '<h2>Hi '.$row->guest_name.' ! You are invited to a gathering!</h2><br/>
                <p>Click <a href="http://get-together.gq/account/login_register.php?eid='.$eid.'&gid='.$gid.'&egid='.$egid.'">here</a> to reply!</p>';
$mail->addAddress($row->guest_email,$row->guest_name);

$result = $mail->Send();
    
    if($result["code"] == '400')
    {
        $output .= html_entity_decode($result['full_error']);
    }
};

header("Location: ../index.php");