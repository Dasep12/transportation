<div class="page-break"></div>

<div class="template_page" style="margin: 10px;">

    <table class="border-all">
        <tbody>
            <tr>
                <td style="width: 40%;">
                    <img width="200px" src="{{ asset('public/admin/img/logo/logo-mundochiapas.png') }}">
                </td>
                <td style="width: 60%; font-size: 20px;">
                    <h5>MUNDOCHIAPAS.COM</h5>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="border-all">
        <tbody>
            <tr class="border-all">
                <td class="text-center" style="width: 70%;" rowspan="2">
                    <h4><b>BITACORA DE HORAS DE CONDUCTOR</b></h4>
                </td>
                <td class="text-center color-cell border-all" style="width: 10%;">
                    DIA
                </td>
                <td class="text-center color-cell border-all" style="width: 10%;">
                    MES
                </td>
                <td class="text-center color-cell border-all" style="width: 10%;">
                    A&Ntilde;O
                </td>
            </tr>
            <tr>
                <td class="text-center border-all">
                    <?php echo date_format(new DateTime($serviceData->date), "d"); ?>
                </td>
                <td class="text-center border-all">
                    <?php echo date_format(new DateTime($serviceData->date), "n"); ?>
                </td>
                <td class="text-center border-all">
                    <?php echo date_format(new DateTime($serviceData->date), "Y"); ?>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="border-all">
        <tbody>
            <tr>
                <td colspan="6">
                    <br />
                </td>
            </tr>
            <tr>
                <td class="text-right color-cell" style="width: 20%;">
                    <b>RAZON SOCIAL:</b>
                </td>
                <td class="border-bottom" style="width: 80%;" colspan="5">
                    PROMOTORA MEXICO DE TURISMO SA DE CV
                </td>
            </tr>
            <tr>
                <td class="text-right color-cell" style="width: 20%;">
                    <b>DOMICILIO:</b>
                </td>
                <td class="border-bottom" style="width: 80%;" colspan="5">
                    5TA. NORTE PONIENTE NO. 451 - B, COL. TERAN, TUXTLA GUTIERREZ, CHIAPAS
                </td>
            </tr>
            <tr>
                <td class="text-right color-cell" style="width: 20%;">
                    <b>TIPO DE SERVICIO:</b>
                </td>
                <td class="border-bottom" style="width: 80%;" colspan="5">
                    TURISMO
                </td>
            </tr>
            <tr>
                <td class="text-right color-cell" style="width: 20%;">
                    <b>NO. ECONOMICO:</b>
                </td>
                <td class="border-bottom" style="width: 10%;">
                    <?php $carData->model; ?>
                </td>
                <td class="text-right" style="width: 15%;">
                    <b>MARCA:</b>
                </td>
                <td class="border-bottom" style="width: 20%;">
                    <?php echo $carData->car_name; ?>
                </td>
                <td class="text-right" style="width: 15%;">
                    <b>PLACA:</b>
                </td>
                <td class="border-bottom" style="width: 20%;">
                    <?php echo $carData->plate; ?>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <br />
                </td>
            </tr>
            <tr>
                <td class="text-right color-cell" style="width: 20%;font-size: 11px;">
                    <b>DATOS DEL CONDUCTOR:</b>
                </td>
                <td class="border-bottom" style="width: 80%;" colspan="5">
                    <?php echo $driver1->first_name . ' ' . $driver1->last_name; ?>
                    <?php
                    if (!empty($costData->second_drivers)) {
                        echo '-' .  $driver2->first_name . ' ' . $driver2->last_name;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td class="text-right color-cell" style="width: 20%;">
                    <b>NUM. LICENCIA:</b>
                </td>
                <td class="border-bottom" style="width: 30%;" colspan="2">
                    <?php echo $driver1->license; ?>
                    <?php
                    if (!empty($driver2)) {
                        echo '-' . $driver2->license;
                    }
                    ?>
                </td>
                <td class="text-right" style="width: 20%;">
                    <b>VIGENCIA:</b>
                </td>
                <td class="border-bottom" style="width: 30%;" colspan="2">
                    <?php echo date_format(new DateTime($driver1->license_exp), "d/N/Y"); ?>
                    <?php
                    if (!empty($driver2)) {
                        echo ' - ' . date_format(new DateTime($driver2->license_exp), "d/N/Y");
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <br />
                </td>
            </tr>
            <tr>
                <td class="text-center" colspan="6">
                    <h3><b>DATOS DEL SERVCIO</b></h3>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="border-all">
        <thead>
            <tr>
                <th class="text-center color-cell border-all" style="width: 12%">FECHA INICIO DEL VIAJE</th>
                <th class="text-center color-cell border-all" style="width: 12%">HORARIO DE SALIDA</th>
                <th class="text-center color-cell border-all" style="width: 12%">ORIGEN</th>
                <th class="text-center color-cell border-all" style="width: 12%">DESTINO</th>
                <th class="text-center color-cell border-all" style="width: 52%">OBSERVACIONES</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-all">
                <td style="width: 12%" class="border-all"></td>
                <td style="width: 12%" class="border-all"></td>
                <td style="width: 12%" class="border-all"></td>
                <td style="width: 12%" class="border-all"></td>
                <td style="width: 52%" class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
            <tr>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
                <td class="border-all"></td>
            </tr>
        </tbody>
    </table>

    <table class="border-all">
        <tbody>
            <tr>
                <td colspan="3">
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
                    <br />
                    <br />
                </td>
            </tr>
            <tr>
                <td style="width: 40%;" class="border-top text-center">
                    FIRMA DEL RESPONSABLE
                </td>
                <td style="width: 20%;">

                </td>
                <td style="width: 40%;" class="border-top text-center">
                    FIRMA DEL CONDUCTOR
                </td>
            </tr>
        </tbody>
    </table>


    <table style="position:relative;top:30px">
        <td class="border-top text-center">
            <div class="row-footer ">
                <div class="column" style="align-items: center;text-align:center">
                    <span style="text-align: center;"><b>Mundochiapas.com</b> | 5ta. Av. Norte Poniente No. 451, Col. Teran,CP. 29050 Tuxtla Gutiérrez, Chiapas | WhatsApp: 961 217 2914</span>
                </div>
            </div>
        </td>
    </table>
</div>