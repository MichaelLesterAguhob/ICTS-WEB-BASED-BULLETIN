<?php 
include_once('connection.php');
$team_num = $_POST['edit_team_num'];
$cont_id = $_POST['edit_icts_cont_id'];
$team_name_list = 1;
$team_id = 1;
$respo = "";
try
{
    $title = strtoupper($_POST['edit_icts_ann_title']);
    $query1 = mysqli_query($con, "UPDATE icts_ann_cont SET `title`='$title' WHERE `cont_id`='$cont_id'");

    $query2 = mysqli_query($con, "SELECT * FROM `icts_ert_teams` WHERE `cont_id`='$cont_id'");
    while($rows = mysqli_fetch_assoc($query2))
    {
        $id = $rows['id'];
        $team_name = $_POST['edit_ert_team_name'.$team_name_list];
        $name_list = $_POST['edit_ert_name_list'.$team_name_list];
        
        $query3 = mysqli_query($con, "UPDATE `icts_ert_teams` SET `team_name`='$team_name', `name_list`='$name_list' WHERE `id`='$id'");
        $team_name_list++;
    }
    $team_id ++;
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}
echo $respo;

?>