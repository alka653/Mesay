<?php
	class TicasosController extends AppController{
		public $name = 'Ticasos'; 
		public $components = array('RequestHandler', 'Session');
		public $helpers = array('Html', 'Js', 'Form', 'Time');
		public $paginate = array(
			'limit' => 3,
			'order' => array(
				'Ticaso.id' => 'asc'
			)
		);
		public function beforeFilter(){
	        parent::beforeFilter();
	        $this->Auth->allow(''); 
	    }
	    public function ShowCase(){
	    	$this->set('pageTitle','Tipo de Casos');
	    }
	    public function ViewCase(){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	$this->Ticaso->recursive = 0;
	    	$this->paginate['Ticaso']['limit'] = 5;
	    	$this->paginate['Ticaso']['order'] = array('Ticaso.id' => 'ASC');
	    	$this->set('ticasos', $this->paginate());
	    }
	    public function AddTicaso(){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	$this->viewPath = 'Response';
	    	$this->view = 'response';
	    	if($this->request->isAjax()){
	    		if($this->data['Ticaso']['id'] != ""){
	    			$id = $this->data['Ticaso']['id'];
	    			$this->Ticaso->id = $id;
			        if(!$this->Ticaso->exists()){
			            $msg = "Tipo de Caso no Existente";
			        }else{
			        	if($this->Ticaso->saveField('nticaso', $this->data['Ticaso']['nticaso']) && $this->Ticaso->saveField('prefijo', strtoupper($this->data['Ticaso']['prefijo']))){
				            $msg = "Actualizado Correctamente";
				        }
			        }
	    		}else{
	    			$this->Ticaso->create();
	    			$this->request->data['Ticaso']['prefijo'] = strtoupper($this->request->data['Ticaso']['prefijo']);
	        		if($this->Ticaso->save($this->request->data)){
						$msg = 'Agregado Exitosamente';
					}else{
						$msg = 'Error al Agregar el Tipo de Caso';
					}
	    		}
			}else{
				$msg = 'Error al Agregar';
			}
			$this->set(compact('msg'));
	    }
	    public function DeleteTicase($id = null){
	    	$this->loadModel('Caso');
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	$this->viewPath = 'Response';
	    	$this->view = 'response';
	    	if($this->request->isAjax()){
		    	$this->Ticaso->id = $id;
		        if(!$this->Ticaso->exists()){
					$msg = "Error al Eliminar";
		        }else{
		        	if($this->Caso->find('first', array('conditions' => array('cticaso' => $id)))){
		        		$msg = "0";
		        	}else{
		        		if($this->Ticaso->delete()){
			        		$msg = "Exito al Eliminar";
			        	}else{
			        		$msg = "Error al Eliminar";
			        	}
		        	}
		        }
		    }else{
		    	$msg = "Error al Eliminar";
		    }
	        $this->set(compact('msg'));
	    }
	}
?>