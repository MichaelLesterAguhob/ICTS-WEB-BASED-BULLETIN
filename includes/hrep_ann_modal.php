<div class="modal" id="hrep_ann_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Add Hrep Announcement</h3>
        <button type="button" class="close" data-bs-dismiss="modal" >
          <i class="fa-regular fa-circle-xmark"></i>
        </button>
      </div>
      <div class="modal-body">
        <span class="add_hrep_ann_form_msg text-success text-center"></span>
        <table class="hrep_ann_input_table">
          
        <!-- Add hrep_ann Form -->
        <form autocomplete="off" id="add_hrep_ann_form" method="post" enctype="multipart/form-data">
            <tr>
                <th>Subject: &nbsp;</th>
                <td class="p-2">
                  <input type="text" name="subject" id="subject"  class="form-control hrep_ann_input">
                </td>
            </tr>
            <tr>
                <th>Date Release: &nbsp;</th>
                <td class="p-2">
                  <input type="date" name="hrep_ann_date" id="hrep_ann_date"  class="form-control hrep_ann_input">
                </td>
            </tr>
            <tr>
                <th>Office: &nbsp;</th>
                <td class="p-2">
                  <input type="text" name="hrep_ann_office" id="hrep_ann_office"  class="form-control hrep_ann_input">
                </td>
            </tr>
            <tr>
                <th>Upload Image: &nbsp;</th>
                <td class="p-2">
                  <img 
                  src="../public/assets/img/default2.png" 
                  alt="image" 
                  style="width: 150px; height:150px;" 
                  id="hrep_ann_image_preview" 
                  class="mt-1">
                <br>
                  <input 
                  type="file" 
                  name="hrep_ann_image"
                  id="hrep_ann_image"
                  class="btn btn-success mt-1"
                  accept="image/jpg, image/jpeg" 
                  onchange="">
                </td>
            </tr>
        </form>

        </table>
      </div>
      <div class="modal-footer">
        <button 
          type="button" 
          class="btn btn-primary"
          onclick="add_hrep_ann();">
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

<!-- editing -->
<div class="modal" id="edit_hrep_ann_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Edit Hrep Announcement</h3>
        <button type="button" class="close" data-bs-dismiss="modal" >
          <i class="fa-regular fa-circle-xmark"></i>
        </button>
      </div>
      <div class="modal-body">
        <span class="edit_hrep_ann_form_msg text-success text-center"></span>
        <table class="hrep_ann_input_table">
          
        <!-- edit hrep_ann Form -->
        <form autocomplete="off" id="edit_hrep_ann_form" method="post" enctype="multipart/form-data">
          <input type="hidden" name="edit_hrep_ann_id" id="edit_hrep_ann_id">
            <tr>
                <th>Subject: &nbsp;</th>
                <td class="p-2">
                  <input type="text" name="edit_subject" id="edit_subject"  class="form-control hrep_ann_input">
                </td>
            </tr>
            <tr>
                <th>Date Release: &nbsp;</th>
                <td class="p-2">
                  <input type="date" name="edit_hrep_ann_date" id="edit_hrep_ann_date"  class="form-control hrep_ann_input">
                </td>
            </tr>
            <tr>
                <th>Office: &nbsp;</th>
                <td class="p-2">
                  <input type="text" name="edit_hrep_ann_office" id="edit_hrep_ann_office"  class="form-control hrep_ann_input">
                </td>
            </tr>
            <tr>
                <th>Upload Image: &nbsp;</th>
                <td class="p-2">
                  <img 
                  src="../public/assets/img/default2.png" 
                  alt="image" 
                  style="width: 150px; height:150px;" 
                  id="edit_hrep_ann_image_preview" 
                  class="mt-1">
                <br>
                <input type="hidden" id="edit_hrep_ann_img_holder" name="edit_hrep_ann_img_holder">
                  <input 
                  type="file" 
                  name="edit_hrep_ann_image"
                  id="edit_hrep_ann_image"
                  class="btn btn-success mt-1"
                  accept="image/jpg, image/jpeg" 
                  onchange="image_change(this);">
                </td>
            </tr>
        </form>

        </table>
      </div>
      <div class="modal-footer">
        <button  
          type="button" 
          class="btn btn-primary"
          onclick="update_hrep_ann();">
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


<!-- HREP ANNOUNCEMENT CONFIRMATION MODAL -->
<div class="modal" id="hrep_ann_del_modal">
  <div class="modal-dialog confirmation_modal_dialog">
    <div class="modal-content confirmation_modal_content">
      <div class="modal-header confirmation_modal_header">
        <button type="button" class="close" data-bs-dismiss="modal" >
          <i class="fa-regular fa-circle-xmark"></i>
        </button>
        <h3 class="modal-title hrep_ann_confirm_modal_title"></h3>
      </div>
      <div class="modal-footer confirmation_modal_footer">
        <button type="button" class="btn btn-danger" onclick="delete_hrep_ann();">Delete</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>