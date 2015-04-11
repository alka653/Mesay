<?php
	App::uses('AuthComponent', 'Controller/Component');
	class Caso extends AppModel {
	    public $belongsTo = array(
	    	'Tecnico' => array(
	    		'className' => 'Tecnico',
	    		'foreignKey' => 'ctecni',
	    	),
	    	'Level' => array(
	    		'className' => 'Level',
	    		'foreignKey' => 'nivel',
	    	),
	    	'State' => array(
	    		'className' => 'State',
	    		'foreignKey' => 'estado',
	    	),
	    ); 
	}
?>