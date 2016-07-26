<?php 
    $atributos_form = array(
        'role'          => 'form'
    );
    for ($i = date('Y'); $i > 2014 ; $i--) { 
        $opciones_gestion_rt[$i] = $i;
    }

    $atributos_gestion_rt = 'id="gestion_rt" class="form-control"';
?>
<section class="row clearfix">
    <div class="col-md-12 column">
        <div class="row clearfix frm-header">
            <div class="col-md-10 column">
                <h3>
                    Reportes
                </h3>
            </div>
        </div>
        <hr />   
        <div class="row clearfix filtros_reporte ">  
            <?= form_open('', $atributos_form) ?>
                <div class="col-md-8 column">
                </div>
                <div class="col-md-2 column frm-pharma">                    
                    <?= form_dropdown('gestion_rt', $opciones_gestion_rt, set_value('gestion_rt',date('Y')), $atributos_gestion_rt) ?>
                </div>                
            <?= form_close() ?>
        </div>
        <hr />
        <div class="row clearfix">  
            <div class="col-md-2 column">
            </div>
            <div class="col-md-8 column">
                <label class="lbl-pharma">Rentabilidad de Productos Trimestral - <span id="titulo_rt"></span></label>
            </div>
        </div>     
        <div class="row clearfix"> 
            <div class="col-md-2 column">
            </div> 
            <div class="col-md-8 column table-responsive">
                <div class="panel panel-success">
                    <!-- Default panel contents -->
                    <div class="panel-heading">1er Trimestre <label>[Enero - Marzo]</label></div>
                    <!-- Table -->
                    <table id="tblRentabilidad" class="table table-hover table-striped tblReporte">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre Producto</th>
                                <th>Precio Venta</th>
                                <th>Cantidad Vendida</th>
                                <th>Total Ganado</th>
                            </tr>
                        </thead>
                        <tbody id="primerTrimestre">
                        <?php                              
                            if (!$primer_trimestre){
                        ?>
                                <tr><td colspan="5" align="center">Aún no hay suficientes datos para generar un reporte del trimestre actual.</td></tr>
                        <?php
                            } else {
                                foreach ($primer_trimestre as $reporte):                                
                        ?>
                                    <tr>
                                        <td><?= $reporte->id_producto ?></td>
                                        <td><?= $reporte->nombre_producto ?></td>
                                        <td><?= number_format($reporte->precio_ventaproducto, 2, ',', '') ?> Bs.</td>
                                        <td><?= $reporte->cantidad_ventaproducto ?></td>
                                        <td><?= number_format($reporte->importe_ventaproducto, 2, ',', '') ?> Bs.</td>
                                    </tr>
                        <?php                             
                                endforeach; 
                            }
                        ?>
                        </tbody>         
                    </table>
                </div>

                <div class="panel panel-success">
                    <!-- Default panel contents -->
                    <div class="panel-heading">2do Trimestre <label>[Abril - Junio]</label></div>
                    <!-- Table -->
                    <table id="tblRentabilidad" class="table table-hover table-striped tblReporte">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre Producto</th>
                                <th>Precio Venta</th>
                                <th>Cantidad Vendida</th>
                                <th>Total Ganado</th>
                            </tr>
                        </thead>
                        <tbody id="segundoTrimestre">
                        <?php                              
                            if (!$segundo_trimestre){
                        ?>
                                <tr><td colspan="5" align="center">Aún no hay suficientes datos para generar un reporte del trimestre actual.</td></tr>
                        <?php
                            } else {
                                foreach ($segundo_trimestre as $reporte):                                
                        ?>
                                    <tr>
                                        <td><?= $reporte->id_producto ?></td>
                                        <td><?= $reporte->nombre_producto ?></td>
                                        <td><?= number_format($reporte->precio_ventaproducto, 2, ',', '') ?> Bs.</td>
                                        <td><?= $reporte->cantidad_ventaproducto ?></td>
                                        <td><?= number_format($reporte->importe_ventaproducto, 2, ',', '') ?> Bs.</td>
                                    </tr>
                        <?php                                 
                                endforeach; 
                            }
                        ?>
                        </tbody>         
                    </table>
                </div>

                <div class="panel panel-success">
                    <!-- Default panel contents -->
                    <div class="panel-heading">3er Trimestre <label>[Julio - Septiembre]</label></div>
                    <!-- Table -->
                    <table id="tblRentabilidad" class="table table-hover table-striped tblReporte">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre Producto</th>
                                <th>Precio Venta</th>
                                <th>Cantidad Vendida</th>
                                <th>Total Ganado</th>
                            </tr>
                        </thead>
                        <tbody id="tercerTrimestre">
                        <?php                              
                            if (!$tercer_trimestre){
                        ?>
                                <tr><td colspan="5" align="center">Aún no hay suficientes datos para generar un reporte del trimestre actual.</td></tr>
                        <?php
                            } else {
                                foreach ($tercer_trimestre as $reporte):                                
                        ?>
                                    <tr>
                                        <td><?= $reporte->id_producto ?></td>
                                        <td><?= $reporte->nombre_producto ?></td>
                                        <td><?= number_format($reporte->precio_ventaproducto, 2, ',', '') ?> Bs.</td>
                                        <td><?= $reporte->cantidad_ventaproducto ?></td>
                                        <td><?= number_format($reporte->importe_ventaproducto, 2, ',', '') ?> Bs.</td>
                                    </tr>
                        <?php                             
                                endforeach; 
                            }
                        ?>
                        </tbody>         
                    </table>
                </div>

                <div class="panel panel-success">
                    <!-- Default panel contents -->
                    <div class="panel-heading">4to Trimestre <label>[Octubre - Diciembre]</label></div>
                    <!-- Table -->
                    <table id="tblRentabilidad" class="table table-hover table-striped tblReporte">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre Producto</th>
                                <th>Precio Venta</th>
                                <th>Cantidad Vendida</th>
                                <th>Total Ganado</th>
                            </tr>
                        </thead>
                        <tbody id="cuartoTrimestre">
                        <?php                              
                            if (!$cuarto_trimestre){
                        ?>
                                <tr><td colspan="5" align="center">Aún no hay suficientes datos para generar un reporte del trimestre actual.</td></tr>
                        <?php
                            } else {
                                foreach ($cuarto_trimestre as $reporte):                                
                        ?>
                                    <tr>
                                        <td><?= $reporte->id_producto ?></td>
                                        <td><?= $reporte->nombre_producto ?></td>
                                        <td><?= number_format($reporte->precio_ventaproducto, 2, ',', '') ?> Bs.</td>
                                        <td><?= $reporte->cantidad_ventaproducto ?></td>
                                        <td><?= number_format($reporte->importe_ventaproducto, 2, ',', '') ?> Bs.</td>
                                    </tr>
                        <?php                            
                                endforeach; 
                            }
                        ?>
                        </tbody>         
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>