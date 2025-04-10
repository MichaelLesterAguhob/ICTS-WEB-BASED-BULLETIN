$(document).ready(function () {
  $("#save_bday").on("click", function () {
    save_bday();
  });
  $(".add_quote").on("click", function () {
    $("#quote_input").focus();
  });
  $(".add_bday").on("click", function () {
    $("#name").focus();
  });

  $("#name").keydown(function (event) {
    if (event.keyCode == 13) {
      event.preventDefault();
      return true;
    }
  });

  $("#delete_bday").css("display", "none");
  $("#delete_quote").css("display", "none");
});

//FOR IMAGE PREVIEW ONCE SELECTED
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#image_preview").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

//FOR IMAGE PREVIEW ONCE EDIT BUTTON IS CLICKED
function readEditURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#image_changes").val("image_changed");
      $("#edit_image_preview").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

// ==========================BIRTHDAY TAB FUNCTIONS =========================

// FUNCTION FOR ADDING BIRTHDAy
function save_bday() {
  let name = $("#name").val();
  let bdate = $("#bdate").val();
  let bday_image = $("#bday_image").val();

  $("form").submit(function () {
    $.post($(this).attr("action"), $(this).serialize());
    return false;
  });

  if (name == "" && bdate == "" && bday_image == "") {
    alert("Fill in all fields!");
  } else {
    $("#save_bday").attr("disabled", true);
    let add_bday_form = $("#add_bday_form")[0];
    let formData = new FormData(add_bday_form);
    $.ajax({
      type: "post",
      url: "../../../actions/birthday_tab/add_bday.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function (data) {
        $(".add_bday_form_msg").html(data).fadeIn(1000).fadeOut(5000);
        $("#add_bday_form").trigger("reset");
        $("#image_preview").attr("src", "../public/assets/img/default.png");
        load_bday();
        setTimeout(function () {
          $("#save_bday").attr("disabled", false);
        }, 2000);
      },
    });
  }
}

// FUNCTION FOR EDITING BIRTHDAY DETAILS
let bday_id = 0;
$(document).on("click", ".edit_bday_btn", function () {
  bday_id = $(this).attr("data-id");
  $("#bday_id").val(bday_id);
  edit_bday(bday_id);
});

function edit_bday(id_to_edit) {
  $.ajax({
    url: "../../../actions/birthday_tab/load_to_edit_bday.php",
    type: "post",
    data: { id_to_edit: id_to_edit },
    success: function (data) {
      data = $.parseJSON(data);
      if (data.status == "success") {
        $("#edit_image_preview").attr(
          "src",
          "../../storage/uploads/bday_images/" + data.image
        );
        $("#edit_name").val(data.name);
        $("#edit_bdate").val(data.date);
        $("#edit_old_image").val(data.image);
        $("#edit_bday_modal").modal("toggle");
        $("#edit_name").focus();
      } else if (data.status == "exception") {
        $(".sys_modal_title").css("color", "red");
        $(".sys_modal_title").html("Exception");
        $(".sys_mod_msg").html(data.errmsg);
        $("#sys_mod").modal("toggle");
        $("#edit_name").focus();
      } else if (data.status == "failed") {
        $(".sys_modal_title").css("color", "red");
        $(".sys_modal_title").html(data.html);
        $(".sys_mod_msg").html(data.msg);
        $("#sys_mod").modal("toggle");
        $("#edit_name").focus();
      }
    },
  });
}

// FUNCTION TO UPDATE EDITED BDAY DETAILS
let edited_name = "";
let edited_bdate = "";
let edited_image = "";
let edit_old_image = "";
let image_changes = "";
$(document).on("click", "#Update_edited_bday", function () {
  edited_name = $("#edit_name").val();
  edited_bdate = $("#edit_bdate").val();
  edited_image = $("#edit_bday_image").val();

  if (edited_name != "" && edited_bdate != "") {
    update_details();
  }
});

function update_details() {
  $("form").submit(function () {
    $.post($(this).attr("action"), $(this).serialize());
    return false;
  });
  let edit_bday_form = $("#edit_bday_form")[0];
  let formData = new FormData(edit_bday_form);

  $.ajax({
    url: "../../../actions/birthday_tab/update_bday.php",
    type: "post",
    data: formData,
    contentType: false,
    processData: false,
    success: function (data) {
      data = $.parseJSON(data);
      if (data.status == "success") {
        $("#edit_bday_modal").modal("toggle");
        load_bday();
        $("#bday_tab_msg").css("font-size", "15px");
        $("#bday_tab_msg").css("color", "blue");
        $("#bday_tab_msg").html(data.html).fadeIn(1000).fadeOut(5000);
        $("#edit_bday_form").trigger("reset");
      } else if (data.status == "exception") {
        $(".sys_modal_title").css("color", "red");
        $(".sys_modal_title").html("Exception");
        $(".sys_mod_msg").html(data.errmsg);
        $("#sys_mod").modal("toggle");
        $("#edit_name").focus();
      } else if (data.status == "failed") {
        $(".sys_modal_title").css("color", "red");
        $(".sys_modal_title").html(data.html);
        $(".sys_mod_msg").html(data.msg);
        $("#sys_mod").modal("toggle");
        $("#edit_name").focus();
      }
    },
  });
}

