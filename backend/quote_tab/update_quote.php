<?php 
include_once('connection.php');
$to_edit_quote =$_POST['to_edit_quote'];
$quote = mysqli_real_escape_string($con, $_POST['quote']);
$author = mysqli_real_escape_string($con,$_POST['author']);
$response = "";

try
{
    $result = mysqli_query($con, "UPDATE quote_of_the_week SET `quote`='$quote', `author`='$author' WHERE `id`='$to_edit_quote' ");
    if($result)
    {
        $response = json_encode(['status'=>'success', 'html'=>'Updated Successfully']);
    }
}
catch(Exception $ex)
{

}
echo $response;


?>