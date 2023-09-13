
<?php 
include_once('connection.php');
$to_delete_bday = $_POST['to_delete_bday'];
$response = "";

try
{
    $image_filename = "SELECT image FROM birthday_tbl WHERE id='$to_delete_bday'";
    $filename_res = mysqli_query($con, $image_filename);
    $filename = mysqli_fetch_array($filename_res);
    if(file_exists("bday_images/".$filename[0]))
    {
        unlink("bday_images/".$filename[0]);
        $query = "DELETE FROM birthday_tbl WHERE id='$to_delete_bday'";
        $result = mysqli_query($con, $query);
        if($result)
        {
            $response = "Deleted Successfully";
        }
    } 
    else
    {
        $query = "DELETE FROM birthday_tbl WHERE id='$to_delete_bday'";
        $result = mysqli_query($con, $query);
        if($result)
        {
            $response = "Deleted Successfully";
        }
    }
    
    
}
catch(Exception $ex)
{
    $response = "Error Occured" . $ex;
}

echo $response;

?>