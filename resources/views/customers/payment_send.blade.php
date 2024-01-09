<?php
// dd($post);
if ($post['Status'] == 200) {
?>
    <form action="https://via.pagosbanorte.com/payw2" method="POST" name="payworks" id="payworks">
        <input type="hidden" name="MERCHANT_ID" value="7404351" />
        <input type="hidden" name="USER" value="payments" />
        <input type="hidden" name="PASSWORD" value="JpRa78#10$B" />

        <!--Transaction Type-->
        <input type="hidden" name="CMD_TRANS" value="AUTH" />
        <input type="hidden" name="TERMINAL_ID" value="74043511" />


        <!--Bill Information-->
        <input type="hidden" name="AMOUNT" value="<?= number_format(2, 2, '.', '') ?>" />
        <input type="hidden" name="MODE" value="AUT" />
        <input type="hidden" name="CONTROL_NUMBER" value="<?= time() ?>" />

        <!--Credit Card Info-->
        <input type="hidden" name="CARD_NUMBER" value="<?= 4098730104237349 ?>" />
        <input type="hidden" name="CARD_EXP" value="<?= '06/28' ?>" />
        <input type="hidden" name="SECURITY_CODE" value="<?= '998' ?>" />
        <input type="hidden" name="ENTRY_MODE" value="MANUAL" />

        <!--Further Process-->
        <input type="hidden" name="RESPONSE_URL" value="https://www.mundochiapas.com/tours-en-chiapas/tes.php?">

        <input type="hidden" name="RESPONSE_LANGUAGE" value="EN" />
        <!--3D Secure Response-->
        <input type="hidden" name="STATUS_3D" value="<?= $post['Status'] ?>">
        <input type="hidden" name="ECI" value="<?= $post['ECI'] ?>">
        <?php if (isset($post['XID']) && !empty($post['XID'])) { ?>
            <input type="hidden" name="XID" value="<?php $post['XID'] ?>">
        <?php } ?>
        <?php if (isset($post['CAVV']) && !empty($post['CAVV'])) { ?>
            <input type="hidden" name="CAVV" value="<?= $post['CAVV'] ?>">
        <?php } ?>
        <input type="hidden" name="VERSION_3D" value="2" />
        <?php
        $nop = 00;
        if (isset($nop) && !empty($nop)) {
        ?>
            <input type="hidden" name="PLAN_TYPE" value="03">
            <input type="hidden" name="PAYMENTS_NUMBER" value="<?= "03" ?>">
        <?php } ?>
    </form>
    <script language="javascript">
        document.forms['payworks'].submit();
    </script>

<?php } else {
?>
    <h3>failed</h3>
<?php }
?>