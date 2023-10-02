
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
                        <tr>
                            <td><label for="cont_type">Choose Announcement Type: </label></td>
                            <td>
                            <select name="cont_type" id="cont_type" class="form-select mb-3" onchange="selected_cont_type();">
                                <option value="">Emergency Response Team</option>
                                <option value="">QR/Form</option>
                                <option value="">Training</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-left">Announcement Title: </th>
                            <th class="text-center">
                                <input type="text" name="ann_title_txt" class="form-control">
                            </th>
                        </tr>
                    
                        <tbody id="team_name_list">
                            <tr>
                                <td colspan="2" class="text-left"><button type="button" class="btn btn-sm btn-success add_team_list">Add New Team </button></td>
                            </tr>
                            <tr style="line-height: 50px;"> 
                                <th class="text-center">Team Name: </th>
                                <th class="text-center">
                                    <input type="text" name="team_name_txt1" class="form-control icts_ann_input">
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center text-secondary">Names: </th>
                                <th class="text-center">
                                    <textarea name="name_list_txt1" class="form-control icts_ann_input" rows="3"></textarea>
                                </th>
                            </tr>
                        </tbody>

                        <tbody id="qr/form" style="display: none;">
                            <tr>
                                <td colspan="2" class="text-left"><button type="button" class="btn btn-sm btn-success add_team_list">Add QR </button></td>
                            </tr>
                            <tr style="line-height: 50px;">
                                <th class="text-center">Team Name: </th>
                                <th class="text-center">
                                    <input type="text" name="team_name_txt1" class="form-control icts_ann_input">
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center text-secondary">Names: </th>
                                <th class="text-center">
                                    <textarea name="name_list_txt1" class="form-control icts_ann_input" rows="3"></textarea>
                                </th>
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