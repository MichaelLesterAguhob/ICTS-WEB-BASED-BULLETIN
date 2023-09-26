<?php 
include_once('connection.php');
$respo = "";
$del_id = $_POST['del_hrep_act_id'];

try
{
    $query = mysqli_query($con, "DELETE FROM hrep_activities WHERE id='$del_id'");
    if($query)
    {
        $respo = "Delete Successfully";
    }
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}
echo $respo;

?>