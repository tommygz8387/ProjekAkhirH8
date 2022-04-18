<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login Page Tokoku</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/') }}vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('/') }}vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/') }}css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('/') }}images/favicon.png" />

</head>

<body>
    @yield('login')
    <!-- plugins:js -->
    <script src="{{ asset('/') }}vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('/') }}js/off-canvas.js"></script>
    <script src="{{ asset('/') }}js/hoverable-collapse.js"></script>
    <script src="{{ asset('/') }}js/template.js"></script>
    <script src="{{ asset('/') }}js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
