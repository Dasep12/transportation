@extends('layouts.master')

@section('title') Dashboard @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Home @endslot
@slot('title') Dashboard @endslot
@endcomponent

<?php

?>
<div class="row mb-3">
    <div class="col-lg-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="">Years</label>
                    <select name="" class="form-control" id="yearFilter">
                        <?php
                        $firstYear = 2023;
                        $lastYear = $firstYear + 5; // + 2
                        for ($i = $firstYear; $i <= $lastYear; $i++) { ?>
                            <option <?= date('Y') == $i ? 'selected' : '' ?>><?= $i ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-2">
        <div class="row">
            <div class="col-lg-8">
                <label for="">Months</label>
                <select name="" class="form-control" id="monthFilter">
                    <?php
                    for ($i = 1; $i <= 12; $i++) {  ?>
                        <option <?= date('m') == $i ? 'selected' : '' ?> value="<?= $i ?>"><?= date("F", mktime(0, 0, 0, $i, 10)) ?></option>
                    <?php    }
                    ?>
                </select>
            </div>
            <div class="col-lg-4">
                <div class="form-group mt-4 p-1">
                    <button class="btn btn-primary d-flex" type="button" id="submits">Filter</button>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-primary-subtle">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <h5 class="text-primary">Welcome Back !</h5>
                            <p>Solomon Dashboard</p>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="{{ asset('public/build/images/profile-img.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="avatar-md profile-user-wid mb-4">
                            <img src="{{ asset('public/images/user.png ') }}" alt="" class="img-thumbnail rounded-circle">
                        </div>
                        <h5 class="font-size-15 text-truncate">{{ strtoupper(Session('username')) }}</h5>
                    </div>

                    <div class="col-sm-8">
                        <div class="pt-4">

                            <div class="row">
                                <div class="col-6">
                                    <h5 class="font-size-15">{{ $driver }}</h5>
                                    <p class="text-muted mb-0">Drivers</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="font-size-15">{{ $cust }}</h5>
                                    <p class="text-muted mb-0">Customers</p>
                                </div>
                            </div>
                            <div class="mt-4">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="height:330px !important;">
            <div class="card-body">
                <h4 class="card-title mb-4">Monthly Earning Quotes</h4>
                <div class="row">
                    <div class="col-sm-6">
                        <p class="text-muted">This month</p>
                        <h3 id="monthCurrNilai"></h3>
                        <p class="text-muted" id="infoCurMonths"></p>
                    </div>
                    <div class="col-sm-6">
                        <div class="mt-4 mt-sm-0">
                            <div id="radialBar-chart" data-colors='["--bs-primary"]' class="apex-charts"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="row">
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Orders Servicio</p>
                                <h4 class="mb-0" id="orderServicio">0</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                    <span class="avatar-title">
                                        <i class="bx bx-copy-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Revenue Servicio</p>
                                <h4 class="mb-0" id="revenueServicio">0</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center ">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bx-archive-in font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Average Price Servicio</p>
                                <h4 class="mb-0" id="averagePrice">0</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex flex-wrap">
                    <h4 class="card-title mb-4">Quotes</h4>
                    <div class="ms-auto">
                        <ul class="nav nav-pills">

                            <li class="nav-item">
                                <a class="nav-link active" id="yearGraph">2023</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="stacked-column-chart" class="apex-charts" data-colors='["--bs-primary", "--bs-warning", "--bs-success"]' dir="ltr"></div>
            </div>
        </div>
    </div>

</div>
<!-- end row -->

<div class="row">

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Solicitudes</h4>
                <div class="table-responsive" data-simplebar style="max-height: 330px;">
                    <table class="table align-middle table-nowrap">
                        <tbody>
                            <tr>
                                <td style="width: 50px;">
                                    <div class="font-size-22 text-primary">
                                        <i class="bx bx-detail"></i>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-end">
                                        <h5 class="font-size-20 mb-0" id="solicitudReceive">0</h5>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-end">
                                        <h5 class="font-size-14 text-muted mb-0">Recibidas</h5>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="font-size-22 text-primary">
                                        <i class="bx bx-detail"></i>
                                    </div>
                                </td>


                                <td>
                                    <div class="text-end">
                                        <h5 class="font-size-20 mb-0" id="respondSolicitud">0</h5>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-end">
                                        <h5 class="font-size-14 text-muted mb-0">Respondas</h5>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="font-size-22 text-primary">
                                        <i class="bx bx-detail"></i>
                                    </div>
                                </td>


                                <td>
                                    <div class="text-end">
                                        <h5 class="font-size-20 mb-0" id="converSolicitud">0</h5>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-end">
                                        <h5 class="font-size-14 text-muted mb-0">Cliente</h5>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="font-size-22 text-primary">
                                        <i class="bx bx-detail"></i>
                                    </div>
                                </td>


                                <td>
                                    <div class="text-end">
                                        <h3 class="font-size-20 mb-0" id="persentageSolicitud">0 %</h3>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-end">
                                        <h5 class="font-size-14 text-muted mb-0">Efectividad</h5>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Cotizaciònes</h4>
                <div class="table-responsive" data-simplebar style="max-height: 330px;">
                    <table class="table align-middle table-nowrap">
                        <tbody>
                            <tr>
                                <td style="width: 50px;">
                                    <div class="font-size-22 text-danger">
                                        <i class="bx bx-food-tag "></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <h5 class="font-size-20 mb-0" id="enviodas_quotes">0</h5>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <h5 class="font-size-14 text-muted mb-0">Enviodas</h5>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="font-size-22 text-danger">
                                        <i class="bx bx-food-tag "></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <h5 class="font-size-20 mb-0" id="approved_quotes">0</h5>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <h5 class="font-size-14 text-muted mb-0">Aceptados</h5>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="font-size-22 text-danger">
                                        <i class="bx bx-food-tag "></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <h3 class="font-size-20 mb-0" id="persentase_quotes">0%</h3>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <h5 class="font-size-14 text-muted mb-0">Efectividad</h5>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Car Utilization</h4>
                <div class="table-responsive mt-4">
                    <table class=" ">
                        <tbody id="tbodyCars">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4"> Service Order</h4>
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <!-- <th class="align-middle">ID</th> -->
                                <th class="align-middle">Customer Name</th>
                                <th class="align-middle">Departure</th>
                                <th class="align-middle">Destination</th>
                                <th class="align-middle">Date</th>
                                <th class="align-middle">Payment Status</th>
                            </tr>
                        </thead>
                        <tbody id="serviceOrderList">

                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>
<!-- end row -->

</div>
<!-- container-fluid -->
</div>


<script>
    var field = [
        year = $("#yearFilter").val(),
        month = $("#monthFilter").val(),
    ];

    function quotesServiceInfo(field) {
        $.ajax({
            url: "/dashboard/quotesServiceInfo",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                year: year,
                month: month
            },
            success: function(res) {
                document.getElementById("orderServicio").innerHTML = res.quotesAll;
                document.getElementById("revenueServicio").innerHTML = ' $ ' + res.revenue;
                document.getElementById("averagePrice").innerHTML = '$ ' + res.average;
                // console.log(res)
            }
        })
    }
    quotesServiceInfo(field)


    function MontlyEarnings(field) {
        $.ajax({
            url: "/dashboard/earningsQuotesMonths",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                year: year,
                month: month
            },
            success: function(res) {
                // console.log(res)
                document.getElementById("monthCurrNilai").innerHTML = '$ ' + res.nilai
                if (res.stat == "down") {
                    document.getElementById("infoCurMonths").innerHTML = `<span class="text-danger me-2"> <i class="mdi mdi-arrow-down"></i>${ res.persentase } %<br></span> From previous period`;
                } else {
                    document.getElementById("infoCurMonths").innerHTML = `<span class="text-success me-2"> <i class="mdi mdi-arrow-up"></i>${ res.persentase } %<br></span> From previous period`;
                }
            }
        })
    }

    MontlyEarnings(field)



    var options = {
        chart: {
            height: 360,
            type: 'bar',
            stacked: true,
            toolbar: {
                show: false
            },
            zoom: {
                enabled: true
            }
        },

        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '15%',
                endingShape: 'rounded',
                borderRadius: 5,
            },
        },

        dataLabels: {
            enabled: false
        },
        series: [{
            name: 'Total',
            data: []
        }],
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        },
        // colors: linechartBasicColors,
        legend: {
            position: 'bottom',
        },
        fill: {
            opacity: 1
        },
    }

    var chart = new ApexCharts(
        document.querySelector("#stacked-column-chart"),
        options
    );
    chart.render();

    function ajaxGraph(field) {
        $.ajax({
            url: "/dashboard/graphicQuotes",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                year: year,
            },
            success: function(res) {
                // console.log(res)
                chart.updateSeries([{
                    name: 'Total',
                    data: res
                }])

                document.getElementById("yearGraph").innerHTML = year;
            }
        })
    }
    ajaxGraph(field)


    function solicitud(field) {
        $.ajax({
            url: "/dashboard/solicitud",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                year: year,
                month: month
            },
            success: function(res) {
                // console.log(res)
                document.getElementById("solicitudReceive").innerHTML = res.receive;
                document.getElementById("respondSolicitud").innerHTML = res.respond;
                document.getElementById("converSolicitud").innerHTML = res.conversion;
                document.getElementById("persentageSolicitud").innerHTML = res.persentase + '%';
            }
        })
    }

    solicitud(field);


    function cotizaciones(field) {
        $.ajax({
            url: "/dashboard/cotizaciones",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                year: year,
                month: month
            },
            success: function(res) {
                console.log(res)
                document.getElementById("enviodas_quotes").innerHTML = res.sent;
                document.getElementById("approved_quotes").innerHTML = res.approve;
                document.getElementById("persentase_quotes").innerHTML = res.persentase + '%';
            }
        })
    }

    cotizaciones(field)

    function cars(field) {
        $.ajax({
            url: "/dashboard/car_utility",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                year: year,
                month: month
            },
            success: function(res) {
                let html = "";
                // console.log(res)
                for (let i = 0; i < res.length; i++) {
                    html += ` <tr>
                                    <td width=30%>
                                    <div class="font-size-22 text-success">
                                        <i class="bx bx-car"></i>
                                    </div>
                                    </td>
                                    <td width=70%>
                                        <p class="mb-0">${ res[i].car_name }</p>
                                    </td>
                                    <td >
                                        <h5 class="mb-0">${ res[i].results }</h5>
                                    </td>
                                    
                                </tr>`;
                }

                $("#tbodyCars").empty();
                $("#tbodyCars").append(html);

            }
        })
    }
    cars(field)


    function serviceList(field) {
        $.ajax({
            url: "/dashboard/serviceList",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                year: year,
                month: month
            },
            success: function(res) {
                let html = "";
                // console.log(res)
                for (let i = 0; i < res.length; i++) {

                    html += ` <tr>
                       
                        <td>${ res[i].customer_name }</td>
                        <td>${ res[i].departure }</td>
                        <td>${ res[i].destination }</td>
                        <td>${ res[i].tanggal }</td>
                        <td>
                            <span class="badge badge-pill ${ res[i].payment_status == 'Paid' ? 'badge-soft-success' : 'badge-soft-danger' }  font-size-11">${ res[i].payment_status }</span>
                        </td>
                        </tr>`;
                }

                $("#serviceOrderList").empty();
                $("#serviceOrderList").append(html);
            }
        })
    }
    serviceList(field)

    $("#submits").click(function(e) {
        var field = [
            year = $("#yearFilter").val(),
            month = $("#monthFilter").val(),
        ];

        quotesServiceInfo(field)
        ajaxGraph(field)
        MontlyEarnings(field)
        cotizaciones(field)
        cars(field)
        serviceList(field)
    })
</script>
@endsection