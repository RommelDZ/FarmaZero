<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

	public function __construct() {
		parent::__construct();	
		$this->load->helper('form');
		$this->load->model('Ventaproductos_model');
	}

	public function top_productos() {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}
		//cargando los laboratorios registrados
		$datos['listado'] = $this->Ventaproductos_model->top_productos(4, 2016);

		$datos['titulo'] = 'Top Productos';
		$datos['contenido'] = 'reporte_top_productos_view';
		$datos['ubicacion'] = 'Reportes <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Top Productos';
		$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');;
		if($this->session->userdata('id_tipousuario') == 1)
			$this->load->view('plantillas/plantilla_admin', $datos);
		else 
			$this->load->view('plantillas/plantilla_user', $datos);
	}

	public function top_productos_ajax() {

		if($this->input->is_ajax_request()) {
			$mes = $_POST['mes'];
			$gestion = $_POST['gestion'];
			$datos['draw'] = 1;
			
			$datos['data'] = $this->Ventaproductos_model->top_productos($mes, $gestion);

			for ($i = 0; $i < sizeof($datos['data']); $i++) { 
				$datos['data'][$i]->precio_ventaproducto = number_format($datos['data'][$i]->precio_ventaproducto, 2, ',', '').' Bs.';
				$datos['data'][$i]->importe_ventaproducto = number_format($datos['data'][$i]->importe_ventaproducto, 2, ',', '').' Bs.';
			}

			$datos['recordsTotal'] = count($datos['data']);
			$datos['recordsFiltered'] = count($datos['data']);
			echo json_encode($datos);
		}
		else {
			show_404();
		}
	}

	public function venta_diario() {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}
		//cargando los laboratorios registrados
		$datos['listado'] = $this->Ventaproductos_model->venta_diario(date('m'), date('Y'));

		$datos['titulo'] = 'Venta Diario';
		$datos['contenido'] = 'reporte_venta_diario_view';
		$datos['ubicacion'] = 'Reportes <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Venta Diario';
		$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');;
		if($this->session->userdata('id_tipousuario') == 1)
			$this->load->view('plantillas/plantilla_admin', $datos);
		else 
			$this->load->view('plantillas/plantilla_user', $datos);
	}


	public function venta_diario_ajax() {

		if($this->input->is_ajax_request()) {
			$mes = $_POST['mes'];
			$gestion = $_POST['gestion'];			
			
			$datos = $this->Ventaproductos_model->venta_diario($mes, $gestion);

			echo json_encode($datos);
		}
		else {
			show_404();
		}
	}

	public function venta_mensual() {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}
		//cargando los laboratorios registrados
		$datos['listado'] = $this->Ventaproductos_model->venta_mensual(date('Y'));

		$datos['titulo'] = 'Venta Mensual';
		$datos['contenido'] = 'reporte_venta_mensual_view';
		$datos['ubicacion'] = 'Reportes <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Venta Mensual';
		$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');;
		if($this->session->userdata('id_tipousuario') == 1)
			$this->load->view('plantillas/plantilla_admin', $datos);
		else 
			$this->load->view('plantillas/plantilla_user', $datos);
	}

	public function venta_mensual_ajax() {

		if($this->input->is_ajax_request()) {
			$gestion = $_POST['gestion'];			
			
			$datos = $this->Ventaproductos_model->venta_mensual($gestion);

			echo json_encode($datos);
		}
		else {
			show_404();
		}
	}

	public function venta_anual() {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}
		//cargando los laboratorios registrados
		$datos['listado'] = $this->Ventaproductos_model->venta_anual();

		$datos['titulo'] = 'Venta Anual';
		$datos['contenido'] = 'reporte_venta_anual_view';
		$datos['ubicacion'] = 'Reportes <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Venta Anual';
		$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');;
		if($this->session->userdata('id_tipousuario') == 1)
			$this->load->view('plantillas/plantilla_admin', $datos);
		else 
			$this->load->view('plantillas/plantilla_user', $datos);
	}

	public function venta_anual_ajax() {

		if($this->input->is_ajax_request()) {
			
			$datos = $this->Ventaproductos_model->venta_anual();

			echo json_encode($datos);
		}
		else {
			show_404();
		}
	}

	public function rentabilidad_trimestral() {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}

		//cargando los resultados obtenidos en consulta
		$datos['primer_trimestre'] = $this->Ventaproductos_model->rentabilidad_trimestral(1,3,date("Y"));
		$datos['segundo_trimestre'] = $this->Ventaproductos_model->rentabilidad_trimestral(4,6,date("Y"));
		$datos['tercer_trimestre'] = $this->Ventaproductos_model->rentabilidad_trimestral(7,9,date("Y"));
		$datos['cuarto_trimestre'] = $this->Ventaproductos_model->rentabilidad_trimestral(10,12,date("Y"));

		$datos['titulo'] = 'Rentabilidad de Producto Trimestral';
		$datos['contenido'] = 'reporte_rentabilidad_trimestral_view';
		$datos['ubicacion'] = 'Reportes <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Rentabilidad de Producto Trimestral';
		$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');;
		if($this->session->userdata('id_tipousuario') == 1)
			$this->load->view('plantillas/plantilla_admin', $datos);
		else 
			$this->load->view('plantillas/plantilla_user', $datos);
	}

	public function rentabilidad_trimestral_ajax() {

		if($this->input->is_ajax_request()) {
			$gestion = $_POST['gestion'];			
			$datos['primer_trimestre'] = $this->Ventaproductos_model->rentabilidad_trimestral(1,3,$gestion);
			$datos['segundo_trimestre'] = $this->Ventaproductos_model->rentabilidad_trimestral(4,6,$gestion);
			$datos['tercer_trimestre'] = $this->Ventaproductos_model->rentabilidad_trimestral(7,9,$gestion);
			$datos['cuarto_trimestre'] = $this->Ventaproductos_model->rentabilidad_trimestral(10,12,$gestion);

			echo json_encode($datos);
		}
		else {
			show_404();
		}
	}	

}
