<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Actualizar Cliente</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card w-75 mx-auto">
            <div class="card-header">
                <a class="btn btn-secondary" href="/clientes">Volver</a>
            </div>
            <form method="POST">
                <div class="card-body">
                    <?php
                    if (isset($errores)) {
                        foreach ($errores as $error) :
                    ?>
                            <div class="alert alert-danger">
                                <?php echo $error; ?>
                            </div>
                    <?php
                        endforeach;
                    }

                    ?>

                    <!-- NOMBRE -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="fas fa-user"></i></spam>
                            </div>
                            <input type="text" class="form-control input-lg" name="client[name]" placeholder="Ingresar Nombre" value="<?php echo $client->name; ?>" required>
                        </div>
                    </div>
                    <!-- DNI -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="far fa-id-card"></i></spam>
                            </div>
                            <input type="text" class="form-control input-lg" name="client[dni]" placeholder="Ingresar DNI" data-inputmask="'mask':'99999999'" data-mask value="<?php echo $client->dni; ?>" required>
                        </div>
                    </div>
                    <!-- EMAIL -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="fas fa-envelope"></i></spam>
                            </div>
                            <input type="email" class="form-control input-lg" name="client[email]" placeholder="Ingresar email" value="<?php echo $client->email; ?>" required>
                        </div>
                    </div>
                    <!-- TELEFONO -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="fas fa-phone"></i></spam>
                            </div>
                            <input type="text" class="form-control input-lg" name="client[telephone]" placeholder="Ingresar el telefono" data-inputmask="'mask':'999-999-999'" data-mask value="<?php echo $client->telephone; ?>" required>
                        </div>
                    </div>
                    <!-- DIRECCION -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="fas fa-address-book"></i></spam>
                            </div>
                            <input type="text" class="form-control input-lg" name="client[direction]" placeholder="Ingresar dirección" value="<?php echo $client->direction; ?>" required>
                        </div>
                    </div>
                    <!-- FECHA DE NACIMIENTO -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="far fa-calendar-alt"></i></spam>
                            </div>
                            <input type="text" class="form-control input-lg" name="client[date_birth]" placeholder="Ingresar fecha de nacimiento" id="datemask" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask value="<?php echo $client->date_birth; ?>" required>
                        </div>
                    </div>


                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary btn-lg">Actualizar Cliente</button>
                </div>
            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->