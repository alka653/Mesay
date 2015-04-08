<?php 
	class RolesController extends AppController{
		public $name = 'Roles'; 
		public $paginate = array(
	        'limit' => 25,
	    	'order' => array('Role.id' => 'asc' ) 
	    );
	    public function beforeFilter(){
	        parent::beforeFilter();
	        $this->Auth->allow(); 
	    }
		public function add(){
	        if($this->request->is('post')){
				$this->Role->create();
				if($this->Role->save($this->request->data)){
					$this->Session->setFlash(__('The Role has been created'));
					$this->redirect(array('controller' => 'User', 'action' => 'add'));
				}else{
					$this->Session->setFlash(__('The Role could not be created. Please, try again.'));
				}	
	        }
	    }
	}
?>