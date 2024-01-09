

<?php $__env->startSection('title'); ?> Report <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Report <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Sales Report <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="col-lg-12">
        <?php if($message = Session::get('success')): ?>
        <div class="alert text-white  bg-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check"></i>
            <?php echo e($message); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php elseif($message = Session::get('failed')): ?>
        <div class="alert text-white  bg-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-check"></i>
            <?php echo e($message); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-2 ml-2">Sales Report - Form</h4>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="position-relative" id="datepicker4">
                            <div class="row">
                                <div class="col-lg-5">
                                    <input type="text" id="dates" class="form-control" data-date-container='#datepicker4' data-date-autoclose="true" data-provide="datepicker" value="<?= date('F Y') ?>" data-date-format="MM yyyy" data-date-min-view-mode="1">
                                </div>
                                to
                                <div class="col-lg-5">
                                    <input type="text" id="dates2" class="form-control" data-date-container='#datepicker4' data-date-autoclose="true" data-provide="datepicker" value="<?= date('F Y') ?>" data-date-format="MM yyyy" data-date-min-view-mode="1">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <button type="button" id="search" class="btn btn-primary"><i class="fas fa-search"></i> Searching</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Sales Report</h4>
                    <div class="col-lg-2">
                        <label for="">Total</label>
                        <input type="text" id="hasil_totals" disabled class="form-control">
                    </div>
                    <canvas id="myChart" height="100vh"></canvas>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card" style="height: 380px;">
                <div class="card-body">
                    <h4 class="card-title mb-4">Report Car</h4>
                    <canvas id="myChart2" data-colors='["--bs-success", "#ebeff2"]' class="chartjs-chart"></canvas>
                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Report Person</h4>
                    <canvas id="myChart3" data-colors='["--bs-success", "#ebeff2"]' class="chartjs-chart"></canvas>
                </div>
            </div>
        </div> <!-- end col -->

    </div>



</div>


<script>
    const ctx = document.getElementById('myChart');
    const ctx2 = document.getElementById('myChart2');
    const ctx3 = document.getElementById('myChart3');
    let days = [];
    var graph = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: days,
            datasets: [{
                label: '',
                data: [],
                borderWidth: 1,
                hoverBackgroundColor: '#a0e39d',
                hoverBorderColor: '#a0e39d',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                },
            }
        }
    });

    var graph2 = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: [],
            datasets: [{
                label: '',
                data: [],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true
                },
            }
        }
    });


    var graph3 = new Chart(ctx3, {
        type: 'doughnut',
        data: {
            labels: [],
            datasets: [{
                label: '',
                data: [],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true
                },
            }
        }
    });


    function updateAjaxGraphc1(dates, dates2) {
        $.ajax({
            url: "/salesreport/reportSales",
            method: "POST",
            data: {
                tanggal: dates,
                tanggal2: dates2,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success: function(e) {
                let label = [];
                let dataVal = [];
                console.log(e)
                for (var i = 0; i < e.length; i++) {
                    label.push(e[i].label);
                    dataVal.push(e[i].value);
                }

                let totals = dataVal.reduce((a, b) => a + b, 0)
                document.getElementById("hasil_totals").value = totals.toFixed(2);

                graph.data.labels = label;
                graph.data.datasets[0].data = dataVal;
                graph.update();

            }
        })
    }

    function updateAjaxGraphc2(dates, dates2) {
        $.ajax({
            url: "/salesreport/reportCar",
            method: "POST",
            data: {
                tanggal: dates,
                tanggal2: dates2,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success: function(e) {
                let label = [];
                let dataVal = [];
                for (var i = 0; i < e.length; i++) {
                    label.push(e[i].car_name);
                    dataVal.push(e[i].total);
                }

                graph2.data.labels = label;
                graph2.data.datasets[0].data = dataVal;
                graph2.update();
            }
        })
    }

    function updateAjaxGraphc3(dates, dates2) {
        $.ajax({
            url: "/salesreport/reportPerson",
            method: "POST",
            data: {
                tanggal: dates,
                tanggal2: dates2,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success: function(e) {
                let label = [];
                let dataVal = [];

                for (var i = 0; i < e.length; i++) {
                    label.push(e[i].names);
                    dataVal.push(e[i].total);
                }

                graph3.data.labels = label;
                graph3.data.datasets[0].data = dataVal;
                graph3.update();
            }
        })
    }


    updateAjaxGraphc1($("#dates").val(), $("#dates2").val())
    updateAjaxGraphc2($("#dates").val(), $("#dates2").val())
    updateAjaxGraphc3($("#dates").val(), $("#dates2").val())

    $("#search").click('change', function() {
        var dates = $("#dates").val();
        var dates2 = $("#dates2").val();
        updateAjaxGraphc1(dates, dates2);
        updateAjaxGraphc2(dates, dates2);
        updateAjaxGraphc3(dates, dates2);
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/admin/salesreport/index.blade.php ENDPATH**/ ?>