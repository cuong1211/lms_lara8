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
                <h4 class="page-title">ĐIỂM</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>TÊN HỌC SINH</th>
                        <th>ĐIỂM BÀI TẬP</th>
                        <th>ĐIỂM KIỂM TRA</th>
                        <th>ĐIỂM ĐỒ ÁN</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                        
                    @endphp
                    @foreach ($point as $item)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $item->user_name }}</td>

                            <td>
                                @if ($item->point_1 == -1)
                                @else
                                    {{ $item->point_1 }}
                                @endif

                            </td>
                            <td>
                                @if ($item->point_2 == -1)
                                @else
                                    {{ $item->point_2 }}
                                @endif

                            </td>
                            <td>
                                @if ($item->point_3 == -1)
                                @else
                                    {{ $item->point_3 }}
                                @endif

                            </td>
                            <td>
                                <a href="{{ route('point.edit',['course_id'=>$course_id,'class_id'=>$class_id,'id'=>$item->user_id]) }}" class="btn btn-success btn-sm">Sửa</a>
                            </td>
                            @php
                                $count++;
                            @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
