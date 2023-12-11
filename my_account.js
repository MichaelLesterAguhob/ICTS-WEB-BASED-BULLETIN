
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
    new_email = $('#new_email').val();
    email_v_c = $('#email_v_c').val();
    $.ajax(
        {
            url:'backend/my_account/update_account.php',
            method:'post',
            data:{to_change:to_change,user_type:user_type, user_id:user_id, new_uname:new_uname, new_pass:new_pass, new_email:new_email, email_v_c:email_v_c},
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

// for changing username
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

// for changing email
let verification_code_for_new_email = 0;
$(document).on('input','#new_email',function()
{
    let new_email_entered = $('#new_email').val();
    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (new_email_entered != "") {
        if(emailRegex.test(new_email_entered))
        {
            $('#new_email').css('color','black');
            $('#new_email').css('border-color','black');
            $('#send_v_c').css('visibility','visible');
        }
        else
        {
            $('#new_email').css('color','red');
            $('#new_email').css('border-color','red');
            $('#send_v_c').css('visibility','hidden');
        }
    } 
    else 
    {
        $('#new_email').css('color','red');
        $('#new_email').css('border-color','red');
        $('#send_v_c').css('visibility','hidden');
    }
})
// verification code
let email_v_c = 0;
$(document).on('input','#email_v_c',function()
{
     email_v_c = $('#email_v_c').val();
    if(email_v_c != "" && email_v_c == verification_code_for_new_email)
    {
        $('#email_v_c').css('color','green')
        $('#email_v_c').css('border-color','green')
    }
    else if(email_v_c != "" && email_v_c != verification_code_for_new_email)
    {
        $('#email_v_c').css('color','red')
        $('#email_v_c').css('border-color','red')
    }
    else
    {
        $('#email_v_c').css('color','black')
        $('#email_v_c').css('border-color','black')
    }
    
})
// sending v_c
$(document).on('click','#send_v_c', function()
{
    $('#email_v_c').val('');
    new_email = $('#new_email').val();

    if(new_email != "")
    {
        $.ajax(
            {
                url:'backend/my_account/verify_new_email.php',
                method:'post',
                data:{new_email:new_email},
                success: function(data)
                {
                    data = $.parseJSON(data);
                    if(data.stat == "success")
                    {
                        verification_code_for_new_email = data.v_code;
                        $('#send_v_c').prop('disabled', true);
                        setTimeout(function()
                        {
                            $('#send_v_c').prop('disabled', false);
                        },20000)
                        $('.c_e_msg').html("Verification Code Sent!").fadeIn(100).fadeOut(2000);
                    }
                    else
                    {
                        alert(data.msg);
                    }
                }
    
            })
    }
})
$(document).on('click','#confirm_email', function()
{
    let new_email = $('#new_email').val();
    let email_v_c = $('#email_v_c').val();
    let pass_to_new_email = $('#pass_to_new_email').val();

   if(new_email != "" && email_v_c != "" && pass_to_new_email != "")
   {
        if(email_v_c == verification_code_for_new_email)
        {
            $.ajax(
                {
                    url:'backend/my_account/match_pass3.php',
                    method:'post',
                    data:{pass_to_new_email:pass_to_new_email,username:username,user_type:user_type},
                    success:function(data) 
                    {
                        data = $.parseJSON(data);
                        if(data.stat == 'success')
                        {
                            $('#change_uname_btn').css('display','none');
                            $('#change_pass_btn').css('display','none');
                            
                            $('#change_email_btn').css('display','block');
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
            alert('Incorrect Verification Code');
        }
   }
   else
   {
    alert("No Input. Please fill the blank(s)");
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