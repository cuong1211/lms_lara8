<!DOCTYPE html>
    <html lang="en">

    <head>
        
        @include('layout.frontend.source')
    </head>

    <body class="loading" data-layout="topnav" data-layout-config='{"layoutBoxed":false,"darkMode":false,"showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            @include('layout.frontend.header')

            <div class="content-page">
                <!-- content -->
                @yield('content')
                <!-- Footer Start -->
                <footer class="footer">
                    @include('layout.frontend.footer')
                </footer>
                <!-- end Footer -->
                
            </div>
            @stack('script')

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->

        <div class="rightbar-overlay"></div>
        <!-- /Right-bar -->

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
    </body>
</html>