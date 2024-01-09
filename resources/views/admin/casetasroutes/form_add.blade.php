@extends('layouts.master')

@section('title') Casetas Route @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Casetas Route @endslot
@slot('title') Form Add @endslot
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

                <h4 class="card-title mb-4 mt-2 ml-2">Casetas Route - Form</h4>
                <a href="/casetas_route" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back</a>
                <form method="post" enctype="multipart/form-data" action="/casetas_route/added" class="needs-validation" novalidate>
                    @csrf
                    <div class="col-xl-9 mt-4">
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">
                                    Casetas Name :
                                </label>
                                <input type="text" autocomplete="off" value="{{ old('caseta_name')}}" name="caseta_name" required class="form-control" id="">
                                @error('caseta_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Category Cars</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td align="center" colspan="4">
                                                <a id="addBtn" class="btn btn-sm btn-info "> <i class="fas fa-plus"></i> Agregar</a>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
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

                </form>
            </div>
        </div>


    </div>


    <script>
        $(document).ready(function() {

            // Denotes total number of rows 
            var rowIdx = 0;

            // jQuery button click event to add a row 
            $('#addBtn').on('click', function() {

                // Adding a row inside the tbody. 
                $('#tbody').append(`<tr id="R${++rowIdx}">
                                        <td>
                                        <select name="category_cars[]" class="form-control select2">
                                        <?php foreach ($category as $c) : ?>
                                            <option value="{{ $c->id }}"><?= ucwords(strtolower($c->name)) ?></option>
                                            <?php endforeach ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input class="form-control number-decimal" type="text" name="costo_casetas[]" required id="">
                                        </td>
                                        <td>
                                            <input class="form-control" type="file" name="images[]"  id="">
                                        </td>
                                        <td>
                                            <a class="remove btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>`);
            });

            // jQuery button click event to remove a row. 
            $('#tbody').on('click', '.remove', function() {
                // Getting all the rows next to the row 
                // containing the clicked button 
                var child = $(this).closest('tr').nextAll();

                // Iterating across all the rows  
                // obtained to change the index 
                child.each(function() {

                    // Getting <tr> id. 
                    var id = $(this).attr('id');

                    // Getting the <p> inside the .row-index class. 
                    var idx = $(this).children('.row-index').children('p');

                    // Gets the row number from <tr> id. 
                    var dig = parseInt(id.substring(1));

                    // Modifying row index. 
                    idx.html(`Row ${dig - 1}`);

                    // Modifying row id. 
                    $(this).attr('id', `R${dig - 1}`);
                });

                // Removing the current row. 
                $(this).closest('tr').remove();
                // Decreasing total number of rows by 1. 
                rowIdx--;
            });
        });
    </script>
    @endsection