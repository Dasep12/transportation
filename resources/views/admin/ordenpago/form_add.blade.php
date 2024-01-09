@extends('layouts.master')

@section('title') Orden de Pago @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Orden de Pago @endslot
@slot('title') Form Add @endslot
@endcomponent


<div class="row mb-5">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Orden de Pago - Form</h4>
                <a href="/ordendepago" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <form method="post" class="needs-validation" action="/ordendepago/addedd" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="horizontal-email-input" class="col-form-label">
                                Proveedor: *
                            </label>
                            <select name="supplier_id" required id="supplier_id" class="form-control select5">
                                <option value="">-SELECCIONER-</option>
                                @foreach($prevedor as $pre)
                                <option value="{{ $pre->id }}">{{ ucwords(strtolower($pre->name)) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <label for="horizontal-email-input" class="col-form-label">
                                Empressa: *
                            </label>
                            <select name="company_id" required id="company_id" class="form-control select3">
                                <option value="">-SELECCIONER-</option>
                                @foreach($empressa as $pr)
                                <option value="{{ $pr->id }}">{{ ucwords(strtolower($pr->name)) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <label for="horizontal-email-input" class="col-form-label">
                                Solicitante: *
                            </label>
                            <select name="applicant_id" required id="applicant_id" class="form-control select2">
                                <option value="">-SELECCIONER-</option>
                                @foreach($solicitante as $pr)
                                <option value="{{ $pr->id }}">{{ ucwords(strtolower($pr->first_name .' ' .  $pr->last_name)) }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="row  mt-3 mb-3">
                        <div class="col-lg-4">
                            <label for="horizontal-email-input" class=" col-form-label">
                                Concepto de Pago: *
                            </label>
                            <select name="concept_id" required id="concept_id" class="form-control select4">
                                <option value="">-SELECCIONER-</option>
                                @foreach($paymentconcept as $pc)
                                <option value="{{ $pc->id }}">{{ ucwords(strtolower($pc->concept)) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <label for="horizontal-email-input" class="col-form-label">
                                Forma de Pago: *
                            </label>
                            <select name="type_id" id="type_id" class="form-control select2">
                                <option value="">-SELECCIONER-</option>
                                @foreach($pormadepago as $pm)
                                <option value="{{ $pm->id }}">{{ ucwords(strtolower($pm->description)) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <label for="horizontal-email-input" class="col-form-label">
                                Fecha: *
                            </label>
                            <div class="input-group" id="datepicker2">
                                <input readonly type="text" required class="form-control" placeholder="yyyy-mm-dd" id="datepickerr" name="date" data-date-format="yyyy-mm-dd" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>

                    </div>

                    <div class="row  mt-3 mb-3">
                        <div class="col-lg-8">
                            <label for="horizontal-email-input" class=" col-form-label">
                                Condiciones de Pago: *
                            </label>
                            <div class="form-group">
                                <input type="text" required class="form-control" name="terms" id="terms">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="horizontal-email-input" class=" col-form-label">
                                Cost Per Services : *
                            </label>
                            <div class="form-group">
                                <select name="cost_id" id="cost_id" class="form-control select2">
                                    <option value="">-SELECCIONER-</option>
                                    @foreach($cost as $cs)
                                    <option value="{{ $cs->id }}">{{ ucwords(strtolower($cs->departure_city .'-' . $cs->destination_city)) }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Descripción</th>
                                        <th>Cantidad</th>
                                        <th>PU</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td align="center" colspan="4">
                                            <a id="addBtn" class="btn btn-sm btn-info "> <i class="fas fa-plus"></i> Agregar</a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            <i class="fa fa-save font-size-16 align-middle me-2"></i> Submit
                        </button>
                        <button type="button" class="btn btn-danger waves-effect waves-light">
                            <i class="fas fa-undo-alt  font-size-16 align-middle me-2"></i> Reset
                        </button>
                    </div>
                </form>
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
                                            <input class="form-control" type="text" name="count[]" required id="">
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="price_u[]" required id="">
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