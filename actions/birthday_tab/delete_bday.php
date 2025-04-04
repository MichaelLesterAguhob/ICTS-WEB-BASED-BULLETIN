
<?php 
include_once('../../config/db_connection.php');
$to_delete_bday = $_POST['to_delete_bday'];
$response = "";

$user_type = $_SESSION['user_type'];
$username = $_SESSION['username'];
try
{ 
    $image_filename = "SELECT image FROM birthday_tbl WHERE id='$to_delete_bday'";
    $filename_res = mysqli_query($con, $image_filename);
    $filename = mysqli_fetch_array($filename_res);
    if(file_exists("../../storage/uploads/bday_images/".$filename[0]))
    {
        // unlink("bday_images/".$filename[0]);
        $query = "DELETE FROM birthday_tbl WHERE id='$to_delete_bday'";
        $result = mysqli_query($con, $query);
        if($result)
        {
            $response = "Deleted Successfully";

            if( $user_type != 'admin')
            {
                $date = date("Y/m/d");
                $timeZone = date_default_timezone_set("Asia/Manila");
                $time = date("h:i:sa");
                $dt = $date ." - ".$time;
        
                $query2 = "INSERT INTO activity VALUES ('','$username','Deleted Birthday','$dt')";
                $result2 = mysqli_query($con, $query2);
            }
        }
    } 
    else
    {
        $query = "DELETE FROM birthday_tbl WHERE id='$to_delete_bday'";
        $result = mysqli_query($con, $query);
        if($result)
        {
            $response = "Deleted Successfully";

            if( $user_type != 'admin')
            {
                $date = date("Y/m/d");
                $timeZone = date_default_timezone_set("Asia/Manila");
                $time = date("h:i:sa");
                $dt = $date ." - ".$time;
        
                $query2 = "INSERT INTO activity VALUES ('','$username','Deleted Birthday','$dt')";
                $result2 = mysqli_query($con, $query2);
            }
        }
    }
    
    
}
catch(Exception $ex)
{
    $response = "Error Occurred" . $ex;
}

echo $response;

?>