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
	    	$caso = $this->Caso->find('first', array('conditions' => array('idcaso' => $id)));
	    	if($caso['Caso']['nivel'] == 1){
				$span = "label-danger";
			}
			if($caso['Caso']['nivel'] == 2){
				$span = "label-warning";
			}
			if($caso['Caso']['nivel'] == 3){
				$span = "label-info";
			}
			if($caso['Caso']['estado'] == 1){
				$span2 = "label-success";
			}
			if($caso['Caso']['estado'] == 3){
				$span2 = "label-default";
			}
	    	if($caso['Caso']['estado'] == 2){
				$this->Session->setFlash(__('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>El caso <strong>'.$id.'</strong> se encuentra anulado'), 'default', array('class' => 'alert alert-danger alert-dismissible text-center', 'role' => 'alert'));
				$this->redirect(array('action' => 'ViewTicket'));
	    	}
	    	$this->set(compact(array('id', 'caso', 'span', 'span2')));
	    }
	    public function FinalizarCaso($idcaso = null){
	    	if($this->Caso->updateAll(array('estado' => '3', 'finalizado' => '1'), array('idcaso' => $idcaso))){
	    		$msg = "Exito al Finalizar el Caso";
	    		$type = "success";
	    	}else{
	    		$msg = "Error al Finalizar el Caso";
	    		$type = "danger";
	    	}
			$this->Session->setFlash(__('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$msg), 'default', array('class' => 'alert alert-'.$type.' alert-dismissible text-center', 'role' => 'alert'));
			$this->redirect(array('action' => 'ViewTicket'));
	    }
	    public function AnularCaso($idcaso = null){
	    	if($this->Caso->updateAll(array('estado' => '2'), array('idcaso' => $idcaso))){
	    		$msg = "Exito al Anular el Caso";
	    		$type = "success";
	    	}else{
	    		$msg = "Error al Anular el Caso";
	    		$type = "danger";
	    	}
	    	$this->Session->setFlash(__('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$msg), 'default', array('class' => 'alert alert-'.$type.' alert-dismissible text-center', 'role' => 'alert'));
			$this->redirect(array('action' => 'ViewTicket'));
	    }
	    public function RemitCaso($id = null){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	if($this->request->is('post')){
	    		$this->viewPath = 'Response';
	    		$this->view = 'response';
	    		$ctecni = $this->request->data['Caso']['ctecni'];
	    		if($this->Caso->updateAll(array('ctecni' => "'$ctecni'"), array('idcaso' => $id))) {
		    		$msg = "Exito al Remitir el Caso";
		    	}else{
		    		$msg = "Error al Remitir el Caso";
	    		}
	    		$this->set(compact('msg'));
	    	}
	    	$caso = $this->Caso->find('first', array('conditions' => array('idcaso' => $id)));
	    	$tecnicos = $this->Caso->Tecnico->find('list', array('fields' => array('id', 'ntecni'), 'conditions' => array('id !=' => $caso['Caso']['ctecni'])));
	    	$this->set(compact('id', 'caso', 'tecnicos'));
	    }
	    public function CreateTicket(){
	    	$this->set('level', $this->Caso->Level->find('list', array('fields' => array('id', 'name_level'), 'order' => array('id ASC'))));
	    	$this->set('cticaso', $this->Caso->Ticaso->find('list', array('fields' => array('id', 'nticaso'), 'order' => array('nticaso ASC'))));
			$this->set('pageTitle','Crear Ticket');
	    }
	    public function NewTicket(){
	    	$this->loadModel('Tecnico');
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
	    			$this->request->data['citerce'] = AuthComponent::user('username');
	    		}else{
	    			if(!$this->request->data['User']['cod']){
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
			    	}else{
			    		$this->request->data['Caso']['citerce'] = $this->request->data['User']['cod'];
			    		$this->request->data['citerce'] = $this->request->data['User']['cod'];
			    	}
	    		}
	    		$this->request->data['Caso']['idcaso'] = $idcaso;
	    		$this->request->data['Caso']['estado'] = '1';
	    		$this->request->data['Caso']['fhrecibo'] = $this->request->data['Caso']['time'];
	    		$this->request->data['Caso']['finalizado'] = '0';
	    		$this->request->data['Caso']['citerce'] = $this->request->data['citerce'];
	    		foreach($Ramdon_tecni AS $tecni){
					$this->request->data['Caso']['ctecni'] = $tecni['Tecnico']['id'];
					$this->request->data['Casos_deta']['ctecni'] = $tecni['Tecnico']['id'];
				}
	    		$this->request->data['Casos_deta']['idcaso'] = $idcaso;
	    		$this->request->data['Casos_deta']['itcaso'] = '1';
	    		$this->request->data['Casos_deta']['detalle'] = 'Creacion del Ticket para el Ususario '.$this->request->data['citerce'];
	    		$this->request->data['Casos_deta']['fhdeta'] = $this->request->data['Caso']['time'];
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