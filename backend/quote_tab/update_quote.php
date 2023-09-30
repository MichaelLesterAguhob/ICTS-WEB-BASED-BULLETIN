<?php 
include_once('connection.php');
$to_edit_quote =$_POST['to_edit_quote'];
$quote = mysqli_real_escape_string($con, $_POST['quote']);
$author = mysqli_real_escape_string($con,$_POST['author']);
$response = "";
$user_type = $_SESSION['user_type'];
$username = $_SESSION['username'];
try
{
    $result = mysqli_query($con, "UPDATE quote_of_the_week SET `quote`='$quote', `author`='$author' WHERE `id`='$to_edit_quote' ");
    if($result)
    {
        $response = json_encode(['status'=>'success', 'html'=>'Updated Successfully']);

        if( $user_type != 'admin')
        {
            $date = date("Y/m/d");
            $timeZone = date_default_timezone_set("Asia/Manila");
            $time = date("h:i:sa");
            $dt = $date ." - ".$time;
    
            $query2 = "INSERT INTO activity VALUES ('','$username','Edited Quote','$dt')";
            $result2 = mysqli_query($con, $query2);
        }
    }
}
catch(Exception $ex)
{

}
echo $response;


?>