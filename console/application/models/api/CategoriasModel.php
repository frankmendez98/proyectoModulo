<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriasModel extends CI_Model
{
	var $table = "categoria";
	var $pk = "id_categoria";
	/**************************************************************/
	/*******************************API****************************/
	/**************************************************************/
	public function collection($limit, $start){
		$this->db->limit($limit,$start);
		$result = $this->db->select("id_categoria as id, nombre_cat as nombre, imagen")->get($this->table)->result();
		url("imagen",$result);
		parse($result,"categoria");
		return $result;
	}
	function total_rows(){
		$clients = $this->db->get($this->table);
		if ($clients->num_rows() > 0) {
			return $clients->num_rows();
		} else {
			return 0;
		}
	}
	/**************************************************************/
	/*******************************API****************************/
	/**************************************************************/

}

/* End of file ClientModel.php */
