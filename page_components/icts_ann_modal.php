
<!-- add -->
<div class="modal" id="icts_add_ann_modal">
    <div class="modal-dialog icts_add_ann_dialog">
        <div class="modal-content icts_add_ann_content">
            <div class="modal-header">
                <h3 class="modal-title">Add ICTS Announcement</h3>
                <button 
                type="button" 
                class="close" 
                data-bs-dismiss="modal" >
                <i class="fa-regular fa-circle-xmark"></i>
                </button>
            </div>
            <div class="modal-body icts_add_ann_body">
            <p id="add_ann_msg"></p>

                <form id="icts_add_ann" method="post" enctype="multipart/form-data">
                
                    <input type="hidden" name="cont_type_selected" id="cont_type_selected" value="Emergency Response Team" >
                    <input type="hidden" name="team_num" id="team_num" value="1">

                    <table class="icts_ann_table">
                        <thead>
                        <tr>
                            <td><label for="cont_type">Choose Announcement Type: </label></td>
                        <td>
                            <select name="cont_type" id="cont_type" class="form-select mb-3" onchange="selected_cont_type();">
                                <option value="ert">Emergency Response Team</option>
                                <option value="qr">QR/Form</option>
                                <option value="training">Training</option>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <th class="text-left">Announcement Title: </th>
                            <th class="text-center">
                                <input type="text" name="ann_title_txt" id="ann_title_txt" class="form-control">
                            </th>
                        </tr>
                    </thead>
                    
                        <tbody id="team_name_list">
                            <tr>
                                <td colspan="2" class="text-left"><button type="button" class="btn btn-sm btn-success add_team_list">Add New Team </button></td>
                                
                            </tr>
                            <tr style="line-height: 50px; border-top:1px solid gray;"> 
                                <th class="text-left">Team Name: </th>
                                <th class="text-center">
                                    <input type="text" name="team_name_txt1" id="team_name_txt1" class="form-control icts_ann_input">
                                </th>
                            </tr>
                            <tr>
                                <th class="text-left text-secondary">Members: </th>
                                <th class="text-center">
                                    <textarea name="name_list_txt1" id="name_list_txt1" class="form-control icts_ann_input" rows="3"></textarea>
                                </th>
                            </tr>
                        </tbody>

                        <!-- QR FORM ADD -->
                        <tbody id="qr_form" style="display: none;">
                            <tr style="line-height: 50px;">
                                <th class="text-left">Date: </th>
                                <td class="text-left">
                                    <input type="date" name="qr_form_date" id="qr_form_date" class="form-control">
                                </td>
                            </tr>
                            <tr style="line-height: 50px;">
                                <th class="text-center" colspan="2">
                                    <img id="qr_form_img_preview" src="img/default2.png" alt="image" style="max-width:150px; min-width:150px;" class="p-2">
                                </th>
                            </tr>
                            <tr>
                                <td class="text-right p-2" colspan="2">
                                    <input type="file" name="qr_form_img" id="qr_form_img" onchange="readQRURL(this);" class="form-control" accept="image/jpg, image/jpeg" style="width: 50%; margin:auto;">
                                </td>
                            </tr>
                            
                        </tbody>

                        <!-- ADD TRAINING -->
                        <tbody id="training" style="display: none;">
                            <tr>
                                <td colspan="2" class="text-left"><button type="button" class="btn btn-sm btn-success add_desc_date">Add New</button></td>
                            </tr>
                            <input type="hidden" name="desc_date_num" id="desc_date_num" value="1">
                            <tr style="border-top:1px solid gray;">
                                <th>Description: </th>
                                <td>
                                    <input type="text" name="training_name1" id="training_name1" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <th class="text-left text-secondary">Date: </th>
                                <td class="text-left">
                                    <input type="date" name="training_date1" id="training_date1" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <th class="text-left text-secondary">Time: </th>
                                <td class="text-left">
                                    <input type="time" name="training_time1" id="training_time1" class="form-control">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>

            </div>
            <div class="modal-footer">
                <button 
                    id="save_icts_ann" 
                    type="button" 
                    class="btn btn-primary">
                    Save
                </button>
                <button 
                    type="button" 
                    class="btn btn-secondary" 
                    data-bs-dismiss="modal">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<!-- EDITING ICTS ANNOUNCEMENT-->
<div class="modal" id="icts_edit_ann_modal">
  <div class="modal-dialog icts_edit_ann_dialog">
    <div class="modal-content icts_edit_ann_content">
        <div class="modal-header">
            <h3 class="modal-title">Edit ICTS Announcement</h3>
            <button 
            type="button" 
            class="close" 
            data-bs-dismiss="modal" >
            <i class="fa-regular fa-circle-xmark"></i>
            </button>
        </div>
        <div class="modal-body icts_edit_ann_body"> 
            <form id="edit_icts_details" method="post" enctype="multipart/form-data">  
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <input type="hidden" 
                                    id="edit_icts_cont_id" 
                                    name="edit_icts_cont_id">
                            <th>Announcement Title:</th>
                            <td>
                                <input type="text" 
                                        name="edit_icts_ann_title" 
                                        id="edit_icts_ann_title" 
                                        class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-left">
                                <button type="button" class="btn btn-sm btn-success new_team_name_edit">Add New Team </button>
                                <button type="button" class="btn btn-sm btn-success new_training_edit">Add New </button>
                            </td>
                        </tr>
                        <!-- team num holder -->
                        <input type="hidden" name="edit_team_num" id="edit_team_num">
                        <input type="hidden" name="edit_added_new_team" id="edit_added_new_team">

                        <!-- training num holder -->
                        <input type="hidden" name="edit_training_num" id="edit_training_num">
                        <input type="hidden" name="edit_added_new_training" id="edit_added_new_training">
                    </thead>
                    <tbody id="edit_icts_ann_data"> 
                        
                    </tbody>
                </table>
            </form>
        </div>
        <div class="modal-footer">
            <button 
                id="save_edited_icts_ann" 
                type="button" 
                class="btn btn-primary"
                onclick="update_edited_icts_ann();">
                Update
            </button>
            <button 
                type="button" 
                class="btn btn-secondary" 
                data-bs-dismiss="modal">
                Cancel
            </button>
        </div>
    </div>
  </div>
</div>
    


<!-- EDTING -->
<!-- <div class="modal" id="icts_edit_ann_modal">
  <div class="modal-dialog icts_edit_ann_dialog">
    <div class="modal-content icts_edit_ann_content">
        <div class="modal-header">
            <h3 class="modal-title">Edit ICTS Announcement</h3>
            <button 
            type="button" 
            class="close" 
            data-bs-dismiss="modal" >
            <i class="fa-regular fa-circle-xmark"></i>
            </button>
        </div>
        <div class="modal-body icts_add_ann_body">


        </div>
    </div>
  </div>
</div> -->
    
        
           
            