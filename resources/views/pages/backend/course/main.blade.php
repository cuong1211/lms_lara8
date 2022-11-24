@push('namepage')
    Quản lý khoá học
@endpush
@extends('layout.backend.index')
@section('title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Quản lý khoá học</h4>
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
                                <a href="" class="btn btn-dark btn-add"><i
                                        class="mdi mdi-pencil-plus-outline">THÊM MỚI</i> </a>
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
                        <th class="text-center">STT</th>
                        <th class="text-center">TÊN KHOÁ HỌC</th>
                        <th class="text-center">THỜI GIAN</th>
                        <th class="text-center">TÀI NGUYÊN</th>
                        <th class="text-center">LỚP</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @php
                        $count = 1;
                        
                    @endphp
                    @foreach ($course as $item)
                        <tr>
                            <td class="text-center">{{ $count }}</td>
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">{{ date('d-m-Y', strtotime($item->start_time)) }}</td>
                            <td class="text-center">
                                <a href="{{ url('/admin/course') . '/' . $item->id . '/unit' }}">
                                    <button type="button" class="btn btn-primary"><span>TRUY CẬP</span> </button>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ url('/admin/course') . '/' . $item->id . '/class' }}">
                                    <button type="button" class="btn btn-primary"><span>TRUY CẬP</span> </button>
                                </a>
                            </td>
                            <td class="table-action text-center">
                                <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                <a href="{{ url('admin/deletecourse' . '/' . $item->id) }}" class="action-icon"> <i
                                        class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endforeach
                </tbody> --}}
            </table>
            @include('pages.backend.course.modal')
        </div>
    </div>
@endsection
@push('jscustom')
    <!-- Datatables js -->
    <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="assets/js/vendor/dataTables.bootstrap4.js"></script>
    <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
    <script src="assets/js/vendor/responsive.bootstrap4.min.js"></script>

    @include('pages.backend.course.js')
@endpush
