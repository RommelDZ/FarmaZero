<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->helper('date');
	}

	//Con esta funcion obtenemos los datos de login del usuario a partir del nick de usuario ingresado
	function datos_login($nick) {
		
		$consulta = $this->db->where('nick_usuario', $nick);
		$consulta = $this->db->get('usuarios');
		return $consulta->result();
	}
	
	//Genera un listado de todos los usuarios registrados
	public function listar() {

		$this->db->order_by('id_usuario', 'desc');
		
		$consulta = $this->db->select('u.id_usuario, u.nick_usuario, u.nombre_usuario, u.fecharegistro_usuario, tu.nombre_tipousuario, u.estado_usuario')
                  ->from('usuarios u')
                  ->join('tipousuarios tu', 'u.id_tipousuario = tu.id_tipousuario')
                  ->get();
		
		return $consulta->result();

	}

	public function datos_por_id($id) {
			
		$consulta = $this->db->where('id_usuario', $id);
		$consulta = $this->db->get('usuarios');
		return $consulta->result();
		
	}

	public function verificar_nickusuario($nick){
		
		$this->db->select('nick_usuario')->where('nick_usuario', $nick);
		$consulta = $this->db->get('usuarios');
		
		if($consulta->num_rows() > 0) {
			return TRUE;
		}
		
	}

	public function verificar_nickusuario_mod($nick, $id){
		
		$array = array('nick_usuario' => $nick, 'id_usuario !=' => $id);
		$this->db->select('nick_usuario')->where($array);
		$consulta = $this->db->get('usuarios');
		
		if($consulta->num_rows() > 0) {
			return TRUE;
		}

	}

	public function agregar() {

		//cargando la libreria encrypt
		$this->load->library('encrypt');

		//capturamos los valores que se envian desde el formulario en una variable
		$data_insertar = $this->input->post();
		
		$data_insertar['password_usuario'] = $this->encrypt->encode($data_insertar['password_usuario']);

		//cambiando el formato de fecha a YYYY-mm-dd para almacenar en la BD
		$datestring = "%Y-%m-%d %h:%i:%s";
		$data_insertar['fecharegistro_usuario'] = mdate($datestring);

		//eliminado valores del formulario que no se agregaran a la BD
		unset($data_insertar['btn_guardar']);
		unset($data_insertar['rep_password_usuario']);
		
		$this->db->insert('usuarios', $data_insertar);
		
		return $this->db->insert_id();

	}

	public function editar($id) {

		//cargando la libreria encrypt
		$this->load->library('encrypt');

		//capturamos los valores que se envian desde el formulario en una variable
		$data_editar = $this->input->post();
		
		$data_editar['password_usuario'] = $this->encrypt->encode($data_editar['password_usuario']);

		//eliminado valores del formulario que no se agregaran a la BD
		unset($data_editar['btn_guardar']);
		unset($data_editar['rep_password_usuario']);
		
		$query = $this->db->where('id_usuario', $id);
		$this->db->update('usuarios', $data_editar);

	}
}