// FUNCTION FOR LOADING BIRTHDAYS
function load_bday() {
  $.ajax({
    url: "../../../actions/birthday_tab/load_bday.php",
    method: "post",
    success: function (data) {
      data = $.parseJSON(data);
      if (data.status == "success") {
        $("#bday_data").html(data.html);
        $("#bday_data").css("color", "inherit");
        $("#bday_data").css("font-size", "unset");
      } else if (data.status == "no_data") {
        $("#bday_data").css("color", "red");
        $("#bday_data").css("font-size", "25px");
        $("#bday_data").html(data.html);
      } else if (data.status == "failed") {
        $(".sys_modal_title").css("color", "red");
        $(".sys_modal_title").html(data.html);
        $(".sys_mod_msg").html(data.msg);
        $("#sys_mod").modal("toggle");
      }
    },
  });
}
load_bday();

// FUNCTION FOR DELETING BIRTHDAY RECORD
let to_delete_bday = 0;
$(document).on("click", ".delete_bday_btn", function () {
  $("#delete_bday").css("display", "unset");
  $("#delete_quote").css("display", "none");
  to_delete_bday = $(this).attr("data-id");
  $(".confirmation_modal_title").html("Are you sure you want to delete?");
  $(".confirmation_modal_title").css("color", "red");
  $("#confirmation_modal").modal("toggle");
});
function delete_bday() {
  $.ajax({
    url: "../../../actions/birthday_tab/delete_bday.php",
    type: "post",
    data: { to_delete_bday: to_delete_bday },
    success: function (data) {
      $("#bday_tab_msg").css("font-size", "15px");
      $("#bday_tab_msg").css("color", "red");
      $("#bday_tab_msg")
        .html(" " + data)
        .fadeIn(1000)
        .fadeOut(5000);
      load_bday();
      $("#confirmation_modal").modal("toggle");
    },
  });
}

// FUNCTION FOR ADDING QUOTE
$(document).on("click", "#save_quote", function () {
  save_quote();
});

function save_quote() {
  let quote = $("#quote_input").val();
  let author = $("#author").val();

  if (quote == "" && author == "") {
    alert("Please fill in the blank(s)");
  } else {
    $.ajax({
      url: "../../../actions/quote_tab/add_quote.php",
      type: "post",
      data: { quote: quote, author: author },
      success: function (data) {
        data = $.parseJSON(data);
        if (data.status == "success") {
          $(".add_quote_msg").html(data.html).fadeIn(1000).fadeOut(5000);
          $("#quote_input").val("");
          $("#author").val("");
        } else if (data.status == "failed_add") {
          $(".add_quote_msg").html(data.html).fadeIn(1000).fadeOut(5000);
          $("#quote_input").val("");
          $("#author").val("");
        } else if (data.status == "exception") {
          $("#quote_modal").modal("toggle");
          $(".sys_modal_title").css("color", "red");
          $(".sys_modal_title").html("Exception");
          $(".sys_mod_msg").html(data.ex_msg);
          $("#sys_mod").modal("toggle");
        } else if (data.status == "failed") {
          $(".sys_modal_title").css("color", "red");
          $(".sys_modal_title").html(data.html);
          $(".sys_mod_msg").html(data.msg);
          $("#sys_mod").modal("toggle");
        }
        load_quote();
      },
    });
  }
}

// FUNCTION FOR LOADING DATA FROM QUOTE TABLE IN DATABASE
function load_quote() {
  $.ajax({
    url: "../../../actions/quote_tab/load_quote.php",
    type: "post",
    success: function (data) {
      data = $.parseJSON(data);
      if (data.status == "success") {
        $("#quote_data").css("color", "inherit");
        $("#quote_data").css("font-size", "unset");
        $("#quote_data").html(data.html);
      } else if (data.status == "no_data") {
        $("#quote_data").css("color", "red");
        $("#quote_data").css("font-size", "25px");
        $("#quote_data").html(data.msg);
      } else if (data.status == "failed") {
        $(".sys_modal_title").css("color", "red");
        $(".sys_modal_title").html(data.html);
        $(".sys_mod_msg").html(data.msg);
        $("#sys_mod").modal("toggle");
      }
    },
  });
}
load_quote();

// FUNCTION FOR DELETING QUOTE
let to_delete_quote = 0;
$(document).on("click", ".delete_quote_btn", function () {
  to_delete_quote = $(this).attr("data-id");
  $("#delete_bday").css("display", "none");
  $("#delete_quote").css("display", "unset");
  $(".confirmation_modal_title").html("Are you sure you want to delete?");
  $(".confirmation_modal_title").css("color", "red");
  $("#confirmation_modal").modal("toggle");
});
function delete_quote() {
  $.ajax({
    url: "../../../actions/quote_tab/delete_quote.php",
    type: "post",
    data: { to_delete_quote: to_delete_quote },
    success: function (data) {
      $("#confirmation_modal").modal("toggle");
      $("#quote_tab_msg").css("font-size", "15px");
      $("#quote_tab_msg").css("color", "red");
      $("#quote_tab_msg")
        .html(" " + data)
        .fadeIn(1000)
        .fadeOut(5000);
      load_quote();
    },
  });
}

