

<?php $__env->startSection('title'); ?> Campaigns <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Campaigns <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Form Add <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>


<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Campaigns - Form</h4>
                <a href="/campaigns" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <div class="col-xl-9">
                    <form class="needs-validation" novalidate>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Campaign : </label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="validationTooltip01" placeholder="Campaigns Name">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Customer : </label>
                            <div class="col-sm-9">
                                <select required class="form-control select2">
                                    <option selected value=""> -SELECT- </option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                </select>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div>
                            <button type="button" class="btn btn-primary waves-effect waves-light">
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


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/campaigns/form_add.blade.php ENDPATH**/ ?>