<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoriaproductos_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	//Genera un listado de todos los tipos de empresas
	public function listar() {
		$this->db->order_by('nombre_categoriaproducto', 'asc');
		$consulta = $this->db->get('categoriaproductos');
		return $consulta->result();
	}
}