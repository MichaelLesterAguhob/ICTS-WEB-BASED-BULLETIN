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

    $training_num = $_POST['edit_training_num'];
    $added_new_training = $_POST['edit_added_new_training'];

    while($training_num != $added_new_training)
    {
        $training_num ++;
        $new_desc = $_POST['edit_training_desc'.$training_num];
        $new_date = $_POST['edit_training_date'.$training_num];
        $new_time = date('h:i A',strtotime($_POST['edit_training_time'.$training_num]));

        // if($new_desc != "" && $new_date != "" && $new_time != "")
        // {
            $insert_qry = mysqli_query($con, "INSERT INTO icts_training VALUES ('', '$cont_id', '$new_desc', '$new_date', '$new_time')");
        // }
    }
    $respo = "Successfully Updated";
}
catch(Exception $ex)
{
    $respo = "Error Occurred".$ex;
}
echo $respo;

?>