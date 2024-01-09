@extends('layouts.layouts_drivers.master')

@section('title') Services @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Transaportation @endslot
@slot('title') Orden de Servicio @endslot
@endcomponent
<style>
    fieldset.scheduler-border {
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow: 0px 0px 0px 0px #000;
        box-shadow: 0px 0px 0px 0px #000;
    }

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        width: inherit;
        padding: 0 10px;
        border-bottom: none;
    }
</style>
<div class="row">
    <div class="col-lg-12">
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
        <!-- <div class="card">
            <div class="card-body">
                <div class="field_wrapper">
                    <div class="">
                        <input type="text" name="field_name[]" id="">
                        <a class="add_button"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div> -->


        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Orden de Servicio - Form</h4>
                <a href="/drivers/services" class="btn btn-outline-success btn-sm mb-5">
                    <i class="fas fa-backward "></i> back</a>
                <form class="needs-validation" method="post" novalidate enctype="multipart/form-data" action="/drivers/services/adedd">
                    @csrf
                    <input type="text" hidden name="service_id" value="{{ $servid }}" id="service_id">

                    <div class="">
                        <ul class="verti-timeline list-unstyled">

                            <li class="event-list">
                                <div class="event-timeline-dot">
                                    <i class="bx bx-right-arrow-circle"></i>
                                </div>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="bx bx-copy-alt h2 text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="needs-validation" novalidate>
                                            <h5>Inicio de Servicio</h5>
                                            <div class="row mb-3">
                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Odometro Inicial : * </label>
                                                <div class="col-sm-3">
                                                    <input type="text" required name="init_odometer" value="{{ $initial_service != null ? "$initial_service->init_odometer" : '' }}" class="form-control number-decimal" id="init_odometer">
                                                </div>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Tanque al Iniciar : * </label>
                                                <div class="col-sm-3">
                                                    <div class="form-check form-check-success mb-3">
                                                        <input @if(!empty($initial_service)) {{ $initial_service->others_fuel == 'no' ?   'checked' : ''  }} @endif class="checkbox form-check-input" type="checkbox" id="">
                                                        <label class="form-check-label" for="">
                                                            Tanque Lleno
                                                        </label>
                                                        <input readonly class="form-control" @if(!empty($initial_service)) {{ $initial_service->others_fuel == 'no' ?   'name="initial_fuel_tank" ' : ''  }} @endif placeholder="fuel tank" value="{{ $fuel_tank }}" type="text" id="fuel_1">
                                                    </div>
                                                    <div class="form-check form-check-success mb-3">
                                                        <input @if(!empty($initial_service)) {{ $initial_service->others_fuel == 'yes' ?   'checked' : ''  }} @endif placeholder="fuelCheck" value="1" class="form-check-input checkbox" type="checkbox" id="fuelCheck">
                                                        <label class="form-check-label" for="fuelCheck">
                                                            Otro :
                                                        </label>
                                                        <input type="text" placeholder="type_fuel" name="type_fuel" hidden @if(!empty($initial_service)) value='{{ $initial_service->others_fuel }}' @endif id="type_fuel">
                                                        <input name="" type="text" placeholder="fuel others" @if(!empty($initial_service) && $initial_service->others_fuel == 'yes') name='initial_fuel_tank' value='{{ $initial_service->initial_fuel_tank }}' @endif class="form-control number-decimal" id="fuel_2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Evidencia : * </label>
                                                <div class="col-sm-3">
                                                    <input type="file" name="evidencia" class="form-control" id="validationTooltip01">
                                                </div>
                                                <div class="mt-2 col-sm-3">
                                                    @if(!empty($initial_service))
                                                    <a class="image-popup-vertical-fit" href="{{ asset('public/admin/img/services/'. $initial_service->evidencia) }}" title="">
                                                        <img class="img-fluid" alt="" src="{{ asset('public/admin/img/services/'. $initial_service->evidencia) }}" width="40">
                                                    </a>
                                                    @endif

                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="event-list">
                                <div class="event-timeline-dot">
                                    <i class="bx bx-right-arrow-circle"></i>
                                </div>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="bx bx-package h2 text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="form_section_fuel_recharge">
                                            <div class="">
                                                <h5>Recarga de Combustible Intermedia <a style="cursor: pointer;"> <i class="fas fa-plus add_fuel_recharge text-primary"></i></a></h5>
                                                <?php
                                                if (count($service_intermediate) > 0) { ?>
                                                    @foreach($service_intermediate as $si)
                                                    <div>
                                                        <div class="row mb-3">
                                                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Odometro al cargar : * </label>
                                                            <div class="col-sm-3">
                                                                <input value="{{ $si->id }}" type="text" hidden name="idIntermediate[]" id="id">
                                                                <input value="{{ $si->odometer_time_charge }}" type="text" name="odometer_time_charge[]" class="form-control number-decimal" id="validationTooltip01">
                                                            </div>
                                                            <div class="valid-tooltip">
                                                                Looks good!
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Litros Cargados : * </label>
                                                            <div class="col-sm-3">
                                                                <input value="{{ $si->amount_liters_charged }}" type="text" name="amount_liters_charged[]" class="form-control number-decimal" id="validationTooltip01">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Costo Total : * </label>
                                                            <div class="col-sm-3">
                                                                <input value="{{ $si->cost_charged_fuel }}" type="text" name="cost_charged_fuel[]" class="form-control number-decimal" id="validationTooltip01">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Foto Evidencia : * </label>
                                                            <div class="col-sm-3">
                                                                <input type="file" name="photo_evidence[]" class="form-control" id="validationTooltip01">
                                                            </div>
                                                            <a class="image-popup-vertical-fit" href="{{ asset('public/admin/img/services/'. $si->photo_evidence) }}" title="">
                                                                <img class="img-fluid" alt="" src="{{ asset('public/admin/img/services/'. $si->photo_evidence) }}" width="40">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    @endforeach
                                                <?php }  ?>
                                                <div id="field_section_fuel_recharge">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="event-list">
                                <div class="event-timeline-dot">
                                    <i class="bx bx-right-arrow-circle "></i>
                                </div>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="bx bx-car h2 text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5>Llegada a Destino</h5>
                                        <div class="field_section_destination" id="field_section_destination">
                                            <div class="row mb-3">
                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Odometro en Destino: * </label>
                                                <div class="col-sm-3">
                                                    <input type="text" hidden value="@if(!empty($service_destination)) {{ $service_destination->id }} @endif" name="idDestination" id="">
                                                    <input @if(!empty($service_destination)) value='{{ $service_destination->odometer_at_destination }}' @endif type="text" name="odometer_at_destination" class="form-control number-decimal" id="validationTooltip01">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Nivel de Combustible al Llegar : * </label>
                                                <div class="col-sm-3">
                                                    <input @if(!empty($service_destination)) value='{{ $service_destination->fuel_tank_at_destination }}' @endif type="text" name="fuel_tank_at_destination" class="form-control number-decimal" id="validationTooltip01">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Foto Evidencia : * </label>
                                                <div class="col-sm-3">
                                                    <input type="file" name="photo_destination" class="form-control " id="validationTooltip01">
                                                </div>
                                                @if(!empty($service_destination))
                                                <a class="image-popup-vertical-fit" href="{{ asset('public/admin/img/services/'. $service_destination->photo_destination) }}" title="">
                                                    <img class="img-fluid" alt="" src="{{ asset('public/admin/img/services/'. $service_destination->photo_destination) }}" width="40">
                                                </a>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="event-list">
                                <div class="event-timeline-dot">
                                    <i class="bx bx-right-arrow-circle"></i>
                                </div>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="bx bx-package  h2 text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="">
                                            <h5>Recarga de Combustible al Regreso <a style="cursor: pointer;" class="add_fuel_recharge_return_1"><i class="fas fa-plus"></i></a></h5>
                                            <?php
                                            if (count($returning_destination) > 0) { ?>
                                                @foreach($returning_destination as $rd)
                                                <div>
                                                    <div class="row mb-3">
                                                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Odometro al cargar : * </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" value="{{ $rd->id }}" hidden name="idreturning1[]">
                                                            <input value="{{ $rd->return_odometer_time_charge }}" type="text" name="return_odometer_time_charge[]" class="form-control number-decimal" id="validationTooltip01">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Litros Cargados : * </label>
                                                        <div class="col-sm-3">
                                                            <input value="{{ $rd->return_amount_liters_charged }}" type="text" name="return_amount_liters_charged[]" class="form-control number-decimal" id="validationTooltip01">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Costo Total de Combustible : * </label>
                                                        <div class="col-sm-3">
                                                            <input value="{{ $rd->return_cost_charged_fuel }}" type="text" name="return_cost_charged_fuel[]" class="form-control number-decimal" id="validationTooltip01">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Foto Evidencia : * </label>
                                                        <div class="col-sm-3">
                                                            <input type="file" name="return_photo_evidence[]" class="form-control" id="validationTooltip01">
                                                        </div>
                                                        <a class="image-popup-vertical-fit" href="{{ asset('public/admin/img/services/'. $rd->return_photo_evidence) }}" title="">
                                                            <img class="img-fluid" alt="" src="{{ asset('public/admin/img/services/'. $rd->return_photo_evidence) }}" width="40">
                                                        </a>
                                                    </div>
                                                </div>
                                                <hr>
                                                @endforeach
                                            <?php } ?>
                                            <div class="field_recharge_return_1" id="field_recharge_return_1">

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </li>

                            <li class="event-list">
                                <div class="event-timeline-dot">
                                    <i class="bx bx-right-arrow-circle"></i>
                                </div>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="bx bx-badge-check h2 text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5>Fin de Servicio...Al fin en Casa...</h5>
                                        <div id="section_return_to_home" class="section_return_to_home">
                                            <div class="row mb-3">
                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Odometro en Encierro: * </label>
                                                <input hidden type="text" @if(!empty($home_service)) value='{{ $home_service->id }}' @endif name="id_home">
                                                <div class="col-sm-3">
                                                    <input type="text" @if(!empty($home_service)) value='{{ $home_service->home_odometer_arrival}}' @endif name="home_odometer_arrival" class="form-control number-decimal" id="validationTooltip01">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Nivel de Combustible en Encierro: * </label>
                                                <div class="col-sm-3">
                                                    <input @if(!empty($home_service)) value='{{$home_service->home_fuel_level_arrival}}' @endif type="text" name="home_fuel_level_arrival" class="form-control number-decimal" id="validationTooltip01">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Litros Cargados para llenar el tanque:* </label>
                                                <div class="col-sm-3">
                                                    <input @if(!empty($home_service)) value='{{$home_service->home_charge_fill_tank}}' @endif type="text" name="home_charge_fill_tank" class="form-control number-decimal" id="validationTooltip01">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Costo Total de Recarga : * </label>
                                                <div class="col-sm-3">
                                                    <input @if(!empty($home_service)) value='{{ $home_service->home_cost_fuel_fill_tank }}' @endif type="text" name="home_cost_fuel_fill_tank" class="form-control number-decimal" id="validationTooltip01">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Foto Evidencia : * </label>
                                                <div class="col-sm-3">
                                                    <input type="file" name="home_photo_evidence" class="form-control" id="validationTooltip01">
                                                </div>
                                                @if(!empty($home_service))
                                                <a class="image-popup-vertical-fit" href="{{ asset('public/admin/img/services/'. $home_service->home_photo_evidence) }}" title="">
                                                    <img class="img-fluid" alt="" src="{{ asset('public/admin/img/services/'. $home_service->home_photo_evidence) }}" width="40">
                                                </a>
                                                @endif


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
            </div>
        </div>


    </div>

    <div class="col-xl-3 col-lg-4 col-sm-6 mb-2">
        <div class="p-3">
            <button type="submit" class="btn btn-primary waves-effect waves-light" id="sa-params">Guardar</button>
        </div>
    </div>
    </form>


