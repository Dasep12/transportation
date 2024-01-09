@extends('layouts.master')

@section('title') Customers @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') User Management @endslot
@slot('title') Customers @endslot
@endcomponent


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
                <h4 class="card-title mb-4">Settings - List</h4>
                <a href="costumers/form_add" class="btn btn-outline-success waves-effect waves-light">
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
                                <th class="align-middle">Title</th>
                                <th class="align-middle">Content</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>{{ $d->title }}</td>
                                <td>{{ $d->content }}</td>
                                <td>
                                    <a href="/settings/edited?id={{ $d->id }}"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>


@endsection