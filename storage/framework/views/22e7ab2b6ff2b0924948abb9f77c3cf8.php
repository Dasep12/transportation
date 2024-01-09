

<?php $__env->startSection('title'); ?> Ground <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Ground Transaportation <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Form Add <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>


<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Ground Transaportation - Form</h4>
                <a href="/groundtrans" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <form class="needs-validation" novalidate>
                    <div class="col-xl-9">
                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Event Name : *</label>
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

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Car type : *</label>
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

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Select Car : *</label>
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

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">No Drivers : * </label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Car Size : *</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="form-check-label ml-2" for="formRadios1">
                                            Sedan
                                        </label>
                                        <input class="form-check-input ml-2" type="radio" name="formRadios" id="formRadios1" checked>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="form-check-label" for="formRadios1">
                                            Van
                                        </label>
                                        <input class="mr-2 form-check-input" type="radio" name="formRadios" id="formRadios1" checked>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="form-check-label ml-2" for="formRadios1">
                                            Sprinter
                                        </label>
                                        <input class="form-check-input ml-2" type="radio" name="formRadios" id="formRadios1" checked>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="form-check-label" for="formRadios1">
                                            Autobus
                                        </label>
                                        <input class="mr-2 form-check-input" type="radio" name="formRadios" id="formRadios1" checked>
                                    </div>
                                </div>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Image :</label>
                            <div class="col-sm-5">
                                <input class="form-control" required type="file" id="formFile">
                            </div>
                        </div>
                    </div>

                    <div class="col-lx-12">
                        <div class="mb-3">
                            <div class="progress" style="height: 20px  !important;border-radius:none !important">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;border-radius:none !important;font-size:14px" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Departure info</div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="formrow-firstname-input" class="form-label">deparatur Fecha : *</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="formrow-firstname-input" class="form-label">Horario de Salida : *</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="formrow-firstname-input" class="form-label">Lugar de salida:*</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="formrow-firstname-input" class="form-label">destino deparatur:*</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="formrow-firstname-input" class="form-label">
                                        Km Aproximado:*</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                        </div>

                        <h4 class="mb-3 mt-3">Gastos</h4>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="formrow-firstname-input" class="form-label">
                                        Casetas:*</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="formrow-firstname-input" class="form-label">Combustible:</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="formrow-firstname-input" class="form-label">Otros:</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="progress" style="height: 20px  !important;border-radius:none !important">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;border-radius:none !important;font-size:14px" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Volviendo información</div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="formrow-firstname-input" class="form-label">Volviendo Fecha : *</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="formrow-firstname-input" class="form-label">Tiempo de regreso : *</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="formrow-firstname-input" class="form-label">Lugar de regreso:*</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="formrow-firstname-input" class="form-label">Destino de regreso:*</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="formrow-firstname-input" class="form-label">
                                        Km Aproximado:*</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                        </div>

                        <h4>Gastos : </h4>


                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="formrow-firstname-input" class="form-label">
                                        Casetas:*</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="formrow-firstname-input" class="form-label">Combustible:</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="formrow-firstname-input" class="form-label">Otros:</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4 mb-4">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="formrow-firstname-input" class="form-label">
                                        Km Aproximado:*</label>
                                    <select required class="form-control select2">
                                        <option selected value=""> -SELECT- </option>
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="formrow-firstname-input" class="form-label">
                                        Net Price:*</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
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
                    </div>
                </form>
            </div>
        </div>

    </div>


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/ground/form_add.blade.php ENDPATH**/ ?>