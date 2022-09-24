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
                                    class="btn btn-dark"><i class="mdi mdi-pencil-plus-outline">THÊM BÀI HỌC</i></a>
                            </div>
                        </div>
                    </form>
                </div>
                <h4 class="page-title">KHOÁ HỌC: {{ $course->name }}</h4>
                <h4 class="page-title">BÀI HỌC</h4>
                <div class="page-title-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <a href="{{ url('/admin/course') . '/' . $course->id . '/slide' }}"
                                    class="btn btn-dark">SLIDE</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <a href="{{ url('/admin/course') . '/' . $course->id . '/quiz' }}"
                                    class="btn btn-dark">CÂU HỎI</a>
                            </div>
                        </div>
                    </form>
                </div>
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
                        <th>NỘI DUNG</th>
                        <th>SLIDE</th>
                        <th>QUIZ</th>
                        <th>HOMEWORK</th>
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

                            <td>{{ $item->title }}:{{ $item->description }}</td>
                            <td>
                                @if (isset($item->content))
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalLong{{$item->id}}">
                                        Xem
                                    </button>
                                @endif
                                
                            </td>
                            <td>
                                @if ($item->slide_id == null)
                                    Không có
                                @else
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#exampleModalCenter{{$item->id}}">
                                        Truy cập
                                    </button>
                                @endif
                                {{-- <a href="{{ $item->slide->link }}"> --}}
                            </td>
                            <td>
                                @if ($item->quizzes_id == null)
                                    Không có
                                @else
                                    {{ $item->quiz->quiz }}
                                @endif
                            </td>
                            <td>
                                @if ($item->homework == null)
                                    Không có
                                @else
                                    {{ $item->homework }}
                                @endif
                            <td class="table-action">
                                <a href="{{ url('/admin/course') . '/' . $course->id . '/unit' . '/' . $item->id . '/edit' }}"
                                    class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                <a href="{{ url('/admin/course') . '/' . $course->id . ('/unit' . '/' . $item->id . '/delete') }}"
                                    class="action-icon"> <i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                        {{-- modal slide --}}
                        <div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">SLIDE</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- <iframe src="{{ $item->slide->link }}" frameborder="0" width="100%"
                                            height="500"></iframe> --}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- modal content --}}
                        {{-- <div class="modal fade bd-example-modal-lg" id="exampleModalLong{{$item->id}}" tabindex="-1" role="dialog" 
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Nội dung</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {!! $item->content !!}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
