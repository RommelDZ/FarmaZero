<?php 
	$atributos_form = array(
		'role' 			=> 'form'
	);

	$input_nit_cliente = array(
	    'name'          => 'nit_cliente',
	    'id'            => 'nit_cliente',
	    'class'			=> 'form-control',
	    'maxlength'     => '50',
	    'placeholder'	=> 'Ingrese número NIT o CI',
	    'value'			=> set_value('nit_cliente', @$datos_cliente[0]->nit_cliente)
	);

	$input_nombre_cliente = array(
	    'name'          => 'nombre_cliente',
	    'id'            => 'nombre_cliente',
	    'class'			=> 'form-control',
	    'maxlength'     => '100',
	    'placeholder'	=> 'Ingrese Nombre(s) y Apellido(s)',
	    'value'			=> set_value('nombre_cliente', @$datos_cliente[0]->nombre_cliente)
	);

	$input_direccion_cliente = array(
	    'name'          => 'direccion_cliente',
	    'id'            => 'direccion_cliente',
	    'class'			=> 'form-control',
	    'maxlength'     => '50',
	    'placeholder'	=> 'Ingrese Dirección',
	    'value'			=> set_value('direccion_cliente', @$datos_cliente[0]->direccion_cliente)
	);

	$input_telefono_cliente = array(
	    'name'          => 'telefono_cliente',
	    'id'            => 'telefono_cliente',
	    'class'			=> 'form-control',
	    'placeholder'	=> 'Ingresa Número Telefónico',
	    'maxlength'     => '50',
	    'value'			=> set_value('telefono_cliente', @$datos_cliente[0]->telefono_cliente)
	);

	$opciones_estado_cliente = array(
		'1' 			=> 'ACTIVO',
		'0'				=> 'INACTIVO',
	);

	$atributos_estado_cliente = 'id="estado_cliente" class="form-control"';

	$input_id_cliente = array(
	    'name'          => 'id_cliente',
	    'id'            => 'id_cliente',
	    'type'         	=> 'hidden',
	    'value'			=> set_value('id_cliente', @$datos_cliente[0]->id_cliente)
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
					<h3>Registro de Clientes</h3>
				</div>
				<div class="col-md-3 column btn-new">
					<span class="icon-input-btn"><span class="glyphicon glyphicon-floppy-disk"></span> 
						<?= form_submit($btn_guardar) ?>
					</span>
				  	<a href="<?= base_url() ?>lista_clientes" class="btn btn-warning">
				  		<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Cancelar
				  	</a>
				</div>
			</div>
			<hr />
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
						      	<?= form_label('NIT o CI', 'nit_cliente') ?>
								<?= form_input($input_nit_cliente) ?>
								<?= form_error('nit_cliente') ?>
					      	</div> 
					      	<div class="form-group col-md-8">
						      	<?= form_label('Nombre(s) y Apellido(s)', 'nombre_cliente') ?>
								<?= form_input($input_nombre_cliente) ?>
								<?= form_error('nombre_cliente') ?>
					      	</div>
					    </div>
					    <div class="row clearfix">  					 
					      	<div class="form-group col-md-4">
						      	<?= form_label('Dirección', 'direccion_cliente') ?>
								<?= form_input($input_direccion_cliente) ?>
								<?= form_error('direccion_cliente') ?>
					      	</div>
					      	<div class="form-group col-md-4">
						      	<?= form_label('Telefono', 'telefono_cliente') ?>
								<?= form_input($input_telefono_cliente) ?>
								<?= form_error('telefono_cliente') ?>
					      	</div>
					      	<div class="form-group col-md-4">
						      	<?= form_label('Estado de Cliente', 'estado_cliente') ?>
								<?= form_dropdown('estado_cliente', $opciones_estado_cliente, set_value('estado_cliente', @$datos_cliente[0]->estado_cliente), $atributos_estado_cliente) ?>
								<?= form_error('estado_cliente') ?>
					      	</div>  
					    </div>
					    <div class="row clearfix">  					     	
					      	<div class="form-group">
								<?= form_input($input_id_cliente) ?>
								<?= form_error('id_cliente') ?>
							</div>	
					    </div>
				  	</div>          
				</div>
			</div>
		<?= form_close() ?>
	</div>
</section>