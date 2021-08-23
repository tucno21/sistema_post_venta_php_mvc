<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administrar Categorias</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" href="/categorias/crear">Agregar Categoria</a>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped dtr-inline dt-responsive tablaDataTable ">
                    <thead>
                        <tr>
                            <th style="width: 10px;">N°</th>
                            <th>Categoria</th>
                            <th>Aciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <td>1</td>
                        <td>computadora</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-warning" href="/categorias/actualizar?id=1"><i class="fa fa-edit"></i></a>

                                <a class="btn btn-danger avisoAlertaxx" href="/categorias/eliminar?id=1&tipo=user"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
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