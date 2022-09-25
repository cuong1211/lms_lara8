@extends('layout.frontend.index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-3">
                <h3>{{ $homework->title }}</h3>
                <h3>ĐỀ BÀI:</h3>
                <h4>{!! $homework->content !!}</h4>
            </div>
        </div>
        <form action="{{route('frontend.homework',['user_id'=>$user_id,'class_id'=>$class_id,'course_id'=>$course_id,'unit_id'=>$unit_id,'id'=>$id])}}" method="POST">
            @csrf
            <div class="form-group">
                <h4><label for="example-palaceholder">Nhập đường dẫn Google Docs</label></h4>
                <input type="text" id="example-palaceholder" class="form-control" name="link" placeholder="Đường dẫn Google Docs">
            </div>
    
            <div class="form-group">
                <button type="submit" class="btn btn-dark">NỘP BÀI</button>
            </div>
        </form>
    </div>
@endsection
