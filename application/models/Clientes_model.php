<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->helper('date');
	}
	
	//Genera un listado de todos los clientes registrados
	public function listar() {

		$this->db->order_by('id_cliente', 'desc');
		
		$consulta = $this->db->select('id_cliente, nit_cliente, nombre_cliente, direccion_cliente, telefono_cliente, estado_cliente')
                  ->from('clientes')
                  ->get();
		
		return $consulta->result();

	}

	public function datos_por_id($id) {
			
		$consulta = $this->db->where('id_cliente', $id);
		$consulta = $this->db->get('clientes');
		return $consulta->result();
		
	}

	public function verificar_nitcliente($nit){
		
		$this->db->select('nit_cliente')->where('nit_cliente', $nit);
		$consulta = $this->db->get('clientes');
		
		if($consulta->num_rows() > 0) {
			return TRUE;
		}
		
	}

	public function verificar_nitcliente_mod($nit, $id){
		
		$array = array('nit_cliente' => $nit, 'id_cliente !=' => $id);
		$this->db->select('nit_cliente')->where($array);
		$consulta = $this->db->get('clientes');
		
		if($consulta->num_rows() > 0) {
			return TRUE;
		}

	}

	public function agregar() {

		//capturamos los valores que se envian desde el formulario en una variable
		$data_insertar = $this->input->post();

		//eliminado valores del formulario que no se agregaran a la BD
		unset($data_insertar['btn_guardar']);
		
		$this->db->insert('clientes', $data_insertar);
		
		//retornamos el id del ultimo elemento creado
		return $this->db->insert_id();

	}

	public function editar($id) {


		//capturamos los valores que se envian desde el formulario en una variable
		$data_editar = $this->input->post();

		//eliminado valores del formulario que no se agregaran a la BD
		unset($data_editar['btn_guardar']);
		
		$query = $this->db->where('id_cliente', $id);
		$this->db->update('clientes', $data_editar);

	}
}