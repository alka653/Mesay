<?php
	class DepartamentosController extends AppController{
		public $name = 'Departamentos';
		public $components = array('RequestHandler', 'Session');
		public $helpers = array('Html', 'Js', 'Form', 'Time');
		public $paginate = array(
			'limit' => 3,
			'order' => array(
				'Departamento.id' => 'asc'
			)
		); 
	    public function beforeFilter(){
	        parent::beforeFilter();
	        $this->Auth->allow(''); 
	    }
	    public function ShowDepartment(){
	    	$this->set('pageTitle','Lista de Departamentos');
	    }
	    public function ViewDepartment(){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	$this->Departamento->recursive = 0;
	    	$this->paginate['Departamento']['limit'] = 5;
	    	$this->paginate['Departamento']['order'] = array('Departamento.depar' => 'ASC');
	    	$this->set('departamentos', $this->paginate());
	    }
	    public function AddDepartment(){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	$this->viewPath = 'Response';
	    	$this->view = 'response';
	    	if($this->request->isAjax()){
	    		if($this->data['Departamento']['id'] != ""){
	    			$id = $this->data['Departamento']['id'];
	    			$this->Departamento->id = $id;
			        if(!$this->Departamento->exists()){
			            $msg = "Departamento no Existente";
			        }else{
			        	if($this->Departamento->saveField('depar', $this->data['Departamento']['depar'])){
				            $msg = "Departamento Actualizado Exitosamente";
				        }
			        }
	    		}else{
	    			$this->Departamento->create();
	        		if($this->Departamento->save($this->request->data)){
						$msg = 'Departamento '.$this->data['Departamento']['depar'].' Agregado Exitosamente.';
					}else{
						$msg = 'Error al Agregar el Departamento '.$this->data['Departamento']['depar'];
					}
	    		}
			}else{
				$msg = 'Error al Agregar';
			}
			$this->set(compact('msg'));
	    }
	    public function DeleteDepartment($id = null){
	    	$this->loadModel('Ciudade');
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	$this->viewPath = 'Response';
	    	$this->view = 'response';
	    	if($this->request->isAjax()){
		    	$this->Departamento->id = $id;
		        if(!$this->Departamento->exists()){
					$msg = "Error al Eliminar el Departamento".$id;
		        }else{
		        	if($this->Ciudade->find('first', array('conditions' => array('cdepar' => $id)))){
		        		$msg = "0";
		        	}else{
		        		if($this->Departamento->delete()){
			        		$msg = "Exito al Eliminar el Departamento";
			        	}else{
			        		$msg = "Error al Eliminar el Departamento".$id;
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