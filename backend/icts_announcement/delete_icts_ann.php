<?php 
include_once('connection.php');
$respo = "";
$id = $_POST['id'];
$cont_type = $_POST['cont_type2'];

try
{
    if($cont_type == "Emergency Response Team")
    {
        $query = mysqli_query($con, "DELETE FROM icts_ann_cont WHERE `cont_id`='$id'");
        $query2 = mysqli_query($con, "DELETE FROM icts_ert_teams WHERE `cont_id`='$id' ");
        $respo = "Successfully Deleted Emergency Response Team!";
    }
    else if($cont_type == "QR/Form")
    {
        $query = mysqli_query($con, "DELETE FROM icts_ann_cont WHERE `cont_id`='$id'");
        $query2 = mysqli_query($con, "DELETE FROM icts_img_date WHERE `cont_id`='$id' ");
        $respo = "Successfully Deleted QR/FORM!";
    }
    else if($cont_type == "Training")
    {
        $query = mysqli_query($con, "DELETE FROM icts_ann_cont WHERE `cont_id`='$id'");
        $query2 = mysqli_query($con, "DELETE FROM icts_training WHERE `cont_id`='$id' ");
        $respo = "Successfully Deleted Training!";
    }
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}
echo $respo;

?>