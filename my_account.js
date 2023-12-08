
function load_account_details()
{
    $.ajax(
        {
            url:'backend/my_account/load_account.php',
            method:'post',
            success: function(data)
            {
                data = $.parseJSON(data);
                if(data.stat == "success")
                {
                    $('#u_name_view').val(data.uname);
                    $('#pass_view').val(data.pass);
                    $('#email_view').val(data.email);
                }
                else
                {
                    alert(data.msg);
                }
            }
        })
}
load_account_details();