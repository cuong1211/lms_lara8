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
                    <input type="hidden" name="id" value="" >
                    <input type="hidden" name="course_id" value="" >
                    <div class="form-group">
                        <label class="control-label col-sm-2 align-self-center mb-0" for="email">TÊN LỚP:</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="email" placeholder="Enter name">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="uname">GIẢNG VIÊN:</label>
                        <select class="form-control" name="user_id" id="email">
                            @foreach ($teacher as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
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
