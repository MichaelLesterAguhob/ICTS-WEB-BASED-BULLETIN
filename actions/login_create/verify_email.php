<?php 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../includes/PHPMailer/src/Exception.php';
require '../../includes/PHPMailer/src/SMTP.php';
require '../../includes/PHPMailer/src/PHPMailer.php';

include_once('../../config/db_connection.php');
$email = trim($_POST['email']);
$code = 0;
$response = "";

try
{
        $check_email_qry = mysqli_query($con, "SELECT email_account FROM user_account WHERE email_account='$email'");
        if(mysqli_num_rows($check_email_qry) > 0)
        {
            $response = json_encode(['stat'=>'invalid', 'msg'=>'Email Already Exist!']);
        }
        else
        {
            $check_admin_email_qry = mysqli_query($con, "SELECT email_account FROM admin_account WHERE email_account='$email'");
            if(mysqli_num_rows($check_admin_email_qry) > 0)
            {
                $response = json_encode(['stat'=>'invalid', 'msg'=>'Email Already Exist!']);
            }
            else
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
                $response = json_encode(['stat'=>'success', 'code'=>$code]);
            }
        }

}
catch(Exception $ex)
{
    $response = json_encode(['stat'=>'error', 'msg'=>"Error Occurred" . $ex]);
}
    echo $response;
?>