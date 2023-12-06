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
    <div class="">
        <!--  -->
        <div class="icts_announcement displays">
            <h1 class="text-center">ICTS ANNOUNCEMENTS</h1>
            <div class="container-fluid icts_ann_display">
                <!-- <div class="card">
                    <div class="card-header">
                        <h3>ERT</h3>
                    </div>
                    <div class="card-body">
                        <h4>Evacuation Team</h4>
                        <h4>FF Team</h4>
                        <h4>M Team</h4>
                    </div>
                </div> -->
            </div>
        </div>
        
        <!--  -->
        <div class="hrep_announcement displays">
            <h1 class="text-center ha_t">HREP ANNOUNCEMENT</h1>
            <div class="container-fluid hrep_ann_display" id="hrep_ann_display">
                <!-- <div class="card">
                    <div class="card-header">
                        <h3>ERT</h3>
                    </div>
                    <div class="card-body">
                        <h4>Evacuation Team</h4>
                        <h4>FF Team</h4>
                        <h4>M Team</h4>
                    </div>
                </div> -->
            </div>
        </div>
            
        <!--  -->
        <div class="hrep_act displays" >
            <h1 class="text-center mt-3">HREP ACTIVITIES</h1>
            <div class="hrep_activity" id="hrep_activity">

            </div>
        </div>
        
        <!--  -->
        <div class="cmes displays" >
            <h1 class="text-center mb-4 cmes_btn">Committee Meeting and Event Schedule </h1>
            <div class="container-fluid cmes_display" id="cmes_display">
            <table class="cmes_disp_table mb-3">
                <thead>
                    <tr>
                        <th style="width: 25%; font-size: 20px;">Committee/Office</th>
                        <th style="width: 10%; font-size: 20px;">Time</th>
                        <th style="width: 20%; font-size: 20px;">Host</th>
                        <th style="width: 10%; font-size: 20px;">FB Live</th>
                        <th style="width: 10%; font-size: 20px;">PPAB CAM</th>
                        <th style="width: 25%; font-size: 20px;">Remarks</th>
                    </tr>
                </thead>
                <tbody id="cmes_data">
                   <!-- DATA HERE -->
                </tbody>
            </table>
            <!-- <p class="end_of_cmes text-info" id="end_of_cmes">End</p> -->
            </div>
        </div>

        <!--  -->
        <div class="birthday displays" >
            <h1 class="text-center mt-2">🎉🎁Happy Birthday!🎁🎉</h1>
            <div class="bday_display">
                <!-- birthday data load here --> 
            </div>
        </div>

        <!--  -->
        <div class="quote displays">
            
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="jquery_bootstrap/bootstrap/js/bootstrap.js"></script> 
    <script src="viewing_page.js"></script> 
</body>
</html>