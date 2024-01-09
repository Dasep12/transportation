@extends('layouts.master')

@section('title') Empresas @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Empresas @endslot
@slot('title') Form Add @endslot
@endcomponent


<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Empresas - Form</h4>
                <a href="/empresas" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <form method="post" class="needs-validation" action="/empresas/addedd" novalidate>
                    @csrf
                    <div class="col-xl-9">

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Razón Social: *
                            </label>
                            <div class="col-sm-9">
                                <input type="text" name="name" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                RFC: *
                            </label>
                            <div class="col-sm-9">
                                <input type="text" name="rfc" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Teléfono:
                            </label>
                            <div class="col-sm-9">
                                <input type="text" name="telephone" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Datos Bancarios:
                            </label>
                            <div class="col-sm-9">
                                <textarea type="text" name="bank_data" required class="form-control" id="validationTooltip01"></textarea>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Código postal:
                            </label>
                            <div class="col-sm-9">
                                <input type="number" name="code_postal" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Dirección: </label>
                            <div class="col-sm-9">
                                <input type="text" name="address" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Número Exterior: </label>
                            <div class="col-sm-9">
                                <input type="text" name="num_ext" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Número Interior: </label>
                            <div class="col-sm-9">
                                <input type="text" name="num_int" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Colonia: </label>
                            <div class="col-sm-9">
                                <input type="text" name="colony" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Municipio: </label>
                            <div class="col-sm-9">
                                <input type="text" name="municipality" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Estado: </label>
                            <div class="col-sm-9">
                                <input type="text" name="state" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                <i class="fa fa-save font-size-16 align-middle me-2"></i> Submit
                            </button>
                            <button type="button" class="btn btn-danger waves-effect waves-light">
                                <i class="fas fa-undo-alt  font-size-16 align-middle me-2"></i> Reset
                            </button>
                        </div>
                    </div>


            </div>
            </form>
        </div>
    </div>

</div>


@endsection