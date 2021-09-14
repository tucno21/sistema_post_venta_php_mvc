<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Panel de Reportes</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <button type="button" id="fechasReportes" class="btn btn-default">
                    <i class="far fa-calendar-alt"></i> Ver por fechas
                    <i class="fas fa-caret-down"></i>
                </button>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <?php
                        include 'graficos/graficoVenta.php';
                        ?>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                FOOTER
            </div>
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script>
    // Sales graph chart
    var salesGraphChartCanvas = $('#line-chart-ventas').get(0).getContext('2d');
    // $('#revenue-chart').get(0).getContext('2d');

    var salesGraphChartData = {
        labels: [
            <?php
            if ($fechaVentaMes != null) {
                foreach ($fechaVentaMes as $key => $value) {
                    echo "'" . $key . "',";
                }
            } else {
                echo "'0',";
            }
            ?>
        ],
        datasets: [{
            label: 'Ventas',
            fill: false,
            borderWidth: 2,
            lineTension: 0,
            spanGaps: true,
            borderColor: '#efefef',
            pointRadius: 3,
            pointHoverRadius: 7,
            pointColor: '#efefef',
            pointBackgroundColor: '#efefef',
            data: [
                <?php
                if ($fechaVentaMes != null) {
                    foreach ($fechaVentaMes as $key => $value) {
                        echo "'" . $value . "',";
                    }
                } else {
                    echo "'0',";
                }
                ?>
            ]
        }]
    }

    var salesGraphChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                ticks: {
                    fontColor: '#efefef'
                },
                gridLines: {
                    display: false,
                    color: '#efefef',
                    drawBorder: false
                }
            }],
            yAxes: [{
                ticks: {
                    stepSize: <?php echo $separacionY; ?>,
                    fontColor: '#efefef'
                },
                gridLines: {
                    display: true,
                    color: '#efefef',
                    drawBorder: false
                }
            }]
        }
    }

    // This will get the first returned node in the jQuery collection.
    // eslint-disable-next-line no-unused-vars
    var salesGraphChart = new Chart(salesGraphChartCanvas, { // lgtm[js/unused-local-variable]
        type: 'line',
        data: salesGraphChartData,
        options: salesGraphChartOptions
    });
</script>