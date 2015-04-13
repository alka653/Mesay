<?php
	class TercerosController extends AppController{
		public $name = 'Terceros'; 
		public $components = array('RequestHandler', 'Session');
		public $helpers = array('Html', 'Js', 'Form', 'Time');
		public $paginate = array(
			'limit' => 3,
			'order' => array(
				'Tercero.id' => 'asc'
			)
		);
	    public function beforeFilter(){
	        parent::beforeFilter();
	        $this->Auth->allow(''); 
	    }
	    public function FindTerce(){
	    	$term = null;
	    	if(!empty($this->request->query['term'])){
	    		$term = $this->request->query['term'];
	    		$terms = explode(' ', trim($term)); //limpia la busqueda
	    		$terms = array_diff($terms, array('')); //Comparacion entre arreglos
	    		foreach($terms as $term){
	    			$conditions[] = array('Tercero.name LIKE' => '%'.$term.'%');
	    		}
	    		$tercero = $this->Tercero->find('all', array('recursive' => 1, 'fields' => array('Tercero.id', 'Tercero.name', 'Tercero.apellidos'), 'conditions' => $conditions, 'limit' => '10'));
	    	}
	    	echo json_encode($tercero);
	    	$this->autoRender = false;
	    }
	}
?>