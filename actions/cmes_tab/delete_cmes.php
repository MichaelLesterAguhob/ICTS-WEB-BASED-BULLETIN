<?php 
include_once('../../config/db_connection.php');
$respo = "";
$cmes_id = $_POST['cmes_id'];
$user_type = $_SESSION['user_type'];
$username = $_SESSION['username'];
try 
{
    $query = mysqli_query($con, "DELETE FROM cmes WHERE id='$cmes_id'");
    if($query)
    {
        if( $user_type != 'admin')
            {
                $date = date("Y/m/d");
                $timeZone = date_default_timezone_set("Asia/Manila");
                $time = date("h:i:sa");
                $dt = $date ." - ".$time;
        
                $query2 = "INSERT INTO activity VALUES ('','$username','Deleted Committee Meeting and Event','$dt')";
                $result2 = mysqli_query($con, $query2);
            }
        $respo = "Deleted Successfully";
    }
} 
catch (Exception $ex) 
{
    $respo = "Error Occurred ". $ex;
}
echo $respo;
?>