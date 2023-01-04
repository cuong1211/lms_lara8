@push('namepage')
    Chi tiết lớp học
@endpush
@extends('layout.backend.index')
@section('title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Chi tiết lớp học</h4>
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
                                <a href="" class="btn btn-dark btn-add"><i class="mdi mdi-pencil-plus-outline">THÊM HỌC SINH</i></a>
                            </div>
                            <div class="input-group">
                                <a href="" class="btn btn-danger" id="btn-delete-all" style="display:none" ><i class="mdi mdi-delete">XOÁ TẤT CẢ</i></a>
                            </div>
                        </div>
                    </form>
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <a href="{{route('point.main',['course_id' => $course_id,'class_id'=> $class_id])}}">
                                    <button type="button" class="btn btn-primary "><i class="mdi mdi-format-list-numbered">BẢNG ĐIỂM</i></button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="page-title-left">
                <h4 class="page-title">Khoá học: {{ App\models\Course::find($course_id)->name }}</h4>
                <h4 class="page-title">Danh sách lớp: {{App\models\Classes::find($class_id)->name}}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table id="datatable" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="check_all_box" name="select_all"  onclick='selectsall()'></th>
                        <th>Họ Tên</th>
                        <th>Ngày sinh</th>
                        <th>Action</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @php
                        $count = 1;
                        
                    @endphp
                    @foreach ($classdetail as $item)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $item->user_name }}</td>
                            <td class="table-action">
                                <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                <a href="" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endforeach
                </tbody> --}}
            </table>
        </div>
        @include('pages.backend.class.modaldetail')
    </div>
@endsection
@push('jscustom')
    <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="assets/js/vendor/dataTables.bootstrap4.js"></script>
    <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
    <script src="assets/js/vendor/responsive.bootstrap4.min.js"></script>
    @include('pages.backend.class.jsdetail')
@endpush
