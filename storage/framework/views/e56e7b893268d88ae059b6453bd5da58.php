

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
                <form action="/services/deleteAll" method="post">
                    <?php echo csrf_field(); ?>
                    <h4 class="card-title mb-4">Orden de Servicio - List</h4>
                    <a href="services/form_add" class="btn btn-outline-success waves-effect waves-light">
                        <i class="fas fa-folder-plus  font-size-16 align-middle me-2"></i> Add New
                    </a>
                    <button type="submit" onclick="return confirm('Sure Delete ?')" class="btn btn-outline-danger waves-effect waves-light">
                        <i class="fas fa-trash font-size-16 align-middle me-2"></i> Delete
                    </button>
                    <div class="table-responsive">
                        <table id="datatableServices" class="table align-middle  table-bordered  mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="form-check font-size-16 align-middle">
                                            <input id="check-all" class="form-check-input" type="checkbox" id="transactionCheck01">
                                        </div>
                                    </th>
                                    <th class="align-middle">Costumer Name</th>
                                    <th class="align-middle">Driver</th>
                                    <th class="align-middle">Car Name</th>
                                    <th class="align-middle">Date</th>
                                    <th class="align-middle">Departure</th>
                                    <th class="align-middle">Destination</th>
                                    <th class="align-middle">Trip Milage</th>
                                    <th class="align-middle">Kms Liter</th>
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">Payment</th>
                                    <th class="align-middle">Actions</th>

                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </form>

            </div>
        </div>
    </div>
</div>



<!-- modal anticipo -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-white">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
            </div>
            <form action="/services/updateAnticipo" method="post">
                <div class="modal-body anticipo">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- modal anticipo -->
