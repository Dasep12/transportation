@extends('layouts.master')

@section('title') Route Travel @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Route Travel @endslot
@slot('title') Form Add @endslot
@endcomponent


<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <form class="needs-validation" enctype="multipart/form-data" method="post" action="/routes_travel/added" novalidate>
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
                    <h4 class="card-title mb-4 mt-2 ml-2">Route Travel - Form</h4>
                    <a href="/routes_travel" class="btn btn-outline-success btn-sm">
                        <i class="fas fa-backward "></i> back</a>
                    <div class="col-xl-12">
                        @csrf
                        <div class="row mb-3">

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">ID: * </label>
                                    <div class="col-sm-12">
                                        <input type="text" value="{{  old('id_routes') }}" name="id_routes" required class="form-control" id="validationTooltip01">
                                        @error('id_routes')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Nombre De La Ruta : *
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" value="{{  old('route_name') }}" name="route_name" required class="form-control" id="validationTooltip01">
                                        @error('route_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Origen : *
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" value="{{  old('departure') }}" required name="departure" class="form-control" id="validationTooltip01">
                                        @error('departure')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Destino :
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" value="{{  old('destination') }}" name="destination" required class="form-control" id="validationTooltip01">
                                        @error('destination')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row mb-3">

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Tipo Deviaje : *
                                    </label>
                                    <div class="col-sm-12">
                                        <select class="form-control select2" required name="travel_type" id="travel_type">
                                            <option value="Redondo">Redondo</option>
                                            <option value="Sencillo">Sencillo</option>
                                        </select>
                                        @error('travel_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        KM Reccorer : *
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" value="{{  old('total_kms') }}" name="total_kms" required class="form-control" id="validationTooltip01">
                                        @error('total_kms')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Litros Gastados : *
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" value="{{  old('liters_consumed') }}" name="liters_consumed" required class="form-control" id="validationTooltip01">
                                        @error('liters_consumed')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Fuel Expense : *
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" value="{{  old('fuel_expense') }}" name="fuel_expense" required class="form-control" id="validationTooltip01">
                                        @error('fuel_expense')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row mb-3">

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Rendimiento : *
                                    </label>
                                    <div class="col-sm-12 ">
                                        <input type="text" value="{{  old('yield') }}" name="yield" required class="form-control" id="validationTooltip01">
                                        @error('yield')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Tiempo De Reccoried : *
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" value="{{  old('travel_time') }}" name="travel_time" required class="form-control number-decimal" id="validationTooltip01">
                                        @error('travel_time')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        No Condoctures : *
                                    </label>
                                    <div class="col-sm-12">
                                        <input name="no_drivers" value="{{  old('no_drivers') }}" type="number" required class="form-control" id="validationTooltip01">
                                        @error('no_drivers')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Category Cars : *
                                    </label>
                                    <div class="col-sm-12">
                                        <select name="category_cars" required class="form-control select2">
                                            <option value=""> -SELECT- </option>
                                            @foreach($categoryCars as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
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
                            </div>

                        </div>


                        <div class="row mb-3">


                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-password-input" class="col-sm-12 col-form-label">Unidad : </label>
                                    <div class="col-sm-12">
                                        <select name="car_name" id="cars_id" required class="form-control select2">
                                            <option value=""> -SELECT- </option>
                                        </select>
                                        @error('car_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <!-- <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Type Route : *
                                    </label>
                                    <div class="col-sm-12">
                                        <select name="type_route" required class="form-control select2">
                                            <option value=""> -Select- </option>
                                            <option value="2">2 Destination </option>
                                            <option value="3"> >= 3 Destination</option>
                                        </select>
                                    </div>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">Casetas : * </label>
                                    <div class="col-sm-12">
                                        <select name="casetas_id[]" class=" form-control select2 select2-multiple" multiple="multiple" id="casetas_id">
                                            @foreach($listCasetas as $r)
                                            <option data-price="{{ $r->costo_casetas }}" value="{{ $r->id }}">{{ $r->caseta_name . ' (' . $r->categ_cars  .')- $ ' . $r->costo_casetas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        No Casetas : *
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" value="{{  old('no_booths') }}" name="no_booths" required class="form-control" id="no_booths">
                                        @error('no_booths')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="horizontal-email-input" class="col-sm-12 col-form-label">
                                        Gasto Casetas : *
                                    </label>
                                    <div class="col-sm-12">
                                        <input readonly type="text" value="{{  old('booth_expense') }}" name="booth_expense" required class="form-control" id="gasto_casetas">
                                        @error('booth_expense')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
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
    $('select[name=category_cars').on('change', function() {
        var id = $("select[name=category_cars] option:selected").val();
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

                for (let i = 0; i < result.length; i++) {
                    $('#cars_id').append(`<option data-performance_car_liter="${ result[i].rendimiento_por_litro }" data-costperday="${ result[i].per_day_cost }" value="${result[i].id}">${ result[i].car_name }</option>`).select2();
                }
            }
        })

        getListCasetas(id)
    });


    function getListCasetas(cars_id) {
        $.ajax({
            url: "/routes_travel/getListCasetas",
            method: "POST",
            data: {
                'categ_id': cars_id,
                "_token": "{{ csrf_token() }}",
            },
            success: function(e) {
                let result = e;
                $("#casetas_id").empty().select2();
                $('#casetas_id').append($('<option >', {
                    value: "",
                    text: '- SELECT CASETAS -',
                })).select2();

                for (let i = 0; i < result.length; i++) {
                    $('#casetas_id').append(`<option data-price="${ result[i].costo_casetas }" value="${ result[i].id }"> ${ result[i].caseta_name } ( ${ result[i].categ_cars} ) - $ ${ result[i].costo_casetas }</option>`).select2();
                }
            }
        })
    }

    $("#casetas_id").on("select2:select select2:unselect", function(e) {

        //this returns all the selected item
        var items = $(this).val();

        //Gets the last selected item
        var lastSelectedItem = e.params.data.element;
        // var lastSelectedItem = e.params.data;



        var price = $(this).find(':selected');
        if (price.length > 0) {
            let dataPrice = [];
            dataPrice.shift();
            $.each(price, function() {
                dataPrice.push($(this).data('price'))
            });

            let SumPriceCasetas = dataPrice.reduce((acc, curr) => acc + curr)
            $("#gasto_casetas").val(SumPriceCasetas * 2)
            $("#no_booths").val(dataPrice.length)
        } else {
            $("#gasto_casetas").val(0)
            $("#no_booths").val(0)
        }
    })

    $('select[name=type_route]').on('change', function() {
        var id = $("select[name=type_route] option:selected").val();
        if (id == 3) {
            $("#casetas_id2").removeAttr('disabled');
        } else {
            $("#casetas_id2").val('');
            $("#casetas_id2").attr('disabled', true);
        }
    })
</script>
@endsection