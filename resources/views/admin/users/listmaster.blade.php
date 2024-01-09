@extends('layouts.master')

@section('title') Users @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Users @endslot
@slot('title') Form Add @endslot
@endcomponent


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Users - List</h4>
                <a href="users/form_add" class="btn btn-outline-success waves-effect waves-light">
                    <i class="fas fa-folder-plus  font-size-16 align-middle me-2"></i> Add New
                </a>
                <button type="button" class="btn btn-outline-danger waves-effect waves-light">
                    <i class="fas fa-trash    font-size-16 align-middle me-2"></i> Delete
                </button>
                <div class="table-responsive">
                    <table id="datatable" class="table align-middle table-bordered  mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check font-size-16 align-middle">
                                        <input class="form-check-input" type="checkbox" id="transactionCheck01">
                                        <label class="form-check-label" for="transactionCheck01"></label>
                                    </div>
                                </th>
                                <th class="align-middle">Firstname</th>
                                <th class="align-middle">Lastname</th>
                                <th class="align-middle">Age</th>
                                <th class="align-middle">Discipline</th>
                                <th class="align-middle">User Type</th>
                                <th class="align-middle">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>ROLANDO</td>
                                <td>ALVAREZ NAVARRETE</td>
                                <td>0</td>
                                <td>test</td>
                                <td></td>
                                <td>
                                    <a href=""><i class="fas fa-edit"></i></a>
                                    <a href=""><i class="fas fa-eye"></i></a>
                                    <a href=""><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>


@endsection