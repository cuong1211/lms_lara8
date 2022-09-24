@extends('layout.backend.index')
@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Thống kê</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row mb-2">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-8">
                    <div class="text-sm-right">
                        <div class="btn-group mb-3">
                            <button type="button" class="btn btn-primary">Tất cả</button>
                        </div>
                        <div class="btn-group mb-3 ml-1">
                            <button type="button" class="btn btn-light">Đang học</button>
                            <button type="button" class="btn btn-light">Hoàn thành</button>
                        </div>
                    </div>
                </div><!-- end col-->
            </div>
            <!-- end row-->
            <table class="table table-hover table-centered mb-0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Lớp</th>
                        <th>Khoá Học</th>
                   
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                        
                    @endphp
                    @foreach ($list_class as $item)
                    
                    <tr>
                        <td>{{$count}}</td>
                        <td><a href="{{ route('static.view',['id_class' => $item->id ]) }}">{{$item->class_name}}</a></td>
                        <td><span class="badge badge-primary">{{$item->course_name}}</span></td>
                  
                    </tr>
                    @php
                    $count++;
                @endphp
                    @endforeach
                    
                  
                </tbody>
            </table>   

           

        </div>
        <!-- container -->

    </div>
@endsection
