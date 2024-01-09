@extends('layouts.master')

@section('title') Cost Per Services @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Cost Per Services @endslot
@slot('title') Form Edit @endslot
@endcomponent

<?php

use App\Models\CosModel;
?>
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
                <h4 class="card-title mb-4 mt-2 ml-2">Cost Per Services - Form</h4>
                <a href="/costperservice" class="mt-2  mb-4 btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <form class="needs-validation" method="post" action="/costperservice/updated" novalidate>
                    @csrf
                    <div class="col-xl-12">

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Choose Category Cars : *
                                </label>
                                <div class="col-sm-12">
                                    <select name="category_cars" required class="form-control select2">
                                        <option value=""> -SELECT- </option>
                                        @foreach($categoryCars as $c)
                                        <option {{ $data->category_cars == $c->id ? 'selected' :'' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('fuel_type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Choose Cars : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" hidden name="id" id="id" value="{{ $data->id }}">
                                    <select name="cars_id" id="cars_id" required class="form-control select2">
                                        <option value=""> -SELECT- </option>
                                        @foreach($cars as $c)
                                        <option data-performance_car_liter="{{ $c->rendimiento_por_litro }}" data-costperday="{{ $c->per_day_cost }}" {{ $data->cars_id == $c->id ? 'selected' :'' }} value="{{ $c->id }}">{{ $c->car_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('fuel_type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Route : *
                                </label>
                                <div class="col-sm-12">
                                    <select name="route" id="route" required class="form-control select2">
                                        <option value=""> -SELECT- </option>
                                        @foreach($route as $r)
                                        <option data-casetasfee="{{ $r->booth_expense }}" data-nodriver="{{ $r->no_drivers }}" data-kmstotal="{{ $r->total_kms }}" {{ $data->routes_id == $r->id ? 'selected' :'' }} data-noCasetas="{{ $r->no_booths }}" data-departure="{{ $r->departure }}" data-destination="{{ $r->destination }}" value="{{ $r->id }}">{{ $r->route_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('fuel_type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Departure City : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{ $data->departure_city }}" readonly name="departure_city" required class="form-control" id="departure">
                                    @error('departure')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Destination City : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{ $data->destination_city }}" readonly name="destination_city" required class="form-control" id="destination">
                                    @error('destination')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Departure Date and Time : *
                                </label>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group" id="datepicker2">
                                                <input readonly value="{{ $data->departure_date }}" type="text" required class="form-control" placeholder="yyyy-mm-dd" name="departure_date" data-date-format="yyyy-mm-dd" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true">
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div>
                                            @error('departure_date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group" id="timepicker-input-group1">
                                                <input readonly id="timepicker" name="departure_time" type="text" value="{{ $data->departure_time }}" required class="form-control" data-provide="timepicker">
                                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                                @error('departure_time')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Returning Date and Time : *
                                </label>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group" id="datepicker2">
                                                <input value="{{ $data->returning_date }}" readonly type="text" required class="form-control" placeholder="yyyy-mm-dd" name="returning_date" data-date-format="yyyy-mm-dd" value="{{ old('returning_date')}}" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true">
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                @error('returning_date')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group" id="timepicker-input-group2">
                                                <input value="{{ $data->returning_time }}" readonly id="timepicker_2" type="text" value="{{ old('returning_time')}}" class="form-control" name="returning_time" data-provide="timepicker">
                                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                                @error('returning_time')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    No of Days : *
                                </label>
                                <div class="col-sm-12">
                                    <input value="{{ $data->no_of_days }}" autocomplete="off" type="text" name="no_of_days" required class="form-control number-decimal" id="no_of_days">
                                    @error('no_of_days')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                        </div>



                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Cost Per Day : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{ $data->cost_per_days }}" readonly autocomplete="off" name="cost_per_days" required class="form-control" id="cost_per_days">
                                    @error('cost_per_days')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    KMS To Travel: *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{ $data->kms_total }}" readonly name="kms_total" required class="form-control" id="kms_total">
                                    @error('kms_total')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Extra Kilometres: *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" autocomplete="off" value="{{ $data->extra_kilometres }}" name="extra_kilometres" required class="form-control" id="extra_kilometres">
                                    @error('extra_kilometres')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Total Travel KMS : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{ $data->total_travel_kms }}" readonly name=" total_travel_kms" required class="form-control" id="total_travel_kms">
                                    @error('total_travel_kms')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Car Performance per liter : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{ $data->car_performance_liter }}" readonly name="car_performance_liter" required class="form-control" id="car_performance_liter">
                                    @error('car_performance_liter')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Total Liter To Consume : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{ $data->total_liter_consume }}" readonly name="total_liter_consume" required class="form-control" id="total_liter_consume">
                                    @error('total_liter_consume')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Cost Per Liter : *
                                </label>
                                <div class="col-sm-12">
                                    <input autocomplete="off" type="text" value="{{ $data->cost_per_liter }}" name="cost_per_liter" required class="form-control number-decimal" id="cost_per_liter">
                                    @error('cost_per_liter')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Total Fuel Expense : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" autocomplete="off" readonly value="{{ $data->total_fuel_expense }}" name="total_fuel_expense" required class="form-control" id="total_fuel_expense">
                                    @error('total_fuel_expense')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Total Booth Expense : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{ $data->booth_expense }}" name="booth_expense" required class="form-control" id="booth_expense">
                                    @error('booth_expense')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    No Driver : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{ $data->no_drivers }}" readonly name="no_drivers" required class="form-control" id="no_drivers">
                                    @error('no_drivers')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    First Drivers Name : *
                                </label>
                                <div class="col-sm-12">
                                    <select name="driver_name" class="form-control select2" id="driver_name">
                                        <option value="">Select Driver</option>
                                        @foreach($driver as $d)
                                        <option {{ $d->id == $data->driver_name ? 'selected' : '' }} data-driver_fee="{{ $d->fee_per_day }}" value="{{ $d->id }}">{{ $d->first_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('cost_per_days')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="text" hidden name="fee_first_driver" value="{{ $data->fee_first_driver }}" id="first_fee_driver">
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Second Drivers Name : *
                                </label>
                                <div class="col-sm-12">
                                    <select name="driver_name_second" class="form-control select2" id="driver_name_second">
                                        <option value="">Select Driver</option>
                                        @foreach($driver as $d)
                                        <option {{ $d->id == $data->second_drivers ? 'selected' : '' }} data-driver_fee="{{ $d->fee_per_day }}" value="{{ $d->id }}">{{ $d->first_name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" hidden name="fee_seconds_drivers" value="{{ $data->fee_seconds_drivers }}" id="second_fee_driver">
                                    @error('cost_per_days')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Drivers Fee : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{ $data->driver_fee }}" readonly name="driver_fee" required class="form-control" id="driver_fee">
                                    @error('driver_fee')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Total Drivers Fee : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{ $data->total_fee_drivers }}" name="total_fee_drivers" required class="form-control" readonly id="total_fee_drivers">
                                    @error('total_fee_drivers')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Total Casetas Fee : *
                                </label>
                                <div class="col-sm-12">
                                    <input value="{{ $data->total_casetas }}" type="text" name="total_casetas" class="form-control" readonly id="total_casetas">
                                    @error('total_casetas')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Airport Fee : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{ $data->airport_fee }}" name="airport_fee" required class="form-control" id="airport_fee">
                                    @error('airport_fee')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Hotel Driver Expense : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{ $data->hotel_fee }}" name="hotel_fee" required class="form-control" id="hotel_fee">
                                    @error('hotel_fee')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Car Wash : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{ $data->car_wash }}" name="car_wash" required class="form-control" id="car_wash">
                                    @error('car_wash')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Amenities : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{ $data->amenities }}" name="amenities" required class="form-control" id="amenities">
                                    @error('amenities')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Total Cost : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{ $data->total_cost }}" readonly name="total_cost" required class="form-control" id="total_cost">
                                    @error('total_cost')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Utility : *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{ $data->utility }}" name="utility" required class="form-control" id="utility">
                                    @error('utility')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Sugested Price: *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" readonly value="{{ $data->sugested_price }}" name="sugested_price" required class="form-control" id="sugested_price">
                                    @error('sugested_price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                    Customer Name: *
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{ $data->customer_name }}" name="customer_name" required class="form-control" id="customer_name">
                                    @error('customer_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
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
<script>
    var kms_total = document.getElementById('kms_total');
    var extra_kms = document.getElementById('extra_kilometres');
    var total_travel_kms = document.getElementById("total_travel_kms");
    var car_performance_liter = document.getElementById("car_performance_liter");
    var total_cost = document.getElementById("total_cost");
    var utility = document.getElementById("utility");
    var sugested_price = document.getElementById("sugested_price");
    var cost_per_liter = document.getElementById("cost_per_liter");
    var total_liter_consume = document.getElementById("total_liter_consume");
    // a
    var cost_per_days = document.getElementById("cost_per_days");
    var no_of_days = document.getElementById("no_of_days");
    // b
    var total_fuel_expense = document.getElementById("total_fuel_expense");
    var booth_expense = document.getElementById("booth_expense");
    var total_casetas = document.getElementById("total_casetas");
    var total_fee_drivers = document.getElementById("total_fee_drivers");
    // c
    var hotel_fee = document.getElementById("hotel_fee");
    var car_wash = document.getElementById("car_wash");
    var amenities = document.getElementById("amenities");
    var airport_fee = document.getElementById("airport_fee");

    function getListCars(id) {
        $.ajax({
            url: "/costperservice/getListCars",
            method: "POST",
            data: {
                'id': id,
                "_token": "{{ csrf_token() }}",
            },
            success: function(e) {
                let result = e;
                // console.log(result);
                $("#cars_id").empty().select2();
                $('#cars_id').append($('<option >', {
                    value: "",
                    text: '- SELECT CARS -',
                })).select2();
                let idExist = "{{ $data->cars_id }}";
                for (let i = 0; i < result.length; i++) {
                    $('#cars_id').append(`<option ${ idExist == result[i].id ? 'selected' : '' } data-performance_car_liter="${ result[i].rendimiento_por_litro }" data-costperday="${ result[i].per_day_cost }" value="${result[i].id}">${ result[i].car_name }</option>`).select2();
                }
            }
        })
    }
    getListCars("{{ $data->category_cars }}")

    $('select[name=category_cars').on('change', function() {
        var id = $("select[name=category_cars] option:selected").val();
        getListCars(id)
    });



    extra_kms.addEventListener('change', () => {
        $("#total_travel_kms").val(parseInt(kms_total.value) + parseInt(extra_kms.value));

        let total_liter_consume = parseInt(total_travel_kms.value) / parseInt(car_performance_liter.value)
        $("#total_liter_consume").val(total_liter_consume.toFixed(2))

        $("#total_fuel_expense").val(parseFloat(total_liter_consume).toFixed(2) * parseFloat(cost_per_liter.value).toFixed(2));



        var a = parseInt(cost_per_days.value) * parseInt(no_of_days.value);
        var b = parseInt(total_fuel_expense.value) + parseInt(total_casetas.value) + parseInt(total_fee_drivers.value);
        var c = parseInt(car_wash.value) + parseInt(hotel_fee.value) + parseInt(amenities.value) + parseInt(airport_fee.value)
        let totals = parseInt(a) + parseInt(b) + parseInt(c);
        total_cost.value = totals;


        let util = parseInt(utility.value) / 100;
        let sp = total_cost.value / (1 - util);
        sugested_price.value = sp;
    });

    $('select[name=route').on('change', function() {
        var id = $("select[name=route] option:selected").val();
        var destination = $("select[name=route] option:selected").attr('data-destination')
        var departure = $("select[name=route] option:selected").attr('data-departure')
        var kmstotal = $("select[name=route] option:selected").attr('data-kmstotal')
        var nodriver = $("select[name=route] option:selected").attr('data-nodriver')
        var casetas = $("select[name=route] option:selected").attr('data-casetasfee')
        $("#total_casetas").val(casetas);
        $("#destination").val(destination);
        $("#departure").val(departure);
        $("#kms_total").val(kmstotal);
        $("#no_drivers").val(nodriver);

        let total_liter_consume = parseInt(total_travel_kms.value) / parseInt(car_performance_liter.value)
        $("#total_liter_consume").val(total_liter_consume.toFixed(2))
    });

    $('select[name=cars_id').on('change', function() {
        var cost = $("select[name=cars_id] option:selected").attr('data-costperday')
        var performance_car_liter = $("select[name=cars_id] option:selected").attr('data-performance_car_liter')
        $("#cost_per_days").val(cost);
        $("#car_performance_liter").val(performance_car_liter);


        let total_liter_consume = parseInt(total_travel_kms.value) / parseInt(car_performance_liter.value)
        $("#total_liter_consume").val(total_liter_consume.toFixed(2))
    });




    // $('select[name=driver_name').on('change', function() {
    //     var driver_fee = $("select[name=driver_name] option:selected").attr('data-driver_fee')
    //     $("#driver_fee").val(driver_fee);

    //     var total_fee_drivers = parseInt(driver_fee) * parseInt(no_of_days.value);
    //     $("#total_fee_drivers").val(total_fee_drivers);

    // });
    $('select[name=driver_name').on('change', function() {
        var driver_fee = $("select[name=driver_name] option:selected").attr('data-driver_fee')
        var second_fee_driver = $("#second_fee_driver").val();
        $("#first_fee_driver").val(parseFloat(driver_fee))
        $("#driver_fee").val(parseFloat(driver_fee) + parseFloat(second_fee_driver));

        $("#total_fee_drivers").val(parseFloat($("#driver_fee").val()) * parseFloat($("#no_of_days").val()))

    });

    $('select[name=driver_name_second').on('change', function() {
        var second_driver_fee = $("select[name=driver_name_second] option:selected").attr('data-driver_fee');
        var second_fee_driver = $("#first_fee_driver").val();
        $("#second_fee_driver").val(parseInt(second_driver_fee))
        $("#driver_fee").val(parseFloat(second_driver_fee) + parseFloat(second_fee_driver));

        $("#total_fee_drivers").val(parseFloat($("#driver_fee").val()) * parseFloat($("#no_of_days").val()))
    });

    no_of_days.addEventListener('change', () => {
        var driver_fee = $("select[name=driver_name] option:selected").attr('data-driver_fee')
        $("#driver_fee").val(driver_fee);

        var total_fee_drivers = parseFloat(driver_fee) * parseFloat(no_of_days.value);
        $("#total_fee_drivers").val(total_fee_drivers);


        var a = parseFloat(cost_per_days.value) * parseFloat(no_of_days.value);
        console.log(a)
        var b = parseFloat(total_fuel_expense.value) + parseFloat(total_casetas.value) + parseFloat(total_fee_drivers);
        var c = parseFloat(car_wash.value) + parseFloat(hotel_fee.value) + parseFloat(amenities.value) + parseFloat(airport_fee.value)
        let totals = parseFloat(a) + parseFloat(b) + parseFloat(c);
        total_cost.value = totals;


        let util = parseFloat(utility.value) / 100;
        let sp = total_cost.value / (1 - util);
        sugested_price.value = sp;

    });


    hotel_fee.addEventListener('change', () => {
        var a = parseFloat(cost_per_days.value) * parseFloat(no_of_days.value);
        var b = parseFloat(total_fuel_expense.value) + parseFloat(total_casetas.value) + parseFloat(total_fee_drivers.value);
        var c = parseFloat(car_wash.value) + parseFloat(hotel_fee.value) + parseFloat(amenities.value) + parseFloat(airport_fee.value)
        let totals = parseFloat(a) + parseFloat(b) + parseFloat(c);
        total_cost.value = totals;
    });
    car_wash.addEventListener('change', () => {
        var a = parseFloat(cost_per_days.value) * parseFloat(no_of_days.value);
        var b = parseFloat(total_fuel_expense.value) + parseFloat(total_casetas.value) + parseFloat(total_fee_drivers.value);
        var c = parseFloat(car_wash.value) + parseFloat(hotel_fee.value) + parseFloat(amenities.value) + parseFloat(airport_fee.value)
        let totals = parseFloat(a) + parseFloat(b) + parseFloat(c);
        total_cost.value = totals;
    });
    amenities.addEventListener('change', () => {
        var a = parseFloat(cost_per_days.value) * parseFloat(no_of_days.value);
        var b = parseFloat(total_fuel_expense.value) + parseFloat(total_casetas.value) + parseFloat(total_fee_drivers.value);
        var c = parseFloat(car_wash.value) + parseFloat(hotel_fee.value) + parseFloat(amenities.value) + parseFloat(airport_fee.value)
        let totals = parseFloat(a) + parseFloat(b) + parseFloat(c);
        total_cost.value = totals;
    });
    airport_fee.addEventListener('change', () => {
        var a = parseFloat(cost_per_days.value) * parseFloat(no_of_days.value);
        var b = parseFloat(total_fuel_expense.value) + parseFloat(total_casetas.value) + parseFloat(total_fee_drivers.value);
        var c = parseFloat(car_wash.value) + parseFloat(hotel_fee.value) + parseFloat(amenities.value) + parseFloat(airport_fee.value)
        let totals = parseFloat(a) + parseFloat(b) + parseFloat(c);
        total_cost.value = totals;
    });


    utility.addEventListener('change', () => {
        util = parseFloat(utility.value) / 100;
        let sp = total_cost.value / (1 - util);
        sugested_price.value = sp;
        console.log(util);
        console.log(sp);
    })

    cost_per_liter.addEventListener('change', () => {
        let fuel_expense = parseFloat(cost_per_liter.value) * parseFloat(total_liter_consume.value);
        $("#total_fuel_expense").val(fuel_expense.toFixed(3))
    })
</script>
@endsection