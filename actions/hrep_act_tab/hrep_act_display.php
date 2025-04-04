<?php 
include_once('../../config/db_connection.php');
$respo = "";
$data = '';
$hrep_act_card_count = 0;
try
{
    $query = mysqli_query($con, "SELECT * FROM hrep_activities");
   while($row = mysqli_fetch_assoc($query))
   {
       $hrep_act_card_count ++;
       $data .= 
       '
       <div class="card hrep_act_card" id="hrep_act_card'.$hrep_act_card_count.'">
       <div class="card-body hrep_act_card_body">
       <img src="../actions/hrep_act_tab/img/'.$row['img'].'" alt="image" class="hrep_act_img">
       </div>
       </div>
       ';
    }
    $respo = json_encode(['stat'=>'success', 'respo'=>$data, 'hrep_act_card_count'=>$hrep_act_card_count]);
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
    $respo = json_encode(['stat'=>'exc', 'respo'=>$ex]);
}
echo $respo;

?>
