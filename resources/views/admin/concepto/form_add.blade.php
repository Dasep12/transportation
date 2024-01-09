@extends('layouts.master')

@section('title') Concepto de Pago @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Concepto de Pago @endslot
@slot('title') Form Add @endslot
@endcomponent


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
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Concepto de Pago - Form</h4>
                <a href="/concepto" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <form class="needs-validation" method="post" action="/concepto/addedd" novalidate>
                    <div class="col-xl-9">

                        <div class="row mb-3">
                            @csrf
                            <div class="col-sm-9">
                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                    Concepto: *
                                </label>
                                <input type="text" name="concept" required class="form-control" id="validationTooltip01">
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


            </div>
            </form>
        </div>
    </div>

</div>


@endsection