<?php
class Catalogo_model extends CI_Model {

  function __construct() {
    // Set table name
    $this->load->database();
    $this->table = 'producto';
  }

  /*
  * Fetch records from the database
  * @param array filter data based on the passed parameters
  */
  function getRows($params = array()){
    $this->db->select('*');
    $this->db->from($this->table);

    if(array_key_exists("where", $params)){
      foreach($params['where'] as $key => $val){
        $this->db->where($key, $val);
      }
    }

    if(array_key_exists("search", $params)){
      // Filter data by searched keywords
      if(!empty($params['search']['keywords'])){
        $this->db->like('descripcion', $params['search']['keywords']);
      }
    }

    // Sort data by ascending or desceding order
    if(!empty($params['search']['sortBy'])){
      $this->db->order_by('descripcion', $params['search']['sortBy']);
    }else{
      $this->db->order_by('id_producto', 'descripcion');
    }

    if(!empty($params['search']['byCat'])){
      $this->db->where('id_categoria', $params['search']['byCat']);
      $this->db->order_by('id_producto', 'descripcion');
    }else{
      $this->db->order_by('id_producto', 'descripcion');
    }

    if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
      $result = $this->db->count_all_results();
    }else{
      if(array_key_exists("id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){
        if(!empty($params['id_producto'])){
          $this->db->where('id_producto', $params['id']);
        }
        $query = $this->db->get();
        $result = $query->row_array();
      }else{
        $this->db->order_by('id_producto', 'descripcion');
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
          $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
          $this->db->limit($params['limit']);
        }

        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
      }
    }

    // Return fetched data
    return $result;
  }
  function getRowsSub($params = array()){
    $this->db->select('*');
    $this->db->from($this->table);

    if(array_key_exists("where", $params)){
      foreach($params['where'] as $key => $val){
        $this->db->where($key, $val);
      }
    }

    if(array_key_exists("search", $params)){
      // Filter data by searched keywords
      if(!empty($params['search']['keywords'])){
        $this->db->like('descripcion', $params['search']['keywords']);
      }
    }

    // Sort data by ascending or desceding order
    if(!empty($params['search']['sortBy'])){
      $this->db->order_by('descripcion', $params['search']['sortBy']);
    }else{
      $this->db->order_by('id_producto', 'descripcion');
    }

    if(!empty($params['search']['byCat'])){
      $this->db->where('id_subcategoria', $params['search']['byCat']);
      $this->db->order_by('id_producto', 'descripcion');
    }else{
      $this->db->order_by('id_producto', 'descripcion');
    }

    if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
      $result = $this->db->count_all_results();
    }else{
      if(array_key_exists("id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){
        if(!empty($params['id_producto'])){
          $this->db->where('id_producto', $params['id']);
        }
        $query = $this->db->get();
        $result = $query->row_array();
      }else{
        $this->db->order_by('id_producto', 'descripcion');
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
          $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
          $this->db->limit($params['limit']);
        }

        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
      }
    }

    // Return fetched data
    return $result;
  }

  public function getMinimo(){
    $rows = $this->db->get("configuracion")->row();
    return $rows;
  }
  public function numRows(){

    return $this->db
    ->where('inactivo', 0)
    ->count_all_results('producto');

  }
  public function numRowsbyCat($idCat){

    return $this->db
    ->where('id_categoria', $idCat)
    ->where('inactivo', 0)
    ->count_all_results('producto');

  }

  public function numRowsbySubCat($idCat){

    return $this->db
    ->where('id_subcategoria', $idCat)
    ->where('inactivo', 0)
    ->count_all_results('producto');

  }
  function getImage($id){
    $this->db->select('imagen') ;
    $this->db->where('id_producto', $id);
    $q = $this->db->get($this->table);
    $row = $q->row_array();
    return $row;
  }

  function get_stock($id){
    $this->db->select('cantidad, talla') ;
    $this->db->where('id_talla', $id);
    $q = $this->db->get("producto_talla");
    if($q->num_rows()>0)
    {
      $row = $q->row();
      return $row;
    }
    else {
      return null;
    }
  }
  function get_stock_producto($id){
    $this->db->select('stock as cantidad') ;
    $this->db->where('id_producto', $id);
    $q = $this->db->get("producto");
    if($q->num_rows()>0)
    {
      $row = $q->row();
      return $row;
    }
    else {
      return null;
    }
  }
  function is_stockeable($id){
    $this->db->select('*') ;
    $this->db->where('tipo_producto', "FISICO");
    $this->db->where('id_producto', $id);
    $q = $this->db->get("producto");
    if($q->num_rows()>0)
    {
      return 1;
    }
    else {
      return 0;
    }
  }

  function compare_wish($id_producto,$id_usuario){
    $this->db->where('id_producto', $id_producto);
    $this->db->where('id_usuario', $id_usuario);
    $row = $this->db->get('wishlist');
    if ($row->num_rows()>0) return true;
    else return false;
  }
  function get_wishlist_row($id_producto,$id_usuario){
    $this->db->where('id_producto', $id_producto);
    $this->db->where('id_usuario', $id_usuario);
    $row = $this->db->get('wishlist');
    if ($row->num_rows()>0) return $row->row()->id_wishlist;
    else return false;
  }
}
