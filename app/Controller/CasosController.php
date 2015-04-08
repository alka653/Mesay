<?php
	class CasosController extends AppController{
		public $name = 'Casos'; 
		public $helpers = array('Js');
		 public function beforeFilter(){
	        parent::beforeFilter();
	        $this->Auth->allow(''); 
	    }
	    public function CreateTicket(){
	    	$this->loadModel('Departamento');
	    	$this->loadModel('Ticaso');
	    	$this->set('depar', $this->Departamento->find('list', array('fields' => array('id', 'depar'), 'order' => array('depar ASC'))));
	    	$this->set('cticaso', $this->Ticaso->find('list', array('fields' => array('id', 'nticaso'), 'order' => array('nticaso ASC'))));
			$this->set('pageTitle','Crear Ticket');
	    }
	    public function NewTicket(){
	    	$this->loadModel('Caso');
	    	$this->loadModel('Casos_deta');
	    	$this->loadModel('User');
	    	$this->loadModel('Tercero');
	    	$password = "";
	    	$mx = "";
	    	$charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_@*";
	    	for($i = 0; $i <= 10; $i++){
	    		$random_int = mt_rand();
				$password .= $charset[$random_int % strlen($charset)];
	    	}
	    	$ms = $this->Caso->find('first', array('fields' => array('MAX(idcaso) as max')));
	    	$max = substr($ms[0]['max'], 7)+1;
	    	if(strlen($max) == 1){
				$mx = "00".$max;
			}
			if(strlen($max) == 2){
				$mx = "0".$max;
			}
			if(strlen($max) == 3){
				$mx = $max;
			}
			$ic = "TCK".date("y")."".date("m");
			$idcaso = $ic."".$mx;
	    	if($this->request->is('post')){
	    		$this->Caso->create();
	    		$this->Casos_deta->create();
	    		if(AuthComponent::user('role') == 3){
	    			$this->request->data['Caso']['citerce'] = AuthComponent::user('username');
	    		}else{
	    			$this->User->create();
	    			$this->Tercero->create();
	    			$this->request->data['User']['username'] = $this->request->data['Caso']['citerce'];
		    		$this->request->data['User']['name'] = $this->request->data['Caso']['name'];
		    		$this->request->data['User']['password'] = $password;
		    		$this->request->data['Tercero']['citerce'] = $this->request->data['Caso']['citerce'];
		    		$this->request->data['Tercero']['name'] = $this->request->data['Caso']['name'];
		    		$this->request->data['Tercero']['apellidos'] = $this->request->data['Caso']['apellidos'];
		    		$this->request->data['Tercero']['dirterce'] = $this->request->data['Caso']['dirterce'];
		    		$this->request->data['Tercero']['email1'] = $this->request->data['Caso']['email1'];
		    		$this->request->data['Tercero']['tel1'] = $this->request->data['Caso']['tel1'];
		    		$this->request->data['Tercero']['ciudad'] = $this->request->data['ciudad'];
		    		if(!$this->Tercero->save($this->request->data) && $this->User->save($this->request->data)){
						$this->Session->setFlash(__('Error al enviar los datos.'), 'default', array('class' => 'alert alert-danger alert-dismissible'));
		    		}
	    		}
	    		$this->request->data['Caso']['idcaso'] = $idcaso;
	    		$this->request->data['Caso']['estado'] = '1';
	    		$this->request->data['Caso']['fhrecibo'] = date('Y-m-d');
	    		$this->request->data['Caso']['finalizado'] = '0';
	    		$this->request->data['Casos_deta']['idcaso'] = $idcaso;
	    		$this->request->data['Casos_deta']['itcaso'] = '1';
	    		$this->request->data['Casos_deta']['detalle'] = 'Creacion del Ticket para el Ususario '.$this->request->data['Caso']['citerce'];
	    		$this->request->data['Casos_deta']['fhdeta'] = date('Y-m-d');
	    		$this->request->data['Casos_deta']['users_id'] = AuthComponent::user('id');
	    		if($this->Caso->save($this->request->data) && $this->Casos_deta->save($this->request->data)){
					$this->Session->setFlash(__('Exito al enviar los datos, ya estamos trabajando en el Caso. Ten presente el número del caso <strong>'.$idcaso."</strong>"), 'default', array('class' => 'alert success-alert'));
	    		}else{
					$this->Session->setFlash(__('Error al enviar los datos.'), 'default', array('class' => 'alert alert-danger alert-dismissible'));
	    		}
				$this->redirect(array('controller' => 'casos', 'action' => 'createticket'));
	    	}
	    }
	}
?>