@extends('layouts.master')

@section('title') Services @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Users @endslot
@slot('title') Form Add @endslot
@endcomponent


<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Users - Form</h4>
                <a href="/users" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <div class="col-xl-9">
                    <form class="needs-validation" novalidate>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">First Name : * </label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Last Name : * </label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Discipline : *</label>
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
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Gender : </label>
                            <div class="col-sm-9">
                                <div class="row">

                                    <div class="col-lg-2">
                                        <label class="form-check-label ml-2" for="formRadios1">
                                            Male
                                        </label>
                                        <input class="form-check-input ml-2" type="radio" name="formRadios" id="formRadios1" checked>
                                    </div>


                                    <div class="col-lg-2">
                                        <label class="form-check-label" for="formRadios1">
                                            Female
                                        </label>
                                        <input class="mr-2 form-check-input" type="radio" name="formRadios" id="formRadios1" checked>
                                    </div>
                                </div>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Category : </label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">User Type :</label>
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
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Date Of Birth : </label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Clothes Size : </label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Identification Number : </label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Phone Number : </label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email : </label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Travel Kit : </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="form-check-label ml-2" for="formRadios1">
                                            Yes
                                        </label>
                                        <input class="form-check-input ml-2" type="radio" name="formRadios" id="formRadios1" checked>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="form-check-label" for="formRadios1">
                                            No
                                        </label>
                                        <input class="mr-2 form-check-input" type="radio" name="formRadios" id="formRadios1" checked>
                                    </div>
                                </div>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Additional Uniform Info : </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="form-check-label ml-2" for="formRadios1">
                                            Yes
                                        </label>
                                        <input class="form-check-input ml-2" type="radio" name="formRadios" id="formRadios1" checked>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="form-check-label" for="formRadios1">
                                            No
                                        </label>
                                        <input class="mr-2 form-check-input" type="radio" name="formRadios" id="formRadios1" checked>
                                    </div>
                                </div>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
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
                    </form>
                </div>
            </div>
        </div>

    </div>


    @endsection