</div>


<script>
    $(' #fuel_2').on('change', function() {
        var max = "{{ $fuel_tank }}";
        if (parseFloat(this.value) > parseFloat(max)) {
            alert("Max Capacity Just : " + max);
            $("#fuel_2").val(max);
        }
    })

    $('.sa-params').click(function() {
        Swal.fire({
            // title: 'Next Input ! ',
            text: "You want input Fuel Recharge Intermediate ?",
            // icon: 'success',
            showCancelButton: true,
            confirmButtonText: 'Yes !',
            cancelButtonText: 'No, next section destination!',
            confirmButtonClass: 'btn btn-success mt-2',
            cancelButtonClass: 'btn btn-danger ms-2 mt-2',
            buttonsStyling: false,
        }).then(function(result) {
            if (result.value) {
                document.getElementById("field_section_fuel_recharge").style.display = "block";
                document.getElementById("field_section_destination").style.display = "none";
                document.querySelectorAll('.button_section_fuel_recharge').forEach(function(el) {
                    el.style.display = 'block';
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                document.getElementById("field_section_fuel_recharge").style.display = "none";
                document.getElementById("field_section_destination").style.display = "block";
                document.querySelectorAll('.button_section_fuel_recharge').forEach(function(el) {
                    el.style.display = 'none';
                });
            }
        });
    });


    $(".btn_fuel_recharge_return_1").click(function() {
        Swal.fire({
            title: 'Sure Data Complete , Next Input ? ',
            // text: "You want input Fuel Recharge Intermediate ?",
            // icon: 'success',
            showCancelButton: true,
            confirmButtonText: 'Yes !',
            cancelButtonText: 'No',
            confirmButtonClass: 'btn btn-success mt-2',
            cancelButtonClass: 'btn btn-danger ms-2 mt-2',
            buttonsStyling: false,
        }).then(function(result) {
            if (result.value) {
                document.getElementById("section_return_to_home").style.display = "block";
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                document.getElementById("section_return_to_home").style.display = "none";
            }
        });
    })
    $(".fuel_recharge_button").click(function() {
        Swal.fire({
            title: 'Sure Data Complete , Next Input ? ',
            // text: "You want input Fuel Recharge Intermediate ?",
            // icon: 'success',
            showCancelButton: true,
            confirmButtonText: 'Yes !',
            cancelButtonText: 'No',
            confirmButtonClass: 'btn btn-success mt-2',
            cancelButtonClass: 'btn btn-danger ms-2 mt-2',
            buttonsStyling: false,
        }).then(function(result) {
            if (result.value) {
                document.getElementById("field_section_destination").style.display = "block";

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // document.getElementById("field_section_destination").style.display = "block";
            }
        });
    })


    $('.sa-destination').click(function() {
        Swal.fire({
            // title: 'Next Input ! ',
            text: "You want input Fuel Recharge Return ?",
            // icon: 'success',
            showCancelButton: true,
            confirmButtonText: 'Yes !',
            cancelButtonText: 'No, next section returning to home !',
            confirmButtonClass: 'btn btn-success mt-2',
            cancelButtonClass: 'btn btn-danger ms-2 mt-2',
            buttonsStyling: false,
        }).then(function(result) {
            if (result.value) {
                document.getElementById("field_recharge_return_1").style.display = "block";
                document.getElementById("section_return_to_home").style.display = "none";
                document.getElementById("btn_fuel_recharge_return_1").style.display = "block";
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                document.getElementById("field_recharge_return_1").style.display = "none";
                document.getElementById("btn_fuel_recharge_return_1").style.display = "none";
                document.getElementById("section_return_to_home").style.display = "block";
            }
        });
    });



    $('.checkbox').on('change', function() {
        $('.checkbox').not(this).prop('checked', false);

        $('.checkbox:checked').each(function() {
            if (this.value == 1) {
                $("#fuel_2").attr('disabled', false);
                $('#fuel_1').removeAttr('name');
                $('#fuel_2').attr('name', 'initial_fuel_tanks');
                $("#type_fuel").val("yes");
            } else {
                $("#fuel_2").attr('disabled', true);
                $('#fuel_2').removeAttr('name');
                $('#fuel_1').attr('name', 'initial_fuel_tanks');
                $("#type_fuel").val("no");
            }
        });
    });

    $(document).ready(function() {
        var addBtn = $(".add_fuel_recharge");
        var wrapper = $("#field_section_fuel_recharge");
        var fieldHTML = `<div><button type="button" class="btn mt-3 btn-outline-danger remove_button">
                                                                    Delete Item <i class="fas fa-trash "></i>
                                                                </button>
                                                            <div class="row mb-3">
                                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Odometro al momento de cargar: * </label>
                                                                <input value="" hidden type="text" name="idIntermediate[]" id="id">
                                                                <div class="col-sm-3">
                                                                    <input type="text" name="odometer_time_charge[]" class="form-control number-decimal" id="validationTooltip01">
                                                                </div>
                                                                <div class="valid-tooltip">
                                                                    Looks good!
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Litros Cargados : * </label>
                                                                <div class="col-sm-3">
                                                                    <input type="text" name="amount_liters_charged[]" class="form-control number-decimal" id="validationTooltip01">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Costo Total de Combustible : * </label>
                                                                <div class="col-sm-3">
                                                                    <input type="text" name="cost_charged_fuel[] number-decimal" class="form-control" id="validationTooltip01">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Foto Evidencia : * </label>
                                                                <div class="col-sm-3">
                                                                    <input type="file" name="photo_evidence[]" class="form-control" id="validationTooltip01">
                                                                </div>
                                                            </div>
                                                        </div>`;
        var x = 1;
        $(addBtn).click(function() {
            x++;
            $(wrapper).append(fieldHTML);
        })

        $(wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })


        var addBtn2 = $(".add_fuel_recharge_return_1");
        var wrapper2 = $("#field_recharge_return_1");
        var fieldHTML2 = `<div><button type="button" class="remove_button2 btn mt-3 btn-outline-danger">Delete Item <i class="fas fa-trash"></i>
                                                        </button>
                                                    <div class="row mb-3">
                                                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Odometro al momento de Cargar : * </label>
                                                        <div class="col-sm-3">
                                                        <input type="text" hidden name="idreturning1[]">
                                                            <input type="text" name="return_odometer_time_charge[]" class="form-control number-decimal" id="validationTooltip01">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Litros Cargados : * </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="return_amount_liters_charged[]" class="form-control number-decimal" id="validationTooltip01">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Costo Total Combustible Cargado : * </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="return_cost_charged_fuel[]" class="form-control number-decimal" id="validationTooltip01">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Foto Evidencia : * </label>
                                                        <div class="col-sm-3">
                                                            <input type="file" name="return_photo_evidence[]" class="form-control" id="validationTooltip01">
                                                        </div>
                                                    </div></div>
                                                </div>`;
        var y = 1;
        $(addBtn2).click(function() {
            y++;
            $(wrapper2).append(fieldHTML2);
        })

        $(wrapper2).on('click', '.remove_button2', function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            y--;
        })

    })
</script>
@endsection