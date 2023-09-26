 
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
        <table class="bday_input_table">
        <!-- Add Birthday Form -->
        <form id="add_hrep_act_form" method="post" enctype="multipart/form-data">
       
        <tr>
            <th style="width: 30%;">Image:</th>
            <td style="width: 70%;"><img src="img/default.png" alt="image" id="hrep_act_img_prev"></td>
        </tr>
        <tr>
            <th style="width: 30%;">Upload:</th>
            <td style="width: 70%;"><input type="file" id="upload_hrep_act_img" class="form-control" onchange="readURLHrepAct(this);"></td>
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