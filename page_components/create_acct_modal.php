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
                    <td style="line-height:20px;" colspan="2">
                        <div class="alert create_account_failed">
                        
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="input_fields" colspan="2">
                        <input id="create_username" type="text" class="form-control" placeholder="Create Username">
                    </td>
                </tr>
        <tr><td colspan="2" style="height: 20px;"></td></tr> 
                <tr>
                    <td class="input_fields" colspan="2">
                        <input id="email" type="email" class="form-control" placeholder="Enter Email">
                    </td>
                </tr>    
        <tr><td colspan="2" style="height: 20px;"></td></tr> 
                <tr>
                    <td class="input_fields" colspan="2">
                        <input id="create_password" type="password" class="form-control" placeholder="Create Password">
                    </td>
                </tr>    
        <tr>
            <td class="input_fields " colspan="2">
                <input id="verification_code" type="number" class="form-control v_code" placeholder="Enter Verification Code" style="display: none;">
            </td>
        </tr>    

        <!-- BUTTONS -->
        <tr><td colspan="2" style="height: 30px;"></td></tr>       
                <tr>
                    <td class="fields">
                      <button id="verify" class="btn btn-success c_btn" onclick="verify_email();" >Get Code</button>
                      <button id="create" class="btn btn-primary text-light c_btn" onclick="create_account();" style="display: none;">Verify & Create</button>
                    </td>
                    <td class="fields">
                      <button class="btn btn-secondary text-light c_btn cancel" data-bs-dismiss="modal">Cancel</button>
                    </td>
                </tr>    
                <tr>
                    <td class="text-secondary" colspan="2"></td>
                </tr>     
      </table>

      </div>
     
    </div>
  </div>
</div>