<?php 
    $atributos_form = array(
        'role'          => 'form'
    );
    $opciones_mes_tp = array(
        '1'             => 'ENERO',
        '2'             => 'FEBRERO',
        '3'             => 'MARZO',
        '4'             => 'ABRIL',
        '5'             => 'MAYO',
        '6'             => 'JUNIO',
        '7'             => 'JULIO',
        '8'             => 'AGOSTO',
        '9'             => 'SEPTIEMBRE',
        '10'            => 'OCTUBRE',
        '11'            => 'NOVIEMBRE',
        '12'            => 'DICIEMBRE',
    );

    $atributos_mes_tp = 'id="mes_tp" class="form-control"';
    for ($i = date('Y'); $i > 2014 ; $i--) { 
        $opciones_gestion_tp[$i] = $i;
    }

    $atributos_gestion_tp = 'id="gestion_tp" class="form-control"';
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
                <div class="col-md-6 column">
                </div>
                <div class="col-md-4 column frm-pharma">
                    <div class="col-md-6 column ">                    
                        <?= form_dropdown('mes_tp', $opciones_mes_tp, set_value('mes_tp',date('m')), $atributos_mes_tp) ?>
                    </div>
                    <div class="col-md-6 column">                    
                        <?= form_dropdown('gestion_tp', $opciones_gestion_tp, set_value('gestion_tp',date('Y')), $atributos_gestion_tp) ?>
                    </div>
                </div>                
            <?= form_close() ?>
        </div>
        <hr />
        <div class="row clearfix">  
            <div class="col-md-2 column">
            </div>
            <div class="col-md-8 column">
                <label class="lbl-pharma">Top Productos - <span id="titulo_tp"></span></label>
            </div>
        </div>     
        <div class="row clearfix"> 
            <div class="col-md-2 column">
            </div> 
            <div class="col-md-8 column table-responsive">
                <table id="tblTopProductos" class="table hover table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre Producto</th>
                            <th>Precio Venta</th>
                            <th>Cantidad Vendida</th>
                            <th>Total Ganado</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Código</th>
                            <th>Nombre Producto</th>
                            <th>Precio Venta</th>
                            <th>Cantidad Vendida</th>
                            <th>Total Ganado</th>
                        </tr>
                    </tfoot>                
                </table>
            </div>
        </div>
    </div>
</section>