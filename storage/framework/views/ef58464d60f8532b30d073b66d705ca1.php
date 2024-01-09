

<?php $__env->startSection('title'); ?> Drivers <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Drivers <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Form Edit <?php $__env->endSlot(); ?>
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

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>

                <h4 class="card-title mb-4 mt-2 ml-2">Drivers - Form</h4>
                <a href="/drivers" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <form method="post" enctype="multipart/form-data" action="/drivers/updated" class="needs-validation" novalidate>
                    <?php echo csrf_field(); ?>
                    <div class="col-xl-9">
                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">First Name : * </label>
                            <div class="col-sm-9">
                                <input type="text" hidden name="id" id="id" value="<?php echo e($data[0]->id); ?>">
                                <input type="text" value="<?php echo e($data[0]->first_name); ?>" name="first_name" required class="form-control" id="">
                                <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Last Name :
                            </label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo e($data[0]->last_name); ?>" name="last_name" required class="form-control" id="">
                                <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Photo:</label>
                            <div class="col-sm-4">
                                <input class="form-control" name="photo" type="file" id="formFile">
                                <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-sm-5">
                                <div class="mt-4 mt-md-0">
                                    <a class="image-popup-vertical-fit" href="<?php echo e(asset('public/admin/img/driver/'. $data[0]->photo )); ?>" title="">
                                        <img class="img-fluid" alt="" src="<?php echo e(asset('public/admin/img/driver/'. $data[0]->photo )); ?>" width="145">
                                    </a>
                                </div>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Email : *
                            </label>
                            <div class="col-sm-9">
                                <input type="email" value="<?php echo e($data[0]->email); ?>" name="email" required class="form-control" id="">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Phone :
                            </label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo e($data[0]->phone); ?>" name="phone" required class="form-control" id="">
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Address :
                            </label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo e($data[0]->address); ?>" name="address" required class="form-control" id="">
                                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                License #:
                            </label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo e($data[0]->license); ?>" name="license" required class="form-control" id="">
                                <?php $__errorArgs = ['license'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Costo por Dia : *
                            </label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo e($data[0]->fee_per_day); ?>" name="costo_por_dia" required class="form-control" id="">
                                <?php $__errorArgs = ['costo_por_dia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                License Exp Date : *
                            </label>
                            <div class="col-sm-9 ">
                                <div class="input-group" id="datepicker2">
                                    <input value="<?php echo e($data[0]->license_exp); ?>" type="text" required class="form-control" placeholder="yyyy-mm-dd" name="license_exp" data-date-format="yyyy-mm-dd" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div>
                                <?php $__errorArgs = ['license_exp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Photo Licence:</label>
                            <div class="col-sm-4">
                                <input class="form-control" name="photo_license" type="file" id="formFile">
                                <?php $__errorArgs = ['photo_license'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-sm-5">
                                <div class="mt-4 mt-md-0">
                                    <a class="image-popup-vertical-fit" href="<?php echo e(asset('public/admin/img/driver/'. $data[0]->photo_licence )); ?>" title="">
                                        <img class="img-fluid" alt="" src="<?php echo e(asset('public/admin/img/driver/'. $data[0]->photo_licence )); ?>" width="145">
                                    </a>
                                </div>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Carnet de Psicofisico:</label>
                            <div class="col-sm-4">
                                <input class="form-control" name="photo_psicofisico" type="file" id="formFile">
                                <?php $__errorArgs = ['photo_psicofisico'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-sm-5">
                                <div class="mt-4 mt-md-0">
                                    <a class="image-popup-vertical-fit" href="<?php echo e(asset('public/admin/img/driver/'. $data[0]->photo_psicofisico )); ?>" title="">
                                        <img class="img-fluid" alt="" src="<?php echo e(asset('public/admin/img/driver/'. $data[0]->photo_psicofisico )); ?>" width="145">
                                    </a>
                                </div>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Driver Skills: *
                            </label>
                            <div class="col-sm-9">
                                <input type="text" name="driver_skills" value="<?php echo e($data[0]->driver_skills); ?>" required class="form-control" id="driver_skills">
                                <?php $__errorArgs = ['driver_skills'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>


            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Login Drivers - Form</h4>
                <div class="col-xl-9">
                    <div class="row mb-3">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                            Username : *
                        </label>
                        <div class="col-sm-9">
                            <input type="text" value="<?php echo e($data[0]->username); ?>" name="username" required class="form-control" id="">
                            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                            Password:
                        </label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                </form>
            </div>
        </div>

    </div>


    <script>
        // Time Picker
        $('#timepicker').timepicker({
            icons: {
                up: 'mdi mdi-chevron-up',
                down: 'mdi mdi-chevron-down'
            },
            appendWidgetTo: "#timepicker-input-group1"
        });
    </script>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/drivers/form_edit.blade.php ENDPATH**/ ?>