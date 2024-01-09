

<?php $__env->startSection('title'); ?> Ground Transaportation <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Services <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Ground Transportation <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Ground Transportation - List</h4>
                <a href="groundtrans/form_add" class="btn btn-outline-success waves-effect waves-light">
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
                                <th class="align-middle">Car Type</th>
                                <th class="align-middle">Car Name</th>
                                <th class="align-middle">Car Size</th>
                                <th class="align-middle">Total Passnger</th>
                                <th class="align-middle">Departure Date</th>
                                <th class="align-middle">Departure Location</th>
                                <th class="align-middle">Returning Date</th>
                                <th class="align-middle">Returning Location</th>
                                <th class="align-middle">Net Price</th>
                                <th class="align-middle">Status</th>
                                <th class="align-middle">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>own</td>
                                <td>Sprinter VIP 19</td>
                                <td>sprinter</td>
                                <td>12</td>
                                <td>2023-01-25</td>
                                <td>INDEPORTE CHIAPAS</td>
                                <td>2023-01-29</td>
                                <td>OAXTEPEC-HOTEL DORADOS</td>
                                <td>47293</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <a href=""><i class="fas fa-edit"></i></a>
                                    <a href=""><i class="fas fa-eye"></i></a>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/ground/listmaster.blade.php ENDPATH**/ ?>