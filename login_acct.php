<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICTS | Login account</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="jquery_bootstrap/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="jquery_bootstrap/fontawesome/css/all.css">
    <link rel="icon" type="image/x-icon" href="img/icts_logo.ico">
    <!-- ajax jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/login_acct.css">
</head> 
<body>
    <div class="container">
        <div class="input_fields_cont">

            <h2 class="login_title mt-4">ICTS Bulletin</h2>
            <h3 class="login_title mt-2">Login</h3>
            
            <br>
            <table class="input_fields_table" >
                <tr>
                    <td colspan="2" style="line-height:20px;">
                        <div class="alert invalid_login" style="visibility: hidden;"></div>
                    </td>
                </tr>

                    <tr><td colspan="2" style="height: 10px;"></td></tr>

                <tr>
                    <td class="input_fields" colspan="2">
                        <input id="username" type="text" class="form-control inputs" placeholder="Enter Username" required>
                    </td>
                </tr>

                        <tr><td colspan="2" style="height: 20px;"></td></tr> 

                <tr class="pass">
                    <td class="input_fields pass_td" colspan="2"> 
                        <input id="password" type="password" class="form-control inputs" placeholder="Enter Password" required>
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
                    
            </table>
        </div>

    <!-- Switch to account recovery when forgot pass -->
        <div class="input_fields_cont2" style="display: none;">
            <h2>Account Recovery</h2>
                <div class="alert alert-info">
                    <strong>To Recover your Account, </strong><span>Enter the email you used in creating your account.</span>
                </div>
                <br>
            <table class="acct_recovery">

                    <tr><td colspan="2" style="line-height:10px;"></td></tr>

                <tr>
                    <td class="input_fields email_rec_td" colspan="2">
                        <input id="acct_recovery_email" type="email" class="form-control inputs" placeholder="Enter Email" required>
                        <br>
                        <input id="acct_recovery_code" type="number" class="form-control inputs" placeholder="Enter recovery code" required disabled>
                        <br>
                        <input id="new_pass" type="password" class="form-control inputs" placeholder="Enter new password" required disabled>
                    </td>
                </tr>
 
                    <tr><td colspan="2" style="height: 10px;"></td></tr>

                <tr>
                    <td colspan="2" class="acct_recovery_msg_td"> 
                        <div class="alert acct_recovery_msg" style="visibility: hidden;">message here</div>
                    </td>
                </tr>
                
                    <tr><td colspan="2" style="height: 10px;"></td></tr>       

                <tr>
                    <td class="input_fields fields"><button id="get_recovery_code" class="btn btn-primary" onclick="get_recovery_code();">Get Code</button></td>

                    <td class="input_fields fields"><button id="confirm_recovery_code" class="btn btn-success" onclick="recover_account();" disabled>Recover Account!</button></td>
                </tr> 
                
                    <tr><td colspan="2" style="height: 30px;"></td></tr>    

                <tr>
                    <td colspan="2"><button class="go_to_login" onclick="back_to_login()">Login</button></td>
                </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>    
                    
            </table>
        </div>
    </div>

<!-- JAVASCRIPT -->
<script src="login_create.js"></script> 
</body>
</html>
