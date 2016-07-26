<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorios extends CI_Controller {

	public function __construct() {
		parent::__construct();	
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Ciudades_model');
		$this->load->model('Laboratorios_model');
	}

	public function lista_laboratorios() {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}
		//cargando los laboratorios registrados
		$datos['listado'] = $this->Laboratorios_model->listar();

		$datos['titulo'] = 'Listado de Laboratorios';
		$datos['contenido'] = 'lista_Laboratorios_view';
		$datos['ubicacion'] = 'Laboratorios';
		$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');;
		if($this->session->userdata('id_tipousuario') == 1)
			$this->load->view('plantillas/plantilla_admin', $datos);
		else 
			$this->load->view('plantillas/plantilla_user', $datos);
	}

	public function registra_laboratorios() {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}

		if($this->input->post()) {

			$this->form_validation->set_error_delimiters('<div class="mensaje-error">','</div>');

			if($this->form_validation->run() === FALSE) {
				//cargando todos las ciudades
				$datos['ciudad_laboratorio'] = $this->Ciudades_model->listar();

				$datos['titulo'] = 'Registro de Nuevos Laboratorios ';
				$datos['contenido'] = 'registra_laboratorios_view';
				$datos['ubicacion'] = 'Laboratorios <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Registro de Laboratorios';
				$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
				if($this->session->userdata('id_tipousuario') == 1)
					$this->load->view('plantillas/plantilla_admin', $datos);
				else 
					$this->load->view('plantillas/plantilla_user', $datos);
			}
			else {
				$id_insertado = $this->Laboratorios_model->agregar();
				redirect('lista_laboratorios');
			}
		} 
		else {
			//cargando todos las ciudades
			$datos['ciudad_laboratorio'] = $this->Ciudades_model->listar();

			$datos['titulo'] = 'Registro de Nuevos Laboratorios ';
			$datos['contenido'] = 'registra_laboratorios_view';
			$datos['ubicacion'] = 'Laboratorios <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Registro de Laboratorios';
			$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
			if($this->session->userdata('id_tipousuario') == 1)
				$this->load->view('plantillas/plantilla_admin', $datos);
			else 
				$this->load->view('plantillas/plantilla_user', $datos);
		}
	}

	public function modifica_laboratorios($id = NULL) {
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
				//cargando todos las ciudades
				$datos['ciudad_laboratorio'] = $this->Ciudades_model->listar();

				$datos['titulo'] = 'Modificar Datos Laboratorio';
				$datos['contenido'] = 'registra_laboratorios_view';
				$datos['ubicacion'] = 'Laboratorios <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Modificar Datos de Laboratorios';
				$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
				if($this->session->userdata('id_tipousuario') == 1)
					$this->load->view('plantillas/plantilla_admin', $datos);
				else 
					$this->load->view('plantillas/plantilla_user', $datos);
			}
			else {
				$this->Laboratorios_model->editar($id);
				redirect('lista_laboratorios');
			}
		} 
		else {
			$datos['datos_laboratorio'] = $this->Laboratorios_model->datos_por_id($id);
		
			if(empty($datos['datos_laboratorio'])) {
				echo 'El ID es Invalido';
			}
			else {
				//cargando todos las ciudades
				$datos['ciudad_laboratorio'] = $this->Ciudades_model->listar();

				$datos['titulo'] = 'Modificar Datos Laboratorio';
				$datos['contenido'] = 'registra_laboratorios_view';
				$datos['ubicacion'] = 'Laboratorios <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Modificar Datos de Laboratorios';
				$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
				if($this->session->userdata('id_tipousuario') == 1)
					$this->load->view('plantillas/plantilla_admin', $datos);
				else 
					$this->load->view('plantillas/plantilla_user', $datos);
			}
		}
	}

	public function verificar_nombrelaboratorio($nombre){

		$id = $this->input->post('id_laboratorio');

		if($this->Laboratorios_model->verificar_nombre($nombre)) {
			$this->form_validation->set_message('verificar_nombrelaboratorio', 'El Nombre de Laboratorio <label class="mensaje-error_repeat">'.$nombre.'</label> ya se encuentra registrado en la base de datos.');
			return FALSE;
		}
		else {
			return TRUE;
		}

	}

    public function verificar_nombrelaboratorio_mod($nombre, $id){

		$id = $this->input->post('id_laboratorio');

		if($this->Laboratorios_model->verificar_nombre_mod($nombre, $id)) {
			$this->form_validation->set_message('verificar_nombrelaboratorio_mod', 'El Nombre de Laboratorio <label class="mensaje-error_repeat">'.$nombre.'</label> ya se encuentra registrado en la base de datos.');
			return FALSE;
		}
		else {
			return TRUE;
		}

	}
}
