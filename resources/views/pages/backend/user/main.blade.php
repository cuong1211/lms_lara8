@push('namepage')
    Quản lý học sinh
@endpush
@extends('layout.backend.index')
@section('title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Danh sách học sinh</h4>
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
                    <button type="button" class="btn btn-warning" data-toggle="modal"
                        data-target="#exampleModalCenter">
                        <span>
                            Nhập file csv
                        </span>
                    </button>
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
                        <th>TÊN</th>
                        <th>EMAIL</th>
                        <th>SĐT</th>
                        <th>ĐỊA CHỈ</th>
                        <th>NGÀY SINH</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @php
                        $count = 1;
                        
                    @endphp
                    @foreach ($user as $item)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="badge badge-success">Hoạt động</span>
                                @else
                                    <span class="badge badge-danger">Không hoạt động</span>
                                @endif
                            </td>
                            <td class="table-action">
                                <a href="{{ url('admin/user' . '/' . $item->id . '/edit') }}" class="action-icon"> <i
                                        class="mdi mdi-pencil"></i></a>
                                <a href="{{ url('admin/user' . '/' . $item->id . '/delete') }}" class="action-icon"> <i
                                        class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endforeach
                </tbody> --}}
            </table>
        </div>
        @include('pages.backend.user.modal')
    </div>
    
@endsection
@push('jscustom')
    <!-- Datatables js -->
    <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="assets/js/vendor/dataTables.bootstrap4.js"></script>
    <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
    <script src="assets/js/vendor/responsive.bootstrap4.min.js"></script>
    @include('pages.backend.user.js')
@endpush