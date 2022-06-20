@extends('layout.backend.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">HỌC SINH</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-9">
            <form class="form-horizontal" action="{{route('user.store')}}" method="POST"> 
                @csrf
                <div class="form-group">
                    <label for="simpleinput">HỌ VÀ TÊN:</label>
                    <input type="text" id="simpleinput" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="simpleinput">EMAIL:</label>
                    <input class="form-control" id="simpleinput" type="text" name="email">
                </div>
                <div class="form-group">
                    <label for="simpleinput">MẬT KHẨU</label>
                    <input type="text" id="simpleinput" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <input hidden type="text" id="simpleinput" class="form-control" name="status" value="0">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">ADD</button>
                    <button type="submit" class="btn btn-light">CANCEL</button>
                </div>
            </form>
        </div>
    </div>
@endsection
