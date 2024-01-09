@extends('layouts.master')

@section('title') Reportes Order Payment @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Gastos @endslot
@slot('title') Reportes Order Payment @endslot
@endcomponent


<div class="row">
    <div class="col-lg-12">
        <div class="card mb-5">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Route Travel - Form</h4>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">Fecha Inicial : *</label>
                            <div class="input-group" id="datepicker2">
                                <input readonly type="text" required class="form-control" placeholder="yyyy-mm-dd" value="{{ date('Y-m-d') }}" name="date_first" id="date_first" data-date-format="yyyy-mm-dd" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">Fecha Inicial : *</label>
                            <div class="input-group" id="datepicker2">
                                <input readonly type="text" required class="form-control" placeholder="yyyy-mm-dd" value="{{ date('Y-m-d') }}" name="date_end" id="date_end" data-date-format="yyyy-mm-dd" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">Empressa : *</label>
                            <select name="company_id" class="form-control select2" id="company_id">
                                <option value="">Todos</option>
                                @foreach($empresas as $emp)
                                <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group mt-4" style="margin-top:28px !important">
                            <button type="button" id="searching" class="btn btn-info"><i class="fas fa search"></i> Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="ordenempressa"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="ordenPrevedor"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="ordenSolicitante"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="ordenConcepto"></div>
                </div>
            </div>
        </div>
    </div>

</div>



<script>
    var field = [
        date_first = $("#date_first").val(),
        date_end = $("#date_end").val(),
        company_id = $("#company_id").val(),
    ];

    Fordenempressa(field);
    Fordenprevedor(field);
    FordenConcepto(field);
    FordenSolicitante(field)

    $("#searching").click(function() {
        var field = [
            date_first = $("#date_first").val(),
            date_end = $("#date_end").val(),
            company_id = $("#company_id").val(),
        ];
        Fordenempressa(field);
        Fordenprevedor(field);
        FordenConcepto(field);
        FordenSolicitante(field)
    })

    var ordenempressa = new Highcharts.Chart('ordenempressa', {
        chart: {
            type: 'bar',
        },
        title: {
            text: 'Ordenes de pago por empresa'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category',
            title: {
                text: null
            },
            scrollbar: {
                enabled: true
            },
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total ( $ )',
            },
            labels: {
                formatter: function() {
                    return '$ ' + this.value;
                }
            }

        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Total',
            data: []
        }]
    });

    function Fordenempressa(field) {
        $.ajax({
            url: '/reportes/ordenempressaAll',
            type: 'POST',
            data: {
                date_first: date_first,
                date_end: date_end,
                company: company_id,
                "_token": "{{ csrf_token() }}",
            },
            cache: false,
            beforeSend: function() {
                // document.getElementById("bydetailUserLoader").style.display = "block";
            },
            complete: function() {
                // document.getElementById("bydetailUserLoader").style.display = "none";
            },
            success: function(result) {
                let res = result;
                let categories = [];
                let data = [];
                for (let i = 0; i < res.length; i++) {
                    let opt = [
                        res[i].name,
                        parseInt(res[i].total)
                    ]
                    data.push(opt);
                }

                ordenempressa.series[0].update({
                    data: data
                });
            }
        });
    }


    var ordenPrevedor = new Highcharts.Chart('ordenPrevedor', {
        chart: {
            type: 'bar',
        },
        title: {
            text: 'Ordenes de pago por prevedor'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category',
            title: {
                text: null
            },
            scrollbar: {
                enabled: true
            },
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total ( $ )',
            },
            labels: {
                formatter: function() {
                    return '$ ' + this.value;
                }
            }

        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Total',
            data: []
        }]
    });

    function Fordenprevedor(field) {
        $.ajax({
            url: '/reportes/ordenPrevedoraAll',
            type: 'POST',
            data: {
                date_first: date_first,
                date_end: date_end,
                company: company_id,
                "_token": "{{ csrf_token() }}",
            },
            cache: false,
            beforeSend: function() {
                // document.getElementById("bydetailUserLoader").style.display = "block";
            },
            complete: function() {
                // document.getElementById("bydetailUserLoader").style.display = "none";
            },
            success: function(result) {
                let res = result;
                let categories = [];
                let data = [];
                for (let i = 0; i < res.length; i++) {
                    let opt = [
                        res[i].name,
                        parseInt(res[i].total)
                    ]
                    data.push(opt);
                }

                ordenPrevedor.series[0].update({
                    data: data
                });
            }
        });
    }

    var ordenSolicitante = new Highcharts.Chart('ordenSolicitante', {
        chart: {
            type: 'bar',
        },
        title: {
            text: 'Ordenes de pago por solicitante'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category',
            title: {
                text: null
            },
            scrollbar: {
                enabled: true
            },
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total ( $ )',
            },
            labels: {
                formatter: function() {
                    return '$ ' + this.value;
                }
            }

        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Total',
            data: []
        }]
    });

    function FordenSolicitante(field) {
        $.ajax({
            url: '/reportes/ordenSolicitanteaAll',
            type: 'POST',
            data: {
                date_first: date_first,
                date_end: date_end,
                company: company_id,
                "_token": "{{ csrf_token() }}",
            },
            cache: false,
            beforeSend: function() {
                // document.getElementById("bydetailUserLoader").style.display = "block";
            },
            complete: function() {
                // document.getElementById("bydetailUserLoader").style.display = "none";
            },
            success: function(result) {
                let res = result;
                let categories = [];
                let data = [];
                for (let i = 0; i < res.length; i++) {
                    let opt = [
                        res[i].name,
                        parseInt(res[i].totals)
                    ]
                    data.push(opt);
                }

                ordenSolicitante.series[0].update({
                    data: data
                });
            }
        });
    }

    var ordenConcepto = new Highcharts.Chart('ordenConcepto', {
        chart: {
            type: 'bar',
        },
        title: {
            text: 'Ordenes de pago por concepto'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category',
            title: {
                text: null
            },
            scrollbar: {
                enabled: true
            },
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total ( $ )',
            },
            labels: {
                formatter: function() {
                    return '$ ' + this.value;
                }
            }

        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Total',
            data: []
        }]
    });

    function FordenConcepto(field) {
        $.ajax({
            url: '/reportes/ordenConceptoaAll',
            type: 'POST',
            data: {
                date_first: date_first,
                date_end: date_end,
                company: company_id,
                "_token": "{{ csrf_token() }}",
            },
            cache: false,
            beforeSend: function() {
                // document.getElementById("bydetailUserLoader").style.display = "block";
            },
            complete: function() {
                // document.getElementById("bydetailUserLoader").style.display = "none";
            },
            success: function(result) {
                let res = result;
                let categories = [];
                let data = [];
                for (let i = 0; i < res.length; i++) {
                    let opt = [
                        res[i].name,
                        parseInt(res[i].totals)
                    ]
                    data.push(opt);
                }

                ordenConcepto.series[0].update({
                    data: data
                });
            }
        });
    }
</script>
@endsection