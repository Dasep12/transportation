<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8" />
    <title> <?php echo $__env->yieldContent('title'); ?> | Admin </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(URL::asset('public/build/images/mx.png')); ?>">
    <?php echo $__env->make('layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- JAVASCRIPT -->
    <script src="<?php echo e(URL::asset('public/build/libs/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/build/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/build/libs/metismenu/metisMenu.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/build/libs/simplebar/simplebar.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/build/libs/node-waves/waves.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/build/libs/parsleyjs/parsley.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('public/build/js/pages/form-validation.init.js')); ?>"></script>

    <!-- Required datatable js -->
    <script src="<?php echo e(URL::asset('public/build/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>

    <!-- Required select2 js -->
    <script src="<?php echo e(URL::asset('public/build/libs/select2/js/select2.min.js')); ?>"></script>

    <!-- Required datapicker js -->
    <script src="<?php echo e(URL::asset('public/build/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/build/libs/@chenfengyuan/datepicker/datepicker.min.js')); ?>"></script>

    <!-- Required timpicker js -->
    <script src="<?php echo e(URL::asset('public/build/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js')); ?>"></script>


    <!-- Required validation form -->
    <script src="<?php echo e(URL::asset('public/build/libs/parsleyjs/parsley.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/build/js/pages/form-validation.init.js')); ?>"></script>


    <!-- apexcharts -->
    <script src="<?php echo e(URL::asset('public/build/libs/apexcharts/apexcharts.min.js')); ?>"></script>

    <!-- dashboard init -->
    <script src="<?php echo e(URL::asset('public/build/js/pages/dashboard.init.js')); ?>"></script>


    <!-- form advanced init -->
    <script src="<?php echo e(URL::asset('public/build/libs/spectrum-colorpicker2/spectrum.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/build/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/build/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')); ?>"></script>
    <!-- Magnific Popup-->
    <script src="<?php echo e(URL::asset('public/build/libs/magnific-popup/jquery.magnific-popup.min.js')); ?>"></script>

    <!-- Include Moment.js CDN -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js">
    </script>


    <!-- Include highcharts CDN -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- <script src="https://code.highcharts.com/stock/highstock.js"></script> -->
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/stock/modules/accessibility.js"></script>


    <script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>

    <!-- Chart JS -->
    <script src="<?php echo e(URL::asset('public/build/libs/chart.js/chart.umd.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/build/js/pages/chartjs.init.js')); ?>"></script>

</head>

<?php $__env->startSection('body'); ?>

<!-- <body data-sidebar="dark" data-layout-mode="light"> -->

<body data-topbar="dark" data-layout="horizontal">
    <?php echo $__env->yieldSection(); ?>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php echo $__env->make('layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layouts.horizontal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <!-- <div class="container-fluid"> -->
                <?php echo $__env->yieldContent('content'); ?>
                <!-- </div> -->
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <?php echo $__env->make('layouts.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Right-bar -->

    <!-- JAVASCRIPT -->
    <?php echo $__env->make('layouts.vendor-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/layouts/master.blade.php ENDPATH**/ ?>