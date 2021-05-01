<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
	private $table = "usuarios";

	function exits_user($username){
		$this->db->where('correo', $username);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0){
			return 1;
		}
		else return 0;
	}

	function login_user($correo,$password){
		$this->db->where('correo', $correo);
		$this->db->where('password', $password);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0){
			return $query->row();
		}
		return 0;
	}

	function verify_code($codigo){
		$this->db->where('codigo', $codigo);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0) return 1;
		else return 0;
	}

	function verify_code_password($email,$codigo){
		$this->db->where('change_pass_token', $codigo);
		$this->db->where('correo !=', $email);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0) return 1;
		else return 0;
	}

	function compare_code($codigo){
		$this->db->where('codigo', $codigo);
		$this->db->where('confirmado', 0);
		$this->db->where('activo', 0);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0) return 1;
		else return 0;
	}
	function compare_code_password($codigo){
		$this->db->where('change_pass_token', $codigo);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0) return 1;
		else return 0;
	}

	function get_user_info($email){
		$this->db->where('correo', $email);
		$row = $this->db->get($this->table);
		if($row->num_rows()>0) return $row->row();
		else return 0;
	}
	function get_id_usuario($code){
		$this->db->where('change_pass_token', $code);
		$row = $this->db->get($this->table);
		if($row->num_rows()>0) return $row->row();
		else return 0;
	}

	function verify_password($pass,$id_usuario){
		$this->db->where('id_usuario', $id_usuario);
		$this->db->where('password', $pass);
		$row = $this->db->get($this->table);
		if ($row->num_rows()>0) return 1;
		else return 0;
	}

}

/* End of file LoginModel.php */
