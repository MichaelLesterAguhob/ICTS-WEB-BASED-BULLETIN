<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICTS | Create account</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="jquery_bootstrap/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="jquery_bootstrap/fontawesome/css/all.css">

    <!-- Jquery Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/create_acct.css">
</head>
<body class="bg-secondary">
    <div class="container">
        <div class="input_fields_cont">
            <h2>Create Account</h2>
            <br>
            <table class="input_fields_table">
                <tr>
                    <td colspan="2"><img src="img/logo icts.png" alt="ICTS LOGO" class="icts_logo"></td>
                </tr>      
<tr><td colspan="2" style="height: 50px;"></td></tr>     
                <tr>
                    <td class="input_fields" colspan="2">
                        <input id="create_username" type="text" class="form-control" placeholder="Enter Username">
                    </td>
                </tr>
<tr><td colspan="2" style="height: 20px;"></td></tr> 
                <tr>
                    <td class="input_fields" colspan="2">
                        <input id="create_password" type="password" class="form-control" placeholder="Enter Password">
                    </td>
                </tr>    
<tr><td colspan="2" style="height: 50px;"></td></tr>       
                <tr>
                    <td class="fields"><button class="btn btn-success" onclick="create_account();">Create</button></td>
                    <td class="fields"><button class="btn btn-warning">Cancel</button></td>
                </tr>    
                <tr>
                    <td class="text-secondary" colspan="2"><br></td>
                </tr>     
            </table>
        </div>
    </div>

<!-- JAVASCRIPT -->
<script src="login_create.js"></script>    
</body>
</html>
