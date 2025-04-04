
<?php
    include_once('../config/db_connection.php');
    if(!isset($_SESSION['username']))
    {
        header('location:login_acct.php');
    }

    $in_active1 = "";
    $in_active2 = "";
    $in_active3 = "";
    $in_active4 = "";
    $in_active5 = "";
    $in_active6 = "";
    
    $username = $_SESSION['username'];
    $user_type = $_SESSION['user_type'];
    $icts_announcement = '';
    $hrep_announcement = '';
    $hrep_act = '';
    $cmes = '';
    $bday = '';
    $quote = '';
 
    // condition for showing category tab
    if($_SESSION['user_type'] == "admin")
    {
        $in_active1 = "in active";
        $icts_announcement = '<li class="active"><a data-toggle="tab" href="#icts_annncmnts">ICTS Announcements</a></li>';
        $hrep_announcement = '<li><a data-toggle="tab" href="#hrep_annncmnts">HREP Announcements</a></li>';
        $hrep_act = '<li><a data-toggle="tab" href="#hrep_actvts">HREP Activities</a></li>';
        $cmes = '<li><a data-toggle="tab" href="#cmes">Committee Meeting and Event Sched</a></li>';
        $bday = '<li><a data-toggle="tab" href="#birthday">Birthday</a></li>';
        $quote = '<li><a data-toggle="tab" href="#quote">Quote</a></li>';
    }
    else
    {
        $query = mysqli_query($con, "SELECT * FROM user_account WHERE username = '$username'");
        $data = mysqli_fetch_assoc($query);
        if($data['icts_an'] == 'YES')
        {
            $icts_announcement = '<li class="active"><a data-toggle="tab" href="#icts_annncmnts">ICTS Announcements</a></li>';
            $in_active1 = "in active";
        }
        if($data['hrep_an'] == 'YES')
        {
            if($data['icts_an'] == 'NO')
            {
                $hrep_announcement = '<li class="active"><a data-toggle="tab" href="#hrep_annncmnts">HREP Announcements</a></li>';
            }
            else
            {
                $hrep_announcement = '<li><a data-toggle="tab" href="#hrep_annncmnts">HREP Announcements</a></li>';
            }

            if($in_active1 == "")
            {
                $in_active2 = "in active";
            }
        }
        if($data['hrep_act'] == 'YES')
        {
            if($data['icts_an'] == 'NO' && $data['hrep_an'] == 'NO')
            {
                $hrep_act = '<li class="active"><a data-toggle="tab" href="#hrep_actvts">HREP Activities</a></li>';
            }
            else
            {
                $hrep_act = '<li><a data-toggle="tab" href="#hrep_actvts">HREP Activities</a></li>';
            }
           
            if($in_active1 == "" && $in_active2 == "")
            {
                $in_active3 = "in active";
            }
        }
        if($data['cmes'] == 'YES')
        {
            if($data['icts_an'] == 'NO' && $data['hrep_an'] == 'NO' && $data['hrep_act'] == 'NO')
            {
                $cmes = '<li class="active"><a data-toggle="tab" href="#cmes">Committee Meeting and Event Sched</a></li>';
            }
            else
            {
                $cmes = '<li><a data-toggle="tab" href="#cmes">Committee Meeting and Event Sched</a></li>';
            }
            
            if($in_active1 == "" && $in_active2 == "" && $in_active3 == "")
            {
                $in_active4 = "in active";
            }
        }
        if($data['bday'] == 'YES')
        {
            if($data['icts_an'] == 'NO' && $data['hrep_an'] == 'NO' && $data['hrep_act'] == 'NO' && $data['cmes'] == 'NO')
            {
                $bday = '<li class="active"><a data-toggle="tab" href="#birthday">Birthday</a></li>';
            }
            else
            {
                $bday = '<li><a data-toggle="tab" href="#birthday">Birthday</a></li>';
            }

            if($in_active1 == "" && $in_active2 == "" && $in_active3 == "" && $in_active4 == "")
            {
                $in_active5 = "in active";
            }
        }
        if($data['quote'] == 'YES')
        {
            if($data['icts_an'] == 'NO' && $data['hrep_an'] == 'NO' && $data['hrep_act'] == 'NO' && $data['cmes'] == 'NO' && $data['bday'] == 'NO')
            {
                $quote = '<li class="active"><a data-toggle="tab" href="#quote">Quote</a></li>';
            }
            else
            {
                $quote = '<li><a data-toggle="tab" href="#quote">Quote</a></li>';
            }

            if($in_active1 == "" && $in_active2 == "" && $in_active3 == "" && $in_active4 == "" && $in_active5 == "")
            {
                $in_active6 = "in active";
            }
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="../public/assets/jquery_bootstrap/fontawesome/css/all.css">
    <link rel="stylesheet" href="../public/assets/jquery_bootstrap/bootstrap/css/bootstrap.css">
    <link rel="icon" type="image/x-icon" href="../public/assets/img/icts_logo.ico">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../public/assets/jquery_bootstrap/bootstrap/js/bootstrap.js"></script>  

    <!-- CSS -->
    <link rel="stylesheet" href="../public/assets/css/general_style.css">
    <link rel="stylesheet" href="../public/assets/css/footer.css">
    <link rel="stylesheet" href="../public/assets/css/bday_modal.css">
    <link rel="stylesheet" href="../public/assets/css/home_page.css">
    <link rel="stylesheet" href="../public/assets/css/cmes_modal.css">
    <link rel="stylesheet" href="../public/assets/css/icts_ann_modal.css">
    <link rel="stylesheet" href="../public/assets/css/navigation.css">

</head>
<body>
<!-- NAVIGATION -->
<input type="hidden" id="s_uname" value="<?php echo $username ?>">
<input type="hidden" id="s_utype" value="<?php echo $user_type?>">
<?php include_once('../includes/navigation.php')?>

<!-- MAIN CONTENT -->
<div class="home_container container-fluid">

<!-- TAB NAVIGATION --> 
    <ul class="nav nav-tabs mb-2 mt-1 nav_tab">
        <!-- SHOW ONLY THE ACCESS SET BY ADMIN -->
        <?php echo $icts_announcement ?>
        <?php echo $hrep_announcement ?>
        <?php echo $hrep_act ?>
        <?php echo $cmes ?>
        <?php echo $bday ?> 
        <?php echo $quote ?>
    </ul> 

    <div class="tab-content">

<!-- ICTS ANNOUNCEMENTS TAB -->
    <div id="icts_annncmnts" class="tab-pane fade <?php echo $in_active1?>">
        <div class="row tab_header">
            <div class="col-lg-7 tab_title">
                <h3><i class="fa-solid fa-bullhorn"></i>&nbsp; ICTS Announcements</h3>
            </div>
            <div class="col-lg-5 tab_button">
                <button class="btn btn-primary btn_add add_icts_ann">
                <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>

        <div class="event_table_cont" id="icts_annncmnts_data">
           
        </div> 
    </div>

<!-- HREP ANNOUNCEMENTS TAB -->
    <div id="hrep_annncmnts" class="tab-pane fade <?php echo $in_active2?>">
../public/assets/
        <div class="row tab_header">
            <div class="col-lg-7 tab_title">
                <h3><i class="fa-solid fa-bullhorn"></i>&nbsp; HREP Announcements</h3>
            </div>
            <div class="col-lg-5 tab_button">
                <button class="btn btn-primary btn_add add_hrep_ann">
                    <i class="fa-solid fa-plus"></i> 
                </button>
            </div>
        </div> 

        <div class="event_table_cont">
            <table class="table">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Date Release</th>
                        <th>Office</th>
                        <th>QR</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="hrep_ann_data">
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<!-- BIRTHDAY TAB -->
    <div id="birthday" class="tab-pane fade <?php echo $in_active5?>">

        <div class="row tab_header">
            <div class="col-lg-7 tab_title">
                <h3><i class="fa-solid fa-cake-candles"></i> 
                &nbsp;Birthdays &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="bday_tab_msg"></span>
                </h3>
            </div>
            <div class="col-lg-5 tab_button">
                <button class="btn btn-primary btn_add add_bday" data-bs-toggle="modal" data-bs-target="#bday_modal"> 
                    <i class="fa-solid fa-plus"></i> 
                </button>
            </div>
        </div>
        
        <div class="event_table_cont">
            <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 60%;">Name</th>
                    <th style="width: 15%;">Birth Date</th>
                    <th style="width: 10%;">Image</th>
                    <th style="width: 15%; text-align: right;">Action</th>
                </tr>
            </thead>
            <tbody id="bday_data">
                <!-- data from birthday table in database -->
                
            </tbody>
            </table>
        </div>
    </div>

<!-- COMMITTEE MEETING AND EVENT SCHEDULE TAB -->
    <div id="cmes" class="tab-pane fade <?php echo $in_active4?>">
  
        <div class="row tab_header">
            <div class="col-lg-7 tab_title">
                <h3><i class="fa-regular fa-calendar-days"></i>&nbsp;
                Committee Meeting and Event Schedule
                &nbsp;&nbsp;
                <p class="cmes_msg"></p>
                </h3> 
            </div>
            <div class="col-lg-5 tab_button">
                <button class="btn btn-primary btn_add cmes" data-bs-toggle="modal" data-bs-target="#cmes_modal"> 
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>

        <div class="event_table_cont">
            <table class="table table-striped"> 
                <thead>  
                    <tr>
                        <th style="width: 20%;">Committee/Office</th>
                        <th style="width: 10%;">Date</th>
                        <th style="width: 10%;">Time</th>
                        <th style="width: 20%;">Host</th>
                        <th style="width: 5%;">FB Live</th>
                        <th style="width: 5%;">PPAB CAM</th>
                        <th style="width: 20%;">Remarks</th>
                        <th style="width: 10%; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="cmes_data">
                   <!-- DATA HERE -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- HREP ACTIVITIES TAB -->
    <div id="hrep_actvts" class="tab-pane fade <?php echo $in_active3?>">

        <div class="row tab_header">
            <div class="col-lg-7 tab_title">
                <h3><i class="fa-solid fa-person-running"></i> &nbsp; HREP Actvities &nbsp;&nbsp;
                <p class="hrep_act_msg"></p></h3>
            </div>
            <div class="col-lg-5 tab_button">   
                <button class="btn btn-primary btn_add" data-bs-toggle="modal" data-bs-target="#hrep_act_modal">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>

        <div class="event_table_cont">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody id="hrep_act_data">
                    
                </tbody>
            </table>
        </div>
    </div>

    <!-- QUOTE TAB -->
    <div id="quote" class="tab-pane fade <?php echo $in_active6?>">

        <div class="row tab_header">
            <div class="col-lg-7 tab_title">
                <h3><i class="fa-solid fa-comment"></i>
                 &nbsp; Quote &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="quote_tab_msg"></span>
                </h3>
            </div>
            <div class="col-lg-5 tab_button">
                <button class="btn btn-primary btn_add add_quote" data-bs-toggle="modal" data-bs-target="#quote_modal">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>

        <div class="event_table_cont">
            <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 50%;">Quotes</th>
                    <th style="width: 20%;">Author</th>
                    <th style="width: 10%;" class="action_th text-center">Use</th>
                    <th style="width: 20%; text-align: right;" class="action_th">Action</th>
                </tr>
            </thead>
            <tbody id="quote_data">
                <!-- data from birthday table in database -->
                
            </tbody>
            </table>
        </div>
    </div>

</div>
</div>

<!-- SYSTEM MSG MODAL -->
<div class="modal" id="sys_mod">
  <div class="modal-dialog sys_modal_dialog">
    <div class="modal-content sys_modal_content">
      <div class="modal-header sys_modal_header">
        <button type="button" class="close" data-bs-dismiss="modal" >
          <i class="fa-regular fa-circle-xmark"></i>
        </button>   
        <h3 class="modal-title sys_modal_title"></h3>
      </div>
      <div class="modal-body sys_mod_body">
        <h5 class="sys_mod_msg"></h5>
      </div>
      <div class="modal-footer sys_modal_footer">
        <button type="button" class="btn btn-warning text-dark" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- CONFIRMATION MODAL -->
<div class="modal" id="confirmation_modal">
  <div class="modal-dialog confirmation_modal_dialog">
    <div class="modal-content confirmation_modal_content">
      <div class="modal-header confirmation_modal_header">
        <button type="button" class="close" data-bs-dismiss="modal" >
          <i class="fa-regular fa-circle-xmark"></i>
        </button> 
        <h3 class="modal-title confirmation_modal_title"></h3>
      </div>
      <div class="modal-footer confirmation_modal_footer">
        <button id="delete_bday" type="button" class="btn btn-danger" onclick="delete_bday();">Delete</button>
        <button id="delete_quote" type="button" class="btn btn-danger" onclick="delete_quote();">Delete</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- deleting icts announcement -->
<div class="modal" id="icts_del_ann_modal">
  <div class="modal-dialog confirmation_modal_dialog">
    <div class="modal-content confirmation_modal_content">
        <div class="modal-header confirmation_modal_header">
            <h3 class="modal-title" style="color:red;">Are you sure you want to delete this?</h3>
            <button 
            type="button"  
            class="close" 
            data-bs-dismiss="modal" >
            <i class="fa-regular fa-circle-xmark"></i>
            </button>
        </div>
        <div class="modal-footer confirmation_modal_footer">
            <button id="del_icts_ann" type="button" class="btn btn-danger" onclick="delete_icts_ann();">Delete</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
    </div> 
  </div>
</div>

<!-- deleting single icts announcement content -->
<div class="modal" id="icts_singdel_ann_modal">
  <div class="modal-dialog confirmation_modal_dialog">
    <div class="modal-content confirmation_modal_content">
        <div class="modal-header confirmation_modal_header">
            <h3 class="modal-title" style="color:red;">Are you sure you want to delete?</h3>
            <button 
            type="button"  
            class="close" 
            data-bs-dismiss="modal" >
            <i class="fa-regular fa-circle-xmark"></i>
            </button>
        </div>
        <div class="modal-footer confirmation_modal_footer">
            <button id="del_icts_ann" type="button" class="btn btn-danger" onclick="delete_icts_ann_single();">Delete</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
    </div>
  </div>
</div>

<!-- MODALS -->
<?php include_once '../includes/icts_ann_modal.php'; ?>
<?php include_once '../includes/bday_modal.php'; ?>
<?php include_once '../includes/quote_modal.php'; ?>
<?php include_once '../includes/cmes_modal.php'; ?>
<?php include_once '../includes/hrep_act_modal.php'; ?>
<?php include_once '../includes/hrep_ann_modal.php'; ?>

<!-- JAVASCRIPT -->
<script src="../public/assets/js/home_page.js"></script>
<script src="../public/assets/js/my_account.js"></script>
</body>
</html>