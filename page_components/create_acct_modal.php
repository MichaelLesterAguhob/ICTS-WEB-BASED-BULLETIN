<!-- Add Birthday Modal -->
<div class="modal" id="create_acct_modal">
  <div class="modal-dialog c_modal_dialog">
    <div class="modal-content">
      <div class="modal-header c_header">

      <div class="row c_acct_row">
        <div class="col-sm-6 c_acct_col">
            <h3 class="modal-title">Create Account</h3>
        </div>
        <div class="col-sm-6 c_acct_col">
            <button type="button" class="close" data-bs-dismiss="modal" >
            <i class="fa-regular fa-circle-xmark"></i>
            </button>
        </div>
      </div>
        
      </div>
      <div class="modal-body">
      
      <table class="input_fields_table"> 
                <tr>
                    <td class="input_fields" colspan="2">
                        <input id="create_username" type="text" class="form-control" placeholder="Enter Username">
                    </td>
                </tr>
        <tr><td colspan="2" style="height: 20px;"></td></tr> 
                <tr>
                    <td class="input_fields" colspan="2">
                        <input id="create_password" type="password" class="form-control" placeholder="Enter Password">
                    </td>
                </tr>    
        <tr><td colspan="2" style="height: 30px;"></td></tr>       
                <tr>
                    <td class="fields"><button class="btn btn-success c_btn" onclick="create_account();">Create</button></td>
                    <td class="fields"><button class="btn btn-warning c_btn cancel" data-bs-dismiss="modal">Cancel</button></td>
                </tr>    
                <tr>
                    <td class="text-secondary" colspan="2"></td>
                </tr>     
      </table>

      </div>
     
    </div>
  </div>
</div>