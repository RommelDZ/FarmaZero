<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventaproductos_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

	public function agregar($data) {

        //funcion insert_batch permite multiples inserts recibiendo de parametro un array multidimensional
        $this->db->insert_batch('ventaproductos', $data);

	}

	public function listar($id) {

		$consulta = $this->db->where('vp.id_venta', $id);
		$consulta = $this->db->select('p.id_producto, vp.cantidad_ventaproducto, p.nombre_producto, vp.precio_ventaproducto, vp.importe_ventaproducto')
                  ->from('productos p')
                  ->join('ventaproductos vp', 'p.id_producto = vp.id_producto')
                  ->get();

		return $consulta->result();
	}

	public function top_productos($mes, $gestion){

		$consulta = $this->db->where('MONTH(v.fecha_venta)', $mes);
		$consulta = $this->db->where('YEAR(v.fecha_venta)', $gestion);

		$consulta = $this->db->select('p.id_producto, p.nombre_producto, vp.precio_ventaproducto')
				  ->select_sum('vp.cantidad_ventaproducto')
				  ->select_sum('vp.importe_ventaproducto')
                  ->from('ventaproductos vp')
                  ->join('productos p', 'p.id_producto = vp.id_producto')
                  ->join('ventas v', 'v.id_venta = vp.id_venta')
                  ->group_by('p.id_producto')
                  ->order_by('cantidad_ventaproducto', 'desc')
                  ->get();

		return $consulta->result();
	}

	public function venta_diario($mes, $gestion){
		
		$consulta = $this->db->where('MONTH(v.fecha_venta)', $mes);
		$consulta = $this->db->where('YEAR(v.fecha_venta)', $gestion);

		$consulta = $this->db->select('CONCAT(EXTRACT(DAY FROM v.fecha_venta)," ",CASE DAYOFWEEK(v.fecha_venta) WHEN 1 THEN "Dom" WHEN 2 THEN "Lun" WHEN 3 THEN "Mar" WHEN 4 THEN "Mie" WHEN 5 THEN "Jue" WHEN 6 THEN "Vie" WHEN 7 THEN "Sáb" END) dia')
				  ->select_sum('vp.cantidad_ventaproducto')
				  ->select_sum('vp.importe_ventaproducto')
                  ->from('ventaproductos vp')                  
                  ->join('ventas v', 'v.id_venta = vp.id_venta')
                  ->group_by('dia')
                  ->order_by('v.fecha_venta')
                  ->get();

		return $consulta->result();
	}

	public function venta_mensual($gestion){
		
		$consulta = $this->db->where('YEAR(v.fecha_venta)', $gestion);

		$consulta = $this->db->select('CASE MONTH(v.fecha_venta) WHEN 1 THEN "Ene" WHEN 2 THEN "Feb" WHEN 3 THEN "Mar" WHEN 4 THEN "Abr" WHEN 5 THEN "May" WHEN 6 THEN "Jun" WHEN 7 THEN "Jul" WHEN 8 THEN "Ago" WHEN 9 THEN "Sep" WHEN 10 THEN "Oct" WHEN 11 THEN "Nov" WHEN 12 THEN "Dic" END mes')
				  ->select_sum('vp.cantidad_ventaproducto')
				  ->select_sum('vp.importe_ventaproducto')
                  ->from('ventaproductos vp')                  
                  ->join('ventas v', 'v.id_venta = vp.id_venta')
                  ->group_by('mes')
                  ->order_by('v.fecha_venta')
                  ->get();

		return $consulta->result();
	}

	public function venta_anual(){

		$consulta = $this->db->select('EXTRACT(YEAR FROM v.fecha_venta) as gestion')
				  ->select_sum('vp.cantidad_ventaproducto')
				  ->select_sum('vp.importe_ventaproducto')
                  ->from('ventaproductos vp')                  
                  ->join('ventas v', 'v.id_venta = vp.id_venta')
                  ->group_by('gestion')
                  ->get();

		return $consulta->result();
	}

	public function rentabilidad_trimestral($mes1, $mes2, $gestion){

		$consulta = $this->db->where('MONTH(v.fecha_venta) BETWEEN '.$mes1.' AND '.$mes2);
		$consulta = $this->db->where('YEAR(v.fecha_venta)', $gestion);

		$consulta = $this->db->select('p.id_producto, p.nombre_producto, vp.precio_ventaproducto')
				  ->select_sum('vp.cantidad_ventaproducto')
				  ->select_sum('vp.importe_ventaproducto')
                  ->from('ventaproductos vp')
                  ->join('productos p', 'p.id_producto = vp.id_producto')
                  ->join('ventas v', 'v.id_venta = vp.id_venta')
                  ->group_by('p.id_producto')
                  ->order_by('cantidad_ventaproducto', 'desc')
                  ->get();

		return $consulta->result();
	}
}