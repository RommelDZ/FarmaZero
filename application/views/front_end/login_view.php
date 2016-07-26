<?php 
	$atributos_form = array(
		'role' 			=> 'form',
		'name'			=> 'login-form',
		'class'			=> 'login-form'
	);

	$input_nick_usuario = array(
		'required'		=> 'true',
		'title'			=> 'Por favor ingrese un Nick de Usuario',
	    'name'          => 'nick_usuario',
	    'id'            => 'nick_usuario',
	    'class'			=> 'input nick form-control',
		'type'			=> 'text',
	    'maxlength'     => '50',
	    'placeholder'	=> 'Nick Usuario',
	    'value'			=> set_value('nick_usuario', @$datos_usuario[0]->nick_usuario)
	);

	$input_password_usuario = array(
		'required'		=> 'true',
		'title'			=> 'Por favor ingrese su Password',
	    'name'          => 'password_usuario',
	    'id'            => 'password_usuario',
	    'class'			=> 'input password form-control',
	    'type'			=> 'password',
	    'maxlength'     => '50',
	    'placeholder'	=> 'Password',
	    'value'			=> set_value('password_usuario', @$datos_usuario[0]->password_usuario)
	);

	$btn_enviar = array(
	    'name'          => 'btn_enviar',
	    'id'            => 'btn_enviar',
	    'class'			=> 'button',
	    'type'          => 'submit',
	    'value'       	=> 'Iniciar Sesión'
	);
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Iniciar Sesión</title>
	<link href="<?= base_url() ?>assets/img/favicon.ico" rel="shortcut icon" />
    <!-- Bootstrap -->
    <link href="<?= base_url() ?>assets/css/bootstrap-3.3.6.css" rel="stylesheet" />
    <!-- mis estilos -->
    <link href="<?= base_url() ?>assets/css/login.css" rel="stylesheet" />
</head>
<body>

	<!--WRAPPER-->
	<div id="wrapper">

		<!--SLIDE-IN ICONS-->
		<div class="user-icon"></div>
		<div class="pass-icon"></div>
		<!--END SLIDE-IN ICONS-->

		<!--LOGIN FORM-->
		<?= form_open('', $atributos_form) ?>
			<!--HEADER-->
			<div class="header">
				<h1>Ingresar al Sistema</h1>
			</div>
			<!--END HEADER-->

			<!--CONTENT-->
			<div class="content">
				<?= form_input($input_nick_usuario) ?>
				<?= form_error('nick_usuario') ?>
				<?= form_input($input_password_usuario) ?>
				<?= form_error('password_usuario') ?>
				<span>Ocultar password</span>
				<input type="checkbox" id="mostrar" name="mostrar" onclick="mostrarPassword()" checked="true"/>
			</div>
			<!--END CONTENT-->

			<!--FOOTER-->
			<div class="footer">
				<?php if(@$error_login_usuario): ?>
					<span class="mensaje-error">Error. Nick de Usuario no registrado.</span>
				<?php endif; ?>
				<?php if(@$error_login_password): ?>
					<span class="mensaje-error">Error. Password Incorrecto.</span>
				<?php endif; ?>
				<?= form_submit($btn_enviar) ?>
			</div>
			<!--END FOOTER-->
		<?= form_close() ?>
		<!--END LOGIN FORM-->

	</div>
	<!--END WRAPPER-->

	<!--GRADIENT-->
	<div class="gradient"></div>
	<!--END GRADIENT-->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?= base_url() ?>assets/js/jquery-1.12.0.min.js"></script>
	<!-- Slider-in icons -->
	<script type="text/javascript">
		$(document).ready(function() {
			$(".nick").focus(function() {
				$(".user-icon").css("left","-48px");
			});
			$(".nick").blur(function() {
				$(".user-icon").css("left","0px");
			});

			$(".password").focus(function() {
				$(".pass-icon").css("left","-48px");
			});
			$(".password").blur(function() {
				$(".pass-icon").css("left","0px");
			});
		});
	</script>
	<!-- Funcion para modificar atributo password y sea visible -->
	<script type="text/javascript">
		function mostrarPassword(){
			//Accedo a los elementos del formulario mediante el DOM
			var chkbox = document.getElementById("mostrar");
			var contenido = document.getElementById("password_usuario");
			var atributo = contenido.getAttribute("type");

			//Pregunto si el checkbox esta marcado
			if(chkbox.checked){
				contenido.setAttribute("type","password"); //Si el checkbox esta marcado, el atributo type vale password
			}else{
				contenido.setAttribute("type","text"); //Si el checkbox esta sin marcar, el atributo type vale text
			}
		}
	</script>
</body>
</html>