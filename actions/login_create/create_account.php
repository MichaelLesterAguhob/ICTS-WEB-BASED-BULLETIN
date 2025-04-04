<?php 
include_once('../../config/db_connection.php');
$c_username = trim($_POST['c_username']);
$c_password = trim($_POST['c_password']);
$email = trim($_POST['email']);
$v_code = trim($_POST['verification_code']);
$encrypted = password_hash($c_password, PASSWORD_DEFAULT);
$response = "";

try
{
    $result1 = mysqli_query($con, "SELECT username FROM user_account WHERE `username`='$c_username'");

    if(mysqli_num_rows($result1) > 0)
    {
        $response = json_encode(['stat'=>'invalid', 'msg'=>'Username Already Exist!']);
    }
    else
    {
        $result2 = mysqli_query($con, "SELECT username FROM admin_account WHERE `username`='$c_username'");

        if(mysqli_num_rows($result2) > 0)
        {
            $response = json_encode(['stat'=>'invalid', 'msg'=>'Username Already Exist!']);
        }
        else
        {
            $result3 = mysqli_query($con, "INSERT INTO user_account VALUES('','$c_username','$email',$v_code,'$encrypted','NO','NO','NO','NO','NO','NO')");
            if($result3)
            {
                $response = json_encode(['stat'=>'success', 'msg'=>'Account Created Successfully.']);
            }
        }
    }
}
catch(Exception $ex)
{
    $response = "Error Occurred" . $ex;
}
echo $response;
?>