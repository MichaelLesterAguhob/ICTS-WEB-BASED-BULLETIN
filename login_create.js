
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
        alert('Please fill in the blank(s)');
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
        alert('Please fill in the blank(s)');
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
                        window.location.href = data.location;
                    }
                    else if(data.status == "failed")
                    {
                        alert(data.msg);
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