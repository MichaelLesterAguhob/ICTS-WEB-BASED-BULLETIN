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
            <td>
                <button 
                    data-id="'.$row['id'].'" 
                    class="btn btn-sm btn-warning edit_bday_btn">
                    Edit
                </button>
                <button 
                    data-id="'.$row['id'].'" 
                    class="btn btn-sm btn-danger delete_bday_btn">
                    Del
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
    $response = "Error Occured";
}

echo $response;










?>