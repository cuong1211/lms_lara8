@extends('layout.backend.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <a href="{{ url('/admin/course') . '/' . $course->id . '/createunit' }}"
                                    class="btn btn-dark"><i class="mdi mdi-pencil-plus-outline">ADD THÊM</i></a>
                            </div>
                        </div>
                    </form>
                </div>
                <h4 class="page-title">KHOÁ HỌC: {{ $course->name }}</h4>
                <h4 class="page-title">BÀI HỌC</h4>
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
                        <th>SLIDE</th>
                        <th>HOMEWORK</th>
                        <th>QUIZ</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                        
                    @endphp
                    @foreach ($unit as $item)
                        <tr>
                            <td>{{ $count }}</td>

                            <td>{{ $item->title }}</td>
                            <td>
                                @if ($item->slide_id == null)
                                    Không có
                                @else
                                    {{ $item->slide->link }}
                                @endif
                            </td>
                            <td>
                                @if ($item->homework == null)
                                    Không có
                                @else
                                    {{ $item->homework }}
                                @endif
                            <td>
                                @if ($item->quiz == null)
                                    Không có
                                @else
                                    {{ $item->quiz }}
                                @endif
                            </td>
                            <td class="table-action">
                                <a href="{{url('/admin/course').'/'.$course->id.('/unit').'/'.$item->id.'/edit'}}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                <a href="{{url('/admin/course').'/'.$course->id.('/unit'.'/'.$item->id.'/delete')}}" class="action-icon"> <i class="mdi mdi-delete"></i></a>
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
