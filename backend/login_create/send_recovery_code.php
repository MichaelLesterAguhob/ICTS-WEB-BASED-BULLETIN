<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require('PHPMailer/src/PHPMailer.php');
require('PHPMailer/src/Exception.php');
require('PHPMailer/src/SMTP.php');

include_once('connection.php');
$respo = "";
$email = trim($_POST['recovery_email']);
$recovery_code = 0;

try
{
        $check_email = mysqli_query($con, "SELECT * FROM user_account WHERE email_account='$email' ");
        if(mysqli_num_rows($check_email) <= 0)
        {
            $respo = json_encode(['stat'=>'invalid', 'msg'=>"Invalid Email Address!"]);
        }
        else
        {
            $get_uname_qry = mysqli_query($con, "SELECT `username` FROM `user_account` WHERE `email_account`='$email' ");
            $username = mysqli_fetch_array($get_uname_qry);
    
            $recovery_code = rand(1000, 9999);
    
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'hrep.icts.bulletin@gmail.com';
            $mail->Password = 'wzcr lkxe ihiz ihlo';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
    
            $mail->setFrom('hrep.icts.bulletin@gmail.com');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Recovery Code';
            $mail->Body = 'Username: '.$username[0].'<br> Your recovery code: ' . $recovery_code;
    
            $mail->send();
            $respo = json_encode(['stat'=>'success', 'recovery_code'=>$recovery_code]);
        }
}
catch(Exception $ex)
{
    $respo = json_encode(['stat'=>'exc', 'msg'=>"Error Occurred". $ex]);

}

echo $respo;
?>