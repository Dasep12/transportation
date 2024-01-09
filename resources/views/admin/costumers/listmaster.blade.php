@extends('layouts.master')

@section('title') Customers @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') User Management @endslot
@slot('title') Customers @endslot
@endcomponent


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="/costumers/deleteAll">

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
                    @csrf

                    <h4 class="card-title mb-4">Customers - List</h4>
                    <!-- <a href="costumers/form_add" class="btn btn-outline-success waves-effect waves-light">
                        <i class="fas fa-folder-plus  font-size-16 align-middle me-2"></i> Add New
                    </a> -->
                    <!-- <button onclick="return confirm('Sure Delete Data Selected ?')" type="submit" class="btn btn-outline-danger waves-effect waves-light">
                        <i class="fas fa-trash    font-size-16 align-middle me-2"></i> Delete
                    </button> -->
                    <div class="table-responsive">
                        <table id="datatable2" class="table align-middle  table-bordered  mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="form-check font-size-16 align-middle">
                                            <input class="form-check-input" type="checkbox" id="check-all">
                                            <label class="form-check-label" for="transactionCheck01"></label>
                                        </div>
                                    </th>
                                    <th class="align-middle">Full Name</th>
                                    <th class="align-middle">Email</th>
                                    <th class="align-middle">Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $dt)
                                <tr>
                                    <td><input id="check-item" class="check-item" type="checkbox" name="id_check[]"></td>
                                    <td>{{ ucwords(strtolower($dt->customer_name)) }}</td>
                                    <td>{{ ucwords(strtolower($dt->email)) }}</td>
                                    <td>{{ $dt->phone }}</td>
                                </tr>
                                @endforeach
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

    $('#datatable2 thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#datatable2 thead');

    var tables = $("#datatable2").DataTable({
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

                    if (colIdx == 5 || colIdx == 0) {
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
</script>
@endsection