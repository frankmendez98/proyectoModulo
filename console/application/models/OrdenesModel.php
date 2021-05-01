<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrdenesModel extends CI_Model
{
	private $table = "orden";
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
		$this->db->where('orden.id_usuario', $id_usuario);
		if($fecha_filtro!=0) $this->db->where('YEAR(orden.fecha)', $fecha_filtro);
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
		$rows = $this->db->get($this->table);
		if ($rows->num_rows() > 0) {
			return $rows->num_rows();
		} else {
			return 0;
		}
	}


	function exits_car($name,$address,$cellphone){
		$this->db->where('name', $name);
		$this->db->where('address', $address);
		$this->db->where('cellphone', $cellphone);
		$rows = $this->db->get("clients");
		if ($rows->num_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}

	function get_row_info($id,$id_usuario){
		$this->db->select('orden.*, CONCAT(u.nombre," ",u.apellido) as usuario, u.direccion, u.telefono,u.correo, eo.descripcion as estado');
		$this->db->where('numero_orden', $id);
		$this->db->where('orden.id_usuario', $id_usuario);
		$this->db->join('estados_orden as eo', 'eo.id_estado = orden.id_estado', 'left');
		$this->db->join('usuarios as u', 'u.id_usuario = orden.id_usuario', 'left');
		$rows = $this->db->get($this->table);
		if ($rows->num_rows() > 0) return $rows->row();
		else return null;
	}

	function get_products_list($id){
		$this->db->select('p.*, od.cantidad, od.precio as precio_p');
		$this->db->join('producto as p', 'p.id_producto = od.id_producto', 'left');
		$this->db->where('od.id_orden', $id);
		$rows = $this->db->get("orden_detalle as od");
		if ($rows->num_rows() > 0) return $rows->result();
		else return null;
	}
	function count_products($id){
		$this->db->join('producto as p', 'p.id_producto = od.id_producto', 'left');
		$this->db->where('od.id_orden', $id);
		$rows = $this->db->get("orden_detalle as od");
		if ($rows->num_rows() > 0) return $rows->num_rows();
		else return null;
	}
	function get_state($id_client){
		$this->db->where('active', 1);
		$this->db->where('id_client', $id_client);
		$rows = $this->db->get("clients");
		if ($rows->num_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}

	function getIdOrden($norden){
		$this->db->where('numero_orden', $norden);
		$query = $this->db->get("orden");
		if($query->num_rows()>0)
			$result = $query->row()->id_orden;
		else
			$result=0;
		return $result;

	}
		function getOrden($id_orden){

		  $this->db->select('*')
            ->from('orden')
            ->where('orden.id_orden',$id_orden)
            ->join('usuarios','usuarios.id_usuario = orden.id_usuario');
			$query = $this->db->get();
		return $query->result_array();

	}
		function getOrdenRows($norden){
		$this->db->where('id_orden', $norden);
		$records = $this->db->get("orden_detalle");
		$ordenDet = $records->result_array();
		return $ordenDet;
	}

		function getOrdenDetRows($id_orden){
		$Sql="orden_detalle.id_orden,producto.id_producto,orden_detalle.cantidad,orden_detalle.precio,producto.descripcion,producto.imagen,producto_talla.talla";
		$this->db->select($Sql)
		 ->from('orden_detalle')
		 ->join('producto','orden_detalle.id_producto = producto.id_producto')
		 ->join('producto_talla','orden_detalle.talla = producto_talla.id_talla', 'left')
		 ->where('orden_detalle.id_orden',$id_orden);

		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

}

/* End of file OrdenesModel.php */
