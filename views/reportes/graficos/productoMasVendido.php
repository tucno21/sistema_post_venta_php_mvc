<div class="card">
    <div class="card-header">
        <h3 class="card-title">Productos mas Vendidos</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="chart-responsive">
                    <canvas id="pieChart" height="150"></canvas>
                </div>
                <!-- ./chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
                <ul class="clearfix chart-legend">
                    <?php
                    $i = 0;
                    foreach ($productos as $producto) : ?>
                        <li><i class="far fa-circle text-<?php echo $colores[$i]; ?>"></i> <?php echo $producto->description;
                                                                                            $i++; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.card-body -->
    <div class="p-0 card-footer bg-light">
        <ul class="nav nav-pills flex-column">
            <?php
            $i = 0;
            foreach ($productos as $producto) : ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <?php echo $producto->description;
                        $i++; ?>
                        <span class="float-right text-<?php echo $colores[$i]; ?>">
                            <i class="text-sm fas fa-arrow-down"></i>
                            <?php echo round(($producto->sales / $total) * 100, 1); ?>%</span>
                    </a>
                </li>
            <?php endforeach; ?>
            <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                    India
                    <span class="float-right text-success">
                        <i class="text-sm fas fa-arrow-up"></i> 4%
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    China
                    <span class="float-right text-warning">
                        <i class="text-sm fas fa-arrow-left"></i> 0%
                    </span>
                </a>
            </li> -->
        </ul>
    </div>
    <!-- /.footer -->
</div>
<!-- /.card -->