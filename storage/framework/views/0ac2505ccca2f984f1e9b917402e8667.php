

<?php $__env->startSection('title'); ?> Services <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Transaportation <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Orden de Servicio <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<style>
    ul.timeline {
        list-style-type: none;
        position: relative;
    }

    ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 400;
    }

    ul.timeline>li {
        margin: 20px 0;
        padding-left: 20px;
    }

    ul.timeline>li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #22c0e8;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }


    ul.timeline2 {
        list-style-type: none;
        position: relative;
    }

    ul.timeline2:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 400;
    }

    ul.timeline2>li {
        margin: 20px 0;
        padding-left: 20px;
    }

    ul.timeline2>li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #8ee822;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }
</style>
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
                <h4 class="card-title mb-4 mt-2 ml-2">Orden de Servicio - Gastos</h4>
                <a href="/drivers/services" class="btn btn-outline-success btn-sm mb-5">
                    <i class="fas fa-backward "></i> back</a>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">GASTOS DE IDA</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">GASTOS DE REGRESO</span>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <form enctype="multipart/form-data" method="post" action="/drivers/services/addGastos">
                            <?php echo csrf_field(); ?>
                            <input type="text" hidden value="<?php echo e($servid); ?>" name="service_id" id="service_id">
                            <div class="row">
                                <div class="col-md-8 ">
                                    <h4 class="text-center">GASTOS DE IDA</h4>
                                    <ul class="timeline">
                                        <li>
                                            <a href="#">
                                                <h4>Gasto de Hospedajes</h4>
                                            </a>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Total</label>
                                                        <input type="text" value="<?php echo e($data == null ? '' : $data->hotel_fee_go); ?>" class="form-control" name="hotel_fee_go">
                                                    </div>
                                                </div>
                                                <div class="mt-2 col-lg-12">
                                                    <div class="form-group mb-2">
                                                        <label for="">Foto del ticket(s):</label>
                                                        <input type="file" class="form-control" name="hotel_fee_img_go">
                                                    </div>
                                                    <?php if($data != null): ?>
                                                    <a class="mt-2 image-popup-vertical-fit" href="<?php echo e(asset('build/admin/img/services/'. $data->hotel_fee_img_go)); ?>" title="<?php echo e($data->hotel_fee_img_go); ?>">
                                                        <img class="img-fluid" alt="" src="<?php echo e(asset('build/admin/img/services/'. $data->hotel_fee_img_go )); ?>" width="145">
                                                    </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <h4>
                                                    Gasto de Lavado
                                                </h4>
                                            </a>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Total</label>
                                                        <input value="<?php echo e($data == null ? '' : $data->car_wash_go); ?>" type="text" class="form-control" name="car_wash_go">
                                                    </div>
                                                </div>
                                                <div class="mt-2 col-lg-12">
                                                    <div class="mb-2 form-group">
                                                        <label for="">Foto del ticket(s):</label>
                                                        <input type="file" class="form-control" name="car_wash_img_go">
                                                    </div>
                                                    <?php if($data != null): ?>
                                                    <a class="image-popup-vertical-fit" href="<?php echo e(asset('admin/img/services/'. $data->car_wash_img_go)); ?>" title="<?php echo e($data->car_wash_img_go); ?>">
                                                        <img class="img-fluid" alt="" src="<?php echo e(asset('admin/img/services/'. $data->car_wash_img_go )); ?>" width="145">
                                                    </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <h4>
                                                    Gasto de Aeropuerto
                                                </h4>
                                            </a>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Total</label>
                                                        <input value="<?php echo e($data == null ? '' : $data->airport_fee_go); ?>" type="text" class="form-control" name="airport_fee_go">
                                                    </div>
                                                </div>
                                                <div class="mt-2 col-lg-12">
                                                    <div class="mb-2 form-group">
                                                        <label for="">Foto del ticket(s):</label>
                                                        <input type="file" class="form-control" name="airport_fee_img_go">
                                                    </div>
                                                    <?php if($data != null): ?>
                                                    <a class="image-popup-vertical-fit" href="<?php echo e(asset('admin/img/services/'. $data->airport_fee_img_go)); ?>" title="<?php echo e($data->airport_fee_img_go); ?>">
                                                        <img class="img-fluid" alt="" src="<?php echo e(asset('admin/img/services/'. $data->airport_fee_img_go )); ?>" width="145">
                                                    </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <h4>
                                                    Otros Gastos
                                                </h4>
                                            </a>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Descripción:</label>
                                                        <textarea name="other_exp_desc_go" id="" class="form-control"><?php echo e($data == null ? '' : $data->other_exp_desc_go); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="mt-2 col-lg-12">
                                                    <div class="mb-2 form-group">
                                                        <label for="">Total:</label>
                                                        <input type="text" value="<?php echo e($data == null ? '' : $data->other_exp_go); ?>" class="form-control" name="other_exp_go">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mr-5">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> Save Data</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="profile" role="tabpanel">
                        <form action="">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-8 ">
                                    <h4 class="text-center">GASTOS DE REGRESO</h4>
                                    <ul class="timeline2">
                                        <li>
                                            <a href="#">
                                                <h4 class="text-success">Gasto de Hospedajes</h4>
                                            </a>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Total</label>
                                                        <input type="text" class="form-control" name="hotel_fee_return">
                                                    </div>
                                                </div>
                                                <div class="mt-2 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Foto del ticket(s):</label>
                                                        <input type="file" class="form-control" name="hotel_fee_img_return">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <h4 class="text-success">
                                                    Gasto de Lavado
                                                </h4>
                                            </a>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Total</label>
                                                        <input type="text" class="form-control" name="car_wash_return">
                                                    </div>
                                                </div>
                                                <div class="mt-2 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Foto del ticket(s):</label>
                                                        <input type="file" class="form-control" name="car_wash_img_go">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <h4 class="text-success">
                                                    Otros Gastos
                                                </h4>
                                            </a>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Descripción:</label>
                                                        <textarea name="other_exp_desc_return" id="" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="mt-2 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Total:</label>
                                                        <input type="text" class="form-control" name="other_exp_return">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mr-5">
                                <button class="btn btn-danger"><i class="fas fa-save"></i> Save Data</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <script>

    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layouts_drivers.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\cores\resources\views/drivers/gastos.blade.php ENDPATH**/ ?>