
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
            $view_btn = '';
            if($rows['forgot'] == 'yes')
            {
                $view_btn .= '<button data-id="'.$rows['account_id'].'" class="btn btn-sm btn-success view_btn">View</button>';
            }
            $data .= '
                <tr>
                    <td style="width:10%;">'.$rows['account_id'].'</td>
                    <td style="width:45%;">'.$rows['username'].'</td>
                    <td class="user_pass" style="width:35%;">
                    <input type="password" id="'.$rows['account_id'].'" value="'.$rows['password'].'" class="user_password" disabled>
                    </td>
                    <td style="width:10%;">'.$view_btn.'</td>
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
