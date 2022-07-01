@extends('layout.backend.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">SLIDE</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form class="form-horizontal" action="{{ url('/admin/course').'/'.$course->id.('/createslide') }}" method="POST"> 
                @csrf
                <div class="form-group">
                    <label for="simpleinput">TÊN:</label>
                    <input type="text" id="simpleinput" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="example-date">ĐƯỜNG DẪN:</label>
                    <input class="form-control" id="simpleinput" type="text" name="link">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">ADD</button>
                    <button type="submit" class="btn btn-light">CANCEL</button>
                </div>
            </form>
        </div>
    </div>
@endsection
