<?php

use App\Helpers\BulanHelper;
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $mailData['title']  }}</title>

    <style>
        * {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 12px !important;
        }

        .column {
            float: left;
            width: 40%;
            /* Should be removed. Only for demonstration */
        }

        .column2 {
            float: left;
            width: 60%;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;

        }

        .row table {
            font-size: 12px !important;
            width: 100% !important;
            border-collapse: collapse;
            border: 1px solid #000;
        }

        .row tr th {
            font-size: 12px !important;
            border-collapse: collapse;
            border: 1px solid #000;
            background-color: #ccc;
        }

        .row2:after {
            content: "";
            display: table;
            clear: both;

        }

        .row3:after {
            content: "";
            display: table;
            clear: both;

        }

        .row3 .column {
            float: left;
            width: 40%;
            /* Should be removed. Only for demonstration */
        }

        .row3 .column2 {
            float: left;
            width: 30%;
            /* Should be removed. Only for demonstration */
        }

        .row3 .column3 {
            float: left;
            width: 30%;
            /* Should be removed. Only for demonstration */
        }

        .row2 .column {
            float: left !important;
            width: 100% !important;
            /* Should be removed. Only for demonstration */
        }

        .row2 table {
            font-size: 12px !important;
            width: 100% !important;
            border-collapse: collapse;
            border: 1px solid #000;
        }

        .row2 tr td {
            font-size: 12px !important;
            width: 100% !important;
            border-collapse: collapse;
            border: 1px solid #000;
        }

        .row2 tfoot {
            font-size: 12px !important;
            width: 100% !important;
            border-collapse: collapse;
            border: 1px solid #000;
        }

        .row2 tr th {
            font-size: 12px !important;
            border-collapse: collapse;
            border: 1px solid #000;
            background-color: #ccc;
        }







        .row-footer:after {
            content: "";
            display: table;
            clear: both;
        }

        .row-footer {
            position: absolute !important;
            display: inherit !important;
            margin-top: 160px;
        }

        .row-footer .column {
            float: left;
            width: 100%;
        }
    </style>
</head>


<body>

    <label for="">JP</label>
    <p>Inicio del mensaje reenviado:</p>
    <p><b>Fecha : </b> <?= date('d', strtotime($mailData['data'][0]->dates)) . ' de ' . BulanHelper::monthSpanish(date('m', strtotime($mailData['data'][0]->dates))) . ' de ' . date('Y', strtotime($mailData['data'][0]->dates)) ?></p>
    <p><b>Para : </b><u><a href="">direccion@mundochiapas.com</a></u></p>
    <p><b>Asunto: Solicitud de aprobación para la orden de compra # {{ $mailData['data'][0]->ids }}| Mundochiapas.com - Mundochiapas.com</b></p>
    <div class="row">
        <div class="column">
            <table class="border-all">
                <tr>
                    <th colspan="2">PROVEEDOR</th>
                </tr>
                <tbody>
                    <tr>
                        <td colspan="2">{{ strtoupper($mailData['data'][0]->suppliers) }}</td>
                    </tr>
                    <tr>
                        <td style="height: 80px;">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Núm. Proveedor:</b></td>
                        <td>{{ $mailData['data'][0]->idprevedor }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="column2">
            <table class="border-all" style="margin-left: 10px;">
                <tr>
                    <th colspan="2">PEDIDO</th>
                </tr>
                <tbody>
                    <tr>
                        <td><b>Empresa</td>
                        <td>{{ strtoupper($mailData['data'][0]->company) }}</td>
                    </tr>
                    <tr>
                        <td><b>Número de OC </b></td>
                        <td><?= date('ymd', strtotime($mailData['data'][0]->dates)) . '-' . $mailData['data'][0]->ids ?> </td>
                    </tr>
                    <tr>
                        <td><b>Fecha</b></td>
                        <td>{{ $mailData['data'][0]->dates }}</td>
                    </tr>
                    <tr>
                        <td><b>Condiciones. Pago</b></td>
                        <td>{{ $mailData['data'][0]->terms }}</td>
                    </tr>
                    <tr>
                        <td><b>Forma de Pago</b></td>
                        <td>{{ $mailData['data'][0]->statues }}</td>
                    </tr>
                    <tr>
                        <td><b>Solicitante</b></td>
                        <td>{{ $mailData['data'][0]->aplicant }}</td>
                    </tr>
                    <tr>
                        <td><b>Contacto-Comprador</b></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row2" style="margin-top: 40px !important;">
        <div class="column">
            <table>
                <tr>
                    <th>Descripción</th>
                    <th>Cant.</th>
                    <th>PU</th>
                    <th>Importe</th>
                </tr>
                <tbody>
                    <?php $totals = 0; ?>
                    @foreach($mailData['details'] as $dtl)
                    <?php $totals += $dtl->total ?>
                    <tr>
                        <td>{{ $dtl->description }}</td>
                        <td>{{ $dtl->quantity }}</td>
                        <td>$ {{ number_format($dtl->unit_price,2) }}</td>
                        <td>$ {{ number_format($dtl->total,2) }} </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="1"></td>
                        <td colspan="1">Total</td>
                        <td>$ {{ number_format($totals,2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


    <div class="row" style="margin-top: 20px;text-align:center">
        <a href="{{ URL('login?id='. $mailData['data'][0]->ids .'&orden=y' ) }}">
            <h3>Approbar / Cancelar</h3>
        </a>
    </div>
</body>

</html>