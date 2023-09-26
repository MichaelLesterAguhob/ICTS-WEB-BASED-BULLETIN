
<?php 
include_once('connection.php');
$response = "";
$data = '';
try 
{
    
    $result = mysqli_query($con, "SELECT * FROM user_account");
    if(mysqli_num_rows($result) <= 0)
    {
        $response = "No Data found!";
    }
    else
    {
        $result2 = mysqli_query($con, "SELECT * FROM user_account");
        while($rows = mysqli_fetch_assoc($result2))
        {
            $icts_an_chckbx = '';
            $hrep_an_chckbx = '';
            $hrep_act_chckbx = '';
            $cmes_chckbx = '';
            $bday_chckbx = '';
            $quote_chckbx = '';

            // 
            if($rows['icts_an']=='NO')
            {
                $icts_an_chckbx = '<input name="icts_chckbx" data-id="'.$rows['account_id'].'" data-col="icts_an" type="checkbox" class="chckbx" title="Check to give access">';
            }
            else
            {
                $icts_an_chckbx = '<input name="icts_chckbx" data-id="'.$rows['account_id'].'" data-col="icts_an" type="checkbox" class="chckbx" checked title="Check to give access">';
            }

            // 
            if($rows['hrep_an']=='NO')
            {
                $hrep_an_chckbx = '<input name="hrep_chckbx" data-id="'.$rows['account_id'].'" data-col="hrep_an" type="checkbox" class="chckbx" title="Check to give access">';
            }
            else
            {
                $hrep_an_chckbx = '<input name="hrep_chckbx" data-id="'.$rows['account_id'].'" data-col="hrep_an" type="checkbox" class="chckbx" checked title="Check to give access">';
            }

            // 
            if($rows['hrep_act']=='NO')
            {
                $hrep_act_chckbx = '<input name="hrep_act_chckbox" data-id="'.$rows['account_id'].'" data-col="hrep_act" type="checkbox" class="chckbx" title="Check to give access">';
            }
            else
            {
                $hrep_act_chckbx = '<input name="hrep_act_chckbox" data-id="'.$rows['account_id'].'" data-col="hrep_act" type="checkbox" class="chckbx" checked title="Check to give access">';
            }

            // 
            if($rows['cmes']=='NO')
            {
                $cmes_chckbx = '<input name="cmes_chckbx" data-id="'.$rows['account_id'].'" data-col="cmes" type="checkbox" class="chckbx" title="Check to give access">';
            }
            else
            {
                $cmes_chckbx = '<input name="cmes_chckbx" data-id="'.$rows['account_id'].'" data-col="cmes" type="checkbox" class="chckbx" checked title="Check to give access">';
            }

            // 
            if($rows['bday']=='NO')
            {
                $bday_chckbx = '<input name="bday_chckbx" data-id="'.$rows['account_id'].'" data-col="bday" type="checkbox" class="chckbx" title="Check to give access">';
            }
            else
            {
                $bday_chckbx = '<input name="bday_chckbx" data-id="'.$rows['account_id'].'" data-col="bday" type="checkbox" class="chckbx" checked title="Check to give access">';
            }

            // 
            if($rows['quote']=='NO')
            {
                $quote_chckbx = '<input name="quote_chckbx" data-id="'.$rows['account_id'].'" data-col="quote" type="checkbox" class="chckbx" title="Check to give access">';
            }
            else
            {
                $quote_chckbx = '<input name="quote_chckbx" data-id="'.$rows['account_id'].'" data-col="quote" type="checkbox" class="chckbx" checked title="Check to give access">';
            }
            
            $data .= '
                <tr>
                    <td class="username" style="width:20%;">'.$rows['username'].'</td>
                    <td style="width:15%;">'.$icts_an_chckbx.'</td>
                    <td style="width:15%;">'.$hrep_an_chckbx.'</td>
                    <td style="width:15%;">'.$hrep_act_chckbx.'</td>
                    <td style="width:15%;">'.$cmes_chckbx.'</td>
                    <td style="width:10%;">'.$bday_chckbx.'</td>
                    <td style="width:10%;">'.$quote_chckbx.'</td>
                </tr>
            ';
        }
        $response = $data;
    }

} 
catch (Exception $ex) 
{
    $response = "Error Occurred" . $ex;
}
echo $response;

?>
