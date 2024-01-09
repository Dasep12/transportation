<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Drivers </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/mx.png') }}">
    @include('layouts.head-css')
    <!-- JAVASCRIPT -->
    <script src="{{ URL::asset('public/build/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('public/build/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ URL::asset('public/build/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{ URL::asset('public/build/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ URL::asset('public/build/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{ URL::asset('public/build/libs/parsleyjs/parsley.min.js')}}"></script>

    <script src="{{ URL::asset('public/build/js/pages/form-validation.init.js')}}"></script>

    <!-- Required datatable js -->
    <script src="{{ URL::asset('public/build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('public/build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Required select2 js -->
    <script src="{{ URL::asset('public/build/libs/select2/js/select2.min.js') }}"></script>

    <!-- Required datapicker js -->
    <script src="{{ URL::asset('public/build/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('public/build/libs/@chenfengyuan/datepicker/datepicker.min.js') }}"></script>


    <!-- Required timpicker js -->
    <script src="{{ URL::asset('public/build/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>

    <!-- Required validation form -->
    <script src="{{ URL::asset('public/build/libs/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ URL::asset('public/build/js/pages/form-validation.init.js') }}"></script>


    <!-- apexcharts -->
    <script src="{{ URL::asset('public/build/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('public/build/js/pages/dashboard.init.js') }}"></script>


    <!-- form advanced init -->
    <script src="{{ URL::asset('public/build/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
    <script src="{{ URL::asset('public/build/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ URL::asset('public/build/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <!-- Magnific Popup-->
    <script src="{{ URL::asset('public/build/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    <!-- Include Moment.js CDN -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js">
    </script>


    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('public/build/libs/sweetalert2/sweetalert2.min.js') }}"></script>


</head>

@section('body')

<body data-sidebar="dark" data-layout-mode="light">
    @show
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.topbar')
        @include('layouts.layouts_drivers.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    @include('layouts.right-sidebar')
    <!-- /Right-bar -->

    <!-- JAVASCRIPT -->
    @include('layouts.vendor-scripts')
</body>

</html>