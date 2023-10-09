<?php 
include_once('connection.php');
$respo = "";
$data = '';
try
{
    $query = mysqli_query($con, "SELECT * FROM quote_of_the_week WHERE use_quote = 'Active'");
    $row = mysqli_fetch_assoc($query);
    $data .= 
    '
    <div class="quote_display">
        <h2>'.$row['quote'].' </h2>
        <br>
        <h4>&hyphen; '.$row['author'].'</h4>
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
