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
	    	'Tercero' => array(
	    		'className' => 'Tercero',
	    		'foreignKey' => 'citerce',
	    	),
	    	'State' => array(
	    		'className' => 'State',
	    		'foreignKey' => 'estado',
	    	),
	    	'Ticaso' => array(
	    		'className' => 'Ticaso',
	    		'foreignKey' => 'cticaso',
	    	),
	    ); 
	}
?>