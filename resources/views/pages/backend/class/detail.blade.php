@extends('layout.backend.index')
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
                        </div>
                    </form>
                    <a href="">
                        <button type="button" class="btn btn-primary">BẢNG ĐIỂM</button>
                    </a>
                    <button type="button" class="btn btn-primary">THỐNG KÊ</button>
                </div>

                {{-- <h4 class="page-title">KHOÁ HỌC: {{ $course->name }}</h4>
                <h4 class="page-title">DANH SÁCH LỚP:{{$class->name}}</h4> --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table id="datatable" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ Tên</th>
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
