@extends('layout.backend.index')
@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Thống kê lớp </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row mb-2">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-8">
                   
                </div><!-- end col-->
            </div>
            <!-- end row-->
            <table class="table table-hover table-centered mb-0">
                <thead>
                    <tr>
                        <th>Số học viên</th>
                        <th>Số học sinh hoàn thành bài tập</th>
                        <th>Số học sinh hoàn thành bài kiểm tra</th>
                        <th>Số học sinh hoàn thành đồ án</th>
                   
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$siso}}</td>
                        <td>{{$btd}}</td>
                        <td>{{$ktd}}</td>
                        <td>{{$dad}}</td>
                       
                  
                    </tr>
                </tbody>
            </table>   

           

        </div>
        <!-- container -->

    </div>
@endsection
