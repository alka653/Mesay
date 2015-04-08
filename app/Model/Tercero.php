<?php
App::uses('AuthComponent', 'Controller/Component');

    class Tercero extends AppModel {
        public $hasOne = array(
            'User' => array(
                'className' => 'User',
                'foreignKey' => 'id'
            ),
        );
        public $belongsTo = array(
        	'Ciudade' => array(
        		'className' => 'Ciudade',
        		'foreignKey' => 'ciudad',
        	),
        ); 
    	public $validate = array(
            'name' => array(
                'nonEmpty' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'Ingrese sus Nombres',
    				'allowEmpty' => false
                ),
            ),
            'apellidos' => array(
                'required' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'Ingrese sus Apellidos'
                ),
            ),
            'dirterce' => array(
                'required' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'Ingrese su Direccion'
                ),
            ),
            'ctaskype' => array(
                'required' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'Ingrese su Cuenta Skype'
                ),
            ),
            'email1' => array(
                'email',
                'notEmpty' => array(
                    'rule' => array('notEmpty', 5, 40),
                    'message' => 'Ingrese un Email Valido'
                ),
                'isUnique' => array(
                    'rule' => array('isUnique', 'email1'),
                    'message' => 'El email ya esta registrado.'
                )
            ),
            'email2' => array(
                'email' => array(
                    'rule' => array('email', 5, 40),
                    'message' => 'Ingrese un Email Valido'
                ),
                'isUnique' => array(
                    'rule' => array('isUnique', 'email2'),
                    'message' => 'El email ya esta registrado.'
                )
            ),
            'email3' => array(
                'email' => array(
                    'rule' => array('email', 5, 40),
                    'message' => 'Ingrese un Email Valido'
                ),
                'isUnique' => array(
                    'rule' => array('isUnique', 'email3'),
                    'message' => 'El email ya esta registrado.'
                )
            ),
            'tel1' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty'
                ),
                'numeric' => array(
                    'rule' => array('numeric', 9, 10),
                    'message' => 'Solo Digitos Numericos'
                ),
            ),
            'tel2' => array(
                'numeric' => array(
                    'rule' => array('numeric', 9, 10),
                    'message' => 'Solo Digitos Numericos'
                ),
            ),
            'tel3' => array(
                'numeric' => array(
                    'rule' => array('numeric', 9, 10),
                    'message' => 'Solo Digitos Numericos'
                ),
            ),
            'ciudad' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty'
                )
            ),
        );
    }
?>