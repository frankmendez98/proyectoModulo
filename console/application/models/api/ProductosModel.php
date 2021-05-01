<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductosModel extends CI_Model
{
	var $table = "producto";
	var $pk = "id_producto";


	/**************************************************************/
	/*******************************API****************************/
	/**************************************************************/
	public function getByCategoria($categoriaID,$limit,$start){

		$this->db->select("id_producto as id, descripcion as nombre, desc_larga as descripcion");
		$this->db->select("marca, imagen, thumb1, img2 as imagen2, img3 as imagen3, img4 as imagen4");
		$this->db->select("precio, tipo_producto as tipo, stock");
		$this->db->where("id_categoria", $categoriaID);
		$this->db->limit($limit,$start);
		$result = $this->db->get($this->table)->result();
		url("imagen",$result);
		url("thumb1",$result);
		url("imagen2",$result);
		url("imagen3",$result);
		url("imagen4",$result);
		parse($result,$this->table);
		return $result;
	}
	public function getByKeyWord($keyword,$limit,$start){

		$this->db->select("id_producto as id, descripcion as nombre, desc_larga as descripcion");
		$this->db->select("marca, imagen, thumb1, img2 as imagen2, img3 as imagen3, img4 as imagen4");
		$this->db->select("precio, tipo_producto as tipo, stock");
		$this->db->where("descripcion LIKE '%$keyword%'");
		$this->db->limit($limit,$start);
		$result = $this->db->get($this->table)->result();
		url("imagen",$result);
		url("thumb1",$result);
		url("imagen2",$result);
		url("imagen3",$result);
		url("imagen4",$result);
		parse($result,$this->table);
		return $result;
	}

	public function get($id = -1){
		$Resultp = array();
		$this->db->select("id_producto as id, descripcion as nombre, desc_larga as descripcion");
		$this->db->select("marca, imagen, thumb1, img2 as imagen2, img3 as imagen3, img4 as imagen4");
		$this->db->select("precio, tipo_producto as tipo, stock");
		$this->db->where($this->pk, $id);
		$result = $this->db->get($this->table)->row();
		if($result !== null)
		{
			foreach ($result as $producto => $value)
			{
				if($producto == "imagen" || $producto == "thumb1" || $producto == "imagen2" || $producto == "imagen3" || $producto == "imagen4")
				{
					$value = base_url("assets/").$value;
				}
				$Resultp[$producto] = $value;
			}
			parse($Resultp,$this->table);
			return $Resultp;
		}
		return $Resultp;
	}
	function totalByCategoria($categoriaID){
		$clients = $this->db->where("id_categoria=".$categoriaID)->get($this->table);
		if ($clients->num_rows() > 0) {
			return $clients->num_rows();
		} else {
			return 0;
		}
	}
	function totalByKeyword($keyword){
		$clients = $this->db->where("descripcion LIKE '%$keyword%'")->get($this->table);
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
