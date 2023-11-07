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
            // icts_announcement title
            $data .= '
            <div class="card">
            <div class="card-header">
                <h4 class="card_title">'.$icts_ann_rows['title'].'</h4>
            </div>
            <div class="card-body">
            ';
            
            // if cont type is Emergency Response Team
            if($icts_ann_rows['cont_type'] == "Emergency Response Team")
            {
                // selecting all teams and names 
                $icts_ert_qry = mysqli_query($con, "SELECT * FROM icts_ert_teams");

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
