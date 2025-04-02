
<!-- Add Birthday Modal -->
<div class="modal" id="bday_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Add Birthday</h3>
        <button type="button" class="close" data-bs-dismiss="modal" >
          <i class="fa-regular fa-circle-xmark"></i>
        </button>
      </div>
      <div class="modal-body">
        <span class="add_bday_form_msg text-success text-center"></span>
        <table class="bday_input_table">
          
        <!-- Add Birthday Form -->
        <form autocomplete="off" id="add_bday_form" method="post" enctype="multipart/form-data">
            <tr>
                <td>Name: &nbsp;</td>
                <td>
                  <input name="name" id="name" type="text" class="form-control bday_input">
                </td>
            </tr>
            <tr>
                <td>Birth Date: &nbsp;</td>
                <td>
                  <input name="bdate" id="bdate" type="date" class="form-control bday_input">
                </td>
            </tr>
            <tr>
                <td>Upload Image: &nbsp;</td>
                <td>
                  <img 
                  src="../public/assets/img/default.png" 
                  alt="image" 
                  style="width: 150px; height:150px;" 
                  id="image_preview" 
                  class="mt-1">
                <br>
                  <input 
                  type="file" 
                  name="bday_image"
                  id="bday_image"
                  class="btn btn-success mt-1"
                  accept="image/jpg, image/jpeg" 
                  onchange="readURL(this);">
                </td>
            </tr>
        </form>

        </table>
      </div>
      <div class="modal-footer">
        <button 
          id="save_bday" 
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

<!-- Edit Birthday Modal -->
<div class="modal" id="edit_bday_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Edit Birthday Details</h3>
        <button 
          type="button" 
          class="close" 
          data-bs-dismiss="modal" >
          <i class="fa-regular fa-circle-xmark"></i>
        </button>
      </div>
      <div class="modal-body">
        <table class="bday_input_table">
          
          <!-- edit Birthday Form -->
        <form autocomplete="off" id="edit_bday_form" method="post" enctype="multipart/form-data">
          <input type="hidden" id="bday_id" name="bday_id">
            <tr>
                <td>Name: &nbsp;</td>
                <td>
                  <input 
                  name="edit_name" 
                  id="edit_name" 
                  type="text" 
                  class="form-control bday_input">
                </td>
            </tr>
            <tr>
                <td>Birth Date: &nbsp;</td>
                <td>
                  <input 
                  name="edit_bdate" 
                  id="edit_bdate" 
                  type="date" 
                  class="form-control bday_input">
                </td>
            </tr>
            <tr>
                <td>Upload Image: &nbsp;</td>
                <td>
                  <img 
                  src="../public/assets/img/default.png" 
                  alt="image" 
                  style="width: 150px; height:150px;" id="edit_image_preview" 
                  class="mt-1">
                  <input type="hidden" name="edit_old_image" id="edit_old_image">
                  <input type="hidden" name="image_changes" id="image_changes">
                <br>
                  <input 
                  type="file"
                  name="edited_bday_image"
                  id="edited_bday_image"
                  class="btn btn-success mt-1"
                  accept="image/jpg, image/jpeg"
                  onchange="readEditURL(this);">
                </td>
            </tr>
        </form>
        </table>
      </div>
      <div class="modal-footer">
        <button 
          id="Update_edited_bday" 
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





