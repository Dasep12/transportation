@extends('layouts.master')

@section('title') Quotes @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Transaportation @endslot
@slot('title') Cotizaciones @endslot
@endcomponent
<?php

use App\Models\QuotesModel;
?>

<div class="row">
    <div class="col-lg-12">
        @if ($message = Session::get('success'))
        <div class="alert text-white  bg-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif ($message = Session::get('failed'))
        <div class="alert text-white  bg-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-check"></i>
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="card">
            <form method="post" action="quotes/deleteAll">
                @csrf
                <div class="card-body">

                    <h4 class="card-title mb-4">Lista de Cotizaciones</h4>
                    <a href="quotes/form_add?ref_id=" class="btn btn-outline-success waves-effect waves-light">
                        <i class="fas fa-folder-plus  font-size-16 align-middle me-2"></i> Agregar
                    </a>
                    <button type="submit" onclick="return confirm('Sure Delete ?')" class="btn btn-outline-danger waves-effect waves-light">
                        <i class="fas fa-trash font-size-16 align-middle me-2"></i> Borrar
                    </button>
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
                                    <th class="align-middle">No. Cotizacion</th>
                                    <th style="width: 200px;" class="align-middle">Cliente</th>
                                    <th class="align-middle">Email</th>
                                    <th class="align-middle">Total</th>
                                    <th class="align-middle">Estatus</th>
                                    <th class="align-middle">Estatus del Pago</th>
                                    <th class="align-middle">Monto Pagado</th>
                                    <th class="align-middle">Acciones</th>
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


<!--  Payment Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl " role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="staticBackdropLabel">Comprobantes de Pago</h5>
            </div>
            <form action="/quotes/payment" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="amount">Cantidad</label>
                                <input type="text" hidden name="quotes_id" id="quotes_id">
                                <input type="text" hidden name="ref_id" id="ref_id">
                                <input type="text" required class="form-control" name="amount">
                            </div>

                            <div class="form-group mt-2">
                                <label for="date">Fecha</label>
                                <div class="input-group" id="datepicker2">
                                    <input type="text" required class="form-control" placeholder="yyyy-mm-dd" name="payment_date" data-date-format="yyyy-mm-dd" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label for="status">Tipo de Pago</label>
                                <select name="payment_status" required class="form-control" id="">
                                    <option value="pending">Pending</option>
                                    <option value="partial">Partial</option>
                                    <option value="paid">Paid</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="metode">Forma de Pago</label>
                                <select name="payment_mode" required class="form-control" id="">
                                    <option>Trasferencia</option>
                                    <option>Efectivo</option>
                                    <option>Deposito Bancario</option>
                                    <option>En Línea</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="notes">Comentarios</label>
                                <input type="text" class="form-control" name="payment_notes">
                            </div>
                            <div class="form-group mt-2">
                                <label for="proof">Comprobante de Pago</label>
                                <input type="file" id="filess" class="form-control" name="payment_proof">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>

            <hr>
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>No</th>
                                        <th>Fecha</th>
                                        <th>Tipo de Pago</th>
                                        <th>Cantidad</th>
                                        <th>Balance</th>
                                        <th>Evidencia</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="paymentList"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- payment modal -->


<!--  Invoice Quotes -->
<div class="modal fade" id="staticBackdropInvoice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="staticBackdropLabel">Comprobantes de Pago</h5>
            </div>
            <form action="/quotes/updateInvoice" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <th>File Invoice</th>
                                <th>Show to Customers</th>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" hidden name="quotes_inv_id" id="quotes_inv_id">
                                            <input type="text" hidden name="invoice_num" id="invoice_num">
                                            <input type="file" name="invoice[]" id="invoice" class="form-control">
                                        </td>
                                        <td>
                                            <select name="show[]" class="form-control" id="">
                                                <option value="Y">Yes</option>
                                                <option value="N">No</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="file" name="invoice[]" id="invoice" class="form-control">
                                        </td>
                                        <td>
                                            <select name="show[]" class="form-control" id="">
                                                <option value="Y">Yes</option>
                                                <option value="N">No</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
            </form>

            <hr>
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>No</th>
                                        <th>File</th>
                                        <th>Show To Customers</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody id="paymentListInvoice"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--  -->

