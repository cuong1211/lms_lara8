@extends('layout.backend.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Bài tập về nhà khoá học:</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>BÀI HỌC</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($unit as $item)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $item->title}}</td>
                            <td class="table-action">
                                <a href="{{route('mark.unit',['class_id'=>$id,'id'=>$item->id])}}" class="action-icon">XEM</a>
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
