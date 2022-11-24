@extends('layout.backend.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">BÀI TẬP VỀ NHÀ</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form class="form-horizontal" action="{{ route('homework.create', ['course_id' => $course->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="simpleinput">TÊN BÀI TẬP:</label>
                    <input type="text" id="simpleinput" class="form-control" name="title">
                </div>
                <div class="form-group col-sm-6">
                    <label for="uname">NỘI DUNG:</label>
                    <textarea name="content" id="text-content"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">ADD</button>
                    <button type="submit" class="btn btn-light">CANCEL</button>
                </div>
            </form>
        </div>
    </div>
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
@endsection
