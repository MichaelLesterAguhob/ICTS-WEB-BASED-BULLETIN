
<?php 
include_once('connection.php');
$quote_id = $_POST['to_edit_quote'];
$quote = '';
$author = '';
$response = "";

try
{
    $result = mysqli_query($con, "SELECT * FROM quote_of_the_week WHERE id='$quote_id'");
    $row = mysqli_fetch_array($result);

    $quote = $row[1];    
    $author = $row[2];

    $response = json_encode(['status'=>'success', 'quote'=>$quote, 'author'=>$author]);

}
catch(Exception $ex)
{
    $response = json_encode(['status'=>'exception', 'errmsg'=>"".$ex]);

}
echo $response;
?>