// EDIT QUOTES
let to_edit_quote = 0;
$(document).on("click", ".edit_quote_btn", function () {
  to_edit_quote = $(this).attr("data-id");
  $("#edit_quote_modal").modal("toggle");
  load_to_edit_quote();
});

function load_to_edit_quote() {
  $.ajax({
    url: "../../../actions/quote_tab/load_to_edit_quote.php",
    type: "post",
    data: { to_edit_quote: to_edit_quote },
    success: function (data) {
      data = $.parseJSON(data);
      if (data.status == "success") {
        $("#edited_quote_input").val(data.quote);
        $("#edited_author_input").val(data.author);
      }
    },
  });
}

// UPDATE QUOTE
function update_quote() {
  let quote = $("#edited_quote_input").val();
  let author = $("#edited_author_input").val();
  if (quote != "" && author != "") {
    $.ajax({
      url: "../../../actions/quote_tab/update_quote.php",
      type: "post",
      data: { to_edit_quote: to_edit_quote, quote: quote, author: author },
      success: function (data) {
        data = $.parseJSON(data);
        if (data.status == "success") {
          $("#quote_tab_msg").css("font-size", "15px");
          $("#quote_tab_msg").css("color", "blue");
          $("#edit_quote_modal").modal("toggle");
          $("#quote_tab_msg")
            .html(" " + data.html)
            .fadeIn(1000)
            .fadeOut(5000);
          $("#edited_quote_input").val("");
          $("#edited_author_input").val("");
          load_quote();
        }
      },
    });
  } else if (quote == "" && author == "") {
    $(".edit_quote_msg")
      .html("Fill in the blank(s)")
      .fadeIn(1000)
      .fadeOut(5000);
  }
}

$(document).on("click", ".btn_activate", function () {
  let quote_id = $(this).attr("data-id");
  $.ajax({
    url: "../../../actions/quote_tab/activate_quote.php",
    type: "post",
    data: { quote_id: quote_id },
    success: function (data) {
      load_quote();
    },
  });
});
// fb yes or no checkbox
$(document).on("click", "#fb_yes", function () {
  $("#fb_yes_no").val("YES");
});
$(document).on("click", "#fb_no", function () {
  $("#fb_yes_no").val("NO");
});
// ppab yes or no
$(document).on("click", "#ppab_yes", function () {
  $("#ppab_yes_no").val("YES");
});
$(document).on("click", "#ppab_no", function () {
  $("#ppab_yes_no").val("NO");
});

// SAVING CMES data
$(document).on("click", "#save_cmes", function () {
  let office = $("#office").val();
  let host = $("#host").val();
  let time = $("#time").val();
  let date = $("#date").val();
  let remarks = $("#remarks").val();

  if (office != "" && host != "" && time != "" && remarks != "" && date != "") {
    let cmes_input_data = $("#add_cmes_form")[0];
    let formData = new FormData(cmes_input_data);
    $.ajax({
      url: "../../../actions/cmes_tab/save_cmes.php",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function (data) {
        $(".add_cmes_form_msg").html(data).fadeIn(1000).fadeOut(4000);
        $("#add_cmes_form").trigger("reset");
        load_cmes();
      },
    });
  } else {
    alert("Fill in the blanks");
  }
});

// loading cmes data
function load_cmes() {
  $.ajax({
    url: "../../../actions/cmes_tab/load_cmes.php",
    type: "post",
    success: function (data) {
      $("#cmes_data").html(data);
    },
  });
}
load_cmes();

// Editing committee meeting and event schedule's content
let cmes_id = "";
$(document).on("click", ".cmes_edit", function () {
  cmes_id = $(this).attr("data-id");
  $("#cmes_id").val(cmes_id);
  $.ajax({
    url: "../../../actions/cmes_tab/load_to_edit_cmes.php",
    type: "post",
    data: { cmes_id: cmes_id },
    success: function (data) {
      data = $.parseJSON(data);
      if (data.status == "success") {
        $("#edit_office").val(data.office);
        $("#edit_host").val(data.host);
        $("#edit_time").val(data.time);
        $("#edit_date").val(data.date);
        $("#edit_remarks").val(data.remarks);

        // let fb =
        // let ppab = $('#edit_ppab_yes_no').val();
        if (data.fb == "YES") {
          $("#edit_fb_yes").attr("checked", "true");
          $("#edit_fb_yes_no").val("YES");
        } else {
          $("#edit_fb_no").attr("checked", "true");
          $("#edit_fb_yes_no").val("NO");
        }
        if (data.ppab == "YES") {
          $("#edit_ppab_yes").attr("checked", "true");
          $("#edit_ppab_yes_no").val("YES");
        } else {
          $("#edit_ppab_no").attr("checked", "true");
          $("#edit_ppab_yes_no").val("NO");
        }

        $("#cmes_edit_modal").modal("toggle");
        // alert(data.time)
      } else {
        alert(data.msg);
      }
    },
  });
});

