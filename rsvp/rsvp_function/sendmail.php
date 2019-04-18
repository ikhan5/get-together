<?php

// work sample


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
$mail->Body ='
<table align="center"  cellpadding="0" cellspacing="0" width="600"
    style="font-family: Arial, sans-serif;text-align:center;">
        <tr>
         <td align="center" bgcolor="#ff4e4e" style="padding: 30px 0 60px 0;">
                <img src="email_hearder.jpg" alt="get together logo" width="500" style="display: block;" />
         </td>
        </tr>
        <tr>
        <td bgcolor="white" style="padding: 40px 30px 40px 30px;">
                <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                <td style="padding:0 0 30px 0;font-size: 24px;">
                Hi!
                </td>
                </tr>
                <tr>
                <td style="padding: 5px 0;">
                You are invited to a gathering!
                </td>
                </tr>
                <tr>
                <td style="padding: 5px 0;">
                <p>Location</p>
                <p>Time</p>
                </td>
                </tr>
                <tr>
                <td style="padding: 10px 0 30px 0;">
                If you wish to attend, please register or login <a href="http://get-together.gq/account/login_register.php?='.$eid.'">here</a>
                </td>
                </tr>
                </table> 
         </td>
        </tr>
        <tr>
        <td bgcolor="#F6DC7A" style="padding: 30px 30px 30px 30px;">
            <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
            <td width="60%">
            </td>
            <td style="font-size: 12px;">
            All Coyright Reserved to get together
            </td>
            </tr>
            </table>
         </td>
        </tr>
       </table>
       ';
$mail->AddAddress('gettogether53@gmail.com');

$mail->Send();

?>