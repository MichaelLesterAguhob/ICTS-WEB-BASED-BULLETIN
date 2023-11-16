// $('.icts_announcement').hide(); 
// $('.hrep_announcement').hide();
// $('.hrep_act').hide(); 
// $('.cmes').hide();
// $('.birthday').hide();
// $('.quote').hide();

function display_icts_ann()
{
    $.ajax(
        { 
            url:'backend/icts_announcement/icts_ann_display.php',
            method:'post',
            success: function(data) 
            {
                $('.icts_ann_display').html(data);
            }
        })
}
display_icts_ann();

function display_hrep_ann()
{
    $.ajax(
        { 
            url:'backend/hrep_ann_tab/hrep_ann_display.php',
            method:'post',
            success: function(data) 
            {
                $('.hrep_ann_display').html(data);
            }
        })
}
display_hrep_ann();

// BIRTHDAY DISPLAYING CODE
let bday_card_count = 0;
let scroll_cnt = 0;
let loop_cnt = 1;
let showed_bday = 0;
let scroll_to = 0;

function display_birthday()
{
    $.ajax(
        { 
            url:'backend/birthday_tab/birthday_display.php',
            method:'post',
            success: function(data) 
            {
                data = $.parseJSON(data);
                if(data.stat == "success")
                {
                    $('.bday_display').html(data.html);
                    bday_card_count = data.bday_card_count;
                }
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
                $('.quote').html(data);
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
display_hrep_activity();

function display_cmes()
{
    $.ajax(
        {
            url:'backend/cmes_tab/cmes_display.php',
            method:'post',
            success: function(data)
            {
                $('#cmes_data').html(data);
            }
        })
}
display_cmes();


// =============================LOOP DISPLAY ==============================================
// var myIndex = 0;
// var loop_display_time_interval = 3000;
// loop_display();
// function loop_display() 
// {
//   var i;
//   var x = document.getElementsByClassName("displays");
//   for (i = 0; i < x.length; i++) 
//   { 
//     $(x[i]).hide();  
//   }
//   myIndex++;
//   if (myIndex > x.length) {myIndex = 1}  
//   $(x[myIndex-1]).fadeIn(); 
 
//   console.log(myIndex);
//   console.log("interval = " + loop_display_time_interval);
//   if(myIndex == 5)
//     {
//         loop_cnt = 1;
//         showed_bday = 0;
//         scroll_to = 0;
//         change_time_interval(5);
//         scroll_bday();
//     }
//   if(myIndex == 6)
//     {
//         change_time_interval(6);
//     }
    
//     setTimeout(loop_display,  loop_display_time_interval); 
//     display_hrep_activity();
//     display_cmes();
//     display_birthday();
//     display_quote();
// }
// ===========================================================================

// BIRTHDAY SCROLLING WHEN CONTENT OVERFLOW
// function scroll_bday_code()
// {
//     let scrollableCont = document.getElementById('bday');
//     scroll_to = (showed_bday + 4)-3;
//     showed_bday += 4;
//     console.log("scroll to: "+scroll_to);
//     var content = document.getElementById('bday_card'+scroll_to);
//     scrollableCont.scrollTo(
//     {
//         left: content.offsetLeft,
//         behavior: 'smooth'
//     });
// }

// function scroll_bday()
// {
//     scroll_cnt = Math.ceil((bday_card_count/4)); 
//     if(loop_cnt <= scroll_cnt)
//     {
//         scroll_bday_code();
//         loop_cnt ++; 
//         setTimeout(scroll_bday, 4000);
//     }
// }

// function change_time_interval(display)
// {
//     if(display == 5)
//     {
//         loop_display_time_interval = ((Math.ceil(bday_card_count/4)) * 4) * 1000;
//         console.log("new interval = " + loop_display_time_interval);
//     }
//     else if(display == 6)
//     {
//         loop_display_time_interval = 3000;
//         console.log("new interval = " + loop_display_time_interval);
//     }
// }
