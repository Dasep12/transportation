

<?php $__env->startSection('title'); ?> Quotes <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Quotes <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Editar Cotizaciones <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php
// dd($references);
?>
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
<form class="repeater needs-validation" method="post" action="/quotes/updated" enctype="multipart/form-data" novalidate>
    <?php echo csrf_field(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 mt-2 ml-2">Editar Cotizaciones</h4>
                    <a href="/quotes" class="btn btn-outline-success btn-sm"><i class="fas fa-backward "></i> atras</a>
                    <h3 class="mt-2">Cotización No - <?php echo e($data->invoice_number); ?></h3>
                    <div class="row">
                        <input type="text" hidden name="id" value="<?php echo e($data->id); ?>">
                        <input type="text" hidden value="<?php echo e($data->total_amount); ?>" id="totals" name="totals">
                        <div class="col-lg-6">
                            <label for="customer_name" class="col-sm-3 col-form-label">Cliente : * </label>
                            <div class="col-sm-12">
                                <input type="text" value="<?php echo e($data->customer_name); ?>" name="customer_name" required class="form-control" id="">
                                <?php $__errorArgs = ['customer_name'];
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
                        <div class="col-lg-6">
                            <label for="customer_name" class="col-sm-3 col-form-label">Email : * </label>
                            <div class="col-sm-12">
                                <input type="text" value="<?php echo e($data->name); ?>" name="email_address" required class="form-control" id="">
                                <?php $__errorArgs = ['email_address'];
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

                        <div class="col-lg-12 mt-2">
                            <label for="">Mensaje</label>
                            <textarea name="customer_note" class="form-control" id="customer_note"><?php echo e($data->customer_note); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div data-repeater-list="datas">
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div data-repeater-item class="row repeat">
                            <div class="mb-3 col-lg-4">
                                <label for="item_name">Servicio</label>
                                <input type="text" value="<?php echo e($it->item); ?>" required id="item_name" name="item_name" class="form-control" placeholder="Item Name" />
                            </div>

                            <div class="mb-3 col-lg-3 " style="width:15%!important">
                                <label for="qty">Cantidad</label>
                                <input type="number" value="<?php echo e($it->qty); ?>" required id="qty" name="qty" class="form-control itemsQty" placeholder="qty" />
                            </div>


                            <div class="mb-3 col-lg-3">
                                <label for="price">Precio</label>
                                <input type="text" value="<?php echo e($it->price); ?>" id="price" required name="price" class="form-control itemsPrice number-decimal" placeholder="price" />
                            </div>

                            <div class="mb-3 col-lg-2">
                                <label for="message">Iva</label>
                                <select name="tax" required class="form-control itemsTax" id="tax">
                                    <option value="">Select Tax</option>
                                    <option <?php echo e($it->tax == 0 ? 'selected' : ''); ?> value="0">No</option>
                                    <option <?php echo e($it->tax != 0 ? 'selected' : ''); ?> value="0.16">Iva(16%)</option>
                                </select>
                            </div>


                            <div class="mb-3 col-lg-12">
                                <label for="description">Descripción</label>
                                <textarea name="description" class="form-control" placeholder="Description (optional)" id=""><?php echo e($it->description); ?></textarea>
                            </div>

                            <div class="mb-3 col-lg-4">
                                <label for="HitungTax">Iva</label>
                                <input type="text" id="HitungTax" readonly name="HitungTax" value="<?php echo e(number_format($it->total * $it->tax,2)); ?>" class="form-control HitungTax" placeholder="Tax" />
                            </div>

                            <div class="mb-3 col-lg-4">
                                <label for="total">Total</label>
                                <input type="text" placeholder="total" readonly class="form-control itemsTotal" value="<?php echo e($it->amount); ?>" name="total" id="total">
                            </div>

                            <div class="col-lg-2 align-self-center d-flex mt-2">
                                <div class="d-grid">
                                    <button type="button" data-repeater-delete class="btn  btn-outline-danger mt-1">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <hr>
                    </div>
                    <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Add Item" />
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <label for="">Servicios Incluidos</label>
                            <textarea name="terms_conditions" class="form-control" id="">Unidad en perfectas condiciones tanto físicas como mecánicas - conductores con pleno conocimiento de las carreteras dentro y fuera del estado - Casetas - Combustible - Seguro de viajero a bordo de la unidad.
                            </textarea>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-6">
                            <label for="">Referencia</label>
                            <select name="reference" required class="form-control select2" id="">
                                <option value="">Seleccionar (solo si aplica)</option>
                                <?php $__currentLoopData = $references; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e($data->reference == $key->id ? 'selected' : ''); ?> value="<?php echo e($key->id); ?>"><?php echo e($key->id .'-'. $key->customer_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-lg-6">
                            <label for="">Galería de Fotos de la Unidad</label>
                            <input type="text" name="gallery" value="<?php echo e($data->payment_url); ?>" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <label for="">Attachment</label>
                            <input type="file" class="form-control" name="file" id="file">
                        </div>
                        <div class="col-sm-5">
                            <div class="mt-4 mt-md-0">
                                <a class="image-popup-vertical-fit" href="<?php echo e(asset('public/admin/img/quotes/'. $data->file )); ?>" title="<?php echo e($data->file); ?>">
                                    <img class="img-fluid" alt="" src="<?php echo e(asset('public/admin/img/quotes/'. $data->file )); ?>" width="145">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <label for="">Notas Internas (solo para nosotros)</label>
                            <textarea name="note_business" class="form-control" id="note_business"><?php echo e($data->memo); ?></textarea>
                        </div>
                    </div>

                    <div class="mt-5">
                       <button type="submit" name="resend" class="btn btn-primary waves-effect waves-light">
                            <i class="fab fa-telegram  font-size-16 align-middle me-2"></i> Renviar
                        </button>
                                               <button type="submit" name="update" class="btn btn-success waves-effect waves-light">
                            <i class="fa fa-save font-size-16 align-middle me-2"></i> Actualizar
                        </button>
                        <button type="button" class="btn btn-danger waves-effect waves-light">
                            <i class="fas fa-undo-alt  font-size-16 align-middle me-2"></i> Limpiar
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</form>


<script>
    $(function() {



    })

    function cek(keys) {
        let valueQty = $("input[name='datas[" + keys + "][qty]']").val();
        let valuePrice = $("input[name='datas[" + keys + "][price]']").val();
        let tax = $("select[name='datas[" + keys + "][tax]']").val();
        console.log(tax)
        if (tax != 0) {
            let Hasiltax = parseFloat(valueQty) * parseFloat(valuePrice) * 0.16;
            $("input[name='datas[" + keys + "][HitungTax]']").val(Hasiltax.toFixed(2));
            // console.log("tax ada");
        } else if (tax == "") {
            $("input[name='datas[" + keys + "][HitungTax]']").val(0);
            // console.log("tax 0 ");
        } else if (tax == 0) {
            // console.log("tax 0 ");
            $("input[name='datas[" + keys + "][HitungTax]']").val(0);
        }


        let includeTax = 0;
        let setTotal = parseFloat(valueQty) * parseFloat(valuePrice);
        includeTax = setTotal * parseFloat(tax);
        let res = parseFloat(setTotal) + parseFloat(includeTax);
        $("input[name='datas[" + keys + "][total]']").val(res);


        let list = document.getElementsByClassName("itemsQty");
        let amount = 0;
        for (let i = 0; i < list.length; ++i) {
            let subAmount = $("input[name='datas[" + i + "][total]']").val();
            amount += parseFloat(subAmount);
        }
        // document.getElementById("ammountotal").innerHTML = amount;
        document.getElementById("totals").value = amount;
    }
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/quotes/form_edit.blade.php ENDPATH**/ ?>