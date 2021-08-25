<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Actualizar Producto</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card w-75 mx-auto">
            <div class="card-header">
                <a class="btn btn-secondary" href="/productos">Volver</a>
            </div>
            <form method="POST" enctype="multipart/form-data">
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

                    <!-- CATEGORIA -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="fas fa-money-check"></i></spam>
                            </div>
                            <select class="form-control input-lg nuevaCategoria" name="product[categoryId]">
                                <option value="">Seleccione Categoria</option>
                                <?php foreach ($categorias as $category) : ?>
                                    <option <?php echo $product->categoryId === $category->id ? 'selected' : ''; ?> value="<?php echo $category->id; ?>"><?php echo $category->category; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- CODIGO -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="fas fa-code"></i></spam>
                            </div>
                            <input type="number" class="form-control input-lg" id="nuevoCodigo" name="product[code]" placeholder="Ingresar Código" value='<?php echo $product->code; ?>' readonly required>
                        </div>
                    </div>
                    <!-- DESCRIPCION -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="fas fa-file-alt"></i></spam>
                            </div>
                            <input type="text" class="form-control input-lg" name="product[description]" placeholder="Ingresar Descripción" value='<?php echo $product->description; ?>' required>
                        </div>
                    </div>
                    <!-- STOCK -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="fas fa-layer-group"></i></spam>
                            </div>
                            <input type="number" class="form-control input-lg" name="product[stock]" placeholder="stock" value='<?php echo $product->stock; ?>' required>
                        </div>
                    </div>
                    <div class="form-group row row-cols-1 row-cols-md-2">
                        <div class="col  mt-2">
                            <!-- PRECIO DE COMPRA -->
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <spam class="input-group-text"><i class="fas fa-dollar-sign"></i></spam>
                                </div>
                                <input type="number" class="form-control input-lg" id="precioCompra" name="product[price_buy]" placeholder="Precio de compra" min="0" step="any" value='<?php echo $product->price_buy; ?>' required>
                            </div>
                        </div>
                        <div class="col mt-2">
                            <!-- PRECIO DE VENTA -->
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <spam class="input-group-text"><i class="fas fa-hand-holding-usd"></i></spam>
                                </div>
                                <input type="number" class="form-control input-lg" id="precioVenta" name="product[price_sale]" placeholder="Precio de venta" min="0" step="any" value='<?php echo $product->price_sale; ?>' required>
                            </div>
                            <div class=" mt-2 row row-cols-1 row-cols-md-2">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="icheck-primary">
                                            <input type="checkbox" class="ventaporcentaje" id="ventaporcentaje" checked>
                                            <label for="ventaporcentaje">Utilizar porcentaje
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="input-group">
                                        <input type="number" id="valorPorcentaje" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                                        <div class="input-group-prepend">
                                            <spam class="input-group-text"><i class="fas fa-percent"></i></spam>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- foto -->
                    <div class="form-group">
                        <label for="imagen">Imagen Producto:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="fas fa-image"></i></i></spam>
                            </div>
                            <input type="file" name="product[image]" id="imagen" class="visorFoto">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="card" style="width: 8rem;">
                            <?php if (!empty($product->image)) : ?>
                                <img class="img-thumbnail card-img-top previsualizar" src="../imagenes/<?php echo $product->image; ?>" alt="Card image cap">
                            <?php else : ?>
                                <img class="img-thumbnail card-img-top previsualizar" src="../adminLte/dist/img/user2-160x160.jpg" alt="Card image cap">
                            <?php endif; ?>
                            <div class="card-body">
                                <p class="card-text">Peso máximo de 1mb</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary btn-lg">Actualizar Producto</button>
                </div>
            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->