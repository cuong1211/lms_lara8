@extends('layout.backend.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <a href="{{ url('/admin/course') . '/' . $course->id . '/createclass' }}"
                                    class="btn btn-dark"><i class="mdi mdi-pencil-plus-outline">THÊM MỚI</i> </a>
                            </div>
                        </div>
                    </form>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">
                        <span>
                            Nhập file csv
                        </span>
                    </button>
                </div>

                <h4 class="page-title">KHOÁ HỌC: {{ $course->name }}</h4>
                <h4 class="page-title">DANH SÁCH LỚP</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>LỚP</th>
                        <th>GIẢNG VIÊN</th>
                        <th>TRỢ GIẢNG</th>
                        <th>HỌC SINH</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                        
                    @endphp
                    @foreach ($classes as $item)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $item->name}}</td>
                            <td>
                                @if ($item->teacher_id == null)
                                    <span class="badge badge-danger">Không có giáo viên</span>
                                @else
                                    {{ $item->teacher->name }}
                                @endif
                            </td>
                            <td>
                                @if ($item->assistant_id == null)
                                    <span class="badge badge-danger">Không có trợ giảng</span>
                                @else
                                    {{ $item->assistant->name }}
                                @endif
                            </td>
                            <td>
                                asdsad
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
                </tbody>
            </table>
        </div>
    </div>
    {{-- modal input --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Nhập file csv</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('/admin/course') . '/' . $course->id . '/class/import'}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="file" name="file">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                  <button type="submit" class="btn btn-primary">Tải lên</button>
                </div>
            </form>
          </div>
        </div>
      </div>
@endsection
