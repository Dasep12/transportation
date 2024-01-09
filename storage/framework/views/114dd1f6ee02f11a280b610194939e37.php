

<?php $__env->startSection('title'); ?> Orden De Pago <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Gastos <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Orden de Pago <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Orden de Pago - List</h4>
                <a href="orden/form_add" class="btn btn-outline-success waves-effect waves-light">
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
                                <th class="align-middle">Folio</th>
                                <th class="align-middle">Company Name</th>
                                <th class="align-middle">Supplier Name</th>
                                <th class="align-middle">Applicant</th>
                                <th class="align-middle">Concept</th>
                                <th class="align-middle">Terms</th>
                                <th class="align-middle">Total</th>
                                <th class="align-middle">Date</th>
                                <th class="align-middle">Status</th>
                                <th class="align-middle">Date Reg</th>
                                <th class="align-middle">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>18092023-4536</td>
                                <td>PROMOTORA MEXICO DE TURISMO SA DE CV</td>
                                <td>CAPUFE CASETAS</td>
                                <td>Francisco Cruz</td>
                                <td>DISPOSITIVOS T IAVE.</td>
                                <td>DE CONTADO</td>
                                <td>385.15</td>
                                <td>2023-09-18</td>
                                <td>En proceso</td>
                                <td>2023-09-18 19:27:47</td>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/orden/listmaster.blade.php ENDPATH**/ ?>