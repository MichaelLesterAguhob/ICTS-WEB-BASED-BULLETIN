
    $(document).on('click', '.cancel', function()
    {
        $('#create_username').val("");
        $('#create_password').val("");
        $('#email').val("");
    })
    $(document).on('click', '.close', function()
    { 
        $('#create_username').val("");
        $('#create_password').val("");
        $('#email').val("");
    })

// VERIFYING EMAIL BEFORE CREATING ACCOUNT
let verification_code = 0;
function verify_email()
{
    let c_username = $('#create_username').val();
    let c_password = $('#create_password').val();
    let email = $('#email').val();

    if(c_username == "" || c_password == "" || email == "")
    {
        $('.create_account_failed').attr('class','alert create_account_failed alert-primary').fadeIn(100).fadeOut(5000);
        $('.create_account_failed').html('<strong>No Input!</strong>' + " " + "Please Fill in the blanks.");
    }
    else
    {
        $.ajax( 
            {
                url:'../../../actions/login_create/verify_email.php',
                type:'post',
                data:{email:email},
                success: function(data)
                {
                    data = $.parseJSON(data);

                    if(data.stat == 'success')
                    {
                        $('.create_account_failed').attr('class','alert create_account_failed alert-info').fadeIn(100).fadeOut(15000);
                        $('.create_account_failed').html('<strong> We&apos;ve Sent a Verification Code to '+email+'.</strong>' + " " + "Please Check your Email Account Inbox or Spam.");
                        $('#verify').css('display','none');
                        $('.v_code').css('display','unset');
                        $('#create').css('display','unset');
                        verification_code = data.code;
                    }
                    else if(data.stat == 'invalid') 
                    {
                        $('.create_account_failed').attr('class','alert create_account_failed alert-warning').fadeIn(100).fadeOut(15000);
                        $('.create_account_failed').html('<strong> '+data.msg+'.</strong>');
                    }
                    else if(data.stat == 'no_internet')
                    {
                        $('.create_account_failed').attr('class','alert create_account_failed alert-danger').fadeIn(100).fadeOut(5000);
                        $('.create_account_failed').html('<strong> '+data.msg+'.</strong>');
                    }
                    else if(data.stat == 'error')
                    {
                        alert(data.msg);
                    }

                    
                }
            })
    }
    }

    // create account
function create_account()
{   
    let c_username = $('#create_username').val();
    let c_password = $('#create_password').val();
    let email = $('#email').val();
    let verification_code_input = $('#verification_code').val();

    if(c_username == "" || c_password == "" || email == "")
    {
        $('.create_account_failed').attr('class','alert create_account_failed alert-primary').fadeIn(100).fadeOut(5000);
        $('.create_account_failed').html('<strong>No Input!</strong>' + " " + "Please Fill in the blanks.");
    }
    else if( verification_code_input == verification_code && email != "" && c_username != "" && c_password != "")
    {
        $.ajax( 
            {
                url:'../../../actions/login_create/create_account.php',
                type:'post',
                data:{c_username:c_username, email:email, verification_code:verification_code, c_password:c_password},
                success: function(data)
                {
                    data = $.parseJSON(data);

                    if(data.stat == "success")
                    {
                        $('.create_account_failed').attr('class','alert create_account_failed alert-success').fadeIn(100).fadeOut(5000);
                        $('.create_account_failed').html('<strong>'+data.msg+'</strong>');
                        $('#create_username').val("");
                        $('#create_password').val("");
                        $('#email').val("");
                        $('#verification_code').val("");
                        $('#verification_code').css('display','none');
                        $('#verify').css('display','unset');
                        $('#create').css('display','none');
                        load_user_account();
                        load_access_role();
                    }
                    else if(data.stat == "invalid")
                    {
                        $('.create_account_failed').attr('class','alert create_account_failed alert-warning').fadeIn(100).fadeOut(5000);
                        $('.create_account_failed').html('<strong>'+data.msg+'</strong>');
                    }
                }
            })
    }
    else
    {
        $('.create_account_failed').attr('class','alert create_account_failed alert-warning').fadeIn(100).fadeOut(10000);
        $('.create_account_failed').html('<strong>Incorrect Verification Code!</strong>');
    }
}

// login account
function login()
{
    let username = $('#username').val();
    let password = $('#password').val();

    if(username == "" || password == "")
    {
        $('.invalid_login').css('visibility','unset');
        $('.invalid_login').attr('class','alert invalid_login alert-primary');
        $('.invalid_login').html('<strong>No Input!</strong>' + " " + "Please Fill in the blanks.");
        setTimeout(function()
        {
            $('.invalid_login').css('visibility','hidden');
        },5000)
    }
    else
    {
        $.ajax(
            {
                url:'../../../actions/login_create/login_account.php',
                type:'post',
                data:{username:username, password:password},
                success: function(data)
                {
                    data = $.parseJSON(data);
                    if(data.status == "success")
                    {
                        $('.invalid_login').css('visibility','unset');
                        $('.invalid_login').attr('class','alert invalid_login alert-success').fadeIn(100).fadeOut(3000);
                        $('.invalid_login').html('<strong>Login Successfully!</strong>');
                        $('.inputs').val("");
                        setTimeout(function()
                        {
                            $('.invalid_login').css('visibility','hidden');
                        },1000)
                        setTimeout(function(){window.location.href = data.location}, 1000);
                    }
                    else if(data.status == "failed")
                    {
                        $('.invalid_login').css('visibility','unset');
                        $('.invalid_login').attr('class','alert invalid_login alert-danger');
                        $('.invalid_login').html('<strong>Invalid!</strong>' + " " + data.msg);
                        setTimeout(function()
                        {
                            $('.invalid_login').css('visibility','hidden');
                        },5000)
                    }
                }
            })
    }
}

