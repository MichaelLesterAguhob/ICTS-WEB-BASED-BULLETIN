<?php 
include_once('connection.php');
$respo = "";
$subj = strtoupper(trim($_POST['subject']));
$date = $_POST['hrep_ann_date'];
$office = strtoupper(trim($_POST['hrep_ann_office']));

try
{
    move_uploaded_file($_FILES['hrep_ann_image']['tmp_name'],'img/'.$_FILES['hrep_ann_image']['name']);
    $image = $_FILES['hrep_ann_image']['name'];
    $insert_qry = mysqli_query($con, "INSERT INTO hrep_ann VALUES('', '$subj', '$date', '$office', '$image')");
    $respo = "Successfully Added";
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}

echo $respo;
?>