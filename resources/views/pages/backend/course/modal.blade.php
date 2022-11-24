<div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form" id="modal_add" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel">Thêm khoá học</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="" hidden>
                    <div class="form-group">
                        <label for="simpleinput">Tên khoá học</label>
                        <input type="text" id="simpleinput" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="example-date">Ngày bắt đầu</label>
                        <input class="form-control" id="example-date" type="date" name="start_time">
                    </div>
                    <div class="form-group">
                        <label for="example-date">Hình ảnh</label>
                        <br>
                        <input type="file"
                            onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                            name="img">
                        <br>
                        <img id="image" width="491" height="246">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
