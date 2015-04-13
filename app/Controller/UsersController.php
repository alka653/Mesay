<?php
	class UsersController extends AppController{
		public $name = 'Users'; 
		public $components = array('RequestHandler', 'Session');
		public $helpers = array('Html', 'Js', 'Form', 'Time');
		public $paginate = array(
			'limit' => 3,
			'order' => array(
				'User.id' => 'asc'
			)
		);
	    public function beforeFilter(){
	        parent::beforeFilter();
	        $this->Auth->allow('login', 'register', 'confirm', 'GeneratePassword', 'email'); 
	    }
	    public function welcome(){
			$this->set('pageTitle','Bienvenido');
	    }
	    public function confirm($user = null){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	if($user != null){
				if($this->User->find('first', array('conditions' => array('username' => $user)))){
					$message = "<p class='danger-msg text-danger'>El Usuario ya se Encuentra Creado</p>";
					$button = "true";
				}else{
					$message = "<p class='success-msg text-success'>Nombre de Usuario Disponible</p>";
					$button = "false";
				}
		    	$this->set('button', $button);
		    	$this->set('message', $message);
		    }else{
		    	$this->set('button', 'false');
		    	$this->set('message', '');
		    }
	    }
	    public function FindUser(){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    }
	    public function NewUser(){
	    	$this->loadModel('Departamento');
	    	$this->set('depar', $this->Departamento->find('list', array('fields' => array('id', 'depar'), 'order' => array('depar ASC'))));
	    	$this->layout = null;
	    	$this->autoRender = true;
	    }
	    public function email($email = null){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	$this->loadModel('Tercero');
	    	if($email != null){
				if($this->Tercero->find('first', array('conditions' => array('email1' => $email))) || $this->Tercero->find('first', array('conditions' => array('email2' => $email))) || $this->Tercero->find('first', array('conditions' => array('email3' => $email)))){
					$msg = "<p class='danger-msg text-danger'>El email ya esta registrado</p>";
					$button = "true";
				}else{
					$msg = "";
					$button = "false";
				}
		    	$this->set('button', $button);
		    }else{
		    	$this->set('button', 'false');
		    	$msg = '';
		    }
		    $this->set(compact('msg'));
	    }
	    public function register(){
			$this->set('pageTitle','Registrarme');
	    	$this->layout = "Login";
	    	$this->loadModel('Departamento');
	    	$this->loadModel('Tercero');
	    	$this->set('depar', $this->Departamento->find('list', array('fields' => array('id', 'depar'), 'order' => array('depar ASC'))));
	    	if($this->request->is('post')){
	    		$this->User->create();
	    		$this->Tercero->create();
	    		$this->request->data['Tercero']['citerce'] = $this->request->data['User']['username'];
	    		$this->request->data['Tercero']['name'] = $this->request->data['User']['name'];
	    		$this->request->data['Tercero']['apellidos'] = $this->request->data['User']['apellidos'];
	    		$this->request->data['Tercero']['dirterce'] = $this->request->data['User']['dirterce'];
	    		$this->request->data['Tercero']['ctaskype'] = $this->request->data['User']['ctaskype'];
	    		$this->request->data['Tercero']['email1'] = $this->request->data['User']['email1'];
	    		if($this->request->data['User']['email2'] != ""){
	    			$this->request->data['Tercero']['email2'] = $this->request->data['User']['email2'];
	    		}
	    		if($this->request->data['User']['email3'] != ""){
	    			$this->request->data['Tercero']['email3'] = $this->request->data['User']['email3'];
	    		}
	    		if($this->request->data['User']['tel2'] != ""){
	    			$this->request->data['Tercero']['tel2'] = $this->request->data['User']['tel2'];
	    		}
	    		if($this->request->data['User']['tel3'] != ""){
	    			$this->request->data['Tercero']['tel3'] = $this->request->data['User']['tel3'];
	    		}
	    		$this->request->data['Tercero']['tel1'] = $this->request->data['User']['tel1'];
	    		$this->request->data['Tercero']['ciudad'] = $this->request->data['ciudad'];
	    		if($this->Tercero->save($this->request->data) && $this->User->save($this->request->data)){
					$this->Session->setFlash(__('Exito al Registrarte.'), 'default', array('class' => 'alert success-alert'));
	    		}else{
					$this->Session->setFlash(__('Error al Registrarte'), 'default', array('class' => 'alert alert-danger alert-dismissible'));
	    		}
				$this->redirect(array('action' => 'register'));
	    	}
	    }
		public function login(){
			$this->set('pageTitle','Inicio Sesión');
			$this->layout = "Login";
			if($this->Session->check('Auth.User')){
				$this->redirect(array('action' => 'welcome'));		
			}
			if($this->request->is('post')){
				if($this->Auth->login()){
					$this->redirect(array('action'=>'welcome'));
				}else{
					$this->Session->setFlash(__('Datos Invalidos'), 'default', array('class' => 'alert alert-danger alert-dismissible'));
				}
			} 
		}
		public function logout(){
			$this->redirect($this->Auth->logout());
		}
	    public function index(){
			$this->paginate = array(
				'limit' => 6,
				'order' => array('User.username' => 'asc' )
			);
			$users = $this->paginate('User');
			$this->set(compact('users'));
	    }
	    public function show(){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	$this->User->recursive = 0;
	    	$this->paginate['User']['limit'] = 5;
	    	$this->paginate['User']['order'] = array('User.id' => 'ASC');
	    	$this->set('users', $this->paginate());
	    }
	    public function add(){
	    	$roles = $this->User->Role->find('list', array('fields' => array('id', 'name_role')));
	    	$this->set('pageTitle','Lista de Usuarios');
	    	$this->set(compact('roles'));
	    	if($this->request->isAjax()){

	    	}
	    }/*
	    public function edit($id = null){
	    	if($this->request->isAjax()){
	    		$this->layout = null;
	    		$this->autoRender = true;
	    		$this->set('user', $this->User->findById($id));
	    		$roles = $this->User->Role->find('list', array('fields' => array('id', 'name_role')));
				$this->set(compact('roles'));
	    	}else{
	    		$this->redirect(array('action' => 'welcome'));
	    	}
	    }*/
	    public function status($id = null){
			$this->layout = null;
	    	$this->autoRender = true;
	    	$this->viewPath = 'Response';
	    	$this->view = 'response';
	    	$this->loadModel('Tecnico');
	    	if($this->request->isAjax()){
	    		$this->User->id = $id;
	    		$username = $this->User->findById($id);
	    		$this->Tecnico->id = $username['User']['username'];
		        if(!$this->User->exists()){
					$msg = "Usuario no Existente";
		        }else{
		        	if($username['User']['status'] == 0){
		        		$status = 1;
		        		$msg = "Exito al Habilitar el Usuario";
		        	}else{
		        		$status = 0;
		        		$msg = "Exito al Deshabilitar el Usuario";
		        	}
		        	if($this->User->saveField('status', $status)){
		        		if($username['User']['role'] == 2){
		        			if($this->Tecnico->saveField('estado', $status)){
		        				
			        		}else{
			        			$msg = "Ha ocurrido un error";
			        		}
		        		}
		        		$msg = $msg;
			        }
		        }
	    	}else{
	    		$msg = "Error al Deshabilitar el Usuario";
	    	}
	    	$this->set(compact('msg'));
	    }
	    public function CreateAdmin(){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	$this->set('user', '');
	    	$this->set('onkeyup', 'BrowseUser()');
	    	$this->set('button', 'true');
	    	$this->set('required', 'true');
	    	$this->set('action', 'SaveAdmin');
	    	$this->set('name', 'false');
	    }
	    public function EditUser($user = null, $role = null){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	if($this->request->isAjax()){
	    		$this->loadModel('Tecnico');
	    		$this->loadModel('Tercero');
	    		$this->loadModel('Departamento');
	    		$this->loadModel('Ciudade');
	    		$username = $this->User->findById($user);
	    		$this->request->data = $username;
	    		if($role == '1'){
	    			$view = 'create_admin';
	    		}
	    		if($role == '2'){
	    			$user_tecni = $this->Tecnico->findById($username['User']['username']);
	    			$view = 'create_tecni';
    				$this->set('atecni', $user_tecni['Tecnico']['atecni']);
	    		}
	    		if($role == '3'){
	    			$user_terce = $this->Tercero->findById($username['User']['username']);
	    			$val_ciud = $this->Ciudade->findById($user_terce['Tercero']['ciudad']);
	    			$this->set('val_depar', $val_ciud['Ciudade']['cdepar']);
	    			$this->set('ciud_val', $user_terce['Tercero']['ciudad']);
	    			$this->set('depar', $this->Departamento->find('list', array('fields' => array('id', 'depar'), 'order' => array('depar ASC'))));
	    			$this->set('apellidos', $user_terce['Tercero']['apellidos']);
	    			$this->set('dirterce', $user_terce['Tercero']['dirterce']);
	    			$this->set('ctaskype', $user_terce['Tercero']['ctaskype']);
	    			$this->set('email1', $user_terce['Tercero']['email1']);
	    			$this->set('tel1', $user_terce['Tercero']['tel1']);
	    			$view = 'create_client';
	    		}
	    		$this->set('onkeyup', '');
	    		$this->set('onkeyup2', '');
    			$this->set('button', 'false');
    			$this->set('name', 'true');
    			$this->set('required', 'false');
    			$this->set('action', 'UpdateUser');
    			$this->request->data['User']['password'] = '';
	    		$this->view = $view;
	    	}else{
				$this->redirect(array('action' => 'welcome'));
	    	}
	    }
	    public function UpdateUser($id = null){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	$this->viewPath = 'Response';
	    	$this->view = 'response';
	    	if($this->request->isAjax()){
	    		$this->loadModel('Tecnico');
	    		$this->loadModel('Tercero');
	    		$this->User->id = $id;
	    		$user = $this->User->findById($id);
		        if(!$this->User->exists()){
					$msg = "Usuario no Existente";
		        }else{
		        	if($this->User->saveField('name', $this->request->data['User']['name'])){
		        		if($this->request->data['User']['password'] != ""){
		        			if($this->User->saveField('password', $this->request->data['User']['password'])){
		        				$msg = "Exito al Actualizar los Datos";
		        			}else{
		        				$msg = "Error al actualizar los Datos";
		        			}
		        		}
		        		if($user['User']['role'] == 2){
		        			$this->Tecnico->id = $user['User']['username'];
		        			if(!$this->Tecnico->exists()){
		        				$mgs = "Tecnico no Existente";
		        			}else{
		        				if($this->Tecnico->saveField('ntecni', $this->request->data['User']['name']) && $this->Tecnico->saveField('atecni', $this->request->data['User']['atecni'])){

		        				}else{
		        					$msg = "Error al Actualizar";
		        				}
		        			}
		        		}
		        		if($user['User']['role'] == 3){
		        			$this->Tercero->id = $user['User']['username'];
		        			if(!$this->Tercero->exists()){
		        				$mgs = "Tercero no Existente";
		        			}else{
		        				if($this->Tercero->saveField('name', $this->request->data['User']['name']) && $this->Tercero->saveField('apellidos', $this->request->data['User']['apellidos']) && $this->Tercero->saveField('dirterce', $this->request->data['User']['dirterce']) && $this->Tercero->saveField('ctaskype', $this->request->data['User']['ctaskype']) && $this->Tercero->saveField('email1', $this->request->data['User']['email1']) && $this->Tercero->saveField('tel1', $this->request->data['User']['tel1']) && $this->Tercero->saveField('ciudad', $this->request->data['ciudad'])){

		        				}else{
		        					$msg = "Error al Actualizar";
		        				}
		        			}
		        		}
		        		$msg = "Exito al Actualizar los Datos";
			        }else{
			        	$msg = "Error al Actualizar los Datos";
			        }
		        }
	    	}else{
	    		$msg = "Ah Ocurrido un Error";
	    	}
			$this->set(compact('msg'));
	    }
	    public function CreateTecni(){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	$this->set('user', '');
	    	$this->set('atecni', '');
	    	$this->set('onkeyup', 'BrowseUser()');
	    	$this->set('button', 'true');
	    	$this->set('required', 'true');
	    	$this->set('action', 'SaveTecni');
	    	$this->set('name', 'false');
	    }
	    public function SaveAdmin(){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	$this->viewPath = 'Response';
	    	$this->view = 'response';
	    	if($this->request->isAjax()){
	    		$this->User->create();
	    		$this->request->data['User']['role'] = '1';
	    		if($this->User->save($this->request->data)){
	    			$msg = "Exito en el Registro";
	    		}else{
	    			$msg = "Ha Ocurrido un Error";
	    		}
	    	}else{
	    		$msg = "Ah Ocurrido un Error";
	    	}
			$this->set(compact('msg'));
	    }
	    public function SaveTecni(){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	$this->viewPath = 'Response';
	    	$this->view = 'response';
	    	$this->loadModel('Tecnico');
	    	if($this->request->isAjax()){
	    		$this->User->create();
	    		$this->Tecnico->create();
	    		$this->request->data['User']['role'] = '2';
	    		$this->request->data['Tecnico']['id'] = $this->request->data['User']['username'];
	    		$this->request->data['Tecnico']['ntecni'] = $this->request->data['User']['name'];
	    		$this->request->data['Tecnico']['atecni'] = $this->request->data['User']['atecni'];
	    		if($this->User->save($this->request->data) && $this->Tecnico->save($this->request->data)){
	    			$msg = "Exito en el Registro";
	    		}else{
	    			$msg = "Ha Ocurrido un Error";
	    		}
	    	}else{
	    		$msg = "Ah Ocurrido un Error";
	    	}
			$this->set(compact('msg'));
	    }
	    public function SaveClient(){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	$this->viewPath = 'Response';
	    	$this->view = 'response';
	    	$this->loadModel('Tercero');
	    	if($this->request->isAjax()){
	    		$this->User->create();
	    		$this->Tercero->create();
	    		$this->request->data['User']['role'] = '3';
	    		$this->request->data['Tercero']['id'] = $this->request->data['User']['username'];
	    		$this->request->data['Tercero']['name'] = $this->request->data['User']['name'];
	    		$this->request->data['Tercero']['apellidos'] = $this->request->data['User']['apellidos'];
	    		$this->request->data['Tercero']['dirterce'] = $this->request->data['User']['dirterce'];
	    		$this->request->data['Tercero']['ctaskype'] = $this->request->data['User']['ctaskype'];
	    		$this->request->data['Tercero']['email1'] = $this->request->data['User']['email1'];
	    		$this->request->data['Tercero']['tel1'] = $this->request->data['User']['tel1'];
	    		$this->request->data['Tercero']['ciudad'] = $this->request->data['ciudad'];
	    		if($this->User->save($this->request->data) && $this->Tercero->save($this->request->data)){
	    			$msg = "Exito en el Registro";
	    		}else{
	    			$msg = "Ha Ocurrido un Error";
	    		}
	    	}else{
	    		$msg = "Ah Ocurrido un Error";
	    	}
			$this->set(compact('msg'));	
	    }
	    public function CreateClient(){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	$this->loadModel('Departamento');
	    	$this->set('depar', $this->Departamento->find('list', array('fields' => array('id', 'depar'), 'order' => array('depar ASC'))));
	    	$this->set('onkeyup', 'BrowseUser()');
	    	$this->set('val_depar','');
	    	$this->set('onkeyup2', 'BrowseEmail()');
	    	$this->set('button', 'true');
	    	$this->set('required', 'true');
	    	$this->set('action', 'SaveClient');
	    	$this->set('name', 'false');
	    	$this->set('apellidos', '');
			$this->set('dirterce', '');
			$this->set('ctaskype', '');
			$this->set('email1', '');
			$this->set('tel1', '');
			$this->set('ciud_val', '0');
	    }
	    public function GeneratePassword(){
	    	$this->layout = null;
	    	$this->autoRender = true;
	    	$password = "";
	    	$mx = "";
	    	$charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_@*";
	    	for($i = 0; $i <= 10; $i++){
	    		$random_int = mt_rand();
				$password .= $charset[$random_int % strlen($charset)];
	    	}
	    	$this->set(compact('password'));
	    }
	}
?>