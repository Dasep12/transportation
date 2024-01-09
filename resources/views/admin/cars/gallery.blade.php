@extends('layouts.master')

@section('title') Cars @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Transaportation @endslot
@slot('title') Cars @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="/cars" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-backward "></i> back
                </a>
                <h4 class="card-title mt-3 ">Cars Gallery</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name File</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody id="listGallery">

                            </tbody>
                        </table>
                    </div>
                </div>

                <form method="post" class="dropzone" id="dropzone" action="/cars/uploadGallery" enctype="multipart/form-data">
                    <input type="text" hidden value="{{ $id }}" name="ids" id="ids">
                    @csrf
                    <p class="card-title-desc">
                    </p>
                    <div>
                        <div>
                            <div class="fallback">
                                <input name="file" type="file" multiple="multiple">
                            </div>
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                </div>

                                <h4>Drop files here or click to upload.</h4>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-0" id="dropzone-preview">
                            <li class="mt-2" id="dropzone-preview-list">
                                <!-- This is used as the file preview template -->
                                <div class="border rounded">
                                    <div class="d-flex p-2">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-sm bg-light rounded">
                                                <img data-dz-thumbnail class="img-fluid rounded d-block" src="https://img.themesbrand.com/judia/new-document.png" alt="Dropzone-Image">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="pt-1">
                                                <h5 class="fs-md mb-1" data-dz-name>&nbsp;</h5>
                                                <p class="fs-sm text-muted mb-0" data-dz-size></p>
                                                <strong class="error text-danger" data-dz-errormessage></strong>
                                            </div>
                                        </div>
                                        <!-- <div class="flex-shrink-0 ms-3">
                                            <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                        </div> -->
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Send Files</button>
                    </div> -->
                </form>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<!-- Plugins js -->
<script src="{{ URL::asset('public/build/libs/dropzone/dropzone-min.js') }}"></script>

<script>
    function deleteData(id) {
        if (confirm("Sure Delete Image ?") == true) {
            $.ajax({
                url: "/cars/deleteGallery?id=" + id,
                method: "GET",
                success: function(e) {
                    alert("deleted image ");
                    listData()
                }
            })
        }
    }

    function listData() {
        $.ajax({
            url: "/cars/ajaxGallery",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: $("#ids").val()
            },
            success: function(e) {

                $("#listGallery").empty();
                html = "";
                for (let i = 0; i < e.length; i++) {
                    html += `<tr>`;
                    html += `<td> 
                    <div class="col-sm-5">
                        <div class="mt-4 mt-md-0">
                            <a class="image-popup-vertical-fit" href="{{ asset('public/gallery/${ e[i].filename }') }}" title="">
                                <img class="img-fluid" alt="" src="{{ asset('public/gallery/${ e[i].filename }') }}" width="145">
                            </a>
                        </div>
                    </div>
                    </td>`;
                    html += `<td><a onclick='deleteData(${e[i].id  })' href='#'><i class='font-size-17 fas fa-trash text-danger'></i></a></td>`;
                    html += `<tr>`;
                }
                // $("#listGallery").html(html);
                document.getElementById("listGallery").innerHTML = html;
            }
        })
    }
    listData()



    var dropzonePreviewNode = document.querySelector("#dropzone-preview-list");
    dropzonePreviewNode.id = "";
    if (dropzonePreviewNode) {
        var previewTemplate = dropzonePreviewNode.parentNode.innerHTML;
        dropzonePreviewNode.parentNode.removeChild(dropzonePreviewNode);
        var dropzone = new Dropzone(".dropzone", {
            // url: 'https://httpbin.org/post',
            // method: "post",
            acceptedFiles: ".jpg,.png,.jpeg",
            previewTemplate: previewTemplate,
            previewsContainer: "#dropzone-preview",
            success: function(file, response) {
                listData()
                console.log(response)
            },
            error: function(file, response) {
                return false
            },
            sending: function(file, xhr, formData) {
                formData.append('id', $('#ids').val());
            }
        });

    }
</script>
@endsection