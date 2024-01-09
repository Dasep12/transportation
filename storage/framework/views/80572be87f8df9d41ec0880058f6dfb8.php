

<?php $__env->startSection('title'); ?> Orden de Pago <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Orden de Pago <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Form Add <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>


<div class="row mb-5">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Orden de Pago - Form</h4>
                <a href="/ordendepago" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <form method="post" class="needs-validation" action="/ordendepago/addedd" novalidate>
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="horizontal-email-input" class="col-form-label">
                                Proveedor: *
                            </label>
                            <select name="supplier_id" required id="supplier_id" class="form-control select5">
                                <option value="">-SELECCIONER-</option>
                                <?php $__currentLoopData = $prevedor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($pre->id); ?>"><?php echo e(ucwords(strtolower($pre->name))); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <label for="horizontal-email-input" class="col-form-label">
                                Empressa: *
                            </label>
                            <select name="company_id" required id="company_id" class="form-control select3">
                                <option value="">-SELECCIONER-</option>
                                <?php $__currentLoopData = $empressa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($pr->id); ?>"><?php echo e(ucwords(strtolower($pr->name))); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <label for="horizontal-email-input" class="col-form-label">
                                Solicitante: *
                            </label>
                            <select name="applicant_id" required id="applicant_id" class="form-control select2">
                                <option value="">-SELECCIONER-</option>
                                <?php $__currentLoopData = $solicitante; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($pr->id); ?>"><?php echo e(ucwords(strtolower($pr->first_name .' ' .  $pr->last_name))); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                    </div>

                    <div class="row  mt-3 mb-3">
                        <div class="col-lg-4">
                            <label for="horizontal-email-input" class=" col-form-label">
                                Concepto de Pago: *
                            </label>
                            <select name="concept_id" required id="concept_id" class="form-control select4">
                                <option value="">-SELECCIONER-</option>
                                <?php $__currentLoopData = $paymentconcept; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($pc->id); ?>"><?php echo e(ucwords(strtolower($pc->concept))); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <label for="horizontal-email-input" class="col-form-label">
                                Forma de Pago: *
                            </label>
                            <select name="type_id" id="type_id" class="form-control select2">
                                <option value="">-SELECCIONER-</option>
                                <?php $__currentLoopData = $pormadepago; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($pm->id); ?>"><?php echo e(ucwords(strtolower($pm->description))); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <label for="horizontal-email-input" class="col-form-label">
                                Fecha: *
                            </label>
                            <div class="input-group" id="datepicker2">
                                <input readonly type="text" required class="form-control" placeholder="yyyy-mm-dd" id="datepickerr" name="date" data-date-format="yyyy-mm-dd" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>

                    </div>

                    <div class="row  mt-3 mb-3">
                        <div class="col-lg-8">
                            <label for="horizontal-email-input" class=" col-form-label">
                                Condiciones de Pago: *
                            </label>
                            <div class="form-group">
                                <input type="text" required class="form-control" name="terms" id="terms">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="horizontal-email-input" class=" col-form-label">
                                Cost Per Services : *
                            </label>
                            <div class="form-group">
                                <select name="cost_id" id="cost_id" class="form-control select2">
                                    <option value="">-SELECCIONER-</option>
                                    <?php $__currentLoopData = $cost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cs->id); ?>"><?php echo e(ucwords(strtolower($cs->departure_city .'-' . $cs->destination_city))); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Descripción</th>
                                        <th>Cantidad</th>
                                        <th>PU</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td align="center" colspan="4">
                                            <a id="addBtn" class="btn btn-sm btn-info "> <i class="fas fa-plus"></i> Agregar</a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            <i class="fa fa-save font-size-16 align-middle me-2"></i> Submit
                        </button>
                        <button type="button" class="btn btn-danger waves-effect waves-light">
                            <i class="fas fa-undo-alt  font-size-16 align-middle me-2"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        // Denotes total number of rows 
        var rowIdx = 0;

        // jQuery button click event to add a row 
        $('#addBtn').on('click', function() {

            // Adding a row inside the tbody. 
            $('#tbody').append(` <tr id="R${++rowIdx}">
                                        <td style="width:60%">
                                            <input class="form-control" type="text" name="description[]" required id="">
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="count[]" required id="">
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="price_u[]" required id="">
                                        </td>
                                        <td>
                                            <a class="remove btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>`);
        });

        // jQuery button click event to remove a row. 
        $('#tbody').on('click', '.remove', function() {
            // Getting all the rows next to the row 
            // containing the clicked button 
            var child = $(this).closest('tr').nextAll();

            // Iterating across all the rows  
            // obtained to change the index 
            child.each(function() {

                // Getting <tr> id. 
                var id = $(this).attr('id');

                // Getting the <p> inside the .row-index class. 
                var idx = $(this).children('.row-index').children('p');

                // Gets the row number from <tr> id. 
                var dig = parseInt(id.substring(1));

                // Modifying row index. 
                idx.html(`Row ${dig - 1}`);

                // Modifying row id. 
                $(this).attr('id', `R${dig - 1}`);
            });

            // Removing the current row. 
            $(this).closest('tr').remove();
            // Decreasing total number of rows by 1. 
            rowIdx--;
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/ordenpago/form_add.blade.php ENDPATH**/ ?>