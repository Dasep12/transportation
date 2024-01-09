

<?php $__env->startSection('title'); ?> Services <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Transaportation <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Orden de Servicio <?php $__env->endSlot(); ?>
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
                <h4 class="card-title mb-4">Orden de Servicio - List</h4>
                <div class="table-responsive">
                    <table id="datatableServices" class="table align-middle  table-bordered  mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="align-middle">Driver</th>
                                <th class="align-middle">Unidad</th>
                                <th class="align-middle">Inicio</th>
                                <th class="align-middle">Origen</th>
                                <th class="align-middle">Destino</th>
                                <th class="align-middle">Estatus</th>
                                <th class="align-middle">Actiones</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

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

        $('#datatableServices thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#datatableServices thead');


        let tablePatroli = $('#datatableServices').DataTable({
            paging: true,
            scrollX: true,
            lengthChange: false,
            searching: false,
            ordering: false,
            autoWidth: false,
            processing: true,
            serverSide: false,
            ajax: {
                url: "/drivers/services/getServices",
                dataSrc: '',
                data: function() {
                    var param = {
                        'driver': $("#1").val(),
                        'car': $("#2").val(),
                        'date': $("#datepickerr").val(),
                        'departure': $("#4").val(),
                        'destination': $("#5").val(),
                    }
                    return param
                }
            },
            order: [
                [5, 'desc']
            ],
            pageLength: 10,
            columns: [{
                    data: 'driver_name'
                },
                {
                    data: 'car_name'
                },
                {
                    data: 'date'
                },
                {
                    data: 'departure',
                },
                {
                    data: 'destination',
                },
                {
                    data: 'status',
                    render: function(data, type, row) {
                        console.log(data);
                        let res = "";
                        if (data == "Pending") {
                            res = `<span class="badge bg-danger">${data}</span>`
                        } else if (data == "Accomplished") {
                            res = `<span class="badge bg-success">${data}</span>`
                        } else if (data == "In Progress") {
                            res = `<span class="badge bg-primary">${data}</span>`
                        }
                        return res;
                    }
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return `<a title="Edit" href="/drivers/services/edited?id=${ data }"><i class="fas fa-edit text-success font-size-16"></i></a> <a title="Gastos" href="/drivers/services/gastos?id=${ data }"><i class="fas fa-comment-dollar text-danger font-size-16"></i></a>`
                    }
                }
            ],
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


                        if (colIdx == 6) {
                            $(cell).html('<a id="searching" type="button" class="btn btn-sm btn-success"><i class="fas fa-search"></i></a>');
                        } else if (colIdx == 3) {
                            $(cell).html(`<div class="input-group" id="datepicker2"><input type="text" class="form-control form-control-sm" placeholder="yyyy-mm-dd" id="datepickerr" name="date" data-date-format="yyyy-mm-dd" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true"></div>`);
                        } else {
                            $(cell).html('<input id="' + colIdx + '" type="text" class="form-control form-control-sm" placeholder="Enter Here" />');
                        }
                    });

                $("#searching").click(function() {
                    tablePatroli.ajax.reload();
                })
            },
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layouts_drivers.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/drivers/listmaster.blade.php ENDPATH**/ ?>