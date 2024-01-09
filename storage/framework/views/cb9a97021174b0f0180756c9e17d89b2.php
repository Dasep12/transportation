

<?php $__env->startSection('title'); ?> Customers <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Customers <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Form Add <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>


<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <?php if($message = Session::get('success')): ?>
                <div class="alert text-white  bg-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check"></i>
                    <?php echo e($message); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php elseif($message = Session::get('failed')): ?>
                <div class="alert text-white  bg-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-check"></i>
                    <?php echo e($message); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <h4 class="card-title mb-4 mt-2 ml-2">Customers - Form</h4>
                <a href="/costumers" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <div class="col-xl-9">
                    <form enctype="multipart/form-data" method="post" action="/costumers/added" class="needs-validation" novalidate>
                        <?php echo csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">First Name : * </label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php if (isset($_GET['names'])) {
                                                                echo $_GET['names'];
                                                            } ?>" name="first_name" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Last Name : * </label>
                            <div class="col-sm-9">
                                <input type="text" name="last_name" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Company : * </label>
                            <div class="col-sm-9">
                                <input type="text" name="company" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Rfc : * </label>
                            <div class="col-sm-9">
                                <input type="text" name="rfc" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email : * </label>
                            <div class="col-sm-9">
                                <input type="text" name="email" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Photo : </label>
                            <div class="col-sm-9">
                                <input type="file" name="photo" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Phone : </label>
                            <div class="col-sm-9">
                                <input type="text" name="phone" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Password : </label>
                            <div class="col-sm-9">
                                <input type="password" name="password" required class="form-control" id="validationTooltip01">
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
                    </form>
                </div>
            </div>
        </div>

    </div>


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/costumers/form_add.blade.php ENDPATH**/ ?>