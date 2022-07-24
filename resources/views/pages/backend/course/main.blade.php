@extends('layout.backend.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <a href="{{url('/admin/createcourse')}}" class="btn btn-dark"><i class="mdi mdi-pencil-plus-outline">THÊM MỚI</i> </a>
                            </div>
                        </div>
                    </form>
                </div>
                <h4 class="page-title">KHOÁ HỌC</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>TÊN KHOÁ HỌC</th>
                        <th>THỜI GIAN</th>
                        <th>TÀI NGUYÊN</th>
                        <th>LỚP</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                        
                    @endphp
                    @foreach ($course as $item)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->start_time}}</td>
                            <td>
                                <a href="{{url('/admin/course').'/'.$item->id.'/unit'}}">
                                    <button type="button" class="btn btn-primary"><span>TRUY CẬP</span> </button>
                                </a>
                            </td>
                            <td>
                                <a href="{{url('/admin/course').'/'.$item->id.'/class'}}">
                                    <button type="button" class="btn btn-primary"><span>TRUY CẬP</span> </button>
                                </a>
                            </td>
                            <td>{{ $item->start_time }}</td>
                            <td class="table-action">
                                <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                <a href="{{url('admin/deletecourse'.'/'.$item->id)}}" class="action-icon"> <i class="mdi mdi-delete"></i></a>
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
