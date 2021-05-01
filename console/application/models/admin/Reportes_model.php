<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes_model extends CI_Model
{
	function get_coordinacion($id_gerencia){
		$this->db->select('u.id_unidad,u.nombre');
		$this->db->where('id_coordinacion', $id_gerencia);
		$this->db->join('coordinacion_detalle as cd', 'cd.id_unidad = u.id_unidad');
		$unidades = $this->db->get("unidades as u");
		if ($unidades->num_rows() > 0) {
			return $unidades->result();
		} else {
			return 0;
		}
	}
	function get_gerencia(){
		$this->db->where('estado', 1);
		$unidades = $this->db->get("coordinacion");
		if ($unidades->num_rows() > 0) {
			return $unidades->result();
		} else {
			return 0;
		}
	}
	function gerencia($id_gerencia){
		$this->db->select('id_coordinacion,UPPER(nombre) as nombre');
		$this->db->where('id_coordinacion', $id_gerencia);
		$unidades = $this->db->get("coordinacion");
		if ($unidades->num_rows() > 0) {
			return $unidades->row();
		} else {
			return 0;
		}
	}
	function coordinacion($coordinacion){
		$this->db->select('id_unidad,UPPER(nombre) as nombre');
		$this->db->where('id_unidad', $coordinacion);
		$unidades = $this->db->get("unidades");
		if ($unidades->num_rows() > 0) {
			return $unidades->row();
		} else {
			return 0;
		}
	}

	function get_colaboradores(){
		$this->db->select('c.codigo, CONCAT(c.nombre,\' \',c.apellido) as nombre,c.cargo');
		$this->db->select('DATE_FORMAT(c.fecha_ingreso, \'%d-%m-%Y\') as Fecha_ingreso');
		$this->db->select('DATE_FORMAT(NOW(), \'%d-%m-%Y\')  as Fecha_actual');
		$this->db->select('IF(c.fecha_ingreso!="0000-00-00",format(DATEDIFF(CURDATE(),c.fecha_ingreso) / 365.25,2),"0") as anios');
		$this->db->select('u.nombre as unidad');
		$this->db->join('unidades as u', 'u.id_unidad = c.id_unidad', 'left');
		$colaboradores = $this->db->get('colaboradores as c');

		if ($colaboradores->num_rows() > 0) {
			return $colaboradores->result();
		} else {
			return 0;
		}
	}

	function get_colaboradores_coordinacion($tipo_reporte){
		$this->db->select('c.codigo, CONCAT(c.nombre,\' \',c.apellido) as nombre,c.cargo');
		$this->db->select('DATE_FORMAT(c.fecha_ingreso, \'%d-%m-%Y\') as Fecha_ingreso');
		$this->db->select('DATE_FORMAT(NOW(), \'%d-%m-%Y\')  as Fecha_actual');
		$this->db->select('IF(c.fecha_ingreso!="0000-00-00",format(DATEDIFF(CURDATE(),c.fecha_ingreso) / 365.25,2),"0") as anios');
		$this->db->where('c.id_unidad', $tipo_reporte);
		$this->db->join('unidades as u', 'u.id_unidad = c.id_unidad', 'left');
		$colaboradores = $this->db->get('colaboradores as c');
		if ($colaboradores->num_rows() > 0) {
			return $colaboradores->result();
		} else {
			return 0;
		}
	}

	function get_colaboradores_gerencia($tipo_reporte){
		$this->db->select('c.codigo, CONCAT(c.nombre,\' \',c.apellido) as nombre,c.cargo');
		$this->db->select('DATE_FORMAT(c.fecha_ingreso, \'%d-%m-%Y\') as Fecha_ingreso');
		$this->db->select('DATE_FORMAT(NOW(), \'%d-%m-%Y\')  as Fecha_actual');
		$this->db->select('IF(c.fecha_ingreso!="0000-00-00",format(DATEDIFF(CURDATE(),c.fecha_ingreso) / 365.25,2),"0") as anios');
		$this->db->where('coor.id_coordinacion', $tipo_reporte);
		$this->db->join('coordinacion as coor', 'coor.id_colaborador = c.jefe_superior', 'left');
		$colaboradores = $this->db->get('colaboradores as c');
		if ($colaboradores->num_rows() > 0) {
			return $colaboradores->result();
		} else {
			return 0;
		}
	}
	function get_tipos_permiso(){
		$this->db->join('unidad_tiempo as ut', 'ut.id_unidad_tiempo=pt.id_unidad_tiempo','left');
		$colaboradores = $this->db->get('permiso_tipo as pt');

		if ($colaboradores->num_rows() > 0) {
			return $colaboradores->result();
		} else {
			return 0;
		}
	}
	function get_historial_vacaciones($gerencia,$coordinacion,$fecha1,$fecha2){
		$this->db->select('v.correlativo,CONCAT(c.nombre," ",c.apellido) as nombre');
		$this->db->select('DATE_FORMAT(v.fecha_solicitud, "%d-%m-%Y") as Fecha_solicitud');
		$this->db->select('DATE_FORMAT(v.fecha_inicio, "%d-%m-%Y") as Fecha_inicio');
		$this->db->select('DATE_FORMAT(v.fecha_fin, "%d-%m-%Y") as Fecha_fin');
		$this->db->select('v.total_dias as dias,v.estado');
		$this->db->join('colaboradores as c', 'c.id_colaborador=v.id_colaborador');
		$this->db->where('v.fecha_solicitud BETWEEN "'.$fecha1.'" AND "'.$fecha2.'" ');
		if($gerencia!=0 AND $coordinacion==0){
			$this->db->where('coor.id_coordinacion', $gerencia);
			$this->db->join('coordinacion as coor', 'coor.id_colaborador = c.jefe_superior', 'left');
		}
		if($gerencia!=0 AND $coordinacion!=0){
			$this->db->where('c.id_unidad', $coordinacion);
			$this->db->join('unidades as u', 'u.id_unidad = c.id_unidad', 'left');
		}

		$colaboradores = $this->db->get('vacaciones as v');
		if ($colaboradores->num_rows() > 0) {
			return $colaboradores->result();
		} else {
			return 0;
		}
	}
	function get_historial_permisos($gerencia,$coordinacion,$fecha1,$fecha2){
		$this->db->select('c.codigo,CONCAT(c.nombre," ",c.apellido) as nombre');
		$this->db->select('pt.descripcion,DATE_FORMAT(p.fecha_inicio, "%d-%m-%Y") as Fecha_inicio,p.hora_inicio');
		$this->db->select('DATE_FORMAT(p.fecha_fin, "%d-%m-%Y") as Fecha_fin,p.hora_fin');
		$this->db->select('p.justificacion as Justificacion');
		$this->db->select('p.estado');

		$this->db->join('colaboradores as c', 'c.id_colaborador=p.id_colaborador');
		$this->db->join('permiso_tipo as pt', 'pt.id_tipo_permiso=p.id_tipo_permiso');
		$this->db->where('p.fecha_solicitud BETWEEN "'.$fecha1.'" AND "'.$fecha2.'" ');
		if($gerencia!=0 AND $coordinacion==0){
			$this->db->where('coor.id_coordinacion', $gerencia);
			$this->db->join('coordinacion as coor', 'coor.id_colaborador = c.jefe_superior', 'left');
		}
		if($gerencia!=0 AND $coordinacion!=0){
			$this->db->where('c.id_unidad', $coordinacion);
			$this->db->join('unidades as u', 'u.id_unidad = c.id_unidad', 'left');
		}

		$colaboradores = $this->db->get('permisos as p');
		if ($colaboradores->num_rows() > 0) {
			return $colaboradores->result();
		} else {
			return 0;
		}
	}
	function get_dias_pendientes($gerencia,$coordinacion){
		$this->db->select('c.id_colaborador,c.codigo,CONCAT(c.nombre," ",c.apellido) as nombre,c.cargo');
		$this->db->select('DATE_FORMAT(c.fecha_ingreso, "%d-%m-%Y") as Fecha_ingreso');
		//$this->db->select('sumvc.saldo as dias, vc.year');

		//$this->db->join('vacaciones_colaboradores as vc', 'c.id_colaborador=vc.id_colaborador');
		if($gerencia!=0 AND $coordinacion==0){
			$this->db->where('coor.id_coordinacion', $gerencia);
			$this->db->join('coordinacion as coor', 'coor.id_colaborador = c.jefe_superior', 'left');
		}
		if($gerencia!=0 AND $coordinacion!=0){
			$this->db->where('c.id_unidad', $coordinacion);
			$this->db->join('unidades as u', 'u.id_unidad = c.id_unidad', 'left');
		}
		$this->db->order_by("c.id_colaborador", "asc");
		$colaboradores = $this->db->get('colaboradores as c');
		if ($colaboradores->num_rows() > 0) {
			return $colaboradores->result();
		} else {
			return 0;
		}
	}
	function get_saldo_anios($id_colaborador){

		$this->db->select('vc.saldo as dias, vc.year');
		$this->db->where('vc.id_colaborador', $id_colaborador);
		$colaboradores = $this->db->get('vacaciones_colaboradores as vc');
		if ($colaboradores->num_rows() > 0) {
			return $colaboradores->result();
		} else {
			return 0;
		}
	}
	function get_saldo_total($id_colaborador){

		$this->db->select('SUM(vc.saldo) as total');
		$this->db->where('vc.id_colaborador', $id_colaborador);
		$colaboradores = $this->db->get('vacaciones_colaboradores as vc');
		if ($colaboradores->num_rows() > 0) {
			return $colaboradores->row();
		} else {
			return 0;
		}
	}
}


/* End of file Reportes_model.php */
