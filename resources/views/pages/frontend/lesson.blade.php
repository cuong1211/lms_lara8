@extends('layout.frontend.index')
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/course') }}">Khoá học</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $course->name }}</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">KHOÁ HỌC: {{ $course->name}}</h4>
                    <h4 >LỚP: {{ $class_user[0]['classes']['name']}}</h4>
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


        <!-- end row-->

        <div class="row">
            @foreach ($unit as $item)
                <div class="col-md-6 col-xl-3">
                    <!-- project card -->
                    <a href="{{ route('frontend.unit',['user_id'=>$user_id,'class_id'=>$class_id,'course_id'=>$course->id,'id'=>$item->id])}}" class="text-title">
                        <div class="card d-block">
                            <!-- project-thumbnail -->
                            <img class="card-img-top" src="uploads/courses/{{ $item->course->img }}"
                                alt="project image cap">
                            <div class="card-img-overlay">
                                <div class="badge badge-secondary p-1">Đang học</div>
                            </div>

                            <div class="card-body position-relative">
                                <!-- project title-->
                                <h4 class="mt-0">
                                    <span>{{ $item->title }} : {{ $item->description}}</span>
                                </h4>

                                <!-- project detail-->

                                <!-- project progress-->
                                <p class="mb-2 font-weight-bold">Tiến trình <span class="float-right">45%</span></p>
                                <div class="progress progress-sm">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                        aria-valuemax="100" style="width: 45%;">
                                    </div><!-- /.progress-bar -->
                                </div><!-- /.progress -->
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </a>
                </div> <!-- end col -->
            @endforeach
        </div>
        <!-- end row-->

    </div>
    <!-- container -->

    </div>
@endsection
