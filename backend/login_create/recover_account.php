<?php 
include_once('connection.php');
$respo = '';
$email = $_POST['recovery_email'];
$pass = $_POST['new_pass'];
$new_pass = password_hash($pass, PASSWORD_DEFAULT);

try
{
    $update_pass_qry = mysqli_query($con, "UPDATE user_account SET `password`='$new_pass' WHERE `email_account`='$email' ");
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}
echo $respo;
?>