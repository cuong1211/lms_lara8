<div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form" id="modal_add">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel">Thêm khoá học</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="">
                    <input type="hidden" id="simpleinput" class="form-control" name="status" value="0">
                    <div class="form-group">
                        <label for="simpleinput">HỌ VÀ TÊN:</label>
                        <input type="text" id="simpleinput" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="simpleinput">EMAIL:</label>
                        <input class="form-control" id="simpleinput" type="text" name="email">
                    </div>
                    <div class="form-group" id="password">
                        <label for="simpleinput">MẬT KHẨU:</label>
                        <input type="text" id="simpleinput" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="simpleinput">NGÀY SINH:</label>
                        <input type="date" id="simpleinput" class="form-control" name="birthday">
                    </div>
                    <div class="form-group">
                        <label for="simpleinput">SỐ ĐIỆN THOẠI:</label>
                        <input type="tel" id="simpleinput" class="form-control" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="simpleinput">ĐỊA CHỈ:</label>
                        <input type="text" id="simpleinput" class="form-control" name="address">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal input --}}
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nhập file csv</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="file" name="file">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Tải lên</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('jscustom')
    <script>
        $(document).ready(function() {
            $('#text-content').summernote({
                height: 300,
                width: 760,
            });
        });
    </script>
@endpush
