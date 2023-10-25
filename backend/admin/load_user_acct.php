
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
                $view_btn .= '<button data-id="'.$rows['account_id'].'" password="'.$rows['password'].'" password-plain="'.$rows['pass_plain'].'" class="btn btn-sm btn-success view_btn">View</button>';
            }
            if($rows['forgot'] == 'no')
            {
                $view_btn .= 'NO';
            }
            $data .= '
                <tr>
                    <td style="width:10%; text-align:center;">'.$rows['account_id'].'</td>
                    <td style="width:90%; text-align:center;">'.$rows['username'].'</td>
                    <td class="user_pass" style="width:35%; display:none;">
                    <input type="text" id="'.$rows['account_id'].'" value="'.$rows['password'].'" class="user_password" disabled>
                    </td>
                    <td style="width:10%; display:none;">'.$view_btn.'</td>
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
