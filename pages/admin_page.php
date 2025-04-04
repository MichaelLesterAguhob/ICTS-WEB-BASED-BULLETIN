<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location:login_acct.php');
    }
    $username = $_SESSION['username'];
    $user_type = $_SESSION['user_type'];
?> 
 
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICTS | Admin</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../public/assets/jquery_bootstrap/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../public/assets/jquery_bootstrap/fontawesome/css/all.css">
    <link rel="icon" type="image/x-icon" href="../public/assets/img/icts_logo.ico">
    
    <!-- jquery ajax --> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../public/assets/jquery_bootstrap/bootstrap/js/bootstrap.js"></script>  
    
    <!-- CSS -->
    <link rel="stylesheet" href="../public/assets/css/general_style.css">
    <link rel="stylesheet" href="../public/assets/css/footer.css">
    <link rel="stylesheet" href="../public/assets/css/create_acct.css"> 
    <link rel="stylesheet" href="../public/assets/css/admin_page.css">
    <link rel="stylesheet" href="../public/assets/css/navigation.css">
</head>
<body>  
    <!-- navigation -->
    <input type="hidden" id="s_uname" value="<?php echo $username ?>">
    <input type="hidden" id="s_utype" value="<?php echo $user_type?>">
    <?php include_once('../includes/navigation.php');?>

    <!-- Main Content -->
    <div class="main_container" >
       
            <!-- TAB NAVIGATION -->
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#user_accounts">Accounts</a></li>
            <li><a data-toggle="tab" href="#activities">Activity Logs</a></li>
            <li><a data-toggle="tab" href="#access_role">Set Access Role</a></li>
        </ul>

        <div class="tab-content"> 
            <!-- USER ACCOUNTS TAB -->
            <div id="user_accounts" class="tab-pane fade in active">
                <div class="row tab_header">
                    <div class="col-lg-6 tab_title">
                        <h3><i class="fa-solid fa-users-gear"></i>&nbsp; Accounts</h3>
                    </div> 
                    <div class="col-lg-6 tab_btn">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_acct_modal">Create Account</button>
                    </div> 
                </div>

                <div class="container-fluid event_table_cont">
                    <table class="table">
                        <thead>
                            <tr> 
                                <th style="width:10%; text-align:center;">User ID</th>
                                <th style="width:40%; text-align:left;">Username</th>
                                <th style="width:50%; text-align:left;">Email</th>
                                <!-- <th style="width:35%;" style="display: none;">Password</th>
                                <th style="width:10%;" style="display: none;">Forgot Pass</th> -->
                            </tr>
                        </thead>
                        <tbody id="user_acct_data">
                            <!-- user accounts data here -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ACTIVITIES TAB -->
            <div id="activities" class="tab-pane fade">
                <div class="tab_header2">
                    <div class="tab_title2">
                        <h3><i class="fa-solid fa-person-running"></i>&nbsp; Activity Logs</h3>
                    </div>
                </div>

                <div class="container-fluid event_table_cont">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Activites</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody id="activity_data">
                            <!-- Activities data here -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Access Role TAB -->
            <div id="access_role" class="tab-pane fade">
                <div class="tab_header2">
                    <div class="tab_title2">
                        <h3>&nbsp;<i class="fa-solid fa-check"></i>&nbsp; Set Access Role</h3>
                    </div>
                </div>
 
                <div class="container-fluid event_table_cont">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:20%;">Username</th>
                                <th style="width:15%;">ICTS Announce.</th>
                                <th style="width:15%;">HREP Announce.</th>
                                <th style="width:15%;">HREP Activities</th>
                                <th style="width:15%;">Committee Meeting</th>
                                <th style="width:10%;">Birthday</th>
                                <th style="width:10%;">Quote</th>
                            </tr>
                        </thead>
                        <tbody id="access_role_data">
                            <!-- user accounts data here -->
                        </tbody> 
                    </table>
                </div>
            </div>

            
        </div>
    </div>


<!-- modal -->
    <?php include_once '../includes/create_acct_modal.php'; ?>

    <!-- JAVASCRIPT -->
    <script src="../public/assets/jquery_bootstrap/bootstrap/js/bootstrap.js"></script> 
    <script src="../public/assets/js/admin.js"></script>
    <script src="../public/assets/js/login_create.js"></script>
    <script src="../public/assets/js/my_account.js"></script>
</body>
</html>