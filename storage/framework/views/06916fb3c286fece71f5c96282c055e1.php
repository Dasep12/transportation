

<?php $__env->startSection('title'); ?> Ruta Tourismo <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Transaportation <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Ruta Turismo <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Ruta Tourismo - List</h4>
                <a href="tourismroute/form_add" class="btn btn-outline-success waves-effect waves-light">
                    <i class="fas fa-folder-plus  font-size-16 align-middle me-2"></i> Add New
                </a>
                <button type="button" class="btn btn-outline-danger waves-effect waves-light">
                    <i class="fas fa-trash    font-size-16 align-middle me-2"></i> Delete
                </button>
                <div class="table-responsive">
                    <table id="datatable" class="table align-middle  table-bordered  mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check font-size-16 align-middle">
                                        <input class="form-check-input" type="checkbox" id="transactionCheck01">
                                        <label class="form-check-label" for="transactionCheck01"></label>
                                    </div>
                                </th>
                                <th class="align-middle">Customer Name</th>
                                <th class="align-middle">Start Date</th>
                                <th class="align-middle">Start Hour</th>
                                <th class="align-middle">End Date</th>
                                <th class="align-middle">End Hour</th>
                                <th class="align-middle">Num Days</th>
                                <th class="align-middle">Route</th>
                                <th class="align-middle">Available Date</th>
                                <th class="align-middle">Available Hour</th>
                                <th class="align-middle">Operador</th>
                                <th class="align-middle">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/ruta/listmaster.blade.php ENDPATH**/ ?>