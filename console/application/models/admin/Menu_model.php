<?php
class Menu_model extends CI_Model {

	function get_menu($id_usuario,$admin)
	{
		$this->db->order_by('menu.prioridad', 'ASC');;
		$this->db->where("menu.visible", 1);

		if($admin==0){
			$this->db->where('permisos_usuario.id_usuario', $id_usuario);
			$this->db->join('modulo', 'modulo.id_menu = menu.id_menu', 'left');
			$this->db->join('permisos_usuario', 'permisos_usuario.id_modulo = modulo.id_modulo','left');
		}
		$this->db->group_by('menu.id_menu');
		$query = $this->db->get("menu");
		if ($query->num_rows() > 0)	return $query->result();
		return false;
	}
	function get_controller($id_usuario,$admin)
	{
		if($admin==0){
			$this->db->where('permisos_usuario.id_usuario', $id_usuario);
			$this->db->join('permisos_usuario', 'permisos_usuario.id_modulo = modulo.id_modulo');
		}
		$this->db->where("modulo.mostrarmenu", 1);
		$query = $this->db->get("modulo");
		if ($query->num_rows() > 0)	return $query->result();
		return false;
	}
	function get_config(){
		$this->db->where("id_configuracion", 1);
		$query = $this->db->get("configuracion");
		if ($query->num_rows() > 0)	return $query->row();
		return NULL;
	}
}
?>
