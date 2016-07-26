<?php  $i = 1; foreach ($datosVenta as $venta):?>
<?php $i++; endforeach; ?>
<section class="row">
  	<div class="col-md-12">
      	<div class="row clearfix frm-header">
      		<div class="col-md-10 column">
        		<h3>Finalizar Venta</h3>
      		</div>
      		<div class="col-md-2 column btn-new">
      			<a href="<?= base_url() ?>ventas" class="btn btn-primary" data-toggle="confirmation"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span> Nueva Venta</a>
      		</div>
    	</div>
    	<hr />
    	<div class="row clearfix">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#ticket" aria-controls="ticket" role="tab" data-toggle="tab">Ticket</a></li>
                <li role="presentation"><a href="#nota" aria-controls="nota" role="tab" data-toggle="tab">Nota de Venta</a></li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="ticket">
                    <div class="row clearfix">
                        <div class="col-md-8 column">
                        </div>
                        <div class="col-md-2 column btn-new">
                            <button type="button" class="btn btn-warning" onclick="imprimir();"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Imprimit Ticket</button>
                            <a target="_blank" href="<?= base_url() ?>ticket_pdf/<?= $venta->id_venta ?>">PDF</a>
                        </div>
                    </div>
                    <div id="print_ticket" class="row clearfix">
                        <div class="col-md-4 column">
                        </div>
                        <div class="col-md-4 column table-responsive">
                            <div class="opciones_fin_venta">
                                <div id="header_ticket">
                                    <div class="borde_ticket">
                                        <p>FACTURA POR TERCEROS</p>
                                        <p>PHARMA ZERO</p>
                                    </div>
                                    <h4>Farmacia Ejemplo</h4>
                                    <p>Calle: ejemplo</p>
                                    <p>Tel: 77777777</p>
                                    <p>POTOSI - BOLIVIA</p>
                                    <p>NIT: 1111111111 Factura No.: 0001</p>
                                    <p>Autorización No.: 11111111110001</p>
                                    <p>Actividad Económica: VENTA DE MEDICAMENTOS</p>
                                </div>
                                <div id="body_ticket">
                                    <?php if ($datosVenta) { ?>
                                        <p class="t_left">Fecha Emisión: <?= $venta->fecha_venta ?></p>
                                        <p class="t_left">Cliente: <?= $venta->nombre_cliente ?></p>
                                        <p class="t_left">NIT/CI: <?= $venta->nit_cliente ?></p>
                                        <p class="t_left">Emitido por: <?= $venta->nombre_usuario ?></p>
                                    <?php } else { ?>
                                        <p class="t_left">Fecha Emisión:</p>
                                        <p class="t_left">Cliente:</p>
                                        <p class="t_left">NIT/CI: </p>
                                        <p class="t_left">Emitido por: </p>
                                    <?php } ?>
                                    <h4>E-TICKET</h4>
                                    <div class="borde_ticket">
                                        <table id="tblVentasTicket">
                                            <thead>
                                                <tr>       
                                                    <th>Cantidad</th>
                                                    <th align="center">Producto</th>
                                                    <th>Precio</th>         
                                                    <th>Importe</th>         
                                                </tr>
                                            </thead>             
                                            <tbody>
                                            <?php  $i = 1; foreach ($listadoProductos as $productovendido):?>
                                                <tr>
                                                    <td><?= $productovendido->cantidad_ventaproducto ?></td>
                                                    <td><?= $productovendido->nombre_producto ?></td>
                                                    <td><?= number_format($productovendido->precio_ventaproducto, 2, ',', '') ?> Bs.</td>
                                                    <td><?= number_format($productovendido->importe_ventaproducto, 2, ',', '') ?> Bs.</td>
                                                </tr>
                                            <?php $i++; endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="2"></td>
                                                    <th>TOTAL</th>
                                                    <th class="margenDouble">
                                                        <?php if ($datosVenta) { ?>
                                                            <?= number_format($venta->importetotal_venta, 2, ',', '') ?> Bs.
                                                        <?php } ?>           
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <p class="t_left">SON: 
                                        <?php if ($datosVenta) { ?>
                                            <?= $this->numero_letras->ValorEnLetras($venta->importetotal_venta, "") ?>
                                        <?php } ?>           
                                    </p>
                                    <p class="t_left">CODIGO DE CONTRO:</p>
                                    <p class="t_left">FECHA LIMITE DE EMISION: </p>
                                    <p>
                                        <img src="<?= $qr_code_image_url ?>"> 
                                    </p>
                                </div>
                                <div id="footer_ticket">
                                    <p>"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS. EL USO ILICITO DE ESTA SERA SANCIONADO DE ACUERDO A LEY"</p>
                                    <p>
                                        No reembolsable<br />
                                        GRACIAS POR SU PREFERENCIA
                                    </p>
                                    <p>"system PHARMA ZERO"</p>
                                </div>                                                
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="nota">
                    <div class="row clearfix">
                        <div class="col-md-8 column">
                        </div>
                        <div class="col-md-2 column btn-new">
                            <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Imprimir Nota de Venta</button>                              
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-2 column">
                        </div>
                        <div class="col-md-8 column table-responsive">
                            <div class="opciones_fin_venta">
                                <h4>Farmacia Ejemplo</h4>
                                <p>Calle ejemplo</p>
                                <p>telf: 77777777</p>                   
                                <h4>NOTA DE VENTA</h4>
                                <?php if ($datosVenta) { ?>
                                    <p>Fecha Emisión <?= $venta->fecha_venta ?></p>
                                <?php } else { ?>
                                          <p>Fecha Emisión
                                <?php } ?>                  
                            </div>                           
                                <?php if ($datosVenta) { ?>
                                    <p>Cliente: <?= $venta->nombre_cliente ?></p>
                                    <p>NIT/CI: <?= $venta->nit_cliente ?></p>
                                    <p>Emitido por: <?= $venta->nombre_usuario ?></p>
                                <?php } else { ?>
                                    <p>Cliente: </p>
                                    <p>NIT/CI: </p>
                                    <p>Emitido por: </p>
                                <?php } ?>              
                            <table id="tblVentas" class="table">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Cantidad</th>
                                        <th>Producto</th>
                                        <th>Precio</th>                            
                                        <th>Importe</th>                            
                                    </tr>
                                </thead>             
                                <tbody>
                                <?php  $i = 1; foreach ($listadoProductos as $productovendido):?>
                                    <tr>
                                        <td><?= $productovendido->id_producto ?></td>
                                        <td><?= $productovendido->cantidad_ventaproducto ?></td>
                                        <td><?= $productovendido->nombre_producto ?></td>
                                        <td><?= number_format($productovendido->precio_ventaproducto, 2, ',', '') ?> Bs.</td>
                                        <td><?= number_format($productovendido->importe_ventaproducto, 2, ',', '') ?> Bs.</td>
                                    </tr>
                                <?php $i++; endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"></td>
                                        <th>TOTAL</th>
                                        <th>
                                            <?php if ($datosVenta) { ?>
                                                <?= number_format($venta->importetotal_venta, 2, ',', '') ?> Bs.
                                            <?php } ?>           
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>SON:
                                            <?php if ($datosVenta) { ?>
                                                <?= $this->numero_letras->ValorEnLetras($venta->importetotal_venta, "") ?>
                                            <?php } ?> 
                                        </td>                          
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>                    
                </div>            
            </div>    
        </div>
  	</div>
</section>