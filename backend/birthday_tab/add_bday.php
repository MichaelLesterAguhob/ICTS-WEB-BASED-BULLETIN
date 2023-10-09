<?php 
include_once ('connection.php');  

$response = "";
$name = strtoupper($_POST['name']);
$date = date('F d, Y', strtotime($_POST['bdate']));
$user_type = $_SESSION['user_type'];
$username = $_SESSION['username'];
try
{
    move_uploaded_file($_FILES['bday_image']['tmp_name'],'bday_images/'. $_FILES['bday_image'] ['name']);
    
    $image = $_FILES['bday_image']['name'];
    $query = "INSERT INTO birthday_tbl (name, birth_date, image) VALUES ('$name','$date','$image')";
    $result = mysqli_query($con, $query);
    if($result)
    {
        $response = "Successfully Added";

        if( $user_type != 'admin')
        {
            $date = date("Y/m/d");
            $timeZone = date_default_timezone_set("Asia/Manila");
            $time = date("h:i:sa");
            $dt = $date ." - ".$time;
    
            $query2 = "INSERT INTO activity VALUES ('','$username','Added Birthday','$dt')";
            $result2 = mysqli_query($con, $query2);
        }
    }
    else
    {   
        $response = "Unknown Error Occurred";
    }
}
catch(Exception $ex)
{
   $response = "Error Occurred" . $ex;
}

    echo $response;

?>