@push('namepage')
    Bảng điểm
@endpush
@extends('layout.backend.index')
@section('title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Bảng điểm</h4>
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
                        </div>
                    </form>
                </div>
            </div>
            <h5 class="page-title">Khoá học: {{ App\models\Course::find($course_id)->name }}</h5>
            <h5 class="page-title">Lớp: {{ App\models\Classes::find($class_id)->name }}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table id="datatable" class="table dt-responsive nowrap w-100">
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
            </table>
            @include('pages.backend.point.modal')
        </div>
    </div>
@endsection
@push('jscustom')
    <!-- Datatables js -->
    <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="assets/js/vendor/dataTables.bootstrap4.js"></script>
    <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
    <script src="assets/js/vendor/responsive.bootstrap4.min.js"></script>

    @include('pages.backend.point.js')
@endpush
