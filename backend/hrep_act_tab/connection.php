
<?php 
$server_name = "localhost";
$username = "root";
$password = "";
$db_name = "calendar_web_app_db";
try
{
    $con = mysqli_connect($server_name, $username, $password, $db_name);
}
catch(Exception $ex)
{   
    echo json_encode(['status'=>'failed', 'html'=>'Connection Error', 'msg'=>'Error Message: <br><br>' . $ex]);
    exit();
}
session_start();
?>