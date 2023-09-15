<?php 
include_once('connection.php');
$response = "";
$quote_id = $_POST['to_delete_quote'];

try
{
    $result = mysqli_query($con, "DELETE FROM quote_of_the_week WHERE `id`='$quote_id' ");
    if($result)
    {
        $response = "Deleted Successfully";
    }
}
catch(Exception $ex)
{
    $response = "Exception Occured" . $ex;
}

echo $response;




?>