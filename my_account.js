
let user_id = 0;
let username = "";
let user_type = "";
let password = "";
let email = "";
let new_uname = "";

let new_pass = "";
let ReEnter_new_pass ="";
let old_pass = "";

function load_account_details()
{
        username = $('#s_uname').val();
        user_type = $('#s_utype').val();
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

                    user_id = data.id;
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

// CONFIRMING CHANGES
function change_acct_info(to_change)
{
    new_uname = $('#new_uname').val();
    new_pass = $('#new_pass').val();
    $.ajax(
        {
            url:'backend/my_account/update_account.php',
            method:'post',
            data:{to_change:to_change,user_type:user_type, user_id:user_id, new_uname:new_uname, new_pass:new_pass},
            success: function(data)
            {   
                // $('.confirm_changes_modal').modal('hide');
                // $('.change_pass_div :input').val('');
                // $('.back_to_account').click();
                location.reload();
            }
        })

}

// matching password and showing confirmation modal
$(document).on('click','#confirm_uname', function()
{
        new_uname = $('#new_uname').val();
    let pass_to_new_uname = $('#pass_to_new_uname').val();

    if(new_uname != "" && pass_to_new_uname != "")
    {
        $.ajax(
            {
                url:'backend/my_account/match_pass.php',
                method:'post',
                data:{user_type:user_type, pass:pass_to_new_uname, username:username, new_uname:new_uname},
                success:function(data) 
                {
                    data = $.parseJSON(data);
                    if(data.stat == 'success')
                    {
                        $('#change_email_btn').css('display','none');
                        $('#change_pass_btn').css('display','none');

                        $('#change_uname_btn').css('display','block');
                       $('.confirm_changes_modal').addClass('bring_to_front');
                       $('.confirm_changes_modal').modal('show');
                    }
                    else
                    {
                        alert(data.respo);
                    }
                }
            })
    }
    else
    {
        alert('No Input!');
    }
})


// for changing pass
$(document).on('click','#confirm_pass', function()
{
    new_pass = $('#new_pass').val();
    ReEnter_new_pass = $('#reenter_new_pass').val();
    old_pass = $('#enter_old_pass').val();

    if(new_pass != "" && ReEnter_new_pass != "" && old_pass != "")
    {
        if(new_pass == ReEnter_new_pass)
        {
            $.ajax(
                {
                    url:'backend/my_account/match_pass2.php',
                    method:'post',
                    data:{old_pass:old_pass,username:username,user_type:user_type},
                    success:function(data) 
                    {
                        data = $.parseJSON(data);
                        if(data.stat == 'success')
                        {
                            $('#change_uname_btn').css('display','none');
                            $('#change_email_btn').css('display','none');
    
                            $('#change_pass_btn').css('display','block');
                           $('.confirm_changes_modal').addClass('bring_to_front');
                           $('.confirm_changes_modal').modal('show');
                        }
                        else
                        {
                            alert(data.respo);
                        }
                    }
                })
        }
        else
        {
            alert("The password did not match");
        }
    }
    else
    {
        alert('No Input!');
    }
})

// ==============================================================================
$(document).on('click', '.cancel_confirm', function()
{
    $('.confirm_changes_modal').modal('hide');
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