<?php

use App\Models\ServicePDFModel;

// echo $presupuesto->hotel_fee;
// dd(ServicePDFModel::othersPayment($serviceId)['hospedaje'])
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title); ?></title>

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

        .row2:after {
            content: "";
            display: table;
            clear: both;

        }

        .row2 table {
            /* border: 2px solid #000; */
            width: 100%;
            border: none;
        }

        .row2 table td {
            border: none;
        }



        .row2 .right_title {
            text-align: right;
            font-size: 12px;
        }

        .row2 .left_title {
            text-align: left;
            font-size: 12px;
        }

        .row2 .left_title span {
            margin-left: 10px;
        }

        .row2 .column2 {
            float: left;
            width: 50%;
            /* Should be removed. Only for demonstration */
        }



        .row3 {
            margin-top: 10px !important;
            display: block;
            position: relative;
            top: 20px !important;
        }

        .row3 table {
            font-size: 12px !important;
            width: 100% !important;
            border-collapse: collapse;
            border: 1px solid #000;
        }

        .row3 table td {
            border-collapse: collapse;
            border: 1px solid #000;
        }

        .row3 table th {
            border-collapse: collapse;
            border: 1px solid #000;
        }

        .row4 {
            margin-top: 25px;
        }

        .row5 .column {
            float: left;
            width: 33.33%;
        }

        /* Clear floats after the columns */
        .row5:after {
            content: "";
            display: table;
            clear: both;
        }

        .row6 {
            margin-top: 20px;
        }

        .row6 table {
            width: 100%;
            text-align: right;
        }

        .row6 table,
        tr,
        td {
            border-collapse: collapse;
            border: 1px solid #000;
        }

        .row7 table {
            width: 100%;
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
            <img width="200px" src="<?php echo e(asset('public/admin/img/logo/logo-mundochiapas.png')); ?>">
        </div>
        <div class="column2">
            <h1 style="font-size: 26px !important;">REPORTE DE GASTOS DE VIAJE</h1>
        </div>
    </div>
    <hr style="border-color:black;background:black">

    <div class="row2" style="align-items: center;text-align:center">
        <div class="column" style="width: 50% !important;">
            <table class="" align="left">
                <tr>
                    <td class="right_title"><b>Cliente:</b></td>
                    <td class="left_title"><span style="margin-left: 10px;"><?php echo e($headerData[0]->cliente); ?></span></td>
                </tr>
                <tr>
                    <td class="right_title"><b>Ruta:</b></td>
                    <td class="left_title"> <span><?php echo e($headerData[0]->ruta); ?></span> </td>
                </tr>
                <tr>
                    <td class="right_title"><b>Inicio de servicio:</b></td>
                    <td class="left_title"><span><?php echo e($headerData[0]->inicio_de_servicio); ?> </span></td>
                </tr>
                <tr>
                    <td class="right_title"><b>Fin de Servicio: </b></td>
                    <td class="left_title"><span> <?php echo e($headerData[0]->fin_de_servicio); ?> </span></td>
                </tr>
            </table>
        </div>
        <div class="column2">
            <table class="">
                <tr>
                    <td class="right_title"><b>No. Operadores:</b></td>
                    <td class="left_title"><span><?php echo e($headerData[0]->no_operados); ?></span></td>
                </tr>
                <tr>
                    <td class="right_title"><b>Operador:</b></td>
                    <td class="left_title"> <span><?php echo e($headerData[0]->operador); ?></span></td>
                </tr>
                <tr>
                    <td class="right_title"><b>Unidad:</b></td>
                    <td class="left_title"><span><?php echo e($headerData[0]->unidad); ?></span></td>
                </tr>
                <tr>
                    <td class="right_title"><b>No. Días: </b></td>
                    <td class="left_title"><span><?php echo e($headerData[0]->no_dias); ?></span> </td>
                </tr>
            </table>
        </div>
    </div>
    <hr style="border-color:black;background:black">

    <div class="row3">
        <table>
            <thead>
                <tr>
                    <th colspan="2">PRESUPUESTO DE VIAJE</th>
                    <th colspan="3">INFORMACIÓN REAL</th>
                    <th>DIFERENCIA</th>
                    <th colspan="2">INDICES</th>
                </tr>
            </thead>
            <tbody>
                <tr style="text-align: center;">
                    <td>DESCRIPCIÓN</td>
                    <td>PRESUPUESTO</td>
                    <td>IDA</td>
                    <td>REGRESO</td>
                    <td><b>TOTALES</b></td>
                    <td></td>
                    <td colspan="2">%</td>
                </tr>
                <tr style="text-align: center;">
                    <td style="text-align: right !important;"><span style="">Kilómetros Por Recorrer: </span> </td>
                    <td>
                        <?php echo e($presupuesto->total_travel_kms); ?> Km
                    </td>
                    <td>
                        <?php echo e(ServicePDFModel::IDAKilometros_por_recorrer($serviceId)); ?> Kms
                    </td>
                    <td>
                        <?php echo e(ServicePDFModel::RegresoKilometros_por_recorrer($serviceId)); ?> Kms
                    </td>
                    <?php
                    $totaleskilometers = ServicePDFModel::IDAKilometros_por_recorrer($serviceId) + ServicePDFModel::RegresoKilometros_por_recorrer($serviceId); ?>
                    <td>
                        <b><?php echo e($totaleskilometers); ?> Kms</b>
                    </td>
                    <td>
                        <?php
                        $differenkilometers = $totaleskilometers - $presupuesto->total_travel_kms;
                        ?>
                        <?php echo e($differenkilometers); ?> Kms
                    </td>
                    <td>
                        <?php
                        $diffe =  ($presupuesto->total_travel_kms  - $totaleskilometers);
                        echo  number_format($diffe / $presupuesto->total_travel_kms * 100, 2);
                        ?> %
                    </td>
                    <td>
                        <?php
                        $ratekilometres  = $differenkilometers < 0 ? 'like.png' : 'dislike.png'
                        ?>
                        <img style="width: 20px ;" src="<?php echo e(asset('public/images/'. $ratekilometres)); ?>" alt="">
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <td style="text-align: right !important;">
                        <span style="">Litros: </span>
                    </td>
                    <td>
                        <b><?php echo e($presupuesto->total_liter_consume); ?> Lts<b>

                    </td>
                    <td>
                        <?php echo e(ServicePDFModel::IDALitros($serviceId)); ?> lts
                    </td>
                    <td>
                        <?php
                        $fuelhome = count($ReturningToHome) > 0 ? $ReturningToHome[0]->home_charge_fill_tank : 0;
                        ?>
                        <?php echo e(ServicePDFModel::RegresoLitros($serviceId) + $fuelhome); ?> lts
                    </td>
                    <?php

                    $totalesLitros = ServicePDFModel::IDALitros($serviceId) + ServicePDFModel::RegresoLitros($serviceId) + $fuelhome ?>
                    <td>
                        <b><?php echo e($totalesLitros); ?> lts</b>
                    </td>
                    <td>
                        <?php
                        $differenlitros =  $totalesLitros -  $presupuesto->total_liter_consume;
                        ?>
                        <?php echo e($differenlitros); ?> lts
                    </td>
                    <td>
                        <?php echo e(number_format(($presupuesto->total_liter_consume - $totalesLitros) / $presupuesto->total_liter_consume * 100,2)); ?> %
                    </td>
                    <td>
                        <?php
                        $ratelitros  = $differenlitros < 0 ? 'like.png' : 'dislike.png';
                        ?>
                        <img style="width: 20px ;" src="<?php echo e(asset('public/images/'. $ratelitros)); ?>" alt="">
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <td style="text-align: right !important;">
                        <span style="">Costo de Combustible: </span>
                    </td>
                    <td>
                        <b>$
                            <?php echo e(number_format($presupuesto->total_liter_consume * $presupuesto->cost_per_liter,2)); ?>

                        </b>
                    </td>
                    <td>
                        $ <?php echo e(ServicePDFModel::IDACostodeCombustible($serviceId)); ?>

                    </td>
                    <td>
                        $ <?php echo e(ServicePDFModel::RegresoCostodeCombustible($serviceId)); ?>

                    </td>
                    <td>
                        <b>
                            <?php
                            $totalescosto = ServicePDFModel::IDACostodeCombustible($serviceId) +  ServicePDFModel::RegresoCostodeCombustible($serviceId)  ?>
                            $ <?php echo e(number_format($totalescosto,2)); ?>

                        </b>
                    </td>
                    <td>
                        <?php
                        $diffrecosto = $totalescosto - ($presupuesto->total_liter_consume * $presupuesto->cost_per_liter);
                        ?>
                        $ <?php echo e(number_format($diffrecosto,2)); ?>

                    </td>
                    <td>
                        <?php echo e(number_format($diffrecosto / ($presupuesto->total_liter_consume * $presupuesto->cost_per_liter) * 100 ,2)); ?> %
                    </td>
                    <td>
                        <img style="width: 20px ;" src="<?php echo e(asset('public/images/like.png')); ?>" alt="">
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <td style="text-align: right !important;">
                        <span style="">Casetas: </span>
                    </td>
                    <td>
                        <b>$ <?php echo e(number_format($presupuesto->total_casetas  ,2)); ?> </b>
                    </td>
                    <td>
                        $ <?php echo e(number_format($presupuesto->total_casetas / 2 ,2)); ?>

                    </td>
                    <td>
                        $ <?php echo e(number_format($presupuesto->total_casetas / 2 ,2)); ?>

                    </td>
                    <td>
                        <b>$ <?php echo e(number_format($presupuesto->total_casetas ,2)); ?></b>
                    </td>
                    <td> $0</td>
                    <td>0%</td>
                    <td>
                        <img style="width: 20px ;" src="<?php echo e(asset('public/images/like.png')); ?>" alt="">
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <td style="text-align: right !important;">
                        <span style="">Honorarios Operadores: </span>
                    </td>
                    <td>
                        <b>$ <?php echo e(number_format($presupuesto->total_fee_drivers,2)); ?></b>
                    </td>
                    <td>
                        $ <?php echo e(number_format(ServicePDFModel::HonorariosOperadores($serviceId)->results_1,2)); ?>

                    </td>
                    <td>
                        $ <?php echo e(number_format(ServicePDFModel::HonorariosOperadores($serviceId)->results_2,2)); ?>

                    </td>
                    <td>
                        <b>
                            $ <?php echo e(number_format(ServicePDFModel::HonorariosOperadores($serviceId)->results_1 +  ServicePDFModel::HonorariosOperadores($serviceId)->results_2 ,2)); ?>

                        </b>
                    </td>
                    <td> $ 0.0</td>
                    <td>-</td>
                    <td></td>
                </tr>
                <tr style="text-align: center;">
                    <td style="text-align: right !important;">
                        <span style="">Hospedaje: </span>
                    </td>
                    <td>
                        <b>$ <?php echo e(number_format($presupuesto->hotel_fee,2)); ?> </b>
                    </td>
                    <td colspan="2">
                        $ <?php echo e(number_format(ServicePDFModel::othersPayment($serviceId)['hospedaje'],2)); ?>

                    </td>
                    <td>
                        <b>
                            $ <?php echo e(number_format(ServicePDFModel::othersPayment($serviceId)['hospedaje'],2)); ?>

                        </b>
                    </td>
                    <td>
                        <?php
                        $difehosdepajo = 0;
                        if (ServicePDFModel::othersPayment($serviceId) <= 0) {
                            $difehosdepajo = 0;
                        } else {
                            $difehosdepajo = (int) ServicePDFModel::othersPayment($serviceId)['hospedaje'] - (int) $presupuesto->hotel_fee;
                        }
                        ?>
                        $ <?php echo e(number_format($difehosdepajo,2)); ?>

                    </td>
                    <td>
                        <?php
                        $ratehotel = 0;
                        if ($difehosdepajo > 0) {
                            $ratehotel = ($difehosdepajo / $presupuesto->hotel_fee) * 100;
                        }
                        echo  $ratehotel;
                        ?> %
                    </td>
                    <td>
                        <?php
                        $rateHotel = $difehosdepajo <= 0 ? 'like.png' : 'dislike.png'; ?>
                        <img style="width: 20px ;" src="<?php echo e(asset('public/images/'.  $rateHotel)); ?>" alt="">
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <td style="text-align: right !important;">
                        <span style="">Lavado de Auto: </span>
                    </td>
                    <td>
                        <b>$ <?php echo e(number_format($presupuesto->car_wash,2)); ?> </b>
                    </td>
                    <td colspan="2">
                        $ <?php echo e(number_format(ServicePDFModel::othersPayment($serviceId)['lavado'],2)); ?>

                    </td>
                    <td>
                        <b>$ <?php echo e(number_format(ServicePDFModel::othersPayment($serviceId)['lavado'],2)); ?> </b>
                    </td>
                    <td>
                        <?php $difLavado =  ServicePDFModel::othersPayment($serviceId)['lavado'] - $presupuesto->car_wash ?>
                        $<?php echo e(number_format($difLavado,2)); ?>

                    </td>
                    <td>
                        <?php
                        if ($presupuesto->car_wash <= 0) {
                            echo '100%';
                        } else {
                            echo ($difLavado / $presupuesto->car_wash) * 100 . '%';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $ratelavado = $difLavado <= 0 ? 'like.png' : 'dislike.png'; ?>
                        <img style="width: 20px ;" src="<?php echo e(asset('public/images/'.$ratelavado)); ?>" alt="">
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <td style="text-align: right !important;">
                        <span style="">Aeropuerto: </span>
                    </td>
                    <td>
                        <b>$ <?php echo e(number_format($presupuesto->airport_fee ,2)); ?> </b>
                    </td>
                    <td colspan="2">
                        $ <?php echo e(number_format(ServicePDFModel::othersPayment($serviceId)['airport'],2)); ?>

                    </td>
                    <td>
                        <b>$ <?php echo e(number_format(ServicePDFModel::othersPayment($serviceId)['airport'],2)); ?></b>
                    </td>
                    <td>
                        <?php
                        $difeaero = ServicePDFModel::othersPayment($serviceId)['airport'] - $presupuesto->airport_fee;
                        ?>
                        <?php echo e('$ '.number_format($difeaero ,2)); ?>

                    </td>
                    <td>
                        <?php
                        $s = $presupuesto->airport_fee == 0 ? 1 : $presupuesto->airport_fee; ?>
                        <?php echo e(($difeaero /   $s ) * 100); ?> %
                    </td>
                    <td>
                        <?php
                        $rateaero = $difeaero  <= 0 ? 'like.png' : 'dislike.png'; ?>
                        <img style="width: 20px ;" src="<?php echo e(asset('public/images/'. $rateaero)); ?>" alt="">
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <td style="text-align: right !important;">
                        <span style="">Otros Gastos: </span>
                    </td>
                    <td><b>$0.00</b></td>
                    <td colspan="2">
                        $ <?php echo e(number_format(ServicePDFModel::othersPayment($serviceId)['others'],2)); ?>

                    </td>
                    <td>
                        <b>$ <?php echo e(ServicePDFModel::othersPayment($serviceId)['others']); ?></b>
                    </td>
                    <td>$ <?php echo e(ServicePDFModel::othersPayment($serviceId)['others'] > 0 ? '-' . ServicePDFModel::othersPayment($serviceId)['others'] : ServicePDFModel::othersPayment($serviceId)['others']); ?></td>
                    <td>-</td>
                    <td>
                        <img style="width: 20px ;" src="<?php echo e(asset('public/images/like.png')); ?>" alt="">
                    </td>
                </tr>
                <tr style="text-align: center;background:#ddd">
                    <td style="text-align: right !important;">
                        <span style="font-style:bold">Total de Gastos </span>
                    </td>
                    <td>
                        <b>
                            <?php
                            $casetas = $presupuesto->total_casetas;
                            $feeDriver = $presupuesto->total_fee_drivers;
                            $hotel_fee = $presupuesto->hotel_fee;
                            $car_wash = $presupuesto->car_wash;
                            $costo    = $presupuesto->total_liter_consume * $presupuesto->cost_per_liter;
                            $airport_fee = $presupuesto->airport_fee;
                            $totaldegastos = $casetas + $feeDriver + $hotel_fee + $car_wash + $airport_fee + $costo;
                            ?>
                            $ <?php echo e(number_format($totaldegastos,2)); ?>

                        </b>
                    </td>
                    <td>
                        <b>
                            <?php
                            $costocountida = ServicePDFModel::IDACostodeCombustible($serviceId);
                            $casetascountida = $presupuesto->total_casetas;
                            $operadocountida = ServicePDFModel::HonorariosOperadores($serviceId)->results_1;
                            $hospedajecountida = ServicePDFModel::othersPayment($serviceId)['hospedaje'];
                            $lavadocountida = ServicePDFModel::othersPayment($serviceId)['lavado'];
                            $airportcountida = ServicePDFModel::othersPayment($serviceId)['airport'];
                            $othercountitda = ServicePDFModel::othersPayment($serviceId)['others'];
                            echo '$ ' . number_format($costocountida + ($casetascountida / 2) + $operadocountida  +  $hospedajecountida + $lavadocountida + $airportcountida +  $othercountitda, 2);
                            ?>
                        </b>
                    </td>
                    <td>
                        <b>
                            <?php
                            $costocountreg = ServicePDFModel::RegresoCostodeCombustible($serviceId);
                            $casetascountreg = $presupuesto->total_casetas;
                            $operadocountreg = ServicePDFModel::HonorariosOperadores($serviceId)->results_2;
                            $hospedajecountreg = ServicePDFModel::othersPayment($serviceId)['hospedaje'];
                            $lavadocountreg = ServicePDFModel::othersPayment($serviceId)['lavado'];
                            $airportcountreg = ServicePDFModel::othersPayment($serviceId)['airport'];
                            $othercountreg = ServicePDFModel::othersPayment($serviceId)['others'];
                            echo '$ ' . number_format($costocountreg + ($casetascountreg / 2) + $operadocountreg + $hospedajecountreg + $lavadocountreg + $airportcountreg + $othercountreg, 2);
                            ?>
                        </b>
                    </td>
                    <td>
                        <b>
                            <?php
                            $totalscostos = $totalescosto;
                            $toalscasetas = $presupuesto->total_casetas;
                            $totalhonooperados = ServicePDFModel::HonorariosOperadores($serviceId)->results_1;
                            $totalhospedaje = ServicePDFModel::othersPayment($serviceId)['hospedaje'];
                            $totallavado = ServicePDFModel::othersPayment($serviceId)['lavado'];
                            $totalaeropurto = ServicePDFModel::othersPayment($serviceId)['airport'];
                            $totalothers = ServicePDFModel::othersPayment($serviceId)['others'];
                            echo '$ ' . number_format($totalscostos + $toalscasetas + $totalhonooperados + $totalhospedaje + $totallavado + $totalaeropurto + $totalothers, 2);
                            ?>
                        </b>
                    </td>
                    <td> </td>
                    <td> </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row4">
        <b>Resumen del Viaje: </b><?php echo e($totaleskilometers); ?> kms recorridos
    </div>

    <div class="row5" style="margin-top: 10px;">
        <div class="column"> <b>Odómetro Inicial: </b> <?php echo e(count($initialServices) != null ? $initialServices[0]->init_odometer : 0); ?> </div>
        <div class="column"> <b>Odómetro en Destino: </b> <?php echo e(count($Destination) != null ? $Destination[0]->odometer_at_destination : 0); ?></div>
        <div class="column"> <b>Odómetro Final: </b> <?php echo e(count($ReturningToHome) != null ? $ReturningToHome[0]->home_odometer_arrival : 0); ?></div>
    </div>
    <hr style="border-color:black;background:black">

    <b>Rendimiento: </b>
    <div class="row6">
        <table>
            <tr>
                <td>Rendimiento:</td>
                <td>
                    <b>
                        <?php if($totaleskilometers > 0 ||$totalesLitros > 0): ?>
                        <?php echo e(number_format( $totaleskilometers /  $totalesLitros ,2)); ?> kms / litro
                        <?php else: ?>
                        0 kms / litro
                        <?php endif; ?>
                    </b>
                </td>
            </tr>
            <tr>
                <td>Rendimiento por cada 100 kms:</td>
                <td>
                    <b>
                        <?php if($totaleskilometers > 0 ||$totalesLitros > 0): ?>
                        <?php echo e(number_format(100 / ($totaleskilometers / $totalesLitros) ,2)); ?> lts / 100 kms
                        <?php else: ?>
                        0 kms / litro
                        <?php endif; ?>
                    </b>
                </td>
            </tr>
        </table>
    </div>

    <div class="row7" style="margin-top: 10px;">
        <?php
        $casetascountida = $presupuesto->total_casetas / 2;
        ?>
        <span style="margin-top: 10px ;">Detalles de Casetas: <?php echo e(count($detailCasets)); ?> casetas | $ <?php echo e(number_format($casetascountida,2)); ?> x 2 </span>
        <table>
            <?php ($keys = 0 ); ?>
            <td><?php $__currentLoopData = $detailCasets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $DS): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($DS->caseta_name); ?>: $ <?php echo e($DS->costo_casetas); ?> <?php if($keys > 0 && $keys < count($detailCasets) ): ?> | <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
        </table>
    </div>

    <div class="row8" style="margin-top: 10px;">
        <span style="margin-top: 10px ;">Comentarios Operador:</span>
        <textarea style="width: 100%;height:100px"><?php echo e($note); ?></textarea>
    </div>


    <div class="row5" style="margin-top: 80px;">
        <div class="column" style="align-items: center;text-align:center">
            <hr>
            <span style="text-align: center;">Nombre y firma del Operador </span>
        </div>
        <div class="column"></div>
        <div class="column" style="align-items: center;text-align:center">
            <hr>
            <span style="text-align: center;">Representante Agencia</span>
        </div>
    </div>


    <div class="row-footer">
        <div class="column" style="align-items: center;text-align:center">
            <hr>
            <span style="text-align: center;"><b>Mundochiapas.com</b> | 5ta. Av. Norte Poniente No. 451, Col. Teran,CP. 29050 Tuxtla Gutiérrez, Chiapas / WhatsApp: 961 217 2914</span>
        </div>
    </div><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/services/pdf_gastos.blade.php ENDPATH**/ ?>