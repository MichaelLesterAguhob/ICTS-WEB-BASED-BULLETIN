<?php 
include_once('../../config/db_connection.php');
$respo = "";
$subject = strtoupper(trim($_POST['edit_subject']));
$date_rel = $_POST['edit_hrep_ann_date'];
$office = strtoupper(trim($_POST['edit_hrep_ann_office']));
$id = $_POST['edit_hrep_ann_id'];
$image_changed = $_POST['edit_hrep_ann_img_holder'];

try
{
    if($image_changed == "new_image")
    {
        move_uploaded_file($_FILES['edit_hrep_ann_image']['tmp_name'],'../../storage/uploads/hrep_ann_img/'.$_FILES['edit_hrep_ann_image']['name']);
        $new_image = $_FILES['edit_hrep_ann_image']['name'];
        $update_qry = mysqli_query($con, "UPDATE hrep_ann SET `subject`='$subject', `date_release`='$date_rel', `office`='$office', `qr`='$new_image' WHERE `id`='$id'");
        if($update_qry) 
        {
            $respo = "Successfully Updated";
        }
    }
    else
    {
        $update_qry = mysqli_query($con, "UPDATE hrep_ann SET `subject`='$subject', `date_release`='$date_rel', `office`='$office' WHERE `id`='$id'");
        if($update_qry) 
        {
            $respo = "Successfully Updated";
        }
    }
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}
echo $respo;
?>