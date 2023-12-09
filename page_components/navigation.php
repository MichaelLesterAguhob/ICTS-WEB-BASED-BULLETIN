<?php 
  $admin_btn = '';
  if($_SESSION['user_type']=='admin')
  {
      $admin_btn = '<a class="nav-link admin_nav" aria-current="page" href="admin_page.php"><i class="fa-solid fa-user-gear"></i> Admin</a>';
  }
?>

<!-- NAVIGATION BAR -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top m-0">
    <div class="container-fluid">
      <img src="img/logo white.png" alt="" style="width: 100px;">
    <!-- <h1>ICTS</h1> -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon nav_toggler"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active home_nav" aria-current="page" href="Home Page.php"><i class="fa-solid fa-house-user"></i></i> Home</a>
          </li>
          <li class="nav-item">
            <!-- admin nav show only if login is admin user -->
            <?php 
              echo $admin_btn;
            ?>
          </li>
          <li class="nav-item">
            <a class="nav-link my_account" data-bs-toggle="modal" data-bs-target="#my_account"><i class="fa-solid fa-user"></i> My Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="viewing_page.php" target="_blank"><i class="fa-solid fa-eye"></i> Viewing Page</a>
          </li>
          <li class="nav-item">
              <a class="nav-link logout" aria-current="page" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> LogOut </a>
            </li>
        </ul>
      </div> 

    </div>
  </nav>
  <!-- END OF NAVIGATION  -->

  <div class="modal confirm_changes_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Confirm to save changes</h3>
        </div>
        <div class="modal-body">

        </div>
      </div>
    </div>
  </div>

  <!-- My Account Modal -->
 <div class="modal" id="my_account"> 
    <div class="modal-dialog acct_dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="my_account_title">My Account</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="acct_details mb-5">
            <!-- username -->
                <div class="in_lbl_chng">
                  <h4>Usename</h4><button class="btn btn-sm chng_btn" id="change_uname">change</button>
                </div>
                <input type="hidden" id="u_name_old">
                <input class="form-control" type="text" id="u_name_view" readOnly>
            <!-- password -->
                <div class="in_lbl_chng">
                  <h4>Password</h4><button class="btn btn-sm chng_btn" id="change_pass">change</button>
                </div>
                <input type="hidden" id="pass_old">
                <input class="form-control" type="password" id="pass_view" readOnly>
            <!-- email -->
                <div class="in_lbl_chng">
                  <h4>Email</h4><button class="btn btn-sm chng_btn" id="change_email">change</button>
                </div>
                <input type="hidden" id="email_old">
                <input class="form-control" type="text" id="email_view" readOnly>
              </div>

            <!-- Changing account container -->
              <!-- change uname -->
              <div class="change_uname_div">
                <button class="btn btn-sm btn-secondary back_to_account">← Back</button>
                <h4>Enter new usename</h4>
                <input class="form-control" type="text" id="new_uname">
                <h4>Enter your password</h4>
                <input class="form-control" type="password" id="pass_to_new_uname">
                <div class="change_buttons_div mt-4 mb-2">
                  <button class="btn btn-primary btn-sm" id="confirm_uname">Confirm Changes</button>
                  <button class="btn btn-warning btn-sm cancel_changes">Cancel</button>
                </div>
              </div>

              <!-- change pass -->
              <div class="change_pass_div">
              <button class="btn btn-sm btn-secondary back_to_account">← Back</button>
                <h4>Enter new password</h4>
                <input class="form-control" type="password" id="new_pass">
                <h4>Re-enter new password</h4>
                <input class="form-control" type="password" id="reenter_new_pass">
                <h4>Enter old password</h4>
                <input class="form-control" type="password" id="enter_old_pass">
                <div class="change_buttons_div mt-4 mb-2">
                  <button class="btn btn-primary btn-sm" id="confirm_pass">Confirm Changes</button>
                  <button class="btn btn-warning btn-sm cancel_changes">Cancel</button>
                </div>
              </div>

              <!-- change email -->
              <div class="change_email_div">
              <button class="btn btn-sm btn-secondary back_to_account">← Back</button>
                <h4>Enter New Email</h4>
                <input class="form-control" type="text" id="new_email">
                <h4>Enter your Password</h4>
                <input class="form-control" type="password" id="pass_to_new_email">
                <div class="change_buttons_div mt-4 mb-2">
                  <button class="btn btn-primary btn-sm" id="confirm_email">Confirm Changes</button>
                  <button class="btn btn-warning btn-sm cancel_changes">Cancel</button>
                </div>
              </div>

            </div>
            
        </div>
    </div>
</div>