<?php
    include_once('../actions/login_create/connection.php');
    $username = $_SESSION['username'];  

    if($_SESSION['user_type'] != 'admin')
    {
        $date = date("Y/m/d");
        $timeZone = date_default_timezone_set("Asia/Manila");
        $time = date("h:i:sa");
        $dt = $date ." - ".$time;
    
        $insert_logs = mysqli_query($con, "INSERT INTO activity VALUES('','$username','Logged Out', '$dt')");
    }

    session_start();
    session_unset();
    header('location: login_acct.php');
?>