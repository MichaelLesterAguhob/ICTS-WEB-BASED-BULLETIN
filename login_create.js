
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
                url:'backend/login_create/verify_email.php',
                type:'post',
                data:{email:email},
                success: function(data)
                {
                    $('.create_account_failed').attr('class','alert create_account_failed alert-info').fadeIn(100).fadeOut(15000);
                    $('.create_account_failed').html('<strong> We&apos;ve Sent a Verification Code to '+email+'.</strong>' + " " + "Please Check your Email Account Inbox or Spam.");
                    $('#verify').css('display','none');
                    $('.v_code').css('display','unset');
                    $('#create').css('display','unset');
                    verification_code = data;
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
                url:'backend/login_create/create_account.php',
                type:'post',
                data:{c_username:c_username, email:email, verification_code:verification_code, c_password:c_password},
                success: function(data)
                {
                    $('.create_account_failed').attr('class','alert create_account_failed alert-success').fadeIn(100).fadeOut(5000);
                    $('.create_account_failed').html('<strong>Successfully Created Account</strong>');
                    $('#create_username').val("");
                    $('#create_password').val("");
                    $('#email').val("");
                    load_user_account();
                    load_access_role();
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
        $('.invalid_login').attr('class','alert create_account_failed alert-primary').fadeIn(100).fadeOut(5000);
        $('.invalid_login').html('<strong>No Input!</strong>' + " " + "Please Fill in the blanks.");
    }
    else
    {
        $.ajax(
            {
                url:'backend/login_create/login_account.php',
                type:'post',
                data:{username:username, password:password},
                success: function(data)
                {
                    data = $.parseJSON(data);
                    if(data.status == "success")
                    {
                        $('.invalid_login').attr('class','alert invalid_login alert-success').fadeIn(100).fadeOut(3000);
                        $('.invalid_login').html('<strong>Login Successfully!</strong>');
                        $('.inputs').val("");
                        setTimeout(function(){window.location.href = data.location}, 2000);
                    }
                    else if(data.status == "failed")
                    {
                        $('.invalid_login').attr('class','alert invalid_login alert-danger').fadeIn(100).fadeOut(3000);
                        $('.invalid_login').html('<strong>Invalid!</strong>' + " " + data.msg);
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


// 
function forgot_pass()
{
    let username = $('#username').val();
    if(username != "")
    {
        $.ajax(
            {
                url:'backend/login_create/forgot_pass.php',
                type:'post',
                data:{username:username},
                success: function(data)
                {
                    alert(data);
                }
            })
    }
    else
    {
        alert('Fill in the username!'); 
    }
}
