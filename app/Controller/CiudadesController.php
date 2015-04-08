<?php
	class CiudadesController extends AppController{
		public $name = 'Ciudades'; 
		public $helpers = array('Js');
		 public function beforeFilter(){
	        parent::beforeFilter();
	        $this->Auth->allow('getByCiudad'); 
	    }
		public function getByCiudad($ciudad){
			$this->layout = null;
			$this->autoRender = true;
			$this->set('ciudad', $this->Ciudade->find('list', array('fields' => array('id', 'name'), 'order' => array('name ASC'), 'conditions' => array('cdepar' => $ciudad))));
	    }
	    public function ShowCity(){
	    	$this->loadModel('Departamento');
	    	$ciudades = $this->Ciudade->find('all');
	    	$this->set('pageTitle','Lista de Ciudades');
	    	$this->set(compact('ciudades'));
	    	$this->set('depar', $this->Departamento->find('list', array('fields' => array('id', 'depar'), 'order' => array('depar ASC'))));
	    }
	    public function AddCity(){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	$this->viewPath = 'Response';
	    	$this->view = 'response';
	    	if($this->request->isAjax()){
	    		if($this->data['Ciudade']['id'] != ""){
	    			$id = $this->data['Ciudade']['id'];
	    			$this->Ciudade->id = $id;
			        if(!$this->Ciudade->exists()){
			            $msg = "Ciudade no Existente";
			        }else{
			        	if($this->Ciudade->saveField('name', $this->data['Ciudade']['name']) && $this->Ciudade->saveField('cdepar', $this->data['Ciudade']['cdepar'])){
				            $msg = "Ciudad Actualizada Exitosamente";
				        }
			        }
	    		}else{
	    			$this->Ciudade->create();
	        		if($this->Ciudade->save($this->request->data)){
						$msg = 'Ciudad '.$this->data['Ciudade']['name'].' Agregado Exitosamente.';
					}else{
						$msg = 'Error al Agregar la Ciudad '.$this->data['Ciudade']['name'];
					}
	    		}
			}else{
				$msg = 'Error al Agregar';
			}
			$this->set(compact('msg'));
	    }
	    public function DeleteCity($id = null){
	    	$this->loadModel('Tercero');
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	$this->viewPath = 'Response';
	    	$this->view = 'response';
	    	if($this->request->isAjax()){
		    	$this->Ciudade->id = $id;
		        if(!$this->Ciudade->exists()){
					$msg = "Error al Eliminar la Ciudad".$id;
		        }else{
	        		if($this->Ciudade->delete()){
		        		$msg = "Exito al Eliminar la Ciudad";
		        	}else{
		        		$msg = "Error al Eliminar la Ciudad";
		        	}
		        }
		    }else{
		    	$msg = "Error al Eliminar";
		    }
	        $this->set(compact('msg'));
	    }
	}
?>