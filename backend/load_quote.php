<?php 
include_once('connection.php');

$response = "";
$data = '';
try
{
    $query = "SELECT * FROM quote_of_the_week";
    $result = mysqli_query($con, $query);
    $has_data = mysqli_num_rows($result);
    if($has_data <= 0)
    {
        $response = json_encode(['status'=>'no_data', 'msg'=>"No data found!"]);
    }
    else
    {
        $result2 = mysqli_query($con, "SELECT * FROM quote_of_the_week");
        while($row = mysqli_fetch_assoc($result2))
        {
            $data .= '
                <tr>
                    <td style="width: 50%;"">'.$row['quote'].'</td>    
                    <td style="width: 30%;"">'.$row['quote_owner'].'</td>    
                    <td style="width: 20%;"">
                        <button 
                            data-id="'.$row['id'].'" 
                            class="btn btn-sm btn-warning edit_quote_btn">
                            Edit
                        </button>
                        <button 
                            data-id="'.$row['id'].'" 
                            class="btn btn-sm btn-danger delete_quote_btn">
                            Del
                        </button>
                    </td>    
                </tr>
            ';
        }
        $response = json_encode(['status'=>'success', 'html'=> $data]);
    }
}
catch(Exception $ex)
{
    $response = json_encode(['status'=>'error', 'errmsg'=>"".$ex]);
}
echo $response;
?>