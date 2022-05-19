<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
function send_mail($email,$message,$subject)
{
    //require_once('mailer/class.phpmailer.php');
    require 'vendor/autoload.php';
    $mail = new PHPMailer();
    try {
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        //$mail->SMTPSecure = "ssl";
        $mail->Host = "localhost";
        $mail->Port = 25;
        $mail->AddAddress($email);
        $mail->Username = "root@localhost.net";
        $mail->Password = "root";
        $mail->SetFrom('user1@localhost.net', 'Coding Cage');
        $mail->AddReplyTo("root@localhost.net", "Coding Cage");
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->Send();
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
