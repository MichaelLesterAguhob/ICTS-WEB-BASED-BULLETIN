

<!-- TO EDIT -->
<?php 
include_once('connection.php');
$response = "";
$data = '';
try 
{
    
    $result = mysqli_query($con, "SELECT * FROM activity");
    if(mysqli_num_rows($result) <= 0)
    {
        $response = "No Data found!";
    }
    else
    {
        $result2 = mysqli_query($con, "SELECT * FROM activity ORDER BY id DESC");
        while($rows = mysqli_fetch_assoc($result2))
        {
            $data .= '
                <tr>
                    <td>'.$rows['username'].'</td>
                    <td>'.$rows['activities'].'</td>
                    <td>'.$rows['date'].'</td>
                </tr>
            ';
        }
        $response = $data;
    }

} 
catch (Exception $ex) 
{
    $response = "Error Occurred" . $ex;
}
echo $response;

?>
