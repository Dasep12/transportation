

<?php $__env->startSection('title'); ?> Route Travel <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Route Travel <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Form Edit <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php

use App\Models\RoutesTravelModel as models;

?>
<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <form class="needs-validation" enctype="multipart/form-data" method="post" action="/routes_travel/updated" novalidate>
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
                    <h4 class="card-title mb-4 mt-2 ml-2">Route Travel - Form</h4>
                    <a href="/routes_travel" class="btn btn-outline-success btn-sm">
                        <i class="fas fa-backward "></i> back</a>
                    <div class="col-xl-12">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">ID: * </label>
                                    <div class="col-sm-12">
                                        <input type="text" hidden name="id" value="<?php echo e($data->id); ?>">
                                        <input type="text" value="<?php echo e($data->id_routes); ?>" name="id_routes" required class="form-control" id="validationTooltip01">
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
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Nombre De La Ruta : *
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" value="<?php echo e($data->route_name); ?>" name="route_name" required class="form-control" id="validationTooltip01">
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
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Origen : *
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" value="<?php echo e($data->departure); ?>" required name="departure" class="form-control" id="validationTooltip01">
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

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Destino :
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" value="<?php echo e($data->destination); ?>" name="destination" required class="form-control" id="validationTooltip01">
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
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Tipo Deviaje : *
                                    </label>
                                    <div class="col-sm-12">
                                        <select class="form-control select2" required name="travel_type" id="travel_type">
                                            <option <?php echo e($data->travel_type ==  "Redondo" ? 'selected' : ''); ?> value="Redondo">Redondo</option>
                                            <option <?php echo e($data->travel_type ==  "Sencillo" ? 'selected' : ''); ?> value="Sencillo">Sencillo</option>
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
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        KM Reccorer : *
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" value="<?php echo e($data->total_kms); ?>" name="total_kms" required class="form-control" id="validationTooltip01">
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
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Litros Gastados : *
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" value="<?php echo e($data->liters_consumed); ?>" name="liters_consumed" required class="form-control" id="validationTooltip01">
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
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Fuel Expense : *
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" value="<?php echo e($data->fuel_expense); ?>" name="fuel_expense" required class="form-control" id="validationTooltip01">
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
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Rendimiento : *
                                    </label>
                                    <div class="col-sm-12 ">
                                        <input type="text" value="<?php echo e($data->yield); ?>" name="yield" required class="form-control" id="validationTooltip01">
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

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Tiempo De Reccoried : *
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" value="<?php echo e($data->travel_time); ?>" name="travel_time" required class="form-control number-decimal" id="validationTooltip01">
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
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        No Condoctures : *
                                    </label>
                                    <div class="col-sm-12">
                                        <input name="no_drivers" value="<?php echo e($data->no_drivers); ?>" type="text" required class="form-control" id="validationTooltip01">
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

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Category Cars : *
                                    </label>
                                    <div class="col-sm-12">
                                        <select name="category_cars" required class="form-control select2">
                                            <option value=""> -SELECT- </option>
                                            <?php $__currentLoopData = $categoryCars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e($data->category_cars == $c->id  ? 'selected' : ''); ?> value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
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
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-password-input" class="col-sm-12 col-form-label">Unidad : </label>
                                    <div class="col-sm-12">
                                        <select name="car_name" id="cars_id" required class="form-control select2">
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
                            </div>
                            <!-- 
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Type Route : *
                                    </label>
                                    <div class="col-sm-12">
                                        <select name="type_route" required class="form-control select2">
                                            <option value=""> -Select- </option>
                                            <option value="2">2 Destination </option>
                                            <option value="3"> >=3 Destination</option>
                                        </select>
                                    </div>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">Casetas : * </label>
                                    <div class="col-sm-12">
                                        <select name="casetas_id[]" class=" form-control select2 select2-multiple" multiple="multiple" id="casetas_id">
                                            <?php $__currentLoopData = $listCasetas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?= models::getCasetas($r->id, $data->id) > 0 ? 'selected' : '' ?> data-price="<?php echo e($r->costo_casetas); ?>" value="<?php echo e($r->id); ?>"><?php echo e($r->caseta_name . ' (' . $r->categ_cars  .')- $ ' . $r->costo_casetas); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        No Casetas : *
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" value="<?php echo e($data->no_booths); ?>" name="no_booths" required class="form-control" id="no_booths">
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
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Gasto Casetas : *
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" value="<?php echo e($data->booth_expense); ?>" name="booth_expense" required class="form-control" id="gasto_casetas">
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
                $("#cars_id").empty().select2();
                $('#cars_id').append($('<option >', {
                    value: "",
                    text: '- SELECT CARS -',
                })).select2();
                let idExist = "<?php echo e($data->car_name); ?>";
                for (let i = 0; i < result.length; i++) {
                    $('#cars_id').append(`<option ${ idExist == result[i].id ? 'selected' : '' } value="${result[i].id}">${ result[i].car_name }</option>`).select2();
                }
            }
        })
    }
    getListCars("<?php echo e($data->category_cars); ?>")

    $('select[name=category_cars').on('change', function() {
        var id = $("select[name=category_cars] option:selected").val();
        getListCars(id)
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
                $("#casetas_id").empty().select2();
                $('#casetas_id').append($('<option >', {
                    value: "",
                    text: '- SELECT CASETAS -',
                })).select2();

                for (let i = 0; i < result.length; i++) {
                    $('#casetas_id').append(`<option data-price="${ result[i].costo_casetas }" value="${ result[i].id }"> ${ result[i].caseta_name } ( ${ result[i].categ_cars} ) - $ ${ result[i].costo_casetas }</option>`).select2();
                }
            }
        })
    }

    $("#casetas_id").on("select2:select select2:unselect", function(e) {

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

            // console.log(price.length)

            let SumPriceCasetas = dataPrice.reduce((acc, curr) => acc + curr)
            $("#gasto_casetas").val(SumPriceCasetas * 2)
            $("#no_booths").val(price.length)
        } else {
            $("#gasto_casetas").val(0)
            $("#no_booths").val(0)
        }
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/routetravel/form_edit.blade.php ENDPATH**/ ?>