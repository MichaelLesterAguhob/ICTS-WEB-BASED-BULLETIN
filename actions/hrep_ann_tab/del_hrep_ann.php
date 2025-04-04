<?php
include_once('../../config/db_connection.php');
$respo = "";
$id = $_POST['delete_hrep_ann_id'];

try
{
    $delete_qry = mysqli_query($con, "DELETE FROM hrep_ann WHERE `id`='$id'");
    if($delete_qry)
    {
        $respo = "Successfully deleted.";
    }
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}

echo $respo;

?>