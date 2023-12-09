
<?php 
include_once('connection.php');

$password = trim($_POST['pass']);
$username = $_POST['username'];
$respo = "";

try
{
  
    $match_pass = mysqli_query($con, "SELECT `password` FROM admin_account WHERE `username`='admin123' ");
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
catch(Exception $ex)
{
    $respo = json_encode(['stat'=>'failed', 'respo'=>'Errors Occurred'.$ex]);
}
echo $respo;

?>