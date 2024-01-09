<div class="page-break"></div>
<div class="template_head" style="margin: 10px;">
    <table>
        <tbody>
            <tr>
                <td style="width: 30%;">
                    <img width="200px" src="<?php echo e(asset('public/admin/img/logo/logo-mundochiapas.png')); ?>">
                </td>
                <td style="width: 70%;" class="text-right">
                    <h3><b>PROMOTORA MEXICO TURISMO S.A. DE CV.</b></h3>
                    <h3><b>CHECK IN</b></h3>
                </td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td colspan="6" class="text-center">
                    <h3><b>VERIFICACI&Oacute;N VEHICULAR</b></h3><br />
                </td>
            </tr>
            <tr>
                <td style="width: 15%;" class="text-right"><b>Fecha de Salida:</b></td>
                <td style="width: 20%;" class="border-bottom"><?php echo date_format(new DateTime($costData->departure_date), "d/m/Y"); ?></td>
                <td style="width: 10%;" class="text-right"><b>Placas:</b></td>
                <td style="width: 20%;" class="border-bottom"><?php echo $carData->plate; ?></td>
                <td style="width: 15%;" class="text-right"><b>Odometro Salida:</b></td>
                <td style="width: 20%;" class="border-bottom"></td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td class="text-center border-bottom">
                    <h3><b>CONDICIONES GENERALES DEL VEH&Iacute;CULO</b></h3>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="brd1" style="font-size: 10px !important;">
        <thead>
            <tr>
                <th class="text-center" style="width: 23.3%"><b>EXTERIORES</b></th>
                <th class="text-center" style="width: 5%"><b>SI</b></th>
                <th class="text-center" style="width: 5%"><b>NO</b></th>
                <th class="text-center" style="width: 23.3%"><b>INTERIORES</b></th>
                <th class="text-center" style="width: 5%"><b>SI</b></th>
                <th class="text-center" style="width: 5%"><b>NO</b></th>
                <th class="text-center" style="width: 23.3%"><b>ACCESORIOS</b></th>
                <th class="text-center" style="width: 5%"><b>SI</b></th>
                <th class="text-center" style="width: 5%"><b>NO</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width: 23.3%">UNIDAD DE LUCES</td>
                <td style="width: 5%"></td>
                <td style="width: 5%"></td>
                <td style="width: 23.3%">CALEFACCION A/A</td>
                <td style="width: 5%"></td>
                <td style="width: 5%"></td>
                <td style="width: 23.3%">GATO</td>
                <td style="width: 5%"></td>
                <td style="width: 5%"></td>
            </tr>
            <tr>
                <td>¼ LUCES</td>
                <td></td>
                <td></td>
                <td>RADIO</td>
                <td></td>
                <td></td>
                <td>MANERAL DEL GATO</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>ESPEJOS LATERALES IZQ/DER.</td>
                <td></td>
                <td></td>
                <td>BOCINAS</td>
                <td></td>
                <td></td>
                <td>LLAVE DE RUEDAS</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>CRISTALES</td>
                <td></td>
                <td></td>
                <td>ENCENDEDOR</td>
                <td></td>
                <td></td>
                <td>HERRAMIENTAS</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>EMBLEMAS</td>
                <td></td>
                <td></td>
                <td>ESPEJO RETROVISOR</td>
                <td></td>
                <td></td>
                <td>TRIANGULO</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>LLANTAS Y RINES 4</td>
                <td></td>
                <td></td>
                <td>CENICERO</td>
                <td></td>
                <td></td>
                <td>LLANTA DE REFACCION</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>TAPONES 4</td>
                <td></td>
                <td></td>
                <td>CINTURONES</td>
                <td></td>
                <td></td>
                <td>EXTINGUIDOR</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>MOLDURAS</td>
                <td></td>
                <td></td>
                <td>BOTONES DE INTERIORES</td>
                <td></td>
                <td></td>
                <td>MATERIAL DE LIMPIEZA <small>(escoba, trapeador, franela, jabon)</small></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>TAPON DE GASOLINA</td>
                <td></td>
                <td></td>
                <td>MANIJAS INTERIORES</td>
                <td></td>
                <td></td>
                <td>GEL, TOLLAS HUMEDAS,</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>CLAXON</td>
                <td></td>
                <td></td>
                <td>TAPETES</td>
                <td></td>
                <td></td>
                <td>USB CON PELICULAS</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>LIMPIADORES (PLUMAS)</td>
                <td></td>
                <td></td>
                <td>VESTIDURAS</td>
                <td></td>
                <td></td>
                <td>DOCUMENTACION</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>MANIJAS EXTERIORES</td>
                <td></td>
                <td></td>
                <td>NIVEL LIQUIDO FRENOS</td>
                <td></td>
                <td></td>
                <td>TARJETA DE CIRCULACION</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>NIVEL DE ACEITE DE MOTOR</td>
                <td></td>
                <td></td>
                <td>NIVEL LIMPIA PARABRISAS</td>
                <td></td>
                <td></td>
                <td>POLIZA DE SEGURO</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>NIVEL DE ACEITE DE DIRECCION</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>VERIFICACIONES <small>(humo y fisico mecaniaca)</small></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <table>
        <tbody>
            <tr>
                <td style="width: 15%;" class="text-right"><b>Fecha de Regreso:</b></td>
                <td style="width: 20%;" class="border-bottom"><?php echo date_format(new DateTime($costData->returning_date), "d/m/Y"); ?></td>
                <td style="width: 10%;" class="text-right"><b>Placas:</b></td>
                <td style="width: 20%;" class="border-bottom"><?php echo $carData->plate; ?></td>
                <td style="width: 15%;" class="text-right"><b>Odometro Regreso:</b></td>
                <td style="width: 20%;" class="border-bottom"></td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td class="text-center border-bottom">
                    <h3><b>CONDICIONES GENERALES DEL VEH&Iacute;CULO</b></h3>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="brd1" style="font-size: 10px !important;">
        <thead>
            <tr>
                <th class="text-center" style="width: 23.3%"><b>EXTERIORES</b></th>
                <th class="text-center" style="width: 5%"><b>SI</b></th>
                <th class="text-center" style="width: 5%"><b>NO</b></th>
                <th class="text-center" style="width: 23.3%"><b>INTERIORES</b></th>
                <th class="text-center" style="width: 5%"><b>SI</b></th>
                <th class="text-center" style="width: 5%"><b>NO</b></th>
                <th class="text-center" style="width: 23.3%"><b>ACCESORIOS</b></th>
                <th class="text-center" style="width: 5%"><b>SI</b></th>
                <th class="text-center" style="width: 5%"><b>NO</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width: 23.3%">UNIDAD DE LUCES</td>
                <td style="width: 5%"></td>
                <td style="width: 5%"></td>
                <td style="width: 23.3%">CALEFACCION A/A</td>
                <td style="width: 5%"></td>
                <td style="width: 5%"></td>
                <td style="width: 23.3%">GATO</td>
                <td style="width: 5%"></td>
                <td style="width: 5%"></td>
            </tr>
            <tr>
                <td>¼ LUCES</td>
                <td></td>
                <td></td>
                <td>RADIO</td>
                <td></td>
                <td></td>
                <td>MANERAL DEL GATO</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>ESPEJOS LATERALES IZQ/DER.</td>
                <td></td>
                <td></td>
                <td>BOCINAS</td>
                <td></td>
                <td></td>
                <td>LLAVE DE RUEDAS</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>CRISTALES</td>
                <td></td>
                <td></td>
                <td>ENCENDEDOR</td>
                <td></td>
                <td></td>
                <td>HERRAMIENTAS</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>EMBLEMAS</td>
                <td></td>
                <td></td>
                <td>ESPEJO RETROVISOR</td>
                <td></td>
                <td></td>
                <td>TRIANGULO</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>LLANTAS Y RINES 4</td>
                <td></td>
                <td></td>
                <td>CENICERO</td>
                <td></td>
                <td></td>
                <td>LLANTA DE REFACCION</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>TAPONES 4</td>
                <td></td>
                <td></td>
                <td>CINTURONES</td>
                <td></td>
                <td></td>
                <td>EXTINGUIDOR</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>MOLDURAS</td>
                <td></td>
                <td></td>
                <td>BOTONES DE INTERIORES</td>
                <td></td>
                <td></td>
                <td>MATERIAL DE LIMPIEZA <small>(escoba, trapeador, franela, jabon)</small></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>TAPON DE GASOLINA</td>
                <td></td>
                <td></td>
                <td>MANIJAS INTERIORES</td>
                <td></td>
                <td></td>
                <td>GEL, TOLLAS HUMEDAS,</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>CLAXON</td>
                <td></td>
                <td></td>
                <td>TAPETES</td>
                <td></td>
                <td></td>
                <td>USB CON PELICULAS</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>LIMPIADORES (PLUMAS)</td>
                <td></td>
                <td></td>
                <td>VESTIDURAS</td>
                <td></td>
                <td></td>
                <td>DOCUMENTACION</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>MANIJAS EXTERIORES</td>
                <td></td>
                <td></td>
                <td>NIVEL LIQUIDO FRENOS</td>
                <td></td>
                <td></td>
                <td>TARJETA DE CIRCULACION</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>NIVEL DE ACEITE DE MOTOR</td>
                <td></td>
                <td></td>
                <td>NIVEL LIMPIA PARABRISAS</td>
                <td></td>
                <td></td>
                <td>POLIZA DE SEGURO</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>NIVEL DE ACEITE DE DIRECCION</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>VERIFICACIONES <small>(humo y fisico mecaniaca)</small></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>


    <table>
        <tbody>
            <tr>
                <td style="width: 40%" class=""><b>OBSERVACIONES</b></td>
                <td style="width: 30%" class="text-center"><b>COMBUSTIBLE</b></td>
                <td style="width: 30%"></td>
            </tr>
            <tr>
                <td style="width: 40%" class="border-bottom border-top border-right border-left"></td>
                <td style="width: 30%" class="text-center"><img width="200px" src="<?php echo e(asset('public/front/image007.jpeg')); ?>"></td>
                <td style="width: 30%" class="text-center"><img width="200px" src="<?php echo e(asset('public/front/image005.jpeg')); ?>"></td>
            </tr>
        </tbody>
    </table>
    <br />
    <br />
    <br />
    <br />
    <br />


    <table>
        <tbody>
            <tr>
                <td style="width: 40%;" class="text-center">
                    <?php echo $driver1->first_name . ' ' . $driver1->last_name; ?>
                </td>
                <td style="width: 20%;"></td>
                <td style="width: 40%;"></td>
            </tr>
            <tr>
                <td style="width: 40%;" class="border-top text-center">
                    NNOMBRE Y FIRMA QUIEN RECIBE
                </td>
                <td style="width: 20%;">
                </td>
                <td style="width: 40%;" class="border-top text-center">
                    NOMBRE Y FIRMA QUIEN ENTREGA
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
</div><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/services/pdf_contract4.blade.php ENDPATH**/ ?>