@extends('layouts.master')

@section('title') Airplane / Bus @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Airplane / Bus @endslot
@slot('title') Form Add @endslot
@endcomponent


<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Airplane / Bus - Form</h4>
                <a href="/airplanes" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <form class="needs-validation" novalidate>
                    <div class="col-xl-9">
                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Event Name : *</label>
                            <div class="col-sm-9">
                                <select required class="form-control select2">
                                    <option selected value=""> -SELECT- </option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                </select>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Service Type : *</label>
                            <div class="col-sm-9">
                                <select required class="form-control select2">
                                    <option selected value=""> -SELECT- </option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                </select>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Airline - Buss Line Name *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="horizontal-password-input" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Type : *</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <input class="form-check-input ml-2" type="radio" name="formRadios" id="formRadios1" checked>
                                        <label class="form-check-label ml-2" for="formRadios1">
                                            Single
                                        </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <input class="mr-2 form-check-input" type="radio" name="formRadios" id="formRadios1" checked>
                                        <label class="form-check-label" for="formRadios1">
                                            Round
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Número de reserva:*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="horizontal-password-input" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Precio neto:*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="horizontal-password-input" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Upload Plane Ticket :</label>
                            <div class="col-sm-5">
                                <input class="form-control" required type="file" id="formFile">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Upload Boarding Pass :</label>
                            <div class="col-sm-5">
                                <input class="form-control" required type="file" id="formFile">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Comments : </label>
                            <div class="col-sm-5">
                                <textarea name="" class="form-control" id=""></textarea>
                            </div>
                        </div>

                        <div class="row text-center">
                            <h4>Servicios Adicionales: </h4>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Type : *</label>
                            <div class="col-sm-9">
                                <div class="col-lg-9">
                                    <div class="form-horizontal">
                                        <input class="form-check-input ml-2" type="checkbox" name="formRadios" id="formRadios1" checked>
                                        <label class="form-check-label ml-2" for="formRadios1">
                                            Extra Luggage
                                        </label>
                                    </div>
                                    <div class="form-row">
                                        <input class="mr-4 form-check-input" type="checkbox" name="formRadios" id="formRadios1" checked>
                                        <label class="form-check-label" for="formRadios1">
                                            Reservation Changes
                                        </label>
                                    </div>
                                    <div class="form-row">

                                        <input class="mr-2 form-check-input" type="checkbox" name="formRadios" id="formRadios1" checked>
                                        <label class="form-check-label" for="formRadios1">
                                            others
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">
                                Price:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="horizontal-password-input" required>
                            </div>
                        </div>

                        <div>
                            <button type="button" class="btn btn-primary waves-effect waves-light">
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