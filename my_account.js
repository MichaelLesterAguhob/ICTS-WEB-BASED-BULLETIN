
function load_account_details()
{
    $.ajax(
        {
            url:'backend/my_account/load_account.php',
            method:'post',
            success: function()
            {
                
            }
        })
}