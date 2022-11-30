@extends('layout.backend.index')
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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table id="datatable" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>LỚP</th>
                        <th>Giáo viên</th>
                        <th>Chi tiết lớp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @php
                        $count = 1;
                        
                    @endphp
                    @foreach ($classes as $item)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if ($item->user_id == null)
                                    <p>Chưa có giáo viên</p>
                                @else
                                    {{ $item->user->name }}
                                @endif
                            <td class="table-action">
                                <a href="{{ route('class.detail', ['course_id' => $course->id, 'id' => $item->id]) }}"><button
                                        type="button" class="btn btn-primary">Chi tiết</button></a>

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
        @include('pages.backend.class.modal')
    </div>
@endsection
@push('jscustom')
    <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="assets/js/vendor/dataTables.bootstrap4.js"></script>
    <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
    <script src="assets/js/vendor/responsive.bootstrap4.min.js"></script>
    @include('pages.backend.class.js')
@endpush
