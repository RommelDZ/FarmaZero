<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

	public function agregar($importe_total,$id_usuario,$id_cliente) {

		$fecha = date('Y-m-d H:i:s');
		
        $data = array(
            'importetotal_venta' => $importe_total,
            'fecha_venta' => $fecha,
            'id_usuario' => $id_usuario,
            'id_cliente' => $id_cliente
        );
        
        $this->db->insert('ventas', $data);
        
        return $this->db->insert_id(); 

	}

	public function datos_por_id($id) {

		$consulta = $this->db->where('v.id_venta', $id);
		$consulta = $this->db->select('v.id_venta, v.importetotal_venta, v.fecha_venta, u.nombre_usuario, c.nombre_cliente, c.nit_cliente')
                  ->from('ventas v')
                  ->join('clientes c', 'v.id_cliente = c.id_cliente')
                  ->join('usuarios u', 'v.id_usuario = u.id_usuario')
                  ->get();
			
		return $consulta->result();
		
	}
}