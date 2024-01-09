

<?php $__env->startSection('title'); ?> Cost Per Services <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Transaportation <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Cost Per Services <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
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
                <form action="/costperservice/deleteAll" method="post">
                    <?php echo csrf_field(); ?>
                    <h4 class="card-title mb-4">Cost Per Services - List</h4>
                    <a href="costperservice/form_add" class="btn btn-outline-success waves-effect waves-light">
                        <i class="fas fa-folder-plus  font-size-16 align-middle me-2"></i> Add New
                    </a>
                    <button type="submit" onclick="return confirm('Sure Delete Data Selected ?')" class="btn btn-outline-danger waves-effect waves-light">
                        <i class="fas fa-trash    font-size-16 align-middle me-2"></i> Delete
                    </button>
                    <div class="table-responsive">
                        <table id="datatableCos" class="table align-middle  table-bordered  mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="form-check font-size-16 align-middle">
                                            <input id="check-all" class="form-check-input" type="checkbox" id="transactionCheck01">
                                            <label class="form-check-label" for="transactionCheck01"></label>
                                        </div>
                                    </th>
                                    <th class="align-middle">Cliente</th>
                                    <th class="align-middle">Ruta</th>
                                    <th class="align-middle">Fecha Inicio</th>
                                    <th class="align-middle">Fecha Final</th>
                                    <th class="align-middle">No. Días</th>
                                    <th class="align-middle">Operador</th>
                                    <th class="align-middle">Unidad</th>
                                    <th class="align-middle">Costo Total</th>
                                    <th class="align-middle">Utilidad (%)</th>
                                    <th class="align-middle">Precio Venta</th>
                                    <th class="align-middle">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><input id="check-item" value="<?php echo e($d->id); ?>" class="check-item" type="checkbox" name="id_check[]"></td>
                                    <td><?php echo e(ucwords(strtolower($d->customer_name))); ?></td>
                                    <td><?php echo e(ucwords(strtolower($d->route_name))); ?></td>
                                    <td><?php echo e($d->departure_date . ' ' . $d->departure_time); ?></td>
                                    <td><?php echo e($d->returning_date . ' ' . $d->returning_time); ?></td>
                                    <td><?php echo e($d->no_of_days); ?></td>
                                    <td><?php echo e(ucwords(strtolower($d->first_name))); ?></td>
                                    <td><?php echo e(ucwords(strtolower($d->car_name))); ?></td>

                                    <?php
                                    $ren =  $d->cost_per_days * $d->no_of_days;
                                    $costo = $d->cost_per_liter;
                                    $casetas = $d->total_casetas;
                                    $honor = $d->driver_fee;
                                    $hotel = $d->hotel_fee;
                                    $lavado =  $d->car_wash;
                                    $aero = $d->airport_fee;
                                    $total = $ren +  $costo  +  $casetas + $honor + $hotel + $lavado + $aero
                                    ?>

                                    <td><?php echo e(number_format($d->total_cost,2)); ?></td>
                                    <td><?php echo e($d->utility); ?></td>
                                    <?php
                                    $util =  $d->utility / 100;
                                    $ttl = $d->total_cost / (1 - $util);
                                    ?>
                                    <td><?php echo e(number_format($ttl,2)); ?></td>
                                    <td>
                                        <a href="/costperservice/edited?id=<?php echo e($d->id); ?>"><i class="fas fa-edit font-size-16 text-success"></i></a>
                                        <a href="/costperservice/details?id=<?php echo e($d->id); ?>"><i class="fas fa-eye font-size-16 text-secondary"></i></a>
                                        <a onclick="return confirm('Sure Delete ?')" href="/costperservice/delete?id=<?php echo e($d->id); ?>"><i class="fas fa-trash font-size-16 text-danger"></i></a>
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

<script>
    $(function() {
        $(".check-item").click(function() {
            var panjang = $('[name="id_check[]"]:checked').length;
            if (panjang > 0) {
                document.getElementById('btn_delete_all').style.display = "block";
            } else {
                document.getElementById('btn_delete_all').style.display = "none";

            }
        })

        $("#check-all").click(function() {
            if ($(this).is(":checked")) {
                $(".check-item").prop("checked", true);
                var panjang = $('[name="id_check[]"]:checked').length;
            } else {
                $(".check-item").prop("checked", false);
            }
        })

        // $('#datatableCos thead tr')
        //     .clone(true)
        //     .addClass('filters')
        //     .appendTo('#datatableCos thead');

        var tables = $("#datatableCos").DataTable({
            orderCellsTop: true,
            pagingType: 'full_numbers',
            fixedHeader: true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            pageLength: 25,
            // initComplete: function() {
            //     var api = this.api();

            //     // For each column
            //     api
            //         .columns()
            //         .eq(0)
            //         .each(function(colIdx) {
            //             // Set the header cell to contain the input element
            //             var cell = $('.filters th').eq(
            //                 $(api.column(colIdx).header()).index()
            //             );
            //             var title = $(cell).text();

            //             console.log(colIdx);

            //             if (colIdx == 11 || colIdx == 0) {
            //                 $(cell).html('');
            //             } else {
            //                 $(cell).html('<input type="text" class="form-control form-control-sm" placeholder="' + title + '" />');

            //                 // On every keypress in this input
            //                 $(
            //                         'input',
            //                         $('.filters th').eq($(api.column(colIdx).header()).index())
            //                     )
            //                     .off('keyup change')
            //                     .on('change', function(e) {
            //                         // Get the search value
            //                         $(this).attr('title', $(this).val());
            //                         var regexr = '({search})'; //$(this).parents('th').find('select').val();

            //                         var cursorPosition = this.selectionStart;
            //                         // Search the column for that value
            //                         api
            //                             .column(colIdx)
            //                             .search(
            //                                 this.value != '' ?
            //                                 regexr.replace('{search}', '(((' + this.value + ')))') :
            //                                 '',
            //                                 this.value != '',
            //                                 this.value == ''
            //                             )
            //                             .draw();
            //                     })
            //                     .on('keyup', function(e) {
            //                         e.stopPropagation();

            //                         $(this).trigger('change');
            //                         $(this)
            //                             .focus()[0]
            //                             .setSelectionRange(cursorPosition, cursorPosition);
            //                     });
            //             }

            //         });
            // },
        })

    })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/costperservices/listmaster.blade.php ENDPATH**/ ?>