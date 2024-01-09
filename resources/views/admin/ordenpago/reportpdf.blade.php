<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

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
    <div class="row">
        <div class="column">
            <table class="border-all">
                <tr>
                    <th colspan="2">PROVEEDOR</th>
                </tr>
                <tbody>
                    <tr>
                        <td colspan="2">{{ strtoupper($data[0]->suppliers) }}</td>
                    </tr>
                    <tr>
                        <td style="height: 80px;">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Núm. Proveedor:</b></td>
                        <td>{{ $data[0]->idprevedor }}</td>
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
                        <td>{{ strtoupper($data[0]->company) }}</td>
                    </tr>
                    <tr>
                        <td><b>Número de OC </b></td>
                        <td><?= date('ymd', strtotime($data[0]->dates)) . '-' . $data[0]->ids ?> </td>
                    </tr>
                    <tr>
                        <td><b>Fecha</b></td>
                        <td>{{ $data[0]->dates }}</td>
                    </tr>
                    <tr>
                        <td><b>Condiciones. Pago</b></td>
                        <td>{{ $data[0]->terms }}</td>
                    </tr>
                    <tr>
                        <td><b>Forma de Pago</b></td>
                        <td>{{ $data[0]->statues }}</td>
                    </tr>
                    <tr>
                        <td><b>Solicitante</b></td>
                        <td>{{ $data[0]->aplicant }}</td>
                    </tr>
                    <tr>
                        <td><b>Contacto-Comprador</b></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row2" style="margin-top: 10px !important;">
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
                    @foreach($details as $dtl)
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
                        <td colspan="2"></td>
                        <td>Total</td>
                        <td>$ {{ number_format($totals,2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    @if($data[0]->approved == 'En proceso')
    <span style="color:red;margin-top:50px;position:absolute">EN PROCESO DE APROBACIÓN</span><br>
    @endif
    <div class="row3" style="margin-top: 80px !important;text-align:center">
        <div class="column">
            <span>Solicitó</span><br>
            <label for="">{{ $data[0]->aplicant }}</label>
        </div>
        <div class="column2">
            <span>Realizó</span><br>
            <label for="">FRANCISCO CRUZ</label>
        </div>
        <div class="column3">
            <span>Aprobó</span>
        </div>
    </div>
    <hr style="margin-top: 10px;margin-bottom:50px">

    <div class="row">
        <div class="column">
            <table class="border-all">
                <tr>
                    <th colspan="2">PROVEEDOR</th>
                </tr>
                <tbody>
                    <tr>
                        <td colspan="2">{{ strtoupper($data[0]->suppliers) }}</td>
                    </tr>
                    <tr>
                        <td style="height: 80px;">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Núm. Proveedor:</b></td>
                        <td>{{ $data[0]->idprevedor }}</td>
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
                        <td>{{ strtoupper($data[0]->company) }}</td>
                    </tr>
                    <tr>
                        <td><b>Número de OC </b></td>
                        <td><?= date('ymd', strtotime($data[0]->dates)) . '-' . $data[0]->ids ?> </td>
                    </tr>
                    <tr>
                        <td><b>Fecha</b></td>
                        <td>{{ $data[0]->dates }}</td>
                    </tr>
                    <tr>
                        <td><b>Condiciones. Pago</b></td>
                        <td>{{ $data[0]->terms }}</td>
                    </tr>
                    <tr>
                        <td><b>Forma de Pago</b></td>
                        <td>{{ $data[0]->statues }}</td>
                    </tr>
                    <tr>
                        <td><b>Solicitante</b></td>
                        <td>{{ $data[0]->aplicant }}</td>
                    </tr>
                    <tr>
                        <td><b>Contacto-Comprador</b></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row2" style="margin-top: 10px !important;">
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
                    @foreach($details as $dtl)
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
                        <td colspan="2"></td>
                        <td>Total</td>
                        <td>$ {{ number_format($totals,2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="row3" style="margin-top: 80px !important;text-align:center">
        <div class="column">
            <span>Solicitó</span><br>
            <label for="">{{ $data[0]->aplicant }}</label>
        </div>
        <div class="column2">
            <span>Realizó</span><br>
            <label for="">FRANCISCO CRUZ</label>
        </div>
        <div class="column3">
            <span>Aprobó</span>
        </div>
    </div>
</body>

</html>