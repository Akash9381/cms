<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min2167.css?v=3.2.0')}}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('admin.layouts.header')
        @include('admin.layouts.sidebar')
        @yield('content')

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Developed By</b> <a href="https://design2creative.com/">Design 2Creative</a>
            </div>
            <strong>Copyright &copy; <a href="#">Address Makers</a>.</strong> All rights reserved.
        </footer>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>


    <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>

    <script src="{{asset('admin/dist/js/adminlte.min2167.js?v=3.2.0')}}"></script>

    <script src="{{asset('admin/dist/js/demo.js')}}"></script>
    <script>
        $(function () {
            $('.select2').select2()
        });
    </script>
</body>


</html>
