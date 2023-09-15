<!-- Add Birthday Modal -->
<div class="modal" id="quote_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Add/Update Quote</h3>
        <button type="button" class="close" data-bs-dismiss="modal" >
          <i class="fa-regular fa-circle-xmark"></i>
        </button>
      </div>
      <div class="modal-body">
        <span class="add_quote_msg text-success text-center"></span>
        <table class="quote_table">

            <tr>
                <td><h4>Quote</h4></td> 
            </tr>
            <tr>
                <td>
                  <textarea id="quote_input" class="form-control quote_input"></textarea>
                </td> 
            </tr>
            <tr >
                <td>
                  <h4>Author: </h4> <input id="author" type="text" class="form-control bday_input">
                </td>
            </tr>

        </table>
      </div>
      <div class="modal-footer">
        <button id="save_quote" type="button" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>


<!-- Edit quote Modal -->
<div class="modal" id="edit_quote_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Edit Quote</h3>
        <button type="button" class="close" data-bs-dismiss="modal" >
          <i class="fa-regular fa-circle-xmark"></i>
        </button>
      </div>
      <div class="modal-body">
      <span class="edit_quote_msg text-warning text-center"></span>
        <table class="quote_table">

            <tr>
                <td><h4>Quote</h4></td> 
            </tr>
            <tr>
                <td>
                  <textarea id="edited_quote_input" class="form-control quote_input"></textarea>
                </td> 
            </tr>
            <tr >
                <td>
                  <h4>Author: </h4> <input id="edited_author_input" type="text" class="form-control bday_input">
                </td>
            </tr>

        </table>
      </div>
      <div class="modal-footer">
        <button id="save_edited_quote" type="button" class="btn btn-primary" onclick="update_quote();">Save</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>