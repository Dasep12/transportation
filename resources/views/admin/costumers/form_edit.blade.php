@extends('layouts.master')

@section('title') Customers @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Customers @endslot
@slot('title') Form Edit @endslot
@endcomponent


<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
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
                <h4 class="card-title mb-4 mt-2 ml-2">Customers - Form</h4>
                <a href="/costumers" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <div class="col-xl-9">
                    <form enctype="multipart/form-data" method="post" action="/costumers/updated" class="needs-validation" novalidate>
                        @csrf
                        <input type="text" name="id" hidden value="{{ $data->id }}" id="id">
                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">First Name : * </label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $data->first_name }}" name="first_name" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Last Name : * </label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $data->last_name }}" name="last_name" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Company : * </label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $data->company }}" name="company" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Rfc : * </label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $data->rfc }}" name="rfc" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email : * </label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $data->email }}" name="email" required class="form-control" id="validationTooltip01">
                            </div>

                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Photo : </label>
                            <div class="col-sm-4">
                                <input type="file" name="photo" class="form-control" id="validationTooltip01">
                            </div>
                            <div class="col-sm-5">
                                <div class="mt-4 mt-md-0">
                                    <a class="image-popup-vertical-fit" href="{{ asset('public/admin/img/customers/'. $data->photo ) }}" title="">
                                        <img class="img-fluid" alt="" src="{{ asset('public/admin/img/customers/'. $data->photo  ) }}" width="145">
                                    </a>
                                </div>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Phone : </label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $data->phone }}" name="phone" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Password : </label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="validationTooltip01">
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
                    </form>
                </div>
            </div>
        </div>

    </div>


    @endsection