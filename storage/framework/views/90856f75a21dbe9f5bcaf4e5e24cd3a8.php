<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Guía de Chiapas con toda la información necesaria para viajar a Chiapas, reserva hoteles, tours en chiapas, renta de autos y todo para disfrutar de Chiapas." />
    <meta name="author" content="Mundo Chiapas" />
    <title>Detalles de la reserva | Mundo Chiapas</title>
    <link rel="shortcut icon" href="https://www.mundochiapas.com/assets/images/icon/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
    <!-- bootstrap -->
    <link href="https://www.mundochiapas.com/assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <style>
        body {
            background-image: linear-gradient(180deg, #eee, #fff 100px, #fff);
        }

        .pricing-header {
            max-width: 700px;
        }
    </style>
</head>


<body>
    <div class="container py-3">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                <a href="/booking_details" class="d-flex align-items-center text-dark text-decoration-none">
                    <img src="https://www.mundochiapas.com/assets/images/logo.png" style="height: 40px;" alt="Logo" />
                </a>
                <nav class="d-inline-flex" style="margin-left: auto !important;">
                    <a class="me-3 py-2 text-dark text-decoration-none" href="/booking_details">Salir</a>
                </nav>
            </div>
            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                <h1 class="display-6 fw-normal">N&uacute;mero de Reserva: <span class="text-danger"><?php echo e($res[0]->invoice_number); ?></span></h1>
                <p class="fs-5 text-muted text-center">¡Gracias por su reservaci&oacute;n!</p>
            </div>
        </header>
        <main>
            <div class="row">
                <!-- Left -->
                <div class="col-lg-7 order-2 order-sm-1">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Informaci&oacute;n de Contacto</h5>
                            <hr />
                            <div class="d-flex">
                                <b>Nombre Completo:</b>&nbsp;<?php echo e($res[0]->customer_name); ?>

                            </div>
                            <div class="d-flex">
                                <b>Tel&eacute;fono:</b>&nbsp;<?php echo e($res[0]->phone_customer == null ? '-' : $res[0]->phone_customer); ?>

                            </div>
                            <div class="d-flex">
                                <b>Correo:</b>&nbsp;<?php echo e($res[0]->email); ?>

                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Lista de Adultos</h5>
                            <div class="table-responsive">
                                <table class="table ">

                                    <tbody>
                                        <tr>
                                            <td><b>Driver Name</b></td>
                                            <td><?php echo e($res[0]->name_driver); ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Telephone</b></td>
                                            <td><?php echo e($res[0]->phone); ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Driver License</b></td>
                                            <td><?php echo e($res[0]->license); ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Car Name</b></td>
                                            <td><?php echo e($res[0]->car_name); ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Car Plate</b></td>
                                            <td><?php echo e($res[0]->plate); ?></td>
                                        </tr>

                                        <tr>
                                            <td><b>Photo Drivers</b></td>
                                            <td>
                                                <?php if($res[0]->photo == null): ?>
                                                <img height="150px" class="img rounded" src="<?php echo e(asset('public/images/user.png ')); ?>" alt="Header Avatar">
                                                <?php else: ?>
                                                <img height="150px" class="img rounded header-profile-user" src="<?php echo e(URL::asset ('public/admin/img/driver/' . $res[0]->photo )); ?>" alt="">
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <td><b>Gallery</b></td>
                                            <td></td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right -->
                <div class="col-lg-5  order-1 order-sm-2">
                    <div class="card position-sticky top-0">
                        <div class="p-3 bg-light bg-opacity-10">
                            <h5 class="card-title mb">Detalles de Reservaci&oacute;n</h5>
                            <hr />
                            <div class="d-flex">
                                <b>Quotation Number:</b>&nbsp;<?php echo e($res[0]->invoice_number); ?>

                            </div>
                            <div class="d-flex">
                                <b>Route Name:</b>&nbsp;<?php echo e($res[0]->route_name); ?>

                            </div>
                            <div class="d-flex">
                                <b>Departure city :</b>&nbsp;<?php echo e($res[0]->departure_city); ?>

                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <b>Departure date and time:</b><span><?php echo e($res[0]->departure_dates); ?></span>
                            </div>
                            <div class="d-flex">
                                <b>Destination City:</b>&nbsp;<?php echo e($res[0]->destination_city); ?>

                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <b>Returning date and time:</b><span><?php echo e($res[0]->returning_dates); ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <b>Car name:</b><span><?php echo e($res[0]->car_name); ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <b>Passengers:</b><span> <?php echo e($res[0]->passangers_num == null ? '-' : $res[0]->passangers_num); ?></span>
                            </div>


                            <div class="d-flex justify-content-between mb-1">
                                <b>Payment Status:</b>
                                <span class="badge <?php echo e($res[0]->payment_status == 'Partial' ? 'bg-warning' : 'bg-success'); ?>"><?php echo e($res[0]->payment_status); ?></span>
                            </div>

                            <div class="d-flex justify-content-between mb-1">
                                <b>Invoice:</b>
                                <?php $__currentLoopData = $invoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a target="_blank" class="badge bg-danger text-white" href="<?php echo e(asset('public/invoice/'. $in->name_invoice)); ?>"><?php echo e('Download'); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-between mb-4">
                                <b>Precio Total:</b> <strong class="text-dark">$ <?php echo e(number_format($res[0]->payment_total,2)); ?> MXN</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-4 small">
                                <b>Primer Pago:</b> <span>$ <?php echo e(number_format($res[0]->payment_total,2)); ?> MXN</span>
                            </div>
                            <div class="d-flex justify-content-between mb-4 small">
                                <b>Balance (Pending to pay):</b> <span>$ <?php echo e(number_format($res[0]->payment_total - $segundo,2)); ?> MXN</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <small class="d-block mb-3 text-muted">&copy; 2022</small>
                </div>
            </div>
        </footer>
    </div>
    <!--jquery-->
    <script src="https://www.mundochiapas.com/assets/js/jquery.min.js"></script>
    <!-- bootstrap -->
    <script src="https://www.mundochiapas.com/assets/js/bootstrap.js"></script>
    <!--popper-->
    <script src="https://www.mundochiapas.com/assets/popper/dist/umd/popper.min.js"></script>
</body>

</html>
<!--
    __                      _
  |   \    ___     __      | |     ___
  | |) |  / _ \   / _|     | |    / -_)
  |___/   \___/   \__|_   _|_|_   \___|
_|"""""|_|"""""|_|"""""|_|"""""|_|"""""|
"`-0-0-'"`-0-0-'"`-0-0-'"`-0-0-'"`-0-0-'

--><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/customers/details_booking.blade.php ENDPATH**/ ?>