<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bienvenida extends Private_Controller {

	public function __construct() {
		parent::__construct();	
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Usuarios_model');
	}

	public function principal() {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!@$this->user) {
			redirect ('login');
		}
		$datos['titulo'] = 'Sistema de Venta de Artículos de Farmacia';
		$datos['contenido'] = 'bienvenida_view';
		$datos['ubicacion'] = 'Inicio';
		$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
		if($this->session->userdata('id_tipousuario') == 1)
			$this->load->view('plantillas/plantilla_admin', $datos);
		else 
			$this->load->view('plantillas/plantilla_user', $datos);
	}

	public function login() {
		if(!@$this->user) {
			$this->load->library('encrypt');

			$datos = array();

			// Si no esta vacio $_POST
			if($this->input->post()) {

				$nick = $this->input->post('nick_usuario');
				$password = $this->input->post('password_usuario');

				$this->form_validation->set_error_delimiters('<div class="mensaje-error">','</div>');

				// Si las reglas se entramos a la condicion.
				if ($this->form_validation->run() == TRUE) {
					
					// Obtenemos la informacion del usuario desde el modelo Usuarios_model.
					//$logged_user = $this->Usuarios_model->login($nick, $password);
					$logged_user = $this->Usuarios_model->datos_login($nick);
					if ($logged_user){
						foreach ($logged_user as $datos_logged)
						$id_usuario = $datos_logged->id_usuario;
						$nick_usuario = $datos_logged->nick_usuario;
						$password_usuario = $this->encrypt->decode($datos_logged->password_usuario);
						$id_tipousuario = $datos_logged->id_tipousuario;
					}
					else {
						$nick_usuario = '';
						$password_usuario = '';
					}

					// Verifica si existe el usuario.
					if($nick == $nick_usuario) {
						// Si el password de usuario es correcto creamos la sesion y redirigimos al index.
						if($password == $password_usuario) {
							$this->session->set_userdata('logged_user', $logged_user);
							$this->session->set_userdata('id_usuario', $id_usuario);
							$this->session->set_userdata('nick_usuario', $nick_usuario);
							$this->session->set_userdata('id_tipousuario', $id_tipousuario);
							redirect('principal');
						}
						else {
							// De lo contrario se activa el error_login.
							$datos['error_login_password'] = TRUE;
						}
					} 
					else {
						// De lo contrario se activa el error_login.
						$datos['error_login_usuario'] = TRUE;
					}
				}
			}
			$datos['contenido'] = 'login_view';
			$this->load->view('plantillas/plantilla_login', $datos);
		}
		else{
			redirect('principal');
		}
	}

	public function logout() {
		$this->session->unset_userdata('logged_user');
		redirect('principal');
	}

	/*public function principal() {
		$datos['titulo'] = 'Sistema de Venta de Artículos de Farmacia';
		$datos['contenido'] = 'bienvenida_view';
		$datos['ubicacion'] = 'Inicio';
		$this->load->view('plantillas/plantilla', $datos);
	}*/
}
