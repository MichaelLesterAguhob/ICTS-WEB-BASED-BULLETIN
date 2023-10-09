
function display_birthday()
{
    $.ajax(
        { 
            url:'backend/birthday_tab/birthday_display.php',
            method:'post',
            success: function(data)
            {
                $('.bday_display').html(data);
            }
        })
}
display_birthday();

function display_quote()
{
    $.ajax(
        { 
            url:'backend/quote_tab/quote_display.php',
            method:'post',
            success: function(data)
            {
                $('.quote').append(data);
            }
        })
}
display_quote();

function display_hrep_activity()
{
    $.ajax(
        {
            url:'backend/hrep_act_tab/hrep_act_display.php',
            method:'post',
            success: function(data)
            {
                $('.hrep_activity').html(data);
            }
        })
}
display_hrep_activity()