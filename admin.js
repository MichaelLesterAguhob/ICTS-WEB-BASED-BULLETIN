
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

function load_logs()
{
    $.ajax(
        {
            url:'backend/admin/load_logs.php',
            type:'post',
            success: function(data)
            {
                $('#logs_data').html(data);
            }
        })
}
load_logs();

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
    if(viewed == id)
    {
        $('#'+id).attr('type','password');
        viewed = 0;
    }
    else
    {
        $('.user_password').attr('type','password');
        $('#'+id).attr('type','text');
        viewed = id;
    }

    
})