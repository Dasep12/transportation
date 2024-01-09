

<?php $__env->startSection('title'); ?> Empresas <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Empresas <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Form Edit <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>


<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Empresas - Form</h4>
                <a href="/empresas" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <form method="post" class="needs-validation" action="/empresas/updated" novalidate>
                    <?php echo csrf_field(); ?>
                    <div class="col-xl-9">

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Razón Social: *
                            </label>
                            <div class="col-sm-9">
                                <input hidden type="text" name="id" value="<?php echo e($data->id); ?>" id="">
                                <input type="text" value="<?php echo e($data->name); ?>" name="name" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                RFC: *
                            </label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo e($data->rfc); ?>" name="rfc" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Teléfono:
                            </label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo e($data->telephone); ?>" name="telephone" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Datos Bancarios:
                            </label>
                            <div class="col-sm-9">
                                <textarea type="text" name="bank_data" required class="form-control" id="validationTooltip01"><?php echo e($data->telephone); ?></textarea>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Código postal:
                            </label>
                            <div class="col-sm-9">
                                <input type="number" value="<?php echo e($data->code_postal); ?>" name="code_postal" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Dirección: </label>
                            <div class="col-sm-9">
                                <input type="text" name="address" value="<?php echo e($data->address); ?>" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Número Exterior: </label>
                            <div class="col-sm-9">
                                <input type="text" name="num_ext" required class="form-control" value="<?php echo e($data->num_ext); ?>" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Número Interior: </label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo e($data->num_int); ?>" name="num_int" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Colonia: </label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo e($data->colony); ?>" name="colony" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Municipio: </label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo e($data->municipality); ?>" name="municipality" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Estado: </label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo e($data->state); ?>" name="state" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                <i class="fa fa-save font-size-16 align-middle me-2"></i> Submit
                            </button>
                            <button type="button" class="btn btn-danger waves-effect waves-light">
                                <i class="fas fa-undo-alt  font-size-16 align-middle me-2"></i> Reset
                            </button>
                        </div>
                    </div>


            </div>
            </form>
        </div>
    </div>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/empresas/form_edit.blade.php ENDPATH**/ ?>