// save edited
$(document).on("click", "#save_edited_cmes", function () {
  let edited_cmes_form = $("#edit_cmes_form")[0];
  let formData = new FormData(edited_cmes_form);

  $.ajax({
    url: "../../../actions/cmes_tab/save_edited_cmes.php",
    type: "post",
    data: formData,
    contentType: false,
    processData: false,
    success: function (data) {
      $("#cmes_edit_modal").modal("toggle");
      load_cmes();
      $(".cmes_msg").css("font-size", "16px");
      $(".cmes_msg").css("color", "blue");
      $(".cmes_msg").html(data).fadeIn(1000).fadeOut(3000);
    },
  });
});

// delete cmes
$(document).on("click", ".cmes_del", function () {
  cmes_id = $(this).attr("data-id");
  $(".cmes_confirm_modal_title").css("color", "red");
  $(".cmes_confirm_modal_title").html("Are you sure you want to delete?");
  $("#cmes_confirm_modal").modal("toggle");
});

$(document).on("click", "#delete_cmes", function () {
  $.ajax({
    url: "../../../actions/cmes_tab/delete_cmes.php",
    type: "post",
    data: { cmes_id: cmes_id },
    success: function (data) {
      $("#cmes_confirm_modal").modal("toggle");
      load_cmes();
      $(".cmes_msg").css("font-size", "16px");
      $(".cmes_msg").css("color", "red");
      $(".cmes_msg").html(data).fadeIn(1000).fadeOut(3000);
    },
  });
});

