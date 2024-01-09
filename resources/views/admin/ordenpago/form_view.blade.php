@extends('layouts.master')

@section('title') Orden de Pago @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Orden de Pago @endslot
@slot('title') Form Edit @endslot
@endcomponent


<div class="row mb-5">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Orden de Pago - Form</h4>
                <a href="/ordendepago" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <label class="control-label font-size-16">Proveedor: </label>
                        <?php echo $data[0]->suppliers; ?>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label">Empresa: </label>
                        <?php echo $data[0]->company; ?>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label font-size-16">N&uacute;mero de OC: </label>
                        <?php echo date_format(new DateTime($data[0]->dates), "dmy"); ?>-<?php echo $data[0]->ids; ?>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label font-size-16">Fecha: </label>
                        <?php echo date_format(new DateTime($data[0]->dates), "d-m-Y"); ?>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label font-size-16">Condiciones. Pago: </label>
                        <?php echo $data[0]->terms; ?>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label font-size-16">Forma de Pago: </label>
                        <?php echo $data[0]->statues; ?>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label font-size-16">Solicitante: </label>
                        <?php echo $data[0]->aplicant; ?>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-12">
                        <table class="table table-bordered font-size-16">
                            <thead>
                                <tr>
                                    <th>Descripción</th>
                                    <th>Cantidad</th>
                                    <th>PU</th>
                                    <th>Importe</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <?php $totals = 0; ?>
                                @foreach($details as $dtl)
                                <tr id="">
                                    <td style="width:60%">
                                        {{ $dtl->description }}
                                    </td>
                                    <td>
                                        {{ $dtl->quantity }}
                                    </td>
                                    <td>
                                        {{ $dtl->unit_price }}
                                    </td>
                                    <td><?php
                                        $importe  = $dtl->unit_price * $dtl->quantity;
                                        $totals += $importe;
                                        ?>
                                        {{ number_format($importe,2) }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td align="center" rowspan="3">
                                        Aprobar: {{ $data[0]->approved }}
                                    </td>
                                    <td align="center" colspan="2">Total</td>
                                    <td>$ {{ number_format($totals,2) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        // Denotes total number of rows 
        var rowIdx = 0;

        // jQuery button click event to add a row 
        $('#addBtn').on('click', function() {

            // Adding a row inside the tbody. 
            $('#tbody').append(` <tr id="R${++rowIdx}">
                                        <td style="width:60%">
                                            <input class="form-control" type="text" name="description[]" required id="">
                                        </td>
                                        <td>
                                            <input class="form-control number-decimal" type="text" name="count[]" required id="">
                                        </td>
                                        <td>
                                            <input class="form-control number-decimal" type="text" name="price_u[]" required id="">
                                        </td>
                                        <td>
                                            <a class="remove btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>`);
        });

        // jQuery button click event to remove a row. 
        $('#tbody').on('click', '.remove', function() {
            // Getting all the rows next to the row 
            // containing the clicked button 
            var child = $(this).closest('tr').nextAll();

            // Iterating across all the rows  
            // obtained to change the index 
            child.each(function() {

                // Getting <tr> id. 
                var id = $(this).attr('id');

                // Getting the <p> inside the .row-index class. 
                var idx = $(this).children('.row-index').children('p');

                // Gets the row number from <tr> id. 
                var dig = parseInt(id.substring(1));

                // Modifying row index. 
                idx.html(`Row ${dig - 1}`);

                // Modifying row id. 
                $(this).attr('id', `R${dig - 1}`);
            });

            // Removing the current row. 
            $(this).closest('tr').remove();
            // Decreasing total number of rows by 1. 
            rowIdx--;
        });
    });
</script>
@endsection