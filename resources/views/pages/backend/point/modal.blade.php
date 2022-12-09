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
                        <label for="simpleinput">Tên học sinh</label>
                        <input type="text" name="name" value="" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="simpleinput">Điểm bài tập</label>
                        <input type="number" step="1" min="0" max ="10" name="point_1"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="example-date">Điểm bài kiểm tra</label>
                        <input type="number" step="1" min="0" max ="10" name="point_2"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="example-date">Điểm đồ án</label>
                        <input type="number" step="1" min="0" max ="10" name="point_3"  class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
