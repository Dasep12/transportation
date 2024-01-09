@extends('layouts.master')

@section('title') Orden de Pago @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Gastos @endslot
@slot('title') Orden de Pago @endslot
@endcomponent


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
            <div class="card-body">
                <form method="post" action="/ordendepago/deleteAll">

                    <h4 class="card-title mb-4">Orden de Pago - List</h4>
                    <a href="ordendepago/form_add" class="btn btn-outline-success waves-effect waves-light">
                        <i class="fas fa-folder-plus  font-size-16 align-middle me-2"></i> Add New
                    </a>
                    @csrf
                    <button type="submit" onclick="return confirm('Sure Delete Data Selected ?')" class="btn btn-outline-danger waves-effect waves-light">
                        <i class="fas fa-trash    font-size-16 align-middle me-2"></i> Delete
                    </button>
                    <div class="table-responsive">
                        <table id="datatableOrden" class="table align-middle  table-bordered  mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="form-check font-size-16 align-middle">
                                            <input class="form-check-input" type="checkbox" id="check-all">
                                            <label class="form-check-label" for="transactionCheck01"></label>
                                        </div>
                                    </th>
                                    <th class="align-middle">Folio</th>

                                    <th class="align-middle">Company Name</th>
                                    <th class="align-middle">Supplier Name</th>
                                    <th class="align-middle">Applicant</th>
                                    <th class="align-middle">Concept</th>
                                    <th class="align-middle">Terms</th>
                                    <th class="align-middle">Total</th>
                                    <th class="align-middle">Date</th>
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                            </thead>
                            <tbody>
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

        $('#datatableOrden thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#datatableOrden thead');


        let tablePatroli = $('#datatableOrden').DataTable({
            paging: true,
            scrollX: true,
            lengthChange: false,
            searching: false,
            ordering: false,
            autoWidth: false,
            processing: true,
            serverSide: false,
            ajax: {
                url: "/ordendepago/getOrden",
                dataSrc: '',
                data: function() {
                    var param = {
                        'folio': $("#1").val(),
                        'company': $("#2").val(),
                        'supplier': $("#3").val(),
                        'aplicant': $("#4").val(),
                        'concept': $("#5").val(),
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
                    data: 'folio'
                },
                {
                    data: 'company'
                }, {
                    data: 'supplier'
                },
                {
                    data: 'aplicant'
                },
                {
                    data: 'concept'
                },
                {
                    data: 'terms'
                },
                {
                    data: 'total',
                    render: function(data, type, row) {
                        return `$ ${data}`
                    }
                },
                {
                    data: 'dates',
                },
                {
                    data: 'status',
                    render: function(data, type, row) {

                        if (data == 'Aprobado') {
                            return `<span class="badge bg-success">${ data }</span>`
                        } else {
                            return `<span class="badge bg-danger">${ data }</span>`
                        }

                        return '';
                    }
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return `<a href="/ordendepago/view?id=${ data }"><i class="fas fa-eye text-secondary font-size-16"></i></a>

                        <a href="/ordendepago/edited?id=${ data }"><i class="fas fa-edit text-success font-size-16 waves-effect waves-light"></i></a>

                                        <a target="_blank" href="/ordendepago/pdfReport?id=${ data }"><i class="fas fa-file-pdf text-danger font-size-16"></i></a>

                                        

                                        <a onclick="return confirm('Sure Delete ?')" href="/ordendepago/delete?id=${ data }"><i class="fas fa-trash text-danger font-size-16"></i></a>`
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


                        if (colIdx == 10) {
                            $(cell).html('<a id="searching" type="button" class="btn btn-sm btn-success"><i class="fas fa-search"></i></a>');
                        } else if (colIdx == 0 || colIdx == 1 || colIdx == 7 || colIdx == 6) {
                            $(cell).html('');
                        } else {
                            $(cell).html('<input id="' + colIdx + '" type="text" class="form-control form-control-sm" placeholder="Enter Here" />');
                        }
                    });

                $("#searching").click(function() {
                    tablePatroli.ajax.reload();
                })
            },
        });


        $.ajax({
            url: "/ordendepago/getOrden",
            method: "GET",
            data: {
                '': ''
            },
            success: function(e) {
                console.log(e)
            }
        })

        $.ajax({
            url: "/quotes/getQuotes",
            method: "GET",
            data: {
                '': ''
            },
            success: function(e) {
                console.log(e)
            }
        })

    })
</script>
@endsection