@push('namepage')
    Quản lý khoá học
@endpush
@extends('layout.backend.index')
@section('title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Sửa bài tập về nhà</h4>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <form class="form-horizontal" action="{{ route('homework.edit', ['course_id'=>$course_id,'id'=>$id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="simpleinput">TÊN BÀI TẬP:</label>
                <input type="text" id="simpleinput" class="form-control" name="title" value="{{$homework->title}}">
            </div>
            <div class="form-group col-sm-6">
                <label for="uname">NỘI DUNG:</label>
                <textarea name="content" id="text-content">{{$homework->content}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">ADD</button>
                <button type="submit" class="btn btn-light">CANCEL</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('jscustom')
    <script>
        $(document).ready(function() {
            $('#text-content').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['pararagraph', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endpush