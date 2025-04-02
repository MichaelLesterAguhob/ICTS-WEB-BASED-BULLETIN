
<?php 
include_once('connection.php');
$quote = mysqli_real_escape_string($con, $_POST['quote']);
$author = mysqli_real_escape_string($con,$_POST['author']);
$response = "";
$user_type = $_SESSION['user_type'];
$username = $_SESSION['username'];
try
{
    $query = "INSERT INTO quote_of_the_week VALUES('', '$quote', '$author','Use')";
    $result = mysqli_query($con, $query);
    if($result)
    {
        if( $user_type != 'admin')
        {
            $date = date("Y/m/d");
            $timeZone = date_default_timezone_set("Asia/Manila");
            $time = date("h:i:sa");
            $dt = $date ." - ".$time;
    
            $query2 = "INSERT INTO activity VALUES ('','$username','Added Quote','$dt')";
            $result2 = mysqli_query($con, $query2);
        }
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