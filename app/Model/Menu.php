<?php
App::uses('AuthComponent', 'Controller/Component');

class Menu extends AppModel {
	public $validate = array(
        'controller' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre Requerido'
            ),
			'min_length' => array(
				'rule' => array('minLength', '4'),  
				'message' => 'Minimo 4 caracteres'
			)
        ),
        'action' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre Requerido'
            ),
			'min_length' => array(
				'rule' => array('minLength', '4'),  
				'message' => 'Minimo 4 caracteres'
			)
        )
    );

}

?>