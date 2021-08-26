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

                        <tr>
                            <td>1</td>
                            <td>00001</td>
                            <td>empresa</td>
                            <td>carlos</td>
                            <td>contado </td>
                            <th>20</th>
                            <th>200</th>
                            <th>12/12/2021</th>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-info" href="ventas/actualizar?id=1"><i class="fa fa-print"></i></a>

                                    <a class="btn btn-danger avisoAlertaxx" href="ventas/eliminar?id=1&tipo=user"><i class="fa fa-times"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                FOOTER
            </div>
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->