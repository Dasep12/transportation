@extends('layouts.master')

@section('title') Cost Per Services @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Cost Per Services @endslot
@slot('title') Details @endslot
@endcomponent
<?php
// echo $data[0]->customer_name;
// dd($data);

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
                <h4 class="card-title mb-4">Cost Per Services - List</h4>
                <a href="/costperservice" class="mt-2  mb-4 btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="font-size-18" for="">Cliente</label> :
                        <span class="font-size-17">{{ ucwords(strtolower($data[0]->customer_name))  }}</span>
                    </div>
                    <div class="col-lg-4">
                        <label class="font-size-18" for="">Ruta</label> :
                        <span class="font-size-17">{{ ucwords(strtolower($data[0]->route_name))  }}</span>
                    </div>
                    <div class="col-lg-4">
                        <label class="font-size-18" for="">Chofer</label> :
                        <span class="font-size-17">{{ ucwords(strtolower($data[0]->first_name . ' ' . $data[0]->last_name ))  }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="font-size-18" for="">Carro</label> :
                        <span class="font-size-17">{{ ucwords(strtolower($data[0]->car_name))  }}</span>
                    </div>
                    <div class="col-lg-4">
                        <label class="font-size-18" for="">Fecha inicio</label> :
                        <span class="font-size-17">{{ $data[0]->departure_date }}</span>
                    </div>
                    <div class="col-lg-4">
                        <label class="font-size-18" for="">Fecha Final</label> :
                        <span class="font-size-17">{{ $data[0]->returning_date }}</span>
                    </div>
                </div>
                <div class="row">
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Presupuestado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Num.Dias</td>
                                <td>{{ $data[0]->no_of_days }}</td>
                            </tr>
                            <tr>
                                <td>KM. por Recorrer</td>
                                <td>{{ $data[0]->total_travel_kms }} KM</td>
                            </tr>
                            <tr>
                                <td>Litros</td>
                                <td>{{ $data[0]->total_liter_consume }} LTS</td>
                            </tr>
                            <tr>
                                <td>Renata de Unidad</td>
                                <?php $ren =  $data[0]->cost_per_days * $data[0]->no_of_days; ?>
                                <td>$ {{ number_format( $ren,2) }}</td>

                            </tr>
                            <tr>
                                <td>Costo Combustible</td>
                                <?php $costo = $data[0]->total_fuel_expense; ?>
                                <td>$ {{ number_format($costo,2) }}</td>
                            </tr>
                            <tr>
                                <td>Casetas</td>

                                <?php $casetas = $data[0]->total_casetas; ?>
                                <td>$ {{ number_format($casetas,2) }}</td>
                            </tr>
                            <tr>

                                <td>Anticipo Honorarios</td>
                                <?php $honor = $data[0]->driver_fee * $data[0]->no_of_days; ?>
                                <td>$ {{ number_format($honor,2) }}</td>
                            </tr>
                            <tr>
                                <td>Hospedaje</td>

                                <?php $hotel = $data[0]->hotel_fee; ?>
                                <td>$ {{ number_format($hotel ,2) }}</td>
                            </tr>
                            <tr>
                                <td>Lavado del auto</td>

                                <?php $lavado =  $data[0]->car_wash; ?>
                                <td>$ {{ number_format($lavado,2) }}</td>
                            </tr>
                            <tr>
                                <td>Aeropuerto</td>

                                <?php $aero = $data[0]->airport_fee; ?>
                                <td>$ {{ number_format($aero ,2) }}</td>
                            </tr>

                            <tr>
                                <td>Amenities</td>

                                <?php $amenities = $data[0]->amenities; ?>
                                <td>$ {{ number_format($amenities ,2) }}</td>
                            </tr>
                        <tfoot>
                            <tr>
                                <?php
                                $total = $ren +  $costo  +  $casetas + $honor + $hotel + $lavado
                                    + $amenities ?>
                                <th>Total de Gastos</th>
                                <th>$ {{ number_format($total,2) }}</th>
                            </tr>
                        </tfoot>

                        </tbody>

                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>

<script>

</script>
@endsection