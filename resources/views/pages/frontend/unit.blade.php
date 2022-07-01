@extends('layout.frontend.index')
@section('content')


<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{url('/course')}}">Khoá học</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/course').'/'.$course->id.('/lesson')}}">{{$course->name}}</a></li>
                        <li class="breadcrumb-item active">{{$unit->title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    <div class="row">
        <div class="col-xl-8 col-lg-6">
            <!-- project card -->
            <div class="card d-block">
                <div class="card-body">
                    <!-- project title-->
                    <h3 class="mt-0">
                        {{$unit->title}}
                    </h3>

                    <h5>Giới thiệu về bài học:</h5>

                    <p class="text-muted mb-2">
                        With supporting text below as a natural lead-in to additional contenposuere erat a ante. Voluptates, illo, iste itaque voluptas
                        corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores libero voluptas quod perferendis! Voluptate,
                        quod illo rerum? Lorem ipsum dolor sit amet.
                    </p>

                    <p class="text-muted mb-4">
                        Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores
                        libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet. With supporting text below
                        as a natural lead-in to additional contenposuere erat a ante.
                    </p>

                    <div>
                        <h5>GIÁO VIÊN:</h5>
                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mat Helme" class="d-inline-block">
                            <img src="assets/images/users/avatar-6.jpg" class="rounded-circle img-thumbnail avatar-sm" alt="friend">
                        </a>
                    </div>

                </div> <!-- end card-body-->
                
            </div> <!-- end card-->

            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 mb-3">Câu hỏi về bài học</h4>

                    <textarea class="form-control form-control-light mb-2" placeholder="Write message" id="example-textarea" rows="3"></textarea>
                    <div class="text-right">
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-link btn-sm text-muted font-18"><i class="dripicons-paperclip"></i></button>
                        </div>
                        <div class="btn-group mb-2 ml-2">
                            <button type="button" class="btn btn-primary btn-sm">Đăng</button>
                        </div>
                    </div>

                    <div class="media mt-2">
                        <img class="mr-3 avatar-sm rounded-circle" src="assets/images/users/avatar-3.jpg" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0">Jeremy Tomlinson</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in
                            vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                            in faucibus.
                    
                            <div class="media mt-3">
                                <a class="pr-3" href="#">
                                    <img src="assets/images/users/avatar-4.jpg" class="avatar-sm rounded-circle" alt="Generic placeholder image">
                                </a>
                                <div class="media-body">
                                    <h5 class="mt-0">Kathleen Thomas</h5>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in
                                    vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue
                                    felis in faucibus.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-2">
                        <a href="javascript:void(0);" class="text-danger">Load more </a>
                    </div>
                </div> <!-- end card-body-->
            </div>
            <!-- end card-->
        </div> <!-- end col -->

        <div class="col-lg-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Slide</h5>
                    <iframe src="{{ $unit->slide->link }}" frameborder="0"
                        width="450" height="320" allowfullscreen="true"
                        mozallowfullscreen="true"
                        webkitallowfullscreen="true"></iframe>
                </div>
            </div>
            <!-- end card-->

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Tài liệu bài học</h5>
                    
                    <div class="card mb-1 shadow-none border">
                        <div class="p-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar-sm">
                                        <span class="avatar-title rounded">
                                            .ZIP
                                        </span>
                                    </div>
                                </div>
                                <div class="col pl-0">
                                    <a href="javascript:void(0);" class="text-muted font-weight-bold">Hyper-admin-design.zip</a>
                                    <p class="mb-0">2.3 MB</p>
                                </div>
                                <div class="col-auto">
                                    <!-- Button -->
                                    <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                        <i class="dripicons-download"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-1 shadow-none border">
                        <div class="p-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img src="assets/images/projects/project-1.jpg" class="avatar-sm rounded" alt="file-image" />
                                </div>
                                <div class="col pl-0">
                                    <a href="javascript:void(0);" class="text-muted font-weight-bold">Dashboard-design.jpg</a>
                                    <p class="mb-0">3.25 MB</p>
                                </div>
                                <div class="col-auto">
                                    <!-- Button -->
                                    <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                        <i class="dripicons-download"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-0 shadow-none border">
                        <div class="p-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-secondary rounded">
                                            .MP4
                                        </span>
                                    </div>
                                </div>
                                <div class="col pl-0">
                                    <a href="javascript:void(0);" class="text-muted font-weight-bold">Admin-bug-report.mp4</a>
                                    <p class="mb-0">7.05 MB</p>
                                </div>
                                <div class="col-auto">
                                    <!-- Button -->
                                    <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                        <i class="dripicons-download"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

</div>
<!-- container -->

</div>
@endsection