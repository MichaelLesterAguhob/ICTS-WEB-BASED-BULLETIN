<?php 
include_once('../../config/db_connection.php');
$respo = "";
$data = '';
try
{
    $query = mysqli_query($con, "SELECT * FROM quote_of_the_week WHERE use_quote = 'Active'");
    $row = mysqli_fetch_assoc($query);
    $data .= 
    '
    <div class="quote_display">
        <h1 class="quote_week mt-5">Quote of the Week</h1>
        <h1 class="quote_text">'.$row['quote'].' </h1>
        <br>
        <h4 class="quote_auth mt-2">&hyphen; '.$row['author'].'</h4>
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
