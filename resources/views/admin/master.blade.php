<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Meta -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}">

    <!-- Common Css Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/bootstrap/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">


    <!-- Vendor Css Files -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/overlay-scroll/OverlayScrollbars.min.css') }}">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="page-wrapper">
        <!-- Site wrapper -->
        <div class="main-container">
            @include('admin.layouts.header')

            <!-- Left side column. contains the sidebar -->
            @include('admin.layouts.menu')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="alert">
                        <h4>@yield('title-page')</h4>
                    </div>
                </section>

                <!-- Main content -->
                @yield('main-content')
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            @include('admin.layouts.footer')

        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/modernizr.js') }}"></script>
        <script src="{{ asset('assets/js/moment.js') }}"></script>

        <!-- Vendor Js Files -->
        <script src="{{ asset('assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/overlay-scroll/custom-scrollbar.js') }}"></script>

        <!-- Apex Charts -->
        <script src="{{ asset('assets/vendor/apex/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/apex/custom/sales/salesGraph.js') }}"></script>
        <script src="{{ asset('assets/vendor/apex/custom/sales/revenueGraph.js') }}"></script>
        <script src="{{ asset('assets/vendor/apex/custom/sales/taskGraph.js') }}"></script>

        <!-- Main Js Required -->
        <script src="{{ asset('assets/js/main.js') }}"></script>

        @yield('custom-js')
    </div>
</body>

</html>
