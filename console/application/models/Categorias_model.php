<?php
class Categorias_model extends CI_Model {

  function __construct() {
    // Set table name
    $this->load->database();
    $this->table = 'categoria';
  }
  function getRows($params = array()){
    $this->db->select('*');
    $this->db->from($this->table);
    // Return fetched data
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }
  function getRowsSub($id_cate){
    $this->db->select('*');
    $this->db->from("subcategoria");
    $this->db->where("id_categoria",$id_cate);
    // Return fetched data
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }
  function getIdCat($cat){
    $this->db->select('id_categoria');
    $this->db->from($this->table);
    $this->db->where('param', $cat);
    $query = $this->db->get();

    if($query->num_rows()>0)
    $result = $query->row()->id_categoria;
    else
    $result=0;

    return $result;
  }
  function getIdSubCat($cat){
    $this->db->select('id_subcategoria');
    $this->db->from("subcategoria");
    $this->db->where('param', $cat);
    $query = $this->db->get();

    if($query->num_rows()>0)
    $result = $query->row()->id_subcategoria;
    else
    $result=0;

    return $result;
  }
  function issubs($id){
    $this->db->select('*');
    $this->db->from("subcategoria");
    $this->db->where('id_categoria', $id);
    $query = $this->db->get();

    if($query->num_rows()>0)
      $result = 1;
    else
    $result=0;

    return $result;
  }
  function getSubcategorias($id){
    $this->db->select('*');
    $this->db->where('id_categoria', $id);
    $rows = $this->db->get("subcategoria");
    if ($rows->num_rows() > 0) return $rows->result();
    else return null;
  }
  function getParamCat($cat){
    $this->db->select('param');
    $this->db->from($this->table);
    $this->db->where('id_categoria', $cat);
    $query = $this->db->get();

    if($query->num_rows()>0)
    $result = $query->row()->param;
    else
    $result=0;

    return $result;
  }
  function getParamSubCat($cat){
    $this->db->select('param');
    $this->db->from("subcategoria");
    $this->db->where('id_subcategoria', $cat);
    $query = $this->db->get();

    if($query->num_rows()>0)
    $result = $query->row()->param;
    else
    $result=0;

    return $result;
  }
  function nombre_cat($id){
    $this->db->select('cat.nombre_cat');
    $this->db->from("categoria as cat");
    $this->db->join("subcategoria as sub","cat.id_categoria=sub.id_categoria");
    $this->db->where('sub.id_subcategoria', $id);
    $query = $this->db->get();

    if($query->num_rows()>0)
    $result = $query->row()->nombre_cat;
    else
    $result=0;

    return $result;
  }

}
