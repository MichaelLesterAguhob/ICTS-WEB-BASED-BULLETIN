<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/PHPMailer.php';

include_once('connection.php');
$respo = '';
$username = $_POST['username'];

try
{
    $query = mysqli_query($con, "SELECT username FROM user_account WHERE username = '$username'");
    // $data = mysqli_fetch_array($query);
    if(mysqli_num_rows($query) > 0)
    {
        $query2 = mysqli_query($con, "UPDATE user_account SET `forgot`='yes' WHERE username = '$username'");
        if($query2)
        {
            $respo = "Admin can view your password now.";
        }
    }
    else
    {
        $respo = "Username not found!";
    }
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}
echo $respo;
?>