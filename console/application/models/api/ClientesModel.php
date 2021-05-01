<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ClientesModel extends CI_Model
{
	var $table_name = "usuarios";
	var $pk = "id_usuario";
	var $pwd = "password";
	var $mail = "correo";


	/**************************************************************/
	/*******************************API****************************/
	/**************************************************************/
	public function auth($data){

		$loginResult = array(
			"success" => FALSE
		);

		$result = $this->db->select()
		->where($this->mail, $data['email'])
		->get($this->table_name, 1)
		->row();

		if($result !== null){

			$password = decrypt($result->password,'eNcRiPt_K3Y');
			if($password == $data['password'])
			{
				if(isset($data["token"]))
				{
					$token = $data['token'];
					$this->saveToken($token,$result->id_usuario);
				}
				$loginResult['id'] = $result->id_usuario;
				$loginResult['nombre'] = $result->nombre;
				$loginResult['apellido'] = $result->apellido;
				$loginResult['telefono'] = $result->telefono;
				$loginResult['email'] = $result->correo;
				$loginResult['direccion'] = $result->direccion;
				$loginResult['departamento'] = array('id' => $result->id_departamento, 'nombre' => $this->getDepto($result->id_departamento)->nombre);
				$loginResult['municipio'] = array('id' => $result->id_municipio, 'nombre' => $this->getMun($result->id_municipio)->nombre);
				$loginResult['longitud'] = $result->longitud;
				$loginResult['latitud'] = $result->latitud;
				$loginResult['activo'] = $result->activo;
				$loginResult['success'] = TRUE;
				parse($loginResult,'usuarios');
				return $loginResult;
			}

		}

		return $loginResult;
	}
	public function save($data){

		if($this->getByEmail($data['email']) == 0)
		{
			$data[$this->pwd] = encrypt($data[$this->pwd],'eNcRiPt_K3Y');
			$data[$this->mail] = $data["email"];
			unset($data["email"]);
			$data["fecha_creacion"] = date("Y-m-d");
			$data["hora_creacion"] = date("H:i:s");
			$data["codigo"] = encrypt(uniqid(),'y/B?E(H+MbQeThWm5u8x/A?D(G+KbPeSn2r5u7x!A%D*G-KaTjWnZr4u7w!z%C*FbQeThWmZq4t7w9z$');
			$data["confirmado"] = 1;
			$data["activo"] = 1;
			$this->db->insert($this->table_name, $data);
			return $this->db->insert_id();
		}

		return -1;
	}
	public function validarPassword($id_usuario,$password)
	{
		$result = $this->db->select("password")
		->where($this->pk, $id_usuario)
		->get($this->table_name, 1)
		->row();

		if($result !== null){
			$passwordb = decrypt($result->password,'eNcRiPt_K3Y');
			if($passwordb == $password)
			{
				return 1;
			}
			return 0;
		}
		return 0;
	}
	public function existsToken($token,$id_usuario)
	{
		return  $this->db->select()
		->where($this->pk, $id_usuario)
		->where("token", $token)
		->get("usuarios_token")
		->num_rows();
	}
	public function saveToken($token,$id_usuario){

		if($this->existsToken($token,$id_usuario) == 0)
		{
			$result = $this->db->insert("usuarios_token", array("id_usuario" => $id_usuario, 'token'=>$token));
			return $result;
		}
		return -1;
	}
	public function getByEmail($email_){

		$this->db->select();
		$this->db->where($this->mail, $email_);
		return $this->db->get($this->table_name)->num_rows();

	}

	public function getByOtherEmail($id,$email_){

		$this->db->select();
		$this->db->where($this->mail, $email_);
		$this->db->where($this->pk."!=".$id);
		return $this->db->get($this->table_name)->num_rows();

	}
	public function get($userId = -1){

		$this->db->select("nombre, apellido, telefono, correo as email, direccion, id_departamento, id_municipio, '' as departamento, '' as municipio, longitud, latitud, activo");
		if($userId > -1){
			$this->db->where($this->pk, $userId);
			return $this->db->get($this->table_name, 1)->row();
		}
		return $this->db->get($this->table_name)->result();

	}
	public function update($userId, $data){
		if($this->getByOtherEmail($userId,$data['email']) == 0){
			$data[$this->mail] = $data["email"];
			unset($data["email"]);
			if(isset($data["password"]))
			{
				$data[$this->pwd] = encrypt($data[$this->pwd],'eNcRiPt_K3Y');
			}
			$result = $this->db->update($this->table_name, $data, array($this->pk => $userId));
			return $result;
		}
		else {
			return -1;
		}
	}
	public function blacklist($data){
		$result = $this->db->insert("banned_tokens", $data);
		return $result;
	}
	public function blacklistToken($token){
		$this->db->select();
		$this->db->where("token",$token);
		return $this->db->get("banned_tokens")->num_rows();

	}
	public function updatePwd($userId, $data){
			$data[$this->pwd] = encrypt($data[$this->pwd],"eNcRiPt_K3Y");
			$result = $this->db->update($this->table_name, $data, array($this->pk => $userId));
			return $result;
	}

	public function get_departamentos(){
		$result = $this->db->select("id_departamento as id, nombre_departamento as nombre")->get("departamento")->result();
		parse($result,"departamento");
		return $result;
	}
	public function get_sucursales(){
		$result = $this->db->select("id_sucursal as id, direccion, telefono1 as telefono, whatsapp")->get("sucursal")->result();
		parse($result,"sucursal");
		return $result;
	}
	public function get_municipios($iddepto=-1){
		if($iddepto>0)
		{
			$result = $this->db->select("id_municipio as id, nombre_municipio as nombre")->where("id_departamento_municipio=".$iddepto)->get("municipio")->result();
		}
		else {
			$result = $this->db->select("id_municipio as id, nombre_municipio as nombre")->get("municipio")->result();
		}
		parse($result,"municipio");
		return $result;
	}

	public function getDepto($id){
		$this->db->select("nombre_departamento as nombre");
		$this->db->where("id_departamento=".$id);
		$result = $this->db->get("departamento")->row();
		return $result;
	}
	public function getMun($id){
		$this->db->select("nombre_municipio as nombre");
		$this->db->where("id_municipio=".$id);
		$result = $this->db->get("municipio")->row();
		return $result;
	}
	public function isYourOrder($id,$order){
		$this->db->select();
		$this->db->where("id_usuario",$id);
		$this->db->where("id_orden",$order);
		$result = $this->db->get("orden");
		if($result->num_rows()>0)
		{
			return 1;
		}
		else {
			return 0;
		}
	}
	public function isExisItem($id,$product){
		$this->db->select();
		$this->db->where("id_usuario",$id);
		$this->db->where("id_producto",$product);
		$result = $this->db->get("wishlist");
		if($result->num_rows()>0)
		{
			return 1;
		}
		else {
			return 0;
		}
	}
	public function delFromwishlist($data){
		$result = $this->db->delete("wishlist",$data);
		if($result)
		{
			return 1;
		}
		else {
			return 0;
		}
	}
	public function getWishList($id){
		$result = $this->db->select("id_producto as id")->where("id_usuario",$id)->get("wishlist");
		if($result->num_rows() >0)
		{
			$whish = $result->result();
			parse($whish,"wishlist");
			return $whish;
		}
		else {
			return null;
		}
	}
	public function addTowishlist($data){
		$result = $this->db->insert("wishlist",$data);
		if($result)
		{
			return 1;
		}
		else {
			return 0;
		}
	}
	public function getByIdOrder($id){
		$this->db->select("orden.id_orden,orden.fecha, orden.hora,orden.total,orden.envio_cliente as envio,orden.numero_orden,orden.entrega,'' as detalles");
		//$this->db->select("driver.nombre as driver");
		//$this->db->select("empresa.nombre as empresa");
		$this->db->select("estados_orden.descripcion as estado");
		$this->db->from("orden");
		//$this->db->join("orden", "cola_orden_paquete.id_paquete=orden.id_orden");
		//$this->db->join("driver","cola_orden_paquete.id_driver=driver.id_driver");
		//$this->db->join("empresa","orden.id_empresa=empresa.id_empresa");
		$this->db->join("estados_orden","orden.id_estado=estados_orden.id_estado");
		$this->db->where("orden.id_orden", $id);
		$result = $this->db->get()->result();

		parse($result,"orden");
		return $result;
	}
	public function getByClient($clienteID){
		$this->db->select("orden.id_orden,orden.fecha,orden.hora,orden.total,orden.envio_cliente as envio,orden.numero_orden,'' as detalles");
		//$this->db->select("usuarios.nombre as cliente");
		//$this->db->select("empresa.nombre as empresa");
		$this->db->select("estados_orden.descripcion as estado");
		$this->db->from("orden");
		$this->db->join("usuarios","orden.id_usuario=usuarios.id_usuario");
		//$this->db->join("empresa","orden.id_empresa=empresa.id_empresa");
		$this->db->join("estados_orden","orden.id_estado=estados_orden.id_estado");
		$this->db->where("orden.id_usuario", $clienteID);
		$this->db->order_by("orden.id_orden", "DESC");
		$result = $this->db->get()->result();

		parse($result, "orden");
		return $result;
	}
	public function getByOrden($id_orden){
		$this->db->select("orden_detalle.id_orden_detalle as id,orden_detalle.cantidad, orden_detalle.precio,(orden_detalle.cantidad*orden_detalle.precio) as subtotal");
		$this->db->select("producto.descripcion as producto, producto.imagen");
		$this->db->from("orden_detalle");
		$this->db->join("producto","orden_detalle.id_producto=producto.id_producto","left");
		$this->db->where("orden_detalle.id_orden", $id_orden);
		$result = $this->db->get()->result();
		url("imagen",$result);
		parse($result,"orden_detalle");
		return $result;
	}
	public function saveGen($tablei,$allowed_fields,$data){

		allowed_to_use($allowed_fields, $data);
		$this->db->insert($tablei, $data);
		if($tablei == "orden")
		{
			$result = $this->getById($this->db->insert_id());
			return $result;
		}
	}
	public function getById($id)
	{
		$this->db->select("
			id_orden,
			id_usuario,
			orden.id_estado,
			estados_orden.descripcion as estado,
			total,
			envio_cliente as envio,
			numero_orden,
			fecha,
			hora");

		$this->db->join("estados_orden", "orden.id_estado=estados_orden.id_estado", "left");
		$this->db->where("id_orden", $id);
		$this->db->limit(1);
		$return = $this->db->get("orden")->row();
		parse($return, "orden");
		return $return;

	}
	public function updateGen($table,$data,$id_orden){
		$this->db->where("id_orden",$id_orden);
		return $this->db->update($table, $data);
	}
	/**********************************************/
	/**********************************************/
	/**********************************************/
	/**********************************************/
	/**********************************************/
	public function getLocation($id){

		$this->db->select("longitud, latitud");
		$this->db->where("id_empresa", $id);
		return $this->db->get("empresa")->row();
	}
	public function updateCal($id,$data){
			$result = $this->db->update("cola_orden_paquete", $data, array("id_paquete" => $id));
			return $result;
	}
	public function getTarifa($distance){

		$this->db->select("precio");
		$this->db->where($distance." BETWEEN desde AND hasta");
		return $this->db->get("tarifas_orden")->row();
	}
	public function getTarifaC()
	{
		return $this->db->get("tarifa")->row();
	}
	public function getBanner()
	{
		$this->db->select('url');
		return $this->db->get("banner")->result();
	}

	public function getDriverID($id){
		$result = $this->db->select("id_driver")->where('id_paquete',$id)->get("cola_orden_paquete")->row();
		return $result;
	}
	public function getDriverCal($id){
		$result = $this->db->select("calificacion")->where('id_driver',$id)->get("driver")->row();
		return $result;
	}
	public function updateCprom($id,$data)
	{
			$result = $this->db->update("driver", $data, array("id_driver" => $id));
			return $result;
	}

	/**************************************************************/
	/*******************************API****************************/
	/**************************************************************/
}
