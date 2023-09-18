<?php
    include_once('backend/login_create/connection.php');
    $username = $_SESSION['username'];

    if($_SESSION['user_type'] != 'admin')
    {
        $new_login = mysqli_query($con, "SELECT MAX(id) FROM logs WHERE username ='$username' ");
        $max_id = mysqli_fetch_array($new_login);

        $date = date("Y/m/d");
        $timeZone = date_default_timezone_set("Asia/Manila");
        $time = date("h:i:sa");
        $dt = $date ." - ".$time;
    
        $insert_logs = mysqli_query($con, "UPDATE logs SET `date_logout`='$dt' WHERE username='$username' AND id='$max_id[0]' ");
    }

    session_start();
    session_unset();
    header('location: login_acct.php');
?>