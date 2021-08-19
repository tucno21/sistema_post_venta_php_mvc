<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Usuario</h1>
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
                    <?php include __DIR__ . '/form.php'; ?>

                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary btn-lg">Cambiar</button>
                </div>
            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->