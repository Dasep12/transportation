@extends('layouts.master')

@section('title') Quotes @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Quotes @endslot
@slot('title') Realizar Cotizaciones @endslot
@endcomponent

<?php
// dd($references);

use App\Models\QuotesModel;

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
<form class="repeater needs-validation" method="post" action="/quotes/added" enctype="multipart/form-data" novalidate>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 mt-2 ml-2">Realizar Una Cotización</h4>
                    <a href="/quotes" class="btn btn-outline-success btn-sm"><i class="fas fa-backward "></i> atras</a>

                    <h3 class="mt-2">Cotización No. {{ $invoice }}</h3>

                    @csrf
                    <div class="row">
                        <input type="text" hidden id="totals" name="totals">
                        <div class="col-lg-6">
                            <label for="customer_name" class="col-sm-3 col-form-label">Cliente : * </label>
                            <div class="col-sm-12">
                                <input type="text" @if($message=Session::get("usernames")) value="{{ $message }}" @endif name="customer_name" required class="form-control" id="">
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
                                <input type="text" value="{{ old('email_address')}}" name="email_address" required class="form-control" id="">
                                @error('email_address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <label for="">Mensaje</label>
                            <textarea name="customer_note" class="form-control" id="customer_note">Es un placer para nosotros en Mundochiapas tener la oportunidad de presentarle nuestra propuesta. Nuestro compromiso es ofrecerle soluciones de la más alta calidad que se alineen perfectamente con sus necesidades. Le aseguramos una atención personalizada y la garantía de un servicio excepcional. A continuación, encontrará una cotización detallada, adaptada específicamente a sus requisitos y expectativas.
</textarea>
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
                        <div data-repeater-item class="row repeat">
                            <div class="mb-3 col-lg-3">
                                <label for="item_name">Servicio</label>
                                <input type="text" required id="item_name" name="item_name" class="form-control" placeholder="Item Name" />
                            </div>

                            <div class="mb-3 col-lg-3 ">
                                <label for="qty">Cantidad</label>
                                <input type="number" required id="qty" name="qty" class="form-control itemsQty" placeholder="Qty" />
                            </div>

                            <div class="mb-3 col-lg-3">
                                <label for="price">Precio</label>
                                <input type="text" autocomplete="off" value="<?php if (isset($_GET['ref_id'])) {
                                                                                    echo  QuotesModel::countSugestedPrice($_GET['ref_id']);
                                                                                } ?>" id="price" required name="price" class="form-control number-decimal itemsPrice" placeholder="Price" />
                            </div>

                            <div class="mb-3 col-lg-3">
                                <label for="message">Iva</label>
                                <select name="tax" required class="form-control itemsTax" id="tax">
                                    <option value="">Seleccionar</option>
                                    <option value="0">No</option>
                                    <option value="0.16">Iva(16%)</option>
                                </select>
                            </div>

                            <div class="mb-3 col-lg-12">
                                <label for="description">Descripción del Servicio</label>
                                <textarea name="description" class="form-control" placeholder="Description (optional)" id=""></textarea>
                            </div>

                            <div class="mb-3 col-lg-4">
                                <label for="HitungTax">Iva</label>
                                <input type="text" value="0" id="HitungTax" readonly name="HitungTax" class="form-control HitungTax" placeholder="Tax" />
                            </div>

                            <div class="mb-3 col-lg-4">
                                <label for="total">Total</label>
                                <input type="text" placeholder="total" readonly class="form-control itemsTotal" value="0" name="total" id="total">
                            </div>

                            <div class="col-lg-2 align-self-center d-flex mt-2">
                                <div class="d-grid">
                                    <button type="button" data-repeater-delete class="btn  btn-outline-danger mt-1">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

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
                                <option <?php if ($_GET['ref_id'] == $key->id) {
                                            echo "selected";
                                        } ?> value="{{ $key->id }}">{{ $key->id .'-'. $key->customer_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6">
                            <label for="">Galería de Fotos de la Unidad</label>
                            <input type="text" required name="gallery" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <label for="">Attachment</label>
                            <input type="file" class="form-control" name="file" id="file">
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <label for="">Notas Internas (solo para nosotros)</label>
                            <textarea name="note_business" class="form-control" id="note_business"></textarea>
                        </div>
                    </div>

                    <div class="mt-5">
                        <button type="submit" name="send" class="btn btn-primary waves-effect waves-light">
                            <i class="fab fa-telegram  font-size-16 align-middle me-2"></i> Enviar
                        </button>
                        <button type="submit" name="save" class="btn btn-success waves-effect waves-light">
                            <i class="fa fa-save font-size-16 align-middle me-2"></i> Guardar
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