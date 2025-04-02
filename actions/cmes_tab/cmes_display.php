<?php 
include_once('connection.php');
$respo = "";
$data = '';
try
{
    $query = mysqli_query($con, "SELECT DISTINCT(date) FROM cmes ORDER BY `date` ASC");
    while($rows = mysqli_fetch_assoc($query))
    {
        $date = ($rows['date']);
        $data .= '<tr class="cmes_date"><th colspan="7">'.date('F d, Y', strtotime($date)).'</th></tr>';

        $query2 = mysqli_query($con, "SELECT * FROM cmes WHERE `date`='$date' ORDER BY `time` ASC");
        while($rows2 = mysqli_fetch_assoc($query2))
        {
            $data .= '
            <tr> 
                <td style="width: 25%;">'.$rows2['committee_office'].'</td>
                <td style="width: 10%;">'.$rows2['time'].'</td>
                <td style="width: 25%;" class="multiline">'.$rows2['host'].'</td>
                <td style="width: 5%; text-align:center;">'.$rows2['fb_live'].'</td>
                <td style="width: 5%; text-align:center;">'.$rows2['ppab_cam'].'</td> 
                <td style="width: 30%;" class="multiline">'.$rows2['remarks'].'</td>
            </tr>
        ';
        }
    }
    $data .= '';
    $respo = $data;
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}
echo $respo;

?>
