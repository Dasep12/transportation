

<?php $__env->startSection('title'); ?> Cars <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Cars <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Form Edit <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>


<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <form class="needs-validation" enctype="multipart/form-data" method="post" action="/cars/updated" novalidate>
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
                    <h4 class="card-title mb-4 mt-2 ml-2">Cars - Form</h4>
                    <a href="/cars" class="btn btn-outline-success btn-sm">
                        <i class="fas fa-backward "></i> back</a>
                    <div class="col-xl-12">
                        <?php echo csrf_field(); ?>

                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Choose Category Cars : *
                                </label>
                                <div class="col-sm-12">
                                    <select name="category_cars" required class="form-control select2">
                                        <option value=""> -SELECT- </option>
                                        <?php $__currentLoopData = $categoryCars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e($data[0]->category_cars == $c->id ? 'selected' : ''); ?> value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
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
                            <div class="col-lg-4">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">No. Serie : * </label>
                                <div class="col-sm-12">
                                    <input type="text" hidden name="id" id="id" value="<?php echo e($data[0]->id); ?>">
                                    <input type="text" value="<?php echo e($data[0]->no_serie); ?>" name="no_serie" required class="form-control" id="validationTooltip01">
                                    <?php $__errorArgs = ['no_serie'];
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
                            <div class="col-lg-4">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Car Name : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e($data[0]->car_name); ?>" name="car_name" required class="form-control" id="validationTooltip01">
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
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Plate : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" required value="<?php echo e($data[0]->plate); ?>" name="plate" class="form-control" id="validationTooltip01">
                                    <?php $__errorArgs = ['plate'];
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
                            <div class="col-lg-4">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Color :
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e($data[0]->color); ?>" name="color" required class="form-control" id="validationTooltip01">
                                    <?php $__errorArgs = ['color'];
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
                            <div class="col-lg-4">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Pasajeros : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e($data[0]->pasajeros); ?>" name="pasajeros" required class="form-control" id="validationTooltip01">
                                    <?php $__errorArgs = ['pasajeros'];
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
                            <div class="col-lg-4">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Costo por día : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e($data[0]->per_day_cost); ?>" name="per_day_cost" required class="form-control" id="validationTooltip01">
                                    <?php $__errorArgs = ['per_day_cost'];
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
                            <div class="col-lg-4">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Odometro : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" name="odometro" required class="form-control" value="<?php echo e($data[0]->odometro); ?>" id="validationTooltip01">
                                    <?php $__errorArgs = ['odometro'];
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
                            <div class="col-lg-4">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Características : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e($data[0]->car_feature); ?>" name="car_feature" required class="form-control" id="validationTooltip01">
                                    <?php $__errorArgs = ['car_feature'];
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
                            <div class="col-lg-4">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Purchase Date : *
                                </label>
                                <div class="col-sm-12">
                                    <div class="input-group" id="datepicker2">
                                        <input value="<?php echo e($data[0]->purchase_date); ?>" type="text" required class="form-control" placeholder="yyyy-mm-dd" name="purchase_date" data-date-format="yyyy-mm-dd" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true">
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                    <?php $__errorArgs = ['purchase_date'];
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
                            <div class="col-lg-4">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Vehicle Cost : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e($data[0]->vehicle_cost); ?>" name="vehicle_cost" required class="form-control" id="validationTooltip01">
                                    <?php $__errorArgs = ['vehicle_cost'];
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
                            <div class="col-lg-4">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Rendimiento por litro : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="<?php echo e($data[0]->rendimiento_por_litro); ?>" name="rendimiento_por_litro" required class="form-control" id="validationTooltip01">
                                    <?php $__errorArgs = ['rendimiento_por_litro'];
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
                            <div class="col-lg-4">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Fuel Capacity : *
                                </label>
                                <div class="col-sm-12">
                                    <input name="fuel_capacity" value="<?php echo e($data[0]->fuel_capacity); ?>" type="number" required class="form-control" id="validationTooltip01">
                                    <?php $__errorArgs = ['fuel_capacity'];
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
                            <div class="col-lg-4">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Fuel Type : *
                                </label>
                                <div class="col-sm-12">
                                    <select name="fuel_type" required class="form-control select2">
                                        <option value=""> -SELECT- </option>
                                        <option <?= $data[0]->fuel_type == 'Gasolina' ? 'selected' : ''  ?> value="gasolina">Gasolina</option>
                                        <option <?= $data[0]->fuel_type == 'Diesel' ? 'selected' : ''  ?> value="diesel">Diesel</option>
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
                            <div class="col-lg-4">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Modelo : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="number" value="<?php echo e($data[0]->model); ?>" name="model" required class="form-control" id="validationTooltip01">
                                    <?php $__errorArgs = ['model'];
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

                            <div class="col-lg-4">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Tipo de unidad : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" name="car_type_desc" required class="form-control" value="<?php echo e($data[0]->car_type_desc); ?>" id="validationTooltip01">
                                    <?php $__errorArgs = ['car_type_desc'];
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
                            <div class="col-lg-4">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Número de permiso :
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" name="num_permission" required class="form-control" value="<?php echo e($data[0]->num_permission); ?>" id="validationTooltip01">
                                    <?php $__errorArgs = ['num_permission'];
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

                            <div class="col-lg-4">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">Car type : </label>
                                <div class="col-sm-12">
                                    <select required name="car_type" class="form-control select2">
                                        <option selected value=""> -SELECT- </option>
                                        <option <?= $data[0]->car_type == 'own' ? 'selected' : ''  ?> value="own">Own</option>
                                        <option <?= $data[0]->car_type == 'on_rent' ? 'selected' : ''  ?> value="on_rent">On Rent</option>
                                    </select>
                                    <?php $__errorArgs = ['car_type'];
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

                            <div class="col-lg-4">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">Car Status : </label>
                                <div class="col-sm-12">
                                    <select required name="car_status" class="form-control select2">
                                        <option selected value=""> -SELECT- </option>
                                        <option <?= $data[0]->car_status == 'Disponible' ? 'selected' : ''  ?> value="Disponible">Disponible</option>
                                        <option <?= $data[0]->car_status == 'Reservado' ? 'selected' : ''  ?> value="Reservado">Reservado</option>
                                        <option <?= $data[0]->car_status == 'Bloqueado' ? 'selected' : ''  ?> value="Bloqueado">Bloqueado</option>
                                        <option <?= $data[0]->car_status == 'Mantenimiento' ? 'selected' : ''  ?> value="Mantenimiento">Mantenimiento</option>
                                    </select>
                                    <?php $__errorArgs = ['car_status'];
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
                            <div class="col-lg-4">
                                <label for="horizontal-password-input" class="col-sm-12 col-form-label">Image : </label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="image" type="file" id="formFile">
                                    <?php $__errorArgs = ['image'];
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
                                        <a class="image-popup-vertical-fit" href="<?php echo e(asset('public/admin/img/cars/'. $data[0]->image )); ?>" title="<?php echo e($data[0]->image); ?>">
                                            <img class="img-fluid" alt="" src="<?php echo e(asset('public/admin/img/cars/'. $data[0]->image )); ?>" width="145">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <label for="horizontal-password-input" class="col-sm-12 col-form-label">Insurance Policy : </label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="insurance_policy" type="file" id="insurance_policy">
                                    <?php $__errorArgs = ['image'];
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
                            <!-- <div class="col-lg-4"></div> -->
                            <!-- <div class="col-lg-4"></div> -->
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/cars/form_edit.blade.php ENDPATH**/ ?>