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

if(quote == "" || author == "")
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
    else if(quote == "" || author == "")
    {
        $('.edit_quote_msg').html("Fill in the blank(s)").fadeIn(1000).fadeOut(5000);     
 }
}