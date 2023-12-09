
let username = "";
let password = "";
let email = "";

function load_account_details()
{
    let username = $('#s_uname').val();
    let user_type = $('#s_utype').val();
    $.ajax(
        { 
            url:'backend/my_account/load_account.php',
            method:'post',
            data:{user_type:user_type, username:username},
            success: function(data)
            {
                data = $.parseJSON(data);
                if(data.stat == "success")
                {
                    $('#u_name_view').val(data.uname);
                    $('#pass_view').val(data.pass);
                    $('#email_view').val(data.email);

                    username = data.uname;
                    password = data.pass;
                    email = data.email;
                }
                else
                {
                    alert(data.msg);
                }
            }
        })
}
document.addEventListener('DOMContentLoaded',function()
{
    load_account_details();
})

$(document).ready(function()
{
    $('.change_uname_div').css('display','none');
    $('.change_pass_div').css('display','none');
    $('.change_email_div').css('display','none');
})  
$(document).on('click','.back_to_account',function()
{
    $('.my_account_title').text('My Account');
    $('.change_uname_div').css('display','none');
    $('.change_pass_div').css('display','none');
    $('.change_email_div').css('display','none');
    $('.acct_details').css('display','block');
})
$(document).on('click','.cancel_changes',function()
{
    $('.change_uname_div').css('display','none');
    $('.change_pass_div').css('display','none');
    $('.change_email_div').css('display','none');
    $('.change_uname_div :input').val('');
    $('.change_pass_div :input').val('');
    $('.change_email_div :input').val('');
    $('.my_account_title').text('My Account');
    $('.acct_details').css('display','block');
})

$(document).on('click','#change_uname',function()
{
    $('.my_account_title').text('Change Username');
    $('.acct_details').css('display','none');
    $('.change_uname_div').css('display','block');
})
$(document).on('click','#change_pass',function()
{
    $('.my_account_title').text('Change Password');
    $('.acct_details').css('display','none');
    $('.change_pass_div').css('display','block');
})
$(document).on('click','#change_email',function()
{
    $('.my_account_title').text('Change Email');
    $('.acct_details').css('display','none');
    $('.change_email_div').css('display','block');
})


$(document).on('click','#confirm_uname', function()
{
    let new_uname = $('#new_uname').val();
    let pass_to_new_uname = $('#pass_to_new_uname').val();

    if(new_uname != "" && pass_to_new_uname != "")
    {
        if(password == pass_to_new_uname)
        {
            
        }
        else
        {
            alert('Incorrect Password');
        }
    }
    else
    {
        alert('No Input!');
    }
})