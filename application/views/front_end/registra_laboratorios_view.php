<?php 
	$atributos_form = array(
		'role' 			=> 'form'
	);

	$input_nombre_laboratorio = array(
	    'name'          => 'nombre_laboratorio',
	    'id'            => 'nombre_laboratorio',
	    'class'			=> 'form-control',
	    'maxlength'     => '100',
	    'placeholder'	=> 'Ingrese Nombre del Laboratorio',
	    'value'			=> set_value('nombre_laboratorio', @$datos_laboratorio[0]->nombre_laboratorio)
	);

	foreach($ciudad_laboratorio as $ciudad) {
		$opciones_ciudad[$ciudad->id_ciudad] = $ciudad->nombre_ciudad;
	}

	$atributos_ciudad = 'id="id_ciudad" class="form-control"';

	$input_direccion_laboratorio = array(
	    'name'          => 'direccion_laboratorio',
	    'id'            => 'direccion_laboratorio',
	    'class'			=> 'form-control',
	    'maxlength'     => '50',
	    'placeholder'	=> 'Ingrese Dirección',
	    'value'			=> set_value('direccion_laboratorio', @$datos_laboratorio[0]->direccion_laboratorio)
	);

	$input_telefono_laboratorio = array(
	    'name'          => 'telefono_laboratorio',
	    'id'            => 'telefono_laboratorio',
	    'class'			=> 'form-control',
	    'maxlength'     => '50',
	    'placeholder'	=> 'Ingrese Número Teléfonico',
	    'value'			=> set_value('telefono_laboratorio', @$datos_laboratorio[0]->telefono_laboratorio)
	);

	$input_email_laboratorio = array(
	    'name'          => 'email_laboratorio',
	    'id'            => 'email_laboratorio',
	    'class'			=> 'form-control',
	    'maxlength'     => '50',
	    'placeholder'	=> 'Ingrese Correo Electrónico',
	    'value'			=> set_value('email_laboratorio', @$datos_laboratorio[0]->email_laboratorio)
	);

	$opciones_estado_laboratorio = array(
		'1' 			=> 'ACTIVO',
		'0'				=> 'INACTIVO',
	);

	$atributos_estado_laboratorio = 'id="estado_laboratorio" class="form-control"';

	$input_id_laboratorio = array(
	    'name'          => 'id_laboratorio',
	    'id'            => 'id_laboratorio',
	    'type'         	=> 'hidden',
	    'value'			=> set_value('id_laboratorio', @$datos_laboratorio[0]->id_laboratorio)
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
		    	<h3>
		        	Registro de Laboratorios
		      	</h3>
		    </div>
		    <div class="col-md-3 column btn-new">
		    	<span class="icon-input-btn"><span class="glyphicon glyphicon-floppy-disk"></span> 
		    		<?= form_submit($btn_guardar) ?>
		    	</span>
		      	<a href="<?= base_url() ?>lista_laboratorios" class="btn btn-warning">
		      		<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Cancelar
		      	</a>
		    </div>
		</div>
	  	<hr />
	  	<div class="row clearfix">
	    	<div class="col-md-12 column">
	      		<label class="lbl-pharma">Información Laboratorio</label>        
	    	</div>
	 	</div>
	  	<div class="row clearfix">  
	    	<div class="col-md-12 column">   
	      		<div class="frm-pharma">
	        		<div class="row clearfix">  
	          			<div class="form-group col-md-6">
	          				<?= form_label('Nombre Laboratorio', 'nombre_laboratorio') ?>
							<?= form_input($input_nombre_laboratorio) ?>
							<?= form_error('nombre_laboratorio') ?>
	          			</div>
	          			<div class="form-group col-md-6">
	          				<?= form_label('Ciudad', 'id_ciudad') ?>
							<?= form_dropdown('id_ciudad', $opciones_ciudad, set_value('id_ciudad', @$datos_laboratorio[0]->id_ciudad), $atributos_ciudad) ?>
							<?= form_error('id_ciudad') ?>
	          			</div>
	        		</div>
	        		<div class="row clearfix">  
	          			<div class="form-group col-md-6">
	          				<?= form_label('Dirección', 'direccion_laboratorio') ?>
							<?= form_input($input_direccion_laboratorio) ?>
							<?= form_error('direccion_laboratorio') ?>
	          			</div>
	          			<div class="form-group col-md-6">
	          				<?= form_label('Telefóno', 'telefono_laboratorio') ?>
							<?= form_input($input_telefono_laboratorio) ?>
							<?= form_error('telefono_laboratorio') ?>
	          			</div>  
	        		</div>
	        		<div class="row clearfix">  
	          			<div class="form-group col-md-6">
	          				<?= form_label('Email', 'email_laboratorio') ?>
							<?= form_input($input_email_laboratorio) ?>
							<?= form_error('email_laboratorio') ?>
	          			</div>
	          			<div class="form-group col-md-6">
				          	<?= form_label('Estado de Laboratorio', 'estado_laboratorio') ?>
		            		<?= form_dropdown('estado_laboratorio', $opciones_estado_laboratorio, set_value('estado_laboratorio', @$datos_laboratorio[0]->estado_laboratorio), $atributos_estado_laboratorio) ?>
		    				<?= form_error('estado_laboratorio') ?>
	          			</div>
	          			<div class="form-group">
							<?= form_input($input_id_laboratorio) ?>
							<?= form_error('id_laboratorio') ?>
						</div>	
	        		</div>
	      		</div>          
	    	</div>
		</div>
		<?= form_close() ?>
	</div>
</section>