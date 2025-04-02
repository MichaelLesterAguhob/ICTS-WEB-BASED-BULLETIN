<?php 
include_once('connection.php');
$respo = "";
$cmes_id = $_POST['cmes_id'];
$office = "";
$time = "";
$date = "";
$host = "";
$fb_live = "";
$ppab_cam = "";
$remarks = "";

try
{   
    $query1 = mysqli_query($con, "SELECT * FROM cmes WHERE id='$cmes_id' ");
    $rows=mysqli_fetch_array($query1);
    
        $office .= $rows[1];
        $date .= $rows[2];
        $time .= date("H:i", strtotime($rows[3]));
        $host .= $rows[4];
        $fb_live .= $rows[5];
        $ppab_cam .= $rows[6];
        $remarks .= $rows[7];
    
    $respo = json_encode(['status'=>'success', 'office'=>$office, 'time'=>$time, 'date'=>$date, 'host'=>$host, 'fb'=>$fb_live, 'ppab'=>$ppab_cam, 'remarks'=>$remarks]);
}
catch(Exception $ex)
{
    $respo = json_encode(['status'=>'Exception', 'msg'=>$ex]);
}
echo $respo;
?>