<div class="template_head" style="margin: 20px 20px 20px 20px;">
    <table>
        <tbody>
            <tr>
                <td>
                    <img width="200px" src="<?php echo e(asset('public/admin/img/logo/logo-mundochiapas.png')); ?>">
                </td>
            </tr>
            <tr>
                <td class="text-center">
                    <b style="font-size: 16px;">CONTRATO DE SERVICIO DE TRANSPORTACI&Oacute;N DE PASAJEROS</b>
                </td>
            </tr>
            <tr>
                <td class="text-left">
                    <b>&nbsp;DECLARACIONES</b>
                </td>
            </tr>
            <tr>
                <td class="text-justify">
                    <b>Primera</b>.- Declara el Usuario, llamarse como ha quedado asentado y manifiesta <b><?php

                                                                                                            use App\Helpers\BulanHelper;

                                                                                                            echo $costData->customer_name; ?></b>, tener la capacidad legal para llevar a cabo el presente contrato.
                </td>
            </tr>
            <tr>
                <td class="text-center">
                    <b>---------------------------------------------------------------------- CL&Aacute;USULAS ----------------------------------------------------------------------</b>
                </td>
            </tr>
            <tr>
                <td class="text-justify">
                    <b>PRIMERA</b>.- Los servicios a los cuales obliga el prestador de servicio es el desarrolo de la presente ruta:
                    <br />
                    <?php echo nl2br($serviceData->itinerary); ?>
                    <br /> <br />
                    Inicio en: <b>
                        <?php echo $serviceData->departure; ?></b>, finalizando en: <b><?php echo $serviceData->destination; ?></b> (Anexo 1 Itinerario en Orden de Servicio).
                    Fecha de Abordo: <b><?php echo date_format(new DateTime($contractPage1[0]->departure_date), 'd') ?> de <?php echo BulanHelper::monthSpanish(date_format(new DateTime($contractPage1[0]->departure_date), "m")); ?> de <?php echo date_format(new DateTime($contractPage1[0]->departure_date), "Y"); ?> (<?php echo date_format(new DateTime($contractPage1[0]->departure_time), "h:i A"); ?>)</b> con termino el <b><?php echo date_format(new DateTime($contractPage1[0]->returning_date), "d"); ?> de <?php echo BulanHelper::monthSpanish(date_format(new DateTime($contractPage1[0]->returning_date), "m")); ?> de <?php echo date_format(new DateTime($contractPage1[0]->returning_date), "Y"); ?> <?php echo date_format(new DateTime($contractPage1[0]->returning_time), "h:i A"); ?> (al termino del evento)</b>. Los horarios, Itinerario y fechas
                    especificados en el presente contrato y orden de servicio <b>NO</b> podr&aacute;n ser modificados sin previa autorizaci&oacute;n del Prestador de servicio y el respectivo
                    pago adicional en su caso. Para que el prestador pueda realizar el servicio ambas partes convienen como lugar de reuni&oacute;n el especificado en la Orden
                    de Servcio para efectos de ubicar al personal y la unidad correspodiente.
                    <br /><br />
                    <b>SEGUNDA</b>.- Se contrata la unidad, Tipo: <b><?php echo $carData->car_name; ?></b>, con capacidad <b><?php echo $carData->pasajeros; ?> pasajeros</b>. La unidad cuenta con los siguientes servicios: <b><?php echo $carData->car_feature; ?></b>.
                    <br /><br />

                    <b>TERCERA</b>.- El costo del servicio <b><?php echo e('$ ' .number_format($contractPage1[0]->total_amount,2)); ?></b> incluye lo siguiente: <b>Combustible</b> de la unidad para los traslados especificados en el Itinerario del anexo 1, <b>Peajes</b>
                    carreteros, <b>Sueldo</b> y vi&aacute;ticos del operador y <b>Uso</b> de la unidad descritas en la cl&aacute;usula primera. <b>El prestador de Servico No se hace responsable</b> de
                    los gastos personales que los turistas tengan.
                    <br /><br />

                    <b>CUARTA</b>.- El prestador de servicios no se hace responsable del contenido y procedencia del equipaje que aborde a la unidad el usuario y los pasajeros, el equipaje no es objeto del contrato de transporte, entendiéndose, a todos los efecto, que el viajero lo conserva siempre consigo, cualquiera que sea la parte del vehículo en sea colocado y que es transportado por el viajero por su cuenta y riesgo, sin que el prestador de servicios este obligado a responder contractualmente por la pérdida o daño que puedan sufrir por cualquier causa. Se transportará gratuitamente un máximo de <b>25 kilos</b> por persona distribuido en una maleta de tamaño normal. El exceso de equipaje se aceptará, siempre y cuando la capacidad de carga del vehículo lo permita, pudiendo ser rechazado, siempre a criterio del guía. Queda claro que la decisión, en último extremo, corresponderá al guía o al conductor del vehículo, caso de no llevar guía.
                    <br /><br />

                    <b>QUINTA</b>.- Es responsabilidad del usuario y los pasajeros ir provistos de un pasaporte o identificación oficial vigente y requisitos necesarios. El prestador de servicios declina toda la responsabilidad en caso de ser rechazada por alguna autoridad la concesión, por carecer de alguno de los requisitos que se exigen o defecto en el pasaporte, y será por cuenta del viajero cualquier gasto que se origine. Así mismo el prestador de servicios no se hace responsable de la documentación, legalidad y antecedentes penales, nacionalidad del usuario y los pasajeros.
                    <br /><br />

                    <b>SEXTA</b>. - El usuario y los pasajeros se comprometen a que durante su estancia dentro de la unidad darán buen uso a los servicios con que cuenta la unidad, en caso de requerir reproducir películas o música solicitarán el apoyo del operador. Así mismo se comprometen a pagar los daños que causen a la unidad contratada. <b>Está Prohibido dentro de la unidad Fumar, Ingerir bebidas alcohólicas, drogas, enervantes y distraer de sus funciones al operador</b>.
                    <br /><br />

                    <b>SEPTIMA</b>. - <b>El prestador del servicio no asume responsabilidad alguna, respecto a los retrasos de horarios como consecuencia de bloqueo en las vialidades, por condiciones naturales, sociales o por orden público y demás circunstancias de fuerza mayor o caso fortuito que altere el normal desarrollo de la prestación de servicios. En caso de que el cliente decida ir por una ruta alterna a la previamente estipulada, deberá asumir los gastos relacionados con la misma y la agencia deberá autorizar al conductor dicha modificación a la ruta.</b>
                    <br /><br />

                    <b>OCTAVA</b>. - La Capacidad de la unidad contratada es de <b>47, cada uno en un asiento individual</b>, en caso de exceder el número de pasajeros deberá contratar el usuario otra unidad o disminuir el número de pasajeros hasta alcanzar el cupo. Se entiende como pasajero:<b> Persona de 0 meses de edad en adelante </b>. No pueden ocupar 2 personas un mismo asiento, no pueden viajar pasajeros sentados en piso de la unidad.
                    <br /><br />

                    <b>NOVENA</b>. - El seguro de pasajero con que cuenta la unidad, aplica únicamente para las eventualidades que se susciten durante los traslados en la unidad. El Prestador de servicios no se hace responsable de los siniestros ocurrido fuera de la unidad contratada. Si alguna de las pasajeras, en caso de que hubiese, se encuentre embarazada, es necesario que informe sobre su estado y en caso de requerirse por los prestadores de servicios deberá presentar un certificado médico que autorice su viaje.
                    <br /><br />

                    <b>DECIMA</b>. - En el presente contrato de transporte terrestre, las partes acuerdan las siguientes condiciones con respecto a la cancelación, reembolso y reprogramación de los servicios de transporte contratados:
                    <br /><br />

                    <b>Reprogramación:</b>El cliente tendrá la opción de reprogramar los servicios contratados para una fecha futura, siempre y cuando notifique a la empresa transportista con al menos siete (7) días de anticipación a la fecha originalmente acordada para la prestación de los servicios.
                    <br /><br />

                    <b>Procedimiento de Reprogramación:</b>. En caso de que el cliente desee reprogramar los servicios, deberá ponerse en contacto con la empresa transportista a través de los medios de comunicación proporcionados en el contrato original. La empresa transportista hará todos los esfuerzos razonables para acomodar la reprogramación en una fecha que sea mutuamente conveniente para ambas partes.
                    <br /><br />

                    <b>Limitaciones a la Reprogramación:</b>La empresa transportista se reserva el derecho de limitar la cantidad de veces que se puede reprogramar un servicio y de rechazar la reprogramación en casos en los que no sea factible o no sea razonable desde una perspectiva operativa.
                    <br /><br />

                    <b>Cambios en las Tarifas: </b>Cualquier cambio en las tarifas o costos asociados a los servicios de transporte terrestre debido a la reprogramación serán responsabilidad del cliente y deberán ser acordados entre las partes antes de la nueva fecha de prestación de los servicios
                    <br /><br />


                    <b>La aceptación de estas condiciones es un requisito esencial para la prestación de los servicios de transporte terrestre en virtud de este contrato. Al firmar este contrato, el cliente reconoce su conformidad y acepta plenamente el contenido de todas las disposiciones aquí establecidas, en relación con el contrato en su totalidad.</b>
                </td>
            </tr>
        </tbody>
    </table>


    <table>
        <tbody>
            <tr>
                <td colspan="2">
                    <br />
                    <br />
                </td>
            </tr>
            <tr>
                <td style="width: 40%;" class="border-top text-center">
                    <b>Valeria Gordillo Villar<br>La Agencia</b>
                </td>
                <td style="width: 20%;">

                </td>
                <td style="width: 40%;" class="border-top text-center">
                    <b><?php echo $costData->customer_name; ?><br>El Cliente</b>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="position:relative;top:20px">
        <td class="border-top text-center">
            <div class="row-footer ">
                <div class="column" style="align-items: center;text-align:center">
                    <span style="text-align: center;"><b>Mundochiapas.com</b> | 5ta. Av. Norte Poniente No. 451, Col. Teran,CP. 29050 Tuxtla Gutiérrez, Chiapas | WhatsApp: 961 217 2914</span>
                </div>
            </div>
        </td>
    </table>
</div><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/services/pdf_contract.blade.php ENDPATH**/ ?>