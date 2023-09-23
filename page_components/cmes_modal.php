
<!-- Add Cmes Modal -->
<div class="modal" id="cmes_modal">
  <div class="modal-dialog cmes_modal_dialog">
    <div class="modal-content cmes_modal_content" style="width: 80vw; min-width:400px;">
      <div class="modal-header cmes_modal_header">
        <h3 class="modal-title">Add Committee Meeting and Event Shedule</h3>
        <button type="button" class="close" data-bs-dismiss="modal" >
          <i class="fa-regular fa-circle-xmark"></i>
        </button>
      </div>
      <div class="modal-body cmes_modal_body">
        <span class="add_cmes_form_msg text-success text-center"></span>
        <table class="cmes_input_table">
          
        <!-- Add cmes Form -->
        <form id="add_cmes_form" method="post" enctype="multipart/form-data">
            <tr>
                <th style="width: 20%;">Committee/Office: &nbsp;</th>
                <td style="width:80%;">
                  <input name="office" id="office" type="text" class="form-control cmes_input">
                </td>
            </tr>
            <tr>
                <th style="width: 20%;">Host/s: &nbsp;</th>
                <td style="width:80%;">
                  <input name="host" id="host" type="text" class="form-control cmes_input">
                </td>
            </tr>
            <tr>
                <th>Time: &nbsp;</th>
                <td>
                    <input name="time" id="time" type="time" class="date_time">
                </td>
            </tr>
            <tr>
                <th>Date: &nbsp;</th>
                <td>
                    <input name="date" id="date" type="date" class="date_time">
                </td>
            </tr>
            <tr>
                <th>FB Live (Yes/No): &nbsp;</th>
                <td class="yes_no">
                    <input type="hidden" id="fb_yes_no" name="fb_yes_no">
                    <input type="radio" id="fb_yes" name="fb_yes_no" value="YES">
                    <label for="fb_yes">YES</label> &nbsp;
  
                    <input type="radio" id="fb_no" name="fb_yes_no" value="NO">
                    <label for="fb_no">NO</label>
                </td>
            </tr>
            <tr>
                <th>PPAB CAM (Yes/No): &nbsp;</th>
                <td class="yes_no">
                    <input type="hidden" id="ppab_yes_no" name="ppab_yes_no">
                    <input type="radio" id="ppab_yes" name="ppab_yes_no" value="YES">
                    <label for="ppab_yes">YES</label> &nbsp;
  
                    <input type="radio" id="ppab_no" name="ppab_yes_no" value="NO">
                    <label for="ppab_no">NO</label>
                </td>
            </tr>
            <tr>
                <th style="width: 20%;">Remarks: &nbsp;</th>
                <td style="width:80%;">
                  <input name="remarks" id="remarks" type="text" class="form-control cmes_input">
                </td>
            </tr>
        </form>

        </table>
      </div>
      <div class="modal-footer">
        <button 
          id="save_cmes" 
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


<!-- Edit Cmes Modal -->
<div class="modal" id="cmes_edit_modal">
  <div class="modal-dialog cmes_modal_dialog">
    <div class="modal-content cmes_modal_content" style="width: 80vw; min-width:400px;">
      <div class="modal-header cmes_modal_header">
        <h3 class="modal-title">Edit Committee Meeting and Event Shedule</h3>
        <button type="button" class="close" data-bs-dismiss="modal" >
          <i class="fa-regular fa-circle-xmark"></i>
        </button>
      </div>
      <div class="modal-body cmes_modal_body">
        <!-- <span class="edit_cmes_form_msg text-success text-center"></span> -->
        <table class="cmes_input_table">
          
        <!-- Edit cmes Form -->
        <form id="edit_cmes_form" method="post" enctype="multipart/form-data">
            <tr>
              <input type="text" name="cmes_id" id="cmes_id">
                <th style="width: 20%;">Committee/Office: &nbsp;</th>
                <td style="width:80%;">
                  <input name="edit_office" id="edit_office" type="text" class="form-control cmes_input">
                </td> 
            </tr>
            <tr>
                <th style="width: 20%;">Host/s: &nbsp;</th>
                <td style="width:80%;">
                  <input name="edit_host" id="edit_host" type="text" class="form-control cmes_input">
                </td>
            </tr>
            <tr>
                <th>Time: &nbsp;</th>
                <td>
                    <input name="edit_time" id="edit_time" type="time" class="date_time">
                </td>
            </tr>
            <tr>
                <th>Date: &nbsp;</th>
                <td>
                    <input name="edit_date" id="edit_date" type="date" class="date_time">
                </td>
            </tr>
            <tr>
                <th>FB Live (Yes/No): &nbsp;</th>
                <td class="yes_no">
                    <input type="hidden" id="edit_fb_yes_no" name="edit_fb_yes_no">

                    <input type="radio" id="edit_fb_yes" name="edit_fb_yes_no" value="YES">
                    <label for="edit_fb_yes">YES</label> &nbsp;
  
                    <input type="radio" id="edit_fb_no" name="edit_fb_yes_no" value="NO">
                    <label for="edit_fb_no">NO</label>
                </td>
            </tr>
            <tr>
                <th>PPAB CAM (Yes/No): &nbsp;</th>
                <td class="yes_no">
                    <input type="hidden" id="edit_ppab_yes_no" name="edit_ppab_yes_no">

                    <input type="radio" id="edit_ppab_yes" name="edit_ppab_yes_no" value="YES">
                    <label for="edit_ppab_yes">YES</label> &nbsp;
  
                    <input type="radio" id="edit_ppab_no" name="edit_ppab_yes_no" value="NO">
                    <label for="edit_ppab_no">NO</label>
                </td>
            </tr>
            <tr>
                <th style="width: 20%;">Remarks: &nbsp;</th>
                <td style="width:80%;">
                  <input name="edit_remarks" id="edit_remarks" type="text" class="form-control cmes_input">
                </td>
            </tr>
        </form>

        </table>
      </div>
      <div class="modal-footer">
        <button 
          id="save_edited_cmes" 
          type="button" 
          class="btn btn-primary">
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

<!-- CMES CONFIRMATION MODAL -->
<div class="modal" id="cmes_confirm_modal">
  <div class="modal-dialog confirmation_modal_dialog">
    <div class="modal-content confirmation_modal_content">
      <div class="modal-header confirmation_modal_header">
        <button type="button" class="close" data-bs-dismiss="modal" >
          <i class="fa-regular fa-circle-xmark"></i>
        </button>
        <h3 class="modal-title cmes_confirm_modal_title"></h3>
      </div>
      <div class="modal-footer confirmation_modal_footer">
        <button id="delete_cmes" type="button" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>




