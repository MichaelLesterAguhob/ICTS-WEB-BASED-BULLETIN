
<?php 
include_once('../../config/db_connection.php');
$response = "";
$data = '';
try  
{
    
    $result = mysqli_query($con, "SELECT * FROM user_account");
    if(mysqli_num_rows($result) <= 0)
    {
        $response = "No Data found!";
    }
    else
    {
        $result2 = mysqli_query($con, "SELECT * FROM user_account");
        while($rows = mysqli_fetch_assoc($result2))
        {
            $data .= '
                <tr>
                    <td style="width:10%; text-align:center;">'.$rows['account_id'].'</td>
                    <td style="width:40%; text-align:left;">'.$rows['username'].'</td>
                    <td style="width:50%; text-align:left;">'.$rows['email_account'].'</td>
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
