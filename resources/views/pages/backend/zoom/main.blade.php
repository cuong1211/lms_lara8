@push('namepage')
    Quản lý phòng zoom
@endpush
@extends('layout.backend.index')
@section('title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Quản lý phòng zoom</h4>
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
                <h4 class="page-title">KHOÁ HỌC</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table id="datatable" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>PHÒNG</th>
                        <th>LINK</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @php
                        $count = 1;
                        
                    @endphp
                    @foreach ($zoom as $item)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $item->topic }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->start_time }}</td>
                            <td><a class="btn btn-primary" href="{{ $item->join_url }}" role="button">Link</a></td>
                            <td>
                                <form action="{{ url('api/meetings') . '/' . $item['id'] }}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit"
                                        class="btn iq-bg-danger btn-rounded btn-sm my-0">Remove</button></span>
                                </form>
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endforeach
                </tbody> --}}
            </table>
        </div>
        @include('pages.backend.zoom.modal')
    </div>
@endsection
@push('jscustom')
    <!-- Datatables js -->
    <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="assets/js/vendor/dataTables.bootstrap4.js"></script>
    <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
    <script src="assets/js/vendor/responsive.bootstrap4.min.js"></script>

    @include('pages.backend.zoom.js')
@endpush
