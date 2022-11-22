@extends('layout.backend.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
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
                        <th>HỌC SINH</th>
                        <th>TRẠNG THÁI</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                        
                    @endphp
                    @foreach ($students as $item)
                        @foreach ($homework_class as $item2)
                            @if ($item->user_id == $item2->user_id)
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                        @if ($item2->link == null)
                                            CHƯA NỘP BÀI
                                        @else
                                            <a href="{{ $item2->link }}" target="_blank">
                                                <button class="btn btn-primary">XEM BÀI</button>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $count++;
                                @endphp
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
