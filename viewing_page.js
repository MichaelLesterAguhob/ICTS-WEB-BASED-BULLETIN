$('.icts_announcement').hide(); 
$('.hrep_announcement').hide();
$('.hrep_act').hide(); 
$('.cmes').hide();
// $('.birthday').hide();
$('.quote').hide();

// var myIndex = 0;
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
//   setTimeout(loop_display, 6000); 
//     display_hrep_activity();
//     display_cmes();
//     display_birthday();
//     display_quote();
// }



// function display_icts_ann()
// {
//     $.ajax(
//         { 
//             url:'backend/icts_announcement/icts_ann_display.php',
//             method:'post',
//             success: function(data) 
//             {
//                 $('.icts_ann_display').html(data);
//             }
//         })
// }
// display_icts_ann();

// function display_hrep_ann()
// {
//     $.ajax(
//         { 
//             url:'backend/hrep_ann_tab/hrep_ann_display.php',
//             method:'post',
//             success: function(data) 
//             {
//                 $('.hrep_ann_display').html(data);
//             }
//         })
// }
// display_hrep_ann();

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
 
// function display_quote()
// {
//     $.ajax(
//         { 
//             url:'backend/quote_tab/quote_display.php',
//             method:'post',
//             success: function(data)
//             {
//                 $('.quote').html(data);
//             }
//         })
// }
// display_quote();

// function display_hrep_activity()
// {
//     $.ajax(
//         {
//             url:'backend/hrep_act_tab/hrep_act_display.php',
//             method:'post',
//             success: function(data)
//             {
//                 $('.hrep_activity').html(data);
//             }
//         })
// }
// display_hrep_activity();

// function display_cmes()
// {
//     $.ajax(
//         {
//             url:'backend/cmes_tab/cmes_display.php',
//             method:'post',
//             success: function(data)
//             {
//                 $('#cmes_data').html(data);
//             }
//         })
// }
// display_cmes();



