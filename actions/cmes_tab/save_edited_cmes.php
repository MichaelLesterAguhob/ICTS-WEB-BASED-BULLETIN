<?php 
include_once('../../config/db_connection.php');
$respo = "";
$cmes_id = $_POST['cmes_id'];
$com_off = mysqli_real_escape_string($con,  $_POST['edit_office']);
$host = mysqli_real_escape_string($con,  $_POST['edit_host']);
$time = date('h:i A', strtotime($_POST['edit_time']));
$date = $_POST['edit_date'];
$fb = $_POST['edit_fb_yes_no'];
$ppab = $_POST['edit_ppab_yes_no'];
$remarks = mysqli_real_escape_string($con,  $_POST['edit_remarks']);
$user_type = $_SESSION['user_type'];
$username = $_SESSION['username'];
try
{
    $query = mysqli_query($con, "UPDATE cmes SET `committee_office`='$com_off', `date`='$date', `time`='$time', `host`='$host', `fb_live`='$fb', `ppab_cam`='$ppab', `remarks`='$remarks' WHERE id='$cmes_id'");   
    if($query)
    {
        $respo = "Updated Successfully";

        if( $user_type != 'admin')
        {
            $date = date("Y/m/d");
            $timeZone = date_default_timezone_set("Asia/Manila");
            $time = date("h:i:sa");
            $dt = $date ." - ".$time;
    
            $query2 = "INSERT INTO activity VALUES ('','$username','Edited Committee Meeting and Event','$dt')";
            $result2 = mysqli_query($con, $query2);
        }
    }
}
catch(Exception $ex)
{   
    $respo = "Error Occurred".$ex;
}   

echo $respo;




?>