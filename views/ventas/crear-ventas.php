<?php
error_reporting(error_reporting() & ~E_NOTICE);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Generar Venta</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- //el formulario -->
            <div class="col col-lg-5">
                <div class="card card-success">
                    <form method="POST" class="formularioVenta">
                        <div class="card-header bg-success">
                        </div>
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

                            <!-- ENTRADA DEL VENDEDOR -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <spam class="input-group-text"><i class="fas fa-user"></i></spam>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo  $_SESSION['name']; ?>" readonly>

                                    <input type="hidden" name="ventas[sellerId]" value="<?php echo ($_SESSION["id"]); ?>">

                                </div>
                            </div>
                            <!-- ENTRADA de FACTURA -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <spam class="input-group-text"><i class="fas fa-key"></i></spam>
                                    </div>
                                    <?php if (!$Ultima_venta) : ?>
                                        <input type="text" class="form-control" name="ventas[sale_code]" value="10000001" readonly>
                                    <?php else : ?>
                                        <input type="text" class="form-control" name="ventas[sale_code]" value="<?php echo $Ultima_venta->sale_code + 1; ?>" readonly>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- CLIENTE -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <spam class="input-group-text"><i class="fas fa-users"></i></spam>
                                    </div>
                                    <select class="form-control input-lg nuevaCategoria" name="ventas[clientId]">
                                        <option value="">Seleccione Cliente</option>
                                        <?php foreach ($clientes as $client) : ?>
                                            <option value="<?php echo $client->id; ?>"><?php echo $client->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="input-group-prepend">
                                        <spam class="input-group-text">
                                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modalAgregarCleinte">Agregar Cliente</button>
                                        </spam>
                                    </div>

                                </div>
                            </div>

                            <!-- ENTRADA de FACTURA -->
                            <!-- BLOQUE DE IMPUTS -->
                            <div class="form-group">
                                <div class="row nuevoProductoventa">
                                    <!-- DESCRIPCION DEL PRODUCTOS
                                    <div class="col-6" style="padding-right:0px">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <spam class="input-group-text"><button type="button" class="btn btn-danger btn-xs"><i class="fas fa-times"></i></button>
                                                </spam>
                                            </div>
                                            <input type="text" class="form-control" name="ventas[description]" placeholder="Descripción del producto" required>
                                        </div>
                                    </div>
                                    CANTIDAD DE PRODUCTO
                                    <div class="col-2 " style="padding-right:0px">
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="ventas[cantidad]" min="1" placeholder="0" required>
                                        </div>
                                    </div>
                                    PRECIO DEL PRODUCTO
                                    <div class="col-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <spam class="input-group-text"><i class="fas fa-dollar-sign"></i></spam>
                                            </div>
                                            <input type="number" class="form-control" name="ventas[precio]" placeholder="00000" min="1" readonly required>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <!-- FIN BLOQUE DE IMPUTS -->
                            <!-- <button type="button" class="btn btn-default d-block d-sm-block d-md-none">Agregar Producto</button> -->
                            <input type="hidden" name="ventas[products]" class="listaProductosVendidos">
                            <!-- IMPUESTO Y EL TOTAL -->
                            <div class="row">
                                <div class="col-4">

                                </div>
                                <!-- IMPUESTO -->
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">Impuesto</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control impuestoTotalVentas" placeholder="0" min="0" required>
                                            <div class="input-group-prepend">
                                                <spam class="input-group-text"><i class="fas fa-percent"></i></spam>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">Total</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <spam class="input-group-text"><i class="fas fa-dollar-sign"></i></spam>
                                            </div>
                                            <input type="text" class="form-control totalVentasProducto" name="ventas[total]" totalVenta="" placeholder="0" min="0" readonly required>
                                            <input type="hidden" name="ventas[tax_result]" class="soloImpuesto">
                                            <input type="hidden" name="ventas[net]" class="precioSinImpuesto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- METODO DE PAGO -->
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <spam class="input-group-text"><i class="fas fa-hand-holding-usd"></i></spam>
                                            </div>
                                            <select class="form-control input-lg metodoTipoPago" required>
                                                <option value="">Seleccione Forma de pago</option>
                                                <option value="efectivo">efectivo</option>
                                                <option value="TC">tarjeta credito</option>
                                                <option value="TD">tarjeta debito</option>
                                            </select>
                                            <input type="hidden" class="listaMetodoPago" name="ventas[payment_method]">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 cajasMetodoPago">
                                    <!-- <div class="input-group">
                                        <input type="text" class="form-control" name="ventas[tarjeta]" placeholder="Codigo de transacción" required>
                                        <div class="input-group-prepend">
                                            <spam class="input-group-text"><i class="fas fa-lock"></i></spam>
                                        </div>
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <spam class="input-group-text"><i class="fa-dollar-sign"></i></spam>
                                        </div>
                                        <input type="text" class="form-control" placeholder="0" required>
                                    </div> -->
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="float-right btn btn-success">Guardar Venta</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- //tabla de productos -->
            <div class="col-lg-7 ">
                <div class="card card-warning">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped dtr-inline dt-responsive tablaProductosVentas">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">N°</th>
                                    <th>Imagen</th>
                                    <th>Código</th>
                                    <th>Descripción</th>
                                    <th>Stock</th>
                                    <th>Aciones</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                    <!-- <div class="card-footer">

                    </div> -->
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- MODAL -->
<div class="modal fade" id="modalAgregarCleinte" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Agregar Cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST">
                <?php
                if (isset($errorCliente)) {
                    foreach ($errorCliente as $errorClient) :
                ?>
                        <div class="alert alert-danger">
                            <?php echo $errorClient; ?>
                        </div>
                <?php
                    endforeach;
                }
                ?>
                <div class="modal-body">
                    <!-- NOMBRE -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="fas fa-user"></i></spam>
                            </div>
                            <input type="text" class="form-control input-lg" name="client[name]" placeholder="Ingresar Nombre" required>
                        </div>
                    </div>
                    <!-- DNI -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="far fa-id-card"></i></spam>
                            </div>
                            <input type="text" class="form-control input-lg" name="client[dni]" placeholder="Ingresar DNI" data-inputmask="'mask':'99999999'" data-mask required>
                        </div>
                    </div>
                    <!-- EMAIL -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="fas fa-envelope"></i></spam>
                            </div>
                            <input type="email" class="form-control input-lg" name="client[email]" placeholder="Ingresar email" required>
                        </div>
                    </div>
                    <!-- TELEFONO -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="fas fa-phone"></i></spam>
                            </div>
                            <input type="text" class="form-control input-lg" name="client[telephone]" placeholder="Ingresar el telefono" data-inputmask="'mask':'999-999-999'" data-mask required>
                        </div>
                    </div>
                    <!-- DIRECCION -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="fas fa-address-book"></i></spam>
                            </div>
                            <input type="text" class="form-control input-lg" name="client[direction]" placeholder="Ingresar dirección" required>
                        </div>
                    </div>
                    <!-- FECHA DE NACIMIENTO -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="far fa-calendar-alt"></i></spam>
                            </div>
                            <input type="text" class="form-control input-lg" name="client[date_birth]" placeholder="Ingresar fecha de nacimiento" id="datemask" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask required>
                        </div>
                    </div>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>