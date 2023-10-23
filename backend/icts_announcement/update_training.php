<?php 
include_once('connection.php');
$cont_id = $_POST['edit_icts_cont_id'];
$title = strtoupper($_POST['edit_icts_ann_title']);
$counter = 1;
try
{
    $query = mysqli_query($con, "UPDATE icts_ann_cont SET `title`='$title' WHERE cont_id='$cont_id'");
    $query1 = mysqli_query($con, "SELECT * FROM icts_training WHERE cont_id='$cont_id'");
    while($rows = mysqli_fetch_assoc($query1))
    {
        $desc = $_POST['edit_training_desc'.$counter];
        $date = $_POST['edit_training_date'.$counter];
        $time = date('h:i A',strtotime($_POST['edit_training_time'.$counter]));
        $id = $rows['id'];

        $query2 = mysqli_query($con, "UPDATE icts_training SET `desc`='$desc', `date`='$date', `time`='$time' WHERE id='$id'");
        $counter ++;
    }
    $respo = "Successfully Updated";
}
catch(Exception $ex)
{
    $respo = "Error Occurred".$ex;
}
echo $respo;

?>