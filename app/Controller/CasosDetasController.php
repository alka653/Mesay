<?php
	class CasosDetasController extends AppController{
		public $name = 'CasosDetas'; 
		public $components = array('RequestHandler', 'Session');
		public $helpers = array('Html', 'Js', 'Form', 'Time');
		public $paginate = array(
			'limit' => 3,
			'order' => array(
				'Casos_deta.id' => 'asc'
			)
		);
		public function beforeFilter(){
	        parent::beforeFilter();
	        $this->Auth->allow(''); 
	    }
	    public function ViewCommentsTicket($id = null){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	$this->loadModel('Casos_deta');
	    	$this->Casos_deta->recursive = 0;
	    	$this->paginate['Casos_deta']['limit'] = 5;
	    	$this->paginate['Casos_deta']['order'] = array('id' => 'DESC');
	    	$this->paginate['Casos_deta']['conditions'] = array('idcaso' => $id, 'type' => 'C');
	    	$this->set('casos_detas', $this->paginate());
	    }
	}
?>