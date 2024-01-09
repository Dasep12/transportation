<?php

?>

<body onLoad="document.payworks_form.submit();">
    <form action="https://via.banorte.com/secure3d/Solucion3DSecure.htm" name="payworks_form" id="payworks_form" method="post">
        <input type="hidden" name="CARD_NUMBER" value="<?php echo e($post['CARD_NUMBER']); ?>" />
        <input type="hidden" name="CARD_EXP" value="<?php echo e($post['CARD_EXP']); ?>" />
        <input type="hidden" name="AMOUNT" value="<?php echo e($post['AMOUNT']); ?>" />
        <input type="hidden" name="CARD_TYPE" value="<?php echo e($post['CARD_TYPE']); ?>" />
        <input type="hidden" name="MERCHANT_ID" value="7404351" />
        <input type="hidden" name="MERCHANT_NAME" value="IRENTACAR AUTOBUSES" />
        <input type="hidden" name="MERCHANT_CITY" value="MERIDA" />
        <input type="hidden" name="FORWARD_PATH" value="<?php echo e($post['FORWARD_PATH']); ?>" />
        <input type="hidden" name="3D_CERTIFICATION" value="03" />
        <input type="hidden" name="REFERENCE3D" value="<?php echo e(time() . 'X' . rand(11111, 99999)); ?>" />
        <!-- DATOS NUEVO DEL TARJETAHABIENTE (2022) -->
        <input type="hidden" name="CITY" value="<?php echo e($post['CITY']); ?>" />
        <input type="hidden" name="COUNTRY" value="<?php echo e($post['COUNTRY']); ?>" />
        <input type="hidden" name="EMAIL" value="<?php echo e($post['EMAIL']); ?>" />
        <input type="hidden" name="NAME" value="<?php echo e($post['NAME']); ?>" />
        <input type="hidden" name="LAST_NAME" value="<?php echo e($post['LAST_NAME']); ?>" />
        <input type="hidden" name="POSTAL_CODE" value="<?php echo e($post['POSTAL_CODE']); ?>" />
        <input type="hidden" name="STATE" value="<?php echo e($post['STATE']); ?>" />
        <input type="hidden" name="STREET" value="<?php echo e($post['STREET']); ?>" />
        <input type="hidden" name="MOBILE_PHONE" value="<?php echo e($post['MOBILE_PHONE']); ?>" />
        <input type="hidden" name="CREDIT_TYPE" value="<?php echo e($post['CREDIT_TYPE']); ?>" />
        <!-- NUEVA VERSION DEL 3D (2022) -->
        <input type="hidden" name="THREED_VERSION" value="2" />
        <center>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#333333">Procesando . . . . . . </font>
        </center>
    </form>
</body><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/customers/payment_proses.blade.php ENDPATH**/ ?>