

<?php $__env->startSection('title'); ?> Prevedor <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Gastos <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Empresas <?php $__env->endSlot(); ?>
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
                <form method="post" action="/empresas/deleteAll">

                    <h4 class="card-title mb-4">Empresas - List</h4>
                    <a href="empresas/form_add" class="btn btn-outline-success waves-effect waves-light">
                        <i class="fas fa-folder-plus  font-size-16 align-middle me-2"></i> Add New
                    </a>
                    <?php echo csrf_field(); ?>
                    <button type="submit" onclick="return confirm('Sure Delete Data Selected ?')" class="btn btn-outline-danger waves-effect waves-light">
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
                                    <th class="align-middle">Rfc</th>
                                    <th class="align-middle">Name</th>
                                    <th class="align-middle">Address</th>
                                    <th class="align-middle">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><input id="check-item" value="<?php echo e($d->id); ?>" class="check-item" type="checkbox" name="id_check[]"></td>
                                    <td><?php echo e($d->rfc); ?></td>
                                    <td><?php echo e($d->name); ?> </td>
                                    <td><?php echo e($d->address); ?> </td>
                                    <td>
                                        <a href="/empresas/edited?id=<?php echo e($d->id); ?>"><i class="font-size-14 text-success fas fa-edit"></i></a>


                                        <a href="/empresas/delete?id=<?php echo e($d->id); ?>" onclick="return confirm('Sure delete ?')"><i class="font-size-14 text-danger fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    </div>
                </form>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/empresas/listmaster.blade.php ENDPATH**/ ?>