$(document).on('click','.see',function()
{
    $('.see').css('display','none');
    $('.unsee').css('display','inline');
    $('#password').attr('type','text');
})

$(document).on('click','.unsee',function()
{
    $('.see').css('display','inline');
    $('.unsee').css('display','none');
    $('#password').attr('type','password');

})

function forgot_pass()
{
    $('.input_fields_cont').css('display','none');
    $('.input_fields_cont2').css('display','unset');
}
function back_to_login()
{
    $('.input_fields_cont').css('display','unset');
    $('.input_fields_cont2').css('display','none');
}

let recovery_code = 0;
// Sending Recovery Code to an Email
function get_recovery_code()
{   
    let recovery_email = $('#acct_recovery_email').val();
    if(recovery_email == "")
    {
        $('.acct_recovery_msg').css('visibility','unset');
        $('.acct_recovery_msg').attr('class','alert acct_recovery_msg alert-warning');
        $('.acct_recovery_msg').html('<strong>No Input! </strong>&nbsp; Enter your Email');
    
        setTimeout(function()
        {
            $('.acct_recovery_msg').css('visibility','hidden');
        }, 3000)
    }
    else
    {
        $.ajax(
            {
                url:'../../../actions/login_create/send_recovery_code.php',
                type:'post',
                data:{recovery_email:recovery_email},
                success: function(data)
                {
                    data = $.parseJSON(data);

                    if(data.stat == "success")
                    {
                        recovery_code = data.recovery_code;
                        $('#get_recovery_code').attr('disabled','disabled');
                        $('#acct_recovery_code').removeAttr('disabled');
                        $('#confirm_recovery_code').removeAttr('disabled');
                        $('#new_pass').removeAttr('disabled');
    
                        $('.acct_recovery_msg').css('visibility','unset');
                        $('.acct_recovery_msg').attr('class','alert acct_recovery_msg alert-success');
                        $('.acct_recovery_msg').html('<strong>Recovery Code Sent!</strong> Please check your email inbox/spam.');
                        setTimeout(function()
                        {
                            $('.acct_recovery_msg').css('visibility','hidden');
                        }, 3000)
                        setTimeout(function()
                        {
                            $('#get_recovery_code').removeAttr('disabled');
                        }, 30000)
                    }
                    else if(data.stat == "invalid")
                    {
                        $('.acct_recovery_msg').css('visibility','unset');
                        $('.acct_recovery_msg').attr('class','alert acct_recovery_msg alert-warning');
                        $('.acct_recovery_msg').html('<strong>Invalid Email Address!</strong>');
                        setTimeout(function()
                        {
                            $('.acct_recovery_msg').css('visibility','hidden');
                        }, 3000)
                    }                    
                    else if(data.stat == "no_internet")
                    {
                        $('.acct_recovery_msg').css('visibility','unset');
                        $('.acct_recovery_msg').attr('class','alert acct_recovery_msg alert-danger');
                        $('.acct_recovery_msg').html('<strong>'+data.msg+'!</strong>');
                        setTimeout(function()
                        {
                            $('.acct_recovery_msg').css('visibility','hidden');
                        }, 3000)
                    }                    
                    else if(data.stat == "exc")
                    {
                        alert(data.msg);
                    }                    
                }
            })
    }
}

// recover password if recovery code entered was correct
function recover_account()
{
    let recovery_email = $('#acct_recovery_email').val();
    let code = $('#acct_recovery_code').val();
    let new_pass = $('#new_pass').val();

    if(code == "" || new_pass == "")
    {
        $('.acct_recovery_msg').css('visibility','unset');
        $('.acct_recovery_msg').attr('class','alert acct_recovery_msg alert-warning');
        $('.acct_recovery_msg').html('<strong>Fill in the blank(s)! <strong>');
        setTimeout(function()
        {
            $('.acct_recovery_msg').css('visibility','hidden');
        }, 3000)
    }
    else if(code == recovery_code && new_pass != "")
    {
        $.ajax(
            {
                url:'../../../actions/login_create/recover_account.php',
                type:'post',
                data:{recovery_email:recovery_email, new_pass:new_pass},
                success: function(data)
                {
                    $('.acct_recovery_msg').css('visibility','unset');
                    $('.acct_recovery_msg').attr('class','alert acct_recovery_msg alert-success');
                    $('.acct_recovery_msg').html('<strong>Successfully changed your password! <strong>');
                    setTimeout(function()
                    {
                        $('.acct_recovery_msg').css('visibility','hidden');
                        back_to_login();
                    }, 1000)
                }
            })
    }
    else
    {
        $('.acct_recovery_msg').css('visibility','unset');
        $('.acct_recovery_msg').attr('class','alert acct_recovery_msg alert-warning');
        $('.acct_recovery_msg').html('<strong>Invalid Recovery Code! <strong>');
        setTimeout(function()
        {
            $('.acct_recovery_msg').css('visibility','hidden');
        }, 1000)
    }
}
