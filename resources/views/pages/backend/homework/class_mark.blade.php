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
                        <th>ĐIỂM</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                        
                    @endphp
                    @foreach ($students as $item)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                @foreach ($homework_class as $item2)
                                    @if ($item->user_id == $item2->user_id)
                                        <a href="{{ $item2->link }}" target="_blank">
                                            <button class="btn btn-primary">XEM BÀI</button>
                                        </a>
                                    @else
                                        <span class="alert alert-danger">CHƯA NỘP</span>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @if ($item->user_id == $item2->user_id)
                                    <form action="" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                                        <input type="number" name="mark" value="{{ $item->mark }}">
                                        <button type="submit" class="btn btn-primary">LƯU</button>
                                    </form>
                                @else
                                    
                                @endif
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
