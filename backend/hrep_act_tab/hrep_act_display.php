<?php 
include_once('connection.php');
$respo = "";
$data = '';
try
{
    $query = mysqli_query($con, "SELECT * FROM hrep_activities");
   while($row = mysqli_fetch_assoc($query))
   {
       $data .= 
       '
       <div class="card hrep_act_card">
       <div class="card-body hrep_act_card_body">
       <img src="backend/hrep_act_tab/img/'.$row['img'].'" alt="image" class="hrep_act_img">
       </div>
       </div>
       ';
    }
    $respo = $data;
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}
echo $respo;

?>
