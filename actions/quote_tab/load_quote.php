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
        $response = json_encode(['status'=>'no_data', 'msg'=>"No Quote found....."]);
    }
    else 
    {
        $result2 = mysqli_query($con, "SELECT * FROM quote_of_the_week");
        while($row = mysqli_fetch_assoc($result2))
        {
            $button = '';

            if($row['use_quote'] == 'Active')
            {
                $button .= '<button data-id="'.$row['id'].'" class="btn btn-sm btn-success btn_activate" disabled>'.$row['use_quote'].'</button>';
            }
            else
            {
                $button .= '<button data-id="'.$row['id'].'" class="btn btn-sm btn-secondary btn_activate">'.$row['use_quote'].'</button>';
            }
     
            $data .= ' 
                <tr>
                    <td style="width: 50%;">'.$row['quote'].'</td>    
                    <td style="width: 20%;">'.$row['author'].'</td>    
                    <td style="width: 10%;" class="action_td text-center">
                        '.$button.'
                    </td>    
                    <td style="width: 20%; text-align: right;" class="action_td">
                        <button 
                            data-id="'.$row['id'].'" 
                            class="edit_quote_btn"
                            title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        &nbsp;&nbsp;
                        <button 
                            data-id="'.$row['id'].'" 
                            class="delete_quote_btn"
                            title="Delete">
                            <i class="fa-solid fa-trash-can"></i>
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