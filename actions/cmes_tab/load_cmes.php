<?php
include_once('../../config/db_connection.php');
$data = '';
$respo = ""; 

try
{
    $query1 = mysqli_query($con, "SELECT * FROM cmes");
    if(mysqli_num_rows($query1) > 0)
    {
        $query = mysqli_query($con, "SELECT * FROM cmes ORDER BY `date` ASC");
        while($rows = mysqli_fetch_assoc($query))
        {
            $data .= '
                <tr>
                    <td style="width: 20%;">'.$rows['committee_office'].'</td>
                    <td style="width: 10%;">'.date("F d, Y",strtotime($rows['date'])).'</td>
                    <td style="width: 10%;">'.$rows['time'].'</td>
                    <td style="width: 20%;" class="multiline">'.$rows['host'].'</td>
                    <td style="width: 5%;">'.$rows['fb_live'].'</td>
                    <td style="width: 5%;">'.$rows['ppab_cam'].'</td> 
                    <td style="width: 20%;" class="multiline">'.$rows['remarks'].'</td>
                    <td style="width: 10%; text-align: right;">
                        <button class="cmes_btn cmes_edit" data-id="'.$rows['id'].'" title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        &nbsp;&nbsp;
                        <button class="cmes_btn cmes_del" data-id="'.$rows['id'].'" title="Delete">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </td>
                </tr>
            ';
        }
    }
    else
    {
        $respo = "No Committee Meeting and Event Schedule found.....";
    }
    
    $respo = $data;
}
catch(Exception $ex)
{
    $respo = "Error occurred" . $ex;
}
echo $respo;

?>