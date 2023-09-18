
<?php 
include_once('connection.php');
$quote = mysqli_real_escape_string($con, $_POST['quote']);
$author = mysqli_real_escape_string($con,$_POST['author']);
$response = "";
try
{
    $query = "INSERT INTO quote_of_the_week VALUES('', '$quote', '$author')";
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
    $response = json_encode(['status'=>'exception', 'ex_msg'=>'Error Occurred'.$ex]);
}
echo $response;

?>