<div class="modal fade" id="notas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-white">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
            </div>
            <form action="/services/updateNotas" method="post">
                <div class="modal-body">
                    <?php echo csrf_field(); ?>
                    <label class="font-size-18" for="">Nota : </label>
                    <input hidden type="text" name="servicess_id" id="servicess_id">
                    <textarea class="form-control" id="set_notas" name="nota"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
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

        // $('#datatableServices thead tr')
        //     .clone(true)
        //     .addClass('filters')
        //     .appendTo('#datatableServices thead');


        let tablePatroli = $('#datatableServices').DataTable({
            paging: true,
            scrollX: true,
            lengthChange: false,
            searching: true,
            ordering: false,
            autoWidth: false,
            processing: true,
            serverSide: false,
            ajax: {
                url: "/services/getServices",
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
            pageLength: 25,
            columns: [{
                    data: 'id',
                    render: function(data, type, row) {
                        return `<input id="check-item" value="${ data }" class="check-item" type="checkbox" name="id_check[]">`
                    }
                },
                {
                    data: 'customer_name'
                },
                {
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
                    data: 'trip_milage'
                },
                {
                    data: 'kms_litres',
                    render: function(data, type, row) {
                        console.log(row.litros)
                        return data
                    }
                },
                {
                    data: 'status',
                    render: function(data, type, row) {
                        let res = "";
                        if (data == "Pending") {
                            res = `<span class="badge bg-danger">${data}</span>`
                        } else {
                            res = `<span class="badge bg-success">${data}</span>`
                        }
                        return res;
                    }
                },
                {
                    data: 'payment_status',
                    render: function(data, type, row) {
                        let res = "";
                        if (data == "Pending") {
                            res = `<span class="badge bg-danger">${data}</span>`
                        } else if (data == "Paid") {
                            res = `<span class="badge bg-success">${data}</span>`
                        }
                        return res;
                    }
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return `<a href="/services/edited?id=${ data }"><i class="fas fa-edit text-warning font-size-16"></i></a>  

                        <a onclick="return confirm('Sure Delete ?')"  href="/services/deleted?id=${ data }"><i class="fas fa-trash text-danger font-size-16"></i></a> 

                        <a style="cursor:pointer" href="/services/serviceFile?id=${ data }" title="Evidencia"><i class="far fa-file-image text-secondary font-size-16"></i></a> 
                        
                        
                        
                        <a style="cursor:pointer" target="_blank" href="/services/gastosPdf?id=${ data }" title="Gastos"><i class="fas fa-chart-bar  text-danger font-size-16"></i></a> 

                        <a style="cursor:pointer" target="_blank" href="/services/contractPdf?id=${ data }" title="Contract"><i class="far fa-file-pdf text-secondary font-size-16"></i> </a>

                        <a style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-costId="${ row.costperservices_id }" data-id="${ data }"><i class="far fa-credit-card text-success font-size-16 "></i></a> 

                        <a data-bs-toggle="modal" style="cursor:pointer" data-bs-target="#notas" data-notas="${ row.note }" data-id="${ data }"><i class="fas fa-comment-dots  text-secondary font-size-16 "></i></a>

                        `
                    }
                }
            ],
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


            //             if (colIdx == 11) {
            //                 $(cell).html('<a id="searching" type="button" class="btn btn-sm btn-success"><i class="fas fa-search"></i></a>');
            //             } else if (colIdx == 0) {
            //                 $(cell).html('');
            //             } else if (colIdx == 4) {
            //                 $(cell).html(`<div class="input-group" id="datepicker2"><input type="text" class="form-control form-control-sm" placeholder="yyyy-mm-dd" id="datepickerr" name="date" data-date-format="yyyy-mm-dd" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true"></div>`);
            //             } else {
            //                 $(cell).html('<input id="' + colIdx + '" type="text" class="form-control form-control-sm" placeholder="Enter Here" />');
            //             }
            //         });

            //     $("#searching").click(function() {
            //         tablePatroli.ajax.reload();
            //     })
            // },
        });

    });
    $(document).ready(function() {
        // Untuk sunting modal data edit zona
        $("#staticBackdrop").on("show.bs.modal", function(event) {
            var div = $(event.relatedTarget);
            var modal = $(this);
            idService = div.data("id");
            costId = div.data("costid");
            $.ajax({
                url: "/services/loadAnticipo",
                method: "POST",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    'cost_id': costId,
                    'ordenId': idService
                },
                success: function(e) {
                    $(".anticipo").empty();
                    $(".anticipo").append(e);
                    let resto1 = $("#payment_total_1").val();
                    let monto1 = $("#amount_1").val();
                    let fee_1 = $("#fee_total_1").val();
                    let balance1 = parseFloat(fee_1) - (parseFloat(resto1) + parseFloat(monto1));
                    $("#balance_1").val(balance1);

                    let resto2 = $("#payment_total_2").val();
                    let monto2 = $("#advance_2").val();
                    let fee_2 = $("#fee_total_2").val();
                    let balance2 = parseFloat(fee_2) - (parseFloat(resto2) + parseFloat(monto2));
                    $("#balance_2").val(balance2);


                    $("#amount_1").on('change', function() {
                        let resto1 = $("#payment_total_1").val();
                        let monto = this.value;
                        let fee_1 = $("#fee_total_1").val();
                        let balance = parseFloat(fee_1) - (parseFloat(resto1) + parseFloat(monto));
                        $("#balance_1").val(balance);
                    })
                    $("#payment_total_1").on('change', function() {
                        let monto = $("#amount_1").val();
                        let resto1 = this.value;
                        let fee_1 = $("#fee_total_1").val();
                        let balance = parseFloat(fee_1) - (parseFloat(resto1) + parseFloat(monto));
                        $("#balance_1").val(balance);
                    })

                    $("#advance_2").on('change', function() {
                        let resto2 = $("#payment_total_2").val();
                        let monto = this.value;
                        let fee_2 = $("#fee_total_2").val();
                        let balance = parseFloat(fee_2) - (parseFloat(resto2) + parseFloat(monto));
                        $("#balance_2").val(balance);
                    })
                    $("#payment_total_2").on('change', function() {
                        let monto = $("#advance_2").val();
                        let resto2 = this.value;
                        let fee_2 = $("#fee_total_2").val();
                        let balance = parseFloat(fee_2) - (parseFloat(resto2) + parseFloat(monto));
                        $("#balance_2").val(balance);
                    })
                }
            })
        });

        $("#notas").on("show.bs.modal", function(event) {
            var div = $(event.relatedTarget);
            var modal = $(this);
            idService = div.data("id");
            document.getElementById("set_notas").value = div.data("notas");
            $("#servicess_id").val(idService);
        })
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/services/listmaster.blade.php ENDPATH**/ ?>