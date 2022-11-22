@extends('layout.backend.index')
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">CHỈNH SỬA GIÁO VIÊN</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form class="form-horizontal" action="{{ url('admin/teacher' . '/' . $teacher->id . '/edit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="control-label col-sm-2 align-self-center mb-0" for="email">HỌ VÀ TÊN</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="{{ $teacher->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 align-self-center mb-0" for="email">EMAIL</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" value="{{ $teacher->email }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="uname">ZOOM</label>
                    <select class="form-control" name="zoom_id" id="email">
                        @foreach ($zoom as $item)
                            @if ($item->id == $teacher->zoom_id)
                                <option value="{{ $item->id }}" selected>{{ $item->topic }}</option>
                            @else
                                <option value="{{ $item->id }}" >{{ $item->topic }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="example-date">HÌNH ẢNH</label>
                    <input type="file" id="example-fileinput" class="form-control-file" name="avatar" value="{{$teacher->avatar}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn iq-bg-danger">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
