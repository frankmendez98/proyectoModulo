<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
	private $table = "usuarios_admin";

	function exits_user($username){
		$this->db->where('usuario', $username);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0){
			return 1;
		}
		else return 0;
	}

	function login_user($usuario,$password){
		$this->db->where('usuario', $usuario);
		$this->db->where('clave', $password);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0){
			return $query->row();
		}
		return 0;
	}

}

/* End of file .php */
