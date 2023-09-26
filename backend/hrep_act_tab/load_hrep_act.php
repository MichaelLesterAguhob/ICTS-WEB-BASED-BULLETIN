<?php 
include_once('connection.php');
$respo = "";
$data = '';

try
{
    $count = 1;
    $query = mysqli_query($con, "SELECT * FROM hrep_activities");
    while($rows = mysqli_fetch_assoc($query))
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
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}
echo $respo;


?>