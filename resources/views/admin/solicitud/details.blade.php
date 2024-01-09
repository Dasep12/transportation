@extends('layouts.master')

@section('title') Solicitud @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Transaportation @endslot
@slot('title') Solicitud @endslot
@endcomponent
<?php

use App\Models\QuotesModel;
?>

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

                <h4 class="card-title mb-4">Details Solicitud - List</h4>
                <a href="/solicitud" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <?php
                // echo "<pre>";
                // var_dump($data);
                ?>
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="label font-size-16" for="">Nombre Cliente:</label>
                            <span class="label font-size-16">{{ $data[0]->name }}</span>
                        </div>
                        <div class="form-group">
                            <label class="label font-size-16" for="">Notas:</label>
                            <span class="label font-size-16">{{ $data[0]->comment }}</span>
                        </div>
                        <div class="form-group">
                            <label class="label font-size-16" for="">Ruta:</label>
                            <span class="label font-size-16">{{ ucwords(strtolower($data[0]->route)) }}</span>
                        </div>
                        <div class="form-group">
                            <label class="label font-size-16" for="">Unidad Requerida:</label>
                            <span class="label font-size-16">{{ ucwords(strtolower($data[0]->car_type)) }}</span>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="label font-size-16" for="">Número Tel.:</label>
                            <span class="label font-size-16">{{ ucwords(strtolower($data[0]->phone)) }}</span>
                        </div>
                        <div class="form-group">
                            <label class="label font-size-16" for="">Fecha y hora de Inicial: </label>
                            <span class="label font-size-16">{{ ucwords(strtolower($data[0]->date_start)) }}</span>
                        </div>
                        <div class="form-group">
                            <label class="label font-size-16" for=""># de Pasajeros: </label>
                            <span class="label font-size-16">{{ ucwords(strtolower($data[0]->passangers_num)) }}</span>
                        </div>

                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="label font-size-16" for="">Correo:</label>
                            <span class="label font-size-16">{{ ucwords(strtolower($data[0]->email)) }}</span>
                        </div>
                        <div class="form-group">
                            <label class="label font-size-16" for="">Fecha y hora de Final:</label>
                            <span class="label font-size-16">{{ ucwords(strtolower($data[0]->date_end)) }}</span>
                        </div>
                    </div>

                </div>

                @if(is_null($data[0]->status))
                <div class="d-flex justify-content-center">
                    <div class="pd-2">
                        <a href="/costperservice/form_add?solicitud_id={{ $data[0]->id }}" class="btn btn-success"><i class="fas fa-check"></i> Completar</a>

                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-id="{{ $data[0]->id }}" data-bs-target="#myModal"><i class="fas fa-times"></i> Cancelar</button>

                    </div>
                </div>
                <!-- end table-responsive -->
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Default Modal Heading</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="/solicitud/updateCancelar" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    <input hidden type="text" hidden name="idx" id="id">
                    <div class="form-group">
                        <label for="">Comment</label>
                        <textarea name="comment" required class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
    $(document).ready(function() {

        $("#myModal").on("show.bs.modal", function(event) {
            var div = $(event.relatedTarget); // Tombol dimana modal di tampilkan
            var modal = $(this);
            // Isi nilai pada field
            modal.find("#id").attr("value", div.data("id"));
        });
    })
</script>

@endsection