

<?php $__env->startSection('title'); ?> Solicitud <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Transaportation <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Solicitud <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php

use App\Models\QuotesModel;
?>

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
            <form method="post" action="quotes/deleteAll">
                <?php echo csrf_field(); ?>
                <div class="card-body">

                    <h4 class="card-title mb-4">Solicitud - List</h4>
                    <div class="table-responsive">
                        <table id="datatableQuotes" class="table align-middle  table-bordered  mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="form-check font-size-16 align-middle">
                                            <input class="form-check-input" type="checkbox" id="check-all">
                                            <label class="form-check-label" for="transactionCheck01"></label>
                                        </div>
                                    </th>
                                    <th class="align-middle">Nombre</th>
                                    <th class="align-middle">Telefono</th>
                                    <th class="align-middle">Correo</th>
                                    <th class="align-middle">Ruta</th>
                                    <th class="align-middle">Fecha Inicio</th>
                                    <th class="align-middle">Fecha Final</th>
                                    <th class="align-middle">Estado</th>
                                    <th class="align-middle">Estado Correo</th>
                                    <th class="align-middle">Nombre Usurio</th>
                                    <th class="align-middle">Fecha Registrio</th>
                                    <th class="align-middle">Fecha Atencion</th>
                                    <th class="align-middle">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </form>

        </div>
    </div>
</div>



<script>
    $(function() {



        let tablePatroli = $('#datatableQuotes').DataTable({
            paging: true,
            scrollX: true,
            lengthChange: false,
            searching: false,
            ordering: false,
            autoWidth: false,
            processing: true,
            serverSide: false,
            ajax: {
                url: "/solicitud/getSolicitud",
                dataSrc: '',
                data: function() {
                    var param = {
                        'invoice_number': $("#1").val(),
                        'customer_name': $("#2").val(),
                        'email': $("#3").val(),
                        'status': $("#5").val(),
                    }
                    return param
                }
            },
            order: [
                [5, 'desc']
            ],
            pageLength: 10,
            columns: [{
                    data: 'id',
                    render: function(data, type, row) {
                        return `<input id="check-item" value="${ data }" class="check-item" type="checkbox" name="id_check[]">`
                    }
                },
                {
                    data: 'nombre'
                },
                {
                    data: 'telefono'
                },
                {
                    data: 'correo'
                },
                {
                    data: 'ruta'
                },
                {
                    data: 'fecha_inicio',
                },
                {
                    data: 'fecha_final',

                },
                {
                    data: 'estado'
                }, {
                    data: 'estado_correo'
                }, {
                    data: 'nombre_usuario'
                }, {
                    data: 'fecha_registro'
                },
                {
                    data: 'fecha_atencion'
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return `<a href="/solicitud/details?id=${data}"><i class="fas fa-eye text-secondary font-size-16"></i></a>`
                    }
                }
            ],

        });

    })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/solicitud/listmaster.blade.php ENDPATH**/ ?>