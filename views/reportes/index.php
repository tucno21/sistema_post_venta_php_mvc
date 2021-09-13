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