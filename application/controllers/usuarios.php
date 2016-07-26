<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct() {
		parent::__construct();	
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Tipousuarios_model');
		$this->load->model('Usuarios_model');
	}

	public function lista_usuarios() {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}
		//cargando los usuarios registrados
		$datos['listado'] = $this->Usuarios_model->listar();

		$datos['titulo'] = 'Listado de Usuarios';
		$datos['contenido'] = 'lista_usuarios_view';
		$datos['ubicacion'] = 'Usuarios';
		$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
		if($this->session->userdata('id_tipousuario') == 1)
			$this->load->view('plantillas/plantilla_admin', $datos);
		else 
			$this->load->view('plantillas/plantilla_user', $datos);
	}

	public function registra_usuarios() {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}

		$this->load->library('encrypt');

		if($this->input->post()) {

			$this->form_validation->set_error_delimiters('<div class="mensaje-error">','</div>');

			if($this->form_validation->run() === FALSE) {
				//cargando todos los tipos de usuarios
				$datos['tipousuarios'] = $this->Tipousuarios_model->listar();

				$datos['titulo'] = 'Registro de Nuevos Usuarios';
				$datos['contenido'] = 'registra_usuarios_view';
				$datos['ubicacion'] = 'Usuarios <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Registro de Usuarios';
				$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
				if($this->session->userdata('id_tipousuario') == 1)
					$this->load->view('plantillas/plantilla_admin', $datos);
				else 
					$this->load->view('plantillas/plantilla_user', $datos);
			}
			else {
				$id_insertado = $this->Usuarios_model->agregar();
				redirect('lista_usuarios');
			}
		} 
		else {
			//cargando todos los tipos de usuarios
			$datos['tipousuarios'] = $this->Tipousuarios_model->listar();

			$datos['titulo'] = 'Registro de Nuevos Usuarios';
			$datos['contenido'] = 'registra_usuarios_view';
			$datos['ubicacion'] = 'Usuarios <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Registro de Usuarios';
			$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
			if($this->session->userdata('id_tipousuario') == 1)
				$this->load->view('plantillas/plantilla_admin', $datos);
			else 
				$this->load->view('plantillas/plantilla_user', $datos);
		}
	}

	public function modifica_usuarios($id = NULL) {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}
		
		$this->load->library('encrypt');
		//Verificamos que el id recibido como parametro es un valor numerico y no nulo
		if($id == NULL OR !is_numeric($id)) {	
			echo 'Error con ID';
			return;
		}

		if($this->input->post()) {
			
			$this->form_validation->set_error_delimiters('<div class="mensaje-error">','</div>');

			if($this->form_validation->run() === FALSE) {
				//cargando todos los tipos de usuarios
				$datos['tipousuarios'] = $this->Tipousuarios_model->listar();

				$datos['titulo'] = 'Modificar Datos Usuario';
				$datos['contenido'] = 'registra_usuarios_view';
				$datos['ubicacion'] = 'Usuarios <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Modificar Datos Usuarios';
				$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
				if($this->session->userdata('id_tipousuario') == 1)
					$this->load->view('plantillas/plantilla_admin', $datos);
				else 
					$this->load->view('plantillas/plantilla_user', $datos);
			}
			else {
				$this->Usuarios_model->editar($id);
				redirect('lista_usuarios');
			}
		} 
		else {
			$datos['datos_usuario'] = $this->Usuarios_model->datos_por_id($id);
		
			if(empty($datos['datos_usuario'])) {
				echo 'El ID es Invalido';
			}
			else {
				//cargando todos los tipos de usuarios
				$datos['tipousuarios'] = $this->Tipousuarios_model->listar();

				$datos['titulo'] = 'Modificar Datos Usuario';
				$datos['contenido'] = 'registra_usuarios_view';
				$datos['ubicacion'] = 'Usuarios <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Modificar Datos Usuarios';
				$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
				if($this->session->userdata('id_tipousuario') == 1)
					$this->load->view('plantillas/plantilla_admin', $datos);
				else 
					$this->load->view('plantillas/plantilla_user', $datos);
			}
		}

	}

	public function verificar_nickusuario($nick){

		$id = $this->input->post('id_usuario');

		if($this->Usuarios_model->verificar_nickusuario($nick)) {
			$this->form_validation->set_message('verificar_nickusuario', 'El Usuario <label class="mensaje-error_repeat">'.$nick.'</label> ya se encuentra registrado en la base de datos.');
			return FALSE;
		}
		else {
			return TRUE;
		}

	}

    public function verificar_nickusuario_mod($nick, $id){

		$id = $this->input->post('id_usuario');

		if($this->Usuarios_model->verificar_nickusuario_mod($nick, $id)) {
			$this->form_validation->set_message('verificar_nickusuario_mod', 'El Usuario <label class="mensaje-error_repeat">'.$nick.'</label> ya se encuentra registrado en la base de datos.');
			return FALSE;
		}
		else {
			return TRUE;
		}

	}
}
