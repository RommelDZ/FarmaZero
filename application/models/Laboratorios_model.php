<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorios_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('date');
	}
	
	//Genera un listado de todos los paises
	public function listar() {

		$this->db->order_by('id_laboratorio', 'desc');
		
		$consulta = $this->db->select('l.id_laboratorio, l.nombre_laboratorio, c.nombre_ciudad, l.direccion_laboratorio, l.telefono_laboratorio, l.email_laboratorio, l.estado_laboratorio')
                  ->from('laboratorios l')
                  ->join('ciudades c', 'l.id_ciudad = c.id_ciudad')
                  ->get();
		
		return $consulta->result();

	}

	public function datos_por_id($id) {
			
		$consulta = $this->db->where('id_laboratorio', $id);
		$consulta = $this->db->get('laboratorios');
		return $consulta->result();
		
	}

	public function verificar_nombre($nombre){
		
		$this->db->select('nombre_laboratorio')->where('nombre_laboratorio', $nombre);
		$consulta = $this->db->get('laboratorios');
		
		if($consulta->num_rows() > 0) {
			return TRUE;
		}
		
	}

	public function verificar_nombre_mod($nombre, $id){
		
		$array = array('nombre_laboratorio' => $nombre, 'id_laboratorio !=' => $id);
		$this->db->select('nombre_laboratorio')->where($array);
		$consulta = $this->db->get('laboratorios');
		
		if($consulta->num_rows() > 0) {
			return TRUE;
		}

	}

	public function agregar() {

		$data_insertar = $this->input->post();

		//eliminado valores del formulario que no se agregaran a la BD
		unset($data_insertar['btn_guardar']);
		
		$this->db->insert('laboratorios', $data_insertar);
		
		return $this->db->insert_id();

	}

	public function editar($id) {

		$data_editar = $this->input->post();
		
		//eliminado valores del formulario que no se agregaran a la BD
		unset($data_editar['btn_guardar']);
		
		$query = $this->db->where('id_laboratorio', $id);
		$this->db->update('laboratorios', $data_editar);

	}
}