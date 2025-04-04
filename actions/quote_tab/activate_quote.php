<?php 
include_once('../../config/db_connection.php');
$respo = '';
$activate_quote = $_POST['quote_id'];

try
{
    $query = mysqli_query($con, "UPDATE quote_of_the_week SET `use_quote`='Use' ");
    if($query)
    {
        $query2 = mysqli_query($con, "UPDATE quote_of_the_week SET `use_quote`='Active' WHERE id='$activate_quote' ");
    }

}
catch(Exception $ex)
{
    $respo = 'Error Occurred' . $ex;
}
    echo $respo;
?>