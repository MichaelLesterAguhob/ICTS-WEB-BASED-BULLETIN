<?php 
include_once('connection.php');
$cont_id = $_POST['cont_id'];
$cont_type = $_POST['cont_type'];
$respo = '';
$data = '';
$ert_team_num = 0;
$training_num = 0;
try
{
    if($cont_type == 'Emergency Response Team')
    {
        $team_name = '';
        $title = '';
        $query1 = mysqli_query($con, "SELECT title FROM icts_ann_cont WHERE cont_id='$cont_id'");
        $title = mysqli_fetch_array($query1);

        $query2 = mysqli_query($con, "SELECT * FROM icts_ert_teams WHERE cont_id='$cont_id'");
        while($rows = mysqli_fetch_assoc($query2))
        {
            $ert_team_num ++;
            $data .= '
            <tr>
            <th>Team Name:</th>
            <td>
            <input type="text" name="edit_ert_team_name'.$ert_team_num.'" id="edit_ert_team_name'.$ert_team_num.'" class="form-control" value="'.$rows['team_name'].'"></td>
            </tr>
            <tr>
            <td class="text-secondary">Name:</td>
            <td><textarea type="text" name="edit_ert_name_list'.$ert_team_num.'" id="edit_ert_name_list'.$ert_team_num.'" class="form-control" rows="4">'.$rows['name_list'].'</textarea></td>
            </tr>
            ';
            
            
        }
        $respo = json_encode(['stat'=>'success', 'title'=>$title[0],'html'=>$data, 'ert_team_num'=>$ert_team_num]);
    }
    else if($cont_type == 'QR/Form')
    {
        $title = '';
        $query1 = mysqli_query($con, "SELECT title FROM icts_ann_cont WHERE cont_id='$cont_id'");
        $title = mysqli_fetch_array($query1);

        $query2 = mysqli_query($con, "SELECT * FROM icts_img_date WHERE cont_id='$cont_id'");
        while($rows = mysqli_fetch_assoc($query2))
        {
            $data .= '
            <tr>
                <th>Date:</th>
                <td>
                    <input type="date" 
                            name="edit_qrform_date" 
                            class="form-control" 
                            value="'.$rows['date'].'">
                </td>
            </tr>
            <tr>
                <td>
                    <img alt="QR Code" src="backend/icts_announcement/icts_img/'.$rows['img'].'" id="edit_qrform_img_preview">
                </td>
                <td>
                    <input type="file" 
                            name="edit_qr_form_img" 
                            id="edit_qr_form_img" 
                            onchange="readQREditURL(this);" 
                            class="form-control" 
                            accept="image/jpg, image/jpeg">
                </td>
            </tr>
            ';
        }
        $respo = json_encode(['stat'=>'success', 'title'=>$title[0],'html'=>$data]);
    }
    else if($cont_type == 'Training')
    {
        $title = '';
        $query1 = mysqli_query($con, "SELECT title FROM icts_ann_cont WHERE cont_id='$cont_id'");
        $title = mysqli_fetch_array($query1);

        $query2 = mysqli_query($con, "SELECT * FROM icts_training WHERE cont_id='$cont_id'");
        while($rows = mysqli_fetch_assoc($query2))
        {
            $training_num ++;
            $data .= '
            <tr>
                <th>Description: </th>
                <td><input type="text" name="edit_training_desc'.$training_num.'" class="form-control" value="'.$rows['desc'].'"></td>
            </tr>
            <tr>
                <th>Date: </th>
                <td><input type="date" name="edit_training_date'.$training_num.'" class="form-control" value="'.$rows['date'].'"></td>
            </tr>
            <tr>
                <th>time: </th>
                <td><input type="time" name="edit_training_time'.$training_num.'" class="form-control" value="'.date("H:i:s",strtotime($rows['time'])).'"></td>
            </tr>
            
            ';
        }
        $respo = json_encode(['stat'=>'success', 'title'=>$title[0],'html'=>$data, 'training_num'=>$training_num]);
    }
}
catch(Exception $ex)
{
    $respo = json_encode(['stat'=>'error', 'err_msg'=> "Error Occurred" . $ex ]);
}
echo $respo;

?>