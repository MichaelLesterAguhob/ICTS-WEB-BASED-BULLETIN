<?php 
include_once('connection.php');
$respo = "";
$data = '';

try
{
    $query = mysqli_query($con, "SELECT * FROM hrep_activities");
    $check_data = mysqli_num_rows($query);
    if($check_data > 0)
    {
    $count = 1;
    $query1 = mysqli_query($con, "SELECT * FROM hrep_activities");
    while($rows = mysqli_fetch_assoc($query1))
    {
        $data .= '
            <tr>
                <td>'.$count.'</td>
                <td>
                <img src="backend/hrep_act_tab/img/'.$rows['img'].'" 
                     alt="Image"
                     style="width: 50px; height: 50px;">
                </td>
                <td>
                    <button class="hrept_act_edit" data-img="'.$rows['img'].'" data-id="'.$rows['id'].'">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    &nbsp;&nbsp;
                    <button class="hrept_act_delete" data-img="'.$rows['img'].'" data-id="'.$rows['id'].'">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
        ';
        $count ++;
    }
    $respo = $data;
    }
    else
    {
        $respo = '<td colspan="3" class="text-center">No Data Found</td>';
    }
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}
echo $respo;


?>