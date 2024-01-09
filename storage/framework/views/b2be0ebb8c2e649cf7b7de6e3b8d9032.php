<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="lIAk4ww1QWgOS0yljrq1gV3inD6SKPuz9vwN5xgG" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Guía de Chiapas con toda la información necesaria para viajar a Chiapas, reserva hoteles, tours en chiapas, renta de autos y todo para disfrutar de Chiapas." />
    <meta name="author" content="Mundo Chiapas" />
    <title>Selecciona la forma de pago | Mundo Chiapas</title>
    <link rel="shortcut icon" href="https://tours.mundochiapas.com/assets/tours2022/images/icon/favicon.png">
    <link rel="preconnect" crossorigin href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link crossorigin href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
    <!-- bootstrap -->
    <!-- <link href="https://tours.mundochiapas.com/assets/tours2022/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen" /> -->
    <link href="https://tours.mundochiapas.com/assets/tours2022/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />
    <!-- validatejs -->
    <link rel="stylesheet" href="https://tours.mundochiapas.com/assets/tours2022/validatejs/screen.css">

    <!--fontawesom-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://tours.mundochiapas.com/assets/tours/css/validationEngine.jquery.css" type="text/css" media="screen" />
    <style>
        body {
            background-color: #dfdfdf;
            /*margin-top:20px;*/
        }

        .form-select {
            background-position: right.75rem center;
        }

        .form-check {
            width: 100%;
        }

        .radio-form {
            float: none !important;
            margin-right: 0 !important;
        }

        .badge {
            font-size: 1.2em;
        }

        .container-custom {
            width: 100%;
            padding-left: var(--bs-gutter-x, .75rem);
            padding-right: var(--bs-gutter-x, .75rem);
            margin-left: auto;
            margin-right: auto;
        }




        ::selection {
            background: #d5bbf7;
        }

        .card2 {
            max-width: 350px;
            width: 100%;
            /* margin: 170px auto; */
            background: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        }

        .card2 .title {
            font-size: 22px;
            font-weight: 500;
        }

        .card2 .content {
            margin-top: 20px;
        }

        .card2 label.box {
            background: #ddd;
            margin-top: 12px;
            padding: 10px 12px;
            display: flex;
            border-radius: 5px;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        #one:checked~label.first,
        #two:checked~label.second,
        #three:checked~label.third {
            border-color: #8E49E8;
            background: #d5bbf7;
        }

        .card label.box:hover {
            background: #d5bbf7;
        }

        .card2 label.box .circle {
            height: 22px;
            width: 22px;
            background: #ccc;
            border: 5px solid transparent;
            display: inline-block;
            margin-right: 15px;
            border-radius: 50%;
            transition: all 0.25s ease;
            box-shadow: inset -4px -4px 10px rgba(0, 0, 0, 0.2);
        }

        #one:checked~label.first .circle,
        #two:checked~label.second .circle,
        #three:checked~label.third .circle {
            border-color: #8E49E8;
            background: #fff;
        }

        .card2 label.box .plan {
            display: flex;
            width: 100%;
            align-items: center;
        }

        .card2 input[type="radio"] {
            display: none;
        }

        /*  */
        .success-container {
            left: 50%;
            top: 50%;
            width: 600px;
            transform: translate(-50%, -50%);
            position: fixed;
        }

        .modalbox.success {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            background: #fff;
            padding: 25px 25px 15px;
            text-align: center;
        }

        .modalbox.success.animate .icon {
            -webkit-animation: fall-in 0.75s;
            -moz-animation: fall-in 0.75s;
            -o-animation: fall-in 0.75s;
            animation: fall-in 0.75s;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }

        .modalbox.success h1 {
            font-family: 'Montserrat', sans-serif;
        }

        .modalbox.success p {
            font-family: 'Open Sans', sans-serif;
        }

        .modalbox.success .icon {
            position: relative;
            margin: 0 auto;
            margin-top: -75px;
            background: #4caf50;
            height: 100px;
            width: 100px;
            border-radius: 50%;
        }

        .modalbox.success .icon span {
            postion: absolute;
            font-size: 4em;
            color: #fff;
            text-align: center;
            padding-top: 20px;
        }

        .center {
            float: none;
            margin-left: auto;
            margin-right: auto;
            /* stupid browser compat. smh */
        }

        .center .change {
            clearn: both;
            display: block;
            font-size: 10px;
            color: #ccc;
            margin-top: 10px;
        }

        /*  */


        /* loader */
        /* Absolute Center Spinner */
        .loading {
            position: fixed;
            z-index: 999;
            height: 2em;
            width: 2em;
            overflow: show;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }

        /* Transparent Overlay */
        .loading:before {
            content: '';
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));

            background: -webkit-radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));
        }

        /* :not(:required) hides these rules from IE9 and below */
        .loading:not(:required) {
            /* hide "loading..." text */
            font: 0/0 a;
            color: transparent;
            text-shadow: none;
            background-color: transparent;
            border: 0;
        }

        .loading:not(:required):after {
            content: '';
            display: block;
            font-size: 10px;
            width: 1em;
            height: 1em;
            margin-top: -0.5em;
            -webkit-animation: spinner 150ms infinite linear;
            -moz-animation: spinner 150ms infinite linear;
            -ms-animation: spinner 150ms infinite linear;
            -o-animation: spinner 150ms infinite linear;
            animation: spinner 150ms infinite linear;
            border-radius: 0.5em;
            -webkit-box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
            box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
        }

        /* Animation */

        @-webkit-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @-moz-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @-o-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>

    <div class="loading" id="loading" style="display: none;">Loading&#8230;</div>


    <!--class="container"-->
    <!--style="box-sizing: border-box;"-->
    <div class="container-custom">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex align-items-center p-3 my-3 rounded shadow-sm" style="background-color: #ffffff;">
                    <img class="me-3" src="https://tours.mundochiapas.com/assets/tours2022/images/logo.png" alt="Mundo Chiapas" height="50" />
                    <div class="lh-1">
                    </div>
                </div>
            </div>
        </div>
        <!--<h1 class="h3 mb-5">Selecciona la forma de pago que mas te convenga</h1>-->
        <div class="row">

            <div class="col-lg-8">
                <form action="https://www.mundochiapas.com/tours-en-chiapas/saami/transport/process.php" name="form" id="valid_form" method="post">

                    <div class="card top-0 mb-3">
                        <div class="card-body">
                            <div class="comment-text-sm ">
                                <label class="mb-5" for="">H1 - Gracias por confirmar tu servicio con </label> <a class="mt-5 mb-4" href="https://www.mundochiapas.com/">Mundochiapas.com</a><br>



                                <p><b class="mb-4"> Estimado (a) <?php echo e($mailData['res']['customer_name']); ?></b></p>

                                <p>En Mundochiapas, siempre buscamos la manera de hacer su experiencia lo más cómoda y conveniente posible. Sabemos que algunos clientes prefieren realizar pagos en persona, y estamos encantados de recibirlos en nuestra oficina en cualquier momento.</p>

                                <p>Sin embargo, también queremos ofrecerles opciones de pago adicionales para su comodidad. Pueden realizar pagos de diversas maneras, como transferencia electrónica, pago con tarjeta en línea, depósito bancario o en efectivo.</p>

                                <p>Queremos que elijan la opción que les resulte más conveniente.</p>

                                <p>No duden en contactarnos si tienen alguna pregunta o necesitan más información sobre estas opciones de pago. Estamos aquí para ayudarles en todo momento.</p>

                                <p>Agradecemos su confianza en <a href="https://www.mundochiapas.com/">Mundochiapas.com</a> y esperamos seguir brindándoles un servicio excepcional.</p>

                                <p>Atentamente,</p><br>


                                Reservaciones<br>
                                <a href="https://www.mundochiapas.com/">Mundochiapas.com</a> <br>
                                961 219 2714<br></span>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

            <div class="col-lg-4">
                <div class="card card2 top-0 mb-3 p-5">
                    <div>
                        <h4 class="heading mb-4">Payment Type</h4>
                    </div>

                    <div class="content">

                        <label for="one" class="box first">
                            <div class="plan">
                                <span class="circle"></span>
                                <span class="yearly">Transferencia Electrónica</span>
                            </div>
                            <span class="price"></span>
                        </label>
                        <label for="two" class="box second">
                            <div class="plan">
                                <span class="circle"></span>
                                <span class="yearly">Pagos con Tarjeta</span>
                            </div>
                            <span class="price"></span>
                        </label>
                        <label for="three" class="box third">
                            <div class="plan">
                                <span class="circle"></span>
                                <span class="yearly">Depósito Bancario en Efectivo</span>
                            </div>
                            <span class="price"></span>
                        </label>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <label for="">
        <i>If you have trouble to read this email content, please try with WEB VERSION: <a href="https://solomon.mundochiapas.com/notifEmail?q=<?php echo e(base64_encode($mailData['res']['id'])); ?>">https://solomon.mundochiapas.com/notifEmail?q=<?php echo e(base64_encode($mailData['res']['id'])); ?> </a> </i>
    </label>




    <!--jquery-->
    <!--<script src="https://tours.mundochiapas.com/assets/tours2022/js/jquery.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <script src="https://tours.mundochiapas.com/assets/tours2022/popper/dist/umd/popper.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {

        })
    </script>
</body>

</html><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/email/notification_email.blade.php ENDPATH**/ ?>