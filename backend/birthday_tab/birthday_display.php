<?php 
include_once('connection.php');
$respo = "";
$month = date('F');
$data = '<div><h2>'.$month.'</h2></div> 
        <div class="bday">
        ';
try
{
    $query1 = mysqli_query($con, "SELECT * FROM birthday_tbl WHERE birth_date LIKE '$month%'");
    while($row = mysqli_fetch_assoc($query1))
    {
        $day = date("d",strtotime($row['birth_date']));
        $data .= 
        '
        <div class="card mb-3 text-dark text-center bday_card m-3">
        <div class="card-body bday_card_body">

            <img src="backend/birthday_tab/bday_images/'.$row['image'].'" alt="Image" class="birthday_image">
            <h3>'.$row['name'].'</h3>
        </div>

        <div class="bday_card_foot">
            <h3 class="bday_num">'.$day.'</h3>
        </div>
        </div>
        ';
    }
    $data .= '</div>';
    $respo = $data;
}
catch(Exception $ex)
{
    $respo = 'Error Occurred' . $ex;
}
echo $respo;

?>
