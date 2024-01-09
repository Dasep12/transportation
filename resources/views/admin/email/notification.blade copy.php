<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
    body {
        /* font-family: 'Varela Round', sans-serif; */
        background-color: #8f9d81;
    }

    .modal-confirm {
        color: #636363;
        width: 325px;
        font-size: 14px;
    }

    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
    }

    .modal-confirm .modal-header {
        border-bottom: none;
        position: relative;
    }

    .modal-confirm h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -15px;
    }

    .modal-confirm .form-control,
    .modal-confirm .btn {
        min-height: 40px;
        border-radius: 3px;
    }

    .modal-confirm .close {
        position: absolute;
        top: -5px;
        right: -5px;
    }

    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
    }

    .modal-confirm .icon-box {
        color: #fff;
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: -70px;
        width: 95px;
        height: 95px;
        border-radius: 50%;
        z-index: 9;
        background: #82ce34;
        padding: 15px;
        text-align: center;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .modal-confirm .icon-box i {
        font-size: 58px;
        position: relative;
        top: 3px;
    }

    .modal-confirm.modal-dialog {
        margin-top: 80px;
    }

    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
        background: #82ce34;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        border: none;
    }

    .modal-confirm .btn:hover,
    .modal-confirm .btn:focus {
        background: #6fb32b;
        outline: none;
    }

    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }
</style>

<body>


    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="d-flex flex-row col-md-12">

                <div class="col-lg-8">
                    <div class="coment-bottom bg-white p-2 px-4" style="border-radius: 5px;box-shadow:3px 3px #CCC">

                        <img class="img" src="https://www.mundochiapas.com/assets/images/logo.png" alt="">
                        <div class="commented-section mt-2">
                            <div class="mb-4  d-flex flex-row align-items-center commented-user">
                            </div>
                            <div class="comment-text-sm ">
                                <label class="mb-5" for="">H1 - Gracias por confirmar tu servicio con </label> <a class="mt-5 mb-4" href="https://www.mundochiapas.com/">Mundochiapas.com</a><br>



                                <p><b class="mb-4"> Estimado (a) {{ $res->customer_name }}</b></p>

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
                </div>


                <div class="col-lg-4">
                    <div class="ml-3 coment-bottom bg-white p-2 px-4" style="border-radius: 5px;box-shadow:3px 3px #CCC">
                        <h3>Method Payment </h3>

                    </div>
                </div>
            </div>

        </div>
    </div>

</body>



<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE876;</i>
                </div>
                <h4 class="modal-title w-100">Notification</h4>
            </div>
            <div class="modal-body">

                <p class="text-center">
                    @if ($message = Session::get('success'))
                    {{ $message  }}
                    @endif
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // document.ready(function() {

    // })
    /*    $(window).on('load', function() {
            $('#myModal').modal('show');
        });
    */
</script>