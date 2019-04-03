<?php
date_default_timezone_set('Etc/UTC');
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

function format($input){
    $formatted = trim($input);
    $formatted = stripslashes($input);
    $formatted = htmlspecialchars($input);
    return $formatted;
}

if(isset($_POST['sendemail'])){
    $output ='';
    foreach($_POST['user_info'] as $user){
        $subject = format($user['subject']);
        $content = format($user['content']);
        $mail = new PHPMailer;
        $mail->Host = 'smtp.gmail.com';
        $mail->isSMTP();
        $mail->Port = '465';
        $mail->SMTPAuth = true;
        $mail->Username = "gettogether53@gmail.com";
        $mail->Password = "mmizqonzfvdfpipq";
        $mail->SMTPSecure = 'ssl';
        $mail->setFrom('gettogether53@gmail.com', 'Get Together');
        $mail->addAddress($user['email'], $user['name']);
        $mail->WordWrap = 50;
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "<p>".  $content; "</p>";
        $mail->AltBody = '';

        if(!isset($subject)){
            echo "Please enter a subject";
            exit;
        }

        if(!isset($content)){
            echo "Please enter an email body";
            exit;
        }


    $result = $mail->Send();
    
    if($result["code"] == '400')
    {
        $output .= html_entity_decode($result['full_error']);
    }

}
   
   if($output == '')
   {
        echo 'Success';
   }
   else
   {
        echo $output;
   }

}