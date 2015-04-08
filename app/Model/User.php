<?php
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {
    public $belongsTo = array(
    	'Role' => array(
    		'className' => 'Role',
    		'foreignKey' => 'role',
    	),
    ); 
	public $validate = array(
        'username' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Digite un Usuario',
				'allowEmpty' => false
            ),
			'unique' => array(
				'rule'    => array('isUniqueUsername'),
				'message' => 'El Usuario ya esta en uso'
			)
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Ingrese una Contraseña'
            ),
			'min_length' => array(
				'rule' => array('minLength', '6'),  
				'message' => 'Tiene que contener mas de 6 Caracteres'
			)
        ),
		'name' => array(
            'valid' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter a valid role',
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('notEmpty'),
                'message' => 'Selecciona un Perfil',
            )
        )
    );
	
		/**
	 * Before isUniqueUsername
	 * @param array $options
	 * @return boolean
	 */
	function isUniqueUsername($check) {

		$username = $this->find(
			'first',
			array(
				'fields' => array(
					'User.id',
					'User.username'
				),
				'conditions' => array(
					'User.username' => $check['username']
				)
			)
		);

		if(!empty($username)){
			if($this->data[$this->alias]['id'] == $username['User']['id']){
				return true; 
			}else{
				return false; 
			}
		}else{
			return true; 
		}
    }
	
	public function alphaNumericDashUnderscore($check) {
        // $data array is passed using the form field name as the key
        // have to extract the value to make the function generic
        $value = array_values($check);
        $value = $value[0];

        return preg_match('/^[a-zA-Z0-9_ \-]*$/', $value);
    }
	
	public function equaltofield($check,$otherfield) 
    { 
        //get name of field 
        $fname = ''; 
        foreach ($check as $key => $value){ 
            $fname = $key; 
            break; 
        } 
        return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname]; 
    } 

	/**
	 * Before Save
	 * @param array $options
	 * @return boolean
	 */
	 public function beforeSave($options = array()) {
		// hash our password
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		
		// if we get a new password, hash it
		if (isset($this->data[$this->alias]['password_update'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password_update']);
		}
	
		// fallback to our parent
		return parent::beforeSave($options);
	}

}

?>