<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('date');
	}
	
	//Genera un listado de todos los paises
	public function listar() {

		$this->db->order_by('id_producto', 'desc');
		
		$consulta = $this->db->select('p.id_producto, p.nombre_producto, p.descripcion_producto, p.stock_producto, p.precio_producto, p.fechavencimiento_producto, l.nombre_laboratorio, pp.nombre_presentacionproducto, cp.nombre_categoriaproducto')
                  ->from('productos p')
                  ->join('laboratorios l', 'p.id_laboratorio = l.id_laboratorio')
                  ->join('presentacionproductos pp', 'p.id_presentacionproducto = pp.id_presentacionproducto')
                  ->join('categoriaproductos cp', 'p.id_categoriaproducto = cp.id_categoriaproducto')
                  ->get();
		
		return $consulta->result();

	}

	public function datos_por_id($id) {
			
		$consulta = $this->db->where('id_producto', $id);
		$consulta = $this->db->get('productos');
		return $consulta->result();
		
	}

	public function verificar_nombre($nombre){
		
		$this->db->select('nombre_producto')->where('nombre_producto', $nombre);
		$consulta = $this->db->get('productos');
		
		if($consulta->num_rows() > 0) {
			return TRUE;
		}
		
	}

	public function verificar_nombre_mod($nombre, $id){
		
		$array = array('nombre_producto' => $nombre, 'id_producto !=' => $id);
		$this->db->select('nombre_producto')->where($array);
		$consulta = $this->db->get('productos');
		
		if($consulta->num_rows() > 0) {
			return TRUE;
		}

	}

	public function agregar() {

		//capturamos los valores que se envian desde el formulario en una variable
		$data_insertar = $this->input->post();

		//eliminado valores del formulario que no se agregaran a la BD
		unset($data_insertar['btn_guardar']);

		//cambiando el formato de fecha a YYYY-mm-dd para almacenar en la BD
		/*$datestring = "%Y-%m-%d %h:%i:%s";
		$data_insertar['fechavencimiento_producto'] = mdate($datestring);*/
		
		$this->db->insert('productos', $data_insertar);
		
		return $this->db->insert_id();

	}

	public function editar($id) {
		
		//capturamos los valores que se envian desde el formulario en una variable
		$data_editar = $this->input->post();
		
		//eliminado valores del formulario que no se agregaran a la BD
		unset($data_editar['btn_guardar']);

		//cambiando el formato de fecha a YYYY-mm-dd para almacenar en la BD
		/*$datestring = "%Y-%m-%d %h:%i:%s";
		$data_editar['fechavencimiento_producto'] = mdate($datestring);*/
		
		$query = $this->db->where('id_producto', $id);
		$this->db->update('productos', $data_editar);

	}
}