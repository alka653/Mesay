<?php
	App::uses('AuthComponent', 'Controller/Component');

	class Casos_deta extends AppModel {
		
	    public $belongsTo = array(
	    	'Caso' => array(
	    		'className' => 'Caso',
	    		'foreignKey' => 'idcaso',
	    	),
	    ); 
	}
?>