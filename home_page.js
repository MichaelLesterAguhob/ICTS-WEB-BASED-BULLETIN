$(document).ready(function()
{
$('#save_bday').on('click', function()
{
    save_bday();
})
$('.add_quote').on('click', function()
{
    $("#quote_input").focus();
})
$('.add_bday').on('click', function()
{
    $("#name").focus();
})

$('#name').keydown(function(event){
    if(event.keyCode == 13) {
        event.preventDefault();
        return true;
    }
    });    

$('#delete_bday').css('display','none');    
$('#delete_quote').css('display','none');    

});

//FOR IMAGE PREVIEW ONCE SELECTED
function readURL(input)
{
if(input.files && input.files[0])
{
    var reader = new FileReader();
    reader.onload = function(e)
    {
        $("#image_preview").attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
}
}

//FOR IMAGE PREVIEW ONCE EDIT BUTTON IS CLICKED
function readEditURL(input)
{
if(input.files && input.files[0])
{
    var reader = new FileReader();
    reader.onload = function(e)
    {
        $('#image_changes').val("image_changed");
        $("#edit_image_preview").attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
}
}

// ==========================BIRTHDAY TAB FUNCTIONS =========================

// FUNCTION FOR ADDING BIRTHDATE
function save_bday()
{   
let name = $('#name').val();
let bdate = $('#bdate').val();
let bday_image = $('#bday_image').val();

$("form").submit(function()
{
    $.post($(this).attr("action"), $(this).serialize());
    return false;
});

if(name == "" && bdate == "" && bday_image == "")
{
alert("Fill in all fields!");   
}
else
{
    $('#save_bday').attr('disabled', true) 
    let add_bday_form = $('#add_bday_form')[0];
    let formData = new FormData(add_bday_form);
    $.ajax( 
    {
    type:'post',
    url:'backend/birthday_tab/add_bday.php',
    data:formData,
    contentType: false,
    processData: false,
    success: function(data)
    {
        $('.add_bday_form_msg').html(data).fadeIn(1000).fadeOut(5000);
        $('#add_bday_form').trigger('reset');
        $('#image_preview').attr('src','img/default.png');
        load_bday();
        setTimeout(function() { 
            $('#save_bday').attr('disabled', false);
        }, 2000);
    }
})
}
}

// FUNCTION FOR EDITING BIRTHDAY DETAILS
let bday_id = 0;
$(document).on('click','.edit_bday_btn', function()
{
    bday_id = $(this).attr('data-id')
    $('#bday_id').val(bday_id);
    edit_bday(bday_id);
})

function edit_bday(id_to_edit)
{
    $.ajax(
        {
            url:'backend/birthday_tab/load_to_edit_bday.php',
            type:'post',
            data:{id_to_edit:id_to_edit},
            success: function(data)
            {   
                data = $.parseJSON(data);
                if(data.status == 'success')
                {
                    $('#edit_image_preview').attr('src','backend/birthday_tab/bday_images/'+data.image);
                    $('#edit_name').val(data.name);
                    $('#edit_bdate').val(data.date);
                    $('#edit_old_image').val(data.image);
                    $('#edit_bday_modal').modal('toggle');
                    $('#edit_name').focus();
                }
                else if(data.status == 'exception')
                {
                    $('.sys_modal_title').css('color','red');
                    $('.sys_modal_title').html("Exception");
                    $('.sys_mod_msg').html(data.errmsg);
                    $('#sys_mod').modal('toggle');
                    $('#edit_name').focus();
                }
                else if(data.status == 'failed')
                {
                    $('.sys_modal_title').css('color','red');
                    $('.sys_modal_title').html(data.html);
                    $('.sys_mod_msg').html(data.msg);
                    $('#sys_mod').modal('toggle');   
                    $('#edit_name').focus();
                }
            }
        })
}

// FUNCTION TO UPDATE EDITED BDAY DETAILS
let edited_name = "";
let edited_bdate = "";
let edited_image = "";
let edit_old_image = "";
let image_changes = "";
$(document).on('click','#Update_edited_bday',function()
{   
    edited_name = $('#edit_name').val();
    edited_bdate = $('#edit_bdate').val();
    edited_image = $('#edit_bday_image').val();

    if(edited_name != "" && edited_bdate != "")
    {
        update_details();
    }
})

function update_details()
{   
    $("form").submit(function()
    {
        $.post($(this).attr("action"), $(this).serialize());
        return false;
    });
    let edit_bday_form = $('#edit_bday_form')[0];
    let formData = new FormData(edit_bday_form);

    $.ajax(
        {
            url:'backend/birthday_tab/update_bday.php',
            type:'post',
            data:formData,
            contentType: false,
            processData: false,
            success:function(data)
            {
               data = $.parseJSON(data);
               if(data.status == 'success')
                {
                    $('#edit_bday_modal').modal('toggle');
                    load_bday();
                    $("#bday_tab_msg").css('font-size', '15px');
                    $("#bday_tab_msg").css('color', 'blue');
                    $('#bday_tab_msg').html(data.html).fadeIn(1000).fadeOut(5000);
                    $('#edit_bday_form').trigger('reset');
                }
                else if(data.status == 'exception')
                {
                    $('.sys_modal_title').css('color','red');
                    $('.sys_modal_title').html("Exception");
                    $('.sys_mod_msg').html(data.errmsg);
                    $('#sys_mod').modal('toggle');
                    $('#edit_name').focus();
                }
                else if(data.status == 'failed')
                {
                    $('.sys_modal_title').css('color','red');
                    $('.sys_modal_title').html(data.html);
                    $('.sys_mod_msg').html(data.msg);
                    $('#sys_mod').modal('toggle');   
                    $('#edit_name').focus();
                }         
            }

        })
}


// FUNCTION FOR LOADING BIRTHDAYS
function load_bday()
{
$.ajax(
    {
        url:'backend/birthday_tab/load_bday.php',
        method:'post',
        success: function(data)
        {
            data = $.parseJSON(data);
            if(data.status == 'success')
            {
                $('#bday_data').html(data.html);
                $('#bday_data').css('color','inherit');
                $('#bday_data').css('font-size','unset');
            }
            else if(data.status == 'no_data')
            {
                $('#bday_data').css('color','red');
                $('#bday_data').css('font-size','25px');
                $('#bday_data').html(data.html);
            }
            else if(data.status == 'failed')
            {
                $('.sys_modal_title').css('color','red');
                $('.sys_modal_title').html(data.html);
                $('.sys_mod_msg').html(data.msg);
                $('#sys_mod').modal('toggle');   
            }
        }
    })
}
load_bday();

// FUNCTION FOR DELETING BIRTHDAY RECORD
let to_delete_bday = 0;
$(document).on('click','.delete_bday_btn',function()
{
    $('#delete_bday').css('display','unset');    
    $('#delete_quote').css('display','none');
    to_delete_bday = $(this).attr('data-id');
    $(".confirmation_modal_title").html("Are you sure you want to DELETE this?")
    $(".confirmation_modal_title").css("color","red")
    $("#confirmation_modal").modal('toggle');
})
function delete_bday()
{
$.ajax(
    {
        url:'backend/birthday_tab/delete_bday.php',
        type:'post',
        data:{to_delete_bday:to_delete_bday},
        success: function(data)
        {
            $("#bday_tab_msg").css('font-size', '15px');
            $("#bday_tab_msg").css('color', 'red');
            $("#bday_tab_msg").html(" " + data).fadeIn(1000).fadeOut(5000);
            load_bday();
            $("#confirmation_modal").modal('toggle');
        }
    })
}

// FUNCTION FOR ADDING QUOTE
$(document).on('click', '#save_quote', function()
{
save_quote();
})

function save_quote()
{
let quote = $("#quote_input").val();
let author = $("#author").val();

if(quote == "" && author == "")
{   
    alert("Please fill in the blank(s)")
}
else
{
    $.ajax(
        {
            url:'backend/quote_tab/add_quote.php',
            type:'post',
            data:{quote:quote, author:author},
            success: function(data)
            {
                data = $.parseJSON(data); 
                if(data.status == 'success')
                {
                    $('.add_quote_msg').html(data.html).fadeIn(1000).fadeOut(5000);
                    $('#quote_input').val("");
                    $('#author').val("");
                }
                else if(data.status == 'failed_add')
                {
                    $('.add_quote_msg').html(data.html).fadeIn(1000).fadeOut(5000);
                    $('#quote_input').val("");
                    $('#author').val("");
                }
                else if(data.status == 'exception')
                {
                    $('#quote_modal').modal('toggle'); 
                    $('.sys_modal_title').css('color','red');
                    $('.sys_modal_title').html("Exception");
                    $('.sys_mod_msg').html(data.ex_msg);
                    $('#sys_mod').modal('toggle'); 
                }
                else if(data.status == 'failed')
                {
                    $('.sys_modal_title').css('color','red');
                    $('.sys_modal_title').html(data.html);
                    $('.sys_mod_msg').html(data.msg);
                    $('#sys_mod').modal('toggle');   
                }
                load_quote();
            }
        })
}
}

// FUNCTION FOR LOADING DATA FROM QUOTE TABLE IN DATABASE
function load_quote()
{
$.ajax(
    {
        url:'backend/quote_tab/load_quote.php',
        type:'post',
        success: function(data)
        {
            data = $.parseJSON(data);
            if(data.status == 'success')
            {
                $('#quote_data').css('color','inherit');
                $('#quote_data').css('font-size','unset');
                $('#quote_data').html(data.html);
            }
            else if(data.status == 'no_data')
            {
                $('#quote_data').css('color','red');
                $('#quote_data').css('font-size','25px');
                $('#quote_data').html(data.msg);
            }
            else if(data.status == 'failed')
            {
                $('.sys_modal_title').css('color','red');
                $('.sys_modal_title').html(data.html);
                $('.sys_mod_msg').html(data.msg);
                $('#sys_mod').modal('toggle');   
            }
        }
    })
}
load_quote();

// FUNCTION FOR DELETING QUOTE
let to_delete_quote = 0;
$(document).on('click','.delete_quote_btn',function()
{
    to_delete_quote = $(this).attr('data-id');
    $('#delete_bday').css('display','none');    
    $('#delete_quote').css('display','unset');
    $(".confirmation_modal_title").html("Are you sure you want to DELETE this?")
    $(".confirmation_modal_title").css("color","red")
    $("#confirmation_modal").modal('toggle');
})
function delete_quote()
{
$.ajax(
    {
        url:'backend/quote_tab/delete_quote.php',
        type:'post',
        data:{to_delete_quote:to_delete_quote},
        success: function(data)
        {
            $("#confirmation_modal").modal('toggle');
            $("#quote_tab_msg").css('font-size', '15px');
            $("#quote_tab_msg").css('color', 'red');
            $("#quote_tab_msg").html(" " + data).fadeIn(1000).fadeOut(5000);
            load_quote();
        }
    })
}

// EDIT QUOTES
let to_edit_quote = 0;
$(document).on('click', '.edit_quote_btn', function()
{
    to_edit_quote = $(this).attr('data-id');
    $("#edit_quote_modal").modal('toggle');
    load_to_edit_quote();
})

function load_to_edit_quote()
{
    $.ajax(
        {

            url:'backend/quote_tab/load_to_edit_quote.php',
            type:'post',
            data:{to_edit_quote:to_edit_quote},
            success: function(data)
            {
                data = $.parseJSON(data);
                if(data.status == 'success')
                {
                    $('#edited_quote_input').val(data.quote);
                    $('#edited_author_input').val(data.author);
                }
            }
        })
}

// UPDATE QUOTE
function update_quote()
{
    let quote = $('#edited_quote_input').val();
    let author = $('#edited_author_input').val();
    if(quote != "" && author != "")
    {
        $.ajax(
            {
                url:'backend/quote_tab/update_quote.php',
                type:'post',
                data:{to_edit_quote:to_edit_quote, quote:quote, author:author},
                success: function(data)
                {
                    data = $.parseJSON(data);
                    if(data.status == 'success')
                    {
                        $("#quote_tab_msg").css('font-size', '15px');
                        $("#quote_tab_msg").css('color', 'blue');
                        $("#edit_quote_modal").modal('toggle');
                        $("#quote_tab_msg").html(" " + data.html).fadeIn(1000).fadeOut(5000);
                        $('#edited_quote_input').val("");
                        $('#edited_author_input').val("");
                        load_quote();
                    }

                    
                }
            })
    }
    else if(quote == "" && author == "")
    {
        $('.edit_quote_msg').html("Fill in the blank(s)").fadeIn(1000).fadeOut(5000);     
 }
}


$(document).on('click', '.btn_activate', function()
{
    let quote_id = $(this).attr('data-id');
    $.ajax(
        {
            url:'backend/quote_tab/activate_quote.php',
            type:'post',
            data:{quote_id:quote_id},
            success: function(data)
            {
                load_quote();
            }
        })
})
// fb yes or no checkbox
$(document).on('click','#fb_yes', function()
{
    $('#fb_yes_no').val("YES");
})
$(document).on('click','#fb_no', function()
{
    $('#fb_yes_no').val("NO");
})
// ppab yes or no 
$(document).on('click','#ppab_yes', function()
{
    $('#ppab_yes_no').val("YES");
})
$(document).on('click','#ppab_no', function()
{
    $('#ppab_yes_no').val("NO");
})

// SAVING CMES data
$(document).on('click','#save_cmes',function()
{   
    let office = $('#office').val();
    let host = $('#host').val();
    let time = $('#time').val();
    let date = $('#date').val();
    let remarks = $('#remarks').val();

    if(office != "" && host != "" && time != "" && remarks != "" && date != "")
    {
        let cmes_input_data = $('#add_cmes_form')[0];
        let formData = new FormData(cmes_input_data);
        $.ajax(
            {
                url:'backend/cmes_tab/save_cmes.php',
                type:'post',
                data:formData,
                contentType:false,
                processData:false,
                success: function(data)
                {
                    $('.add_cmes_form_msg').html(data).fadeIn(1000).fadeOut(4000);
                    $('#add_cmes_form').trigger('reset');
                    load_cmes();
                }
            })
    }
    else
    {
        alert("Fill in the blanks")
    }
})

// loading cmes data
function load_cmes()
{
    $.ajax(
        {
            url:'backend/cmes_tab/load_cmes.php',
            type:'post',
            success: function(data)
            {
                $('#cmes_data').html(data);
            }
        })
}
load_cmes();

// Editing committee meeting and event schedule's content
let cmes_id='';
$(document).on('click','.cmes_edit', function()
{
    cmes_id = $(this).attr('data-id');
    $('#cmes_id').val(cmes_id);
    $.ajax(
        {
            url:'backend/cmes_tab/load_to_edit_cmes.php',
            type:'post',
            data:{cmes_id:cmes_id},
            success:function(data)
            {
                data = $.parseJSON(data);
                if(data.status == 'success')
                {
                    $('#edit_office').val(data.office);
                    $('#edit_host').val(data.host);
                    $('#edit_time').val(data.time);
                    $('#edit_date').val(data.date);
                    $('#edit_remarks').val(data.remarks);

                    // let fb = 
                    // let ppab = $('#edit_ppab_yes_no').val();
                    if(data.fb == "YES")
                    {
                        $('#edit_fb_yes').attr('checked',"true");
                        $('#edit_fb_yes_no').val("YES");
                    }
                    else
                    {
                        $('#edit_fb_no').attr('checked',"true");
                        $('#edit_fb_yes_no').val("NO");
                    }
                    if(data.ppab == "YES")
                    {
                        $('#edit_ppab_yes').attr('checked',"true");
                        $('#edit_ppab_yes_no').val("YES");
                    }
                    else
                    {
                        $('#edit_ppab_no').attr('checked',"true");
                        $('#edit_ppab_yes_no').val("NO");
                    }

                    $('#cmes_edit_modal').modal('toggle');
                    // alert(data.time)
                }
                else
                {
                    alert(data.msg);
                }
            }
        })
    
})

// save edited
$(document).on('click','#save_edited_cmes',function()
{
    let edited_cmes_form = $('#edit_cmes_form')[0];
    let formData = new FormData(edited_cmes_form);
    
    $.ajax(
        {
            url:'backend/cmes_tab/save_edited_cmes.php',
            type:'post',
            data:formData,
            contentType: false,
            processData: false,
            success: function(data)
            {
                $('#cmes_edit_modal').modal('toggle');
                load_cmes();
                $('.cmes_msg').css('font-size','16px');
                $('.cmes_msg').css('color','blue');
                $('.cmes_msg').html(data).fadeIn(1000).fadeOut(3000);
            }
        })
})

// delete cmes 
$(document).on('click','.cmes_del', function()
{
    cmes_id = $(this).attr('data-id');
    $('.cmes_confirm_modal_title').css('color','red');
    $('.cmes_confirm_modal_title').html('Please confirm to delete');
    $('#cmes_confirm_modal').modal('toggle');
})

$(document).on('click','#delete_cmes',function()
{   
    $.ajax(
        {
            url:'backend/cmes_tab/delete_cmes.php',
            type:'post',
            data:{cmes_id:cmes_id},
            success: function(data)
            {
                $('#cmes_confirm_modal').modal('toggle');
                load_cmes();
                $('.cmes_msg').css('font-size','16px');
                $('.cmes_msg').css('color','red');
                $('.cmes_msg').html(data).fadeIn(1000).fadeOut(3000);
            }
        })
})

// HREP ACT
//FOR IMAGE PREVIEW ONCE SELECTED 
function readURLHrepAct(input)
{
    if(input.files && input.files[0])
    {
        var reader = new FileReader();
        reader.onload = function(e)
        {
            $("#hrep_act_img_prev").attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
//FOR IMAGE PREVIEW ONCE SELECTED (EDITING)
function readURLEditHrepAct(input)
{
    if(input.files && input.files[0])
    {
        var reader = new FileReader();
        reader.onload = function(e)
        {
            $("#edit_hrep_act_img_prev").attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// Adding Hrep Act
$(document).on('click','#save_hrep_act',function()
{
    let img = $('#upload_hrep_act_img').val();

    if(img != "")
    {
        let add_hrep_act = $('#add_hrep_act_form')[0];
        let formData = new FormData(add_hrep_act);
    
        $.ajax(
            {
                url:'backend/hrep_act_tab/add_hrep_act.php',
                type:'post',
                data: formData,
                contentType: false,
                processData: false,
                success:function(data)
                {
                    $('.add_hrep_act_form_msg').html(data).fadeIn(1000).fadeOut(3000);
                    $('#add_hrep_act_form').trigger('reset');
                    $('#hrep_act_img_prev').attr('src','img/default2.png');
                    load_hrep_act();
                }
            })
    }
})

// Loading Hrep Act
load_hrep_act();
function load_hrep_act()
{
    $.ajax(
        {
            url:'backend/hrep_act_tab/load_hrep_act.php',
            type:'post',
            success: function(data)
            {
               $('#hrep_act_data').html(data);
            }
        })
}

// EDITING and UPDATING HREP ACTIVITIES
$(document).on('click', '.hrept_act_edit', function()
{
    $('#edit_hrep_act_id').val($(this).attr('data-id'));
    $('#edit_hrep_act_img_old').val($(this).attr('data-img'));
    let hrep_act_img = $(this).attr('data-img');
    $('#edit_hrep_act_img_prev').attr('src','backend/hrep_act_tab/img/'+hrep_act_img);
    $('#edit_hrep_act_modal').modal('toggle');
})

// update hrep act
$(document).on('click','#update_hrep_act', function()
{
    let img = $('#edit_hrep_act_img').val();

    if(img != "")
    {
    let edited_hrep_act = $('#edit_hrep_act_form')[0];
    let formData = new FormData(edited_hrep_act);

    $.ajax(
        {
            url:'backend/hrep_act_tab/update_hrep_act.php',
            type: 'post',
            data:formData,
            contentType: false,
            processData: false,
            success: function(data)
            {
                $('#edit_hrep_act_form').trigger('reset');
                $('#edit_hrep_act_modal').modal('toggle');
                $('.hrep_act_msg').css('font-size','16px');
                $('.hrep_act_msg').css('color','blue');
                $('.hrep_act_msg').html(data).fadeIn(1000).fadeOut(3000);
                load_hrep_act();
            }        
        })
    }
})

// del_hrep_act_modal
let del_hrep_act_id = 0;
$(document).on('click','.hrept_act_delete', function()
{
    del_hrep_act_id = $(this).attr('data-id');
    $('#del_hrep_act_modal').modal('toggle');
    $('.hrep_act_del_msg').css('color','red');
})

function del_hrep_act()
{
    $.ajax(
        {
            url:'backend/hrep_act_tab/delete_hrep_act.php',
            type:'post',
            data:{del_hrep_act_id:del_hrep_act_id},
            success: function(data)
            {
                $('.hrep_act_msg').css('font-size','16px');
                $('.hrep_act_msg').css('color','red');
                $('.hrep_act_msg').html(data).fadeIn(1000).fadeOut(3000);
                $('#del_hrep_act_modal').modal('toggle');
                load_hrep_act();
            }
        })
}

// icts_add_ann_modal
$(document).on('click','.add_icts_ann',function() 
{
    $('#icts_add_ann_modal').modal('toggle');
})

let team_name_num = 1;
$(document).on('click','.add_team_list',function()
{
    team_name_num ++;
    $('#team_num').val(team_name_num);
    $('#team_name_list').append('<tr style="line-height: 50px;"><th class="text-center">Team Name: </th><th class="text-center"><input type="text" name="team_name_txt'+team_name_num+'" class="form-control icts_ann_input"> </th></tr><tr><th class="text-center text-secondary">Names: </th><th class="text-center"><textarea name="name_list_txt'+team_name_num+'" class="form-control icts_ann_input" rows="3"></textarea></th></tr>');
})

function selected_cont_type(){
    let cont_type = $('#cont_type :selected').text();
    $('#cont_type_selected').val(cont_type);
}

// saving ICTS Announcement
$(document).on('click', '#save_icts_ann', function()
{
    let icts_add_ann = $('#icts_add_ann')[0];
    let formData = new FormData(icts_add_ann);

    $.ajax(
        {
            url:'backend/icts_announcement/add_icts_ann.php',
            method:'post',
            data:formData,
            contentType: false,
            processData: false,
            success: function(data)
            {
                $('#add_ann_msg').html(data).fadeIn(1000).fadeOut(3000);
                $('#icts_add_ann').trigger('reset');
                team_name_num = 1;
                $('#team_num').val(team_name_num);
                $('#team_name_list').html('<tr><td colspan="2" class="text-left"><button type="button" class="btn btn-sm btn-success add_team_list">Add New Team </button></td></tr><tr style="line-height: 50px;"><th class="text-center">Team Name: </th><th class="text-center"><input type="text" name="team_name_txt'+team_name_num+'" class="form-control icts_ann_input"> </th></tr><tr><th class="text-center text-secondary">Names: </th><th class="text-center"><textarea name="name_list_txt'+team_name_num+'" class="form-control icts_ann_input" rows="3"></textarea></th></tr>');
            }
        })  
   
})


