<?php
	class CasosController extends AppController{
		public $name = 'Casos'; 
		public $components = array('RequestHandler', 'Session');
		public $helpers = array('Html', 'Js', 'Form', 'Time');
		public $paginate = array(
			'limit' => 3,
			'order' => array(
				'Caso.idcaso' => 'asc'
			)
		);
		public function beforeFilter(){
	        parent::beforeFilter();
	        $this->Auth->allow(''); 
	    }
	    public function ShowTicket($id = null){

	    }
	    public function CreateTicket(){
	    	$this->loadModel('Ticaso');
	    	$this->loadModel('Level');
	    	$this->set('level', $this->Level->find('list', array('fields' => array('id', 'name_level'), 'order' => array('id ASC'))));
	    	$this->set('cticaso', $this->Ticaso->find('list', array('fields' => array('id', 'nticaso'), 'order' => array('nticaso ASC'))));
			$this->set('pageTitle','Crear Ticket');
	    }
	    public function NewTicket(){
	    	$this->loadModel('Tecnico');
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
	    	$Ramdon_tecni = $this->Tecnico->find('all', array('order' => array('RAND()'), 'conditions' => array('estado' => '1'), 'limit' => 1));
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
	    			$this->request->data['User']['username'] = $this->request->data['citerce'];
		    		$this->request->data['User']['name'] = $this->request->data['name'];
		    		$this->request->data['User']['password'] = $password;
		    		$this->request->data['Tercero']['id'] = $this->request->data['citerce'];
		    		$this->request->data['Tercero']['name'] = $this->request->data['name'];
		    		$this->request->data['Tercero']['apellidos'] = $this->request->data['apellidos'];
		    		$this->request->data['Tercero']['dirterce'] = $this->request->data['dirterce'];
		    		$this->request->data['Tercero']['email1'] = $this->request->data['email1'];
		    		$this->request->data['Tercero']['tel1'] = $this->request->data['tel1'];
		    		$this->request->data['Tercero']['ciudad'] = $this->request->data['ciudad'];
		    		if($this->Tercero->save($this->request->data) && $this->User->save($this->request->data)){

		    		}else{
						$this->Session->setFlash(__('Error al enviar los datos.'), 'default', array('class' => 'alert alert-danger alert-dismissible'));
		    		}
	    		}
	    		$this->request->data['Caso']['idcaso'] = $idcaso;
	    		$this->request->data['Caso']['estado'] = '1';
	    		$this->request->data['Caso']['fhrecibo'] = date('Y-m-d');
	    		$this->request->data['Caso']['finalizado'] = '0';
	    		$this->request->data['Caso']['citerce'] = $this->request->data['citerce'];
	    		foreach($Ramdon_tecni AS $tecni){
					$this->request->data['Caso']['ctecni'] = $tecni['Tecnico']['id'];
					$this->request->data['Casos_deta']['ctecni'] = $tecni['Tecnico']['id'];
				}
	    		$this->request->data['Casos_deta']['idcaso'] = $idcaso;
	    		$this->request->data['Casos_deta']['itcaso'] = '1';
	    		$this->request->data['Casos_deta']['detalle'] = 'Creacion del Ticket para el Ususario '.$this->request->data['citerce'];
	    		$this->request->data['Casos_deta']['fhdeta'] = date('Y-m-d');
	    		$this->request->data['Casos_deta']['users_id'] = AuthComponent::user('id');
	    		if($this->Caso->save($this->request->data) && $this->Casos_deta->save($this->request->data)){
					$this->Session->setFlash(__('Exito al enviar los datos, ya estamos trabajando en el Caso. Ten presente el número del caso <strong>'.$idcaso."</strong>"), 'default', array('class' => 'alert success-alert'));
	    		}else{
					$this->Session->setFlash(__('Error al enviar los datos.'), 'default', array('class' => 'alert alert-danger alert-dismissible'));
	    		}
				$this->redirect(array('controller' => 'casos', 'action' => 'CreateTicket'));
	    	}
	    }
	    public function ViewTicket(){
	    	$this->Caso->recursive = 0;
	    	$this->paginate['Caso']['limit'] = 5;
	    	if(AuthComponent::user('role') == 3){
	    		$this->paginate['Caso']['conditions'] = array('citerce' => AuthComponent::user('username'));	    		
	    	}
	    	if(AuthComponent::user('role') == 2){
	    		$this->paginate['Caso']['conditions'] = array('ctecni' => AuthComponent::user('username'));	    		
	    	}
	    	$this->paginate['Caso']['order'] = array('Caso.idcaso' => 'ASC');
	    	$this->set('casos', $this->paginate());
	    }
	}
?>