<script>
    var uploadField = document.getElementById("filess");
    uploadField.onchange = function() {
        if (this.files[0].size > 2000000) { // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
            alert("Sorry , file is too big ,maximum file size 4MB");
            this.value = "";
        };
    };
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

        // $('#datatableQuotes thead tr')
        //     .clone(true)
        //     .addClass('filters')
        //     .appendTo('#datatableQuotes thead');


        let tablePatroli = $('#datatableQuotes').DataTable({
            paging: true,
            scrollX: true,
            lengthChange: false,
            searching: true,
            ordering: false,
            autoWidth: false,
            processing: true,
            serverSide: false,
            ajax: {
                url: "/quotes/getQuotes",
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
            pageLength: 25,
            columns: [{
                    data: 'id',
                    render: function(data, type, row) {
                        return `<input id="check-item" value="${ data }" class="check-item" type="checkbox" name="id_check[]">`
                    }
                },
                {
                    data: 'invoice_number'
                },
                {
                    data: 'customer_name'
                },
                {
                    data: 'name'
                },
                {
                    data: 'total_amount'
                },
                {
                    data: 'mail_status',
                },
                {
                    data: 'payment_status',

                },
                {
                    data: 'balance'
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return `<a href="/quotes/edited?id=${ data }"><i class="fas fa-edit text-success font-size-16"></i></a>
                                        <a target="_blank" href="/quotes/pdfReport?id=${ data }"><i class="fas fa-file-pdf text-danger font-size-16"></i></a>

                                        <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-ref="${ row.reference }" data-id="${ data }"><i class="fas fa-comment-dollar text-warning font-size-16 waves-effect waves-light"></i></a>

                                        <a onclick="return confirm('Sure Delete ?')" href="/quotes/delete?id=${ data }"><i class="fas fa-trash text-danger font-size-16"></i></a>
                                        
                                        <a data-bs-toggle="modal" data-bs-target="#staticBackdropInvoice" data-ref="${ row.reference }" data-invoice_num="${ row.invoice_number }" data-id="${ data }"><i class="bx bx-book-open  text-info font-size-16 waves-effect waves-light"></i></a>`
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


            //             if (colIdx == 8) {
            //                 $(cell).html('<a id="searching" type="button" class="btn btn-sm btn-success"><i class="fas fa-search"></i></a>');
            //             } else if (colIdx == 0 || colIdx == 7 || colIdx == 6 || colIdx == 4) {
            //                 $(cell).html('');
            //             } else {
            //                 $(cell).html('<input id="' + colIdx + '" type="text" class="form-control form-control-sm" placeholder="Enter Here" />');
            //             }
            //         });

            //     $("#searching").click(function() {
            //         tablePatroli.ajax.reload();
            //     })
            // },
        });

    })

    $(document).ready(function() {
        // Untuk sunting modal data edit zona
        $("#staticBackdrop").on("show.bs.modal", function(event) {
            var div = $(event.relatedTarget); // Tombol dimana modal di tampilkan
            var modal = $(this);
            // Isi nilai pada field
            modal.find("#quotes_id").attr("value", div.data("id"));
            modal.find("#ref_id").attr("value", div.data("ref"));
            $.ajax({
                url: "/quotes/showPayment",
                method: "POST",
                data: {
                    ids: div.data("id"),
                    "_token": "{{ csrf_token() }}",
                },
                success: function(e) {
                    var html = "";
                    let data = e;
                    let number = 1;
                    $("#paymentList").empty();
                    for (let i = 0; i < data.length; i++) {
                        html += `<tr>
                        <td>${ number++ }</td>
                        <td>${ data[i].payment_date }</td>
                        <td>${ data[i].payment_mode }</td>
                        <td>$ ${ data[i].amount }</td>
                        <td>$ ${ data[i].balance }</td>
                        <td><a class='image-popup-vertical-fit' href="{{ asset('public/admin/img/payment') }}/${data[i].payment_proof } " title="Caption. Can be aligned it to any side and contain any HTML.">
                                        <img class="img-fluid" alt="" src="{{ asset('public/admin/img/payment') }}/${data[i].payment_proof } " width="145">
                                    </a></td>
                        <td><a href='/quotes/deletepayment?id=${ data[i].id }' onclick="return confirm('Sure Delete Data ?')" ><i class='fas fa-trash text-danger'></i></a></td>
                        </tr>`
                    }
                    $("#paymentList").append(html);
                }
            })
        });



        $("#staticBackdropInvoice").on("show.bs.modal", function(event) {
            var div = $(event.relatedTarget); // Tombol dimana modal di tampilkan
            var modal = $(this);
            // Isi nilai pada field
            modal.find("#quotes_inv_id").attr("value", div.data("id"));
            modal.find("#invoice_num").attr("value", div.data("invoice_num"));
            $.ajax({
                url: "/quotes/showInvoice",
                method: "POST",
                data: {
                    quotes_id: div.data("id"),
                    "_token": "{{ csrf_token() }}",
                },
                success: function(e) {
                    let data = e;
                    let html = "";
                    let number = 1;
                    $("#paymentListInvoice").empty();
                    for (let i = 0; i < data.length; i++) {
                        html += `<tr>
                        <td>${ number++ }</td>
                        <td><a target="_blank" href='{{ asset('public/invoice') }}/${ data[i].name_invoice }'>${ data[i].name_invoice }</a></td>
                        <td>${ data[i].showing }</td>
                        <td><a href='/quotes/deleteInvoice?quote_id=${ data[i].id }' onclick="return confirm('Sure Delete Data ?')" ><i class='fas fa-trash text-danger'></i></a></td>
                        </tr>`
                    }
                    $("#paymentListInvoice").append(html);
                }

            })
        })

    });
</script>

@endsection