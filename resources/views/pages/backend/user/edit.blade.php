@extends('layout.backend.index')
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">EDIT USER</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form class="form-horizontal" action="{{ url('admin/user' . '/' . $user->id . '/edit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="control-label col-sm-2 align-self-center mb-0" for="email">HỌ VÀ TÊN</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 align-self-center mb-0" for="email">EMAIL</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="uname">CHỨC VỤ</label>
                    <select class="form-control" name="role_id" id="email">
                        @foreach ($role as $item)
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
