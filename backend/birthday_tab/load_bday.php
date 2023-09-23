<?php 
$response = "";
include_once('connection.php'); 

try 
{
$data = '';
$query = "SELECT * FROM birthday_tbl";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) <= 0) 
{
    $response = json_encode(['status' => 'no_data', 'html' => "No record found"]);
} 
else 
{
    $query2 = "SELECT * FROM birthday_tbl";
    $result2 = mysqli_query($con, $query2);
    while($row = mysqli_fetch_assoc($result2)) {
    $data .= '
        <tr>
            <td>'.$row['name'].'</td>
            <td>'.$row['birth_date'].'</td>
            <td>'.$row['image'].'</td>
            <td class="action_td">
                <button 
                    data-id="'.$row['id'].'" 
                    class="edit_btn edit_bday_btn">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>&nbsp;&nbsp;
                <button 
                    data-id="'.$row['id'].'" 
                    class="delete_btn delete_bday_btn">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </td>
        </tr>
        ';
    }
    $response = json_encode(['status' => 'success', 'html' => $data]);
}
} 
catch(Exception $ex) 
{
    $response = "Error Occurred";
}

echo $response;










?>