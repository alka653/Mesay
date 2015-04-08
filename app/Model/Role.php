<?php
	App::uses('AuthComponent', 'Controller/Component');
	class Role extends AppModel{
		public $displayField = "Role";
		public $validate = array(
			'name_role' => array(
				'rule' => 'notEmpty'
			),
			'status' => array(
				'notEmpty' => array(
					'rule' => 'notEmpty'
				),
				'numeric' => array(
					'rule' => 'numeric',
					'message' => 'Solo números'
				),
			),
		);
		public $hasAndBelogsToMany = array(
			'Menu' => array(
				'className' => 'Menu',
				'joinTable' => 'roles_menus',
				'foreignKey' => 'role_id',
				'associationForeignKey' => 'menu_id',
				'unique' => 'keepExisting',
			)
		);
		public function beforeSave($options = array()){
			foreach (array_keys($this->hasAndBelongsToMany) as $model){
				if(isset($this->data[$this->name][$model])){
					$this->data[$model][$model] = $this->data[$this->name][$model];
					unset($this->data[$this->name][$model]);
				}
			}
			return true;
		}
	}
?>