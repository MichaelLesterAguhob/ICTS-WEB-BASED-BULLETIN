<?php 
include_once('../../config/db_connection.php');
$respo = "";
$uname = "";
$pass = "";
$email = "";

$user_type = $_POST['user_type'];
$username = $_POST['username'];

try
{
    if( $user_type == "admin")
    {
        $accounts_qry = mysqli_query($con, "SELECT * FROM admin_account WHERE `username` = '$username'");
    }
    else
    {
        $accounts_qry = mysqli_query($con, "SELECT * FROM user_account WHERE `username` = '$username'");
    }

    while($data = mysqli_fetch_assoc($accounts_qry))
    {
        $id = $data['account_id'];
        $uname = $data['username'];
        $pass = $data['password'];
        $email = $data['email_account'];
    }

    $respo =json_encode(['stat'=>'success', 'uname'=>$uname, 'pass'=>$pass, 'email'=>$email, 'id'=>$id]);

}
catch(Exception $ex)
{
    $respo =json_encode(['stat'=>'exc', 'msg'=> "Error Occured" . $ex]);
}

echo $respo;
?>