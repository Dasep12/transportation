

<?php $__env->startSection('title'); ?> Disciplines <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Disciplines <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Form Add <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>


<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Disciplines - Form</h4>
                <a href="/disciplines" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <div class="col-xl-9">
                    <form class="needs-validation" novalidate>
                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Discipline Name : * </label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="horizontal-email-input" placeholder="Discipline Name">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Categories: </label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="horizontal-email-input" placeholder="Categories">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">President Name : </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="horizontal-password-input" required placeholder="President Name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Delegate Name : </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="horizontal-password-input" required placeholder="Delegate Name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Competition Uniform :</label>
                            <div class="col-sm-5">
                                <input class="form-control" required type="file" id="formFile">
                            </div>
                            <div class="col-sm-4">
                                <input class="form-control" required type="file" id="formFile">
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/disciplines/form_add.blade.php ENDPATH**/ ?>