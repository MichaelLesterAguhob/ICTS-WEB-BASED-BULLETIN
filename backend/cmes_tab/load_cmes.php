<?php 
include_once('connection.php');
$respo = "";
$data = '';
$min_num = 0;
$max_num = 0;
$prev_date = "";

try
{
    // min num
    $query1 = mysqli_query($con, "SELECT MIN(id) FROM cmes");
    $data1 = mysqli_fetch_array($query1);
    $min_num = $data1[0];
    // max num
    $query2 = mysqli_query($con, "SELECT MAX(id) FROM cmes");
    $data2 = mysqli_fetch_array($query2);
    $max_num = $data2[0];
    // Select Min Num Date
    $query3 = mysqli_query($con, "SELECT date FROM cmes WHERE id='$min_num'");
    $data3 = mysqli_fetch_array($query3);
    $prev_date = $data3[0];

    while($min_num <= $max_num)
    {
        // Select Min Num Date
        $query4 = mysqli_query($con, "SELECT date FROM cmes WHERE id='$min_num'");
        $data4 = mysqli_fetch_array($query4);
        if($prev_date != $data4[0])
        {
            $data .= '
                <tr>
                    <td colspan="6"></td>
                </tr>
            ';
        }

        $query5 = mysqli_query($con, "SELECT * FROM cmes WHERE ");
        $min_num ++;
    }
}
catch(Exception $ex)
{

}

?>