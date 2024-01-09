<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email template</title>
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
        <table style="">
            <thead>
                <tr>
                    <th>
                        <a href="#"><img width="130px" src="https://dev.mundochiapas.com/assets/admin/images/1_1_logo-mundochiapas.png"></a>
                    </th>
                    <th style="text-align: right;">
                        <p style="color:#e7e6e6;font-size:10px !important"><strong>Folio: <?php echo e(explode("-",$data->invoice_number)[1]); ?></strong></p>
                    </th>
                </tr>
            </thead>
        </table>

        <table style="top:20px;position:relative;">

            <tbody>
                <tr style="font-size:small;">
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
                <tr style="font-size:small;">
                    <td>
                        <h4 style="margin: 0; font-size: 12px;">
                            <strong>Cotización para:</strong>
                        </h4>
                        <p style="font-size: 9px; line-height:9px;">
                            <?php echo e($data->customer_name); ?>

                            <br>
                            <a href="#">
                                <?php echo e($data->name); ?>

                            </a>
                            <br>
                        </p>
                    </td>
                    <td style="text-align: right;">
                        <h4 style="margin: 0; font-size: 9px;">
                            <strong>Métodos de Pago:</strong>
                        </h4>
                        <p>Transferencia Electrónica</p>
                        <p>Efectivo - Depósito Bancario</p>
                        <p>Tarjeta de Crédito / Débito </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="font-size:small">
            <?php echo e($data->customer_note); ?>

        </p>
        <table style="width: 100%;border-collapse: collapse;margin-top:50px">
            <thead style="font-size:small;">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
            <tbody>
                <tr>
                    <td style="width:30%;font-size:9px; background-color: #e7e6e6; font-weight: bold; color: #000; padding: 0 4px;height: 20px; line-height:20px;vertical-align: middle;"> &nbsp; &nbsp;DESCRIPCION DEL SERVICIO</td>
                    <td style="width:20%;font-size:9px;background-color: #e7e6e6; font-weight: bold; color: #000;padding: 0 4px;height: 20px; line-height:20px;vertical-align: middle;">PRECIO UNITARIO</td>
                    <td style="width:20%;font-size:9px;background-color: #e7e6e6; font-weight: bold; color: #000;padding: 0 4px;height: 20px; line-height:20px;vertical-align: middle;">CANTIDAD</td>
                    <!--                            <td style="width:15%; font-size:9px;background-color: #e7e6e6; font-weight: bold; color: #000;padding: 0 4px;height: 20px; line-height:20px;vertical-align: middle;">TAX</td>-->
                    <td style="width:15%; font-size:9px;background-color: #e7e6e6; font-weight: bold; color: #000;padding: 0 4px;height: 20px; line-height:20px;vertical-align: middle;">IVA</td>
                    <td style="width:12%;font-size:9px;background-color: #e7e6e6; font-weight: bold; color: #000;padding: 0 4px;height: 20px; line-height:20px;vertical-align: middle;">TOTAL</td>
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
                <tr style="font-size:small;">
                    <td style="height:10px; line-height:14px;font:9px" colspan="5">
                        <strong>Terrestre</strong>
                        <p style="position: relative;margin-top:20px">
                            H100 9 pasajeros | Transporte del 12 al 22 de Noviembre, con la ruta siguiente: 12 Nov recepcion de pasajeras en

                        </p>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="padding-top: 20px; padding-bottom: 15px; border-top: 1px dashed #333; border-bottom: 1px dashed #333;">
                        <table style="vertical-align: middle; padding-top: 15px; padding-bottom: 15px; width: 100%;border-collapse: collapse;">
                            <thead>

                            </thead>
                            <tbody>
                                <tr style="font-size: small;">
                                    <td style="font-size:small;line-height: 15px; text-align: left;">Responsable: <strong> <?php echo e(Session('username')); ?></strong>
                                    </td>
                                    <td style="line-height: 15px; text-align: left;">
                                        <table style="width: 100%; border-collapse: collapse;">
                                            <thead>

                                            </thead>
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

    </div>
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;

    <div style="width:100%;">
        <table style="width: 100%;border-collapse: collapse;">
            <tbody>
                <tr style="font-size: small;">
                    <th style="width:100%; padding: 10px;"><b>Servicios Incluidos:</b></th>
                </tr>
                <br>
                <tr style="font-size: small;">
                    <td style="width:100%;padding: 10px;">
                        <?php echo e($data->terms_conditions); ?>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>




    <br><br><br><br><br>
    <table style="border:2px solid #000;position:absolute;">
        <tr style="font-size: 9px; height:240px">
            <td>
                <table style="width: 100%; border-top: 1px solid Black">
                    <tr>
                        <td colspan="2">
                            <strong style="font-style: italic;">Mundochiapas.com </strong>| 5ta Av. North Poniente No 451, Teran, Tuxtla Gutierrez, Chiapas |
                            <strong>WhataApp:</strong> +52 961 217 2914
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>



</body>

</html><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/quotes/report_pdf.blade.php ENDPATH**/ ?>