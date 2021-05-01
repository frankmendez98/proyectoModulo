<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MenuModel extends CI_Model
{

	function get_cats(){
		$this->db->select('categoria.*');
		$this->db->join('producto', 'producto.id_categoria = categoria.id_categoria');
		$this->db->group_by('categoria.id_categoria');
		return $this->db->get('categoria')->result();
	}

	function get_cats_home(){
		$this->db->select('categoria.*, COUNT(producto.id_categoria) as conteo');
		$this->db->join('producto', 'producto.id_categoria = categoria.id_categoria');
		$this->db->group_by('categoria.id_categoria');
		$this->db->order_by('conteo', 'desc');
		//$this->db->limit(0,4);
		$query = $this->db->get('categoria');
		return $query->result();
	}

	function get_productos_destacados(){
		$this->db->select('p.*');
		$this->db->where('activo',1);
		$this->db->join('producto as p', 'p.id_producto = pd.id_producto');
		$query = $this->db->get('productos_destacados as pd');
		return $query->result();
	}

	function get_sucursales(){
		$this->db->where('activo',1);
		$query = $this->db->get('sucursal');
		return $query->result();
	}

	function get_settings(){
		$this->db->where('id_sitio',1);
		$query = $this->db->get('sitio_web');
		return $query->row();
	}

	function detalles(){
		$query = $this->db->get("baner");
		return $query->result_array();
	}

}

/* End of file .php */
