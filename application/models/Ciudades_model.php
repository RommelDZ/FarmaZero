<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciudades_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	//Genera un listado de todos los tipos de empresas
	public function listar() {
		$this->db->order_by('nombre_ciudad', 'asc');
		$consulta = $this->db->get('ciudades');
		return $consulta->result();
	}
}