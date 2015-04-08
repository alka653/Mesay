<?php
	App::uses('AuthComponent', 'Controller/Component');
	class Roles_menu extends AppModel{
		public $belongsTo = array(
    		'Role' => array(
    			'className' => 'Role',
    			'foreignKey' => 'role_id',
    		),
    		'Menu' => array(
    			'className' => 'Menu',
    			'foreignKey' => 'menu_id',
    		),
    	); 
	}
?>