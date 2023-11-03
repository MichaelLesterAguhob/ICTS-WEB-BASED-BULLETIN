<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICTS | Login account</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="jquery_bootstrap/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="jquery_bootstrap/fontawesome/css/all.css">

    <!--  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/login_acct.css">
</head>
<body>
    <div class="container">
        <div class="input_fields_cont">
            <h2>Login</h2>
            <br>
                <!-- <div class="alert invalid_login">
                    
                </div> -->
            <table class="input_fields_table">
                <tr>
                    <td colspan="2" style="line-height:20px;">
                        <div class="alert invalid_login">
                        
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="input_fields" colspan="2">
                        <input id="username" type="text" class="form-control inputs" placeholder="Enter Username">
                    </td>
                </tr>
<tr><td colspan="2" style="height: 20px;"></td></tr> 
                <tr class="pass">
                    <td class="input_fields pass_td" colspan="2">
                        <input id="password" type="password" class="form-control inputs" placeholder="Enter Password" >
                        <i class="fa-solid fa-eye-slash unsee" title="Hide password"></i>
                        <i class="fa-solid fa-eye see" title="Show password"></i>
                    </td>
                </tr>   
                <tr>
                    <td class="input_fieldss" colspan="2">
                        <a class="text-left" onclick="forgot_pass();">Forgot password?</a>
                    </td>
                </tr>   
<tr><td colspan="2" style="height: 20px;"></td></tr>       
                <tr>
                    <td class="fields" colspan="2"><button id="login_btn" class="btn btn-success" onclick="login();">Login</button></td>
                </tr>    
                <tr>
                    <td class="text-secondary mt-2" colspan="2">
                        <br>
                    </td>
                </tr>     
            </table>
        </div>
    </div>

<!-- JAVASCRIPT -->
<script src="login_create.js"></script> 
</body>
</html>
