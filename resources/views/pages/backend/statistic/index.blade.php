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
            <!-- end row-->
            <table class="table table-hover table-centered mb-0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Khoá Học</th>
                        <th>Lớp</th>
                   
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                        
                    @endphp
                    @foreach ($list_class as $item)
                    
                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$item->course_name}}</td>
                        <td>{{$item->class_name}}</td>
                        <td><a href="{{ route('static.view',['id_class' => $item->id ]) }}" class="btn btn-primary">XEM</a></td>
                  
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
