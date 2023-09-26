<?php 
include_once('connection.php');
$respo = "";
// ;

try
{
    move_uploaded_file($_FILES['upload_hrep_act_img']['tmp_name'],'img/'.$_FILES['upload_hrep_act_img']['name']);
    $image= $_FILES['upload_hrep_act_img']['name'];

    $query = mysqli_query($con, "INSERT INTO hrep_activities VALUES('','$image')");
    if($query)
    {
       $respo = "Successfully Added";
    }
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}

echo $respo;
?>