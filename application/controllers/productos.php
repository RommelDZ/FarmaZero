<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct() {
		parent::__construct();	
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Productos_model');
		$this->load->model('Laboratorios_model');
		$this->load->model('Presentacionproductos_model');
		$this->load->model('Categoriaproductos_model');
	}

	public function lista_productos() {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}
		//cargando los laboratorios registrados
		$datos['listado'] = $this->Productos_model->listar();

		$datos['titulo'] = 'Listado de Productos';
		$datos['contenido'] = 'lista_productos_view';
		$datos['ubicacion'] = 'Productos';
		$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');;
		if($this->session->userdata('id_tipousuario') == 1)
			$this->load->view('plantillas/plantilla_admin', $datos);
		else 
			$this->load->view('plantillas/plantilla_user', $datos);
	}

	public function registra_productos() {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}

		if($this->input->post()) {

			$this->form_validation->set_error_delimiters('<div class="mensaje-error">','</div>');

			if($this->form_validation->run() === FALSE) {
				//cargando todos los laboratorios
				$datos['producto_laboratorio'] = $this->Laboratorios_model->listar();

				//cargando todos los tipos de presentacion de productos
				$datos['presentacion_producto'] = $this->Presentacionproductos_model->listar();

				//cargando todas las categorias sw productos
				$datos['categoria_producto'] = $this->Categoriaproductos_model->listar();

				$datos['titulo'] = 'Registro de Nuevos Productos ';
				$datos['contenido'] = 'registra_productos_view';
				$datos['ubicacion'] = 'Productos <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Registro de Productos';
				$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
				if($this->session->userdata('id_tipousuario') == 1)
					$this->load->view('plantillas/plantilla_admin', $datos);
				else 
					$this->load->view('plantillas/plantilla_user', $datos);
			}
			else {
				$id_insertado = $this->Productos_model->agregar();
				redirect('lista_productos');
			}
		} 
		else {
			//cargando todos los laboratorios
			$datos['producto_laboratorio'] = $this->Laboratorios_model->listar();

			//cargando todos los tipos de presentacion de productos
			$datos['presentacion_producto'] = $this->Presentacionproductos_model->listar();

			//cargando todas las categorias sw productos
			$datos['categoria_producto'] = $this->Categoriaproductos_model->listar();

			$datos['titulo'] = 'Registro de Nuevos Productos ';
			$datos['contenido'] = 'registra_productos_view';
			$datos['ubicacion'] = 'Productos <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Registro de Productos';
			$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
			if($this->session->userdata('id_tipousuario') == 1)
				$this->load->view('plantillas/plantilla_admin', $datos);
			else 
				$this->load->view('plantillas/plantilla_user', $datos);
		}
	}

	public function modifica_productos($id = NULL) {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}
		
		$this->load->library('encrypt');

		if($id == NULL OR !is_numeric($id)) {	
			echo 'Error con ID';
			return;
		}

		if($this->input->post()) {
			
			$this->form_validation->set_error_delimiters('<div class="mensaje-error">','</div>');

			if($this->form_validation->run() === FALSE) {
				//cargando todos los laboratorios
				$datos['producto_laboratorio'] = $this->Laboratorios_model->listar();

				//cargando todos los tipos de presentacion de productos
				$datos['presentacion_producto'] = $this->Presentacionproductos_model->listar();

				//cargando todas las categorias sw productos
				$datos['categoria_producto'] = $this->Categoriaproductos_model->listar();

				$datos['titulo'] = 'Modificar Datos Producto';
				$datos['contenido'] = 'registra_productos_view';
				$datos['ubicacion'] = 'Productos <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Modificar Datos de Productos';
				$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
				if($this->session->userdata('id_tipousuario') == 1)
					$this->load->view('plantillas/plantilla_admin', $datos);
				else 
					$this->load->view('plantillas/plantilla_user', $datos);
			}
			else {
				$this->Productos_model->editar($id);
				redirect('lista_productos');
			}
		} 
		else {
			$datos['datos_producto'] = $this->Productos_model->datos_por_id($id);
		
			if(empty($datos['datos_producto'])) {
				echo 'El ID es Invalido';
			}
			else {
				//cargando todos los laboratorios
				$datos['producto_laboratorio'] = $this->Laboratorios_model->listar();

				//cargando todos los tipos de presentacion de productos
				$datos['presentacion_producto'] = $this->Presentacionproductos_model->listar();

				//cargando todas las categorias sw productos
				$datos['categoria_producto'] = $this->Categoriaproductos_model->listar();

				$datos['titulo'] = 'Modificar Datos Producto';
				$datos['contenido'] = 'registra_productos_view';
				$datos['ubicacion'] = 'Productos <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Modificar Datos de Productos';
				$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
				if($this->session->userdata('id_tipousuario') == 1)
					$this->load->view('plantillas/plantilla_admin', $datos);
				else 
					$this->load->view('plantillas/plantilla_user', $datos);
			}
		}
	}

	public function verificar_nombreproducto($nombre){

		$id = $this->input->post('id_producto');

		if($this->Productos_model->verificar_nombre($nombre)) {
			$this->form_validation->set_message('verificar_nombreproducto', 'El Nombre del Producto <label class="mensaje-error_repeat">'.$nombre.'</label> ya se encuentra registrado en la base de datos.');
			return FALSE;
		}
		else {
			return TRUE;
		}

	}

    public function verificar_nombreproducto_mod($nombre, $id){

		$id = $this->input->post('id_producto');

		if($this->Productos_model->verificar_nombre_mod($nombre, $id)) {
			$this->form_validation->set_message('verificar_nombreproducto_mod', 'El Nombre del Producto <label class="mensaje-error_repeat">'.$nombre.'</label> ya se encuentra registrado en la base de datos.');
			return FALSE;
		}
		else {
			return TRUE;
		}

	}
}