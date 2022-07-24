<base href="{{ asset('backend') }}/">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico">

<!-- third party css -->
<link href="assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<!-- third party css end -->
@yield('body')
<!-- App css -->
<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<link href="assets/css/app-creative.min.css" rel="stylesheet" type="text/css" id="light-style" />
<link href="assets/css/app-creative-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
<link href="assets/css/vendor/summernote-bs4.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-3.2.0.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js" defer></script>



@push('js')
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
    
@endpush
<!-- third party js ends -->

<!-- demo app -->
