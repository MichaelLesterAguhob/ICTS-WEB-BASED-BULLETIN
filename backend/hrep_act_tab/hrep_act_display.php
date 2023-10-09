<?php 
include_once('connection.php');
$respo = "";
$data = '';
try
{
    $query = mysqli_query($con, "SELECT * FROM hrep_activities");
    $row = mysqli_fetch_assoc($query);
    $data .= 
    '
    <div class="card">
        <div class="card-body">
        <img src="backend/hrep_act_tab/img/'.$row['img'].'" alt="image">
        </div>
    </div>
    ';
    $respo = $data;
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}
echo $respo;

?>
