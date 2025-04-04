<?php 
include_once('../../config/db_connection.php');
$respo = "";
$id = $_POST['edit_hrep_act_id'];
$old_img = $_POST['edit_hrep_act_img_old'];
$user_type = $_SESSION['user_type'];
$username = $_SESSION['username'];
try
{
    unlink('img/'.$old_img);
    move_uploaded_file($_FILES['edit_hrep_act_img']['tmp_name'],'../../storage/uploads/hrep_act_img/'.$_FILES['edit_hrep_act_img']['name']);
    $new_img = $_FILES['edit_hrep_act_img']['name'];
    $query = mysqli_query($con, "UPDATE hrep_activities SET img='$new_img' WHERE id='$id'");
    if($query)
    {
        $respo = "Successfull Updated";

        if( $user_type != 'admin')
        {
            $date = date("Y/m/d");
            $timeZone = date_default_timezone_set("Asia/Manila");
            $time = date("h:i:sa");
            $dt = $date ." - ".$time;
    
            $query2 = "INSERT INTO activity VALUES ('','$username','Edited HRep Activity','$dt')";
            $result2 = mysqli_query($con, $query2);
        }
    }
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}

echo $respo;


?>