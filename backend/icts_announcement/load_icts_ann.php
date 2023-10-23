<?php 
include_once('connection.php');
$respo = "";
$data = '<table class="table mt-5">';

try 
{
    // checking if ert data exist
    $query_1 = mysqli_query($con, "SELECT * FROM icts_ann_cont WHERE cont_type='Emergency Response Team'");
    if(mysqli_num_rows($query_1) > 0) 
    {
        $query_2 = mysqli_query($con, "SELECT * FROM icts_ann_cont WHERE cont_type='Emergency Response Team'");
        while($rows_2 = mysqli_fetch_assoc($query_2)) {
            $ert_title = $rows_2['title'];
            $ert_id = $rows_2['cont_id'];
            $ert_cont_type = $rows_2['cont_type'];
            $data .= '
                    <tr class="icts_ann_title">
                        <th colspan="2">' . $ert_title . '</th>
                        <td class="text-right">
                            <button 
                                data-id="'.$ert_id.'" 
                                data-cont-type="'.$ert_cont_type.'" 
                                class="edit_btn edit_icts_ann_btn"
                                title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>&nbsp;&nbsp;
                            <button 
                                data-id="'.$ert_id.'" 
                                data-cont-type="'.$ert_cont_type.'" 
                                class="delete_btn delete_icts_ann_btn"
                                title="Delete">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                ';
            $data .= '
                    <tr>
                        <th>Teams</th>
                        <th colspan="2">Members</th>
                    </tr>
                ';
            $ert_cont_id = $rows_2['cont_id'];
            $query_3 = mysqli_query($con, "SELECT * FROM icts_ert_teams WHERE cont_id='$ert_cont_id'");
            while($rows_3 = mysqli_fetch_assoc($query_3)) 
            {
                $team_id = $rows_3['id'];
                $table_name = 'icts_ert_teams';
                $data .= '
                        <tr>
                            <td class="text-left">' . $rows_3['team_name'] . '</td>
                            <td class="multiline text-left">' . $rows_3['name_list'] . '</td>

                            <td class="text-right">
                                <button 
                                    data-id="'.$team_id.'" 
                                    data-table-name="icts_ert_teams" 
                                    class="single_del_btn icts_ann_single_del"
                                    title="Delete">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                    ';
            }
        }
    }
                  
    // checking if qr form data exist
    $query_4 = mysqli_query($con, "SELECT * FROM icts_ann_cont WHERE cont_type='QR/Form'");
    if(mysqli_num_rows($query_4) > 0) 
    {
        $data .= '
                <tr style="height: 20px; border-color:white;">
                    <td colspan="3"></td>
                </tr>
            ';
        $query_5 = mysqli_query($con, "SELECT * FROM icts_ann_cont WHERE cont_type='QR/Form'");
        while($rows_5 = mysqli_fetch_assoc($query_5)) {
            $qrform_title = $rows_5['title'];
            $qrform_id = $rows_5['cont_id'];
            $qrform_cont_type = $rows_5['cont_type'];
            $data .= '
                    <tr style="height: 30px; border-color:  white;">
                        <td colspan="3"></td>
                    </tr>
                    <tr class="icts_ann_title">
                        <th colspan="2">' . $qrform_title . '</th>
                        <td class="text-right">
                            <button 
                                data-id="'.$qrform_id.'" 
                                data-cont-type="'.$qrform_cont_type.'" 
                                class="edit_btn edit_icts_ann_btn"
                                title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>&nbsp;&nbsp;
                            <button 
                                data-id="'.$qrform_id.'" 
                                data-cont-type="'.$qrform_cont_type.'" 
                                class="delete_btn delete_icts_ann_btn"
                                title="Delete">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                ';
            $data .= '
                    <tr>
                        <th>QR</th>
                        <th colspan="2">Date</th>
                    </tr>
                ';
            $qrform_cont_id = $rows_5['cont_id'];
            $query_6 = mysqli_query($con, "SELECT * FROM icts_img_date WHERE cont_id='$qrform_cont_id'");
            while($rows_6 = mysqli_fetch_assoc($query_6)) 
            {
                $qrform_id = $rows_6['id'];
                $data .= '
                        <tr>
                            <td class="text-left">'.$rows_6['img'].'</td>
                            <td class="multiline text-left p-2" colspan="2">'.$rows_6['date'].'</td>
                         
                        </tr>
                    ';
            }
        }
    }

    // checking if training data exist
    $query_7 = mysqli_query($con, "SELECT * FROM icts_ann_cont WHERE cont_type='Training'");
    if(mysqli_num_rows($query_7) > 0) 
    {
        $data .= '
                <tr style="height: 20px; border-color:white;">
                    <td colspan="3"></td>
                </tr>
            ';
        $query_8 = mysqli_query($con, "SELECT * FROM icts_ann_cont WHERE cont_type='Training'");
        while($rows_8 = mysqli_fetch_assoc($query_8)) {
            $training_title = $rows_8['title'];
            $training_id = $rows_8['cont_id'];
            $training_cont_type = $rows_8['cont_type'];
            $data .= '
                    <tr style="height: 30px; border-color:white;">
                        <td colspan="3"></td>
                    </tr> 
                    <tr class="icts_ann_title">
                        <th>'.$training_title.'</th>
                        <td class="text-right" colspan="2">
                            <button 
                                data-id="'.$training_id.'" 
                                data-cont-type="'.$training_cont_type.'" 
                                class="edit_btn edit_icts_ann_btn"
                                title="Edit">   
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>&nbsp;&nbsp;
                            <button 
                                data-id="'.$training_id.'" 
                                data-cont-type="'.$training_cont_type.'" 
                                class="delete_btn delete_icts_ann_btn"
                                title="Delete">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                ';  
            $data .= '
                    <tr>
                        <th>Description</th>
                        <th>Date & Time</th>
                    </tr>
                ';
            $training_cont_id = $rows_8['cont_id'];
            $query_9 = mysqli_query($con, "SELECT * FROM icts_training WHERE cont_id='$training_cont_id'");
            while($rows_9 = mysqli_fetch_assoc($query_9)) {
                $icts_training_id = $rows_9['id'];
                $data .= '
                    <tr>
                        <td class="text-left">' . $rows_9['desc'] . '</td>
                        <td class="multiline text-left p-2">' . $rows_9['date'] . ' | ' . $rows_9['time'] . '</td>
                        
                        <td class="text-right">
                                <button 
                                    data-id="'.$icts_training_id.'" 
                                    data-table-name="icts_training" 
                                    class="single_del_btn icts_ann_single_del"
                                    title="Delete">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                        </td>
                    </tr>
                ';
            }
        }
    }

    if($data == '<table class="table mt-5">')
    {
        $data .= '
        <tr style="height: 20px; border-color:white;">
            <td colspan="2">No Data Found....</td>
        </tr>
        ';
    }
    $data .= '
        </table>
    ';
    $respo = $data;
}
catch (Exception $ex) 
{
    $respo = "Error Occurred" . $ex;
}

echo $respo;

?>