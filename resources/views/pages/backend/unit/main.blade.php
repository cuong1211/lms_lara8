@push('namepage')
    Quản lý bài học
@endpush
@extends('layout.backend.index')
@section('title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Quản lý bài học</h4>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <a href="" class="btn btn-dark btn-add"><i class="mdi mdi-pencil-plus-outline">THÊM BÀI HỌC</i></a>
                            </div>
                        </div>
                    </form>
                </div>
                <h4 class="page-title">Khoá học: {{ App\models\Course::find($course_id)->name }}</h4>
                <div class="page-title-right button-list card-body">
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <a href="{{ route('slide.main',['course_id'=>$course_id]) }}" class="btn btn-primary">SLIDE</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <a href="{{route('quiz.main',['course_id'=>$course_id])}}" class="btn btn-info">CÂUHỎI</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <a href="{{ route('homework.main',['course_id'=>$course_id]) }}" class="btn btn-success">BÀI TẬP VỀ NHÀ</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table id="datatable" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th class="text-center">Stt</th>
                        <th class="text-center">Bài học</th>
                        <th class="text-center">Nội dung</th>
                        <th class="text-center">Slide</th>
                        <th class="text-center">Câu hỏi</th>
                        <th class="text-center">Bài tập về nhà</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @php
                        $count = 1;
                        
                    @endphp
                    @foreach ($unit as $item)
                        <tr>
                            <td class="text-center">{{ $count }}</td>

                            <td class="text-center">{{ $item->title }}: {{ $item->description }}</td>
                            <td class="text-center">
                                @if (isset($item->content))
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalLong{{ $item->id }}">
                                        Xem
                                    </button>
                                @else
                                    Không có
                                @endif

                            </td>
                            <td class="text-center">
                                @if ($item->slide_id == null)
                                    Không có
                                @else
                                    @if (App\models\Homework::find($item->homework_id) == null)
                                        Không có
                                    @else
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#exampleModalCenter{{ $item->id }}">
                                            Truy cập
                                        </button>
                                    @endif
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($item->quizzes_id == null)
                                    Không có
                                @else
                                    @if (App\models\Homework::find($item->quizzes_id) == null)
                                        Không có
                                    @else
                                        {{ $item->quiz->quiz }}
                                    @endif
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($item->homework_id == null)
                                    Không có
                                @else
                                    @if (App\models\Homework::find($item->homework_id) == null)
                                        Không có
                                    @else
                                        {{ $item->homework->title }}
                                    @endif
                                @endif
                            <td class="table-action text-center">
                                <a href="{{ url('/admin/course') . '/' . $course->id . '/unit' . '/' . $item->id . '/edit' }}"
                                    class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                <a href="{{ url('/admin/course') . '/' . $course->id . ('/unit' . '/' . $item->id . '/delete') }}"
                                    class="action-icon"> <i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                        
                        <div class="modal fade" id="exampleModalCenter{{ $item->id }}" tabindex="-1" role="dialog"
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
                                        @if ($item->slide_id == null)
                                            Không có
                                        @else
                                            <iframe src="{{ $item->slide->link }}" frameborder="0" width="100%"
                                                height="500"></iframe>
                                        @endif

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal fade bd-example-modal-lg" id="exampleModalLong{{$item->id}}" tabindex="-1" role="dialog" 
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
                        </div>
                    @endforeach
                </tbody> --}}
            </table>
            @include('pages.backend.unit.modal')
        </div>
    </div>
@endsection
@push('jscustom')
    <!-- Datatables js -->
    <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="assets/js/vendor/dataTables.bootstrap4.js"></script>
    <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
    <script src="assets/js/vendor/responsive.bootstrap4.min.js"></script>

    @include('pages.backend.unit.js')
@endpush
