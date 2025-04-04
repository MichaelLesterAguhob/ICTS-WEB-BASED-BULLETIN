<?php 
include_once('../../config/db_connection.php');
$respo = "";
$data = '';
try
{
    $check_data_qry = mysqli_query($con, "SELECT * FROM hrep_ann");
    if(mysqli_num_rows($check_data_qry) > 0)
    {
        $load_data_qry = mysqli_query($con, "SELECT * FROM hrep_ann");
        while($rows = mysqli_fetch_assoc($load_data_qry))
        {
            $data .= '
                <tr>
                    <td style="width: 50%;">'.$rows['subject'].'</td>
                    <td style="width: 15%;">'.$rows['date_release'].'</td>
                    <td style="width: 15%;">'.$rows['office'].'</td>
                    <td style="width: 10%;">'.$rows['qr'].'</td>
                    <td style="width: 10%; text-align: right;">
                        <button 
                            class="hrep_ann_btn hrep_ann_edit" 
                            data-subj="'.$rows['subject'].'" 
                            data-date="'.$rows['date_release'].'" 
                            data-office="'.$rows['office'].'" 
                            data-qr="'.$rows['qr'].'" 
                            data-id="'.$rows['id'].'" 
                            title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        &nbsp;&nbsp;
                        <button class="hrep_ann_btn hrep_ann_del" data-id="'.$rows['id'].'" title="Delete">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </td>
                </tr>
            ';
        }
    }
    else
    {
        $data .= "<tr><td colspan='5'>No HRep Announcement found...</td></tr>";
    }
    $respo = $data;
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}
echo $respo;
?>

