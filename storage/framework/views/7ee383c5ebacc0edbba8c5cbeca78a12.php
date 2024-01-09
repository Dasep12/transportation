

<?php $__env->startSection('title'); ?> Campaign <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Home <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Campaign <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Campaigns - List</h4>
                <a href="campaigns/form_add" class="btn btn-outline-success waves-effect waves-light">
                    <i class="fas fa-folder-plus  font-size-16 align-middle me-2"></i> Add New
                </a>
                <button type="button" class="btn btn-outline-danger waves-effect waves-light">
                    <i class="fas fa-trash    font-size-16 align-middle me-2"></i> Delete
                </button>
                <div class="table-responsive">
                    <table id="datatable" class="table align-middle table-bordered  mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check font-size-16 align-middle">
                                        <input class="form-check-input" type="checkbox" id="transactionCheck01">
                                        <label class="form-check-label" for="transactionCheck01"></label>
                                    </div>
                                </th>
                                <th class="align-middle">Campaign Name</th>
                                <th class="align-middle">Customer</th>
                                <th class="align-middle">Created</th>
                                <th class="align-middle">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td>
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox" id="transactionCheck06">
                                        <label class="form-check-label" for="transactionCheck06"></label>
                                    </div>
                                </td>
                                <td>Servicio Final</td>
                                <td>56 - Cliente Final</td>
                                <td>
                                    2021-10-15 00:25:56
                                </td>
                                <td>
                                    <a href=""><i class="fas fa-edit"></i></a>
                                    <a href=""><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/campaigns/listmaster.blade.php ENDPATH**/ ?>