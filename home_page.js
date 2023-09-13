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
$(window).keydown(function(event){
    if(event.keyCode == 13) {
        event.preventDefault();
        return false;
    }
    });
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

if(name == "" || bdate == "" || bday_image == "")
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

$(document).on('click','.edit_bday_btn', function()
{
    let edit = $(this).attr('data-id')
    edit_bday(edit);
})

// FUNCTION FOR EDITING BIRTHDAY DETAILS
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
                    // $('#edit_bday_image').val('backend/birthday_tab/bday_images/'+data.image);
                    $('#edit_name').val(data.name);
                    $('#edit_bdate').val(data.date);
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
$(document).on('click','#Update_edited_bday',function()
{
    edited_name = $('#edit_name').val();
    edited_bdate = $('#edit_bdate').val();
    edited_image = $('#edit_bday_image').val();

    if(edited_name != "" && edited_bdate != "" && edited_image  != "")
    {
        update_details();
    }
    else
    {
        alert('PLease fill in all fields');
    }
})

function update_details()
{
    $.ajax(
        {
            url:'backend/birthday_tab/update_bday.php',
            type:'post',

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
let quote_owner = $("#quote_owner").val();

if(quote == "" || quote_owner == "")
{   
    alert("Please fill in the blank(s)")
}
else
{
    $.ajax(
        {
            url:'backend/quote_tab/add_quote.php',
            type:'post',
            data:{quote:quote, quote_owner:quote_owner},
            success: function(data)
            {
                data = $.parseJSON(data); 
                if(data.status == 'success')
                {
                    $('.add_quote_msg').html(data.html).fadeIn(1000).fadeOut(5000);
                    $('#quote_input').val("");
                    $('#quote_owner').val("");
                }
                else if(data.status == 'failed_add')
                {
                    $('.add_quote_msg').html(data.html).fadeIn(1000).fadeOut(5000);
                    $('#quote_input').val("");
                    $('#quote_owner').val("");
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