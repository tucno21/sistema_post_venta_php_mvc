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
                <?php if (isset($_GET['fechaInicial'])) : ?>
                    <a href="/reportes/excel?fechaInicial=<?php echo $_GET['fechaInicial']; ?>&fechaFinal=<?php echo $_GET['fechaFinal']; ?>" class="btn btn-success float-right">Descargar Reporte en Excel</a>
                <?php else : ?>
                    <a href="/reportes/excel" class="btn btn-success float-right">Descargar Reporte en Excel</a>
                <?php endif; ?>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <?php
                        include 'graficos/graficoVenta.php';
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <?php
                        include 'graficos/productoMasVendido.php';
                        ?>
                    </div>

                    <div class="col-6">
                        <div>
                            <?php
                            include 'graficos/vendorComprador.php';
                            ?>
                        </div>
                        <div>
                            <?php
                            include 'graficos/clientes.php';
                            ?>
                        </div>

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

    //================================================================================================
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData = {
        labels: [
            <?php
            if ($productos != null) {
                foreach ($productos as $prod) {
                    echo "'" . $prod->description . "',";
                }
            } else {
                echo "'0',";
            }
            ?>
        ],
        datasets: [{
            data: [
                <?php
                if ($productos != null) {
                    foreach ($productos as $prod) {
                        echo "'" . $prod->sales . "',";
                    }
                } else {
                    echo "'0',";
                }
                ?>
            ],
            backgroundColor: [
                <?php
                if ($colores2 != null) {
                    for ($i = 0; $i <= count($colores2); $i++) {
                        echo "'" . $colores2[$i] . "',";
                    }
                } else {
                    echo "'#d2d6de',";
                }
                ?>
            ]
        }]
    }
    var pieOptions = {
        legend: {
            display: false
        }
    }
    // Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    // eslint-disable-next-line no-unused-vars
    var pieChart = new Chart(pieChartCanvas, {
        type: 'doughnut',
        data: pieData,
        options: pieOptions
    });

    //===============================================
    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    }

    var mode = 'index'
    var intersect = true

    var $salesChart = $('#sales-chart-vendedores')
    // eslint-disable-next-line no-unused-vars
    var salesChart = new Chart($salesChart, {
        type: 'bar',
        data: {
            labels: [
                <?php
                if ($vendedorTotal != null) {
                    foreach ($vendedorTotal as $key => $value) {
                        echo "'" . $key . "',";
                    }
                } else {
                    echo "'0',";
                }
                ?>
            ],
            datasets: [{
                backgroundColor: '#007bff',
                borderColor: '#007bff',
                data: [
                    <?php
                    if ($vendedorTotal != null) {
                        foreach ($vendedorTotal as $key => $value) {
                            echo "'" . $value . "',";
                        }
                    } else {
                        echo "'0',";
                    }
                    ?>
                ]
            }, ]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect
            },
            hover: {
                mode: mode,
                intersect: intersect
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    // display: false,
                    gridLines: {
                        display: true,
                        lineWidth: '4px',
                        color: 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },
                    ticks: $.extend({
                        beginAtZero: true,

                        // Include a dollar sign in the ticks
                        callback: function(value) {
                            if (value >= 1000) {
                                value /= 1000
                                value += 'k'
                            }

                            return '$' + value
                        }
                    }, ticksStyle)
                }],
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: ticksStyle
                }]
            }
        }
    });

    var $salesChart = $('#sales-chart-clientes')
    // eslint-disable-next-line no-unused-vars
    var salesChart = new Chart($salesChart, {
        type: 'bar',
        data: {
            labels: [
                <?php
                if ($clienteTotal != null) {
                    foreach ($clienteTotal as $key => $value) {
                        echo "'" . $key . "',";
                    }
                } else {
                    echo "'0',";
                }
                ?>
            ],
            datasets: [{
                backgroundColor: '#007bff',
                borderColor: '#007bff',
                data: [
                    <?php
                    if ($clienteTotal != null) {
                        foreach ($clienteTotal as $key => $value) {
                            echo "'" . $value . "',";
                        }
                    } else {
                        echo "'0',";
                    }
                    ?>
                ]
            }, ]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect
            },
            hover: {
                mode: mode,
                intersect: intersect
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    // display: false,
                    gridLines: {
                        display: true,
                        lineWidth: '4px',
                        color: 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },
                    ticks: $.extend({
                        beginAtZero: true,

                        // Include a dollar sign in the ticks
                        callback: function(value) {
                            if (value >= 1000) {
                                value /= 1000
                                value += 'k'
                            }

                            return '$' + value
                        }
                    }, ticksStyle)
                }],
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: ticksStyle
                }]
            }
        }
    });

    //===============================================
</script>