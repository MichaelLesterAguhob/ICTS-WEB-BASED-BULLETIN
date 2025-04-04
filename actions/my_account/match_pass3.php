
<?php 
include_once('../../config/db_connection.php');

$password = trim($_POST['pass_to_new_email']);
$username = $_POST['username'];
$user_type = $_POST['user_type'];
$respo = "";

try
{
    if($user_type == "admin")
    {
        $match_pass = mysqli_query($con, "SELECT `password` FROM admin_account WHERE `username`='$username' ");
        $enc_pass = mysqli_fetch_array($match_pass);
        $is_matched = password_verify($password, $enc_pass[0]);
    
        if($is_matched)
        {
            $respo = json_encode(['stat'=>'success', 'respo'=>'matched']);
        }
        else
        {
            $respo = json_encode(['stat'=>'failed', 'respo'=>'Incorrect Password!']);
        }
    }
    else
    {
        $match_pass = mysqli_query($con, "SELECT `password` FROM user_account WHERE `username`='$username' ");
        $enc_pass = mysqli_fetch_array($match_pass);
        $is_matched = password_verify($password, $enc_pass[0]);
    
        if($is_matched)
        {
            $respo = json_encode(['stat'=>'success', 'respo'=>'matched']);
        }
        else
        {
            $respo = json_encode(['stat'=>'failed', 'respo'=>'Incorrect Password!']);
        }
    }
}
catch(Exception $ex)
{
    $respo = json_encode(['stat'=>'failed', 'respo'=>'Errors Occurred'.$ex]);
}
echo $respo;

?>