<?php 
include_once('../../config/db_connection.php');
$respo = "";
$id = $_POST['icts_ann_content_id'];
$table_name = $_POST['table_name'];

try
{
    $query2 = mysqli_query($con, "DELETE FROM $table_name WHERE `id`='$id' ");
    $respo = "Successfully Deleted";
    
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}
echo $respo;

?>