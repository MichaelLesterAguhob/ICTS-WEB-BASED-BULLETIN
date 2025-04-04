
<?php 
include_once('../../config/db_connection.php');
$account_id = $_POST['account_id'];
$col_name = $_POST['col_name'];
$respo = '';

try
{
    $query1 = mysqli_query($con, "SELECT $col_name FROM user_account WHERE account_id='$account_id'");
    $data = mysqli_fetch_assoc($query1);
    if($data[$col_name] == "NO")
    {
        $query2 = mysqli_query($con, "UPDATE user_account SET `$col_name`='YES' WHERE account_id='$account_id'");
    }
    else
    {
        $query2 = mysqli_query($con, "UPDATE user_account SET `$col_name`='NO' WHERE account_id='$account_id'");
    }

}
catch(Exception $ex)
{
$respo = 'Error Occurred' . $ex;
}
echo $respo;


?>