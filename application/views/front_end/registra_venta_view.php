<?php

/*Formulario Principal Registrar Producto Venta*/
    $atributos_form = array(
        'id'            => 'form',
        'role'          => 'form'
    );

    $input_nombre_cliente = array(
        'type'          => 'text',
        'name'          => 'nombre_cliente',
        'id'            => 'nombre_cliente',
        'class'         => 'form-control',
        'readonly'      => 'readonly',
        'placeholder'   => 'Nombre Cliente',
        'value'         => set_value('nombre_cliente')
    );

    $input_id_cliente = array(
        'name'          => 'id_cliente',
        'id'            => 'id_cliente',
        'type'          => 'hidden',
        'value'         => set_value('id_cliente')
    );

    $input_nit_cliente = array(
        'type'          => 'text',
        'name'          => 'nit_cliente',
        'id'            => 'nit_cliente',
        'class'         => 'form-control',
        'readonly'      => 'readonly',
        'placeholder'   => 'NIT o CI',
        'value'         => set_value('nit_cliente')
    );

    $input_importe_total = array(
        'name'          => 'importe_total',
        'id'            => 'importe_total',
        'type'          => 'hidden',
        'value'         => set_value(0, $this->cart->total())
    );
    $btn_guardar_venta = array(
        'name'          => 'btn_guardar_venta',
        'id'            => 'btn_guardar_venta',
        'class'         => 'btn btn-primary',
        'type'          => 'submit',
        'value'         => 'Guardar Venta'
    );

    $btn_vaciar_carrito = array(
        'name'          => 'btn_vaciar_carrito',
        'id'            => 'btn_vaciar_carrito',
        'class'         => 'btn btn-danger',
        'type'          => 'submit',
        'value'         => 'Vaciar Carrito'
    );


