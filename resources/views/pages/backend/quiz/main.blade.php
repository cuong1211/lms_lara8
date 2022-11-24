@extends('layout.backend.index')
@section('content')
    <!-- Bootstrap Boilerplate... -->
    <div class="panel-body">
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
                <h4 class="page-title">CÂU HỎI</h4>
            </div>
        </div>
        <!-- Display Validation Errors -->
        <div class="row">
            <div class="col-12">
                <table id="datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>CÂU HỎI</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @php
                            $count = 1;
                            
                        @endphp
                        @foreach ($quizzes as $quiz)
                            <tr>
                                <td>{{ $count }}</td>
                                <td><a
                                        href="{{ url('admin/course') . '/' . $id . '/quiz' . '/' . $quiz->id . '/show' }}">{{ $quiz->quiz }}</a>
                                </td>
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
            @include('pages.backend.quiz.modal')
            </div>
        </div>
    </div>

    </div>
@endsection
@push('jscustom')
    <!-- Datatables js -->
    <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="assets/js/vendor/dataTables.bootstrap4.js"></script>
    <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
    <script src="assets/js/vendor/responsive.bootstrap4.min.js"></script>

    @include('pages.backend.quiz.js')
@endpush
