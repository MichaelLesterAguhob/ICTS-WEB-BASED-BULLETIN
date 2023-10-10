<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Viewing Page</title>
 
    <!-- CSS -->
    <link rel="stylesheet" href="jquery_bootstrap/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="jquery_bootstrap/fontawesome/css/all.css">
    <link rel="stylesheet" href="css/viewing_page.css">
</head>
<body>
    <div class="container-fluid">
        <!--  -->
        <div class="icts_announcement" style="display: none;">

        </div>
        
        <!--  -->
        <div class="hrep_announcement" style="display: none;">

        </div>
        
        <!--  -->
        <div class="hrep_act" style="display: none;">
            <h1>HRep Activities</h1>
            <div class="hrep_activity">

            </div>
        </div>
        
        <!--  -->
        <div class="cmes" style="display: none;">
            <h1>Committee Meeting and Event Schedule </h1>
            <div class="cmes_display">
            <table class="cmes_disp_table">
                <thead>
                    <tr>
                        <th style="width: 25%;">Committee/Office</th>
                        <th style="width: 10%;">Time</th>
                        <th style="width: 20%;">Host</th>
                        <th style="width: 10%;">FB Live</th>
                        <th style="width: 10%;">PPAB CAM</th>
                        <th style="width: 25%;">Remarks</th>
                    </tr>
                </thead>
                <tbody id="cmes_data">
                   <!-- DATA HERE -->
                </tbody>
            </table>
            </div>
        </div>

        <!--  -->
        <div class="birthday" style="display: none;">
            <h1 class="text-center">Happy Birthday!</h1>
            <div class="bday_display">
                <!-- birthday data load here -->
            </div>
        </div>

        <!--  -->
        <div class="quote" style="display: none;">
        <h1 class="mt-5">Quote of the Week</h1>
            
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="jquery_bootstrap/bootstrap/js/bootstrap.js"></script> 
    <script src="viewing_page.js"></script> 
</body>
</html>