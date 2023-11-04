<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/PHPMailer.php';

$email = trim($_POST['email']);
$code = 0;
$response = "";

try
{
    // generating random code
    $code = rand(1000, 9999);

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hrep.icts.bulletin@gmail.com'; //gmail that sends email
    $mail->Password = 'wzcr lkxe ihiz ihlo'; //email app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('hrep.icts.bulletin@gmail.com');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = "Verify your account.";
    $mail->Body = "Your verification code is: " . $code;

    $mail->send();
    $response = $code;
}
catch(Exception $ex)
{
    $response = "Error Occured" . $ex;
}
    echo $response;
?>