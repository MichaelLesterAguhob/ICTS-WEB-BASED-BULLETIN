<?php 
include_once('../../config/db_connection.php');
$bday_card = 0;
$respo = "";
$month = date('F');
$day = date('d');
$data = '<div><h2 class="mnth">🎈'.$month.'🎊</h2></div> 
        <div class="bday" id="bday">
        ';
try
{
    $query1 = mysqli_query($con, "SELECT * FROM birthday_tbl WHERE birth_date LIKE '$month%' ORDER BY `birth_date` ASC");
    while($row = mysqli_fetch_assoc($query1))
    {
        $bday_card ++;
        $day = date("d",strtotime($row['birth_date']));
        $data .= 
        '
        <div class="card text-dark text-center bday_card" id="bday_card'.$bday_card.'">
        <div class="card-body bday_card_body">

            <img src="../../storage/uploads/bday_images/'.$row['image'].'" alt="Image" class="birthday_image">
            <h3 class="bday_name">'.$row['name'].'</h3>
        </div>

        <div class="bday_card_foot">
            <h3 class="bday_num">'.$day.'</h3>
        </div>
        </div>
        ';
    }
    $data .= '</div>';
    $respo = json_encode(['stat'=>'success', 'html'=>$data, 'bday_card_count'=>$bday_card]);
}
catch(Exception $ex)
{
    $respo = json_encode(['stat'=>'exception', 'msg'=>'Error Occurred' . $ex]);
}
echo $respo;

?>
