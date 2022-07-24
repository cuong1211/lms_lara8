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
    @stack('js')
</body>

</html>
