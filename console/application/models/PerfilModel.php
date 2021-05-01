<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PerfilModel extends CI_Model
{
	private $table = "usuarios";

	function user_info($id_usuario){
		$this->db->select('DATE_FORMAT(fecha_creacion,"%d-%m-%Y") as fecha, usuarios.*');
		$this->db->where('id_usuario', $id_usuario);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0){
			return $query->row();
		}
		else return 0;
	}
	function get_departamentos(){
		$this->db->select('id_departamento,nombre_departamento');
		//$this->db->where("id_departamento","13");
		$cars = $this->db->get("departamento");
		if ($cars->num_rows() > 0) {
			return $cars->result();
		} else {
			return 0;
		}
	}
	function get_municipios($id_departamento){
		$this->db->select('id_municipio,nombre_municipio');
		//if($id_departamento>0){
			$this->db->where('id_departamento_municipio', $id_departamento);
		//}
		//$this->db->where("id_departamento_municipio","13");
		$cars = $this->db->get("municipio");
		if ($cars->num_rows() > 0) {
			return $cars->result();
		} else {
			return 0;
		}
	}
}

/* End of file PerfilModel.php */
