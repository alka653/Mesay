<?php
	App::uses('Controller', 'Controller');
	class AppController extends Controller{
		public $helpers = array('Html', 'Tree');
		public $components = array(
			'Session',
	        'Auth' => array(
	            'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
	            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
				'authError' => 'You must be logged in to view this page.',
				'loginError' => 'Invalid Username or Password entered, please try again.'
	 
	    	)
	    );
		public function beforeFilter(){
	        $this->Auth->allow('login');
	        $this->loadModel('roles_menu');
		    $this->loadModel('Menu');
		    $this->loadModel('User');
	        if($this->Session->check('Auth.User')){
		        if(AuthComponent::user('status') == 0){
					$this->Session->setFlash(__('Usuario Inactivo.'), 'default', array('class' => 'alert alert-danger alert-dismissible'));
		        	$this->redirect($this->Auth->logout());
		        }else{
		        	$this->set(compact('menu'));
		        	$this->set("user", $this->User->findById(AuthComponent::user('id')));
		        }
		    	if($id_menu = $this->Menu->find('first', array('conditions' => array('controller' => $this->params['controller'], 'action' => $this->params['action'])))){
			    	if($this->roles_menu->find('all', array('conditions' => array('role_id' => AuthComponent::user('role'), 'menu_id' => $id_menu['Menu']['id'])))){
			    		
			    	}else{
			    		$this->redirect(array('controller' => 'users', 'action' => 'welcome'));
			    	}
			    }
		    }
	    }
		public function isAuthorized($user){
			return true;
		}
	}
?>