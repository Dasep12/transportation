@extends('layouts.master')

@section('title') Quotes @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Quotes @endslot
@slot('title') Editar Cotizaciones @endslot
@endcomponent

<?php
// dd($references);
?>
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
<form class="repeater needs-validation" method="post" action="/quotes/updated" enctype="multipart/form-data" novalidate>
    @csrf

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 mt-2 ml-2">Editar Cotizaciones</h4>
                    <a href="/quotes" class="btn btn-outline-success btn-sm"><i class="fas fa-backward "></i> atras</a>
                    <h3 class="mt-2">Cotización No - {{ $data->invoice_number }}</h3>
                    <div class="row">
                        <input type="text" hidden name="id" value="{{ $data->id }}">
                        <input type="text" hidden value="{{ $data->total_amount }}" id="totals" name="totals">
                        <div class="col-lg-6">
                            <label for="customer_name" class="col-sm-3 col-form-label">Cliente : * </label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $data->customer_name }}" name="customer_name" required class="form-control" id="">
                                @error('customer_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="customer_name" class="col-sm-3 col-form-label">Email : * </label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $data->name }}" name="email_address" required class="form-control" id="">
                                @error('email_address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-lg-12 mt-2">
                            <label for="">Mensaje</label>
                            <textarea name="customer_note" class="form-control" id="customer_note">{{ $data->customer_note }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div data-repeater-list="datas">
                        @foreach($items as $it)
                        <div data-repeater-item class="row repeat">
                            <div class="mb-3 col-lg-4">
                                <label for="item_name">Servicio</label>
                                <input type="text" value="{{ $it->item }}" required id="item_name" name="item_name" class="form-control" placeholder="Item Name" />
                            </div>

                            <div class="mb-3 col-lg-3 " style="width:15%!important">
                                <label for="qty">Cantidad</label>
                                <input type="number" value="{{ $it->qty }}" required id="qty" name="qty" class="form-control itemsQty" placeholder="qty" />
                            </div>


                            <div class="mb-3 col-lg-3">
                                <label for="price">Precio</label>
                                <input type="text" value="{{ $it->price }}" id="price" required name="price" class="form-control itemsPrice number-decimal" placeholder="price" />
                            </div>

                            <div class="mb-3 col-lg-2">
                                <label for="message">Iva</label>
                                <select name="tax" required class="form-control itemsTax" id="tax">
                                    <option value="">Select Tax</option>
                                    <option {{ $it->tax == 0 ? 'selected' : '' }} value="0">No</option>
                                    <option {{ $it->tax != 0 ? 'selected' : '' }} value="0.16">Iva(16%)</option>
                                </select>
                            </div>


                            <div class="mb-3 col-lg-12">
                                <label for="description">Descripción</label>
                                <textarea name="description" class="form-control" placeholder="Description (optional)" id="">{{ $it->description }}</textarea>
                            </div>

                            <div class="mb-3 col-lg-4">
                                <label for="HitungTax">Iva</label>
                                <input type="text" id="HitungTax" readonly name="HitungTax" value="{{ number_format($it->total * $it->tax,2) }}" class="form-control HitungTax" placeholder="Tax" />
                            </div>

                            <div class="mb-3 col-lg-4">
                                <label for="total">Total</label>
                                <input type="text" placeholder="total" readonly class="form-control itemsTotal" value="{{ $it->amount }}" name="total" id="total">
                            </div>

                            <div class="col-lg-2 align-self-center d-flex mt-2">
                                <div class="d-grid">
                                    <button type="button" data-repeater-delete class="btn  btn-outline-danger mt-1">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <hr>
                    </div>
                    <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Add Item" />
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <label for="">Servicios Incluidos</label>
                            <textarea name="terms_conditions" class="form-control" id="">Unidad en perfectas condiciones tanto físicas como mecánicas - conductores con pleno conocimiento de las carreteras dentro y fuera del estado - Casetas - Combustible - Seguro de viajero a bordo de la unidad.
                            </textarea>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-6">
                            <label for="">Referencia</label>
                            <select name="reference" required class="form-control select2" id="">
                                <option value="">Seleccionar (solo si aplica)</option>
                                @foreach($references as $key )
                                <option {{ $data->reference == $key->id ? 'selected' : '' }} value="{{ $key->id }}">{{ $key->id .'-'. $key->customer_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6">
                            <label for="">Galería de Fotos de la Unidad</label>
                            <input type="text" name="gallery" value="{{ $data->payment_url }}" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <label for="">Attachment</label>
                            <input type="file" class="form-control" name="file" id="file">
                        </div>
                        <div class="col-sm-5">
                            <div class="mt-4 mt-md-0">
                                <a class="image-popup-vertical-fit" href="{{ asset('public/admin/img/quotes/'. $data->file ) }}" title="{{ $data->file }}">
                                    <img class="img-fluid" alt="" src="{{ asset('public/admin/img/quotes/'. $data->file ) }}" width="145">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <label for="">Notas Internas (solo para nosotros)</label>
                            <textarea name="note_business" class="form-control" id="note_business">{{ $data->memo }}</textarea>
                        </div>
                    </div>

                    <div class="mt-5">
                       <button type="submit" name="resend" class="btn btn-primary waves-effect waves-light">
                            <i class="fab fa-telegram  font-size-16 align-middle me-2"></i> Renviar
                        </button>
                                               <button type="submit" name="update" class="btn btn-success waves-effect waves-light">
                            <i class="fa fa-save font-size-16 align-middle me-2"></i> Actualizar
                        </button>
                        <button type="button" class="btn btn-danger waves-effect waves-light">
                            <i class="fas fa-undo-alt  font-size-16 align-middle me-2"></i> Limpiar
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</form>


<script>
    $(function() {



    })

    function cek(keys) {
        let valueQty = $("input[name='datas[" + keys + "][qty]']").val();
        let valuePrice = $("input[name='datas[" + keys + "][price]']").val();
        let tax = $("select[name='datas[" + keys + "][tax]']").val();
        console.log(tax)
        if (tax != 0) {
            let Hasiltax = parseFloat(valueQty) * parseFloat(valuePrice) * 0.16;
            $("input[name='datas[" + keys + "][HitungTax]']").val(Hasiltax.toFixed(2));
            // console.log("tax ada");
        } else if (tax == "") {
            $("input[name='datas[" + keys + "][HitungTax]']").val(0);
            // console.log("tax 0 ");
        } else if (tax == 0) {
            // console.log("tax 0 ");
            $("input[name='datas[" + keys + "][HitungTax]']").val(0);
        }


        let includeTax = 0;
        let setTotal = parseFloat(valueQty) * parseFloat(valuePrice);
        includeTax = setTotal * parseFloat(tax);
        let res = parseFloat(setTotal) + parseFloat(includeTax);
        $("input[name='datas[" + keys + "][total]']").val(res);


        let list = document.getElementsByClassName("itemsQty");
        let amount = 0;
        for (let i = 0; i < list.length; ++i) {
            let subAmount = $("input[name='datas[" + i + "][total]']").val();
            amount += parseFloat(subAmount);
        }
        // document.getElementById("ammountotal").innerHTML = amount;
        document.getElementById("totals").value = amount;
    }
</script>



@endsection