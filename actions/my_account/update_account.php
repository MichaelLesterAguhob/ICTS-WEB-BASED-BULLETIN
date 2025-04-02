
<?php 
include_once('connection.php');
$usertype = $_POST['user_type'];
$user_id = $_POST['user_id'];

$new_uname = trim($_POST['new_uname']);
$new_pass = trim($_POST['new_pass']);
$new_email = trim($_POST['new_email']);
$email_v_c = trim($_POST['email_v_c']);
$encrypted_pass = password_hash($new_pass, PASSWORD_DEFAULT);

$to_change = $_POST['to_change'];
$respo = "";

try
{
    // for updating username
    if($to_change == 'change_uname' && $usertype == "admin")
    {
        $update_username = mysqli_query($con, "UPDATE admin_account SET `username`='$new_uname' WHERE account_id='$user_id' ");
        if($update_username)
        {
            $_SESSION['username'] = $new_uname;
        }
    }
    else if($to_change == 'change_uname' && $usertype == "user")
    {
        $update_username = mysqli_query($con, "UPDATE user_account SET `username`='$new_uname' WHERE account_id='$user_id' ");
        if($update_username)
        {
            $_SESSION['username'] = $new_uname;
        }
    }

    // SAVING NEW PASSWORD
    if($to_change == 'change_pass' && $usertype == "admin")
    {
        $update_pass = mysqli_query($con, "UPDATE admin_account SET `password`='$encrypted_pass' WHERE account_id='$user_id' ");
       
    }
    else if($to_change == 'change_pass' && $usertype == "user")
    {
        $update_pass = mysqli_query($con, "UPDATE user_account SET `password`='$encrypted_pass' WHERE account_id='$user_id' ");
    }

    // SAVING NEW EMAIL
    if($to_change == 'change_email' && $usertype == "admin")
    {
        $update_pass = mysqli_query($con, "UPDATE admin_account SET `email_account`='$new_email' WHERE account_id='$user_id' ");
       
    }
    else if($to_change == 'change_email' && $usertype == "user")
    {
        $update_pass = mysqli_query($con, "UPDATE user_account SET `email_account`='$new_email',  `verification_code`='$email_v_c'  WHERE account_id='$user_id' ");
    }
}
catch(exception $ex)
{
    $respo = "Error Occurred" . $ex;
}

echo $respo;
?>