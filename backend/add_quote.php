
<?php 
include_once('connection.php');
$quote = mysqli_real_escape_string($con, $_POST['quote']);
$quote_owner = mysqli_real_escape_string($con,$_POST['quote_owner']);
$response = "";
try
{
    $query = "INSERT INTO quote_of_the_week VALUES('', '$quote', '$quote_owner')";
    $result = mysqli_query($con, $query);
    if($result)
    {
        $response = json_encode(['status'=>'success', 'html'=>'Successfully Added']);
    }
    else
    {
        $response = json_encode(['status'=>'failed_add', 'html'=>'Unsuccessful']);
    }
}
catch(Exception $ex)
{
    $response = json_encode(['status'=>'exception', 'ex_msg'=>'Error Occured'.$ex]);
}
echo $response;

?>