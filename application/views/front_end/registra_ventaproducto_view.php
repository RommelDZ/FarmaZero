<?php
/*Formulario Principal Registrar Producto Venta*/
    $atributos_form = array(
        'role'          => 'form'
    );

    $input_nombre_ventaproducto = array(
        'name'          => 'nombre_ventaproducto',
        'id'            => 'nombre_ventaproducto',
        'class'         => 'form-control',
        'readonly'      => 'readonly',
        'placeholder'   => 'Nombre Producto',
        'value'         => set_value('nombre_ventaproducto')
    );

    $input_id_producto = array(
        'name'          => 'id_producto',
        'id'            => 'id_producto',
        'type'          => 'hidden',
        'value'         => set_value('id_producto')
    );

    $input_cantidad_ventaproducto = array(
        'type'          => 'number',
        //'min'           => '1',    
        'name'          => 'cantidad_ventaproducto',
        'id'            => 'cantidad_ventaproducto',
        'class'         => 'form-control',
        'placeholder'   => 'Cantidad de Productos',
        'value'         => set_value('cantidad_ventaproducto')
    );

    $input_importe_ventaproducto = array(
        'name'          => 'importe_ventaproducto',
        'id'            => 'importe_ventaproducto',
        'class'         => 'form-control',
        'readonly'      => 'readonly',
        'placeholder'   => 'Importe de Productos',
        'value'         => set_value('importe_ventaproducto')
    );

    $input_stock_producto = array(
        'name'          => 'stock_producto',
        'id'            => 'stock_producto',
        'class'			=> 'form-control',
        'readonly'      => 'readonly',
        'placeholder'	=> 'Stock del Producto',
        'value'			=> set_value('stock_producto')
    );

    $input_precio_producto = array(
        'name'          => 'precio_producto',
        'id'            => 'precio_producto',
        'class'         => 'form-control',
        'readonly'      => 'readonly',
        'placeholder'   => 'Precio Unitario del Producto',
        'value'         => set_value('precio_producto')
    );

    $input_stock_fijo = array(
        'name'          => 'stock_fijo',
        'id'            => 'stock_fijo',
        'type'          => 'hidden',
        'value'         => set_value('stock_fijo')
    );

    $btn_agregar = array(
        'name'          => 'btn_agregar',
        'id'            => 'btn_agregar',
        'class'			=> 'btn btn-primary',
        'type'          => 'submit',
        'value'       	=> 'Agregar al carrito'
    );
?>

