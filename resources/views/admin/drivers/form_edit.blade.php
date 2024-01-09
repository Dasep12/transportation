@extends('layouts.master')

@section('title') Drivers @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Drivers @endslot
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
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <h4 class="card-title mb-4 mt-2 ml-2">Drivers - Form</h4>
                <a href="/drivers" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <form method="post" enctype="multipart/form-data" action="/drivers/updated" class="needs-validation" novalidate>
                    @csrf
                    <div class="col-xl-9">
                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">First Name : * </label>
                            <div class="col-sm-9">
                                <input type="text" hidden name="id" id="id" value="{{ $data[0]->id }}">
                                <input type="text" value="{{ $data[0]->first_name }}" name="first_name" required class="form-control" id="">
                                @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Last Name :
                            </label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $data[0]->last_name }}" name="last_name" required class="form-control" id="">
                                @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Photo:</label>
                            <div class="col-sm-4">
                                <input class="form-control" name="photo" type="file" id="formFile">
                                @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-5">
                                <div class="mt-4 mt-md-0">
                                    <a class="image-popup-vertical-fit" href="{{ asset('public/admin/img/driver/'. $data[0]->photo ) }}" title="">
                                        <img class="img-fluid" alt="" src="{{ asset('public/admin/img/driver/'. $data[0]->photo ) }}" width="145">
                                    </a>
                                </div>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Email : *
                            </label>
                            <div class="col-sm-9">
                                <input type="email" value="{{ $data[0]->email }}" name="email" required class="form-control" id="">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Phone :
                            </label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $data[0]->phone }}" name="phone" required class="form-control" id="">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Address :
                            </label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $data[0]->address }}" name="address" required class="form-control" id="">
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                License #:
                            </label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $data[0]->license }}" name="license" required class="form-control" id="">
                                @error('license')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Costo por Dia : *
                            </label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $data[0]->fee_per_day }}" name="costo_por_dia" required class="form-control" id="">
                                @error('costo_por_dia')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                License Exp Date : *
                            </label>
                            <div class="col-sm-9 ">
                                <div class="input-group" id="datepicker2">
                                    <input value="{{ $data[0]->license_exp }}" type="text" required class="form-control" placeholder="yyyy-mm-dd" name="license_exp" data-date-format="yyyy-mm-dd" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div>
                                @error('license_exp')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Photo Licence:</label>
                            <div class="col-sm-4">
                                <input class="form-control" name="photo_license" type="file" id="formFile">
                                @error('photo_license')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-5">
                                <div class="mt-4 mt-md-0">
                                    <a class="image-popup-vertical-fit" href="{{ asset('public/admin/img/driver/'. $data[0]->photo_licence ) }}" title="">
                                        <img class="img-fluid" alt="" src="{{ asset('public/admin/img/driver/'. $data[0]->photo_licence ) }}" width="145">
                                    </a>
                                </div>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Carnet de Psicofisico:</label>
                            <div class="col-sm-4">
                                <input class="form-control" name="photo_psicofisico" type="file" id="formFile">
                                @error('photo_psicofisico')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-5">
                                <div class="mt-4 mt-md-0">
                                    <a class="image-popup-vertical-fit" href="{{ asset('public/admin/img/driver/'. $data[0]->photo_psicofisico ) }}" title="">
                                        <img class="img-fluid" alt="" src="{{ asset('public/admin/img/driver/'. $data[0]->photo_psicofisico ) }}" width="145">
                                    </a>
                                </div>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                Driver Skills: *
                            </label>
                            <div class="col-sm-9">
                                <input type="text" name="driver_skills" value="{{ $data[0]->driver_skills }}" required class="form-control" id="driver_skills">
                                @error('driver_skills')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>


            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Login Drivers - Form</h4>
                <div class="col-xl-9">
                    <div class="row mb-3">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                            Username : *
                        </label>
                        <div class="col-sm-9">
                            <input type="text" value="{{ $data[0]->username }}" name="username" required class="form-control" id="">
                            @error('username')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                            Password:
                        </label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
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
                </form>
            </div>
        </div>

    </div>


    <script>
        // Time Picker
        $('#timepicker').timepicker({
            icons: {
                up: 'mdi mdi-chevron-up',
                down: 'mdi mdi-chevron-down'
            },
            appendWidgetTo: "#timepicker-input-group1"
        });
    </script>

    @endsection