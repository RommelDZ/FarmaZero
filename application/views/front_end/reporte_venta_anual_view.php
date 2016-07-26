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
        <div class="row clearfix">  
            <div class="col-md-12 column">
                <label class="lbl-pharma">Venta Anual</label>
            </div>
        </div> 

        <div class="row clearfix"> 
            <div class="col-md-5 column table-responsive">
                <table id="tblVentaAnual" class="table table-hover table-striped tblReporte">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Cantidad</th>
                            <th>Ganancias</th>
                        </tr>
                    </thead>                    
                    <tbody id="ventaAnual">
                    <?php  
                        $i = 1; $cantidad_total = 0; $importe_total = 0;
                        foreach ($listado as $reporte):
                    ?>
                        <tr>
                            <th><?= $reporte->gestion ?></th>
                            <td><?= $reporte->cantidad_ventaproducto ?></td>
                            <td><?= number_format($reporte->importe_ventaproducto, 2, ',', '') ?> Bs.</td>
                        </tr>
                        <?php 
                            $cantidad_total += $reporte->cantidad_ventaproducto; 
                            $importe_total += $reporte->importe_ventaproducto; 
                        ?>
                    <?php 
                        $i++; 
                        endforeach; 
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>TOTAL</th>
                            <th id="cantidadTotal"><?= $cantidad_total ?></th>
                            <th id="importeTotal"><?= number_format($importe_total, 2, ',', '') ?> Bs.</th>
                        </tr>
                    </tfoot>                
                </table>
            </div> 
            <div class="col-md-6 column">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#cantidad" aria-controls="cantidad" role="tab" data-toggle="tab">Cantidad</a></li>
                    <li role="presentation"><a href="#ganancias" aria-controls="ganancias" role="tab" data-toggle="tab">Ganancias</a></li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="cantidad">
                        <div id="grafica_cantidad_va"></div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="ganancias">
                        <div id="grafica_ganancias_va"></div>
                    </div>            
                </div>    
            </div>
        </div>        
    </div>
</section>

<script type="text/javascript">
$(function () {
    Highcharts.theme = {
       colors: ["#2b908f", "#90ee7e", "#f45b5b", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
          "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
       chart: {
          style: {
             fontFamily: "'Unica One', sans-serif"
          },
          plotBorderColor: '#606063'
       }
    };

    Highcharts.setOptions(Highcharts.theme);

    $('#grafica_cantidad_va').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Venta Anual'
        },
        xAxis: {
            categories: [
                <?php
                foreach ($listado as $reporte):
                    echo '"'.$reporte->gestion.'",';
                endforeach;
                ?>
            ],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad de Productos Vendidos (unidades)',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' unidades'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Cantidad',
            data: [
                <?php
                foreach ($listado as $reporte):
                    echo $reporte->cantidad_ventaproducto.',';
                endforeach; 
                ?>
            ]
        }]
    });

    $('#grafica_ganancias_va').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Venta Anual'
        },
        xAxis: {
            categories: [
                <?php
                foreach ($listado as $reporte):
                    echo '"'.$reporte->gestion.'",';
                endforeach;
                ?>
            ],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Importe por Productos Vendidos (Bs.)',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' Bs.'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Ganancias',
            data: [
                <?php
                foreach ($listado as $reporte):
                    echo number_format($reporte->importe_ventaproducto, 2, '.', '').',';
                endforeach; 
                ?>
            ]
        }]
    });
});
</script>