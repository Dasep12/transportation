

<?php $__env->startSection('title'); ?> Cars <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Transaportation <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Cars <?php $__env->endSlot(); ?>
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

                <h4 class="card-title mb-4">Cars - List</h4>
                <form action="/cars/deleteAll" method="post">
                    <?php echo csrf_field(); ?>
                    <a href="cars/form_add" class="btn btn-outline-success waves-effect waves-light">
                        <i class="fas fa-folder-plus  font-size-16 align-middle me-2"></i> Add New
                    </a>
                    <?php echo csrf_field(); ?>
                    <button onclick="return confirm('Sure Delete Data Selected ?')" type="submit" class="btn btn-outline-danger waves-effect waves-light">
                        <i class="fas fa-trash    font-size-16 align-middle me-2"></i> Delete
                    </button>
                    <div class="table-responsive">
                        <table id="datatableCar" class="table align-middle  table-bordered  mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="form-check font-size-16 align-middle">
                                            <input class="form-check-input" type="checkbox" id="check-all">
                                            <label class="form-check-label" for="transactionCheck01"></label>
                                        </div>
                                    </th>
                                    <th class="align-middle">Car Name</th>
                                    <th class="align-middle">Plate</th>
                                    <th class="align-middle">Color</th>
                                    <th class="align-middle">Fuel Capacity</th>
                                    <th class="align-middle">Fuel Type</th>
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">Status Car</th>
                                    <th class="align-middle">Purchase Date</th>
                                    <th class="align-middle">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><input id="check-item" value="<?php echo e($d->id); ?>" class="check-item" type="checkbox" name="id_check[]"></td>
                                    <td><?php echo e(ucwords(strtolower($d->car_name))); ?></td>
                                    <td><?php echo e($d->plate); ?></td>
                                    <td><?php echo e(ucwords(strtolower($d->color))); ?></td>
                                    <td><?php echo e($d->fuel_capacity); ?></td>
                                    <td><?php echo e($d->fuel_type); ?></td>
                                    <td>
                                        <span class="badge <?= $d->status == 'Active' ? ' bg-success' : 'bg-danger' ?> badge-pill float-end ms-1 font-size-12"><?php echo e($d->status); ?>

                                        </span>
                                    </td>
                                    <td><?php echo e($d->car_status); ?></td>
                                    <td><?php echo e($d->purchase_date); ?></td>
                                    <td>
                                        <a data-toggle="tooltip" title="Edit" data-placement="top" href="/cars/edited?id=<?php echo e($d->id); ?>"><i class="font-size-14 text-success fas fa-edit"></i></a>

                                        <?php if($d->insurance_policy != NULL): ?>
                                        <a target="_blank" href="<?php echo e(asset('public/admin/img/cars/'. $d->insurance_policy )); ?>"><i class="font-size-14 text-danger fas fa-file-pdf"></i></a>
                                        <?php endif; ?>

                                        <a data-toggle="tooltip" title="Gallery" data-placement="top" href="/cars/gallery?id=<?php echo e($d->id); ?>"><i class="font-size-14 text-secondary fas fa-photo-video"></i></a>

                                        <a data-toggle="tooltip" title="Delete" data-placement="top" href="/cars/delete?id=<?php echo e($d->id); ?>" onclick="return confirm('Sure delete ?')"><i class="font-size-14 text-danger fas fa-trash"></i></a>


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

        $('#datatableCar thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#datatableCar thead');

        var tables = $("#datatableCar").DataTable({
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
            initComplete: function() {
                var api = this.api();

                // For each column
                api
                    .columns()
                    .eq(0)
                    .each(function(colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();

                        console.log(colIdx);

                        if (colIdx == 8 || colIdx == 0) {
                            $(cell).html('');
                        } else {
                            $(cell).html('<input type="text" class="form-control form-control-sm" placeholder="' + title + '" />');

                            // On every keypress in this input
                            $(
                                    'input',
                                    $('.filters th').eq($(api.column(colIdx).header()).index())
                                )
                                .off('keyup change')
                                .on('change', function(e) {
                                    // Get the search value
                                    $(this).attr('title', $(this).val());
                                    var regexr = '({search})'; //$(this).parents('th').find('select').val();

                                    var cursorPosition = this.selectionStart;
                                    // Search the column for that value
                                    api
                                        .column(colIdx)
                                        .search(
                                            this.value != '' ?
                                            regexr.replace('{search}', '(((' + this.value + ')))') :
                                            '',
                                            this.value != '',
                                            this.value == ''
                                        )
                                        .draw();
                                })
                                .on('keyup', function(e) {
                                    e.stopPropagation();

                                    $(this).trigger('change');
                                    $(this)
                                        .focus()[0]
                                        .setSelectionRange(cursorPosition, cursorPosition);
                                });
                        }

                    });
            },
        })

    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/cars/listmaster.blade.php ENDPATH**/ ?>