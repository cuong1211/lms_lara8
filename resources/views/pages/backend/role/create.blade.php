@extends('layout.backend.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">ROLE</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form class="form-horizontal" action="{{ url('/admin/role/create') }}" method="POST" enctype="multipart/form-data"> 
                @csrf
                <div class="form-group">
                    <label for="simpleinput">TÊN CHỨC VỤ</label>
                    <input type="text" id="simpleinput" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">ADD</button>
                    <button type="submit" class="btn btn-light">CANCEL</button>
                </div>
            </form>
        </div>
    </div>
@endsection
