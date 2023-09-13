<?php 
include_once ('connection.php'); 

$response = "";
$name = strtoupper($_POST['name']);
$date = $_POST['bdate'];
try
{
    move_uploaded_file($_FILES['bday_image']['tmp_name'],'bday_images/'. $_FILES['bday_image'] ['name']);
    $image = $_FILES['bday_image']['name'];
    $query = "INSERT INTO birthday_tbl (name, birth_date, image) VALUES ('$name','$date','$image')";
    $result = mysqli_query($con, $query);
    if($result)
    {
        $response = "Successfully Added";
    }
    else
    {
        $response = "Unknown Error Occured";
    }
}
catch(Exception $ex)
{
   $response = "Error Occured" . $ex;
}

    echo $response;

?>