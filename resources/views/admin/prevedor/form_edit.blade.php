@extends('layouts.master')

@section('title') Prevedor @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Prevedor @endslot
@slot('title') Form Edit @endslot
@endcomponent


<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Prevedor - Form</h4>
                <a href="/prevedor" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <form method="post" class="needs-validation" action="/prevedor/updated" novalidate>
                    @csrf
                    <div class="col-xl-9">

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Razón Social: *
                            </label>
                            <div class="col-sm-9">
                                <input hidden type="text" name="id" value="{{ $data->id }}" id="">
                                <input type="text" value="{{ $data->name }}" name="name" required class="form-control" id="validationTooltip01">
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
                                <input type="text" value="{{ $data->rfc }}" name="rfc" required class="form-control" id="validationTooltip01">
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
                                <input type="text" value="{{ $data->telephone }}" name="telephone" required class="form-control" id="validationTooltip01">
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
                                <textarea type="text" name="bank_data" required class="form-control" id="validationTooltip01">{{ $data->telephone }}</textarea>
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
                                <input type="number" value="{{ $data->code_postal }}" name="code_postal" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Dirección: </label>
                            <div class="col-sm-9">
                                <input type="text" name="address" value="{{ $data->address }}" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Número Exterior: </label>
                            <div class="col-sm-9">
                                <input type="text" name="num_ext" required class="form-control" value="{{ $data->num_ext }}" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Número Interior: </label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $data->num_int }}" name="num_int" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Colonia: </label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $data->colony }}" name="colony" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Municipio: </label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $data->municipality }}" name="municipality" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Estado: </label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $data->state }}" name="state" required class="form-control" id="validationTooltip01">
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