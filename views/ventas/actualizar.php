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
                    <h1>Editar Venta</h1>
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
                                    <input type="text" class="form-control" value="<?php echo $vendedorUser->name_u; ?>" readonly>

                                    <input type="hidden" name="ventas[sellerId]" value="<?php echo $vendedorUser->id; ?>">

                                </div>
                            </div>
                            <!-- ENTRADA de FACTURA -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <spam class="input-group-text"><i class="fas fa-key"></i></spam>
                                    </div>
                                    <input type="text" class="form-control" name="ventas[sale_code]" value="<?php echo $sale->sale_code; ?>" readonly>
                                </div>
                            </div>
                            <!-- CLIENTE -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <spam class="input-group-text"><i class="fas fa-users"></i></spam>
                                    </div>
                                    <select class="form-control input-lg nuevaCategoria" name="ventas[clientId]" required>
                                        <?php foreach ($clientes as $client) : ?>
                                            <option <?php echo $sale->clientId === $client->id ? 'selected' : ''; ?> value="<?php echo $client->id; ?>"><?php echo $client->name; ?></option>
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
                                    <?php foreach ($productosVendidos as $pv) : ?>

                                        <div class="row">
                                            <!-- DESCRIPCION DEL PRODUCTOS -->
                                            <div class="col-6" style="padding-right:0px">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <spam class="input-group-text"><button type="button" class="btn btn-danger btn-xs eliminarListaProducto" productiId="<?php echo $pv->id; ?>"><i class="fas fa-times"></i></button></spam>
                                                    </div>
                                                    <input type="text" class="form-control descriptionProducto" ventaProductoId="<?php echo $pv->id; ?>" value="<?php echo $pv->description; ?>" readonly required>
                                                </div>
                                            </div>

                                            <!-- CANTIDAD DE PRODUCTO -->
                                            <div class="col-2 " style="padding-right:0px">
                                                <div class="input-group">
                                                    <input type="number" class="form-control cantidadVentaProducto" min="1" value="<?php echo $pv->cantidad; ?>" max="<?php echo $pv->stock + $pv->cantidad; ?>" required>
                                                </div>
                                            </div>

                                            <!-- PRECIO DEL PRODUCTO -->
                                            <div class="col-4 precioVentaProducto">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <spam class="input-group-text"><i class="fas fa-dollar-sign"></i></spam>
                                                    </div>
                                                    <input type="text" class="form-control ModprecioVentaProducto" value="<?php echo $pv->total; ?>" precioReal="<?php echo $pv->precio; ?>" min="1" readonly required>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
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
                                            <input type="number" class="form-control impuestoTotalVentas" placeholder="0" value="<?php echo $sale->tax_result / $sale->net * 100; ?>" min="0" required>
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
                                            <input type="text" class="form-control totalVentasProducto" totalVenta="<?php echo $sale->net; ?>" value="<?php echo $sale->total; ?>" placeholder="0" min="0" readonly required>

                                            <input type="hidden" value="<?php echo $sale->tax_result; ?>" name="ventas[tax_result]" class="soloImpuesto">
                                            <input type="hidden" value="<?php echo $sale->net; ?>" name="ventas[net]" class="precioSinImpuesto">
                                            <input type="hidden" value="<?php echo $sale->total; ?>" name="ventas[total]" class="precioTotalVentas">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- METODO DE PAGO -->
                            <div class="row">
                                <?php if (strpos($sale->payment_method, "TC") !== false) : ?>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <spam class="input-group-text"><i class="fas fa-hand-holding-usd"></i></spam>
                                                </div>

                                                <select class="form-control input-lg metodoTipoPago" required>
                                                    <option value="">Seleccione Forma de pago</option>
                                                    <option value="efectivo">efectivo</option>
                                                    <option selected value="TC">tarjeta credito</option>
                                                    <option value="TD">tarjeta debito</option>
                                                </select>
                                                <input type="hidden" value="<?php echo $sale->payment_method; ?>" class="listaMetodoPago" name="ventas[payment_method]">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 cajasMetodoPago">
                                        <div class="input-group">
                                            <input type="text" class="form-control registroTransaccion" value="<?php echo  substr($sale->payment_method, 3); ?>" required>
                                            <div class="input-group-prepend">
                                                <spam class="input-group-text"><i class="fas fa-lock"></i></spam>
                                            </div>
                                        </div>
                                    </div>
                                <?php elseif (strpos($sale->payment_method, "TD") !== false) : ?>
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
                                                    <option selected value="TD">tarjeta debito</option>
                                                </select>
                                                <input type="hidden" value="<?php echo $sale->payment_method; ?>" class="listaMetodoPago" name="ventas[payment_method]">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 cajasMetodoPago">
                                        <div class="input-group">
                                            <input type="text" class="form-control registroTransaccion" value="<?php echo  substr($sale->payment_method, 3); ?>" required>
                                            <div class="input-group-prepend">
                                                <spam class="input-group-text"><i class="fas fa-lock"></i></spam>
                                            </div>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <spam class="input-group-text"><i class="fas fa-hand-holding-usd"></i></spam>
                                                </div>

                                                <select class="form-control input-lg metodoTipoPago" required>
                                                    <option value="">Seleccione Forma de pago</option>
                                                    <option selected value="efectivo">efectivo</option>
                                                    <option value="TC">tarjeta credito</option>
                                                    <option value="TD">tarjeta debito</option>
                                                </select>
                                                <input type="hidden" value="<?php echo $sale->payment_method; ?>" class="listaMetodoPago" name="ventas[payment_method]">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 cajasMetodoPago">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <spam class="input-group-text"><i class="fa fa-dollar-sign"></i></spam>
                                            </div>
                                            <input type="text" class="form-control entradaEfectivo" placeholder="0" required>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <spam class="input-group-text"><i class="fa fa-dollar-sign"></i></spam>
                                            </div>
                                            <input type="text" class="form-control salidaEfectivo" placeholder="0" readonly required>
                                        </div>
                                    </div>
                                <?php endif; ?>
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