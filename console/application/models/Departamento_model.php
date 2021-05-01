<?php
class Departamento_model extends CI_Model {

    function __construct() {
        // Set table name
        $this->load->database();
        $this->table = 'departamento';
    }

    /*
     * Fetch records from the database
     * @param array filter data based on the passed parameters
     */
     function getRows($params = array()){
        $this->db->select('*');
        //$this->db->from($this->table);
        // Return fetched data
         $query = $this->db->get($this->table);
         $result = $query->result_array();
        return $result;
    }
// Fetch users
   function getDeptos($searchTerm=""){

     // Fetch users
     $this->db->select('*');
     $this->db->where("nombre_departamento like '%".$searchTerm."%' ");
     $fetched_records = $this->db->get($this->table );
     $departamentos = $fetched_records->result_array();

     // Initialize Array with fetched data
     $data = array();
     foreach($departamentos as $departamento){
        $data[] = array("id"=>$departamento['id_departamento'], "text"=>$departamento['nombre_departamento']);
     }
     return $data;
  }
    public function numRows(){
            return $this->db
			->count_all_results($this->table);

        }

}
