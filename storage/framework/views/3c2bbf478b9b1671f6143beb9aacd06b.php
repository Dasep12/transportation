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

    <link rel="stylesheet" href="<?php echo e(URL::asset('public/css_pdf/style_notif.css')); ?>">
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

            <input type="text" hidden name="idxQuotes" value="<?php echo e($_GET['q']); ?>" id="idxQuotes">
            <div class="col-lg-8">
                <form action="https://www.mundochiapas.com/tours-en-chiapas/saami/transport/process.php" name="form" id="valid_form" method="post">

                    <div class="card top-0 mb-3">
                        <div class="card-body">
                            <div class="comment-text-sm ">
                                <label class="mb-5" for="">H1 - Gracias por confirmar tu servicio con </label> <a class="mt-5 mb-4" href="https://www.mundochiapas.com/">Mundochiapas.com</a><br>



                                <p><b class="mb-4"> Estimado (a) <?php echo e($res->customer_name); ?></b></p>

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
                        <input type="radio" name="payType" value="transfer" id="one">
                        <input type="radio" name="payType" value="visa" id="two">
                        <input type="radio" name="payType" value="deposito" id="three">
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
                    <button id="btnIdx" disabled type="button" class="btn btn-primary mt-2"><i class="fas fa-dollar"></i> Process Payment</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Transfer Info -->
    <div id="myModalTransfer" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <h4 class="modal-title w-100"> Notification</h4>
                </div>
                <div class="modal-body">
                    <p>
                        <b>Transferencia Electrónica</b>
                    </p>

                    <p>Clabe Interbancaria <b>072100008474676974</b></p>

                    <p>Cuenta <b>0847467697</b></p>
                    <p>PROMOTORA MEXICO DE TURISMO SA DE CV</p>
                    <p> RFC <b>PMT120808EP6</b></p>
                    <p>BANORTE</p>
                    <p>1495-SUCURSAL TUXTLA LOS LAURELES</p>
                    <p class="text-primary font-weight-bold">egresos@mundochiapas.com
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Transfer Info -->
    <div id="myModalDeposito" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <h4 class="modal-title w-100"> Notification</h4>
                </div>
                <div class="modal-body">
                    <p>
                        <b>Depósito Bancario en Efectivo</b>
                    </p>

                    <p>Miguel Renero Montalvo </p>

                    <p>Banamex</p>
                    <p><b>5204 1655 0625 2197 </b></p>

                    <p><b>$ <?php echo e(number_format($amount,2)); ?></b></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Information success -->
    <div id="informationSuccessMail" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-body">
                <div class="success-container">
                    <div class="modalbox success col-sm-8 col-md-6 col-lg-5 center animate">
                        <div class="icon">
                            <span class="fas fa-check"></span>
                        </div>
                        <h1>Success!</h1>
                        <p class="info">We've sent a link payment to your e-mail
                            <br>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  -->


    <!-- Modal approve success -->
    <div id="approveSuccess" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-body">
                <div class="success-container">
                    <div class="modalbox success col-sm-8 col-md-6 col-lg-5 center animate">
                        <div class="icon">
                            <span class="fas fa-check"></span>
                        </div>
                        <h1>Success!</h1>
                        <p class="info">Approved Successfully
                            <br>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  -->


    <!--jquery-->
    <!--<script src="https://tours.mundochiapas.com/assets/tours2022/js/jquery.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <script src="https://tours.mundochiapas.com/assets/tours2022/popper/dist/umd/popper.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {

            $("input[name='payType']").click(function() {
                // Do something interesting here
                var types = $("input[name=payType]:checked").val();
                if (types == 'transfer') {
                    $('#myModalTransfer').modal('show');
                    $("#btnIdx").prop('disabled', true);
                } else if (types == 'deposito') {
                    $('#myModalDeposito').modal('show');
                    $("#btnIdx").prop('disabled', true);
                } else if (types == 'visa') {

                    $("#btnIdx").prop('disabled', false);
                }
            });

            $("input[name='payType']").change(function() {
                var types = $("input[name=payType]:checked").val();
                if (types == 'deposito') {}

            });

            $("#btnIdx").click(function() {
                // $.ajax({
                //     url: "/sendPayment",
                //     method: "GET",
                //     data: {
                //         quotesId: $("#idxQuotes").val()
                //     },
                //     beforeSend: function() {
                //         document.getElementById("loading").style.display = "block"
                //     },
                //     complete: function() {
                //         document.getElementById("loading").style.display = "none"
                //     },
                //     success: function(e) {
                //         if (e == true) {
                //             $('#informationSuccessMail').modal('show');
                //         } else {
                //             alert('Error Mail Not Sending,try again')
                //         }
                //     }
                // })
                window.location.href = '/payment_form?idQuotes=<?php echo e($_GET["q"]); ?>';
            })
        })


        $(window).on('load', function() {
            // $('#approveSuccess').modal('show');
        });
    </script>
</body>

</html><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/email/notification.blade.php ENDPATH**/ ?>