<?php

use App\Helpers\BulanHelper;
?>
<div class="template_head" style="margin: 10px;">
    <table class="font-size:12px !important">
        <tbody>
            <tr>
                <td style="width: 30%;">
                    <img width="200px" src="<?php echo e(asset('public/admin/img/logo/logo-mundochiapas.png')); ?>">
                </td>
                <td style="width: 70%; font-size: 12px;" class="text-right">
                    <b>PROMOTORA MEXICO DE TURISMO SA DE CV</b><br />
                    5TA. NORTE PONIENTE NO. 451 COL. TERAN<br />
                    TUXTLA GUTIERREZ CHIAPAS<br />
                    RFC: PMT 120808 EP6
                </td>
            </tr>
            <tr>
                <td class="text-center" colspan="2">
                    <h1>ORDEN DE SERVICIO</h1>
                </td>
            </tr>
            <tr>
                <td style="width: 30%;" class="border-right border-top">
                    <b>Fecha:</b>
                    <br />
                </td>
                <td style="width: 70%;" class="text-right border-top">
                    <b><?php echo date_format(new DateTime($serviceData->date), "d"); ?> de <?php echo BulanHelper::monthSpanish(date_format(new DateTime($serviceData->date), "m")); ?> de <?php echo date_format(new DateTime($serviceData->date), "Y"); ?></b>
                </td>
            </tr>
            <tr>
                <td style="width: 30%;" class="border-right">
                    <b>Nombre del contratante:</b>
                    <br />
                    <br />
                </td>
                <td style="width: 70%;">
                    <?php echo $costData->customer_name; ?>
                </td>
            </tr>
            <tr>
                <td style="width: 30%;" class="border-right">
                    <b>No. de personas:</b>
                    <br />
                </td>
                <td style="width: 70%;">
                    <?php echo $carData->pasajeros; ?>
                </td>
            </tr>
            <tr>
                <td style="width: 30%;" class="border-right">
                    <b>Donde Inicia:</b>
                    <br />
                </td>
                <td style="width: 70%;">
                    <?php echo $costData->departure_city; ?> <?php echo date_format(new DateTime($costData->departure_date), "d/m/Y"); ?>
                </td>
            </tr>
            <tr>
                <td style="width: 30%;" class="border-right">
                    <b>Donde Termina:</b>
                    <br />
                </td>
                <td style="width: 70%;">
                    <?php echo $costData->destination_city; ?> <?php echo date_format(new DateTime($costData->returning_date), "d/m/Y"); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br />
                    <br />
                </td>
            </tr>
            <tr>
                <td style="width: 30%;" class="border-right">
                    <b>Nombre del Conductor:</b>
                    <br />
                    <br />
                </td>
                <td style="width: 70%;">
                    <?php echo  $driver1->first_name . ' ' . $driver1->last_name; ?>
                    <?php
                    if (!empty($costData->second_drivers)) {
                        echo $driver2->first_name . ' ' . $driver2->last_name;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="width: 30%;" class="border-right">
                    <b>No. licencia :</b>
                    <br />
                </td>
                <td style="width: 70%;">
                    <?php echo $driver1->license; ?>
                    <?php
                    if (!empty($costData->second_drivers)) {
                        echo $driver1->license;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="width: 30%;" class="border-right">
                    <b>Categor&iacute;a :</b>
                    <br />
                </td>
                <td style="width: 70%;">
                    A
                </td>
            </tr>
            <tr>
                <td style="width: 30%;" class="border-right">
                    <b>Vigencia:</b>
                    <br />
                </td>
                <td style="width: 70%;">
                    <?php echo  date_format(new DateTime($driver1->license_exp), "d/N/Y"); ?>
                    <?php
                    if (!empty($costData->second_drivers)) {
                        echo ' - ' . date_format(new DateTime($driver2->license_exp), "d/N/Y");
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br />
                    <br />
                </td>
            </tr>
            <tr>
                <td style="width: 30%;" class="border-right">
                    <b>Tipo de unidad:</b>
                    <br />
                </td>
                <td style="width: 70%;">
                    <?php echo $carData->car_type_desc; ?>
                </td>
            </tr>
            <tr>
                <td style="width: 30%;" class="border-right">
                    <b>Modelo:</b>
                    <br />
                </td>
                <td style="width: 70%;">
                    <?php echo $carData->model; ?>
                </td>
            </tr>
            <tr>
                <td style="width: 30%;" class="border-right">
                    <b>Placas:</b>
                    <br />
                </td>
                <td style="width: 70%;" class="border-bottom">
                    <?php echo $carData->plate; ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <table>
        <tbody>
            <tr>
                <td style="width: 40%;" class="border-top text-center">
                    Nombre y firma del Cliente
                </td>
                <td style="width: 20%;">

                </td>
                <td style="width: 40%;" class="border-top text-center">
                    Nombre y firma de la Agencia
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <br />
                    <br />
                </td>
            </tr>
            <tr>
                <td class="text-justify" colspan="3">
                    <?php
                    if (!empty($carData->num_permission)) {
                        echo 'Permiso para prestar el Servicio de Autotransporte Federal de Turismo Expedido por la Secretaria de Comunicaciones y Transportes: <b>' . $carData->num_permission . '</b>';
                    }
                    ?>
                </td>
            </tr>

        </tbody>
    </table>


    <table style="position:relative;top:300px">
        <td class="border-top text-center">
            <div class="row-footer ">
                <div class="column" style="align-items: center;text-align:center">
                    <span style="text-align: center;"><b>Mundochiapas.com</b> | 5ta. Av. Norte Poniente No. 451, Col. Teran,CP. 29050 Tuxtla Gutiérrez, Chiapas | WhatsApp: 961 217 2914</span>
                </div>
            </div>
        </td>
    </table>
</div><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/services/pdf_contract2.blade.php ENDPATH**/ ?>