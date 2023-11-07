<?php 
include_once('connection.php');
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$response = "";

try 
{
    $check = mysqli_query($con, "SELECT `username` FROM user_account WHERE `username`='$username' ");

    if(mysqli_num_rows($check) > 0)
    {
        $verify_pass = mysqli_query($con, "SELECT `password` FROM user_account WHERE `username`='$username' ");
        $encrypted_pass = mysqli_fetch_array($verify_pass);
        $is_verified = password_verify($password, $encrypted_pass[0]);
    
        if($is_verified)
        {
            // 
                $_SESSION['username'] = $username;
                $_SESSION['user_type'] = 'user';
                $response = json_encode(['status'=>'success', 'location'=>"Home Page.php"]);
        
                $date = date("Y/m/d");
                $timeZone = date_default_timezone_set("Asia/Manila");
                $time = date("h:i:sa");
                $dt = $date ." - ".$time;
        
                $insert_logs = mysqli_query($con, "INSERT INTO activity VALUES('','$username','Logged In', '$dt')");
        }
        else
        {
            $result2 = mysqli_query($con, "SELECT username FROM admin_account WHERE `username`='$username' AND `password`='$password'");

            if(mysqli_num_rows($result2) > 0)
            {
                $_SESSION['username'] = $username;
                $_SESSION['user_type'] = 'admin';
    
                $response = json_encode(['status'=>'success', 'location'=>"admin_page.php"]);
            }
            else
            {
                $response = json_encode(['status'=>'failed', 'msg'=>"Login Failed"]);
            }
        }
    }
    else
    {
        $result2 = mysqli_query($con, "SELECT username FROM admin_account WHERE `username`='$username' AND `password`='$password'");

        if(mysqli_num_rows($result2) > 0)
        {
            $_SESSION['username'] = $username;
            $_SESSION['user_type'] = 'admin';

            $response = json_encode(['status'=>'success', 'location'=>"admin_page.php"]);
        }
        else
        {
            $response = json_encode(['status'=>'failed', 'msg'=>"Login Failed"]);
        }
        
    }

}
catch(Exception $ex)
{
    $response = "Error Occurred" . $ex;
}
echo $response;
?>