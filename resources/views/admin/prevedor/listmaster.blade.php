@extends('layouts.master')

@section('title') Prevedor @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Gastos @endslot
@slot('title') Prevedor @endslot
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
                <form method="post" action="/prevedor/deleteAll">

                    <h4 class="card-title mb-4">Prevedor - List</h4>
                    <a href="prevedor/form_add" class="btn btn-outline-success waves-effect waves-light">
                        <i class="fas fa-folder-plus  font-size-16 align-middle me-2"></i> Add New
                    </a>
                    @csrf
                    <button type="submit" onclick="return confirm('Sure Delete Data Selected ?')" class="btn btn-outline-danger waves-effect waves-light">
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
                                    <th class="align-middle">Rfc</th>
                                    <th class="align-middle">Name</th>
                                    <th class="align-middle">Address</th>
                                    <th class="align-middle">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td><input id="check-item" value="{{ $d->id }}" class="check-item" type="checkbox" name="id_check[]"></td>
                                    <td>{{ $d->rfc }}</td>
                                    <td>{{ ucwords(strtolower($d->name)) }} </td>
                                    <td>{{ ucwords(strtolower($d->address)) }} </td>
                                    <td>
                                        <a href="/prevedor/edited?id={{ $d->id }}"><i class="font-size-14 text-success fas fa-edit"></i></a>


                                        <a href="/prevedor/delete?id={{ $d->id }}" onclick="return confirm('Sure delete ?')"><i class="font-size-14 text-danger fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </form>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>


@endsection