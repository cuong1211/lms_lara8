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
                    <div class="form-group row">
                        <label class="control-label col-sm-2 align-self-center mb-0" for="email">Tên bài:</label>
                        <div class="col-sm-9">
                            <input type="text" name="title" class="form-control" id="email" placeholder="Enter name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2 align-self-center mb-0" for="email">Mô tả:</label>
                        <div class="col-sm-9">
                            <input type="text" name="description" class="form-control" id="email"
                                placeholder="Enter name">
                        </div>
                    </div>
                    <div class="input-group col-sm-6 mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">SLIDE:</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="slide_id">
                            
                            @foreach ($slide as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group col-sm-6 mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">BÀI TẬP:</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="quizzes_id">
                            
                            @foreach ($quiz as $item)
                                <option value="{{ $item->id }}">{{ $item->quiz }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group col-sm-6 mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">BÀI TẬP VỀ NHÀ:</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="homework_id">
                            
                            @foreach ($homework as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>    
                    <div class="form-group col-sm-6">
                        <label for="uname">Nội dung:</label>
                        <textarea name="content" id="text-content"></textarea>
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
