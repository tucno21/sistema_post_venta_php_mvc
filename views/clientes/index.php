<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Panel de Clientes</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" href="/clientes/crear">Agregar Cliente</a>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped dtr-inline dt-responsive tablaDataTable">
                    <thead>
                        <tr>
                            <th style="width: 10px;">N°</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Total de compras</th>
                            <th>Última compra</th>
                            <th>Aciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>carlos</td>
                            <td>42769197</td>
                            <td>correo@correo.com</td>
                            <td>966943572</td>
                            <td>av san jose 214</td>
                            <td>20/10/2021</td>
                            <td>15</td>
                            <td>2021-15-16</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-warning" href="/clientes/actualizar?id=1"><i class="fa fa-edit"></i></a>

                                    <a class="btn btn-danger avisoAlertaxx" href="/clientes/eliminar?id=1&tipo=user"><i class="fa fa-times"></i></a>
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