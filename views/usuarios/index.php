<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Panel de Usuarios</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" href="/usuarios/crear">Agregar Usuario</a>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped dtr-inline dt-responsive tablas ">
                    <thead>
                        <tr>
                            <th style="width: 10px;">N°</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Foto</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th>Ultimo Login</th>
                            <th>Aciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?php echo $user->id; ?></td>
                                <td><?php echo $user->name; ?></td>
                                <td><?php echo $user->username; ?></td>

                                <?php if ($user->photo == "") : ?>
                                    <td><img src="../adminLte/dist/img/user2-160x160.jpg" alt="avatar" class="img-thumbnail" width="40px"></td>
                                <?php else : ?>
                                    <td><img src="<?php echo $user->photo; ?>" alt="avatar" class="img-thumbnail" width="40px"></td>
                                <?php endif; ?>

                                <td><?php echo $user->profile; ?></td>
                                <td><button class="btn btn-success btn-xs"><?php echo $user->condition; ?></button></td>
                                <td><?php echo $user->last_login; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-warning" href="/usuarios/actualizar?id=<?php echo $user->id; ?>"><i class="fa fa-edit"></i></a>

                                        <form method="POST" action="/usuarios/eliminar">
                                            <input type="hidden" name="id" value="1">
                                            <input type="hidden" name="tipo" value="usuario">
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                        </form>

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