

<?php $__env->startSection('title'); ?> Services <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Services <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Eventos <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>



<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Eventos - List</h4>
                <a href="eventos/form_add" class="btn btn-outline-success waves-effect waves-light">
                    <i class="fas fa-folder-plus  font-size-16 align-middle me-2"></i> Add New
                </a>
                <button type="button" class="btn btn-outline-danger waves-effect waves-light">
                    <i class="fas fa-trash    font-size-16 align-middle me-2"></i> Delete
                </button>
                <div class="table-responsive">
                    <table id="datatableEvent" class="table align-middle table-bordered  mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check font-size-16 align-middle">
                                        <input class="form-check-input" type="checkbox" id="transactionCheck01">
                                        <label class="form-check-label" for="transactionCheck01"></label>
                                    </div>
                                </th>
                                <th class="align-middle">Module Name</th>
                                <th class="align-middle">Where Are You Going</th>
                                <th class="align-middle">Place From</th>
                                <th class="align-middle">Departure Date</th>
                                <th class="align-middle">Departure Time</th>
                                <th class="align-middle">Returning Date</th>
                                <th class="align-middle">Returning Time</th>
                                <th class="align-middle">Travel Time</th>
                                <th class="align-middle">Count Users</th>
                                <th class="align-middle">Services</th>
                                <th class="align-middle">Quotation</th>
                                <th class="align-middle">Invoice</th>
                                <th class="align-middle">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="small">
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td>
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox" id="transactionCheck06">
                                        <label class="form-check-label" for="transactionCheck06"></label>
                                    </div>
                                </td>
                                <td><?php echo e($d->module_name); ?></td>
                                <td><?php echo e($d->where_are_you_going); ?></td>
                                <td><?php echo e($d->place_from); ?></td>
                                <td><?php echo e($d->departure_date); ?></td>
                                <td><?php echo e($d->departure_time); ?></td>
                                <td><?php echo e($d->returning_date); ?></td>
                                <td><?php echo e($d->returning_time); ?></td>
                                <td><?php echo e($d->travel_time); ?></td>
                                <td><?php echo e($d->count_users); ?></td>
                                <td>
                                    <?php
                                    $split = explode(",", $d->services);
                                    for ($i = 0; $i < count($split); $i++) { ?>
                                        <li>
                                            <a href=""><?= $split[$i] ?></a>
                                        </li>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php
                                    if ($d->quotation != "" || $d->quotation != null) { ?>
                                        <a href=""><i class="fas fa-file-pdf font-size-18 "></i></a>
                                    <?php } else {
                                        echo 'not uploaded yet';
                                    }
                                    ?>
                                    <a href=""><i class="bx bxs-trash font-size-18 text-danger"></i></a>
                                    <a href=""><i class="bx bxs-upvote font-size-18 text-success"></i></a>
                                </td>
                                <td>
                                    <?php
                                    if ($d->invoice != "" || $d->invoice != null) { ?>
                                        <a href=""><i class="fas fa-file-pdf font-size-18 "></i></a>
                                    <?php } else {
                                        echo 'not uploaded yet';
                                    }
                                    ?>
                                    <a href=""><i class="bx bxs-trash font-size-18 text-danger"></i></a>
                                    <a href=""><i class="bx bxs-upvote font-size-18 text-success"></i></a>
                                </td>
                                <td>
                                    <a href=""><i class="text-success fas fa-edit font-size-18 "></i></a>
                                    <a href=""><i class="fas fa-eye font-size-18 "></i></a>
                                    <a href=""><i class="fas fa-trash text-danger font-size-18 "></i></a>
                                </td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>

<script>
    $('#datatableEvent thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#datatableEvent thead');

    var tables = $("#datatableEvent").DataTable({
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
                });
        },
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/eventos/listmaster.blade.php ENDPATH**/ ?>