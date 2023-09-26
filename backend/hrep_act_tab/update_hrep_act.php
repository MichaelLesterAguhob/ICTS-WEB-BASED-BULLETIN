<?php 
include_once('connection.php');
$respo = "";
$id = $_POST['edit_hrep_act_id'];
$old_img = $_POST['edit_hrep_act_img_old'];

try
{
    unlink('img/'.$old_img);
    move_uploaded_file($_FILES['edit_hrep_act_img']['tmp_name'],'img/'.$_FILES['edit_hrep_act_img']['name']);
    $new_img = $_FILES['edit_hrep_act_img']['name'];
    $query = mysqli_query($con, "UPDATE hrep_activities SET img='$new_img' WHERE id='$id'");
    if($query)
    {
        $respo = "Successfull Updated";
    }
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}

echo $respo;


?>