/*Formulario Secundario de Registrar Nuevo Cliente*/
    $atributos_form_modal = array(
        'id'            => 'form_modal',
        'role'          => 'form'
    );

    $input_nit_cliente_modal = array(
        'name'          => 'nit_cliente',
        'id'            => 'nit_cliente_modal',
        'class'         => 'form-control',
        'maxlength'     => '50',
        'placeholder'   => 'Ingrese número NIT o CI',
        'value'         => set_value('nit_cliente')
    );

    $input_nombre_cliente_modal = array(
        'name'          => 'nombre_cliente',
        'id'            => 'nombre_cliente_modal',
        'class'         => 'form-control',
        'maxlength'     => '100',
        'placeholder'   => 'Ingrese Nombre(s) y Apellido(s)',
        'value'         => set_value('nombre_cliente')
    );

    $input_direccion_cliente_modal = array(
        'name'          => 'direccion_cliente',
        'id'            => 'direccion_cliente_modal',
        'class'         => 'form-control',
        'maxlength'     => '50',
        'placeholder'   => 'Ingrese Dirección',
        'value'         => set_value('direccion_cliente')
    );

    $input_telefono_cliente_modal = array(
        'name'          => 'telefono_cliente',
        'id'            => 'telefono_cliente_modal',
        'class'         => 'form-control',
        'placeholder'   => 'Ingresa Número Telefónico',
        'maxlength'     => '50',
        'value'         => set_value('telefono_cliente')
    );

    $opciones_estado_cliente_modal = array(
        '1'             => 'ACTIVO',
        '0'             => 'INACTIVO',
    );

    $atributos_estado_cliente_modal = 'id="estado_cliente_modal" class="form-control"';

    $input_id_cliente_modal = array(
        'name'          => 'id_cliente',
        'id'            => 'id_cliente_modal',
        'type'          => 'hidden',
        'value'         => set_value('id_cliente')
    );

    $btn_guardar_modal = array(
        'name'          => 'btn_guardar',
        'id'            => 'btn_guardar',
        'class'         => 'btn btn-primary',
        'type'          => 'submit',
        'value'         => 'Guardar cambios'
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
                <span class="icon-input-btn"><span class="glyphicon glyphicon-floppy-disk"></span> 
                    <?= form_submit($btn_guardar_venta) ?>
                </span>
                <!-- <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Guardar Venta
                </button> -->
            </div>
        </div>
        <hr />
        <br />
        <div class="row clearfix">  
            <div class="col-md-2 column">
            </div>          
            <div class="col-md-8 column">
                <a href="<?= base_url() ?>ventas" class="btn btn-warning"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Productos</a>
            </div>
        </div>
        <div class="row clearfix">  
            <div class="col-md-2 column">
            </div>
            <div class="col-md-8 column">
                <label class="lbl-pharma">Carrito de Productos Agregados</label>
            </div>
        </div>
        <div class="row clearfix">  
            <div class="col-md-2 column">
            </div>
            <div class="col-md-8 column table-responsive">
                <table id="tblVentas" class="table" >
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Importe</th>
                            <th></th>
                        </tr>
                    </thead>             
                    <tbody>
                    <?php $i = 1; foreach ($this->cart->contents() as $item): ?>
                        <input type="hidden" name="rowid[]" value="<?= $item['rowid'] ?>">
                        <tr>
                            <td>
                                <?= $item['id'] ?>
                                <input type="hidden" name="id_producto[]" value="<?= $item['id'] ?>">
                            </td>
                            <td>
                                <?= $item['name'] ?>
                            </td>
                            <td>
                                <?= number_format($item['price'], 2, ',', '.') ?> Bs.
                                <input type="hidden" name="precio[]" value="<?= $item['price'] ?>"> 
                            </td>
                            <td>                                
                                <input type="number" class="form-control cantidad_carrito" name="cantidad[]" value="<?= $item['qty'] ?>" maxlength="3" size="5">
                                <?= form_error('cantidad[]') ?>
                            </td>
                            <td>
                                <?= number_format($item['subtotal'], 2, ',', '.') ?> Bs.
                                <input type="hidden" name="importe[]" value="<?= $item['subtotal'] ?>"> 
                            </td>
                            <td>
                                <a href="<?= base_url() ?>elimina_ventaproducto/<?= $item['rowid'] ?>" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                            </td>
                        </tr>
                    <?php endforeach; $i++; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">
                                <!-- <input type="submit" class="btn btn-default" name="actualizar" value="Actualizar Carrito"> -->
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> Actualizar Carrito</button>
                                <a href="<?= base_url() ?>elimina_venta" class="btn btn-danger" data-toggle="confirmation"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Vaciar Carrito</a>
                                <!-- <?= form_submit($btn_vaciar_carrito) ?> -->
                            </td>
                            <th>TOTAL</th>
                            <th>
                                <?= number_format($this->cart->total(), 2, ',', '.') ?> Bs.

                                <?= form_input($input_importe_total) ?>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-2 column">
            </div>
            <div class="col-md-8 column">
                <label class="lbl-pharma">Datos Cliente</label>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-2 column">
            </div>
            <div class="col-md-8 column">
                <div class="frm-pharma">
                    <div class="row clearfix">
                        <div class="form-group col-md-6">
                            <?= form_label('Cliente', 'nombre_cliente') ?>
                            <?= form_input($input_nombre_cliente) ?>
                            <!-- recuperamos el id_cliente para usuarlo a la hora de almacenar en la Base de Datos -->
                            <?= form_input($input_id_cliente) ?>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#popupRegistrarCliente">
                                <span class="glyphicon glyphicon-user"></span> Nuevo
                            </button>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#popupListarClientes">
                                <span class="glyphicon glyphicon-search"></span> Buscar
                            </button>
                            <?= form_error('nombre_cliente') ?>
                        </div>
                        <div class="form-group col-md-6">
                            <?= form_label('NIT o CI', 'nit_cliente') ?>
                            <?= form_input($input_nit_cliente) ?>
                            <?= form_error('nit_cliente') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= form_close() ?>

        <!-- Modal Listar Clientes -->
        <div class="modal fade" id="popupListarClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" id="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><span class="sr-only">Cerrar</span></button>
                        <h4 class="modal-title" id="myModalLabel">Listado de Clientes</h4>
                    </div>
                    <div id="listarClientes" class="modal-body">
                        <div class="row clearfix">  
                            <div class="col-md-12 column table-responsive">
                                <table id="tblDatos" class="table hover order-column table-striped">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>NIT o CI</th>
                                            <th>Nombre(s) y Apellido(s)</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
                                            <th>Estado</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <th>Código</th>
                                            <th>NIT o CI</th>
                                            <th>Nombre y Apellidos</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
                                            <th>Estado</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                  
                                    <tbody>
                                    <?php  $i = 1; foreach ($listadoClientes as $cliente):?>
                                        <tr>
                                            <td><?= $cliente->id_cliente ?></td>
                                            <td><?= $cliente->nit_cliente ?></td>
                                            <td><?= $cliente->nombre_cliente ?></td>
                                            <td><?= $cliente->direccion_cliente ?></td>
                                            <td><?= $cliente->telefono_cliente ?></td>
                                            <td><?php if($cliente->estado_cliente == 0){echo "INACTIVO";} else {echo "ACTIVO";} ?></td>
                                            <td>
                                                <button type="button" class="btn btn-success" id="botonClientes"  onClick="pasarDatosCliente('<?= $cliente->id_cliente ?>','<?= $cliente->nombre_cliente ?>','<?= $cliente->nit_cliente ?>')" data-dismiss="modal" title="Seleccionar"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></button>  
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
        <!-- Funcion JavaScript para pasar datos desde ventana modal Listar Clientes a formulario -->
        <script type="text/javascript">
            //EVENTOS EN javascript
            function pasarDatosCliente(id,nombre,nit){
                document.getElementById('id_cliente').value=id;
                document.getElementById('nombre_cliente').value=nombre;
                document.getElementById('nit_cliente').value=nit;       
            }
        </script>
        <!-- Modal Registrar Cliente -->
        <div class="modal fade" id="popupRegistrarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" id="modal-dialog">
                <div class="modal-content">
                    <?= form_open('', $atributos_form_modal) ?>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><span class="sr-only">Cerrar</span></button>
                        <h4 class="modal-title" id="myModalLabel">Registro de Clientes</h4>
                    </div>
                    <div id="registrarCliente" class="modal-body">
                        <div class="row clearfix">  
                            <div class="col-md-12 column">                          
                                <div class="row clearfix">
                                    <div class="col-md-12 column">
                                        <label class="lbl-pharma">Información Usuario</label>        
                                    </div>
                                </div>
                                <div class="row clearfix">  
                                    <div class="col-md-12 column">   
                                        <div class="frm-pharma">
                                            <div class="row clearfix"> 
                                                <div class="form-group col-md-4">
                                                    <?= form_label('NIT o CI', 'nit_cliente_modal') ?>
                                                    <?= form_input($input_nit_cliente_modal) ?>
                                                    <p class="errornit"></p>
                                                </div> 
                                                <div class="form-group col-md-8">
                                                    <?= form_label('Nombre(s) y Apellido(s)', 'nombre_cliente_modal') ?>
                                                    <?= form_input($input_nombre_cliente_modal) ?>      
                                                    <p class="errornombre"></p>
                                                </div>
                                            </div>
                                            <div class="row clearfix">                       
                                                <div class="form-group col-md-4">
                                                    <?= form_label('Dirección', 'direccion_cliente_modal') ?>
                                                    <?= form_input($input_direccion_cliente_modal) ?>
                                                    <p class="errordireccion"></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <?= form_label('Teléfono', 'telefono_cliente_modal') ?>
                                                    <?= form_input($input_telefono_cliente_modal) ?>
                                                    <p class="errortelefono"></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <?= form_label('Estado de Cliente', 'estado_cliente') ?>
                                                    <?= form_dropdown('estado_cliente', $opciones_estado_cliente_modal, set_value('estado_cliente'), $atributos_estado_cliente_modal) ?>
                                                </div>  
                                            </div>
                                            <div class="row clearfix">
                                                <div class="form-group">
                                                    <?= form_input($input_id_cliente_modal) ?>
                                                </div>  
                                            </div>
                                        </div>          
                                    </div>
                                </div>                            
                            </div>
                        </div>      
                    </div>
                    <div class="modal-footer">
                        <span class="icon-input-btn"><span class="glyphicon glyphicon-floppy-disk"></span> 
                            <?= form_submit($btn_guardar_modal) ?>
                        </span>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>

    </div>
</section>