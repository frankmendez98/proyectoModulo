<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PedidosModel extends CI_Model
{
	private $table = "orden";

	function get_collection($order, $search, $valid_columns, $length, $start, $dir)
	{
		if ($order !=	 null) {
			$this->db->order_by($order, $dir);
		}
		if (!empty($search)) {
			$x = 0;
			foreach ($valid_columns as $sterm) {
				if ($x == 0) {
					$this->db->like($sterm, $search);
				} else {
					$this->db->or_like($sterm, $search);
				}
				$x++;
			}
		}
		$this->db->select('CONCAT(u.nombre," ",u.apellido) as usuario, orden.*,eo.descripcion as estado');
		$this->db->join('usuarios as u', 'u.id_usuario = orden.id_usuario', 'left');
		$this->db->join('estados_orden as eo', 'eo.id_estado = orden.id_estado', 'left');
		$this->db->limit($length, $start);
		$rows = $this->db->get($this->table);
		if ($rows->num_rows() > 0) {
			return $rows->result();
		} else {
			return 0;
		}
	}
	function total_rows(){
		$rows = $this->db->get($this->table);
		if ($rows->num_rows() > 0) {
			return $rows->num_rows();
		} else {
			return 0;
		}
	}

	function exits_row($name,$address,$cellphone){
		$this->db->where('name', $name);
		$this->db->where('address', $address);
		$this->db->where('cellphone', $cellphone);
		$rows = $this->db->get("clients");
		if ($rows->num_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}

	function get_row_info($id){
		$this->db->select('orden.*, CONCAT(u.nombre," ",u.apellido) as usuario, u.direccion, u.telefono,u.correo,eo.descripcion as estado');
		$this->db->where('numero_orden', $id);
		$this->db->join('estados_orden as eo', 'eo.id_estado = orden.id_estado', 'left');
		$this->db->join('usuarios as u', 'u.id_usuario = orden.id_usuario', 'left');
		$rows = $this->db->get($this->table);
		if ($rows->num_rows() > 0) return $rows->row();
		else return null;
	}

	function get_row_info_by_id($id){
		$this->db->where('id_orden', $id);
		$rows = $this->db->get($this->table);
		if ($rows->num_rows() > 0) return $rows->row();
		else return null;
	}

	function get_estados_orden($id){
		$this->db->where('id_estado>', $id);
		$rows = $this->db->get("estados_orden");
		if ($rows->num_rows() > 0) return $rows->result();
		else return null;
	}

	function get_products_list($id){
		$this->db->select('p.*, od.cantidad, od.precio as precio_p');
		$this->db->join('producto as p', 'p.id_producto = od.id_producto', 'left');
		$this->db->where('od.id_orden', $id);
		$rows = $this->db->get("orden_detalle as od");
		if ($rows->num_rows() > 0) return $rows->result();
		else return null;
	}

	function count_products($id){
		$this->db->join('producto as p', 'p.id_producto = od.id_producto', 'left');
		$this->db->where('od.id_orden', $id);
		$rows = $this->db->get("orden_detalle as od");
		if ($rows->num_rows() > 0) return $rows->num_rows();
		else return null;
	}

	function get_state($id){
		$this->db->where('inactivo', 1);
		$this->db->where('id_producto', $id);
		$rows = $this->db->get($this->table);
		if ($rows->num_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}


}

/* End of file ClientModel.php */
