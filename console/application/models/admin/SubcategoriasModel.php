<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubcategoriasModel extends CI_Model
{
	private $table = "subcategoria";

	function get_collection($order, $search, $valid_columns, $length, $start, $dir, $id)
	{
		if ($order !=	 null) {
			$this->db->order_by($order, $dir);
		}
		if (!empty($search)) {
			$x = 0;
			foreach ($valid_columns as $sterm) {
				if ($x == 0) {
					$this->db->like($sterm, $search);
					$this->db->where("id_categoria", $id);
				} else {
					$this->db->or_like($sterm, $search);
					$this->db->where("id_categoria", $id);
				}
				$x++;
			}
		}
		$this->db->where("id_categoria", $id);
		$this->db->limit($length, $start);
		$clients = $this->db->get($this->table);
		if ($clients->num_rows() > 0) {
			return $clients->result();
		} else {
			return 0;
		}
	}
	function total_rows(){
		$clients = $this->db->get($this->table);
		if ($clients->num_rows() > 0) {
			return $clients->num_rows();
		} else {
			return 0;
		}
	}

	function exits_row($camp1,$camp2){
		$this->db->where('nombre_cat', $camp1);
		$this->db->where('descripcion', $camp2);
		$clients = $this->db->get($this->table);
		if ($clients->num_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}

	function get_row_info($id){
		$this->db->where('id_subcategoria', $id);
		$clients = $this->db->get($this->table);
		if ($clients->num_rows() > 0) {
			return $clients->row();
		} else {
			return 0;
		}
	}
	function get_Idcat($param){
		$this->db->select('id_categoria');
		$this->db->where('param', $param);
		$clients = $this->db->get("categoria");
		if ($clients->num_rows() > 0) {
			return $clients->row();
		} else {
			return 0;
		}
	}
	function get_Idcati($id){
		$this->db->select('nombre_cat, param');
		$this->db->where('id_categoria', $id);
		$clients = $this->db->get("categoria");
		if ($clients->num_rows() > 0) {
			return $clients->row();
		} else {
			return 0;
		}
	}


}

/* End of file ClientModel.php */
