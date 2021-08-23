<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Panel de Productos</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" href="/productos/crear">Agregar Producto</a>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped dtr-inline dt-responsive tablaDataTable">
                    <thead>
                        <tr>
                            <th style="width: 10px;">N°</th>
                            <th>Imagen</th>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Categoria</th>
                            <th>Stock</th>
                            <th>Precio de compra</th>
                            <th>Precio de Venta</th>
                            <th>F. Registro</th>
                            <th>Aciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="../adminLte/dist/img/user2-160x160.jpg" alt="avatar" class="img-thumbnail" width="40px"></td>
                            <td>0001</td>
                            <td>Lorem ipsum dolor, sit amet</td>
                            <td>Lorem</td>
                            <td>20</td>
                            <td>5.00</td>
                            <td>10.00</td>
                            <td>2021-12-11 12:05:32</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-warning" href="/productos/actualizar?id=1"><i class="fa fa-edit"></i></a>

                                    <a class="btn btn-danger avisoAlertaxx" href="/productos/eliminar?id=1&tipo=user"><i class="fa fa-times"></i></a>
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