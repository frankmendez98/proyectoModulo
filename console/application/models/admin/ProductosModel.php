<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductosModel extends CI_Model
{
	private $table = "producto";

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
		$this->db->select('c.nombre_cat as categoria, producto.*');
		$this->db->join('categoria as c', 'c.id_categoria = producto.id_categoria', 'left');
		$this->db->limit($length, $start);
		$row = $this->db->get($this->table);
		if ($row->num_rows() > 0) {
			return $row->result();
		} else {
			return 0;
		}
	}
	function total_rows(){
		$row = $this->db->get($this->table);
		if ($row->num_rows() > 0) {
			return $row->num_rows();
		} else {
			return 0;
		}
	}

	function exits_row($name,$address,$cellphone){
		$this->db->where('name', $name);
		$this->db->where('address', $address);
		$this->db->where('cellphone', $cellphone);
		$row = $this->db->get("clients");
		if ($row->num_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}
	function stock_tallas($id){
		$this->db->select('talla,cantidad');
		$this->db->where('id_producto', $id);
		$rows = $this->db->get("producto_talla");
		if ($rows->num_rows() > 0) return $rows->result();
		else return null;
	}
	function getSubcategorias($id){
		$this->db->select('*');
		$this->db->where('id_categoria', $id);
		$rows = $this->db->get("subcategoria");
		if ($rows->num_rows() > 0) return $rows->result();
		else return null;
	}
	function get_row_info($id){
		$this->db->where('id_producto', $id);
		$row = $this->db->get($this->table);
		if ($row->num_rows() > 0) {
			return $row->row();
		} else {
			return 0;
		}
	}

	function get_state($id){
		$this->db->where('inactivo', 1);
		$this->db->where('id_producto', $id);
		$row = $this->db->get($this->table);
		if ($row->num_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}
	function get_categorias(){
		$row = $this->db->get("categoria");
		if ($row->num_rows() > 0) {
			return $row->result();
		} else {
			return 0;
		}
	}
	function get_tallas($id){
		$row = $this->db->where("id_producto",$id)->get("producto_talla");
		if ($row->num_rows() > 0) {
			return $row->result();
		} else {
			return 0;
		}
	}
	function get_tipo()
	{
		$row = $this->db->get("tipo");
		if ($row->num_rows() > 0) {
			return $row->result_array();
		} else {
			return 0;
		}
	}
	function color($id)
	{
		$this->db->where('color', 1);
		$this->db->where('id_tipo', $id);
		$row = $this->db->get("tipo");
		return $row->num_rows();
	}
	function tipos($id)
	{
		$this->db->where('id_producto', $id);
		$row = $this->db->get("producto_tipo");
		return $row->result_array();

	}
	function detalles_tipo($id)
	{
		$this->db->where('id_pt', $id);
		$row = $this->db->get("producto_tipo_detalle");
		if ($row->num_rows() > 0) {
			return $row->result_array();
		} else {
			return 0;
		}
	}

}

/* End of file ClientModel.php */