// HREP ACT
//FOR IMAGE PREVIEW ONCE SELECTED
function readURLHrepAct(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#hrep_act_img_prev").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
//FOR IMAGE PREVIEW ONCE SELECTED (EDITING)
function readURLEditHrepAct(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#edit_hrep_act_img_prev").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

// Adding Hrep Act
$(document).on("click", "#save_hrep_act", function () {
  let img = $("#upload_hrep_act_img").val();

  if (img != "") {
    let add_hrep_act = $("#add_hrep_act_form")[0];
    let formData = new FormData(add_hrep_act);

    $.ajax({
      url: "../../../actions/hrep_act_tab/add_hrep_act.php",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function (data) {
        $(".add_hrep_act_form_msg").html(data).fadeIn(1000).fadeOut(3000);
        $("#add_hrep_act_form").trigger("reset");
        $("#hrep_act_img_prev").attr("src", "../public/assets/img/default2.png");
        load_hrep_act();
      },
    });
  }
});

// Loading Hrep Act
load_hrep_act();
function load_hrep_act() {
  $.ajax({
    url: "../../../actions/hrep_act_tab/load_hrep_act.php",
    type: "post",
    success: function (data) {
      $("#hrep_act_data").html(data);
    },
  });
}

// EDITING and UPDATING HREP ACTIVITIES
$(document).on("click", ".hrept_act_edit", function () {
  $("#edit_hrep_act_id").val($(this).attr("data-id"));
  $("#edit_hrep_act_img_old").val($(this).attr("data-img"));
  let hrep_act_img = $(this).attr("data-img");
  $("#edit_hrep_act_img_prev").attr(
    "src",
    "../storage/uploads/hrep_act_img/" + hrep_act_img
  );
  $("#edit_hrep_act_modal").modal("toggle");
});

// update hrep act
$(document).on("click", "#update_hrep_act", function () {
  let img = $("#edit_hrep_act_img").val();

  if (img != "") {
    let edited_hrep_act = $("#edit_hrep_act_form")[0];
    let formData = new FormData(edited_hrep_act);

    $.ajax({
      url: "../../../actions/hrep_act_tab/update_hrep_act.php",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#edit_hrep_act_form").trigger("reset");
        $("#edit_hrep_act_modal").modal("toggle");
        $(".hrep_act_msg").css("font-size", "16px");
        $(".hrep_act_msg").css("color", "blue");
        $(".hrep_act_msg").html(data).fadeIn(1000).fadeOut(3000);
        load_hrep_act();
      },
    });
  }
});

// del_hrep_act_modal
let del_hrep_act_id = 0;
$(document).on("click", ".hrept_act_delete", function () {
  del_hrep_act_id = $(this).attr("data-id");
  $("#del_hrep_act_modal").modal("toggle");
  $(".hrep_act_del_msg").css("color", "red");
});

function del_hrep_act() {
  $.ajax({
    url: "../../../actions/hrep_act_tab/delete_hrep_act.php",
    type: "post",
    data: { del_hrep_act_id: del_hrep_act_id },
    success: function (data) {
      $(".hrep_act_msg").css("font-size", "16px");
      $(".hrep_act_msg").css("color", "red");
      $(".hrep_act_msg").html(data).fadeIn(1000).fadeOut(3000);
      $("#del_hrep_act_modal").modal("toggle");
      load_hrep_act();
    },
  });
}

// icts_add_ann_modal
$(document).on("click", ".add_icts_ann", function () {
  $("#icts_add_ann_modal").modal("toggle");
});

let team_name_num = 1;
$(document).on("click", ".add_team_list", function () {
  team_name_num++;
  $("#team_num").val(team_name_num);
  $("#team_name_list").append(
    '<tr style="line-height: 50px; border-top:1px solid gray;""><th class="text-left">Team Name: </th><th class="text-center"><input type="text" name="team_name_txt' +
      team_name_num +
      '" class="form-control icts_ann_input"> </th></tr><tr><th class="text-left text-secondary">Members: </th><th class="text-center"><textarea name="name_list_txt' +
      team_name_num +
      '" class="form-control icts_ann_input" rows="3"></textarea></th></tr>'
  );
});

// for switching
let cont_type = "Emergency Response Team";
function selected_cont_type() {
  cont_type = $("#cont_type :selected").text();
  $("#cont_type_selected").val(cont_type);

  if (cont_type == "Emergency Response Team") {
    $("#team_name_list").css("display", "contents");
    $("#training").css("display", "none");
    $("#qr_form").css("display", "none");
  } else if (cont_type == "QR/Form") {
    $("#qr_form").css("display", "contents");
    $("#team_name_list").css("display", "none");
    $("#training").css("display", "none");
  } else if (cont_type == "Training") {
    $("#training").css("display", "contents");
    $("#qr_form").css("display", "none");
    $("#team_name_list").css("display", "none");
  }
}
let desc_date = 1;
$(document).on("click", ".add_desc_date", function () {
  desc_date++;
  $("#desc_date_num").val(desc_date);
  $("#training").append(
    '<tr style="border-top:1px solid gray;"><td colspan="2" style="height:15px;"></td></tr><tr><th>Description: </th><td><input type="text" name="training_name' +
      desc_date +
      '" class="form-control"></td></tr><tr><th class="text-left text-secondary">Date: </th><td class="text-left"><input type="date" name="training_date' +
      desc_date +
      '" class="form-control"></td></tr><tr><th class="text-left text-secondary">Time: </th><td class="text-left"><input type="time" name="training_time' +
      desc_date +
      '"class="form-control"></td></tr>'
  );
});

let icts_cont_rec = 0;
let icts_cont_ert = 0;
let icts_cont_qr = 0;
let icts_cont_trn = 0;
// saving ICTS Announcement
$(document).on("click", "#save_icts_ann", function () {
  let icts_add_ann = $("#icts_add_ann")[0];
  let formData = new FormData(icts_add_ann);
  let ann_title_txt = $("#ann_title_txt").val();
  let team_name_txt1 = $("#team_name_txt1").val();
  let name_list_txt1 = $("#name_list_txt1").val();
  let qr_form_img = $("#qr_form_img").val();
  let qr_form_date = $("#qr_form_date").val();

  if (cont_type == "Emergency Response Team") {
    if (icts_cont_ert == 1) {
      alert(
        "Emergency response team already exists. Just edit the existing one or Delete to create new."
      );
    } else if (
      ann_title_txt == "" ||
      team_name_txt1 == "" ||
      name_list_txt1 == ""
    ) {
      alert("No input(s)");
    } else {
      $.ajax({
        url: "../../../actions/icts_announcement/add_icts_ann.php",
        method: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
          $("#add_ann_msg").html(data).fadeIn(1000).fadeOut(3000);
          $("#icts_add_ann").trigger("reset");
          team_name_num = 1;
          $("#team_num").val(team_name_num);
          $("#team_name_list").html(
            '<tr><td colspan="2" class="text-left"><button type="button" class="btn btn-sm btn-success add_team_list">Add New Team </button></td></tr><tr style="line-height: 50px;"><th class="text-center">Team Name: </th><th class="text-center"><input type="text" name="team_name_txt' +
              team_name_num +
              '" class="form-control icts_ann_input"> </th></tr><tr><th class="text-center text-secondary">Names: </th><th class="text-center"><textarea name="name_list_txt' +
              team_name_num +
              '" class="form-control icts_ann_input" rows="3"></textarea></th></tr>'
          );
          load_icts_ann();
        },
      });
    }
  } else if (cont_type == "QR/Form") {
    if (icts_cont_qr == 2) {
      alert(
        "Two Qr Form already exists. Just edit the existing or Delete to create new."
      );
    } else if (ann_title_txt == "" || qr_form_date == "" || qr_form_img == "") {
      alert("No input(s)");
    } else {
      $.ajax({
        url: "../../../actions/icts_announcement/add_icts_ann.php",
        method: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
          $("#add_ann_msg").html(data).fadeIn(1000).fadeOut(3000);
          $("#icts_add_ann").trigger("reset");
          $("#qr_form_img_preview").attr("src", "img/default2.png");
          $("table.icts_ann_table select").val("qr");
          load_icts_ann();
        },
      });
    }
  } else if (cont_type == "Training") {
    if (icts_cont_trn == 1) {
      alert(
        "Training already exists. Just edit the existing one or Delete to create new."
      );
    } else if (
      ann_title_txt != "" &&
      $("#training_name1").val() != "" &&
      $("#training_date1").val() != "" &&
      $("#training_time1").val() != ""
    ) {
      $.ajax({
        url: "../../../actions/icts_announcement/add_icts_ann.php",
        method: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
          desc_date = 1;
          $("#add_ann_msg").html(data).fadeIn(1000).fadeOut(3000);
          $("#icts_add_ann").trigger("reset");
          $("#training").html(
            '<tr><td colspan="2" class="text-left"><button type="button" class="btn btn-sm btn-success add_desc_date">Add New</button></td></tr><input type="hidden" name="desc_date_num" id="desc_date_num" value="1"><tr><th>Description: </th><td><input type="text" name="training_name1" id="training_name" class="form-control"></td></tr><tr><th class="text-left text-secondary">Date: </th><td class="text-left"><input type="date" name="training_date1" class="form-control"></td></tr> <th class="text-left text-secondary">Time: </th><td class="text-left"><input type="time" name="training_time1" id="training_time1" class="form-control"></td>'
          );
          $("table.icts_ann_table select").val("training");
          load_icts_ann();
        },
      });
    } else {
      alert("No Input");
    }
  }
});

