<?php 
include_once('connection.php');
$respo = "";
$cont_type_selected = trim($_POST['cont_type_selected']);
$ann_title = trim($_POST['ann_title_txt']);
$team_num = $_POST['team_num'];
$cont_id = 0;

$row = mysqli_query($con, "SELECT MAX(cont_id) FROM icts_ann_cont");
$has_row = mysqli_fetch_array($row);
if($has_row[0] <= 0)
{
    $cont_max_id = mysqli_query($con, "SELECT MAX(cont_id) FROM icts_ann_cont");
    $c_id = mysqli_fetch_array($cont_max_id);
    $cont_id = $c_id[0] + 1;
}
else
{
    $cont_max_id = mysqli_query($con, "SELECT MAX(cont_id) FROM icts_ann_cont");
    $c_id = mysqli_fetch_array($cont_max_id);
    $cont_id = $c_id[0] + 1;
}

try
{
    if($cont_type_selected == "Emergency Response Team")
    {
      $query1 = mysqli_query($con, "INSERT INTO icts_ann_cont VALUES('',$cont_id,'$ann_title', '$cont_type_selected')");
      if($query1)
      {
        $team_num_strt = 1;
        while($team_num_strt <= $team_num )
        {
            $team_name = $_POST['team_name_txt'.$team_num_strt];
            $name_list = $_POST['name_list_txt'.$team_num_strt];
            if($team_name != "" && $name_list != "")
            {
                $query2 = mysqli_query($con, "INSERT INTO icts_ert_teams VALUES('',$cont_id,'$team_name', '$name_list')");
            }
            $team_num_strt ++;
        }
        $respo = "Successfully Added";
      }
    }
    else if($cont_type_selected == "QR/Form")
    {
      move_uploaded_file($_FILES['qr_form_img']['tmp_name'],'icts_img/'. $_FILES['qr_form_img'] ['name']);
    
      $img = $_FILES['qr_form_img']['name'];
      $query1 = mysqli_query($con, "INSERT INTO icts_ann_cont VALUES('',$cont_id,'$ann_title', '$cont_type_selected')");
      if($query1)
      {
        $date = $_POST['qr_form_date'];
        $query2 = mysqli_query($con, "INSERT INTO icts_img_date VALUES('',$cont_id,'$img', '$date')");
        $respo = "Added Successfully";
      }
    }
    else if($cont_type_selected == "Training")
    {
      $query1 = mysqli_query($con, "INSERT INTO icts_ann_cont VALUES('',$cont_id,'$ann_title', '$cont_type_selected')");
      if($query1)
      {
        $desc_date_num = $_POST['desc_date_num'];
        $d_t_num = 1;
        while($d_t_num <= $desc_date_num )
        {
          $training_name = $_POST['training_name'.$d_t_num];
          $date = $_POST['training_date'.$d_t_num];
          $time = date('h:i A', strtotime($_POST['training_time'.$d_t_num]));

          $query2 = mysqli_query($con, "INSERT INTO icts_training VALUES('',$cont_id,'$training_name', '$date', '$time')");
          $d_t_num ++;
        }
        $respo = "Added Successfully" ;
      }
    }
}
catch(Exception $ex)
{
    $respo = "Error Occurred" . $ex;
}
echo $respo;


?>