<div class="modal fade" id="excelModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background: #F8F8F8 ; border-radius: 8px">
                <label class="modelTitle"> {{__('main.attach_file')}}</label>

                <iconify-icon icon="mdi:close-outline" style="color: red ; font-size: 30px; " data-bs-dismiss="modal"
                    aria-label="Close" class="modal-close"></iconify-icon>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('importFile') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="excel-file"> Upload Excel File: </label>
                        <input type="file" name="file" id="file" required>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> {{ __('main.cancel_btn') }} </button>
                <button type="submit" class="btn btn-warning"> {{ __('main.attach_btn') }} </button>
            </div>
        </form>
        </div>
    </div>
</div>
