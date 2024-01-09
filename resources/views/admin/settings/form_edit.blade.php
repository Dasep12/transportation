@extends('layouts.master')

@section('title') Administrators @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Administrators @endslot
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
                <h4 class="card-title mb-4 mt-2 ml-2">Settings - Form</h4>
                <a href="/settings" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <div class="col-xl-9">
                    <form class="needs-validation" method="post" action="/settings/updated" novalidate>
                        <input hidden type="text" value="{{ $data[0]->id }}" name="id" id="">
                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Title : * </label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $data[0]->title }}" name="title" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Content : * </label>
                            <div class="col-sm-9">
                                <input type="text" name="content" value="{{ $data[0]->content }}" required class="form-control" id="validationTooltip01">
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        @csrf

                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                <i class="fa fa-save font-size-16 align-middle me-2"></i> Submit
                            </button>
                            <button type="button" class="btn btn-danger waves-effect waves-light">
                                <i class="fas fa-undo-alt  font-size-16 align-middle me-2"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


    @endsection