//FOR IMAGE PREVIEW
function readQRURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#qr_form_img_preview").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

function load_icts_ann() {
  // icts_annncmnts_data
  $.ajax({
    url: "../../../actions/icts_announcement/load_icts_ann.php",
    method: "post",
    success: function (data) {
      data = $.parseJSON(data);
      if (data.stat == "success") {
        $("#icts_annncmnts_data").html(data.html);

        if (data.ctn1 != 0) {
          icts_cont_ert = 1;
        } else if (data.ctn1 == 0) {
          icts_cont_ert = 0;
        }

        if (data.ctn2 > 1) {
          icts_cont_qr = 2;
        } else if (data.ctn2 == 1) {
          icts_cont_qr = 1;
        }

        if (data.ctn3 != 0) {
          icts_cont_trn = 1;
        } else if (data.ctn3 == 0) {
          icts_cont_trn = 0;
        }
        // alert("num = "+icts_cont_ert + icts_cont_qr + icts_cont_trn );
      }
    },
  });
}
load_icts_ann();

// Pop up modal when edit button is clicked
let cont_type_4_edit = "";
$(document).on("click", ".edit_icts_ann_btn", function () {
  let cont_id = $(this).attr("data-id");
  $("#edit_icts_cont_id").val(cont_id);
  let cont_type = $(this).attr("data-cont-type");
  cont_type_4_edit = $(this).attr("data-cont-type");
  $.ajax({
    url: "../../../actions/icts_announcement/load_to_edit.php",
    method: "post",
    data: { cont_id: cont_id, cont_type: cont_type },
    success: function (data) {
      if (cont_type == "Emergency Response Team") {
        data = $.parseJSON(data);
        if (data.stat == "success") {
          $("#edit_icts_ann_title").val(data.title);
          $("#edit_team_num").val(data.ert_team_num);
          $("#edit_added_new_team").val(data.ert_team_num);
          $("#edit_icts_ann_data").html(data.html);
          $("#icts_edit_ann_modal").modal("toggle");
          $(".new_team_name_edit").css("display", "flex");
          $(".new_training_edit").css("display", "none");
        }
      } else if (cont_type == "QR/Form") {
        data = $.parseJSON(data);
        if (data.stat == "success") {
          $("#edit_icts_ann_title").val(data.title);
          $("#edit_icts_ann_data").html(data.html);
          $("#icts_edit_ann_modal").modal("toggle");
          $(".new_team_name_edit").css("display", "none");
          $(".new_training_edit").css("display", "none");
        }
      } else if (cont_type == "Training") {
        data = $.parseJSON(data);
        if (data.stat == "success") {
          $("#edit_icts_ann_title").val(data.title);
          $("#edit_training_num").val(data.training_num);
          $("#edit_added_new_training").val(data.training_num);
          $("#edit_icts_ann_data").html(data.html);
          $("#icts_edit_ann_modal").modal("toggle");
          $(".new_team_name_edit").css("display", "none");
          $(".new_training_edit").css("display", "flex");
        }
      }
    },
  });
});

// add new team&names | training in edit mode modal
$(document).on("click", ".new_team_name_edit", function () {
  edit_new_team_num = $("#edit_added_new_team").val();
  edit_new_team_num++;
  // holder of newly added team and name in edit mode
  $("#edit_added_new_team").val(edit_new_team_num);

  $("#edit_icts_ann_data").append(
    '<tr style="line-height: 50px; border-top:1px solid gray;""><th class="text-left">Team Name: </th><th class="text-center"><input type="text" name="edit_ert_team_name' +
      edit_new_team_num +
      '" class="form-control icts_ann_input"> </th></tr><tr><th class="text-left text-secondary">Members: </th><th class="text-center"><textarea name="edit_ert_name_list' +
      edit_new_team_num +
      '" class="form-control icts_ann_input" rows="3"></textarea></th></tr>'
  );
});

