<?php 
include_once('connection.php');
$respo = "";
$cmes_id = $_POST['cmes_id'];
try 
{
    $query = mysqli_query($con, "DELETE FROM cmes WHERE id='$cmes_id'");
    if($query)
    {
        $respo = "Deleted Successfully";
    }
} 
catch (Exception $ex) 
{
    $respo = "Error Occurred ". $ex;
}
echo $respo;
?>