@extends('layouts.master')

@section('title') Cars @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Transaportation @endslot
@slot('title') Cars @endslot
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

                <h4 class="card-title mb-4">Cars Category - List</h4>
                <form action="/cars_category/deleteAll" method="post">
                    @csrf
                    <a href="cars_category/form_add" class="btn btn-outline-success waves-effect waves-light">
                        <i class="fas fa-folder-plus  font-size-16 align-middle me-2"></i> Add New
                    </a>
                    @csrf
                    <button onclick="return confirm('Sure Delete Data Selected ?')" type="submit" class="btn btn-outline-danger waves-effect waves-light">
                        <i class="fas fa-trash    font-size-16 align-middle me-2"></i> Delete
                    </button>
                    <div class="table-responsive">
                        <table id="datatableCar" class="table align-middle  table-bordered  mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="form-check font-size-16 align-middle">
                                            <input class="form-check-input" type="checkbox" id="check-all">
                                            <label class="form-check-label" for="transactionCheck01"></label>
                                        </div>
                                    </th>
                                    <th class="align-middle">Category Name</th>
                                    <th class="align-middle">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td><input id="check-item" value="{{ $d->id }}" class="check-item" type="checkbox" name="id_check[]"></td>
                                    <td>{{ $d->name }}</td>
                                    <td>
                                        <a data-toggle="tooltip" title="Edit" data-placement="top" href="/cars_category/edited?id={{ $d->id }}"><i class="font-size-14 text-success fas fa-edit"></i></a>


                                        <a data-toggle="tooltip" title="Delete" data-placement="top" href="/cars_category/delete?id={{ $d->id }}" onclick="return confirm('Sure delete ?')"><i class="font-size-14 text-danger fas fa-trash"></i></a>
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


<script>
    $(function() {
        $(".check-item").click(function() {
            var panjang = $('[name="id_check[]"]:checked').length;
            if (panjang > 0) {
                document.getElementById('btn_delete_all').style.display = "block";
            } else {
                document.getElementById('btn_delete_all').style.display = "none";

            }
        })

        $("#check-all").click(function() {
            if ($(this).is(":checked")) {
                $(".check-item").prop("checked", true);
                var panjang = $('[name="id_check[]"]:checked').length;
            } else {
                $(".check-item").prop("checked", false);
            }
        })



        var tables = $("#datatableCar").DataTable({
            orderCellsTop: true,
            pagingType: 'full_numbers',
            fixedHeader: true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,

        })

    })
</script>
@endsection