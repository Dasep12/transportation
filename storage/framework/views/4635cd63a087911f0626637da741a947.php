

<?php $__env->startSection('title'); ?> Reportes Order Payment <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Report Car <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Reportes <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>


<div class="row">
    <div class="col-lg-12">
        <div class="card mb-5">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Reportes Car</h4>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">Fecha Inicial : *</label>
                            <div class="position-relative" id="datepicker4">
                                <input id="date" value="<?= date('F Y') ?>" type="text" class="form-control" data-date-container='#datepicker4' data-provide="datepicker" data-date-format="MM yyyy" data-date-autoclose="true" data-date-min-view-mode="1">
                            </div>
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
        <div class="col-lg-6">
            <div class="card" style="height: 450px;">
                <div class="card-body">
                    <div id="usoenelmes"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card" style="height: 450px;">
                <div class="card-body">
                    <div id="ordenPrevedor"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body" id="datasCars">
                    <!-- <div class="table-responsive"> -->

                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>

</div>
<!-- <button class="btn btn-danger btn-sm" style="padding:4px 4px 3px !important">
                                        <i class="fas fa-times "></i>
                                    </button> -->


<script>
    function convert(bln) {
        switch (bln) {
            case "January":
                return 1;
                break;
            case "February":
                return 2;
                break;
            case "March":
                return 3;
                break;
            case "April":
                return 4;
                break;
            case "May":
                return 5;
                break;
            case "June":
                return 6;
                break;
            case "July":
                return 7;
                break;
            case "August":
                return 8;
                break;
            case "September":
                return 9;
                break;
            case "October":
                return 10;
                break;
            case "November":
                return 11;
                break;
            case "December":
                return 12;
                break;
        }
    }

    var field = [
        month = convert($("#date").val().split(" ")[0]),
        years = $("#date").val().split(" ")[1],
    ];

    FvehicleUso(field)
    FvehicleCars(field)
    showDetailsMonths(field)


    $("#searching").click(function() {
        var field = [
            month = convert($("#date").val().split(" ")[0]),
            years = $("#date").val().split(" ")[1],
        ];
        FvehicleUso(field)
        FvehicleCars(field)
        showDetailsMonths(field)
    })

    var vehicleUso = Highcharts.chart('usoenelmes', {
        chart: {
            type: 'pie',
            // options3d: {
            //     enabled: true,
            //     alpha: 45
            // },
            backgroundColor: 'transparent',
            size: 150,

        },
        title: {
            text: 'Uso en el mes',
            align: 'center',
            useHTML: true,
            style: {
                color: '#000',
                fontWeight: 'bold',
            }
        },
        credits: {
            enabled: false
        },
        subtitle: {
            text: '',
            align: 'left'
        },
        plotOptions: {
            pie: {
                size: 150,
                // showInLegend: true,
                // depth: 20,
                allowPointSelect: true,
                cursor: "pointer",
                dataLabels: {
                    enabled: true,
                    distance: 40,
                    // color: "white",
                    formatter: function() {
                        return '<b>' + this.point.name + ' : ' + Highcharts.numberFormat(this.point.y, 2) + ' %<b>';
                    }
                }
            },
        },
        tooltip: {
            headerFormat: '<span style="font-size:11px"></span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
        },
        series: [{
            data: [],
        }]
    });

    function FvehicleUso(field) {
        $.ajax({
            url: '/reportcar/usoenmes',
            type: 'POST',
            data: {
                month: month,
                year: years,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            cache: false,
            beforeSend: function() {
                // document.getElementById("trafikVehicle").style.display = "block";
            },
            complete: function() {
                // document.getElementById("trafikVehicle").style.display = "none";
            },
            success: function(res) {
                let data = res;
                var seriesLength = vehicleUso.series.length;
                for (var i = seriesLength - 1; i > -1; i--) {
                    vehicleUso.series[i].remove();
                }
                let datas = [];
                // console.log(res)
                for (let i = 0; i < data.length; i++) {
                    let ttl = parseFloat(data[i].percentage);
                    // console.log(parseFloat(ttl).toFixed(2))
                    datas.push({
                        name: data[i].car_name,
                        y: ttl
                    });
                }
                vehicleUso.addSeries({
                    data: datas
                });
            }
        });
    }


    var vehicleCars = new Highcharts.Chart('ordenPrevedor', {
        chart: {
            type: 'bar',
        },
        title: {
            text: 'Porcentaje del Vehículo'
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
                text: 'Total ( % )',
            },
            labels: {
                formatter: function() {
                    return '' + this.value;
                }
            }

        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                        return '<b>' + Highcharts.numberFormat(this.point.y, 2) + ' %<b>';
                    }
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

    function FvehicleCars(field) {
        $.ajax({
            url: '/reportcar/presentase',
            type: 'POST',
            data: {
                month: month,
                year: years,
                "_token": "<?php echo e(csrf_token()); ?>",
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
                console.log(res);
                for (let i = 0; i < res.length; i++) {
                    let opt = [
                        res[i].car_name,
                        res[i].percentage
                    ]
                    data.push(opt);
                }

                vehicleCars.series[0].update({
                    data: data
                });
            }
        });
    }



    function showDetailsMonths(field) {
        $.ajax({
            url: '/reportcar/showMonths',
            type: 'POST',
            data: {
                month: month,
                year: years,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            cache: false,
            beforeSend: function() {
                // document.getElementById("trafikVehicle").style.display = "block";
            },
            complete: function() {
                // document.getElementById("trafikVehicle").style.display = "none";
            },
            success: function(res) {
                document.getElementById("datasCars").innerHTML = "";
                let data = res;
                $("#example").empty();
                document.getElementById("datasCars").innerHTML = `<table id="example" class="table-bordered table wrapper small">
                ${ data }</table>`;

                $('#example').dataTable().fnDestroy();

                new DataTable('#example', {
                    fixedColumns: {
                        left: 1,
                    },
                    paging: false,
                    scrollX: true,
                    scrollY: true,
                    lengthChange: false,
                    searching: false,
                    info: false,
                    ordering: false,
                    autoWidth: false,
                    processing: false,
                    serverSide: false,
                });
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/reportescar/index.blade.php ENDPATH**/ ?>