$(document).on("click", ".new_training_edit", function () {
  edit_new_training_num = $("#edit_added_new_training").val();
  edit_new_training_num++;
  // holder of newly added team and name in edit mode
  $("#edit_added_new_training").val(edit_new_training_num);
  $("#edit_icts_ann_data").append(
    '<tr style="border-top:1px solid gray;"><td colspan="2" style="height:15px;"></td></tr><tr><th>Description: </th><td><input type="text" name="edit_training_desc' +
      edit_new_training_num +
      '" class="form-control"></td></tr><tr><th class="text-left text-secondary">Date: </th><td class="text-left"><input type="date" name="edit_training_date' +
      edit_new_training_num +
      '" class="form-control"></td></tr><tr><th class="text-left text-secondary">Time: </th><td class="text-left"><input type="time" name="edit_training_time' +
      edit_new_training_num +
      '"class="form-control"></td></tr>'
  );
});

// Updating edited icts announcement details
function update_edited_icts_ann() {
  if (cont_type_4_edit == "Emergency Response Team") {
    //use loop to know if all fields have values
    let title = $("#edit_icts_ann_title").val();
    let team_num = $("#edit_team_num").val();
    let counter = 1;
    let is_blank = "no";

    while (counter <= team_num) {
      let team_name = $("#edit_ert_team_name" + counter).val();
      let name_list = $("#edit_ert_name_list" + counter).val();
      if (team_name == "" || name_list == "") {
        is_blank = "yes";
      }
      counter++;
    }
    if (is_blank == "no" && title != "") {
      let edit_icts_details = $("#edit_icts_details")[0];
      let formData = new FormData(edit_icts_details);
      $.ajax({
        url: "../../../actions/icts_announcement/update_ert.php",
        method: "post",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
          $("#edit_icts_details").trigger("reset");
          $("#icts_edit_ann_modal").modal("toggle");
          load_icts_ann();
        },
      });
    } else {
      alert("Fill in all fields");
    }
  } else if (cont_type_4_edit == "QR/Form") {
    if (
      $("#edit_qrform_date").val() != "" &&
      $("#edit_icts_ann_title").val() != ""
    ) {
      let edit_icts_details = $("#edit_icts_details")[0];
      let formData = new FormData(edit_icts_details);
      $.ajax({
        url: "../../../actions/icts_announcement/update_qrform.php",
        method: "post",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
          $("#edit_icts_details").trigger("reset");
          $("#icts_edit_ann_modal").modal("toggle");
          load_icts_ann();
        },
      });
    } else {
      alert("Fill in all fields");
    }
  } else if (cont_type_4_edit == "Training") {
    //use loop to know if all fields have values
    let title = $("#edit_icts_ann_title").val();
    let training_num = $("#edit_training_num").val();
    let counter = 1;
    let is_blank = "no";

    while (counter <= training_num) {
      let edit_training_desc = $("#edit_training_desc" + counter).val();
      let edit_training_date = $("#edit_training_date" + counter).val();
      let edit_training_time = $("#edit_training_time" + counter).val();
      if (
        edit_training_desc == "" ||
        edit_training_date == "" ||
        edit_training_time == ""
      ) {
        is_blank = "yes";
      }
      counter++;
    }
    if (is_blank == "no" && title != "") {
      let edit_icts_details = $("#edit_icts_details")[0];
      let formData = new FormData(edit_icts_details);
      $.ajax({
        url: "../../../actions/icts_announcement/update_training.php",
        method: "post",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
          $("#edit_icts_details").trigger("reset");
          $("#icts_edit_ann_modal").modal("toggle");
          load_icts_ann();
        },
      });
    } else {
      alert("Fill in all fields");
    }
  }
}

//FOR IMAGE PREVIEW
function qr_form_editURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#edit_qrform_img_preview").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

// DELETE CONFIRMATION POP UP
let cont_type2 = "";
let id = 0;
$(document).on("click", ".delete_icts_ann_btn", function () {
  cont_type2 = $(this).attr("data-cont-type");
  id = $(this).attr("data-id");
  $("#icts_del_ann_modal").modal("toggle");
});

// DELETING ANNOUNCEMENT
function delete_icts_ann() {
  $.ajax({
    url: "../../../actions/icts_announcement/delete_icts_ann.php",
    method: "post",
    data: { id: id, cont_type2: cont_type2 },
    success: function (data) {
      $("#icts_del_ann_modal").modal("toggle");
      load_icts_ann();
    },
  });
}

