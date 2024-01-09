@extends('layouts.master')

@section('title') Airplanes / Bus @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Services @endslot
@slot('title') Airplanes / Bus @endslot
@endcomponent


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Airplanes / Bus - List</h4>
                <a href="airplanes/form_add" class="btn btn-outline-success waves-effect waves-light">
                    <i class="fas fa-folder-plus  font-size-16 align-middle me-2"></i> Add New
                </a>
                <button type="button" class="btn btn-outline-danger waves-effect waves-light">
                    <i class="fas fa-trash    font-size-16 align-middle me-2"></i> Delete
                </button>
                <div class="table-responsive">
                    <table id="datatable" class="table align-middle  table-bordered  mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check font-size-16 align-middle">
                                        <input class="form-check-input" type="checkbox" id="transactionCheck01">
                                        <label class="form-check-label" for="transactionCheck01"></label>
                                    </div>
                                </th>
                                <th class="align-middle">Service Type</th>
                                <th class="align-middle">Passenger Name</th>
                                <th class="align-middle">Airline Name</th>
                                <th class="align-middle">Airline Type</th>
                                <th class="align-middle">Reservation Number</th>
                                <th class="align-middle">Net Price</th>
                                <th class="align-middle">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Autobús</td>
                                <td> PRESELECTIVO NACIONAL RUMBO A LOS JUEGOS PARA PANAMERICANOS SANTIAGO CHILE 2023</td>
                                <td>ADO</td>
                                <td>round</td>
                                <td>010137147565-010137147566</td>
                                <td>1837.00</td>
                                <td>
                                    <a href=""><i class="fas fa-edit"></i></a>
                                    <a href=""><i class="fas fa-eye"></i></a>
                                    <a href=""><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>


@endsection