<section class="row clearfix">
    <div class="col-md-12 column">
        <?= form_open('', $atributos_form) ?>
        <div class="row clearfix frm-header">
            <div class="col-md-10 column">
                <h3>Venta de Productos</h3>
            </div>
            <div class="col-md-2 column btn-new">
                <a href="<?= base_url() ?>registra_venta" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Ver Carrito</a>
            </div>
        </div>
        <hr />
        <div class="row clearfix">
            <div class="col-md-12 column">
                <label class="lbl-pharma">Agregar Producto</label>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="frm-pharma">
                    <div class="row clearfix">
                        <div class="form-group col-md-4">
                            <?= form_label('Producto', 'nombre_producto') ?>
                            <?= form_input($input_nombre_ventaproducto) ?>
                            
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#popupListarProductos">
                                <span class="glyphicon glyphicon-search"></span> Buscar
                            </button>

                            <?= form_error('nombre_ventaproducto') ?>

                            <!-- recuperamos el id_producto para usuarlo a la hora de almacenar en la Base de Datos -->
                            <?= form_input($input_id_producto) ?>
                        </div>
                        <div class="form-group col-md-4">
                            <?= form_label('Stock', 'stock_producto') ?>
                            <?= form_input($input_stock_producto) ?>
                            <?= form_error('stock_producto') ?>
                        </div>
                        <div class="form-group col-md-4">
                            <?= form_label('Precio', 'precio_producto') ?>
                            <?= form_input($input_precio_producto) ?>
                            <?= form_error('precio_producto') ?>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="form-group col-md-4">
                            <?= form_label('Cantidad', 'cantidad_ventaproducto') ?>
                            <?= form_input($input_cantidad_ventaproducto) ?>

                            <?= form_error('cantidad_ventaproducto') ?>
                        </div>
                        <div class="form-group col-md-4">
                            <?= form_label('Importe', 'importe_ventaproducto') ?>
                            <?= form_input($input_importe_ventaproducto) ?>
                            <?= form_error('importe_ventaproducto') ?>
                        </div>
                        <div class="form-group">
                            <?= form_input($input_stock_fijo) ?>
                            <?= form_error('stock_fijo') ?>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn btn-warning">
                                <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Agregar al Carrito
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= form_close() ?>

        <!-- Modal Listar Productos -->
        <div class="modal fade" id="popupListarProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" id="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><span class="sr-only">Cerrar</span></button>
                        <h4 class="modal-title" id="myModalLabel">Listado de Productos</h4>
                    </div>
                    <div id="listarProductos" class="modal-body">
                        <div class="row clearfix">  
                            <div class="col-md-12 column table-responsive">
                                <table id="tblDatos" class="table hover order-column table-striped">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Stock</th>
                                            <th>Fecha Vencimiento</th>
                                            <th>Laboratorio</th>
                                            <th>Presentación</th>
                                            <th>Categoria</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <th>Código</th>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Stock</th>
                                            <th>Fecha Vencimiento</th>
                                            <th>Laboratorio</th>
                                            <th>Presentación</th>
                                            <th>Categoria</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                  
                                    <tbody>
                                    <?php  $i = 1; foreach ($listadoProductos as $producto):?>
                                        <tr>
                                            <td><?= $producto->id_producto ?></td>
                                            <td><?= $producto->nombre_producto ?></td>
                                            <td><?= number_format($producto->precio_producto, 2, ',', '') ?> Bs.</td>
                                            <td><?= $producto->stock_producto ?></td>
                                            <td data-order="<?= $producto->fechavencimiento_producto ?>"><?= date("d/m/Y",strtotime($producto->fechavencimiento_producto)) ?></td>
                                            <td><?= $producto->nombre_laboratorio ?></td>
                                            <td><?= $producto->nombre_presentacionproducto ?></td>
                                            <td><?= $producto->nombre_categoriaproducto ?></td>
                                            <td>
                                                <button type="button" class="btn btn-success" id="botonProductos"  onClick="pasarDatosProducto('<?= $producto->id_producto ?>','<?= $producto->nombre_producto ?>','<?= $producto->stock_producto ?>','<?= $producto->precio_producto ?>')" data-dismiss="modal" title="Seleccionar"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></button>  
                                            </td>
                                        </tr>
                                    <?php $i++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Funcion JavaScript para pasar datos desde ventana modal a formulario -->
        <script type="text/javascript">
            //EVENTOS EN javascript
            function pasarDatosProducto(id,nombre,stock,precio){
                document.getElementById('id_producto').value = id;
                document.getElementById('nombre_ventaproducto').value = nombre;
                document.getElementById('stock_producto').value = stock;
                document.getElementById('stock_fijo').value = stock;
                document.getElementById('precio_producto').value =  parseFloat(precio).toFixed(2);
                //importe de productos en venta conforme se pasan los datos de Producto
                var importe = document.getElementById('precio_producto').value * document.getElementById('cantidad_ventaproducto').value;
                /*document.getElementById('importe_ventaproducto').value = Math.round(importe*100)/100;*/
                document.getElementById('importe_ventaproducto').value = parseFloat(importe).toFixed(2);
                //stock de productos restantes en venta conforme se pasan los datos de Producto
                var stock = document.getElementById('stock_producto').value - document.getElementById('cantidad_ventaproducto').value;
                document.getElementById('stock_producto').value = stock;
            }
        </script>

    </div>
</section>