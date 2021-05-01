<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteModel extends CI_Model
{
	function get_ventas_pedidos($desde,$hasta){
		$this->db->select('o.*,CONCAT(u.nombre," ",u.apellido) as usuario,eo.descripcion as estado');
		$this->db->join('usuarios as u', 'u.id_usuario=o.id_usuario',"left");
		$this->db->join('estados_orden as eo', 'eo.id_estado=o.id_estado',"left");
		$this->db->where("o.fecha BETWEEN '$desde' AND '$hasta'");
		$this->db->where('o.finalizada', 0);
		$row = $this->db->get("orden as o");
		if ($row->num_rows() > 0) {
			return $row->result();
		} else {
			return 0;
		}
	}
	function get_ventas_general($desde,$hasta){
		$this->db->select('o.*,CONCAT(u.nombre," ",u.apellido) as usuario');
		$this->db->from('orden as o');
		$this->db->join('usuarios as u', 'u.id_usuario=o.id_usuario',"left");
		$this->db->where("o.fecha BETWEEN '$desde' AND '$hasta'");
		$this->db->where('o.finalizada', 1);
		$row = $this->db->get();
		if ($row->num_rows() > 0) {
			return $row->result();
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

}


/* End of file ReporteModel.php */
