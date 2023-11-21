<?php
include_once('connection.php');
$data = '';
$respo = "";
$hrep_card_cnt = 0;
try 
{
    $check_data = mysqli_query($con, "SELECT * FROM hrep_ann");
    if(mysqli_num_rows($check_data) > 0)
    {
        $hrep_ann_qry = mysqli_query($con, "SELECT * FROM hrep_ann");
        while($hrep_ann_rows = mysqli_fetch_assoc($hrep_ann_qry))
        {
            $hrep_card_cnt++;
            $date = date('F d, Y', strtotime($hrep_ann_rows['date_release']));
            $data .= '
                <div class="card hrep_ann_card" id="hrep_ann_card'.$hrep_card_cnt.'">
                    <div class="card-header mb-5">
                        <h5>SUBJECT: '.$hrep_ann_rows['subject'].'</h5>
                        <h6>DATE RELEASE: <span>'.$date.'</span></h6>
                        <h6>OFFICE: <span>'.$hrep_ann_rows['office'].'</span></h6>
                    </div>
                    <div class="card-body">
                        <img src="backend/hrep_ann_tab/img/'.$hrep_ann_rows['qr'].'" class="hrep_ann_img">
                    </div>
                </div>
            ';
        }
    }

    $respo = json_encode(['stat'=>'success', 'respo'=>$data, 'hrep_ann_cnt'=>$hrep_card_cnt]);
} 
catch (Exception $ex) 
{
    $respo = json_encode(['stat'=>'exc', 'respo'=>"Error Occurred ".$ex]);
}

echo $respo;
?>