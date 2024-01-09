

<?php $__env->startSection('title'); ?> Orden de Pago <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Orden de Pago <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Form Edit <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>


<div class="row mb-5">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Orden de Pago - Form</h4>
                <a href="/ordendepago" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <label class="control-label font-size-16">Proveedor: </label>
                        <?php echo $data[0]->suppliers; ?>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label">Empresa: </label>
                        <?php echo $data[0]->company; ?>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label font-size-16">N&uacute;mero de OC: </label>
                        <?php echo date_format(new DateTime($data[0]->dates), "dmy"); ?>-<?php echo $data[0]->ids; ?>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label font-size-16">Fecha: </label>
                        <?php echo date_format(new DateTime($data[0]->dates), "d-m-Y"); ?>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label font-size-16">Condiciones. Pago: </label>
                        <?php echo $data[0]->terms; ?>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label font-size-16">Forma de Pago: </label>
                        <?php echo $data[0]->statues; ?>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label font-size-16">Solicitante: </label>
                        <?php echo $data[0]->aplicant; ?>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-lg-12">
                        <form action="/ordendepago/updateStatus" class="needs-validation" novalidate method="post">
                            <?php echo csrf_field(); ?>
                            <input type="text" name="id" id="id" hidden value="<?php echo e($data[0]->ids); ?>">
                            <table class="table table-bordered font-size-16 wrapper">
                                <thead>
                                    <tr>
                                        <th>Descripción</th>
                                        <th>Cantidad</th>
                                        <th>PU</th>
                                        <th>Importe</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    <?php $totals = 0; ?>
                                    <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dtl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="">
                                        <td style="width:60%">
                                            <?php echo e($dtl->description); ?>

                                        </td>
                                        <td>
                                            <?php echo e($dtl->quantity); ?>

                                        </td>
                                        <td>
                                            <?php echo e($dtl->unit_price); ?>

                                        </td>
                                        <td><?php
                                            $importe  = $dtl->unit_price * $dtl->quantity;
                                            $totals += $importe;
                                            ?>
                                            <?php echo e(number_format($importe,2)); ?>

                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td align="center" rowspan="3">
                                            <select required name="approve" id="approve" class="form-control select2">
                                                <option selected value="">Change Status</option>
                                                <option>Aprobado</option>
                                                <option>Cancelado</option>
                                            </select>
                                        </td>
                                        <td align="center" colspan="2">Total</td>
                                        <td>$ <?php echo e(number_format($totals,2)); ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <button class="btn btn-info">Save Info</button>
                        </form>

                    </div>
                </div>
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
                                            <input class="form-control number-decimal" type="text" name="count[]" required id="">
                                        </td>
                                        <td>
                                            <input class="form-control number-decimal" type="text" name="price_u[]" required id="">
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/ordenpago/form_approve.blade.php ENDPATH**/ ?>