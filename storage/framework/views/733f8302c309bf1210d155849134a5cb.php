

<?php $__env->startSection('title'); ?> Services <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Eventos <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Add New <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>


<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Eventos - Form</h4>
                <a href="/eventos" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <div class="col-xl-12">
                    <form class="needs-validation" novalidate>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-2 col-form-label">Event Name : </label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="horizontal-email-input">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-2 col-form-label">Discipline : </label>
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
                            <label for="horizontal-email-input" class="col-sm-2 col-form-label">Cliente : </label>
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
                            <label for="horizontal-email-input" class="col-sm-2 col-form-label">Campana : </label>
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
                            <label for="horizontal-email-input" class="col-sm-2 col-form-label">Where are you going : </label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="horizontal-email-input">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-2 col-form-label">Address : </label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="horizontal-email-input">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-2 col-form-label">Departure Date : </label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="horizontal-email-input">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-2 col-form-label">Departure Time : </label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="horizontal-email-input">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-2 col-form-label">Returning Date : </label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="horizontal-email-input">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-2 col-form-label">Returning Time : </label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="horizontal-email-input">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-2 col-form-label">Travel Time : </label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="horizontal-email-input">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-2 col-form-label">No Passenger : </label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="horizontal-email-input">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-2 col-form-label">Upload service order :</label>
                            <div class="col-sm-9">
                                <input class="form-control" required type="file" id="formFile">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-2 col-form-label">Comment : </label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="horizontal-email-input">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-2 col-form-label">Services :* </label>
                            <div class="col-sm-2">
                                <div class="form-check form-check-success mb-3">
                                    <input class="form-check-input" type="checkbox" id="formCheckcolor2" checked>
                                    <label class="form-check-label" for="formCheckcolor2">
                                        Deposits
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check form-check-success mb-3">
                                    <input class="form-check-input" type="checkbox" id="formCheckcolor2" checked>
                                    <label class="form-check-label" for="formCheckcolor2">
                                        Ground Transportation
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check form-check-success mb-3">
                                    <input class="form-check-input" type="checkbox" id="formCheckcolor2" checked>
                                    <label class="form-check-label" for="formCheckcolor2">
                                        Airplane / Bus
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check form-check-success mb-3">
                                    <input class="form-check-input" type="checkbox" id="formCheckcolor2" checked>
                                    <label class="form-check-label" for="formCheckcolor2">
                                        Meals
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check form-check-success mb-3">
                                    <input class="form-check-input" type="checkbox" id="formCheckcolor2" checked>
                                    <label class="form-check-label" for="formCheckcolor2">
                                        Hotels
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                <i class="fa fa-save font-size-16 align-middle me-2"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger waves-effect waves-light">
                                <i class="fas fa-undo-alt  font-size-16 align-middle me-2"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/eventos/form_add.blade.php ENDPATH**/ ?>