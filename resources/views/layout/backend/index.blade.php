<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.backend.source')
</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        @include('layout.backend.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                @include('layout.backend.header')
                <!-- end Topbar -->
                
                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                   @yield('title')
                    <!-- end page title -->

                    @yield('content')

                </div>
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start -->
            @include('layout.backend.footer')
            <!-- end Footer -->
            @yield('js')
            @stack('jscustom')
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    
</body>

</html>
