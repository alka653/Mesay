<?php
	class MenusController extends AppController{
		public $name = 'Menus'; 
		public $paginate = array(
	        'limit' => 25,
	    	'order' => array('Menu.id' => 'asc' ) 
	    );
	}
?>