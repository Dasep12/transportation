

<?php $__env->startSection('title'); ?> Orden de Servicio <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Orden de Servicio <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Form Add <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>


<div class="row">
    <div class="col-lg-12">
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
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Orden de Servicio - Form</h4>
                <a href="/services" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <form class="needs-validation" method="post" action="/services/added" novalidate>
                    <?php echo csrf_field(); ?>
                    <div class="col-xl-9">
                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Cost Per Service : *</label>
                            <div class="col-sm-9">
                                <select required name="cost_id" class="form-control select2">
                                    <option selected value=""> -SELECT- </option>
                                    <?php $__currentLoopData = $cost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option data-expense="<?php echo e($c->total_cost); ?>" data-departure_time="<?php echo e($c->departure_time); ?>" data-departure_date="<?php echo e($c->departure_date); ?>" data-departure="<?php echo e($c->departure_city); ?>" data-destination="<?php echo e($c->destination_city); ?>" data-cars="<?php echo e($c->cars_id); ?>" data-driver="<?php echo e($c->driver_name); ?>" value="<?php echo e($c->id); ?>"><?php echo e(ucwords(strtolower($c->customer_name)) .' - costo : $ '. number_format($c->total_cost,2)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Itinenary :* </label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="itinerary" required></textarea>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Driver Name: *
                            </label>
                            <div class="col-sm-9">
                                <select name="driver" id="driver" class="form-control select2">
                                    <option value="">-Select Drivers-</option>
                                    <?php $__currentLoopData = $driver; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($d->id); ?>"><?php echo e(ucwords(strtolower($d->first_name)) .' ' . ucwords(strtolower($d->last_name))); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Departure Date: *
                            </label>
                            <div class="col-sm-9">
                                <div class="input-group" id="datepicker2">
                                    <input readonly type="text" required class="form-control" placeholder="yyyy-mm-dd" id="datepickerr" name="date" data-date-format="yyyy-mm-dd" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Departure Time: *
                            </label>
                            <div class="col-sm-9">
                                <div class="input-group" id="timepicker-input-group1">
                                    <input readonly id="timepicker" name="time_departure" type="text" value="<?php echo e(old('departure_time')); ?>" required class="form-control" data-provide="timepicker">
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
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Car Name: *
                            </label>
                            <div class="col-sm-9">
                                <select name="cars" id="cars" class="form-control select2">
                                    <option value="">-Car-</option>
                                    <?php $__currentLoopData = $car; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($c->id); ?>"><?php echo e(ucwords(strtolower($c->car_name))); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Meeting Point: *
                            </label>
                            <div class="col-sm-9">
                                <input type="text" name="meeting_point" required class="form-control" id="meeting_point">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Departure: *
                            </label>
                            <div class="col-sm-9">
                                <input type="text" name="departure" required class="form-control" id="departure">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Destination: *
                            </label>
                            <div class="col-sm-9">
                                <input type="text" name="destination" required class="form-control" id="destination">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Travel Expenses: *
                            </label>
                            <div class="col-sm-9">
                                <input type="text" name="expenses" required class="form-control" id="expenses">
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


<script>
    $('select[name=cost_id').on('change', function() {
        var id = $("select[name=cost_id] option:selected").val();
        var driver = $("select[name=cost_id] option:selected").attr('data-driver');
        var cars = $("select[name=cost_id] option:selected").attr('data-cars');
        var date = $("select[name=cost_id] option:selected").attr('data-departure_date');
        var time = $("select[name=cost_id] option:selected").attr('data-departure_time');
        var departure = $("select[name=cost_id] option:selected").attr('data-departure');
        var destination = $("select[name=cost_id] option:selected").attr('data-destination');
        var expense = $("select[name=cost_id] option:selected").attr('data-expense');

        if (driver != null || driver != "") {
            $('#driver').val(driver).trigger('change');
        } else {
            $("select[name=driver]").val(0);
        }

        if (cars != null || cars != "") {
            $('#cars').val(cars).trigger('change');
        } else {
            $("select[name=cars]").val(0);
        }

        if (date != null || date != "") {
            $('#datepickerr').val(date);
        } else {
            $('#datepickerr').val("");
        }

        if (time != null || time != "") {
            $('#timepicker').val(time);
        } else {
            $('#timepicker').val(time);
        }

        if (departure != null || departure != "") {
            $('#departure').val(departure)
        } else {
            $("#departure").val("");
        }

        if (destination != null || destination != "") {
            $('#destination').val(destination);
        } else {
            $('#destination').val("");
        }
        if (expense != null || expense != "") {
            $('#expenses').val(expense);
        } else {
            $("#expenses").val("");
        }


    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/services/form_add.blade.php ENDPATH**/ ?>