let icts_ann_content_id = 0;
let table_name = "";
//SINGLE DELETION POPUP MODAL
$(document).on("click", ".icts_ann_single_del", function () {
  icts_ann_content_id = $(this).attr("data-id");
  table_name = $(this).attr("data-table-name");
  $("#icts_singdel_ann_modal").modal("toggle");
});
// DELETE SINGLE ICTS ANNOUNCEMENT CONTENT
function delete_icts_ann_single() {
  $.ajax({
    url: "../../../actions/icts_announcement/single_del.php",
    method: "post",
    data: { icts_ann_content_id: icts_ann_content_id, table_name: table_name },
    success: function (data) {
      $("#icts_singdel_ann_modal").modal("toggle");
      load_icts_ann();
    },
  });
}

// HREP ANNOUNCEMENTS
$(document).on("click", ".add_hrep_ann", function () {
  $("#hrep_ann_modal").modal("toggle");
});

// ADDING HREP ANNOUNCEMENTS
function add_hrep_ann() {
  let subj = $("#subject").val();
  let date_release = $("#hrep_ann_date").val();
  let office = $("#hrep_ann_office").val();
  let qr = $("#hrep_ann_image").val();

  if (subj == "" || date_release == "" || office == "" || qr == "") {
    alert("No input. Fill in the blank(s)");
  } else {
    let add_hrep_ann_form = $("#add_hrep_ann_form")[0];
    let formData = new FormData(add_hrep_ann_form);
    $.ajax({
      url: "../../../actions/hrep_ann_tab/add_hrep_ann.php",
      method: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function (data) {
        $(".add_hrep_ann_form_msg").html(data);
        load_hrep_ann();
        $("#add_hrep_ann_form").trigger("reset");
      },
    });
  }
}

let hrep_ann_id = 0;
let hrep_ann_subj = "";
let hrep_ann_date_rel = "";
let hrep_ann_office = "";
let hrep_ann_img = "";

// EDITING AND UPDATING HREP ANNOUNCEMENT
$(document).on("click", ".hrep_ann_edit", function () {
  hrep_ann_id = $(this).attr("data-id");
  hrep_ann_subj = $(this).attr("data-subj");
  hrep_ann_date_rel = $(this).attr("data-date");
  hrep_ann_office = $(this).attr("data-office");
  hrep_ann_img = $(this).attr("data-qr");

  $("#edit_hrep_ann_id").val(hrep_ann_id);
  $("#edit_subject").val(hrep_ann_subj);
  $("#edit_hrep_ann_date").val(hrep_ann_date_rel);
  $("#edit_hrep_ann_office").val(hrep_ann_office);
  $("#edit_hrep_ann_img_holder").val(hrep_ann_img);
  $("#edit_hrep_ann_image_preview").attr(
    "src",
    "../storage/uploads/hrep_ann_img/" + hrep_ann_img
  );

  $("#edit_hrep_ann_modal").modal("toggle");
});

//FOR HREP ANN EDIT IMAGE PREVIEW
function image_change(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#edit_hrep_ann_img_holder").val("new_image");
      $("#edit_hrep_ann_image_preview").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  } else {
    $("#edit_hrep_ann_img_holder").val("old_image");
    $("#edit_hrep_ann_image_preview").attr("src", "img/default2.png");
  }
}

// SAVE EDITED HREP ANNOUNCEMENT
function update_hrep_ann() {
  let subj = $("#edit_subject").val();
  let date_release = $("#edit_hrep_ann_date").val();
  let office = $("#edit_hrep_ann_office").val();
  let qr = $("#edit_hrep_ann_img_holder").val();

  if (subj == "" || date_release == "" || office == "" || qr == "") {
    alert("No input. Fill in the blank(s)");
  } else {
    let edit_hrep_ann_form = $("#edit_hrep_ann_form")[0];
    let formData = new FormData(edit_hrep_ann_form);
    $.ajax({
      url: "../../../actions/hrep_ann_tab/update_hrep_ann.php",
      method: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function (data) {
        // $('.add_hrep_ann_form_msg').html(data);
        load_hrep_ann();
        $("#edit_hrep_ann_form").trigger("reset");
        $("#edit_hrep_ann_modal").modal("toggle");
        // alert(data);
      },
    });
  }
}

// LOAD HREP ANNOUNCEMENTS
function load_hrep_ann() {
  $.ajax({
    url: "../../../actions/hrep_ann_tab/load_hrep_ann.php",
    method: "post",
    success: function (data) {
      $("#hrep_ann_data").html(data);
    },
  });
}
load_hrep_ann();

// DELETING HREP ANNOUNCEMENT
let delete_hrep_ann_id = 0;
$(document).on("click", ".hrep_ann_del", function () {
  delete_hrep_ann_id = $(this).attr("data-id");
  $("#hrep_ann_del_modal").modal("toggle");
  $(".hrep_ann_confirm_modal_title").html("Are you sure you want to delete?");
  $(".hrep_ann_confirm_modal_title").css("color", "red");
});

function delete_hrep_ann() {
  $.ajax({
    url: "../../../actions/hrep_ann_tab/del_hrep_ann.php",
    method: "post",
    data: { delete_hrep_ann_id: delete_hrep_ann_id },
    success: function (data) {
      load_hrep_ann();
      $("#hrep_ann_del_modal").modal("toggle");
      // alert(data);
    },
  });
}
