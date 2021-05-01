<?php
include APPPATH . 'libraries/REST_Controller.php';

class OrdenTmp2 extends REST_Controller {

	  /*
     * Get All Data from this method.
     * @return Response
    */
	
    public function __construct() {
       parent::__construct();
		$this->load->database();
       	$this->load->model('LoginModel','login');
		$this->load->model('UtilsModel','utils');
		$this->load->helper('utilities_helper');
		$this->load->model('OrdenesModel');
    }

    /*
     * Get All Data from this method.
     * @return Response
    */
	public function index_get($id_orden=0){
		$id_orden=113;
        if(!empty($id_orden)){
		$data = array();
		$this->load->model('OrdenesModel');
		$orden= $this->OrdenesModel->getOrden($id_orden);
		$detalleOrden= $this->OrdenesModel->getOrdenDetRows($id_orden);
		
		foreach ($orden as $ord) {
			$correo=$ord['correo'];
			$total=$ord['total'];
			$norden=$ord['numero_orden'];
		}
	
		$data['orden'] = $orden;
		$data['detOrden'] = $detalleOrden;
		$data['orden'] = $orden;
		$data['detOrden'] = $detalleOrden;
		
		 $xdatos['num_orden'] = $norden;
		$xdatos['id'] = $id_orden;
		$this->response($data, REST_Controller::HTTP_OK);
		}
		else{
			 $xdatos['num_orden'] = -1;
			$xdatos['id'] = -1;
			$xdatos['mensaje'] = 'no autorizado';
			$this->response($xdatos, REST_Controller::HTTP_UNAUTHORIZED);
		}
	}		
}
