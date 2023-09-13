<?php 
include_once('connection.php');
$name = '';
$date = '';
$image = '';
$response = "";
$id = $_POST['id_to_edit'];
try
{
    $result = mysqli_query($con, "SELECT * FROM birthday_tbl WHERE id='$id'");
    $row = mysqli_fetch_array($result);

    $name = $row[1];    
    $date = $row[2];
    $image = $row[3];

    $response = json_encode(['status'=>'success', 'name'=>$name, 'date'=>$date, 'image'=>$image]);

}
catch(Exception $ex)
{
    $response = json_encode(['status'=>'exception', 'errmsg'=>"".$ex]);

}
echo $response;
?>