<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear usuario</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card w-75 mx-auto">
            <div class="card-header">
                <a class="btn btn-secondary" href="/usuarios">Volver</a>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <!-- NOMBRE -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="fa fa-user"></i></spam>
                            </div>
                            <input type="text" class="form-control input-lg" name="name" placeholder="Ingresar Nombre" required>
                        </div>
                    </div>
                    <!-- USUARIO -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="fas fa-users-cog"></i></i></spam>
                            </div>
                            <input type="text" class="form-control input-lg" name="username" placeholder="Ingresar Usuario" required>
                        </div>
                    </div>
                    <!-- contraseña -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="fa fa-lock"></i></spam>
                            </div>
                            <input type="password" class="form-control input-lg" name="password" placeholder="Ingresar Contraseña" required>
                        </div>
                    </div>
                    <!-- Perfil -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="fas fa-address-card"></i></spam>
                            </div>
                            <select class="form-control input-lg" name="profile">
                                <option value="">Seleccione Perfil</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Especial">Especial</option>
                                <option value="Vendedor">Vendedor</option>
                            </select>
                        </div>
                    </div>
                    <!-- foto -->
                    <div class="form-group">
                        <label for="imagen">Foto:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="fas fa-image"></i></i></spam>
                            </div>
                            <input type="file" name="photo" id="imagen" accept="image/jpeg, image/png">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="card" style="width: 8rem;">
                            <img class="img-thumbnail card-img-top" src="../adminLte/dist/img/user2-160x160.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Peso máximo de 1mb</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary btn-lg">Agregar</button>
                </div>
            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->