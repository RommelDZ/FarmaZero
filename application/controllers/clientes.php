<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct() {
		parent::__construct();	
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Clientes_model');
	}

	public function lista_clientes() {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}
		//cargando los usuarios registrados
		$datos['listado'] = $this->Clientes_model->listar();

		$datos['titulo'] = 'Listado de clientes';
		$datos['contenido'] = 'lista_clientes_view';
		$datos['ubicacion'] = 'Clientes';
		$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
		if($this->session->userdata('id_tipousuario') == 1)
			$this->load->view('plantillas/plantilla_admin', $datos);
		else 
			$this->load->view('plantillas/plantilla_user', $datos);
	}

	public function registra_clientes() {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}

		if($this->input->post()) {

			$this->form_validation->set_error_delimiters('<div class="mensaje-error">','</div>');

			if($this->form_validation->run() === FALSE) {

				$datos['titulo'] = 'Registro de Nuevos Usuarios';
				$datos['contenido'] = 'registra_clientes_view';
				$datos['ubicacion'] = 'Clientes <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Registro de Clientes';
				$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
				if($this->session->userdata('id_tipousuario') == 1)
					$this->load->view('plantillas/plantilla_admin', $datos);
				else 
					$this->load->view('plantillas/plantilla_user', $datos);
			}
			else {
				$id_insertado = $this->Clientes_model->agregar();
				redirect('lista_clientes');
			}
		} 
		else {

			$datos['titulo'] = 'Registro de Nuevos Usuarios';
			$datos['contenido'] = 'registra_clientes_view';
			$datos['ubicacion'] = 'Clientes <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Registro de Clientes';
			$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
			if($this->session->userdata('id_tipousuario') == 1)
				$this->load->view('plantillas/plantilla_admin', $datos);
			else 
				$this->load->view('plantillas/plantilla_user', $datos);
		}
	}

	public function modifica_clientes($id = NULL) {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}
		//Verificamos que el id recibido como parametro es un valor numerico y no nulo
		if($id == NULL OR !is_numeric($id)) {	
			echo 'Error con ID';
			return;
		}

		if($this->input->post()) {
			
			$this->form_validation->set_error_delimiters('<div class="mensaje-error">','</div>');

			if($this->form_validation->run() === FALSE) {

				$datos['titulo'] = 'Modificar Datos Cliente';
				$datos['contenido'] = 'registra_clientes_view';
				$datos['ubicacion'] = 'Clientes <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Modificar Datos Clientes';
				$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
				if($this->session->userdata('id_tipousuario') == 1)
					$this->load->view('plantillas/plantilla_admin', $datos);
				else 
					$this->load->view('plantillas/plantilla_user', $datos);
			}
			else {
				$this->Clientes_model->editar($id);
				redirect('lista_clientes');
			}
		} 
		else {
			$datos['datos_cliente'] = $this->Clientes_model->datos_por_id($id);
		
			if(empty($datos['datos_cliente'])) {
				echo 'El ID es Invalido';
			}
			else {

				$datos['titulo'] = 'Modificar Datos Cliente';
				$datos['contenido'] = 'registra_clientes_view';
				$datos['ubicacion'] = 'Clientes <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Modificar Datos Clientes';
				$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
				if($this->session->userdata('id_tipousuario') == 1)
					$this->load->view('plantillas/plantilla_admin', $datos);
				else 
					$this->load->view('plantillas/plantilla_user', $datos);
			}
		}
	}

	public function verificar_nitcliente($nit){

		$id = $this->input->post('id_cliente');

		if($this->Clientes_model->verificar_nitcliente($nit)) {
			$this->form_validation->set_message('verificar_nitcliente', 'El NIT o CI del cliente <label class="mensaje-error_repeat">'.$nit.'</label> ya se encuentra registrado en la base de datos.');
			return FALSE;
		}
		else {
			return TRUE;
		}

	}

    public function verificar_nitcliente_mod($nit, $id){

		$id = $this->input->post('id_cliente');

		if($this->Clientes_model->verificar_nitcliente_mod($nit, $id)) {
			$this->form_validation->set_message('verificar_nitcliente_mod', 'El NIT o CI del Cliente <label class="mensaje-error_repeat">'.$nit.'</label> ya se encuentra registrado en la base de datos.');
			return FALSE;
		}
		else {
			return TRUE;
		}

	}
}