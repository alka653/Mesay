<?php
	class CTecnicosController extends AppController{
		public $name = 'Tecnicos'; 
		public $helpers = array('Js');
		public function beforeFilter(){
	        parent::beforeFilter();
	        $this->Auth->allow(''); 
	    }
	}
	public function CreateTecni(){
    	$this->layout = null;
    	$this->autoRender = true;
    	$this->set('user', '');
    	$this->set('name', '');
    	$this->set('onkeyup', 'BrowseUser()');
    	$this->set('button', 'true');
    	$this->set('required', 'true');
    	$this->set('action', 'SaveTecni');
    	$this->set('name', 'false');
    }
?>