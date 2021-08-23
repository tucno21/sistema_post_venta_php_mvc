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
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td><?php echo $product->id; ?></td>
                                <td><img src="../adminLte/dist/img/user2-160x160.jpg" alt="avatar" class="img-thumbnail" width="40px"></td>
                                <td><?php echo $product->code; ?></td>
                                <td><?php echo $product->description; ?></td>
                                <td><?php echo $product->category; ?></td>
                                <td><?php echo $product->stock; ?></td>
                                <td><?php echo $product->price_buy; ?></td>
                                <td><?php echo $product->price_sale; ?></td>
                                <td><?php echo $product->date; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-warning" href="/productos/actualizar?id=<?php echo $product->id; ?>"><i class="fa fa-edit"></i></a>

                                        <a class="btn btn-danger avisoAlertaxx" href="/productos/eliminar?id=<?php echo $product->id; ?>&tipo=product"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
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