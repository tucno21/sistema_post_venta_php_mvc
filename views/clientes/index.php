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
                        <?php foreach ($clients as $client) : ?>
                            <tr>
                                <td><?php echo $client->id; ?></td>
                                <td><?php echo $client->name; ?></td>
                                <td><?php echo $client->dni; ?></td>
                                <td><?php echo $client->email; ?></td>
                                <td><?php echo $client->telephone; ?></td>
                                <td><?php echo $client->direction; ?></td>
                                <td><?php echo $client->date_birth; ?></td>
                                <td><?php echo $client->sales; ?></td>
                                <td><?php echo $client->registration_date; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-warning" href="/clientes/actualizar?id=<?php echo $client->id; ?>"><i class="fa fa-edit"></i></a>

                                        <a class="btn btn-danger avisoAlertaxx" href="/clientes/eliminar?id=<?php echo $client->id; ?>&tipo=client"><i class="fa fa-times"></i></a>
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