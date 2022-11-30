@push('namepage')
    Quản lý Bài tập về nhà
@endpush
@extends('layout.backend.index')
@section('title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Quản lý bài tập về nhà</h4>
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
                                <a href="" class="btn btn-dark btn-add"><i class="mdi mdi-pencil-plus-outline">THÊM MỚI</i> </a>
                            </div>
                        </div>
                    </form>
                </div>
                <h4 class="page-title">Khoá học: {{ App\models\Course::find($course_id)->name }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table id="datatable" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">TÊN BÀI TẬP</th>
                        <th class="text-center">NỘI DUNG</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                </thead>
            </table>
        @include('pages.backend.homework.modal')
        </div>
    </div>
@endsection
@push('jscustom')
    <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="assets/js/vendor/dataTables.bootstrap4.js"></script>
    <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
    <script src="assets/js/vendor/responsive.bootstrap4.min.js"></script>
    @include('pages.backend.homework.js')
@endpush
