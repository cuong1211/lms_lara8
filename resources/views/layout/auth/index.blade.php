<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="{{ asset('backend') }}/">
        <meta charset="utf-8" />
        <title>Log In | Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app-creative.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-creative-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    </head>

    <body class="authentication-bg" data-layout-config='{"darkMode":false}'>

        @yield('content')
        <!-- end page -->

        <footer class="footer footer-alt">
            2018 - 2020 © Hyper - Coderthemes.com
        </footer>

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>
