

<?php $__env->startSection('title'); ?> Cost Per Services <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Cost Per Services <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Form Edit <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php

use App\Models\CosModel;
?>
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
                <h4 class="card-title mb-4 mt-2 ml-2">Cost Per Services - Form</h4>
                <a href="/costperservice" class="mt-2  mb-4 btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <form class="needs-validation" method="post" action="/costperservice/updated" novalidate>
                    <?php echo csrf_field(); ?>
                    <div class="col-xl-12">

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Choose Category Cars : *
                                </label>
                                <div class="col-sm-12">
                                    <select name="category_cars" required class="form-control select2">
                                        <option value=""> -SELECT- </option>
                                        <?php $__currentLoopData = $categoryCars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e($data->category_cars == $c->id ? 'selected' :''); ?> value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
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
                                    <input type="text" hidden name="id" id="id" value="<?php echo e($data->id); ?>">
                                    <select name="cars_id" id="cars_id" required class="form-control select2">
                                        <option value=""> -SELECT- </option>
                                        <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-performance_car_liter="<?php echo e($c->rendimiento_por_litro); ?>" data-costperday="<?php echo e($c->per_day_cost); ?>" <?php echo e($data->cars_id == $c->id ? 'selected' :''); ?> value="<?php echo e($c->id); ?>"><?php echo e($c->car_name); ?></option>
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
                                    Route : *
                                </label>
                                <div class="col-sm-12">
                                    <select name="route" id="route" required class="form-control select2">
                                        <option value=""> -SELECT- </option>
                                        <?php $__currentLoopData = $route; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-casetasfee="<?php echo e($r->booth_expense); ?>" data-nodriver="<?php echo e($r->no_drivers); ?>" data-kmstotal="<?php echo e($r->total_kms); ?>" <?php echo e($data->routes_id == $r->id ? 'selected' :''); ?> data-noCasetas="<?php echo e($r->no_booths); ?>" data-departure="<?php echo e($r->departure); ?>" data-destination="<?php echo e($r->destination); ?>" value="<?php echo e($r->id); ?>"><?php echo e($r->route_name); ?></option>
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
                                    <input type="text" value="<?php echo e($data->departure_city); ?>" readonly name="departure_city" required class="form-control" id="departure">
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
                                    <input type="text" value="<?php echo e($data->destination_city); ?>" readonly name="destination_city" required class="form-control" id="destination">
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
                                            <div class="input-group" id="datepicker2">
                                                <input readonly value="<?php echo e($data->departure_date); ?>" type="text" required class="form-control" placeholder="yyyy-mm-dd" name="departure_date" data-date-format="yyyy-mm-dd" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true">
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div>
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
                                                <input readonly id="timepicker" name="departure_time" type="text" value="<?php echo e($data->departure_time); ?>" required class="form-control" data-provide="timepicker">
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
                                            <div class="input-group" id="datepicker2">
                                                <input value="<?php echo e($data->returning_date); ?>" readonly type="text" required class="form-control" placeholder="yyyy-mm-dd" name="returning_date" data-date-format="yyyy-mm-dd" value="<?php echo e(old('returning_date')); ?>" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true">
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
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
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group" id="timepicker-input-group2">
                                                <input value="<?php echo e($data->returning_time); ?>" readonly id="timepicker_2" type="text" value="<?php echo e(old('returning_time')); ?>" class="form-control" name="returning_time" data-provide="timepicker">
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
                                    <input value="<?php echo e($data->no_of_days); ?>" autocomplete="off" type="text" name="no_of_days" required class="form-control number-decimal" id="no_of_days">
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
                                    <input type="text" value="<?php echo e($data->cost_per_days); ?>" readonly autocomplete="off" name="cost_per_days" required class="form-control" id="cost_per_days">
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
                                    <input type="text" value="<?php echo e($data->kms_total); ?>" readonly name="kms_total" required class="form-control" id="kms_total">
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
                                    <input type="text" autocomplete="off" value="<?php echo e($data->extra_kilometres); ?>" name="extra_kilometres" required class="form-control" id="extra_kilometres">
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
                                    <input type="text" value="<?php echo e($data->total_travel_kms); ?>" readonly name=" total_travel_kms" required class="form-control" id="total_travel_kms">
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

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Car Performance per liter : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e($data->car_performance_liter); ?>" readonly name="car_performance_liter" required class="form-control" id="car_performance_liter">
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
                                    <input type="text" value="<?php echo e($data->total_liter_consume); ?>" readonly name="total_liter_consume" required class="form-control" id="total_liter_consume">
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
                                    <input autocomplete="off" type="text" value="<?php echo e($data->cost_per_liter); ?>" name="cost_per_liter" required class="form-control number-decimal" id="cost_per_liter">
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
                                    <input type="text" autocomplete="off" readonly value="<?php echo e($data->total_fuel_expense); ?>" name="total_fuel_expense" required class="form-control" id="total_fuel_expense">
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
                                    <input type="text" value="<?php echo e($data->booth_expense); ?>" name="booth_expense" required class="form-control" id="booth_expense">
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
                                    <input type="text" value="<?php echo e($data->no_drivers); ?>" readonly name="no_drivers" required class="form-control" id="no_drivers">
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
                                        <option <?php echo e($d->id == $data->driver_name ? 'selected' : ''); ?> data-driver_fee="<?php echo e($d->fee_per_day); ?>" value="<?php echo e($d->id); ?>"><?php echo e($d->first_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
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
                                    <input type="text" hidden name="fee_first_driver" value="<?php echo e($data->fee_first_driver); ?>" id="first_fee_driver">
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
                                    <select name="driver_name_second" class="form-control select2" id="driver_name_second">
                                        <option value="">Select Driver</option>
                                        <?php $__currentLoopData = $driver; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e($d->id == $data->second_drivers ? 'selected' : ''); ?> data-driver_fee="<?php echo e($d->fee_per_day); ?>" value="<?php echo e($d->id); ?>"><?php echo e($d->first_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <input type="text" hidden name="fee_seconds_drivers" value="<?php echo e($data->fee_seconds_drivers); ?>" id="second_fee_driver">
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
                                    <input type="text" value="<?php echo e($data->driver_fee); ?>" readonly name="driver_fee" required class="form-control" id="driver_fee">
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
                                    <input type="text" value="<?php echo e($data->total_fee_drivers); ?>" name="total_fee_drivers" required class="form-control" readonly id="total_fee_drivers">
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
                                    <input value="<?php echo e($data->total_casetas); ?>" type="text" name="total_casetas" class="form-control" readonly id="total_casetas">
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
                                    Airport Fee : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e($data->airport_fee); ?>" name="airport_fee" required class="form-control" id="airport_fee">
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

                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Hotel Driver Expense : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e($data->hotel_fee); ?>" name="hotel_fee" required class="form-control" id="hotel_fee">
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
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Car Wash : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e($data->car_wash); ?>" name="car_wash" required class="form-control" id="car_wash">
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
                                    <input type="text" value="<?php echo e($data->amenities); ?>" name="amenities" required class="form-control" id="amenities">
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
                                    <input type="text" value="<?php echo e($data->total_cost); ?>" readonly name="total_cost" required class="form-control" id="total_cost">
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
                                    <input type="text" value="<?php echo e($data->utility); ?>" name="utility" required class="form-control" id="utility">
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
                                    <input type="text" readonly value="<?php echo e($data->sugested_price); ?>" name="sugested_price" required class="form-control" id="sugested_price">
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
                                    <input type="text" value="<?php echo e($data->customer_name); ?>" name="customer_name" required class="form-control" id="customer_name">
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

    function getListCars(id) {
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
                $("#cars_id").empty().select2();
                $('#cars_id').append($('<option >', {
                    value: "",
                    text: '- SELECT CARS -',
                })).select2();
                let idExist = "<?php echo e($data->cars_id); ?>";
                for (let i = 0; i < result.length; i++) {
                    $('#cars_id').append(`<option ${ idExist == result[i].id ? 'selected' : '' } data-performance_car_liter="${ result[i].rendimiento_por_litro }" data-costperday="${ result[i].per_day_cost }" value="${result[i].id}">${ result[i].car_name }</option>`).select2();
                }
            }
        })
    }
    getListCars("<?php echo e($data->category_cars); ?>")

    $('select[name=category_cars').on('change', function() {
        var id = $("select[name=category_cars] option:selected").val();
        getListCars(id)
    });



    extra_kms.addEventListener('change', () => {
        $("#total_travel_kms").val(parseInt(kms_total.value) + parseInt(extra_kms.value));

        let total_liter_consume = parseInt(total_travel_kms.value) / parseInt(car_performance_liter.value)
        $("#total_liter_consume").val(total_liter_consume.toFixed(2))

        $("#total_fuel_expense").val(parseFloat(total_liter_consume).toFixed(2) * parseFloat(cost_per_liter.value).toFixed(2));



        var a = parseInt(cost_per_days.value) * parseInt(no_of_days.value);
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
        var destination = $("select[name=route] option:selected").attr('data-destination')
        var departure = $("select[name=route] option:selected").attr('data-departure')
        var kmstotal = $("select[name=route] option:selected").attr('data-kmstotal')
        var nodriver = $("select[name=route] option:selected").attr('data-nodriver')
        var casetas = $("select[name=route] option:selected").attr('data-casetasfee')
        $("#total_casetas").val(casetas);
        $("#destination").val(destination);
        $("#departure").val(departure);
        $("#kms_total").val(kmstotal);
        $("#no_drivers").val(nodriver);

        let total_liter_consume = parseInt(total_travel_kms.value) / parseInt(car_performance_liter.value)
        $("#total_liter_consume").val(total_liter_consume.toFixed(2))
    });

    $('select[name=cars_id').on('change', function() {
        var cost = $("select[name=cars_id] option:selected").attr('data-costperday')
        var performance_car_liter = $("select[name=cars_id] option:selected").attr('data-performance_car_liter')
        $("#cost_per_days").val(cost);
        $("#car_performance_liter").val(performance_car_liter);


        let total_liter_consume = parseInt(total_travel_kms.value) / parseInt(car_performance_liter.value)
        $("#total_liter_consume").val(total_liter_consume.toFixed(2))
    });




    // $('select[name=driver_name').on('change', function() {
    //     var driver_fee = $("select[name=driver_name] option:selected").attr('data-driver_fee')
    //     $("#driver_fee").val(driver_fee);

    //     var total_fee_drivers = parseInt(driver_fee) * parseInt(no_of_days.value);
    //     $("#total_fee_drivers").val(total_fee_drivers);

    // });
    $('select[name=driver_name').on('change', function() {
        var driver_fee = $("select[name=driver_name] option:selected").attr('data-driver_fee')
        var second_fee_driver = $("#second_fee_driver").val();
        $("#first_fee_driver").val(parseFloat(driver_fee))
        $("#driver_fee").val(parseFloat(driver_fee) + parseFloat(second_fee_driver));

        $("#total_fee_drivers").val(parseFloat($("#driver_fee").val()) * parseFloat($("#no_of_days").val()))

    });

    $('select[name=driver_name_second').on('change', function() {
        var second_driver_fee = $("select[name=driver_name_second] option:selected").attr('data-driver_fee');
        var second_fee_driver = $("#first_fee_driver").val();
        $("#second_fee_driver").val(parseInt(second_driver_fee))
        $("#driver_fee").val(parseFloat(second_driver_fee) + parseFloat(second_fee_driver));

        $("#total_fee_drivers").val(parseFloat($("#driver_fee").val()) * parseFloat($("#no_of_days").val()))
    });

    no_of_days.addEventListener('change', () => {
        var driver_fee = $("select[name=driver_name] option:selected").attr('data-driver_fee')
        $("#driver_fee").val(driver_fee);

        var total_fee_drivers = parseFloat(driver_fee) * parseFloat(no_of_days.value);
        $("#total_fee_drivers").val(total_fee_drivers);


        var a = parseFloat(cost_per_days.value) * parseFloat(no_of_days.value);
        console.log(a)
        var b = parseFloat(total_fuel_expense.value) + parseFloat(total_casetas.value) + parseFloat(total_fee_drivers);
        var c = parseFloat(car_wash.value) + parseFloat(hotel_fee.value) + parseFloat(amenities.value) + parseFloat(airport_fee.value)
        let totals = parseFloat(a) + parseFloat(b) + parseFloat(c);
        total_cost.value = totals;


        let util = parseFloat(utility.value) / 100;
        let sp = total_cost.value / (1 - util);
        sugested_price.value = sp;

    });


    hotel_fee.addEventListener('change', () => {
        var a = parseFloat(cost_per_days.value) * parseFloat(no_of_days.value);
        var b = parseFloat(total_fuel_expense.value) + parseFloat(total_casetas.value) + parseFloat(total_fee_drivers.value);
        var c = parseFloat(car_wash.value) + parseFloat(hotel_fee.value) + parseFloat(amenities.value) + parseFloat(airport_fee.value)
        let totals = parseFloat(a) + parseFloat(b) + parseFloat(c);
        total_cost.value = totals;
    });
    car_wash.addEventListener('change', () => {
        var a = parseFloat(cost_per_days.value) * parseFloat(no_of_days.value);
        var b = parseFloat(total_fuel_expense.value) + parseFloat(total_casetas.value) + parseFloat(total_fee_drivers.value);
        var c = parseFloat(car_wash.value) + parseFloat(hotel_fee.value) + parseFloat(amenities.value) + parseFloat(airport_fee.value)
        let totals = parseFloat(a) + parseFloat(b) + parseFloat(c);
        total_cost.value = totals;
    });
    amenities.addEventListener('change', () => {
        var a = parseFloat(cost_per_days.value) * parseFloat(no_of_days.value);
        var b = parseFloat(total_fuel_expense.value) + parseFloat(total_casetas.value) + parseFloat(total_fee_drivers.value);
        var c = parseFloat(car_wash.value) + parseFloat(hotel_fee.value) + parseFloat(amenities.value) + parseFloat(airport_fee.value)
        let totals = parseFloat(a) + parseFloat(b) + parseFloat(c);
        total_cost.value = totals;
    });
    airport_fee.addEventListener('change', () => {
        var a = parseFloat(cost_per_days.value) * parseFloat(no_of_days.value);
        var b = parseFloat(total_fuel_expense.value) + parseFloat(total_casetas.value) + parseFloat(total_fee_drivers.value);
        var c = parseFloat(car_wash.value) + parseFloat(hotel_fee.value) + parseFloat(amenities.value) + parseFloat(airport_fee.value)
        let totals = parseFloat(a) + parseFloat(b) + parseFloat(c);
        total_cost.value = totals;
    });


    utility.addEventListener('change', () => {
        util = parseFloat(utility.value) / 100;
        let sp = total_cost.value / (1 - util);
        sugested_price.value = sp;
        console.log(util);
        console.log(sp);
    })

    cost_per_liter.addEventListener('change', () => {
        let fuel_expense = parseFloat(cost_per_liter.value) * parseFloat(total_liter_consume.value);
        $("#total_fuel_expense").val(fuel_expense.toFixed(3))
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/costperservices/form_edit.blade.php ENDPATH**/ ?>