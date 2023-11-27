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
// ----------------------------------------------------------

let hrep_ann_count = 0;
let hrep_ann_scroll_cnt = 0;
let hrep_ann_cntr = 1;
let hrep_ann_scroll_to = 0;
let showed_ha = 0;
function display_hrep_ann()
{
    $.ajax(
        { 
            url:'backend/hrep_ann_tab/hrep_ann_display.php',
            method:'post',
            success: function(data) 
            {
                data = $.parseJSON(data);
                if(data.stat == "success")
                {
                    $('.hrep_ann_display').html(data.respo);
                    hrep_ann_count = data.hrep_ann_cnt;
                }
                else
                {
                    $('.hrep_ann_display').html(data.respo);
                }
            }
        })
}
display_hrep_ann();
// ----------------------------------------------------------

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
// ----------------------------------------------------------

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
// ----------------------------------------------------------

let hrep_act_card_count = 0;
let hrep_act_scroll_cnt = 0;
let hrep_act_cntr = 1;
let showed_hrep_act = 0;
let hrep_act_scroll_to = 0;
function display_hrep_activity()
{
    $.ajax(
        {
            url:'backend/hrep_act_tab/hrep_act_display.php',
            method:'post',
            success: function(data)
            {
                data = $.parseJSON(data);
                if(data.stat == "success")
                {
                    $('.hrep_activity').html(data.respo);
                    hrep_act_card_count = data.hrep_act_card_count;
                }
            }
        })
}
display_hrep_activity();
// ----------------------------------------------------------

var cmes = document.getElementById('cmes_display');
let cmes_height = 0;
let scrolled = 0;
let cntdwn = 3000;
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
// ----------------------------------------------------------


// =============================LOOP DISPLAY ==============================================
var myIndex = 0;
var loop_display_time_interval = 3000;
loop_display();
function loop_display() 
{
  var i;
  var x = document.getElementsByClassName("displays");
  for (i = 0; i < x.length; i++) 
  { 
    $(x[i]).hide();  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}  
  $(x[myIndex-1]).fadeIn(); 
 
  console.log(myIndex);
    //   icts announcement displayed
  if(myIndex == 1)
    {
        change_time_interval(1);
    }
    // hrep announcement displayed
  if(myIndex == 2)
    {
        hrep_ann_cntr = 1;
        showed_ha = 0;
        hrep_ann_scroll_to = 0;
        change_time_interval(2);
        scroll_hrep_ann();
    }
    // hrep activities displayed
  if(myIndex == 3)
    {
        hrep_act_cntr = 1;
        showed_hrep_act = 0;
        hrep_act_scroll_to = 0;
        change_time_interval(3);
        scroll_hrep_act();
    }
    // committee meeting and event schedule displayed
  if(myIndex == 4)
    {
        cmes.scrollTop = 1;
        cntdwn = 3000;
        scrolled = 0;
        change_time_interval(4);
        scroll_cmes();
        
    }
    // birthday displayed
  if(myIndex == 5)
    {
        loop_cnt = 1;
        showed_bday = 0;
        scroll_to = 0;
        change_time_interval(5);
        scroll_bday();
    }
    // quote displayed
  if(myIndex == 6)
    {
        change_time_interval(6);
    }
    
    setTimeout(loop_display,  loop_display_time_interval); 
    display_icts_ann();
    display_hrep_ann();
    display_hrep_activity();
    display_cmes();
    display_birthday();
    display_quote();
}
// ===========================================================================

// SCROLL CMES
let total_seconds = 0;
let scroll_step = 0;
let cmes_to_scroll = 0;
function scroll_cmes()
{
    var div = document.getElementById('cmes_display');
    setTimeout(function()
    {
        if(scrolled < cmes_to_scroll)
        {
            div.scrollTop += scroll_step;
            console.log("scrolled Num");
            scrolled += scroll_step;
            setTimeout(scroll_cmes, 1000);
        }    
    },cntdwn)
    cntdwn = 0;   
}
function isElementVisible(element) {
    var rect = element.getBoundingClientRect();
    var viewHeight = Math.max(document.documentElement.clientHeight, window.innerHeight);

    return !(rect.bottom < 0 || rect.top - viewHeight >= 0);
}
// -------------------------------------------------------------

