@extends('layout.backend.index')
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Create unit</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form class="form-horizontal" action="{{ url('/admin/course') . '/' . $course->id . '/createunit' }}"
                method="POST">
                @csrf
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

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn iq-bg-danger">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')

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
