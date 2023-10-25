 
<!-- Add Birthday Modal -->
<div class="modal" id="hrep_act_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Add Hrep Activity</h3>
        <button type="button" class="close" data-bs-dismiss="modal" >
          <i class="fa-regular fa-circle-xmark"></i>
        </button>
      </div>
      <div class="modal-body">
        <span class="add_hrep_act_form_msg text-success text-center"></span>
        <table class="hrep_act_input_table">
        <!-- Hrep Act Form --> 
        <form id="add_hrep_act_form" method="post" enctype="multipart/form-data">
       
        <tr>
            <th style="width: 30%;">Image:</th>
            <td style="width: 70%;"><img src="img/default2.png" alt="image" id="hrep_act_img_prev"></td>
        </tr>
        <tr>
            <th style="width: 30%;">Upload:</th>
            <td style="width: 70%;">
            <input type="file" id="upload_hrep_act_img" name="upload_hrep_act_img" class="form-control btn-success" accept="image/jpg, image/jpeg" onchange="readURLHrepAct(this);"></td>
        </tr>
        
        </form>
        </table>
      </div>
      <div class="modal-footer">
        <button 
          id="save_hrep_act" 
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


<!-- Edit Hrep Act Modal -->
<div class="modal" id="edit_hrep_act_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Edit Hrep Activity?</h3>
        <button type="button" class="close" data-bs-dismiss="modal" >
          <i class="fa-regular fa-circle-xmark"></i>
        </button>
      </div>
      <div class="modal-body">
      <table class="hrep_act_input_table">
        <!-- edit Hrep Act Form --> 
        <form id="edit_hrep_act_form" method="post" enctype="multipart/form-data">
        <input type="hidden" id="edit_hrep_act_id" name="edit_hrep_act_id">
        <input type="hidden" id="edit_hrep_act_img_old" name="edit_hrep_act_img_old">
        <tr>
            <th style="width: 30%;">Image:</th>
            <td style="width: 70%;"><img src="img/default.png" alt="image" id="edit_hrep_act_img_prev" style="width: 200px; height:200px;"></td>
        </tr>
        <tr style="line-height: 40px;">
            <th style="width: 30%;">Upload:</th>
            <td style="width: 70%;">
            <input type="file" id="edit_hrep_act_img" name="edit_hrep_act_img" class="form-control btn-success" accept="image/jpg, image/jpeg" onchange="readURLEditHrepAct(this);"></td>
        </tr>
        
        </form>
        </table>
      </div>
      <div class="modal-footer">
        <button 
          id="update_hrep_act" 
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
</div>

<!-- Delete Hrep Act Modal -->
<div class="modal" id="del_hrep_act_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title hrep_act_del_msg">Are you sure you want to delete?</h3>
        <button type="button" class="close" data-bs-dismiss="modal" >
          <i class="fa-regular fa-circle-xmark"></i>
        </button>
      </div>
      <div class="modal-body">
      <button 
          id="del_hrep_act" 
          type="button" 
          class="btn btn-danger"
          onclick="del_hrep_act();">
          Delete
        </button>
        <button 
          type="button" 
          class="btn btn-warning" 
          data-bs-dismiss="modal">
          Cancel
        </button>
      </div>
      </div>
    </div>
  </div>
</div>