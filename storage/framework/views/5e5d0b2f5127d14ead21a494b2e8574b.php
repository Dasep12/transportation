

<?php $__env->startSection('title'); ?> Cost Per Services <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Cost Per Services <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Form Add <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php

use App\Models\CosModel;
?>

<style>
    .select2-container--open {
        z-index: 9999999;
    }

    .datepicker {
        border: 1px solid #d2d6db !important;
        padding: 8px;
        z-index: 999 !important;
    }

    .datepicker {
        color: #2b2c33 !important;
    }

    .datepicker-panel>ul>li.picked,
    .datepicker-panel>ul>li.picked:hover {
        color: #fff !important;
        background: #28b7ce !important;
    }

    .datepicker-panel>ul>li:hover {
        background-color: #1cabf0 !important;
    }

    .datepicker-panel>ul>li.highlighted {
        background-color: #FFF !important;
        color: #555b6d !important;
    }
</style>
<div class="row">
    <div class="col-lg-12">

        <?php if(isset($_GET['solicitud_id']) ): ?>
        <div class="alert text-white  bg-success alert-dismissible fade show" role="alert">
            Rute Selected Customers : <?php echo e(ucwords(strtolower($ruta))); ?>

        </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-body">
                <?php if($message = Session::get('success')): ?>
                <div class="alert text-white  bg-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check"></i>
                    <?php echo e($message == 1 ? 'Success Added New Data' : $message); ?>

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
                <h4 class="card-title mb-4 mt-2 ml-2">Cost Per Services - Form</h4>
                <a href="/costperservice" class="mt-2  mb-4 btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <form class="needs-validation" method="post" action="/costperservice/added" novalidate>
                    <?php echo csrf_field(); ?>


                    <div class="col-xl-12">
                        <input type="text" hidden name="solicitud_Ids" value="<?php echo e($solicidx); ?>">

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Choose Category Cars : *
                                </label>
                                <div class="col-sm-12">
                                    <select name="category_cars" required class="form-control select2">
                                        <option value=""> -Select- </option>
                                        <?php $__currentLoopData = $categoryCars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['fuel_type'];
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

                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Choose Cars : *
                                </label>
                                <div class="col-sm-12">
                                    <select name="cars_id" id="cars_id" required class="form-control select2">
                                        <option value=""> -Select- </option>
                                    </select>
                                    <?php $__errorArgs = ['fuel_type'];
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

                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Route : *
                                </label>
                                <div class="col-sm-12">
                                    <select name="route" id="route" required class="form-control select2">
                                        <option value=""> -Select- </option>
                                        <option value="new">New Route</option>
                                        <?php $__currentLoopData = $route; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-casetasfee="<?php echo e($r->booth_expense); ?>" data-nodriver="<?php echo e($r->no_drivers); ?>" data-kmstotal="<?php echo e($r->total_kms); ?>" data-noCasetas="<?php echo e($r->no_booths); ?>" data-departure="<?php echo e($r->departure); ?>" data-destination="<?php echo e($r->destination); ?>" value="<?php echo e($r->id); ?>"><?php echo e(ucwords(strtolower($r->route_name))); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['fuel_type'];
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Departure City : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" readonly name="departure_city" required class="form-control" id="departure">
                                    <?php $__errorArgs = ['departure'];
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




                        <div class="row mb-3">

                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Destination City : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" readonly name="destination_city" required class="form-control" id="destination">
                                    <?php $__errorArgs = ['destination'];
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Departure Date and Time : *
                                </label>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group " id="datepicker5">
                                                <input required readonly id="departure_date" type="text" class="form-control datepicker" placeholder="yyyy-mm-dd" name="departure_date">
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div>

                                            <!-- <div class="input-group" id="datepicker2">
                                                <input required readonly value="<?php echo e(old('departure_date')); ?>" id="departure_date" type="text" class="form-control" placeholder="yyyy-mm-dd" name="departure_date" data-date-format="yyyy-mm-dd" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true">
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div> -->
                                            <?php $__errorArgs = ['departure_date'];
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
                                        <div class="col-lg-6">
                                            <div class="input-group" id="timepicker-input-group1">
                                                <input readonly id="timepicker_departure" name="departure_time" type="text" value="<?php echo e(old('departure_time')); ?>" required class="form-control" data-provide="timepicker">
                                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                                <?php $__errorArgs = ['departure_time'];
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
                                        </div>
                                    </div>
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Returning Date and Time : *
                                </label>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group " id="datepicker5">
                                                <input required readonly value="<?php echo e(old('returning_date')); ?>" id="returning_date" type="text" class="form-control datepicker_return" placeholder="yyyy-mm-dd" name="returning_date">
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div>
                                            <!-- <div class="input-group" id="datepicker2">
                                                <input readonly type="text" required class="form-control" placeholder="yyyy-mm-dd" name="returning_date" data-date-format="yyyy-mm-dd" value="<?php echo e(old('returning_date')); ?>" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true">
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div> -->
                                            <?php $__errorArgs = ['returning_date'];
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
                                        <div class="col-lg-6">
                                            <div class="input-group" id="timepicker-input-group2">
                                                <input readonly id="timepicker_2" type="text" value="<?php echo e(old('returning_time')); ?>" class="form-control" name="returning_time" data-provide="timepicker">
                                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                                <?php $__errorArgs = ['returning_time'];
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
                                        </div>
                                    </div>
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    No of Days : *
                                </label>
                                <div class="col-sm-12">
                                    <input autocomplete="off" type="text" name="no_of_days" required class="form-control number-decimal" id="no_of_days">
                                    <?php $__errorArgs = ['no_of_days'];
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


                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Cost Per Day : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" readonly autocomplete="off" name="cost_per_days" required class="form-control" id="cost_per_days">
                                    <?php $__errorArgs = ['cost_per_days'];
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    KMS To Travel: *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" readonly name="kms_total" required class="form-control" id="kms_total">
                                    <?php $__errorArgs = ['kms_total'];
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Extra Kilometres: *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" autocomplete="off" value="<?php echo e(old('extra_kilometres')); ?>" name="extra_kilometres" required class="form-control" id="extra_kilometres">
                                    <?php $__errorArgs = ['extra_kilometres'];
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Total Travel KMS : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e(old('total_travel_kms')); ?>" readonly name="total_travel_kms" required class="form-control" id="total_travel_kms">
                                    <?php $__errorArgs = ['total_travel_kms'];
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

                        <!-- <hr> -->



                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Car Performance per liter : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e(old('car_performance_liter')); ?>" readonly name="car_performance_liter" required class="form-control" id="car_performance_liter">
                                    <?php $__errorArgs = ['car_performance_liter'];
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Total Liter To Consume : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" readonly name="total_liter_consume" required class="form-control" id="total_liter_consume">
                                    <?php $__errorArgs = ['total_liter_consume'];
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Cost Per Liter : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" autocomplete="off" name="cost_per_liter" required class="form-control number-decimal" id="cost_per_liter">
                                    <?php $__errorArgs = ['cost_per_liter'];
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Total Fuel Expense : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" readonly name="total_fuel_expense" required class="form-control" id="total_fuel_expense">
                                    <?php $__errorArgs = ['total_fuel_expense'];
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


                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Total Booth Expense : *
                                </label>
                                <div class="col-sm-12">
                                    <input autocomplete="off" type="text" name="booth_expense" class="form-control" readonly id="booth_expense">
                                    <?php $__errorArgs = ['booth_expense'];
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    No Driver : *
                                </label>
                                <div class="col-sm-12">
                                    <select name="no_drivers" class="form-control" id="no_drivers">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                    <?php $__errorArgs = ['no_drivers'];
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    First Drivers Name : *
                                </label>
                                <div class="col-sm-12">
                                    <select name="driver_name" class="form-control select2" id="driver_name">
                                        <option value="">Select Driver</option>
                                        <?php $__currentLoopData = $driver; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-driver_fee="<?php echo e($d->fee_per_day); ?>" value="<?php echo e($d->id); ?>"><?php echo e($d->first_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <input type="text" hidden name="fee_first_driver" value="0" id="first_fee_driver">
                                    <?php $__errorArgs = ['cost_per_days'];
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Second Drivers Name : *
                                </label>
                                <div class="col-sm-12">
                                    <select name="driver_name_second" disabled class="form-control select2" id="driver_name_second">
                                        <option value="">Select Driver</option>
                                        <?php $__currentLoopData = $driver; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-driver_fee="<?php echo e($d->fee_per_day); ?>" value="<?php echo e($d->id); ?>"><?php echo e($d->first_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <input type="text" hidden name="fee_seconds_drivers" value="0" id="second_fee_driver">
                                    <?php $__errorArgs = ['cost_per_days'];
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


                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Drivers Fee : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" readonly name="driver_fee" required class="form-control" id="driver_fee">
                                    <?php $__errorArgs = ['driver_fee'];
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Total Drivers Fee : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" name="total_fee_drivers" required class="form-control" readonly id="total_fee_drivers">
                                    <?php $__errorArgs = ['total_fee_drivers'];
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Total Casetas Fee : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" name="total_casetas" class="form-control" readonly id="total_casetas">
                                    <?php $__errorArgs = ['total_casetas'];
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Hotel Driver Expense : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" autocomplete="off" name="hotel_fee" required class="form-control" id="hotel_fee">
                                    <?php $__errorArgs = ['hotel_fee'];
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


                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Airport Fee : *
                                </label>
                                <div class="col-sm-12">
                                    <input autocomplete="off" type="text" name="airport_fee" required class="form-control" id="airport_fee">
                                    <?php $__errorArgs = ['airport_fee'];
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Car Wash : *
                                </label>
                                <div class="col-sm-12">
                                    <input autocomplete="off" type="text" name="car_wash" required class="form-control" id="car_wash">
                                    <?php $__errorArgs = ['car_wash'];
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Amenities : *
                                </label>
                                <div class="col-sm-12">
                                    <input autocomplete="off" type="text" name="amenities" required class="form-control" id="amenities">
                                    <?php $__errorArgs = ['amenities'];
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Total Cost : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" readonly name="total_cost" required class="form-control" id="total_cost">
                                    <?php $__errorArgs = ['total_cost'];
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

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Utility : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" autocomplete="off" name="utility" required class="form-control" id="utility">
                                    <?php $__errorArgs = ['utility'];
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Sugested Price: *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" autocomplete="off" readonly name="sugested_price" required class="form-control" id="sugested_price">
                                    <?php $__errorArgs = ['sugested_price'];
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Customer Name: *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e($name); ?>" autocomplete="off" name="customer_name" required class="form-control" id="customer_name">
                                    <?php $__errorArgs = ['customer_name'];
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

<!-- Modal -->
<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Add New Routes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="needs-validation" enctype="multipart/form-data" method="post" action="/costperservice/addedNewRoutes" novalidate>
                <?php echo csrf_field(); ?>
                <input type="text" name="types" hidden value="y">
                <div class="modal-body">
                    <div class="row">

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">ID: * </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e(old('id_routes')); ?>" name="id_routes" required class="form-control" id="validationTooltip01">
                                    <?php $__errorArgs = ['id_routes'];
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
                            </div>

                            <div class="form-group">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Origen : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e(old('departure')); ?>" required name="departure" class="form-control" id="validationTooltip01">
                                    <?php $__errorArgs = ['departure'];
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

                            <div class="form-group">
                                <label for="horizontal-email-input" class="col-sm- col-form-label">
                                    Tipo Deviaje : *
                                </label>
                                <div class="col-sm-12">
                                    <select class="form-control " required name="travel_type" id="travel_type">
                                        <option value="Redondo">Redondo</option>
                                        <option value="Sencillo">Sencillo</option>
                                    </select>
                                    <?php $__errorArgs = ['travel_type'];
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

                            <div class="form-group">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Litros Gastados : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e(old('liters_consumed')); ?>" name="liters_consumed" required class="form-control" id="validationTooltip01">
                                    <?php $__errorArgs = ['liters_consumed'];
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


                            <div class="form-group">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Tiempo De Reccoried : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e(old('travel_time')); ?>" name="travel_time" required class="form-control number-decimal" id="validationTooltip01">
                                    <?php $__errorArgs = ['travel_time'];
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

                            <div class="form-group">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Rendimiento : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e(old('yield')); ?>" name="yield" required class="form-control" id="validationTooltip01">
                                    <?php $__errorArgs = ['yield'];
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

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Nombre De La Ruta : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e(old('route_name')); ?>" name="route_name" required class="form-control" id="validationTooltip01">
                                    <?php $__errorArgs = ['route_name'];
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
                            </div>

                            <div class="form-group">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Destino :
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e(old('destination')); ?>" name="destination" required class="form-control" id="validationTooltip01">
                                    <?php $__errorArgs = ['destination'];
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

                            <div class="form-group">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    KM Reccorer : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e(old('total_kms')); ?>" name="total_kms" required class="form-control" id="validationTooltip01">
                                    <?php $__errorArgs = ['total_kms'];
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

                            <div class="form-group">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Fuel Expense : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e(old('fuel_expense')); ?>" name="fuel_expense" required class="form-control" id="validationTooltip01">
                                    <?php $__errorArgs = ['fuel_expense'];
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


                            <div class="form-gruop">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    No Condoctures : *
                                </label>
                                <div class="col-sm-12">
                                    <input name="no_drivers" value="<?php echo e(old('no_drivers')); ?>" type="number" required class="form-control" id="validationTooltip01">
                                    <?php $__errorArgs = ['no_drivers'];
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

                        <div class="col-lg-4">

                            <div class="form-gruop">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Category Cars : *
                                </label>
                                <div class="col-sm-12">
                                    <select name="category_cars2" id="category_cars2" required class="form-control select2">
                                        <option value=""> -SELECT- </option>
                                        <?php $__currentLoopData = $categoryCars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['fuel_type'];
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

                            <div class="form-gruop">
                                <label for="horizontal-password-input" class="col-sm-12 col-form-label">Unidad : </label>
                                <div class="col-sm-12">
                                    <select name="car_name2" id="cars_id2" required class="form-control select2">
                                        <option value=""> -SELECT- </option>
                                    </select>
                                    <?php $__errorArgs = ['car_name'];
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
                            </div>

                            <div class="form-group">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">Casetas : * </label>
                                <div class="col-sm-12">
                                    <select name="casetas_id[]" class=" form-control select2 select2-multiple" multiple="multiple" id="casetas_id2">
                                        <?php $__currentLoopData = $listCasetas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-price="<?php echo e($r->costo_casetas); ?>" value="<?php echo e($r->id); ?>"><?php echo e($r->caseta_name . ' (' . $r->categ_cars  .')- $ ' . $r->costo_casetas); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    No Casetas : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e(old('no_booths')); ?>" name="no_booths2" required class="form-control" id="no_booths2">
                                    <?php $__errorArgs = ['no_booths'];
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

                            <div class="form-gruop">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Gasto Casetas : *
                                </label>
                                <div class="col-sm-12">
                                    <input readonly type="text" value="<?php echo e(old('booth_expense')); ?>" name="booth_expense2" required class="form-control" id="gasto_casetas2">
                                    <?php $__errorArgs = ['booth_expense'];
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script>
    var kms_total = document.getElementById('kms_total');
    var extra_kms = document.getElementById('extra_kilometres');
    var total_travel_kms = document.getElementById("total_travel_kms");
    var car_performance_liter = document.getElementById("car_performance_liter");
    var total_cost = document.getElementById("total_cost");
    var utility = document.getElementById("utility");
    var sugested_price = document.getElementById("sugested_price");
    var cost_per_liter = document.getElementById("cost_per_liter");
    var total_liter_consume = document.getElementById("total_liter_consume");
    // a
    var cost_per_days = document.getElementById("cost_per_days");
    var no_of_days = document.getElementById("no_of_days");
    // b
    var total_fuel_expense = document.getElementById("total_fuel_expense");
    var booth_expense = document.getElementById("booth_expense");
    var total_casetas = document.getElementById("total_casetas");
    var total_fee_drivers = document.getElementById("total_fee_drivers");
    // c
    var hotel_fee = document.getElementById("hotel_fee");
    var car_wash = document.getElementById("car_wash");
    var amenities = document.getElementById("amenities");
    var airport_fee = document.getElementById("airport_fee");

    $('select[name=category_cars').on('change', function() {
        var id = $("select[name=category_cars] option:selected").val();
        var routesId = $("select[name=route] option:selected").val();
        $.ajax({
            url: "/costperservice/getListCars",
            method: "POST",
            data: {
                'id': id,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success: function(e) {
                let result = e;
                $("#cars_id").empty().select2();
                $('#cars_id').append($('<option >', {
                    value: "",
                    text: '- Select Cars -',
                })).select2();

                for (let i = 0; i < result.length; i++) {
                    $('#cars_id').append(`<option data-performance_car_liter="${ result[i].rendimiento_por_litro }" data-costperday="${ result[i].per_day_cost }" value="${result[i].id}">${ result[i].car_name }</option>`).select2();
                }
            }
        })

        // summarizeCasetas(routesId, id)
    });

    function summarizeCasetas(routesId, carsId) {
        $.ajax({
            url: "/costperservice/casetasSummarize",
            method: "POST",
            data: {
                'route': routesId,
                'cars': carsId,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success: function(e) {
                let result = e;
                console.log(routesId)
                console.log(carsId)
                console.log(result);
                $("#total_casetas").val(result);
            }
        })
    }


    function checkCarAvailable() {
        var car_id = $("#cars_id").val();
        var date_retur = $("#departure_date").val();
        var time_retur = $("#timepicker_departure").val();
        console.log(time_retur)
        $.ajax({
            url: "/costperservice/checkCarAvailable",
            method: "POST",
            data: {
                'car_id': car_id,
                "return_time": time_retur,
                'return_date': date_retur,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success: function(e) {
                console.log(e)
                if (e.res == true) {
                    $("#departure_date").val("");
                    alert("Car still using on travel " + e.data[0].route_name + ' may be available again around this date ' + e.data[0].return_car_date);
                }

            }
        })
    }


    $(".datepicker").datepicker({
        format: "yyyy-mm-dd",
    }).on('change', function(ev) {
        $(this).datepicker('hide');
        // console.log("tes")
        checkCarAvailable()
    });

    $('#timepicker_departure').timepicker({
        use24hours: true,
        showMeridian: false,
        icons: {
            up: 'mdi mdi-chevron-up',
            down: 'mdi mdi-chevron-down'
        },
        appendWidgetTo: "#timepicker-input-group1",
    });

    $("#timepicker_departure").on('change',
        function(time) {
            checkCarAvailable()
            // console.log("Selected time : " + time.currentTarget.value);
        });








    extra_kms.addEventListener('change', () => {
        $("#total_travel_kms").val(parseInt(kms_total.value) + parseInt(extra_kms.value));

        let total_liter_consume = parseInt(total_travel_kms.value) / parseInt(car_performance_liter.value)
        $("#total_liter_consume").val(total_liter_consume.toFixed(2))

        $("#total_fuel_expense").val(parseFloat(total_liter_consume).toFixed(2) * parseFloat(cost_per_liter.value).toFixed(2));



        var a = parseFloat(cost_per_days.value) * parseFloat(no_of_days.value);
        var b = parseInt(total_fuel_expense.value) + parseInt(total_casetas.value) + parseInt(total_fee_drivers.value);
        var c = parseInt(car_wash.value) + parseInt(hotel_fee.value) + parseInt(amenities.value) + parseInt(airport_fee.value)
        let totals = parseInt(a) + parseInt(b) + parseInt(c);
        total_cost.value = totals;


        let util = parseInt(utility.value) / 100;
        let sp = total_cost.value / (1 - util);
        sugested_price.value = sp;


    });

    $('select[name=route').on('change', function() {

        var id = $("select[name=route] option:selected").val();

        if (id == 'new') {
            $('#myModal').modal('show');
            $("#category_cars2,#cars_id2,#casetas_id2").select2({
                width: '100%',
                dropdownAutoWidth: true
            });
        }

        var carscateg_id = $("select[name=category_cars] option:selected").val();

        var destination = $("select[name=route] option:selected").attr('data-destination');
        var departure = $("select[name=route] option:selected").attr('data-departure');
        var kmstotal = $("select[name=route] option:selected").attr('data-kmstotal');
        var nodriver = $("select[name=route] option:selected").attr('data-nodriver');
        var casetas = $("select[name=route] option:selected").attr('data-casetasfee');
        var nobooth = $("select[name=route] option:selected").attr('data-noCasetas');
        $("#destination").val(destination);
        $("#departure").val(departure);
        $("#kms_total").val(kmstotal);
        $("#no_drivers").val(nodriver);
        $("#total_casetas").val(casetas);
        $("#booth_expense").val(nobooth);

        let total_liter_consume = parseInt(total_travel_kms.value) / parseInt(car_performance_liter.value)
        $("#total_liter_consume").val(total_liter_consume.toFixed(2));

        // summarizeCasetas(id, carscateg_id);
    });

    $('select[name=cars_id').on('change', function() {
        var cost = $("select[name=cars_id] option:selected").attr('data-costperday')
        var performance_car_liter = $("select[name=cars_id] option:selected").attr('data-performance_car_liter')
        $("#cost_per_days").val(cost);
        $("#car_performance_liter").val(performance_car_liter);

        let total_liter_consume = parseInt(total_travel_kms.value) / parseInt(car_performance_liter.value)
        $("#total_liter_consume").val(total_liter_consume.toFixed(2))

        checkCarAvailable()
    });

    $('select[name=no_drivers').on('change', function() {
        var id = $("select[name=no_drivers] option:selected").val();
        if (parseInt(id) == 2) {
            $("#driver_name_second").prop('disabled', false);
        } else {
            $("#driver_name_second").prop('disabled', true);
            $('#driver_name_second').val('').trigger('change.select2');

            let feeTotalDrivers = $("#driver_fee").val();
            $("#driver_fee").val(parseInt(feeTotalDrivers) - parseInt($("#second_fee_driver").val()))
            $("#second_fee_driver").val("0");

            $("#total_fee_drivers").val(parseInt($("#driver_fee").val()) * parseInt($("#no_of_days").val()))
        }
    });

    $('select[name=driver_name').on('change', function() {
        var driver_fee = $("select[name=driver_name] option:selected").attr('data-driver_fee')
        var second_fee_driver = $("#second_fee_driver").val();
        $("#first_fee_driver").val(parseInt(driver_fee))
        $("#driver_fee").val(parseInt(driver_fee) + parseInt(second_fee_driver));

        $("#total_fee_drivers").val(parseFloat($("#driver_fee").val()) * parseFloat($("#no_of_days").val()))
    });

    $('select[name=driver_name_second').on('change', function() {
        var second_driver_fee = $("select[name=driver_name_second] option:selected").attr('data-driver_fee');
        var second_fee_driver = $("#first_fee_driver").val();
        $("#second_fee_driver").val(parseFloat(second_driver_fee))
        $("#driver_fee").val(parseFloat(second_driver_fee) + parseFloat(second_fee_driver));

        $("#total_fee_drivers").val(parseFloat($("#driver_fee").val()) * parseFloat($("#no_of_days").val()))
    });

    no_of_days.addEventListener('change', () => {
        var driver_fee = $("#driver_fee").val();

        var total_fee_drivers = parseFloat(driver_fee) * parseFloat(no_of_days.value);
        $("#total_fee_drivers").val(total_fee_drivers);
    });


    hotel_fee.addEventListener('change', () => {
        var a = parseFloat(cost_per_days.value) * parseFloat(no_of_days.value);
        var b = parseInt(total_fuel_expense.value) + parseInt(total_casetas.value) + parseInt(total_fee_drivers.value);
        var c = parseInt(car_wash.value) + parseInt(hotel_fee.value) + parseInt(amenities.value) + parseInt(airport_fee.value)
        let totals = parseInt(a) + parseInt(b) + parseInt(c);
        total_cost.value = totals;
    });

    car_wash.addEventListener('change', () => {
        // var a = parseInt(cost_per_days.value) * parseInt(no_of_days.value);
        var a = parseFloat(cost_per_days.value) * parseFloat(no_of_days.value);
        var b = parseInt(total_fuel_expense.value) + parseInt(total_casetas.value) + parseInt(total_fee_drivers.value);
        var c = parseInt(car_wash.value) + parseInt(hotel_fee.value) + parseInt(amenities.value) + parseInt(airport_fee.value)
        let totals = parseInt(a) + parseInt(b) + parseInt(c);
        total_cost.value = totals;
    });

    amenities.addEventListener('change', () => {
        // var a = parseInt(cost_per_days.value) * parseInt(no_of_days.value);
        var a = parseFloat(cost_per_days.value) * parseFloat(no_of_days.value);
        var b = parseInt(total_fuel_expense.value) + parseInt(total_casetas.value) + parseInt(total_fee_drivers.value);
        var c = parseInt(car_wash.value) + parseInt(hotel_fee.value) + parseInt(amenities.value) + parseInt(airport_fee.value)
        let totals = parseInt(a) + parseInt(b) + parseInt(c);
        total_cost.value = totals;
    });

    airport_fee.addEventListener('change', () => {
        // var a = parseInt(cost_per_days.value) * parseInt(no_of_days.value);
        var a = parseFloat(cost_per_days.value) * parseFloat(no_of_days.value);
        var b = parseInt(total_fuel_expense.value) + parseInt(total_casetas.value) + parseInt(total_fee_drivers.value);
        var c = parseInt(car_wash.value) + parseInt(hotel_fee.value) + parseInt(amenities.value) + parseInt(airport_fee.value)
        let totals = parseInt(a) + parseInt(b) + parseInt(c);
        total_cost.value = totals;
    });


    utility.addEventListener('change', () => {
        util = parseInt(utility.value) / 100;
        let sp = total_cost.value / (1 - util);
        sugested_price.value = sp;
        // console.log(util);
        // console.log(sp);

    })

    cost_per_liter.addEventListener('change', () => {
        let fuel_expense = parseFloat(cost_per_liter.value) * parseFloat(total_liter_consume.value);
        $("#total_fuel_expense").val(fuel_expense.toFixed(3))
    })



    $('select[name=category_cars2').on('change', function() {
        var id = $("select[name=category_cars2] option:selected").val();
        $.ajax({
            url: "/costperservice/getListCars",
            method: "POST",
            data: {
                'id': id,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success: function(e) {
                let result = e;
                // console.log(result);
                $("#cars_id2").empty().select2();
                $('#cars_id2').append($('<option >', {
                    value: "",
                    text: '- SELECT CARS -',
                })).select2();

                for (let i = 0; i < result.length; i++) {
                    $('#cars_id2').append(`<option data-performance_car_liter="${ result[i].rendimiento_por_litro }" data-costperday="${ result[i].per_day_cost }" value="${result[i].id}">${ result[i].car_name }</option>`).select2();
                }
            }
        })

        getListCasetas(id)
    });


    function getListCasetas(cars_id) {
        $.ajax({
            url: "/routes_travel/getListCasetas",
            method: "POST",
            data: {
                'categ_id': cars_id,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success: function(e) {
                let result = e;
                $("#casetas_id2").empty().select2();
                $('#casetas_id2').append($('<option >', {
                    value: "",
                    text: '- SELECT CASETAS -',
                })).select2();

                for (let i = 0; i < result.length; i++) {
                    $('#casetas_id2').append(`<option data-price="${ result[i].costo_casetas }" value="${ result[i].id }"> ${ result[i].caseta_name } ( ${ result[i].categ_cars} ) - $ ${ result[i].costo_casetas }</option>`).select2();
                }
            }
        })
    }

    $("#casetas_id2").on("select2:select select2:unselect", function(e) {

        //this returns all the selected item
        var items = $(this).val();

        //Gets the last selected item
        var lastSelectedItem = e.params.data.element;
        // var lastSelectedItem = e.params.data;



        var price = $(this).find(':selected');
        if (price.length > 0) {
            let dataPrice = [];
            dataPrice.shift();
            $.each(price, function() {
                dataPrice.push($(this).data('price'))
            });

            let SumPriceCasetas = dataPrice.reduce((acc, curr) => acc + curr)
            $("#gasto_casetas2").val(SumPriceCasetas * 2)
            $("#no_booths2").val(dataPrice.length)
        } else {
            $("#gasto_casetas2").val(0)
            $("#no_booths2").val(0)
        }
    })



    $(".datepicker_return").datepicker({
        format: "yyyy-mm-dd",
    }).on('change', function(ev) {
        $(this).datepicker('hide');
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/costperservices/form_add.blade.php ENDPATH**/ ?>