<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.backend.source')
</head>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        @include('layout.backend.navbar')
        <div class="content-page">
            @yield('content')
        </div>
        <!-- Footer Start -->
        <footer class="footer">
            @include('layout.backend.footer')
        </footer>
    </div>

    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- third party js -->
    <script src="assets/js/vendor/apexcharts.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="assets/js/pages/demo.dashboard.js"></script>
    <script src="assets/js/vendor/dropzone.min.js"></script>
<!-- init js -->
<script src="assets/js/ui/component.fileupload.js"></script>
</body>

</html>
