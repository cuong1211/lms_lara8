@extends('layout.backend.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <a href="{{url('/admin/user/create')}}" class="btn btn-dark"><i class="mdi mdi-pencil-plus-outline">THÊM MỚI</i> </a>
                            </div>
                        </div>
                    </form>
                </div>
                <h4 class="page-title">HỌC SINH</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>AVATAR</th>
                        <th>TÊN</th>
                        <th>EMAIL</th>
                        <th>CHỨC VỤ</th>
                        <th>TRẠNG THÁI</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                        
                    @endphp
                    @foreach ($user as $item)
                        <tr>
                            <td>{{ $count }}</td>
                            <td></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                @if($item->role->name === Null)
                                    <span class="badge badge-success">Không có chức vụ</span>
                                @else
                                    {{$item->role->name}}
                                @endif
                            </td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="badge badge-success">Hoạt động</span>
                                @else
                                    <span class="badge badge-danger">Không hoạt động</span>
                                @endif
                            </td>
                            <td class="table-action">
                                <a href="{{url('admin/user'.'/'.$item->id.'/edit')}}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                <a href="{{url('admin/user'.'/'.$item->id.'/delete')}}" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
