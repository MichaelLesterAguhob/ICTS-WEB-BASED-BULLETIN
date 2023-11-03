
    $(document).on('click', '.cancel', function()
    {
        $('#create_username').val("");
        $('#create_password').val("");
    })
    $(document).on('click', '.close', function()
    {
        $('#create_username').val("");
        $('#create_password').val("");
    })


function create_account()
{
    let c_username = $('#create_username').val();
    let c_password = $('#create_password').val();

    if(c_username == "" || c_password == "")
    {
        $('.invalid_login').attr('class','alert invalid_login alert-primary').fadeIn(100).fadeOut(5000);
        $('.invalid_login').html('<strong>No Input!</strong>' + " " + "Please Fill in the blanks.");
    }
    else
    {
        $.ajax( 
            {
                url:'backend/login_create/create_account.php',
                type:'post',
                data:{c_username:c_username, c_password:c_password},
                success: function(data)
                {
                    alert(data);
                    $('#create_username').val("");
                    $('#create_password').val("");
                    load_user_account();
                    load_access_role();
                }
            })
    }
}



function login()
{
    let username = $('#username').val();
    let password = $('#password').val();

    if(username == "" || password == "")
    {
        $('.invalid_login').attr('class','alert invalid_login alert-primary').fadeIn(100).fadeOut(5000);
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