<?php
	App::uses('AuthComponent', 'Controller/Component');

	class Ciudade extends AppModel {
		
	    public $belongsTo = array(
	    	'Departamento' => array(
	    		'className' => 'Departamento',
	    		'foreignKey' => 'cdepar',
	    	),
	    ); 
	}
?>