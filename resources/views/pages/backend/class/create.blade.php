@extends('layout.backend.index')
@section('content')
    <div class="iq-card">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                    </div>
                    <h4 class="page-title">TẠO LỚP</h4>
                </div>
            </div>
        </div>
        <div class="iq-card-body">
            <form class="form-horizontal" action="{{ url('/admin/course') . '/' . $course->id . '/createclass' }}" method="POST">
                @csrf
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
                <div class="form-group col-sm-6">
                    <label for="uname">HỌC SINH:</label>
                    <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." name='user_id'>
                        @foreach ($student as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn iq-bg-danger">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
