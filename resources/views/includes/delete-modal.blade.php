<!-- Delete Model -->
<form action="" method="POST" class="remove-record-model">
    @csrf
    @method('delete')
    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete-modalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Are you sure you want to delete?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>