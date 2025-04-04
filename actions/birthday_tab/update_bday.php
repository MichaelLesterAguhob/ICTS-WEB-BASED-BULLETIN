<?php 
include_once('../../config/db_connection.php');
$response = "";
$bday_id = $_POST['bday_id'];
$edit_name = strtoupper($_POST['edit_name']);
$edit_bdate = date("F d, Y", strtotime($_POST['edit_bdate']));
$edit_old_image = $_POST['edit_old_image'];
$image_changes = $_POST['image_changes'];

$user_type = $_SESSION['user_type'];
$username = $_SESSION['username'];
try
{ 
    if($image_changes == "image_changed")
    {
        if(file_exists('bday_images/'.$edit_old_image))
        {
            unlink("bday_images/".$edit_old_image);
            move_uploaded_file($_FILES['edited_bday_image']['tmp_name'],'bday_images/'.$_FILES['edited_bday_image']['name']);
            $new_image = $_FILES['edited_bday_image']['name'];
            $result = mysqli_query($con, "UPDATE birthday_tbl SET name='$edit_name', birth_date='$edit_bdate', image='$new_image' WHERE id='$bday_id'");
            if($result)
            {
                $response = json_encode(['status'=>'success', 'html'=>'Updated Successfully']);

                if( $user_type != 'admin')
                {
                    $date = date("Y/m/d");
                    $timeZone = date_default_timezone_set("Asia/Manila");
                    $time = date("h:i:sa");
                    $dt = $date ." - ".$time;
            
                    $query2 = "INSERT INTO activity VALUES ('','$username','Edited Birthday','$dt')";
                    $result2 = mysqli_query($con, $query2);
                }
            }
            else
            {
                $response = json_encode(['status'=>'success', 'html'=>'Unknown Error Occurred']);
            }

        }
    }
    else
    {
        $query = "UPDATE birthday_tbl SET `name`='$edit_name', `birth_date`='$edit_bdate' WHERE `id`='$bday_id'";
        $result = mysqli_query($con, $query);
        if($result)
        {
            $response = json_encode(['status'=>'success', 'html'=>'Updated Successfully']);

            if( $user_type != 'admin')
                {
                    $date = date("Y/m/d");
                    $timeZone = date_default_timezone_set("Asia/Manila");
                    $time = date("h:i:sa");
                    $dt = $date ." - ".$time;
            
                    $query2 = "INSERT INTO activity VALUES ('','$username','Edited Birthday','$dt')";
                    $result2 = mysqli_query($con, $query2);
                }
        }
        else
        {
            $response = json_encode(['status'=>'success', 'html'=>'Unknown Error Occurred']);
        }
    }

}
catch(Exception $ex)
{
    $response = json_encode(['status'=>'exception', 'html'=>'Unknown Error Occurred']);
}
echo $response;

?>






