<?php 
include_once('../../config/db_connection.php');
$respo = "";
$cont_id = $_POST['edit_icts_cont_id'];
$title = trim(strtoupper($_POST['edit_icts_ann_title']));
$qrform_date = $_POST['edit_qrform_date'];
$qrform_img = $_FILES['edit_qr_form_img']['name'];
$img = $_POST['edit_qrform_img_holder'];
try
{
    $query1 = mysqli_query($con, "UPDATE icts_ann_cont SET `title`='$title' WHERE `cont_id`='$cont_id' ");
    if($qrform_img != "")
    {
        move_uploaded_file($_FILES['edit_qr_form_img']['tmp_name'],'../../storage/uploads/icts_ann_img/'. $_FILES['edit_qr_form_img']['name']);
        $img = $_FILES['edit_qr_form_img']['name'];
    }
    $query2 = mysqli_query($con, "SELECT * FROM icts_img_date WHERE cont_id='$cont_id' ");
    while($rows = mysqli_fetch_assoc($query2))
    {
        $id= $rows['id'];
        $query3 = mysqli_query($con, "UPDATE icts_img_date SET `img`='$img', `date`='$qrform_date' WHERE id='$id'");
    }
    $respo = "Successfully Updated";
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}
echo $respo;

?>