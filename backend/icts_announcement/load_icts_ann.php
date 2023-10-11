<?php 
include_once('connection.php');
$respo = "";
$data = '';
try 
{
    $query = mysqli_query($con, "SELECT * FROM icts_ann_cont WHERE cont_type='Emergency Response Team'");
    $is_not_null = mysqli_num_rows($query);
    if($is_not_null > 0) 
    {
        $query2 = mysqli_query($con, "SELECT * FROM icts_ann_cont WHERE cont_type='Emergency Response Team'");
        while($rows = mysqli_fetch_assoc($query2))
        {
            $title = $rows['title'];
            $data .= '
            <div class="col-lg-4">
                <h5>'.$title.'</h5>
            <table class="table">
            ';  

            $query3 = mysqli_query($con, "SELECT cont_id FROM icts_ann_cont WHERE title='$title'");
            $id = mysqli_fetch_array($query3);
            $cont_id = $id[0];

            $query4 = mysqli_query($con, "SELECT * FROM icts_ert_teams WHERE `cont_id`=$cont_id");

            while($teams = mysqli_fetch_assoc($query4))
            {
                $data .= '
                        <tr>
                            <th>
                            '.$teams['team_name'].'
                            </th>
                            <td style="white-space:pre-wrap;">
                            '.$teams['name_list'].'
                            </td>
                        </tr>
                        '; 
            }
            $data .= ' 
                    </table>
                    </div> ';
        }
    }

    // to know if qr form has data
    $check_qr_form = mysqli_query($con, "SELECT * FROM icts_ann_cont WHERE cont_type='QR/Form'");
    if(mysqli_num_rows($check_qr_form) > 0)
    {
        // selecting all records from qr form
        $query5 = mysqli_query($con, "SELECT * FROM icts_ann_cont WHERE cont_type='QR/Form'");
        while($rows = mysqli_fetch_assoc($query5))
        {
            // getting the title 
            $qr_form_title = $rows['title'];    

            // getting all records from icts ann cont cont id
            $query6 = mysqli_query($con, "SELECT cont_id FROM icts_ann_cont WHERE `title`='$qr_form_title'");
            $row_6 = mysqli_fetch_array($query6);
            $data .= '
                <div class="col-lg-4">
                
                    <table class="table">
                       
            ';

            // getting content for each title
            $query7 = mysqli_query($con, "SELECT * FROM icts_img_date WHERE cont_id='$row_6[0]' ");
            while($rows7 = mysqli_fetch_assoc($query7))
            {
                $data .= '
                    <tr>
                        <th>'.$row_6[0].'</th>
                        <td>'.$rows7['img'].'</td>
                        <td>'.$rows7['date'].'</td>
                    </tr>
                ';
            }
        }
        $data .= '   
                    </table>
                </div>
            ';
        $respo = $data;
    }
} 
catch (Exception $ex) 
{
    $respo = "Error Occurred <br>" . $ex;
}
echo $respo;

?>