// BIRTHDAY SCROLLING WHEN CONTENT OVERFLOW
function scroll_bday_code()
{
    let scrollableCont = document.getElementById('bday');
    scroll_to = (showed_bday + 4)-3;
    showed_bday += 4;
    console.log("scroll to: "+scroll_to);
    var content = document.getElementById('bday_card'+scroll_to);
    scrollableCont.scrollTo(
    {
        left: content.offsetLeft,
        behavior: 'smooth'
    });
}
function scroll_bday()
{
    scroll_cnt = Math.ceil((bday_card_count/4)); 
    if(loop_cnt <= scroll_cnt)
    {
        scroll_bday_code();
        loop_cnt ++; 
        setTimeout(scroll_bday, 4000);
    }
}
// -------------------------------------------------------------

// HREP ANNOUNCEMENT SCROLLING WHEN CONTENT OVERFLOW
function scroll_ha_code()
{
    let scrollableCont = document.getElementById('hrep_ann_display');
    hrep_ann_scroll_to = (showed_ha + 4)-3;
    showed_ha += 4;
    console.log("scroll to: "+hrep_ann_scroll_to);
    var content = document.getElementById('hrep_ann_card'+hrep_ann_scroll_to);
    scrollableCont.scrollTo(
    {
        left: content.offsetLeft,
        behavior: 'smooth'
    });
}
function scroll_hrep_ann()
{
    hrep_ann_scroll_cnt = Math.ceil((hrep_ann_count/4)); 
    if(hrep_ann_cntr <= hrep_ann_scroll_cnt)
    {
        scroll_ha_code();
        hrep_ann_cntr ++; 
        setTimeout(scroll_hrep_ann, 4000);
    }
}
// --------------------------------------------------------------

// HREP ACTIVITIES SCROLLING WHEN CONTENT OVERFLOW
function scroll_hrep_act_code()
{
    let scrollableCont = document.getElementById('hrep_activity');
    hrep_act_scroll_to = (showed_hrep_act + 4)-3;
    showed_hrep_act += 4;
    console.log("scroll to: "+hrep_act_scroll_to);
    var content = document.getElementById('hrep_act_card'+hrep_act_scroll_to);
    scrollableCont.scrollTo(
    {
        left: content.offsetLeft,
        behavior: 'smooth'
    });
}
function scroll_hrep_act()
{
    hrep_act_scroll_cnt = Math.ceil((hrep_act_card_count/4)); 
    if(hrep_act_cntr <= hrep_act_scroll_cnt)
    {
        scroll_hrep_act_code();
        hrep_act_cntr ++; 
        setTimeout(scroll_hrep_act, 4000);
    }
}
// --------------------------------------------------------------

// --------------------------------------------------------------

// changing time interval of every screen displayed
function change_time_interval(display)
{
    //icts ann 
    if(display == 1)
    {
        // loop_display_time_interval = ((Math.ceil(bday_card_count/4)) * 4) * 1000;
        loop_display_time_interval = 3000;
        console.log("INTERVAL = " + loop_display_time_interval);
    }
    // hrep ann
    if(display == 2)
    {
        loop_display_time_interval = ((Math.ceil(hrep_ann_count/4)) * 4) * 1000;
        console.log("INTERVAL = " + loop_display_time_interval);
    }
    // hrep act
    if(display == 3)
    {
        loop_display_time_interval = ((Math.ceil(hrep_act_card_count/4)*4)*1000);
        console.log("INTERVAL = " + loop_display_time_interval);
    }
    // cmes     
    if(display == 4)
    {
        let cont_height = $('#cmes_display').height();//getting the total height of data's container

        cmes_height = cmes.scrollHeight; // getting the total height of element that needs to be scr

        cmes_to_scroll = cmes_height - cont_height; //subtracting the already visible data to total scroll height
        
        total_seconds = (cmes_to_scroll * 50) / 1000; // compute for total seconds need to complete scrolling up

        scroll_step = (cmes_to_scroll / total_seconds);//scroll step need to finish scrolling along with the total time

        //multiplying the cmes to scroll(the not visible data height) by 50 milliseconds and adding the countdown plus additional 3 seconds 
        loop_display_time_interval = (cmes_to_scroll * 50) + cntdwn + 3000;
        console.log("INTERVAL = " + loop_display_time_interval);
    }
    // bday
    if(display == 5)
    {
        loop_display_time_interval = ((Math.ceil(bday_card_count/4)) * 4) * 1000;
        console.log("INTERVAL = " + loop_display_time_interval);
    }
    // quote
    else if(display == 6)
    {
        loop_display_time_interval = 10000;
        console.log("INTERVAL = " + loop_display_time_interval);
    }
}
