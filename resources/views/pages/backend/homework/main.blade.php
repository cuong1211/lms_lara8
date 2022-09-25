@extends('layout.backend.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <a href="{{ route('homework.create',['id'=>$course->id]) }}" class="btn btn-dark"><i
                                        class="mdi mdi-pencil-plus-outline">THÊM MỚI</i> </a>
                            </div>
                        </div>
                    </form>
                </div>
                <h4 class="page-title">Bài tập về nhà khoá học: {{$course->name}}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>TÊN BÀI TẬP</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                        
                    @endphp
                    @foreach ($homework as $item)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{$item->title}}</td>
                        <td class="table-action">
                            <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                            <a href="" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>
                    @endforeach
                        @php
                            $count++;
                        @endphp
                </tbody>
            </table>
        </div>
    </div>
@endsection
