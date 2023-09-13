<?php 
include_once('connection.php');
$id = $_POST['id_to_edit'];
try
{
    $result = mysqli_query($con, "SELECT * FROM birthday_tbl WHERE id='$id'");
}
catch(Exception $ex)
{

}

?>