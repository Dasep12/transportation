<?php if($cost[0]->no_drivers == 2): ?>
<?php echo csrf_field(); ?>
<input type="text" hidden name="service_id" value="<?php echo e($service_id); ?>" id="">
<div class="row">
    <div class="col-lg-3">
        <div class="form-group">Chofer 1:</div>
        <input type="text" hidden value="<?php echo e($cost[0]->idDrive1 * $cost[0]->no_of_days); ?>" name="driver_id_1" id="">
        <input type="text" class="form-control input-decimal" disabled value="<?php echo e($cost[0]->first_names); ?>" name="name_driver_1" id="name_driver_1">
    </div>
    <div class="col-lg-2">
        <div class="form-group">Honorarios:</div>
        <input type="text" class="form-control" value="<?php echo e($cost[0]->fees_1 * $cost[0]->no_of_days); ?>" disabled name="fee_total_1" id="fee_total_1">
    </div>
    <div class="col-lg-2">
        <div class="form-group">Monto 1 : *</div>
        <input type="text" autocomplete="off" class="form-control number-decimal" <?php if(count($dataAdvance)>0): ?>value='<?php echo e($dataAdvance[0]->advance_1); ?>' <?php else: ?> value='0' <?php endif; ?> name="advance_1" name="amount_1" id="amount_1">
    </div>
    <div class="col-lg-2">
        <div class="form-group">Resto 1 : </div>
        <input type="text" autocomplete="off" class="form-control number-decimal" <?php if(count($dataAdvance)>0): ?>value='<?php echo e($dataAdvance[0]->payment_total_1); ?>' <?php else: ?> value='0' <?php endif; ?> name="payment_total_1" id="payment_total_1">
    </div>
    <div class="col-lg-2">
        <div class="form-group">Balance:</div>
        <input type="text" class="form-control" disabled name="balance_1" id="balance_1">
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-3">
        <div class="form-group">Chofer 2:</div>
        <input type="text" hidden value="<?php echo e($cost[0]->idDrive2); ?>" name="driver_id_2" id="">
        <input type="text" class="form-control" disabled value="<?php echo e($cost[0]->seconds_names); ?>" name="name_driver_2" id="name_driver_2">
    </div>
    <div class="col-lg-2">
        <div class="form-group">Honorarios:</div>
        <input type="text" class="form-control" value="<?php echo e($cost[0]->fees_1 * $cost[0]->no_of_days); ?>" disabled name="fee_total_2" id="fee_total_2">
    </div>
    <div class="col-lg-2">
        <div class="form-group">Monto 2 : *</div>
        <input type="text" autocomplete="off" class="form-control number-decimal" <?php if(count($dataAdvance)>0): ?>value='<?php echo e($dataAdvance[0]->advance_2); ?>' <?php else: ?> value='0' <?php endif; ?> name="advance_2" id="advance_2">
    </div>
    <div class="col-lg-2">
        <div class="form-group">Resto 2 : </div>
        <input type="text" autocomplete="off" class="form-control number-decimal" <?php if(count($dataAdvance)>0): ?>value='<?php echo e($dataAdvance[0]->payment_total_2); ?>' <?php else: ?> value='0' <?php endif; ?> name="payment_total_2" id="payment_total_2">
    </div>
    <div class="col-lg-2">
        <div class="form-group">Balance:</div>
        <input type="text" class="form-control" disabled name="balance_2" id="balance_2">
    </div>
</div>
<?php else: ?>
<?php echo csrf_field(); ?>
<input type="text" hidden name="service_id" value="<?php echo e($service_id); ?>" id="">
<div class="row">
    <div class="col-lg-3">
        <div class="form-group">Chofer 1:</div>
        <input type="text" hidden value="<?php echo e($cost[0]->idDrive1); ?>" name="driver_id_1" id="">
        <input type="text" class="form-control input-decimal" disabled value="<?php echo e($cost[0]->first_names); ?>" name="name_driver_1" id="name_driver_1">
    </div>
    <div class="col-lg-2">
        <div class="form-group">Honorarios:</div>
        <input type="text" class="form-control" value="<?php echo e($cost[0]->fees_1 * $cost[0]->no_of_days); ?>" disabled name="fee_total_1" id="fee_total_1">
    </div>
    <div class="col-lg-2">
        <div class="form-group">Monto 1 : *</div>
        <input type="text" autocomplete="off" class="form-control number-decimal" <?php if(count($dataAdvance)>0): ?>value='<?php echo e($dataAdvance[0]->advance_1); ?>' <?php else: ?> value='0' <?php endif; ?>" name="advance_1" name="amount_1" id="amount_1">
    </div>
    <div class="col-lg-2">
        <div class="form-group">Resto 1 : </div>
        <input type="text" autocomplete="off" class="form-control number-decimal" <?php if(count($dataAdvance)>0): ?>value='<?php echo e($dataAdvance[0]->payment_total_1); ?>' <?php else: ?> value='0' <?php endif; ?> name="payment_total_1" id="payment_total_1">
    </div>
    <div class="col-lg-2">
        <div class="form-group">Balance:</div>
        <input type="text" class="form-control" disabled name="balance_1" id="balance_1">
    </div>
</div>

<?php endif; ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/services/modalanticipo.blade.php ENDPATH**/ ?>