
<?php 
include_once('connection.php');
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
            $temp_pass_char ='';
            for($i=0; $i < strlen($rows['password']); $i++)
            {
                $temp_pass_char .= '*';
            }
            $data .= '
                <tr>
                    <td>'.$rows['account_id'].'</td>
                    <td>'.$rows['username'].'</td>
                    <td class="user_pass">'.$temp_pass_char.'</td>
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
