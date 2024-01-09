<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title); ?></title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;1,400&display=swap');

        @font-face {
            font-family: "Roboto";
            src: url("https://dev.mundochiapas.com/assets/admin/fonts/Roboto-Regular.ttf") format("ttf");
            font-display: auto;
            font-style: normal;
            font-weight: 400;
        }

        @font-face {
            font-family: "Roboto";
            src: url("https://dev.mundochiapas.com/assets/admin/fonts/Roboto-Bold.ttf") format("ttf");
            font-display: auto;
            font-style: normal;
            font-weight: 700;
        }

        * {
            margin: 0;
            padding: 0;
            outline: none;
            border: none;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            -o-box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif !important;
            font-style: normal;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            font-size: 14px;
            /*color: ;*/
        }

        * {
            box-sizing: border-box;
        }

        a {
            color: #1e9bd8;
        }

        .template_wrap {
            max-width: 1170px;
            margin: auto;
            display: table;
            width: 100%;
            padding: 30px 0;
        }

        .col-6 {
            float: left;
            width: 50%;
        }

        .logo a {
            display: inline-block;
            width: 200px;
        }

        .logo a img {
            width: 100%;
        }

        .text-right {
            text-align: right;
        }

        .text-ledt {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .quatation_info {
            font-size: 14px;
            float: left;
            width: 100%;
            margin-top: 40px;
            margin-bottom: 10px;
            border-radius: 8px;
        }

        .about_start {
            float: left;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table tr th,
        table tr td {
            padding: 8px;
        }

        table tr th {
            background-color: #e7e6e6;
            color: #000;
            text-align: left;
        }

        .temp_ftr {
            float: left;
            width: 100%;
            margin-top: 35px;
        }
    </style>
</head>

<body>

    <div class="template_head">
        <table class="">
            <thead>

            </thead>
            <tbody>
                <tr>
                    <td>
                        <table>
                            <tbody>
                                <tr>
                                    <td><a href="#"><img width="200px" src="<?php echo e(asset('public/admin/img/logo/logo-mundochiapas.png')); ?>"></a></td>
                                    <td style="text-align: right;">
                                        <p style="color:#e7e6e6;"><strong>Folio: <?php echo e(explode("-",$data->invoice_number)[1]); ?></strong></p>
                                    </td>
                                </tr>
                                <br><br>
                                <tr>
                                    <td>&nbsp; &nbsp;Fecha Emisión: <strong><?php echo e($data->created_at); ?>

                                        </strong></td>
                                    <td style="text-align: right;">
                                        <strong>Cotización #<span style="color:red"><?php echo e($data->invoice_number); ?></span></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <h2 style="margin: 0; font-size: 18px;">
                                            <strong>Cotización para:</strong>
                                        </h2>
                                        <p style="font-size: 15px; line-height: 24px;">
                                            <?php echo e($data->customer_name); ?>

                                            <br>
                                            <a href="#">
                                                <?php echo e($data->name); ?>

                                            </a>
                                            <br>
                                        </p>
                                    </td>
                                    <td style="text-align: right;">
                                        <h2 style="margin: 0; font-size: 18px;">
                                            <strong>Métodos de Pago:</strong>
                                        </h2>
                                        <p>Transferencia Electrónica</p>
                                        <p>Efectivo - Depósito Bancario</p>
                                        <p>Tarjeta de Crédito / Débito </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br />
                                        <br />
                                        <?php echo e($data->customer_note); ?>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php

        ?>
        <div style="width: 100%;">
            <table style="width: 100%;border-collapse: collapse;">
                <tr>
                    <td>
                        <table style="border-collapse: collapse; width: 100%;">

                            <tbody>
                                <tr>
                                    <td style="width:30%;font-size:13px; background-color: #e7e6e6; font-weight: bold; color: #000; padding: 0 4px;height: 20px; line-height:20px;vertical-align: middle;"> &nbsp; &nbsp;DESCRIPCION DEL SERVICIO</td>
                                    <td style="width:20%;font-size:13px;background-color: #e7e6e6; font-weight: bold; color: #000;padding: 0 4px;height: 20px; line-height:20px;vertical-align: middle;">PRECIO UNITARIO</td>
                                    <td style="width:20%;font-size:13px;background-color: #e7e6e6; font-weight: bold; color: #000;padding: 0 4px;height: 20px; line-height:20px;vertical-align: middle;">CANTIDAD</td>
                                    <!--                            <td style="width:15%; font-size:13px;background-color: #e7e6e6; font-weight: bold; color: #000;padding: 0 4px;height: 42px; line-height:40px;vertical-align: middle;">TAX</td>-->
                                    <td style="width:15%; font-size:13px;background-color: #e7e6e6; font-weight: bold; color: #000;padding: 0 4px;height: 20px; line-height:20px;vertical-align: middle;">IVA</td>
                                    <td style="width:12%;font-size:13px;background-color: #e7e6e6; font-weight: bold; color: #000;padding: 0 4px;height: 20px; line-height:20px;vertical-align: middle;">TOTAL</td>
                                </tr>
                                <?php
                                $iva = 0;
                                $subtotal = 0;
                                $total = 0;
                                ?>
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $iva += ($i->price * $i->qty) * $i->tax;
                                $total += $i->amount;
                                $subtotal += $i->price * $i->qty;
                                ?>

                                <tr style="font-size: small;">
                                    <td style=" padding: 0 5px;height: 20px; line-height:25px;">
                                        <?php echo e($i->item); ?>

                                    </td>
                                    <td style="padding: 0 4px;height: 20px; line-height:25px;">
                                        <?php echo e(number_format( $i->price ,2)); ?>

                                    </td>
                                    <td style="padding: 0 4px;height: 20px; line-height:25px;">
                                        <?php echo e($i->qty); ?>

                                    </td>
                                    <td style="padding: 0 4px;height: 20px; line-height:25px;">
                                        <?php echo e(number_format(($i->price * $i->qty)  * $i->tax,2)); ?>

                                    </td>

                                    <td style="padding: 0 4px;height: 20px; line-height:25px;">
                                        <?php echo e(number_format($i->amount,2)); ?>

                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="height: 42px; line-height:30px;" colspan="5">
                                        <strong>Detalle del Servicio</strong><br>
                                        <?php echo e($items[0]->description); ?>

                                    </td>
                                </tr>
                                <br> <br> <br>
                                <tr>
                                    <td colspan="5" style="padding-top: 10px; padding-bottom: 10px; border-top: 2px dashed #333; border-bottom: 2px dashed #333;">
                                        <table style="vertical-align: middle; padding-top: 10px; padding-bottom: 10px; width: 100%;border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td style="line-height: 20px; text-align: left;">Responsable: <strong><?php echo e(ucwords(strtolower(Session('fullname')))); ?></strong>
                                                    </td>
                                                    <td>
                                                        <table style="width: 100%; border-collapse: collapse;">
                                                            <tbody>
                                                                <tr style="font-size:small;">
                                                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: right; width: 50%;">Subtotal:</td>
                                                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: right; width: 30%; font-weight: 700;"><strong><?= number_format($subtotal, 2) ?></strong></td>
                                                                </tr>
                                                                <tr style="font-size:small;">
                                                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: right; width: 50%;">Iva:</td>
                                                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: right; width: 30%; font-weight: 700;"><strong><?= number_format($iva, 2) ?></strong></td>
                                                                </tr>
                                                                <tr style="font-size:small;">
                                                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: right; width: 50%;">Total:</td>
                                                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: right; width: 30%; font-weight: 700;"><strong><?= number_format($total, 2) ?></strong></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    &nbsp;
    <div style="width:100%;">
        <table style="width: 100%;border-collapse: collapse;background:none;font-size:small">
            <tbody>
                <tr>
                    <th style="width:100%; padding: 10px;"><b>Servicios Incluidos:</b></th>
                </tr>
                <br>
                <tr>
                    <td style="width:100%;padding: 10px;">
                        Unidad en perfectas condiciones tanto físicas como mecánicas - conductores con pleno conocimiento de las carreteras dentro
                        y fuera del estado - Casetas - Combustible - Seguro de viajero a bordo de la unidad
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <table style="top:96%;position:absolute;font-size:small">
        <tfoot style="display: table-footer-group">
            <tr>
                <td>
                    <table style="width: 100%; border-top: 1px solid black;">
                        <tr>
                            <td colspan="2" style="font-size:12px;font-style: italic;" align="center">
                                <strong style="font-style: italic;">Mundochiapas.com </strong>| 5ta Av. North Poniente No 451, Teran, Tuxtla Gutierrez, Chiapas |
                                <strong>WhataApp:</strong> +52 961 217 2914
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tfoot>
    </table>

</body>

</html><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/quotes/report_pdf_v2.blade.php ENDPATH**/ ?>