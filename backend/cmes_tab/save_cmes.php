<?php 
include_once('connection.php');
$office = mysqli_real_escape_string($con,  $_POST['office']);
$host = mysqli_real_escape_string($con,  $_POST['host']);
$time = date('h:i A', strtotime($_POST['time']));
// $time = $_POST['time'];
$date = $_POST['date'];
$fb_yes_no = $_POST['fb_yes_no'];
$ppab_yes_no = $_POST['ppab_yes_no'];
$remarks = mysqli_real_escape_string($con,  $_POST['remarks']);
$response = '';

try
{
    $query = mysqli_query($con, "INSERT INTO cmes VALUES('','$office','$date','$time','$host','$fb_yes_no','$ppab_yes_no','$remarks')");
    if($query)
    {
        $response = "Successfully Added";
    }
}
catch(Exception $ex)
{
    $response = "Error Occurred" . $ex;
}
echo $response;
?> 