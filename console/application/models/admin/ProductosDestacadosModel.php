<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductosDestacadosModel extends CI_Model
{
	private $table = "productos_destacados";

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
		$this->db->select('c.nombre_cat as categoria, p.descripcion, p.marca,productos_destacados.*');
		$this->db->join('producto as p', 'p.id_producto = productos_destacados.id_producto', 'left');
		$this->db->join('categoria as c', 'c.id_categoria = p.id_categoria', 'left');
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

	function get_row_info($id){
		$this->db->where('id_producto_destacado', $id);
		$row = $this->db->get($this->table);
		if ($row->num_rows() > 0) {
			return $row->row();
		} else {
			return 0;
		}
	}

	function get_state($id){
		$this->db->where('activo', 1);
		$this->db->where('id_producto_destacado', $id);
		$row = $this->db->get($this->table);
		if ($row->num_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}
	function get_productos(){
		$this->db->where('inactivo', 0);
		$row = $this->db->get("producto");
		if ($row->num_rows() > 0) {
			return $row->result();
		} else {
			return 0;
		}
	}
	function get_producto_autocomplete($query){
		$this->db->like('descripcion', $query);
		$this->db->where('inactivo', 0);
		$query = $this->db->get('producto');
		if($query->num_rows() > 0)
		{
			$output = array();
			foreach($query->result() as $row)
			{
				$output[] = array(
					'producto' => $row->id_producto." | ".$row->descripcion
				);
			}
			echo json_encode($output);
		}
	}

}

/* End of file ClientModel.php */
