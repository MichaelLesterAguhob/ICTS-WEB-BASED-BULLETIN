
// ICTS ANNOUNCEMENT
let ert_body = 0;
let ert_body_hght = 0;
let ert_body_scroll_hght = 0;
let ert_to_scroll = 0;
let ert_scroll_step = 0;
let ert_scrolled = 0;
let icts_cntdwn = 5000;
let training_body = 0;
let training_body_hght = 0;
let training_body_scroll_hght = 0;
let training_to_scroll = 0;
let training_scroll_step = 0;
let training_scrolled = 0;

// HREP ACTIVITIES
let hrep_act_card_count = 0;
let hrep_act_scroll_cnt = 0;
let hrep_act_cntr = 1;
let showed_hrep_act = 0;
let hrep_act_scroll_to = 0;

// HREP ANOUNCEMENT
let hrep_ann_count = 0;
let hrep_ann_scroll_cnt = 0;
let hrep_ann_cntr = 1;
let hrep_ann_scroll_to = 0;
let showed_ha = 0;

// COMMITTEE MEETING AND EVENT SCHED
var cmes = document.getElementById('cmes_display');
let cmes_height = 0;
let scrolled = 0;
let cntdwn = 6000;
let total_seconds = 0;
let scroll_step = 0;
let cmes_to_scroll = 0;

// BIRTHDAY
let bday_card_count = 0;
let scroll_cnt = 0;
let loop_cnt = 1;
let showed_bday = 0;
let scroll_to = 0;


document.addEventListener('DOMContentLoaded', function() {
    // Use Promise.all to wait for all AJAX calls to complete
    Promise.all([
        display_birthday(),
        display_icts_ann(),
        display_hrep_ann(),
        display_hrep_activity(),
        display_cmes(),
        display_quote()
    ]).then(() => {
        get_icts_height();
        loop_display();
    });
    // Other functions or code that doesn't depend on the heights or loop can go here
});

// display_icts_ann();
// display_hrep_ann();
// display_hrep_activity();
// display_cmes();
// display_birthday();
// display_quote();
// ===============================================================
function display_icts_ann()
{
    return new Promise((resolve) => {
    $.ajax(
        { 
            url: '../../../actions/icts_announcement/icts_ann_display.php',
            method:'post',
            success: function(data) 
            {
                $('.icts_ann_display').html(data);
                resolve();
            }
        })
    });
}

// ================================================================
function display_hrep_ann()
{
    return new Promise((resolve) => {
    $.ajax(
        { 
            url: '../../../actions/hrep_ann_tab/hrep_ann_display.php',
            method:'post',
            success: function(data) 
            {
                data = $.parseJSON(data);
                if(data.stat == "success")
                {
                    $('.hrep_ann_display').html(data.respo);
                    hrep_ann_count = data.hrep_ann_cnt;
                    resolve();
                }
                else
                {
                    $('.hrep_ann_display').html(data.respo);
                    resolve();
                }
            }
        })
    });
}

// ================================================================
function display_birthday()
{
    return new Promise((resolve) => {
    $.ajax(
        { 
            url: '../../../actions/birthday_tab/birthday_display.php',
            method:'post',
            success: function(data) 
            {
                data = $.parseJSON(data);
                if(data.stat == "success")
                {
                    $('.bday_display').html(data.html);
                    bday_card_count = data.bday_card_count;
                    if (bday_card_count < 4)
                    {
                        $('#bday').css('justify-content','center');
                    }
                    resolve();
                }
            }
        })
    });
}

// ================================================================
function display_quote()
{
    return new Promise((resolve) => {
    $.ajax(
        { 
            url: '../../../actions/quote_tab/quote_display.php',
            method:'post',
            success: function(data)
            {
                $('.quote').html(data);
                resolve();
            }
        })
    });
}

// ================================================================
function display_hrep_activity()
{
    return new Promise((resolve) => {
    $.ajax(
        {
            url: '../../../actions/hrep_act_tab/hrep_act_display.php',
            method:'post',
            success: function(data)
            {
                data = $.parseJSON(data);
                if(data.stat == "success")
                {
                    $('.hrep_activity').html(data.respo);
                    hrep_act_card_count = data.hrep_act_card_count;
                    resolve();
                }
            }
        })
    });
}

// ================================================================
function display_cmes()
{
    return new Promise((resolve) => {
    $.ajax(
        {
            url: '../../../actions/cmes_tab/cmes_display.php',
            method:'post',
            success: function(data)
            {
                $('#cmes_data').html(data);
                resolve();
            }
        })
    });
}
// ================================================================


