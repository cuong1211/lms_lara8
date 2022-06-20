@extends('layout.backend.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <a href="{{ url('/admin/creatmeetings') }}" class="btn btn-dark"><i
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
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>PHÒNG</th>
                        <th>LOẠI</th>
                        <th>ThỜI GIAN</th>
                        <th>LINK</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
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
                </tbody>
            </table>
        </div>
    </div>
@endsection
