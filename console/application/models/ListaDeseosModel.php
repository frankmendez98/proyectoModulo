<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListaDeseosModel extends CI_Model
{
	private $table = "wishlist";
	function get_collection($order, $search, $valid_columns, $length, $start, $dir,$id_usuario,$fecha_filtro)
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
		$this->db->select('producto.*,wishlist.id_wishlist');
		$this->db->join('producto', 'producto.id_producto = wishlist.id_producto');
		if($fecha_filtro!=0) $this->db->where('YEAR(wishlist.fecha)', $fecha_filtro);
		$this->db->where('id_usuario', $id_usuario);
		$this->db->limit($length, $start);
		$row = $this->db->get($this->table);
		if ($row->num_rows() > 0) {
			return $row->result();
		} else {
			return 0;
		}
	}
	function total_rows($id_usuario){
		$this->db->where('id_usuario', $id_usuario);
		$row = $this->db->get($this->table);
		if ($row->num_rows() > 0) {
			return $row->num_rows();
		} else {
			return 0;
		}
	}

	function get_row_info($id_client){
		$this->db->where('id_client', $id_client);
		$row = $this->db->get("clients");
		if ($row->num_rows() > 0) {
			return $row->row();
		} else {
			return 0;
		}
	}

}

/* End of file OrdenesModel.php */

