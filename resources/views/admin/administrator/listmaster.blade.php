@extends('layouts.master')

@section('title') Administrators @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') User Management @endslot
@slot('title') Administrators @endslot
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
                <form method="post" action="/adminuser/deleteAll">
                    @csrf
                    <h4 class="card-title mb-4">Administrators - List</h4>
                    <a href="adminuser/form_add" class="btn btn-outline-success waves-effect waves-light">
                        <i class="fas fa-folder-plus  font-size-16 align-middle me-2"></i> Add New
                    </a>
                    <button type="submit" onclick="return confirm('Sure Delete ?')" class="btn btn-outline-danger waves-effect waves-light">
                        <i class="fas fa-trash    font-size-16 align-middle me-2"></i> Delete
                    </button>
                    <div class="table-responsive">
                        <table id="datatableUser" class="table align-middle  table-bordered  mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="form-check font-size-16 align-middle">
                                            <input class="form-check-input" type="checkbox" id="check-all">
                                            <label class="form-check-label" for="transactionCheck01"></label>
                                        </div>
                                    </th>
                                    <th class="align-middle">User Type</th>
                                    <th class="align-middle">Username</th>
                                    <th class="align-middle">Full Name</th>
                                    <th class="align-middle">Email</th>
                                    <th class="align-middle">Phone</th>
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $dt)
                                <tr>
                                    <td><input id="check-item" value="{{ $dt->id }}" class="check-item" type="checkbox" name="id_check[]"></td>
                                    <td>{{ ucwords(strtolower($dt->user_type)) }}</td>
                                    <td>{{ ucwords(strtolower($dt->username)) }}</td>
                                    <td>{{ ucwords(strtolower($dt->first_name .' ' . $dt->last_name)) }}</td>
                                    <td>{{ ucwords(strtolower($dt->email)) }}</td>
                                    <td>{{ $dt->phone }}</td>
                                    <td>{{ $dt->status }}</td>
                                    <td>
                                        <a class="text-success" href="/adminuser/edited?id={{ $dt->id }}"><i class="fas fa-edit"></i></a>

                                        <a class="text-danger" onclick="return confirm('Sure Delete ?')" href="/adminuser/deleted?id={{ $dt->id }}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </form>

            </div>
        </div>
    </div>
</div>

<script>
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

    var tables = $("#datatableUser").DataTable({
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
</script>
@endsection