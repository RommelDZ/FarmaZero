<?php

$config = array(
	'bienvenida/login' => array(
		array(
			'field' => 'nick_usuario',
			'label'	=> 'Nick',
			'rules' => 'required'	
		),
		array(
			'field' => 'password_usuario',
			'label'	=> 'Password',
			'rules' => 'required'	
		)
	),
	'usuarios/registra_usuarios' => array(
		array(
			'field' => 'nombre_usuario',
			'label'	=> 'Nombre(s) y Apellido(s)',
			'rules' => 'trim|required|alpha_numeric_spaces'	
		),
		array(
			'field' => 'nick_usuario',
			'label'	=> 'Nick Usuario',
			'rules' => 'trim|required|alpha_dash|callback_verificar_nickusuario'	
		),
		array(
			'field' => 'password_usuario',
			'label'	=> 'Password',
			'rules' => 'trim|required|alpha_numeric'	
		),
		array(
			'field' => 'rep_password_usuario',
			'label'	=> 'Repetir Password',
			'rules' => 'trim|required|alpha_numeric|matches[password_usuario]'	
		),
		array(
			'field' => 'id_tipousuario',
			'label'	=> 'Tipo de Usuario',
			'rules' => 'trim|required'	
		),
		array(
			'field' => 'estado_usuario',
			'label'	=> 'Estado de Usuario',
			'rules' => 'trim|required'	
		)
	),
	'usuarios/modifica_usuarios' => array(
		array(
			'field' => 'nombre_usuario',
			'label'	=> 'Nombre(s) y Apellido(s)',
			'rules' => 'trim|required|alpha_numeric_spaces'	
		),
		array(
			'field' => 'nick_usuario',
			'label'	=> 'Nick Usuario',
			'rules' => 'trim|required|alpha_dash|callback_verificar_nickusuario_mod'	
		),
		array(
			'field' => 'password_usuario',
			'label'	=> 'Password',
			'rules' => 'trim|required|alpha_numeric'	
		),
		array(
			'field' => 'rep_password_usuario',
			'label'	=> 'Repetir Password',
			'rules' => 'trim|required|alpha_numeric|matches[password_usuario]'	
		),
		array(
			'field' => 'id_tipousuario',
			'label'	=> 'Tipo de Usuario',
			'rules' => 'trim|required'	
		),
		array(
			'field' => 'estado_usuario',
			'label'	=> 'Estado de Usuario',
			'rules' => 'trim|required'	
		)
	),
	'clientes/registra_clientes' => array(
		array(
			'field' => 'nit_cliente',
			'label'	=> 'NIT o CI Cliente',
			'rules' => 'trim|required|numeric|callback_verificar_nitcliente'	
		),
		array(
			'field' => 'nombre_cliente',
			'label'	=> 'Nombre(s) y Apellido(s)',
			'rules' => 'trim|required|alpha_numeric_spaces'	
		),
		array(
			'field' => 'direccion_cliente',
			'label'	=> 'Dirección',
			'rules' => 'trim|required|alpha_numeric_spaces'	
		),
		array(
			'field' => 'telefono_cliente',
			'label'	=> 'Telefóno',
			'rules' => 'trim|required|numeric'	
		),
		array(
			'field' => 'estado_cliente',
			'label'	=> 'Estado de Cliente',
			'rules' => 'trim|required'	
		)
	),
	'clientes/modifica_clientes' => array(
		array(
			'field' => 'nit_cliente',
			'label'	=> 'NIT o CI Cliente',
			'rules' => 'trim|required|numeric|callback_verificar_nitcliente_mod'	
		),
		array(
			'field' => 'nombre_cliente',
			'label'	=> 'Nombre(s) y Apellido(s)',
			'rules' => 'trim|required|alpha_numeric_spaces'	
		),
		array(
			'field' => 'direccion_cliente',
			'label'	=> 'Dirección',
			'rules' => 'trim|required|alpha_numeric_spaces'	
		),
		array(
			'field' => 'telefono_cliente',
			'label'	=> 'Telefóno',
			'rules' => 'trim|required|numeric'	
		),
		array(
			'field' => 'estado_cliente',
			'label'	=> 'Estado de Cliente',
			'rules' => 'trim|required'	
		)
	),
	'laboratorios/registra_laboratorios' => array(
		array(
			'field' => 'nombre_laboratorio',
			'label'	=> 'Nombre Laboratorio',
			'rules' => 'trim|required|alpha_numeric_spaces|callback_verificar_nombrelaboratorio'	
		),
		array(
			'field' => 'id_ciudad',
			'label'	=> 'Ciudad',
			'rules' => 'trim|required'	
		),
		array(
			'field' => 'direccion_laboratorio',
			'label'	=> 'Dirección',
			'rules' => 'trim|required|alpha_numeric_spaces'	
		),
		array(
			'field' => 'telefono_laboratorio',
			'label'	=> 'Telefóno',
			'rules' => 'trim|required|numeric'	
		),
		array(
			'field' => 'email_laboratorio',
			'label'	=> 'Email',
			'rules' => 'trim|required|valid_email'	
		),
		array(
			'field' => 'estado_laboratorio',
			'label'	=> 'Estado de Laboratorio',
			'rules' => 'trim|required'	
		)
	),

	'laboratorios/modifica_laboratorios' => array(
		array(
			'field' => 'nombre_laboratorio',
			'label'	=> 'Nombre Laboratorio',
			'rules' => 'trim|required|alpha_numeric_spaces|callback_verificar_nombrelaboratorio_mod'	
		),
		array(
			'field' => 'id_ciudad',
			'label'	=> 'Ciudad',
			'rules' => 'trim|required'	
		),
		array(
			'field' => 'direccion_laboratorio',
			'label'	=> 'Dirección',
			'rules' => 'trim|required|alpha_numeric_spaces'	
		),
		array(
			'field' => 'telefono_laboratorio',
			'label'	=> 'Telefóno',
			'rules' => 'trim|required|numeric'	
		),
		array(
			'field' => 'email_laboratorio',
			'label'	=> 'Email',
			'rules' => 'trim|required|valid_email'	
		),
		array(
			'field' => 'estado_laboratorio',
			'label'	=> 'Estado de Laboratorio',
			'rules' => 'trim|required'	
		)
	),
	'productos/registra_productos' => array(
		array(
			'field' => 'nombre_producto',
			'label'	=> 'Nombre Producto',
			'rules' => 'trim|required|alpha_numeric_spaces|callback_verificar_nombreproducto'	
		),
		array(
			'field' => 'precio_producto',
			'label'	=> 'Precio Producto',
			'rules' => 'trim|numeric|required'	
		),
		array(
			'field' => 'stock_producto',
			'label'	=> 'Stock Producto',
			'rules' => 'trim|required|is_natural_no_zero'	
		),
		array(
			'field' => 'fechavencimiento_producto',
			'label'	=> 'Fecha de Vencimiento',
			'rules' => 'trim|required'	
		),
		array(
			'field' => 'id_laboratorio',
			'label'	=> 'Laboratorio',
			'rules' => 'trim|required'	
		),
		array(
			'field' => 'id_presentacionproducto',
			'label'	=> 'Presentación Producto',
			'rules' => 'trim|required'	
		),
		array(
			'field' => 'id_categoriaproducto',
			'label'	=> 'Categoria Producto',
			'rules' => 'trim|required'	
		),
		array(
			'field' => 'descripcion_producto',
			'label'	=> 'Descripción Producto',
			'rules' => 'trim|required'	
		)
	),
	'productos/modifica_productos' => array(
		array(
			'field' => 'nombre_producto',
			'label'	=> 'Nombre Producto',
			'rules' => 'trim|required|alpha_numeric_spaces|callback_verificar_nombreproducto_mod'	
		),
		array(
			'field' => 'precio_producto',
			'label'	=> 'Precio Producto',
			'rules' => 'trim|numeric|required'	
		),
		array(
			'field' => 'stock_producto',
			'label'	=> 'Stock Producto',
			'rules' => 'trim|required|is_natural_no_zero'	
		),
		array(
			'field' => 'fechavencimiento_producto',
			'label'	=> 'Fecha de Vencimiento',
			'rules' => 'trim|required'	
		),
		array(
			'field' => 'id_laboratorio',
			'label'	=> 'Laboratorio',
			'rules' => 'trim|required'	
		),
		array(
			'field' => 'id_presentacionproducto',
			'label'	=> 'Presentación Producto',
			'rules' => 'trim|required'	
		),
		array(
			'field' => 'id_categoriaproducto',
			'label'	=> 'Categoria Producto',
			'rules' => 'trim|required'	
		),
		array(
			'field' => 'descripcion_producto',
			'label'	=> 'Descripción Producto',
			'rules' => 'trim|required'	
		)
	),
	'ventas/registra_ventaproducto' => array(
		array(
			'field' => 'nombre_ventaproducto',
			'label'	=> 'Producto',
			'rules' => 'trim|required'	
		),
		array(
			'field' => 'cantidad_ventaproducto',
			'label'	=> 'Cantidad',
			'rules' => 'trim|required|is_natural_no_zero'	
		)
	),
	'ventas/registra_venta' => array(
		array(
			'field' => 'nombre_cliente',
			'label'	=> 'Cliente',
			'rules' => 'trim|required'	
		),
		array(
			'field' => 'cantidad[]',
			'label'	=> 'Cantidad',
			'rules' => 'trim|required|is_natural_no_zero'	
		)
	)

);