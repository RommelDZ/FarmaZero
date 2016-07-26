<?php 
	$atributos_form = array(
		'role' 			=> 'form'
	);

	$input_nombre_usuario = array(
	    'name'          => 'nombre_usuario',
	    'id'            => 'nombre_usuario',
	    'class'			=> 'form-control',
	    'maxlength'     => '100',
	    'placeholder'	=> 'Ingrese Nombre(s) y Apellido(s)',
	    'value'			=> set_value('nombre_usuario', @$datos_usuario[0]->nombre_usuario)
	);

	$input_nick_usuario = array(
	    'name'          => 'nick_usuario',
	    'id'            => 'nick_usuario',
	    'class'			=> 'form-control',
	    'maxlength'     => '50',
	    'placeholder'	=> 'Ingrese Nick',
	    'value'			=> set_value('nick_usuario', @$datos_usuario[0]->nick_usuario)
	);

	$input_password_usuario = array(
	    'name'          => 'password_usuario',
	    'id'            => 'password_usuario',
	    'class'			=> 'form-control',
	    'type'			=> 'password',
	    'maxlength'     => '50',
	    'placeholder'	=> 'Ingrese Password',
	    'value'			=> set_value('password_usuario', $this->encrypt->decode(@$datos_usuario[0]->password_usuario))
	);

	$input_rep_password_usuario = array(
	    'name'          => 'rep_password_usuario',
	    'id'            => 'rep_password_usuario',
	    'class'			=> 'form-control',
	    'type'			=> 'password',
	    'placeholder'	=> 'Repita Password',
	    'maxlength'     => '50',
	    'value'			=> set_value('rep_password_usuario', $this->encrypt->decode(@$datos_usuario[0]->password_usuario))
	);

	foreach($tipousuarios as $tipo) {
		$opciones_tipousuarios[$tipo->id_tipousuario] = $tipo->nombre_tipousuario;
	}

	$atributos_tipousuarios = 'id="id_tipousuario" class="form-control"';

	$opciones_estado_usuario = array(
		'1' 			=> 'ACTIVO',
		'0'				=> 'INACTIVO',
	);

	$atributos_estado_usuario = 'id="estado_usuario" class="form-control"';

	$input_id_usuario = array(
	    'name'          => 'id_usuario',
	    'id'            => 'id_usuario',
	    'type'         	=> 'hidden',
	    'value'			=> set_value('id_usuario', @$datos_usuario[0]->id_usuario)
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
					<h3>Registro de Usuarios</h3>
				</div>
			<div class="col-md-3 column btn-new">
				<span class="icon-input-btn"><span class="glyphicon glyphicon-floppy-disk"></span> 
					<?= form_submit($btn_guardar) ?>
				</span>
			  	<a href="<?= base_url() ?>lista_usuarios" class="btn btn-warning">
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
					      	<div class="form-group col-md-8">
						      	<?= form_label('Nombre(s) y Apellido(s)', 'nombre_usuario') ?>
								<?= form_input($input_nombre_usuario) ?>
								<?= form_error('nombre_usuario') ?>
					      	</div>
					    </div>
					    <div class="row clearfix">  
					      	<div class="form-group col-md-4">
						      	<?= form_label('Nick Usuario', 'nick_usuario') ?>
								<?= form_input($input_nick_usuario) ?>
								<?= form_error('nick_usuario') ?>
					      	</div>
					      	<div class="form-group col-md-4">
						      	<?= form_label('Password', 'password_usuario') ?>
								<?= form_input($input_password_usuario) ?>
								<?= form_error('password_usuario') ?>
					      	</div>
					      	<div class="form-group col-md-4">
						      	<?= form_label('Repetir Password', 'rep_password_usuario') ?>
								<?= form_input($input_rep_password_usuario) ?>
								<?= form_error('rep_password_usuario') ?>
					      	</div>  
					    </div>
					    <div class="row clearfix">  
					      	<div class="form-group col-md-4">
						      	<?= form_label('Tipo de Usuario', 'id_tipousuario') ?>
								<?= form_dropdown('id_tipousuario', $opciones_tipousuarios, set_value('id_tipousuario', @$datos_usuario[0]->id_tipousuario), $atributos_tipousuarios) ?>
								<?= form_error('id_tipousuario') ?>
					      	</div>
					     	<div class="form-group col-md-4">
						      	<?= form_label('Estado de Usuario', 'estado_usuario') ?>
								<?= form_dropdown('estado_usuario', $opciones_estado_usuario, set_value('estado_usuario', @$datos_usuario[0]->estado_usuario), $atributos_estado_usuario) ?>
								<?= form_error('estado_usuario') ?>
					      	</div>
					      	<div class="form-group">
								<?= form_input($input_id_usuario) ?>
								<?= form_error('id_usuario') ?>
							</div>	
					    </div>
				  	</div>          
				</div>
			</div>
		<?= form_close() ?>
	</div>
</section>