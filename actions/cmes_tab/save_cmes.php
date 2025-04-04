<?php 
include_once('../../config/db_connection.php');
$office = mysqli_real_escape_string($con,  $_POST['office']);
$host = mysqli_real_escape_string($con,  $_POST['host']);
$time = date('h:i A', strtotime($_POST['time']));
// $time = $_POST['time'];
$date = $_POST['date'];
$fb_yes_no = $_POST['fb_yes_no'];
$ppab_yes_no = $_POST['ppab_yes_no'];
$remarks = mysqli_real_escape_string($con,  $_POST['remarks']);
$response = '';
$user_type = $_SESSION['user_type'];
$username = $_SESSION['username'];
try
{
    $query = mysqli_query($con, "INSERT INTO cmes VALUES('','$office','$date','$time','$host','$fb_yes_no','$ppab_yes_no','$remarks')");
    if($query)
    {
        if( $user_type != 'admin')
        {
            $date = date("Y/m/d");
            $timeZone = date_default_timezone_set("Asia/Manila");
            $time = date("h:i:sa");
            $dt = $date ." - ".$time;
    
            $query2 = "INSERT INTO activity VALUES ('','$username','Added Committee and Meeting Event','$dt')";
            $result2 = mysqli_query($con, $query2);
        }
        $response = "Successfully Added";
    }
}
catch(Exception $ex)
{
    $response = "Error Occurred" . $ex;
}
echo $response;
?> 