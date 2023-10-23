<?php 
include_once('connection.php');
$team_num = $_POST['edit_team_num'];
$cont_id = $_POST['edit_icts_cont_id'];
$team_name_list = 1;
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

    $added_new_team = $_POST['edit_added_new_team'];
    while($team_num != $added_new_team)
    {
        $team_num ++;
        $new_team_name = $_POST['edit_ert_team_name'.$team_num];
        $new_name_list = $_POST['edit_ert_name_list'.$team_num];

        // if($new_team_name != "" && $new_name_list != "")
        // {
            $insert_qry = mysqli_query($con, "INSERT INTO icts_ert_teams VALUES ('', '$cont_id', '$new_team_name', '$new_name_list')");
        // }
    }
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}
echo $respo;

?>