// =============================LOOP DISPLAY ==============================================
var myIndex = 0;
var loop_display_time_interval = 3000;

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
 
  if(myIndex == 1)
  {
      change_time_interval(1);
      $("#intro_icts").trigger("play");
  }
    //   icts announcement displayed
  if(myIndex == 2)
    {
        ert_body.scrollTop = 1;
        ert_scrolled = 0;
        training_body.scrollTop = 1;
        training_scrolled = 0;
        icts_cntdwn = 5000;
        change_time_interval(2);
        scroll_ert();
    }
    // hrep announcement displayed
  if(myIndex == 3)
    {
        hrep_ann_cntr = 1;
        showed_ha = 0;
        hrep_ann_scroll_to = 0;
        change_time_interval(3);
        scroll_hrep_ann();
    }
    // hrep activities displayed
  if(myIndex == 4)
    {
        hrep_act_cntr = 1;
        showed_hrep_act = 0;
        hrep_act_scroll_to = 0;
        change_time_interval(4);
        scroll_hrep_act();
    }
    // committee meeting and event schedule displayed
  if(myIndex == 5)
    {
        cmes.scrollTop = 1;
        cntdwn = 6000;
        scrolled = 0;
        change_time_interval(5);
        scroll_cmes();
    }
    // birthday displayed
  if(myIndex == 6)
    {
        loop_cnt = 1;
        showed_bday = 0;
        scroll_to = 0;
        change_time_interval(6);
        scroll_bday();
    }
    // quote displayed
  if(myIndex == 7)
    {
        change_time_interval(7);
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

// Scroll icts announcement cards when overflow
function scroll_ert()
{
    var div = document.getElementById('ert_card_body');
    var div2 = document.getElementById('training_card_body');
    setTimeout(function()
    {
        if(ert_scrolled <= ert_to_scroll)
        {
            div.scrollTop += ert_scroll_step;
            // console.log("scrolled ert");
            ert_scrolled += ert_scroll_step;
            
        }    
        if(training_scrolled <= training_to_scroll)
        {
            div2.scrollTop += training_scroll_step;
            // console.log("scrolled training");
            training_scrolled += training_scroll_step;
        }    

        if(ert_scrolled <= ert_to_scroll || training_scrolled <= training_to_scroll)
        {
            setTimeout(scroll_ert, 1000);
        }
    },icts_cntdwn)
    icts_cntdwn = 0;   
}

function get_icts_height()
{ 
    ert_body = document.getElementById('ert_card_body');
    ert_body_hght = $('#ert_card_body').height();  
    // console.log("ert body height = " + ert_body_hght);
    
    ert_body_scroll_hght =  ert_body.scrollHeight;
    // console.log("ert scroll height = " + ert_body_scroll_hght);

    // training
    training_body = document.getElementById('training_card_body');
    training_body_hght = $('#training_card_body').height();  
    // console.log("t body height = " + training_body_hght);
    
    training_body_scroll_hght =  training_body.scrollHeight;
    // console.log("t scroll height = " + training_body_scroll_hght);
}

// SCROLL CMES
function scroll_cmes()
{
    var div = document.getElementById('cmes_display');
    setTimeout(function()
    {
        if(scrolled <= cmes_to_scroll)
        {
            div.scrollTop += scroll_step;
            // console.log("scrolled Num");
            scrolled += scroll_step;
            setTimeout(scroll_cmes, 1000);
        }    
    },cntdwn)
    cntdwn = 0;   
}
// -------------------------------------------------------------

// BIRTHDAY SCROLLING WHEN CONTENT OVERFLOW
function scroll_bday_code()
{
    let scrollableCont = document.getElementById('bday');
    scroll_to = (showed_bday + 4)-3;
    showed_bday += 4;
    // console.log("scroll to: "+scroll_to);
    var content = document.getElementById('bday_card'+scroll_to);
    var leftOffset = content.offsetLeft;
    var scrollPosition = leftOffset - scrollableCont.clientWidth / 2;
    scrollableCont.scrollTo(
        {
            left: scrollPosition,
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

    var content = document.getElementById('hrep_ann_card'+hrep_ann_scroll_to);
   
    var leftOffset = content.offsetLeft;
    var scrollPosition = leftOffset - scrollableCont.clientWidth / 2;
    scrollableCont.scrollTo(
        {
            left: scrollPosition,
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
        setTimeout(scroll_hrep_ann, 8000);
    }
}
// --------------------------------------------------------------

// HREP ACTIVITIES SCROLLING WHEN CONTENT OVERFLOW
function scroll_hrep_act_code()
{
    let scrollableCont = document.getElementById('hrep_activity');
    hrep_act_scroll_to = (showed_hrep_act + 4)-3;
    showed_hrep_act += 4;

    var content = document.getElementById('hrep_act_card'+hrep_act_scroll_to);
    var leftOffset = content.offsetLeft;
    var scrollPosition = leftOffset - scrollableCont.clientWidth / 2;
    scrollableCont.scrollTo(
        {
            left: scrollPosition,
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
        setTimeout(scroll_hrep_act, 8000);
    }
}
// --------------------------------------------------------------

// --------------------------------------------------------------
// changing time interval of every screen displayed
function change_time_interval(display)
{
    // intro
    if(display == 1)
    {
        loop_display_time_interval = 3000;
    }
    //icts ann 
    if(display == 2)
    {
        ert_to_scroll = (ert_body_scroll_hght - ert_body_hght) + 20;
        // console.log("ert_to_scroll = " + ert_to_scroll);
        let total_seconds = (ert_to_scroll * 50) / 1000;
        // console.log("Total secs = " + total_seconds);
        ert_scroll_step = ert_to_scroll / total_seconds;
        // console.log("ert scroll step = " + ert_scroll_step);

        let ert_time = (ert_to_scroll * 50);
        // console.log("INTERVAL = " + loop_display_time_interval);

        // training
        training_to_scroll = (training_body_scroll_hght - training_body_hght) + 20;
        // console.log("t_to_scroll = " + training_to_scroll);
        let total_seconds_training = (training_to_scroll * 50) / 1000;
        // console.log("t Total secs = " + total_seconds_training);
        training_scroll_step = training_to_scroll / total_seconds_training;
        // console.log("t scroll step = " + training_scroll_step);

        let t_time = (training_to_scroll * 50);
        // console.log("INTERVAL = " + loop_display_time_interval);

        if(ert_time < t_time)
        {
            loop_display_time_interval = t_time + icts_cntdwn + icts_cntdwn;
        }
        else
        {
            loop_display_time_interval = ert_time + icts_cntdwn + icts_cntdwn;
        }

        if(loop_display_time_interval < 30000)
        {
            loop_display_time_interval = 30000;
        } 
        // loop_display_time_interval = 1000;    
    }
    // hrep ann
    if(display == 3)
    {
        loop_display_time_interval = ((Math.ceil(hrep_ann_count/4)) * 8) * 1000;
        if(loop_display_time_interval < 30000)
        {
            loop_display_time_interval = 30000;
        }
        // console.log("INTERVAL = " + loop_display_time_interval);
        // loop_display_time_interval = 1000;    
    }
    // hrep act
    if(display == 4)
    {
        loop_display_time_interval = ((Math.ceil(hrep_act_card_count/4)*8)*1000);
        if(loop_display_time_interval < 30000)
        {
            loop_display_time_interval = 30000;
        }
        // console.log("INTERVAL = " + loop_display_time_interval); 
        // loop_display_time_interval = 1000;    
    }
    // cmes     
    if(display == 5)
    {
        let cont_height = $('#cmes_display').height();//getting the total height of data's container

        cmes_height = cmes.scrollHeight; // getting the total height of element that needs to be scr

        cmes_to_scroll = cmes_height - cont_height; //subtracting the already visible data to total scroll height
        
        total_seconds = (cmes_to_scroll * 50) / 1000; // compute for total seconds need to complete scrolling up

        scroll_step = (cmes_to_scroll / total_seconds);//scroll step need to finish scrolling along with the total time
            // console.log("scroll step = " + scroll_step);
            // console.log("ContH = " + cont_height);
            // console.log("CmesH = " + cmes_height);
            // console.log("ContH-CmesH = " + cmes_to_scroll);
        //multiplying the cmes to scroll(the not visible data height) by 50 milliseconds and adding the countdown plus additional 3 seconds 
        loop_display_time_interval = (cmes_to_scroll * 50) + cntdwn + 3000;
        if(loop_display_time_interval < 30000)
        {
            loop_display_time_interval = 30000 - cntdwn;
        }
        // console.log("INTERVAL = " + loop_display_time_interval);
        // loop_display_time_interval = 1000;    
    }
    // bday
    if(display == 6)
    {
        loop_display_time_interval = ((Math.ceil(bday_card_count/4)) * 4) * 1000;
        if(loop_display_time_interval < 20000 && bday_card_count > 0)
        {
            loop_display_time_interval = 20000;
        }
        else
        {
            loop_display_time_interval = 0;
        }
        // loop_display_time_interval = 1000;    
        // console.log("INTERVAL = " + loop_display_time_interval);
    }
    // quote
    else if(display == 7)
    {
        loop_display_time_interval = 10000;       
        // loop_display_time_interval = 1000;   
        // console.log("INTERVAL = " + loop_display_time_interval);
    }
}
