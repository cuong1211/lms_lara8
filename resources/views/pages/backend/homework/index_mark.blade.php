@extends('layout.backend.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="form-inline">
                        <div class="form-group">
                        </div>
                    </form>
                </div>
                <h4 class="page-title">CHẤM ĐIỂM</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>KHOÁ HỌC</th>
                        <th>LỚP</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                        
                    @endphp
                    @foreach ($class as $item)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{$item->course->name}}</td>
                            <td>{{$item->name}}</td>
                            <td class="table-action">
                                <a href="{{route('mark.class',['id'=>$item->id])}}" class="btn btn-primary">XEM</a>
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
