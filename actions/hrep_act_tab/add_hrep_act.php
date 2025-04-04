<?php 
include_once('../../config/db_connection.php');
$respo = "";
$user_type = $_SESSION['user_type'];
$username = $_SESSION['username'];

try
{
    move_uploaded_file($_FILES['upload_hrep_act_img']['tmp_name'],'img/'.$_FILES['upload_hrep_act_img']['name']);
    $image= $_FILES['upload_hrep_act_img']['name'];

    $query = mysqli_query($con, "INSERT INTO hrep_activities VALUES('','$image')");
    if($query)
    {
        if( $user_type != 'admin')
        {
            $date = date("Y/m/d");
            $timeZone = date_default_timezone_set("Asia/Manila");
            $time = date("h:i:sa");
            $dt = $date ." - ".$time;
    
            $query2 = "INSERT INTO activity VALUES ('','$username','Added HRep Activity','$dt')";
            $result2 = mysqli_query($con, $query2);
        }
       $respo = "Successfully Added";
    }
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}

echo $respo;
?>