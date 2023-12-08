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
  <!-- END OF NAVIGATION

  <!-- My Account Modal -->
 <div class="modal" id="my_account"> 
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>My Account</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Usename</h4>
                <input type="hidden" id="u_name_old">
                <input class="form-control" type="text" id="u_name_view">

                <h4>Password</h4>
                <input type="hidden" id="pass_old">
                <input class="form-control" type="password" id="pass_view">

                <h4>Email</h4>
                <input type="hidden" id="email_old">
                <input class="form-control" type="text" id="email_view">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Change</button>
                <button class="btn btn-warning">Cancel</button>
            </div>
        </div>
    </div>
</div>