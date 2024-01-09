<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo e($mailData['title']); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style type="text/css">
        * {
            box-sizing: border-box;
        }

        a {
            color: #1e9bd8;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        .template_wrap {
            max-width: 750px;
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
            margin-top: 20px;
            width: 100%;
            font-size: 14px;
            border-collapse: collapse;
            overflow: hidden;
            float: left;
        }

        table tr th,
        table tr td {
            padding: 10px;
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

        /* Set a style for all buttons */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        /* Extra styles for the cancel button */
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        /* Center the image and position the close button */
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }

        img.avatar {
            width: 20%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }
    </style>
</head>

<body>
    <?php
    // echo "<pre>";
    // print_r($mailData['data']);
    ?>

    <div class="template_wrap" style="margin-top: 40px;">
        <div class="template_head">
            <div class="col-6 logo text-left">
                <a href="#"><img src="https://dev.mundochiapas.com/assets/admin/images/1_1_logo-mundochiapas.png"></a>
            </div>
            <div class="col-6 text-right">
                <a href="<?= URL::to('pdfQuotes?id=' . $mailData["ids"])  ?>" style="text-decoration:none;background-color: #1b9344; color: #fff; font-size: 13px; display:inline-block;border-radius: 50px; padding: 5px 20px;letter-spacing: 0.5px;margin-top: 12px;" href="#">Ver Cotización en pdf</a>
            </div>
            <div class="quatation_info">
                <div class="col-6 text-left">
                    Fecha Emisión: <strong><?php echo $mailData['fecha']; ?></strong>
                </div>
                <div class="col-6 text-right">
                    <strong>Cotización # <?php echo $mailData['invoice']; ?></strong>
                </div>
            </div>
            <div style="margin-top: 15px;" class="about_start">
                <div class="col-6">
                    <h2 style="margin: 0; font-size: 18px;"><strong>Cotización para:</strong></h2>
                    <p style="font-size: 15px; line-height: 24px;">
                        <?php echo $mailData['costumer']; ?><br>
                        <a href="#"><?php echo  $mailData['email']; ?></a><br>
                    </p>
                </div>
                <div class="col-6" style="text-align: right;">
                    <h2 style="margin: 0; font-size: 18px;"><strong>Métodos de Pago:</strong></h2>
                    <ul style="list-style: none; padding: 0; font-size: 15px; line-height: 30px;">
                        <li>Electrónica - Transferencia </li>
                        <li>Efectivo - Depósito Bancario</li>
                        <li>Crédito / Débito – En línea - Tarjeta de</li>
                    </ul>
                </div>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>DESCRIPCION DEL SERVICIO</th>
                    <th>PRECIO UNITARIO</th>
                    <th>CANTIDAD</th>
                    <th>IVA</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $subtotal = 0;
                $subtax = 0;
                $amount = 0;
                for ($i = 0; $i < count($mailData['data']); $i++) :
                    $amount += $mailData['data'][$i]['amount'];
                    $subtax += $mailData['data'][$i]['tax'] *  $mailData['data'][$i]['total'];
                    $subtotal += $mailData['data'][$i]['qty'] *  $mailData['data'][$i]['price'];  ?>
                    <tr>
                        <td><strong><?php echo $mailData['data'][$i]['item'] ?></strong></td>
                        <td><?php echo number_format($mailData['data'][$i]['price'], 2, '.', ',') ?? ''; ?></td>
                        <td><?php echo $mailData['data'][$i]['qty']; ?></td>
                        <td>
                            <?php
                            echo number_format($mailData['data'][$i]['tax'] *  $mailData['data'][$i]['price'], 2, '.', ',');
                            ?>
                        </td>
                        <td style="padding: 0 4px;height: 42px; line-height:30px;">
                            <?php echo number_format($mailData['data'][$i]['amount'], 2, '.', ',') ?? ''; ?>
                        </td>
                    </tr>
                <?php endfor ?>

                <tr>
                    <td colspan="4">
                        <p>
                        <div class="col-12 text-left">
                            <strong>Description:</strong>
                            <p><?php echo $mailData['data'][0]['description'] ?></p>
                        </div><br></p>
                    </td>
                </tr>

                <tr>
                    <td colspan="4">
                        <br />
                        <a href="<?php echo $mailData['gallery']  ?>">
                            Ver galer&iacute;a de la unidad
                        </a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left;" colspan="1" rowspan="">Responsable: </td>
                    <td style="text-align: left;" colspan="3" rowspan=""><strong><?php echo Session('username') ?></strong></td>
                </tr>
                <tr>
                    <td style="text-align: right;" colspan="2" rowspan="">Subtotal: </td>
                    <td style="text-align: left;" colspan="2" rowspan=""><strong><?php echo number_format($subtotal, 2, '.', ','); ?></strong></td>

                </tr>
                <tr>

                    <td style="text-align: right;" colspan="2" rowspan="">Iva:</td>
                    <td style="text-align: left;" colspan="2" rowspan=""><strong><?php echo number_format($subtax, 2, '.', ','); ?></strong></td>
                </tr>
                <tr>
                    <td style="text-align: right;" colspan="2" rowspan=""><strong>Total:</strong> </td>
                    <td style="text-align: left;" colspan="2" rowspan=""><strong><?php echo number_format($amount, 2, '.', ','); ?></strong></td>
                </tr>
            </tbody>
        </table>
        <br><br>
        <div class="temp_ftr">
            <div class="col-12 text-left">
                <strong>Description:</strong>
                <p><?php echo $mailData['data'][0]['description'] ?></p>
            </div><br>
            <div class="col-12 text-left">
                <strong>Servicios Incluidos:</strong>
                <p><?php echo $mailData['services'] ?></p>
            </div><br>
            <div class="col-12 text-left">
                <strong>Comentarios Finales:</strong>
                <p><?= $mailData['note'] ?></p>
            </div>
        </div>

        <div style="text-align: center;margin-top: 20px;display: inline-block;width: 100%;">
            <a href="<?= URL::to('approve?id=' . $mailData["ids"] . '&s=yes')  ?>" style=" margin: 0 5px; display:inline-block;background-color:#1b9344; color: #fff; text-decoration: none; text-align: center; height: 42px; line-height: 42px; padding: 0 30px; border-radius: 50px;font-weight: 600;" href="#">Aprobar</a>
            <a href="<?= URL::to('approve?id=' . $mailData["ids"] . '&s=no')  ?>" style="margin: 0 5px; display:inline-block;background-color:#1b9344; color: #fff; text-decoration: none; text-align: center; height: 42px; line-height: 42px; padding: 0 30px; border-radius: 50px;font-weight: 600;" href="#">Solicitar Cambios</a>
        </div>
        <div style="text-align: center;margin-top: 20px;display: inline-block;width: 100%;">
            <strong>WhatsApp:</strong> +52 961 217 2914
        </div>
    </div>
</body>

</html><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/email/template.blade.php ENDPATH**/ ?>