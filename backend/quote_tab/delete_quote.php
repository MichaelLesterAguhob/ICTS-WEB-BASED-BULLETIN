<?php 
include_once('connection.php');
$response = "";
$quote_id = $_POST['to_delete_quote'];
$user_type = $_SESSION['user_type'];
$username = $_SESSION['username'];
try
{
    $result = mysqli_query($con, "DELETE FROM quote_of_the_week WHERE `id`='$quote_id' ");
    if($result)
    {
        $response = "Deleted Successfully";
        if( $user_type != 'admin')
            {
                $date = date("Y/m/d");
                $timeZone = date_default_timezone_set("Asia/Manila");
                $time = date("h:i:sa");
                $dt = $date ." - ".$time;
        
                $query2 = "INSERT INTO activity VALUES ('','$username','Deleted Quote','$dt')";
                $result2 = mysqli_query($con, $query2);
            }
    }
}
catch(Exception $ex)
{
    $response = "Exception Occurred" . $ex;
}

echo $response;




?>