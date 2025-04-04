<?php 
include_once('../../config/db_connection.php');
$respo = "";
$del_id = $_POST['del_hrep_act_id'];
$user_type = $_SESSION['user_type'];
$username = $_SESSION['username'];
try
{
    $query = mysqli_query($con, "DELETE FROM hrep_activities WHERE id='$del_id'");
    if($query)
    {
        $respo = "Delete Successfully";
        if( $user_type != 'admin')
        {
            $date = date("Y/m/d");
            $timeZone = date_default_timezone_set("Asia/Manila");
            $time = date("h:i:sa");
            $dt = $date ." - ".$time;
    
            $query2 = "INSERT INTO activity VALUES ('','$username','Deleted HRep Activity','$dt')";
            $result2 = mysqli_query($con, $query2);
        }
    }
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}
echo $respo;

?>