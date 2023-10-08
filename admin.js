
function load_user_account()
{
    $.ajax(
        {
            url:'backend/admin/load_user_acct.php',
            type:'post',
            success: function(data)
            {
                $('#user_acct_data').html(data);
                
            }
        })
}
load_user_account();



function load_activities()
{
    $.ajax(
        {
            url:'backend/admin/load_activities.php',
            type:'post',
            success: function(data)
            {
                $('#activity_data').html(data);
            }
        })
}
load_activities();

let viewed = 0;
$(document).on('click','.view_btn', function()
{
    let id = $(this).attr('data-id');
    let pass = $(this).attr('password');
    let pass_plain = $(this).attr('password-plain');
    if(viewed == id)
    {
        $('#'+id).val(pass);
        viewed = 0;
    }
    else
    {
        // viewing the original form of password
        $('#'+id).val(pass_plain);
        viewed = id;
    }  
})

function load_access_role()
{
    $.ajax(
        {
            url:'backend/admin/load_access_role.php',
            type:'post',
            success: function(data)
            {
                $('#access_role_data').html(data);
            }
        })
}
load_access_role();

// Checking and unchecking of access role of every account
$(document).on('click', '.chckbx', function()
{
    let account_id = $(this).attr('data-id');
    let col_name = $(this).attr('data-col');

    $.ajax(
        {
            url:'backend/admin/check_access.php',
            type:'post',
            data:{account_id:account_id, col_name:col_name},
            success: function(data)
            {
                load_access_role();
            }
        })
})