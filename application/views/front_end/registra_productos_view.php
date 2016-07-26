<?php 
	$atributos_form = array(
		'role' 			=> 'form'
	);

	$input_nombre_producto = array(
	    'name'          => 'nombre_producto',
	    'id'            => 'nombre_producto',
	    'class'			=> 'form-control',
	    'maxlength'     => '100',
	    'placeholder'	=> 'Ingrese Nombre del Producto',
	    'value'			=> set_value('nombre_producto', @$datos_producto[0]->nombre_producto)
	);

	$input_precio_producto = array(
		'type'			=> 'number',
		'min'			=> '0',
		'step'			=> 'any',
	    'name'          => 'precio_producto',
	    'id'            => 'precio_producto',
	    'class'			=> 'form-control',
	    'maxlength'     => '25',
	    'placeholder'	=> 'Ingrese Precio del Producto',
	    'value'			=> set_value('precio_producto', number_format(@$datos_producto[0]->precio_producto, 2, '.', ''))
	);

	$input_stock_producto = array(
		'type'			=> 'number',
		'min'			=> '1',
	    'name'          => 'stock_producto',
	    'id'            => 'stock_producto',
	    'class'			=> 'form-control',
	    'maxlength'     => '25',
	    'placeholder'	=> 'Ingrese Stock del Producto',
	    'value'			=> set_value('stock_producto', @$datos_producto[0]->stock_producto)
	);

	$input_fechavencimiento_producto = array(
		'type'			=> 'date',
	    'name'          => 'fechavencimiento_producto',
	    'id'            => 'fechavencimiento_producto',
	    'class'			=> 'form-control',	    
	    'placeholder'	=> 'Ingrese Fecha de Vencimiento del Producto',
	    'value'			=> set_value('fechavencimiento_producto', @$datos_producto[0]->fechavencimiento_producto)
	);

	foreach($producto_laboratorio as $nombre) {
		$opciones_laboratorio[$nombre->id_laboratorio] = $nombre->nombre_laboratorio;
	}

	$atributos_laboratorio = 'id="id_laboratorio" class="form-control"';

	foreach($presentacion_producto as $nombre) {
		$opciones_presentacionproducto[$nombre->id_presentacionproducto] = $nombre->nombre_presentacionproducto;
	}

	$atributos_presentacionproducto = 'id="id_presentacionproducto" class="form-control"';

	foreach($categoria_producto as $nombre) {
		$opciones_categoriaproducto[$nombre->id_categoriaproducto] = $nombre->nombre_categoriaproducto;
	}

	$atributos_categoriaproducto = 'id="id_categoriaproducto" class="form-control"';


	$textarea_descripcion = array(
	    'name'          => 'descripcion_producto',
	    'id'            => 'descripcion_producto',
	    'class'			=> 'form-control',
	    'placeholder'	=> 'Ingrese Descripción del Producto',
	    'value'			=> set_value('descripcion_producto', @$datos_producto[0]->descripcion_producto)
	);

	$input_id_producto = array(
	    'name'          => 'id_producto',
	    'id'            => 'id_producto',
	    'type'         	=> 'hidden',
	    'value'			=> set_value('id_producto', @$datos_producto[0]->id_producto)
	);

	$btn_guardar = array(
	    'name'          => 'btn_guardar',
	    'id'            => 'btn_guardar',
	    'class'			=> 'btn btn-primary',
	    'type'          => 'submit',
	    'value'       	=> 'Guardar cambios'
	);
	
?>

<section class="row clearfix">
	<div class="col-md-12 column">
	  	<?= form_open('', $atributos_form) ?>
			<div class="row clearfix frm-header">
				<div class="col-md-9 column">
					<h3>Registro de Productos</h3>
				</div>
			<div class="col-md-3 column btn-new">
				<span class="icon-input-btn"><span class="glyphicon glyphicon-floppy-disk"></span> 
					<?= form_submit($btn_guardar) ?>
				</span>
			  	<a href="<?= base_url() ?>lista_productos" class="btn btn-warning">
			  		<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Cancelar
			  	</a>
			</div>
			</div>
			<hr />
			<div class="row clearfix">
				<div class="col-md-12 column">
					<label class="lbl-pharma">Información Producto</label>        
				</div>
			</div>
			<div class="row clearfix">  
				<div class="col-md-12 column">   
				  	<div class="frm-pharma">
					    <div class="row clearfix">  
					      	<div class="form-group col-md-4">
						      	<?= form_label('Producto', 'nombre_producto') ?>
								<?= form_input($input_nombre_producto) ?>
								<?= form_error('nombre_producto') ?>
					      	</div>
					      	<div class="form-group col-md-4">
						      	<?= form_label('Precio', 'precio_producto') ?>
								<?= form_input($input_precio_producto) ?>
								<?= form_error('precio_producto') ?>
					      	</div>
					      	<div class="form-group col-md-4">
						      	<?= form_label('Stock', 'stock_producto') ?>
								<?= form_input($input_stock_producto) ?>
								<?= form_error('stock_producto') ?>
					      	</div>  
					    </div>
					    <div class="row clearfix">  
					      	<div class="form-group col-md-4">
						      	<?= form_label('Fecha de Vencimiento', 'fechavencimiento_producto') ?>
								<?= form_input($input_fechavencimiento_producto) ?>
								<?= form_error('fechavencimiento_producto') ?>
					      	</div>
					    </div>
					    <div class="row clearfix">  
						    <div class="form-group col-md-4">
						      	<?= form_label('Laboratorio', 'id_laboratorio') ?>
								<?= form_dropdown('id_laboratorio', $opciones_laboratorio, set_value('id_laboratorio', @$datos_producto[0]->id_laboratorio), $atributos_laboratorio) ?>
								<?= form_error('id_laboratorio') ?>
						    </div>
						    <div class="form-group col-md-4">
						      	<?= form_label('Presentacion del Producto', 'id_presentacionproducto') ?>
								<?= form_dropdown('id_presentacionproducto', $opciones_presentacionproducto, set_value('id_presentacionproducto', @$datos_producto[0]->id_presentacionproducto), $atributos_presentacionproducto) ?>
								<?= form_error('id_presentacionproducto') ?>
						    </div>
						    <div class="form-group col-md-4">
						      	<?= form_label('Categoria del Producto', 'id_categoriaproducto') ?>
								<?= form_dropdown('id_categoriaproducto', $opciones_categoriaproducto, set_value('id_categoriaproducto', @$datos_producto[0]->id_categoriaproducto), $atributos_categoriaproducto) ?>
								<?= form_error('id_categoriaproducto') ?>
						    </div>
					    </div>
					    <div class="row clearfix">  
					      	<div class="form-group col-md-4">
						      	<?= form_label('Descripción del Producto', 'descripcion_producto') ?>
								<?= form_textarea($textarea_descripcion, set_value('descripcion_producto', @$datos_producto[0]->descripcion_producto)) ?>
								<?= form_error('descripcion_producto') ?>
					      	</div>
					      	<div class="form-group">
								<?= form_input($input_id_producto) ?>
								<?= form_error('id_producto') ?>
							</div>	
					    </div>
				  	</div>          
				</div>
			</div>
		<?= form_close() ?>
	</div>
</section>