<div class="modal" tabindex="-1" role="dialog" id="commentModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                    Edit comment
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="commentBody">Body</label>
                    <textarea class="form-control" id="commentBody" rows="4"
                    placeholder="500 characters maximum"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="commentSaveButton">
                    Save changes
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>