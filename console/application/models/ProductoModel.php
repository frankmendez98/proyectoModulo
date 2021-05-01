<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductoModel extends CI_Model
{
	private $table ="producto";

	function get_row_info($id){
		$this->db->where('md5(id_producto)', $id);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0)	return $query->row();
		else return false;
	}
	function get_stock($id, $talla){
		if ($talla >0 )
		{
			$this->db->select('cantidad as stock');
			$this->db->where('id_talla', $talla);
			$query = $this->db->get("producto_talla");
			if ($query->num_rows() > 0)	return $query->row();
			else return 0;
		}
		else
		{
			$this->db->select('*');
			$this->db->where('id_producto', $id);
			$query = $this->db->get($this->table);
			if ($query->num_rows() > 0)	return $query->row();
			else return 0;
		}
	}
	function get_tallas($id){
		$this->db->select('*');
		$this->db->where('md5(id_producto)', $id);
		$query = $this->db->get("producto_talla");
		if ($query->num_rows() > 0)	return $query->result();
		else return 0;
	}
	function is_stockable($id, $talla){
		if($talla > 0)
		{
			return 1;
		}
		else {
			$this->db->where('id_producto', $id);
			$this->db->where('tipo_producto', "FISICO");
			$query = $this->db->get($this->table);
			return $query->num_rows();
		}
	}
	function get_wishlist($id,$id_usuario){
		$this->db->where('wishlist.id_usuario', $id_usuario);
		$this->db->where('md5(producto.id_producto)', $id);
		$this->db->join('wishlist', 'wishlist.id_producto = producto.id_producto', 'left');
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0)	return true;
		else return false;
	}

	function get_productos_relacionados($id){
		$this->db->select('p.*');
		$this->db->where('p.inactivo',0);
		if($id!=0){
			$this->db->where('p.id_categoria', $id);
		}
		$this->db->limit(8);
		$this->db->join('categoria as c', 'p.id_categoria = c.id_categoria','LEFT');
		$query = $this->db->get('producto as p');
		return $query->result();
	}

}

/* End of file .php */
