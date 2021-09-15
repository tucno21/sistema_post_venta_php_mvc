<?php
error_reporting(error_reporting() & ~E_NOTICE);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['profile'])) {
    $profile = $_SESSION['profile'];
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Administrar Ventas</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">

                <a class="btn btn-primary" href="ventas/crear">Agregar Venta</a>

                <button type="button" id="fechasDeVentas" class="btn btn-default float-right">
                    <i class="far fa-calendar-alt"></i> Ver por fechas
                    <i class="fas fa-caret-down"></i>
                </button>

            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped dtr-inline dt-responsive tablaDataTable">
                <thead>
                    <tr>
                        <th style="width: 10px;">N°</th>
                        <th>Código factura</th>
                        <th>Cliente</th>
                        <th>vendedor</th>
                        <th>Forma de pago</th>
                        <th>Neto</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        <th>Aciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($ventas as $venta) : ?>
                        <tr>
                            <td><?php echo $venta->id; ?></td>
                            <td><?php echo $venta->sale_code; ?></td>
                            <td><?php echo $venta->name; ?></td>
                            <td><?php echo $venta->name_u; ?></td>
                            <td><?php echo $venta->payment_method; ?></td>
                            <th><?php echo $venta->net; ?></th>
                            <th><?php echo $venta->total; ?></th>
                            <th><?php echo $venta->registration_date; ?></th>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-info" href="/ventas/factura?id=<?php echo $venta->id; ?>" target="_blank"><i class="fa fa-print"></i></a>

                                    <?php if ($profile == "Administrador") : ?>
                                        <a class="btn btn-warning" href="/ventas/actualizar?id=<?php echo $venta->id; ?>"><i class="fa fa-edit"></i></a>

                                        <a class="btn btn-danger avisoAlertaxx" href="/ventas/eliminar?id=<?php echo $venta->id; ?>&tipo=venta"><i class="fa fa-times"></i></a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</div>


</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->