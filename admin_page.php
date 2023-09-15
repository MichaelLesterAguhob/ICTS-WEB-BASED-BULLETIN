<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICTS | Admin</title>

    <!-- CSS -->
    <link rel="stylesheet" href="jquery_bootstrap/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="jquery_bootstrap/fontawesome/css/all.css">
    <link rel="stylesheet" href="css/navigation.css">
    <link rel="stylesheet" href="css/general_style.css">
    <link rel="stylesheet" href="css/admin_page.css">
    <link rel="stylesheet" href="css/footer.css">
    
</head>
<body class="bg-dark">  
    <!-- navigation -->
    <?php include_once('page_components/navigation.php');?>

    <!-- Main Content -->
    <div class="container-fluid main_container text-light" >
        <h1 class="mt-2">Welcome Admin</h1>
        <div class="row">
            <div class="col-sm-4">
                <h5>User Accounts</h5>
                <table class="table bordered text-light">
                    <thead>
                        <tr>
                            <th style="width: 15%;">U_ID</th>
                            <th style="width: 40%;">Username</th>
                            <th style="width: 20%;">Password</th>
                            <th style="width: 25%;">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 15%;">01</td>
                            <td style="width: 40%;">michael@icts</td>
                            <td style="width: 25%;">*****(encrypted)</td>
                            <td style="width: 25%;">June 23, 2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4">
                <h5>Activity</h5>
                <table class="table bordered text-light">
                    <thead>
                        <tr>
                            <th style="width: 20%;">U_ID</th>
                            <th style="width: 50%;">Activites</th>
                            <th style="width: 30%;">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 20%;">01</td>
                            <td style="width: 50%;">Added Michael's Birthday</td>
                            <td style="width: 30%;">July 26, 2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-3">
                <h5>Logs</h5>
                <table class="table bordered text-light">
                    <thead>
                        <tr>
                            <th style="width: 10%;">U_ID</th>
                            <th style="width: 40%;">Username</th>
                            <th style="width: 25%;">LogIn</th>
                            <th style="width: 25%;">LogOut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 10%;">01</td>
                            <td style="width: 40%;">michael@icts</td>
                            <td style="width: 25;">8:00 AM July 23, 2023</td>
                            <td style="width: 25%;">3:00 PM July 23, 2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include_once 'page_components/footer.php'; ?>

    <!-- JAVASCRIPT -->
    <script src="jquery_bootstrap/bootstrap/js/bootstrap.js"></script> 
</body>
</html>