<?php 
include_once('connection.php');
$respo = "";
$data = '';
try
{   
   $check_data_qry = mysqli_query($con, "SELECT * FROM icts_ann_cont");
   if(mysqli_num_rows($check_data_qry) > 0)
   {
        // if has data
        // getting all data from icts cont
        $icts_ann_qry = mysqli_query($con, "SELECT * FROM icts_ann_cont");

        // while fetching data
        while($icts_ann_rows = mysqli_fetch_assoc($icts_ann_qry))
        {   
            // if cont type is Emergency Response Team
            if($icts_ann_rows['cont_type'] == "Emergency Response Team")
            {
               // icts_announcement title
                $data .= '
                <div class="card ert_card">
                <div class="card-header">
                    <h4 class="card_title text-center">'.$icts_ann_rows['title'].'</h4>
                </div>
                <div class="card-body" id="ert_card_body">
                ';
 
                // selecting all teams and names 
                $ert_cont_id = $icts_ann_rows['cont_id'];
                $icts_ert_qry = mysqli_query($con, "SELECT * FROM icts_ert_teams WHERE cont_id = '$ert_cont_id' ");

                while($icts_ert_rows = mysqli_fetch_assoc($icts_ert_qry))
                {
                    $data .= '
                    <h5 class="card_body_title">'.$icts_ert_rows['team_name'].'</h5>
                    <p class="multiline">'.$icts_ert_rows['name_list'].'</p>
                    ';
                }

                $data .= '
                        </div>
                    </div>
                    ';
            }

            // if cont type is QR/Form
            if($icts_ann_rows['cont_type'] == "QR/Form")
            {
                // icts_announcement title
                $data .= '
                <div class="card qr_form_card">
                <div class="card-header">
                    <h4 class="card_title text-center">'.$icts_ann_rows['title'].'</h4>
                </div>
                <div class="card-body">
                ';

                // selecting all teams and names 
                $qrform_cont_id = $icts_ann_rows['cont_id'];
                $icts_qrform_qry = mysqli_query($con, "SELECT * FROM icts_img_date WHERE cont_id='$qrform_cont_id'");

                while($icts_qrform_rows = mysqli_fetch_assoc($icts_qrform_qry))
                {
                    $date = date('F d, Y',strtotime($icts_qrform_rows['date']));
                    $data .= '
                    <img src="backend/icts_announcement/icts_img/'.$icts_qrform_rows['img'].'" class="qr_form_img">
                    <p class="multiline qrform_date">'.$date.'</p>
                    <h3>ICTS</h3>
                    ';
                }

                $data .= '
                        </div>
                    </div>
                    ';
            }

             // if cont type is Training
             if($icts_ann_rows['cont_type'] == "Training")
             {
                 // icts_announcement title
                 $data .= '
                 <div class="card training_card">
                 <div class="card-header">
                     <h4 class="card_title text-center">'.$icts_ann_rows['title'].'!</h4>
                 </div>
                 <div class="card-body" id="training_card_body">
                 ';
 
                 // selecting all content of icts training
                 $training_cont_id = $icts_ann_rows['cont_id'];
                 $icts_training_qry = mysqli_query($con, "SELECT * FROM icts_training WHERE cont_id='$training_cont_id'");
 
                 while($icts_training_rows = mysqli_fetch_assoc($icts_training_qry))
                 {
                    $date = date('F d', strtotime($icts_training_rows['date']));
                     $data .= '
                     <h5 class="training_title">'.$icts_training_rows['desc'].'</h5>
                    <p class="traing_d_t">'.$date.' - '.$icts_training_rows['time'].'</p>
                     ';
                 }
 
                 $data .= '
                         </div>
                     </div>
                     ';
             }
        }
        $respo = $data;
    }
   else 
   {
        // if no data
   }
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}
echo $respo;

?>
