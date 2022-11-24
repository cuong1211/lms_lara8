<div class="left-side-menu">

    <!-- LOGO -->
    <a href="{{url('/admin')}}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="{{route('backend.home')}}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="left-side-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="metismenu side-nav">
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> KHOÁ HỌC </span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{url('/admin/course')}}">QUẢN LÝ</a>
                    </li>
                </ul>
            </li>
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> ZOOM </span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{url('/admin/zoom')}}">QUẢN LÝ</a>
                    </li>
                </ul>
            </li>
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> NGƯỜI DÙNG </span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{url('/admin/user')}}">HỌC SINH</a>
                    </li>
                    <li>
                        <a href="{{route('teacher.main')}}">GIÁO VIÊN</a>
                    </li>
                </ul>
            </li>
            <li class="side-nav-item">
                <a href="{{route('mark.index')}}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span>CHẤM ĐIỂM</span>
                </a>
            </li>
                <a href="{{url('/admin/static')}}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> THỐNG KÊ </span>
                </a>
               
            </li>
            

        </ul>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->
</div>
